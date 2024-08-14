<?php
/**
 * Elementor Widget
 * @package xgenous
 * @since 1.0.0
 */

namespace Elementor;

use Elementor\Core\Kits\Controls\Repeater;

class Xgenious_Black_Friday_Header_Area_One_Widget extends Widget_Base {

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
		return 'xgenious-black-friday-header-area-one-widget';
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
		return esc_html__( 'Black Friday: Header 01', 'xgenous-master' );
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
				'label' => esc_html__( 'Section Contents', 'xgenious-master' ),
				'tab'   => Controls_Manager::TAB_CONTENT,
			]
		);
		$this->add_control( 'sales_text', [
			'type'    => Controls_Manager::TEXTAREA,
			'label'   => esc_html__( 'Sales Text', 'xgenious-master' ),
			'default' => esc_html__('BLACK FRIDAY SALES, OFFER ENDS IN 27 NOV','xgenious-master'),
		] );
		$this->add_control( 'percentage_text', [
			'type'    => Controls_Manager::TEXTAREA,
			'label'   => esc_html__( 'Percentage Text', 'xgenious-master' ),
			'default' => esc_html__('50%','xgenious-master'),
		] );
		
		$this->add_control( 'btn_one_status',
			[
				'label'       => esc_html__( 'Button Show/Hide', 'xgenous-master' ),
				'type'        => Controls_Manager::SWITCHER,
				'default'     => 'yes',
				'description' => esc_html__( 'show/hide button', 'xgenous-master' ),
		] );
		$this->add_control( 'btn_one_text',[
			'label'       => esc_html__( 'Button Label', 'xgenous-master' ),
			'type'        => Controls_Manager::TEXT,
			'default'     => esc_html__( 'Get Discount Now', 'xgenous-master' ),
			'description' => esc_html__( 'enter button text', 'xgenous-master' ),
			'condition'   => [
				'btn_one_status' => 'yes'
			]
		]);
		$this->add_control( 'btn_one_url',[
			'label'       => esc_html__( 'Button URL', 'xgenous-master' ),
			'type'        => Controls_Manager::URL,
			'default'     => [
				'url' => '#'
			],
			'description' => esc_html__( 'enter button url', 'xgenous-master' ),
			'condition'   => [
				'btn_one_status' => 'yes'
			]
		]);
		
		$this->end_controls_section();
		
		$this->start_controls_section(
			'images_styles',
			[
				'label' => esc_html__( 'Images Settings', 'xgenous-master' ),
				'tab'   => Controls_Manager::TAB_CONTENT,
			]
		);
		$this->add_control('image_one',[
			'type' => Controls_Manager::MEDIA,
			'label' => esc_html__('Image 01','xgenious-master')
		]);
		$this->add_control('image_two',[
			'type' => Controls_Manager::MEDIA,
			'label' => esc_html__('Image 02 (percentage swing)','xgenious-master')
		]);
		$this->add_control('image_three',[
			'type' => Controls_Manager::MEDIA,
			'label' => esc_html__('Image 03 (Friday)','xgenious-master')
		]);	
		$this->add_control('image_four',[
			'type' => Controls_Manager::MEDIA,
			'label' => esc_html__('Image 04 (Sale)','xgenious-master')
		]);
		$this->end_controls_section();
		
		$this->start_controls_section(
			'review_section_settings',
			[
				'label' => esc_html__( 'Review Settings', 'xgenous-master' ),
				'tab'   => Controls_Manager::TAB_CONTENT,
			]
		);
		$this->add_control('image_five',[
			'type' => Controls_Manager::MEDIA,
			'label' => esc_html__('Image 05 (Review)','xgenious-master')
		]);
		$this->add_control('image_six',[
			'type' => Controls_Manager::MEDIA,
			'label' => esc_html__('Image 06 (Review Rotate)','xgenious-master')
		]);
		
		$this->add_control('review_icon',[
			'type' => Controls_Manager::ICONS,
			'label' => esc_html__('Review Icon','xgenious-master')
		]);
		
		$this->end_controls_section();
		
		
		$this->start_controls_section(
			'banner_shape_settings',
			[
				'label' => esc_html__( 'Banner Shape Settings', 'xgenous-master' ),
				'tab'   => Controls_Manager::TAB_CONTENT,
			]
		);
		$this->add_control('image_seven',[
			'type' => Controls_Manager::MEDIA,
			'label' => esc_html__('Image 07 (Wave)','xgenious-master')
		]);
		$this->add_control('image_eight',[
			'type' => Controls_Manager::MEDIA,
			'label' => esc_html__('Image 08 (net shape)','xgenious-master')
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
		<div class="banner_area banner_area__padding banner-bg">
        <div class="container">
            <div class="banner center-text">
                <div class="banner__single">
                    <div class="banner__single__content">
                        <div class="banner__single__title__shapes black">
                            <?php 
							$right_image = $settings['image_one']['id'] ?? '';
							$right_image_url = '';
							$right_image_alt= '';
							if(!empty($right_image)){
								$image_src = wp_get_attachment_image_src($right_image,'full',true);
								$right_image_url =  is_array($image_src) ? current($image_src) : '';
								$right_image_alt= get_post_meta($right_image,'_wp_attachment_image_alt',true);
								printf('<img src="%1$s" alt="%2$s">',$right_image_url,$right_image_alt);
							}
							?>
                            <div class="banner__single__title__shapes__offer">
                                <?php 
        							$right_image = $settings['image_two']['id'] ?? '';
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
                        <div class="banner__single__title__shapes friday">
                            <?php 
        							$right_image = $settings['image_three']['id'] ?? '';
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
                        <div class="banner__single__title__shapes sale">
                            <?php 
        							$right_image = $settings['image_four']['id'] ?? '';
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
                        <?php if(!empty($settings['btn_one_status'])):?>
                            <div class="btn-wrapper mt-4 mt-lg-5">
                                <?php 
									$btn_url = $settings['btn_one_url']['url'] ?? '';
									printf('<a class="cmn-btn btn-bg-black-friday radius-parcent-50" href="%1$s"> %2$s </a>',$btn_url,$settings['btn_one_text']);
								?>
                            </div>
						<?php endif;?>
                    </div>
                </div>
            </div>
            <div class="banner_shapes">
                <div class="banner_shapes__left">
                    <div class="banner_shapes__left__thumb">
                        <?php 
							$right_image = $settings['image_five']['id'] ?? '';
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
                    <div class="banner_shapes__left__icon">
                        <?php \Elementor\Icons_Manager::render_icon( $settings['review_icon'], [ 'aria-hidden' => 'true' ] ); ?>
                    </div>
                </div>
                <div class="banner_shapes__right">
                     <?php 
							$right_image = $settings['image_six']['id'] ?? '';
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
        <div class="banner_area__shape">
            <div class="banner_area__shape__wave">
                <?php 
					$right_image = $settings['image_seven']['id'] ?? '';
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
            <div class="banner_area__shape__net">
                <?php 
					$right_image = $settings['image_eight']['id'] ?? '';
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
            <div class="banner_area__shape__percent top_position">
                <ul class="banner_area__shape__percent__list">
                    <?php
                    //sales_text
                        for($i = 0; $i < 4; $i++){
                            printf('<li class="banner_area__shape__percent__list__item">%1$s</li>',esc_html($settings['percentage_text']));
                        }
                    ?>
                </ul>
            </div>
        </div>
        <div class="banner_expire bottom_position bg-black-friday">
            <ul class="banner_expire__list">
                <?php
                    //sales_text
                    for($i = 0; $i < 4; $i++){
                        printf(' <li class="banner_expire__list__item"><span class="pmg_icon">✦</span> %1$s</li>',esc_html($settings['sales_text']));
                    }
                ?>
            </ul>
        </div>
    </div>
		<?php
	}
}

Plugin::instance()->widgets_manager->register( new Xgenious_Black_Friday_Header_Area_One_Widget() );