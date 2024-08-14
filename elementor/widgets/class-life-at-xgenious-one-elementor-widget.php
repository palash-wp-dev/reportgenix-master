<?php
/**
 * Elementor Widget
 * @package xgenous
 * @since 1.0.0
 */

namespace Elementor;


class Xgenious_Life_At_Xgenious_Widget extends Widget_Base {

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
		return 'xgenious-life-at-xgenious-one-widget';
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
		return esc_html__( 'Life At Xgenious One', 'xgenous-master' );
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
		$this->add_control( 'title', [
			'type'    => Controls_Manager::TEXTAREA,
			'label'   => esc_html__( 'Title', 'xgenious-master' ),
			'description' => esc_html__('use {c}color with anchor{/c} , use {b}break into new line{/b}')
		] );
		$this->add_control( 'description', [
			'type'    => Controls_Manager::TEXTAREA,
			'label'   => esc_html__( 'Description', 'xgenious-master' ),
		] );
        $this->end_controls_section();

		$this->start_controls_section(
			'settings_section',
			[
				'label' => esc_html__( 'Item Settings', 'xgenious-master' ),
				'tab'   => Controls_Manager::TAB_CONTENT,
			]
		);

        $repeater = new Repeater();
		$repeater->add_control('image',[
			'label'       => esc_html__( 'Image', 'xgenious-master' ),
			'type'        => Controls_Manager::MEDIA,
        ]);
		$repeater->add_control('url',[
			'label'       => esc_html__( 'URL', 'xgenious-master' ),
			'type'        => Controls_Manager::URL,
			'description' => esc_html__( 'enter url', 'xgenious-master' ),
		]);
        $this->add_control('available_lists',[
	        'label'       => esc_html__( 'Available List', 'xgenious-master' ),
	        'type'        => Controls_Manager::REPEATER,
            'fields' => $repeater->get_controls(),
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
		<div class="gallery-area padding-top-120 padding-bottom-120">
			<div class="gallery-sahapes">
				<img src="<?php echo XGENIOUS_IMG;?>/gallery/wave-shape1.svg" alt="xgenious shape">
				<img src="<?php echo XGENIOUS_IMG;?>/gallery/wave-shape2.svg" alt="xgenious shape">
			</div>
			<div class="container container_1430">
				<div class="row">
					<div class="col-lg-12">
							<div class="section-title text-center ">
								<h2 class="title"> <?php echo esc_html($settings['title']);?> </h2>
								<p class="section-para mt-3 margin-bottom-80"><?php echo esc_html($settings['description']);?>  </p>
							</div>
						<div class="gallery-wrapper">
							<div class="gallery-wrapper-shapes">
								<img src="<?php echo XGENIOUS_IMG;?>/gallery/img-shape1.svg" alt="">
								<img src="<?php echo XGENIOUS_IMG;?>/gallery/img-shape2.svg" alt="">
							</div>
							<div class="gallery-wrapper-flex">
								<?php
									$whyUsList = $settings['available_lists'];
									foreach ($whyUsList as $list):
										$image_id = $list['image']['id'];
										$image_url = wp_get_attachment_image_src( $image_id, 'full', false );
										$image_alt = get_post_meta( $image_id, '_wp_attachment_image_alt', true );
										?>
										<div class="gallery-wrapper-single">
											<div class="gallery-wrapper-single-image">
											<?php printf('<img src="%1$s" alt="%2$s"> ',current($image_url),$image_alt);?>
											</div>
										</div>
								<?php endforeach;?>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<?php
	}
}

Plugin::instance()->widgets_manager->register( new Xgenious_Life_At_Xgenious_Widget() );