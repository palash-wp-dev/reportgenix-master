<?php
/**
 * Elementor Widget
 * @package Xgenious
 * @since 1.0.0
 */

namespace Elementor;
class Xgenious_Affiliate_Icon_Box_One_Widget extends Widget_Base
{

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
    public function get_name()
    {
        return 'xgenious-affiliate-icon-box-one-widget';
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
    public function get_title()
    {
        return esc_html__('Affiliate: Icon Box 01', 'xgenious-master');
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
    public function get_icon()
    {
        return 'eicon-alert';
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
    public function get_categories()
    {
        return ['xgenious_widgets'];
    }

    /**
     * Register Elementor widget controls.
     *
     * Adds different input fields to allow the user to change and customize the widget settings.
     *
     * @since 1.0.0
     * @access protected
     */
    protected function register_controls()
    {

        $this->start_controls_section(
            'settings_section',
            [
                'label' => esc_html__('General Settings', 'xgenious-master'),
                'tab' => Controls_Manager::TAB_CONTENT,
            ]
        );
        $this->add_control(
            'section_title',
            [
                'label' => esc_html__('Section Title', 'xgenious-master'),
                'type' => Controls_Manager::TEXT,
                'description' => esc_html__('enter section title.', 'xgenious-master'),
                'default' => esc_html__('Why Our Affiliations?', 'xgenious-master')
            ]
        );
        $this->add_control(
            'section_description',
            [
                'label' => esc_html__('Section Description', 'xgenious-master'),
                'type' => Controls_Manager::WYSIWYG,
                'description' => esc_html__('enter section description.', 'xgenious-master'),
            ]
        );
        $repeater = new Repeater();
        $repeater->add_control(
            'title',
            [
                'label' => esc_html__('Title', 'xgenious-master'),
                'type' => Controls_Manager::TEXT,
                'description' => esc_html__('enter title.', 'xgenious-master'),
                'default' => esc_html__('Phone', 'xgenious-master'),
                'label_block'=> true
            ]
        );
        $repeater->add_control(
            'description',
            [
                'label' => esc_html__('Description', 'xgenious-master'),
                'type' => Controls_Manager::WYSIWYG,
                'default' => esc_html__('Sed ut perspiciatis unde omnis iste natus error sit voluptatem sit accusantium doloremqueau dantium, totam rem aperiam. ', 'xgenious-master')
            ]
        );
        $repeater->add_control(
            'icon',
            [
                'label' => esc_html__('Icon', 'xgenious-master'),
                'type' => Controls_Manager::ICONS,
                'description' => esc_html__('select Icon.', 'xgenious-master'),
            ]
        );
        
        $this->add_control('icon_box_lists',[
	        'label'       => esc_html__( 'Icon Box List', 'xgenious-master' ),
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
    protected function render()
    {
        $settings = $this->get_settings_for_display();
        ?>
       		<section class="works_area">
        <div class="container">
            <div class="section_title center-text margin-bottom-60">
                <h2 class="title"> <?php echo esc_html__($settings['section_title'])?> </h2>
                <?php if(!empty($settings['section_description'])):?>
                <div class="para"><?php echo wp_kses_post($settings['section_description'])?></div>
                <?php endif;?>
            </div>
            <div class="row gy-4">
                <?php 
                foreach($settings['icon_box_lists'] as $list):
                ?>
                <div class="col-lg-4 wow zoomIn" data-wow-delay=".2s" >
                    <div class="single_icon_box_one">
                        <div class="icon">
                            <?php \Elementor\Icons_Manager::render_icon( $list['icon'], [ 'aria-hidden' => 'true' ] ); ?>
                        </div>
                        <div class="content_area">
                            <h4><?php echo esc_html($list['title']);?></h4>
                            <p><?php echo wp_kses_post($list['description']);?></p>
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

Plugin::instance()->widgets_manager->register(new Xgenious_Affiliate_Icon_Box_One_Widget());