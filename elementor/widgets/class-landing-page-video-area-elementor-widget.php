<?php
/**
 * Elementor Widget
 * @package xgenous
 * @since 1.0.0
 */

namespace Elementor;


class Xgenious_Landing_Page_Video_Area_One_Widget extends Widget_Base {

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
		return 'xgenious-landing-page-video-area-widget';
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
		return esc_html__( 'Landing: Video Area 01', 'xgenous-master' );
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
		$this->add_control('left_image',[
			'label'       => esc_html__( 'Left Image', 'xgenious-master' ),
			'type'        => Controls_Manager::MEDIA,
        ]);
        
		$this->add_control( 'video_url', [
			'type'    => Controls_Manager::URL,
			'label'   => esc_html__( 'Video URL', 'xgenious-master' ),
		] );
		$this->add_control( 'video_icon', [
			'type'    => Controls_Manager::ICONS,
			'label'   => esc_html__( 'Video Icon', 'xgenious-master' ),
		] );
			$this->add_control( 'video_text', [
			'type'    => Controls_Manager::TEXT,
			'label'   => esc_html__( 'Video Text', 'xgenious-master' ),
		] );
        $this->end_controls_section();
        


		$this->start_controls_section(
			'settings_section',
			[
				'label' => esc_html__( 'Right Settings', 'xgenious-master' ),
				'tab'   => Controls_Manager::TAB_CONTENT,
			]
		);

		$this->add_control('right_image',[
			'label'       => esc_html__( 'Right Image', 'xgenious-master' ),
			'type'        => Controls_Manager::MEDIA,
        ]);
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
		<section class="landing_page_video_area">
				<div class="container container_1430">
					<div class="row">
							<div class="col-lg-12">
								<div class="video_area_inner_wrapper">
								    <div class="left_content_wrapper">
								        <div class="image_wrap">
								             <img class="shape_image_left_one" src="<?php echo XGENIOUS_IMG.'/shopmart/left-top-shirt.svg';?>" alt="shopmart shape">
								             <img class="shape_image_left_two" src="<?php echo XGENIOUS_IMG.'/shopmart/left-top-sunglass.svg';?>" alt="shopmart shape">
								             <img class="shape_image_left_three" src="<?php echo XGENIOUS_IMG.'/shopmart/left-top-pant.svg';?>" alt="shopmart shape">
								            <?php 
								            	$image_id = $settings['left_image']['id'];
												$image_url = wp_get_attachment_image_src( $image_id, 'full', false );
												$image_alt = get_post_meta( $image_id, '_wp_attachment_image_alt', true );
												
												printf('<img src="%1$s" alt="%2$s">',current($image_url),$image_alt);
								            ?>
								        </div>
								        <div class="button_wrap">
								            <a href="<?php echo esc_url($settings['video_url']['url'] ?? '');?>" class="_video_url_btn mfp-iframe">
								            <?php \Elementor\Icons_Manager::render_icon( $settings['video_icon'], [ 'aria-hidden' => 'true' ] ); ?>
								            <?php echo esc_html($settings['video_text']);?>
								            </a>
								        </div>
								        
								    </div>
								    <div class="right_content_wrapper">
								        <div class="image_wrap">
								            <?php 
								            	$image_id = $settings['right_image']['id'];
												$image_url = wp_get_attachment_image_src( $image_id, 'full', false );
												$image_alt = get_post_meta( $image_id, '_wp_attachment_image_alt', true );
												
												printf('<img src="%1$s" alt="%2$s">',current($image_url),$image_alt);
								            ?>
								            <img class="shape_image" src="<?php echo XGENIOUS_IMG.'/shopmart/box-jail.svg';?>" alt="shopmart shape">
								            <img class="shape_image_top" src="<?php echo XGENIOUS_IMG.'/shopmart/right-image-top-shape.svg';?>" alt="shopmart shape">
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

Plugin::instance()->widgets_manager->register( new Xgenious_Landing_Page_Video_Area_One_Widget() );