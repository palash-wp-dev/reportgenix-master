<?php
/**
 * Elementor Widget
 * @package Attorg
 * @since 1.0.0
 */

namespace Elementor;

class Xgenious_Landing_Card_Seven_Widget extends Widget_Base {

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
		return 'xgenious-landing-card-seven-widget';
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
		return esc_html__( 'Landing Card: 07', 'xgenious-master' );
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
			'label_block' => true
		]);
		$this->add_control('description',[
			'label'       => esc_html__( 'Description', 'xgenious-master' ),
			'type'        => Controls_Manager::WYSIWYG
		]);

		$this->end_controls_section();
		
        $this->start_controls_section(
			'image_settings_section',
			[
				'label' => esc_html__( 'Images', 'xgenious-master' ),
				'tab'   => Controls_Manager::TAB_CONTENT,
			]
		);
		$this->add_control('image_one',[
			'label'       => esc_html__( 'Image 01', 'xgenious-master' ),
			'type'        => Controls_Manager::MEDIA,
			'label_block' => true
		]);
		$this->add_control('image_two',[
			'label'       => esc_html__( 'Image 02', 'xgenious-master' ),
			'type'        => Controls_Manager::MEDIA,
			'label_block' => true
		]);
		$this->add_control('image_three',[
			'label'       => esc_html__( 'Image 03 (shape image)', 'xgenious-master' ),
			'type'        => Controls_Manager::MEDIA,
			'label_block' => true
		]);
		$this->end_controls_section();
		
		
		$this->start_controls_section(
			'_button_settings_section',
			[
				'label' => esc_html__( 'Button Settings', 'xgenious-master' ),
				'tab'   => Controls_Manager::TAB_CONTENT,
			]
		);
		$this->add_control('button_text',[
			'label'       => esc_html__( 'Button Text', 'xgenious-master' ),
			'type'        => Controls_Manager::TEXT,
			'description' => esc_html__( 'enter button text', 'xgenious-master' ),
			'label_block' => true
		]);
		$this->add_control('button_link',[
			'label'       => esc_html__( 'Button Link', 'xgenious-master' ),
			'type'        => Controls_Manager::URL,
			'description' => esc_html__( 'enter button link', 'xgenious-master' ),
			'label_block' => true
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
		
		<section class="app_area padding-top-50 padding-bottom-50">
        <div class="container">
            <div class="row g-5 align-items-center justify-content-center justify-content-lg-between">
                <div class="col-xxl-5 col-lg-6 col-md-9">
                    <div class="app_wrapper">
                        <div class="app_mobile">
                            <div class="app_mobile__inner">
                                <div class="app_mobile__shapes">
                                   <?php 
                                
                                        $image_id = $settings['image_three']['id'];
                                		$image_src = !empty($image_id) ? wp_get_attachment_image_src($image_id,'full')[0] : '';
                                		$image_alt = !empty($image_id) ? get_post_meta($image_id,'_wp_attachment_image_alt',true) : '';
    		                            printf(' <img src="%1$s" alt="%2$s">',esc_url($image_src),esc_attr($image_alt));
                                    ?>
                                </div>
                                <div class="app_mobile_thumb wow fadeInRight" data-wow-delay=".1s" >
                                    <?php 
                                
                                        $image_id = $settings['image_one']['id'];
                                		$image_src = !empty($image_id) ? wp_get_attachment_image_src($image_id,'full')[0] : '';
                                		$image_alt = !empty($image_id) ? get_post_meta($image_id,'_wp_attachment_image_alt',true) : '';
    		                            printf(' <img src="%1$s" alt="%2$s">',esc_url($image_src),esc_attr($image_alt));
                                    ?>
                                </div>
                                <div class="app_mobile_thumb right wow fadeIn" data-wow-delay=".2s" >
                                    <?php 
                                
                                        $image_id = $settings['image_two']['id'];
                                		$image_src = !empty($image_id) ? wp_get_attachment_image_src($image_id,'full')[0] : '';
                                		$image_alt = !empty($image_id) ? get_post_meta($image_id,'_wp_attachment_image_alt',true) : '';
    		                            printf(' <img src="%1$s" alt="%2$s">',esc_url($image_src),esc_attr($image_alt));
                                    ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xxl-6 col-lg-6">
                    <div class="app_single">
                        <div class="section_title">
                            <h2 class="title"><?php echo esc_html($settings['title']); ?></h2>
                            <div class="section_para">
                                <?php echo wp_kses_post($settings['description']); ?>
                            </div>
                            
                        </div>
                        <?php if(!empty($settings['button_text'])):?>
                            <div class="btn-wrapper mt-4 mt-lg-5">
                                <a href="<?php echo  esc_html($settings['button_link']['url'] ?? '');?>" class="cmn-btn btn-bg-1"><?php echo  esc_html($settings['button_text']);?></a>
                            </div>
                            <?php endif;?>
                    </div>
                </div>
            </div>
        </div>
    </section>
    
		<?php
	}
}

Plugin::instance()->widgets_manager->register( new Xgenious_Landing_Card_Seven_Widget() );