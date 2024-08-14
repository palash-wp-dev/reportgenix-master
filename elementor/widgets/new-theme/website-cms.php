<?php 
class Xgenious_Website_Cms_Addon extends \Elementor\Widget_Base {

	public function get_name() {
		return 'xgenious_website_cms_addon';
	}

	public function get_title() {
		return esc_html__( 'website-cms', 'elementor-addon' );
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
        <div class="websiteCmsArea pat-75 pab-75">
            <div class="websiteCms__shapeText">
                <img src="<?php echo plugins_url( '../../../assets/images/xgenious-main/website-cms/our-product-text.png', __FILE__ )?>" alt="product">
            </div>
            <div class="default-container">
                <div class="row">
                    <div class="col-lg-12">
                        <ul class="tabs websiteCms__tabs list-style-none">
                            <li class="websiteCms__tabs__list" data-tab="nazmart">
                                <div class="websiteCms__tabs__icon">
                                    <img src="<?php echo plugins_url( '../../../assets/images/xgenious-main/website-cms/cms-logo1.png', __FILE__ )?>" alt="cms_logo1">
                                </div>
                                <span class="websiteCms__tabs__title">Nazmart</span>
                            </li>
                            <li class="websiteCms__tabs__list active" data-tab="Nexelit">
                                <div class="websiteCms__tabs__icon">
                                    <img src="<?php echo plugins_url( '../../../assets/images/xgenious-main/website-cms/cms-logo2.png', __FILE__ )?>" alt="cms_logo2">
                                </div>
                                <span class="websiteCms__tabs__title">Nexelit</span>
                            </li>
                            <li class="websiteCms__tabs__list" data-tab="Fundorex">
                                <div class="websiteCms__tabs__icon">
                                    <img src="<?php echo plugins_url( '../../../assets/images/xgenious-main/website-cms/cms-logo3.png', __FILE__ )?>" alt="cms_logo1">
                                </div>
                                <span class="websiteCms__tabs__title">Fundorex</span>
                            </li>
                            <li class="websiteCms__tabs__list" data-tab="Grenmart">
                                <div class="websiteCms__tabs__icon">
                                    <img src="<?php echo plugins_url( '../../../assets/images/xgenious-main/website-cms/cms-logo4.png', __FILE__ )?>" alt="cms_logo1">
                                </div>
                                <span class="websiteCms__tabs__title">Grenmart</span>
                            </li>
                            <li class="websiteCms__tabs__list" data-tab="Xilancer">
                                <div class="websiteCms__tabs__icon">
                                    <img src="<?php echo plugins_url( '../../../assets/images/xgenious-main/website-cms/cms-logo5.png', __FILE__ )?>" alt="cms_logo1">
                                </div>
                                <span class="websiteCms__tabs__title">Xilancer</span>
                            </li>
                            <li class="websiteCms__tabs__list" data-tab="Dizzcox">
                                <div class="websiteCms__tabs__icon">
                                    <img src="<?php echo plugins_url( '../../../assets/images/xgenious-main/website-cms/cms-logo6.png', __FILE__ )?>" alt="cms_logo1">
                                </div>
                                <span class="websiteCms__tabs__title">Dizzcox</span>
                            </li>
                            <li class="websiteCms__tabs__list" data-tab="Qixer">
                                <div class="websiteCms__tabs__icon">
                                    <img src="<?php echo plugins_url( '../../../assets/images/xgenious-main/website-cms/cms-logo7.png', __FILE__ )?>" alt="cms_logo1">
                                </div>
                                <span class="websiteCms__tabs__title">Qixer</span>
                            </li>
                            <li class="websiteCms__tabs__list" data-tab="Multisass">
                                <div class="websiteCms__tabs__icon">
                                    <img src="<?php echo plugins_url( '../../../assets/images/xgenious-main/website-cms/cms-logo8.png', __FILE__ )?>" alt="cms_logo1">
                                </div>
                                <span class="websiteCms__tabs__title">Multisass</span>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="websiteCms__wrapper mt-4">
                    <div class="tab-content-item" id="nazmart">
                        <div class="row g-4">
                            <div class="col-lg-6">
                                <div class="websiteCmsContents">
                                    <div class="sectionTitle sectionTitle__small">
                                        <h2 class="sectionTitle__main">Nazmart - Multipurpose Website CMS</h2>
                                        <p class="sectionTitle__para">Welcome to our web development studio, where every line of code is crafted with precision and every</p>
                                    </div>
                                    <div class="websiteCmsContents__list mt-4">
                                        <span class="websiteCmsContents__list__item">Leading Technologies Future-Ready Solutions</span>
                                        <span class="websiteCmsContents__list__item">Collaboration and Communication</span>
                                        <span class="websiteCmsContents__list__item">Creative Design Excellence</span>
                                    </div>
                                    <div class="websiteCmsContents__btn btn_wrapper mt-4">
                                        <a href="javascript:void(0)" class="xgs_btn btn_bg_1">Sign up for offer</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="websiteCms__thumb">
                                    <img src="<?php echo plugins_url( '../../../assets/images/xgenious-main/website-cms/cms.jpg', __FILE__ )?>" alt="cms">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-content-item active" id="Nexelit">
                        <div class="row g-4">
                            <div class="col-lg-6">
                                <div class="websiteCmsContents">
                                    <div class="sectionTitle sectionTitle__small">
                                        <h2 class="sectionTitle__main">Nexelit - Multipurpose Website CMS</h2>
                                        <p class="sectionTitle__para">Welcome to our web development studio, where every line of code is crafted with precision and every</p>
                                    </div>
                                    <div class="websiteCmsContents__list mt-4">
                                        <span class="websiteCmsContents__list__item">Leading Technologies Future-Ready Solutions</span>
                                        <span class="websiteCmsContents__list__item">Collaboration and Communication</span>
                                        <span class="websiteCmsContents__list__item">Creative Design Excellence</span>
                                    </div>
                                    <div class="websiteCmsContents__btn btn_wrapper mt-4">
                                        <a href="javascript:void(0)" class="xgs_btn btn_bg_1">Sign up for offer</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="websiteCms__thumb">
                                    <img src="<?php echo plugins_url( '../../../assets/images/xgenious-main/website-cms/cms.jpg', __FILE__ )?>" alt="cms">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-content-item" id="Fundorex">
                        <div class="row g-4">
                            <div class="col-lg-6">
                                <div class="websiteCmsContents">
                                    <div class="sectionTitle sectionTitle__small">
                                        <h2 class="sectionTitle__main">Fundorex - Multipurpose Website CMS</h2>
                                        <p class="sectionTitle__para">Welcome to our web development studio, where every line of code is crafted with precision and every</p>
                                    </div>
                                    <div class="websiteCmsContents__list mt-4">
                                        <span class="websiteCmsContents__list__item">Leading Technologies Future-Ready Solutions</span>
                                        <span class="websiteCmsContents__list__item">Collaboration and Communication</span>
                                        <span class="websiteCmsContents__list__item">Creative Design Excellence</span>
                                    </div>
                                    <div class="websiteCmsContents__btn btn_wrapper mt-4">
                                        <a href="javascript:void(0)" class="xgs_btn btn_bg_1">Sign up for offer</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="websiteCms__thumb">
                                    <img src="<?php echo plugins_url( '../../../assets/images/xgenious-main/website-cms/cms.jpg', __FILE__ )?>" alt="cms">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-content-item" id="Grenmart">
                        <div class="row g-4">
                            <div class="col-lg-6">
                                <div class="websiteCmsContents">
                                    <div class="sectionTitle sectionTitle__small">
                                        <h2 class="sectionTitle__main">Grenmart - Multipurpose Website CMS</h2>
                                        <p class="sectionTitle__para">Welcome to our web development studio, where every line of code is crafted with precision and every</p>
                                    </div>
                                    <div class="websiteCmsContents__list mt-4">
                                        <span class="websiteCmsContents__list__item">Leading Technologies Future-Ready Solutions</span>
                                        <span class="websiteCmsContents__list__item">Collaboration and Communication</span>
                                        <span class="websiteCmsContents__list__item">Creative Design Excellence</span>
                                    </div>
                                    <div class="websiteCmsContents__btn btn_wrapper mt-4">
                                        <a href="javascript:void(0)" class="xgs_btn btn_bg_1">Sign up for offer</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="websiteCms__thumb">
                                    <img src="<?php echo plugins_url( '../../../assets/images/xgenious-main/website-cms/cms.jpg', __FILE__ )?>" alt="cms">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-content-item" id="Xilancer">
                        <div class="row g-4">
                            <div class="col-lg-6">
                                <div class="websiteCmsContents">
                                    <div class="sectionTitle sectionTitle__small">
                                        <h2 class="sectionTitle__main">Xilancer - Multipurpose Website CMS</h2>
                                        <p class="sectionTitle__para">Welcome to our web development studio, where every line of code is crafted with precision and every</p>
                                    </div>
                                    <div class="websiteCmsContents__list mt-4">
                                        <span class="websiteCmsContents__list__item">Leading Technologies Future-Ready Solutions</span>
                                        <span class="websiteCmsContents__list__item">Collaboration and Communication</span>
                                        <span class="websiteCmsContents__list__item">Creative Design Excellence</span>
                                    </div>
                                    <div class="websiteCmsContents__btn btn_wrapper mt-4">
                                        <a href="javascript:void(0)" class="xgs_btn btn_bg_1">Sign up for offer</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="websiteCms__thumb">
                                    <img src="<?php echo plugins_url( '../../../assets/images/xgenious-main/website-cms/cms.jpg', __FILE__ )?>" alt="cms">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-content-item" id="Dizzcox">
                        <div class="row g-4">
                            <div class="col-lg-6">
                                <div class="websiteCmsContents">
                                    <div class="sectionTitle sectionTitle__small">
                                        <h2 class="sectionTitle__main">Dizzcox - Multipurpose Website CMS</h2>
                                        <p class="sectionTitle__para">Welcome to our web development studio, where every line of code is crafted with precision and every</p>
                                    </div>
                                    <div class="websiteCmsContents__list mt-4">
                                        <span class="websiteCmsContents__list__item">Leading Technologies Future-Ready Solutions</span>
                                        <span class="websiteCmsContents__list__item">Collaboration and Communication</span>
                                        <span class="websiteCmsContents__list__item">Creative Design Excellence</span>
                                    </div>
                                    <div class="websiteCmsContents__btn btn_wrapper mt-4">
                                        <a href="javascript:void(0)" class="xgs_btn btn_bg_1">Sign up for offer</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="websiteCms__thumb">
                                    <img src="<?php echo plugins_url( '../../../assets/images/xgenious-main/website-cms/cms.jpg', __FILE__ )?>" alt="cms">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-content-item" id="Qixer">
                        <div class="row g-4">
                            <div class="col-lg-6">
                                <div class="websiteCmsContents">
                                    <div class="sectionTitle sectionTitle__small">
                                        <h2 class="sectionTitle__main">Qixer - Multipurpose Website CMS</h2>
                                        <p class="sectionTitle__para">Welcome to our web development studio, where every line of code is crafted with precision and every</p>
                                    </div>
                                    <div class="websiteCmsContents__list mt-4">
                                        <span class="websiteCmsContents__list__item">Leading Technologies Future-Ready Solutions</span>
                                        <span class="websiteCmsContents__list__item">Collaboration and Communication</span>
                                        <span class="websiteCmsContents__list__item">Creative Design Excellence</span>
                                    </div>
                                    <div class="websiteCmsContents__btn btn_wrapper mt-4">
                                        <a href="javascript:void(0)" class="xgs_btn btn_bg_1">Sign up for offer</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="websiteCms__thumb">
                                    <img src="<?php echo plugins_url( '../../../assets/images/xgenious-main/website-cms/cms.jpg', __FILE__ )?>" alt="cms">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-content-item" id="Multisass">
                        <div class="row g-4">
                            <div class="col-lg-6">
                                <div class="websiteCmsContents">
                                    <div class="sectionTitle sectionTitle__small">
                                        <h2 class="sectionTitle__main">Multisass - Multipurpose Website CMS</h2>
                                        <p class="sectionTitle__para">Welcome to our web development studio, where every line of code is crafted with precision and every</p>
                                    </div>
                                    <div class="websiteCmsContents__list mt-4">
                                        <span class="websiteCmsContents__list__item">Leading Technologies Future-Ready Solutions</span>
                                        <span class="websiteCmsContents__list__item">Collaboration and Communication</span>
                                        <span class="websiteCmsContents__list__item">Creative Design Excellence</span>
                                    </div>
                                    <div class="websiteCmsContents__btn btn_wrapper mt-4">
                                        <a href="javascript:void(0)" class="xgs_btn btn_bg_1">Sign up for offer</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="websiteCms__thumb">
                                    <img src="<?php echo plugins_url( '../../../assets/images/xgenious-main/website-cms/cms.jpg', __FILE__ )?>" alt="cms">
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

\Elementor\Plugin::instance()->widgets_manager->register( new Xgenious_Website_Cms_Addon() );