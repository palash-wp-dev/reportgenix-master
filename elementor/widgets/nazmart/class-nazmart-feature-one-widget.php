<?php
/**
 * Elementor Widget
 * @package Attorg
 * @since 1.0.0
 */

namespace Elementor;
class Xgenioius_Nazmart_Feature_one_widget extends Widget_Base
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
        return 'xgenious-nazmart-feature-one-widget';
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
        return esc_html__('Nazmart: Features 01', 'xgenious-master');
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
                'label' => esc_html__('Item Settings', 'xgenious-master'),
                'tab' => Controls_Manager::TAB_CONTENT,
            ]
        );
        $repeater = new Repeater();
        $repeater->add_control('title', [
            'label' => esc_html__('Title', 'xgenious-master'),
            'type' => Controls_Manager::TEXT,
            'label_block' => true
        ]);
        $repeater->add_control('description', [
            'label' => esc_html__('Description', 'xgenious-master'),
            'type' => Controls_Manager::TEXTAREA,
            'label_block' => true
        ]);
        $repeater->add_control('icon', [
            'label' => esc_html__('Icon', 'xgenious-master'),
            'type' => Controls_Manager::ICONS,
            'label_block' => true
        ]);
        $this->add_control('faq_lists', [
            'label' => esc_html__('Features List', 'xgenious-master'),
            'type' => Controls_Manager::REPEATER,
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
    protected function render()
    {
        $settings = $this->get_settings_for_display();
        ?>
        <div class="promo_area pat-60 pab-60">
            <div class="container container__two">
                <div class="row gy-4 gx-2">
                    <?php
                    $faq_list = $settings['faq_lists'];
                    foreach ($faq_list as $list): ?>
                        <div class="col-xxl-3 col-xl-4 col-md-6">
                            <div class="promo__item">
                                <div class="promo__item__flex">
                                    <div class="promo__item__icon">
                                        <?php Icons_Manager::render_icon($list['icon'], ['aria-hidden' => 'true']); ?>
                                    </div>
                                    <div class="promo__item__contents">
                                        <h4 class="promo__item__title"><?php echo esc_html($list['title']); ?></h4>
                                        <p class="promo__item__para mt-1"><?php echo esc_html($list['description']); ?></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
        <?php
    }
}

Plugin::instance()->widgets_manager->register(new Xgenioius_Nazmart_Feature_one_widget());