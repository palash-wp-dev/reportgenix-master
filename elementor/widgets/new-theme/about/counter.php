<?php 
class Xgenious_Counter_Addon extends \Elementor\Widget_Base {

	public function get_name() {
		return 'xgenious_counter_addon';
	}

	public function get_title() {
		return esc_html__( 'counter', 'elementor-addon' );
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
        <div class="counterArea pat-75 pab-150">
            <div class="achievementText">
                <img src="<?php echo plugins_url( '../../../../assets/images/xgenious-main/about/achievement-text.png', __FILE__ )?>" alt="experience">
            </div>
            <div class="default-container">
                <div class="row">
                    <div class="col-sm-6 col-md-3 col-lg-3">
                        <div class="singleCounter">
                            <div class="singleCounter__count">
                                <span class="odometer" data-odometer="350"></span>
                                <h4 class="singleCounter__count__title">+</h4>
                            </div>
                            <p class="singleCounter__para mt-3">Customer Happy</p>
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-3 col-lg-3">
                        <div class="singleCounter">
                            <div class="singleCounter__count">
                                <span class="odometer" data-odometer="10"></span>
                                <h4 class="singleCounter__count__title">+</h4>
                            </div>
                            <p class="singleCounter__para mt-3">Years Experience</p>
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-3 col-lg-3">
                        <div class="singleCounter">
                            <div class="singleCounter__count">
                                <span class="odometer" data-odometer="19"></span>
                                <h4 class="singleCounter__count__title">+</h4>
                            </div>
                            <p class="singleCounter__para mt-3">Awards Wining</p>
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-3 col-lg-3">
                        <div class="singleCounter">
                            <div class="singleCounter__count">
                                <span class="odometer" data-odometer="25"></span>
                                <h4 class="singleCounter__count__title">+</h4>
                            </div>
                            <p class="singleCounter__para mt-3">Team Members</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
		<?php
	}
}

\Elementor\Plugin::instance()->widgets_manager->register( new Xgenious_Counter_Addon() );