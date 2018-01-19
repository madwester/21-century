<?php
/*
  Plugin Name: Tabs - Responsive Tabs with  Accordions
  Plugin URI: https://www.oxilab.org/
  Description: Tabs - Responsive Tabs with  Accordions is essayist way to awesome WordPress responsive Content Tabs Plugin with many features.
  Author: Biplob Adhikari
  Author URI: http://www.oxilab.org/
  Version: 2.0
 */
if (!defined('ABSPATH'))
    exit;

$content_tabs_ultimate_version = '2.0';
define('content_tabs_ultimate_plugin_url', plugin_dir_path(__FILE__));
// this is the URL our updater / license checker pings. This should be the URL of the site with EDD installed
define('Responsive_Tabs_with_Accordions_HOME', 'https://www.oxilab.org'); // you should use your own CONSTANT name, and be sure to replace it throughout this file
// the name of your product. This should match the download name in EDD exactly
define('Responsive_Tabs_with_Accordions', 'Responsive Tabs with Accordions'); // you should use your own CONSTANT name, and be sure to replace it throughout this file
// the name of the settings page for the license input to be displayed
define('Responsive_Tabs_with_Accordions_LICENSE_PAGE', 'responsive-tabs-with-accordions-license');

add_shortcode('ctu_ultimate_oxi', 'ctu_ultimate_oxi_shortcode');
include content_tabs_ultimate_plugin_url . 'public.php';

function ctu_ultimate_oxi_shortcode($atts) {
    extract(shortcode_atts(array('id' => ' ',), $atts));
    $styleid = $atts['id'];
    oxi_responsive_tabs_shortcode_function($styleid, 'user');
}

add_action('vc_before_init', 'content_tabs_ultimate_VC_extension');
add_shortcode('ctu_ultimate_oxi_VC', 'ctu_ultimate_oxi_VC_shortcode');

function ctu_ultimate_oxi_VC_shortcode($atts) {
    extract(shortcode_atts(array(
        'id' => ''
                    ), $atts));
    $styleid = $atts['id'];
    oxi_responsive_tabs_shortcode_function($styleid, 'user');
}

function content_tabs_ultimate_VC_extension() {
    vc_map(array(
        "name" => __("Content Tabs"),
        "base" => "ctu_ultimate_oxi_VC",
        "category" => __("Content"),
        "params" => array(
            array(
                "type" => "textfield",
                "holder" => "div",
                "heading" => __("ID"),
                "param_name" => "id",
                "description" => __("Input your Tabs ID in input box")
            ),
        )
    ));
}

add_action('admin_menu', 'content_tabs_menu');

function content_tabs_menu() {
    add_menu_page('Content Tabs', 'Content Tabs', 'manage_options', 'content-tabs-ultimate', 'content_tabs_ultimate_home');
    add_submenu_page('content-tabs-ultimate', 'Content Tabs', 'Content Tabs', 'manage_options', 'content-tabs-ultimate', 'content_tabs_ultimate_home');
    add_submenu_page('content-tabs-ultimate', 'New Tabs', 'New Tabs', 'manage_options', 'content-tabs-ultimate-new', 'content_tabs_ultimate_new');
    add_submenu_page('content-tabs-ultimate', 'Product License', 'Product License', 'manage_options', Responsive_Tabs_with_Accordions_LICENSE_PAGE, 'responsive_tabs_with_accordions_license_page');
    add_submenu_page('content-tabs-ultimate', 'Import Templates', 'Import Templates', 'manage_options', 'content-tabs-ultimate-import', 'content_tabs_ultimate_import');
  }

function content_tabs_ultimate_home() {
    if (!current_user_can('manage_options')) {
        wp_die(__('You do not have sufficient permissions to access this page.'));
    }
    include content_tabs_ultimate_plugin_url . 'home.php';
}

