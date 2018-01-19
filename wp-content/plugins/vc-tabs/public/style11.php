<?php
if (!defined('ABSPATH'))
    exit;

function oxi_responsive_tabs_shortcode_function_style11($styleid, $userdata, $styledata, $listdata) {
    wp_enqueue_style('cau-google-font', 'https://fonts.googleapis.com/css?family=' . $styledata[7] . '|' . $styledata[43] . '');
    ?>
    <style>
        .ctu-ultimate-wrapper-<?php echo $styleid; ?>{
            width: 100%;
            float: left;
        }
        .ctu-ulimate-style-<?php echo $styleid; ?>{
            width: 100%;
            float: left;
            list-style: none;
            display: flex;
            text-align: center;
            justify-content: <?php echo $styledata[13]; ?>;
            margin-bottom: <?php echo $styledata[19]; ?>px;
        }
        .ctu-ulimate-style-<?php echo $styleid; ?> li{
            list-style: none;
            width: 100%;
            float: left;
            cursor: pointer;
            max-width: <?php echo $styledata[11]; ?>px;
            position: relative;
            margin-bottom: 0;
            border-top: 5px solid ;
            padding: <?php echo $styledata[15]; ?>px 10px;
            margin-right: <?php echo $styledata[17]; ?>px;
            text-align: center;
            background-color: <?php echo $styledata[5]; ?>;
            font-size: <?php echo $styledata[1]; ?>px;
            font-family:    <?php echo ctu_font_familly_special_charecter($styledata[7]); ?>;
            font-weight: <?php echo $styledata[11]; ?>;
            line-height: 100%;
            font-style: <?php echo $styledata[65]; ?>;
            box-shadow:  <?php echo $styledata[59]; ?>px <?php echo $styledata[61]; ?>px <?php echo $styledata[23]; ?>px <?php echo $styledata[63]; ?>px <?php echo $styledata[25]; ?>;
        }
        .ctu-ulimate-style-<?php echo $styleid; ?> li span{
            color: <?php echo $styledata[3]; ?>;
            width: 100%;
            text-align: center;
            float: left;
            display: flex;
            justify-content: center;
            align-items: center;
        }
        .ctu-ulimate-style-<?php echo $styleid; ?> li.active span{
            color: inherit;
        }
        .ctu-ulimate-style-<?php echo $styleid; ?> li:last-child{
            margin-right: 0;
        }
        .ctu-ulimate-style-<?php echo $styleid; ?> li span .fa,  
        .ctu-ultimate-style-heading-<?php echo $styleid; ?> span .fa{
            padding-right: 8px;
            font-size: <?php echo $styledata[21]; ?>px;
        }
        .ctu-ultimate-style-<?php echo $styleid; ?>-content{
            width:100%;
            float: left;
        }
        .ctu-ultimate-style-heading-<?php echo $styleid; ?>{
            width: 100%;
            float: left;
            cursor: pointer;
            display: none;
            line-height: 100%;
            background-color:<?php echo $styledata[5]; ?>;
            font-size: <?php echo $styledata[1]; ?>px;
            padding: <?php echo $styledata[15]; ?>px 10px;
            font-weight: <?php echo $styledata[9]; ?>;
            font-style: <?php echo $styledata[65]; ?>;
            font-family:  <?php echo ctu_font_familly_special_charecter($styledata[7]); ?>;
            box-shadow:  <?php echo $styledata[59]; ?>px <?php echo $styledata[61]; ?>px <?php echo $styledata[23]; ?>px <?php echo $styledata[63]; ?>px <?php echo $styledata[25]; ?>;
        }
        .ctu-ultimate-style-heading-<?php echo $styleid; ?> span{
            color: <?php echo $styledata[3]; ?>;
            width: 100%;
            text-align: center;
            float: left;
            display: flex;
            justify-content: center;
            align-items: center;
        }
        .ctu-ultimate-style-heading-<?php echo $styleid; ?> span .fa{
            font-size:<?php echo $styledata[21]; ?>px;
        }
        .ctu-ultimate-style-heading-<?php echo $styleid; ?>.active span{
            color: inherit;
        }
        .ctu-ulitate-style-<?php echo $styleid; ?>-tabs{
            width: 100%;
            float: left;
            display: none;            
            background-color: <?php echo $styledata[31]; ?>;           
            padding: <?php echo $styledata[33]; ?>px <?php echo $styledata[35]; ?>px <?php echo $styledata[37]; ?>px <?php echo $styledata[39]; ?>px ;
            text-align: <?php echo $styledata[47]; ?>;
            box-shadow: <?php echo $styledata[53]; ?>px <?php echo $styledata[55]; ?>px <?php echo $styledata[49]; ?>px <?php echo $styledata[57]; ?>px <?php echo $styledata[51]; ?>;
        }
        .ctu-ulitate-style-<?php echo $styleid; ?>-tabs p{
            color: <?php echo $styledata[29]; ?>;
            font-size: <?php echo $styledata[27]; ?>px;
            font-weight: <?php echo $styledata[45]; ?>;
            line-height: <?php echo $styledata[41]; ?>;
            font-family: <?php echo ctu_font_familly_special_charecter($styledata[43]); ?>;
            margin-bottom: 0;
            margin-top:0;
        }
        @media only screen and (max-width: 900px) {
            .ctu-ultimate-wrapper-<?php echo $styleid; ?>{
                display: block;
                box-shadow: none;
            }
            .ctu-ultimate-style-<?php echo $styleid; ?>-content{
                width: 100%;
                border-left: none;
                display: block;
                overflow:   visible;
            }
            .ctu-ulimate-style-<?php echo $styleid; ?> {
                display: none;
            }
            .ctu-ultimate-style-heading-<?php echo $styleid; ?>{
                display: block;
                box-shadow:  <?php echo $styledata[59]; ?>px <?php echo $styledata[61]; ?>px <?php echo $styledata[23]; ?>px <?php echo $styledata[63]; ?>px <?php echo $styledata[25]; ?>;
                margin-bottom: <?php echo $styledata[19]; ?>px;
            }
            .ctu-ulitate-style-<?php echo $styleid; ?>-tabs{
                margin-bottom: 10px;
            }
        }
        <?php echo $styledata[67]; ?>
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
                $cssfile = explode('|', $value['css']);
                echo ' <li ref="#ctu-ulitate-style-' . $styleid . '-id-' . $value['id'] . '" style="color :' . $cssfile[1] . '; border-color: ' . $cssfile[1] . '">
                                <span> 
                                   <i class="fa  ' . $cssfile[3] . '"></i>
                                    ' . ctu_html_special_charecter($value['title']) . ' 
                                </span>
                            </li>';
            }
            echo '</ul>';

            echo '<div class="ctu-ultimate-style-' . $styleid . '-content">';
            foreach ($listdata as $value) {
                $cssfile = explode('|', $value['css']);
                echo '  <div class="ctu-ultimate-style-heading-' . $styleid . '" ref="#ctu-ulitate-style-' . $styleid . '-id-' . $value['id'] . '" style="color :' . $cssfile[1] . '"> 
                            <span> 
                             <i class="fa  ' . $cssfile[3] . '"></i>    ' . ctu_html_special_charecter($value['title']) . ' 
                            </span>
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
            jQuery(".ctu-ulimate-style-<?php echo $styleid; ?> li:first").attr("ref");
        });
    </script>
    <?php
}
