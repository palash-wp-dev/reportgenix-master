<?php 
class Xgenious_Blog_Addon extends \Elementor\Widget_Base {

	public function get_name() {
		return 'xgenious_blog_addon';
	}

	public function get_title() {
		return esc_html__( 'blog', 'elementor-addon' );
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
        <div class="blogArea pat-150 pab-150">
            <div class="blogBg">
                <img src="<?php echo plugins_url( '../../../assets/images/xgenious-main/blog/blog_bg.png', __FILE__ )?>" alt="blogBg">
            </div>
            <div class="default-container">
                <div class="sectionTitle d-flex">
                    <div class="sectionTitle__left">
                        <h2 class="sectionTitle__main">Blogs & News</h2>
                    </div>
                    <div class="sectionTitle__right">
                        <div class="btn_wrapper d-flex">
                            <a href="javascript:void(0)" class="xgs_btn btn_bg_1">More blogs</a>
                            <a href="javascript:void(0)" class="xgs_btn btn_bg_1 btn_arrow"><i class="fa-solid fa-arrow-right-long"></i></a>
                        </div>
                    </div>
                </div>
                <div class="row g-4 mt-5">
                    <div class="col-xl-4 col-md-6">
                        <div class="blogItem">
                            <div class="blogItem__thumb">
                                <a href="javascript:void(0)"><img src="<?php echo plugins_url( '../../../assets/images/xgenious-main/blog/blog1.jpg', __FILE__ )?>" alt="blog1"></a>
                            </div>   
                            <div class="blogItem__contents">
                                <h5 class="blogItem__contents__title"><a href="javascript:void(0)">Design Alchemy Merging Tradition with Modern Trend</a></h5>
                                <div class="blogItem__tag mt-4">
                                    <a href="javascript:void(0)" class="blogItem__tag__single">Design</a>
                                </div>
                                <p class="blogItem__contents__date mt-2">Feb 01, 2023</p>
                            </div>                        
                        </div>
                    </div>
                    <div class="col-xl-4 col-md-6">
                        <div class="blogItem">
                            <div class="blogItem__thumb">
                                <a href="javascript:void(0)"><img src="<?php echo plugins_url( '../../../assets/images/xgenious-main/blog/blog2.jpg', __FILE__ )?>" alt="blog2"></a>                                
                            </div>   
                            <div class="blogItem__contents">
                                <h5 class="blogItem__contents__title"><a href="javascript:void(0)">Design Alchemy Merging Tradition with Modern Trend</a></h5>
                                <div class="blogItem__tag mt-4">
                                    <a href="javascript:void(0)" class="blogItem__tag__single">Design</a>
                                </div>
                                <p class="blogItem__contents__date mt-2">Feb 01, 2023</p>
                            </div>                        
                        </div>
                    </div>
                    <div class="col-xl-4 col-md-6">
                        <div class="blogItem">
                            <div class="blogItem__thumb">
                                <a href="javascript:void(0)"><img src="<?php echo plugins_url( '../../../assets/images/xgenious-main/blog/blog3.jpg', __FILE__ )?>" alt="blog3"></a>
                            </div>   
                            <div class="blogItem__contents">
                                <h5 class="blogItem__contents__title"><a href="javascript:void(0)">Design Alchemy Merging Tradition with Modern Trend</a></h5>
                                <div class="blogItem__tag mt-4">
                                    <a href="javascript:void(0)" class="blogItem__tag__single">Design</a>
                                </div>
                                <p class="blogItem__contents__date mt-2">Feb 01, 2023</p>
                            </div>                        
                        </div>
                    </div>
                </div>
            </div>
        </div>
		<?php
	}
}

\Elementor\Plugin::instance()->widgets_manager->register( new Xgenious_Blog_Addon() );