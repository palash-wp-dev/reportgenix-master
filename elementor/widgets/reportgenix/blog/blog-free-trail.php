<?php 
class Xgenious_Blog_Free_Trail_Addon extends \Elementor\Widget_Base {

	public function get_name() {
		return 'reportgenix_blog_free_trail_addon';
	}

	public function get_title() {
		return esc_html__( 'blog-free-trail', 'xgenious' );
	}

	public function get_icon() {
		return 'eicon-code';
	}

	public function get_categories() {
		return [ 'xgenious_widgets_reportgenix' ];
	}

	public function get_keywords() {
		return [ 'logo'];
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
            'bg_image',
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
                'default' => esc_html__( 'Try it for 07 days!', 'xgenious' ),
                'placeholder' => esc_html__( 'Type your title here', 'xgenious' ),
            ]
        );

        $this->add_control(
            'button_one_text',
            [
                'label' => esc_html__( 'Button One Text', 'xgenious' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__( 'Start Free Trial', 'xgenious' ),
                'placeholder' => esc_html__( 'Type your text here', 'xgenious' ),
            ]
        );

        $this->add_control(
            'button_one_link',
            [
                'label' => esc_html__( 'Button One Link', 'xgenious' ),
                'type' => \Elementor\Controls_Manager::URL,
                'options' => [ 'url', 'is_external', 'nofollow' ],
                'default' => [
                    'url' => '',
                    'is_external' => true,
                    'nofollow' => true,
                    // 'custom_attributes' => '',
                ],
                'label_block' => true,
            ]
        );

        $this->add_control(
            'button_two_text',
            [
                'label' => esc_html__( 'Button Two Text', 'xgenious' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__( 'Start Free Trial', 'xgenious' ),
                'placeholder' => esc_html__( 'Type your text here', 'xgenious' ),
            ]
        );

        $this->add_control(
            'button_two_link',
            [
                'label' => esc_html__( 'Button Two Link', 'xgenious' ),
                'type' => \Elementor\Controls_Manager::URL,
                'options' => [ 'url', 'is_external', 'nofollow' ],
                'default' => [
                    'url' => '',
                    'is_external' => true,
                    'nofollow' => true,
                    // 'custom_attributes' => '',
                ],
                'label_block' => true,
            ]
        );

        $this->end_controls_section();

    }

	protected function render() {
        $settings = $this->get_settings_for_display();
		?>
        <div class="blog-free-trial report-free-trial pt-60 pb-120">
            <div class="container">
                <div class="free-trial-wraper free-trial-wraper-01  pt-80 pb-80 d-flex justify-content-between align-items-center" style="background-image:url('<?php echo esc_url( $settings['bg_image']['url'] ); ?>')">
                    <div class="heading"><?php printf( esc_html__( '%s', 'xgenious' ), esc_html( $settings['title'] ) ); ?></div>
                    <div class="free-trial-btn">
                        <a href="<?php echo esc_url( $settings['button_one_link']['url'] ); ?>" class="report-cmn-btn blue-btn"><?php printf( esc_html__( '%s', 'xgenious' ), esc_html( $settings['button_one_text'] ) ); ?> <span class="ms-2"><i class="fa-solid fa-arrow-right"></i></span> </a>
                        <a href="<?php echo esc_url( $settings['button_one_link']['url'] ); ?>" class="report-cmn-btn black-btn"><?php printf( esc_html__( '%s', 'xgenious' ), esc_html( $settings['button_two_text'] ) ); ?><span class="ms-2"><i class="fa-solid fa-arrow-right"></i></span></a>
                    </div>
                </div>
            </div>
        </div>
		<?php
	}
}

\Elementor\Plugin::instance()->widgets_manager->register( new Xgenious_Blog_Free_Trail_Addon() );