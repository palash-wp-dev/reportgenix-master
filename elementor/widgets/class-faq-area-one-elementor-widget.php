<?php
/**
 * Elementor Widget
 * @package Attorg
 * @since 1.0.0
 */

namespace Elementor;
class Xgenious_FAQ_Area_One_Widget extends Widget_Base {

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
		return 'xgenious-faq-area-one-widget';
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
		return esc_html__( 'FAQ Area One', 'xgenious-master' );
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
		$this->add_control('right_image',[
			'label'       => esc_html__( 'Right Image', 'xgenious-master' ),
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
		$repeater->add_control('title',[
			'label'       => esc_html__( 'Title', 'xgenious-master' ),
			'type'        => Controls_Manager::TEXT,
			'description' => esc_html__( 'enter title', 'xgenious-master' ),
			'label_block' => true
		]);
		$repeater->add_control('active_initially',[
			'label'       => esc_html__( 'Open Initially', 'xgenious-master' ),
			'type'        => Controls_Manager::SWITCHER,
			'description' => esc_html__( 'keep open initially', 'xgenious-master' ),
		]);
		$repeater->add_control('description',[
			'label'       => esc_html__( 'Description', 'xgenious-master' ),
			'type'        => Controls_Manager::WYSIWYG,
			'description' => esc_html__( 'enter description', 'xgenious-master' ),
		]);
        $this->add_control('faq_lists',[
	        'label'       => esc_html__( 'FAQ List', 'xgenious-master' ),
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
		$settings = $this->get_settings_for_display();
		?>
        <section class="faq-area padding-top-60 padding-bottom-60">
            <div class="container container_1430">
                <div class="row g-5 align-items-center justify-content-between flex-row-reverse">
                    <div class="col-lg-6">
                        <div class="question-thumb-wrapper">
                            <div class="thumb center-text">
                                <?php
                                    $img_id = $settings['right_image']['id'] ;
                                    $img_url_val = $img_id ? wp_get_attachment_image_src($img_id,'full',false) : '';
                                    $img_url = is_array($img_url_val) && !empty($img_url_val) ? $img_url_val[0] : '';
                                    $img_alt =  $img_id ? get_post_meta($img_id,'_wp_attachment_image_alt',true) : '';
                                    printf('<img src="%1$s" alt="%2$s">',$img_url,$img_alt);
                                ?>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="faq-wrapper-all">
                            <div class="section-title text-left">
                                <h2 class="title"><?php  echo esc_html($settings['section_title']);?>  </h2>
                            </div>
                            <div class="faq-wrapper mt-5">
                                <div class="faq-contents">
                                    <?php
                                        $faq_list = $settings['faq_lists'];
                                        foreach ($faq_list as $list):
                                    ?>
                                    <div class="faq-item wow fadeInLeft <?php echo ($list['active_initially'] === 'yes') ? 'active open': ''; ?>" data-wow-delay=".1s">
                                        <h3 class="faq-title">
                                            <?php echo  esc_html($list['title']);?>
                                        </h3>
                                        <div class="faq-panel">
                                            <p class="faq-para"><?php echo  wp_kses_post($list['description']);?> </p>
                                        </div>
                                    </div>
                                    <?php endforeach;?>
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

Plugin::instance()->widgets_manager->register( new Xgenious_FAQ_Area_One_Widget() );