<?php
/**
*  appgenix recent post widget
* @package appgenix
* @since 1.0.0
*/
if ( ! defined( 'ABSPATH' ) ) {
    exit(); //exit if access directly
}
class Xgenious_Link_List_Widget extends WP_Widget {
    public function __construct() {
        parent::__construct(
            'Xgenious_Link_List_Widget',
            esc_html__( 'Xgenious: Link List', 'xgenious-master' ),
            array(
                'description' => esc_html__( 'Display your nav menus in the footer area.', 'xgenious-master' )
            )
        );
    }
    public function widget( $args, $instance ) {
        $title = isset($instance['title']) && !empty($instance['title']) ? $instance['title'] : '';
        $menu = isset($instance['menu']) && !empty($instance['menu']) ? $instance['menu'] : '--';
        echo wp_kses_post( $args['before_widget'] );
        if ( ! empty( $title ) ) {
            echo wp_kses_post( $args['before_title'] ) . esc_html( $title ) . wp_kses_post( $args['after_title'] );
        }
        $nav_args = [
            'menu' => $menu,
            'menu_class' => 'footerWidget__list',
            'container_class' => 'footerWidget__inner mt-4',
            'add_li_class'  => 'footerWidget__list__item'
        ];
        echo wp_nav_menu($nav_args);
        ?>
        <?php
        echo wp_kses_post( $args['after_widget'] );
    }
    public function form( $instance ) {
        //have to create form instance
        if ( ! empty( $instance ) && $instance['title'] ) {
            $title = apply_filters( 'widget_title', $instance['title'] );
        } else {
            $title = esc_html__( 'Footer Navigation Menu', 'xgenious-master' );
        }
        $menu       = ! empty( $instance ) && $instance['menu'] ? $instance['menu'] : 'Select A Menu';
        $all_menus = wp_get_nav_menus();
        ?>
        <p>
            <label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"><?php esc_html_e( 'Title:', 'xgenious-master' ); ?></label>
            <input type="text" class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'title' ) ) ?>"
                   name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>"
                   value="<?php echo esc_attr( $title ) ?>">
        </p>
        <p>
            <label for="<?php echo esc_attr( $this->get_field_id( 'menu' ) ) ?>"><?php esc_html_e( 'menu', 'xgenious-master' ); ?></label>
            <select name="<?php echo esc_attr( $this->get_field_name( 'menu' ) ) ?>" class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'menu' ) ) ?>">
                <?php
                foreach( $all_menus as $nav_menu ) {
//                    $checked = ( $menu->name == $menu->slug ) ? 'selected' : '';
                    printf(
                        '<option value="%1$s" %2$s>%3$s</option>',
                        $nav_menu->slug,
                        selected( $menu, $nav_menu->slug, false ),
                        esc_html( $nav_menu->name )
                    );
                }
                ?>
            </select>
        </p>
        <?php
    }
    public function update( $new_instance, $old_instance ) {
        $instance                = array();
        $instance['menu']       = ( ! empty( $new_instance['menu'] ) ? sanitize_text_field( $new_instance['menu'] ) : '' );
        $instance['title']       = ( ! empty( $new_instance['title'] ) ? sanitize_text_field( $new_instance['title'] ) : '' );
        return $instance;
    }
} // end class
if ( ! function_exists( 'Xgenious_Link_List_Widget' ) ) {
    function Xgenious_Link_List_Widget() {
        register_widget( 'Xgenious_Link_List_Widget' );
    }
    add_action( 'widgets_init', 'Xgenious_Link_List_Widget' );
}