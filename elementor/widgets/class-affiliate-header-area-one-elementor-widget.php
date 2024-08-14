<?php
/**
 * Elementor Widget
 * @package xgenous
 * @since 1.0.0
 */

namespace Elementor;

use Elementor\Core\Kits\Controls\Repeater;

class Xgenious_Affiliate_Header_Area_One_Widget extends Widget_Base {

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
		return 'xgenious-affiliate-header-area-one-widget';
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
		return esc_html__( 'Affiliate: Header 01', 'xgenous-master' );
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
		$this->add_control( 'button_text', [
			'type'    => Controls_Manager::TEXT,
			'label'   => esc_html__( 'Button Text', 'xgenious-master' ),
		] );
		$this->add_control( 'button_link', [
			'type'    => Controls_Manager::URL,
			'label'   => esc_html__( 'Button Link', 'xgenious-master' ),
		] );
		$this->add_control( 'title', [
			'type'    => Controls_Manager::TEXTAREA,
			'label'   => esc_html__( 'Title', 'xgenious-master' ),
			'description' => esc_html__('use {c}color with anchor{/c} , use {b}break into new line{/b}')
		] );
		$this->add_control( 'description', [
			'type'    => Controls_Manager::WYSIWYG,
			'label'   => esc_html__( 'Description', 'xgenious-master' ),
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
		<section class="banner-area affiliate-banner banner-padding">
				<div class="container container_1430">
					<div class="row align-items-center justify-content-between flex-lg-row flex-column-reverse">
						<div class="col-xxl-6 col-lg-12">
							<div class="banner-content-wrapper">
								<div class="banner-contents banner-content-padding">
									<?php 
										printf('<h1 class="banner-contents-title">%1$s</h1>',esc_html($settings['title']));
										printf('<div class="banner-contents-para mt-4">%1$s</div>',wp_kses_post($settings['description']));
									?>
								    <div class="btn-wrapper d-flex flex-wrap mt-4">
                                        <a href="<?php echo esc_url($settings['button_link']['url'] ?? '')?>" class="cmn-btn btn-bg-userPanel" target="_blank" rel="noopener"><?php echo esc_html($settings['button_text'])?></a>
                                    </div>
								</div>
							</div>
						</div>
						<div class="col-xxl-5 col-lg-12">
							<div class="banner-image-wrapper">
								<div class="banner-image">
								      <img class="affiliate-header-shape" src="<?php echo XGENIOUS_IMG.'/affiliate/affiliate-header-shape.svg';?>" alt="affiliate header shape">
									<?php 
										$image_id = $settings['image']['id'];
										$image_src = !empty($image_id) ? wp_get_attachment_image_src($image_id,'full')[0] : '';
										$image_alt = !empty($image_id) ? get_post_meta($image_id,'_wp_attachment_image_alt',true) : '';
										printf('<img src="%1$s" alt="%2$s"/>',$image_src,$image_alt);
									?>
								</div>
							</div>
						</div>
					</div>
				</div>
			</section>
		<?php
	}
}

Plugin::instance()->widgets_manager->register( new Xgenious_Affiliate_Header_Area_One_Widget() );