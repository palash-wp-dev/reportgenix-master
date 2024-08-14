<?php
/**
 * Elementor Widget
 * @package Attorg
 * @since 1.0.0
 */

namespace Elementor;
class Xgenious_Nazmart_How_It_Work_One_Widget extends Widget_Base
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
        return 'xgenious-nazmart-how-it-work-one-widget';
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
        return esc_html__('Nazmart: How It Work 01', 'xgenious-master');
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
            'default' => 'How does it work?'
        ]);
        $this->end_controls_section();

        $this->start_controls_section(
            'settings_section',
            [
                'label' => esc_html__('Features Item Settings', 'xgenious-master'),
                'tab' => Controls_Manager::TAB_CONTENT,
            ]
        );

        $repeater = new Repeater();
        $repeater->add_control('name',[
            'label' => esc_html__('Title', 'xgenious-master'),
            'type' => Controls_Manager::TEXT,
            'label_block' => true,
            'description' => esc_html__('enter name', 'xgenious-master'),
        ]);

        $repeater->add_control('description',[
            'label' => esc_html__('Description', 'xgenious-master'),
            'type' => Controls_Manager::TEXTAREA,
            'description' => esc_html__('enter description', 'xgenious-master'),
        ]);

        $repeater->add_control('side_image',[
            'label' => esc_html__('Image', 'xgenious-master'),
            'type' => Controls_Manager::MEDIA,
            'description' => esc_html__('select image', 'xgenious-master'),
        ]);

        $this->add_control('testimonial_items', [
            'label' => esc_html__('Features Item', 'xgenious-master'),
            'type' => Controls_Manager::REPEATER,
            'fields' => $repeater->get_controls(),
            'title_field' => '{{name}}'
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

        <section class="works_area worksScrollingWrapper section_bg pat-60">
            <div class="works__shapes">
                <img src="<?php echo XGENIOUS_MASTER_ASSETS . 'images/work_shapes.png' ?>" alt="work_shapes">
            </div>
            <div class="container">
                <div class="row g-4 align-items-center justify-content-between">
                    <div class="col-xxl-4 col-lg-5">
                        <div class="works__wrap">
                            <div class="new_sectionTitle text-left">
                                <h2 class="title"><?php echo esc_html($settings['section_title']); ?></h2>
                            </div>
                            <div class="works__faq mt-4">
                                <div class="works__left">
                                    <?php
                                    $platform_list = $settings['testimonial_items'];
                                    foreach ($platform_list as $key => $pl_list):
                                        ?>
                                        <div class="works__left__item <?php echo $key == 0 ? 'active open' : ''; ?>">
                                            <div class="works__left__item__flex">
                                                <span class="works__left__item__number"><?php echo esc_html($key + 1) ?></span>
                                                <div class="works__left__item__inner">
                                                    <h6 class="works__left__item__title"><?php echo esc_html($pl_list['name']) ?></h6>
                                                    <div class="works__left__item__panel">
                                                        <p class="works__left__item__para"><?php echo esc_html($pl_list['description']) ?></p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    <?php endforeach; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xxl-7 col-lg-6">
                        <div class="works__right works_blur_bg">
                            <?php
                            $platform_list = $settings['testimonial_items'];
                            foreach ($platform_list as $key => $pl_list):
                                ?>
                                <div class="works__right__item right__item  <?php echo $key == 0 ? 'active' : ''; ?>">
                                    <div class="works__thumb">
                                        <?php
                                            $img_id = $pl_list['side_image']['id'] ;
                                            $img_url_val = $img_id ? wp_get_attachment_image_src($img_id,'full',false) : '';
                                            $img_url = is_array($img_url_val) && !empty($img_url_val) ? $img_url_val[0] : '';
                                            $img_alt =  $img_id ? get_post_meta($img_id,'_wp_attachment_image_alt',true) : '';
                                            printf('<img src="%1$s" alt="%2$s">',$img_url,$img_alt);
                                            ?>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <?php
    }
}

Plugin::instance()->widgets_manager->register(new Xgenious_Nazmart_How_It_Work_One_Widget());