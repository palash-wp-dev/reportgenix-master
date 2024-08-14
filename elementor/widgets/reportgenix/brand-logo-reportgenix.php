<?php 
class Xgenious_Brand_Logos_Addon extends \Elementor\Widget_Base {

	public function get_name() {
		return 'reportgenix_brand_logo_addon';
	}

	public function get_title() {
		return esc_html__( 'Brand Logo', 'elementor-addon' );
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

    protected function register_controls() {

        $this->start_controls_section(
            'content_section',
            [
                'label' => esc_html__( 'Content', 'xgenious' ),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'list',
            [
                'label' => esc_html__( 'Repeater List', 'xgenious' ),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => [
                    [
                        'name' => 'brand_logo',
                        'label' => esc_html__( 'Choose Brand Logo', 'xgenious' ),
                        'type' => \Elementor\Controls_Manager::MEDIA,
                        'default' => [
                            'url' => \Elementor\Utils::get_placeholder_image_src(),
                        ],
                    ],
                ],
            ]
        );

        $this->end_controls_section();

    }

	protected function render() {
        $settings = $this->get_settings_for_display();
		?>
        <div>
            <div class="reportgenix-brand-logos-part pt-60 pb-60">
				<div class="reportgenix-brand-logo">
					<div class="reportgenix-brand-logo-slick">
                        <?php if ( $settings['list'] ) : foreach ( $settings['list'] as $item ) : ?>
						<div class="items">
							<img src="<?php echo esc_url( $item['brand_logo']['url'] ); ?>" alt="Brand Logo">
						</div>
						<?php endforeach; endif; ?>
					</div>
					<div class="reportgenix-brand-logo-slick">
                        <?php if ( $settings['list'] ) : foreach ( $settings['list'] as $item ) : ?>
						<div class="items">
							<img src="<?php echo esc_url( $item['brand_logo']['url'] ); ?>" alt="Brand Logo">
						</div>
						<?php endforeach; endif; ?>
					</div>
				</div>
			</div>
        </div>
		<?php
	}
}

\Elementor\Plugin::instance()->widgets_manager->register( new Xgenious_Brand_Logos_Addon() );