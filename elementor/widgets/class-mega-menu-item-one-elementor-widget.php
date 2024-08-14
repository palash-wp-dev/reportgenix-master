<?php
/**
 * Elementor Widget
 * @package Attorg
 * @since 1.0.0
 */

namespace Elementor;
class Xgenious_Mega_Menu_Items_One_Widget extends Widget_Base {

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
		return 'xgenious-mega-menu-item-one-widget';
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
		return esc_html__( 'Mega Menu Items One', 'xgenious-master' );
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
		$this->add_control('mega_menu_style',[
			'label'       => esc_html__( 'Mega Menu Style', 'xgenious-master' ),
			'type'        => Controls_Manager::SELECT,
			'options' => [
			    '' => 'Wide',
			    'docs-megaMenu' => 'Inline'
			],
			'default' => ''
		]);
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
		$repeater->add_control('thumbnail',[
			'label'       => esc_html__( 'Thumbnail', 'xgenious-master' ),
			'type'        => Controls_Manager::MEDIA,
		]);
		$repeater->add_control('description',[
			'label'       => esc_html__( 'Description', 'xgenious-master' ),
			'type'        => Controls_Manager::TEXTAREA,
			'description' => esc_html__( 'enter description', 'xgenious-master' ),
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
		<div class="product-megaMenu <?php echo esc_attr($settings['mega_menu_style']);?>">
				<div class="megaMenu-content">
					<div class="megaMenu-content-flex">
					    <?php
                            $faq_list = $settings['mega_menu_items'];
                            foreach ($faq_list as $list):
                        ?>
						<div class="megaMenu-content-item">
							<div class="megaMenu-content-item-single">
								<div class="megaMenu-content-item-single-icon">
								    <?php
                                        $img_id = $list['thumbnail']['id'] ;
                                        $img_url_val = $img_id ? wp_get_attachment_image_src($img_id,'full',false) : '';
                                        $img_url = is_array($img_url_val) && !empty($img_url_val) ? $img_url_val[0] : '';
                                        $img_alt =  $img_id ? get_post_meta($img_id,'_wp_attachment_image_alt',true) : '';
                                        $item_link = $list['link']['url'] ?? '';
                                        printf('<a href="%3$s"><img src="%1$s" alt="%2$s"></a>',$img_url,$img_alt,esc_url($item_link));
                                    ?>
								</div>
								<div class="megaMenu-content-item-single-content">
								    <?php 
								         $item_link = $list['link']['url'] ?? '';
								        printf('<h4 class="megaMenu-content-item-single-content-title"> <a href="%1$s">%2$s</a></h4>', esc_url($item_link),esc_html($list['title']));
								        printf('<p class="megaMenu-content-item-single-content-para">%1$s</p>',esc_html($list['description']));
								    ?>
								</div>
							</div>
						</div>
						<?php endforeach;?>
						<?php if(!empty($settings['button_status'])):?>
						<div class="megaMenu-content-item">
							<div class="megaMenu-content-item-single">
								<div class="view-all-btn">
									<a href="<?php echo esc_url($settings['button_link']['url'] ?? '');?>" class="product-view"><span><?php echo esc_html($settings['button_text']);?></span></a>
								</div>
							</div>
						</div>
						<?php endif; ?>
					</div>
				</div>
			</div>
		<?php
	}
}

Plugin::instance()->widgets_manager->register( new Xgenious_Mega_Menu_Items_One_Widget() );