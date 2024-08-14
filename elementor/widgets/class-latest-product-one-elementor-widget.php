<?php
/**
 * Elementor Widget
 * @package Appside
 * @since 1.0.0
 */

namespace Elementor;
class Xgenious_Latest_Product_Grid_One_Widget extends Widget_Base {

	/**
	 * Get widget name.
	 *
	 * Retrieve Elementor widget name.
	 *
	 * @return string Widget name.
	 * @since 1.0.0
	 * @access public
	 *
	 */
	public function get_name() {
		return 'xgenious-latest-product-one-widget';
	}

	/**
	 * Get widget title.
	 *
	 * Retrieve Elementor widget title.
	 *
	 * @return string Widget title.
	 * @since 1.0.0
	 * @access public
	 *
	 */
	public function get_title() {
		return esc_html__( 'Latest Product Grid', 'xgenious-master' );
	}

	/**
	 * Get widget icon.
	 *
	 * Retrieve Elementor widget icon.
	 *
	 * @return string Widget icon.
	 * @since 1.0.0
	 * @access public
	 *
	 */
	public function get_icon() {
		return ' eicon-image-box';
	}

	/**
	 * Get widget categories.
	 *
	 * Retrieve the list of categories the Elementor widget belongs to.
	 *
	 * @return array Widget categories.
	 * @since 1.0.0
	 * @access public
	 *
	 */
	public function get_categories() {
		return [ 'xgenious_widgets' ];
	}

	/**
	 * Register Elementor widget controls.
	 *
	 * Adds different input fields to allow the user to change and customize the widget settings.
	 *
	 * @since 1.0.0
	 * @access protected
	 */
	protected function register_controls() {

		$this->start_controls_section(
			'settings_section',
			[
				'label' => esc_html__( 'General Settings', 'xgenious-master' ),
				'tab'   => Controls_Manager::TAB_CONTENT,
			]
		);
		$this->add_control( 'total', [
			'label'       => esc_html__( 'Total Posts', 'xgenious-master' ),
			'type'        => Controls_Manager::TEXT,
			'default'     => '-1',
			'description' => esc_html__( 'enter how many post you want in masonry , enter -1 for unlimited post.' )
		] );
		$this->add_control( 'category', [
			'label'       => esc_html__( 'Category', 'xgenious-master' ),
			'type'        => Controls_Manager::SELECT2,
			'options'     => Xgenious()->get_terms_names( 'download_category', 'id' ),
		] );
		$this->add_control( 'order', [
			'label'       => esc_html__( 'Order', 'xgenious-master' ),
			'type'        => Controls_Manager::SELECT,
			'options'     => array(
				'ASC'  => esc_html__( 'Ascending', 'xgenious-master' ),
				'DESC' => esc_html__( 'Descending', 'xgenious-master' ),
			),
			'default'     => 'ASC',
			'description' => esc_html__( 'select order', 'xgenious-master' )
		] );
		$this->add_control( 'orderby', [
			'label'       => esc_html__( 'OrderBy', 'xgenious-master' ),
			'type'        => Controls_Manager::SELECT,
			'options'     => array(
				'ID'            => esc_html__( 'ID', 'xgenious-master' ),
				'title'         => esc_html__( 'Title', 'xgenious-master' ),
				'date'          => esc_html__( 'Date', 'xgenious-master' ),
				'rand'          => esc_html__( 'Random', 'xgenious-master' ),
				'comment_count' => esc_html__( 'Most Comments', 'xgenious-master' ),
			),
			'default'     => 'ID',
			'description' => esc_html__( 'select order', 'xgenious-master' )
		] );
		$this->end_controls_section();


	}

