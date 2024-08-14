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

class Xgenious_Xilancer_Feature_Box_Three_Area_Widget extends Widget_Base {

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
		return 'xgenious-xilancer-feature-box-three-widget';
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
		return esc_html__( 'Xilancer: Feature Box: 03', 'xgenious-master' );
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
            'default' => 'Project/Gig Creation for {h}Freelancers{/h}'
		]);
        $repeater->add_control('badge',[
			'label'       => esc_html__( 'Badge', 'xgenious-master' ),
			'type'        => Controls_Manager::TEXT,
			'description' => esc_html__( 'enter badge', 'xgenious-master' ),
			'label_block' => true,
            'default' => 'For Freelancer'
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
		$repeater->add_control('multiple_image',[
			'label'       => esc_html__( 'Multiple Image', 'xgenious-master' ),
			'type'        => Controls_Manager::SWITCHER,
		]);
		$repeater->add_control('list_title',[
			'label'       => esc_html__( 'List Title', 'xgenious-master' ),
			'type'        => Controls_Manager::TEXT,
			'label_block' => true,
            'default' => 'Filter by:',
			'condition' => [
				'multiple_image' => 'yes'
			]
		]);
		$repeater->add_control('list_description',[
			'label'       => esc_html__( 'Lists Description', 'xgenious-master' ),
			'type'        => Controls_Manager::TEXTAREA,
			'label_block' => true,
			'condition' => [
				'multiple_image' => 'yes'
			]
		]);
		$repeater->add_control('image',[
			'label'       => esc_html__( 'Image', 'xgenious-master' ),
			'type'        => Controls_Manager::MEDIA,
			'label_block' => true
		]);
		$repeater->add_control('left_image_two',[
			'label'       => esc_html__( 'Left Image 02', 'xgenious-master' ),
			'type'        => Controls_Manager::MEDIA,
			'label_block' => true,
            'condition' => [
                    'multiple_image' => 'yes'
            ]
		]);
		$repeater->add_control('right_mage_one',[
			'label'       => esc_html__( 'Right Image 01', 'xgenious-master' ),
			'type'        => Controls_Manager::MEDIA,
			'label_block' => true,
			'condition' => [
				'multiple_image' => 'yes'
			]
		]);
		$repeater->add_control('right_mage_two',[
			'label'       => esc_html__( 'Right Image 02', 'xgenious-master' ),
			'type'        => Controls_Manager::MEDIA,
			'label_block' => true,
			'condition' => [
				'multiple_image' => 'yes'
			]
		]);
		$repeater->add_control('right_mage_three',[
			'label'       => esc_html__( 'Right Image 03', 'xgenious-master' ),
			'type'        => Controls_Manager::MEDIA,
			'label_block' => true,
			'condition' => [
				'multiple_image' => 'yes'
			]
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

        <section class="quality__area xilancer">
            <div class="container">
                <div class="row g-4 mt-1">
		<?php
		$faq_list = $settings['offer_lists'];
		foreach ($faq_list as $list):
			?>

                    <div class="col-lg-6 wow animate__ animate__fadeInLeft animated" data-wow-delay=".1s" >
                        <div class="freelancer__item <?php echo esc_attr($list['variant']);?>">
                            <div class="freelancer__item__header">
                                <div class="new_sectionTitle text-left">
                                    <?php
                                    $badge = $list['badge'];
                                    if(!empty($badge)){
                                        printf('<span class="subtitle">%s</span>',$badge);
                                    }
                                    ?>
	                                <?php
	                                $title = $list['title'];
	                                $title_markup = str_replace(['{h}','{/h}'],[' <span class="title__color">','</span>'],$title);
	                                ?>
                                    <h2 class="title">
		                                <?php echo wp_kses_post($title_markup);?>
                                    </h2>
                                </div>
                            </div>
                            <div class="freelancer__item__inner">
                                <?php if($list['multiple_image'] !== 'yes'): ?>
                                <div class="freelancer__item__thumb">
	                                <?php
                                        $img_id = $list['image']['id'] ;
                                        $img_url_val = $img_id ? wp_get_attachment_image_src($img_id,'full',false) : '';
                                        $img_url = is_array($img_url_val) && !empty($img_url_val) ? $img_url_val[0] : '';
                                        $img_alt =  $img_id ? get_post_meta($img_id,'_wp_attachment_image_alt',true) : '';
                                        printf('<img src="%1$s" alt="%2$s">',$img_url,$img_alt);
	                                ?>
                                </div>
                                <?php endif;?>
                                <div class="freelancer__item__inner__wrap">
                                    <h6 class="freelancer__item__inner__title"><?php echo esc_html($list['list_title']);?></h6>
                                    <div class="freelancer__item__inner__list mt-2">
                                        <?php
                                            $list_description = $list['list_description'] ?? "";
                                            $list_items = explode("\n",$list_description);
                                            foreach ($list_items as $li){
                                                if (!empty($li)){
                                                    printf('<span class="freelancer__item__inner__list__item">%s</span>',$li);
                                                }
                                            }
                                        ?>
                                    </div>
                                    <div class="freelancer__item__inner__wrap__thumb">
                                        <div class="freelancer__item__inner__wrap__left">
                                            <div class="freelancer__item__inner__wrap__thumb__item">
	                                            <?php
	                                            $img_id = $list['image']['id'] ;
	                                            $img_url_val = $img_id ? wp_get_attachment_image_src($img_id,'full',false) : '';
	                                            $img_url = is_array($img_url_val) && !empty($img_url_val) ? $img_url_val[0] : '';
	                                            $img_alt =  $img_id ? get_post_meta($img_id,'_wp_attachment_image_alt',true) : '';
	                                            printf('<img src="%1$s" alt="%2$s">',$img_url,$img_alt);
	                                            ?>
                                            </div>
                                            <div class="freelancer__item__inner__wrap__thumb__item">
	                                            <?php
	                                            $img_id = $list['left_image_two']['id'] ?? '';
	                                            $img_url_val = $img_id ? wp_get_attachment_image_src($img_id,'full',false) : '';
	                                            $img_url = is_array($img_url_val) && !empty($img_url_val) ? $img_url_val[0] : '';
	                                            $img_alt =  $img_id ? get_post_meta($img_id,'_wp_attachment_image_alt',true) : '';
	                                            printf('<img src="%1$s" alt="%2$s">',$img_url,$img_alt);
	                                            ?>
                                            </div>
                                        </div>
                                        <div class="freelancer__item__inner__wrap__right">
                                            <div class="freelancer__item__inner__wrap__thumb__item">
	                                            <?php
	                                            $img_id = $list['right_mage_one']['id'] ?? '';
	                                            $img_url_val = $img_id ? wp_get_attachment_image_src($img_id,'full',false) : '';
	                                            $img_url = is_array($img_url_val) && !empty($img_url_val) ? $img_url_val[0] : '';
	                                            $img_alt =  $img_id ? get_post_meta($img_id,'_wp_attachment_image_alt',true) : '';
	                                            printf('<img src="%1$s" alt="%2$s">',$img_url,$img_alt);
	                                            ?>
                                            </div>
                                            <div class="freelancer__item__inner__wrap__thumb__item">
	                                            <?php
	                                            $img_id = $list['right_mage_two']['id'] ?? '';
	                                            $img_url_val = $img_id ? wp_get_attachment_image_src($img_id,'full',false) : '';
	                                            $img_url = is_array($img_url_val) && !empty($img_url_val) ? $img_url_val[0] : '';
	                                            $img_alt =  $img_id ? get_post_meta($img_id,'_wp_attachment_image_alt',true) : '';
	                                            printf('<img src="%1$s" alt="%2$s">',$img_url,$img_alt);
	                                            ?>
                                            </div>
                                            <div class="freelancer__item__inner__wrap__thumb__item">
	                                            <?php
	                                            $img_id = $list['right_mage_three']['id'] ?? '';
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
                    </div>
		            <? endforeach;?>
                </div>
            </div>
        </section>
		<?php
	}
}

Plugin::instance()->widgets_manager->register( new Xgenious_Xilancer_Feature_Box_Three_Area_Widget() );