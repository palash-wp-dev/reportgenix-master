<?php
/**
 * Elementor Widget
 * @package Attorg
 * @since 1.0.0
 */

namespace Elementor;
class Xgenious_Support_Area__One_Widget extends Widget_Base {

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
		return 'xgenious-support-area-one-widget';
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
		return esc_html__( 'Support Area One', 'xgenious-master' );
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
		$this->add_control('section_title',[
			'label'       => esc_html__( 'Section Title', 'xgenious-master' ),
			'type'        => Controls_Manager::TEXT,
			'label_block' => true
		]);
		$this->add_control('section_description',[
			'label'       => esc_html__( 'Section Description', 'xgenious-master' ),
			'type'        => Controls_Manager::TEXTAREA,
		]);

		$this->end_controls_section();
		$this->start_controls_section(
			'button_settings_section',
			[
				'label' => esc_html__( 'Button Settings', 'xgenious-master' ),
				'tab'   => Controls_Manager::TAB_CONTENT,
			]
		);
		$this->add_control('button_text',[
			'label'       => esc_html__( 'Button Text', 'xgenious-master' ),
			'type'        => Controls_Manager::TEXT,
			'label_block' => true
		]);
		$this->add_control('button_link',[
			'label'       => esc_html__( 'Button Link', 'xgenious-master' ),
			'type'        => Controls_Manager::URL,
			'label_block' => true
		]);
		$this->end_controls_section();

		$this->start_controls_section(
			'image_settings_section',
			[
				'label' => esc_html__( 'Image Settings', 'xgenious-master' ),
				'tab'   => Controls_Manager::TAB_CONTENT,
			]
		);
		$this->add_control('image',[
			'label'       => esc_html__( 'Image', 'xgenious-master' ),
			'type'        => Controls_Manager::MEDIA,
		]);
		$this->end_controls_section();


		$this->start_controls_section(
			'settings_section',
			[
				'label' => esc_html__( 'Item Settings', 'xgenious-master' ),
				'tab'   => Controls_Manager::TAB_CONTENT,
			]
		);
        $repeater = new Repeater();
		$repeater->add_control('icon',[
			'label'       => esc_html__( 'Icons', 'xgenious-master' ),
			'type'        => Controls_Manager::ICONS,
        ]);
		$repeater->add_control('title',[
			'label'       => esc_html__( 'Title', 'xgenious-master' ),
			'type'        => Controls_Manager::TEXT,
			'description' => esc_html__( 'enter title', 'xgenious-master' ),
			'label_block' => true
		]);
		$repeater->add_control('description',[
			'label'       => esc_html__( 'Description', 'xgenious-master' ),
			'type'        => Controls_Manager::TEXTAREA,
			'description' => esc_html__( 'enter description', 'xgenious-master' ),
		]);
        $this->add_control('why_us_lists',[
	        'label'       => esc_html__( 'Support Info List', 'xgenious-master' ),
	        'type'        => Controls_Manager::REPEATER,
            'fields' => $repeater->get_controls(),
            'title_field' => "{{{title}}}"
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
		$settings              = $this->get_settings_for_display();
		?>
        <section class="support-service-area">
            <div class="container container_1430">
                <div class="row g-5 align-items-center justify-content-between flex-row-reverse">
                    <div class="col-lg-6">
                        <div class="single-support-image-wrapper">
                            <div class="single-support-image-box">
                                <?php
                                    $img_id = $settings['image']['id'] ;
                                    $img_url_val = $img_id ? wp_get_attachment_image_src($img_id,'full',false) : '';
                                    $img_url = is_array($img_url_val) && !empty($img_url_val) ? $img_url_val[0] : '';
                                    $img_alt =  $img_id ? get_post_meta($img_id,'_wp_attachment_image_alt',true) : '';
                                    printf('<img src="%1$s" alt="%2$s">',$img_url,$img_alt);
                                ?>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-5 col-lg-6">
                        <div class="support-service-wrapper">
                            <div class="section-title text-left">
                                <h2 class="title"> <?php  echo esc_html($settings['section_title']);?> </h2>
                                <p class="para"> <?php  echo esc_html($settings['section_description']);?> </p>
                            </div>
                            <div class="support-service-contents mt-5">
                                    <?php
                                    $whyUsList = $settings['why_us_lists'];
                                    foreach ($whyUsList as $list):
                                    ?>
                                    <div class="contact-contents-inner-single">
                                        <div class="contact-contents-inner-single-flex">
                                            <div class="contact-contents-inner-single-icon">
                                                <?php \Elementor\Icons_Manager::render_icon( $list['icon'], [ 'aria-hidden' => 'true' ] ); ?>
                                            </div>
                                            <div class="contact-contents-inner-single-contents">
                                                <h4 class="contact-contents-inner-single-contents-title fw-500"> <?php echo esc_html($list['title']);?> </h4>
                                                <span class="contact-contents-inner-single-contents-item"> <?php echo esc_html($list['description']);?></span>
                                            </div>
                                        </div>
                                    </div>
                                    <?php endforeach; ?>
                                <div class="btn-wrapper d-flex flex-wrap align-items-center mt-5">
                                    <a href="<?php echo esc_url($settings['button_link']['url'] ?? '');?>" <?php echo ($settings['button_link']['is_external'] ? 'target="_blank"' : '');?> class="cmn-btn btn-bg-1"> <?php echo esc_html($settings['button_text']);?></a>
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

Plugin::instance()->widgets_manager->register( new Xgenious_Support_Area__One_Widget() );