<?php
/**
 * Elementor Widget
 * @package xgenous
 * @since 1.0.0
 */

namespace Elementor;

use Elementor\Core\Kits\Controls\Repeater;

class Xgenious_Product_List_Area_One_Widget extends Widget_Base {

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
		return 'xgenious-product-list-area-one-widget';
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
		return esc_html__( 'Product List One', 'xgenous-master' );
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
	
		$this->add_control( 'title', [
			'type'    => Controls_Manager::TEXTAREA,
			'label'   => esc_html__( 'Title', 'xgenious-master' ),
			'description' => esc_html__( 'add {line}Line{/line} to get line under the word', 'xgenious-master' )
		] );
			$this->add_control( 'description', [
			'type'    => Controls_Manager::TEXTAREA,
			'label'   => esc_html__( 'Description', 'xgenious-master' ),
		] );
		$this->end_controls_section();
			
		$this->start_controls_section(
			'product_settings_section',
			[
				'label' => esc_html__( 'Product Lists', 'xgenous-master' ),
				'tab'   => Controls_Manager::TAB_CONTENT,
			]
		);
		$social_links = new \Elementor\Repeater();

		$social_links->add_control(
			'list_title', [
				'label' => __( 'Title', 'xgenous-master' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'label_block' => true,
			]
		);
		$social_links->add_control(
			'list_description', [
				'label' => __( 'Descsription', 'xgenous-master' ),
				'type' => \Elementor\Controls_Manager::TEXTAREA,
				'label_block' => true,
			]
		);
		$social_links->add_control(
			'list_image', [
				'label' => __( 'Thumbnail', 'xgenous-master' ),
				'type' => \Elementor\Controls_Manager::MEDIA
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
				'label' => __( 'Product Lists', 'xgenous-master' ),
				'type' => \Elementor\Controls_Manager::REPEATER,
				'fields' => $social_links->get_controls(),
				'title_field' => '{{{ list_title }}}',
			]
		);

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
		<section class="homepage-product-listing-box-area-area-wrapper">
				<div class="container container_1430">
				    <div class="section-title ">
                        <h2 class="title"> <?php echo esc_html($settings['title']);?> </h2>
                        <p class="description"><?php echo esc_html($settings['description']);?></p>
                    </div>
					<div class="row">
						
					    <?php 
						$social_list = $settings['social_list'] ?? [];
						foreach($social_list as $list):?>
							<div class="col-xxl-4 col-lg-4 col-md-6">
							   <div class="single-home-page-product-box">
							       <?php 
							            $img_id = $list['list_image']['id'] ;
                                        $img_url_val = $img_id ? wp_get_attachment_image_src($img_id,'full',false) : '';
                                        $img_url = is_array($img_url_val) && !empty($img_url_val) ? $img_url_val[0] : '';
                                        $img_alt =  $img_id ? get_post_meta($img_id,'_wp_attachment_image_alt',true) : '';
							            printf('<div class="img-wrap"><a href="%1$s"><img src="%2$s" alt="%3$s"></a></div>',esc_url($list['list_link']['url'] ?? ''),esc_url($img_url),esc_attr($img_alt));
							       ?>
							             
							       <div class="contnet-wrap">
							           <?php 
							            printf('<a href="%1$s"><h3 class="title">%2$s</h3></a>',esc_url($list['list_link']['url'] ?? ''),esc_html($list['list_title']));
							            printf('<p class="description">%1$s</p>',esc_html($list['list_description']));
							           ?>
							       </div>
							   </div>
							</div>
						<?php endforeach;?>
						
					</div>
				</div>
			</section>
		<?php
	}
}

Plugin::instance()->widgets_manager->register( new Xgenious_Product_List_Area_One_Widget() );