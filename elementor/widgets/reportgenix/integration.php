<?php 
class Xgenious_Integration_Addon extends \Elementor\Widget_Base {

	public function get_name() {
		return 'reportgenix_integration_addon';
	}

	public function get_title() {
		return esc_html__( 'Integration', 'elementor-addon' );
	}

	public function get_icon() {
		return 'eicon-code';
	}

	public function get_categories() {
		return [ 'xgenious_widgets_reportgenix' ];
	}

	public function get_keywords() {
		return [ 'banner'];
	}

    protected function register_controls() {

        $this->start_controls_section(
            'content_section',
            [
                'label' => esc_html__( 'Content', 'xgenious' ),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'bg_img',
            [
                'label' => esc_html__( 'Background Image', 'xgenious' ),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ]
        );

        $this->add_control(
            'title',
            [
                'label' => esc_html__( 'Title', 'xgenious' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__( 'Integration', 'xgenious' ),
                'placeholder' => esc_html__( 'Type your title here', 'xgenious' ),
            ]
        );

        $this->add_control(
            'animation_img',
            [
                'label' => esc_html__( 'Animation Image', 'xgenious' ),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ]
        );

        $this->end_controls_section();

    }

	protected function render() {
        $settings = $this->get_settings_for_display();

        $bg_img = ! empty( $settings['bg_img']['url'] ) ? $settings['bg_img']['url'] : '';
        $animation_img = ! empty( $settings['animation_img']['url'] ) ? $settings['animation_img']['url'] : '';
		?>
        <div class="integration pt-120 pb-120" style="background-image:url('<?php echo esc_url( $bg_img ); ?>')">
			<div class="circle-animation1">
			</div>
			<div class="circle-animation2">
			</div>
            <div class="container">
                <h2 class="report-second-heading-large"><?php printf( esc_html__( '%s', 'xgenious' ), esc_html( $settings['title'] ) ); ?></h2>
                <div class="integration-wraper">
                    <div class="image text-center">
                        <img src="<?php echo esc_url( $animation_img ); ?>" alt="Integration">
                    </div>
                </div>
            </div>
        </div>
		<?php
	}
}

\Elementor\Plugin::instance()->widgets_manager->register( new Xgenious_Integration_Addon() );