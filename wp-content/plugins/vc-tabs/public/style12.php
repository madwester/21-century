<?php
if (!defined('ABSPATH'))
    exit;

function oxi_responsive_tabs_shortcode_function_style12($styleid, $userdata, $styledata, $listdata) {
    wp_enqueue_style('cau-google-font', 'https://fonts.googleapis.com/css?family=' . $styledata[11] . '|' . $styledata[53] . '');
    ?>
    <style>
        .ctu-ultimate-wrapper-<?php echo $styleid; ?>{
            width: 100%;
            float: left;
        }
        .ctu-ulimate-style-<?php echo $styleid; ?>{
            width: calc(100% - <?php echo $styledata[39]; ?>%);
            float: left;
            list-style: none;
            margin-bottom: 0;
        }
        .ctu-ulimate-style-<?php echo $styleid; ?> li{
            width: calc(100% - 10px);
            position: relative;
            list-style: none;
            cursor: pointer;
            max-width: <?php echo $styledata[15]; ?>px;
            display: block;
            margin-bottom: <?php echo $styledata[19]; ?>px;                
            padding: <?php echo $styledata[17]; ?>px 15px;
            text-align: left;
            color: <?php echo $styledata[3]; ?>;
            font-size: <?php echo $styledata[1]; ?>px;
            font-family:    <?php echo ctu_font_familly_special_charecter($styledata[11]); ?>;
            font-weight: <?php echo $styledata[13]; ?>;
            background-color: <?php echo $styledata[5]; ?>;
            line-height: 100%;
            font-style: <?php echo $styledata[59]; ?>;
            -webkit-box-shadow: <?php echo $styledata[67]; ?>px <?php echo $styledata[69]; ?>px <?php echo $styledata[21]; ?>px <?php echo $styledata[71]; ?>px <?php echo $styledata[23]; ?>;
            -o-box-shadow:  <?php echo $styledata[67]; ?>px <?php echo $styledata[69]; ?>px <?php echo $styledata[21]; ?>px <?php echo $styledata[71]; ?>px <?php echo $styledata[23]; ?>;
            -ms-box-shadow:  <?php echo $styledata[67]; ?>px <?php echo $styledata[69]; ?>px <?php echo $styledata[21]; ?>px <?php echo $styledata[71]; ?>px <?php echo $styledata[23]; ?>;
            -moz-box-shadow: <?php echo $styledata[67]; ?>px <?php echo $styledata[69]; ?>px <?php echo $styledata[21]; ?>px <?php echo $styledata[71]; ?>px <?php echo $styledata[23]; ?>;
            box-shadow:   <?php echo $styledata[67]; ?>px <?php echo $styledata[69]; ?>px <?php echo $styledata[21]; ?>px <?php echo $styledata[71]; ?>px <?php echo $styledata[23]; ?>;
        }
        .ctu-ulimate-style-<?php echo $styleid; ?> li.active{
            color: <?php echo $styledata[7]; ?>;
            background-color:  <?php echo $styledata[9]; ?>;
        }
        .ctu-ulimate-style-<?php echo $styleid; ?> li.active .ctu-absolute{
            position: absolute;
            top: <?php echo ($styledata[17] * 2 + $styledata[1] - 20) / 2; ?>px;
            right: -10px;
            width: 0;
            height: 0;
            border-top: 10px solid transparent;
            border-left: 10px solid <?php echo $styledata[9]; ?>;
            border-bottom: 10px solid transparent;

        }
        .ctu-ultimate-style-<?php echo $styleid; ?>-content{
            width: <?php echo $styledata[39]; ?>%;
            float: left;
        }
        .ctu-ultimate-style-heading-<?php echo $styleid; ?>{
            width: 100%;
            float: left;
            cursor: pointer;
            display: none;
            line-height: 100%;
            color: <?php echo $styledata[3]; ?>;
            background-color: <?php echo $styledata[5]; ?>;
            font-size: <?php echo $styledata[1]; ?>px;
            padding: <?php echo $styledata[17]; ?>px 15px;
            font-weight: <?php echo $styledata[13]; ?>;
            font-style: <?php echo $styledata[59]; ?>;
            font-family:  <?php echo ctu_font_familly_special_charecter($styledata[11]); ?>;
            -webkit-box-shadow:    <?php echo $styledata[67]; ?>px <?php echo $styledata[69]; ?>px <?php echo $styledata[21]; ?>px <?php echo $styledata[71]; ?>px <?php echo $styledata[23]; ?>;
            -o-box-shadow:   <?php echo $styledata[67]; ?>px <?php echo $styledata[69]; ?>px <?php echo $styledata[21]; ?>px <?php echo $styledata[71]; ?>px <?php echo $styledata[23]; ?>;
            -ms-box-shadow:   <?php echo $styledata[67]; ?>px <?php echo $styledata[69]; ?>px <?php echo $styledata[21]; ?>px <?php echo $styledata[71]; ?>px <?php echo $styledata[23]; ?>;
            -moz-box-shadow:   <?php echo $styledata[67]; ?>px <?php echo $styledata[69]; ?>px <?php echo $styledata[21]; ?>px <?php echo $styledata[71]; ?>px <?php echo $styledata[23]; ?>;
            box-shadow:   <?php echo $styledata[67]; ?>px <?php echo $styledata[69]; ?>px <?php echo $styledata[21]; ?>px <?php echo $styledata[71]; ?>px <?php echo $styledata[23]; ?>;
            border-radius: 5px;
        }
        .ctu-ultimate-style-heading-<?php echo $styleid; ?>.active{
            color: <?php echo $styledata[7]; ?>;
            background-color: <?php echo $styledata[9]; ?>;
            border-radius: 5px 5px 0 0;
        }
        .ctu-ulitate-style-<?php echo $styleid; ?>-tabs{
            display: none;
            float: left;
            width: 100%;            
            border: <?php echo $styledata[49]; ?>px solid;
            border-color: <?php echo $styledata[51]; ?>;            
            border-radius: <?php echo $styledata[57]; ?>px;
            background-color: <?php echo $styledata[29]; ?>;
            font-weight: <?php echo $styledata[45]; ?>;            
            text-align: <?php echo $styledata[47]; ?>;
            padding: <?php echo $styledata[31]; ?>px <?php echo $styledata[33]; ?>px <?php echo $styledata[35]; ?>px <?php echo $styledata[37]; ?>px ;
            -webkit-box-shadow: <?php echo $styledata[61]; ?>px <?php echo $styledata[63]; ?>px <?php echo $styledata[21]; ?>px <?php echo $styledata[65]; ?>px <?php echo $styledata[55]; ?>;
            -o-box-shadow:  <?php echo $styledata[61]; ?>px <?php echo $styledata[63]; ?>px <?php echo $styledata[21]; ?>px <?php echo $styledata[65]; ?>px <?php echo $styledata[55]; ?>;
            -ms-box-shadow: <?php echo $styledata[61]; ?>px <?php echo $styledata[63]; ?>px <?php echo $styledata[21]; ?>px <?php echo $styledata[65]; ?>px <?php echo $styledata[55]; ?>;
            -moz-box-shadow:   <?php echo $styledata[61]; ?>px <?php echo $styledata[63]; ?>px <?php echo $styledata[21]; ?>px <?php echo $styledata[65]; ?>px <?php echo $styledata[55]; ?>;
            box-shadow:   <?php echo $styledata[61]; ?>px <?php echo $styledata[63]; ?>px <?php echo $styledata[21]; ?>px <?php echo $styledata[65]; ?>px <?php echo $styledata[55]; ?>;
        }
        .ctu-ulitate-style-<?php echo $styleid; ?>-tabs p{
            font-size: <?php echo $styledata[25]; ?>px;
            color: <?php echo $styledata[27]; ?>;
            line-height: <?php echo $styledata[41]; ?>;
            font-family:  <?php echo ctu_font_familly_special_charecter($styledata[53]); ?>;
            margin-top:0;
            margin-bottom: 0;
        }
        @media only screen and (max-width: 900px) {
            .ctu-ultimate-style-<?php echo $styleid; ?>-content{
                width: 100%;
            }
            .ctu-ulimate-style-<?php echo $styleid; ?> {
                display: none;
            }
            .ctu-ultimate-style-heading-<?php echo $styleid; ?>{
                display: block;
                margin-bottom: 10px;
            }
            .ctu-ulitate-style-<?php echo $styleid; ?>-tabs{
                margin-bottom: 10px;
                border-radius: 0 0 5px 5px;
                -webkit-box-shadow:   0 0 3px <?php echo $styledata[55]; ?>;
                -o-box-shadow:   0 0 3px <?php echo $styledata[55]; ?>;
                -ms-box-shadow:   0 0 3px <?php echo $styledata[55]; ?>;
                -moz-box-shadow:   0 0 3px <?php echo $styledata[55]; ?>;
                box-shadow:   0 0 3px <?php echo $styledata[55]; ?>;
            }
        }
    </style>
    <div class="ctu-ultimate-wrapper-<?php echo $styleid; ?>">
        <ul class="ctu-ulimate-style-<?php echo $styleid; ?>">
            <?php
            if ($userdata == 'admin') {
                $adminclass = 'oxilab-ab-id';
            } else {
                $adminclass = '';
            }
            foreach ($listdata as $value) {
                echo ' <li ref="#ctu-ulitate-style-' . $styleid . '-id-' . $value['id'] . '" class="">
                             ' . ctu_html_special_charecter($value['title']) . '
                            <div class="ctu-absolute"></div>
                        </li>';
            }
            echo '</ul>';
            echo '<div class="ctu-ultimate-style-' . $styleid . '-content">';
            foreach ($listdata as $value) {
                echo '<div class="ctu-ultimate-style-heading-' . $styleid . '" ref="#ctu-ulitate-style-' . $styleid . '-id-' . $value['id'] . '"> 
                            ' . ctu_html_special_charecter($value['title']) . '
                      </div>
                        <div class="ctu-ulitate-style-' . $styleid . '-tabs ' . $adminclass . '" id="ctu-ulitate-style-' . $styleid . '-id-' . $value['id'] . '">
                            ' . ctu_html_special_charecter($value['files']) . '';
                if ($userdata == 'admin') {
                    ?>
                    <div class="oxilab-admin-absulote">
                        <div class="oxilab-style-absulate-edit">
                            <form method="post"> 
                                <input type="hidden" name="item-id" value="<?php echo $value['id']; ?>">
                                <button class="btn btn-primary" type="submit" value="edit" name="edit" title="Edit">Edit</button>
                                <?php echo wp_nonce_field("oxitabseditdata"); ?>
                            </form>
                        </div>
                        <div class="oxilab-style-absulate-delete">
                            <form method="post">
                                <input type="hidden" name="item-id" value="<?php echo $value['id']; ?>">
                                <button class="btn btn-danger" type="submit" value="delete" name="delete" title="Delete">Delete</button>
                                <?php echo wp_nonce_field("oxitabsdeletedata"); ?>
                            </form>
                        </div>
                    </div>
                    <?php
                }
                echo '</div> ';
            }
            echo '</div>';
            ?>
    </div> 

    <script type="text/javascript">
        jQuery(document).ready(function () {
            jQuery(".ctu-ulimate-style-<?php echo $styleid; ?> li:first").addClass("active");
            jQuery(".ctu-ultimate-style-heading-<?php echo $styleid; ?>:first").addClass("active");
            jQuery(".ctu-ulitate-style-<?php echo $styleid; ?>-tabs:first").show();
            jQuery(".ctu-ulimate-style-<?php echo $styleid; ?> li").click(function () {
                jQuery(".ctu-ulimate-style-<?php echo $styleid; ?> li").removeClass("active");
                jQuery(this).toggleClass("active");
                jQuery(".ctu-ulitate-style-<?php echo $styleid; ?>-tabs").slideUp();
                var activeTab = jQuery(this).attr("ref");
                jQuery(activeTab).slideDown();
            });
            jQuery(".ctu-ultimate-style-heading-<?php echo $styleid; ?>").click(function () {
                jQuery(".ctu-ultimate-style-heading-<?php echo $styleid; ?>").removeClass("active");
                jQuery(this).toggleClass("active");
                jQuery(".ctu-ulitate-style-<?php echo $styleid; ?>-tabs").slideUp();
                var activeTab = jQuery(this).attr("ref");
                jQuery(activeTab).slideDown();
            });

        });
    </script>
    <?php
}
