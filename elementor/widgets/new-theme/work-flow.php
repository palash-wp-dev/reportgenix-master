<?php 
class Xgenious_Work_Flow_Addon extends \Elementor\Widget_Base {

	public function get_name() {
		return 'xgenious_work_flow_addon';
	}

	public function get_title() {
		return esc_html__( 'work-flow', 'elementor-addon' );
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
        <div class="workArea pat-150 pab-75">
            <div class="default-container">
                <div class="sectionTitle">
                    <h2 class="sectionTitle__main">Our Work Flow</h2>
                </div>
                <div class="row g-4 mt-4">
                    <div class="col-lg-12">
                        <div class="scroll-container">
                            <div class="scroll-item">
                                <div class="workItem">
                                    <h5 class="workItem__title">Client Consultation</h5>
                                    <div class="workItem__inner mt-4">
                                        <div class="workItem__inner__list">
                                            <span class="workItem__inner__list__item">Understanding client needs.</span>
                                            <span class="workItem__inner__list__item">Target audience.</span>
                                            <span class="workItem__inner__list__item">Brainstorming sessions.</span>
                                            <span class="workItem__inner__list__item">Gather requirements.</span>
                                        </div>
                                    </div>                            
                                </div>
                            </div>
                            <div class="scroll-item">
                                <div class="workItem">
                                    <h5 class="workItem__title">Project Planning</h5>
                                    <div class="workItem__inner mt-4">
                                        <div class="workItem__inner__list">
                                            <span class="workItem__inner__list__item">Outlining project scope.</span>
                                            <span class="workItem__inner__list__item">Milestones.</span>
                                            <span class="workItem__inner__list__item">Creating a sitemap.</span>
                                            <span class="workItem__inner__list__item">Wireframes.</span>
                                        </div>
                                    </div>                            
                                </div>
                            </div>
                            <div class="scroll-item">
                                <div class="workItem">
                                    <h5 class="workItem__title">Design & Prototype</h5>
                                    <div class="workItem__inner mt-4">
                                        <div class="workItem__inner__list">
                                            <span class="workItem__inner__list__item">Visual layout.</span>
                                            <span class="workItem__inner__list__item">User interface.</span>
                                            <span class="workItem__inner__list__item">Prototypes.</span>
                                            <span class="workItem__inner__list__item">Aesthetics.</span>
                                        </div>
                                    </div>                            
                                </div>
                            </div>
                            <div class="scroll-item">
                                <div class="workItem">
                                    <h5 class="workItem__title">Development & Coding</h5>
                                    <div class="workItem__inner mt-4">
                                        <div class="workItem__inner__list">
                                            <span class="workItem__inner__list__item">Functional websites.</span>
                                            <span class="workItem__inner__list__item">Integrate code.</span>
                                            <span class="workItem__inner__list__item">Build functionalities.</span>
                                            <span class="workItem__inner__list__item">Ensure responsive.</span>
                                        </div>
                                    </div>                            
                                </div>
                            </div>
                            <div class="scroll-item">
                                <div class="workItem">
                                    <h5 class="workItem__title">Continuous testing</h5>
                                    <div class="workItem__inner mt-4">
                                        <div class="workItem__inner__list">
                                            <span class="workItem__inner__list__item">Testing for bugs.</span>
                                            <span class="workItem__inner__list__item">Compatibility check.</span>
                                            <span class="workItem__inner__list__item">Cross-browser compatibility.</span>
                                            <span class="workItem__inner__list__item">Performance optimization.</span>
                                        </div>
                                    </div>                            
                                </div>
                            </div>
                            <div class="scroll-item">
                                <div class="workItem">
                                    <h5 class="workItem__title">Continuous testing</h5>
                                    <div class="workItem__inner mt-4">
                                        <div class="workItem__inner__list">
                                            <span class="workItem__inner__list__item">Deploying the Product.</span>
                                            <span class="workItem__inner__list__item">Post-launch.</span>
                                            <span class="workItem__inner__list__item">Ongoing support.</span>
                                            <span class="workItem__inner__list__item">User feedback.</span>
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

\Elementor\Plugin::instance()->widgets_manager->register( new Xgenious_Work_Flow_Addon() );