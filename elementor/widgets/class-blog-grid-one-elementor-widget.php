<?php
/**
 * Elementor Widget
 * @package Appside
 * @since 1.0.0
 */

namespace Elementor;
class Xgenious_Blog_Grid_One_Widget extends Widget_Base {

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
		return 'xgenious-blog-grid-one-widget';
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
		return esc_html__( 'Blog Post Grid', 'xgenious-master' );
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
			'section_settings_section',
			[
				'label' => esc_html__( 'General Settings', 'xgenious-master' ),
				'tab'   => Controls_Manager::TAB_CONTENT,
			]
		);
		$this->add_control('section_title', [
			'label' => esc_html__('Section Title', 'additrans-master'),
			'type' => Controls_Manager::TEXT,
			'label_block' => true,
			'default' => esc_html__('Latest Blog','xgenious-master'),
		]);	
		$this->add_control('description', [
			'label' => esc_html__('Section Description', 'additrans-master'),
			'type' => Controls_Manager::TEXTAREA,
			'label_block' => true,
			'default' => esc_html__('description','xgenious-master'),
		]);
        $this->end_controls_section();
        $this->start_controls_section(
			'settings_section',
			[
				'label' => esc_html__( 'General Settings', 'xgenious-master' ),
				'tab'   => Controls_Manager::TAB_CONTENT,
			]
		);

        $this->add_control('total', [
			'label' => esc_html__('Total Posts', 'additrans-master'),
			'type' => Controls_Manager::TEXT,
			'default' => '-1',
			'description' => esc_html__('enter how many post you want in masonry , enter -1 for unlimited post.')
		]);
		$this->add_control('category', [
			'label' => esc_html__('Category', 'additrans-master'),
			'type' => Controls_Manager::SELECT2,
			'multiple' => true,
			'options' => Xgenious()->get_terms_names('category', 'id'),
			'description' => esc_html__('select category as you want, leave it blank for all category', 'additrans-master'),
		]);
		$this->add_control('order', [
			'label' => esc_html__('Order', 'additrans-master'),
			'type' => Controls_Manager::SELECT,
			'options' => array(
				'ASC' => esc_html__('Ascending', 'additrans-master'),
				'DESC' => esc_html__('Descending', 'additrans-master'),
			),
			'default' => 'ASC',
			'description' => esc_html__('select order', 'additrans-master')
		]);
		$this->add_control('orderby', [
			'label' => esc_html__('OrderBy', 'additrans-master'),
			'type' => Controls_Manager::SELECT,
			'options' => array(
				'ID' => esc_html__('ID', 'additrans-master'),
				'title' => esc_html__('Title', 'additrans-master'),
				'date' => esc_html__('Date', 'additrans-master'),
				'rand' => esc_html__('Random', 'additrans-master'),
				'comment_count' => esc_html__('Most Comments', 'additrans-master'),
			),
			'default' => 'ID',
			'description' => esc_html__('select order', 'additrans-master')
		]);
		$this->add_control('excerpt_length', [
			'label' => esc_html__('Excerpt Length', 'additrans-master'),
			'type' => Controls_Manager::SELECT,
			'options' => array(
				25 => esc_html__('Short', 'additrans-master'),
				55 => esc_html__('Regular', 'additrans-master'),
				100 => esc_html__('Long', 'additrans-master'),
			),
			'default' => 25,
			'description' => esc_html__('select excerpt length', 'additrans-master')
		]);
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
		$total_posts = $settings['total'];
		$category = $settings['category'];
		$order = $settings['order'];
		$orderby = $settings['orderby'];

		//setup query
		//setup query
		$args = array(
			'post_type' => 'post',
			'posts_per_page' => $total_posts,
			'order' => $order,
			'orderby' => $orderby,
			'post_status' => 'publish',
			'ignore_sticky_posts' => 1,
		);

		if (!empty($category)) {
			$args['tax_query'] = array(
				array(
					'taxonomy' => 'category',
					'field' => 'term_id',
					'terms' => $category
				)
			);
		}
		$post_data = new \WP_Query($args);
		?>
        <section class="blog-area padding-top-60 padding-bottom-60">
            <div class="container container_1430">
                <div class="section-title ">
                    <h2 class="title"> <?php echo esc_html($settings['section_title'])?> </h2>
                    <p class="description"><?php echo esc_html($settings['description'])?></p>
                </div>
                <div class="row gy-4 mt-3">
	                <?php
	                while ($post_data->have_posts()):$post_data->the_post();
		                $xgenious = Xgenious();
		                $img_id = get_post_thumbnail_id(get_the_ID()) ? get_post_thumbnail_id(get_the_ID()) : false ;
		                $img_url_val = $img_id ? wp_get_attachment_image_src($img_id,'xgenious_product',false) : '';
		                $img_url = is_array($img_url_val) && !empty($img_url_val) ? $img_url_val[0] : '';
		                $img_alt =  $img_id ? get_post_meta($img_id,'_wp_attachment_image_alt',true) : '';

		                ?>
                        <div class="col-lg-4 col-sm-6">
                            <div class="single-blog">
                                <div class="single-blog-thumb">
                                    <a href="<?php the_permalink();?>"> <img src="<?php echo esc_url($img_url);?>" alt="<?php echo esc_attr($img_alt);?>"> </a>
                                </div>
                                <div class="single-blog-contents mt-4">
                                    <ul class="single-blog-contents-list list-style-none">
                                        <li class="single-blog-contents-list-item">
                                            <span class="single-blog-contents-list-item-span"> <?php echo get_the_date('d M y')?>  </span>
                                        </li>
                                        <li class="single-blog-contents-list-item">
                                            <span class="single-blog-contents-list-item-span"> <?php echo $xgenious->posted_by();?>  </span>
                                        </li>
                                    </ul>
                                    <h2 class="single-blog-contents-title mt-3"> <a href="<?php the_permalink();?>"> <?php the_title();?> </a> </h2>
                                    <!--<div class="description">-->
                                    <!--    <?php //xgenious_excerpt(55);?>-->
                                    <!--</div>-->
                                </div>
                            </div>
                        </div>
	                <?php
	                endwhile;
	                wp_reset_query();
	                ?>
                </div>
            </div>
        </section>
		<?php
	}
}

Plugin::instance()->widgets_manager->register( new Xgenious_Blog_Grid_One_Widget() );
