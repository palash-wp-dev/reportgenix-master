<?php 
class Xgenious_Header_One_Addon extends \Elementor\Widget_Base {

	public function get_name() {
		return 'xgenious_header_one_addon';
	}

	public function get_title() {
		return esc_html__( 'Header: 01', 'elementor-addon' );
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
        <div class="bannerArea pat-150 pab-75">
            <div class="default-container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="bannerContents">
                            <h1 class="bannerContents__title">Digital Product-design <span class="bannerContents__title__color">development</span></h1>
                            <div class="bannerContents__reviewWrap">
                                <div class="btn_wrapper">
                                    <a href="javascript:void(0)" class="xgs_btn btn_bg_1">Sign up for offer</a>
                                </div>
                                <div class="bannerContents__review">
                                    <div class="bannerContents__review__icon">
                                        <span class="icon"><i class="fa-regular fa-star"></i></span>
                                        <span class="icon"><i class="fa-regular fa-star"></i></span>
                                        <span class="icon"><i class="fa-regular fa-star"></i></span>
                                        <span class="icon"><i class="fa-regular fa-star"></i></span>
                                        <span class="icon"><i class="fa-regular fa-star"></i></span>
                                    </div>
                                    <p class="bannerContents__review__para">5K+ Clients Reviews last years</p>
                                </div>
                            </div>
                            <div class="bannerContents__digital">
                                <div class="bannerContents__digital__thumb">
                                    <img src="<?php echo plugins_url( '../../../assets/images/xgenious-main/banner/banner_digital.png', __FILE__ )?>" alt="digital-img">
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

\Elementor\Plugin::instance()->widgets_manager->register( new Xgenious_Header_One_Addon() );