function content_tabs_ultimate_new() {
    if (!current_user_can('manage_options')) {
        wp_die(__('You do not have sufficient permissions to access this page.'));
    }
    wp_enqueue_style('oxilab-admin', plugins_url('js-css/admin.css', __FILE__));
    wp_enqueue_style('oxilab-bootstrap', plugins_url('js-css/bootstrap.min.css', __FILE__));
    wp_enqueue_style('oxilab-font-awesome', plugins_url('js-css/font-awesome.min.css', __FILE__));
    wp_enqueue_style('oxi-tabs-style', plugins_url('public/style.css', __FILE__));
    wp_enqueue_script('jQuery');
    wp_enqueue_script('oxilab-bootstrap', plugins_url('js-css/bootstrap.min.js', __FILE__));
    wp_enqueue_style('oxi-tabs-font', 'https://fonts.googleapis.com/css?family=Open+Sans');
    if (!empty($_GET['styleid']) && is_numeric($_GET['styleid'])) {
        $id = $_GET['styleid'];
        global $wpdb;
        $table_name = $wpdb->prefix . 'content_tabs_ultimate_style';
        $styledata = $wpdb->get_row($wpdb->prepare("SELECT * FROM $table_name WHERE id = %d ", $id), ARRAY_A);
        wp_enqueue_script('oxilab-font-select', plugins_url('js-css/font-select.js', __FILE__));
        wp_enqueue_script('oxilab-color', plugins_url('js-css/minicolors.js', __FILE__));
        include content_tabs_ultimate_plugin_url . 'admin/' . $styledata['style_name'] . '.php';
        wp_enqueue_style('oxilab-color', plugins_url('js-css/minicolors.css', __FILE__));
    } else {
        include content_tabs_ultimate_plugin_url . 'layouts/index.php';
    }     
   
}

function content_tabs_ultimate_import() {
    if (!current_user_can('manage_options')) {
        wp_die(__('You do not have sufficient permissions to access this page.'));
    }
    wp_enqueue_style('oxilab-admin', plugins_url('js-css/admin.css', __FILE__));
    wp_enqueue_style('oxilab-bootstrap', plugins_url('js-css/bootstrap.min.css', __FILE__));
    wp_enqueue_style('oxilab-font-awesome', plugins_url('js-css/font-awesome.min.css', __FILE__));
    wp_enqueue_style('oxi-tabs-show', plugins_url('public/style.css', __FILE__));
    wp_enqueue_script('jQuery');
    wp_enqueue_script('oxilab-bootstrap', plugins_url('js-css/bootstrap.min.js', __FILE__));
    include content_tabs_ultimate_plugin_url . 'layouts/import-style.php';
}

function content_tabs_custom_post_type_icon() {
    ?>
    <style type='text/css' media='screen'>
        #adminmenu #toplevel_page_content-tabs-ultimate  div.wp-menu-image:before {
            content: "\f163";
        }
    </style>
    <?php
}

add_action('admin_head', 'content_tabs_custom_post_type_icon');

register_activation_hook(__FILE__, 'content_tabs_ultimate_install');

function ctu_html_special_charecter($data) {
    $data = str_replace("\'", "'", $data);
    $data = str_replace('\"', '"', $data);    
    $data = do_shortcode( $data,  $ignore_html = false );
    return $data;
}

function ctu_admin_special_charecter($data) {
    $data = str_replace("\'", "'", $data);
    $data = str_replace('\"', '"', $data);
    return $data;
}

function ctu_font_familly_special_charecter($data) {
    $data = str_replace('+', ' ', $data);
    return $data;
}

function content_tabs_ultimate_install() {
    global $wpdb;
    global $content_tabs_ultimate_version;

    $table_name = $wpdb->prefix . 'content_tabs_ultimate_style';
    $table_list = $wpdb->prefix . 'content_tabs_ultimate_list';
    $table_import = $wpdb->prefix . 'content_tabs_ultimate_import';

    $charset_collate = $wpdb->get_charset_collate();
    $sql1 = "CREATE TABLE $table_name (
		id mediumint(5) NOT NULL AUTO_INCREMENT,
                name varchar(50) NOT NULL,
		style_name varchar(10) NOT NULL,
                css text NOT NULL,
		PRIMARY KEY  (id)
	) $charset_collate;";
    $sql2 = "CREATE TABLE $table_list (
		id mediumint(5) NOT NULL AUTO_INCREMENT,
                styleid mediumint(6) NOT NULL,
		title varchar(100),
                files text,
                css varchar(100),
		PRIMARY KEY  (id)
	) $charset_collate;";
    $sql3 = "CREATE TABLE $table_import (
		id mediumint(5) NOT NULL AUTO_INCREMENT,
		name mediumint(5) NOT NULL,                
		PRIMARY KEY  (id),
                UNIQUE name (name)
	) $charset_collate;";

    require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
    dbDelta($sql1);
    dbDelta($sql2);
    dbDelta($sql3);

    add_option('content_tabs_ultimate_version', $content_tabs_ultimate_version);
    $wpdb->query("INSERT INTO {$table_import} (name) VALUES
        (1),
        (2),
        (3),
        (4),
        (5)");
    set_transient('_Oxi_responsive_tabs_welcome_activation_redirect', true, 30);
}

