<?php
/**
 * Elementor Widget
 * @package Attorg
 * @since 1.0.0
 */

namespace Elementor;
class Xgenious_Landing_Header_Area_One_Widget extends Widget_Base {

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
		return 'xgenious-landing-header-area-one-widget';
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
		return esc_html__( 'Landing Header Area One', 'xgenious-master' );
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
		$this->add_control('price',[
			'label'       => esc_html__( 'Price', 'xgenious-master' ),
			'type'        => Controls_Manager::TEXT,
			'label_block' => true
		]);
		$this->add_control('right_image',[
			'label'       => esc_html__( 'Right Image', 'xgenious-master' ),
			'type'        => Controls_Manager::MEDIA,
		]);
	
		$this->end_controls_section();


		$this->start_controls_section(
			'color_settings_section',
			[
				'label' => esc_html__( 'Color Settings', 'xgenious-master' ),
				'tab'   => Controls_Manager::TAB_CONTENT,
			]
		);
		$this->add_control('section_shape_color',[
			'label'       => esc_html__( 'Section Shape Color', 'xgenious-master' ),
			'type'        => Controls_Manager::COLOR,
			'selectors' => [
					'{{WRAPPER}} .category-banner-image-thumb::before' => 'background-color: {{VALUE}}'
			]
		]);
		$this->add_control('section_price_backgorun_color',[
			'label'       => esc_html__( 'Price Circle Backgorund Color', 'xgenious-master' ),
			'type'        => Controls_Manager::COLOR,
			'selectors' => [
					'{{WRAPPER}} .category-banner-image-price' => 'background-color: {{VALUE}}'
			]
		]);
		$this->add_control('section_price_text_color',[
			'label'       => esc_html__( 'Price Circle Text Color', 'xgenious-master' ),
			'type'        => Controls_Manager::COLOR,
			'selectors' => [
					'{{WRAPPER}} .category-banner-image-price' => 'color: {{VALUE}}'
			]
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
		$repeater->add_control('button_style',[
			'label'       => esc_html__( 'Button Style', 'xgenious-master' ),
			'type'        => Controls_Manager::SELECT,
            'options' => [
                'btn-bg-1' => __('Button Style 01'),
                'btn-bg-adminPanel' => __('Button Style 02'),
                'btn-bg-userPanel' => __('Button Style 03'),
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
        <section class="category-banner category-banner-padding section-bg-2">
            <div class="category-banner-shapes">
                <img src="<?php echo XGENIOUS_IMG.'/category_banner/category_banner_shapes.svg';?>" alt="">
            </div>
            <div class="container container_1430">
                <div class="row gy-4 justify-content-between align-items-center flex-lg-row flex-column-reverse">
                    <div class="col-xxl-6 col-lg-6">
                        <div class="category-banner-contents">
                            <h1 class="category-banner-contents-title"> <?php echo esc_html($settings['section_title'])?></h1>
                            <div class="category-banner-contents-para mt-4"> <?php echo wp_kses_post($settings['section_description'])?> </div>
                            <div class="btn-wrapper d-flex flex-wrap mt-4 mt-lg-5">
	                            <?php
	                            $faq_list = $settings['faq_lists'];
	                            foreach ($faq_list as $list):
                                    printf('<a href="%1$s" target="%4$s"  class="cmn-btn %2$s"> %3$s </a>',$list['button_link']['url'],$list['button_style'],$list['button_text'],$list['button_link']['is_external'] ? '_blank' : '_self');
		                        endforeach;?>
                            </div>
                        </div>
                    </div>
                    <div class="col-xxl-6 col-lg-6">
                        <div class="category-banner-image">
                            <div class="category-banner-image-wrapper">
                                <div class="category-banner-image-thumb">
                                    <div class="category-banner-image-thumb-single">
	                                    <?php
                                            $img_id = $settings['right_image']['id'] ;
                                            $img_url_val = $img_id ? wp_get_attachment_image_src($img_id,'full',false) : '';
                                            $img_url = is_array($img_url_val) && !empty($img_url_val) ? $img_url_val[0] : '';
                                            $img_alt =  $img_id ? get_post_meta($img_id,'_wp_attachment_image_alt',true) : '';
                                            printf('<img src="%1$s" alt="%2$s">',$img_url,$img_alt);
	                                    ?>
                                    </div>
                                </div>
                                <div class="category-banner-image-price-shape">
                                    <img src="<?php echo XGENIOUS_IMG.'/category_banner/category_price_vector.svg';?>" alt="">
                                    <span class="category-banner-image-price"> <?php echo esc_html($settings['price']);?> </span>
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

Plugin::instance()->widgets_manager->register( new Xgenious_Landing_Header_Area_One_Widget() );