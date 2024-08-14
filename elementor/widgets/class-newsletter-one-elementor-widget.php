<?php
/**
 * Elementor Widget
 * @package xgenous
 * @since 1.0.0
 */

namespace Elementor;

use Elementor\Core\Kits\Controls\Repeater;

class Xgenious_Newsletter_Area_One_Widget extends Widget_Base {

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
		return 'xgenious-newsletter-area-one-widget';
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
		return esc_html__( 'Newsletter Area One', 'xgenous-master' );
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
		$this->add_control( 'link', [
			'type'    => Controls_Manager::URL,
			'label'   => esc_html__( 'Link', 'xgenious-master' ),
			'description' => esc_html__('link will only work if you use this tag in title {c}color with anchor{/c}')
		] );
		$this->add_control(
			'shortcode',
			[
				'label' => esc_html__( 'Enter your shortcode', 'elementor' ),
				'type' => Controls_Manager::TEXTAREA,
				'dynamic' => [
					'active' => true,
				],
				'placeholder' => '[gallery id="123" size="medium"]',
				'default' => '',
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
			<div class="newsletter-area section-bg-2 newsletter-margin padding-top-60 padding-bottom-60">
				<div class="newsletter-shapes">
					<img src="<?php echo XGENIOUS_IMG; ?>/footer/shape1.svg" alt="">
					<img src="<?php echo XGENIOUS_IMG; ?>/footer/shape2.svg" alt="">
				</div>
				<div class="container container-1430">
					<div class="row justify-content-center">
						<div class="col-lg-7">
							<div class="newsletter-contents text-center">
								
								<?php 
								$title_markup = $settings['title'];
								$url = $settings['link']['url'] ?? '';
	                            $title_markup = str_replace(['{c}','{/c}','{b}','{/b}'],['<a class="newsletter-contents-title-signup" href="'.$url.'">','</a>','<span class="newsletter-contents-title-span">','</span>'],$title_markup);
								
								printf('<h2 class="newsletter-contents-title">%1$s</h2>',$title_markup);
	                            ?>
								
								<div class="newsletter-contents-form custom-form mt-4">
								<?php
                                    $shortcode = $this->get_settings_for_display( 'shortcode' );
                                    $shortcode = do_shortcode( shortcode_unautop( $shortcode ) );
                                    echo $shortcode;
	                            ?>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		<?php
	}
}

Plugin::instance()->widgets_manager->register( new Xgenious_Newsletter_Area_One_Widget() );