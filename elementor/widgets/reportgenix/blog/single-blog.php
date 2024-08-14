<?php 
class Xgenious_Single_Blog_Addon extends \Elementor\Widget_Base {

	public function get_name() {
		return 'reportgenix_single_blog_addon';
	}

	public function get_title() {
		return esc_html__( 'single-blog', 'elementor-addon' );
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
        <div class="reportgenix-single-blog">
            <div class="single-blog-wraper">
                <div class="blog-head">
                    <img src="<?php echo plugins_url('../../../../assets/images/reportgenix/singleblog01.png',__FILE__)?>" alt="blog-head-img">
                </div>
                <div class="blog-body">
                    <div class="top-section d-flex">
                        <div class="dates me-5 d-flex align-items-center">
                            <img src="<?php echo plugins_url('../../../../assets/images/reportgenix/clock-icon.png',__FILE__)?>" alt="date-icon" class="img-fluid">
                            <span class="date ms-2">22 AUGUST 2023</span>
                        </div>
                        <div class="comments me-5 d-flex align-items-center">
                            <img src="<?php echo plugins_url('../../../../assets/images/reportgenix/chat-icon.png',__FILE__)?>" alt="date-icon">
                            <span class="comment ms-2">03 COMMENTS</span>
                        </div>
                        <div class="tags d-flex align-items-center">
                            <img src="<?php echo plugins_url('../../../../assets/images/reportgenix/tag-icon.png',__FILE__)?>" alt="tag-icon">
                            <span class="tags ms-2">03 COMMENTS</span>
                        </div>
                    </div>
                    <div class="blog-text">
                        <h3 class="blog-heading">Crafting the Future through Strategic Research!</h3>
                        <p class="blog-pera">
                            Harnessing user wisdom is akin to unlocking a treasure trove of insights that have the potential to revolutionize your approach. Through meticulous research, we delve into the nuances of user behavior, preferences, and needs, unveiling valuable perspectives that often remain hidden. This reservoir of knowledge becomes the catalyst for innovation, igniting the spark of creative thinking that propels your offerings beyond the ordinary.
                        </p>
                        <p class="mt-4 mb-4">
                            As a result, innovation becomes not just a possibility but a reality, as your solutions are infused with the essence of what truly resonates with your target audience. This transformative journey doesn't just stop at innovation; it extends to the very heart of user experiences. By aligning your offerings with user expectations,
                        </p>
                        <h4 class="report-third-heading">User Research Your Vision Catalyst!</h4>
                        <p class="mt-4 mb-4">aspirations, and pain points, you elevate these experiences to a level that's both captivating and gratifying. In essence, our research-driven approach isn't just about understanding users; it's about translating that understanding into tangible enhancements that shape success stories, foster growth, and create lasting impact.</p>
                        <div class="image">
                            <div class="row g-4">
                                <div class="col-md-6">
                                    <div class="image">
                                        <img src="<?php echo plugins_url('../../../../assets/images/reportgenix/blog-text01.png',__FILE__)?>" class="img-fluid" alt="blog-image">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="image">
                                        <img src="<?php echo plugins_url('../../../../assets/images/reportgenix/blog-text02.png',__FILE__)?>" class="img-fluid" alt="blog-image">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <h4 class="report-third-heading mt-4">User Journey Mapping</h4>
                        <p class="mt-4 mb-4">
                            User research acts as the catalyst that propels your vision into reality. By diving deep into user perspectives, behaviors, and needs, it provides the essential insights that drive your creative endeavors. Armed with these insights, your vision gains clarity, direction, and the power to resonate 
                        </p>
                        <p class="mt-4 mb-4">
                            authentically with your audience. User research becomes the guiding light that ensures your products, services, and experiences align seamlessly with what your users truly desire. It's not just about understanding your users; it's about leveraging that understanding to bring your vision to life in ways that are impactful,
                        </p>
                        <h4 class="report-third-heading">Heatmaps and Click Tracking</h4>
                        <p class="mt-4 mb-4">
                            Heatmaps and click tracking are analytical tools that visually represent user interactions on digital interfaces. Heatmaps highlight areas where users engage the most (hotspots) through color gradients, indicating the intensity of clicks, taps, or cursor movements. Click tracking records specific interactions, like clicks on buttons, links, or images, providing data on user engagement patterns.
                        </p>
                        <p class="mt-4 mb-4">
                            User research acts as the catalyst that propels your vision into reality. By diving deep into user perspectives, behaviors, and needs, it provides the essential insights that drive your creative endeavors. Armed with these insights, your vision gains clarity, direction, and the power to resonate authentically
                        </p>
                    </div>
                    <div class="bottom-section">
                        <div class="reladetd-tags">
                            <h6 class="report-sixth-heading">Related Tags:</h6>
                            <div class="tags mt-3">
                                <a href="javascript:void(0)" class="tags-btn">Apps</a>
                                <a href="javascript:void(0)" class="tags-btn">Development</a>
                                <a href="javascript:void(0)" class="tags-btn">Design</a>
                            </div>
                        </div>
                        <div class="share-icon">
                            <h6 class="report-sixth-heading">Share:</h6>
                            <div class="social-icon mt-3">
                                <a href="javascript:void(0)">
                                    <svg width="40" height="40" viewBox="0 0 40 40" fill="transparent" xmlns="http://www.w3.org/2000/svg">
                                        <circle cx="20" cy="20" r="19.5" stroke="#374367"/>
                                        <path d="M23.6289 21.625H21.5781V27.75H18.8438V21.625H16.6016V19.1094H18.8438V17.168C18.8438 14.9805 20.1562 13.75 22.1523 13.75C23.1094 13.75 24.1211 13.9414 24.1211 13.9414V16.1016H23C21.9062 16.1016 21.5781 16.7578 21.5781 17.4688V19.1094H24.0117L23.6289 21.625Z" fill="#9BA1B3"/>
                                    </svg>
                                </a>
                                <a href="javascript:void(0)">
                                    <svg width="40" height="40" viewBox="0 0 40 40" fill="transparent" xmlns="http://www.w3.org/2000/svg">
                                        <circle cx="20" cy="20" r="19.5" stroke="#374367"/>
                                        <path d="M25.5508 17.9062C25.5508 18.043 25.5508 18.1523 25.5508 18.2891C25.5508 22.0898 22.6797 26.4375 17.4023 26.4375C15.7617 26.4375 14.2578 25.9727 13 25.1523C13.2188 25.1797 13.4375 25.207 13.6836 25.207C15.0234 25.207 16.2539 24.7422 17.2383 23.9766C15.9805 23.9492 14.9141 23.1289 14.5586 21.9805C14.75 22.0078 14.9141 22.0352 15.1055 22.0352C15.3516 22.0352 15.625 21.9805 15.8438 21.9258C14.5312 21.6523 13.5469 20.5039 13.5469 19.1094V19.082C13.9297 19.3008 14.3945 19.4102 14.8594 19.4375C14.0664 18.918 13.5742 18.043 13.5742 17.0586C13.5742 16.5117 13.7109 16.0195 13.957 15.6094C15.3789 17.332 17.5117 18.4805 19.8906 18.6172C19.8359 18.3984 19.8086 18.1797 19.8086 17.9609C19.8086 16.375 21.0938 15.0898 22.6797 15.0898C23.5 15.0898 24.2383 15.418 24.7852 15.9922C25.4141 15.8555 26.043 15.6094 26.5898 15.2812C26.3711 15.9648 25.9336 16.5117 25.332 16.8672C25.9062 16.8125 26.4805 16.6484 26.9727 16.4297C26.5898 17.0039 26.0977 17.4961 25.5508 17.9062Z" fill="#9BA1B3"/>
                                    </svg>
                                </a>
                                <a href="javascript:void(0)">
                                    <svg width="40" height="40" viewBox="0 0 40 40" fill="transparent" xmlns="http://www.w3.org/2000/svg">
                                        <circle cx="20" cy="20" r="19.5" stroke="#374367"/>
                                        <path d="M16.7344 26H14.1914V17.8242H16.7344V26ZM15.4492 16.7305C14.6562 16.7305 14 16.0469 14 15.2266C14 14.1055 15.2031 13.3945 16.1875 13.9688C16.6523 14.2148 16.9258 14.707 16.9258 15.2266C16.9258 16.0469 16.2695 16.7305 15.4492 16.7305ZM26.2227 26H23.707V22.0352C23.707 21.0781 23.6797 19.875 22.3672 19.875C21.0547 19.875 20.8633 20.8867 20.8633 21.9531V26H18.3203V17.8242H20.7539V18.9453H20.7812C21.1367 18.3164 21.957 17.6328 23.1875 17.6328C25.7578 17.6328 26.25 19.3281 26.25 21.5156V26H26.2227Z" fill="#9BA1B3"/>
                                    </svg>
                                </a>
                                <a href="javascript:void(0)">
                                    <svg width="40" height="40" viewBox="0 0 40 40" fill="transparent" xmlns="http://www.w3.org/2000/svg">
                                        <circle cx="20" cy="20" r="19.5" stroke="#374367"/>
                                        <path d="M26.2227 17.9609C26.168 19.1641 25.3477 20.7773 23.7344 22.8555C22.0664 25.0156 20.6719 26.1094 19.4961 26.1094C18.7852 26.1094 18.1836 25.4531 17.6914 24.1406C16.7344 20.5859 16.3242 18.5352 15.5312 18.5352C15.4219 18.5352 15.1211 18.7266 14.5742 19.1094L14 18.3711C15.3945 17.1133 16.7344 15.7461 17.582 15.6641C18.5391 15.582 19.1406 16.2383 19.3594 17.6328C20.125 22.582 20.4805 23.3477 21.9023 21.0781C22.4219 20.2852 22.6953 19.6562 22.75 19.2461C22.8594 17.9883 21.7656 18.0703 21 18.3984C21.6016 16.4297 22.75 15.4727 24.4453 15.5273C25.7031 15.5547 26.3047 16.375 26.2227 17.9609Z" fill="#9BA1B3"/>
                                    </svg>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
		<?php
	}
}

\Elementor\Plugin::instance()->widgets_manager->register( new Xgenious_Single_Blog_Addon() );