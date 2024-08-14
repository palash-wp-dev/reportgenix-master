<?php
/**
 * Elementor Widget
 * @package xgenous
 * @since 1.0.0
 */

namespace Elementor;

use Elementor\Core\Kits\Controls\Repeater;

class Xgenious_Landing_Mobile_App_Area_One_Widget extends Widget_Base {

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
		return 'xgenious-landing-mobile-app-area-one-widget';
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
		return esc_html__( 'Landing Mobile App One', 'xgenous-master' );
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
		$this->add_control( 'row_reverse', [
			'type'    => Controls_Manager::SWITCHER,
			'label'   => esc_html__( 'Row Reverse', 'xgenious-master' ),
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

		$this->start_controls_section(
			'settings_section',
			[
				'label' => esc_html__( 'Button Settings', 'xgenious-master' ),
				'tab'   => Controls_Manager::TAB_CONTENT,
			]
		);
		$repeater = new \Elementor\Repeater();
		$repeater->add_control('button_text',[
			'label'       => esc_html__( 'Button Text', 'xgenious-master' ),
			'type'        => Controls_Manager::TEXT,
			'description' => esc_html__( 'enter button text', 'xgenious-master' ),
			'label_block' => true
		]);
		$repeater->add_control('button_link',[
			'label'       => esc_html__( 'Button Link', 'xgenious-master' ),
			'type'        => Controls_Manager::URL,
			'description' => esc_html__( 'enter button link', 'xgenious-master' ),
			'label_block' => true
		]);
		$repeater->add_control('button_style',[
			'label'       => esc_html__( 'Button Style', 'xgenious-master' ),
			'type'        => Controls_Manager::SELECT,
			'options' => [
				'btn-bg-1' => __('Button Style 01'),
				'btn-bg-adminPanel' => __('Button Style 02'),
				'btn-bg-userPanel' => __('Button Style 03'),
			],
			'default' => 'btn-bg-1',
			'description' => esc_html__( 'enter button style', 'xgenious-master' ),
		]);
		$this->add_control('faq_lists',[
			'label'       => esc_html__( 'Button List', 'xgenious-master' ),
			'type'        => Controls_Manager::REPEATER,
			'fields' => $repeater->get_controls(),
			'title_field' => "{{{button_text}}}"
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
        <section class="support-area padding-top-60 padding-bottom-60">
            <div class="container container_1430">
                <div class="support-area-wrapper support-wrapper-padding section-bg-2 radius-10">
                    <div class="row g-5 align-items-center justify-content-between <?php echo ($settings['row_reverse'] === 'yes') ? 'flex-row-reverse' : '';?>">
                        <div class="col-lg-6">
                            <div class="support-wrapper-image">
                                <div class="support-wrapper-image-thumb">
	                                <?php
	                                $image_id = $settings['image']['id'];
	                                $image_src = !empty($image_id) ? wp_get_attachment_image_src($image_id,'full')[0] : '';
	                                $image_alt = !empty($image_id) ? get_post_meta($image_id,'_wp_attachment_image_alt',true) : '';
	                                printf('<img src="%1$s" alt="%2$s"/>',$image_src,$image_alt);
	                                ?>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="support-wrapper">
                                <div class="support-wrapper-contents">
                                    <h2 class="support-wrapper-contents-title"> <?php echo esc_html($settings['title']);?></h2>
                                    <div class="support-wrapper-contents-para mt-3"> <?php echo wp_kses_post($settings['description']);?> </div>
                                    <div class="btn-wrapper d-flex flex-wrap mt-4 mt-lg-5">
	                                    <?php
	                                    $faq_list = $settings['faq_lists'];
	                                    foreach ($faq_list as $list):
		                                    printf('<a href="%1$s" target="%4$s"  class="cmn-btn %2$s"> %3$s </a>',$list['button_link']['url'],$list['button_style'],$list['button_text'],$list['button_link']['is_external'] ? '_blank' : '_self');
	                                    endforeach;?>
                                    </div>
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

Plugin::instance()->widgets_manager->register( new Xgenious_Landing_Mobile_App_Area_One_Widget() );