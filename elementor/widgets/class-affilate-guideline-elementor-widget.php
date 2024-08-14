<?php
/**
 * Elementor Widget
 * @package Appside
 * @since 1.0.0
 */

namespace Elementor;
class Xgenious_Affiliate_Guideline_One extends Widget_Base {

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
        return 'xgenious-affiliate-guideline-one-widget';
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
        return esc_html__( 'Affiliate: Guideline 01', 'xgenious-master' );
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
        return 'eicon-editor-list-ul';
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
                'label' => esc_html__( 'General Settings', 'xgenious-master' ),
                'tab'   => Controls_Manager::TAB_CONTENT,
            ]
        );
        $this->add_control( 'title', [
			'type'    => Controls_Manager::TEXTAREA,
			'label'   => esc_html__( 'Title', 'xgenious-master' ),
		] );
		$this->end_controls_section();
		
		$this->start_controls_section(
            'do_listsettings_section',
            [
                'label' => esc_html__( 'Do List', 'xgenious-master' ),
                'tab'   => Controls_Manager::TAB_CONTENT,
            ]
        );
        $this->add_control( 'do_title', [
			'type'    => Controls_Manager::TEXTAREA,
			'label'   => esc_html__( 'Title', 'xgenious-master' ),
		] );
        
        $repeater = new Repeater();
		$repeater->add_control('title',[
			'label'       => esc_html__( 'Title', 'xgenious-master' ),
			'type'        => Controls_Manager::TEXTAREA,
			'description' => esc_html__( 'enter title', 'xgenious-master' ),
		]);
		$this->add_control('do_list_items',[
			'label'       => esc_html__( 'Do List', 'xgenious-master' ),
			'type'        => Controls_Manager::REPEATER,
			'fields' => $repeater->get_controls()
		]);
        
        $this->end_controls_section();
        
        $this->start_controls_section(
            'not_do_list_listsettings_section',
            [
                'label' => esc_html__( 'Not Do List', 'xgenious-master' ),
                'tab'   => Controls_Manager::TAB_CONTENT,
            ]
        );
         $this->add_control( 'not_do_title', [
			'type'    => Controls_Manager::TEXTAREA,
			'label'   => esc_html__( 'Title', 'xgenious-master' ),
		] );
        
        $repeater = new Repeater();
		$repeater->add_control('title',[
			'label'       => esc_html__( 'Title', 'xgenious-master' ),
			'type'        => Controls_Manager::TEXTAREA,
			'description' => esc_html__( 'enter title', 'xgenious-master' ),
		]);
		$this->add_control('not_do_list_items',[
			'label'       => esc_html__( 'Not Do List', 'xgenious-master' ),
			'type'        => Controls_Manager::REPEATER,
			'fields' => $repeater->get_controls()
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
        $do_list_items = $settings['do_list_items'];
        $not_do_list_items = $settings['not_do_list_items'];
        ?>
        <section class="guideline_area">
        <div class="container">
            <div class="section_title center-text">
                <h2 class="title"><?php echo esc_html($settings['title']);?></h2>
            </div>
            <div class="row g-4 mt-4">
                <div class="col-lg-6 wow fadeInDown" data-wow-delay=".2s" >
                    <div class="do_list_wrapper">
                        <h2 class="inner-title"><?php echo esc_html($settings['do_title']);?></h2>
                        <ul class="guideline_items">
                        <?php foreach ( $do_list_items as $item ):
                            printf('<li>%1$s</li>',$item['title']);
                         endforeach; ?>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-6 wow fadeInDown" data-wow-delay=".2s" >
                    <div class="do_list_wrapper donot">
                        <h2 class="inner-title"><?php echo esc_html($settings['not_do_title']);?></h2>
                        <ul class="guideline_items">
                        <?php foreach ( $not_do_list_items as $item ):
                            printf('<li>%1$s</li>',$item['title']);
                         endforeach; ?>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
        <?php
        
    }
}

Plugin::instance()->widgets_manager->register( new Xgenious_Affiliate_Guideline_One() );