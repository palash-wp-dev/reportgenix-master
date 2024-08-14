<?php
/**
 * Elementor Widget
 * @package Appside
 * @since 1.0.0
 */

namespace Elementor;
class Xgenious_Black_Friday_Product_List_One extends Widget_Base {

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
        return 'xgenious-black-friday-product-list-one-widget';
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
        return esc_html__( 'Black Friday: Product List 01', 'xgenious-master' );
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
        return 'eicon-editor-list-ul';
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
		] );
		$this->add_control('preview_icon',[
			'type' => Controls_Manager::ICONS,
			'label' => esc_html__('Preview Icon','xgenious-master')
		]);
		$this->add_control('shopping_icon',[
			'type' => Controls_Manager::ICONS,
			'label' => esc_html__('Shopping Icon','xgenious-master')
		]);
		$this->end_controls_section();
		
		$this->start_controls_section(
            'product_listsettings_section',
            [
                'label' => esc_html__( 'Product List', 'xgenious-master' ),
                'tab'   => Controls_Manager::TAB_CONTENT,
            ]
        );
        
        $repeater = new Repeater();
		$repeater->add_control('product_url',[
			'label'       => esc_html__( 'Product URL', 'xgenious-master' ),
			'type'        => Controls_Manager::URL,
			'label_block' => true
		]);	
		$repeater->add_control('purchase_url',[
			'label'       => esc_html__( 'Purcahse URL', 'xgenious-master' ),
			'type'        => Controls_Manager::URL,
			'label_block' => true
		]);
	
		$repeater->add_control('image',[
			'label'       => esc_html__( 'Image', 'xgenious-master' ),
			'type'        => Controls_Manager::MEDIA,
		]);
		
		$repeater->add_control('title',[
			'label'       => esc_html__( 'Title', 'xgenious-master' ),
			'type'        => Controls_Manager::TEXTAREA,
			'description' => esc_html__( 'enter title', 'xgenious-master' ),
		]);
		$repeater->add_control('subtitle',[
			'label'       => esc_html__( 'Subtitle', 'xgenious-master' ),
			'type'        => Controls_Manager::TEXTAREA,
			'description' => esc_html__( 'enter subtitle', 'xgenious-master' ),
		]);
		$repeater->add_control('offer_text',[
			'label'       => esc_html__( 'Offer Text', 'xgenious-master' ),
			'type'        => Controls_Manager::TEXTAREA,
			'description' => esc_html__( 'enter offer text', 'xgenious-master' ),
		]);
			$repeater->add_control('offer_end',[
			'label'       => esc_html__( 'Offer End Text', 'xgenious-master' ),
			'type'        => Controls_Manager::TEXTAREA,
			'description' => esc_html__( 'enter offer end text', 'xgenious-master' ),
		]);
		
		$this->add_control('product_list_items',[
			'label'       => esc_html__( 'Product List', 'xgenious-master' ),
			'type'        => Controls_Manager::REPEATER,
			'fields' => $repeater->get_controls()
		]);
        
        $this->end_controls_section();

    }

    /**
     * Render Elementor widget output on the frontend.
     *
     * Written in PHP and used to generate the final HTML.
     *
     * @since 1.0.0
     * @access protected
     */
    protected function render() {
        $settings = $this->get_settings_for_display();
        $product_list_items = $settings['product_list_items'];
        ?>
        <section class="theme_area padding-top-100 padding-bottom-50">
        <div class="container">
            <div class="section_title center-text">
                <h2 class="title"><?php echo esc_html($settings['title']);?></h2>
            </div>
            <div class="row g-4 mt-4">
                 <?php
                foreach ( $product_list_items as $item ):
                   ?>
                <div class="col-lg-4 col-md-6 wow fadeInDown" data-wow-delay=".2s" >
                    <div class="single_theme single_theme__margin">
                        <div class="single_theme__thumb">
                            <a href="<?php echo esc_url($item['product_url']['url'] ?? '')?>">
                                <?php 
        							$right_image = $item['image']['id'] ?? '';
        							$right_image_url = '';
        							$right_image_alt= '';
        							
        							if(!empty($right_image)){
        								$image_src = wp_get_attachment_image_src($right_image,'full',true);
        								$right_image_url =  is_array($image_src) ? current($image_src) : '';
        								$right_image_alt= get_post_meta($right_image,'_wp_attachment_image_alt',true);
        								printf('<img src="%1$s" alt="%2$s">',$right_image_url,$right_image_alt);
        							}
							    ?>
                            </a>
                        </div>
                        <div class="single_theme__contents mt-3">
                            <h4 class="single_theme__title">
                                <a href="j<?php echo esc_url($item['product_url']['url'] ?? '')?>">
                                    <?php echo esc_html($item['title']);?>
                                </a>
                            </h4>
                            <p class="single_theme__para mt-2"><?php echo esc_html($item['subtitle']);?></p>
                        </div>
                        <div class="single_theme__footer">
                            <div class="single_theme__footer__flex">
                                <div class="single_theme__footer__left">
                                    <h4 class="single_theme__footer__title color-two"><?php echo esc_html($item['offer_text']);?></h4>
                                    <p class="single_theme__footer__date mt-2"><?php echo esc_html($item['offer_end']);?></p>
                                </div>
                                <div class="single_theme__footer__right">
                                    <a href="<?php echo esc_url($item['product_url']['url'] ?? '')?>" class="single_theme__footer__icon">
                                       <?php \Elementor\Icons_Manager::render_icon( $settings['preview_icon'], [ 'aria-hidden' => 'true' ] ); ?>
                                    </a>
                                    <a href="<?php echo esc_url($item['purchase_url']['url'] ?? '')?>" class="single_theme__footer__icon">
                                        <?php \Elementor\Icons_Manager::render_icon( $settings['shopping_icon'], [ 'aria-hidden' => 'true' ] ); ?>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                 <?php endforeach; ?>
            </div>
        </div>
    </section>
        <?php
        
    }
}

Plugin::instance()->widgets_manager->register( new Xgenious_Black_Friday_Product_List_One() );