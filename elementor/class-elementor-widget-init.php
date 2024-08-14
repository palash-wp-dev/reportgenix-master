<?php
/**
 * All Elementor widget init
 * @package Xgenious
 * @since 1.0.0
 */

if ( !defined('ABSPATH') ){
	exit(); // exit if access directly
}


if ( !class_exists('Xgenious_Elementor_Widget_Init') ){

	class Xgenious_Elementor_Widget_Init{
		/*
		* $instance
		* @since 1.0.0
		* */
		private static $instance;
		/*
		* construct()
		* @since 1.0.0
		* */
		public function __construct() {
			add_action( 'elementor/elements/categories_registered', array($this,'_widget_categories') );
			//elementor widget registered
			add_action('elementor/widgets/register',array($this,'___new_widget_registered'));
			add_action('elementor/widgets/register',array($this,'___reportgenix_widget_registered'));
			add_action('elementor/widgets/register',array($this,'_widget_registered'));
			add_action('elementor/widgets/register',array($this,'nazmart_widget_registered'));
			add_action('elementor/widgets/register',array($this,'fundorex_widget_registered'));
			add_action('elementor/widgets/register',array($this,'black_friday_widget_registered'));
			add_action('elementor/widgets/register',array($this,'xilancer_widget_registered'));
		}
		/*
	   * getInstance()
	   * @since 1.0.0
	   * */
		public static function getInstance(){
			if ( null == self::$instance ){
				self::$instance = new self();
			}
			return self::$instance;
		}
		/**
		 * _widget_categories()
		 * @since 1.0.0
		 * */
		public function _widget_categories($elements_manager){
			$elements_manager->add_category(
				'xgenious_widgets',
				[
					'title' => __( 'Xgenious Widgets', 'xgenious-master' ),
					'icon' => 'fa fa-plug',
				]
			);
			$elements_manager->add_category(
				'xgenious_widgets_new',
				[
					'title' => __( 'New Xgenious Widgets', 'xgenious-master' ),
					'icon' => 'fa fa-plug',
				]
			);
			$elements_manager->add_category(
				'xgenious_widgets_reportgenix',
				[
					'title' => __( 'Reportgenix Widgets', 'xgenious-master' ),
					'icon' => 'fa fa-plug',
				]
			);
		
		}

		/**
		 * _widget_registered()
		 * @since 1.0.0
		 * */
		public function _widget_registered(){
			if( !class_exists('Elementor\Widget_Base') ){
				return;
			}
			$elementor_widgets = array(
				'accordion',
				'accordion-two',
				'accordion-three',
				'header-one',
				'product-grid-one',
				'latest-product-one',
				'counterup-one',
				'testimonial-one',
				'image-box-one',
				'info-box-two',
				'wedoc-grid-one',
				'wedoc-search-one',
				'section-title-one',
				'featured-product-one',
				'whyus-one',
				'we-avialble-one',
				'blog-grid-one',
				'contact-one',
				'contact-two',
				'newsletter-one',
				'aboutus-area-one',
				'we-are-available-two',
				'life-at-xgenious-one',
				'career-with-us-one',
				'our-journey-one',
				'our-expertice-one',
				'price-plan-two',
				'price-plan-one',
				'faq-area-one',
				'faq-area-two',
				'landing-header-area-one',
				'landing-header-area-two',
				'landing-feature-area-two',
				'landing-feature-area-one',
				'landing-navbar-area-one',
				'landing-mobile-app-area-one',
				'landing-payment-gateway-area-one',
				'landing-card-area-one',
				'landing-sms-gateway-area-one',
				'support-area-one',
				'breadcrumb-one',
				'faq-area-three',
				'mega-menu-item-one',
				'mega-menu-category-one',
				'my-account',
				'landing-home-pages-area-one',
				'product-box-one',
				'join-our-team-one',
				'landing-client-area-one',
				'job-list-one',
				'job-single-page',
				'landing-card-area-two',
				'landing-card-area-three',
				'landing-card-area-four',
				'how-it-work-video-one',
				'landing-page-card-five',
				'landing-page-card-six',
				'landing-page-card-seven',
				'landing-page-payment-gateway-three',
				'testimonial-two',
				'call-to-action-one',
				'advance-tab-one',
				'advance-tab-two',
				'landing-page-card-eight',
				'black-friday-header-one',
				'black-friday-product-list-area-one',
				'have-question-area-one',
				'testimonial-three',
				'affiliate-header-area-one',
				'affilate-call-action-one',
				'affiliate-icon-box-one',
				'call-action-two',
				'affilate-guideline',
				'featured-product-two',
				'landing-page-video-area',
				'topbar-offer-one',
				'topbar-offer-two'

                //todo:: nazmart
				
			);

			$elementor_widgets = apply_filters('xgenious_elementor_widget',$elementor_widgets);
			sort($elementor_widgets);
			if ( is_array($elementor_widgets) && !empty($elementor_widgets) ) {
				foreach ( $elementor_widgets as $widget ){
					if(file_exists(XGENIOUS_MASTER_ELEMENTOR.'/widgets/class-'.$widget.'-elementor-widget.php')){
						require_once XGENIOUS_MASTER_ELEMENTOR.'/widgets/class-'.$widget.'-elementor-widget.php';
					}
				}
			}
 
		}

        public function nazmart_widget_registered(){
			if( !class_exists('Elementor\Widget_Base') ){
				return;
			}
			$elementor_widgets = array(
				'header',
				'feature-one',
				'testimonial',
				'how-it-work',
				'full-width-feature',
				'mobile-app',
				'feature-two',
				'cta',
				// 'mini-price-plan',
			);

			$elementor_widgets = apply_filters('xgenious_elementor_widget',$elementor_widgets);
			sort($elementor_widgets);
			if ( is_array($elementor_widgets) && !empty($elementor_widgets) ) {
				foreach ( $elementor_widgets as $widget ){
					if(file_exists(XGENIOUS_MASTER_ELEMENTOR.'/widgets/nazmart/class-nazmart-'.$widget.'-widget.php')){
						require_once XGENIOUS_MASTER_ELEMENTOR.'/widgets/nazmart/class-nazmart-'.$widget.'-widget.php';
					}
				}
			}

		}

		public function fundorex_widget_registered(){
			if( !class_exists('Elementor\Widget_Base') ){
				return;
			}
			$elementor_widgets = array(
				'header',
				'feature-one',
				'responsive-one',
				'fullwidth-feature',
			);

			$elementor_widgets = apply_filters('xgenious_elementor_widget',$elementor_widgets);
			sort($elementor_widgets);
			if ( is_array($elementor_widgets) && !empty($elementor_widgets) ) {
				foreach ( $elementor_widgets as $widget ){
					if(file_exists(XGENIOUS_MASTER_ELEMENTOR.'/widgets/fundorex/class-'.$widget.'-widget.php')){
						require_once XGENIOUS_MASTER_ELEMENTOR.'/widgets/fundorex/class-'.$widget.'-widget.php';
					}
				}
			}

		}

        public function black_friday_widget_registered(){
            if( !class_exists('Elementor\Widget_Base') ){
                return;
            }
            $elementor_widgets = array(
                'product-features',
                'header',
            );

            $elementor_widgets = apply_filters('xgenious_elementor_widget',$elementor_widgets);
            sort($elementor_widgets);
            if ( is_array($elementor_widgets) && !empty($elementor_widgets) ) {
                foreach ( $elementor_widgets as $widget ){
                    if(file_exists(XGENIOUS_MASTER_ELEMENTOR.'/widgets/black-friday/class-black-friday-'.$widget.'-widget.php')){
                        require_once XGENIOUS_MASTER_ELEMENTOR.'/widgets/black-friday/class-black-friday-'.$widget.'-widget.php';
                    }
                }
            }

        }

		public function xilancer_widget_registered(){
            if( !class_exists('Elementor\Widget_Base') ){
                return;
            }
            $elementor_widgets = array(
                'header',
                // 'offer-animation',
                // 'feature-box',
                // 'feature-box-two',
                // 'feature-box-three',
                // 'feature-grid',
                'single-feature',
                // 'full-width-feature',
                'full-width-feature-two',
                'single-feature-two',
                // 'ratings',
                // 'price-plan',
            );

            $elementor_widgets = apply_filters('xgenious_elementor_widget',$elementor_widgets);
            sort($elementor_widgets);
            if ( is_array($elementor_widgets) && !empty($elementor_widgets) ) {
                foreach ( $elementor_widgets as $widget ){
                    if(file_exists(XGENIOUS_MASTER_ELEMENTOR.'/widgets/xilancer/class-'.$widget.'-widget.php')){
                        require_once XGENIOUS_MASTER_ELEMENTOR.'/widgets/xilancer/class-'.$widget.'-widget.php';
                    }
                }
            }
        }
		public function ___new_widget_registered(){
            if( !class_exists('Elementor\Widget_Base') ){
                return;
            }
            $elementor_widgets = array(
                'header-01',
                'website-cms',
                'brand-logo',
                'faq-accordion',
                'work-flow',
                'testimonial',
                'blog',
                'support',
                'footer',
                'about/about',
                'about/counter',
                'about/life-xgenious',
                'about/achievement',
                'about/current-work',
                'history/our-history',
                'history/company-history',
                'contact/contact-form',
                'contact/social-media',
                'career/career',
                'career/principles',
                'career/benifit',
            );

            $elementor_widgets = apply_filters('xgenious_elementor_widget',$elementor_widgets);
            sort($elementor_widgets);
            if ( is_array($elementor_widgets) && !empty($elementor_widgets) ) {
                foreach ( $elementor_widgets as $widget ){
                    if(file_exists(XGENIOUS_MASTER_ELEMENTOR.'/widgets/new-theme/'.$widget.'.php')){
                        require_once XGENIOUS_MASTER_ELEMENTOR.'/widgets/new-theme/'.$widget.'.php';
                    }
                }
            }
        }
		public function ___reportgenix_widget_registered(){
            if( !class_exists('Elementor\Widget_Base') ){
                return;
            }
            $elementor_widgets = array(
                'banner',
                'brand-logo-reportgenix',
				'all-report',
				'data-analytics',
				'create-automation',
				'key-features',
				'integration',
				'profit-analytics',
				'product-analytics',
				'customer-analytics',
				'analytics-report',
				'report-builder',
				'choose-plan',
				'free-trial',
				'footer',
				'blog/blog-head',
				'blog/all-blog',
				'blog/blog-free-trail',
				'blog/single-blog'
            );

            $elementor_widgets = apply_filters('xgenious_elementor_widget',$elementor_widgets);
            sort($elementor_widgets);
            if ( is_array($elementor_widgets) && !empty($elementor_widgets) ) {
                foreach ( $elementor_widgets as $widget ){
                    if(file_exists(XGENIOUS_MASTER_ELEMENTOR.'/widgets/reportgenix/'.$widget.'.php')){
                        require_once XGENIOUS_MASTER_ELEMENTOR.'/widgets/reportgenix/'.$widget.'.php';
                    }
                }
            }
        }

	}

	if ( class_exists('Xgenious_Elementor_Widget_Init') ){
		Xgenious_Elementor_Widget_Init::getInstance();
	}

}//end if
