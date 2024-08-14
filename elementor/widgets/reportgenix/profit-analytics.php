<?php 
class Xgenious_Profit_Analytics_Addon extends \Elementor\Widget_Base {

	public function get_name() {
		return 'reportgenix_profit_analytics_addon';
	}

	public function get_title() {
		return esc_html__( 'profit-analytics', 'elementor-addon' );
	}

	public function get_icon() {
		return 'eicon-code';
	}

	public function get_categories() {
		return [ 'xgenious_widgets_reportgenix' ];
	}

	public function get_keywords() {
		return [ 'banner'];
	}

	protected function render() {
		?>
        <div class="profit-analytics pt-120 pb-60">
            <div class="container">
                <div class="report-analytics-wraper">
                    <div class="row g-5">
                        <div class="col-lg-5 px-lg-0">
                            <h2 class="report-second-heading mb-40">Profit Analytics <span class="d-block">What is your total revenue?</span></h2>
                            <div class="accordians accordion-flush" id="profitaccordion"> 
                                <div class="accordian-items">
                                    <h3 class="report-third-heading collapsed" data-bs-toggle="collapse"  data-bs-target="#profitCollapseOne">
                                        Track your real-time profit & loss
                                    </h3>
                                    <div class="accordion-collapse collapse" id="profitCollapseOne" data-bs-parent="#profitaccordion">
                                        <p> Refers to the capability of monitoring and assessing Financial performance, specifically focusing</p>
                                    </div>
                                </div>
                                <div class="accordian-items">
                                    <h3 class="report-third-heading collapsed" data-bs-toggle="collapse" data-bs-target="#profitCollapsetwo">
                                        Track your Cost of goods sold
                                    </h3>
                                    <div class="accordion-collapse collapse" id="profitCollapsetwo" data-bs-parent="#profitaccordion">
                                        <p> Refers to the capability of monitoring and assessing Financial performance, specifically focusing</p>
                                    </div>
                                </div>
                                <div class="accordian-items">
                                    <h3 class="report-third-heading collapsed" data-bs-toggle="collapse" data-bs-target="#profitCollapseThree">
                                        Track all other costs
                                    </h3>
                                    <div class="accordion-collapse collapse" id="profitCollapseThree" data-bs-parent="#profitaccordion">
                                        <p> Refers to the capability of monitoring and assessing Financial performance, specifically focusing</p>
                                    </div>
                                </div>
                            </div>
                        </div> 
                        <div class="col-lg-7 ps-lg-5">
                            <div class="image">
                                <img src="<?php echo plugins_url('../../../assets/images/reportgenix/profit-analytic.png',__FILE__)?>" alt="Profile Analytics">
                            </div>
                        </div> 
                    </div>             
                </div>
            </div>
        </div>
		<?php
	}
}

\Elementor\Plugin::instance()->widgets_manager->register( new Xgenious_Profit_Analytics_Addon() );