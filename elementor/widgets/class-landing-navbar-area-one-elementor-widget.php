<?php
/**
 * Elementor Widget
 * @package Attorg
 * @since 1.0.0
 */

namespace Elementor;
class Xgenious_Landing_Navbar_Area_One_Widget extends Widget_Base {

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
		return 'xgenious-landing-navbar-area-one-widget';
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
		return esc_html__( 'Landing Navbar: 01', 'xgenious-master' );
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
		$this->add_control('use_shortcode',[
			'label'       => esc_html__( 'Use Shotcode', 'xgenious-master' ),
			'type'        => Controls_Manager::SWITCHER
		]);
		$this->add_control('edd_button_shotcode',[
			'label'       => esc_html__( 'EDD Button Shortcode', 'xgenious-master' ),
			'type'        => Controls_Manager::TEXTAREA,
			'label_block' => true,
				'condition' => [
			        'use_shortcode' => 'yes'    
			]
		]);
		$this->add_control('button_text',[
			'label'       => esc_html__( 'Button Text', 'xgenious-master' ),
			'type'        => Controls_Manager::TEXT,
			'label_block' => true,
			'condition' => [
			    'use_shortcode' => ''    
			]
		]);
		$this->add_control('button_id',[
			'label'       => esc_html__( 'Button Id', 'xgenious-master' ),
			'type'        => Controls_Manager::TEXT,
			'label_block' => true,
			'condition' => [
				'use_shortcode' => ''
			]
		]);
        $this->add_control('button_link',[
			'label'       => esc_html__( 'Button Link', 'xgenious-master' ),
			'type'        => Controls_Manager::URL,
			'label_block' => true,
			'condition' => [
			    'use_shortcode' => ''    
			]
		]);

		$this->end_controls_section();


		$this->start_controls_section(
			'settings_section',
			[
				'label' => esc_html__( 'Item Settings', 'xgenious-master' ),
				'tab'   => Controls_Manager::TAB_CONTENT,
			]
		);
        $repeater = new Repeater();
		$repeater->add_control('title',[
			'label'       => esc_html__( 'Title', 'xgenious-master' ),
			'type'        => Controls_Manager::TEXTAREA,
			'description' => esc_html__( 'enter {br}new line{/br} text for new line', 'xgenious-master' ),
			'label_block' => true
		]);
        $repeater->add_control('link_id',[
			'label'       => esc_html__( 'Link Id', 'xgenious-master' ),
			'type'        => Controls_Manager::TEXT,
			'label_block' => true
		]);
		$repeater->add_control('link',[
			'label'       => esc_html__( 'Link', 'xgenious-master' ),
			'type'        => Controls_Manager::URL,
			'label_block' => true
		]);
        $this->add_control('faq_lists',[
	        'label'       => esc_html__( 'Features List', 'xgenious-master' ),
	        'type'        => Controls_Manager::REPEATER,
            'fields' => $repeater->get_controls(),
            'title_field' => "{{{title}}}"
        ]);
		$this->end_controls_section();

