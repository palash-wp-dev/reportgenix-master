<?php 
class Xgenious_Testimonial_Addon extends \Elementor\Widget_Base {

	public function get_name() {
		return 'xgenious_testimonial_addon';
	}

	public function get_title() {
		return esc_html__( 'testimonial', 'elementor-addon' );
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
        <div class="testimonialArea pat-75 pab-150">
            <div class="testimonial__shapeText">
                <img src="<?php echo plugins_url( '../../../assets/images/xgenious-main/testimonial/testimonial-review-text.png', __FILE__ )?>" alt="product">
            </div>
            <div class="default-container">
                <div class="row g-4">
                    <div class="col-lg-6">
                        <div class="testimonialItem">
                            <div class="testimonialItem__review">
                                <span class="icon"><i class="fa-solid fa-star"></i></span>
                                <span class="icon"><i class="fa-solid fa-star"></i></span>
                                <span class="icon"><i class="fa-solid fa-star"></i></span>
                                <span class="icon"><i class="fa-solid fa-star"></i></span>
                                <span class="icon"><i class="fa-solid fa-star"></i></span>
                            </div>
                            <p class="testimonialItem__para mt-3">Web development ynamic field that evolves with technological advancements. requires collaboration between front-end and back-end developers designers other stakeholders to create web solutions that meet</p>
                            <div class="testimonialItem__author">
                                <div class="testimonialItem__author__left">
                                    <div class="testimonialItem__author__thumb">
                                        <img src="<?php echo plugins_url( '../../../assets/images/xgenious-main/testimonial/author1.jpg', __FILE__ )?>" alt="author1">
                                    </div>
                                    <div class="testimonialItem__author__contents">
                                        <h6 class="testimonialItem__author__name">Antonio Lewis</h6>
                                        <span class="testimonialItem__author__subtitle">UX Designer</span>
                                    </div>
                                </div>
                                <div class="testimonialItem__author__right">
                                    <div class="testimonialItem__author__right__logo">
                                        <img src="<?php echo plugins_url( '../../../assets/images/xgenious-main/testimonial/author-logo1.png', __FILE__ )?>" alt="">
                                    </div>
                                </div>
                            </div>                            
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="testimonialItem">
                            <div class="testimonialItem__review">
                                <span class="icon"><i class="fa-solid fa-star"></i></span>
                                <span class="icon"><i class="fa-solid fa-star"></i></span>
                                <span class="icon"><i class="fa-solid fa-star"></i></span>
                                <span class="icon"><i class="fa-solid fa-star"></i></span>
                                <span class="icon"><i class="fa-solid fa-star"></i></span>
                            </div>
                            <p class="testimonialItem__para mt-3">Web development ynamic field that evolves with technological advancements. requires collaboration between front-end and back-end developers designers other stakeholders to create web solutions that meet</p>
                            <div class="testimonialItem__author">
                                <div class="testimonialItem__author__left">
                                    <div class="testimonialItem__author__thumb">
                                        <img src="<?php echo plugins_url( '../../../assets/images/xgenious-main/testimonial/author2.jpg', __FILE__ )?>" alt="author2">
                                        
                                    </div>
                                    <div class="testimonialItem__author__contents">
                                        <h6 class="testimonialItem__author__name">Aidan Harold</h6>
                                        <span class="testimonialItem__author__subtitle">UX Designer</span>
                                    </div>
                                </div>
                                <div class="testimonialItem__author__right">
                                    <div class="testimonialItem__author__right__logo">
                                        <img src="<?php echo plugins_url( '../../../assets/images/xgenious-main/testimonial/author-logo2.png', __FILE__ )?>" alt="trustpilot">
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

\Elementor\Plugin::instance()->widgets_manager->register( new Xgenious_Testimonial_Addon() );