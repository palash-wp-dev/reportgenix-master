<?php 
class Xgenious_Achievement_Addon extends \Elementor\Widget_Base {

	public function get_name() {
		return 'xgenious_achievement_addon';
	}

	public function get_title() {
		return esc_html__( 'achievement', 'elementor-addon' );
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
        <div class="achievementArea xgs-bg-3 pat-150 pab-150">
            <div class="achievement__bg">
                <img src="<?php echo plugins_url( '../../../../assets/images/xgenious-main/achievement/achievement_bg.png', __FILE__ )?>" alt="achievementBg">
            </div>
            <div class="default-container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="sectionTitle text-left">
                            <div class="sectionTitle__left">
                                <h2 class="sectionTitle__main">Our Achievement On Code canyon</h2>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row g-4 mt-4">
                    <div class="col-sm-6 col-md-4 col-xl-2">
                        <div class="achievementItem">
                            <div class="achievementItem__thumb">
                                <img src="<?php echo plugins_url( '../../../../assets/images/xgenious-main/achievement/achievement1.png', __FILE__ )?>" alt="achievement1">
                            </div>
                            <h6 class="achievementItem__title mt-3">Exclusive Author</h6>
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-4 col-xl-2">
                        <div class="achievementItem">
                            <div class="achievementItem__thumb">
                                <img src="<?php echo plugins_url( '../../../../assets/images/xgenious-main/achievement/achievement2.png', __FILE__ )?>" alt="achievement2">
                            </div>
                            <h6 class="achievementItem__title mt-3">Featured Author</h6>
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-4 col-xl-2">
                        <div class="achievementItem">
                            <div class="achievementItem__thumb">
                                <img src="<?php echo plugins_url( '../../../../assets/images/xgenious-main/achievement/achievement3.png', __FILE__ )?>" alt="achievement3">
                            </div>
                            <h6 class="achievementItem__title mt-3">Top Sales Week</h6>
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-4 col-xl-2">
                        <div class="achievementItem">
                            <div class="achievementItem__thumb">
                                <img src="<?php echo plugins_url( '../../../../assets/images/xgenious-main/achievement/achievement4.png', __FILE__ )?>" alt="achievement4">
                            </div>
                            <h6 class="achievementItem__title mt-3">6 Years Membership</h6>
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-4 col-xl-2">
                        <div class="achievementItem">
                            <div class="achievementItem__thumb">
                                <img src="<?php echo plugins_url( '../../../../assets/images/xgenious-main/achievement/achievement5.png', __FILE__ )?>" alt="achievement5">
                            </div>
                            <h6 class="achievementItem__title mt-3">Elite Author</h6>
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-4 col-xl-2">
                        <div class="achievementItem">
                            <div class="achievementItem__thumb">
                                <img src="<?php echo plugins_url( '../../../../assets/images/xgenious-main/achievement/achievement6.png', __FILE__ )?>" alt="achievement6">
                            </div>
                            <h6 class="achievementItem__title mt-3">Trendsetter</h6>
                        </div>
                    </div>
                </div>
            </div>
        </div>
		<?php
	}
}

\Elementor\Plugin::instance()->widgets_manager->register( new Xgenious_Achievement_Addon() );