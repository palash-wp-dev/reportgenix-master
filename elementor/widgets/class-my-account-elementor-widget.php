<?php
/**
 * Elementor Widget
 * @package Appside
 * @since 1.0.0
 */

namespace Elementor;
class Xgenious_My_Account_One extends Widget_Base {

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
        return 'xgenious-my-account-one-widget';
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
        return esc_html__( 'My Account', 'xgenious-master' );
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
        $repeater = new Repeater();
		$repeater->add_control('title',[
			'label'       => esc_html__( 'Title', 'xgenious-master' ),
			'type'        => Controls_Manager::TEXT,
			'description' => esc_html__( 'enter title', 'xgenious-master' ),
			'label_block' => true
		]);
		$repeater->add_control('icon',[
			'label'       => esc_html__( 'Icon', 'xgenious-master' ),
			'type'        => Controls_Manager::ICONS,
			'label_block' => true
		]);
		$repeater->add_control('shortcode',[
			'label'       => esc_html__( 'Shortcode', 'xgenious-master' ),
			'type'        => Controls_Manager::TEXTAREA,
			'description' => esc_html__( 'enter shortcode', 'xgenious-master' ),
			'dynamic' => [
					'active' => true,
				],
			'placeholder' => '[gallery id="123" size="medium"]',
			'default' => '',
		]);
		$this->add_control('faq_lists',[
			'label'       => esc_html__( 'FAQ List', 'xgenious-master' ),
			'type'        => Controls_Manager::REPEATER,
			'fields' => $repeater->get_controls(),
			'title_field' => "{{{title}}}"
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
        $accordion_items = $settings['faq_lists'];
        if ( !is_user_logged_in() ) :?>
            <div class="my-account-page without-login">
                <div class="login-form-area-wrapper account-page-form-wrapper">
                    <?php
                        $shortcode = do_shortcode( '[edd_login_xgenious redirect="'.get_permalink( get_the_ID() ).'"]' );
                        echo $shortcode;
                    ?>
                </div>
            </div>
            
        
        <?php return; endif; ?>
        <div class="xgenious-my-account-page-tab-wrapper">
                <ul class="nav nav-tabs xg-my-account-page-tab-nav" id="my_account_page_tabs" role="tablist">
                      <?php
                        foreach ( $accordion_items as $key => $item ):
                            $active = $key === 0 ? 'active' : '';
                            $slug = str_replace(' ','_',strtolower($item['title']));
                            ?>
                           <li class="nav-item " role="presentation">
                               <a  data-bs-toggle="tab" data-bs-target="#<?php echo $slug;?>" class="<?php echo esc_attr($active);?>" type="button" role="tab">
                                  <?php \Elementor\Icons_Manager::render_icon( $item['icon'], [ 'aria-hidden' => 'true' ] ); ?>
                                  <?php echo esc_html($item['title']);?>
                                </a>
                            </li>
                        <?php endforeach; ?>
                        <li class="nav-item" role="presentation"><a href="<?php echo wp_logout_url( home_url() ); ?>"><i class="fas fa-sign-out-alt"></i> Logout</a></li>
                </ul>
                
                <div class="tab-content" id="myTabContent">
                     <?php
                    foreach ( $accordion_items as $key => $item ):
                        $active = $key === 0 ? 'show active' : '';
                        $slug = str_replace(' ','_',strtolower($item['title']));
                    ?>
                    <div class="tab-pane fade <?php echo esc_attr($active);?>" id="<?php echo esc_attr($slug);?>" role="tabpanel" >
                	    <?php
                            $shortcode = $item['shortcode'];
                            $shortcode = do_shortcode( shortcode_unautop( $shortcode ) );
                            echo $shortcode;
                        ?>   
                    </div>
                    <?php endforeach; ?>
                </div>
        </div>
        <?php
    }
}

Plugin::instance()->widgets_manager->register( new Xgenious_My_Account_One() );