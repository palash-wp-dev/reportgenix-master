<?php
/**
 * Elementor Widget
 * @package xgenous
 * @since 1.0.0
 */

namespace Elementor;


class Xgenious_We_Area_Available_Two_Widget extends Widget_Base {

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
		return 'xgenious-we-area-avilable-widget';
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
		return esc_html__( 'We Area Available Two', 'xgenous-master' );
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
		return 'eicon-archive-title';
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
			'contact_Form_settings_section',
			[
				'label' => esc_html__( 'General Settings', 'xgenous-master' ),
				'tab'   => Controls_Manager::TAB_CONTENT,
			]
		);
		$this->add_control( 'title', [
			'type'    => Controls_Manager::TEXTAREA,
			'label'   => esc_html__( 'Title', 'xgenious-master' ),
			'description' => esc_html__('use {c}color with anchor{/c} , use {b}break into new line{/b}')
		] );
		$this->add_control( 'description', [
			'type'    => Controls_Manager::TEXTAREA,
			'label'   => esc_html__( 'Description', 'xgenious-master' ),
		] );
        $this->end_controls_section();
		$this->start_controls_section(
			'left_settings_section',
			[
				'label' => esc_html__( 'Reviews Area', 'xgenious-master' ),
				'tab'   => Controls_Manager::TAB_CONTENT,
			]
		);
		
        $repeater_reviews = new Repeater();
		$repeater_reviews->add_control('image',[
			'label'       => esc_html__( 'Image', 'xgenious-master' ),
			'type'        => Controls_Manager::MEDIA,
        ]);
		$repeater_reviews->add_control('title',[
			'label'       => esc_html__( 'Title', 'xgenious-master' ),
			'type'        => Controls_Manager::TEXT,
			'label_block' => true,
			'description' => esc_html__( 'enter title', 'xgenious-master' ),
		]);
		$repeater_reviews->add_control('rating_text',[
			'label'       => esc_html__( 'Rating Text', 'xgenious-master' ),
			'type'        => Controls_Manager::TEXTAREA,
			'label_block' => true,
			'description' => esc_html__( 'add {n}number{/n} to separate number', 'xgenious-master' ),
		]);
		$repeater_reviews->add_control('reviews_text',[
			'label'       => esc_html__( 'Reviews Text', 'xgenious-master' ),
			'type'        => Controls_Manager::TEXTAREA,
			'label_block' => true,
			'description' => esc_html__( 'add {n}number{/n} to separate number', 'xgenious-master' ),
		]);
		$repeater_reviews->add_control('url',[
			'label'       => esc_html__( 'URL', 'xgenious-master' ),
			'type'        => Controls_Manager::URL,
			'description' => esc_html__( 'enter url', 'xgenious-master' ),
		]);
        $this->add_control('reviews_lists',[
	        'label'       => esc_html__( 'Reviews List', 'xgenious-master' ),
	        'type'        => Controls_Manager::REPEATER,
            'fields' => $repeater_reviews->get_controls(),
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
		$repeater->add_control('image',[
			'label'       => esc_html__( 'Image', 'xgenious-master' ),
			'type'        => Controls_Manager::MEDIA,
        ]);
		$repeater->add_control('url',[
			'label'       => esc_html__( 'URL', 'xgenious-master' ),
			'type'        => Controls_Manager::URL,
			'description' => esc_html__( 'enter url', 'xgenious-master' ),
		]);
        $this->add_control('available_lists',[
	        'label'       => esc_html__( 'Available List', 'xgenious-master' ),
	        'type'        => Controls_Manager::REPEATER,
            'fields' => $repeater->get_controls(),
        ]);
		$this->end_controls_section();


	}

	/**
	 * Render Elementor widget output on the frontend.
	 *
	 * Written in PHP and used to generate the final HTML.
	 *
	 * @since 1.0.0
	 * @access protected
	 */
	protected function render() {
		$settings = $this->get_settings_for_display();
		?>
		<section class="available-area">
				<div class="container container_1430">
					<div class="customer-wrapper-all customer-wrapper-padding section-bg radius-10">
						<div class="available-shapes">
							<img src="<?php echo  XGENIOUS_IMG; ?>/selling_product/sell_product_shape2.png" alt="">
							<img src="<?php echo  XGENIOUS_IMG; ?>/selling_product/sell_product_shape3.png" alt="">
						</div>
						<div class="row g-5 align-items-center justify-content-between">
							<div class="col-lg-6">
								<div class="customer-wrapper">
									<div class="section-title text-left">
										<h2 class="title"> <?php echo esc_html($settings['title']);?> </h2>
										<p class="section-para mt-3"><?php echo esc_html($settings['description']);?>  </p>
									</div>

									<div class="customer-wrapper-contents mt-4 mt-lg-5">
										<?php 

											$whyUsList = $settings['reviews_lists'];
											foreach ($whyUsList as $list):
												$image_id = $list['image']['id'];
												$image_url = wp_get_attachment_image_src( $image_id, 'full', false );
												$image_alt = get_post_meta( $image_id, '_wp_attachment_image_alt', true );
												$url = $list['url']['url'] ?? '';
										?>
										<div class="customer-wrapper-contents-single">
											<div class="customer-wrapper-contents-single-icon">
												<?php printf('<img src="%1$s" alt="%2$s">',current($image_url),$image_alt);?>
											</div>
											<div class="customer-wrapper-contents-single-contents">
												<h4 class="customer-wrapper-contents-single-contents-title"> 
													<?php 
														printf('<a href="%1$s">%2$s</a>',esc_url($url),esc_html($list['title']));
													?>
												</h4>
												<ul class="customer-wrapper-contents-single-contents-list list-style-none">
													<li class="customer-wrapper-contents-single-contents-list-item">
														<?php 
															$rating_text = $list['rating_text'];
															$rating_text = str_replace(['{n}','{/n}'],['<span>','</span>'],$rating_text);
															printf('<a href="%1$s"> %2$s</a>',esc_url($url),$rating_text);
														?>
													</li>
													<li class="customer-wrapper-contents-single-contents-list-item <?php echo esc_attr(strtolower($list['title']));?>">
														<?php 
															$reviews_text = $list['reviews_text'];
															$reviews_text = str_replace(['{n}','{/n}'],['<span>','</span>'],$reviews_text);
															printf('<a href="%1$s"> %2$s</a>',esc_url($url),$reviews_text);
														?>
													</li>
												</ul>
											</div>
										</div>
										<?php endforeach;?>
									</div>
								</div>
							</div>
							<div class="col-lg-6">
								<div class="available-marketplace-wrapper">
									<div class="single-work mt-4">
										<ul class="single-work-list list-style-none">
										<?php
											$whyUsList = $settings['available_lists'];
											foreach ($whyUsList as $list):
												$image_id = $list['image']['id'];
												$image_url = wp_get_attachment_image_src( $image_id, 'full', false );
												$image_alt = get_post_meta( $image_id, '_wp_attachment_image_alt', true );
												$img_url = $list['url']['url'] ?? '';
												?>
												<li class="single-work-list-item">
													<?php printf('<a href="%1$s"> <img src="%2$s" alt="%3$s"> </a>',$img_url,current($image_url),$image_alt);?>
												</li>
											<?php endforeach;?>
										</ul>
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

Plugin::instance()->widgets_manager->register( new Xgenious_We_Area_Available_Two_Widget() );