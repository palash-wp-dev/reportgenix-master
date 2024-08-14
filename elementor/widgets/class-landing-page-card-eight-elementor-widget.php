<?php
/**
 * Elementor Widget
 * @package Attorg
 * @since 1.0.0
 */

namespace Elementor;

class Xgenious_Landing_Card_Eight_Widget extends Widget_Base {

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
		return 'xgenious-landing-card-eight-widget';
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
		return esc_html__( 'Landing Card: 08', 'xgenious-master' );
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
		
		$this->add_control('title',[
			'label'       => esc_html__( 'Title', 'xgenious-master' ),
			'type'        => Controls_Manager::TEXTAREA,
			'label_block' => true
		]);
		$this->add_control('description',[
			'label'       => esc_html__( 'Description', 'xgenious-master' ),
			'type'        => Controls_Manager::WYSIWYG
		]);

		$this->end_controls_section();
		
        $this->start_controls_section(
			'image_settings_section',
			[
				'label' => esc_html__( 'Images', 'xgenious-master' ),
				'tab'   => Controls_Manager::TAB_CONTENT,
			]
		);
		$this->add_control('image_one',[
			'label'       => esc_html__( 'Image 01', 'xgenious-master' ),
			'type'        => Controls_Manager::MEDIA,
			'label_block' => true
		]);
		$this->end_controls_section();
		
		
		$this->start_controls_section(
			'_button_settings_section',
			[
				'label' => esc_html__( 'List Settings', 'xgenious-master' ),
				'tab'   => Controls_Manager::TAB_CONTENT,
			]
		);
		
		$repeater = new \Elementor\Repeater();
		$repeater->add_control('title',[
			'label'       => esc_html__( 'Title', 'xgenious-master' ),
			'type'        => Controls_Manager::TEXTAREA,
			'description' => esc_html__( 'enter title', 'xgenious-master' ),
			'label_block' => true
		]);
		$this->add_control('faq_lists',[
			'label'       => esc_html__( 'Lists', 'xgenious-master' ),
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
		
		
		<section class="landing-page-box-eight">
		    
		    <div class="row g-5 mt-3 align-items-center justify-content-between <?php echo $settings['row_reverse'] === 'yes' ? 'flex-row-reverse' : ''; ?>">
                    <div class="col-lg-6">
                        <div class="single_features__thumb padding-20">
                            <?php 
                                
                                $image_id = $settings['image_one']['id'];
                        		$image_src = !empty($image_id) ? wp_get_attachment_image_src($image_id,'full')[0] : '';
                        		$image_alt = !empty($image_id) ? get_post_meta($image_id,'_wp_attachment_image_alt',true) : '';
	                            printf(' <img src="%1$s" alt="%2$s">',esc_url($image_src),esc_attr($image_alt));
                            ?>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="single_features">
                            <div class="section_title text-left">
                                <h2 class="title"> <?php echo esc_html($settings['title']); ?> </h2>
                                <div class="section_para"> <?php echo wp_kses_post($settings['description']); ?> </div>
                            </div>
                            <div class="single_features__contents mt-4 mt-lg-5">
                                <ul class="single_features__list">
                                <?php
                                  $faq_list = $settings['faq_lists'];
        	                        foreach ($faq_list as $list){
        	                            printf('<li class="single_features__list__item">%1$s</li>',esc_html($list['title']));
        	                        }
    	                        ?>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                
    </section>
    
		<?php
	}
}

Plugin::instance()->widgets_manager->register( new Xgenious_Landing_Card_Eight_Widget() );