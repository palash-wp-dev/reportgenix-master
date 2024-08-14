<?php 
class Xgenious_Free_Trial_Addon extends \Elementor\Widget_Base {

	public function get_name() {
		return 'reportgenix_free_trial_addon';
	}

	public function get_title() {
		return esc_html__( 'free-trial', 'elementor-addon' );
	}

	public function get_icon() {
		return 'eicon-code';
	}

	public function get_categories() {
		return [ 'xgenious_widgets_reportgenix' ];
	}

	public function get_keywords() {
		return [ 'banner'];
	} 

	protected function render() {
		?>
        <div class="report-free-trial pt-80 pb-80" style="background-image:url('<?php echo plugins_url('../../../assets/images/reportgenix/BG09.png',__FILE__)?>')">
            <div class="container">
                <div class="free-trial-wraper d-flex justify-content-between align-items-center">
                    <div class="heading">Try it for 07 days!</div>
                    <div class="free-trial-btn">
                        <a href="javascript:(0)" class="report-cmn-btn blue-btn me-md-3">Start free trial <span class="ms-2"><i class="fa-solid fa-arrow-right"></i></span> </a>
                        <a href="javascript:(0)" class="report-cmn-btn black-btn">Book a demo<span class="ms-2"><i class="fa-solid fa-arrow-right"></i></span></a>
                    </div>
                </div>
            </div>
        </div>
		<?php
	}
}

\Elementor\Plugin::instance()->widgets_manager->register( new Xgenious_Free_Trial_Addon() );