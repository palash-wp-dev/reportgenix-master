<?php
/**
 * Elementor Widget
 * @package Attorg
 * @since 1.0.0
 */

namespace Elementor;
class Xgenious_We_Are_Available_One_Widget extends Widget_Base {

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
		return 'xgenious-we-are-available-one-widget';
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
		return esc_html__( 'We Area Available One', 'xgenious-master' );
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
			'type'        => Controls_Manager::TEXT,
			'label_block' => true,
            'description' => __('add {c}color text{/c} for color text')
		]);
		$this->add_control('section_description',[
			'label'       => esc_html__( 'Section Description', 'xgenious-master' ),
			'type'        => Controls_Manager::TEXTAREA,
		]);

		$this->end_controls_section();
		$this->start_controls_section(
			'left_settings_section',
			[
				'label' => esc_html__( 'Image & Content Settings', 'xgenious-master' ),
				'tab'   => Controls_Manager::TAB_CONTENT,
			]
		);
		$this->add_control('left_image',[
			'label'       => esc_html__( 'Image', 'xgenious-master' ),
			'type'        => Controls_Manager::MEDIA,
		]);
		$this->add_control('first_text',[
			'label'       => esc_html__( '1st Text', 'xgenious-master' ),
			'type'        => Controls_Manager::TEXT,
			'label_block' => true
		]);
        $this->add_control('first_text_number',[
			'label'       => esc_html__( '1st Text Number', 'xgenious-master' ),
			'type'        => Controls_Manager::TEXT,
			'label_block' => true
		]);
        $this->add_control('second_text',[
			'label'       => esc_html__( '2nd Text', 'xgenious-master' ),
			'type'        => Controls_Manager::TEXT,
			'label_block' => true
		]);
        $this->add_control('second_text_number',[
			'label'       => esc_html__( '2nd Text Number', 'xgenious-master' ),
			'type'        => Controls_Manager::TEXT,
			'label_block' => true
		]);
		$this->end_controls_section();


		$this->start_controls_section(
			'settings_section',
			[
				'label' => esc_html__( 'Item Settings', 'xgenious-master' ),
				'tab'   => Controls_Manager::TAB_CONTENT,
			]
		);
        $repeater = new Repeater();
		$repeater->add_control('image',[
			'label'       => esc_html__( 'Image', 'xgenious-master' ),
			'type'        => Controls_Manager::MEDIA,
        ]);
		$repeater->add_control('url',[
			'label'       => esc_html__( 'URL', 'xgenious-master' ),
			'type'        => Controls_Manager::URL,
			'description' => esc_html__( 'enter url', 'xgenious-master' ),
		]);
        $this->add_control('available_lists',[
	        'label'       => esc_html__( 'Available List', 'xgenious-master' ),
	        'type'        => Controls_Manager::REPEATER,
            'fields' => $repeater->get_controls(),
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
		$settings              = $this->get_settings_for_display();
		?>
        <section class="work-area padding-top-60 padding-bottom-60 active">
            <div class="container container_1430">
                <div class="row g-5 align-items-center">
                    <div class="col-lg-6">
                        <div class="work-image-wrapper">
                            <div class="work-image-inner">
                                <div class="work-img-shapes">
                                    <img src="<?php echo XGENIOUS_IMG .'/work/work_shape.png'?>" alt="<?php esc_attr_e('xgenious website shape','xgenious-master');?>">
                                </div>
                                <div class="single-work-image">
                                    <?php
                                    $left_image_url = wp_get_attachment_image_src( $settings['left_image']['id'], 'full', false );
                                    $left_image_alt = get_post_meta(  $settings['left_image'], '_wp_attachment_image_alt', true );
                                    printf('<img class="radius-20" src="%1$s" alt="%2$s">',current($left_image_url),$left_image_alt);
                                    ?>

                                </div>
                                <div class="single-work-customer radius-10">
                                    <div class="single-work-customer-item">
                                        <h2 class="single-work-customer-item-title"><?php echo esc_html($settings['first_text_number']);?> </h2>
                                        <span class="single-work-customer-item-subtitle"> <?php echo esc_html($settings['first_text']);?> </span>
                                    </div>
                                    <div class="single-work-customer-item">
                                        <h2 class="single-work-customer-item-title"> <?php echo esc_html($settings['second_text_number']);?></h2>
                                        <span class="single-work-customer-item-subtitle"> <?php echo esc_html($settings['second_text']);?></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="single-work-wrapper-contents">
                            <div class="section-title text-left">
                                <h2 class="title">
	                                <?php
                                    echo wp_kses_post(str_replace(['{c}','{/c}'],['<span class="d-block">','</span>'],$settings['section_title']));?>
                                </h2>
                                <p class="section-para mt-3"> <?php  echo esc_html($settings['section_description']);?> </p>
                            </div>
                            <div class="single-work mt-4">
                                <ul class="single-work-list list-style-none">
                                    <?php
                                    $whyUsList = $settings['available_lists'];
                                    foreach ($whyUsList as $list):
                                        if(empty($list['image']['id'])){
                                            continue;
                                        }
	                                    $image_id = $list['image']['id'];
	                                    $image_url = wp_get_attachment_image_src( $image_id, 'full', false );
	                                    $image_alt = get_post_meta( $image_id, '_wp_attachment_image_alt', true );
                                        $img_url = $list['url']['url'] ?? '';
                                        ?>
                                        <li class="single-work-list-item">
                                            <?php printf('<a href="%1$s"> <img src="%2$s" alt="%3$s"> </a>',$img_url,current($image_url),$image_alt);?>
                                        </li>
		                            <?php endforeach;?>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
		<?php
	}
}

Plugin::instance()->widgets_manager->register( new Xgenious_We_Are_Available_One_Widget() );