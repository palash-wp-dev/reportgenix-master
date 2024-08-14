<?php
/**
 * Elementor Widget
 * @package Attorg
 * @since 1.0.0
 */

namespace Elementor;
use Elementor\Controls_Manager;
use Elementor\Repeater;
use Elementor\Widget_Base;

class Xgenious_Nazmart_Landing_Header_Area_Widget extends Widget_Base {

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
		return 'xgenious-nazmart-header-widget';
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
		return esc_html__( 'Nazmart: Header 01', 'xgenious-master' );
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
		return 'eicon-blockquote';
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
			'slider_settings_section',
			[
				'label' => esc_html__( 'Section Settings', 'xgenious-master' ),
				'tab'   => Controls_Manager::TAB_CONTENT,
			]
		);
		$this->add_control('number_of_rating',[
			'label'       => esc_html__( 'Number of rating', 'xgenious-master' ),
			'type'        => Controls_Manager::TEXTAREA,
			'label_block' => true,
			'default' => '25'
		]);
		$this->add_control('section_title',[
			'label'       => esc_html__( 'Section Title', 'xgenious-master' ),
			'type'        => Controls_Manager::TEXTAREA,
			'label_block' => true,
            'default' => 'Build Your Multi-Tenancy eCommerce Platform'
		]);
	
        $this->add_control('section_description',[
			'label'       => esc_html__( 'Description', 'xgenious-master' ),
			'type'        => Controls_Manager::TEXTAREA,
			'label_block' => true,
            'default' => 'Empower Entrepreneurs with Multi-Tenancy eCommerce Platform: Offer SaaS Subscription for Seamless eCommerce Store Building Browse Frontend'
		]);
		$this->add_control('dashboard_image',[
			'label'       => esc_html__( 'Dashboard Image', 'xgenious-master' ),
			'type'        => Controls_Manager::MEDIA,
		]);
        $this->add_control('home_page_image',[
            'label'       => esc_html__( 'Home Image', 'xgenious-master' ),
            'type'        => Controls_Manager::MEDIA,
        ]);
        $this->add_control('mobile_image',[
            'label'       => esc_html__( 'Mobile Image', 'xgenious-master' ),
            'type'        => Controls_Manager::MEDIA,
        ]);

		$this->end_controls_section();


		$this->start_controls_section(
			'color_settings_section',
			[
				'label' => esc_html__( 'Link Color Settings', 'xgenious-master' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);
		$this->add_control(
			'link_color',
			[
				'label' => esc_html__( 'Link Color', 'textdomain' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .link_wrapper a' => 'color: {{VALUE}}',
				],
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'settings_section',
			[
				'label' => esc_html__( 'Button Settings', 'xgenious-master' ),
				'tab'   => Controls_Manager::TAB_CONTENT,
			]
		);
        $repeater = new Repeater();
		$repeater->add_control('button_text',[
			'label'       => esc_html__( 'Button Text', 'xgenious-master' ),
			'type'        => Controls_Manager::TEXT,
			'description' => esc_html__( 'enter button text', 'xgenious-master' ),
			'label_block' => true
		]);
        $repeater->add_control('button_link',[
			'label'       => esc_html__( 'Button Link', 'xgenious-master' ),
			'type'        => Controls_Manager::URL,
			'description' => esc_html__( 'enter button link', 'xgenious-master' ),
			'label_block' => true
		]);
		$repeater->add_control('button_ID',[
			'label'       => esc_html__( 'Button ID', 'xgenious-master' ),
			'type'        => Controls_Manager::TEXT
		]);
        $repeater->add_control('button_radius',[
            'label'       => esc_html__( 'Button Radius', 'xgenious-master' ),
            'type'        => Controls_Manager::SWITCHER,
            'default' => true
        ]);
		$repeater->add_control('button_style',[
			'label'       => esc_html__( 'Button Style', 'xgenious-master' ),
			'type'        => Controls_Manager::SELECT,
            'options' => [
                'btn-bg-1' => __('Button Style 01'),
                'btn-bg-adminPanel' => __('Button Style 02'),
                'btn-bg-userPanel' => __('Button Style 03'),
                'btn_bg_white' => __('btn bg white'),
                'btn_outline_white' => __('btn outline white'),
            ],
            'default' => 'btn-bg-1',
			'description' => esc_html__( 'enter button style', 'xgenious-master' ),
		]);
        $this->add_control('faq_lists',[
	        'label'       => esc_html__( 'Button List', 'xgenious-master' ),
	        'type'        => Controls_Manager::REPEATER,
            'fields' => $repeater->get_controls(),
            'title_field' => "{{{button_text}}}"
        ]);
		$this->end_controls_section();
		$this->start_controls_section(
			'link_settings_section',
			[
				'label' => esc_html__( 'Link Settings', 'xgenious-master' ),
				'tab'   => Controls_Manager::TAB_CONTENT,
			]
		);

		$repeater = new Repeater();
		$repeater->add_control('button_text',[
			'label'       => esc_html__( 'Button Text', 'xgenious-master' ),
			'type'        => Controls_Manager::TEXT,
			'description' => esc_html__( 'enter button text', 'xgenious-master' ),
			'label_block' => true
		]);
		$repeater->add_control('button_link',[
			'label'       => esc_html__( 'Button Link', 'xgenious-master' ),
			'type'        => Controls_Manager::URL,
			'description' => esc_html__( 'enter button link', 'xgenious-master' ),
			'label_block' => true
		]);
		$repeater->add_control('button_ID',[
			'label'       => esc_html__( 'Button ID', 'xgenious-master' ),
			'type'        => Controls_Manager::TEXT
		]);
		$this->add_control('link_lists',[
			'label'       => esc_html__( 'Link List', 'xgenious-master' ),
			'type'        => Controls_Manager::REPEATER,
			'fields' => $repeater->get_controls(),
			'title_field' => "{{{button_text}}}"
		]);

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
		$settings = $this->get_settings_for_display();
		?>
        <section class="naz_banner_area banner_bg pab-60">
            <div class="banner__shapes">
                <svg width="22" height="22" viewBox="0 0 22 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <circle cx="11" cy="11" r="9.25" stroke="#F82E77" stroke-width="2.5"></circle>
                </svg>
                <svg width="75" height="29" viewBox="0 0 75 29" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M2 16.3225C2.1657 17.5978 3.52896 19.3551 4.02271 19.6679C6.07625 20.9734 8.19712 20.5916 10.3264 19.9779C16.1684 18.2951 21.0396 11.1794 23.0202 2.02752C22.5338 1.51965 24.2838 8.20207 24.4785 8.80287C26.1488 13.9534 28.649 18.7515 32.0244 20.9661C39.1737 25.6566 46.994 17.3171 49.0296 5.69581C49.0357 5.66269 49.2865 6.94618 49.3858 7.2912C49.7382 8.51121 50.2033 9.62263 50.669 10.7313C51.8512 13.5476 53.0508 16.4707 54.5354 18.8867C59.2625 26.5785 67.116 30.023 73 23.7427" stroke="#F82E77" stroke-width="2.5" stroke-miterlimit="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                </svg>
                <svg width="38" height="69" viewBox="0 0 38 69" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" clip-rule="evenodd" d="M5.92089 67C13.0184 58.1535 19.8032 49.7348 26.5479 40.619C29.7649 36.2709 32.9983 31.1089 36 26.6023C29.3734 26.0219 25.7589 26.6734 19.1539 26.0241C19.1513 26.0241 21.8139 12.0465 23.3812 2C13.6725 11.9879 5.81049 28.9726 2 38.5749C6.66008 38.8433 11.4246 39.0441 16.0928 38.9183C12.8199 48.312 9.3068 57.6524 5.92089 67Z" fill="white" stroke="#FFCD00" stroke-width="3.8" stroke-miterlimit="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                </svg>
                <svg width="30" height="42" viewBox="0 0 30 42" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" clip-rule="evenodd" d="M16.8753 2C17.0372 8.24444 14.5468 14.4716 9.08627 18.2299C6.97178 19.6852 4.4669 20.2151 2 20.6555C12.0219 21.0064 15.5012 31.7122 16.8957 40C16.4114 32.5669 20.2189 24.5381 28 23.7972C20.2541 19.1462 17.5957 10.6115 16.8753 2Z" fill="white" stroke="#F82E77" stroke-width="2.5" stroke-miterlimit="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                </svg>
                <svg width="34" height="34" viewBox="0 0 34 34" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <rect x="17" y="0.87868" width="23" height="23" rx="3.5" transform="rotate(45 17 0.87868)" stroke="#FFCD00" stroke-width="3"></rect>
                </svg>
                <svg width="68" height="25" viewBox="0 0 68 25" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M65.4966 22.3464C64.6463 20.0143 64.2394 17.4914 63.499 15.1206C62.2987 11.2774 60.7339 7.54578 59.6036 3.68152C57.9639 6.19308 56.6479 8.9193 54.9628 11.4018C53.0598 14.205 50.7962 17.0396 49.3688 20.1123C47.4214 14.4463 45.484 8.77385 43.5699 3.09563C40.1253 8.12822 36.537 13.3955 33.5546 18.6858L26.9566 2.05807C22.8188 6.96759 19.5746 12.6374 15.4051 17.567C13.9822 12.672 12.0427 7.7453 10.8807 2.81657C7.53795 6.98308 4.66464 12.0077 1.81548 16.5075" stroke="#FFCD00" stroke-width="3.5" stroke-miterlimit="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                </svg>
            </div>
            <div class="container container__one">
                <div class="row align-items-center flex-column-reverse flex-lg-row">
                    <div class="col-lg-12">
                        <div class="banner banner__gradient text-center">
                            <div class="banner__contents">
                                <div class="nazmart_header_rating">
                                    <span class="rating__wrap">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="45" height="42" viewBox="0 0 45 42" fill="none"><path d="M44.183 16.0498H27.3031L22.1069 0L16.8799 16.0498L0 16.019L13.6515 25.9502L8.4246 42L22.0761 32.0688L35.7277 42L30.5315 25.9502L44.183 16.0498Z" fill="#f9bf00"></path></svg>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="45" height="42" viewBox="0 0 45 42" fill="none"><path d="M44.183 16.0498H27.3031L22.1069 0L16.8799 16.0498L0 16.019L13.6515 25.9502L8.4246 42L22.0761 32.0688L35.7277 42L30.5315 25.9502L44.183 16.0498Z" fill="#f9bf00"></path></svg>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="45" height="42" viewBox="0 0 45 42" fill="none"><path d="M44.183 16.0498H27.3031L22.1069 0L16.8799 16.0498L0 16.019L13.6515 25.9502L8.4246 42L22.0761 32.0688L35.7277 42L30.5315 25.9502L44.183 16.0498Z" fill="#f9bf00"></path></svg>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="45" height="42" viewBox="0 0 45 42" fill="none"><path d="M44.183 16.0498H27.3031L22.1069 0L16.8799 16.0498L0 16.019L13.6515 25.9502L8.4246 42L22.0761 32.0688L35.7277 42L30.5315 25.9502L44.183 16.0498Z" fill="#f9bf00"></path></svg>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="45" height="42" viewBox="0 0 45 42" fill="none"><path d="M44.183 16.0498H27.3031L22.1069 0L16.8799 16.0498L0 16.019L13.6515 25.9502L8.4246 42L22.0761 32.0688L35.7277 42L30.5315 25.9502L44.183 16.0498Z" fill="#f9bf00"></path></svg>
                                    </span> <?php echo esc_html__('('.$settings['number_of_rating'].') rating at Envato','xgenious')?>
                                </div>
                                <h1 class="banner__contents__title"> <?php echo esc_html($settings['section_title'])?> </h1>
                                <span class="banner__contents__para"><?php echo wp_kses_post($settings['section_description'])?></span>
                                <div class="banner__button btn_wrapper d-flex mt-5">
                                    <?php
                                    $faq_list = $settings['faq_lists'];
                                    foreach ($faq_list as $list):
	                                    $button_id_markup = !empty($list['button_ID']) ? 'id="'.$list['button_ID'].'"' : '';
                                        printf('<a href="%1$s" target="%4$s" %6$s class="cmn_btn %2$s %5$s"> %3$s </a>',
                                            $list['button_link']['url'],
                                            $list['button_style'],
                                            $list['button_text'],
                                            $list['button_link']['is_external'] ? '_blank' : '_self',
                                            $list['button_radius'] == 'yes' ? 'radius-30' : '',
	                                        $button_id_markup
                                        );
                                    endforeach;?>
                                </div>
                                <div class="link_wrapper justify-content-center">
		                            <?php
		                            $faq_list = $settings['link_lists'];
		                            foreach ($faq_list as $list):
			                            $button_id_markup = !empty($list['button_ID']) ? 'id="'.$list['button_ID'].'"' : '';
			                            printf('<a href="%1$s" target="%3$s"  class="link_btn" %4$s> %2$s </a>',
				                            $list['button_link']['url'],
				                            $list['button_text'],
				                            $list['button_link']['is_external'] ? '_blank' : '_self',
				                            $button_id_markup
			                            );
		                            endforeach;?>
                                </div>
                            </div>
                            <div class="banner__inner mt-5">
                                <div class="banner__thumb">
                                    <div class="banner__thumb__flex">
                                        <div class="banner__thumb__item">
                                            <?php
                                            $img_id = $settings['dashboard_image']['id'] ;
                                            $img_url_val = $img_id ? wp_get_attachment_image_src($img_id,'full',false) : '';
                                            $img_url = is_array($img_url_val) && !empty($img_url_val) ? $img_url_val[0] : '';
                                            $img_alt =  $img_id ? get_post_meta($img_id,'_wp_attachment_image_alt',true) : '';
                                            printf('<img src="%1$s" alt="%2$s">',$img_url,$img_alt);
                                            ?>
                                        </div>
                                        <div class="banner__thumb__item">
                                            <?php
                                            $img_id = $settings['home_page_image']['id'] ;
                                            $img_url_val = $img_id ? wp_get_attachment_image_src($img_id,'full',false) : '';
                                            $img_url = is_array($img_url_val) && !empty($img_url_val) ? $img_url_val[0] : '';
                                            $img_alt =  $img_id ? get_post_meta($img_id,'_wp_attachment_image_alt',true) : '';
                                            printf('<img src="%1$s" alt="%2$s">',$img_url,$img_alt);
                                            ?>
                                        </div>
                                        <div class="banner__thumb__item">
                                            <?php
                                            $img_id = $settings['mobile_image']['id'] ;
                                            $img_url_val = $img_id ? wp_get_attachment_image_src($img_id,'full',false) : '';
                                            $img_url = is_array($img_url_val) && !empty($img_url_val) ? $img_url_val[0] : '';
                                            $img_alt =  $img_id ? get_post_meta($img_id,'_wp_attachment_image_alt',true) : '';
                                            printf('<img src="%1$s" alt="%2$s">',$img_url,$img_alt);
                                            ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
		<?php
	}
}

Plugin::instance()->widgets_manager->register( new Xgenious_Nazmart_Landing_Header_Area_Widget() );