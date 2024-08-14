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

class Xgenious_Xilancer_Price_Plan_Area_Widget extends Widget_Base {

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
		return 'xgenious-xilancer-price-plan-grid-widget';
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
		return esc_html__( 'Xilancer: Price Plan', 'xgenious-master' );
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
				'label' => esc_html__( 'Content Settings', 'xgenious-master' ),
				'tab'   => Controls_Manager::TAB_CONTENT,
			]
		);
		$this->add_control('title',[
			'label'       => esc_html__( 'Title', 'xgenious-master' ),
			'type'        => Controls_Manager::TEXTAREA,
			'label_block' => true,
			'default' => 'Affordable Pricing Based On Your {h}Needs{/h}'
		]);
		$this->add_control(
			'margin__bottom',
			[
				'label' => esc_html__( 'Section Bottom Margin', 'textdomain' ),
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
		$repeater->add_control('name',[
			'label'       => esc_html__( 'name', 'xgenious-master' ),
			'type'        => Controls_Manager::TEXT,
            'default' => __('Regular License','xgenious-master'),
			'label_block' => true
		]);
		$repeater->add_control('price',[
			'label'       => esc_html__( 'Price', 'xgenious-master' ),
			'type'        => Controls_Manager::TEXT,
			'default' => __('$39','xgenious-master'),
			'label_block' => true
		]);
		$repeater->add_control('cut_price',[
			'label'       => esc_html__( 'Cut Price', 'xgenious-master' ),
			'type'        => Controls_Manager::TEXT,
			'default' => __('$59','xgenious-master'),
			'label_block' => true
		]);

		$repeater->add_control('badge',[
			'label'       => esc_html__( 'Badge', 'xgenious-master' ),
			'type'        => Controls_Manager::TEXT,
			'default' => __('Best Plan','xgenious-master'),
			'label_block' => true
		]);
		$repeater->add_control('featured',[
			'label'       => esc_html__( 'Featured', 'xgenious-master' ),
			'type'        => Controls_Manager::SWITCHER,
			'label_on' => __( 'Yes', 'xgenious-master' ),
			'label_off' => __( 'No', 'xgenious-master' ),
			'return_value' => 'yes'
		]);
		$repeater->add_control('what_included',[
			'label'       => esc_html__( 'What Included', 'xgenious-master' ),
			'type'        => Controls_Manager::TEXTAREA,
			'default' => __('{y} Xilancer Web Panel \n {x} Xilancer Web Panel','xgenious-master'),
			'label_block' => true
		]);
		$repeater->add_control('features',[
			'label'       => esc_html__( 'Featrues', 'xgenious-master' ),
			'type'        => Controls_Manager::TEXTAREA,
			'default' => __('{y} Lifetime License Validity \n {x} Permitted for 1 Domain','xgenious-master'),

		]);

		$repeater->add_control('button_link',[
			'label'       => esc_html__( 'Button Link', 'xgenious-master' ),
			'type'        => Controls_Manager::URL,
			'label_block' => true
		]);
		$repeater->add_control('button_text',[
			'label'       => esc_html__( 'Button Text', 'xgenious-master' ),
			'type'        => Controls_Manager::TEXT,
			'label_block' => true
		]);
		$repeater->add_control('button_id',[
			'label'       => esc_html__( 'Button ID', 'xgenious-master' ),
			'type'        => Controls_Manager::TEXT,
			'label_block' => true
		]);
		$this->add_control('offer_lists',[
	        'label'       => esc_html__( 'Price Plans', 'xgenious-master' ),
	        'type'        => Controls_Manager::REPEATER,
            'fields' => $repeater->get_controls(),
            "title_field" => "{{{name}}}"
        ]);

		$this->end_controls_section();
		$this->start_controls_section(
			'styling_section',
			[
				'label' => esc_html__( 'Price Plan Header Settings', 'xgenious-master' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);
        $this->add_control("feature_bg_color",[
	        'label'       => esc_html__( 'Featured Background Color', 'xgenious-master' ),
	        'type'        => Controls_Manager::COLOR,
            "selectors" => [
                    "{{WRAPPER}} .price_plan_item__xilancer .badge" => "background-color: {{VALUE}}"
            ]
        ]);
		$this->add_control("feature_color",[
			'label'       => esc_html__( 'Featured Background Color', 'xgenious-master' ),
			'type'        => Controls_Manager::COLOR,
			"selectors" => [
				"{{WRAPPER}} .price_plan_item__xilancer .badge" => "color: {{VALUE}}"
			]
		]);
		$this->add_control("title_color",[
			'label'       => esc_html__( 'Title Color', 'xgenious-master' ),
			'type'        => Controls_Manager::COLOR,
			"selectors" => [
				"{{WRAPPER}} .price_plan_item__xilancer .title" => "color: {{VALUE}}"
			]
		]);
		$this->add_control("price_color",[
			'label'       => esc_html__( 'Price Color', 'xgenious-master' ),
			'type'        => Controls_Manager::COLOR,
			"selectors" => [
				"{{WRAPPER}} .price_plan_item__xilancer .price-wrap" => "color: {{VALUE}}"
			]
		]);
		$this->add_control("cutprice_color",[
			'label'       => esc_html__( 'Cut Price Color', 'xgenious-master' ),
			'type'        => Controls_Manager::COLOR,
			"selectors" => [
				"{{WRAPPER}} .price_plan_item__xilancer .price-wrap del" => "color: {{VALUE}}"
			]
		]);
		$this->end_controls_section();
		$this->start_controls_section(
			'feature_styling_section',
			[
				'label' => esc_html__( 'Price Plan Features Settings', 'xgenious-master' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);
		$this->add_control("feature_item_color",[
			'label'       => esc_html__( 'Item Color', 'xgenious-master' ),
			'type'        => Controls_Manager::COLOR,
			"selectors" => [
				"{{WRAPPER}} .price_plan_item__xilancer .xp_included ul li p" => "color: {{VALUE}}"
			]
		]);
		$this->add_control("featured_item_color",[
			'label'       => esc_html__( 'Featured Border Color', 'xgenious-master' ),
			'type'        => Controls_Manager::COLOR,
			"selectors" => [
				"{{WRAPPER}} .price_plan_item__xilancer.featured" => "border-color: {{VALUE}}"
			]
		]);
		$this->add_control("featured_item_background_color",[
			'label'       => esc_html__( 'Featured Background Color', 'xgenious-master' ),
			'type'        => Controls_Manager::COLOR,
			"selectors" => [
				"{{WRAPPER}} .price_plan_item__xilancer.featured" => "background-color: {{VALUE}}"
			]
		]);
		$this->end_controls_section();
		$this->start_controls_section(
			'success_styling_section',
			[
				'label' => esc_html__( 'Price Plan Success Box Settings', 'xgenious-master' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);
		$this->add_control("success_box_border_color",[
			'label'       => esc_html__( 'Border Color', 'xgenious-master' ),
			'type'        => Controls_Manager::COLOR,
			"selectors" => [
				"{{WRAPPER}} .price_plan_item__xilancer .xp_included ul li .icon.check" => "border-color: {{VALUE}}"
			]
		]);
		$this->add_control("success_box_bg_color",[
			'label'       => esc_html__( 'Background Color', 'xgenious-master' ),
			'type'        => Controls_Manager::COLOR,
			"selectors" => [
				"{{WRAPPER}} .price_plan_item__xilancer .xp_included ul li .icon.check" => "background-color: {{VALUE}}"
			]
		]);
		$this->end_controls_section();
		$this->start_controls_section(
			'danger_styling_section',
			[
				'label' => esc_html__( 'Price Plan Danger Box Settings', 'xgenious-master' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);
		$this->add_control("danger_box_border_color",[
			'label'       => esc_html__( 'Border Color', 'xgenious-master' ),
			'type'        => Controls_Manager::COLOR,
			"selectors" => [
				"{{WRAPPER}} .price_plan_item__xilancer .xp_included ul li .icon.cross" => "border-color: {{VALUE}}"
			]
		]);
		$this->add_control("danger_box_bg_color",[
			'label'       => esc_html__( 'Background Color', 'xgenious-master' ),
			'type'        => Controls_Manager::COLOR,
			"selectors" => [
				"{{WRAPPER}} .price_plan_item__xilancer .xp_included ul li .icon.cross" => "background-color: {{VALUE}}"
			]
		]);
		$this->end_controls_section();
		$this->start_controls_section(
			'button_styling_section',
			[
				'label' => esc_html__( 'Price Plan Button Settings', 'xgenious-master' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);

		$this->start_controls_tabs(
			'style_tabs'
		);

		$this->start_controls_tab(
			'style_normal_tab',
			[
				'label' => esc_html__( 'Normal', 'textdomain' ),
			]
		);
		$this->add_control("btn_background_color",[
			'label'       => esc_html__( 'Background Color', 'xgenious-master' ),
			'type'        => Controls_Manager::COLOR,
			"selectors" => [
				"{{WRAPPER}} .price_plan_item__xilancer .xp_footer .xl_plan_btn" => "background-color: {{VALUE}}"
			]
		]);
		$this->add_control("btn_border_color",[
			'label'       => esc_html__( 'Border Color', 'xgenious-master' ),
			'type'        => Controls_Manager::COLOR,
			"selectors" => [
				"{{WRAPPER}} .price_plan_item__xilancer .xp_footer .xl_plan_btn" => "border-color: {{VALUE}}"
			]
		]);
		$this->add_control("btn_color",[
			'label'       => esc_html__( 'Text Color', 'xgenious-master' ),
			'type'        => Controls_Manager::COLOR,
			"selectors" => [
				"{{WRAPPER}} .price_plan_item__xilancer .xp_footer .xl_plan_btn" => "color: {{VALUE}}"
			]
		]);
		$this->end_controls_tab();

		$this->start_controls_tab(
			'style_hover_tab',
			[
				'label' => esc_html__( 'Hover', 'textdomain' ),
			]
		);

		$this->add_control("btn_hover_background_color",[
			'label'       => esc_html__( 'Background Color', 'xgenious-master' ),
			'type'        => Controls_Manager::COLOR,
			"selectors" => [
				"{{WRAPPER}} .price_plan_item__xilancer .xp_footer .xl_plan_btn:hover" => "background-color: {{VALUE}}"
			]
		]);
		$this->add_control("btn_hover_border_color",[
			'label'       => esc_html__( 'Border Color', 'xgenious-master' ),
			'type'        => Controls_Manager::COLOR,
			"selectors" => [
				"{{WRAPPER}} .price_plan_item__xilancer .xp_footer .xl_plan_btn:hover" => "border-color: {{VALUE}}"
			]
		]);
		$this->add_control("btn_hover_color",[
			'label'       => esc_html__( 'Text Color', 'xgenious-master' ),
			'type'        => Controls_Manager::COLOR,
			"selectors" => [
				"{{WRAPPER}} .price_plan_item__xilancer .xp_footer .xl_plan_btn:hover" => "color: {{VALUE}}"
			]
		]);
		$this->end_controls_tab();

		$this->end_controls_tabs();


		$this->end_controls_section();

		$this->start_controls_section(
			'style_title_settings_section',
			[
				'label' => esc_html__( 'Title Style', 'xgenious-master' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'title_typography',
				'label' => __( 'Title Typography', 'my-plugin-domain' ),
				'selector' => '{{WRAPPER}} .new_sectionTitle .title'
			]
		);
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
        $check_svg  = '<div class="icon check"><svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M3.33337 8.00033L6.66671 11.3337L13.3334 4.66699" stroke="#328A69" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg></div>';
        $cross_svg = '<div class="icon cross"><svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M12 4L4 12M4 4L12 12" stroke="#A9233A" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg></div>';
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
                        <div class="price_plan_item__xilancer <?php echo $list['featured'] === 'yes' ? 'featured' : ''; ?>" >
                            <div class="xp_header">
                                <div class="badge-wrap">
                                    <span class="badge"><?php echo esc_html($list['badge']);?></span>
                                </div>
                                <h6 class="title"><?php echo esc_html($list['name'])?></h6>
                                <div class="price-wrap">
                                    <span><?php echo esc_html($list['price']); ?></span>
                                    <del><?php echo esc_html($list['cut_price']); ?></del>
                                </div>
                            </div>
                            <div class="xp_included">
                               <ul>
	                               <?php
	                               $what_included = explode("\n",$list['what_included']);
	                               foreach ($what_included as $inc_item):
                                        $final_item = str_replace([
                                            '{y}',
                                            '{x}'
                                        ],[
                                            $check_svg,
                                            $cross_svg
                                        ],$inc_item)
		                               ?>
                                   <li>
                                        <?php echo $final_item;?>
                                   </li>
	                               <?php endforeach;?>
                               </ul>
                            </div>
                            <div class="xp_included border-bottom-0">
                                <ul>
			                        <?php
			                        $what_included = explode("\n",$list['features']);
			                        foreach ($what_included as $inc_item):
				                        $final_item = str_replace([
					                        '{y}',
					                        '{x}'
				                        ],[
					                        $check_svg,
					                        $cross_svg
				                        ],$inc_item)
				                        ?>
                                        <li>
					                        <?php echo $final_item;?>
                                        </li>
			                        <?php endforeach;?>
                                </ul>
                            </div>
                            <div class="xp_footer">
                                <?php
                                    $button_external = !empty($list['button_link']['external']) ? 'target="_blank"' : "";
                                    $button_id = !empty($list['button_id']) ? 'id="'.$list['button_id'].'"' : "";
                                ?>
                                <a href="<?php echo $list['button_link']['url']?>" class="cmn-btn xl_plan_btn" <?php echo $button_external;?>  <?php echo $button_id; ?>><?php echo esc_html($list['button_text'])?></a>
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

Plugin::instance()->widgets_manager->register( new Xgenious_Xilancer_Price_Plan_Area_Widget() );