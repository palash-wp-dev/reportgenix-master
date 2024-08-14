<?php 
class Xgenious_Benifits_Addon extends \Elementor\Widget_Base {

	public function get_name() {
		return 'xgenious_benifits_addon';
	}

	public function get_title() {
		return esc_html__( 'benifits', 'elementor-addon' );
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
        <div class="benifitArea pat-75 pab-150" style="background-image: url(<?php echo plugins_url( '../../../../assets/images/xgenious-main/career/benifit_bg.jpg', __FILE__ )?>);">
            <div class="default-container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="sectionTitle text-left">
                            <div class="sectionTitle__left">
                                <h2 class="sectionTitle__main">Our Benefit's</h2>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <div class="benifit__wrap">
                            <div class="benifit__wrap__item">
                                <div class="benifit__item">
                                    <div class="benifit__item__icon">
                                        <img src="<?php echo plugins_url( '../../../../assets/images/xgenious-main/career/benifit1.svg', __FILE__ )?>" alt="benifit">
                                    </div>
                                    <div class="benifit__item__contents mt-4">
                                        <h5 class="benifit__item__title">Learning & Growth</h5>
                                        <p class="benifit__item__para mt-3">This can include providing access to training programs, mentorship opportunities to foster a culture of lifelong learning</p>
                                    </div>
                                </div>
                            </div>
                            <div class="benifit__wrap__item">
                                <div class="benifit__item">
                                    <div class="benifit__item__icon">
                                        <img src="<?php echo plugins_url( '../../../../assets/images/xgenious-main/career/benifit2.svg', __FILE__ )?>" alt="benifit">
                                    </div>
                                    <div class="benifit__item__contents mt-4">
                                        <h5 class="benifit__item__title">Honest Communication</h5>
                                        <p class="benifit__item__para mt-3">This can include providing access to training programs, mentorship opportunities to foster a culture of lifelong learning</p>
                                    </div>
                                </div>
                            </div>
                            <div class="benifit__wrap__item">
                                <div class="benifit__item">
                                    <div class="benifit__item__icon">
                                        <img src="<?php echo plugins_url( '../../../../assets/images/xgenious-main/career/benifit3.svg', __FILE__ )?>" alt="benifit">
                                    </div>
                                    <div class="benifit__item__contents mt-4">
                                        <h5 class="benifit__item__title">Responsibility</h5>
                                        <p class="benifit__item__para mt-3">This can include providing access to training programs, mentorship opportunities to foster a culture of lifelong learning</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
		<?php
	}
}

\Elementor\Plugin::instance()->widgets_manager->register( new Xgenious_Benifits_Addon() );