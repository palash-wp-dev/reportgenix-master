<?php
/**
 * Elementor Widget
 * @package xgenous
 * @since 1.0.0
 */

namespace Elementor;

use Elementor\Core\Kits\Controls\Repeater;

class Xgenious_Contact_Area_Two_Widget extends Widget_Base {

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
		return 'xgenious-contact-area-two-widget';
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
		return esc_html__( 'Contact Area Two', 'xgenous-master' );
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
		return 'eicon-archive-title';
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
				'label' => esc_html__( 'Left Side Contents', 'xgenous-master' ),
				'tab'   => Controls_Manager::TAB_CONTENT,
			]
		);

		$this->add_control( 'title', [
			'type'    => Controls_Manager::TEXTAREA,
			'label'   => esc_html__( 'Title', 'xgenious-master' ),
			'info' => esc_html__( 'add {line}Line {/line} to get line under the word', 'xgenious-master' )
		] );
		$this->add_control( 'description', [
			'type'    => Controls_Manager::TEXTAREA,
			'label'   => esc_html__( 'Description', 'xgenious-master' ),
		] );

        $this->end_controls_section();

		$this->start_controls_section(
			'contact_Form_settings_section',
			[
				'label' => esc_html__( 'Contact Form', 'xgenous-master' ),
				'tab'   => Controls_Manager::TAB_CONTENT,
			]
		);
		$this->add_control( 'contact_form_title', [
			'type'    => Controls_Manager::TEXTAREA,
			'label'   => esc_html__( 'Title', 'xgenious-master' ),
		] );
		$this->add_control(
			'shortcode',
			[
				'label' => esc_html__( 'Enter your shortcode', 'elementor' ),
				'type' => Controls_Manager::TEXTAREA,
				'dynamic' => [
					'active' => true,
				],
				'placeholder' => '[gallery id="123" size="medium"]',
				'default' => '',
			]
		);
        $this->end_controls_section();

		$this->start_controls_section(
			'contact_info_settings_section',
			[
				'label' => esc_html__( 'Contact Info', 'xgenous-master' ),
				'tab'   => Controls_Manager::TAB_CONTENT,
			]
		);
		$social_links = new \Elementor\Repeater();

		$social_links->add_control(
			'list_title', [
				'label' => __( 'Title', 'xgenous-master' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => __( 'Skype' , 'xgenous-master' ),
				'label_block' => true,
			]
		);
		$social_links->add_control(
			'list_description',
			[
				'label' => __( 'Description', 'xgenious-master' ),
				'type' => \Elementor\Controls_Manager::TEXTAREA,
                'description' => __('new line will be render as new markup','xgenious-master')
			]
		);
		$social_links->add_control(
			'list_icons',
			[
				'label' => __( 'Icons', 'xgenous-master' ),
				'type' => \Elementor\Controls_Manager::ICONS,
			]
		);

		$this->add_control(
			'contact_list',
			[
				'label' => __( 'Contact list', 'xgenous-master' ),
				'type' => \Elementor\Controls_Manager::REPEATER,
				'fields' => $social_links->get_controls(),
				'title_field' => '{{{ list_title }}}',
			]
		);

		$this->end_controls_section();

	}

	/**
	 * Render Elementor widget output on the frontend.
	 *
	 * Written in PHP and used to generate the final HTML.
	 *
	 * @since 1.0.0
	 * @access protected
	 */
	protected function render() {
		$settings = $this->get_settings_for_display();
		?>
        <section class="contact-area padding-top-100 padding-bottom-50 active">
            <div class="container container_1430">
                <div class="row g-5">
                    <div class="col-lg-4">
                        <div class="contact-left-wrapper">
                            <div class="section-title theme-one text-left">
                                <?php
	                            $title_markup = $settings['title'];
	                            $title_markup = str_replace(['{line}','{/line}'],['<span class="banner-contents-title-shape"> <img src="'. XGENIOUS_IMG.'/banner/shape-line.svg" alt="'.__('shape image','xgenious-master').'">','</span>'],$title_markup);
	                            printf('<h2 class="title">%s</h2>',$title_markup);
                                ?>
                            </div>
                            <div class="contact-contents mt-4">
                                <?php
                                    if(!empty($settings['description'])){
                                        printf('<p class="contact-contents-para">%s</p>',$settings['description']);
                                    }
                                ?>
                                <div class="contact-contents-inner mt-4 mt-lg-5">
	                                <?php
	                                $social_list = $settings['contact_list'] ?? [];
	                                foreach($social_list as $list):
    	                                if(empty($list['list_title'])){
    	                                    continue;
    	                                }
	                                ?>
                                        <div class="contact-contents-inner-single">
                                            <div class="contact-contents-inner-single-flex">
                                                <div class="contact-contents-inner-single-icon">
                                                    <?php Icons_Manager::render_icon($list['list_icons']);?>
                                                </div>
                                                <div class="contact-contents-inner-single-contents">
                                                    <h4 class="contact-contents-inner-single-contents-title fw-500"> <?php echo esc_html($list['list_title']);?> </h4>
                                                    <?php
                                                        $list_description = explode("\n",$list['list_description']);
                                                        foreach ($list_description as $li_desc){
                                                            printf('<span class="contact-contents-inner-single-contents-item">%1$s</span>',$li_desc);
                                                        }
                                                    ?>
                                                </div>
                                            </div>
                                        </div>
	                                <?php endforeach; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-8">
                        <div class="contact-forms-wrapper">
                            <div class="section-title text-left">
                                <h2 class="title"> <?php echo esc_html($settings['contact_form_title']);?> </h2>
                            </div>
                            <div class="custom-form contact-content">
	                            <?php
	                            $shortcode = $this->get_settings_for_display( 'shortcode' );
	                            $shortcode = do_shortcode( shortcode_unautop( $shortcode ) );
	                            echo $shortcode;
	                            ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
		<?php
	}
}

Plugin::instance()->widgets_manager->register( new Xgenious_Contact_Area_Two_Widget() );