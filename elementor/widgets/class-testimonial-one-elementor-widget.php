<?php
/**
 * Elementor Widget
 * @package Attorg
 * @since 1.0.0
 */

namespace Elementor;
class Xgenious_Testimonial_One_Widget extends Widget_Base {

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
		return 'xgenious-testimonial-one-widget';
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
		return esc_html__( 'Testimonial One', 'xgenious-master' );
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
        $this->add_control('section_description',[
	        'label'       => esc_html__( 'Section Description', 'xgenious-master' ),
	        'type'        => Controls_Manager::TEXTAREA,
	        'description' => esc_html__( 'enter description', 'xgenious-master' ),
        ]);
		$this->end_controls_section();
		$this->start_controls_section(
			'settings_section',
			[
				'label' => esc_html__( 'Testimonial Item Settings', 'xgenious-master' ),
				'tab'   => Controls_Manager::TAB_CONTENT,
			]
		);
		$this->add_control( 'testimonial_items', [
			'label'       => esc_html__( 'Testimonial Item', 'xgenious-master' ),
			'type'        => Controls_Manager::REPEATER,
			'fields'      => [
				[
					'name'        => 'icon',
					'label'       => esc_html__( 'Icons', 'xgenious-master' ),
					'type'        => Controls_Manager::ICONS,
				],
				[
					'name'        => 'name',
					'label'       => esc_html__( 'Name', 'xgenious-master' ),
					'type'        => Controls_Manager::TEXT,
                    'label_block' => true,
					'description' => esc_html__( 'enter name', 'xgenious-master' ),
				],
				[
					'name'        => 'designation',
					'label'       => esc_html__( 'Designation', 'xgenious-master' ),
					'type'        => Controls_Manager::TEXT,
					'label_block' => true,
				],
				[
					'name'        => 'description',
					'label'       => esc_html__( 'Description', 'xgenious-master' ),
					'type'        => Controls_Manager::TEXTAREA,
					'description' => esc_html__( 'enter description', 'xgenious-master' ),
				]

			],
			'title_field' => '{{name}}'
		] );
		$this->end_controls_section();

