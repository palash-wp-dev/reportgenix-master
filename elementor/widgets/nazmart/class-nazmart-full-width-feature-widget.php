<?php
/**
 * Elementor Widget
 * @package Attorg
 * @since 1.0.0
 */

namespace Elementor;
use Elementor\Controls_Manager;
use Elementor\Repeater;
use Elementor\Widget_Base;

class Xgenious_Nazmart_Full_Width_features_Widget extends Widget_Base {

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
		return 'xgenious-nazmart-full-width-features-widget';
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
		return esc_html__( 'Nazmart: Full-width Feature 01', 'xgenious-master' );
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
        $this->add_control('row_reverse',[
            'label'       => esc_html__( 'Row Reverse', 'xgenious-master' ),
            'type'        => Controls_Manager::SWITCHER,
        ]);
		$this->add_control('section_title',[
			'label'       => esc_html__( 'Subtitle', 'xgenious-master' ),
			'type'        => Controls_Manager::TEXTAREA,
			'label_block' => true,
            'default' => 'FEATURES BUILT FOR BUSINESS'
		]);
	
        $this->add_control('section_description',[
			'label'       => esc_html__( 'Title', 'xgenious-master' ),
			'type'        => Controls_Manager::TEXTAREA,
			'label_block' => true,
            'default' => '15+ Modern eCommerce themes to choose from'
		]);
		$this->add_control('right_image',[
			'label'       => esc_html__( 'Right Image', 'xgenious-master' ),
			'type'        => Controls_Manager::MEDIA,
		]);
		$this->end_controls_section();

		$this->start_controls_section(
			'settings_section',
			[
				'label' => esc_html__( 'List Settings', 'xgenious-master' ),
				'tab'   => Controls_Manager::TAB_CONTENT,
			]
		);
        $repeater = new Repeater();
		$repeater->add_control('button_text',[
			'label'       => esc_html__( 'Text', 'xgenious-master' ),
			'type'        => Controls_Manager::TEXT,
			'description' => esc_html__( 'enter text', 'xgenious-master' ),
			'label_block' => true
		]);
        $repeater->add_control('button_icon',[
            'label'       => esc_html__( 'Icon', 'xgenious-master' ),
            'type'        => Controls_Manager::ICONS,
            'label_block' => true
        ]);
        $this->add_control('faq_lists',[
	        'label'       => esc_html__( 'List', 'xgenious-master' ),
	        'type'        => Controls_Manager::REPEATER,
            'fields' => $repeater->get_controls(),
            'title_field' => "{{{button_text}}}"
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
        <section class="sectionItem_area pat-60 pab-60">
            <div class="container container__one">
                <div class="row g-4 align-items-center justify-content-between">
                    <div class="col-xxl-5 col-lg-6 <?php echo $settings['row_reverse'] === 'yes' ? 'order-lg-1' : ''?>">
                        <div class="sectionItem__wrap">
                            <div class="new_sectionTitle text-left">
                                <span class="subtitle"><?php echo esc_html($settings['section_title']);?></span>
                                <h2 class="title"><?php echo esc_html($settings['section_description']);?></h2>
                            </div>
                            <div class="sectionItem__inner mt-4">
                                <ul class="sectionItem__list">
                                    <?php
                                    $faq_list = $settings['faq_lists'];
                                    foreach ($faq_list as $list):?>

                                        <li class="sectionItem__list__item %1$s">
                                            <div class="icon">
                                                <?php Icons_Manager::render_icon($list['button_icon'], ['aria-hidden' => 'true']); ?>
                                            </div>
                                            <?php echo esc_html($list['button_text']);?>
                                        </li>
                                   <?php endforeach;?>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="sectionItem__thumb">
                            <?php
                            $img_id = $settings['right_image']['id'] ;
                            $img_url_val = $img_id ? wp_get_attachment_image_src($img_id,'full',false) : '';
                            $img_url = is_array($img_url_val) && !empty($img_url_val) ? $img_url_val[0] : '';
                            $img_alt =  $img_id ? get_post_meta($img_id,'_wp_attachment_image_alt',true) : '';
                            printf('<img src="%1$s" alt="%2$s">',$img_url,$img_alt);
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </section>
		<?php
	}
}

Plugin::instance()->widgets_manager->register( new Xgenious_Nazmart_Full_Width_features_Widget() );