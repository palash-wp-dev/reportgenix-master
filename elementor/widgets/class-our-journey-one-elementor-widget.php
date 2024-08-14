<?php
/**
 * Elementor Widget
 * @package Attorg
 * @since 1.0.0
 */

namespace Elementor;
class Xgenious_Our_Journey_One_Widget extends Widget_Base {

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
		return 'xgenious-our-journey-one-widget';
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
		return esc_html__( 'Our Journey One', 'xgenious-master' );
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
		$this->add_control('section_subtitle',[
			'label'       => esc_html__( 'Subtitle', 'xgenious-master' ),
			'type'        => Controls_Manager::TEXT,
			'label_block' => true
		]);
		$this->add_control('section_title',[
			'label'       => esc_html__( 'Title', 'xgenious-master' ),
			'type'        => Controls_Manager::TEXT,
			'label_block' => true
		]);
		$this->add_control('section_description',[
			'label'       => esc_html__( 'Description', 'xgenious-master' ),
			'type'        => Controls_Manager::TEXTAREA,
		]);

		$this->add_control('button_status',[
			'label'       => esc_html__( 'Button Status', 'xgenious-master' ),
			'type'        => Controls_Manager::SWITCHER
		]);
		$this->add_control('button_text',[
			'label'       => esc_html__( 'Button Text', 'xgenious-master' ),
			'type'        => Controls_Manager::TEXT,
			'label_block' => true,
            'condition' => ['button_status' => 'yes']
		]);
		$this->add_control('button_url',[
			'label'       => esc_html__( 'Button URL', 'xgenious-master' ),
			'type'        => Controls_Manager::URL,
			'label_block' => true,
			'condition' => ['button_status' => 'yes']
		]);

		$this->end_controls_section();


		$this->start_controls_section(
			'settings_section',
			[
				'label' => esc_html__( 'Images Settings', 'xgenious-master' ),
				'tab'   => Controls_Manager::TAB_CONTENT,
			]
		);
		$this->add_control('achieve_logo',[
			'label'       => esc_html__( 'Logo', 'xgenious-master' ),
			'type'        => Controls_Manager::MEDIA,
		]);
		$this->add_control('achieve_image_one',[
			'label'       => esc_html__( 'Image One', 'xgenious-master' ),
			'type'        => Controls_Manager::MEDIA,
		]);
		$this->add_control('achieve_image_two',[
			'label'       => esc_html__( 'Image Two', 'xgenious-master' ),
			'type'        => Controls_Manager::MEDIA,
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
        <section class="achieve-area padding-top-60 padding-bottom-60 active">
            <div class="container container_1430">
                <div class="row g-5 align-items-center">
                    <div class="col-lg-6">
                        <div class="achieve-image-wrapper">
                            <div class="achieve-image-wrapper-shapes">
                                <img src="<?php echo XGENIOUS_IMG;?>/achievement/achieve-shape1.svg" alt="">
                                <img src="<?php echo XGENIOUS_IMG;?>/achievement/achieve-shape2.svg" alt="">
                            </div>
                            <a href="<?php echo get_site_url();?>" class="achieve-image-wrapper-logo">
                                <?php
                                    $achieve_logo_id = $settings['achieve_logo']['id'] ?? '';
                                    $achieve_logo_image_src = !empty($achieve_logo_id) ? wp_get_attachment_image_src($achieve_logo_id,'full')[0] : '';
                                    $achieve_logo_image_alt = !empty($achieve_logo_id) ? get_post_meta($achieve_logo_id,'_wp_attachment_image_alt',true) : '';
                                    printf('<img src="%1$s" alt="%2$s"/>',$achieve_logo_image_src,$achieve_logo_image_alt);
                                ?>
                            </a>
                            <div class="achieve-image-wrapper-flex">
                                <div class="achieve-image">
	                                <?php
                                        $achieve_logo_id = $settings['achieve_image_one']['id'] ?? '';
                                        $achieve_logo_image_src = !empty($achieve_logo_id) ? wp_get_attachment_image_src($achieve_logo_id,'full')[0] : '';
                                        $achieve_logo_image_alt = !empty($achieve_logo_id) ? get_post_meta($achieve_logo_id,'_wp_attachment_image_alt',true) : '';
                                        printf('<img src="%1$s" alt="%2$s"/>',$achieve_logo_image_src,$achieve_logo_image_alt);
	                                ?>
                                </div>
                                <div class="achieve-image">
	                                <?php
                                        $achieve_logo_id = $settings['achieve_image_two']['id'] ?? '';
                                        $achieve_logo_image_src = !empty($achieve_logo_id) ? wp_get_attachment_image_src($achieve_logo_id,'full')[0] : '';
                                        $achieve_logo_image_alt = !empty($achieve_logo_id) ? get_post_meta($achieve_logo_id,'_wp_attachment_image_alt',true) : '';
                                        printf('<img src="%1$s" alt="%2$s"/>',$achieve_logo_image_src,$achieve_logo_image_alt);
	                                ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="achieve-wrapper">
                            <div class="section-title text-left">
                                <span class="sub-title color-one d-block mb-3"> <?php  echo esc_html($settings['section_subtitle']);?> </span>
                                <h2 class="title"> <?php  echo $settings['section_title'];?> </h2>
                                <p class="section-para mt-3"> <?php  echo esc_html($settings['section_description']);?> </p>
                            </div>
                            <div class="achieve-contents mt-4 mt-lg-5">
                                <?php
                                    if($settings['button_status'] === 'yes'){
                                        printf('<div class="btn-wrapper"><a href="%1$s" class="cmn-btn btn-bg-1"> %2$s </a></div>',$settings['button_url']['url'],$settings['button_text']);
                                    }
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

Plugin::instance()->widgets_manager->register( new Xgenious_Our_Journey_One_Widget() );