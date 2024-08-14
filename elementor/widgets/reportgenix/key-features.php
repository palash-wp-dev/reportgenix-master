<?php 
class Xgenious_Key_Features_Addon extends \Elementor\Widget_Base {

	public function get_name() {
		return 'reportgenix_key_features_addon';
	}

	public function get_title() {
		return esc_html__( 'Key Features', 'elementor-addon' );
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
                'default' => esc_html__( 'Key Features', 'xgenious' ),
                'placeholder' => esc_html__( 'Type your title here', 'xgenious' ),
            ]
        );

        $this->add_control(
            'description',
            [
                'label' => esc_html__( 'Description', 'xgenious' ),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'default' => esc_html__( 'Getting a data analytics report involves a systematic process of collecting, preparing, analyzing, and presenting data to uncover', 'xgenious' ),
                'placeholder' => esc_html__( 'Type your description here', 'xgenious' ),
            ]
        );

        $this->add_control(
            'list',
            [
                'label' => esc_html__( 'Repeater List', 'textdomain' ),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => [
                    [
                        'name' => 'list_title',
                        'label' => esc_html__( 'Title', 'textdomain' ),
                        'type' => \Elementor\Controls_Manager::TEXT,
                        'default' => esc_html__( 'Data visualizations' , 'textdomain' ),
                        'label_block' => true,
                    ],
                    [
                        'name' => 'list_content',
                        'label' => esc_html__( 'Content', 'textdomain' ),
                        'type' => \Elementor\Controls_Manager::TEXTAREA,
                        'default' => esc_html__( 'Integration of machine learning algorithms allows Systems to learn from data and improve their' , 'textdomain' ),
                        'show_label' => false,
                    ],
                    [
                        'name' => 'list_bg_img',
                        'label' => esc_html__( 'Background Image', 'xgenious' ),
                        'type' => \Elementor\Controls_Manager::MEDIA,
                        'default' => [
                            'url' => \Elementor\Utils::get_placeholder_image_src(),
                        ],
                    ],
                    [
                        'name' => 'list_content_img',
                        'label' => esc_html__( 'Content Image', 'xgenious' ),
                        'type' => \Elementor\Controls_Manager::MEDIA,
                        'default' => [
                            'url' => \Elementor\Utils::get_placeholder_image_src(),
                        ],
                    ],
                ],
            ]
        );

        $this->end_controls_section();

    }

	protected function render() {
        $settings = $this->get_settings_for_display();
		?>
        <div class="data-report report-key-features pt-60 pb-120">
            <div class="container">
                <h2 class="report-second-heading-large"><?php printf( esc_html__( '%s', 'xgenious' ), esc_html( $settings['title'] ) )?></h2>
                <p class="head-text"><?php printf( esc_html__( '%s', 'xgenious' ), esc_html( $settings['description'] ) )?></p>
                <div class="data-report-cards">
                    <div class="data-report-card-inner">
                        <?php
                        if ( $settings['list'] ) : foreach ( $settings['list'] as $item ) :
                            $list_bg_img = ! empty( $item['list_bg_img']['url'] ) ? $item['list_bg_img']['url'] : '';
                            $list_content_img = ! empty( $item['list_content_img']['url'] ) ? $item['list_content_img']['url'] : '';
                        ?>
                        <div class="single-card-item" style="background-image:url('<?php echo esc_url( $list_bg_img ); ?>')">
                            <div class="key-card-head">
                                <h4 class="report-fourth-heading"><?php printf( esc_html__( '%s', 'xgenious' ), esc_html( $item['list_title'] ) ); ?></h4>
                                <p class="text"><?php printf( esc_html__( '%s', 'xgenious' ), esc_html( $item['list_content'] ) ); ?> </p>
                            </div>
                            <div class="key-card-body">
                                <div class="image">
                                    <img src="<?php echo esc_url( $list_content_img ); ?>" alt="Visualization">
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

\Elementor\Plugin::instance()->widgets_manager->register( new Xgenious_Key_Features_Addon() );