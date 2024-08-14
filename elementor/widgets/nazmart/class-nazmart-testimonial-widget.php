<?php
/**
 * Elementor Widget
 * @package Attorg
 * @since 1.0.0
 */

namespace Elementor;
class Xgenious_Nazmart_Testimonial_One_Widget extends Widget_Base
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
        return 'xgenious-nazmart-testimonial-one-widget';
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
        return esc_html__('Nazmart: Testimonial 01', 'xgenious-master');
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
            'default' => 'Happy clients are reflection'
        ]);
	    $this->add_control('center_highlight',[
		    'label'       => esc_html__( 'Highlight Center Item', 'xgenious-master' ),
		    'type'        => Controls_Manager::SWITCHER,
		    'label_on' => __( 'Yes', 'xgenious-master' ),
		    'label_off' => __( 'No', 'xgenious-master' ),
		    'return_value' => 'yes'
	    ]);
        $this->end_controls_section();
        $this->start_controls_section(
            'settings_section',
            [
                'label' => esc_html__('Testimonial Item Settings', 'xgenious-master'),
                'tab' => Controls_Manager::TAB_CONTENT,
            ]
        );
        $this->add_control('testimonial_items', [
            'label' => esc_html__('Testimonial Item', 'xgenious-master'),
            'type' => Controls_Manager::REPEATER,
            'fields' => [
                [
                    'name' => 'name',
                    'label' => esc_html__('Name', 'xgenious-master'),
                    'type' => Controls_Manager::TEXT,
                    'label_block' => true,
                    'description' => esc_html__('enter name', 'xgenious-master'),
                ],
                [
                    'name' => 'description',
                    'label' => esc_html__('Description', 'xgenious-master'),
                    'type' => Controls_Manager::TEXTAREA,
                    'description' => esc_html__('enter description', 'xgenious-master'),
                ]

            ],
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

        <!-- Testimonial area start -->
        <section class="testimonial_area pat-60 pab-60">
            <div class="container container__two">
                <div class="new_sectionTitle text-left title_flex">
                    <h2 class="title"><?php echo esc_html($settings['section_title']); ?></h2>
                    <div class="append_testimonial"></div>
                </div>
                <div class="row mt-5">
                    <div class="col-lg-12">
                        <div class="global-slick-init slider-inner-margin" data-centerMode="true"
                             data-centerPadding="0px" data-appendArrows=".append_testimonial" data-slidesToShow="3"
                             data-slidesToScroll="3" data-infinite="true" data-arrows="true" data-dots="false"
                             data-swipeToSlide="true" data-autoplay="true" data-autoplaySpeed="2500"
                             data-prevArrow='<div class="prev-icon"><i class="las la-arrow-left"></i><span class="arrow__title">Previous</span></div>'
                             data-nextArrow='<div class="next-icon"><span class="arrow__title">Next</span><i class="las la-arrow-right"></i></div>'
                             data-responsive='[{"breakpoint": 1400,"settings": {"slidesToShow": 3}},{"breakpoint": 1200,"settings": {"slidesToShow": 2}},{"breakpoint": 992,"settings": {"slidesToShow": 2}},{"breakpoint": 768,"settings": {"slidesToShow": 1}},{"breakpoint": 576, "settings": {"slidesToShow": 1} }]'>
                            <?php
                            $platform_list = $settings['testimonial_items'];
                            foreach ($platform_list as $pl_list):
                                ?>
                                <div class="slick_item">
                                    <div class="testimonial_single radius-10 <?php echo $settings['center_highlight'] !== "yes" ? 'no_center_hightlight' : '' ?>">
                                        <div class="nazmart_header_rating testimonial">
                                            <span class="rating__wrap">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="45" height="42" viewBox="0 0 45 42" fill="none"><path d="M44.183 16.0498H27.3031L22.1069 0L16.8799 16.0498L0 16.019L13.6515 25.9502L8.4246 42L22.0761 32.0688L35.7277 42L30.5315 25.9502L44.183 16.0498Z" fill="#f9bf00"></path></svg>
                                                <svg xmlns="http://www.w3.org/2000/svg" width="45" height="42" viewBox="0 0 45 42" fill="none"><path d="M44.183 16.0498H27.3031L22.1069 0L16.8799 16.0498L0 16.019L13.6515 25.9502L8.4246 42L22.0761 32.0688L35.7277 42L30.5315 25.9502L44.183 16.0498Z" fill="#f9bf00"></path></svg>
                                                <svg xmlns="http://www.w3.org/2000/svg" width="45" height="42" viewBox="0 0 45 42" fill="none"><path d="M44.183 16.0498H27.3031L22.1069 0L16.8799 16.0498L0 16.019L13.6515 25.9502L8.4246 42L22.0761 32.0688L35.7277 42L30.5315 25.9502L44.183 16.0498Z" fill="#f9bf00"></path></svg>
                                                <svg xmlns="http://www.w3.org/2000/svg" width="45" height="42" viewBox="0 0 45 42" fill="none"><path d="M44.183 16.0498H27.3031L22.1069 0L16.8799 16.0498L0 16.019L13.6515 25.9502L8.4246 42L22.0761 32.0688L35.7277 42L30.5315 25.9502L44.183 16.0498Z" fill="#f9bf00"></path></svg>
                                                <svg xmlns="http://www.w3.org/2000/svg" width="45" height="42" viewBox="0 0 45 42" fill="none"><path d="M44.183 16.0498H27.3031L22.1069 0L16.8799 16.0498L0 16.019L13.6515 25.9502L8.4246 42L22.0761 32.0688L35.7277 42L30.5315 25.9502L44.183 16.0498Z" fill="#f9bf00"></path></svg>
                                            </span>
                                        </div>
                                        <p class="testimonial_single__para"><?php echo esc_html($pl_list['description']); ?></p>
                                        <div class="testimonial_single__footer">
                                            <div class="testimonial_single__flex">
                                                <div class="testimonial_single__author">
                                                    <div class="testimonial_single__author__thumb">
                                                        <img src="<?php echo XGENIOUS_MASTER_ASSETS.'images/quality_envato.png'?>"
                                                             alt="envato">
                                                    </div>
                                                    <div class="testimonial_single__author__contents">
                                                        <h5 class="testimonial_single__author__title"><?php echo esc_html($pl_list['name']); ?></h5>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Testimonial area ends -->
        <?php
    }
}

Plugin::instance()->widgets_manager->register(new Xgenious_Nazmart_Testimonial_One_Widget());