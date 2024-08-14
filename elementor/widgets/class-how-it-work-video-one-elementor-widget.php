<?php
/**
 * Elementor Widget
 * @package Attorg
 * @since 1.0.0
 */

namespace Elementor;
class Xgenious_HowItWorkVideoOne_Widget extends Widget_Base {

	/**
	 * Get widget name.
	 *
	 * Retrieve Elementor widget name.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return string Widget name.
	 */
	public function get_name() {
		return 'xgenious-how-it-work-video-one-widget';
	}

	/**
	 * Get widget title.
	 *
	 * Retrieve Elementor widget title.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return string Widget title.
	 */
	public function get_title() {
		return esc_html__( 'How It Work: 01', 'xgenious-master' );
	}

	/**
	 * Get widget icon.
	 *
	 * Retrieve Elementor widget icon.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return string Widget icon.
	 */
	public function get_icon() {
		return 'eicon-image';
	}

	/**
	 * Get widget categories.
	 *
	 * Retrieve the list of categories the Elementor widget belongs to.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return array Widget categories.
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
		$this->add_control(
			'title',
			[
				'label'       => esc_html__( 'Title', 'xgenious-master' ),
				'type'        => Controls_Manager::TEXTAREA,
				'description' => esc_html__( 'enter title.', 'xgenious-master' ),
				'default'     => esc_html__('how it work','xgenious-master')
			]
		);
		$this->add_control(
			'image',
			[
				'label'       => esc_html__( 'Image', 'xgenious-master' ),
				'type'        => Controls_Manager::MEDIA,
				'description' => esc_html__( 'upload image.', 'xgenious-master' ),
			]
		);
		$this->add_control(
			'link',
			[
				'label'       => esc_html__( 'link', 'xgenious-master' ),
				'type'        => Controls_Manager::URL,
				'description' => esc_html__( 'enter link.', 'xgenious-master' )
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
		$image_id = $settings['image']['id'];
		$image_src = !empty($image_id) ? wp_get_attachment_image_src($image_id,'full')[0] : '';
		$image_alt = !empty($image_id) ? get_post_meta($image_id,'_wp_attachment_image_alt',true) : '';
		?>
		<section class="works_area padding-top-50 padding-bottom-50">
        <div class="container">
            <div class="section_title center-text">
                <h2 class="title"> <?php echo esc_html__($settings['title'])?> </h2>
            </div>
            <div class="row gy-4 mt-4 justify-content-center">
                <div class="col-lg-10 wow zoomIn" data-wow-delay=".2s">
                    <div class="single_works">
                        <div class="single_works__thumb">
                            <img src="<?php echo esc_url($image_src);?>" alt="<?php echo esc_attr($image_alt);?>">
                        </div>
                        <a href="<?php echo esc_url($settings['link']['url'])?>" class="single_works__video video_popup">
                            <i class="fa fa-play"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
		<?php
	}
}

Plugin::instance()->widgets_manager->register( new Xgenious_HowItWorkVideoOne_Widget() );