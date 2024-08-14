<?php 
class Xgenious_Brand_Logo_Addon extends \Elementor\Widget_Base {

	public function get_name() {
		return 'xgenious_brand_logo_addon';
	}

	public function get_title() {
		return esc_html__( 'Brand-logo', 'elementor-addon' );
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
        <div class="brandLogoArea pat-75 pab-150">
            <div class="default-container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="brandLogo">
                            <div class="brandLogo__item">
                                <div class="brandLogo__thumb"><a href="javascript:void(0)"><img src="<?php echo plugins_url( '../../../assets/images/xgenious-main/brand-logo/brand1.png', __FILE__ )?>" alt="brand1"></a></div>
                            </div>
                            <div class="brandLogo__item">
                                <div class="brandLogo__thumb"><a href="javascript:void(0)"><img src="<?php echo plugins_url( '../../../assets/images/xgenious-main/brand-logo/brand2.png', __FILE__ )?>" alt="brand1"></a></div>
                            </div>
                            <div class="brandLogo__item">
                                <div class="brandLogo__thumb"><a href="javascript:void(0)"><img src="<?php echo plugins_url( '../../../assets/images/xgenious-main/brand-logo/brand3.png', __FILE__ )?>" alt="brand1"></a></div>
                            </div>
                            <div class="brandLogo__item">
                                <div class="brandLogo__thumb"><a href="javascript:void(0)"><img src="<?php echo plugins_url( '../../../assets/images/xgenious-main/brand-logo/brand4.png', __FILE__ )?>" alt="brand1"></a></div>
                            </div>
                            <div class="brandLogo__item">
                                <div class="brandLogo__thumb"><a href="javascript:void(0)"><img src="<?php echo plugins_url( '../../../assets/images/xgenious-main/brand-logo/brand5.jpg', __FILE__ )?>" alt="brand1"></a></div>
                            </div>
                            <div class="brandLogo__item">
                                <div class="brandLogo__thumb"><a href="javascript:void(0)"><img src="<?php echo plugins_url( '../../../assets/images/xgenious-main/brand-logo/brand6.png', __FILE__ )?>" alt="brand1"></a></div>
                            </div>
                            <div class="brandLogo__item">
                                <div class="brandLogo__thumb"><a href="javascript:void(0)"><img src="<?php echo plugins_url( '../../../assets/images/xgenious-main/brand-logo/brand7.png', __FILE__ )?>" alt="brand1"></a></div>
                            </div>
                            <div class="brandLogo__item">
                                <div class="brandLogo__thumb"><a href="javascript:void(0)"><img src="<?php echo plugins_url( '../../../assets/images/xgenious-main/brand-logo/brand8.png', __FILE__ )?>" alt="brand1"></a></div>
                            </div>
                            <div class="brandLogo__item">
                                <div class="brandLogo__thumb"><a href="javascript:void(0)"><img src="<?php echo plugins_url( '../../../assets/images/xgenious-main/brand-logo/brand9.png', __FILE__ )?>" alt="brand1"></a></div>
                            </div>
                            <div class="brandLogo__item">
                                <div class="brandLogo__thumb"><a href="javascript:void(0)"><img src="<?php echo plugins_url( '../../../assets/images/xgenious-main/brand-logo/brand10.png', __FILE__ )?>" alt="brand1"</a>></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
		<?php
	}
}

\Elementor\Plugin::instance()->widgets_manager->register( new Xgenious_Brand_Logo_Addon() );