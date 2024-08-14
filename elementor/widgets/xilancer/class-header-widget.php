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

class Xgenious_Xilancer_Landing_Header_Area_Widget extends Widget_Base {

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
		return 'xgenious-xilancer-header-widget';
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
		return esc_html__( 'Xilancer: Header 01', 'xgenious-master' );
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
            'default' => 'Build All in One Freelancing Platform with {h}Xilancer{/h}'
		]);
	
        $this->add_control('section_description',[
			'label'       => esc_html__( 'Description', 'xgenious-master' ),
			'type'        => Controls_Manager::TEXTAREA,
			'label_block' => true,
            'default' => 'The Best Freelancing Platform Script in The Market. Build Your Own Freelancing Platform Using All in One Laravel Freelancing Platform Script'
		]);
		$this->add_control('banner_shape_image',[
			'label'       => esc_html__( 'Banner Shape Image', 'xgenious-master' ),
			'type'        => Controls_Manager::MEDIA,
		]);
        $this->add_control('right_image',[
            'label'       => esc_html__( 'Right Image', 'xgenious-master' ),
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
		$repeater->add_control('button_ID',[
			'label'       => esc_html__( 'Button ID', 'xgenious-master' ),
			'type'        => Controls_Manager::TEXT
		]);
		$repeater->add_control('button_style',[
			'label'       => esc_html__( 'Button Style', 'xgenious-master' ),
			'type'        => Controls_Manager::SELECT,
            'options' => [
                'btn-bg-1' => __('Button Style 01'),
                'btn_bg_secondary' => __('btn bg secondary'),
                'btn_bg_white' => __('btn bg white'),
                'btn_outline_white' => __('btn outline white'),
            ],
            'default' => 'btn-bg-1',
			'description' => esc_html__( 'enter button style', 'xgenious-master' ),
		]);
        $this->add_control('button_lists',[
	        'label'       => esc_html__( 'Button List', 'xgenious-master' ),
	        'type'        => Controls_Manager::REPEATER,
            'fields' => $repeater->get_controls(),
            'title_field' => "{{{button_text}}}"
        ]);
		$this->end_controls_section();

		$this->start_controls_section(
			'link_settings_section',
			[
				'label' => esc_html__( 'Link Settings', 'xgenious-master' ),
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
		$repeater->add_control('button_ID',[
			'label'       => esc_html__( 'Button ID', 'xgenious-master' ),
			'type'        => Controls_Manager::TEXT
		]);
		$this->add_control('link_lists',[
			'label'       => esc_html__( 'Link List', 'xgenious-master' ),
			'type'        => Controls_Manager::REPEATER,
			'fields' => $repeater->get_controls(),
			'title_field' => "{{{button_text}}}"
		]);

		$this->end_controls_section();

		$this->start_controls_section(
			'style_settings_section',
			[
				'label' => esc_html__( 'Style Settings', 'xgenious-master' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);
		$this->add_control('section_padding',[
			'label' => esc_html__( 'Padding', 'xgenious-master' ),
			'type' => \Elementor\Controls_Manager::DIMENSIONS,
			'size_units' => [ 'px', '%', 'em', 'rem'],
            'allowed_dimensions' => ['top','bottom'],
			'default' => [
				'top' => 0,
				'right' => 0,
				'bottom' => 0,
				'left' => 0,
				'unit' => 'px',
				'isLinked' => false,
			],
			'selectors' => [
				'{{WRAPPER}} .xilancer.banner_area' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
			],
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
        <section class="banner_area banner_bg xilancer">
            <div class="banner__shapes">
	            <?php
	            $img_id = $settings['banner_shape_image']['id'] ;
	            $img_url_val = $img_id ? wp_get_attachment_image_src($img_id,'full',false) : '';
	            $img_url = is_array($img_url_val) && !empty($img_url_val) ? $img_url_val[0] : '';
	            $img_alt =  $img_id ? get_post_meta($img_id,'_wp_attachment_image_alt',true) : '';
	            printf('<img src="%1$s" alt="%2$s">',$img_url,$img_alt);
	            ?>
            </div>
            <div class="container container_1430">
                <div class="row g-4">
                    <div class="col-lg-6">
                        <div class="banner">
                            <div class="banner__contents">
                                <div class="xilancer_header_rating">
                                    <span class="rating__wrap">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="45" height="42" viewBox="0 0 45 42" fill="none"><path d="M44.183 16.0498H27.3031L22.1069 0L16.8799 16.0498L0 16.019L13.6515 25.9502L8.4246 42L22.0761 32.0688L35.7277 42L30.5315 25.9502L44.183 16.0498Z" fill="#f9bf00"></path></svg>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="45" height="42" viewBox="0 0 45 42" fill="none"><path d="M44.183 16.0498H27.3031L22.1069 0L16.8799 16.0498L0 16.019L13.6515 25.9502L8.4246 42L22.0761 32.0688L35.7277 42L30.5315 25.9502L44.183 16.0498Z" fill="#f9bf00"></path></svg>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="45" height="42" viewBox="0 0 45 42" fill="none"><path d="M44.183 16.0498H27.3031L22.1069 0L16.8799 16.0498L0 16.019L13.6515 25.9502L8.4246 42L22.0761 32.0688L35.7277 42L30.5315 25.9502L44.183 16.0498Z" fill="#f9bf00"></path></svg>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="45" height="42" viewBox="0 0 45 42" fill="none"><path d="M44.183 16.0498H27.3031L22.1069 0L16.8799 16.0498L0 16.019L13.6515 25.9502L8.4246 42L22.0761 32.0688L35.7277 42L30.5315 25.9502L44.183 16.0498Z" fill="#f9bf00"></path></svg>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="45" height="42" viewBox="0 0 45 42" fill="none"><path d="M44.183 16.0498H27.3031L22.1069 0L16.8799 16.0498L0 16.019L13.6515 25.9502L8.4246 42L22.0761 32.0688L35.7277 42L30.5315 25.9502L44.183 16.0498Z" fill="#f9bf00"></path></svg>
                                    </span> <?php echo esc_html__('(5) star rating at Envato','xgenious')?>
                                </div>
                                <h1 class="banner__contents__title">
                                    <?php
                                    $title = $settings['section_title'];
                                    $title_markup = str_replace(['{h}','{/h}'],['<span class="banner__contents__title__circle banner__contents__title__color">
                                        <svg width="197" height="12" viewBox="0 0 197 12" fill="none"
                                             xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                    d="M2 10C2.16744 8.72267 7.39426 7.77508 10.3811 7.12827C12.8808 6.58696 15.7385 6.30713 18.6218 6.01387C22.7444 5.59455 26.7328 5.0841 30.8657 4.66373C40.5947 3.67416 49.9751 3.10272 60.1528 2.73495C73.8774 2.23902 88.1355 1.85046 101.965 2.05631C114.352 2.2407 126.428 2.54549 138.486 3.47074C144.163 3.90636 149.652 4.53639 155.389 4.89946C160.326 5.21194 165.255 5.59872 170.114 6.01387C176.124 6.52734 181.461 7.24456 187.181 7.94264C188.21 8.06822 194.205 9.07088 195 8.58557"
                                                    stroke="#A760FE" stroke-width="4" stroke-linecap="round"></path>
                                        </svg>','</span>'],$title);
                                    echo $title_markup;
                                    ?>
                                </h1>
                                <p class="banner__contents__para mt-4">
	                                <?php echo wp_kses_post($settings['section_description'])?>
                                </p>
                                <div class="btn_wrapper d-flex flex-wrap gap-3 mt-5">
	                                <?php
	                                $faq_list = $settings['button_lists'];
	                                foreach ($faq_list as $list):
                                        $button_id_markup = !empty($list['button_ID']) ? 'id="'.$list['button_ID'].'"' : '';
		                                printf('<a href="%1$s" target="%4$s"  class="cmn_btn %2$s %5$s" %6$s> %3$s </a>',
			                                $list['button_link']['url'],
			                                $list['button_style'],
			                                $list['button_text'],
			                                $list['button_link']['is_external'] ? '_blank' : '_self',
			                                $list['button_radius'] == 'yes' ? 'radius-30' : '',
                                            $button_id_markup
		                                );
	                                endforeach;?>
                                </div>
                                <div class="link_wrapper">
	                                <?php
	                                $faq_list = $settings['link_lists'];
	                                foreach ($faq_list as $list):
		                                $button_id_markup = !empty($list['button_ID']) ? 'id="'.$list['button_ID'].'"' : '';
		                                printf('<a href="%1$s" target="%3$s"  class="link_btn" %4$s> %2$s </a>',
			                                $list['button_link']['url'],
			                                $list['button_text'],
			                                $list['button_link']['is_external'] ? '_blank' : '_self',
			                                $button_id_markup
		                                );
	                                endforeach;?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="banner__right">
                            <div class="banner__right__themes">
	                            <?php
	                            $img_id = $settings['right_image']['id'] ;
	                            $img_url_val = $img_id ? wp_get_attachment_image_src($img_id,'full',false) : '';
	                            $img_url = is_array($img_url_val) && !empty($img_url_val) ? $img_url_val[0] : '';
	                            $img_alt =  $img_id ? get_post_meta($img_id,'_wp_attachment_image_alt',true) : '';
	                            printf('<img src="%1$s" alt="%2$s">',$img_url,$img_alt);
	                            ?>
                                <div class="banner__right__themes__item"></div>
                                <div class="banner__right__themes__item"></div>
                                <div class="banner__right__themes__item"></div>
                                <div class="banner__right__themes__item"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
		<?php
	}
}

Plugin::instance()->widgets_manager->register( new Xgenious_Xilancer_Landing_Header_Area_Widget() );