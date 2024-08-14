<?php 
class Xgenious_Banner_Addon extends \Elementor\Widget_Base {

	public function get_name() {
		return 'reportgenix_banner_addon';
	}

	public function get_title() {
		return esc_html__( 'Banner', 'xgenious' );
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
            'rating_text',
            [
                'label' => esc_html__( 'Rating Text', 'xgenious' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__( '5 Star Ratting At Shopify', 'xgenious' ),
                'placeholder' => esc_html__( 'Type your description here', 'xgenious' ),
            ]
        );

        $this->add_control(
            'rating',
            [
                'label' => esc_html__( 'Rating', 'xgenious' ),
                'type' => \Elementor\Controls_Manager::NUMBER,
                'min' => 0,
                'max' => 5,
                'step' => 0.5,
                'default' => 5,
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
            'button_one',
            [
                'label' => esc_html__( 'Button One Text', 'xgenious' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__( 'Start Free Trial', 'xgenious' ),
                'placeholder' => esc_html__( 'Type your description here', 'xgenious' ),
            ]
        );
        $this->add_control(
            'button_one_link',
            [
                'label' => esc_html__( 'Button One Link', 'xgenious' ),
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
            'button_two',
            [
                'label' => esc_html__( 'Button Two Text', 'xgenious' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__( 'Start Free Trial', 'xgenious' ),
                'placeholder' => esc_html__( 'Type your description here', 'xgenious' ),
            ]
        );
        $this->add_control(
            'button_two_link',
            [
                'label' => esc_html__( 'Button Two Link', 'xgenious' ),
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
            'banner_img_one',
            [
                'label' => esc_html__( 'Banner Image One', 'xgenious' ),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ]
        );
        $this->add_control(
            'banner_img_two',
            [
                'label' => esc_html__( 'Banner Image Two', 'xgenious' ),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ]
        );
        $this->add_control(
            'banner_img_three',
            [
                'label' => esc_html__( 'Banner Image Three', 'xgenious' ),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ]
        );
        $this->add_control(
            'banner_img_four',
            [
                'label' => esc_html__( 'Banner Image Four', 'xgenious' ),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ]
        );

        $this->end_controls_section();

    }

    /**
     * Function to create star rating
     *
     * @since 1.0.0
     * @access protected
     */
    private function starRating( $rating, $echo = true ) {
        $starRating = '';
        $j = 0;
        for( $i = 0; $i <= 4; $i++ ) {
            $j++;
            if( $rating  >= $j   || $rating  == '5'   ) {
                $starRating .= '<span class="rating-icon"><i class="fa-solid fa-star"></i></span>';
            }
            elseif( $rating < $j && $rating  > $i ) {
                $starRating .= '<span class="rating-icon"><i class="fa-solid fa-star-half-alt"></i></span>';
            }
        }
        if( $echo == true ) {
            echo $starRating;
        } else {
            return $starRating;
        }
    }

	protected function render() {
        $settings = $this->get_settings_for_display();
		?>
        <div class="reportgenix-banner-part" style="background-image: url('<?php echo esc_url( $settings['bg_image']['url'] ); ?>')">
            <div class="container">
                <div class="shopify-rating text-center">
                    <?php
                    // display the star rating
                    $rating = $settings['rating'];
                    $echo = true;
                    $this->starRating( $rating, $echo )
                    ?>
                    <span class="ms-2"><?php printf( esc_html__( '%s', 'xgenious' ), esc_html( $settings['rating_text'] ) )?></span>
                </div>
                <h1 class="main-heading">
                    <?php
                    $allowed_html = [
                      'br' => [],
                    ];
                    echo wp_kses( $settings['title'], $allowed_html );
                    ?>
                </h1>
                <div class="banner-btn text-center">
                    <?php if( ! empty( $settings['button_one'] ) ) : ?>
                    <a href="<?php echo esc_url( $settings['button_one_link']['url'] ); ?>" class="report-cmn-btn blue-btn"><?php printf( esc_html__( '%s', 'xgenioius' ), esc_html( $settings['button_one'] ) ); ?> <i class="fa-solid fa-arrow-right"></i></a>
                    <?php endif; ?>

                    <?php if( ! empty( $settings['button_two'] ) ) : ?>
                    <a href="<?php echo esc_url( $settings['button_two_link']['url'] ); ?>" class="report-cmn-btn transparent-btn-blue"> <?php printf( esc_html__( '%s', 'xgenioius' ), esc_html( $settings['button_two'] ) ); ?>
                        <img src="<?php echo plugins_url( '../../../assets/images/reportgenix/shopify-bag.png', __FILE__ )?>" alt="shopify-bag">
                    </a>
                    <?php endif; ?>
                </div>
                <div class="banner-img-wraper pt-md-4 px-md-5 p-xl-0">
                    <div class="banner-img-main">
                        <img src="<?php echo esc_url( $settings['banner_img_one']['url'] ); ?>" alt="Banner image">
                    </div>
                    <div class="banner-animation bannaer-animation-image1 ">
                        <img src="<?php echo esc_url( $settings['banner_img_two']['url'] ); ?>" alt="banner1">
                    </div>
                    <div class="banner-animation bannaer-animation-image2">
                        <img src="<?php echo esc_url( $settings['banner_img_three']['url'] ); ?>" alt="banner1">
                    </div>
                    <div class="banner-animation bannaer-animation-image3">
                        <img src="<?php echo esc_url( $settings['banner_img_four']['url'] ); ?>" alt="banner1">
                    </div>
                </div>
            </div>
        </div>
		<?php
	}
}

\Elementor\Plugin::instance()->widgets_manager->register( new Xgenious_Banner_Addon() );