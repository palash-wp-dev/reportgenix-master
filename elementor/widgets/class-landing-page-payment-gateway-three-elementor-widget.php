<?php
/**
 * Elementor Widget
 * @package Attorg
 * @since 1.0.0
 */

namespace Elementor;
class Xgenious_Landing_Payment_Gateway_Three_Widget extends Widget_Base {

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
		return 'xgenious-payment-gateway-three-widget';
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
		return esc_html__( 'Payment Gateway: 03', 'xgenious-master' );
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
		$this->add_control('title',[
			'label'       => esc_html__( 'Title', 'xgenious-master' ),
			'type'        => Controls_Manager::TEXTAREA,
			'label_block' => true
		]);
		$this->add_control('description',[
			'label'       => esc_html__( 'Description', 'xgenious-master' ),
			'type'        => Controls_Manager::WYSIWYG
		]);

		$this->end_controls_section();
		
		
		$this->start_controls_section(
			'_button_settings_section',
			[
				'label' => esc_html__( 'Payment Gateway Images Settings', 'xgenious-master' ),
				'tab'   => Controls_Manager::TAB_CONTENT,
			]
		);
		$this->add_control('payment_image',[
			'label'       => esc_html__( 'Image', 'xgenious-master' ),
			'type'        => Controls_Manager::MEDIA,
			'description' => esc_html__( 'select image', 'xgenious-master' ),
			'label_block' => true
		]);
		
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
		<section class="payment_area">
        <div class="container container_1430">
            <div class="row g-5 flex-row-reverse">
                <div class="col-lg-6">
                    <div class="payment_single">
                        <div class="section_title text-left">
                            <h2 class="title"><?php echo esc_html($settings['title']); ?></h2>
                            <div class="section_para"><?php echo wp_kses_post($settings['description']); ?></div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="payment_wrapper">
                        <div class="payment_single__card">
                            <?php
                            //payment_image
                            $image_id = $settings['payment_image']['id'];
                    		$image_src = !empty($image_id) ? wp_get_attachment_image_src($image_id,'full')[0] : '';
                    		$image_alt = !empty($image_id) ? get_post_meta($image_id,'_wp_attachment_image_alt',true) : '';
                            printf('<div class="payment_single__card__item wow fadeInLeft" data-wow-delay=".1s" ><img src="%1$s" alt="%2$s"></div>',esc_url($image_src),esc_attr($image_alt));
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

Plugin::instance()->widgets_manager->register( new Xgenious_Landing_Payment_Gateway_Three_Widget() );