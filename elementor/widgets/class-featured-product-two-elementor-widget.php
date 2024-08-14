<?php
/**
 * Elementor Widget
 * @package Appside
 * @since 1.0.0
 */

namespace Elementor;
class Xgenious_Featured_Product_Grid_Two_Widget extends Widget_Base {

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
		return 'xgenious-featured-product-two-widget';
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
		return esc_html__( 'Featured Product Grid: 02', 'xgenious-master' );
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
		return ' eicon-image-box';
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
			'label'       => esc_html__( 'Section Description', 'xgenious-master' ),
			'type'        => Controls_Manager::TEXTAREA,
		]);
		$this->add_control('section_status',[
			'label'       => esc_html__( 'Section Title show/hide', 'xgenious-master' ),
			'type'        => Controls_Manager::SWITCHER,
		]);


		$this->end_controls_section();

		$this->start_controls_section(
			'item_settings_section',
			[
				'label' => esc_html__( 'Item Settings', 'xgenious-master' ),
				'tab'   => Controls_Manager::TAB_CONTENT,
			]
		);
		$this->add_control('title',[
			'label'       => esc_html__( 'Title', 'xgenious-master' ),
			'type'        => Controls_Manager::TEXT,
			'label_block' => true
		]);
		$this->add_control('description',[
			'label'       => esc_html__( 'Description', 'xgenious-master' ),
			'type'        => Controls_Manager::TEXTAREA,
		]);
		$this->add_control('copuon_text',[
			'label'       => esc_html__( 'Coupon Text', 'xgenious-master' ),
			'type'        => Controls_Manager::TEXT,
			'label_block' => true
		]);
	
		$this->add_control('product_url',[
			'label'       => esc_html__( 'Product URL', 'xgenious-master' ),
			'type'        => Controls_Manager::URL,
		]);
		$this->add_control('button_one_text',[
			'label'       => esc_html__( 'Button One Text', 'xgenious-master' ),
			'type'        => Controls_Manager::TEXT,
			'label_block' => true
		]);
		$this->add_control('button_one_url',[
			'label'       => esc_html__( 'Button One URL', 'xgenious-master' ),
			'type'        => Controls_Manager::URL,
		]);
		
		$this->end_controls_section();
		$this->start_controls_section(
			'item_features_settings_section',
			[
				'label' => esc_html__( 'Features Settings', 'xgenious-master' ),
				'tab'   => Controls_Manager::TAB_CONTENT,
			]
		);
		$repeater = new Repeater();
		$repeater->add_control('text',[
			'label'       => esc_html__( 'Text', 'xgenious-master' ),
			'type'        => Controls_Manager::TEXTAREA,
			'label_block' => true
		]);
		$this->add_control('features_list',[
			'label'       => esc_html__( 'Features Lists', 'xgenious-master' ),
			'type'        => Controls_Manager::REPEATER,
			'fields' => $repeater->get_controls(),
			'title' => "{{{text}}}"
		]);

		//repeater
		$this->end_controls_section();
		$this->start_controls_section(
			'images_settings_section',
			[
				'label' => esc_html__( 'Images Settings', 'xgenious-master' ),
				'tab'   => Controls_Manager::TAB_CONTENT,
			]
		);
		
		$this->add_control('left_side_image',[
			'label'       => esc_html__( 'Product Image', 'xgenious-master' ),
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
		$settings             = $this->get_settings_for_display();


		$img_id = $settings['left_side_image']['id'] ?? '' ;
		$img_url_val = $img_id ? wp_get_attachment_image_src($img_id,'full',false) : '';
		$img_url = is_array($img_url_val) && !empty($img_url_val) ? $img_url_val[0] : '';
		$img_alt =  $img_id ? get_post_meta($img_id,'_wp_attachment_image_alt',true) : '';
		
		
		?>
            <section class="product-selling-area bg-image style_two" >
				<div class="container container_1430">
				    <?php if($settings['section_status'] === 'yes'):?>
					<div class="section-title">
						<?php printf('<h2 class="title"> %s</h2>',$settings['section_title'])?>
						<?php printf('<p class="description"> %s</p>',$settings['section_description'])?>
					</div>
					<?php endif;?>
					<div class="product-selling-inner section-bg bg-image product-selling-padding radius-10 mt-5">
						<div class="product-shapes">
							<img src="<?php echo XGENIOUS_IMG.'/selling_product/sell_product_shape2.png';?>" alt="">
							<img src="<?php echo XGENIOUS_IMG.'/selling_product/sell_product_shape3.png';?>" alt="">
						</div>
						<div class="row g-5 align-items-center">
							<div class="col-lg-6">
								<div class="product-selling-image-wrapper">
									<div class="product-selling">
										<div class="product-selling-single">
											<?php
												printf('<img src="%1$s" alt="%2$s">',$img_url,$img_alt);
											?>
										</div>
									</div>
								</div>
							</div>
							<div class="col-lg-6">
								<div class="product-selling-wrapper">
									<div class="product-selling-content">
										
											<?php 
											if(!empty($settings['copuon_text'])){
											    printf('<span class="discount_coupon">%s</span>',esc_html($settings['copuon_text']));
											}
											    
												printf('<h2 class="product-selling-content-title mt-4"><a href="%1$s"> %2$s</a></h2>',esc_html($settings['product_url']['url'] ?? ''),esc_html($settings['title']));
												printf('<p class="product-selling-content-para mt-3"> %1$s</p>',esc_html($settings['description']));
											?>
											 
										<ul class="product-selling-content-list list-style-none  mt-4">
										<?php 
											$feature_list = $settings['features_list'] ?? [];
											foreach($feature_list as $list ){
												printf('<li class="product-selling-content-list-item"> %1$s </li>',$list['text']);
											}
										
										?>
										</ul>
										<div class="btn-wrapper d-flex flex-wrap mt-4">
											<?php 
												if(!empty($settings['button_one_text'])){
													printf('<a href="%1$s" class="cmn-btn btn-bg-adminPanel btn-outline-adminPanel"> %2$s</a>',esc_url(esc_url($settings['button_one_url']['url'] ?? '')), esc_html($settings['button_one_text']));
												}
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

Plugin::instance()->widgets_manager->register( new Xgenious_Featured_Product_Grid_Two_Widget() );