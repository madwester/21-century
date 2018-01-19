<?php
if (!defined('ABSPATH'))
    exit;
if (!current_user_can('manage_options')) {
    wp_die(__('You do not have sufficient permissions to access this page.'));
}
$styleid = (int) $_GET['styleid'];
global $wpdb;
$table_list = $wpdb->prefix . 'content_tabs_ultimate_list';
$table_name = $wpdb->prefix . 'content_tabs_ultimate_style';
$title = '';
$files = '';
$font_asesome = '';
$itemid = '';
if (!empty($_REQUEST['_wpnonce'])) {
    $nonce = $_REQUEST['_wpnonce'];
}
if (!empty($_POST['submit']) && $_POST['submit'] == 'submit') {
    if (!wp_verify_nonce($nonce, 'oxiteamshownewdata')) {
        die('You do not have sufficient permissions to access this page.');
    } else {
        $title = $_POST['ctu-title'];
        $details = $_POST['ctu-details'];
        $css = $_POST['ctu-icon'];
        if ($_POST['item-id'] == '') {
            $wpdb->query($wpdb->prepare("INSERT INTO {$table_list} (title, files, css, styleid) VALUES ( %s, %s, %s, %d)", array($title, $details, $css, $styleid)));
        }
        if ($_POST['item-id'] != '' && is_numeric($_POST['item-id'])) {
            $item_id = (int) $_POST['item-id'];
            $data = $wpdb->update("$table_list", array("title" => $title, "files" => $details, "css" => $css), array('id' => $item_id), array('%s', '%s', '%s'), array('%d'));
        }
    }
}
if (!empty($_POST['edit']) && is_numeric($_POST['item-id'])) {
    if (!wp_verify_nonce($nonce, 'oxitabseditdata')) {
        die('You do not have sufficient permissions to access this page.');
    } else {
        $item_id = (int) $_POST['item-id'];
        $data = $wpdb->get_row($wpdb->prepare("SELECT * FROM $table_list WHERE id = %d ", $item_id), ARRAY_A);
        $title = $data['title'];
        $files = $data['files'];
        $font_asesome = $data['css'];
        $itemid = $data['id'];
        echo '<script type="text/javascript"> jQuery(document).ready(function () {setTimeout(function() { jQuery("#oxilab-add-new-data").modal("show")  }, 500); });</script>';
    }
}

