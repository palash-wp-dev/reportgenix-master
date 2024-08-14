<?php 
class Xgenious_lifeItem_Addon extends \Elementor\Widget_Base {

	public function get_name() {
		return 'xgenious_life_xgenious_addon';
	}

	public function get_title() {
		return esc_html__( 'life-xgenious', 'elementor-addon' );
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
        <div class="lifeArea xgs-bg-2 pat-150 pab-150">
            <div class="sectionTitle white-color text-center">
                <h2 class="sectionTitle__main">Life at Xgenious</h2>
            </div>
            <div class="default-container-dfadfsdf">
                <div class="row align-items-center g-4 mt-4">
                    <div class="col-sm-6 col-lg-3">
                        <div class="lifeItem">
                            <div class="lifeItem__thumb">
                                <img src="<?php echo plugins_url( '../../../../assets/images/xgenious-main/about/life1.jpg', __FILE__ )?>" alt="life">
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-lg-3">
                        <div class="lifeItem">
                            <div class="lifeItem__thumb">
                                <img src="<?php echo plugins_url( '../../../../assets/images/xgenious-main/about/life2.jpg', __FILE__ )?>" alt="life">
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-lg-3">
                        <div class="lifeItem">
                            <div class="lifeItem__thumb">
                                <img src="<?php echo plugins_url( '../../../../assets/images/xgenious-main/about/life3.jpg', __FILE__ )?>" alt="life">
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-lg-3">
                        <div class="lifeItem">
                            <div class="lifeItem__thumb">
                                <img src="<?php echo plugins_url( '../../../../assets/images/xgenious-main/about/life4.jpg', __FILE__ )?>" alt="life">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
		<?php
	}
}

\Elementor\Plugin::instance()->widgets_manager->register( new Xgenious_lifeItem_Addon() );