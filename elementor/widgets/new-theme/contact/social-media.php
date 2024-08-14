<?php 
class Xgenious_Social_Media_Addon extends \Elementor\Widget_Base {

	public function get_name() {
		return 'xgenious_social_media_addon';
	}

	public function get_title() {
		return esc_html__( 'social_media', 'elementor-addon' );
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
        <div class="socialMediaArea pat-150 pab-150">
            <div class="default-container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="sectionTitle text-center">
                            <div class="sectionTitle__left">
                                <h2 class="sectionTitle__main">Social Media</h2>
                            </div>
                        </div>
                    </div>
                </div><div class="row">
                    <div class="col-lg-12">
                        <div class="socialMedia">
                            <div class="socialMedia__wrap">
                                <div class="socialMedia__wrap__item">
                                    <div class="socialMedia__item">
                                        <div class="socialMedia__item__icon"><i class="fa-brands fa-dribbble"></i></div>
                                        <h6 class="socialMedia__item__title mt-3">Dribbble</h6>
                                    </div>
                                </div>
                                <div class="socialMedia__wrap__item">
                                    <div class="socialMedia__item">
                                        <div class="socialMedia__item__icon"><i class="fa-brands fa-behance"></i></div>
                                        <h6 class="socialMedia__item__title mt-3">Behance</h6>
                                    </div>
                                </div>
                                <div class="socialMedia__wrap__item">
                                    <div class="socialMedia__item">
                                        <div class="socialMedia__item__icon"><i class="fa-brands fa-instagram"></i></div>
                                        <h6 class="socialMedia__item__title mt-3">Instagram</h6>
                                    </div>
                                </div>
                                <div class="socialMedia__wrap__item">
                                    <div class="socialMedia__item">
                                        <div class="socialMedia__item__icon"><i class="fa-brands fa-twitter"></i></div>
                                        <h6 class="socialMedia__item__title mt-3">Twitter</h6>
                                    </div>
                                </div>
                                <div class="socialMedia__wrap__item">
                                    <div class="socialMedia__item">
                                        <div class="socialMedia__item__icon"><i class="fa-brands fa-linkedin-in"></i></div>
                                        <h6 class="socialMedia__item__title mt-3">Linkedin</h6>
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

\Elementor\Plugin::instance()->widgets_manager->register( new Xgenious_Social_Media_Addon() );