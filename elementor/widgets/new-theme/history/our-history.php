<?php 
class Xgenious_Our_History_Addon extends \Elementor\Widget_Base {

	public function get_name() {
		return 'xgenious_our_history_addon';
	}

	public function get_title() {
		return esc_html__( 'our_history', 'elementor-addon' );
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
        <div class="ourHistoryArea pat-150 pab-75">
            <div class="default-container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="ourHistory__main__thumb">
                            <img src="<?php echo plugins_url( '../../../../assets/images/xgenious-main/history/history-main.jpg', __FILE__ )?>" alt="history">
                        </div>
                    </div>
                </div>
            </div>
        </div>
		<?php
	}
}

\Elementor\Plugin::instance()->widgets_manager->register( new Xgenious_Our_History_Addon() );