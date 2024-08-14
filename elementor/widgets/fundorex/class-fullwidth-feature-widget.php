<?php
/**
 * Elementor Widget
 * @package Appside
 * @since 1.0.0
 */

namespace Elementor;
class Fundorex_FullWidth_Features extends Widget_Base {

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
        return 'bytesed-fundorex-full-width-feature-widget';
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
        return esc_html__( 'Fundorex: Full With Features', 'irtech-master' );
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
        return [ 'irtech_widgets' ];
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
                'label' => esc_html__( 'General Settings', 'irtech-master' ),
                'tab'   => Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control('column_reverse',[
            'label' => __('Column Reverse'),
            'type' => Controls_Manager::SWITCHER,
            'default' => 'yes'
        ]);

        $this->add_control('title',[
            'label' => __('Title'),
            'type' => Controls_Manager::TEXTAREA,
            'default' => __('Powerful Admin Panel')
        ]);
        $this->add_control('description',[
            'label' => __('Description'),
            'type' => Controls_Manager::WYSIWYG,
            'default' => 'Powerful Admin/Backend template includes all of the Functionality And pages that are required.'
        ]);

        $this->add_control('right_image',[
            'label' => __('Right Image'),
            'type' => Controls_Manager::MEDIA
        ]);
	    $this->end_controls_section();

	    $this->start_controls_section(
		    'featured_settings_section',
		    [
			    'label' => esc_html__( 'Features Item Settings', 'irtech-master' ),
			    'tab'   => Controls_Manager::TAB_CONTENT,
		    ]
	    );
        $features = new Repeater();
        $features->add_control('text',[
            'label' => __('Text'),
            'type' => Controls_Manager::TEXTAREA,
            'default' => __('Customize price plan')
        ]);
        $features->add_control('icon',[
            'label' => __('Icon'),
            'type' => Controls_Manager::ICONS
        ]);
        $features->add_control('icon_type',[
            'label' => __('Icon Type'),
            'type' => Controls_Manager::SELECT,
            'options' => [
                '' => __('none'),
                'success' => __('Success'),
                'danger' => __('Danger'),
                'warning' => __('Warning'),
            ],
            'default' => ''
        ]);

        $this->add_control( 'features__items', [
            'label'       => esc_html__( 'Features Item', 'irtech-master' ),
            'type'        => Controls_Manager::REPEATER,
            'fields'      => $features->get_controls(),
            'title_field' => "{{{text}}}"
        ] );
        $this->end_controls_section();


	    $this->start_controls_section(
		    'style_title_settings_section',
		    [
			    'label' => esc_html__( 'Title Style', 'xgenious-master' ),
			    'tab'   => Controls_Manager::TAB_STYLE,
		    ]
	    );
	    $this->add_group_control(
		    Group_Control_Typography::get_type(),
		    [
			    'name' => 'title_typography',
			    'label' => __( 'Title Typography', 'my-plugin-domain' ),
			    'selector' => '{{WRAPPER}} .new_sectionTitle .title'
		    ]
	    );
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
        $features__items = $settings['features__items'] ?? [];
        ?>
        <section class="sectionItem_area">
            <div class="container">
                <div class="row g-4 align-items-center justify-content-between  ">
                    <div class="col-xxl-6 col-xl-6 col-lg-6 <?php echo $settings['column_reverse'] == 'yes' ? 'order-2' : '';?>">
                        <div class="sectionItem__thumb">
                            <?php
                            $image_id = $settings['right_image']['id'];
                            $image_url = !empty($image_id) ? wp_get_attachment_image_src($image_id,'full',true)[0] : '';
                            $image_alt = !empty($image_id) ? get_post_meta($image_id,'_wp_attachment_image_alt',true) : '';
                            printf('<img src="%1$s" alt="%2$s">',esc_url($image_url),esc_attr($image_alt));
                            ?>
                        </div>
                    </div>
                    <div class="col-xxl-5 col-xl-5 col-lg-6 ">
                        <div class="sectionItem__wrap">
                            <div class="new_sectionTitle text-left">
                                <h2 class="title"><?php echo esc_html($settings['title']);?></h2>
                                <p class="section_para mt-3"><?php echo wp_kses_post($settings['description']);?></p>
                            </div>
                            <div class="sectionItem__inner mt-4">
                                <ul class="sectionItem__list">
                                    <?php
                                    foreach ($features__items as $item):
                                        ?>
                                        <li class="sectionItem__list__item">
                                            <div class="icon_wrap <?php echo esc_attr($item['icon_type']);?>">
                                                <?php Icons_Manager::render_icon($item['icon']);?>
                                            </div>
                                            <?php echo esc_html($item['text']);?>
                                        </li>
                                    <?php endforeach;?>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <?php
    }
}

Plugin::instance()->widgets_manager->register( new Fundorex_FullWidth_Features() );