<?php 
class Xgenious_Footer_Addon extends \Elementor\Widget_Base {

	public function get_name() {
		return 'xgenious_footer_addon';
	}

	public function get_title() {
		return esc_html__( 'footer', 'elementor-addon' );
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
        <div class="footerWrap">
            <div class="buildArea pat-100 pab-100">
                <div class="default-container">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="buildWrapper">
                                <div class="sectionTitle d-flex white-color">
                                    <div class="sectionTitle__left">
                                        <h2 class="sectionTitle__main">Let’s build to together</h2>
                                    </div>
                                    <div class="sectionTitle__right">
                                        <div class="btn_wrapper d-flex mt-4">
                                            <a href="javascript:void(0)" class="xgs_btn btn_bg_1">LET’S TALK US</a>
                                            <a href="javascript:void(0)" class="xgs_btn btn_bg_1 btn_arrow"><i class="fa-solid fa-arrow-right-long"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <footer class="footerArea white__footer xgs-bg-2">
                <div class="xgeniousName">
                    <img src="<?php echo plugins_url( '../../../assets/images/xgenious-main/xgenious-name.png', __FILE__ )?>" alt="">
                </div>
                <div class="footerArea__wrapper pat-100 pab-100">
                    <div class="default-container">
                        <div class="row gx-5">
                            <div class="col-lg-3 col-sm-6 mt-4">
                                <div class="footerWidget footer-widget widget">
                                    <h4 class="footerWidget__title">Say Hello</h4>
                                    <div class="footerWidget__inner mt-4">
                                        <p class="footerWidget__para"> Amet minim mollit non deserunt ullamco est sit ali dolor do amet sint. </p>
                                        <div class="footerWidget__social mt-4">
                                            <ul class="footerWidget__social__list list-style-none">
                                                <li class="footerWidget__social__list__item">
                                                    <a class="footerWidget__social__list__link" href="javascript:void(0)"> <i
                                                            class="fab fa-facebook-f"></i> </a>
                                                </li>
                                                <li class="footerWidget__social__list__item">
                                                    <a class="footerWidget__social__list__link" href="javascript:void(0)"> <i
                                                            class="fab fa-twitter"></i> </a>
                                                </li>
                                                <li class="footerWidget__social__list__item">
                                                    <a class="footerWidget__social__list__link" href="javascript:void(0)"> <i
                                                            class="fab fa-instagram"></i> </a>
                                                </li>
                                                <li class="footerWidget__social__list__item">
                                                    <a class="footerWidget__social__list__link" href="javascript:void(0)"> <i
                                                            class="fab fa-youtube"></i> </a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3 col-sm-6 mt-4">
                                <div class="footerWidget footer-widget widget">
                                    <h4 class="footerWidget__title">links</h4>
                                    <div class="footerWidget__inner mt-4">
                                        <ul class="footerWidget__list">
                                            <li class="footerWidget__list__item">
                                                <a href="javascript:void(0)">About</a>
                                            </li>
                                            <li class="footerWidget__list__item">
                                                <a href="javascript:void(0)">Contact</a>
                                            </li>
                                            <li class="footerWidget__list__item">
                                                <a href="javascript:void(0)">Career</a>
                                            </li>
                                            <li class="footerWidget__list__item">
                                                <a href="javascript:void(0)">Privacy Policy</a>
                                            </li>
                                            <li class="footerWidget__list__item">
                                                <a href="javascript:void(0)">Terms & Conditions</a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3 col-sm-6 mt-4">
                                <div class="footerWidget footer-widget widget">
                                    <h4 class="footerWidget__title">Services</h4>
                                    <div class="footerWidget__inner mt-4">
                                        <ul class="footerWidget__list">
                                            <li class="footerWidget__list__item">
                                                <a href="javascript:void(0)">Design</a>
                                            </li>
                                            <li class="footerWidget__list__item">
                                                <a href="javascript:void(0)">Development</a>
                                            </li>
                                            <li class="footerWidget__list__item">
                                                <a href="javascript:void(0)">Social Marketing</a>
                                            </li>
                                            <li class="footerWidget__list__item">
                                                <a href="javascript:void(0)">Virtual Assistant</a>
                                            </li>
                                            <li class="footerWidget__list__item">
                                                <a href="javascript:void(0)">Content Writer</a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3 col-sm-6 mt-4">
                                <div class="footerWidget footer-widget widget">
                                    <h4 class="footerWidget__title">Company</h4>
                                    <div class="footerWidget__inner mt-4">
                                        <ul class="footerWidget__list">
                                            <li class="footerWidget__list__item">
                                                <a href="javascript:void(0)">Design</a>
                                            </li>
                                            <li class="footerWidget__list__item">
                                                <a href="javascript:void(0)">Development</a>
                                            </li>
                                            <li class="footerWidget__list__item">
                                                <a href="javascript:void(0)">Social Marketing</a>
                                            </li>
                                            <li class="footerWidget__list__item">
                                                <a href="javascript:void(0)">Virtual Assistant</a>
                                            </li>
                                            <li class="footerWidget__list__item">
                                                <a href="javascript:void(0)">Content Writer</a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="copyrightArea">
                    <div class="default-container">
                        <div class="row">
                            <div class="col-12">
                                <div class="copyrightContents d-flex flex-wrap justify-content-between">
                                    <span class="copyrightContents__main"> © 2024 Xgenious All Rights Reserved. </span>
                                    <span class="copyrightContents__para"> Website by Xgenious </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </footer>
        </div>
		<?php
	}
}

\Elementor\Plugin::instance()->widgets_manager->register( new Xgenious_Footer_Addon() );