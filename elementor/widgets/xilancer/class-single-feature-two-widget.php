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

class Xgenious_Xilancer_Landing_Single_feature_Two_Area_Widget extends Widget_Base {

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
		return 'xgenious-xilancer-single-feature-wo-widget';
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
		return esc_html__( 'Xilancer: Single Feature 02', 'xgenious-master' );
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
		$this->add_control('title',[
			'label'       => esc_html__( 'Title', 'xgenious-master' ),
			'type'        => Controls_Manager::TEXTAREA,
			'label_block' => true,
            'default' => 'Live Chatting System for {h}Freelancers{/h} and {h}clients{/h}'
		]);
	
        $this->add_control('description',[
			'label'       => esc_html__( 'Description', 'xgenious-master' ),
			'type'        => Controls_Manager::TEXTAREA,
			'label_block' => true,
            'default' => 'Allow Client & Freelancers to efficiently collaborate real time in their projects right into the Xilancer platform'
		]);
        $this->add_control('top_image',[
            'label'       => esc_html__( 'Top Image', 'xgenious-master' ),
            'type'        => Controls_Manager::MEDIA,
        ]);
		$this->add_control('left_image',[
			'label'       => esc_html__( 'Left Image', 'xgenious-master' ),
			'type'        => Controls_Manager::MEDIA,
		]);
		$this->add_control('bottom_image',[
			'label'       => esc_html__( 'Bottom Image', 'xgenious-master' ),
			'type'        => Controls_Manager::MEDIA,
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
        <section class="chat__area section__bg__bottomShape pat-60 pab-60 xilancer">
            <div class="container">
                <div class="new_sectionTitle wow animate__ animate__zoomIn animated" data-wow-delay=".1s">

	                <?php
	                $title = $settings['title'];
	                $title_markup = str_replace(['{h}','{/h}'],[' <span class="title__color">','</span>'],$title);
	                ?>
                    <h2 class="title">
                        <?php echo wp_kses_post($title_markup);?>
                    </h2>
                    <p class="section_para mt-3"><?php echo esc_html($settings['description']);?></p>
                </div>
                <div class="row mt-5">
                    <div class="col-lg-12 wow animate__ animate__fadeInUp animated" data-wow-delay=".3s" >
                        <div class="sectionItem__wrap">
                            <div class="sectionItem__flex">
                                <div class="sectionItem__left">
                                    <div class="sectionItem__thumb">
	                                    <?php
	                                    $img_id = $settings['left_image']['id'] ;
	                                    $img_url_val = $img_id ? wp_get_attachment_image_src($img_id,'full',false) : '';
	                                    $img_url = is_array($img_url_val) && !empty($img_url_val) ? $img_url_val[0] : '';
	                                    $img_alt =  $img_id ? get_post_meta($img_id,'_wp_attachment_image_alt',true) : '';
	                                    printf('<img src="%1$s" alt="%2$s">',$img_url,$img_alt);
	                                    ?>
                                    </div>
                                </div>
                                <div class="sectionItem__right">
                                    <div class="sectionItem__thumb">
	                                    <?php
	                                    $img_id = $settings['top_image']['id'] ;
	                                    $img_url_val = $img_id ? wp_get_attachment_image_src($img_id,'full',false) : '';
	                                    $img_url = is_array($img_url_val) && !empty($img_url_val) ? $img_url_val[0] : '';
	                                    $img_alt =  $img_id ? get_post_meta($img_id,'_wp_attachment_image_alt',true) : '';
	                                    printf('<img src="%1$s" alt="%2$s">',$img_url,$img_alt);
	                                    ?>
                                    </div>
                                    <div class="sectionItem__thumb">
	                                    <?php
	                                    $img_id = $settings['bottom_image']['id'] ;
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
                </div>
            </div>
        </section>
		<?php
	}
}

Plugin::instance()->widgets_manager->register( new Xgenious_Xilancer_Landing_Single_feature_Two_Area_Widget() );