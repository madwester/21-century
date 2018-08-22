<?php
/*
/**
 * Plugin Name: Scroll Triggered Box / Slide Box
 * Plugin URI: https://zotabox.com/zbv2/slidebox?utm_source=wordpress.com&utm_medium=Slide%20Box&utm_campaign=ecommerce%20plugins&authuser=anonymous
 * Description: Scroll Triggered Slide Box is responsive and slides out to increase your sales and subscribers. Add custom images, timer, video and coupons.
 * Version: 1.0.7
 * Author: Zotabox
 * Author URI: https://zotabox.com/dashboard/?utm_source=wordpress.com&utm_medium=Slide%20Box&utm_campaign=ecommerce%20plugins&authuser=anonymous
 * License: SMB 1.0
 */

add_action( 'admin_init', 'zb_slb_admin_init' );
function zb_slb_admin_init(){
	/* Register stylesheet. */
	wp_register_style( 'css_main', plugins_url('assets/css/style.css', __FILE__) );
	wp_enqueue_style('css_main');
    /* Register js. */
	wp_register_script( 'main_js', plugins_url('assets/js/main.js?v1', __FILE__) );
	wp_enqueue_script('main_js');

    //Create options
    add_option( 'ztb_source', '', '', 'yes' );
    add_option( 'ztb_id', '', '', 'yes' );
    add_option( 'ztb_domainid', '', '', 'yes' );
    add_option( 'ztb_email', '', '', 'yes' );
    add_option( 'access_key', '', '', 'yes' );
    add_option( 'ztb_access_key', '', '', 'yes' );
    add_option( 'ztb_status_message', 1, '', 'yes' );
    add_option( 'ztb_status_disconnect', 2, '', 'yes' );
}

register_deactivation_hook( __FILE__, 'zb_slb_deactivate' );
function zb_slb_deactivate(){
	update_option( 'ztb_status_message', 2 );
	update_option( 'ztb_status_disconnect', 1 );
}

register_activation_hook( __FILE__, 'zb_slb_activate' );
function zb_slb_activate() {
	update_option( 'ztb_status_message', 1 );
}

/*
add_action('admin_notices', 'zb_slb_show_admin_messages');
function zb_slb_show_admin_messages() {

}
*/

add_filter( 'plugin_action_links_' . plugin_basename(__FILE__), 'zb_slb_add_action_links' );
function zb_slb_add_action_links ( $links ) {
	 $mylinks = array(
	 '<a href="' . admin_url( 'admin.php?page=zb_slb' ) . '">Settings</a>',
	 );
	return array_merge( $links, $mylinks );
}

add_action('admin_menu', 'zb_slb_admin_menu');
function zb_slb_admin_menu() {
	add_menu_page('Scroll Triggered Box / Slide Box', 'Slide Box', 'administrator', 'zb_slb', 'zb_slb_setting',plugins_url( 'zotabox.png', __FILE__ ));
}

