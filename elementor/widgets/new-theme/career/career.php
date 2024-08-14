<?php 
class Xgenious_Career_Addon extends \Elementor\Widget_Base {

	public function get_name() {
		return 'xgenious_career_addon';
	}

	public function get_title() {
		return esc_html__( 'career', 'elementor-addon' );
	}

	public function get_icon() {
		return 'eicon-code';
	}

	public function get_categories() {
		return [ 'xgenious_widgets_new' ];
	}

	public function get_keywords() {
		return [ 'hello'];
	}

	protected function render() {
		?>
        <div class="careerArea pat-150 pab-75">
            <div class="default-container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="sectionTitle text-left">
                            <div class="sectionTitle__left">
                                <h2 class="sectionTitle__main">Working opportunity with Xgenious</h2>
                                <p class="sectionTitle__para">Xgenious is committed to fostering the professional growth of its employees through a consistent emphasis on on-the-job learning and development. We view obstacles and challenges not as setbacks, but as vital opportunities for growth and skill enhancement. Our team is meticulously prepared for a wide array of scenarios, instilling a resilient, proactive mindset that embodies a 'can-do' attitude in the face of any challenge.</p>
                                
                                <div class="btn_wrapper d-flex mt-4">
                                    <a href="javascript:void(0)" class="xgs_btn btn_bg_1">Join with us</a>
                                    <a href="javascript:void(0)" class="xgs_btn btn_bg_1 btn_arrow"><i class="fa-solid fa-arrow-right-long"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div><div class="row g-4">
                    <div class="col-sm-4">
                        <div class="career">
                            <div class="career__thumb">
                                <img src="<?php echo plugins_url( '../../../../assets/images/xgenious-main/career/career1.jpg', __FILE__ )?>" alt="career">
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-8 align-self-end">
                        <div class="career">
                            <div class="career__thumb">
                                <img src="<?php echo plugins_url( '../../../../assets/images/xgenious-main/career/career2.jpg', __FILE__ )?>" alt="career">
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="career">
                            <div class="career__thumb">
                                <img src="<?php echo plugins_url( '../../../../assets/images/xgenious-main/career/career3.jpg', __FILE__ )?>" alt="career">
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="career">
                            <div class="career__thumb">
                                <img src="<?php echo plugins_url( '../../../../assets/images/xgenious-main/career/career4.jpg', __FILE__ )?>" alt="career">
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="career">
                            <div class="career__thumb">
                                <img src="<?php echo plugins_url( '../../../../assets/images/xgenious-main/career/career5.jpg', __FILE__ )?>" alt="career">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
		<?php
	}
}

\Elementor\Plugin::instance()->widgets_manager->register( new Xgenious_Career_Addon() );