<?php 
class Xgenious_Data_Analytics_Addon extends \Elementor\Widget_Base {

	public function get_name() {
		return 'reportgenix_data_analytics_addon';
	}

	public function get_title() {
		return esc_html__( 'Data Analytics', 'elementor-addon' );
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
                'default' => esc_html__( 'Customer Analytics How important are your Customers?', 'xgenious' ),
                'placeholder' => esc_html__( 'Type your title here', 'xgenious' ),
            ]
        );

        $this->add_control(
            'description',
            [
                'label' => esc_html__( 'Description', 'xgenious' ),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'default' => esc_html__( 'Refers to the incorporation of artificial intelligence (AI) technologies and capabilities into existing systems, Processes, or applications', 'xgenious' ),
                'placeholder' => esc_html__( 'Type your description here', 'xgenious' ),
            ]
        );

        $this->add_control(
            'button_text',
            [
                'label' => esc_html__( 'Button Text', 'xgenious' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__( 'Start Free Trial', 'xgenious' ),
                'placeholder' => esc_html__( 'Type your description here', 'xgenious' ),
            ]
        );

        $this->add_control(
            'button_link',
            [
                'label' => esc_html__( 'Button Link', 'xgenious' ),
                'type' => \Elementor\Controls_Manager::URL,
                'options' => [ 'url', 'is_external', 'nofollow' ],
                'default' => [
                    'url' => '#',
                    'is_external' => true,
                    'nofollow' => true,
                    // 'custom_attributes' => '',
                ],
                'label_block' => true,
            ]
        );

        $this->add_control(
            'right_img',
            [
                'label' => esc_html__( 'Right Image', 'xgenious' ),
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

        $allowed_tags = [
            'br' => [],
            'span' => [
                    'class' => []
            ]
        ];

        $button_link = ! empty( $settings['button_link']['url'] ) ? $settings['button_link']['url'] : '';

        $right_img = ! empty( $settings['right_img']['url'] ) ? $settings['right_img']['url'] : '';
        $bg_img = ! empty( $settings['bg_img']['url'] ) ? $settings['bg_img']['url'] : '';
		?>
        <div class="data pt-60 pb-60 slider-up">
            <div class="container">
                <div class="data-wraper wraper-padding" style="background-image: url('<?php echo esc_url( $bg_img ); ?>')">
                    <div class="row g-5 mt-0">
                    <div class="col-lg-5">
                            <div class="data-text">
                                <h2 class="report-second-heading mb-26"><?php echo wp_kses( $settings['title'], $allowed_tags ); ?></h2>
                                <p class="mb-38"><?php printf( esc_html__( '%s', 'xgenious' ), esc_html( $settings['description'] ) ); ?></p>
                                <div class="data-btn">
                                    <?php if ( ! empty( $settings['button_text'] ) ) : ?>
                                    <a href="<?php echo esc_url( $button_link ); ?>" class="report-cmn-btn blue-btn"><?php printf( esc_html__( '%s', 'xgenious' ), esc_html( $settings['button_text'] ) ); ?> <i class="fa-solid fa-arrow-right"></i></a>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-7">
                            <div class="image-wraper ms-lg-5">
                                <div class="image">
                                    <img src="<?php echo esc_url( $right_img ); ?> " alt="Data">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
		<?php
	}
}

\Elementor\Plugin::instance()->widgets_manager->register( new Xgenious_Data_Analytics_Addon() );