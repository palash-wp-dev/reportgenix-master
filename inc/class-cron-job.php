<?php

/**
 * Author Xgenious
 * @since 1.0.0
 * */

if (!defined('ABSPATH')){
	exit(); //exit if access directly
}
if (!class_exists('Xgenious_Cron_Job')){
	class Xgenious_Cron_Job{
		//$instance variable
		private static $instance;
		private $envato_api_base;

		public function __construct() {
			$this->envato_api_base = 'https://api.envato.com/v3/market';
// 			add_action( 'xgenious_cron_hook', array($this,'xgenious_cron_exec') );
// 			add_filter( 'cron_schedules', array($this,'xgenious_add_cron_interval') );
// 			if ( ! wp_next_scheduled( 'xgenious_cron_hook' ) ) {
// 				wp_schedule_event( time(), 'hourly', 'xgenious_cron_hook' );
// 			}
		}
		/**
		 * get Instance
		 * @since 1.0.0
		 * */
		public static function getInstance(){
			if (null == self::$instance){
				self::$instance = new self();
			}
			return self::$instance;
		}
		
		/**
		 * execute cron job
         * @sicne 1.0.0
         * @modified 1.0.4
		 * */
		public function xgenious_cron_exec(){
			$query_args = array(
				'post_type' => 'download',
				'post_status' => 'publish',
				'posts_per_page' => -1
			);
			$all_products = new WP_Query($query_args);

			while ($all_products->have_posts()){
				$all_products->the_post();

                $post_id = get_the_ID();
                $envato_product_id = get_post_meta($post_id,'xgenious_envato_product_id',true);
                $updated_at = get_post_meta($post_id,'xgenious_updated_at',true);
                $edd_sales = get_post_meta($post_id,'_edd_download_sales',true);

                $get_extracted_purchase_data = $this->extract_product_info_from_envato($envato_product_id);
                $number_of_sales = property_exists($get_extracted_purchase_data,'number_of_sales') ? $get_extracted_purchase_data->number_of_sales : '';
                $en_updated_time = property_exists($get_extracted_purchase_data,'updated_at') ? $get_extracted_purchase_data->updated_at : '';

                //check sales increased or not decease
                if (!empty($number_of_sales) && $edd_sales <> $number_of_sales){
                    $this->update_sales_number($post_id,$number_of_sales);
                }

                //compare update date
                if (!empty($en_updated_time) && strtotime($updated_at) < strtotime($en_updated_time)){
                    $this->update_product_data($post_id,$get_extracted_purchase_data);
                }
			}
		}
		/**
		 * Cron Interval
		 *
		 * */
		public function xgenious_add_cron_interval( $schedules ) {
			$schedules['hourly'] = array(
				'interval' => 3600,
				'display'  => esc_html__( 'Every hour' ,'xgenious-master'),
			);

			return $schedules;
		}
		
        /**
         * update sales number
         * @since 1.0.4
         * */

        public function update_sales_number($post_id,$sales_number){
            update_post_meta($post_id,'_edd_download_sales',$sales_number);
        }

        /**
         * update product info after envato udpate
         * @since 1.0.4
         * */
        public function update_product_data($post_id,$updated_data){

            /**
             * insert basic product information
             * */
            $name = property_exists($updated_data,'name') ? $updated_data->name : '';
            $description = property_exists($updated_data,'name') ? $updated_data->description : '';
            wp_update_post($post_id,[
                'post_content' => $description,
                'post_title' => $name,
            ]);

            /**
             * update products tags
             * */
            $item_tags = property_exists($updated_data,'tags') ? $updated_data->tags : [];
            wp_set_object_terms($post_id,$item_tags,'download_tag');

            /**
             * grab thumbnail & cover photo from envato
             * and put them in database
             * */

            require_once(ABSPATH . 'wp-admin/includes/media.php');
            require_once(ABSPATH . 'wp-admin/includes/file.php');
            require_once(ABSPATH . 'wp-admin/includes/image.php');

            if (property_exists($updated_data,'previews') && !empty($post_id)){
                $preview_images = $updated_data->previews;
                //extract thumbnail from envato
                if (property_exists($preview_images,'icon_preview')){
                    $thumbnail_image_id = media_sideload_image($preview_images->icon_preview->icon_url, $post_id, $name,'id' );
                    $thumbnail_image_url = wp_get_attachment_image_src($thumbnail_image_id,'thumbnail');
                    if (is_array($thumbnail_image_url)){
                        //update data on database
                        update_post_meta($post_id,'xgenious_thumbnail',
                            array(
                                'id' => $thumbnail_image_id,
                                'url' => $thumbnail_image_url[0],
                                'thumbnail' => $thumbnail_image_url[0]
                            )
                        );
                    }
                }
                //extract cover photo from envato
                if (property_exists($preview_images,'landscape_preview')){
                    $featured_image_id = media_sideload_image($preview_images->landscape_preview->landscape_url,$post_id,$name,'id');
                    set_post_thumbnail( $post_id, $featured_image_id );
                }
            }
            /**
             *  Common Property with common order inter in meta data
             * */

            $xgenious_product_info = array(
                'rating' => property_exists($updated_data,'rating') ? $updated_data->rating : '',
                'rating_count' => property_exists($updated_data,'rating_count') ? $updated_data->rating_count : '',
                'updated_at' => property_exists($updated_data,'updated_at') ? $updated_data->updated_at : '',
                'item_url' => property_exists($updated_data,'url') ? $updated_data->url : ''
            );


            //update price
            if (!empty($post_id) && property_exists($updated_data,'price_cents')){
                update_post_meta($post_id,'edd_price', number_format($updated_data->price_cents / 100,2));
            }
            $cat_slug = [];
            $product_type = get_the_terms($post_id,'download_category');
            foreach ($product_type as $cat){
                array_push($cat_slug,$cat->slug);
            }
            if (in_array('laravel',$cat_slug) ){
                if (property_exists($updated_data,'attributes')) {
                    $item_attributes = $updated_data->attributes;

                    foreach ($item_attributes as $att) {
                        $attrb = (array)$att;
                        if (in_array('compatible-browsers', $attrb)) {
                            $xgenious_product_info['compatible_browsers'] = !empty($attrb['value']) ? implode(' , ', $attrb['value']) : '';

                        } else if (in_array('compatible-software', $attrb)) {
                            $xgenious_product_info['compatible-software'] = !empty($attrb['value']) ? implode(' , ', $attrb['value']) : '';

                        } else if (in_array('demo-url', $attrb)) {
                            $xgenious_product_info['demo_url'] = !empty($attrb['value']) ? $attrb['value'] : '';

                        } else if (in_array('high-resolution', $attrb)) {
                            $xgenious_product_info['high_resolution'] = !empty($attrb['value']) ? $attrb['value'] : '';

                        } else if (in_array('software-framework', $attrb)) {
                            $xgenious_product_info['software_framework'] = !empty($attrb['value']) ? implode(' , ', $attrb['value']) : '';

                        } else if (in_array('source-files-included', $attrb)) {
                            $xgenious_product_info['source-files-included'] = !empty($attrb['value']) ? implode(' , ', $attrb['value']) : '';

                        }
                    }
                }

            }elseif(in_array('wordpress-plugins',$cat_slug)){
                if (property_exists($updated_data,'attributes')) {
                    $item_attributes = $updated_data->attributes;
                    foreach ($item_attributes as $att){
                        $attrb = (array) $att;
                        if (in_array('compatible-browsers',$attrb)){
                            $xgenious_product_info['compatible_browsers'] = !empty($attrb['value']) ? implode(' , ',$attrb['value']) : '';

                        }
                        else if (in_array('compatible-software',$attrb)){
                            $xgenious_product_info['compatible-software'] = !empty($attrb['value']) ? implode(' , ',$attrb['value']) : '';

                        }else if (in_array('compatible-with',$attrb)){
                            $xgenious_product_info['compatible-with'] = !empty($attrb['value']) ? implode(' , ',$attrb['value']) : '';

                        }else if (in_array('demo-url',$attrb)){
                            $xgenious_product_info['demo_url'] = !empty($attrb['value']) ? $attrb['value'] : '';

                        }
                        else if (in_array('gutenberg-optimized',$attrb)){
                            $xgenious_product_info['gutenberg-optimized'] = !empty($attrb['value']) ? $attrb['value'] : '';

                        }
                        else if (in_array('high-resolution',$attrb)){
                            $xgenious_product_info['high_resolution'] = !empty($attrb['value']) ? $attrb['value'] : '';

                        }else if (in_array('source-files-included',$attrb)){
                            $xgenious_product_info['source-files-included'] = !empty($attrb['value']) ? implode(' , ',$attrb['value']) : '';

                        }
                    }
                }

            }elseif (in_array('css-elements',$cat_slug)){

                if (property_exists($updated_data,'attributes')) {
                    $item_attributes = $updated_data->attributes;
                    foreach ($item_attributes as $att){
                        $attrb = (array) $att;
                        if (in_array('compatible-browsers',$attrb)){
                            $xgenious_product_info['compatible_browsers'] = !empty($attrb['value']) ? implode(' , ',$attrb['value']) : '';

                        }
                        else if (in_array('compatible-software',$attrb)){
                            $xgenious_product_info['compatible-software'] = !empty($attrb['value']) ? implode(' , ',$attrb['value']) : '';

                        }else if (in_array('demo-url',$attrb)){
                            $xgenious_product_info['demo_url'] = !empty($attrb['value']) ? $attrb['value'] : '';

                        }
                        else if (in_array('high-resolution',$attrb)){
                            $xgenious_product_info['high_resolution'] = !empty($attrb['value']) ? $attrb['value'] : '';

                        }else if (in_array('source-files-included',$attrb)){
                            $xgenious_product_info['source-files-included'] = !empty($attrb['value']) ? implode(' , ',$attrb['value']) : '';

                        }
                    }
                }

            }

            if (!empty($post_id)){
                foreach ($xgenious_product_info as $key => $value){
                    update_post_meta($post_id,'xgenious_'.$key,$value );
                }
            }
        }


        /**
		 * extract product from envato by product id
		 * @since 1.0.0
		 * */
		public function extract_product_info_from_envato($product_id){

			$query_args = http_build_query(['id' => $product_id]);
			$response = wp_remote_get($this->envato_api_base."/catalog/item?".$query_args,array(
				'headers' => [
					'User-Agent'=> $_SERVER['HTTP_USER_AGENT'],
					'Authorization'=> 'Bearer '. cs_get_option('envato_api_token')
				],
				'timeout' => 120
			));
			if (is_array($response) && !is_wp_error($response)){
				$body = json_decode($response['body']);
				return $body;
			}
			die();
		}

	}//end class
	if ( class_exists('Xgenious_Cron_Job')){
		Xgenious_Cron_Job::getInstance();
	}
}