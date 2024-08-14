<?php
/**
 * Elementor Widget
 * @package Xgenious
 * @since 1.0.0
 */

namespace Elementor;
class Xgenious_Job_Single_Page_One_Widget extends Widget_Base
{

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
    public function get_name()
    {
        return 'xgenious-job-single-one-widget';
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
    public function get_title()
    {
        return esc_html__('Job Single Page', 'xgenious-master');
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
    public function get_icon()
    {
        return 'eicon-alert';
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
    public function get_categories()
    {
        return ['xgenious_widgets'];
    }

    /**
     * Register Elementor widget controls.
     *
     * Adds different input fields to allow the user to change and customize the widget settings.
     *
     * @since 1.0.0
     * @access protected
     */
    protected function register_controls()
    {
        $this->start_controls_section(
			'settings_section',
			[
				'label' => esc_html__( 'General Settings', 'xgenous-master' ),
				'tab'   => Controls_Manager::TAB_CONTENT,
			]
		);

		$this->add_control( 'title', [
			'type'    => Controls_Manager::TEXTAREA,
			'label'   => esc_html__( 'Title', 'xgenious-master' )
		] );
		$this->add_control( 'description', [
			'type'    => Controls_Manager::WYSIWYG,
			'label'   => esc_html__( 'Description', 'xgenious-master' ),
		] );
	    $this->add_control( 'thumbnail', [
			'type'    => Controls_Manager::MEDIA,
			'label'   => esc_html__( 'Thumbnail', 'xgenious-master' )
		] );

        $this->end_controls_section();
        
        $this->start_controls_section(
            'job_info_settings_section',
            [
                'label' => esc_html__('Job Settings', 'xgenious-master'),
                'tab' => Controls_Manager::TAB_CONTENT,
            ]
        );
        	$this->add_control('type',[
			'label'       => esc_html__( 'Job Type', 'xgenious-master' ),
			'type'        => Controls_Manager::SELECT,
			'options' => [
			    "Full Time" => "Full Time",  
			    "Part Time" => "Part Time",  
			    "Project Basis" => "Project Basis",  
			 ],
			  'default' => "Full Time"
		]);
		$this->add_control('nature',[
			'label'       => esc_html__( 'Job Nature', 'xgenious-master' ),
			'type'        => Controls_Manager::SELECT,
			'options' => [
			    "Office" => "Office",  
			    "Remote" => "Remote"
			 ],
			 'default' => "Office"
		]);
		$this->add_control('location',[
			'label'       => esc_html__( 'Location', 'xgenious-master' ),
			'type'        => Controls_Manager::TEXT,
			'description' => esc_html__( 'enter location', 'xgenious-master' ),
			'label_block' => true,
			'default' => "Rampura,Dhaka"
		]);

		$this->add_control('button_status',[
			'label'       => esc_html__( 'Button Status', 'xgenious-master' ),
			'type'        => Controls_Manager::SWITCHER,
		]);
		$this->add_control('button_text',[
			'label'       => esc_html__( 'Button Text', 'xgenious-master' ),
			'type'        => Controls_Manager::TEXT,
			'label_block' => true,
            'condition' => ['button_status' => 'yes']
		]);
		$this->add_control('button_link',[
			'label'       => esc_html__( 'Button Link', 'xgenious-master' ),
			'type'        => Controls_Manager::URL,
			'label_block' => true,
			'condition' => ['button_status' => 'yes']
		]);
		$this->add_control('apply_now_form',[
			'label'       => esc_html__( 'Form Shotcode', 'xgenious-master' ),
			'type'        => Controls_Manager::TEXTAREA,
			'label_block' => true,
			'condition' => ['button_status' => 'yes'],
			'placeholder' => '[gallery id="123" size="medium"]',
		]);
		
        $this->end_controls_section();
         
        $this->start_controls_section(
            'job_requirements_settings_section',
            [
                'label' => esc_html__('Job Requirements Settings', 'xgenious-master'),
                'tab' => Controls_Manager::TAB_CONTENT,
            ]
        );
        $repeater_re = new Repeater();
        $repeater_re->add_control( 'title', [
			'type'    => Controls_Manager::TEXTAREA,
			'label'   => esc_html__( 'Title', 'xgenious-master' )
		] );
		$repeater_re->add_control( 'description', [
			'type'    => Controls_Manager::WYSIWYG,
			'label'   => esc_html__( 'Description', 'xgenious-master' ),
		] );
		 $this->add_control('job_requirement_info',[
	        'label'       => esc_html__( 'Jobs Requirements', 'xgenious-master' ),
	        'type'        => Controls_Manager::REPEATER,
            'fields' => $repeater_re->get_controls(),
            'title_field' => "{{{title}}}"
        ]);
        $this->end_controls_section();
        
        $this->start_controls_section(
            'job_list_settings_section',
            [
                'label' => esc_html__('Job Info Settings', 'xgenious-master'),
                'tab' => Controls_Manager::TAB_CONTENT,
            ]
        );
        $repeater = new Repeater();
		$repeater->add_control('title',[
			'label'       => esc_html__( 'Title', 'xgenious-master' ),
			'type'        => Controls_Manager::TEXT,
			'description' => esc_html__( 'enter title', 'xgenious-master' ),
			'label_block' => true
		]);
		$repeater->add_control('description',[
			'label'       => esc_html__( 'Description', 'xgenious-master' ),
			'type'        => Controls_Manager::TEXT,
			'label_block' => true
		]);
	
        $this->add_control('job_info',[
	        'label'       => esc_html__( 'Jobs Info', 'xgenious-master' ),
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
    protected function render()
    {
        $settings = $this->get_settings_for_display();
        ?>
        <section class="join-single--area">
            <div class="container container_1430">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="thumbnail-wrapper">
                            <?php
                                $img_id = $settings['thumbnail']['id'] ;
                                $img_url_val = $img_id ? wp_get_attachment_image_src($img_id,'full',false) : '';
                                $img_url = is_array($img_url_val) && !empty($img_url_val) ? $img_url_val[0] : '';
                                $img_alt =  $img_id ? get_post_meta($img_id,'_wp_attachment_image_alt',true) : '';
                                printf('<img src="%1$s" alt="%2$s">',$img_url,$img_alt);
                            ?>
                        </div>
                    </div>
                    <div class="col-lg-10">
                        <div class="job-description-wrap">
                            <?php
                                printf('<h1 class="job-title">%1$s</h1>',esc_html($settings['title'])); 
                            ?>
                            <div class="job-meta-list">
                                <?php 
                                    printf('<span class="job_type">%1$s</span>',esc_html($settings['type']));
                                    printf('<span class="job_nature">%1$s</span>',esc_html($settings['nature']));
                                    printf('<span class="job_location">%1$s</span>',esc_html($settings['location']));
                                ?>
                            </div>
                            <?php  printf('<div class="job-description">%1$s</div>',wp_kses_post($settings['description'])); ?>
                            <ul class="job-information">
                                <?php
	                            $faq_list = $settings['job_info'];
	                            foreach ($faq_list as $list):
                                    printf('<li class="job-info-single"><strong>%1$s</strong> <span>%2$s</span></li>',$list['title'],$list['description']);
		                        endforeach;?>
                            </ul>
                            <div class="job-requirements">
                                 <?php
	                                $job_requ_list = $settings['job_requirement_info'];
    	                            foreach ($job_requ_list as $list):
    	                                printf('<div class="single-requirement-item"><h1 class="job-common-title">%1$s</h1>',esc_html($list['title'])); 
                                        printf('<div class="requirement-details">%1$s</div></div>',wp_kses_post($list['description'])); 
    		                        endforeach;
		                        ?>
                            <div>
                                
                            <?php if( $settings['button_status'] === 'yes'):?>
                                <?php printf('<div class="btn-wrapper"><a href="%1$s" class="cmn-btn btn-bg-1 job_apply_button" id="job_apply_button">%2$s</a></div>',esc_url($settings['button_link']['url'] ?? ''),esc_html($settings['button_text']));?>
                                <div class="apply_now_form" id="job_apply_form_wrapper">
                                    <?php
                                        $shortcode = $this->get_settings_for_display( 'apply_now_form' );
                                        $shortcode = do_shortcode( shortcode_unautop( $shortcode ) );
                                        echo $shortcode;
                                    ?>
                                </div>
                            <?php endif;?>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <?php
    }
}

Plugin::instance()->widgets_manager->register(new Xgenious_Job_Single_Page_One_Widget());