	/**
	 * Render Elementor widget output on the frontend.
	 * Written in PHP and used to generate the final HTML.
	 *
	 * @since 1.0.0
	 * @access protected
	 */
	protected function render() {
		$settings             = $this->get_settings_for_display();
        //query settings
		$total_posts = $settings['total'];
		$category    = $settings['category'];
		$order       = $settings['order'];
		$orderby     = $settings['orderby'];

		//setup query
		$args = array(
			'post_type' => 'download',
			'posts_per_page' => $total_posts,
			'order' => $order,
			'orderby' => $orderby,
			'post_status' => 'publish',
			'ignore_sticky_posts' => 1,
		);

		if (!empty($category)) {
			$args['tax_query'] = array(
				array(
					'taxonomy' => 'download_category',
					'field' => 'term_id',
					'terms' => $category
				)
			);
		}
		$post_data = new \WP_Query($args);
		?>
        <div class="latest-product-grid-wrapper">
            <ul class="latest-product-list-wrap">
				<?php
                    while ($post_data->have_posts()):$post_data->the_post();
	                    $xgenious = Xgenious();
	                    $img_id = get_post_thumbnail_id(get_the_ID()) ? get_post_thumbnail_id(get_the_ID()) : false ;
	                    $envato_item_id = get_post_meta(get_the_ID(),'xgenious_envato_product_id',true);
	                    $img_url_val = $img_id ? wp_get_attachment_image_src($img_id,'full',false) : '';
	                    
	                    $img_url = is_array($img_url_val) && !empty($img_url_val) ? $img_url_val[0] : '';
	                    $img_alt =  $img_id ? get_post_meta($img_id,'_wp_attachment_image_alt',true) : '';

						//download metabox
	                    $_cut_price = get_post_meta(get_the_ID(),'xgenious_cut_price',true);

	                    //product thumbnail
                        $product_thumbnail_id = get_post_meta(get_the_ID(),'xgenious_thumbnail',true);
	                    $product_img_url_val = is_array($product_thumbnail_id) && !empty($product_thumbnail_id['id']) ? wp_get_attachment_image_src($product_thumbnail_id['id'],'full',false) : '';
	                    $product_img_url =  !empty($product_img_url_val) ? $product_img_url_val[0] : '';
	                    $product_img_alt =   is_array($product_thumbnail_id) && !empty($product_thumbnail_id['id']) ? get_post_meta($product_thumbnail_id['id'],'_wp_attachment_image_alt',true) : '';
	                    
	                  
	                    if($product_img_url == '' && !empty($envato_item_id)){
	                       // echo 'inside condition';
	                        $thumbanil_image_id = \Xgenious_Envato::get_product_thumbnail_by_id($envato_item_id,get_the_ID());
	                        $thumbnail_image_url = wp_get_attachment_image_src($thumbanil_image_id,'thumbnail');
	                        if(!empty($thumbnail_image_url)){
	                            update_post_meta(get_the_ID(),'xgenious_thumbnail',[
	                                'id' => $thumbanil_image_id,
            						'url' => $thumbnail_image_url[0],
            						'thumbnail' => $thumbnail_image_url[0]
	                            ] );
	                            $product_img_url_val = !empty($thumbanil_image_id) ? wp_get_attachment_image_src($thumbanil_image_id,'full',false) : '';
	                            $product_img_url = $product_img_url_val && isset($product_thumbnail_id['id']) ? $product_img_url_val[0] : '';
	                            $product_img_alt =  $product_img_url_val && isset($product_thumbnail_id['id'])  ? get_post_meta($product_thumbnail_id['id'],'_wp_attachment_image_alt',true) : '';
	                        }
	                    }

	                    $all_category = wp_get_post_terms( get_the_ID(), 'download_category' );
	                    $category_name = '';
	                    foreach ( $all_category as $cat ) {
		                    $category_name .= $cat->name.' ';
	                    }
                        $price =  get_post_meta(get_the_ID(),'edd_price',true);
                        
                        if(empty($price) && !empty($envato_item_id)){
                            $price = \Xgenious_Envato::get_product_price_by_id($envato_item_id);
                            add_post_meta(get_the_ID(),'edd_price', $price);
                        }
                        $price_markup = edd_currency_symbol().number_format((float)$price,0);
	                    ?>
                        <li class="single-latest-grid-item"
                        data-title="<?php the_title()?>"
                        data-category="<?php echo $category_name; ?>"
                        data-price="<?php echo esc_attr($price_markup);?>"
                        data-thumbnailUrl="<?php echo esc_url($img_url);?>"
                        data-thumbnailAlt="<?php echo esc_url($img_alt);?>"
                        >
                        <div class="thumbnail-wrapper">
                            <a href="<?php the_permalink();?>" title="<?php echo esc_attr(get_the_title());?>">
                                <?php if(!empty($product_img_url)):?>
                                <img src="<?php echo esc_url($product_img_url);?>" alt="<?php echo esc_attr(get_the_title());?>">
                                <?php else:?>
                                <div class="image-placeholder">
                                    <span><?php 
                                    $get_title = get_the_title();
                                    $explode = explode(' ',trim($get_title));
                                    $title = !empty($explode) ? $explode[0] : 'N';
                                    echo $title;
                                    ?></span>
                                </div>
                                <?php endif;?>
                            </a>
                        </div>
                    </li>
				<?php
                    endwhile;
				    wp_reset_query();
				?>
            </ul>
        </div>
		<?php
	}
}

Plugin::instance()->widgets_manager->register( new Xgenious_Latest_Product_Grid_One_Widget() );