<?php
if (!defined('ABSPATH'))
    exit;
if (!current_user_can('manage_options')) {
    wp_die(__('You do not have sufficient permissions to access this page.'));
}
wp_enqueue_script('oxilab-bootstrap-js', plugins_url('js-css/bootstrap.min.js', __FILE__));
wp_enqueue_style('oxilab-bootstrap', plugins_url('js-css/bootstrap.min.css', __FILE__));
wp_enqueue_style('oxilab-style', plugins_url('js-css/admin.css', __FILE__));
wp_enqueue_style('font-awesome', plugins_url('js-css/font-awesome.min.css', __FILE__));
global $wpdb;
if (!empty($_REQUEST['_wpnonce'])) {
    $nonce = $_REQUEST['_wpnonce'];
}

if (!empty($_POST['delete']) && is_numeric($_POST['id'])) {
    if (!wp_verify_nonce($nonce, 'oxitabsstyledelete')) {
        die('You do not have sufficient permissions to access this page.');
    } else {
        global $wpdb;
        $id = $_POST['id'];
        $table_name = $wpdb->prefix . 'content_tabs_ultimate_style';
        $wpdb->query($wpdb->prepare("DELETE FROM $table_name WHERE id = %d", $id));
    }
}

if (!empty($_POST['submit']) && $_POST['submit'] == 'Clone' && is_numeric($_POST['oxi-tabs-id'])) {
    if (!wp_verify_nonce($nonce, 'oxitabsstyleclone')) {
        die('You do not have sufficient permissions to access this page.');
    } else {
        global $wpdb;
        $id = sanitize_text_field($_POST['oxi-tabs-id']);
        $table_name = $wpdb->prefix . 'content_tabs_ultimate_style';
        $data = $wpdb->get_row($wpdb->prepare("SELECT * FROM $table_name WHERE id = %d ", $id), ARRAY_A);
        $name = sanitize_text_field($_POST['style-name']);
        $style_name = $data['style_name'];
        $css = $data['css'];
        $wpdb->query($wpdb->prepare("INSERT INTO {$table_name} (name, style_name, css) VALUES ( %s, %s, %s )", array($name, $style_name, $css)));
        $redirect_id = $wpdb->insert_id;
        if ($redirect_id == 0) {
            $url = admin_url("admin.php?page=content-tabs-ultimate-new");
        }
        if ($redirect_id != 0) {
            $url = admin_url("admin.php?page=content-tabs-ultimate-new&styleid=$redirect_id");
        }
        echo '<script type="text/javascript"> document.location.href = "' . $url . '"; </script>';
        exit;
    }
}
$data = $wpdb->get_results('SELECT * FROM ' . $wpdb->prefix . 'content_tabs_ultimate_style ORDER BY id DESC', ARRAY_A);
?>
<div class="wrap">
    <?php echo responsive_tabs_with_accordions_promote_free();?>
    <h1>Responsive Tabs with Accordions <a href="<?php echo admin_url("admin.php?page=content-tabs-ultimate-new"); ?>" class="btn btn-primary"> Add New</a></h1>
    <div class="oxilab-admin-wrapper table-responsive" style="margin-top: 20px; margin-bottom: 20px;">
        <?php
        if (count($data) == 0) {
            ?>
            <div class="oxilab-admin-style-preview">
                <div class="oxilab-admin-style-preview-top">
                    <a href="<?php echo admin_url("admin.php?page=content-tabs-ultimate-new"); ?>">
                        <div class="oxilab-admin-add-new-item">
                            <span>
                                <i class="fa fa-plus-circle"></i>
                                Create Your First Tabs
                            </span>
                        </div>
                    </a>
                </div>
            </div>

            <?php
        } else {
            ?>
            <table class="table table-hover widefat " style="background-color: #fff; border: 1px solid #ccc">
                <thead>
                    <tr>
                        <th style="width: 11%">ID</th>
                        <th style="width: 10%">Name</th>
                        <th style="width: 13%">Template</th>
                        <th style="width: 52%">Shortcode</th>
                        <th style="width: 15%">Edit Delete</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach ($data as $value) {
                        $id = $value['id'];
                        echo ' <tr>';
                        echo ' <td>' . $id . '</td>';
                        echo '  <td >' . $value['name'] . '</td>';
                        echo ' <td >' . str_replace("_", " ", $value['style_name']) . '</td>';
                        echo '<td ><span>Shortcode <input type="text" onclick="this.setSelectionRange(0, this.value.length)" value="[ctu_ultimate_oxi id=&quot;' . $id . '&quot;]"></span>'
                        . '<span>Php Code <input type="text" onclick="this.setSelectionRange(0, this.value.length)" value="&lt;?php echo do_shortcode(&#039;[ctu_ultimate_oxi  id=&quot;' . $id . '&quot;]&#039;); ?&gt;"></span></td>';
                        echo '<td >
                                   <button type="button" class="btn btn-success oxi-tabs-style-clone"  style="float:left" data-toggle="modal" data-target="#oxi-tabs-style-model" dataid="' . $id . '"><i class="fa fa-clone" aria-hidden="true"></i></button>
                                    <a href="' . admin_url("admin.php?page=content-tabs-ultimate-new&styleid=$id") . '"  title="Edit"  class="btn btn-info" style="float:left; margin-right: 5px; margin-left: 5px;"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
                                    <form method="post" class="oxi-tabs-delete">
                                            ' . wp_nonce_field("oxitabsstyledelete") . '
                                            <input type="hidden" name="id" value="' . $id . '">
                                            <button class="btn btn-danger" style="float:left"  title="Delete"  type="submit" value="delete" name="delete"><i class="fa fa-trash-o" aria-hidden="true"></i></button>  
                                    </form>
                                   
                             </td>';
                        echo ' </tr>';
                    }
                    echo '</tbody></table> ';
                }
                ?>



    </div>
</div>
<script type="text/javascript">
    jQuery(document).ready(function () {
        jQuery(".oxi-tabs-style-clone").on("click", function () {
            var dataid = jQuery(this).attr("dataid");
            jQuery("#oxi-tabs-id").val(dataid);
        });
        jQuery('.oxi-tabs-delete').submit(function () {
            var status = confirm("Do you Want to Delete?");
            if (status == false) {
                return false;
            } else {
                return true;
            }
        });
    });

</script> 
<div class="modal fade" id="oxi-tabs-style-model" >
    <form method="post">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Tabs Settings</h4>
                </div>
                <div class="modal-body">
                    <div class="form-group row form-group-sm">
                        <label for="style" class="col-sm-6 col-form-label"  data-toggle="tooltip" class="tooltipLink" data-original-title="Give Your Template Name">Name</label>
                        <div class="col-sm-6 nopadding">
                            <input class="form-control" type="text" value="" id='style-name'  name="style-name">
                        </div>
                    </div>

                </div>
                <div class="modal-footer">
                    <input type="hidden" name="oxi-tabs-id" id="oxi-tabs-id" value="">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                    <input type="submit" class="btn btn-primary" name="submit" value="Clone">
                    <?php wp_nonce_field("oxitabsstyleclone") ?>
                </div>
            </div>
        </div>
    </form>
</div>

