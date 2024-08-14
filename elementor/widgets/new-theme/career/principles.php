<?php 
class Xgenious_Principles_Addon extends \Elementor\Widget_Base {

	public function get_name() {
		return 'xgenious_principles_addon';
	}

	public function get_title() {
		return esc_html__( 'principles', 'elementor-addon' );
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
        <div class="principlesArea pat-75 pab-150">
            <div class="default-container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="sectionTitle text-left">
                            <div class="sectionTitle__left">
                                <h2 class="sectionTitle__main">Our principles core beliefs & guiding principles</h2>
                            </div>
                        </div>
                    </div>
                </div><div class="row">
                    <div class="col-sm-12">
                        <div class="principles__wrap">
                            <div class="principles__wrap__item">
                                <div class="principles__item">
                                    <div class="principles__item__icon">
                                        <img src="<?php echo plugins_url( '../../../../assets/images/xgenious-main/career/principles1.svg', __FILE__ )?>" alt="principles">
                                    </div>
                                    <div class="principles__item__contents mt-4">
                                        <h5 class="principles__item__title">Learning & Growth</h5>
                                        <p class="principles__item__para mt-3">This can include providing access to training programs, mentorship opportunities to foster a culture of lifelong learning</p>
                                    </div>
                                </div>
                            </div>
                            <div class="principles__wrap__item">
                                <div class="principles__item">
                                    <div class="principles__item__icon">
                                        <img src="<?php echo plugins_url( '../../../../assets/images/xgenious-main/career/principles2.svg', __FILE__ )?>" alt="principles">
                                    </div>
                                    <div class="principles__item__contents mt-4">
                                        <h5 class="principles__item__title">Honest Communication</h5>
                                        <p class="principles__item__para mt-3">This can include providing access to training programs, mentorship opportunities to foster a culture of lifelong learning</p>
                                    </div>
                                </div>
                            </div>
                            <div class="principles__wrap__item">
                                <div class="principles__item">
                                    <div class="principles__item__icon">
                                        <img src="<?php echo plugins_url( '../../../../assets/images/xgenious-main/career/principles3.svg', __FILE__ )?>" alt="principles">
                                    </div>
                                    <div class="principles__item__contents mt-4">
                                        <h5 class="principles__item__title">Responsibility</h5>
                                        <p class="principles__item__para mt-3">This can include providing access to training programs, mentorship opportunities to foster a culture of lifelong learning</p>
                                    </div>
                                </div>
                            </div>
                            <div class="principles__wrap__item">
                                <div class="principles__item">
                                    <div class="principles__item__icon">
                                        <img src="<?php echo plugins_url( '../../../../assets/images/xgenious-main/career/principles4.svg', __FILE__ )?>" alt="principles">
                                    </div>
                                    <div class="principles__item__contents mt-4">
                                        <h5 class="principles__item__title">Respect and Inclusivity</h5>
                                        <p class="principles__item__para mt-3">This can include providing access to training programs, mentorship opportunities to foster a culture of lifelong learning</p>
                                    </div>
                                </div>
                            </div>
                            <div class="principles__wrap__item">
                                <div class="principles__item">
                                    <div class="principles__item__icon">
                                        <img src="<?php echo plugins_url( '../../../../assets/images/xgenious-main/career/principles5.svg', __FILE__ )?>" alt="principles">
                                    </div>
                                    <div class="principles__item__contents mt-4">
                                        <h5 class="principles__item__title">Work-Life Balance</h5>
                                        <p class="principles__item__para mt-3">This can include providing access to training programs, mentorship opportunities to foster a culture of lifelong learning</p>
                                    </div>
                                </div>
                            </div>
                            <div class="principles__wrap__item">
                                <div class="principles__item">
                                    <div class="principles__item__icon">
                                        <img src="<?php echo plugins_url( '../../../../assets/images/xgenious-main/career/principles6.svg', __FILE__ )?>" alt="principles">
                                    </div>
                                    <div class="principles__item__contents mt-4">
                                        <h5 class="principles__item__title">Teamwork & Collaboration</h5>
                                        <p class="principles__item__para mt-3">This can include providing access to training programs, mentorship opportunities to foster a culture of lifelong learning</p>
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

\Elementor\Plugin::instance()->widgets_manager->register( new Xgenious_Principles_Addon() );