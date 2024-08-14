<?php
/**
 * Elementor Widget
 * @package Attorg
 * @since 1.0.0
 */

namespace Elementor;
class Xgenious_Price_Plan_One_Widget extends Widget_Base {

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
		return 'xgenious-price-plan-one-widget';
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
		return esc_html__( 'Price Plan One', 'xgenious-master' );
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
		$repeater->add_control('active_plan',[
			'label'       => esc_html__( 'Active Plan', 'xgenious-master' ),
			'type'        => Controls_Manager::SWITCHER,
		]);
		$repeater->add_control('subtitle',[
			'label'       => esc_html__( 'Subtitle', 'xgenious-master' ),
			'type'        => Controls_Manager::TEXT,
			'label_block' => true,
            'condition' => ['active_plan' => 'yes']
        ]);
		$repeater->add_control('title',[
			'label'       => esc_html__( 'Title', 'xgenious-master' ),
			'type'        => Controls_Manager::TEXT,
			'description' => esc_html__( 'enter title', 'xgenious-master' ),
			'label_block' => true
		]);
		$repeater->add_control('price',[
			'label'       => esc_html__( 'Price', 'xgenious-master' ),
			'type'        => Controls_Manager::TEXT,
			'description' => esc_html__( 'enter price use {m}mo{/m} for month or yr', 'xgenious-master' ),
			'label_block' => true
		]);
		$repeater->add_control('feature',[
			'label'       => esc_html__( 'Features', 'xgenious-master' ),
			'type'        => Controls_Manager::TEXTAREA,
			'description' => esc_html__( 'enter new line for new feature', 'xgenious-master' ),
		]);

		$repeater->add_control('button_status',[
			'label'       => esc_html__( 'Button Status', 'xgenious-master' ),
			'type'        => Controls_Manager::SWITCHER,
		]);
		$repeater->add_control('button_text',[
			'label'       => esc_html__( 'Button Text', 'xgenious-master' ),
			'type'        => Controls_Manager::TEXT,
			'label_block' => true,
            'condition' => ['button_status' => 'yes']
		]);
		$repeater->add_control('button_link',[
			'label'       => esc_html__( 'Button Link', 'xgenious-master' ),
			'type'        => Controls_Manager::URL,
			'label_block' => true,
			'condition' => ['button_status' => 'yes']
		]);
        $this->add_control('price_plan_lists',[
	        'label'       => esc_html__( 'Price Plans', 'xgenious-master' ),
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
        <section id="pricePlan" class="pricing-area padding-top-60 padding-bottom-60">
            <div class="container container_1430">
                <div class="section-title">
                    <h2 class="title"> <?php  echo esc_html($settings['section_title']);?> </h2>
                    <p class="description"><?php  echo esc_html($settings['section_description']);?></p>
                </div>
                <div class="row g-4 mt-4">
                    <?php
                    $whyUsList = $settings['price_plan_lists'];
                    foreach ($whyUsList as $list):
                        ?>
                    <div class="col-lg-4 col-md-6">
                        <div class="single-price single-price-border single-price-padding <?php echo ($list['active_plan'] === 'yes') ? 'active' : ''; ?> ">
                            <?php
                                if(!empty($list['subtitle'])){
                                    printf('<span class="single-price-sub-title">%1$s</span>',esc_html($list['subtitle']));
                                }
                                ?>
                            <div class="single-price-top center-text mt-4">
                                <span class="single-price-top-plan"> <?php echo esc_html($list['title']);?> </span>
                                <?php
                                    $price = $list['price'];
                                    $price = str_replace(['{m}','{/m}'],['<sub>','</sub>'],$price);
                                    printf('<h3 class="single-price-top-title mt-4">%1$s</h3>',wp_kses_post($price));
                                ?>
                            </div>
                            <ul class="single-price-list mt-4">
                                <?php
                                    $features = $list['feature'];
                                    $features_list = explode("\n",$features);
                                    foreach ($features_list as $li){
                                        printf('<li class="single-price-list-item">%1$s</li>',$li);
                                    }
                                ?>
                            </ul>
                            <?php
                                if ($list['button_status'] === 'yes'){
                                    printf('<div class="btn-wrapper mt-4 mt-lg-5"><a href="%2$s" class="cmn-btn btn-outline-1 color-one w-100"> %1$s</a></div>',esc_html($list['button_text']),esc_url($list['button_link']['url']));
                                }
                            ?>
                        </div>
                    </div>
                    <?php endforeach;?>
                </div>
            </div>
        </section>
		<?php
	}
}

Plugin::instance()->widgets_manager->register( new Xgenious_Price_Plan_One_Widget() );