if (!empty($_POST['delete']) && is_numeric($_POST['item-id'])) {
    if (!wp_verify_nonce($nonce, 'oxitabsdeletedata')) {
        die('You do not have sufficient permissions to access this page.');
    } else {
        $item_id = (int) $_POST['item-id'];
        $wpdb->query($wpdb->prepare("DELETE FROM {$table_list} WHERE id = %d ", $item_id));
    }
}
if (!empty($_POST['data-submit']) && $_POST['data-submit'] == 'Save') {
    if (!wp_verify_nonce($nonce, 'oxitabsstylecss')) {
        die('You do not have sufficient permissions to access this page.');
    } else {
        $data = 'heading-font-size |' . sanitize_text_field($_POST['heading-font-size']) . '| '
                . 'heading-font-color |#949494|'
                . ' heading-background-color |rgba(255, 255, 255, 1)| '
                . 'heading-font-active-color |#12bee0|'
                . ' icon-font-size |' . sanitize_text_field($_POST['icon-font-size']) . '| '
                . 'icon-margin-bottom |' . sanitize_text_field($_POST['icon-margin-bottom']) . '| '
                . 'heading-font-familly |Open+Sans|'
                . ' heading-font-weight |' . sanitize_text_field($_POST['heading-font-weight']) . '|'
                . ' heading-text-align |' . sanitize_text_field($_POST['heading-text-align']) . '|'
                . ' heading-border-color |#c4c4c4| '
                . 'heading-width |' . sanitize_text_field($_POST['heading-width']) . '|'
                . ' heading-padding |' . sanitize_text_field($_POST['heading-padding']) . '| '
                . 'heading-border-radius |' . sanitize_text_field($_POST['heading-border-radius']) . '|'
                . ' content-font-size |' . sanitize_text_field($_POST['content-font-size']) . '| '
                . 'content-font-color |#7a7a7a| '
                . 'content-background-color |#ffffff|'
                . ' content-padding-top |' . sanitize_text_field($_POST['content-padding-top']) . '|'
                . ' content-padding-right |' . sanitize_text_field($_POST['content-padding-right']) . '| '
                . 'content-padding-bottom |' . sanitize_text_field($_POST['content-padding-bottom']) . '|'
                . ' content-padding-left |' . sanitize_text_field($_POST['content-padding-left']) . '| '
                . 'content-line-height |' . sanitize_text_field($_POST['content-line-height']) . '|'
                . ' content-font-familly |Open+Sans| '
                . 'content-font-weight |' . sanitize_text_field($_POST['content-font-weight']) . '|'
                . ' content-font-align |' . sanitize_text_field($_POST['content-font-align']) . '| '
                . 'content-box-shadow-Blur|' . sanitize_text_field($_POST['content-box-shadow-Blur']) . '|'
                . ' content-box-shadow-color |rgba(237, 237, 237, 1)|'
                . ' content-box-shadow-Horizontal |' . sanitize_text_field($_POST['content-box-shadow-Horizontal']) . '|'
                . ' content-box-shadow-Vertical |' . sanitize_text_field($_POST['content-box-shadow-Vertical']) . '|'
                . ' content-box-shadow-Spread |' . sanitize_text_field($_POST['content-box-shadow-Spread']) . '|'
                . ' heading-font-style |' . sanitize_text_field($_POST['heading-font-style']) . '|'
                . ' custom-css ||';
        $data = sanitize_text_field($data);
        $wpdb->query($wpdb->prepare("UPDATE $table_name SET css = %s WHERE id = %d", $data, $styleid));
    }
}
$listdata = $wpdb->get_results($wpdb->prepare("SELECT * FROM $table_list WHERE styleid = %d ORDER by id DESC ", $styleid), ARRAY_A);
$styledata = $wpdb->get_row($wpdb->prepare("SELECT * FROM $table_name WHERE id = %d ", $styleid), ARRAY_A);
$styledata = $styledata['css'];
$styledata = explode('|', $styledata);
?>
<div class="wrap">
     <?php echo responsive_tabs_with_accordions_promote_free();?>
    <div class="oxilab-admin-wrapper">
        <div class="oxilab-admin-row">
            <div class="oxilab-admin-style-panel-left">
                <div class="oxilab-admin-style-panel-left-settings">
                    <div class="oxilab-admin-style-panel-left-settings-row">
                        <form method="post">
                            <div class="oxilab-tabs-wrapper">
                                <ul class="oxilab-tabs-ul">
                                    <li ref="#oxilab-tabs-id-4" class="">
                                        Heading
                                    </li>
                                    <li ref="#oxilab-tabs-id-3" class="">
                                        Description
                                    </li>
                                    <li ref="#oxilab-tabs-id-2" class="">
                                        Custom CSS
                                    </li>
                                    <li ref="#oxilab-tabs-id-1">
                                        Support
                                    </li>
                                </ul>
                                <div class="oxilab-tabs-content">
                                    <div class="oxilab-tabs-content-tabs" id="oxilab-tabs-id-4">
                                        <div class="oxilab-tabs-content-div-50">
                                            <div class="oxilab-tabs-content-div">
                                                <div class="head-oxi">
                                                    Font Settings
                                                </div>
                                                <div class="form-group row form-group-sm">
                                                    <label for="heading-font-size" class="col-sm-6 col-form-label" data-toggle="tooltip" data-placement="top" title="Customize Title Font Size, Based on Pixel">Font Size </label>
                                                    <div class="col-sm-6 ">
                                                        <input class="form-control" type="number" value="<?php echo $styledata[1]; ?>" id="heading-font-size" name="heading-font-size">
                                                    </div>
                                                </div>
                                                <div class="form-group row form-group-sm">
                                                    <label for="heading-font-color" class="col-sm-6 control-label" data-toggle="tooltip" data-placement="top" title="Set Your Title Font Color, Based on Color">Color <span class="oxilab-pro-only">Pro</span></label>
                                                    <div class="col-sm-6 ">
                                                        <input type="text" class="form-control oxilab-vendor-color" id="heading-font-color" name="heading-font-color" value="<?php echo$styledata[3]; ?>">
                                                    </div>
                                                </div>
                                                <div class="form-group row form-group-sm">
                                                    <label for="heading-background-color" class="col-sm-6 control-label" data-toggle="tooltip" class="tooltipLink" data-original-title="Set Your Title background Color, Based on Color">Background <span class="oxilab-pro-only">Pro</span> </label>
                                                    <div class="col-sm-6 ">
                                                        <input type="text" data-format="rgb" data-opacity="true" class="form-control oxilab-vendor-color" id="heading-background-color" name="heading-background-color" value="<?php echo $styledata[5]; ?>">
                                                    </div>
                                                </div>
                                                <div class="form-group row form-group-sm">
                                                    <label for="heading-font-active-color" class="col-sm-6 control-label"  data-toggle="tooltip" data-placement="top" title="Customize Your Active Title Font Color, Based on Color">Color Active <span class="oxilab-pro-only">Pro</span></label>
                                                    <div class="col-sm-6 ">
                                                        <input type="text" class="form-control oxilab-vendor-color" id="heading-font-active-color" name="heading-font-active-color" value="<?php echo $styledata[7]; ?>">
                                                    </div>
                                                </div>
                                                <div class="form-group row form-group-sm">
                                                    <label for="heading-font-style" class="col-sm-6 col-form-label" data-toggle="tooltip" data-placement="top" title="Customize Your Heading Font Style"> Font Style</label>
                                                    <div class="col-sm-6">
                                                        <select class="form-control" id="heading-font-style" name="heading-font-style">
                                                            <option <?php
                                                            if ($styledata[59] == 'normal') {
                                                                echo 'selected';
                                                            }
                                                            ?> value="normal">Normal</option>
                                                            <option <?php
                                                            if ($styledata[59] == 'italic') {
                                                                echo 'selected';
                                                            }
                                                            ?> value="italic">Italic</option>
                                                            <option <?php
                                                            if ($styledata[59] == 'oblique') {
                                                                echo 'selected';
                                                            }
                                                            ?> value="oblique">Oblique</option>
                                                            <option <?php
                                                            if ($styledata[59] == 'initial') {
                                                                echo 'selected';
                                                            }
                                                            ?> value="initial">Initial</option>
                                                            <option <?php
                                                            if ($styledata[59] == 'inherit') {
                                                                echo 'selected';
                                                            }
                                                            ?> value="inherit">Inherit</option>
                                                        </select>
                                                    </div>
                                                </div> 
                                                <div class="form-group row form-group-sm">
                                                    <label for="heading-font-familly" class="col-sm-6 col-form-label"  data-toggle="tooltip" data-placement="top" title="Choose Your Title Preferred font, Based on Google Font"> Font Family <span class="oxilab-pro-only">Pro</span> </label>
                                                    <div class="col-sm-6 ">
                                                        <input class="cau-admin-font" type="text" name="heading-font-familly" id="heading-font-familly" value="<?php echo $styledata[13]; ?>">
                                                    </div>
                                                </div>
                                                <div class="form-group row form-group-sm">
                                                    <label for="heading-font-weight" class="col-sm-6 col-form-label"  data-toggle="tooltip" data-placement="top" title="Customize Your Title Font Weight, Based on CSS Weight" >Font Weight  </label>
                                                    <div class="col-sm-6 ">
                                                        <select class="form-control" id="heading-font-weight" name="heading-font-weight">
                                                            <option value="100"     <?php
                                                            if ($styledata[15] == '100') {
                                                                echo 'selected';
                                                            };
                                                            ?>>100</option>
                                                            <option value="200"     <?php
                                                            if ($styledata[15] == '200') {
                                                                echo 'selected';
                                                            };
                                                            ?>>200</option>
                                                            <option value="300"     <?php
                                                            if ($styledata[15] == '300') {
                                                                echo 'selected';
                                                            };
                                                            ?>>300</option>
                                                            <option value="400"     <?php
                                                            if ($styledata[15] == '400') {
                                                                echo 'selected';
                                                            };
                                                            ?>>400</option>
                                                            <option value="500"     <?php
                                                            if ($styledata[15] == '500') {
                                                                echo 'selected';
                                                            };
                                                            ?>>500</option>
                                                            <option value="600"     <?php
                                                            if ($styledata[15] == '600') {
                                                                echo 'selected';
                                                            };
                                                            ?>>600</option>
                                                            <option value="700"     <?php
                                                            if ($styledata[15] == '700') {
                                                                echo 'selected';
                                                            };
                                                            ?>>700</option>
                                                            <option value="800"     <?php
                                                            if ($styledata[15] == '800') {
                                                                echo 'selected';
                                                            };
                                                            ?>>800</option>
                                                            <option value="900"     <?php
                                                            if ($styledata[15] == '900') {
                                                                echo 'selected';
                                                            };
                                                            ?>>900</option>
                                                            <option value="normal" <?php
                                                            if ($styledata[15] == 'normal') {
                                                                echo 'selected';
                                                            };
                                                            ?>>Normal</option>
                                                            <option value="bold"    <?php
                                                            if ($styledata[15] == 'bold') {
                                                                echo 'selected';
                                                            };
                                                            ?>>Bold</option>
                                                            <option value="lighter" <?php
                                                            if ($styledata[15] == 'lighter') {
                                                                echo 'selected';
                                                            };
                                                            ?>>Lighter</option>
                                                            <option value="initial"   <?php
                                                            if ($styledata[15] == 'initial') {
                                                                echo 'selected';
                                                            };
                                                            ?>>Initial</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="oxilab-tabs-content-div">
                                                <div class="head-oxi">
                                                    Icon Settings
                                                </div>
                                                <div class="form-group row form-group-sm">
                                                    <label for="icon-font-size" class="col-sm-6 col-form-label" data-toggle="tooltip" data-placement="top" title="Customize Title Icon Size, Based on Pixel">Icon Size </label>
                                                    <div class="col-sm-6 ">
                                                        <input class="form-control" type="number" value="<?php echo $styledata[9]; ?>" id="icon-font-size" name="icon-font-size">
                                                    </div>
                                                </div>
                                                <div class="form-group row form-group-sm">
                                                    <label for="icon-margin-bottom" class="col-sm-6 col-form-label" data-toggle="tooltip" data-placement="top" title="Customize your Icon Bottom Space, based on pixel">Icon Margin Bottom </label>
                                                    <div class="col-sm-6 ">
                                                        <input class="form-control" type="number" value="<?php echo $styledata[11]; ?>" id="icon-margin-bottom" name="icon-margin-bottom">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="oxilab-tabs-content-div-50">
                                            <div class="oxilab-tabs-content-div">
                                                <div class="head-oxi">
                                                    Body Settings
                                                </div>
                                                <div class="form-group row form-group-sm">
                                                    <label for="heading-width" class="col-sm-6 col-form-label"  data-toggle="tooltip" data-placement="top" title=" Set Your Title Background Width, Based on Pixel">Width </label>
                                                    <div class="col-sm-6 ">
                                                        <input class="form-control" type="number" value="<?php echo $styledata[21]; ?>" id="heading-width" name="heading-width">
                                                    </div>
                                                </div>
                                                <div class="form-group row form-group-sm">
                                                    <label for="heading-text-align" class="col-sm-6 col-form-label"  data-toggle="tooltip" data-placement="top" title="Set Your Title Position">Heading Align  </label>
                                                    <div class="col-sm-6 ">
                                                        <select class="form-control" id="heading-text-align" name="heading-text-align">
                                                            <option value="flex-start"     <?php
                                                            if ($styledata[17] == 'flex-start') {
                                                                echo 'selected';
                                                            };
                                                            ?>>Left</option>
                                                            <option value="center"     <?php
                                                            if ($styledata[17] == 'center') {
                                                                echo 'selected';
                                                            };
                                                            ?>>Center</option>
                                                            <option value="flex-end"     <?php
                                                            if ($styledata[17] == 'flex-end') {
                                                                echo 'selected';
                                                            };
                                                            ?>>Right</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="form-group row form-group-sm">
                                                    <label for="heading-padding" class="col-sm-6 col-form-label"  data-toggle="tooltip" data-placement="top" title="Use Padding to generate space around Title, Based on Pixel">Padding </label>
                                                    <div class="col-sm-6 ">
                                                        <input class="form-control" type="number" value="<?php echo $styledata[23]; ?>" id="heading-padding" name="heading-padding">
                                                    </div>
                                                </div>                                                


                                                <div class="form-group row form-group-sm">
                                                    <label for="heading-border-radius" class="col-sm-6 col-form-label"  data-toggle="tooltip" data-placement="top" title="Add Rounded Corner on Up Side, Based on Pixel">Border Radius </label>
                                                    <div class="col-sm-6 ">
                                                        <input class="form-control" type="number" value="<?php echo $styledata[25]; ?>" id="heading-border-radius" name="heading-border-radius">
                                                    </div>
                                                </div>
                                                <div class="form-group row form-group-sm">
                                                    <label for="heading-border-color" class="col-sm-6 control-label"  data-toggle="tooltip" data-placement="top" title="Customize your Heading Bottom Border Color">Border Color <span class="oxilab-pro-only">Pro</span></label>
                                                    <div class="col-sm-6 ">
                                                        <input type="text" class="form-control oxilab-vendor-color" id="heading-border-color" name="heading-border-color" value="<?php echo$styledata[19]; ?>">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="oxilab-tabs-content-tabs" id="oxilab-tabs-id-3">
                                        <div class="oxilab-tabs-content-div-50">
                                            <div class="oxilab-tabs-content-div">
                                                <div class="head-oxi">
                                                    Font Settings
                                                </div>
                                                <div class="form-group row form-group-sm">
                                                    <label for="content-font-size" class="col-sm-6 col-form-label"  data-toggle="tooltip" data-placement="top" title="Customize Your Content Font Size, Based on Pixel">Font Size </label>
                                                    <div class="col-sm-6 ">
                                                        <input class="form-control" type="number" value="<?php echo $styledata[27]; ?>" id="content-font-size" name="content-font-size">
                                                    </div>
                                                </div>
                                                <div class="form-group row form-group-sm">
                                                    <label for="content-font-color" class="col-sm-6 control-label"  data-toggle="tooltip" data-placement="top" title="Set Custom Content Font Color, Based on Color">Color <span class="oxilab-pro-only">Pro</span> </label>
                                                    <div class="col-sm-6 ">
                                                        <input type="text" class="form-control oxilab-vendor-color" id="content-font-color" name="content-font-color" value="<?php echo $styledata[29]; ?>">
                                                    </div>
                                                </div>    
                                                <div class="form-group row form-group-sm">
                                                    <label for="content-line-height" class="col-sm-6 col-form-label"  data-toggle="tooltip" data-placement="top" title="Customize Your Content Font Line Height, Based on Point">Line Height </label>
                                                    <div class="col-sm-6 ">
                                                        <input class="form-control" type="number" step="0.1" value="<?php echo $styledata[41]; ?>" id="content-line-height" name="content-line-height">
                                                    </div>
                                                </div>
                                                <div class="form-group row form-group-sm">
                                                    <label for="content-font-familly" class="col-sm-6 col-form-label"  data-toggle="tooltip" data-placement="top" title="Choose Your Content Font, Based on Google Font"> Font Family <span class="oxilab-pro-only">Pro</span> </label>
                                                    <div class="col-sm-6 ">
                                                        <input class="cau-admin-font" value="<?php echo $styledata[43]; ?>" type="text" name="content-font-familly" id="content-font-familly">
                                                    </div>
                                                </div>
                                                <div class="form-group row form-group-sm">
                                                    <label for="content-font-weight" class="col-sm-6 col-form-label" data-toggle="tooltip" data-placement="top" title="Customize Content Font Weight, Based on CSS Weight">Font Weight  </label>
                                                    <div class="col-sm-6 ">
                                                        <select class="form-control" id="content-font-weight" name="content-font-weight">
                                                            <option value="100" <?php
                                                            if ($styledata[45] == '100') {
                                                                echo 'selected';
                                                            };
                                                            ?>>100</option>
                                                            <option value="200" <?php
                                                            if ($styledata[45] == '200') {
                                                                echo 'selected';
                                                            };
                                                            ?>>200</option>
                                                            <option value="300" <?php
                                                            if ($styledata[45] == '300') {
                                                                echo 'selected';
                                                            };
                                                            ?>>300</option>
                                                            <option value="400" <?php
                                                            if ($styledata[45] == '400') {
                                                                echo 'selected';
                                                            };
                                                            ?>>400</option>
                                                            <option value="500" <?php
                                                            if ($styledata[45] == '500') {
                                                                echo 'selected';
                                                            };
                                                            ?>>500</option>
                                                            <option value="600" <?php
                                                            if ($styledata[45] == '600') {
                                                                echo 'selected';
                                                            };
                                                            ?>>600</option>
                                                            <option value="700" <?php
                                                            if ($styledata[45] == '700') {
                                                                echo 'selected';
                                                            };
                                                            ?>>700</option>
                                                            <option value="800" <?php
                                                            if ($styledata[45] == '800') {
                                                                echo 'selected';
                                                            };
                                                            ?>>800</option>
                                                            <option value="900" <?php
                                                            if ($styledata[45] == '900') {
                                                                echo 'selected';
                                                            };
                                                            ?>>900</option>
                                                            <option value="normal" <?php
                                                            if ($styledata[45] == 'normal') {
                                                                echo 'selected';
                                                            };
                                                            ?>>Normal</option>
                                                            <option value="bold" <?php
                                                            if ($styledata[45] == 'bold') {
                                                                echo 'selected';
                                                            };
                                                            ?>>Bold</option>
                                                            <option value="lighter" <?php
                                                            if ($styledata[45] == 'lighter') {
                                                                echo 'selected';
                                                            };
                                                            ?>>Lighter</option>
                                                            <option value="initial" <?php
                                                            if ($styledata[45] == 'initial') {
                                                                echo 'selected';
                                                            };
                                                            ?>>Initial</option>
                                                        </select>
                                                    </div>
                                                </div>                                               

                                            </div>
                                        </div>
                                        <div class="oxilab-tabs-content-div-50">
                                            <div class="oxilab-tabs-content-div">
                                                <div class="head-oxi">
                                                    Body Settings
                                                </div>
                                                <div class="form-group row form-group-sm">
                                                    <label for="content-font-align" class="col-sm-6 col-form-label"  data-toggle="tooltip" data-placement="top" title="Set Content Text Position, Based on left or center or Right">Text Align  </label>
                                                    <div class="col-sm-6 ">
                                                        <select class="form-control" id="content-font-align" name="content-font-align">
                                                            <option value="left" <?php
                                                            if ($styledata[47] == 'left') {
                                                                echo 'selected';
                                                            };
                                                            ?>>Left</option>
                                                            <option value="center" <?php
                                                            if ($styledata[47] == 'center') {
                                                                echo 'selected';
                                                            };
                                                            ?>>Center</option>
                                                            <option value="right" <?php
                                                            if ($styledata[47] == 'right') {
                                                                echo 'selected';
                                                            };
                                                            ?>>Right</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="form-group row form-group-sm">
                                                    <label for="content-background-color" class="col-sm-6 control-label"  data-toggle="tooltip" data-placement="top" title="Set Custom Background Color of Content Box">Background Color <span class="oxilab-pro-only">Pro</span> </label>
                                                    <div class="col-sm-6 ">
                                                        <input type="text" data-format="rgb" data-opacity="true" class="form-control oxilab-vendor-color" id="content-background-color" name="content-background-color" value="<?php echo $styledata[31]; ?>">
                                                    </div>
                                                </div>
                                                <div class="form-group row form-group-sm">
                                                    <label for="content-padding-top" class="col-sm-6 col-form-label"  data-toggle="tooltip" data-placement="top" title="Use Padding to Generate Space Around Content as top, right, bottom, left. Based on Pixel">Padding Top Bottom </label>
                                                    <div class="col-sm-3">
                                                        <input class="form-control" type="number" value="<?php echo $styledata[33]; ?>" id="content-padding-top" name="content-padding-top">
                                                    </div>
                                                    <div class="col-sm-3 ">
                                                        <input class="form-control" type="number" value="<?php echo $styledata[37]; ?>" id="content-padding-bottom" name="content-padding-bottom">
                                                    </div>
                                                </div>
                                                <div class="form-group row form-group-sm">
                                                    <label for="content-padding-top" class="col-sm-6 col-form-label"  data-toggle="tooltip" data-placement="top" title="Use Padding to Generate Space Around Content as top, right, bottom, left. Based on Pixel">Padding Right Left </label>
                                                    <div class="col-sm-3 ">
                                                        <input class="form-control" type="number" value="<?php echo $styledata[35]; ?>" id="content-padding-right" name="content-padding-right">
                                                    </div>
                                                    <div class="col-sm-3 ">
                                                        <input class="form-control" type="number" value="<?php echo $styledata[39]; ?>" id="content-padding-left" name="content-padding-left">
                                                    </div>
                                                </div> 
                                            </div>
                                            <div class="oxilab-tabs-content-div">
                                                <div class="head-oxi">
                                                    Box Shadow                                                
                                                </div>
                                                <div class="form-group row form-group-sm">
                                                    <label for="content-box-shadow-Horizontal" class="col-sm-6 col-form-label" data-toggle="tooltip" class="tooltipLink" data-original-title="Attach Shadow Length to Tabs, Based on Pixel">Box Shadow  Length</label>
                                                    <div class="col-sm-3">
                                                        <input class="form-control" type="number" value="<?php echo $styledata[53]; ?>" id="content-box-shadow-Horizontal" name="content-box-shadow-Horizontal">
                                                    </div>
                                                    <div class="col-sm-3">
                                                        <input class="form-control" type="number" value="<?php echo $styledata[55]; ?>" id="content-box-shadow-Vertical" name="content-box-shadow-Vertical">
                                                    </div>
                                                </div>
                                                <div class="form-group row form-group-sm">
                                                    <label for="content-box-shadow-Blur" class="col-sm-6 col-form-label" data-toggle="tooltip" class="tooltipLink" data-original-title="Attach Shadow Size to Tabs, Based on Pixel">Box Shadow Radius</label>
                                                    <div class="col-sm-3">
                                                        <input class="form-control" type="number" value="<?php echo $styledata[49]; ?>" id="content-box-shadow-Blur" name="content-box-shadow-Blur">
                                                    </div>
                                                    <div class="col-sm-3">
                                                        <input class="form-control" type="number" value="<?php echo $styledata[57]; ?>" id="content-box-shadow-Spread" name="content-box-shadow-Spread">
                                                    </div>
                                                </div>
                                                <div class="form-group row form-group-sm">
                                                    <label for="content-box-shadow-color" class="col-sm-6 control-label"  data-toggle="tooltip" data-placement="top" title="Add custom Shadow Color to Tabs">Box Shadow Color <span class="oxilab-pro-only">Pro</span> </label>
                                                    <div class="col-sm-6 ">
                                                        <input type="text" data-format="rgb" data-opacity="true" class="form-control oxilab-vendor-color" id="content-box-shadow-color" name="content-box-shadow-color" value="<?php echo $styledata[51]; ?>">
                                                    </div>
                                                </div>
                                            </div>

                                        </div>

                                    </div>
                                    <div class="oxilab-tabs-content-tabs" id="oxilab-tabs-id-2">
                                        <div class="col-xs-12">
                                            <div class="form-group">
                                                <label for="custom-css">Custom CSS <span class="oxilab-pro-only">Pro</span></label>
                                                <textarea class="form-control" rows="4" id="custom-css" name="custom-css"><?php echo $styledata[61]; ?></textarea>
                                                <small class="form-text text-muted">Add Your Custom CSS Unless make it blank.</small>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="oxilab-tabs-content-tabs" id="oxilab-tabs-id-1">
                                        <?php echo responsive_tabs_with_accordions_video_toturial();?>
                                    </div>
                                </div>
                            </div>

                            <div class="oxilab-setting-save">
                                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                <input type="submit" class="btn btn-primary" name="data-submit" value="Save">
                                <?php wp_nonce_field("oxitabsstylecss") ?>
                            </div>
                        </form>
                         <script type="text/javascript">
                            jQuery(document).ready(function () {
                                jQuery(".oxilab-tabs-ul li:first").addClass("active");
                                jQuery(".oxilab-tabs-content-tabs:first").addClass("active");
                                jQuery(".oxilab-tabs-ul li").click(function () {
                                    jQuery(".oxilab-tabs-ul li").removeClass("active");
                                    jQuery(this).toggleClass("active");
                                    jQuery(".oxilab-tabs-content-tabs").removeClass("active");
                                    var activeTab = jQuery(this).attr("ref");
                                    jQuery(activeTab).addClass("active");
                                });
                                jQuery('[data-toggle="tooltip"]').tooltip();
                                jQuery("#heading-font-size").on("change", function () {
                                    jQuery("<style type='text/css'> .ctu-ulimate-style-<?php echo $styleid; ?> li{ font-size:" + jQuery('#heading-font-size').val() + "px;} </style>").appendTo(".ctu-ultimate-wrapper-<?php echo $styleid; ?>");
                                });
                                jQuery("#heading-font-color").on("change", function () {
                                    jQuery("<style type='text/css'> .ctu-ulimate-style-<?php echo $styleid; ?> li{ color:" + jQuery('#heading-font-color').val() + ";} </style>").appendTo(".ctu-ultimate-wrapper-<?php echo $styleid; ?>");
                                });
                                jQuery("#heading-background-color").on("change", function () {
                                    jQuery("<style type='text/css'> .ctu-ulimate-style-<?php echo $styleid; ?>{ background-color:" + jQuery('#heading-background-color').val() + ";} </style>").appendTo(".ctu-ultimate-wrapper-<?php echo $styleid; ?>");
                                });

                                jQuery("#heading-font-active-color").on("change", function () {
                                    jQuery("<style type='text/css'> .ctu-ulimate-style-<?php echo $styleid; ?> li.active{ color:" + jQuery('#heading-font-active-color').val() + ";} </style>").appendTo(".ctu-ultimate-wrapper-<?php echo $styleid; ?>");
                                    jQuery("<style type='text/css'> .ctu-ulimate-style-<?php echo $styleid; ?> li.active .ctu-absulote{ border-color: " + jQuery('#heading-font-active-color').val() + ";} </style>").appendTo(".ctu-ultimate-wrapper-<?php echo $styleid; ?>");
                                    jQuery("<style type='text/css'> .ctu-ulimate-style-<?php echo $styleid; ?> li.active .ctu-absulote{ background-color: " + jQuery('#heading-font-active-color').val() + ";} </style>").appendTo(".ctu-ultimate-wrapper-<?php echo $styleid; ?>");
                                });
                                jQuery("#icon-font-size").on("change", function () {
                                    jQuery("<style type='text/css'> .ctu-ulimate-style-<?php echo $styleid; ?> li span .fa{ font-size:" + jQuery('#icon-font-size').val() + "px;} </style>").appendTo(".ctu-ultimate-wrapper-<?php echo $styleid; ?>");
                                });
                                jQuery("#icon-margin-bottom").on("change", function () {
                                    jQuery("<style type='text/css'> .ctu-ulimate-style-<?php echo $styleid; ?> li span .fa{ margin-bottom:" + jQuery('#icon-margin-bottom').val() + "px;} </style>").appendTo(".ctu-ultimate-wrapper-<?php echo $styleid; ?>");
                                });
                                jQuery('#heading-font-familly').fontselect().change(function () {
                                    var font = jQuery(this).val().replace(/\+/g, ' ');
                                    font = font.split(':');
                                    jQuery("<style type='text/css'> .ctu-ulimate-style-<?php echo $styleid; ?> li{ font-family:" + font[0] + ";} </style>").appendTo(".ctu-ultimate-wrapper-<?php echo $styleid; ?>");
                                });
                                jQuery("#heading-font-weight").on("change", function () {
                                    jQuery("<style type='text/css'> .ctu-ulimate-style-<?php echo $styleid; ?> li{ font-weight:" + jQuery('#heading-font-weight').val() + ";} </style>").appendTo(".ctu-ultimate-wrapper-<?php echo $styleid; ?>");
                                });
                                jQuery("#heading-text-align").on("change", function () {
                                    jQuery("<style type='text/css'> .ctu-ulimate-style-<?php echo $styleid; ?>{ justify-content: " + jQuery('#heading-text-align').val() + ";} </style>").appendTo(".ctu-ultimate-wrapper-<?php echo $styleid; ?>");
                                });
                                jQuery("#heading-border-color").on("change", function () {
                                    jQuery("<style type='text/css'> .ctu-ulimate-style-<?php echo $styleid; ?>{ border-color:" + jQuery('#heading-border-color').val() + ";} </style>").appendTo(".ctu-ultimate-wrapper-<?php echo $styleid; ?>");
                                    jQuery("<style type='text/css'> .ctu-absulote{ border-color:" + jQuery('#heading-border-color').val() + ";} </style>").appendTo(".ctu-ultimate-wrapper-<?php echo $styleid; ?>");
                                });
                                jQuery("#heading-width").on("change", function () {
                                    jQuery("<style type='text/css'> .ctu-ulimate-style-<?php echo $styleid; ?> li{ width:" + jQuery('#heading-width').val() + "px;} </style>").appendTo(".ctu-ultimate-wrapper-<?php echo $styleid; ?>");
                                });
                                jQuery("#heading-padding").on("change", function () {
                                    jQuery("<style type='text/css'> .ctu-ulimate-style-<?php echo $styleid; ?> li{ padding:" + jQuery('#heading-padding').val() + "px 10px;} </style>").appendTo(".ctu-ultimate-wrapper-<?php echo $styleid; ?>");
                                });
                                jQuery("#heading-border-radius").on("change", function () {
                                    jQuery("<style type='text/css'> .ctu-ulimate-style-<?php echo $styleid; ?>{ border-radius:" + jQuery('#heading-border-radius').val() + "px " + jQuery('#heading-border-radius').val() + "px 0 0;} </style>").appendTo(".ctu-ultimate-wrapper-<?php echo $styleid; ?>");
                                    jQuery("<style type='text/css'> .ctu-ultimate-wrapper-<?php echo $styleid; ?>{ border-radius:" + jQuery('#heading-border-radius').val() + "px " + jQuery('#heading-border-radius').val() + "px 0 0;} </style>").appendTo(".ctu-ultimate-wrapper-<?php echo $styleid; ?>");
                                    jQuery("<style type='text/css'> .ctu-ultimate-wrapper-<?php echo $styleid; ?>{ border-radius:" + jQuery('#heading-border-radius').val() + "px " + jQuery('#heading-border-radius').val() + "px 0 0;} </style>").appendTo(".ctu-ultimate-wrapper-<?php echo $styleid; ?>");
                                });
                                jQuery("#heading-font-style").on("change", function () {
                                    jQuery("<style type='text/css'> .ctu-ulimate-style-<?php echo $styleid; ?> li{ font-style: " + jQuery('#heading-font-style').val() + ";}</style>").appendTo(" .ctu-ultimate-wrapper-<?php echo $styleid; ?>");
                                });
                                jQuery("#content-font-size").on("change", function () {
                                    jQuery("<style type='text/css'> .ctu-ulitate-style-<?php echo $styleid; ?>-tabs p{ font-size:" + jQuery('#content-font-size').val() + "px;} </style>").appendTo(".ctu-ultimate-wrapper-<?php echo $styleid; ?>");
                                });
                                jQuery("#content-font-color").on("change", function () {
                                    jQuery("<style type='text/css'> .ctu-ulitate-style-<?php echo $styleid; ?>-tabs p{ color:" + jQuery('#content-font-color').val() + ";} </style>").appendTo(".ctu-ultimate-wrapper-<?php echo $styleid; ?>");
                                });
                                jQuery("#content-line-height").on("change", function () {
                                    jQuery("<style type='text/css'> .ctu-ulitate-style-<?php echo $styleid; ?>-tabs p{ line-height:" + jQuery('#content-line-height').val() + ";} </style>").appendTo(".ctu-ultimate-wrapper-<?php echo $styleid; ?>");
                                });
                                jQuery('#content-font-familly').fontselect().change(function () {
                                    var font = jQuery(this).val().replace(/\+/g, ' ');
                                    font = font.split(':');
                                    jQuery("<style type='text/css'> .ctu-ulitate-style-<?php echo $styleid; ?>-tabs p{ font-family:" + font[0] + ";} </style>").appendTo(".ctu-ultimate-wrapper-<?php echo $styleid; ?>");
                                });
                                jQuery("#content-font-weight").on("change", function () {
                                    jQuery("<style type='text/css'> .ctu-ulitate-style-<?php echo $styleid; ?>-tabs p{ font-weight:" + jQuery('#content-font-weight').val() + ";} </style>").appendTo(".ctu-ultimate-wrapper-<?php echo $styleid; ?>");
                                });
                                jQuery("#content-font-align").on("change", function () {
                                    jQuery("<style type='text/css'> .ctu-ulitate-style-<?php echo $styleid; ?>-tabs p{ text-align:" + jQuery('#content-font-align').val() + ";} </style>").appendTo(".ctu-ultimate-wrapper-<?php echo $styleid; ?>");
                                });
                                jQuery("#content-background-color").on("change", function () {
                                    jQuery("<style type='text/css'> .ctu-ulitate-style-<?php echo $styleid; ?>-tabs{ background-color:" + jQuery('#content-background-color').val() + ";} </style>").appendTo(".ctu-ultimate-wrapper-<?php echo $styleid; ?>");
                                });
                                 jQuery("#content-padding-top").on("change", function () {
                                    jQuery("<style type='text/css'> .ctu-ulitate-style-<?php echo $styleid; ?>-tabs{padding: " + jQuery("#content-padding-top").val() + "px " + jQuery("#content-padding-right").val() + "px " + jQuery("#content-padding-bottom").val() + "px " + jQuery("#content-padding-left").val() + "px;} </style>").appendTo("#oxilab-preview-data");
                                });
                                jQuery("#content-padding-bottom").on("change", function () {
                                    jQuery("<style type='text/css'> .ctu-ulitate-style-<?php echo $styleid; ?>-tabs{padding: " + jQuery("#content-padding-top").val() + "px " + jQuery("#content-padding-right").val() + "px " + jQuery("#content-padding-bottom").val() + "px " + jQuery("#content-padding-left").val() + "px;} </style>").appendTo("#oxilab-preview-data");
                                });
                                jQuery("#content-padding-right").on("change", function () {
                                    jQuery("<style type='text/css'> .ctu-ulitate-style-<?php echo $styleid; ?>-tabs{padding: " + jQuery("#content-padding-top").val() + "px " + jQuery("#content-padding-right").val() + "px " + jQuery("#content-padding-bottom").val() + "px " + jQuery("#content-padding-left").val() + "px;} </style>").appendTo("#oxilab-preview-data");
                                });
                                jQuery("#content-padding-left").on("change", function () {
                                    jQuery("<style type='text/css'> .ctu-ulitate-style-<?php echo $styleid; ?>-tabs{padding: " + jQuery("#content-padding-top").val() + "px " + jQuery("#content-padding-right").val() + "px " + jQuery("#content-padding-bottom").val() + "px " + jQuery("#content-padding-left").val() + "px;} </style>").appendTo("#oxilab-preview-data");
                                });
                                jQuery("#content-box-shadow-Blur").on("change", function () {
                                    var idvalue = jQuery('#content-box-shadow-Horizontal').val() + 'px ' + jQuery('#content-box-shadow-Vertical').val() + 'px ' + jQuery('#content-box-shadow-Blur').val() + 'px ' + jQuery('#content-box-shadow-Spread').val() + 'px ' + jQuery('#content-box-shadow-color').val();
                                    jQuery("<style type='text/css'>  .ctu-ultimate-wrapper-<?php echo $styleid; ?> {box-shadow :" + idvalue + ";} </style>").appendTo(" .ctu-ultimate-wrapper-<?php echo $styleid; ?>");
                                });
                                jQuery("#content-box-shadow-Horizontal").on("change", function () {
                                    var idvalue = jQuery('#content-box-shadow-Horizontal').val() + 'px ' + jQuery('#content-box-shadow-Vertical').val() + 'px ' + jQuery('#content-box-shadow-Blur').val() + 'px ' + jQuery('#content-box-shadow-Spread').val() + 'px ' + jQuery('#content-box-shadow-color').val();
                                    jQuery("<style type='text/css'>  .ctu-ultimate-wrapper-<?php echo $styleid; ?> {box-shadow :" + idvalue + ";} </style>").appendTo(" .ctu-ultimate-wrapper-<?php echo $styleid; ?>");
                                });
                                jQuery("#content-box-shadow-Vertical").on("change", function () {
                                    var idvalue = jQuery('#content-box-shadow-Horizontal').val() + 'px ' + jQuery('#content-box-shadow-Vertical').val() + 'px ' + jQuery('#content-box-shadow-Blur').val() + 'px ' + jQuery('#content-box-shadow-Spread').val() + 'px ' + jQuery('#content-box-shadow-color').val();
                                    jQuery("<style type='text/css'>  .ctu-ultimate-wrapper-<?php echo $styleid; ?> {box-shadow :" + idvalue + ";} </style>").appendTo(" .ctu-ultimate-wrapper-<?php echo $styleid; ?>");
                                });
                                jQuery("#content-box-shadow-Spread").on("change", function () {
                                    var idvalue = jQuery('#content-box-shadow-Horizontal').val() + 'px ' + jQuery('#content-box-shadow-Vertical').val() + 'px ' + jQuery('#content-box-shadow-Blur').val() + 'px ' + jQuery('#content-box-shadow-Spread').val() + 'px ' + jQuery('#content-box-shadow-color').val();
                                    jQuery("<style type='text/css'>  .ctu-ultimate-wrapper-<?php echo $styleid; ?>{box-shadow :" + idvalue + ";} </style>").appendTo(" .ctu-ultimate-wrapper-<?php echo $styleid; ?>");
                                });
                                jQuery("#content-box-shadow-color").on("change", function () {
                                    jQuery("<style type='text/css'>  .ctu-ultimate-wrapper-<?php echo $styleid; ?>{box-shadow:" + jQuery('#content-box-shadow-Horizontal').val() + "px " + jQuery('#content-box-shadow-Vertical').val() + "px " + jQuery('#content-box-shadow-Blur').val() + "px " + jQuery('#content-box-shadow-Spread').val() + "px " + jQuery('#content-box-shadow-color').val() + ";} </style>").appendTo(".ctu-ultimate-wrapper-<?php echo $styleid; ?>");
                                });
                            });
                        </script>
                    </div>
                </div>
                <div class="oxilab-admin-style-panel-left-preview">
                    <div class="oxilab-admin-style-panel-left-preview-heading">
                        <div class="oxilab-admin-style-panel-left-preview-heading-left">
                            Preview
                        </div>
                        <div class="oxilab-admin-style-panel-left-preview-heading-right">
                            <input type="text" class="form-control oxilab-vendor-color"  data-format="rgb" data-opacity="true"  id="oxilab-preview-data-background" value="rgba(255, 255, 255, 1)">
                        </div>
                    </div>
                    <div class="oxilab-preview-data" id="oxilab-preview-data">
                        <?php oxi_responsive_tabs_shortcode_function($styleid, 'admin') ?>
                    </div>
                </div>
            </div>
            <div class="oxilab-admin-style-panel-right">
                <div class="oxilab-admin-item-panel">
                    <div class="oxilab-admin-add-new-headding">
                        Add New
                    </div>
                    <div class="oxilab-admin-add-new-item" id="oxilab-admin-add-new-item">
                        <span>
                            <i class="fa fa-plus-circle"></i>
                            Add new Items
                        </span>
                    </div>
                </div>
                <div class="oxilab-shortcode">
                    <div class="oxilab-shortcode-heading">
                        Shortcodes
                    </div>
                    <div class="oxilab-shortcode-body">
                        <em>Shortcode for posts/pages/plugins</em>
                        <p>Copy &amp; paste the shortcode directly into any WordPress post or page.</p>
                        <input type="text" class="form-control" onclick="this.setSelectionRange(0, this.value.length)" value="[ctu_ultimate_oxi id=&quot;<?php echo $styleid; ?>&quot;]">
                        <span></span>
                        <em>Shortcode for templates/themes</em>
                        <p>Copy &amp; paste this code into a template file to include the slideshow within your theme.</p>
                        <input type="text" class="form-control" onclick="this.setSelectionRange(0, this.value.length)" value="&lt;?php echo do_shortcode(&#039;[ctu_ultimate_oxi  id=&quot;<?php echo $styleid; ?>&quot;]&#039;); ?&gt;">
                        <span></span>
                        <em>Apply on Visual Composer</em>
                        <p>Go on Visual Composer and get Our element on Content bar as Image Hover Ultimate</p>
                    </div>
                </div>
            </div>
            <div id="oxilab-add-new-data" class="modal fade" role="dialog">
                <div class="modal-dialog modal-lg">
                    <form method="POST">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                <h4 class="modal-title">Items Add or Edit</h4>
                            </div>
                            <div class="modal-body">
                                <div class="form-group">
                                    <label for="ctu-title"  data-toggle="tooltip" data-placement="top">Title</label>
                                    <input type="text "class="form-control" id="cau-title" name="ctu-title" value="<?php echo $title; ?>">
                                    <small class="form-text text-muted">Add or Modify Your Tabs Title.</small>
                                </div>
                                <div class="form-group">
                                    <label for="ctu-icon">Font Awesome Icon</label>
                                    <input type="text "class="form-control" id="ctu-icon" name="ctu-icon" value="<?php echo ctu_admin_special_charecter($font_asesome); ?>">
                                    <small class="form-text text-muted">Use Font Awesome icon As icon example fa-address-book</small>
                                </div>
                                <div class="form-group">
                                    <label for="ctu-details">Details:</label>
                                    <?php
                                    wp_editor(ctu_admin_special_charecter($files), 'ctu-details', $settings = array(
                                        'textarea_name' => 'ctu-details',
                                        'wpautop' => false,
                                        'force_br_newlines' => true,
                                        'force_p_newlines' => false)
                                    );
                                    ?>
                                    <small class="form-text text-muted">Add or Modify Your Content.</small>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <input type="hidden" id="item-id" name="item-id" value="<?php echo $itemid ?>">
                                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                <input type="submit" class="btn btn-primary" id="item-submit" name="submit" value="submit">
                            </div>
                        </div>
                        <?php wp_nonce_field("oxiteamshownewdata") ?>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    var str = '<script type="text/javascript">';
    str += 'setTimeout(function () {';
    str += ' jQuery(".media-button-insert").on("click", function () {';
    str += ' jQuery("#oxilab-add-new-data").css({"overflow-x": "hidden", "overflow-y": "auto"});jQuery("body").css({ "overflow" : "hidden" });';
    str += ' });';
    str += ' jQuery(".media-modal-close").on("click", function () {';
    str += ' jQuery("#oxilab-add-new-data").css({"overflow-x": "hidden", "overflow-y": "auto"});jQuery("body").css({ "overflow" : "hidden" });';
    str += '});';
    str += '}, 1000);';
    str += '<';
    str += '/script>';
    jQuery('#oxilab-admin-add-new-item').on('click', function () {
        jQuery("#oxilab-add-new-data").modal("show");
        jQuery("#ctu-title").val('');
        jQuery("ctu-details").val('');
        jQuery("#item-id").val('');
    });
    jQuery('#insert-media-button').on('click', function () {
        jQuery(str).appendTo("#oxilab-add-new-data");
    });



</script>