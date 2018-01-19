<?php
if (!defined('ABSPATH'))
    exit;

function oxi_responsive_tabs_shortcode_function_style1($styleid, $userdata, $styledata, $listdata) {
    wp_enqueue_style('cau-google-font-' . $styleid . '', 'https://fonts.googleapis.com/css?family=' . $styledata[11] . '|' . $styledata[43] . '');
    ?>
    <style>
        .ctu-ultimate-wrapper-<?php echo $styleid; ?>{
            width: 100%;
            float: left;
        }
        .ctu-ulimate-style-<?php echo $styleid; ?>{
            width: 100%;            
            display: -webkit-box;
            display: -ms-flexbox;
            display: -o-flexbox;
            display: -moz-flexbox;
            display: flex;
            float: left;
            overflow:hidden;
            list-style: none;
            margin-top: 10px;
            text-align: center;            
            -webkit-box-pack: <?php echo $styledata[15]; ?>;
            -ms-flex-pack: <?php echo $styledata[15]; ?>;
            -o-flex-pack: <?php echo $styledata[15]; ?>;
            -moz-flex-pack: <?php echo $styledata[15]; ?>;
            justify-content: <?php echo $styledata[15]; ?> ;
            border-top: <?php echo $styledata[53]; ?>px solid <?php echo $styledata[9]; ?>;
            margin-bottom: <?php echo $styledata[55]; ?>px;
            background-color: <?php echo $styledata[5]; ?>;
            -webkit-border-radius: <?php echo $styledata[21]; ?>px <?php echo $styledata[21]; ?>px 0 0;
            -ms-border-radius: <?php echo $styledata[21]; ?>px <?php echo $styledata[21]; ?>px 0 0;
            -o-border-radius: <?php echo $styledata[21]; ?>px <?php echo $styledata[21]; ?>px 0 0;
            -moz-border-radius: <?php echo $styledata[21]; ?>px <?php echo $styledata[21]; ?>px 0 0;
            border-radius: <?php echo $styledata[21]; ?>px <?php echo $styledata[21]; ?>px 0 0;
            -webkit-box-shadow: <?php echo $styledata[57]; ?>px <?php echo $styledata[59]; ?>px <?php echo $styledata[23]; ?>px <?php echo $styledata[61]; ?>px <?php echo $styledata[25]; ?>;
            -ms-box-shadow: <?php echo $styledata[57]; ?>px <?php echo $styledata[59]; ?>px <?php echo $styledata[23]; ?>px <?php echo $styledata[61]; ?>px <?php echo $styledata[25]; ?>; 
            -o-box-shadow: <?php echo $styledata[57]; ?>px <?php echo $styledata[59]; ?>px <?php echo $styledata[23]; ?>px <?php echo $styledata[61]; ?>px <?php echo $styledata[25]; ?>; 
            -moz-box-shadow: <?php echo $styledata[57]; ?>px <?php echo $styledata[59]; ?>px <?php echo $styledata[23]; ?>px <?php echo $styledata[61]; ?>px <?php echo $styledata[25]; ?>; 
            box-shadow: <?php echo $styledata[57]; ?>px <?php echo $styledata[59]; ?>px <?php echo $styledata[23]; ?>px <?php echo $styledata[61]; ?>px <?php echo $styledata[25]; ?>; 
        }
        .ctu-ulimate-style-<?php echo $styleid; ?> li{
            cursor: pointer;
            text-align: center;
            list-style: none;
            display: -webkit-box;
            display: -ms-flexbox;
            display: -o-flexbox;
            display: -moz-flexbox;
            display: flex;
            -webkit-box-pack: center;
            -ms-flex-pack: center;
            -o-flex-pack: center;
            -moz-flex-pack: center;
            justify-content: center ;
            -webkit-box-align: center;
            -ms-flex-align: center;
            -o-flex-align: center;
            -moz-flex-align: center;
            align-items: center;
            padding: <?php echo $styledata[19]; ?>px 10px;
            margin: 0;
            font-size: <?php echo $styledata[1]; ?>px;
            width: <?php echo $styledata[17]; ?>px;
            float: left;
            font-family: <?php echo ctu_font_familly_special_charecter($styledata[11]); ?>;
            color: <?php echo $styledata[3]; ?>;
            border-right: 1px solid  <?php echo $styledata[9]; ?>;
            font-weight:  <?php echo $styledata[13]; ?>;   
        }
        .ctu-ulimate-style-<?php echo $styleid; ?> li:last-child{
            border-right: none;
        }
        .ctu-ulimate-style-<?php echo $styleid; ?> li.active{
            color: <?php echo $styledata[7]; ?>;
            position: relative;
            -webkit-transition:  all 0.5s linear;
            -ms-transition:  all 0.5s linear;
            -o-transition:  all 0.5s linear;
            -moz-transition:  all 0.5s linear;
            transition:  all 0.5s linear;
            background-color: <?php echo $styledata[9]; ?>;
        }

        .ctu-ultimate-style-<?php echo $styleid; ?>-content{
            width: 100%;
            float: left;
        }
        .ctu-ultimate-style-heading-<?php echo $styleid; ?>{
            cursor: pointer;
            -webkit-border-radius: <?php echo $styledata[21]; ?>px;
            -ms-border-radius: <?php echo $styledata[21]; ?>px;
            -o-border-radius: <?php echo $styledata[21]; ?>px;
            -moz-border-radius: <?php echo $styledata[21]; ?>px;
            border-radius: <?php echo $styledata[21]; ?>px;
            padding: <?php echo $styledata[19]; ?>px 5px;
            text-align: center;
            font-size: <?php echo $styledata[1]; ?>px;
            width: 100%;
            display: inline-block;
            margin-bottom: 3px;
            color: <?php echo $styledata[3]; ?>;
            background-color: <?php echo $styledata[5]; ?>;
            font-family: <?php echo ctu_font_familly_special_charecter($styledata[11]); ?>;
            font-weight:  <?php echo $styledata[13]; ?>;
            display: none;
        }
        .ctu-ultimate-style-heading-<?php echo $styleid; ?>.active{
            color: <?php echo $styledata[7]; ?>;
            -webkit-transition:  all 0.5s linear;
            -ms-transition:  all 0.5s linear;
            -o-transition:  all 0.5s linear;
            -moz-transition:  all 0.5s linear;
            transition:  all 0.5s linear;
            background-color: <?php echo $styledata[9]; ?>;
        }
        .ctu-ulitate-style-<?php echo $styleid; ?>-tabs{
            width: 100%;
            float:left;
            background-color:  <?php echo $styledata[31]; ?> ;    
            display: none;
            -webkit-box-shadow: <?php echo $styledata[63]; ?>px <?php echo $styledata[65]; ?>px <?php echo $styledata[49]; ?>px <?php echo $styledata[67]; ?>px <?php echo $styledata[51]; ?>;
            -ms-box-shadow: <?php echo $styledata[63]; ?>px <?php echo $styledata[65]; ?>px <?php echo $styledata[49]; ?>px <?php echo $styledata[67]; ?>px <?php echo $styledata[51]; ?>;
            -o-box-shadow: <?php echo $styledata[63]; ?>px <?php echo $styledata[65]; ?>px <?php echo $styledata[49]; ?>px <?php echo $styledata[67]; ?>px <?php echo $styledata[51]; ?>;
            -moz-box-shadow: <?php echo $styledata[63]; ?>px <?php echo $styledata[65]; ?>px <?php echo $styledata[49]; ?>px <?php echo $styledata[67]; ?>px <?php echo $styledata[51]; ?>;
            box-shadow: <?php echo $styledata[63]; ?>px <?php echo $styledata[65]; ?>px <?php echo $styledata[49]; ?>px <?php echo $styledata[67]; ?>px <?php echo $styledata[51]; ?>;
            margin-bottom:10px;
            padding: <?php echo $styledata[33]; ?>px <?php echo $styledata[35]; ?>px <?php echo $styledata[37]; ?>px <?php echo $styledata[39]; ?>px;
        }
        .ctu-ulitate-style-<?php echo $styleid; ?>-tabs p{          
            font-size: <?php echo $styledata[27]; ?>px;
            color:  <?php echo $styledata[29]; ?>;
            line-height: <?php echo $styledata[41]; ?>;
            text-align: <?php echo $styledata[47]; ?>;           
            font-family: <?php echo ctu_font_familly_special_charecter($styledata[43]); ?>;
            font-weight: <?php echo $styledata[45]; ?>;
            margin: 0;
        }

        @media only screen and (max-width: 900px) {
            .ctu-ulimate-style-<?php echo $styleid; ?> {
                display: none;
            }
            .ctu-ultimate-style-heading-<?php echo $styleid; ?>{
                display: block;
            }
        }
        <?php echo $styledata[69]; ?>    
    </style>
    <?php
    if ($userdata == 'admin') {
        $adminclass = 'oxilab-ab-id';
    } else {
        $adminclass = '';
    }
    echo '<div class="ctu-ultimate-wrapper ctu-ultimate-wrapper-' . $styleid . '"><ul class="ctu-ulimate-style-' . $styleid . '">';

    foreach ($listdata as $value) {
        echo '<li ref="#ctu-ulitate-style-' . $styleid . '-id-' . $value['id'] . '">
                            ' . ctu_html_special_charecter($value['title']) . '';
        echo '</li>';
    }
    echo ' </ul> <div class="ctu-ultimate-style-' . $styleid . '-content">';

    foreach ($listdata as $value) {
        echo '  <div class="ctu-ultimate-style-heading-' . $styleid . '" ref="#ctu-ulitate-style-' . $styleid . '-id-' . $value['id'] . '"> 
                              ' . ctu_html_special_charecter($value['title']) . '
                    </div>
                    <div class="ctu-ulitate-style-' . $styleid . '-tabs  ' . $adminclass . ' " id="ctu-ulitate-style-' . $styleid . '-id-' . $value['id'] . '">
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
        echo '</div>';
    }
    echo ' </div> </div>';
    ?>

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
            var contentliwidth = jQuery(".ctu-ulimate-style-<?php echo $styleid; ?> li").outerWidth();
            var count = jQuery(".ctu-ulimate-style-<?php echo $styleid; ?> li").length;
            var fullwidth = jQuery(".ctu-ulimate-style-<?php echo $styleid; ?>").width();
            var widthresult = contentliwidth * count;
            if (fullwidth <= widthresult) {
                var eachwidth = parseInt(fullwidth / count) + 'px';
                jQuery(".ctu-ulimate-style-<?php echo $styleid; ?> li").css("width", eachwidth);
            }
        });
    </script>
    <?php
}
