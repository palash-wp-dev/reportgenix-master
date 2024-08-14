<?php
/**
 * Elementor Widget
 * @package Attorg
 * @since 1.0.0
 */

namespace Elementor;

class Xgenious_Advance_Tab_Two_Widget extends Widget_Base {

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
		return 'xgenious-advnace-tab-two-widget';
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
		return esc_html__( 'Advance Tab: 02', 'xgenious-master' );
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
		$this->end_controls_section();
		
		
		
		$this->start_controls_section(
			'_button_settings_section',
			[
				'label' => esc_html__( 'Tabs Settings', 'xgenious-master' ),
				'tab'   => Controls_Manager::TAB_CONTENT,
			]
		);
		
		$repeater = new Repeater();
		
		$repeater->add_control('tab_title',[
			'label'       => esc_html__( 'Title', 'xgenious-master' ),
			'type'        => Controls_Manager::TEXT,
			'description' => esc_html__( 'enter title', 'xgenious-master' ),
			'label_block' => true
		]);
		$repeater->add_control('tab_content',[
			'label'       => esc_html__( 'Content', 'xgenious-master' ),
			'type'        => Controls_Manager::SELECT,
			'options' => Xgenious()->get_post_list_by_post_type('megamenu'),
			'description' => esc_html__( 'select content', 'xgenious-master' ),
			'label_block' => true
		]);
        $this->add_control('right_faq_lists',[
	        'label'       => esc_html__( 'List Items', 'xgenious-master' ),
	        'type'        => Controls_Manager::REPEATER,
            'fields' => $repeater->get_controls(),
            'title_field' => "{{{tab_title}}}"
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
		
		<section class="business_area section-bg-3 padding-top-100 padding-bottom-100">
        <div class="container">
            <div class="section_title center-text">
                <h2 class="title"><?php echo esc_html($settings['title']); ?></h2>
            </div>
            <div class="business_wrapper__tab mt-5">
                <ul class="nav nav-pills tabs tab_style_two" role="tablist">
                     <?php
                     $tab_ids = [];
                        $job_list = $settings['right_faq_lists'];
                        foreach ($job_list as $key => $item):
                        $active = $key === 0 ? 'active' : '';
                        $tab_id = 'tabs_'.str_replace([' ','/','&'],['','_','_'],strtolower($item['tab_title'])).random_int(123456789,999999999);
                        $tab_ids[] = $tab_id;
                        printf('<li class="nav-item" role="presentation"> <button class="nav-link %3$s" data-bs-target="#%1$s" type="button" role="tab" data-bs-toggle="pill" >%2$s</button></li>',$tab_id,esc_html($item['tab_title']),esc_attr($active));
                    ?>
                    
                     <?php endforeach; ?>
                </ul>
            </div>
            <div class="tab-content">
                <?php
                    $job_list = $settings['right_faq_lists'];
                    foreach ($job_list as  $key => $item):
                         $active = $key === 0 ? 'active show' : '';
                ?>
                <div class="tab-content-item tab-pane fade <?php echo $active; ?>" id="<?php echo $tab_ids[$key];?>">
                    <?php echo \Elementor\Plugin::instance()->frontend->get_builder_content_for_display($item['tab_content']); ?>
                </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>
    
		<?php
	}
}

Plugin::instance()->widgets_manager->register( new Xgenious_Advance_Tab_Two_Widget() );