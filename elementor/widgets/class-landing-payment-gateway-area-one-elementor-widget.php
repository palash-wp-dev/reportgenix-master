<?php
/**
 * Elementor Widget
 * @package xgenous
 * @since 1.0.0
 */

namespace Elementor;

use Elementor\Core\Kits\Controls\Repeater;

class Xgenious_Landing_Payment_Gateway_Area_One_Widget extends Widget_Base {

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
		return 'xgenious-landing-payment-gateway-area-one-widget';
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
		return esc_html__( 'Landing Payment Gateway One', 'xgenous-master' );
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
			'type'    => Controls_Manager::WYSIWYG,
			'label'   => esc_html__( 'Description', 'xgenious-master' ),
		] );

        $this->end_controls_section();

		$this->start_controls_section(
			'settings_section',
			[
				'label' => esc_html__( 'Image Settings', 'xgenious-master' ),
				'tab'   => Controls_Manager::TAB_CONTENT,
			]
		);
		$repeater = new \Elementor\Repeater();
		$repeater->add_control('button_link',[
			'label'       => esc_html__( 'Button Link', 'xgenious-master' ),
			'type'        => Controls_Manager::URL,
			'description' => esc_html__( 'enter button link', 'xgenious-master' ),
			'label_block' => true
		]);
		$repeater->add_control( 'image', [
			'type'    => Controls_Manager::MEDIA,
			'label'   => esc_html__( 'Image', 'xgenious-master' ),
		]);
		$this->add_control('faq_lists',[
			'label'       => esc_html__( 'Images', 'xgenious-master' ),
			'type'        => Controls_Manager::REPEATER,
			'fields' => $repeater->get_controls()
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
				'selector' => '{{WRAPPER}} .section-title .title'
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
        <section class="payment-area pading-top-60 padding-bottom-60" >
            <div class="container container_1430">
                <div class="section-title max-width-col-8">
                    <h2 class="title"> <?php echo esc_html($settings['title']);?> </h2>
                    <div class="para"> <?php echo wp_kses_post($settings['description']);?> </div>
                </div>
                <div class="row mt-5">
                    <div class="col-lg-12">
                        <div class="payment-wrapper">
                            <div class="payment-wrapper-item">
	                            <?php
	                            $faq_list = $settings['faq_lists'];
	                            foreach ($faq_list as $list):
		                            $image_id = $list['image']['id'];
		                            $image_src = !empty($image_id) ? wp_get_attachment_image_src($image_id,'full')[0] : '';
		                            $image_alt = !empty($image_id) ? get_post_meta($image_id,'_wp_attachment_image_alt',true) : '';
		                            printf(' <div class="payment-wrapper-item-card"><a href="%1$s" target="%2$s" > <img src="%3$s" alt="%4$s"></a></div>',$list['button_link']['url'],$list['button_link']['is_external'] ? '_blank' : '_self',$image_src,$image_alt);
	                            endforeach;?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
		<?php
	}
}

Plugin::instance()->widgets_manager->register( new Xgenious_Landing_Payment_Gateway_Area_One_Widget() );