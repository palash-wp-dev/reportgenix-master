<?php
/**
 * Elementor Widget
 * @package Attorg
 * @since 1.0.0
 */

namespace Elementor;
class Xgenious_Nazmart_Feature_Two_Widget extends Widget_Base
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
        return 'xgenious-nazmart-feature-two-widget';
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
        return esc_html__('Nazmart: Feature 02', 'xgenious-master');
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
            'section_settings_section',
            [
                'label' => esc_html__('General Settings', 'xgenious-master'),
                'tab' => Controls_Manager::TAB_CONTENT,
            ]
        );
        $this->add_control('section_title', [
            'label' => esc_html__('Section Title', 'xgenious-master'),
            'type' => Controls_Manager::TEXTAREA,
            'label_block' => true,
            'default' => 'Why Should You Trust?'
        ]);
        $this->end_controls_section();
        $this->start_controls_section(
            'settings_section',
            [
                'label' => esc_html__('Lists Settings', 'xgenious-master'),
                'tab' => Controls_Manager::TAB_CONTENT,
            ]
        );
        $repater = new Repeater();
        $repater->add_control('mob_image', [
            'label' => esc_html__('Image', 'xgenious-master'),
            'type' => Controls_Manager::MEDIA,
            'label_block' => true
        ]);
        $repater->add_control('title', [
            'label' => esc_html__('Title', 'xgenious-master'),
            'type' => Controls_Manager::TEXTAREA,
            'label_block' => true
        ]);
        $repater->add_control('description', [
            'label' => esc_html__('Description', 'xgenious-master'),
            'type' => Controls_Manager::TEXTAREA,
            'label_block' => true
        ]);
        $this->add_control('testimonial_items', [
            'label' => esc_html__('List', 'xgenious-master'),
            'type' => Controls_Manager::REPEATER,
            'fields' => $repater->get_controls()
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
        <section class="why__area pat-120 pab-60">
            <div class="container container__two">
                <div class="new_sectionTitle">
                    <h2 class="title"><?php echo esc_html($settings['section_title']); ?></h2>
                </div>
                <div class="row g-4 mt-4">
                    <?php
                    $platform_list = $settings['testimonial_items'];
                    foreach ($platform_list as $pl_list):
                        ?>
                        <div class="col-lg-3 col-sm-6">
                            <div class="why__item radius-10 text-center">
                                <div class="why__item__icon">
                                    <?php
                                    $img_id = $pl_list['mob_image']['id'];
                                    $img_url_val = $img_id ? wp_get_attachment_image_src($img_id, 'full', false) : '';
                                    $img_url = is_array($img_url_val) && !empty($img_url_val) ? $img_url_val[0] : '';
                                    $img_alt = $img_id ? get_post_meta($img_id, '_wp_attachment_image_alt', true) : '';
                                    printf('<img src="%1$s" alt="%2$s">', $img_url, $img_alt);
                                    ?>
                                </div>
                                <div class="why__item__contents mt-3">
                                    <h5 class="why__item__title"><?php echo esc_html($pl_list['title']) ?></h5>
                                    <p class="why__item__para mt-2"><?php echo esc_html($pl_list['description']) ?></p>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </section>

        <?php
    }
}

Plugin::instance()->widgets_manager->register(new Xgenious_Nazmart_Feature_Two_Widget());