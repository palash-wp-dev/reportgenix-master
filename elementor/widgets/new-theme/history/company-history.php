<?php 
class Xgenious_Company_History_Addon extends \Elementor\Widget_Base {

	public function get_name() {
		return 'xgenious_company_history_addon';
	}

	public function get_title() {
		return esc_html__( 'company_history', 'elementor-addon' );
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
        <div class="companyHistoryArea pat-75 pab-150">
            <div class="default-container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="sectionTitle text-center">
                            <div class="sectionTitle__left">
                                <h2 class="sectionTitle__main">Company History</h2>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row mt-5">
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
                </div>
            </div>
        </div>
		<?php
	}
}

\Elementor\Plugin::instance()->widgets_manager->register( new Xgenious_Company_History_Addon() );