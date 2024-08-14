<?php
/**
 * Elementor Widget
 * @package Attorg
 * @since 1.0.0
 */

namespace Elementor;
class Xgenious_Nazmart_Mobile_App_One_Widget extends Widget_Base
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
        return 'xgenious-nazmart-mobile-app-one-widget';
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
        return esc_html__('Nazmart: Mobile App 01', 'xgenious-master');
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
            'default' => 'Nazmart Flutter Mobile App for Tenant Shop'
        ]);
        $this->add_control('section_description', [
            'label' => esc_html__('Section Description', 'xgenious-master'),
            'type' => Controls_Manager::TEXTAREA,
            'label_block' => true,
            'default' => 'Allow Your Tenants to Build Mobile Application for Their Customers Through Nazmart Integrated Flutter (Android/iOS) Mobile Application'
        ]);

        $this->add_control('button_text', [
            'label' => esc_html__('Button Text', 'xgenious-master'),
            'type' => Controls_Manager::TEXT,
            'label_block' => true,
            'default' => 'Download App File '
        ]);
        $this->add_control('button_icon', [
            'label' => esc_html__('Button Icon', 'xgenious-master'),
            'type' => Controls_Manager::ICONS,
            'label_block' => true
        ]);
        $this->add_control('button_url', [
            'label' => esc_html__('Button URL', 'xgenious-master'),
            'type' => Controls_Manager::URL,
            'label_block' => true
        ]);
        $this->end_controls_section();
        $this->start_controls_section(
            'settings_section',
            [
                'label' => esc_html__('Mobile App Screenshots Settings', 'xgenious-master'),
                'tab' => Controls_Manager::TAB_CONTENT,
            ]
        );
        $repater = new Repeater();
        $repater->add_control('mob_image',[
            'label' => esc_html__('Image', 'xgenious-master'),
            'type' => Controls_Manager::MEDIA,
            'label_block' => true
        ]);
        $repater->add_control('center',[
            'label' => esc_html__('Center', 'xgenious-master'),
            'type' => Controls_Manager::SWITCHER,
            'label_block' => true
        ]);
        $this->add_control('testimonial_items', [
            'label' => esc_html__('Mobile App Screenshots', 'xgenious-master'),
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

        <section class="app_area section_bg pat-120">
            <div class="app__shapes">
                <img src="<?php echo XGENIOUS_MASTER_ASSETS.'images/app_shape.png'?>" alt="">
            </div>
            <div class="container container__two">
                <div class="new_sectionTitle">
                    <h2 class="title"><?php echo esc_html($settings['section_title']);?></h2>
                    <p class="section_para mt-3"><?php echo esc_html($settings['section_description']);?></p>
                    <div class="btn_wrapper mt-4">
                        <a href="<?php echo esc_url($settings['button_url']['url']);?>"  <?php echo $settings['button_url']['is_external'] ? 'target="blank"' : '' ?> class="cmn_btn btn_bg_1 radius-5">
                            <?php echo esc_html($settings['button_text']);?>
                            <span class="icon">
                                <?php Icons_Manager::render_icon($settings['button_icon'], ['aria-hidden' => 'true']); ?>
                            </span>
                        </a>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="app_wrapper app_blur_bg text-center">
                            <div class="app_wrapper__flex">
                                <?php
                                $platform_list = $settings['testimonial_items'];
                                foreach ($platform_list as $pl_list):
                                    ?>
                                    <div class="app_wrapper__item">
                                        <div class="app_wrapper__thumb <?php echo $pl_list['center'] === 'yes' ? 'app_wrapper__thumb' : '';?>">
                                            <?php
                                            $img_id = $pl_list['mob_image']['id'];
                                            $img_url_val = $img_id ? wp_get_attachment_image_src($img_id, 'full', false) : '';
                                            $img_url = is_array($img_url_val) && !empty($img_url_val) ? $img_url_val[0] : '';
                                            $img_alt = $img_id ? get_post_meta($img_id, '_wp_attachment_image_alt', true) : '';
                                            printf('<img src="%1$s" alt="%2$s">', $img_url, $img_alt);
                                            ?>
                                        </div>
                                    </div>
                                <?php endforeach; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <?php
    }
}

Plugin::instance()->widgets_manager->register(new Xgenious_Nazmart_Mobile_App_One_Widget());