		$this->start_controls_section(
			'platform_settings_section',
			[
				'label' => esc_html__( 'Platform Settings', 'xgenious-master' ),
				'tab'   => Controls_Manager::TAB_CONTENT,
			]
		);
        $platform_repeater = new Repeater();
        $platform_repeater->add_control('title',[
	        'label'       => esc_html__( 'Title', 'xgenious-master' ),
	        'type'        => Controls_Manager::TEXT,
	        'label_block' => true,
	        'description' => esc_html__( 'enter title', 'xgenious-master' )
        ]);
		$platform_repeater->add_control('link',[
			'label'       => esc_html__( 'Link', 'xgenious-master' ),
			'type'        => Controls_Manager::URL
		]);
		$platform_repeater->add_control('image',[
			'label'       => esc_html__( 'Image', 'xgenious-master' ),
			'type'        => Controls_Manager::MEDIA
		]);
		$platform_repeater->add_control('rating_text',[
			'label'       => esc_html__( 'Rating Text', 'xgenious-master' ),
			'type'        => Controls_Manager::TEXT,
			'label_block' => true,
			'description' => esc_html__( 'wrap number with {r}4.3{/r}', 'xgenious-master' )
		]);
		$platform_repeater->add_control('reviews_text',[
			'label'       => esc_html__( 'Reviews Text', 'xgenious-master' ),
			'type'        => Controls_Manager::TEXT,
			'label_block' => true,
			'description' => esc_html__( 'wrap number with {r}4.3{/r}', 'xgenious-master' )
		]);
        $this->add_control('platform_list',[
	        'label'       => esc_html__( 'Platform List', 'xgenious-master' ),
	        'type'        => Controls_Manager::REPEATER,
            'fields' => $platform_repeater->get_controls()
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
        <section class="customer-area padding-top-60 padding-bottom-60 active" >
            <div class="container container_1430">
                <div class="customer-wrapper-all bg-image customer-wrapper-padding section-bg radius-10">
                    <div class="row g-5 align-items-center">
                        <div class="col-lg-4">
                            <div class="customer-wrapper">
                                <div class="section-title text-left">
                                        <?php
                                            $section_title = $settings['section_title'];
                                            $section_title_with_color = str_replace(['{c}','{/c}'],['<span class="title-color">','</span>'],$section_title);
                                            printf('<h2 class="title"> %1$s </h2>',wp_kses_post($section_title_with_color));
                                        ?>
                                    <p class="section-para mt-3"> <?php echo esc_html($settings['section_description']);?>  </p>
                                </div>
                                <div class="customer-wrapper-contents mt-4 mt-lg-5">
                                    <?php
                                        $platform_list = $settings['platform_list'];
                                        foreach($platform_list as $pl_list):
                                    ?>
                                    <div class="customer-wrapper-contents-single">
                                        <div class="customer-wrapper-contents-single-icon">
                                            <?php
                                            $img_id = $pl_list['image']['id'] ;
                                            $img_url_val = $img_id ? wp_get_attachment_image_src($img_id,'full',false) : '';
                                            $img_url = is_array($img_url_val) && !empty($img_url_val) ? $img_url_val[0] : '';
                                            $img_alt =  $img_id ? get_post_meta($img_id,'_wp_attachment_image_alt',true) : '';
                                            printf('<img src="%1$s" alt="%2$s">',$img_url,$img_alt);
                                            ?>
                                        </div>
                                        <div class="customer-wrapper-contents-single-contents">
                                            <h4 class="customer-wrapper-contents-single-contents-title">
                                                <?php printf('<a href="%1$s">%2$s</a>',$pl_list['link'] ['url'] ?? '',$pl_list['title']) ;?>
                                            </h4>
                                            <ul class="customer-wrapper-contents-single-contents-list list-style-none">
                                                <?php
                                                    if (!empty($pl_list['rating_text'])){
                                                        $rating_text = str_replace(['{r}','{/r}'],['<span>','</span>'],$pl_list['rating_text']);
                                                        printf('<li class="customer-wrapper-contents-single-contents-list-item"> %1$s</li>',wp_kses_post($rating_text));
                                                    }
                                                    if (!empty($pl_list['reviews_text'])){
                                                        $rating_text = str_replace(['{r}','{/r}'],['<span>','</span>'],$pl_list['reviews_text']);
                                                        printf('<li class="customer-wrapper-contents-single-contents-list-item %2$s">%1$s</li>',wp_kses_post($rating_text),strtolower($pl_list['title']));
                                                    }
                                                ?>
                                            </ul>
                                        </div>
                                    </div>
                                <?php endforeach;?>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-8">
                            <div class="row g-4">
                              <?php
                                    $platform_list = $settings['testimonial_items'];
                                    foreach($platform_list as $pl_list):
                                ?>
                                <div class="col-lg-6 col-md-6">
                                    <div class="single-customer customer-single-padding bg-white">
                                        <div class="single-customer-icon">
                                            <i class="fas fa-quote-left"></i>
                                        </div>
                                        <div class="single-customer-contents mt-4">
                                            <p class="single-customer-contents-para"> <?php echo esc_html($pl_list['description'])?> </p>
                                            <div class="single-customer-contents-bottom">
                                                <div class="single-customer-contents-bottom-icon">
	                                                <?php Icons_Manager::render_icon( $pl_list['icon'], [ 'aria-hidden' => 'true' ] ); ?>
                                                </div>
                                                <div class="single-customer-contents-bottom-author">
                                                    <h4 class="single-customer-contents-bottom-title"> <?php echo esc_html($pl_list['name']);?></h4>
                                                    <?php
                                                        if (!empty($pl_list['designation'])){
                                                            printf('<span class="single-customer-contents-bottom-subtitle"> %1$s </span>',esc_html($pl_list['designation']));
                                                        }
                                                    ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <?php endforeach;?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
		<?php
	}
}

Plugin::instance()->widgets_manager->register( new Xgenious_Testimonial_One_Widget() );