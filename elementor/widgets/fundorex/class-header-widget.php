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

class Xgenious_Fundorex_Landing_Header_Area_Widget extends Widget_Base {

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
		return 'xgenious-fundorex-header-widget';
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
		return esc_html__( 'Fundorex: Header 01', 'xgenious-master' );
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
			'type'        => Controls_Manager::TEXT,
			'label_block' => true,
			'default' => '33'
		]);
		$this->add_control('section_title',[
			'label'       => esc_html__( 'Section Title', 'xgenious-master' ),
			'type'        => Controls_Manager::TEXTAREA,
			'label_block' => true,
            'default' => 'Build Your Amazing Crowdfunding Website'
		]);

		$this->add_control('main_image',[
			'label'       => esc_html__( 'Image', 'xgenious-master' ),
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

		$this->add_control(
			'link_margin_bottom',
			[
				'label' => esc_html__( 'Margin Bottom', 'textdomain' ),
				'type' => \Elementor\Controls_Manager::SLIDER,
				'size_units' => [ 'px', '%', 'em', 'rem', 'custom' ],
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 500,
						'step' => 5,
					],
					'%' => [
						'min' => 0,
						'max' => 100,
					],
				],
				'default' => [
					'unit' => 'px',
					'size' => 50,
				],
				'selectors' => [
					'{{WRAPPER}} .link_wrapper' => 'margin-bottom: {{SIZE}}{{UNIT}};',
				],
			]
		);

		$this->add_control(
			'section_padding_top',
			[
				'label' => esc_html__( 'Section Padding Top', 'textdomain' ),
				'type' => \Elementor\Controls_Manager::SLIDER,
				'size_units' => [ 'px', '%', 'em', 'rem', 'custom' ],
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 500,
						'step' => 5,
					],
					'%' => [
						'min' => 0,
						'max' => 100,
					],
				],
				'default' => [
					'unit' => 'px',
					'size' => 80,
				],
				'selectors' => [
					'{{WRAPPER}} .fundorex_banner_area .banner' => 'padding-top: {{SIZE}}{{UNIT}};',
				],
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'rating_style_settings_section',
			[
				'label' => esc_html__( 'Rating Settings', 'xgenious-master' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);
		$this->add_control(
			'rating_bg_color',
			[
				'label' => esc_html__( 'Backgorund Color', 'textdomain' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .nazmart_header_rating' => 'background-color: {{VALUE}}',
				],
			]
		);
		$this->add_control(
			'rating_text_color',
			[
				'label' => esc_html__( 'Text Color', 'textdomain' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .nazmart_header_rating' => 'color: {{VALUE}}',
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


		$this->start_controls_section(
			'button_styling_section',
			[
				'label' => esc_html__( 'Bg White Button Settings', 'xgenious-master' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);

		$this->start_controls_tabs(
			'style_tabs'
		);

		$this->start_controls_tab(
			'style_normal_tab',
			[
				'label' => esc_html__( 'Normal', 'textdomain' ),
			]
		);
		$this->add_control("btn_background_color",[
			'label'       => esc_html__( 'Background Color', 'xgenious-master' ),
			'type'        => Controls_Manager::COLOR,
			"selectors" => [
				"{{WRAPPER}} .cmn_btn.btn_bg_white" => "background-color: {{VALUE}}"
			]
		]);
		$this->add_control("btn_border_color",[
			'label'       => esc_html__( 'Border Color', 'xgenious-master' ),
			'type'        => Controls_Manager::COLOR,
			"selectors" => [
				"{{WRAPPER}} .cmn_btn.btn_bg_white" => "border-color: {{VALUE}}"
			]
		]);
		$this->add_control("btn_color",[
			'label'       => esc_html__( 'Text Color', 'xgenious-master' ),
			'type'        => Controls_Manager::COLOR,
			"selectors" => [
				"{{WRAPPER}} .cmn_btn.btn_bg_white" => "color: {{VALUE}}"
			]
		]);
		$this->end_controls_tab();

		$this->start_controls_tab(
			'style_hover_tab',
			[
				'label' => esc_html__( 'Hover', 'textdomain' ),
			]
		);

		$this->add_control("btn_hover_background_color",[
			'label'       => esc_html__( 'Background Color', 'xgenious-master' ),
			'type'        => Controls_Manager::COLOR,
			"selectors" => [
				"{{WRAPPER}} .cmn_btn.btn_bg_white:hover" => "background-color: {{VALUE}}"
			]
		]);
		$this->add_control("btn_hover_border_color",[
			'label'       => esc_html__( 'Border Color', 'xgenious-master' ),
			'type'        => Controls_Manager::COLOR,
			"selectors" => [
				"{{WRAPPER}} .cmn_btn.btn_bg_white:hover" => "border-color: {{VALUE}}"
			]
		]);
		$this->add_control("btn_hover_color",[
			'label'       => esc_html__( 'Text Color', 'xgenious-master' ),
			'type'        => Controls_Manager::COLOR,
			"selectors" => [
				"{{WRAPPER}} .cmn_btn.btn_bg_white:hover" => "color: {{VALUE}}"
			]
		]);
		$this->end_controls_tab();

		$this->end_controls_tabs();

		$this->add_control(
			'bg_white_button_border_radius',
			[
				'label' => esc_html__( 'Border Radius', 'textdomain' ),
				'type' => \Elementor\Controls_Manager::SLIDER,
				'size_units' => [ 'px', '%', 'em', 'rem', 'custom' ],
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 100,
						'step' => 5,
					],
					'%' => [
						'min' => 0,
						'max' => 100,
					],
				],
				'default' => [
					'unit' => 'px',
					'size' => 0,
				],
				'selectors' => [
					'{{WRAPPER}} .cmn_btn.btn_bg_white' => 'border-radius: {{SIZE}}{{UNIT}};',
				],
			]
		);
		$this->end_controls_section();



		$this->start_controls_section(
			'white_button_styling_section',
			[
				'label' => esc_html__( 'Outline White Button Settings', 'xgenious-master' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);

		$this->start_controls_tabs(
			'outline_style_tabs'
		);

		$this->start_controls_tab(
			'outline_style_normal_tab',
			[
				'label' => esc_html__( 'Normal', 'textdomain' ),
			]
		);
		$this->add_control("btn_outline_background_color",[
			'label'       => esc_html__( 'Background Color', 'xgenious-master' ),
			'type'        => Controls_Manager::COLOR,
			"selectors" => [
				"{{WRAPPER}} .cmn_btn.btn_outline_white" => "background-color: {{VALUE}}"
			]
		]);
		$this->add_control("btn_outline_border_color",[
			'label'       => esc_html__( 'Border Color', 'xgenious-master' ),
			'type'        => Controls_Manager::COLOR,
			"selectors" => [
				"{{WRAPPER}} .cmn_btn.btn_outline_white" => "border-color: {{VALUE}}"
			]
		]);
		$this->add_control("btn_outline_color",[
			'label'       => esc_html__( 'Text Color', 'xgenious-master' ),
			'type'        => Controls_Manager::COLOR,
			"selectors" => [
				"{{WRAPPER}} .cmn_btn.btn_outline_white" => "color: {{VALUE}}"
			]
		]);
		$this->end_controls_tab();

		$this->start_controls_tab(
			'outline_btn_style_hover_tab',
			[
				'label' => esc_html__( 'Hover', 'textdomain' ),
			]
		);

		$this->add_control("btn_outline_hover_background_color",[
			'label'       => esc_html__( 'Background Color', 'xgenious-master' ),
			'type'        => Controls_Manager::COLOR,
			"selectors" => [
				"{{WRAPPER}} .cmn_btn.btn_outline_white:hover" => "background-color: {{VALUE}}"
			]
		]);
		$this->add_control("btn_outline_hover_border_color",[
			'label'       => esc_html__( 'Border Color', 'xgenious-master' ),
			'type'        => Controls_Manager::COLOR,
			"selectors" => [
				"{{WRAPPER}} .cmn_btn.btn_outline_white:hover" => "border-color: {{VALUE}}"
			]
		]);
		$this->add_control("btn_outline_hover_color",[
			'label'       => esc_html__( 'Text Color', 'xgenious-master' ),
			'type'        => Controls_Manager::COLOR,
			"selectors" => [
				"{{WRAPPER}} .cmn_btn.btn_outline_white:hover" => "color: {{VALUE}}"
			]
		]);
		$this->end_controls_tab();

		$this->end_controls_tabs();
		$this->add_control(
			'outline_white_border_radius',
			[
				'label' => esc_html__( 'Border Radius', 'textdomain' ),
				'type' => \Elementor\Controls_Manager::SLIDER,
				'size_units' => [ 'px', '%', 'em', 'rem', 'custom' ],
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 100,
						'step' => 5,
					],
					'%' => [
						'min' => 0,
						'max' => 100,
					],
				],
				'default' => [
					'unit' => 'px',
					'size' => 0,
				],
				'selectors' => [
					'{{WRAPPER}} .cmn_btn.btn_outline_white' => 'border-radius: {{SIZE}}{{UNIT}};',
				],
			]
		);

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
        <section class="fundorex_banner_area banner_bg pab-60">
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
                        </div>
                    </div>
                </div>
            </div>
            <div class="banner__thumb__item">
		        <?php
		        $img_id = $settings['main_image']['id'] ;
		        $img_url_val = $img_id ? wp_get_attachment_image_src($img_id,'full',false) : '';
		        $img_url = is_array($img_url_val) && !empty($img_url_val) ? $img_url_val[0] : '';
		        $img_alt =  $img_id ? get_post_meta($img_id,'_wp_attachment_image_alt',true) : '';
		        printf('<img src="%1$s" alt="%2$s">',$img_url,$img_alt);
		        ?>
            </div>
        </section>
		<?php
	}
}

Plugin::instance()->widgets_manager->register( new Xgenious_Fundorex_Landing_Header_Area_Widget() );