function zb_slb_setting(){
	$domain_action = 'https://zotabox.com';
	$access_key = get_option( 'ztb_access_key', '' );
	$ztb_id = get_option( 'ztb_id', '' );
	$domain = get_option('ztb_domainid','');
	$zbEmail = get_option('ztb_email','');
	$ztb_source = get_option('ztb_source','');
	$button = '';
	$adminEmail = get_option('admin_email');
	//Check empty ztb email
	if(empty($zbEmail)){
		$zbEmail = $adminEmail;
	}
	global $current_user;
    wp_get_current_user();

	$ztb_status_disconnect = get_option( 'ztb_status_disconnect', '' );
	$connected = 2;
	if(isset($access_key) && !empty($access_key) && strlen($access_key) > 0 && $ztb_status_disconnect == $connected){
	
		$button = '<a  target="zotabox" href="'.$domain_action.'/customer/access/PluginLogin/?customer='.$ztb_id.'&access='.$access_key.'&app=slb&platform=wordpress&utm_source=wordpress.com">
			Configure your tools
		</a>';
		$form = '';
	}else{
		$form = '<form class="ztb-register-form" target="_blank" method="POST" action="'.$domain_action.'/customer/access/PluginAuth?app=slb&utm_source=wordpress.com&utm_medium=Slide%20Box&utm_campaign=ecommerce%20plugins&platform=wordpress&access='.$access_key.'" id="account-info">
					<div class="form-group">
						<label>Website:</label>
						<input class="form-control" readonly type="text" name="domain" value="'.home_url().'" />
						<input type="hidden" name="name" value="'.$current_user->display_name.'" />
						<input type="hidden" name="utm_medium" value="Slide Box" />
						<input type="hidden" name="utm_campaign" value="ecommerce plugins" />
					</div>
					<div class="form-group">
						<label>Email:</label>
						<input class="form-control" type="text" name="email" value="'.$zbEmail.'" />
					</div>
					
					<div class="form-group button-wrapper">
						<input class="ztb-submit-button" type="submit" value="Start Using Your New Tools Now" /><br><br>
						<div style="width: 400px;margin: auto;color: #888;">* Zotabox is a 3rd party service. A Zotabox account will be created automatically and you can delete it at any time.</div>
					</div>
					</form>';
		$button = '';
	} 

	$html = '
	<script type="text/javascript">
		var ZBT_WP_ADMIN_URL = "'.admin_url().'";
		var ZTB_BASE_URL = "'.$domain_action.'";
	</script>
	<div class="ztb-wrapper">
		<div class="ztb-logo">
			<a href="https://zotabox.com/dashboard/?utm_source=wordpress.com&utm_medium=Slide%20Box&utm_campaign=ecommerce%20plugins&authuser=anonymous" title="Zotabox" target="zotabox">
				<img title="Zotabox" alt="Zotabox" src="'.plugins_url( 'assets/images/logo-zotabox.png', __FILE__ ).'">
			</a>
		</div>
		<div class="ztb-code-wrapper wrap">
			<div class="ztb-title">
				Scroll Triggered Slide Box is responsive and slides out to increase your sales and subscribers. 20+ more popular marketing tools also included.
			</div>
			<div class="account-input">
				'.$form.'
			</div>
			<div class="ztb-button">'.$button.'</div>
			<div style="clear:both"></div>
		</div>
	</div>';
	echo $html;
}

function insert_zb_slb_code(){
	if(!is_admin()){
		$domain = get_option( 'ztb_domainid', '' );
		$ztb_source = get_option('ztb_source','');
		$ztb_status_disconnect = get_option('ztb_status_disconnect','');
		$connected = 2;
		if(!empty($domain) && strlen($domain) > 0 && $ztb_status_disconnect == $connected){
			print_r(html_entity_decode(print_zb_slb_code($domain)));
		}
	}
}

add_action( 'wp_head', 'insert_zb_slb_code' );


add_action("wp_ajax_update_zb_slb_code", "update_zb_slb_code");
add_action("wp_ajax_nopriv_update_zb_slb_code", "update_zb_slb_code");

function update_zb_slb_code(){
	header('Access-Control-Allow-Origin: *');
    header('Access-Control-Allow-Credentials: true');

	$domainID = sanitize_key($_REQUEST['domain']);
	$public_key = sanitize_key($_REQUEST['access']);
	$id = intval($_REQUEST['customer']);
	$zbEmail = sanitize_email($_REQUEST['email']);

	if (!isset($domainID) || empty($domainID)) {
		header("Location: ".admin_url()."admin.php?page=zb_slb");
	} else {
		update_option( 'ztb_domainid', $domainID );
		update_option( 'ztb_access_key', $public_key );
		update_option( 'ztb_id', $id );
		update_option( 'ztb_email', $zbEmail );
		update_option( 'ztb_status_disconnect', 2 );
		wp_send_json( array(
			'error' => false,
			'message' => 'Update Zotabox embedded code successful !' 
			)
		);
	}
}

function print_zb_slb_code($domainSecureID = "", $isHtml = false) {

	$ds1 = substr($domainSecureID, 0, 1);
	$ds2 = substr($domainSecureID, 1, 1);
	$baseUrl = '//static.zotabox.com';
	$code = <<<STRING
<script type="text/javascript">
(function(d,s,id){var z=d.createElement(s);z.type="text/javascript";z.id=id;z.async=true;z.src="{$baseUrl}/{$ds1}/{$ds2}/{$domainSecureID}/widgets.js";var sz=d.getElementsByTagName(s)[0];sz.parentNode.insertBefore(z,sz)}(document,"script","zb-embed-code"));
</script>
STRING;
	return $code;
}
?>