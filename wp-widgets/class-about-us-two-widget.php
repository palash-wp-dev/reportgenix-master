<?php
/**
* HexCoupon fluent shortcode
* @package HexCoupon
* @since 1.0.0
*/
if ( !defined('ABSPATH') ){
    exit(); //exit if access directly
}
class Xgenious_About_Us_Two_Widget extends WP_Widget{
    public function __construct() {
        parent::__construct(
            'xgenious_about_us_two',
            esc_html__('Xgenious: About Us Two','wphex-master'),
            array('description' => esc_html__('Display details of the company.','wphex-master'))
        );
    }
    public function form($instance){
        $title        = isset( $instance['title'] ) ? $instance['title'] : '';
        $image_url    = isset( $instance['image_url'] ) ? $instance['image_url'] : '';
        if (!isset($instance['bf_fluent_form_shortcode'])){
            $instance['bf_fluent_form_shortcode'] = '';
        }
        ?>
        <p>
            <label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"><?php esc_html_e( 'Description:', 'wphex-master' ); ?></label>
            <input type="text" class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'title' ) ) ?>"
                   name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>"
                   value="<?php echo esc_attr( $title ) ?>">
        </p>
        <p>
            <label for="<?php echo esc_attr( $this->get_field_id( 'image_url' ) ); ?>"><?php esc_html_e( 'Upload Image:', 'wphex-master' ); ?></label><br/>
            <input type="text" class="widefat image-upload" id="<?php echo esc_attr( $this->get_field_id( 'image_url' ) ); ?>"
                   name="<?php echo esc_attr( $this->get_field_name( 'image_url' ) ); ?>"
                   value="<?php echo esc_attr( $image_url ); ?>">
            <input type="button" class="button button-primary js-image-upload" value="<?php esc_attr_e( 'Upload Image', 'wphex-master' ); ?>" />
        </p>
        <p>
            <label for="<?php echo esc_attr($this->get_field_name('bf_fluent_form_shortcode'))?>"><?php esc_html_e('Fluent Form Shortcode','wphex-master')?></label>
            <textarea name="<?php echo esc_attr($this->get_field_name('bf_fluent_form_shortcode'))?>" id="<?php echo esc_attr($this->get_field_id('bf_fluent_form_shortcode'))?>" cols="30" class="wphex-form-control" rows="5"><?php echo esc_html($instance['bf_fluent_form_shortcode'])?></textarea>
        </p>
        <?php
    }
    public function widget($args,$instance){
        $title = isset( $instance['title'] ) ? apply_filters( 'widget_title', $instance['title'] ) : '';
        $image_url = isset( $instance['image_url'] ) ? $instance['image_url'] : '';
        // echo '<div class="col-lg-4 col-sm-6">';
        echo wp_kses_post($args['before_widget']);
        $shortcode = ! empty( $instance['bf_fluent_form_shortcode'] ) ? $instance['bf_fluent_form_shortcode'] : '';
        $output = do_shortcode($shortcode);
        ?>
        
        <!-- <img src="<?php echo esc_url( $image_url ); ?>" alt="<?php echo esc_attr( $title ); ?>" class="widget-image" /> -->
        <img src="<?php echo str_replace('/wp-widgets/', '/', plugins_url('xgenious-master/assets/images/reportgenix/brand-logo.png')); ?>" alt="" class="widget-image" />


        
        <p class="footer__para"><?php printf( esc_html__( '%s', 'hexcoupon-theme' ), esc_html( $title ) ); ?></p>
        <div class="footer__form mt-4">
            <div class="footer__form__item">
                <?php echo $output; ?>
            </div>
        </div>
        <?php
        echo wp_kses_post($args['after_widget']);
        // echo '</div>';
    }
    public function update($new_instance, $old_instance){
        $instance = array();
        $instance['title']    = sanitize_text_field( $new_instance['title'] );
        $instance['bf_fluent_form_shortcode'] = sanitize_text_field($new_instance['bf_fluent_form_shortcode']);
        $instance['image_url'] = !empty( $new_instance['image_url'] ) ? esc_url_raw( $new_instance['image_url'] ) : '';
        return $instance;
    }
}
if (!function_exists('Xgenious_About_Us_Two_Widget')){
    function Xgenious_About_Us_Two_Widget(){
        register_widget('Xgenious_About_Us_Two_Widget');
    }
    add_action('widgets_init','Xgenious_About_Us_Two_Widget');
}