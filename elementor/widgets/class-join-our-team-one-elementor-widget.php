<?php
/**
 * Elementor Widget
 * @package xgenous
 * @since 1.0.0
 */

namespace Elementor;

use Elementor\Core\Kits\Controls\Repeater;

class Xgenious_Join_Our_Team_Widget extends Widget_Base {

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
		return 'xgenious-join-our-team-area-one-widget';
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
		return esc_html__( 'Join Our Team: 01', 'xgenous-master' );
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
        <section class="join-our-team-area padding-top-100 padding-bottom-50 active">
            <div class="container container_1430">
                <div class="section-title">
                    <?php
                    $title_markup = $settings['title'];
                    $title_markup = str_replace(['{line}','{/line}'],['<span class="banner-contents-title-shape"> <img src="'. XGENIOUS_IMG.'/banner/shape-line.svg" alt="'.__('shape image','xgenious-master').'">','</span>'],$title_markup);
                    printf('<h2 class="title">%s</h2>',$title_markup);
                    printf('<p class="description">%s</p>',$settings['description']);
                    
                    ?>
                </div>
                <div class="row g-5 justify-content-center margin-top-50">
                    <div class="col-lg-8">
                        <div class="contact-forms-wrapper apply-job-form">
                            <?php
                                $shortcode = $this->get_settings_for_display( 'shortcode' );
                                $shortcode = do_shortcode( shortcode_unautop( $shortcode ) );
                                echo $shortcode;
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </section>
		<?php
	}
}

Plugin::instance()->widgets_manager->register( new Xgenious_Join_Our_Team_Widget() );