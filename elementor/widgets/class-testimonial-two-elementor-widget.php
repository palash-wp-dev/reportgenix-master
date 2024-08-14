<?php
/**
 * Elementor Widget
 * @package Attorg
 * @since 1.0.0
 */

namespace Elementor;
class Xgenious_Testimonial_Two_Widget extends Widget_Base {

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
		return 'xgenious-testimonial-two-widget';
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
		return esc_html__( 'Testimonial: 02', 'xgenious-master' );
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
			'section_settings_section',
			[
				'label' => esc_html__( 'General Settings', 'xgenious-master' ),
				'tab'   => Controls_Manager::TAB_CONTENT,
			]
		);
        $this->add_control('section_title',[
	        'label'       => esc_html__( 'Section Title', 'xgenious-master' ),
	        'type'        => Controls_Manager::TEXT,
	        'label_block' => true,
	        'description' => esc_html__( 'use {c}color{/c} for color text', 'xgenious-master' ),
        ]);
		$this->end_controls_section();
		$this->start_controls_section(
			'settings_section',
			[
				'label' => esc_html__( 'Testimonial Item Settings', 'xgenious-master' ),
				'tab'   => Controls_Manager::TAB_CONTENT,
			]
		);
		$this->add_control( 'testimonial_items', [
			'label'       => esc_html__( 'Testimonial Item', 'xgenious-master' ),
			'type'        => Controls_Manager::REPEATER,
			'fields'      => [
				[
					'name'        => 'icon',
					'label'       => esc_html__( 'Icons', 'xgenious-master' ),
					'type'        => Controls_Manager::ICONS,
				],
				[
					'name'        => 'name',
					'label'       => esc_html__( 'Name', 'xgenious-master' ),
					'type'        => Controls_Manager::TEXT,
                    'label_block' => true,
					'description' => esc_html__( 'enter name', 'xgenious-master' ),
				],
				[
					'name'        => 'designation',
					'label'       => esc_html__( 'Designation', 'xgenious-master' ),
					'type'        => Controls_Manager::TEXT,
					'label_block' => true,
				],
				[
					'name'        => 'description',
					'label'       => esc_html__( 'Description', 'xgenious-master' ),
					'type'        => Controls_Manager::TEXTAREA,
					'description' => esc_html__( 'enter description', 'xgenious-master' ),
				]

			],
			'title_field' => '{{name}}'
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
		$settings = $this->get_settings_for_display();
		
		?>
		
		<section class="testimonial_area padding-top-50 padding-bottom-50">
        <div class="container">
            <div class="section_title center-text">
                <h2 class="title">
                <?php
                    $section_title = $settings['section_title'];
                    $section_title_with_color = str_replace(['{c}','{/c}'],['<span class="title-color">','</span>'],$section_title);
                    printf('<h2 class="title"> %1$s </h2>',wp_kses_post($section_title_with_color));
                ?>
                </h2>
            </div>
            <div class="row mt-5">
                
                    
                    <?php
                        $platform_list = $settings['testimonial_items'];
                        foreach($platform_list as $pl_list):
                    ?>
                    <div class="col-lg-4 col-md-6">
                    <div class="testimonial_slider_item wow fadeInUp" data-wow-delay=".1s">
                        <div class="testimonial_single testimonial_single__border padding-20 radius-10">
                            <div class="testimonial_single__icon">
                                <?php \Elementor\Icons_Manager::render_icon( $pl_list['icon'], [ 'aria-hidden' => 'true' ] ); ?>
                            </div>
                            <div class="testimonial_single__contents mt-3">
                                <p class="testimonial_single__para"><?php echo esc_html($pl_list['description'])?></p>
                                <div class="testimonial_single__flex mt-4">
                                    <div class="testimonial_single__author">
                                        <div class="testimonial_single__author__flex">
                                            <div class="testimonial_single__author__details">
                                                <h5 class="testimonial_single__author__name"><?php echo esc_html($pl_list['name']);?></h5>
                                                <p class="testimonial_single__author__subtitle"><?php echo esc_html($pl_list['designation']);?></p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="rating-wrap">
                                        <div class="ratings">
                                            <span class="hide-rating"></span>
                                            <span class="show-rating"></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    </div>
                    <?php endforeach;?>
                
            </div>
        </div>
    </section>
    
		<?php
	}
}

Plugin::instance()->widgets_manager->register( new Xgenious_Testimonial_Two_Widget() );