<?php
/**
 * Elementor Widget
 * @package Appside
 * @since 1.0.0
 */

namespace Elementor;
class Xgenious_Accordion_Three extends Widget_Base {

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
        return 'xgenious-accordion-three-widget';
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
        return esc_html__( 'Accordion: 03', 'xgenious-master' );
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
        
        $repeater = new Repeater();
		$repeater->add_control('title',[
			'label'       => esc_html__( 'Title', 'xgenious-master' ),
			'type'        => Controls_Manager::TEXT,
			'description' => esc_html__( 'enter title', 'xgenious-master' ),
			'label_block' => true
		]);
		$repeater->add_control('description',[
			'label'       => esc_html__( 'Description', 'xgenious-master' ),
			'type'        => Controls_Manager::WYSIWYG,
			'description' => esc_html__( 'enter description', 'xgenious-master' ),
		]);
		$this->add_control('accordion_items',[
			'label'       => esc_html__( 'FAQ List', 'xgenious-master' ),
			'type'        => Controls_Manager::REPEATER,
			'fields' => $repeater->get_controls(),
			'title_field' => "{{{title}}}"
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
        $accordion_items = $settings['accordion_items'];
        $random_number = rand(999,999999);
        ?>
        <div class="accordion-wrapper style_three">
            <div id="accordion-<?php echo esc_attr($random_number);?>" class="faq-contents accordion">
                <?php
                $a = 0;
                foreach ( $accordion_items as $item ):
                    $collapse_class = (0 == $a) ? '' : 'collapsed';
                    // $show_class = (0 == $a) ? 'show' : '';
                    $show_class = (0 == $a) ? '' : ''; //disable make first item open
                    //$aria_expanded = (0 == $a) ? 'true' : 'false'; //disable make first item open
                    $aria_expanded = (0 == $a) ? 'false' : 'false';
                    $a++;
                    $random__item_number = rand(999,999999);
                    ?>
                        <div class="card-header faq-item" id="headingOne_<?php echo esc_attr($random__item_number);?>">
                            
                                <button class="accordion-button faq-title <?php echo esc_attr($collapse_class);?>" 
                                data-bs-toggle="collapse" role="button" 
                                data-bs-target="#collapseOne_<?php echo esc_attr($random__item_number);?>" 
                                aria-expanded="<?php echo esc_attr($aria_expanded);?>" 
                                aria-controls="collapseOne_<?php echo esc_attr($random__item_number);?>">
                                    <?php echo esc_html($item['title']);?>
                                </button>
                        </div>
                        <div id="collapseOne_<?php echo esc_attr($random__item_number);?>" 
                        class="accordion-collapse collapse <?php echo esc_attr($show_class); ?>"  
                        data-bs-parent="#accordion-<?php echo esc_attr($random_number);?>">
                            <div class="common-para">
                                <?php echo $item['description'];?>
                            </div>
                        </div>
                <?php endforeach; ?>
            </div>
        </div>
        <?php
        
    }
}

Plugin::instance()->widgets_manager->register( new Xgenious_Accordion_Three() );