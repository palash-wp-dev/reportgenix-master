<?php
/**
 * Elementor Widget
 * @package Attorg
 * @since 1.0.0
 */

namespace Elementor;
class Xgenious_Our_Expertise_One_Widget extends Widget_Base {

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
		return 'xgenious-our-expertise-one-widget';
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
		return esc_html__( 'Our Expertise One', 'xgenious-master' );
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
        $this->add_control('our_expertise_lists',[
	        'label'       => esc_html__( 'Our Expertise List', 'xgenious-master' ),
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
        <section class="experties-area padding-top-60 padding-bottom-60">
            <div class="container container_1430">
                <div class="section-title">
                    <h2 class="title"> <?php  echo esc_html($settings['section_title']);?> </h2>
                    <p class="description"><?php  echo esc_html($settings['section_description']);?></p>
                </div>
                <div class="row g-4 mt-3">
                    <?php
                    $whyUsList = $settings['our_expertise_lists'];
                    foreach ($whyUsList as $list):
                    ?>
                    <div class="col-xxl-3 col-lg-4 col-sm-6">
                        <div class="single-experties single-experties-padding center-text single-experties-bg">
                            <div class="single-experties-icon">
	                            <?php \Elementor\Icons_Manager::render_icon( $list['icon'], [ 'aria-hidden' => 'true' ] ); ?>
                            </div>
                            <div class="single-experties-contents mt-3">
                                <h3 class="single-experties-contents-title"> <?php echo esc_html($list['title']);?> </h3>
                                <p class="single-experties-contents-para"><?php echo esc_html($list['description']);?> </p>
                            </div>
                        </div>
                    </div>
		            <?php endforeach;?>
                </div>
            </div>
        </section>
		<?php
	}
}

Plugin::instance()->widgets_manager->register( new Xgenious_Our_Expertise_One_Widget() );