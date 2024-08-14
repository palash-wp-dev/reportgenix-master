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

class Xgenious_Nazmart_Landing_CTA_Area_Widget extends Widget_Base {

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
		return 'xgenious-nazmart-cta-widget';
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
		return esc_html__( 'Nazmart: CTA 01', 'xgenious-master' );
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
			'type'        => Controls_Manager::TEXTAREA,
			'label_block' => true,
            'default' => 'Build Your Multi-Tenancy eCommerce Platform Now'
		]);
	
        $this->add_control('section_description',[
			'label'       => esc_html__( 'Description', 'xgenious-master' ),
			'type'        => Controls_Manager::TEXTAREA,
			'label_block' => true,
            'default' => 'Hundred of People Have Built Their Multi-Tenancy Business with Nazmart Multi-Tenancy Script. Build Yours Now. Got Stuck? Our Experts are Ready to Get You Out'
		]);
        $this->add_control('home_page_image',[
            'label'       => esc_html__( 'Image', 'xgenious-master' ),
            'type'        => Controls_Manager::MEDIA,
        ]);

		$this->end_controls_section();


		$this->start_controls_section(
			'settings_section',
			[
				'label' => esc_html__( 'Button Settings', 'xgenious-master' ),
				'tab'   => Controls_Manager::TAB_CONTENT,
			]
		);
        $repeater = new Repeater();
		$repeater->add_control('button_text',[
			'label'       => esc_html__( 'Button Text', 'xgenious-master' ),
			'type'        => Controls_Manager::TEXT,
			'description' => esc_html__( 'enter button text', 'xgenious-master' ),
			'label_block' => true
		]);
        $repeater->add_control('button_link',[
			'label'       => esc_html__( 'Button Link', 'xgenious-master' ),
			'type'        => Controls_Manager::URL,
			'description' => esc_html__( 'enter button link', 'xgenious-master' ),
			'label_block' => true
		]);
        $repeater->add_control('button_radius',[
            'label'       => esc_html__( 'Button Radius', 'xgenious-master' ),
            'type'        => Controls_Manager::SWITCHER,
            'default' => true
        ]);
		$repeater->add_control('button_style',[
			'label'       => esc_html__( 'Button Style', 'xgenious-master' ),
			'type'        => Controls_Manager::SELECT,
            'options' => [
                'btn-bg-1' => __('Button Style 01'),
                'btn-bg-adminPanel' => __('Button Style 02'),
                'btn-bg-userPanel' => __('Button Style 03'),
                'btn_bg_white' => __('btn bg white'),
                'btn_outline_white' => __('btn outline white'),
            ],
            'default' => 'btn-bg-1',
			'description' => esc_html__( 'enter button style', 'xgenious-master' ),
		]);
        $this->add_control('faq_lists',[
	        'label'       => esc_html__( 'Button List', 'xgenious-master' ),
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

        <section class="build_area section_bg pat-120">
            <div class="build__shapes">
                <img src="<?php echo XGENIOUS_MASTER_ASSETS.'images/build-shapes.png'?>" alt="build_shape">
            </div>
            <div class="container">
                <div class="new_sectionTitle">
                    <h2 class="title"><?php echo esc_html($settings['section_title']);?></h2>
                    <p class="section_para mt-3"><?php echo wp_kses_post($settings['section_description']);?></p>
                    <div class="btn_wrapper d-flex justify-content-center mt-4">
                        <?php
                        $faq_list = $settings['faq_lists'];
                        foreach ($faq_list as $list):
                            printf('<a href="%1$s" target="%4$s"  class="cmn_btn %2$s %5$s"> %3$s </a>',
                                $list['button_link']['url'],
                                $list['button_style'],
                                $list['button_text'],
                                $list['button_link']['is_external'] ? '_blank' : '_self',
                                $list['button_radius'] == 'yes' ? 'radius-30' : ''
                            );
                        endforeach;?>
                    </div>
                </div>
                <div class="row ">
                    <div class="col-lg-12">
                        <div class="build_wrapper build_blur_bg text-center">
                            <div class="build_wrapper__thumb">
                                <?php
                                    $img_id = $settings['home_page_image']['id'] ;
                                    $img_url_val = $img_id ? wp_get_attachment_image_src($img_id,'full',false) : '';
                                    $img_url = is_array($img_url_val) && !empty($img_url_val) ? $img_url_val[0] : '';
                                    $img_alt =  $img_id ? get_post_meta($img_id,'_wp_attachment_image_alt',true) : '';

                                    printf('<img src="%1$s" alt="%2$s">',$img_url,$img_alt);
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
		<?php
	}
}

Plugin::instance()->widgets_manager->register( new Xgenious_Nazmart_Landing_CTA_Area_Widget() );