add_action('admin_init', 'Oxi_responsive_tabs_welcome_activation_redirect');

function Oxi_responsive_tabs_welcome_activation_redirect() {
    if (!get_transient('_Oxi_responsive_tabs_welcome_activation_redirect')) {
        return;
    }
    delete_transient('_Oxi_responsive_tabs_welcome_activation_redirect');
    if (is_network_admin() || isset($_GET['activate-multi'])) {
        return;
    }
    wp_safe_redirect(add_query_arg(array('page' => 'oxi-responsive-tabs-welcome'), admin_url('index.php')));
}

add_action('admin_menu', 'Oxi_responsive_tabs_welcome_pages');

function Oxi_responsive_tabs_welcome_pages() {
    add_dashboard_page(
            'Welcome To Responsive Tabs with  Accordions', 'Welcome To Responsive Tabs with  Accordions', 'read', 'oxi-responsive-tabs-welcome', 'oxi_responsive_tabs_welcome'
    );
}

function oxi_responsive_tabs_welcome() {
    wp_enqueue_style('oxi-responsive-tabs-welcome', plugins_url('js-css/admin-welcome.css', __FILE__));
    ?>
    <div class="wrap about-wrap">

        <h1>Welcome to Responsive Tabs with  Accordions</h1>
        <div class="about-text">
            Thank you for choosing Responsive Tabs with  Accordions - the most friendly WordPress Tabs and Accordions  Plugins. Here's how to get started.
        </div>
        <h2 class="nav-tab-wrapper">
            <a class="nav-tab nav-tab-active">
                Getting Started		
            </a>
        </h2>
        <p class="about-description">
            Use the tips below to get started using Responsive Tabs with  Accordions. You will be up and running in no time.	
        </p>    
        <div class="feature-section">
            <h3>Have any Bugs or Suggestion</h3>
            <p>Your suggestions will make this plugin even better, Even if you get any bugs on Image Hover Effects with Carousel so let us to know, We will try to solved within few hours</p>
            <p><a href="https://www.oxilab.org/contact-us" target="_blank" rel="noopener" class="image-features-button button button-primary">Contact Us</a>
                <a href="https://wordpress.org/support/plugin/vc-tabs" target="_blank" rel="noopener" class="image-features-button button button-primary">Support Forum</a></p>

        </div>

    </div>
    <?php
}

add_action('admin_head', 'oxi_responsive_tabs_welcome_remove_menus');

function oxi_responsive_tabs_welcome_remove_menus() {
    remove_submenu_page('index.php', 'oxi-responsive-tabs-welcome');
}


// load our custom updater
include( dirname(__FILE__) . '/Plugin_Updater.php' );

function responsive_tabs_with_accordions_plugin_updater() {
    $license_key = trim(get_option('responsive_tabs_with_accordions_license_key'));
    // retrieve our license key from the DB
    // setup the updater
    $responsive_tabs_with_accordions_updater = new Responsive_Tabs_with_Accordions_Plugin_Updater(Responsive_Tabs_with_Accordions_HOME, __FILE__, array(
        'version' => '2.0', // current version number
        'license' => $license_key, // license key (used get_option above to retrieve from DB)
        'item_name' => Responsive_Tabs_with_Accordions, // name of this plugin
        'author' => 'Biplob Adhikari', // author of this plugin
        'beta' => false
            )
    );
}

$license_key = trim(get_option('responsive_tabs_with_accordions_license_key'));
if (!empty($license_key)) {
    add_action('admin_init', 'responsive_tabs_with_accordions_plugin_updater', 0);
}

/* * **********************************
 * the code below is just a standard
 * options page. Substitute with
 * your own.
 * *********************************** */

