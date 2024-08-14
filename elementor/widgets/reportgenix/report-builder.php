<?php 
class Xgenious_Report_Builder_Addon extends \Elementor\Widget_Base {

	public function get_name() {
		return 'reportgenix_report_builder_addon';
	}

	public function get_title() {
		return esc_html__( 'Report Builder', 'xgenious' );
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
                'default' => esc_html__( 'Custom Report Builder And chart', 'xgenious' ),
                'placeholder' => esc_html__( 'Type your title here', 'xgenious' ),
            ]
        );

        $this->add_control(
            'description',
            [
                'label' => esc_html__( 'Description', 'xgenious' ),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'default' => esc_html__( 'Easily custom visual Report builder up to my last knowledge update in September 2021. However, I can provide a general Description of what a custom visual report', 'xgenious' ),
                'placeholder' => esc_html__( 'Type your description here', 'xgenious' ),
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

        $this->add_control(
            'list',
            [
                'label' => esc_html__( 'Repeater List', 'xgenious' ),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => [
                    [
                        'name' => 'title',
                        'label' => esc_html__( 'Title', 'xgenious' ),
                        'type' => \Elementor\Controls_Manager::TEXT,
                        'default' => esc_html__( 'Most Valuable Customer' , 'xgenious' ),
                        'label_block' => true,
                    ],
                ],
            ]
        );

        $this->end_controls_section();

    }

	protected function render() {
        $settings = $this->get_settings_for_display();

        $bg_img = ! empty( $settings['bg_img']['url'] ) ? $settings['bg_img']['url'] : '';
        $right_img = ! empty( $settings['right_img']['url'] ) ? $settings['right_img']['url'] : '';
		?>
        <div class="reportgenix-report-builder pt-60 pb-60">
           <div class="container">
                <div class="report-builder-wraper wraper-padding" style="background-image: url('<?php echo esc_url( $bg_img ); ?>');">
                    <div class="row g-5">
                        <div class="col-lg-5">
                            <div class="text">
                                <h2 class="report-second-heading mb-26"><?php printf( esc_html__( '%s', 'xgenious' ), esc_html( $settings['title'] ) ); ?>
                                </h2>
                                <p class="mb-26"><?php printf( esc_html__( '%s', 'xgenious' ), esc_html( $settings['description'] ) ); ?></p>
                                <ul class="segments">
                                    <?php if ( $settings['list'] ) : foreach ( $settings['list'] as $item ) : ?>
                                    <li class="mb-2"><i class="fa-solid fa-circle-check"></i><span class="ms-2"><?php printf( esc_html__( '%s', 'xgenious' ), esc_html( $item['title'] ) ); ?></span></li>
                                    <?php endforeach; endif; ?>
                                </ul>
                            </div>
                        </div>
                        <div class="col-lg-7">
                            <div class="image text-end">
                                <img src="<?php echo esc_url( $right_img ); ?>" alt="report builder">
                            </div>
                        </div>
                    </div>
                </div>
           </div> 
        </div>
		<?php
	}
}

\Elementor\Plugin::instance()->widgets_manager->register( new Xgenious_Report_Builder_Addon() );