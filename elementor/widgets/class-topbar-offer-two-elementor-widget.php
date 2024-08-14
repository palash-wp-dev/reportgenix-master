<?php
/**
 * Elementor Widget
 * @package xgenous
 * @since 1.0.0
 */

namespace Elementor;

use Elementor\Core\Kits\Controls\Repeater;

class Xgenious_Topbar_Offer_Two_Widget extends Widget_Base {

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
		return 'xgenious-topbar-offer-two-widget';
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
		return esc_html__( 'Topbar Offer: 02', 'xgenous-master' );
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
		$this->add_control( 'button_text', [
			'type'    => Controls_Manager::TEXT,
			'label'   => esc_html__( 'Button Text', 'xgenious-master' ),
		] );
		$this->add_control( 'title', [
			'type'    => Controls_Manager::TEXTAREA,
			'label'   => esc_html__( 'Title', 'xgenious-master' )
		] );
		$this->add_control( 'link', [
			'type'    => Controls_Manager::URL,
			'label'   => esc_html__( 'Link', 'xgenious-master' ),
		] );
		$this->add_control( 'image', [
			'type'    => Controls_Manager::MEDIA,
			'label'   => esc_html__( 'Image', 'xgenious-master' ),
		] );	
		
		$this->add_control( 'image_two', [
			'type'    => Controls_Manager::MEDIA,
			'label'   => esc_html__( 'Image Two', 'xgenious-master' ),
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
		$target =  $settings['link']['is_external'] ? '_blank' : '_self';
		?>
		<div class="notification_bar_top topbar_area style__two">
            <div class="container container_1430">
                <div class="topbar_contents">
                    <div class="topbar_contents__flex">
                        <div class="topbar_contents__item">
                            <div class="topbar_contents__item__thumb">
                                <?php 
									$image_id = $settings['image']['id'];
									$image_src = !empty($image_id) ? wp_get_attachment_image_src($image_id,'full')[0] : '';
									$image_alt = !empty($image_id) ? get_post_meta($image_id,'_wp_attachment_image_alt',true) : '';
									printf('<img src="%1$s" alt="%2$s"/>',$image_src,$image_alt);
								?>
                            </div>
                        </div>
                        <div class="topbar_contents__item">
                            <?php 
								$image_id = $settings['image_two']['id'];
								$image_src = !empty($image_id) ? wp_get_attachment_image_src($image_id,'full')[0] : '';
								$image_alt = !empty($image_id) ? get_post_meta($image_id,'_wp_attachment_image_alt',true) : '';
								printf('<img src="%1$s" alt="%2$s"/>',$image_src,$image_alt);
							?>
                            <a href="<?php echo esc_html($settings['link']['url'] ?? '');?>" target="<?php echo esc_attr($target)?>" class="topbar_contents__item__para"><?php echo esc_html($settings['title']);?></a>
                        </div>
                        <div class="topbar_contents__item">
                            <div class="topbar_contents__item__btn">
                                <a href="<?php echo esc_html($settings['link']['url'] ?? '');?>" target="<?php echo esc_attr($target)?>" ><?php echo esc_html($settings['button_text']);?></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
		<?php
	}
}

Plugin::instance()->widgets_manager->register( new Xgenious_Topbar_Offer_Two_Widget() );