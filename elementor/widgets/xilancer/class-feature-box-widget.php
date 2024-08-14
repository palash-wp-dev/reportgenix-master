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

class Xgenious_Xilancer_Feature_Box_Area_Widget extends Widget_Base {

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
		return 'xgenious-xilancer-feature-box-widget';
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
		return esc_html__( 'Xilancer: Feature Box', 'xgenious-master' );
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
			'settings_section',
			[
				'label' => esc_html__( 'Contenat Settings', 'xgenious-master' ),
				'tab'   => Controls_Manager::TAB_CONTENT,
			]
		);
        $repeater = new Repeater();
		$repeater->add_control('title',[
			'label'       => esc_html__( 'Title', 'xgenious-master' ),
			'type'        => Controls_Manager::TEXT,
			'description' => esc_html__( 'enter title', 'xgenious-master' ),
			'label_block' => true,
            'default' => 'Fixed Rate Jobs'
		]);

		$repeater->add_control('image',[
			'label'       => esc_html__( 'Image/Icon', 'xgenious-master' ),
			'type'        => Controls_Manager::MEDIA,
			'label_block' => true
		]);
        $this->add_control('offer_lists',[
	        'label'       => esc_html__( 'Offer List', 'xgenious-master' ),
	        'type'        => Controls_Manager::REPEATER,
            'fields' => $repeater->get_controls(),
            'title_field' => "{{{title}}}"
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
				'{{WRAPPER}} .xilancer.category__area' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
        <section class="category__area section__bg pat-120 pab-120 xilancer">
            <div class="container container__one">
                <div class="row g-4">
                    <?php
                    $faq_list = $settings['offer_lists'];
                    foreach ($faq_list as $list): ?>
                    <div class="col-xxl-2 col-lg-3 col-md-4 col-sm-6 wow animate__ animate__zoomIn animated" data-wow-delay=".1s">
                        <div class="category__item text-center bg-white">
                            <div class="category__item__icon">
	                            <?php
                                    $img_id = $list['image']['id'] ;
                                    $img_url_val = $img_id ? wp_get_attachment_image_src($img_id,'full',false) : '';
                                    $img_url = is_array($img_url_val) && !empty($img_url_val) ? $img_url_val[0] : '';
                                    $img_alt =  $img_id ? get_post_meta($img_id,'_wp_attachment_image_alt',true) : '';
                                    printf('<img src="%1$s" alt="%2$s">',$img_url,$img_alt);
	                            ?>
                            </div>
                            <div class="category__item__contents mt-3">
                                <h6 class="category__item__title"><?php echo esc_html($list['title']);?></h6>
                            </div>
                        </div>
                    </div>
		            <? endforeach;?>
                </div>
            </div>
        </section>
		<?php
	}
}

Plugin::instance()->widgets_manager->register( new Xgenious_Xilancer_Feature_Box_Area_Widget() );