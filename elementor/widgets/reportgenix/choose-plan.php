<?php 
class Xgenious_Choose_Plan_Addon extends \Elementor\Widget_Base {

	public function get_name() {
		return 'reportgenix_choose_plan_addon';
	}

	public function get_title() {
		return esc_html__( 'choose-plan', 'xgenious' );
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
                'default' => esc_html__( 'Choose Your Best Plan', 'xgenious' ),
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
                        'name' => 'make_active',
                        'label' => esc_html__( 'Make this active', 'xgenious' ),
                        'type' => \Elementor\Controls_Manager::SWITCHER,
                        'label_on' => esc_html__( 'Show', 'xgenious' ),
                        'label_off' => esc_html__( 'Hide', 'xgenious' ),
                        'return_value' => 'yes',
                        'default' => 'no',
                    ],
                    [
                        'name' => 'title',
                        'label' => esc_html__( 'Title', 'xgenious' ),
                        'type' => \Elementor\Controls_Manager::TEXT,
                        'default' => esc_html__( 'Basic Plan', 'xgenious' ),
                        'placeholder' => esc_html__( 'Type your title here', 'xgenious' ),
                    ],
                    [
                        'name' => 'price_amount',
                        'label' => esc_html__( 'Price Amount', 'xgenious' ),
                        'type' => \Elementor\Controls_Manager::TEXT,
                        'default' => esc_html__( '$59', 'xgenious' ),
                        'placeholder' => esc_html__( 'Type your amount here', 'xgenious' ),
                    ],
                    [
                        'name' => 'price_per_month',
                        'label' => esc_html__( 'Per Month Text', 'xgenious' ),
                        'type' => \Elementor\Controls_Manager::TEXT,
                        'default' => esc_html__( '/Mo', 'xgenious' ),
                        'placeholder' => esc_html__( 'Type your price month text here', 'xgenious' ),
                    ],
                    [
                        'name' => 'sub_title',
                        'label' => esc_html__( 'Sub Title', 'xgenious' ),
                        'type' => \Elementor\Controls_Manager::TEXT,
                        'default' => esc_html__( 'The essential features to track your stores', 'xgenious' ),
                        'placeholder' => esc_html__( 'Type your sub title here', 'xgenious' ),
                    ],
                    [
                        'name' => 'all_features',
                        'label' => esc_html__( 'All Features', 'xgenious' ),
                        'type' => \Elementor\Controls_Manager::WYSIWYG,
                        'placeholder' => esc_html__( 'Type your description here', 'xgenious' ),
                    ],
                    [
                        'name' => 'button_text',
                        'label' => esc_html__( 'Button Text', 'xgenious' ),
                        'type' => \Elementor\Controls_Manager::TEXT,
                        'default' => esc_html__( 'Purchase Order', 'xgenious' ),
                        'placeholder' => esc_html__( 'Type your text here', 'xgenious' ),
                    ],
                    [
                        'name' => 'button_link',
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
                ],
            ]
        );

        $this->end_controls_section();

    }

	protected function render() {
        $settings = $this->get_settings_for_display();
		?>
        <div class="choose-plan pt-60 pb-120">
            <div class="container">
                <h2 class="report-second-heading-large"><?php printf( esc_html__( '%s', 'xgenious' ), esc_html( $settings['title'] ) ); ?></h2>
                <div class="plans">
                    <div class="row g-4">
                        <?php
                        if ( $settings['list'] ) :
                            foreach ( $settings['list'] as $item ) :
                        ?>
                        <div class="col-md-4">
                            <div class="single-plan <?php if ( 'yes' === $item['make_active'] ) echo esc_attr( 'active' ); ?>">
                                <div class="plan-head">
                                    <h4 class="plan-name report-fourth-heading"><?php printf( esc_html__( '%s', 'xgenious' ), esc_html( $item['title'] ) ); ?></h4>
                                    <p><?php printf( esc_html__( '%s', 'xgenious' ), esc_html( $item['sub_title'] ) ); ?></p>
                                    <div class="price"><span><?php printf( esc_html__( '%s', 'xgenious' ), esc_html( $item['price_amount'] ) ); ?></span><?php printf( esc_html__( '%s', 'xgenious' ), esc_html( $item['price_per_month'] ) ); ?></div>
                                </div>
                                <div class="plan-body">
                                    <?php
                                    $allowed_html = [
                                        'ul' => [],
                                        'li' => [
                                                'class' => [],
                                        ],
                                    ];

                                    echo wp_kses( $item['all_features'], $allowed_html );

                                    $button_link = ! empty( $item['button_link']['url'] ) ? $item['button_link']['url'] : '';
                                    ?>
                                    <div class="plan-btn">
                                        <?php if ( ! empty( $item['button_text'] ) ) : ?>
                                        <a href="<?php echo esc_url( $button_link ); ?>" class="report-cmn-btn report-transparent-btn w-100 text-center"><?php printf( esc_html__( '%s', 'xgenious' ), esc_html( $item['button_text'] ) ); ?></a>
                                        <?php endif; ?>
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

\Elementor\Plugin::instance()->widgets_manager->register( new Xgenious_Choose_Plan_Addon() );