<?php 
class Xgenious_Contact_Form_Addon extends \Elementor\Widget_Base {

	public function get_name() {
		return 'xgenious_contact_form_addon';
	}

	public function get_title() {
		return esc_html__( 'contact_form', 'elementor-addon' );
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
        <div class="contactFormArea pat-150 pab-75">
            <div class="default-container">
                <div class="row g-5">
                    <div class="col-lg-6">
                        <div class="contactForm__left">
                            <div class="sectionTitle text-left">
                                <div class="sectionTitle__left">
                                    <h2 class="sectionTitle__main">Have a Project in  mind?</h2>
                                </div>
                            </div>
                            <div class="contactForm__left__mail">
                                <span class="contactForm__left__mail__subtitle">Email address</span>
                                <h6 class="contactForm__left__mail__title">Contact@xgenious.com</h6>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="contactForm">
                            <div class="row g-4">
                                <div class="col-sm-12">
                                    <div class="contactForm__item">
                                        <label for="name" class="contactForm_title">Full Name</label>
                                        <input type="text" id="name" class="form-control">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="contactForm__item">
                                        <label for="email" class="contactForm_title">Email Address</label>
                                        <input type="text" id="email" class="form-control">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="contactForm__item">
                                        <label for="company" class="contactForm_title">Company Name</label>
                                        <input type="text" id="company" class="form-control">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="contactForm__item">
                                        <label for="company" class="contactForm_title">Select Services</label>
                                        <input type="text" id="company" class="form-control">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="contactForm__item">
                                        <label for="company" class="contactForm_title">Budget range</label>
                                        <input type="text" id="company" class="form-control">
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <div class="contactForm__item">
                                        <label for="textarea" class="contactForm_title">Tell about more idea</label>
                                        <textarea type="text" id="textarea" rows="4" cols="100" class="form-control"></textarea>
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <div class="btn_wrapper">
                                        <a href="javascript:void(0)" class="xgs_btn btn_bg_1">Submit Now</a>
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                <div class="checkbox-inline">
                                    <input class="check-input" type="checkbox" id="accept">
                                    <label class="checkbox-label" for="accept"> I accept the <a href="javascript:void(0)">Privacy Policy</a> </label>
                                </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- <div class="row mt-5">
                    <div class="col-sm-12">
                        <div class="historyItem">
                            <div class="historyItem__wrap">
                                <div class="historyItem__wrap__item">
                                    <span class="historyItem__wrap__item__year">2017</span>
                                    <div class="historyItem__contents">
                                        <div class="historyItem__contents__icon"><i class="fa-solid fa-check"></i></div>
                                        <h4 class="historyItem__contents__title mt-3">Xgenious start in 2017</h4>
                                        <p class="historyItem__contents__para mt-3">Remember tailor information accurately reflect the current status and offerings of Xgenious. If you have specific details or updates</p>
                                    </div>
                                </div>
                                <div class="historyItem__line"></div>
                                <div class="historyItem__thumb">
                                    <img src="<?php echo plugins_url( '../../../../assets/images/xgenious-main/history/history1.jpg', __FILE__ )?>" alt="history">
                                </div>
                            </div>
                        </div>
                        <div class="historyItem">
                            <div class="historyItem__wrap">
                                <div class="historyItem__wrap__item">
                                    <span class="historyItem__wrap__item__year">2018</span>
                                    <div class="historyItem__contents">
                                        <div class="historyItem__contents__icon"><i class="fa-solid fa-check"></i></div>
                                        <h4 class="historyItem__contents__title mt-3">Nexelit 31 July 2020</h4>
                                        <p class="historyItem__contents__para mt-3">Remember tailor information accurately reflect the current status and offerings of Xgenious. If you have specific details or updates</p>
                                    </div>
                                </div>
                                <div class="historyItem__line"></div>
                                <div class="historyItem__thumb">
                                    <img src="<?php echo plugins_url( '../../../../assets/images/xgenious-main/history/history2.jpg', __FILE__ )?>" alt="history">
                                </div>
                            </div>
                        </div>
                        <div class="historyItem">
                            <div class="historyItem__wrap">
                                <div class="historyItem__wrap__item">
                                    <span class="historyItem__wrap__item__year">2019</span>
                                    <div class="historyItem__contents">
                                        <div class="historyItem__contents__icon"><i class="fa-solid fa-check"></i></div>
                                        <h4 class="historyItem__contents__title mt-3">Fundorex 2 August 2021</h4>
                                        <p class="historyItem__contents__para mt-3">Remember tailor information accurately reflect the current status and offerings of Xgenious. If you have specific details or updates</p>
                                    </div>
                                </div>
                                <div class="historyItem__line"></div>
                                <div class="historyItem__thumb">
                                    <img src="<?php echo plugins_url( '../../../../assets/images/xgenious-main/history/history3.jpg', __FILE__ )?>" alt="history">
                                </div>
                            </div>
                        </div>
                        <div class="historyItem">
                            <div class="historyItem__wrap">
                                <div class="historyItem__wrap__item">
                                    <span class="historyItem__wrap__item__year">2020</span>
                                    <div class="historyItem__contents">
                                        <div class="historyItem__contents__icon"><i class="fa-solid fa-check"></i></div>
                                        <h4 class="historyItem__contents__title mt-3">November 22, 2022 New office Setup</h4>
                                        <p class="historyItem__contents__para mt-3">Remember tailor information accurately reflect the current status and offerings of Xgenious.</p>
                                    </div>
                                </div>
                                <div class="historyItem__line"></div>
                                <div class="historyItem__thumb">
                                    <img src="<?php echo plugins_url( '../../../../assets/images/xgenious-main/history/history4.jpg', __FILE__ )?>" alt="history">
                                </div>
                            </div>
                        </div>
                        <div class="historyItem">
                            <div class="historyItem__wrap">
                                <div class="historyItem__wrap__item">
                                    <span class="historyItem__wrap__item__year">2021</span>
                                    <div class="historyItem__contents">
                                        <div class="historyItem__contents__icon"><i class="fa-solid fa-check"></i></div>
                                        <h4 class="historyItem__contents__title mt-3">Nazmart 11 January 2023</h4>
                                        <p class="historyItem__contents__para mt-3">Remember tailor information accurately reflect the current status and offerings of Xgenious. If you have specific details or updates</p>
                                    </div>
                                </div>
                                <div class="historyItem__line"></div>
                                <div class="historyItem__thumb">
                                    <img src="<?php echo plugins_url( '../../../../assets/images/xgenious-main/history/history5.jpg', __FILE__ )?>" alt="history">
                                </div>
                            </div>
                        </div>
                        <div class="historyItem">
                            <div class="historyItem__wrap">
                                <div class="historyItem__wrap__item">
                                    <span class="historyItem__wrap__item__year">2022</span>
                                    <div class="historyItem__contents">
                                        <div class="historyItem__contents__icon"><i class="fa-solid fa-check"></i></div>
                                        <h4 class="historyItem__contents__title mt-3">June 8, 2023 Sponsor Webflow Meetup Dhaka</h4>
                                        <p class="historyItem__contents__para mt-3">Remember tailor information accurately reflect the current status and offerings of Xgenious.</p>
                                    </div>
                                </div>
                                <div class="historyItem__line"></div>
                                <div class="historyItem__thumb">
                                    <img src="<?php echo plugins_url( '../../../../assets/images/xgenious-main/history/history6.jpg', __FILE__ )?>" alt="history">
                                </div>
                            </div>
                        </div>
                        <div class="historyItem">
                            <div class="historyItem__wrap">
                                <div class="historyItem__wrap__item">
                                    <span class="historyItem__wrap__item__year">2023</span>
                                    <div class="historyItem__contents">
                                        <div class="historyItem__contents__icon"><i class="fa-solid fa-check"></i></div>
                                        <h4 class="historyItem__contents__title mt-3">December 22, 2023 5000 sales</h4>
                                        <p class="historyItem__contents__para mt-3">Remember tailor information accurately reflect the current status and offerings of Xgenious.</p>
                                    </div>
                                </div>
                                <div class="historyItem__line"></div>
                                <div class="historyItem__thumb">
                                    <img src="<?php echo plugins_url( '../../../../assets/images/xgenious-main/history/history7.jpg', __FILE__ )?>" alt="history">
                                </div>
                            </div>
                        </div>
                    </div>
                </div> -->
            </div>
        </div>
		<?php
	}
}

\Elementor\Plugin::instance()->widgets_manager->register( new Xgenious_Contact_Form_Addon() );