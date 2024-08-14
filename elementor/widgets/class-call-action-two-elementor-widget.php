<?php
/**
 * Elementor Widget
 * @package xgenous
 * @since 1.0.0
 */

namespace Elementor;


class Xgenious_Refund_Area_Two_Widget extends Widget_Base {

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
		return 'xgenious-refund-one-widget';
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
		return esc_html__( 'Refund', 'xgenous-master' );
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
		$this->add_control( 'author_name', [
			'type'    => Controls_Manager::TEXT,
			'label'   => esc_html__( 'Author Name', 'xgenious-master' ),
			'default'=> __('Sharifur Rahman','xgenious-master')
		] );	
		$this->add_control( 'author_designation', [
			'type'    => Controls_Manager::TEXT,
			'label'   => esc_html__( 'Author Name', 'xgenious-master' ),
			'default'=> __('CEO & Founder','xgenious-master')
		] );
		
		$this->add_control( 'image', [
			'type'    => Controls_Manager::MEDIA,
			'label'   => esc_html__( 'Image', 'xgenious-master' ),
		] );
		$this->add_control( 'signature_image', [
			'type'    => Controls_Manager::MEDIA,
			'label'   => esc_html__( 'Signature Image', 'xgenious-master' ),
		] );
		$this->add_control( 'title', [
			'type'    => Controls_Manager::TEXTAREA,
			'label'   => esc_html__( 'Title', 'xgenious-master' ),
			'description'=> __('user {c}for color{/c} text','xgenious-master')
		] );
		$this->add_control( 'description', [
			'type'    => Controls_Manager::WYSIWYG,
			'label'   => esc_html__( 'Description', 'xgenious-master' ),
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
		<div class="newsletter_area affiliate-calltoaction refund">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-10">
                        <div class="newsletter_wrapper newsletter_wrapper_padding newsletter-bg radius-20 wow zoomIn" data-wow-delay=".2s">
                            <div class="newsletter_contents newsletter_contents__width center-text">
                                <div class="left_warp">
                                    <?php
    	                                $image_id = $settings['image']['id'];
    	                                $image_src = !empty($image_id) ? wp_get_attachment_image_src($image_id,'full')[0] : '';
    	                                $image_alt = !empty($image_id) ? get_post_meta($image_id,'_wp_attachment_image_alt',true) : '';
    	                                printf('<img src="%1$s" alt="%2$s"/>',$image_src,$image_alt);
	                                ?>
                                </div>
                                <div class="right_wrap">
                                    <h3 class="newsletter_contents__title"> <?php echo wp_kses_post(str_replace(['{c}','{/c}'],['<span class="color-text">','</span>'],$settings['title']));?></h3>
                                    <div class="newsletter_contents__para mt-3">
                                        <p><?php echo wp_kses_post($settings['description']);?></p>
                                        <div class="signature_wrap">
                                                <?php
                	                                $image_id = $settings['signature_image']['id'];
                	                                $image_src = !empty($image_id) ? wp_get_attachment_image_src($image_id,'full')[0] : '';
                	                                $image_alt = !empty($image_id) ? get_post_meta($image_id,'_wp_attachment_image_alt',true) : '';
                	                                printf('<img src="%1$s" alt="%2$s"/>',$image_src,$image_alt);
            	                                ?>
                                            <div class="author_info">
                                                <h5><?php echo esc_html($settings['author_name']);?></h5>
                                                <span><?php echo esc_html($settings['author_designation']);?></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
		<?php
	}
}

Plugin::instance()->widgets_manager->register( new Xgenious_Refund_Area_Two_Widget() );