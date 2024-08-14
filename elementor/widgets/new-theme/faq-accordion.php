<?php 
class Xgenious_Faq_Accordion_Addon extends \Elementor\Widget_Base {

	public function get_name() {
		return 'xgenious_faq_accordion_addon';
	}

	public function get_title() {
		return esc_html__( 'faq-accordion', 'elementor-addon' );
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
        <div class="faqArea pat-150 pab-150">
            <div class="default-container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="sectionTitle white-color">
                            <h2 class="sectionTitle__main">How we can help you?</h2>
                        </div>
                    </div>
                    <div class="col-lg-12 mt-5">
                        <div class="faqContents">
                            <div class="faqContents__item">
                                <div class="faqContents__item__flex">
                                    <div class="faqContents__item__left">
                                        <h4 class="faqContents__item__title">UI/UX Design Mastery</h4>
                                    </div>
                                    <div class="faqContents__item__thumb">
                                        <div class="faqContents__item__thumb__big">
                                            <img src="<?php echo plugins_url( '../../../assets/images/xgenious-main/faq/faq-big1.jpg', __FILE__ )?>" alt="faq-big">
                                        </div>
                                    </div>
                                </div>
                                <div class="faqContents__item__contents">
                                    <p class="faqContents__item__contents__para">UI/UX Design Mastery: Creating Seamless Interactions, Elevating User Experiences.</p>
                                    <div class="faqContents__item__contents__btn">
                                        <div class="btn_wrapper d-flex btn_animation">
                                            <a href="javascript:void(0)" class="xgs_btn btn_bg_1">Learn More</a>
                                            <a href="javascript:void(0)" class="xgs_btn btn_bg_1 btn_arrow"><i class="fa-solid fa-arrow-right-long"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="faqContents__item active open">
                                <div class="faqContents__item__flex">
                                    <div class="faqContents__item__left">
                                        <h4 class="faqContents__item__title">Cutting-Edge Web Solutions</h4>
                                    </div>
                                    <div class="faqContents__item__thumb">
                                        <div class="faqContents__item__thumb__big">
                                            <img src="<?php echo plugins_url( '../../../assets/images/xgenious-main/faq/faq-big1.jpg', __FILE__ )?>" alt="faq-big">
                                        </div>
                                    </div>
                                </div>
                                <div class="faqContents__item__contents">
                                    <p class="faqContents__item__contents__para">UI/UX Design Mastery: Creating Seamless Interactions, Elevating User Experiences.</p>
                                    <div class="faqContents__item__contents__btn">
                                        <div class="btn_wrapper d-flex btn_animation">
                                            <a href="javascript:void(0)" class="xgs_btn btn_bg_1">Learn More</a>
                                            <a href="javascript:void(0)" class="xgs_btn btn_bg_1 btn_arrow"><i class="fa-solid fa-arrow-right-long"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="faqContents__item">
                                <div class="faqContents__item__flex">
                                    <div class="faqContents__item__left">
                                        <h4 class="faqContents__item__title">Mobile App Innovations</h4>
                                    </div>
                                    <div class="faqContents__item__thumb">
                                        <div class="faqContents__item__thumb__big">
                                            <img src="<?php echo plugins_url( '../../../assets/images/xgenious-main/faq/faq-big1.jpg', __FILE__ )?>" alt="faq-big">
                                        </div>
                                    </div>
                                </div>
                                <div class="faqContents__item__contents">
                                    <p class="faqContents__item__contents__para">UI/UX Design Mastery: Creating Seamless Interactions, Elevating User Experiences.</p>
                                    <div class="faqContents__item__contents__btn">
                                        <div class="btn_wrapper d-flex btn_animation">
                                            <a href="javascript:void(0)" class="xgs_btn btn_bg_1">Learn More</a>
                                            <a href="javascript:void(0)" class="xgs_btn btn_bg_1 btn_arrow"><i class="fa-solid fa-arrow-right-long"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="faqContents__item">
                                <div class="faqContents__item__flex">
                                    <div class="faqContents__item__left">
                                        <h4 class="faqContents__item__title">Shopify App Development Hub</h4>
                                    </div>
                                    <div class="faqContents__item__thumb">
                                        <div class="faqContents__item__thumb__big">
                                            <img src="<?php echo plugins_url( '../../../assets/images/xgenious-main/faq/faq-big1.jpg', __FILE__ )?>" alt="faq-big">
                                        </div>
                                    </div>
                                </div>
                                <div class="faqContents__item__contents">
                                    <p class="faqContents__item__contents__para">UI/UX Design Mastery: Creating Seamless Interactions, Elevating User Experiences.</p>
                                    <div class="faqContents__item__contents__btn">
                                        <div class="btn_wrapper d-flex btn_animation">
                                            <a href="javascript:void(0)" class="xgs_btn btn_bg_1">Learn More</a>
                                            <a href="javascript:void(0)" class="xgs_btn btn_bg_1 btn_arrow"><i class="fa-solid fa-arrow-right-long"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="faqContents__item">
                                <div class="faqContents__item__flex">
                                    <div class="faqContents__item__left">
                                        <h4 class="faqContents__item__title">WebFlow Design Dynamics</h4>
                                    </div>
                                    <div class="faqContents__item__thumb">
                                        <div class="faqContents__item__thumb__big">
                                            <img src="<?php echo plugins_url( '../../../assets/images/xgenious-main/faq/faq-big1.jpg', __FILE__ )?>" alt="faq-big">
                                        </div>
                                    </div>
                                </div>
                                <div class="faqContents__item__contents">
                                    <p class="faqContents__item__contents__para">UI/UX Design Mastery: Creating Seamless Interactions, Elevating User Experiences.</p>
                                    <div class="faqContents__item__contents__btn">
                                        <div class="btn_wrapper d-flex btn_animation">
                                            <a href="javascript:void(0)" class="xgs_btn btn_bg_1">Learn More</a>
                                            <a href="javascript:void(0)" class="xgs_btn btn_bg_1 btn_arrow"><i class="fa-solid fa-arrow-right-long"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="faqContents__item">
                                <div class="faqContents__item__flex">
                                    <div class="faqContents__item__left">
                                        <h4 class="faqContents__item__title">WordPress Plugin Solutions</h4>
                                    </div>
                                    <div class="faqContents__item__thumb">
                                        <div class="faqContents__item__thumb__big">
                                            <img src="<?php echo plugins_url( '../../../assets/images/xgenious-main/faq/faq-big1.jpg', __FILE__ )?>" alt="faq-big">
                                        </div>
                                    </div>
                                </div>
                                <div class="faqContents__item__contents">
                                    <p class="faqContents__item__contents__para">UI/UX Design Mastery: Creating Seamless Interactions, Elevating User Experiences.</p>
                                    <div class="faqContents__item__contents__btn">
                                        <div class="btn_wrapper d-flex btn_animation">
                                            <a href="javascript:void(0)" class="xgs_btn btn_bg_1">Learn More</a>
                                            <a href="javascript:void(0)" class="xgs_btn btn_bg_1 btn_arrow"><i class="fa-solid fa-arrow-right-long"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="faqContents__item">
                                <div class="faqContents__item__flex">
                                    <div class="faqContents__item__left">
                                        <h4 class="faqContents__item__title">SaaS Product Development</h4>
                                    </div>
                                    <div class="faqContents__item__thumb">
                                        <div class="faqContents__item__thumb__big">
                                            <img src="<?php echo plugins_url( '../../../assets/images/xgenious-main/faq/faq-big1.jpg', __FILE__ )?>" alt="faq-big">
                                        </div>
                                    </div>
                                </div>
                                <div class="faqContents__item__contents">
                                    <p class="faqContents__item__contents__para">UI/UX Design Mastery: Creating Seamless Interactions, Elevating User Experiences.</p>
                                    <div class="faqContents__item__contents__btn">
                                        <div class="btn_wrapper d-flex btn_animation">
                                            <a href="javascript:void(0)" class="xgs_btn btn_bg_1">Learn More</a>
                                            <a href="javascript:void(0)" class="xgs_btn btn_bg_1 btn_arrow"><i class="fa-solid fa-arrow-right-long"></i></a>
                                        </div>
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

\Elementor\Plugin::instance()->widgets_manager->register( new Xgenious_Faq_Accordion_Addon() );