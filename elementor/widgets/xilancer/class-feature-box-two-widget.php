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

class Xgenious_Xilancer_Feature_Box_Two_Area_Widget extends Widget_Base {

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
		return 'xgenious-xilancer-feature-box-two-widget';
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
		return esc_html__( 'Xilancer: Feature Box: 02', 'xgenious-master' );
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
            'default' => 'Qualification Matching'
		]);
        $repeater->add_control('description',[
			'label'       => esc_html__( 'Description', 'xgenious-master' ),
			'type'        => Controls_Manager::TEXT,
			'description' => esc_html__( 'enter description', 'xgenious-master' ),
			'label_block' => true,
            'default' => 'Match freelancers qualifications with clients job requirements for easier candidate selection.'
		]);
		$repeater->add_control('variant',[
			'label'       => esc_html__( 'Variants', 'xgenious-master' ),
			'type'        => Controls_Manager::SELECT,
			'options' => [
				'bgOpacity__blue' => 'Blue',
				'bgOpacity__yellow' => 'yellow',
				'bgOpacity__red' => 'red',
				'bgOpacity__violet' => 'violet',
				'bgOpacity__green' => 'green',
			],
			'default' => 'bgOpacity__blue',
			'label_block' => true
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
        <section class="quality__area pat-120 pab-60 xilancer">
            <div class="container">
                <div class="row g-4">
                <?php
                $faq_list = $settings['offer_lists'];
                foreach ($faq_list as $list):
                    ?>
                    <div class="col-lg-4 col-sm-6 wow animate__ animate__fadeInUp animated" data-wow-delay=".1s" >
                        <div class="quality__single text-center <?php echo esc_attr($list['variant']);?> radius-10">
                            <div class="quality__single__top">
                                <h4 class="quality__single__title"><?php echo esc_html($list['title']);?></h4>
                                <p class="quality__single__para mt-2"><?php echo esc_html($list['description']);?></p>
                            </div>
                            <div class="quality__single__inner">
                                <div class="quality__single__thumb">
	                                <?php
	                                $img_id = $list['image']['id'] ;
	                                $img_url_val = $img_id ? wp_get_attachment_image_src($img_id,'full',false) : '';
	                                $img_url = is_array($img_url_val) && !empty($img_url_val) ? $img_url_val[0] : '';
	                                $img_alt =  $img_id ? get_post_meta($img_id,'_wp_attachment_image_alt',true) : '';
	                                printf('<img src="%1$s" alt="%2$s">',$img_url,$img_alt);
	                                ?>
                                </div>
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

Plugin::instance()->widgets_manager->register( new Xgenious_Xilancer_Feature_Box_Two_Area_Widget() );