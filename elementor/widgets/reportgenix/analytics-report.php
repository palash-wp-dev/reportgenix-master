<?php 
class Xgenious_Analytics_Report_Addon extends \Elementor\Widget_Base {

	public function get_name() {
		return 'reportgenix_analytics_report_addon';
	}

	public function get_title() {
		return esc_html__( 'analytics-report', 'xgenious' );
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
            'title',
            [
                'label' => esc_html__( 'Title', 'xgenious' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__( 'Get data analytics report', 'xgenious' ),
                'placeholder' => esc_html__( 'Type your description here', 'xgenious' ),
            ]
        );

        $this->add_control(
            'list',
            [
                'label' => esc_html__( 'Repeater List', 'xgenious' ),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => [
                    [
                        'name' => 'bg_img',
                        'label' => esc_html__( 'Background Image', 'xgenious' ),
                        'type' => \Elementor\Controls_Manager::MEDIA,
                        'default' => [
                            'url' => \Elementor\Utils::get_placeholder_image_src(),
                        ],
                    ],
                    [
                        'name' => 'outer_title',
                        'label' => esc_html__( 'Outer Title', 'xgenious' ),
                        'type' => \Elementor\Controls_Manager::TEXT,
                        'default' => esc_html__( 'Plan personalized reports For your email.' , 'xgenious' ),
                        'label_block' => true,
                    ],
                    [
                        'name' => 'inner_bg_img',
                        'label' => esc_html__( 'Inner Background Image', 'xgenious' ),
                        'type' => \Elementor\Controls_Manager::MEDIA,
                        'default' => [
                            'url' => \Elementor\Utils::get_placeholder_image_src(),
                        ],
                    ],
                    [
                        'name' => 'inner_title',
                        'label' => esc_html__( 'Inner Title', 'xgenious' ),
                        'type' => \Elementor\Controls_Manager::TEXT,
                        'default' => esc_html__( 'Weekly Reportgenix Report' , 'xgenious' ),
                        'label_block' => true,
                    ],
                    [
                        'name' => 'brand_icon',
                        'label' => esc_html__( 'Brand Icon', 'xgenious' ),
                        'type' => \Elementor\Controls_Manager::ICONS,
                    ],
                    [
                        'name' => 'sub_title',
                        'label' => esc_html__( 'Sub Title', 'xgenious' ),
                        'type' => \Elementor\Controls_Manager::TEXT,
                        'default' => esc_html__( 'Store Performance' , 'xgenious' ),
                        'label_block' => true,
                    ],
                    [
                        'name' => 'icon_one',
                        'label' => esc_html__( 'Icon One', 'xgenious' ),
                        'type' => \Elementor\Controls_Manager::MEDIA,
                        'default' => [
                            'url' => \Elementor\Utils::get_placeholder_image_src(),
                        ],
                    ],
                    [
                        'name' => 'icon_one_color',
                        'label' => esc_html__( 'Icon One Color', 'xgenious' ),
                        'type' => \Elementor\Controls_Manager::COLOR,
                    ],
                    [
                        'name' => 'icon_two',
                        'label' => esc_html__( 'Icon Two', 'xgenious' ),
                        'type' => \Elementor\Controls_Manager::MEDIA,
                        'default' => [
                            'url' => \Elementor\Utils::get_placeholder_image_src(),
                        ],
                    ],
                    [
                        'name' => 'icon_two_color',
                        'label' => esc_html__( 'Icon Two Color', 'xgenious' ),
                        'type' => \Elementor\Controls_Manager::COLOR,
                    ],
                ],
            ]
        );

        $this->end_controls_section();

    }

	protected function render() {
        $settings = $this->get_settings_for_display();
		?>
        <div class="reportgenix-analytics-report pt-60 pb-60">
            <div class="container">
                <h2 class="report-second-heading-large"><?php printf( esc_html__( '%s', 'xgenious' ), esc_html( $settings['title'] ) ); ?></h2>
                <div class="analytics-report-wraper">
                    <div class="row g-lg-5 g-4">
                        <?php if ( $settings['list'] ) : foreach ( $settings['list'] as $item ) : ?>
                        <div class="col-md-6">
                            <div class="planEmail" style="background-image:url('<?php echo esc_url( $item['bg_img']['url'] ); ?>')">
                                <h4 class="report-fourth-heading-large text-center"><?php printf( esc_html__( '%s', 'xgenious' ), esc_html( $item['outer_title'] ) ); ?></h4>
                                <div class="body" style="background-image:url('<?php echo esc_url( $item['inner_bg_img']['url'] ); ?>')">
                                    <div class="header">
                                        <div class="icon-img text-center">
                                            <?php \Elementor\Icons_Manager::render_icon( $item['brand_icon'], [ 'aria-hidden' => 'true' ] ); ?>
                                        </div>
                                        <h4 class="report-fifth-heading text-center mt-1"><?php printf( esc_html__( '%s', 'xgenious' ), esc_html( $item['inner_title'] ) ); ?></h4>
                                        <p class="text-center mt-1">Store Performance</p>
                                    </div>
                                    <div class="animation-part d-flex align-items-center justify-content-between">
                                        <div class="icon-1" style="background: <?php echo esc_attr( $item['icon_one_color'] ); ?>">
                                            <img src="<?php echo esc_url( $item['icon_one']['url'] ); ?>" alt="store">
                                        </div>
                                        <div class="animation-line">
                                            <svg height="1.5" width="300" viewBox="0 0 300 1.5" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <rect x="0.5" y="0.5" height="1.5" stroke="#02A97D" stroke-dasharray="5 5"/>
                                            </svg>
                                        </div>
                                        <div class="icon-2" style="background: <?php echo esc_attr( $item['icon_two_color'] ); ?>">
                                            <img src="<?php echo esc_url( $item['icon_two']['url'] ); ?>" alt="store">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php endforeach; endif; ?>
                    </div>
                </div>
            </div>
        </div>
		<?php
	}
}

\Elementor\Plugin::instance()->widgets_manager->register( new Xgenious_Analytics_Report_Addon() );