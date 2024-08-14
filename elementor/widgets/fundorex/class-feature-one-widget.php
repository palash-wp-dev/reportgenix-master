<?php
/**
 * Elementor Widget
 * @package irtech
 * @since 1.0.0
 */

namespace Elementor;
class Fundorex_Features_Area_Widget extends Widget_Base {

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
		return 'fundorex-features-area-one-widget';
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
		return esc_html__( 'Fundorex: Features Area', 'irtech-master' );
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
		return 'eicon-archive-title';
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
                'label' => esc_html__( 'Section Contents', 'irtech-master' ),
                'tab'   => Controls_Manager::TAB_CONTENT,
            ]
        );
        $this->add_control( 'section_title', [
            'type'    => Controls_Manager::TEXTAREA,
            'label'   => esc_html__( 'Section Title', 'irtech-master' ),
            'default' => esc_html__( 'Advance features', 'irtech-master' )
        ] );

        $this->end_controls_section();

        $this->start_controls_section(
			'content_section',
			[
				'label' => esc_html__( 'Features Section', 'irtech-master' ),
				'tab'   => Controls_Manager::TAB_CONTENT,
			]
		);
		$repeater = new Repeater();
		$repeater->add_control( 'title', [
			'type'    => Controls_Manager::TEXTAREA,
			'label'   => esc_html__( 'Title', 'irtech-master' ),
			'default' => esc_html__( 'Advance Searching Module', 'irtech-master' )
		] );
        $repeater->add_control( 'description', [
            'type'    => Controls_Manager::TEXTAREA,
            'label'   => esc_html__( 'Description', 'irtech-master' ),
            'default' => esc_html__( 'but your query is quite general. Advanced searching can Refer to various methods for conducting', 'irtech-master' )
        ] );
		$repeater->add_control('image',[
			'label' => "Image",
			'type' => Controls_Manager::MEDIA
		]);
		$this->add_control('features_list',[
			'label' => 'Features List',
			'type' => Controls_Manager::REPEATER,
			'fields' => $repeater->get_controls(),
            'title_field' => "{{{title}}}"
		]);

		$this->end_controls_section();



		$this->start_controls_section(
			'css_styles',
			[
				'label' => esc_html__( 'Styling Settings', 'irtech-master' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'content_background_color',
			[
				'label' => esc_html__( 'Content Background Color', 'textdomain' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .features__item__contents' => 'background-color: {{VALUE}}',
				],
			]
		);

		$this->add_control(
			'feature_content_align',
			[
				'label' => esc_html__( 'Feature Content Alignment', 'textdomain' ),
				'type' => \Elementor\Controls_Manager::CHOOSE,
				'options' => [
					'left' => [
						'title' => esc_html__( 'Left', 'textdomain' ),
						'icon' => 'eicon-text-align-left',
					],
					'center' => [
						'title' => esc_html__( 'Center', 'textdomain' ),
						'icon' => 'eicon-text-align-center',
					],
					'right' => [
						'title' => esc_html__( 'Right', 'textdomain' ),
						'icon' => 'eicon-text-align-right',
					],
				],
				'default' => 'center',
				'toggle' => true,
				'selectors' => [
					'{{WRAPPER}} .features__item__contents' => 'text-align: {{VALUE}};',
				],
			]
		);

        //box shado control
        //border radious control
		$this->add_control(
			'border_radius_featured_items',
			[
				'label' => esc_html__( 'Features Border Radius', 'textdomain' ),
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
					'size' => 10,
				],
				'selectors' => [
					'{{WRAPPER}} .features__item__thumb img' => 'border-radius: {{SIZE}}{{UNIT}};',
				]
			]);
        $this->add_group_control(Group_Control_Box_Shadow::get_type(),[
                "name" => 'feature_item_box_shadow',
                'label' => 'Feature Image Box Shadow'
        ]);
		$this->add_control(
			'feature_padding',
			[
				'label' => esc_html__( 'Feature Padding', 'textdomain' ),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em', 'rem', 'custom' ],
				'default' => [
					'top' => 0,
					'right' => 30,
					'bottom' => 30,
					'left' => 30,
					'unit' => 'px',
					'isLinked' => false,
				],
				'selectors' => [
					'{{WRAPPER}} .features__item__contents' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		$this->add_control(
			'feature_content_min_height',
			[
				'label' => esc_html__( 'Feature Image Min Height', 'textdomain' ),
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
					'size' => 0,
				],
				'selectors' => [
					'{{WRAPPER}} .features__item__thumb' => 'min-height: {{SIZE}}{{UNIT}};',
				],
			]
		);
        $this->add_control(
            'section_title_bottom_bap',
            [
                'label' => esc_html__( 'Section Bottom Margin', 'textdomain' ),
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
                    'size' => 50,
                ],
                'selectors' => [
                    '{{WRAPPER}} .new_sectionTitle' => 'margin-bottom: {{SIZE}}{{UNIT}};',
                ]
            ]);

            $this->end_controls_section();

		$this->start_controls_section(
			'style_title_settings_section',
			[
				'label' => esc_html__( 'Title Style', 'xgenious-master' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'title_typography',
				'label' => __( 'Title Typography', 'my-plugin-domain' ),
				'selector' => '{{WRAPPER}} .new_sectionTitle .title'
			]
		);
		$this->end_controls_section();
	}

	/**
	 * Render Elementor widget output on the frontend.
	 *
	 * Written in PHP and used to generate the final HTML.
	 *
	 * @since 1.0.0
	 * @access protected
	 */
	protected function render() {
		$settings = $this->get_settings_for_display();
		?>
        <div class="feature_area fundorex">
            <div class="container">
                <div class="new_sectionTitle">
                    <h2 class="title"><?php echo esc_html($settings['section_title']);?></h2>
                </div>

                <div class="row g-4 gy-5">
                <?php
                foreach ($settings['features_list'] as $fs_list): ?>

                    <div class="col-xxl-4 col-lg-4 col-sm-6">
                        <div class="features__item radius-10">
                            <div class="features__item__thumb">
                                <?php
                                $banner_image_id = $fs_list['image']['id'];
                                $banner_image_url = !empty($banner_image_id) ? wp_get_attachment_image_src($banner_image_id,'full',true)[0] : '';
                                $banner_image_alt = !empty($banner_image_id) ? get_post_meta($banner_image_id,'_wp_attachment_image_alt',true) : '';
                                printf('<img src="%1$s" alt="%2$s" loading="lazy">',esc_url($banner_image_url),esc_attr($banner_image_alt));
                                ?>
                            </div>
                            <div class="features__item__contents">
                                <h4 class="features__item__title"><?php echo esc_html($fs_list['title']);?></h4>
                                <p class="features__item__para mt-2"><?php echo esc_html($fs_list['description']);?></p>
                            </div>
                        </div>
                    </div>
                <?php endforeach;?>
                </div>

            </div>
        </div>
		<?php
	}
}

Plugin::instance()->widgets_manager->register( new Fundorex_Features_Area_Widget() );