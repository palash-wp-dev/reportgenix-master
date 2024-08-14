<?php
/**
 * Elementor Widget
 * @package Appside
 * @since 1.0.0
 */

namespace Elementor;
class Xgenious_Product_Grid_Features_One_Widget extends Widget_Base {

    /**
     * Get widget name.
     *
     * Retrieve Elementor widget name.
     *
     * @return string Widget name.
     * @since 1.0.0
     * @access public
     *
     */
    public function get_name() {
        return 'xgenious-product-grid-features---one-widget';
    }

    /**
     * Get widget title.
     *
     * Retrieve Elementor widget title.
     *
     * @return string Widget title.
     * @since 1.0.0
     * @access public
     *
     */
    public function get_title() {
        return esc_html__( '[new] Features Product', 'xgenious-master' );
    }

    /**
     * Get widget icon.
     *
     * Retrieve Elementor widget icon.
     *
     * @return string Widget icon.
     * @since 1.0.0
     * @access public
     *
     */
    public function get_icon() {
        return ' eicon-image-box';
    }

    /**
     * Get widget categories.
     *
     * Retrieve the list of categories the Elementor widget belongs to.
     *
     * @return array Widget categories.
     * @since 1.0.0
     * @access public
     *
     */
    public function get_categories() {
        return [ 'xgenious_widgets' ];
    }

