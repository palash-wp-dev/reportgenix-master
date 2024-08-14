<?php
/**
 * Elementor Widget
 * @package Attorg
 * @since 1.0.0
 */

namespace Elementor;
class Xgenious_Mega_Menu_Category_One_Widget extends Widget_Base {

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
		return 'xgenious-mega-menu-category-one-widget';
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
		return esc_html__( 'Mega Category One', 'xgenious-master' );
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
			'slider_settings_section',
			[
				'label' => esc_html__( 'Section Settings', 'xgenious-master' ),
				'tab'   => Controls_Manager::TAB_CONTENT,
			]
		);
		$this->add_control('button_status',[
			'label'       => esc_html__( 'Button Show/Hide', 'xgenious-master' ),
			'type'        => Controls_Manager::SWITCHER,
		]);
		$this->add_control('button_text',[
			'label'       => esc_html__( 'Button Text', 'xgenious-master' ),
			'type'        => Controls_Manager::TEXT,
			'label_block' => true
		]);
		$this->add_control('button_link',[
			'label'       => esc_html__( 'Button URL', 'xgenious-master' ),
			'type'        => Controls_Manager::URL,
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
		$repeater->add_control('title',[
			'label'       => esc_html__( 'Title', 'xgenious-master' ),
			'type'        => Controls_Manager::TEXT,
			'description' => esc_html__( 'enter title', 'xgenious-master' ),
			'label_block' => true
		]);
		$repeater->add_control('icon',[
			'label'       => esc_html__( 'Icon', 'xgenious-master' ),
			'type'        => Controls_Manager::ICONS,
		]);
		$repeater->add_control('link',[
			'label'       => esc_html__( 'Link', 'xgenious-master' ),
			'type'        => Controls_Manager::URL,
			'description' => esc_html__( 'enter link', 'xgenious-master' ),
		]);
        $this->add_control('mega_menu_items',[
	        'label'       => esc_html__( 'Mega Menu Item', 'xgenious-master' ),
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
			<div class="category-megaMenu">
				<div class="category-megaMenu-inner">
					<div class="category-megaMenu-inner-flex">
						<?php
                            $faq_list = $settings['mega_menu_items'];
                            foreach ($faq_list as $list):
                        ?>
						<div class="category-megaMenu-inner-item">
							<div class="category-megaMenu-inner-single">
								<div class="category-megaMenu-inner-icon">
									<a href="<?php echo esc_html($list['button_link']['url'] ?? ''); ?>"> 
									    <?php \Elementor\Icons_Manager::render_icon( $list['icon'], [ 'aria-hidden' => 'true' ] ); ?>
									</a>
								</div>
								<div class="category-megaMenu-inner-content">
								    <?php 
								         $item_link = $list['link']['url'] ?? '';
								        printf('<h4 class="category-megaMenu-inner-content-title"> <a href="%1$s">%2$s</a></h4>', esc_url($item_link),esc_html($list['title']));
								    ?>
								</div>
							</div>
						</div>
                        <?php endforeach;?>
					</div>
					<?php 
					    if(!empty($settings['button_status'])):
					        printf('<a href="%1$s" class="browse-all">%2$s</a>',esc_html($settings['button_link']['url'] ?? ''),esc_html($settings['button_text']));
					    endif;
					 ?>
				</div>
			</div>
		<?php
	}
}

Plugin::instance()->widgets_manager->register( new Xgenious_Mega_Menu_Category_One_Widget() );