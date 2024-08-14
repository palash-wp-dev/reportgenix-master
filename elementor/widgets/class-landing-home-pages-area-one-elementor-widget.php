<?php
/**
 * Elementor Widget
 * @package Attorg
 * @since 1.0.0
 */

namespace Elementor;
class Xgenious_Landing_Home_Page_Area_One_Widget extends Widget_Base {

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
		return 'xgenious-landing-home-page-area-one-widget';
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
		return esc_html__( 'Landing Home Page Area One', 'xgenious-master' );
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
		$this->add_control('section_title',[
			'label'       => esc_html__( 'Section Title', 'xgenious-master' ),
			'type'        => Controls_Manager::TEXT,
			'label_block' => true
		]);
        $this->add_control('section_description',[
			'label'       => esc_html__( 'Description', 'xgenious-master' ),
			'type'        => Controls_Manager::WYSIWYG,
			'label_block' => true
		]);
		$this->add_control('column',[
			'label'       => esc_html__( 'Column', 'xgenious-master' ),
			'type'        => Controls_Manager::SELECT,
			'options' => [
			    '3' => '4 Column',   
			    '4' => '3 Column',   
			    '6' => '2 Column',   
			],
			'default' => '6'
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
			'type'        => Controls_Manager::TEXTAREA,
			'label_block' => true
		]);
		$repeater->add_control('is_comming_soon',[
			'label'       => esc_html__( 'Cooming Soon', 'xgenious-master' ),
			'type'        => Controls_Manager::SWITCHER,
			'default' => ''
		]);
//		$repeater->add_control('preview_link',[
//			'label'       => esc_html__( 'Preview Link', 'xgenious-master' ),
//			'type'        => Controls_Manager::URL,
//			'label_block' => true,
//			'condition' => [
//			    'is_comming_soon' => ''
//			]
//		]);
		$repeater->add_control('is_badge',[
			'label'       => esc_html__( 'Badge', 'xgenious-master' ),
			'type'        => Controls_Manager::SWITCHER,
			'default' => ''
		]);
		$repeater->add_control('badge_text',[
			'label'       => esc_html__( 'Badge Text', 'xgenious-master' ),
			'type'        => Controls_Manager::TEXT
		]);
		$repeater->add_control('image',[
			'label'       => esc_html__( 'Image', 'xgenious-master' ),
			'type'        => Controls_Manager::MEDIA,
			'condition' => [
			    'is_comming_soon' => ''   
			]
		]);
		$repeater->add_control('preview_link',[
			'label'       => esc_html__( 'Preview Link', 'xgenious-master' ),
			'type'        => Controls_Manager::URL,
			'label_block' => true,
			'condition' => [
			    'is_comming_soon' => ''   
			]
		]);
		
        $this->add_control('faq_lists',[
	        'label'       => esc_html__( 'Features List', 'xgenious-master' ),
	        'type'        => Controls_Manager::REPEATER,
            'fields' => $repeater->get_controls(),
            'title_field' => "{{{title}}}"
        ]);
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
				'selector' => '{{WRAPPER}} .section-title .title'
			]
		);
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
		<div class="home-page-area-wrapper">
                <div class="row">
                    <div class="col-lg-12  margin-bottom-50">
                        <div class="section-title">
                            <h2 class="title"><?php echo esc_html($settings['section_title']); ?></h2>
                            <div class="description"><?php echo wp_kses_post($settings['section_description']); ?></div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <?php
	                $faq_list = $settings['faq_lists'];
	                foreach ($faq_list as $item):
	                ?>
                    <div class="col-md-6 col-lg-<?php echo esc_attr($settings['column'])?>">
                     <div class="single-page-item <?php echo ($item['is_comming_soon'] == 'yes') ? 'bg-black' : '';?>">
                            <?php if($item['is_comming_soon'] === 'yes'): ?>
                                <h4 class="comming"><?php echo esc_html($item['title']);?></h4>
                            <?php else: ?>
                                <a href="<?php echo esc_url($item['preview_link']['url'] ?? '')?>" target="_blank">
                                    <?php 
                                        if($item['is_badge'] === 'yes'){
                                            printf('<span class="xg-badge">%1$s</span>',$item['badge_text']);
                                        }
                                    ?>
                                    <?php
                                        $img_id = $item['image']['id'];
                                        $img_url_val = $img_id ? wp_get_attachment_image_src($img_id,'full',false) : '';
                                        $img_url = is_array($img_url_val) && !empty($img_url_val) ? $img_url_val[0] : '';
                                        printf('<div class="bg lazy" style="background-image: url(%s);"></div>',esc_url($img_url));
                                    ?>
                                </a>
                            <?php endif;?>
                        </div>
                    </div>
                    <?php endforeach;?>
                </div>
        </div>
		<?php
	}
}

Plugin::instance()->widgets_manager->register( new Xgenious_Landing_Home_Page_Area_One_Widget() );