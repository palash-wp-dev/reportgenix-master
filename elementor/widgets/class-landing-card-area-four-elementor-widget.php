<?php
/**
 * Elementor Widget
 * @package xgenous
 * @since 1.0.0
 */

namespace Elementor;

class Xgenious_Landing_Card_Area_Four_Widget extends Widget_Base {

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
		return 'xgenious-landing-card-area-four-widget';
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
		return esc_html__( 'Landing Card Area Four', 'xgenous-master' );
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
			'slider_settings_section',
			[
				'label' => esc_html__( 'Section Settings', 'xgenious-master' ),
				'tab'   => Controls_Manager::TAB_CONTENT,
			]
		);
		$this->add_control('section_title',[
			'label'       => esc_html__( 'Section Title', 'xgenious-master' ),
			'type'        => Controls_Manager::TEXT,
			'label_block' => true
		]);
		$this->add_control('section_description',[
			'label'       => esc_html__( 'Description', 'xgenious-master' ),
			'type'        => Controls_Manager::TEXTAREA,
			'label_block' => true
		]);
		$this->add_control('column_select',[
			'label'       => esc_html__( 'Column', 'xgenious-master' ),
			'type'        => Controls_Manager::SELECT,
			'options' => [
				'col-lg-6' => '02 Column',
				'col-lg-4' => '03 Column',
				'col-lg-3' => '04 Column',
			],
			'default' => 'col-lg-6',
			'label_block' => true
		]);

		$this->end_controls_section();


		$this->start_controls_section(
			'settings_section',
			[
				'label' => esc_html__( 'Item Settings', 'xgenious-master' ),
				'tab'   => Controls_Manager::TAB_CONTENT,
			]
		);
		$repeater = new Repeater();
		$repeater->add_control( 'title', [
			'type'    => Controls_Manager::TEXT,
			'label'   => esc_html__( 'Title', 'xgenious-master' ),
		] );
		$repeater->add_control( 'description', [
			'type'    => Controls_Manager::TEXTAREA,
			'label'   => esc_html__( 'Description', 'xgenious-master' ),
		] );
		$repeater->add_control( 'image', [
			'type'    => Controls_Manager::MEDIA,
			'label'   => esc_html__( 'Image', 'xgenious-master' ),
		] );
		$repeater->add_control( 'link', [
			'type'    => Controls_Manager::URL,
			'label'   => esc_html__( 'Link', 'xgenious-master' ),
		] );
        $repeater->add_control( 'button_text', [
			'type'    => Controls_Manager::TEXT,
			'label'   => esc_html__( 'Button Text', 'xgenious-master' ),
		] );
		$this->add_control('faq_lists',[
			'label'       => esc_html__( 'Features List', 'xgenious-master' ),
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
		?>
        <section class="features-area padding-top-120 padding-bottom-60">
            <div class="container container_1430">
                <div class="section-title">
                    <h2 class="title"> <?php echo esc_html($settings['section_title'])?></h2>
                    <p class="para"> <?php echo esc_html($settings['section_description'])?> </p>
                </div>
                <div class="row g-4 mt-4">
					<?php
					$faq_list = $settings['faq_lists'];
					foreach ($faq_list as $list): ?>
                        <div class="<?php echo esc_attr($settings['column_select']);?>">
                                <figure class="singleFeature-xgenious">
	                                <?php
	                                $image_id = $list['image']['id'];
	                                $image_src = !empty($image_id) ? wp_get_attachment_image_src($image_id,'full')[0] : '';
	                                $image_alt = !empty($image_id) ? get_post_meta($image_id,'_wp_attachment_image_alt',true) : '';
	                                printf('<a href="%1$s"><div class="featureImg" style="background-image: url(%2$s)"></div></a>',esc_url($list['link']['url'] ?? ''),$image_src);
	                                ?>
                                    <figcaption class="featureCaption">
                                        <h5><a href="<?php echo ($list['link']['url'] ?? ''); ?>" class="featureTittle"><?php echo esc_html($list['title']);?></a></h5>
                                        <p class="featureCap"><?php echo wp_kses_post($list['description']);?></p>
                                        <a href="<?php echo ($list['link']['url'] ?? ''); ?>" class="browseBtn"><?php echo esc_html($list['button_text']);?></a>
                                    </figcaption>
                                </figure>
                        </div>
					<?php endforeach;?>
                </div>
            </div>
        </section>


		<?php
	}
}

Plugin::instance()->widgets_manager->register( new Xgenious_Landing_Card_Area_Four_Widget() );