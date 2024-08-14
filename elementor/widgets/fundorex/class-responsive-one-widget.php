<?php
/**
 * Elementor Widget
 * @package irtech
 * @since 1.0.0
 */

namespace Elementor;
class Fundorex_Responsive_Area_Widget extends Widget_Base {

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
		return 'fundorex-responsive-area-one-widget';
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
		return esc_html__( 'Fundorex: Responsive Area', 'irtech-master' );
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
		return 'eicon-archive-title';
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
				'label' => esc_html__( 'Section Contents', 'irtech-master' ),
				'tab'   => Controls_Manager::TAB_CONTENT,
			]
		);

		$this->add_control( 'title', [
			'type'    => Controls_Manager::TEXTAREA,
			'label'   => esc_html__( 'Title', 'irtech-master' ),
			'default' => esc_html__( 'Full Responsive for any Devices', 'irtech-master' )
		] );
		$this->add_control( 'main_banner',[
			'label'       => esc_html__( 'Main Banner', 'irtech-master' ),
			'type'        => Controls_Manager::MEDIA,
			'description' => esc_html__( 'upload main banner', 'irtech-master' )
		]);

		$this->end_controls_section();


		$this->start_controls_section(
			'checkbox_styles',
			[
				'label' => esc_html__( 'Content Settings', 'irtech-master' ),
				'tab'   => Controls_Manager::TAB_CONTENT,
			]
		);

        $features = new Repeater();
        $features->add_control('text',[
            'label' => __('Text'),
            'type' => Controls_Manager::TEXTAREA,
            'default' => __('Mobile Friendly')
        ]);
        $features->add_control('icon',[
            'label' => __('Icon'),
            'type' => Controls_Manager::ICONS
        ]);
        $this->add_control( 'features__items', [
            'label'       => esc_html__( 'Features Item', 'irtech-master' ),
            'type'        => Controls_Manager::REPEATER,
            'fields'      => $features->get_controls(),
            'title_field' => "{{{text}}}"
        ] );
        $this->end_controls_section();

		$this->start_controls_section(
			'css_styles',
			[
				'label' => esc_html__( 'Styling Settings', 'irtech-master' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);

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
		?>
        <section class="responsive__area gradient__bg2 pat-120">
            <div class="container">
                <div class="new_sectionTitle">
                    <h2 class="title"><?php echo esc_html($settings['title']);?></h2>
                </div>
                <div class="row mt-5">
                    <div class="col-lg-12">
                        <div class="responsive__wrapper">
                            <ul class="sectionItem__list mb-4">
                                <?php  foreach ($settings['features__items'] as $fs_list): ?>
                                <li class="sectionItem__list__item">
                                    <div class="icon_wrap">
                                        <?php Icons_Manager::render_icon($fs_list['icon']);?>
                                    </div>
                                    <?php echo esc_html($fs_list['text'])?>
                                </li>
                                <?php endforeach;?>
                            </ul>
                            <div class="responsive__wrapper__thumb">
                                <div class="responsive__wrapper__small">
                                <div class="responsive__wrapper__main">
                                    <div class="responsive__wrapper__main__thumb">
                                        <?php
                                            $banner_image_id = $settings['main_banner']['id'];
                                            $banner_image_url = !empty($banner_image_id) ? wp_get_attachment_image_src($banner_image_id,'full',true)[0] : '';
                                            $banner_image_alt = !empty($banner_image_id) ? get_post_meta($banner_image_id,'_wp_attachment_image_alt',true) : '';
                                            printf('<img src="%1$s" alt="%2$s" loading="lazy">',esc_url($banner_image_url),esc_attr($banner_image_alt));
                                        ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
		<?php
	}
}

Plugin::instance()->widgets_manager->register( new Fundorex_Responsive_Area_Widget() );