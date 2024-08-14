<?php
/**
 * Elementor Widget
 * @package Attorg
 * @since 1.0.0
 */

namespace Elementor;
class Xgenious_Testimonial_Three_Widget extends Widget_Base {

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
		return 'xgenious-testimonial-three-widget';
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
		return esc_html__( 'Testimonial: 03', 'xgenious-master' );
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
			'section_settings_section',
			[
				'label' => esc_html__( 'General Settings', 'xgenious-master' ),
				'tab'   => Controls_Manager::TAB_CONTENT,
			]
		);
        $this->add_control('section_title',[
	        'label'       => esc_html__( 'Section Title', 'xgenious-master' ),
	        'type'        => Controls_Manager::TEXT,
	        'label_block' => true,
	        'description' => esc_html__( 'use {c}color{/c} for color text', 'xgenious-master' ),
        ]);
        
		$this->end_controls_section();
		
		$this->start_controls_section(
			'settings_section',
			[
				'label' => esc_html__( 'Testimonial Item Settings', 'xgenious-master' ),
				'tab'   => Controls_Manager::TAB_CONTENT,
			]
		);
		
		$repeater = new Repeater();
		$repeater->add_control('name',[
			'label'       => esc_html__( 'Name', 'xgenious-master' ),
			'type'        => Controls_Manager::TEXT,
			'description' => esc_html__( 'enter name', 'xgenious-master' ),
			'label_block' => true
		]);
		$repeater->add_control('image',[
			'label'       => esc_html__( 'Image', 'xgenious-master' ),
			'type'        => Controls_Manager::MEDIA,
			'description' => esc_html__( 'enter image', 'xgenious-master' ),
		]);
		$repeater->add_control('description',[
			'label'       => esc_html__( 'Description', 'xgenious-master' ),
			'type'        => Controls_Manager::WYSIWYG,
			'description' => esc_html__( 'enter description', 'xgenious-master' ),
		]);
	
		$this->add_control('testimonial_items',[
			'label'       => esc_html__( 'Testimonial List', 'xgenious-master' ),
			'type'        => Controls_Manager::REPEATER,
			'fields' => $repeater->get_controls(),
			
			'title_field' => "{{{name}}}"
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
		
		<section class="testimonial_three_area padding-top-50 padding-bottom-50">
        <div class="container">
            <div class="section_title center-text">
                <h2 class="title">
                <?php
                    $section_title = $settings['section_title'];
                    $section_title_with_color = str_replace(['{c}','{/c}'],['<span class="title-color">','</span>'],$section_title);
                    printf('<h2 class="title"> %1$s </h2>',wp_kses_post($section_title_with_color));
                ?>
                </h2>
            </div>
            <div class="row mt-5">
                
                    
                    <?php
                        $platform_list = $settings['testimonial_items'];
                        foreach($platform_list as $pl_list):
                    ?>
                    
                    <div class="col-lg-4 col-md-6">
                        
                        <div class="testimonial_single center-text testimonial_single__border padding-20 radius-10">
                                <div class="testimonial_single__contents">
                                    <div class="testimonial_single__icon">
                                        <?php 
                							$right_image = $pl_list['image']['id'] ?? '';
                							$right_image_url = '';
                							$right_image_alt= '';
                							if(!empty($right_image)){
                								$image_src = wp_get_attachment_image_src($right_image,'full',true);
                								$right_image_url =  is_array($image_src) ? current($image_src) : '';
                								$right_image_alt= get_post_meta($right_image,'_wp_attachment_image_alt',true);
                								printf('<img src="%1$s" alt="%2$s">',$right_image_url,$right_image_alt);
                							}
            							?>
                                    </div>
                                    <h4 class="testimonial_single__title mt-3"><?php echo esc_html($pl_list['name']);?></h4>
                                    <div class="rating-wrap mt-3">
                                        <div class="ratings">
                                            <span class="hide-rating"></span>
                                            <span class="show-rating"></span>
                                        </div>
                                    </div>
                                    <p class="testimonial_single__para mt-3"><?php echo wp_kses_post($pl_list['description'])?></p>
                                </div>
                            </div>
                            
                    </div>
                    <?php endforeach;?>
                
            </div>
        </div>
    </section>
    
		<?php
	}
}

Plugin::instance()->widgets_manager->register( new Xgenious_Testimonial_Three_Widget() );