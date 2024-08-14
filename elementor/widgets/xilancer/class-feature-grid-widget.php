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

class Xgenious_Xilancer_Feature_Grid_Area_Widget extends Widget_Base {

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
		return 'xgenious-xilancer-feature-grid-widget';
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
		return esc_html__( 'Xilancer: Feature Grid', 'xgenious-master' );
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
		$repeater->add_control('is_inline',[
			'label'       => esc_html__( 'Inline Feature', 'xgenious-master' ),
			'type'        => Controls_Manager::SWITCHER,
			'label_on' => __( 'Show', 'your-plugin' ),
			'label_off' => __( 'Hide', 'your-plugin' ),
			'return_value' => 'yes',
			'default' => 'yes',
		]);
        $repeater->add_control('title',[
			'label'       => esc_html__( 'Title', 'xgenious-master' ),
			'type'        => Controls_Manager::TEXT,
			'description' => esc_html__( 'enter title', 'xgenious-master' ),
			'label_block' => true,
            'default' => 'Advanced Account Creation for {h}Freelancers{/h}'
		]);
		$repeater->add_control('extra_title',[
			'label'       => esc_html__( 'Extra Title', 'xgenious-master' ),
			'type'        => Controls_Manager::TEXT,
			'description' => esc_html__( 'enter title', 'xgenious-master' ),
			'label_block' => true,
			'default' => 'Hourly Rate Jobs',
            'condition' => [
                    'is_inline' => 'yes'
            ]
		]);
		$repeater->add_control('coming_soon',[
			'label'       => esc_html__( 'Coming Soon', 'xgenious-master' ),
			'type'        => Controls_Manager::TEXT,
			'label_block' => true,
			'default' => 'COMING SOON',
			'condition' => [
				'is_inline' => 'yes'
			]
		]);

		$repeater->add_control('badge',[
			'label'       => esc_html__( 'Badge Text', 'xgenious-master' ),
			'type'        => Controls_Manager::TEXT,
			'description' => esc_html__( 'enter title', 'xgenious-master' ),
			'label_block' => true,
			'default' => 'Features for Freelancers'
		]);
		$repeater->add_control('description',[
			'label'       => esc_html__( 'Description', 'xgenious-master' ),
			'type'        => Controls_Manager::TEXT,
			'description' => esc_html__( 'enter description', 'xgenious-master' ),
			'label_block' => true,
			'default' => 'Allow freelancers to showcase their multi information\'s to the clients for a better professional experiences'
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

		$repeater->add_control('title_variant',[
			'label'       => esc_html__( 'Title Variant', 'xgenious-master' ),
			'type'        => Controls_Manager::SELECT,
			'options' => [
				'' => 'Normal',
				'color__two' => 'Color Two',
				'color__three' => 'Color Three',
			],
			'default' => 'bgOpacity__blue',
			'label_block' => true
		]);
		$repeater->add_control('image',[
			'label'       => esc_html__( 'Image', 'xgenious-master' ),
			'type'        => Controls_Manager::MEDIA,
			'label_block' => true
		]);
        $this->add_control('offer_lists',[
	        'label'       => esc_html__( 'Feature List', 'xgenious-master' ),
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
        <section class="freelancer__area pat-120 pab-60 xilancer">
            <div class="container container__one">
                <div class="row g-4">
                <?php
                $faq_list = $settings['offer_lists'];
                foreach ($faq_list as $list):

                    $column_classes = $list['is_inline'] === 'yes' ? 'col-lg-12 col-md-12' : 'col-lg-6 col-md-6';

                    ?>
                    <div class="<?php echo esc_attr($column_classes);?> wow animate__ animate__zoomIn animated" data-wow-delay=".1s" >
                        <div class="freelancer__item <?php echo $list['is_inline'] === 'yes' ? 'item__inline' : '';?> <?php echo esc_attr($list['variant']);?>">
                            <div class="freelancer__item__header">
                                <div class="new_sectionTitle text-left <?php echo esc_html($list['title_variant']);?>">
                                    <?php
                                        if (!empty($list['badge'])){
                                            printf('<span class="subtitle">%1$s</span>',esc_html($list['badge']));
                                        }

                                        $title_markup = $list['title'];
                                        $title_markup = str_replace(['{h}','{/h}'],['<span class="title__color">','</span>'],$title_markup);
                                    ?>
                                    <h2 class="title">
                                      <?php echo wp_kses_post($title_markup);?>
                                    </h2>
                                    <p class="section_para mt-3"><?php echo esc_html($list['description'])?></p>
                                </div>
                                <?php if($list['is_inline'] === 'yes'):?>
                                <div class="freelancer__item__header__inner">
                                    <div class="freelancer__item__header__inner__flex">
                                        <h5 class="freelancer__item__coming__title"><?php echo esc_html($list['extra_title']);?></h5>
                                        <div class="btn_wrapper">
                                            <a href="javascript:void(0)" class="comingSoon__btn radius-30"><?php echo esc_html($list['coming_soon']);?></a>
                                        </div>
                                    </div>
                                </div>
                            <?php endif;?>
                            </div>
                            <div class="freelancer__item__inner">
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
                        </div>
                    </div>
                <? endforeach;?>
                </div>
            </div>
        </section>
		<?php
	}
}

Plugin::instance()->widgets_manager->register( new Xgenious_Xilancer_Feature_Grid_Area_Widget() );