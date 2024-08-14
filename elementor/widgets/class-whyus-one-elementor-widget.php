<?php
/**
 * Elementor Widget
 * @package Attorg
 * @since 1.0.0
 */

namespace Elementor;
class Xgenious_Why_Choose_Us_One_Widget extends Widget_Base {

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
		return 'xgenious-why-choose-us-one-widget';
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
		return esc_html__( 'Why Choose Us One', 'xgenious-master' );
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
        $this->add_control('why_us_lists',[
	        'label'       => esc_html__( 'Why Us List', 'xgenious-master' ),
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
        <section class="choose-area padding-top-60 padding-bottom-60">
				<div class="choose-line-shape">
					<img src="<?php echo XGENIOUS_IMG .'/choose/choose_line.png'?>" alt="<?php esc_attr_e('xgenious website shape','xgenious-master');?>">
				</div>
				<div class="container container_1430">
					<div class="section-title">
						<h2 class="title"><?php  echo esc_html($settings['section_title']);?> </h2>
                        <p class="description"><?php  echo esc_html($settings['section_description']);?></p>
					</div>
					<div class="row gy-4 mt-3">
                        <?php

                            $whyUsList = $settings['why_us_lists'];
                            foreach ($whyUsList as $list):
                        ?>
						<div class="col-xl-4 col-sm-6">
							<div class="single-choose bg-white single-choose-padding single-choose-border">
								<div class="single-choose-icon">
									<?php \Elementor\Icons_Manager::render_icon( $list['icon'], [ 'aria-hidden' => 'true' ] ); ?>
								</div>
								<div class="single-choose-contents mt-4">
									<h2 class="single-choose-contents-title"> <?php echo esc_html($list['title']);?></h2>
									<p class="single-choose-contents-para mt-3"> <?php echo esc_html($list['description']);?> </p>
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

Plugin::instance()->widgets_manager->register( new Xgenious_Why_Choose_Us_One_Widget() );