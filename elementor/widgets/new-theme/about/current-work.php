<?php 
class Xgenious_Current_Work_Addon extends \Elementor\Widget_Base {

	public function get_name() {
		return 'xgenious_current_work_addon';
	}

	public function get_title() {
		return esc_html__( 'current-work', 'elementor-addon' );
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
        <div class="currentWorkArea xgs-bg-3 pat-150 pab-75">
            <div class="default-container">
                <div class="row gy-4 gy-lg-0 justify-content-between">
                    <div class="col-lg-5">
                        <div class="currentWork">
                            <div class="currentWork__thumb">
                                <img src="<?php echo plugins_url( '../../../../assets/images/xgenious-main/current-work/current-work.jpg', __FILE__ )?>" alt="current-work">
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="currentWorkItem">
                            <div class="sectionTitle text-left">
                                <div class="sectionTitle__left">
                                    <h2 class="sectionTitle__main">Feeling stuck at your current work?</h2>
                                    <p class="sectionTitle__para">Join us at Xgenious and be part of something exciting! We're looking for people who love technology and creativity to help us make great websites and apps. Come work in a friendly team where your ideas really make a difference.</p>
                                </div>
                            </div>
                            <div class="btn_wrapper d-flex mt-4">
                                <a href="javascript:void(0)" class="xgs_btn btn_bg_1">Join with us</a>
                                <a href="javascript:void(0)" class="xgs_btn btn_bg_1 btn_arrow"><i class="fa-solid fa-arrow-right-long"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
		<?php
	}
}

\Elementor\Plugin::instance()->widgets_manager->register( new Xgenious_Current_Work_Addon() );