<?php
/**
 * Elementor Widget
 * @package xgenous
 * @since 1.0.0
 */

namespace Elementor;

use Elementor\Core\Kits\Controls\Repeater;

class Xgenious_Contact_Area_One_Widget extends Widget_Base {

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
		return 'xgenious-contact-area-one-widget';
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
		return esc_html__( 'Contact Area One', 'xgenous-master' );
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
		return 'eicon-archive-title';
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
				'label' => esc_html__( 'Left Side Contents', 'xgenous-master' ),
				'tab'   => Controls_Manager::TAB_CONTENT,
			]
		);

		$this->add_control( 'title', [
			'type'    => Controls_Manager::TEXTAREA,
			'label'   => esc_html__( 'Title', 'xgenious-master' ),
			'info' => esc_html__( 'add {line}Line {/line} to get line under the word', 'xgenious-master' )
		] );
		$this->add_control( 'description', [
			'type'    => Controls_Manager::TEXTAREA,
			'label'   => esc_html__( 'Description', 'xgenious-master' ),
		] );
		$this->add_control( 'btn_one_status',
			[
				'label'       => esc_html__( 'Button One Show/Hide', 'xgenous-master' ),
				'type'        => Controls_Manager::SWITCHER,
				'default'     => 'yes',
				'description' => esc_html__( 'show/hide button one', 'xgenous-master' ),
		] );
		$this->add_control( 'btn_one_normal_text',[
			'label'       => esc_html__( 'Button One Normal Text', 'xgenous-master' ),
			'type'        => Controls_Manager::TEXT,
			'default'     => esc_html__( 'Need any help?', 'xgenous-master' ),
			'description' => esc_html__( 'enter button one text', 'xgenous-master' ),
			'condition'   => [
				'btn_one_status' => 'yes'
			]
		]);
		$this->add_control( 'btn_one_text',[
			'label'       => esc_html__( 'Button One Label', 'xgenous-master' ),
			'type'        => Controls_Manager::TEXT,
			'default'     => esc_html__( 'Contact Us', 'xgenous-master' ),
			'description' => esc_html__( 'enter button one text', 'xgenous-master' ),
			'condition'   => [
				'btn_one_status' => 'yes'
			]
		]);
		$this->add_control( 'btn_one_url',[
			'label'       => esc_html__( 'Button One URL', 'xgenous-master' ),
			'type'        => Controls_Manager::URL,
			'default'     => [
				'url' => '#'
			],
			'description' => esc_html__( 'enter button one url', 'xgenous-master' ),
			'condition'   => [
				'btn_one_status' => 'yes'
			]
		]);
        $this->end_controls_section();

		$this->start_controls_section(
			'contact_Form_settings_section',
			[
				'label' => esc_html__( 'Contact Form', 'xgenous-master' ),
				'tab'   => Controls_Manager::TAB_CONTENT,
			]
		);
		$this->add_control( 'contact_form_title', [
			'type'    => Controls_Manager::TEXTAREA,
			'label'   => esc_html__( 'Title', 'xgenious-master' ),
		] );
		$this->add_control(
			'shortcode',
			[
				'label' => esc_html__( 'Enter your shortcode', 'elementor' ),
				'type' => Controls_Manager::TEXTAREA,
				'dynamic' => [
					'active' => true,
				],
				'placeholder' => '[gallery id="123" size="medium"]',
				'default' => '',
			]
		);
        $this->end_controls_section();
		$this->start_controls_section(
			'contact_info_settings_section',
			[
				'label' => esc_html__( 'Contact Info', 'xgenous-master' ),
				'tab'   => Controls_Manager::TAB_CONTENT,
			]
		);
		$this->add_control( 'contact_infos',
		[
                'label'       => esc_html__( 'Contact Info Show/Hide', 'xgenous-master' ),
                'type'        => Controls_Manager::SWITCHER,
                'default'     => 'yes',
                'description' => esc_html__( 'show/hide contact info', 'xgenous-master' ),
        ] );
		$social_links = new \Elementor\Repeater();

		$social_links->add_control(
			'list_title', [
				'label' => __( 'Title', 'xgenous-master' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => __( 'Skype' , 'xgenous-master' ),
				'label_block' => true,
			]
		);
		$social_links->add_control(
			'list_link',
			[
				'label' => __( 'URL', 'xgenous-master' ),
				'type' => \Elementor\Controls_Manager::URL,
				'default' => [
					'url' => 'skype?chat'
				]
			]
		);
		$social_links->add_control(
			'list_icons',
			[
				'label' => __( 'Icons', 'xgenous-master' ),
				'type' => \Elementor\Controls_Manager::ICONS,
			]
		);

		$this->add_control(
			'social_list',
			[
				'label' => __( 'Social Links', 'xgenous-master' ),
				'type' => \Elementor\Controls_Manager::REPEATER,
				'fields' => $social_links->get_controls(),
				'condition'   => [
					'contact_infos' => 'yes'
				],
				'title_field' => '{{{ list_title }}}',
			]
		);

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
		?>
        <section class="talk-area padding-top-60 padding-bottom-120 active">
            <div class="container container_1430">
                <div class="row gy-5 justify-content-between margin-top-50">
                    <div class="col-lg-5">
                        <div class="single-talk-wrapper">
                            <div class="section-title text-left">
	                            <?php
	                            $title_markup = $settings['title'];
	                            $title_markup = str_replace(['{line}','{/line}'],['<span class="banner-contents-title-shape"> <img src="'. XGENIOUS_IMG.'/banner/shape-line.svg" alt="'.__('shape image','xgenious-master').'">','</span>'],$title_markup);
	                            printf('<h2 class="title">%s</h2>',$title_markup);

	                            if(!empty($settings['description'])){
		                            printf('<p class="section-para mt-3">%s</p>',$settings['description']);
	                            }
	                            ?>
                            </div>
                            <div class="single-talk-wrapper-bottom mt-4 mt-lg-5">
	                            <?php if(!empty($settings['btn_one_status'])):?>
			                            <?php
			                            $btn_url = $settings['btn_one_url']['url'] ?? '';
			                            printf('<span class="single-talk-wrapper-bottom-item">%1$s<a href="%2$s"> %3$s </a> </span>',$settings['btn_one_normal_text'],$btn_url,$settings['btn_one_text']);
			                            ?>
	                            <?php endif;?>
                                <ul class="talk-wrapper-list list-style-none">
		                            <?php
		                            $social_list = $settings['social_list'] ?? [];
		                            foreach($social_list as $list):
			                            if(!empty($list['list_link']['url'])): ?>
				                           <li class="talk-wrapper-list-item"> 
											<a class="talk-wrapper-list-link" href="<?php echo esc_url($list['list_link']['url']);?>"><?php Icons_Manager::render_icon($list['list_icons']);?> <?php echo esc_html($list['list_title']);?> </a>
										 </li>
									<?php  
								endif;
								 endforeach;
								  ?>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="talk-wrapper-form bg-white talk-wrapper-form-padding">
                            <h3 class="talk-wrapper-form-label"> <?php echo esc_html($settings['contact_form_title']);?> </h3>
                            <div class="custom-form">
	                            <?php
                                    $shortcode = $this->get_settings_for_display( 'shortcode' );
                                    $shortcode = do_shortcode( shortcode_unautop( $shortcode ) );
                                    echo $shortcode;
	                            ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
		<?php
	}
}

Plugin::instance()->widgets_manager->register( new Xgenious_Contact_Area_One_Widget() );