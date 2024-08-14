<?php
/**
 * Elementor Widget
 * @package xgenous
 * @since 1.0.0
 */

namespace Elementor;

use Elementor\Core\Kits\Controls\Repeater;

class Xgenious_Breadcrumb_Area_One_Widget extends Widget_Base {

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
		return 'xgenious-breadcrumb-area-one-widget';
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
		return esc_html__( 'Breadcrumb One', 'xgenous-master' );
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
				'label' => esc_html__( 'Section Contents', 'xgenous-master' ),
				'tab'   => Controls_Manager::TAB_CONTENT,
			]
		);
	
		$this->add_control( 'title', [
			'type'    => Controls_Manager::TEXTAREA,
			'label'   => esc_html__( 'Title', 'xgenious-master' ),
			'description' => esc_html__( 'add {line}Line{/line} to get line under the word', 'xgenious-master' )
		] );
		$this->add_control( 'description', [
			'type'    => Controls_Manager::TEXTAREA,
			'label'   => esc_html__( 'Description', 'xgenious-master' ),
		] );
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
		<div class="breadcrumb-area navbar- elementor-addon">
		    <div class="breadcrumb-shapes">
                <img src="<?php echo XGENIOUS_IMG.'/breadcrumb/breadcrumb-shape1.png';?>" alt="shapes">
                <img src="<?php echo XGENIOUS_IMG.'/breadcrumb/breadcrumb-shape2.png';?>" alt="shapes">
            </div>
            <div class="container container_1430">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="breadcrumb-inner">
                            <h1 class="page-title"><?php echo esc_html($settings['title']);?></h1>
                            <p class="description"><?php echo esc_html($settings['description']);?></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
		
		<?php
	}
}

Plugin::instance()->widgets_manager->register( new Xgenious_Breadcrumb_Area_One_Widget() );