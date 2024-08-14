<?php
/**
 * Elementor Widget
 * @package xgenous
 * @since 1.0.0
 */

namespace Elementor;

use Elementor\Core\Kits\Controls\Repeater;

class Xgenious_Header_Area_One_Widget extends Widget_Base {

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
		return 'xgenious-header-area-one-widget';
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
		return esc_html__( 'Header Slider One', 'xgenous-master' );
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
			'settings_section',
			[
				'label' => esc_html__( 'Section Contents', 'xgenous-master' ),
				'tab'   => Controls_Manager::TAB_CONTENT,
			]
		);
		$this->add_control( 'description', [
			'type'    => Controls_Manager::TEXTAREA,
			'label'   => esc_html__( 'Description', 'xgenious-master' ),
		] );
		$this->add_control( 'subtitle', [
			'type'    => Controls_Manager::TEXTAREA,
			'label'   => esc_html__( 'Subtitle', 'xgenious-master' ),
			'default' => __('Welcome To Xgenious','xgenious-master')
		] );	
		$this->add_control( 'title', [
			'type'    => Controls_Manager::TEXTAREA,
			'label'   => esc_html__( 'Title', 'xgenious-master' ),
			'description' => esc_html__( 'add {line}Line{/line} to get line under the word', 'xgenious-master' )
		] );
		$this->add_control( 'btn_one_status',
			[
				'label'       => esc_html__( 'Button One Show/Hide', 'xgenous-master' ),
				'type'        => Controls_Manager::SWITCHER,
				'default'     => 'yes',
				'description' => esc_html__( 'show/hide button one', 'xgenous-master' ),
		] );
		$this->add_control( 'btn_one_normal_text',[
			'label'       => esc_html__( 'Button One Normal Text', 'xgenous-master' ),
			'type'        => Controls_Manager::TEXT,
			'default'     => esc_html__( 'Need any help?', 'xgenous-master' ),
			'description' => esc_html__( 'enter button one text', 'xgenous-master' ),
			'condition'   => [
				'btn_one_status' => 'yes'
			]
		]);
		$this->add_control( 'btn_one_text',[
			'label'       => esc_html__( 'Button One Label', 'xgenous-master' ),
			'type'        => Controls_Manager::TEXT,
			'default'     => esc_html__( 'Contact Us', 'xgenous-master' ),
			'description' => esc_html__( 'enter button one text', 'xgenous-master' ),
			'condition'   => [
				'btn_one_status' => 'yes'
			]
		]);
		$this->add_control( 'btn_one_url',[
			'label'       => esc_html__( 'Button One URL', 'xgenous-master' ),
			'type'        => Controls_Manager::URL,
			'default'     => [
				'url' => '#'
			],
			'description' => esc_html__( 'enter button one url', 'xgenous-master' ),
			'condition'   => [
				'btn_one_status' => 'yes'
			]
		]);
		// $this->add_control('bottom_image',[
		// 	'type' => Controls_Manager::MEDIA,
		// 	'label' => esc_html__('Bottom Image','xgenious-master')
		// ]);
		$this->add_control('right_image',[
			'type' => Controls_Manager::MEDIA,
			'label' => esc_html__('Right Image','xgenious-master')
		]);
		$this->add_control(
			'shortcode',
			[
				'label' => esc_html__( 'Enter your shortcode', 'elementor' ),
				'type' => Controls_Manager::TEXTAREA,
				'dynamic' => [
					'active' => true,
				],
				'placeholder' => '[gallery id="123" size="medium"]',
				'default' => '',
			]
		);

		// for($i=0;$i<4;$i++){
		// 	$this->add_control('shape_'.$i.'_image',[
		// 		'type' => Controls_Manager::MEDIA,
		// 		'label' => esc_html__('Shape '.($i + 1).' Image','xgenious-master')
		// 	]);
		// }

		$this->add_control( 'social_media_links',
		[
			'label'       => esc_html__( 'Social Media Show/Hide', 'xgenous-master' ),
			'type'        => Controls_Manager::SWITCHER,
			'default'     => 'yes',
			'description' => esc_html__( 'show/hide social medai links', 'xgenous-master' ),
	] );
		$social_links = new \Elementor\Repeater();

		$social_links->add_control(
			'list_title', [
				'label' => __( 'Title', 'xgenous-master' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => __( 'Fb.' , 'xgenous-master' ),
				'label_block' => true,
			]
		);
		$social_links->add_control(
			'list_link',
			[
				'label' => __( 'URL', 'xgenous-master' ),
				'type' => \Elementor\Controls_Manager::URL,
			]
		);

		$this->add_control(
			'social_list',
			[
				'label' => __( 'Social Links', 'xgenous-master' ),
				'type' => \Elementor\Controls_Manager::REPEATER,
				'fields' => $social_links->get_controls(),
				'default' => [
					[
						'list_title' => __( 'Fb.', 'xgenous-master' ),
						'list_link' => '#',
					],
				],
				'condition'   => [
					'social_media_links' => 'yes'
				],
				'title_field' => '{{{ list_title }}}',
			]
		);

		$this->end_controls_section();
		$this->start_controls_section(
			'css_styles',
			[
				'label' => esc_html__( 'Styling Settings', 'xgenous-master' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);
		$this->add_group_control('background',[
			'name' => 'header-background',
			'label' => esc_html__('Background','xgenious-master'),
			'selector' => "{{WRAPPER}} .header-area"
		]);
		$this->add_control('divider',[
			'type' => Controls_Manager::DIVIDER
		]);
		$this->add_responsive_control( 'padding', [
			'label'              => esc_html__( 'Padding', 'xgenous-master' ),
			'type'               => Controls_Manager::DIMENSIONS,
			'size_units'         => [ 'px', 'em' ],
			'allowed_dimensions' => [ 'top', 'bottom' ],
			'selectors'          => [
				'{{WRAPPER}} .header-area' => 'padding-top: {{TOP}}{{UNIT}};padding-bottom: {{BOTTOM}}{{UNIT}};'
			],
			'description'        => esc_html__( 'set padding for header area ', 'xgenous-master' )
		] );
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
		<section class="banner-area banner-padding section-bg-2">
				<div class="banner-socials">
					<ul class="list-style-none">
						<?php 
							$social_list = $settings['social_list'] ?? [];
							foreach($social_list as $list){
								if(!empty($list['list_link']['url'])){
									printf('<li> <a href="%1$s"> %2$s </a> </li>',$list['list_link']['url'],$list['list_title']);
								}
							}
						?>
					</ul>
				</div>
				<div class="banner-bottom-shape">
					<img src="<?php echo XGENIOUS_IMG.'/banner/bottom-shape.png';?>" alt="">
				</div>
				<div class="banner-shapes">
				<img src="<?php echo XGENIOUS_IMG.'/banner/banner-shape1.svg';?>" alt="">
					<img src="<?php echo XGENIOUS_IMG.'/banner/banner-shape2.svg';?>" alt="">
					<img src="<?php echo XGENIOUS_IMG.'/banner/banner-shape3.svg';?>" alt="">
					<img src="<?php echo XGENIOUS_IMG.'/banner/banner-shape4.svg';?>" alt="">
				</div>
				<div class="container container_1430">
					<div class="row align-items-start justify-content-between flex-lg-row flex-column-reverse">
						<div class="col-xxl-6 col-lg-6">
							<div class="banner-content-wrapper">
								<div class="banner-contents banner-content-padding">
									<?php
										$subtitle = $settings['subtitle'];
										$title_markup = $settings['title'];
										$title_markup = str_replace(['{line}','{/line}'],['<span class="banner-contents-title-shape"> <img src="'. XGENIOUS_IMG.'/banner/shape-line.svg" alt="'.__('shape image','xgenious-master').'">','</span>'],$title_markup);
										printf('<span class="subtitle">%1$s</span>',esc_html($subtitle));
										printf('<h1 class="banner-contents-title">%s</h1>',$title_markup);
										
										if(!empty($settings['description'])){
											printf('<p class="banner-contents-para mt-4">%s</p>',$settings['description']);
										}
									?>
								
									<div class="banner-contents-form custom-form mt-4 mt-lg-5">
										<?php
										$shortcode = $this->get_settings_for_display( 'shortcode' );
										$shortcode = do_shortcode( shortcode_unautop( $shortcode ) );
										 echo $shortcode; 
										?>
									</div>
									<?php if(!empty($settings['btn_one_status'])):?>
									<div class="banner-contents-link mt-4">
										<?php 
											$btn_url = $settings['btn_one_url']['url'] ?? '';
											printf('<span class="need-help">%1$s<a href="%2$s"> %3$s </a> </span>',$settings['btn_one_normal_text'],$btn_url,$settings['btn_one_text']);
										?>
										
									</div>
									<?php endif;?>
								</div>
							</div>
						</div>
						<div class="col-xxl-5 col-lg-6">
							<div class="banner-image-wrapper">
								<div class="banner-image">
									<?php 
										$right_image = $settings['right_image']['id'] ?? '';
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
							</div>
						</div>
					</div>
				</div>
			</section>
		<?php
	}
}

Plugin::instance()->widgets_manager->register( new Xgenious_Header_Area_One_Widget() );