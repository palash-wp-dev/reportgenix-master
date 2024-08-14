<?php
/*
 * @package Xgenious
 * @since 1.0.0
 * */

if ( !defined('ABSPATH') ){
	exit(); // exit if access directly
}


if ( !class_exists('Xgenious_Master_shortcodes') ){

	class Xgenious_Master_shortcodes{

		/*
		* $instance
		* @since 1.0.0
		* */
		private static $instance;

		/**
		* construct()
		* @since 1.0.0
		* */
		public function __construct() {
		    
			//edd login extended
			add_shortcode('edd_login_xgenious',array($this,'xgenious_edd_login'));
			
			
			//social post share
			add_shortcode('xgenious_post_share',array($this,'post_share'));

			//info_item
			add_shortcode('xgenious_info_item_wrap',array(__CLASS__,'info_item_wrap'));
			add_shortcode('xgenious_info_link',array(__CLASS__,'info_link'));
			add_shortcode('xgenious_info_inline_text',array(__CLASS__,'info_inline_text'));

			//info item two
			add_shortcode('xgenious_info_item_two_wrap',array(__CLASS__,'info_item_two_wrap'));
			add_shortcode('xgenious_info_item_two',array(__CLASS__,'info_item_two'));
			//info item two
			add_shortcode('xgenious_info_text_wrap',array(__CLASS__,'info_text_wrap'));
			add_shortcode('xgenious_info_text_item',array(__CLASS__,'info_text_item'));
		}

		/**
	   * getInstance()
	   * @since 1.0.0
	   * */
		public static function getInstance(){
			if ( null == self::$instance ){
				self::$instance = new self();
			}
			return self::$instance;
		}

		/**
		 * Shortcode :: dizzcox_post_share
		 * @since 1.0.0
		 * */
		public static function post_share($atts, $content = null){

			extract(shortcode_atts(array(
				'custom_class' => '',
			),$atts));

			global $post;
			$output = '';

			if ( is_singular() || is_home() ){

				//get current page url
				$xgenious_url = urlencode_deep(get_permalink());
				//get current page title
				$xgenious_title = str_replace(' ','%20',get_the_title($post->ID));
				//get post thumbnail for pinterest
				$xgenious_thumbnail = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID),'full');

				//all social share link generate
				$facebook_share_link = 'https://www.facebook.com/sharer/sharer.php?u='.$xgenious_url;
				$twitter_share_link = 'https://twitter.com/intent/tweet?text='.$xgenious_title.'&amp;url='.$xgenious_url.'&amp;via=xgenious1';
				$linkedin_share_link = 'https://www.linkedin.com/shareArticle?mini=true&url='.$xgenious_url.'&amp;title='.$xgenious_title;
				$xgenious_thumbnail_url = $xgenious_thumbnail[0] ?? '';
				$pinterest_share_link = 'https://pinterest.com/pin/create/button/?url='.$xgenious_url.'&amp;media='.$xgenious_thumbnail_url.'&amp;description='.$xgenious_title;

                $output .='<ul class="social-share">';
                $output .='<li class="title">'.esc_html__('Share:','xgenious').'</li>';
                $output .='<li><a class="facebook" href="'.esc_url($facebook_share_link).'"><i class="fa fa-facebook-f"></i></a></li>';
                $output .='<li><a class="twitter" href="'.esc_url($twitter_share_link).'"><i class="fa fa-twitter"></i></a></li>';
                $output .='<li><a class="linkedin" href="'.esc_url($linkedin_share_link).'"><i class="fa fa-linkedin"></i></a></li>';
                $output .='<li><a class="pinterest" href="'.esc_url($pinterest_share_link).'"><i class="fa fa-pinterest-p"></i></a></li>';
                $output .='</ul>';

				return $output;

			}
		}

		/**
		 * info item two wrap
		 * @sicne 1.0.0
		 * */
		public static function info_item_two_wrap($atts,$content = null){
			extract(shortcode_atts(array(
				'custom_class' => '',
			),$atts));
			ob_start();?>
			<ul class="info-items-icon <?php echo esc_attr($custom_class);?>">
				<?php echo do_shortcode($content);?>
			</ul>
			<?php
			return ob_get_clean();
		}

		/**
		 * info item wrap
		 * @sicne 1.0.0
		 * */ 
		public static function info_item_wrap($atts,$content = null){
			extract(shortcode_atts(array(
				'custom_class' => '',
			),$atts));
			ob_start();?>
			<ul class="info-items <?php echo esc_attr($custom_class);?>">
				<?php echo do_shortcode($content);?>
			</ul>
			<?php
			return ob_get_clean();
		}
		/**
		 * info item two wrap
		 * @sicne 1.0.0
		 * */
		public static function info_text_wrap($atts,$content = null){
			extract(shortcode_atts(array(
				'custom_class' => '',
			),$atts));
			ob_start();?>
			<ul class="info-items-text <?php echo esc_attr($custom_class);?>">
				<?php echo do_shortcode($content);?>
			</ul>
			<?php
			return ob_get_clean();
		}


		/**
		 * Info Item link
		 * @since 1.0.0
		 * */
		public static function info_link($atts, $content = null){
			extract(shortcode_atts(array(
				'icon' => '',
				'text' => '',
				'url' => ''
			),$atts));

			$icon = (!empty($icon)) ? ' <i class="'.esc_attr($icon).'"></i> ' : '';
			ob_start();

			?>
			<li><a href="<?php echo esc_url($url)?>"><?php echo wp_kses_post($icon);?> <?php echo esc_html($text);?></a></li>
			<?php
			return ob_get_clean();
		}

		/**
		 * Info Item link
		 * @since 1.0.0
		 * */
		public static function info_item_two($atts, $content = null){
			extract(shortcode_atts(array(
				'icon' => '',
				'text' => '',
				'url' => ''
			),$atts));

			$icon = (!empty($icon)) ? ' <i class="'.esc_attr($icon).'"></i> ' : '';
			ob_start();

			?>
			<li><a href="<?php echo esc_url($url)?>" title="<?php echo esc_html($text);?>"><?php echo wp_kses_post($icon);?> </a></li>
			<?php
			return ob_get_clean();
		}

		/**
		 * Info text with link
		 * @sicne 1.0.0
		 * */
		public static function info_inline_text($atts,$content = null){
			extract(shortcode_atts(array(
				'title' => '',
				'url' => ''
			),$atts));

			ob_start();

			?>
			<li><a href="<?php echo esc_url($url)?>"><?php echo esc_html($text);?></a></li>
			<?php
			return ob_get_clean();
		}

		/**
		 * Info Item link
		 * @since 1.0.0
		 * */
		public static function info_text_item($atts, $content = null){
			extract(shortcode_atts(array(
				'icon' => '',
				'text' => '',
			),$atts));

			$icon = (!empty($icon)) ? ' <i class="'.esc_attr($icon).'"></i> ' : '';
			ob_start();

			?>
			<li><?php echo wp_kses_post($icon);?> <?php echo esc_html($text);?></li>
			<?php
			return ob_get_clean();
		}
		
		/**
		 * Easy digital download login page extended
		 * @since 1.0.0
		 * */
		public static function xgenious_edd_login($atts, $content = null){
			extract(shortcode_atts(array(
				'icon' => '',
				'text' => '',
			),$atts));
			
			$reset_password_page_url = edd_get_lostpassword_url();
            if (defined('WPS_HIDE_LOGIN_VERSION')){
                $reset_password_page_url = get_site_url().'/'.get_option('whl_page').'?action=lostpassword';
            }
			ob_start();
            
			?>
			<?php
/**
 * This template is used to display the login form with [edd_login]
 */
if ( ! is_user_logged_in() ) :

	// Show any error messages after form submission
	edd_print_errors(); ?>
	<form id="edd_login_form" class="edd_form" action="" method="post">
		<fieldset>
			<legend><?php _e( 'Log into Your Account', 'easy-digital-downloads' ); ?></legend>
			<?php do_action( 'edd_login_fields_before' ); ?>
			<p class="edd-login-username">
				<label for="edd_user_login"><?php _e( 'Username or Email', 'easy-digital-downloads' ); ?></label>
				<input name="edd_user_login" id="edd_user_login" class="edd-required edd-input" type="text"/>
			</p>
			<p class="edd-login-password">
				<label for="edd_user_pass"><?php _e( 'Password', 'easy-digital-downloads' ); ?></label>
				<input name="edd_user_pass" id="edd_user_pass" class="edd-password edd-required edd-input" type="password"/>
			</p>
			<p class="edd-login-remember">
				<label><input name="rememberme" type="checkbox" id="rememberme" value="forever" /> <?php _e( 'Remember Me', 'easy-digital-downloads' ); ?></label>
			</p>
			<p class="edd-login-submit">
				<input type="hidden" name="edd_redirect" value="<?php echo esc_url( get_permalink(cs_get_option('navbar_button_link'))); ?>"/>
				<input type="hidden" name="edd_login_nonce" value="<?php echo esc_attr( wp_create_nonce( 'edd-login-nonce' ) ); ?>"/>
				<input type="hidden" name="edd_action" value="user_login"/>
				<input id="edd_login_submit" type="submit" class="edd-submit" value="<?php _e( 'Log In', 'easy-digital-downloads' ); ?>"/>
			</p>
			<p class="edd-lost-password">
				<a href="<?php echo esc_url( $reset_password_page_url ); ?>">
					<?php _e( 'Lost Password?', 'easy-digital-downloads' ); ?>
				</a>
			</p>
			<?php do_action( 'edd_login_fields_after' ); ?>
		</fieldset>
	</form>
<?php else : ?>

	<?php do_action( 'edd_login_form_logged_in' ); ?>

<?php endif; ?>
			<?php
			return ob_get_clean();
		}

	}//end class

	if ( class_exists('Xgenious_Master_shortcodes') ){
		Xgenious_Master_shortcodes::getInstance();
	}

}//end if
