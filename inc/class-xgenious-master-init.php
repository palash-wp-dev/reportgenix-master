<?php
/**
 * @package Xgenious
 * @author Ir-Tech
 */
if (!defined("ABSPATH")) {
    exit(); //exit if access directly
}

if (!class_exists('Xgenious_Shortcodes')) {

    class Xgenious_Shortcodes
    {
        /*
        * $instance
        * @since 1.0.0
        * */
        protected static $instance;

        public function __construct()
        {
        	//Load plugin assets
	        add_action('wp_enqueue_scripts',array($this,'plugin_assets'));
        	//Load plugin admin assets
	        add_action('admin_enqueue_scripts',array($this,'admin_assets'));
        	//load plugin text domain
	        add_action('init',array($this,'load_textdomain'));
            add_action('plugins_loaded',array($this,'load_plugin_dependency_files'));
	        //load plugin dependency files()
        }

        /**
         * getInstance()
         * */
        public static function getInstance()
        {
            if (null == self::$instance) {
                self::$instance = new self();
            }
            return self::$instance;
        }

		/**
		 * Load Plugin Text domain
		 * @since 1.0.0
		 * */
		public function load_textdomain(){
			load_plugin_textdomain('xgenious-master',false,XGENIOUS_MASTER_ROOT_PATH .'/languages');
		}

		/**
		 * load plugin dependency files()
		 * @since 1.0.0
		 * */
		public function load_plugin_dependency_files(){
			$includes_files = array(
				array(
					'file-name' => 'codestar-framework',
					'folder-name' => XGENIOUS_MASTER_LIB .'/codestar-framework'
				),
				array(
					'file-name' => 'class-menu-page',
					'folder-name' => XGENIOUS_MASTER_ADMIN
				),
				array(
					'file-name' => 'class-custom-post-type',
					'folder-name' => XGENIOUS_MASTER_ADMIN
				),
				array(
					'file-name' => 'class-post-column-customize',
					'folder-name' => XGENIOUS_MASTER_ADMIN
				),
				array(
					'file-name' => 'class-xgenious-excerpt',
					'folder-name' => XGENIOUS_MASTER_INC
				),
				array(
					'file-name' => 'class-envato',
					'folder-name' => XGENIOUS_MASTER_INC
				),
				array(
					'file-name' => 'class-xgenious-shortcodes',
					'folder-name' => XGENIOUS_MASTER_INC
				),
				array(
					'file-name' => 'class-elementor-widget-init',
					'folder-name' => XGENIOUS_MASTER_ELEMENTOR
				),
				array(
					'file-name' => 'class-about-us-widget',
					'folder-name' => XGENIOUS_MASTER_WP_WIDGETS
				),
                array(
                    'file-name' => 'class-popular-categories-widget',
                    'folder-name' => XGENIOUS_MASTER_WP_WIDGETS
                ),
                array(
                    'file-name' => 'class-all-tags-widget',
                    'folder-name' => XGENIOUS_MASTER_WP_WIDGETS
                ),
				array(
					'file-name' => 'class-about-us-two-widget',
					'folder-name' => XGENIOUS_MASTER_WP_WIDGETS
				),
				array(
					'file-name' => 'class-recent-post-widget',
					'folder-name' => XGENIOUS_MASTER_WP_WIDGETS
				),
				array(
					'file-name' => 'class-contact-info-widget',
					'folder-name' => XGENIOUS_MASTER_WP_WIDGETS
				),
				array(
					'file-name' => 'class-link-list-widget',
					'folder-name' => XGENIOUS_MASTER_WP_WIDGETS
				),
				array(
					'file-name' => 'class-cron-job',
					'folder-name' => XGENIOUS_MASTER_INC
				),
				array(
					'file-name' => 'class-xgenious-login',
					'folder-name' => XGENIOUS_MASTER_INC
				),
                array(
					'file-name' => 'ajax-request',
					'folder-name' => XGENIOUS_MASTER_INC
				),
			);

			if (is_array($includes_files) && !empty($includes_files)){
				foreach ($includes_files as $file){
					if (file_exists($file['folder-name'].'/'.$file['file-name'].'.php')){
						require_once $file['folder-name'].'/'.$file['file-name'].'.php';
					}
				}
			}
		}

		/**
		 * admin assets
		 * @since 1.0.0
		 * */
		public function plugin_assets(){
			$this->load_plugin_css_files();
			$this->load_plugin_js_files();
		}

	    /**
	     * load plugin css files()
	     * @since 1.0.0
	     * */
	    public function load_plugin_css_files(){
		    $plugin_version = XGENIOUS_MASTER_VERSION;
		    $all_css_files = array(
			    array(
				    'handle' => 'bootstrap-5',
				    'src' => XGENIOUS_MASTER_CSS .'/bootstrap-5.min.css',
				    'deps' => array(),
				    'ver' => $plugin_version,
				    'media' => 'all'
			    ),
				array(
				    'handle' => 'owl-carousel',
				    'src' => XGENIOUS_MASTER_CSS .'/owl.carousel.min.css',
				    'deps' => array(),
				    'ver' => $plugin_version,
				    'media' => 'all'
			    ),
                array(
                    'handle' => 'xgenious-wedoc-style',
                    'src' => XGENIOUS_MASTER_CSS .'/wedocs.css',
                    'deps' => array(),
                    'ver' => $plugin_version,
                    'media' => 'all'
                ),
                array(
                    'handle' => 'slick',
                    'src' => XGENIOUS_MASTER_CSS .'/slick.css',
                    'deps' => array(),
                    'ver' => $plugin_version,
                    'media' => 'all'
                ),
			    array(
				    'handle' => 'xgenious-font-awesome-font',
				    'src' => XGENIOUS_MASTER_CSS .'/all.min.css',
				    'deps' => array(),
				    'ver' => $plugin_version,
				    'media' => 'all'
				),
			    array(
				    'handle' => 'xgenious-odometer-counter',
				    'src' => XGENIOUS_MASTER_CSS .'/odometer.css',
				    'deps' => array(),
				    'ver' => $plugin_version,
				    'media' => 'all'
				),
			    array(
				    'handle' => 'xgenious-master-main-style',
				    'src' => XGENIOUS_MASTER_CSS .'/main-style.css',
				    'deps' => array(),
				    'ver' => $plugin_version,
				    'media' => 'all'
				),
				array(
				    'handle' => 'xgenious-new-style',
				    'src' => XGENIOUS_MASTER_CSS .'/xgenious-new.css',
				    'deps' => array(),
				    'ver' => $plugin_version,
				    'media' => 'all'
			    ),
				
				array(
				    'handle' => 'animate-css',
				    'src' => XGENIOUS_MASTER_CSS .'/animate-4.1.1.css',
				    'deps' => array(),
				    'ver' => $plugin_version,
				    'media' => 'all'
			    ),
				array(
				    'handle' => 'reportgenix-new-style',
				    'src' => XGENIOUS_MASTER_CSS .'/report-landing.css',
				    'deps' => array(),
				    'ver' => $plugin_version,
				    'media' => 'all'
			    ),
		    );

		    $all_css_files = apply_filters('xgenious_master_css',$all_css_files);

		    if (is_array($all_css_files) && !empty($all_css_files)){
			    foreach ($all_css_files as $css){
				    call_user_func_array('wp_enqueue_style',$css);
			    }
		    }

	    }

	    /**
	     * load plugin js
	     * @since 1.0.0
	     * */
	    public function load_plugin_js_files(){
		    $plugin_version = XGENIOUS_MASTER_VERSION;
		    $all_js_files = array(
			    // array(
				//     'handle' => 'bootstrap-5',
				//     'src' => XGENIOUS_MASTER_JS .'/bootstrap-5.bundle.min.js',
				//     'deps' => array('jquery'),
				//     'ver' => $plugin_version,
				//     'args' => [
				//          'in_footer' => true
				//    ]
			    // ),
				array(
				    'handle' => 'waypoints',
				    'src' => XGENIOUS_MASTER_JS .'/waypoints.min.js',
				    'deps' => array('jquery'),
				    'ver' => $plugin_version,
				    'args' => [
				         'in_footer' => true
				   ]
			    ),
			    array(
				    'handle' => 'counterup',
				    'src' => XGENIOUS_MASTER_JS .'/jquery.counterup.min.js',
				    'deps' => array('jquery'),
				    'ver' => $plugin_version,
				    'args' => [
				         'in_footer' => true
				   ]
			    ),
			    array(
				    'handle' => 'owl-carousel',
				    'src' => XGENIOUS_MASTER_JS .'/owl.carousel.min.js',
				    'deps' => array('jquery'),
				    'ver' => $plugin_version,
				    'args' => [
				         'in_footer' => true
				   ]
			    ),
				array(
				    'handle' => 'imagesLoaded',
				    'src' => XGENIOUS_MASTER_JS .'/imagesloaded.min.js',
				    'deps' => array('jquery'),
				    'ver' => $plugin_version,
				    'args' => [
				         'in_footer' => true
				   ]
			    ),
				array(
				    'handle' => 'isotope',
				    'src' => XGENIOUS_MASTER_JS .'/isotope.pkgd.min.js',
				    'deps' => array('jquery'),
				    'ver' => $plugin_version,
				    'args' => [
				         'in_footer' => true
				   ]
			    ),
                array(
                    'handle' => 'slick',
                    'src' => XGENIOUS_MASTER_JS .'/slick.js',
                    'deps' => array('jquery'),
                    'ver' => $plugin_version,
                    'args' => [
                        'in_footer' => true
                    ]
                ),
			    array(
				    'handle' => 'xgenious-master-main-script',
				    'src' => XGENIOUS_MASTER_JS .'/main.js',
				    'deps' => array('jquery'),
				    'ver' => $plugin_version,
				    'args' => [
				         'in_footer' => true
				   ]
			    ),
			    array(
				    'handle' => 'xgenious-master-odometer',
				    'src' => XGENIOUS_MASTER_JS .'/odometer.js',
				    'deps' => array('jquery'),
				    'ver' => $plugin_version,
				    'args' => [
				         'in_footer' => true
				   ]
			    ),
			    array(
				    'handle' => 'xgenious-master-viewport',
				    'src' => XGENIOUS_MASTER_JS .'/viewport.jquery.js',
				    'deps' => array('jquery'),
				    'ver' => $plugin_version,
				    'args' => [
				         'in_footer' => true
				   ]
			    ),
			    array(
				    'handle' => 'xgenious-master-xgenious-new-script',
				    'src' => XGENIOUS_MASTER_JS .'/xgenious-new.js',
				    'deps' => array('jquery'),
				    'ver' => $plugin_version,
				    'args' => [
				         'in_footer' => true
				   ]
			    ),
			    array(
				    'handle' => 'xgenious-master-reportgenix-new-script',
				    'src' => XGENIOUS_MASTER_JS .'/reportgenix-new.js',
				    'deps' => array('jquery'),
				    'ver' => $plugin_version,
				    'args' => [
				         'in_footer' => true
				   ]
			    ),
		    );

		    $all_js_files = apply_filters('xgenious_master_js',$all_js_files);


		    if (is_array($all_js_files) && !empty($all_js_files)){
			    foreach ($all_js_files as $js){
				    call_user_func_array('wp_enqueue_script',$js);
			    }
		    }
            wp_localize_script('xgenious-master-main-script','xgObj',[
                'ajaxUrl' =>  admin_url('admin-ajax.php')
            ]);

        }

		/**
		 * admin assets
		 * @since 1.0.0
		 * */
		public function admin_assets(){
			self::load_admin_css_files();
			self::load_admin_js_files();
		}

		/**
		 * load plugin admin css files()
		 * @since 1.0.0
		 * */
		public function load_admin_css_files(){
			$plugin_version = XGENIOUS_MASTER_VERSION;
			$all_css_files = array(
				array(
					'handle' => 'xgenious-master-admin-style',
					'src' => XGENIOUS_MASTER_ADMIN_ASSETS .'/css/admin.css',
					'deps' => array(),
					'ver' => $plugin_version,
					'media' => 'all'
				)
			);

			$all_css_files = apply_filters('xgenious_admin_css',$all_css_files);
			if (is_array($all_css_files) && !empty($all_css_files)){
				foreach ($all_css_files as $css){
					call_user_func_array('wp_enqueue_style',$css);
				}
			}
		}

		/**
		 * load plugin admin js
		 * @since 1.0.0
		 * */
		public function load_admin_js_files(){
			$plugin_version = XGENIOUS_MASTER_VERSION;
			$all_js_files = array(
				array(
					'handle' => 'xgenious-master-widget',
					'src' => XGENIOUS_MASTER_ADMIN_ASSETS .'/js/widget.js',
					'deps' => array('jquery'),
					'ver' => $plugin_version,
					'args' => [
				         'in_footer' => true
				   ]
				),
				array(
					'handle' => 'xgenious-master-admin',
					'src' => XGENIOUS_MASTER_ADMIN_ASSETS .'/js/admin.js',
					'deps' => array('jquery'),
					'ver' => $plugin_version,
					'args' => [
				         'in_footer' => true
				   ]
				),
			);

			$all_js_files = apply_filters('xgenious_admin_js',$all_js_files);
			if (is_array($all_js_files) && !empty($all_js_files)){
				foreach ($all_js_files as $js){
					call_user_func_array('wp_enqueue_script',$js);
				}
			}
			wp_localize_script('xgenious-master-admin','xgJS',[
				'ajaxUrl' => admin_url('admin-ajax.php')
			]);
		}


    }//end class
    if (class_exists('Xgenious_Shortcodes')){
	    Xgenious_Shortcodes::getInstance();
    }
}

