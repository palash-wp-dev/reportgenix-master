<?php
/**
 * Elementor Widget
 * @package Attorg
 * @since 1.0.0
 */

namespace Elementor;
class Xgenious_Landing_Header_Area_Two_Widget extends Widget_Base {

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
		return 'xgenious-landing-header-area-two-widget';
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
		return esc_html__( 'Landing: Header:02', 'xgenious-master' );
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
			'description' => esc_html__( 'user {c}for color text{/c}', 'xgenious-master' ),
		]);
	
        $this->add_control('description',[
			'label'       => esc_html__( 'Description', 'xgenious-master' ),
			'type'        => Controls_Manager::WYSIWYG,
			'label_block' => true
		]);
		$this->add_control('right_image',[
			'label'       => esc_html__( 'Right Image', 'xgenious-master' ),
			'type'        => Controls_Manager::MEDIA,
		]);
		$this->add_control('mobile_image',[
			'label'       => esc_html__( 'Mobile Image', 'xgenious-master' ),
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
		$repeater->add_control('button_style',[
			'label'       => esc_html__( 'Button Style', 'xgenious-master' ),
			'type'        => Controls_Manager::SELECT,
            'options' => [
                'btn-bg-1' => __('Button Style 01'),
                'btn-outline-dark' => __('Button Style 02')
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
			'reviewSettings_section',
			[
				'label' => esc_html__( 'Review Settings', 'xgenious-master' ),
				'tab'   => Controls_Manager::TAB_CONTENT,
			]
		);
        $repeater = new Repeater();
		$repeater->add_control('text',[
			'label'       => esc_html__( 'Text', 'xgenious-master' ),
			'type'        => Controls_Manager::TEXT,
			'description' => esc_html__( 'enter text', 'xgenious-master' ),
			'label_block' => true
		]);
        $repeater->add_control('link',[
			'label'       => esc_html__( 'Link', 'xgenious-master' ),
			'type'        => Controls_Manager::URL,
			'description' => esc_html__( 'enter link', 'xgenious-master' ),
			'label_block' => true
		]);
		$repeater->add_control('icon',[
			'label'       => esc_html__( 'Icon', 'xgenious-master' ),
			'type'        => Controls_Manager::ICONS,
		]);
        $this->add_control('review_lists',[
	        'label'       => esc_html__( 'Review List', 'xgenious-master' ),
	        'type'        => Controls_Manager::REPEATER,
            'fields' => $repeater->get_controls(),
            'title_field' => "{{{text}}}"
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
		
		<div class="shopmart_banner_area">
        <div class="container container_1430">
            <div class="row gy-4 align-items-center flex-column-reverse flex-lg-row">
                <div class="col-lg-6">
                    <div class="shopmart_banner">
                        <div class="shopmart_banner__single">
                            <div class="shopmart_banner__single__content">
                                <h2 class="shopmart_banner__single__content__title fw-600"> 
                                    <?php
                                        $sectionTitle = str_replace(['{c}','{/c}'],['<span class="shopmart_banner__single__content__title__span">','</span>'],$settings['title']);
                                        
                                        echo wp_kses_post($sectionTitle);
                                    ?>
                                </h2>
                                <div class="shopmart_banner__single__content__para mt-3"> 
                                <?php echo wp_kses_post($settings['description']);?>
                                </div>
                                <div class="btn-wrapper d-flex flex-wrap gap-3 mt-4 mt-lg-5">
                                    <?php
        	                            $button_lists = $settings['button_lists'];
        	                            foreach ($button_lists as $list):
                                            printf('<a href="%1$s" target="%4$s"  class="cmn-btn radius-5 %2$s"> %3$s </a>',$list['button_link']['url'],$list['button_style'],$list['button_text'],$list['button_link']['is_external'] ? '_blank' : '_self');
        		                        endforeach;
    		                        ?>
                                </div>
                            </div>
                        </div>
                        <div class="shopmart_banner__footer mt-4">
                            <div class="shopmart_banner__footer__flex">
                                <div class="shopmart_banner__footer__left flex-fill">
                                    <div class="shopmart_banner__footer__left__flex">
                                        <?php
                                        
                                            $review_lists = $settings['review_lists'];
            	                            foreach ($review_lists as $list): ?>
                	                            <div class="shopmart_banner__footer__item">
                                                    <div class="shopmart_banner__footer__star">
                                                        <span><i class="fa fa-star"></i></span>
                                                        <span><i class="fa fa-star"></i></span>
                                                        <span><i class="fa fa-star"></i></span>
                                                        <span><i class="fa fa-star"></i></span>
                                                        <span><i class="fa fa-star"></i></span>
                                                    </div>
                                                    <div class="shopmart_banner__footer__market">
                                                        <div class="shopmart_banner__footer__market__icon">
                                                            <?php \Elementor\Icons_Manager::render_icon( $list['icon'], [ 'aria-hidden' => 'true' ] ); ?>
                                                        </div>
                                                        <a href="<?php echo esc_url($list['link']['url']);?>"><span class="shopmart_banner__footer__market__review"><?php echo esc_html($list['text']);?></span></a>
                                                    </div>
                                                </div>
            		                        <?php endforeach;?>
                                        
                                        
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="shopmart_banner__right wow zoomIn" data-wow-delay=".2s" style="visibility: visible; animation-delay: 0.2s; animation-name: zoomIn;">
                        <div class="shopmart_banner__right__thumb">
                            <?php
                                $img_id = $settings['right_image']['id'] ;
                                $img_url_val = $img_id ? wp_get_attachment_image_src($img_id,'full',false) : '';
                                $img_url = is_array($img_url_val) && !empty($img_url_val) ? $img_url_val[0] : '';
                                $img_alt =  $img_id ? get_post_meta($img_id,'_wp_attachment_image_alt',true) : '';
                                printf('<img src="%1$s" alt="%2$s">',$img_url,$img_alt);
                            ?>
                        </div>
                        <div class="shopmart_banner__right__available">
                            <?php
                                $img_id = $settings['mobile_image']['id'] ;
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
		<?php
	}
}

Plugin::instance()->widgets_manager->register( new Xgenious_Landing_Header_Area_Two_Widget() );