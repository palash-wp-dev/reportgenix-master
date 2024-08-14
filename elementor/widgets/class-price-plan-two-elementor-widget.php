<?php
/**
 * Elementor Widget
 * @package Attorg
 * @since 1.0.0
 */

namespace Elementor;
class Xgenious_Price_Plan_Two_Widget extends Widget_Base {

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
		return 'xgenious-price-plan-one-widget';
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
		return esc_html__( 'Price Plan: 02', 'xgenious-master' );
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
			'label_block' => true
		]);
	    $this->add_control('section_note',[
			'label'       => esc_html__( 'Section Note', 'xgenious-master' ),
			'type'        => Controls_Manager::TEXTAREA,
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
		$repeater->add_control('active_plan',[
			'label'       => esc_html__( 'Active Plan', 'xgenious-master' ),
			'type'        => Controls_Manager::SWITCHER,
		]);
		$repeater->add_control('subtitle',[
			'label'       => esc_html__( 'Subtitle', 'xgenious-master' ),
			'type'        => Controls_Manager::TEXT,
			'label_block' => true
        ]);
		$repeater->add_control('title',[
			'label'       => esc_html__( 'Title', 'xgenious-master' ),
			'type'        => Controls_Manager::TEXT,
			'description' => esc_html__( 'enter title', 'xgenious-master' ),
			'label_block' => true
		]);
		$repeater->add_control('price',[
			'label'       => esc_html__( 'Price', 'xgenious-master' ),
			'type'        => Controls_Manager::TEXT,
			'description' => esc_html__( 'enter price use {m}mo{/m} for month or yr', 'xgenious-master' ),
			'label_block' => true
		]);
		$repeater->add_control('cut_price',[
			'label'       => esc_html__( 'Cut Price', 'xgenious-master' ),
			'type'        => Controls_Manager::TEXT,
			'description' => esc_html__( 'enter price use {m}mo{/m} for month or yr', 'xgenious-master' ),
			'label_block' => true
		]);
		$repeater->add_control('feature',[
			'label'       => esc_html__( 'Features', 'xgenious-master' ),
			'type'        => Controls_Manager::TEXTAREA,
			'description' => esc_html__( 'enter new line for new feature', 'xgenious-master' ),
		]);
	    $repeater->add_control('discount_text',[
			'label'       => esc_html__( 'Discount Text', 'xgenious-master' ),
			'type'        => Controls_Manager::TEXTAREA,
			'label_block' => true
		]);
		$repeater->add_control('button_status',[
			'label'       => esc_html__( 'Button Status', 'xgenious-master' ),
			'type'        => Controls_Manager::SWITCHER,
		]);
	
		$repeater->add_control('button_text',[
			'label'       => esc_html__( 'Button Text', 'xgenious-master' ),
			'type'        => Controls_Manager::TEXT,
			'label_block' => true,
            'condition' => [
                'button_status' => 'yes',
                'use_shortcode' => ''    
			]
		]);
		$repeater->add_control('button_link',[
			'label'       => esc_html__( 'Button Link', 'xgenious-master' ),
			'type'        => Controls_Manager::URL,
			'label_block' => true,
			'condition' => [
			    'button_status' => 'yes',
                'use_shortcode' => ''  
                ]
		]);
			$repeater->add_control('use_shortcode',[
			'label'       => esc_html__( 'Use Shotcode', 'xgenious-master' ),
			'type'        => Controls_Manager::SWITCHER,
			'condition' => [
			    'button_status' => 'yes'
                ]
		]);
		$repeater->add_control('edd_button_shotcode',[
			'label'       => esc_html__( 'EDD Button Shortcode', 'xgenious-master' ),
			'type'        => Controls_Manager::TEXTAREA,
			'label_block' => true,
				'condition' => [
			        'use_shortcode' => 'yes' ,
			        'button_status' => 'yes',
			]
		]);
		
        $this->add_control('price_plan_lists',[
	        'label'       => esc_html__( 'Price Plans', 'xgenious-master' ),
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
		$settings  = $this->get_settings_for_display();
		?>
		<section class="pricing_area padding-top-50 padding-bottom-50">
        <div class="container">
            <div class="section_title center-text">
                <h2 class="title"><?php  echo esc_html($settings['section_title']);?></h2>
            </div>
            <div class="row g-4 mt-4">
                <?php
                    $whyUsList = $settings['price_plan_lists'];
                    foreach ($whyUsList as $list):
                        ?>
                <div class="col-lg-4 col-md-6 wow fadeInLeft" data-wow-delay=".1s">
                    <div class="single_pricing single_pricing__border padding-20 radius-10 <?php echo esc_attr($list['active_plan'] === 'yes' ? 'featured' : '')?> ">
                        <?php if(!empty($list['discount_text'])):?>
                        <div class="discount_wrap"><?php echo wp_kses_post($list['discount_text'] ?? '')?></div>
                        <?php endif?>
                        <div class="single_pricing__header">
                            <h4 class="single_pricing__title"><?php echo esc_html($list['title']);?></h4>
                            <?php
                                if(!empty($list['subtitle'])){
                                    printf('<h6 class="single_pricing__offer color-one mt-2">%1$s</h6>',esc_html($list['subtitle']));
                                }
                                ?>
                                 <?php
                                    printf('<del class="cut_price">%1$s</del>',$list['cut_price']);
                                    $price = $list['price'];
                                    $price = str_replace(['{m}','{/m}'],['<sub>','</sub>'],$price);
                                    printf('<span class="single_pricing__price">%1$s</span>',wp_kses_post($price));
                                ?>
                        </div>
                        <div class="single_pricing__inner mt-4">
                            <ul class="single_pricing__list">
                                <?php
                                    $features = $list['feature'];
                                    $features_list = explode("\n",$features);
                                    foreach ($features_list as $li){
                                         preg_match('[x]',$li,$match);
                                          $extra_class = '';
                                         if(!empty($match)){
                                             $extra_class = 'close';
                                             $li = str_replace('[x]','',$li);
                                         }
                                    
                                        printf('<li class="single_pricing__list__item %2$s">%1$s</li>',$li,$extra_class);
                                    }
                                ?>
                            </ul>
                        </div>
                        <?php
                            if ($list['button_status'] === 'yes'){
                               if($list['use_shortcode'] === 'yes'){
                                   $shortcode = $list['edd_button_shotcode'];
                                    $shortcode = do_shortcode( shortcode_unautop( $shortcode ) );
                                    echo $shortcode; 
                               }else{
                                 printf('<div class="single_pricing__footer mt-4"><a href="%2$s" class="cmn-btn btn-outline-1 color-one w-100"> %1$s</a></div>',esc_html($list['button_text']),esc_url($list['button_link']['url']));
                                }
                               
                            }
                        ?>
                    </div>
                </div>
                <?php endforeach;?>
                <div class="payment_note_warning"><?php echo esc_html($settings['section_note']);?></div>
            </div>
        </div>
    </section>
		<?php
	}
}

Plugin::instance()->widgets_manager->register( new Xgenious_Price_Plan_Two_Widget() );