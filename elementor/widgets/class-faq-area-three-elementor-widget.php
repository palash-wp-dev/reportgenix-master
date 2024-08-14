<?php
/**
 * Elementor Widget
 * @package Attorg
 * @since 1.0.0
 */

namespace Elementor;
class Xgenious_FAQ_Area_Three_Widget extends Widget_Base {

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
		return 'xgenious-faq-area-three-widget';
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
		return esc_html__( 'FAQ Area Three', 'xgenious-master' );
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
				'label' => esc_html__( 'Item Settings', 'xgenious-master' ),
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
		$repeater->add_control('active_initially',[
			'label'       => esc_html__( 'Open Initially', 'xgenious-master' ),
			'type'        => Controls_Manager::SWITCHER,
			'description' => esc_html__( 'keep open initially', 'xgenious-master' ),
		]);
		$repeater->add_control('description',[
			'label'       => esc_html__( 'Description', 'xgenious-master' ),
			'type'        => Controls_Manager::WYSIWYG,
			'description' => esc_html__( 'enter description', 'xgenious-master' ),
		]);
		$this->add_control('faq_lists',[
			'label'       => esc_html__( 'FAQ List', 'xgenious-master' ),
			'type'        => Controls_Manager::REPEATER,
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
	protected function render() {
		$settings = $this->get_settings_for_display();
		?>
        <div class="faq-wrapper-all faq-style-three">
            <div class="faq-wrapper mt-5">
                <div class="faq-contents">
                    <?php
                    $faq_list = $settings['faq_lists'];
                    foreach ($faq_list as $list):
                        ?>
                        <div class="faq-item <?php echo ($list['active_initially'] === 'yes') ? 'active open': ''; ?>">
                            <h3 class="faq-title">
                                <?php echo  esc_html($list['title']);?>
                            </h3>
                            <div class="faq-panel">
                                <p class="faq-para"> <?php echo  wp_kses_post($list['description']);?> </p>
                            </div>
                        </div>
                    <?php endforeach;?>
                </div>
            </div>
        </div>
		<?php
	}
}

Plugin::instance()->widgets_manager->register( new Xgenious_FAQ_Area_Three_Widget() );