function responsive_tabs_with_accordions_license_page() {
    $license = get_option('responsive_tabs_with_accordions_license_key');
    $status = get_option('responsive_tabs_with_accordions_license_status');
    ?>
    <div class="wrap">
        <?php if ($status !== false && $status == 'valid') { ?>
            <div class="updated">
                <p>Thank you to Active our Plugins. Kindly wait 2-3 minute to get update notification if you using free or older version. Once you get notification please update.</p>
            </div>
        <?php }
        ?>
        <h2><?php _e('Product License Activation'); ?></h2>
        <p>Activate your copy to get direct plugin updates and official support.</p>
        <form method="post" action="options.php">

            <?php settings_fields('responsive_tabs_with_accordions_license'); ?>

            <table class="form-table">
                <tbody>
                    <tr valign="top">
                        <th scope="row" valign="top">
                            <?php _e('License Key'); ?>
                        </th>
                        <td>
                            <input id="responsive_tabs_with_accordions_license_key" name="responsive_tabs_with_accordions_license_key" type="text" class="regular-text" value="<?php esc_attr_e($license); ?>" />
                            <label class="description" for="responsive_tabs_with_accordions_license_key"><?php _e('Enter your license key'); ?></label>
                        </td>
                    </tr>
                    <?php if (!empty($license)) { ?>
                        <tr valign="top">
                            <th scope="row" valign="top">
                                <?php _e('Activate License'); ?>
                            </th>
                            <td>
                                <?php if ($status !== false && $status == 'valid') { ?>
                                    <span style="color:green;"><?php _e('active'); ?></span>
                                    <?php wp_nonce_field('responsive_tabs_with_accordions_nonce', 'responsive_tabs_with_accordions_nonce'); ?>
                                    <input type="submit" class="button-secondary" name="responsive_tabs_with_accordions_license_deactivate" value="<?php _e('Deactivate License'); ?>"/>
                                    <?php
                                } else {
                                    wp_nonce_field('responsive_tabs_with_accordions_nonce', 'responsive_tabs_with_accordions_nonce');
                                    ?>
                                    <input type="submit" class="button-secondary" name="responsive_tabs_with_accordions_license_activate" value="<?php _e('Activate License'); ?>"/>
                                <?php } ?>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
            <?php submit_button(); ?>

        </form>
        <?php
    }

    function responsive_tabs_with_accordions_register_option() {
        // creates our settings in the options table
        register_setting('responsive_tabs_with_accordions_license', 'responsive_tabs_with_accordions_license_key', 'responsive_tabs_with_accordions_sanitize_license');
    }

    add_action('admin_init', 'responsive_tabs_with_accordions_register_option');

    function responsive_tabs_with_accordions_sanitize_license($new) {
        $old = get_option('responsive_tabs_with_accordions_license_key');
        if ($old && $old != $new) {
            delete_option('responsive_tabs_with_accordions_license_status'); // new license has been entered, so must reactivate
        }
        return $new;
    }

    /*     * **********************************
     * this illustrates how to activate
     * a license key
     * *********************************** */

    function responsive_tabs_with_accordions_activate_license() {

        // listen for our activate button to be clicked
        if (isset($_POST['responsive_tabs_with_accordions_license_activate'])) {

            // run a quick security check
            if (!check_admin_referer('responsive_tabs_with_accordions_nonce', 'responsive_tabs_with_accordions_nonce'))
                return; // get out if we didn't click the Activate button








                
// retrieve the license from the database
            $license = trim(get_option('responsive_tabs_with_accordions_license_key'));


            // data to send in our API request
            $api_params = array(
                'edd_action' => 'activate_license',
                'license' => $license,
                'item_name' => urlencode(Responsive_Tabs_with_Accordions), // the name of our product in EDD
                'url' => home_url()
            );

            // Call the custom API.
            $response = wp_remote_post(Responsive_Tabs_with_Accordions_HOME, array('timeout' => 15, 'sslverify' => false, 'body' => $api_params));

            // make sure the response came back okay
            if (is_wp_error($response) || 200 !== wp_remote_retrieve_response_code($response)) {

                if (is_wp_error($response)) {
                    $message = $response->get_error_message();
                } else {
                    $message = __('An error occurred, please try again.');
                }
            } else {

                $license_data = json_decode(wp_remote_retrieve_body($response));

                if (false === $license_data->success) {

                    switch ($license_data->error) {

                        case 'expired' :

                            $message = sprintf(
                                    __('Your license key expired on %s.'), date_i18n(get_option('date_format'), strtotime($license_data->expires, current_time('timestamp')))
                            );
                            break;

                        case 'revoked' :

                            $message = __('Your license key has been disabled.');
                            break;

                        case 'missing' :

                            $message = __('Invalid license.');
                            break;

                        case 'invalid' :
                        case 'site_inactive' :

                            $message = __('Your license is not active for this URL.');
                            break;

                        case 'item_name_mismatch' :

                            $message = sprintf(__('This appears to be an invalid license key for %s.'), Responsive_Tabs_with_Accordions);
                            break;

                        case 'no_activations_left':

                            $message = __('Your license key has reached its activation limit.');
                            break;

                        default :

                            $message = __('An error occurred, please try again.');
                            break;
                    }
                }
            }

            // Check if anything passed on a message constituting a failure
            if (!empty($message)) {
                $base_url = admin_url('admin.php?page=' . Responsive_Tabs_with_Accordions_LICENSE_PAGE);
                $redirect = add_query_arg(array('sl_activation' => 'false', 'message' => urlencode($message)), $base_url);

                wp_redirect($redirect);
                exit();
            }

            // $license_data->license will be either "valid" or "invalid"

            update_option('responsive_tabs_with_accordions_license_status', $license_data->license);
            wp_redirect(admin_url('admin.php?page=' . Responsive_Tabs_with_Accordions_LICENSE_PAGE));
            exit();
        }
    }

    add_action('admin_init', 'responsive_tabs_with_accordions_activate_license');


    /*     * *********************************************
     * Illustrates how to deactivate a license key.
     * This will decrease the site count
     * ********************************************* */

    function responsive_tabs_with_accordions_deactivate_license() {

        // listen for our activate button to be clicked
        if (isset($_POST['responsive_tabs_with_accordions_license_deactivate'])) {

            // run a quick security check
            if (!check_admin_referer('responsive_tabs_with_accordions_nonce', 'responsive_tabs_with_accordions_nonce'))
                return; // get out if we didn't click the Activate button








                
// retrieve the license from the database
            $license = trim(get_option('responsive_tabs_with_accordions_license_key'));


            // data to send in our API request
            $api_params = array(
                'edd_action' => 'deactivate_license',
                'license' => $license,
                'item_name' => urlencode(Responsive_Tabs_with_Accordions), // the name of our product in EDD
                'url' => home_url()
            );

            // Call the custom API.
            $response = wp_remote_post(Responsive_Tabs_with_Accordions_HOME, array('timeout' => 15, 'sslverify' => false, 'body' => $api_params));

            // make sure the response came back okay
            if (is_wp_error($response) || 200 !== wp_remote_retrieve_response_code($response)) {

                if (is_wp_error($response)) {
                    $message = $response->get_error_message();
                } else {
                    $message = __('An error occurred, please try again.');
                }

                $base_url = admin_url('admin.php?page=' . Responsive_Tabs_with_Accordions_LICENSE_PAGE);
                $redirect = add_query_arg(array('sl_activation' => 'false', 'message' => urlencode($message)), $base_url);

                wp_redirect($redirect);
                exit();
            }

            // decode the license data
            $license_data = json_decode(wp_remote_retrieve_body($response));

            // $license_data->license will be either "deactivated" or "failed"
            if ($license_data->license == 'deactivated') {
                delete_option('responsive_tabs_with_accordions_license_status');
            }

            wp_redirect(admin_url('admin.php?page=' . Responsive_Tabs_with_Accordions_LICENSE_PAGE));
            exit();
        }
    }

    add_action('admin_init', 'responsive_tabs_with_accordions_deactivate_license');


    /*     * **********************************
     * this illustrates how to check if
     * a license key is still valid
     * the updater does this for you,
     * so this is only needed if you
     * want to do something custom
     * *********************************** */

    function responsive_tabs_with_accordions_check_license() {

        global $wp_version;

        $license = trim(get_option('responsive_tabs_with_accordions_license_key'));

        $api_params = array(
            'edd_action' => 'check_license',
            'license' => $license,
            'item_name' => urlencode(Responsive_Tabs_with_Accordions),
            'url' => home_url()
        );

        // Call the custom API.
        $response = wp_remote_post(Responsive_Tabs_with_Accordions_HOME, array('timeout' => 15, 'sslverify' => false, 'body' => $api_params));

        if (is_wp_error($response))
            return false;

        $license_data = json_decode(wp_remote_retrieve_body($response));

        if ($license_data->license == 'valid') {
            echo 'valid';
            exit;
            // this license is still valid
        } else {
            echo 'invalid';
            exit;
            // this license is no longer valid
        }
    }

    /**
     * This is a means of catching errors from the activation method above and displaying it to the customer
     */
    function responsive_tabs_with_accordions_admin_notices() {
        if (isset($_GET['sl_activation']) && !empty($_GET['message'])) {

            switch ($_GET['sl_activation']) {

                case 'false':
                    $message = urldecode($_GET['message']);
                    ?>
                    <div class="error">
                        <p><?php echo $message; ?></p>
                    </div>
                    <?php
                    break;

                case 'true':
                default:
                    // Developers can put a custom success message here for when activation is successful if they way.
                    break;
            }
        }
    }

    add_action('admin_notices', 'responsive_tabs_with_accordions_admin_notices');

    function responsive_tabs_with_accordions_video_toturial() {
        ?>
        <div class="ihewc-admin-style-settings-div-css">
            <div class="col-xs-12">                                           
                <a href="https://www.oxilab.org/docs/responsive-tabs-with-accordions/getting-started/" target="_blank">
                    <div class="col-xs-support-ihewc">
                        <div class="ihewc-admin-support-icon">
                            <i class="fa fa-file" aria-hidden="true"></i>
                        </div>  
                        <div class="ihewc-admin-support-heading">
                            Read Our Docs
                        </div> 
                        <div class="ihewc-admin-support-info">
                            Learn how to set up and using Image Hover Effects with Carousel
                        </div> 
                    </div>
                </a>
                <a href="https://wordpress.org/support/plugin/responsive-tabs-with-accordions" target="_blank">
                    <div class="col-xs-support-ihewc">
                        <div class="ihewc-admin-support-icon">
                            <i class="fa fa-users" aria-hidden="true"></i>
                        </div>  
                        <div class="ihewc-admin-support-heading">
                            Support
                        </div> 
                        <div class="ihewc-admin-support-info">
                            Powered by WordPress.org, Issues resolved by Plugins Author.
                        </div> 
                    </div>
                </a>
                <a href="https://www.youtube.com/watch?v=8LTmvNrcxYg" target="_blank">
                    <div class="col-xs-support-ihewc">
                        <div class="ihewc-admin-support-icon">
                            <i class="fa fa-ticket" aria-hidden="true"></i>
                        </div>  
                        <div class="ihewc-admin-support-heading">
                            Video Tutorial 
                        </div> 
                        <div class="ihewc-admin-support-info">
                            Watch our Using Video Toturial in Youtube.
                        </div> 
                    </div>
                </a>
            </div>
        </div> 
        <?php
    }

    function responsive_tabs_with_accordions_promote_free() {
        ?>
        <div class="oxilab-admin-notifications">
            <h3>
                <span class="dashicons dashicons-flag"></span> 
                Notifications
            </h3>
            <p></p>
            <div class="oxilab-admin-notifications-holder">
                <div class="oxilab-admin-notifications-alert">
                    <p>Thank you for using our Responsive Tabs with Accordions. We Just wanted to see if you have any questions or concerns about our plugins. If you do, Please do not hesitate to <a href="https://wordpress.org/support/plugin/vc-tabs#new-post">file a bug report</a></p>
                    <p>Furthermore, I hope you are truly loving our products and happy with purchase. As a small developer in WordPress Plugins, we are largely dependent on product reviews from wonderful customers such as yourself.
                    <p>If our product has met or exceeded your expectations, Please help us spread the word by leaving a review. you can do at <a href="https://wordpress.org/support/plugin/vc-tabs/reviews/?rate=5#new-post">WordPress.org</a></p>    
                    <p>Your unbiased honest feedback helps ensure we keep doing things right and encourage us to keep sharing helpful tips!</p>
                    <p>By the way, did you know we also have a <a href="https://www.oxilab.org/downloads/responsive-tabs-with-accordions/">Premium Version</a>. It offers lots of options with automatic update. It also comes with 24/7 personal support.</p>
                    <p>Thanks Again!</p>
                    <p>Sincerely,<br>
                        Oxilab Team</p>   
                    <p></p>
                </div>                     
            </div>
            <p></p>
        </div> 
        <p></p>
    <?php
}
