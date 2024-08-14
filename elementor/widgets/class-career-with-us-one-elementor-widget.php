<?php
/**
 * Elementor Widget
 * @package xgenous
 * @since 1.0.0
 */

namespace Elementor;


class Xgenious_Career_With_Us_Widget extends Widget_Base {

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
		return 'xgenious-career-with-us-one-widget';
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
		return esc_html__( 'Career With Us One', 'xgenous-master' );
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
			'contact_Form_settings_section',
			[
				'label' => esc_html__( 'General Settings', 'xgenous-master' ),
				'tab'   => Controls_Manager::TAB_CONTENT,
			]
		);
		$this->add_control( 'subtitle', [
			'type'    => Controls_Manager::TEXT,
			'label'   => esc_html__( 'Subtitle', 'xgenious-master' ),
		] );
		$this->add_control( 'title', [
			'type'    => Controls_Manager::TEXTAREA,
			'label'   => esc_html__( 'Title', 'xgenious-master' ),
		] );
		$this->add_control( 'description', [
			'type'    => Controls_Manager::TEXTAREA,
			'label'   => esc_html__( 'Description', 'xgenious-master' ),
		] );

		$this->add_control( 'button_text', [
			'type'    => Controls_Manager::TEXT,
			'label'   => esc_html__( 'Button Text', 'xgenious-master' ),
		] );
		$this->add_control( 'button_url', [
			'type'    => Controls_Manager::URL,
			'label'   => esc_html__( 'Button URL', 'xgenious-master' ),
		] );
		$this->add_control( 'image', [
			'type'    => Controls_Manager::MEDIA,
			'label'   => esc_html__( 'Image', 'xgenious-master' ),
		] );
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
		<section class="join-area padding-top-60 padding-bottom-60 active">
				<div class="container container_1430">
				<div class="customer-wrapper-all customer-wrapper-padding section-bg radius-10">
					<div class="row align-items-center justify-content-between flex-lg-row flex-column-reverse">
						<div class="col-lg-5">
							<div class="join-wrapper">
								<div class="section-title text-left">
									<?php 
									
										printf('<span class="sub-title color-one d-block mb-3">%1$s</span>',$settings['subtitle']);
										printf('<h2 class="title">%1$s</h2>',$settings['title']);
										printf('<p class="section-para mt-3">%1$s</p>',$settings['description']);
									?>
								</div>
								<?php if(isset($settings['button_url']['url']) && !empty($settings['button_url']['url'])): ?>
								<div class="join-contents mt-4 mt-lg-5">
									<div class="btn-wrapper">
										<a href="<?php echo esc_url($settings['button_url']['url']); ?>" class="cmn-btn btn-outline-1"> <?php echo esc_html($settings['button_text']); ?></a>
									</div>
								</div>
								<?php endif; ?>
							</div>
						</div>
						<div class="col-lg-6">
							<div class="join-image-wrapper">
								<div class="join-shape">
									<img src="<?php echo XGENIOUS_IMG;?>/career/career-shape1.svg" alt="">
									<img src="<?php echo XGENIOUS_IMG;?>/career/career-shape2.svg" alt="">
								</div>
								<div class="join-image">
									<?php 
										$image_id = $settings['image']['id'];
										$image_url = wp_get_attachment_image_src( $image_id, 'full', false );
										$image_alt = get_post_meta( $image_id, '_wp_attachment_image_alt', true );
										printf('<img src="%1$s" alt="%2$s">',esc_url(current($image_url)),esc_attr($image_alt));
									?>
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

Plugin::instance()->widgets_manager->register( new Xgenious_Career_With_Us_Widget() );