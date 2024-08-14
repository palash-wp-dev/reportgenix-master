<?php

/**
 * Author Xgenious
 * @since 1.0.0
 * */

if (!defined('ABSPATH')) {
    exit(); //exit if access directly
}
if (!class_exists('Xgenious_Master_Ajax_Request')) {

    class Xgenious_Master_Ajax_Request
    {
        private static $instance;

        public function __construct()
        {
	        add_action('wp_ajax_duplicate_wedocs', array($this, 'wedoc_duplicate'));


            add_action('wp_ajax_wedoc_search_form_ajax', array($this, 'wedoc_search'));
            add_action('wp_ajax_nopriv_wedoc_search_form_ajax', array($this, 'wedoc_search'));
            /*---------------------------------------
                Single page search ajax request
            ----------------------------------------*/
            add_action('wp_ajax_wedoc_single_search_form_ajax', array($this, 'wedoc_single_page_search'));
            add_action('wp_ajax_nopriv_wedoc_single_search_form_ajax', array($this, 'wedoc_single_page_search'));
        }

        /**
         * get Instance
         * @since 1.0.0
         * */
        public static function getInstance()
        {
            if (null == self::$instance) {
                self::$instance = new self();
            }
            return self::$instance;
        }

        public function wedoc_duplicate(){
	        if ($_POST['action'] !== 'duplicate_wedocs') {
		        return;
	        }
	        $docId = $_POST['doc_id'] ?? '';
	        $doc_text = $_POST['doc_text'] ? sanitize_text_field($_POST['doc_text']) : 'untitled';
			$doc_details = get_post($docId);
	        $new_parent_id = '';
			if (!empty($doc_details)){
				$new_parent_id = wp_insert_post( [
			        'post_title'  => $doc_text,
			        'post_content' => $doc_details->post_content,
			        'post_type'   => 'docs',
			        'post_status' => 'publish',
			        'post_parent' => 0,
			        'post_author' => get_current_user_id(),
			        'menu_order'  => 0,
		        ] );
			}
	       if ( is_wp_error( $new_parent_id ) ) {
		        wp_send_json_error();
	        }

	        $doc_sections = get_children($doc_details->ID);

	        foreach($doc_sections as $section){
	        	//insert data to db
		    $section_id = wp_insert_post( [
		        'post_title'  => $section->post_title,
		        'post_type'   => 'docs',
		        'post_status' => 'publish',
		        'post_content' => $section->post_content,
		        'post_parent' => $new_parent_id,
		        'post_author' => get_current_user_id(),
		        'menu_order'  => $section->menu_order,
	        ] );
			$get_articles = get_children($section->ID);
	        	//loop for children
				foreach($get_articles as $article){
					wp_insert_post( [
						'post_title'  => $article->post_title,
						'post_type'   => 'docs',
						'post_status' => 'publish',
						'post_content' => $article->post_content,
						'post_parent' => $section_id,
						'post_author' => get_current_user_id(),
						'menu_order'  => $article->menu_order,
					] );
				}
	        }

        	wp_send_json($doc_sections);
        	die();
        }

	/**
	 *
	 * wedocs doc page search
	 * */
        public function wedoc_search()
        {
            if ($_POST['action'] !== 'wedoc_search_form_ajax') {
                return;
            }

            $query_args = [
                'post_type' => 'docs',
                'posts_per_page' => -1,
                'orderby' => 'menu_order',
                'ignore_sticky_posts' => false,
                's' => strip_tags(trim($_POST['q'])),
                'sentence' => true,
                'parent' => 0
            ];
            $queried_doc = new \WP_Query($query_args);

            $output = '';
            $docs = [];
            while ($queried_doc->have_posts()) {
                $queried_doc->the_post();

                // arrange the docs
                $sections = get_children([
                    'post_parent' => get_the_ID(),
                    'post_type' => 'docs',
                    'post_status' => 'publish',
                    'orderby' => 'menu_order',
                    'order' => 'ASC',
                ]);

                $arranged[] = [
                    'doc' => [
                        'title' => get_the_title(),
                        'id' => get_the_ID()
                    ],
                    'sections' => $sections,
                ];

                $docs = $arranged;
            }
            wp_reset_postdata();

            if ($docs) {
                foreach ($docs as $main_doc){
                    $output .= '<div class="wedoc-single-search-item">';
                    $output .= '<h4 class="title"><a href="' . esc_url(get_permalink($main_doc['doc']['id'])) . '">' . esc_html($main_doc['doc']['title']) . '</a></h4>';
                    if ($main_doc['sections']) {
                        $output .= ' <ul class="wedoc-seclist">';
                        foreach ($main_doc['sections'] as $section) {
                            $output .= '<li class="wedoc-sec-item"><a href="' . get_the_permalink($section->ID) . '">' . esc_html($section->post_title) . '</a></li>';
                        }
                        $output .= '</ul>';
                    }

                    $output .= '</div>';
                }
            }

            echo $output;
            die();
        }
     /**
      * weDocs single page search page
      * @since 1.0.0
      * */
	public function wedoc_single_page_search(){
		if ($_POST['action'] !== 'wedoc_single_search_form_ajax') {
		 return;
		}
		$parent_id = $_POST['parent_id'] ?? '';
		
		$query_args = [
			'post_type' => 'docs',
			'posts_per_page' => -1,
			'orderby' => 'menu_order',
			'ignore_sticky_posts' => false,
			'sentence' => true,
			'post_parent' =>  $parent_id,
		];
		
		$queried_doc = new \WP_Query($query_args);
		$output = '';
		$docs = [];
		$sections = [];
		
		while ($queried_doc->have_posts()) {
			$queried_doc->the_post();

    			
			$section_args = [
				'post_type' => 'docs',
				'posts_per_page' => -1,
				'orderby' => 'menu_order',
				'ignore_sticky_posts' => false,
				's' => strip_tags(trim($_POST['q'])),
				'sentence' => false,
				'post_parent' => get_the_ID()
			];
			
			$sections_query = new \WP_Query($section_args);
			$inner_section = 0;
		    while ($sections_query->have_posts()){
				$sections_query->the_post();
				$inner_section++;
				$sections[] = [
				        'post_title' => get_the_title(),
				        'ID' => get_the_ID(),
				    ];
			}
			if($inner_section > 1){
			    	$arranged[] = [
					'doc'      => [
						'title' => get_the_title(),
						'id'    => get_the_ID()
					],
					'sections' => $sections,
				];
				$docs = $arranged;
			}
		
		}
		wp_reset_postdata();
		
		$docs = array_unique($docs,SORT_STRING);
		if ($docs) {
			foreach ($docs as $main_doc){
				$output .= '<div class="wedoc-single-search-item">';
				if ($main_doc['sections']) {
					$output .= ' <ul class="wedoc-seclist">';
					if ($parent_id){
						$output .= '<h4 class="title"><a href="' . esc_url(get_permalink($parent_id)) . '">' . esc_html(get_the_title($parent_id)) . '</a></h4>';
					}
					foreach ($main_doc['sections'] as $section) {
						$output .= '<li class="wedoc-sec-item"><a  href="' . get_the_permalink($section['ID']) . '">' . esc_html($section['post_title']) . '</a></li>';
					}
					$output .= '</ul>';
				}

				$output .= '</div>';
			}
		}

		echo $output;
		die();
	}


    }//end class

}
if (class_exists('Xgenious_Master_Ajax_Request')) {
    Xgenious_Master_Ajax_Request::getInstance();
}