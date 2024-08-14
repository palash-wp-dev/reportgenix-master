<?php 
class Xgenious_All_Blog_Addon extends \Elementor\Widget_Base {

	public function get_name() {
		return 'reportgenix_all_blog_addon';
	}

	public function get_title() {
		return esc_html__( 'All Blog', 'xgenious' );
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
            'number_of_posts',
            [
                'label' => esc_html__( 'Number of Posts', 'xgenious' ),
                'type' => \Elementor\Controls_Manager::NUMBER,
                'min' => -1,
                'max' => 100,
                'step' => 1,
                'default' => -1
            ]
        );

        $this->add_control(
            'load_more_text',
            [
                'label' => esc_html__( 'Load More Text', 'xgenious' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__( 'Load More', 'xgenious' ),
                'placeholder' => esc_html__( 'Type your text here', 'xgenious' ),
            ]
        );

        $this->add_control(
            'show_date',
            [
                'label' => esc_html__( 'Show Date', 'xgenious' ),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => esc_html__( 'Show', 'xgenious' ),
                'label_off' => esc_html__( 'Hide', 'xgenious' ),
                'return_value' => 'yes',
                'default' => 'yes',
            ]
        );

        $this->add_control(
            'show_comments',
            [
                'label' => esc_html__( 'Show Comments', 'xgenious' ),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => esc_html__( 'Show', 'xgenious' ),
                'label_off' => esc_html__( 'Hide', 'xgenious' ),
                'return_value' => 'yes',
                'default' => 'yes',
            ]
        );

        $this->end_controls_section();

    }

	protected function render() {
        $settings = $this->get_settings_for_display();

        $args = [
            'post_type' => 'post',
            'posts_per_page' => $settings['number_of_posts'],
        ];
		?>
        <div class="reportgenix-all-blog pt-120 pb-60">
            <div class="container">
                <div class="blog-slide-outer">
                    <div class="blog-slider-btn"></div>
                </div>
                <div class="blog-buttons">
                    <button class="blog-filter active" data-filter="*"><?php esc_html_e( 'All Blog', 'xgenious' ); ?></button>
                    <?php
                    $query = new \WP_Query( $args );
                    if ( $query->have_posts() ) :
                        while ( $query->have_posts() ) :
                            $query->the_post();

                            $categories = get_the_category();

                            if ( $categories ) {

                                foreach ( $categories as $category ) {
                                    echo '<button class="blog-filter" data-filter=".profit">' . $category->name . '</button>';
                                }
                            }
                            ?>
                    <?php endwhile; endif; ?>
                </div>
                <div class="all-blog-wraper">
                    <div class="blog-items">
                        <?php
                        $query = new \WP_Query( $args );
                        if ( $query->have_posts() ) :
                            while ( $query->have_posts() ) :
                                $query->the_post();

                                $categories = get_the_category();
                                $all_categories = '';

                                if ( $categories ) {

                                    foreach ( $categories as $category ) {
                                        $all_categories .=  $category->name . ' ';
                                    }
                                }
                        ?>
                        <div class="single-blog-wraper <?php echo $all_categories; ?>">
                            <div class="single-blog">
                                <div class="blog-head">
                                    <img src="<?php echo plugins_url('../../../../assets/images/reportgenix/blog01.png',__FILE__)?>" alt="blog-head-img">
                                </div>
                                <div class="blog-body">
                                    <div class="body-top">
                                        <div class="dates">
                                            <span class="date">
                                                <?php
                                                if ( 'yes' === $settings['show_date'] )
                                                    echo get_the_date( 'd M Y' );
                                                ?>
                                            </span>
                                        </div>
                                        <div class="comments">
                                            <span class="comment">
                                                <?php
                                                if ( 'yes' === $settings['show_comments'] ) {
                                                    echo get_comments_number();
                                                    $comments_text = 0 === get_comments_number() ? ' COMMENT' : ' COMMENTS';
                                                    printf(esc_html__('%s', 'xgenious'), esc_html($comments_text));
                                                }
                                                ?>
                                            </span>
                                        </div>
                                    </div>
                                    <h3 class="blog-heading report-third-heading">
                                        <?php the_title(); ?>
                                    </h3>
                                    <div class="blog-foot">
                                        <?php if ( ! empty( $settings['load_more_text'] ) ) : ?>
                                        <a href="<?php the_permalink(); ?>" class="load-more-btn">
                                            <span><?php printf( esc_html__( '%s', 'xgenious' ), esc_html( $settings['load_more_text'] ) ); ?></span>
                                            <i class="fa-solid fa-arrow-right"></i>
                                        </a>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php  endwhile; endif; ?>
                    </div>
                </div>
            </div>
        </div>
		<?php
	}
}

\Elementor\Plugin::instance()->widgets_manager->register( new Xgenious_All_Blog_Addon() );