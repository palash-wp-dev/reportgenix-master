<?php 
class Xgenious_Support_Addon extends \Elementor\Widget_Base {

	public function get_name() {
		return 'xgenious_support_addon';
	}

	public function get_title() {
		return esc_html__( 'support', 'elementor-addon' );
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
        <div class="supportArea pat-150 pab-150">
            <div class="default-container">
                <div class="sectionTitle d-flex">
                    <div class="sectionTitle__left">
                        <h2 class="sectionTitle__main">Together We Support</h2>
                    </div>
                    <div class="sectionTitle__right">
                        <p class="sectionTitle__para">Our initiative is rooted in the belief that collective action can make a significant difference. By bringing together diverse individuals and groups, we aim to offer support where it's needed most.</p>
                        <div class="btn_wrapper d-flex mt-4">
                            <a href="javascript:void(0)" class="xgs_btn btn_bg_1">Meeting with team</a>
                            <a href="javascript:void(0)" class="xgs_btn btn_bg_1 btn_arrow"><i class="fa-solid fa-arrow-right-long"></i></a>
                        </div>
                    </div>
                </div>
                <div class="row g-4 mt-5">
                    <div class="col-md-4 align-self-end">
                        <div class="supportItem">
                            <div class="supportItem__thumb">
                                <img src="<?php echo plugins_url( '../../../assets/images/xgenious-main/support/support1.jpg', __FILE__ )?>" alt="support1">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-8 align-self-end">
                        <div class="supportItem">
                            <div class="supportItem__thumb">
                                <img src="<?php echo plugins_url( '../../../assets/images/xgenious-main/support/support2.jpg', __FILE__ )?>" alt="support2">
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-lg-4">
                        <div class="supportItem">
                            <div class="supportItem__thumb">
                                <img src="<?php echo plugins_url( '../../../assets/images/xgenious-main/support/support3.jpg', __FILE__ )?>" alt="support3">
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-lg-4">
                        <div class="supportItem">
                            <div class="supportItem__thumb">
                                <img src="<?php echo plugins_url( '../../../assets/images/xgenious-main/support/support4.jpg', __FILE__ )?>" alt="support4">
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-lg-4">
                        <div class="supportItem">
                            <div class="supportItem__thumb">
                                <img src="<?php echo plugins_url( '../../../assets/images/xgenious-main/support/support5.jpg', __FILE__ )?>" alt="support5">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
		<?php
	}
}

\Elementor\Plugin::instance()->widgets_manager->register( new Xgenious_Support_Addon() );