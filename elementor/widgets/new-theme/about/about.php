<?php 
class Xgenious_About_Addon extends \Elementor\Widget_Base {

	public function get_name() {
		return 'xgenious_about_addon';
	}

	public function get_title() {
		return esc_html__( 'about', 'elementor-addon' );
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
        <div class="aboutArea pat-150 pab-75">
            <div class="default-container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="aboutContents">
                            <div class="aboutContents__thumb">
                                <img src="<?php echo plugins_url( '../../../../assets/images/xgenious-main/about/about-main.jpg', __FILE__ )?>" alt="about1">
                            </div>
                            <div class="aboutContents__inner mt-4">
                                <div class="sectionTitle text-left">
                                    <div class="sectionTitle__left">
                                        <h2 class="sectionTitle__main">Inspiring projects We Have Worked on</h2>
                                    </div>
                                </div>
                                <div class="aboutContents__flex mt-4">
                                    <div class="aboutContents__left">
                                        <div class="aboutContents__left__thumb">
                                            <img src="<?php echo plugins_url( '../../../../assets/images/xgenious-main/about/about-experience.png', __FILE__ )?>" alt="experience">
                                            <h5 class="aboutContents__left__thumb__title">05+</h5>
                                        </div>
                                    </div>
                                    <div class="aboutContents__right">
                                        <p class="aboutContents__para">Welcome to Xgenious, founded by a passionate tech wizards. Our journey began with a simple mission: to transform the digital landscape one pixel at a time. Our portfolio is a tapestry of success stories, each woven with precision, creativity, and a deep understanding of our clients' visions. At Xgenious, we don't just build websites and apps; we engineer digital dreams into reality. Join us in this exciting adventure, where your ideas are the blueprint and our expertise is the tool to build your digital future.</p>
                                        <div class="btn_wrapper d-flex mt-4">
                                            <a href="javascript:void(0)" class="xgs_btn btn_bg_1">Contact with Us</a>
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

\Elementor\Plugin::instance()->widgets_manager->register( new Xgenious_About_Addon() );