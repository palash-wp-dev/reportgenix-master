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

class Xgenious_Xilancer_Full_Width_features_Widget extends Widget_Base {

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
		return 'xgenious-xilancer-full-width-features-widget';
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
		return esc_html__( 'Xilancer: Full-width Feature 01', 'xgenious-master' );
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
        $this->add_control('row_reverse',[
            'label'       => esc_html__( 'Row Reverse', 'xgenious-master' ),
            'type'        => Controls_Manager::SWITCHER,
        ]);
		$this->add_control('section_title',[
			'label'       => esc_html__( 'Title', 'xgenious-master' ),
			'type'        => Controls_Manager::TEXTAREA,
			'label_block' => true,
            'default' => 'Proposal Submission System for {h}Freelancers{/h}'
		]);
	
        $this->add_control('section_description',[
			'label'       => esc_html__( 'Description', 'xgenious-master' ),
			'type'        => Controls_Manager::TEXTAREA,
			'label_block' => true,
            'default' => 'Freelancers can submit their proposals/bid on clients job post and clients can decide best option for their need.'
		]);
		$this->add_control('right_image',[
			'label'       => esc_html__( 'Right Image', 'xgenious-master' ),
			'type'        => Controls_Manager::MEDIA,
		]);
		$this->add_control('right_image_bottom',[
			'label'       => esc_html__( 'Right Bottom Image', 'xgenious-master' ),
			'type'        => Controls_Manager::MEDIA,
		]);
		$this->end_controls_section();

		$this->start_controls_section(
			'settings_section',
			[
				'label' => esc_html__( 'List Settings', 'xgenious-master' ),
				'tab'   => Controls_Manager::TAB_CONTENT,
			]
		);

        $repeater = new Repeater();
		$repeater->add_control('button_text',[
			'label'       => esc_html__( 'Text', 'xgenious-master' ),
			'type'        => Controls_Manager::TEXT,
			'description' => esc_html__( 'enter text', 'xgenious-master' ),
			'label_block' => true
		]);
        $repeater->add_control('button_icon',[
            'label'       => esc_html__( 'Icon', 'xgenious-master' ),
            'type'        => Controls_Manager::ICONS,
            'label_block' => true
        ]);
        $this->add_control('faq_lists',[
	        'label'       => esc_html__( 'List', 'xgenious-master' ),
	        'type'        => Controls_Manager::REPEATER,
            'fields' => $repeater->get_controls(),
            'title_field' => "{{{button_text}}}"
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
        <section class="proposal_submission_area section__bg pat-60 pab-60 xilancer">
            <div class="container">
                <div class="row g-4 gx-5 align-items-center justify-content-between  <?php echo $settings['row_reverse'] === 'yes' ? 'flex-row-reverse' : ''?>">

                    <div class="col-xxl-6 col-xl-6 col-lg-6 wow animate__ animate__zoomIn animated" data-wow-delay=".4s" style="visibility: visible; animation-delay: 0.4s; animation-name: zoomIn;">
                        <div class="sectionItem__thumb">
	                        <?php
                                $img_id = $settings['right_image']['id'] ;
                                $img_url_val = $img_id ? wp_get_attachment_image_src($img_id,'full',false) : '';
                                $img_url = is_array($img_url_val) && !empty($img_url_val) ? $img_url_val[0] : '';
                                $img_alt =  $img_id ? get_post_meta($img_id,'_wp_attachment_image_alt',true) : '';
                                printf('<img src="%1$s" alt="%2$s">',$img_url,$img_alt);
	                        ?>
                        </div>
                          <?php
                                $img_id = $settings['right_image_bottom']['id'] ;
                                $img_url_val = $img_id ? wp_get_attachment_image_src($img_id,'full',false) : '';
                                $img_url = is_array($img_url_val) && !empty($img_url_val) ? $img_url_val[0] : '';
                                $img_alt =  $img_id ? get_post_meta($img_id,'_wp_attachment_image_alt',true) : '';
                           if(!empty($img_url)):
                          ?>
                        <div class="sectionItem__thumb">
                            <?endif ?>
		                    <?php printf('<img src="%1$s" alt="%2$s">',$img_url,$img_alt); ?>
                        <?php if(!empty($img_url)):?>
                        </div>
                        <?php endif;?>
                    </div>
                    <div class="col-xxl-6 col-xl-5 col-lg-6 wow animate__ animate__fadeInLeft animated" data-wow-delay=".1s" style="visibility: visible; animation-delay: 0.1s; animation-name: fadeInLeft;">
                        <div class="sectionItem__wrap">
                            <div class="new_sectionTitle text-left">
	                            <?php
	                            $title = $settings['section_title'];
	                            $title_markup = str_replace(['{h}','{/h}'],[' <span class="title__color">','</span>'],$title);
	                            ?>
                                <h2 class="title">
		                            <?php echo wp_kses_post($title_markup);?>
                                </h2>
                                <p class="section_para mt-3"><?php echo esc_html($settings['section_description']);?></p>
                            </div>
                            <div class="sectionItem__inner mt-4">
                                <ul class="sectionItem__list">
	                                <?php
	                                $faq_list = $settings['faq_lists'];
	                                foreach ($faq_list as $list):?>
                                        <li class="sectionItem__list__item %1$s">
                                            <div class="icon">
				                                <?php Icons_Manager::render_icon($list['button_icon'], ['aria-hidden' => 'true']); ?>
                                            </div>
			                                <?php echo esc_html($list['button_text']);?>
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

Plugin::instance()->widgets_manager->register( new Xgenious_Xilancer_Full_Width_features_Widget() );