		$this->start_controls_section(
			'style_settings_section',
			[
				'label' => esc_html__( 'Style Settings', 'xgenious-master' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);
        $this->add_control('background_color',[
           'label' => __('Background Color'),
           'type' => Controls_Manager::COLOR,
           'selectors' => [
                   "{{WRAPPER}} .banner-bottom-menu-bg" => 'background-color: {{VALUE}}'
           ]
        ]);
		$this->add_control('text_color',[
			'label' => __('Text Color'),
			'type' => Controls_Manager::COLOR,
			'selectors' => [
				"{{WRAPPER}} .banner-bottom-menu-list-item-link" => 'color: {{VALUE}}'
			]
		]);
		$this->add_control('fixed_background_color',[
			'label' => __('Fixed Background Color'),
			'type' => Controls_Manager::COLOR,
			'selectors' => [
				"{{WRAPPER}} #stickynav.sticky_nav" => 'background-color: {{VALUE}}'
			]
		]);
		$this->add_control('fixed_text_color',[
			'label' => __('Fixed Text Color'),
			'type' => Controls_Manager::COLOR,
			'selectors' => [
				"{{WRAPPER}} .sticky_nav .banner-bottom-menu-list-item-link" => 'color: {{VALUE}}'
			]
		]);
		$this->add_control('hover_text_color',[
			'label' => __('Hover Text Color'),
			'type' => Controls_Manager::COLOR,
			'selectors' => [
				"{{WRAPPER}} .banner-bottom-menu-list-item-link::before" => 'background-color: {{VALUE}}',
				"{{WRAPPER}} .banner-bottom-menu-list-item-link:hover" => 'color: {{VALUE}}',
			]
		]);
		$this->end_controls_section();
		$this->start_controls_section(
			'button_styling_section',
			[
				'label' => esc_html__( 'Button Styling', 'xgenious-master' ),
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
				"{{WRAPPER}} .btn-wrapper .cmn-btn.btn-bg-1" => "background-color: {{VALUE}}"
			]
		]);
		$this->add_control("btn_border_color",[
			'label'       => esc_html__( 'Border Color', 'xgenious-master' ),
			'type'        => Controls_Manager::COLOR,
			"selectors" => [
				"{{WRAPPER}} .btn-wrapper .cmn-btn" => "border-color: {{VALUE}}"
			]
		]);
		$this->add_control("btn_color",[
			'label'       => esc_html__( 'Text Color', 'xgenious-master' ),
			'type'        => Controls_Manager::COLOR,
			"selectors" => [
				"{{WRAPPER}} .btn-wrapper .cmn-btn" => "color: {{VALUE}}"
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
				"{{WRAPPER}} .btn-wrapper .cmn-btn.btn-bg-1:hover" => "background-color: {{VALUE}}",
				"{{WRAPPER}} .btn-wrapper .cmn-btn.btn-bg-1::before" => "background-color: {{VALUE}}",
			]
		]);
		$this->add_control("btn_hover_border_color",[
			'label'       => esc_html__( 'Border Color', 'xgenious-master' ),
			'type'        => Controls_Manager::COLOR,
			"selectors" => [
				"{{WRAPPER}} .btn-wrapper .cmn-btn:hover" => "border-color: {{VALUE}}"
			]
		]);
		$this->add_control("btn_hover_color",[
			'label'       => esc_html__( 'Text Color', 'xgenious-master' ),
			'type'        => Controls_Manager::COLOR,
			"selectors" => [
				"{{WRAPPER}} .btn-wrapper .cmn-btn:hover" => "color: {{VALUE}}"
			]
		]);
		$this->end_controls_tab();

		$this->end_controls_tabs();
		$this->add_control(
			'button_border_radius',
			[
				'label' => esc_html__( 'Border Radius', 'textdomain' ),
				'type' => \Elementor\Controls_Manager::SLIDER,
				'size_units' => [ 'px' ],
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 100,
						'step' => 5,
					],
				],
				'default' => [
					'unit' => 'px',
					'size' => 0,
				],
				'selectors' => [
					'{{WRAPPER}} .btn-wrapper .cmn-btn' => 'border-radius: {{SIZE}}{{UNIT}};',
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
        <nav id="stickynav" class="banner-bottom-menu banner-bottom-menu-bg">
            <div class="container container_1430">
                <div class="banner-bottom-menu-wrapper">
                    <ul class="banner-bottom-menu-list list-style-none">
                        <?php
                        $faq_list = $settings['faq_lists'];
                        foreach ($faq_list as $list):

	                        $lbutton_id = !empty($list['link_id']) ? 'id="'.$list['link_id'].'"' : '';
                            ?>
                            <li class="banner-bottom-menu-list-item">
                                <a href="<?php echo $list['link']['url'];?>" <?php echo $lbutton_id;?> class="banner-bottom-menu-list-item-link"> <?php echo esc_html($list['title']);?> </a>
                            </li>
                        <?php  endforeach;?>
                    </ul>
                    <div class="banner-bottom-menu-right">
                        <?php if($settings['use_shortcode'] === 'yes'):
                            
                            $shortcode = $this->get_settings_for_display( 'edd_button_shotcode' );
                            $shortcode = do_shortcode( shortcode_unautop( $shortcode ) );
                            echo $shortcode; 
                            
                        else:?>
                        <div class="btn-wrapper">
                            <?php
                                $button_id = !empty($settings['button_id']) ? 'id="'.$settings['button_id'].'"' : '';
                            ?>
                            <a href="<?php echo $settings['button_link']['url'];?>" <?php echo $button_id;?> <?php echo !(empty($settings['button_link']['is_external']) ? 'target="_blank"' : '')?> class="cmn-btn btn-bg-1">
                                <?php
                                    $button_text = str_replace(["{c}","{/c}"],["<del>","</del>"],$settings['button_text']);
                                    echo wp_kses_post($button_text);
                                ?> 
                            </a>
                        </div>
                        <?php endif;?>
                    </div>
                </div>
            </div>
        </nav>
		<?php
	}
}

Plugin::instance()->widgets_manager->register( new Xgenious_Landing_Navbar_Area_One_Widget() );