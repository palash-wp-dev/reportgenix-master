<?php 
class Xgenious_Blog_Head_Addon extends \Elementor\Widget_Base {

	public function get_name() {
		return 'reportgenix_blog_head_addon';
	}

	public function get_title() {
		return esc_html__( 'blog-head', 'elementor-addon' );
	}

	public function get_icon() {
		return 'eicon-code';
	}

	public function get_categories() {
		return [ 'xgenious_widgets_reportgenix' ];
	}

	public function get_keywords() {
		return [ 'logo'];
	}

	protected function render() {
		?>
        <div class="reportgenix-blog-header pt-120 pb-120" style="background:url('<?php echo plugins_url('../../../../assets/images/reportgenix/BBG1.png',__FILE__)?>')">
            <h1 class="blog-main-heading text-center">Welcome to Reportgenix <span class="d-block text-center">Analytics blog</span></h1>
        </div>

		<?php
	}
}

\Elementor\Plugin::instance()->widgets_manager->register( new Xgenious_Blog_Head_Addon() );