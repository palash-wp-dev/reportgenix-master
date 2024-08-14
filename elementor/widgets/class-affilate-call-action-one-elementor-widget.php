<?php
/**
 * Elementor Widget
 * @package xgenous
 * @since 1.0.0
 */

namespace Elementor;

use Elementor\Core\Kits\Controls\Repeater;

class Xgenious_Affiliate_Call_To_Action_Area_One_Widget extends Widget_Base {

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
		return 'xgenious-affiliate-callto-action-one-widget';
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
		return esc_html__( 'Affiliate: CTA 01', 'xgenous-master' );
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
				'label' => esc_html__( 'Section Contents', 'xgenous-master' ),
				'tab'   => Controls_Manager::TAB_CONTENT,
			]
		);
		
		$this->add_control( 'title', [
			'type'    => Controls_Manager::TEXTAREA,
			'label'   => esc_html__( 'Title', 'xgenious-master' ),
			'description'=> __('user {c}for color{/c} text','xgenious-master')
		] );
		$this->add_control( 'description', [
			'type'    => Controls_Manager::WYSIWYG,
			'label'   => esc_html__( 'Description', 'xgenious-master' ),
		] );
		$this->add_control( 'button_status', [
			'type'    => Controls_Manager::SWITCHER,
			'label'   => esc_html__( 'Button Status', 'xgenious-master' ),
		] );
		$this->add_control( 'button_text', [
			'type'    => Controls_Manager::TEXTAREA,
			'label'   => esc_html__( 'Button Text', 'xgenious-master' ),
		] );
		$this->add_control( 'button_link', [
			'type'    => Controls_Manager::URL,
			'label'   => esc_html__( 'Button Link', 'xgenious-master' ),
		] );
		$this->add_control('button_style',[
			'label'       => esc_html__( 'Button Style', 'xgenious-master' ),
			'type'        => Controls_Manager::SELECT,
            'options' => [
                'btn-bg-1' => __('Button Style 01'),
                'btn-bg-adminPanel' => __('Button Style 02'),
                'btn-bg-userPanel' => __('Button Style 03')
                ],
                'default'=> 'btn-bg-1'
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
		<div class="newsletter_area affiliate-calltoaction">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-10">
                        <div class="newsletter_wrapper newsletter_wrapper_padding newsletter-bg radius-20 wow zoomIn" data-wow-delay=".2s">
                            <div class="newsletter_contents newsletter_contents__width center-text">
                                <h3 class="newsletter_contents__title"> <?php echo wp_kses_post(str_replace(['{c}','{/c}'],['<span class="color-text">','</span>'],$settings['title']));?></h3>
                                <div class="newsletter_contents__para mt-3">
                                    <p><?php echo wp_kses_post($settings['description']);?></p>
                                </div>
                                <?php if($settings['button_status'] === 'yes'):?>
                                <div class="btn-wrapper mt-4">
                                    <a href="<?php echo esc_url($settings['button_link']['url'] ?? '');?>" class="cmn-btn <?php echo esc_attr($settings['button_style']);?>"><?php echo esc_html($settings['button_text']);?></a>
                                </div>
                                <?php endif;?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
		<?php
	}
}

Plugin::instance()->widgets_manager->register( new Xgenious_Affiliate_Call_To_Action_Area_One_Widget() );