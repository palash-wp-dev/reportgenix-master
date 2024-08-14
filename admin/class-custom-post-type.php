<?php

/**
 * All Custom Post Type
 * Author Xgenious
 * @since 1.0.0
 * */

if (!defined('ABSPATH')){
	exit(); //exit if access directly
}

if (!class_exists('Xgenious_Custom_Post_Type')){
	class Xgenious_Custom_Post_Type{

		//$instance variable
		private static $instance;
		
		public function __construct() {
			//
			add_action('init',array($this,'register_custom_post_type'));

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
		 * Register Custom Post Type
		 * @since 1.0.0
		 * */
		public function register_custom_post_type(){
			$all_post_type = array(
                array(
			        'post_type' => 'megamenu',
			        'args' => array(
			            'label' => esc_html__('EL Template','xgenious-master'),
			            'description' => esc_html__('EL Template','xp-tabs'),
			            'labels' => array(
			                'name'                => esc_html_x( 'EL Template', 'Post Type General Name', 'xgenious-master' ),
			                'singular_name'       => esc_html_x( 'EL Template', 'Post Type Singular Name', 'xgenious-master' ),
			                'menu_name'           => esc_html__( 'EL Template', 'xgenious-master' ),
			                'all_items'           => esc_html__( 'All EL Template', 'xgenious-master' ),
			                'view_item'           => esc_html__( 'View EL Template', 'xgenious-master' ),
			                'add_new_item'        => esc_html__( 'Add New EL Template', 'xgenious-master' ),
			                'add_new'             => esc_html__( 'Add New', 'xgenious-master' ),
			                'edit_item'           => esc_html__( 'Edit EL Template', 'xgenious-master'),
			                'update_item'         => esc_html__( 'Update EL Template', 'xgenious-master' ),
			                'search_items'        => esc_html__( 'Search EL Template', 'xgenious-master' ),
			                'not_found'           => esc_html__( 'Not Found', 'xgenious-master' ),
			                'not_found_in_trash'  => esc_html__( 'Not found in Trash', 'xgenious-master' ),
			                "featured_image" => esc_html__('EL Template Image','xgenious-master'),
			                'set_featured_image' => esc_html__('Set EL Template Image'),
			                'remove_featured_image' => esc_html__('Remove EL Template Image'),
			            ),
			            'supports' => array('title'),
			            'hierarchical'        => false,
			            'public'              => true,
			            "publicly_queryable" => true,
			            'show_ui'             => true,
			            'show_in_menu'        => 'xgenious_theme_options',
			            'can_export'          => true,
			            'capability_type'     => 'page',
			            'query_var' => true
			        )
			    ),
			);

			    if ( !empty($all_post_type) && is_array($all_post_type) ){

				    foreach ( $all_post_type as $post_type ){
				        call_user_func_array('register_post_type',$post_type);
				    }

				}

			//flush_rewrite_rules()
			flush_rewrite_rules();
		}


	}//end class
	if ( class_exists('Xgenious_Custom_Post_Type')){
		Xgenious_Custom_Post_Type::getInstance();
	}
}