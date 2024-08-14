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

class Xgenious_Xilancer_Rating_Area_Widget extends Widget_Base {

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
		return 'xgenious-xilancer-rating-grid-widget';
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
		return esc_html__( 'Xilancer: Rating Grid', 'xgenious-master' );
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
		$this->add_control('title',[
			'label'       => esc_html__( 'Title', 'xgenious-master' ),
			'type'        => Controls_Manager::TEXTAREA,
			'label_block' => true,
			'default' => 'What Our {h}Customers{/h} Think About Xilancer?'
		]);
		$this->add_control(
			'margin__bottom',
			[
				'label' => esc_html__( 'Margin Bototm', 'textdomain' ),
				'type' => \Elementor\Controls_Manager::SLIDER,
				'size_units' => [ 'px' ],
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 100,
						'step' => 5,
					],
				],
				'default' => [
					'unit' => 'px',
					'size' => 50,
				],
				'selectors' => [
					'{{WRAPPER}} .new_sectionTitle' => 'margin-bottom: {{SIZE}}{{UNIT}};',
				],
			]
		);
        $repeater = new Repeater();
		$repeater->add_control('image',[
			'label'       => esc_html__( 'Image', 'xgenious-master' ),
			'type'        => Controls_Manager::MEDIA,
			'label_block' => true
		]);
        $this->add_control('offer_lists',[
	        'label'       => esc_html__( 'Feature List', 'xgenious-master' ),
	        'type'        => Controls_Manager::REPEATER,
            'fields' => $repeater->get_controls()
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
        <section class="freelancer__area xilancer">
            <div class="container container__one">
                <div class="new_sectionTitle wow animate__ animate__zoomIn animated" data-wow-delay=".1s">

		            <?php
		            $title = $settings['title'];
		            $title_markup = str_replace(['{h}','{/h}'],[' <span class="title__color">','</span>'],$title);
		            ?>
                    <h2 class="title">
			            <?php echo wp_kses_post($title_markup);?>
                    </h2>
                </div>
                <div class="row g-4">
                <?php
                $faq_list = $settings['offer_lists'];
                foreach ($faq_list as $list):
                    ?>
                    <div class="col-lg-4 col-md-6 wow animate__ animate__zoomIn animated" data-wow-delay=".1s" >
                        <div class="freelancer__item__thumb">
		                    <?php
		                    $img_id = $list['image']['id'] ;
		                    $img_url_val = $img_id ? wp_get_attachment_image_src($img_id,'full',false) : '';
		                    $img_url = is_array($img_url_val) && !empty($img_url_val) ? $img_url_val[0] : '';
		                    $img_alt =  $img_id ? get_post_meta($img_id,'_wp_attachment_image_alt',true) : '';
		                    printf('<img src="%1$s" alt="%2$s">',$img_url,$img_alt);
		                    ?>
                        </div>
                    </div>
                <? endforeach;?>
                </div>
            </div>
        </section>
		<?php
	}
}

Plugin::instance()->widgets_manager->register( new Xgenious_Xilancer_Rating_Area_Widget() );