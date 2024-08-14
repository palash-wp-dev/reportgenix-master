<?php 
class Xgenious_Footer_Part_Addon extends \Elementor\Widget_Base {

	public function get_name() {
		return 'reportgenix_footer_addon';
	}

	public function get_title() {
		return esc_html__( 'footer', 'elementor-addon' );
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
        <div class="reportgenix-footer-area pt-120">
            <div class="container">
                <div class="footer-area-wraper pb-120">
                    <div class="row g-lg-4 g-sm-5 g-4">
                        <div class="col-lg-4 col-sm-7 ">
                            <div class="footer-widget widget pe-md-5 pe-0 mx-sm-0 mx-3">
                                <div class="footer-contnet-logo">
                                    <a href="javascript:void(0)">
                                        <img src="<?php echo plugins_url('../../../assets/images/reportgenix/brand-logo.png',__FILE__)?>" alt="Reportgenix">
                                    </a>
                                </div>
                                <div class="footer-widget-inner-1">
                                    <div class="footer-widget-pera">
                                        <p>Methods and algorithms to explore Relationships within the data</p>
                                    </div>
                                    <div class="footer-widget-form">
                                        <form action="#" method="get">
                                            <div class="footer-widget-form-input">
                                                <input type="email" name="email" id="email" placeholder="Email Address">
                                                <div class="icon">
                                                    <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path fill-rule="evenodd" clip-rule="evenodd" d="M18.9468 2.74717C19.0068 2.35217 18.8385 1.95634 18.5126 1.72384C18.1868 1.49217 17.7576 1.46301 17.4035 1.64884C14.5693 3.13717 4.65514 8.34217 1.61014 9.94051C1.2343 10.1372 1.01264 10.5388 1.04514 10.9613C1.07764 11.3838 1.35764 11.7472 1.7593 11.8847C2.94514 12.2905 4.3943 12.788 6.6668 13.5672L15.8335 4.99967L8.41514 14.1663C10.8385 14.9972 14.6276 16.2963 15.5785 16.6222C15.876 16.7247 16.2043 16.6888 16.4735 16.5263C16.7426 16.363 16.9251 16.0888 16.9726 15.7772L18.9468 2.74717Z" fill="white"/>
                                                        <path fill-rule="evenodd" clip-rule="evenodd" d="M7.36035 14.6855V17.4105C7.36035 17.8289 7.60618 18.208 7.98702 18.3789C8.36868 18.5505 8.81452 18.4822 9.12702 18.2039L11.492 16.1022L7.36035 14.6855Z" fill="white"/>
                                                    </svg>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-sm-5 ">
                            <div class="footer-widget widget mx-sm-0 mx-3">
                                <div class="footer-widget-title mb-4">
                                    <h4 class="report-fifth-heading">Features</h4>
                                </div>
                                <div class="footer-widget-inner">
                                    <ul>
                                        <li><a href="javasctipt:void(0)">Analytics Dashboard</a></li>
                                        <li><a href="javasctipt:void(0)">AI Integrations</a></li>
                                        <li><a href="javasctipt:void(0)">Custom Report builder</a></li>
                                        <li><a href="javasctipt:void(0)">Create Automations</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-sm-7 ">
                            <div class="footer-widget widget mx-sm-0 mx-3">
                                <div class="footer-widget-title mb-4">
                                    <h4 class="report-fifth-heading">Solutions</h4>
                                </div>
                                <div class="footer-widget-inner">
                                    <ul>
                                        <li><a href="javasctipt:void(0)">Analytics Dashboard</a></li>
                                        <li><a href="javasctipt:void(0)">AI Integrations</a></li>
                                        <li><a href="javasctipt:void(0)">Custom Report builder</a></li>
                                        <li><a href="javasctipt:void(0)">Create Automations</a></li>
                                        <li><a href="javasctipt:void(0)">Integration</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-2 col-sm-5 ">
                            <div class="footer-widget widget mx-sm-0 mx-3">
                                <div class="footer-widget-title mb-4">
                                    <h4 class="report-fifth-heading">Get Help</h4>
                                </div>
                                <div class="footer-widget-inner">
                                    <ul>
                                        <li><a href="javasctipt:void(0)">Documentation</a></li>
                                        <li><a href="javasctipt:void(0)">Guide</a></li>
                                        <li><a href="javasctipt:void(0)">Contact Us</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="copyright-area">
                <div class="container">
                    <div class="copyright-area-wraper">
                        <div class="copyright-left text-center">Copyright &copy; 2023 Cortex. All rights reserved.</div>
                        <div class="copyright-right"><a href="javascript:void(0)" class="me-2">Privacy & Policy</a> <a href="javascript:void(0)">Terms of Service</a></div>
                    </div>
                </div>
            </div>
        </div>
		<?php
	}
}

\Elementor\Plugin::instance()->widgets_manager->register( new Xgenious_Footer_Part_Addon() );