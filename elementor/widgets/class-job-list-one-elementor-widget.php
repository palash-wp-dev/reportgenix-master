<?php
/**
 * Elementor Widget
 * @package Xgenious
 * @since 1.0.0
 */

namespace Elementor;
class Xgenious_Job_List_One_Widget extends Widget_Base
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
        return 'xgenious-job-list-one-widget';
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
        return esc_html__('Job List One', 'xgenious-master');
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
				'label' => esc_html__( 'Section Settings', 'xgenous-master' ),
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

        $this->end_controls_section();
        
        $this->start_controls_section(
            'job_list_settings_section',
            [
                'label' => esc_html__('Job Listing Settings', 'xgenious-master'),
                'tab' => Controls_Manager::TAB_CONTENT,
            ]
        );
        
        $repeater = new Repeater();
		$repeater->add_control('title',[
			'label'       => esc_html__( 'Title', 'xgenious-master' ),
			'type'        => Controls_Manager::TEXTAREA,
			'description' => esc_html__( 'enter title', 'xgenious-master' ),
			'label_block' => true
		]);
		$repeater->add_control('description',[
			'label'       => esc_html__( 'Description', 'xgenious-master' ),
			'type'        => Controls_Manager::TEXTAREA,
			'label_block' => true
		]);
		$repeater->add_control('type',[
			'label'       => esc_html__( 'Job Type', 'xgenious-master' ),
			'type'        => Controls_Manager::SELECT,
			'options' => [
			    "Full Time" => "Full Time",  
			    "Part Time" => "Part Time",  
			    "Project Basis" => "Project Basis",  
			 ],
			  'default' => "Full Time"
		]);
		$repeater->add_control('nature',[
			'label'       => esc_html__( 'Job Nature', 'xgenious-master' ),
			'type'        => Controls_Manager::SELECT,
			'options' => [
			    "Office" => "Office",  
			    "Remote" => "Remote"
			 ],
			 'default' => "Office"
		]);
		$repeater->add_control('location',[
			'label'       => esc_html__( 'Location', 'xgenious-master' ),
			'type'        => Controls_Manager::TEXT,
			'description' => esc_html__( 'enter location', 'xgenious-master' ),
			'label_block' => true,
			'default' => "Rampura,Dhaka"
		]);

		$repeater->add_control('button_status',[
			'label'       => esc_html__( 'Button Status', 'xgenious-master' ),
			'type'        => Controls_Manager::SWITCHER,
		]);
		$repeater->add_control('button_text',[
			'label'       => esc_html__( 'Button Text', 'xgenious-master' ),
			'type'        => Controls_Manager::TEXT,
			'label_block' => true,
            'condition' => ['button_status' => 'yes']
		]);
		$repeater->add_control('button_link',[
			'label'       => esc_html__( 'Button Link', 'xgenious-master' ),
			'type'        => Controls_Manager::URL,
			'label_block' => true,
			'condition' => ['button_status' => 'yes']
		]);
        $this->add_control('job_lists',[
	        'label'       => esc_html__( 'Jobs Listing', 'xgenious-master' ),
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
        <section class="join-our-team-area padding-top-100 padding-bottom-50">
            <div class="container container_1430">
                <div class="section-title job-list-area">
                    <?php
                    $title_markup = $settings['title'];
                    printf('<h2 class="title">%s</h2>',$title_markup);
                    printf('<div class="description">%s</div>',$settings['description']);
                    
                    ?>
                </div>
                <div class="row g-5 justify-content-center margin-top-50">
                    <div class="col-lg-10">
                        <div class="job-list-wrapper">
                            <ul class="job-list-wrap">
                            <?php
                                $job_list = $settings['job_lists'];
	                            foreach ($job_list as $item):
                            ?>
                            <li class="single-job-list">
                                <div class="left-content">
                                    <?php
                                        printf('<a href="%2$s"><h2>%1$s</h2></a>',esc_html($item['title']),esc_url($item['button_link']['url'] ?? ''));
                                        printf('<p>%1$s</p>',esc_html($item['description']));
                                    ?>
                                    <div class="job-meta-list">
                                        <?php 
                                            printf('<span class="job_type">%1$s</span>',esc_html($item['type']));
                                            printf('<span class="job_nature">%1$s</span>',esc_html($item['nature']));
                                            printf('<span class="job_location">%1$s</span>',esc_html($item['location']));
                                        ?>
                                    </div>
                                </div>
                                <?php if( $item['button_status'] === 'yes'):?>
                                <div class="right-content">
                                    <?php printf('<div class="btn-wrapper"><a href="%1$s" class="cmn-btn btn-bg-1 job_apply_button">%2$s</a></div>',esc_url($item['button_link']['url'] ?? ''),esc_html($item['button_text']));?>
                                </div>
                                <?php endif;?>
                            </li>
                            <?php endforeach;?>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <?php
    }
}

Plugin::instance()->widgets_manager->register(new Xgenious_Job_List_One_Widget());