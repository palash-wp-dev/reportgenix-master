<?php 
class Xgenious_Product_Analytics_Addon extends \Elementor\Widget_Base {

	public function get_name() {
		return 'reportgenix_product_analytics_addon';
	}

	public function get_title() {
		return esc_html__( 'Product Analytics', 'elementor-addon' );
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
                'default' => esc_html__( 'Customer Analytics How important are your Customers?', 'xgenious' ),
                'placeholder' => esc_html__( 'Type your title here', 'xgenious' ),
            ]
        );

        $this->add_control(
            'left_img',
            [
                'label' => esc_html__( 'Left Image', 'xgenious' ),
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
                    [
                        'name' => 'description',
                        'label' => esc_html__( 'Description', 'xgenious' ),
                        'type' => \Elementor\Controls_Manager::TEXTAREA,
                        'default' => esc_html__( 'Refers to the capability of monitoring and assessing Financial performance, specifically focusing' , 'xgenious' ),
                        'label_block' => true,
                    ],
                ],
            ]
        );

        $this->end_controls_section();

    }

	protected function render() {
        $settings = $this->get_settings_for_display();

        $left_img = ! empty( $settings['left_img']['url'] ) ? $settings['left_img']['url'] : '';

        $allowed_html = [
            'br' => [],
            'span' => [
                'class' => []
            ]
        ];
		?>
        <div class="product-analytics pt-60 pb-60">
            <div class="container">
                <div class="report-analytics-wraper">
                    <div class="row g-5">
                        <div class="col-lg-7 pe-lg-5">
                            <div class="image">
                                <img src="<?php echo esc_url( $left_img ); ?>" alt="Profile Analytics">
                            </div>
                        </div>
                        <div class="col-lg-5 px-lg-0">
                            <h2 class="report-second-heading mb-40"><?php echo wp_kses( $settings['title'], $allowed_html ); ?></h2>
                            <div class="accordians" id="productaccordion">
                                <?php if ( $settings['list'] ) : foreach ( $settings['list'] as $item ) : ?>
                                <div class="accordian-items">
                                    <h3 class="report-third-heading collapsed" data-bs-toggle="collapse" data-bs-target="#collapseOne">
                                        <?php printf( esc_html__( '%s', 'xgenious' ), esc_html( $item['title'] ) ); ?>
                                    </h3>
                                    <div class="accordion-collapse collapse" id="collapseOne" data-bs-parent="#productaccordion">
                                        <p> <?php printf( esc_html__( '%s', 'xgenious' ), esc_html( $item['description'] ) ); ?></p>
                                    </div>
                                </div>
                                <?php endforeach; endif; ?>
                            </div>
                        </div> 
                    </div>               
                </div>
            </div>
        </div>
		<?php
	}
}

\Elementor\Plugin::instance()->widgets_manager->register( new Xgenious_Product_Analytics_Addon() );