    /**
     * Register Elementor widget controls.
     *
     * Adds different input fields to allow the user to change and customize the widget settings.
     *
     * @since 1.0.0
     * @access protected
     */
    protected function register_controls() {

        $this->start_controls_section(
            'settings_section',
            [
                'label' => esc_html__( 'General Settings', 'xgenious-master' ),
                'tab'   => Controls_Manager::TAB_CONTENT,
            ]
        );
        $this->add_control( 'title', [
            'type'    => Controls_Manager::TEXTAREA,
            'label'   => esc_html__( 'Title', 'xgenious-master' ),
            'description' => esc_html__('use {c}color with anchor{/c} , use {b}break into new line{/b}')
        ] );
        $this->add_control( 'btn_text', [
            'type'    => Controls_Manager::TEXT,
            'label'   => esc_html__( 'Btn Text', 'xgenious-master' ),
            'default' => __('View All Product','xgenious')
        ] );
        $this->add_control( 'btn_link', [
            'type'    => Controls_Manager::URL,
            'label'   => esc_html__( 'Btn Link', 'xgenious-master' )
        ] );

        $this->add_control( 'description', [
            'type'    => Controls_Manager::TEXTAREA,
            'label'   => esc_html__( 'Description', 'xgenious-master' ),
        ] );
        $this->add_control(
            'section_bottom_margin',
            [
                'label' => esc_html__( 'Section Bottom Margin', 'plugin-name' ),
                'type' => \Elementor\Controls_Manager::SLIDER,
                'size_units' => [ 'px' ],
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 200,
                        'step' => 5,
                    ]
                ],
                'default' => [
                    'unit' => 'px',
                    'size' => 50,
                ],
                'selectors' => [
                    '{{WRAPPER}} .section-title .section-para' => 'margin-bottom: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->add_control( 'column', [
            'label'       => esc_html__( 'Column', 'xgenious-master' ),
            'type'        => Controls_Manager::SELECT,
            'options' => [
                '6' => esc_html__('02 Column','xgenious-master'),
                '4' => esc_html__('03 Column','xgenious-master'),
                '3' => esc_html__('04 Column','xgenious-master'),
            ],
            'default'     => '4',
            'description' => esc_html__( 'select column' )
        ] );
        $this->add_control( 'total', [
            'label'       => esc_html__( 'Total Posts', 'xgenious-master' ),
            'type'        => Controls_Manager::TEXT,
            'default'     => '-1',
            'description' => esc_html__( 'enter how many post you want in masonry , enter -1 for unlimited post.' ),
            'condition' => ['product_by_id' => 'no']
        ] );
        $this->add_control('product_by_id',[
            'label'       => esc_html__( 'Product By ID', 'xgenious-master' ),
            'type'        => Controls_Manager::SWITCHER,
            'default' => 'no'
        ]);
        $this->add_control( 'post__in', [
            'label'       => esc_html__( 'Post In', 'xgenious-master' ),
            'type'        => Controls_Manager::SELECT2,
            'options'     => Xgenious()->get_post_type_list( 'download', 'id' ),
            'multiple' => true,
            'condition' => ['product_by_id' => 'yes']
        ] );
        $this->add_control( 'category', [
            'label'       => esc_html__( 'Category', 'xgenious-master' ),
            'type'        => Controls_Manager::SELECT2,
            'options'     => Xgenious()->get_terms_names( 'download_category', 'id' ),
            'multiple' => true,
            'condition' => ['product_by_id' => 'no']
        ] );
        $this->add_control( 'order', [
            'label'       => esc_html__( 'Order', 'xgenious-master' ),
            'type'        => Controls_Manager::SELECT,
            'options'     => array(
                'ASC'  => esc_html__( 'Ascending', 'xgenious-master' ),
                'DESC' => esc_html__( 'Descending', 'xgenious-master' ),
            ),
            'default'     => 'ASC',
            'description' => esc_html__( 'select order', 'xgenious-master' )
        ] );
        $this->add_control( 'orderby', [
            'label'       => esc_html__( 'OrderBy', 'xgenious-master' ),
            'type'        => Controls_Manager::SELECT,
            'options'     => array(
                'ID'            => esc_html__( 'ID', 'xgenious-master' ),
                'title'         => esc_html__( 'Title', 'xgenious-master' ),
                'date'          => esc_html__( 'Date', 'xgenious-master' ),
                'rand'          => esc_html__( 'Random', 'xgenious-master' ),
                'comment_count' => esc_html__( 'Most Comments', 'xgenious-master' ),
            ),
            'default'     => 'ID',
            'description' => esc_html__( 'select order', 'xgenious-master' )
        ] );
        $this->end_controls_section();


    }

    /**
     * Render Elementor widget output on the frontend.
     * Written in PHP and used to generate the final HTML.
     *
     * @since 1.0.0
     * @access protected
     */
    protected function render() {
        $settings             = $this->get_settings_for_display();
        //query settings
        $post__in = $settings['post__in'];
        $total_posts = $settings['total'];
        $category    = $settings['category'];
        $order       = $settings['order'];
        $orderby     = $settings['orderby'];

        //setup query
        $args = array(
            'post_type' => 'download',
            'posts_per_page' => $total_posts,
            'order' => $order,
            'orderby' => $orderby,
            'post_status' => 'publish',
            'ignore_sticky_posts' => 1,
        );

        if (!empty($category) && !empty($settings['product_by_id'])) {
            $args['tax_query'] = array(
                array(
                    'taxonomy' => 'download_category',
                    'field' => 'term_id',
                    'terms' => $category
                )
            );
        }
        if (!empty($post__in)) {
            $args['post__in'] = $post__in;
            unset($args['posts_per_page']);
            unset($args['order']);
            unset($args['orderby']);
        }


        $post_data = new \WP_Query($args);
        ?>
        <div class="product-grid-wrapper __features">
            <div class="container container_1430">
                <div class="row">
                    <div class="col-lg-4">
                        <div class="section-title">
                            <h2 class="title"> <?php echo esc_html($settings['title']);?> </h2>
                            <p class="section-para margin-bottom-80"><?php echo esc_html($settings['description']);?>  </p>
                            <div class="btn-wrapper">
                                <a href="<?php echo esc_url($settings['btn_link']['url'])?>" class="btn-default portfolio"><?php echo esc_html($settings['btn_text'])?></a>
                            </div>
                        </div>
                    </div>
                    <?php
                    while ($post_data->have_posts()):$post_data->the_post();
                        $xgenious = Xgenious();
                        $img_id = get_post_thumbnail_id(get_the_ID()) ? get_post_thumbnail_id(get_the_ID()) : false ;
                        $img_url_val = $img_id ? wp_get_attachment_image_src($img_id,'xgenious_product',false) : '';
                        $img_url = is_array($img_url_val) && !empty($img_url_val) ? $img_url_val[0] : '';
                        $img_alt =  $img_id ? get_post_meta($img_id,'_wp_attachment_image_alt',true) : '';

                        $terms = get_the_terms( get_the_ID(), 'download_category' );
                        $taxonomy_markup = '';
                        if(!empty($terms)){
                            foreach($terms as $term){
                                $meta = get_term_meta( $term->term_id, 'xgenious_taxonomy_options', true );
                                if(!empty($meta['category_image'])){
                                    $taxonomy_markup .= sprintf(' <a href="%1$s" class="single-wordpress-theme-logo"><img src="%2$s" alt="%3$s"></a>',
                                        get_term_link($term->term_id,'download_category'),
                                        esc_url($meta['category_image']['url']),
                                        esc_url($meta['category_image']['title'])
                                    );
                                }
                            }
                        }
                        ?>
                        <div class="col-lg-<?php echo esc_attr($settings['column'])?> col-md-6">

                            <article id="post-<?php the_ID(); ?>" <?php post_class('single-wordpress-theme section-bg theme-padding radius-10'); ?>>
                                <div class="single-wordpress-theme-thumb">
                                    <a href="<?php the_permalink();?>"> <img src="<?php echo esc_url($img_url);?>" alt="<?php echo esc_attr($img_alt);?>"></a>
                                    <?php echo wp_kses_post($taxonomy_markup);?>
                                </div>
                                <div class="single-wordpress-theme-contents mt-4">
                                    <div class="info_wrap">
                                        <span class="sales__wrap">
                                            <strong><?php echo esc_html(edd_get_download_sales_stats( get_the_ID() ))?></strong> Sales
                                        </span>
                                        <span class="rating__wrap">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="45" height="42" viewBox="0 0 45 42" fill="none"><path d="M44.183 16.0498H27.3031L22.1069 0L16.8799 16.0498L0 16.019L13.6515 25.9502L8.4246 42L22.0761 32.0688L35.7277 42L30.5315 25.9502L44.183 16.0498Z" fill="#f9bf00"></path></svg>
                                        <svg xmlns="http://www.w3.org/2000/svg" width="45" height="42" viewBox="0 0 45 42" fill="none"><path d="M44.183 16.0498H27.3031L22.1069 0L16.8799 16.0498L0 16.019L13.6515 25.9502L8.4246 42L22.0761 32.0688L35.7277 42L30.5315 25.9502L44.183 16.0498Z" fill="#f9bf00"></path></svg>
                                        <svg xmlns="http://www.w3.org/2000/svg" width="45" height="42" viewBox="0 0 45 42" fill="none"><path d="M44.183 16.0498H27.3031L22.1069 0L16.8799 16.0498L0 16.019L13.6515 25.9502L8.4246 42L22.0761 32.0688L35.7277 42L30.5315 25.9502L44.183 16.0498Z" fill="#f9bf00"></path></svg>
                                        <svg xmlns="http://www.w3.org/2000/svg" width="45" height="42" viewBox="0 0 45 42" fill="none"><path d="M44.183 16.0498H27.3031L22.1069 0L16.8799 16.0498L0 16.019L13.6515 25.9502L8.4246 42L22.0761 32.0688L35.7277 42L30.5315 25.9502L44.183 16.0498Z" fill="#f9bf00"></path></svg>
                                        <svg xmlns="http://www.w3.org/2000/svg" width="45" height="42" viewBox="0 0 45 42" fill="none"><path d="M44.183 16.0498H27.3031L22.1069 0L16.8799 16.0498L0 16.019L13.6515 25.9502L8.4246 42L22.0761 32.0688L35.7277 42L30.5315 25.9502L44.183 16.0498Z" fill="#f9bf00"></path></svg>
                                        </span>
                                    </div>
                                    <h3 class="single-wordpress-theme-contents-title"> <a href="<?php the_permalink();?>"> <?php the_title();?> </a> </h3>
                                </div>
                            </article><!-- #post-<?php the_ID(); ?> -->
                        </div>
                    <?php
                    endwhile;
                    wp_reset_query();
                    ?>
                </div>
            </div>
        </div>
        <?php
    }
}

Plugin::instance()->widgets_manager->register( new Xgenious_Product_Grid_Features_One_Widget() );
