<?php
/*
Template Name: s48
*/
if ( apply_filters( 'czr_ms', false ) ):
    /*
    *  This is the reference Custom Page Example template if you use the theme Modern style
    */

    get_header();
    // This hook is used to render the following elements(ordered by priorities) :
    // slider
    // singular thumbnail
    do_action('__before_main_wrapper')
  ?>

    <div id="main-wrapper" class="section">

          <?php
            /*
            * Featured Pages | 10
            * Breadcrumbs | 20
            */
            do_action('__before_main_container')
          ?>

          <div class="<?php czr_fn_main_container_class() ?>" role="main">

            <?php do_action('__before_content_wrapper'); ?>

            <div class="<?php czr_fn_column_content_wrapper_class() ?>">

                <?php do_action('__before_content'); ?>

                <div id="content" class="<?php czr_fn_article_container_class() ?>">
                  <?php

                    do_action( '__before_loop' );

                    if ( have_posts() ) {
                        /**
                        * this will render the WordPress loop template located in templates/content/loop.php
                        * that will be responsible to load the page part template located in templates/content/singular/page_content.php
                        */
                        czr_fn_render_template( 'loop' );
                    }

                    /*
                     * Optionally attached to this hook :
                     * Comments | 30
                     */
                    do_action( '__after_loop' );
                  ?>
                  
                  
<?php  
    include ("wp-content/themes/customizr-child/database.php");
    session_start();
    $sid = 'S48';
    $query = "SELECT * FROM wp_schoolinfo INNER JOIN wp_state WHERE wp_schoolinfo.state =wp_state.state AND school_id='$sid'";
    $result= $connection->query($query);
    $userdata = $result->fetch_assoc();
?>

<div class="container" style="margin-bottom: 30px;">
  <div class="row">
    <div class="col-3 text-center">
      <img src="/<?php echo  $userdata["pic_small"]; ?>">
    </div>
    <div class="col-9">
      <h5 class="less-margin">学校名称：<?php echo  $userdata["school_name"]; ?> </h5>
      <h5 class="less-margin">国家：澳大利亚</h5>
      <h5 class="less-margin">所在州：<?php echo  $userdata["state_name"]; ?></h5>
    </div>
  </div>
</div>
<div class="container">
<!-- Nav tabs -->

<ul class="nav nav-tabs" role="tablist">
<li class="nav-item">
  <a class="nav-link active" data-toggle="tab" href="#overview" role="tab">概念</a>
</li>
<li class="nav-item">
  <a class="nav-link" data-toggle="tab" href="#details" role="tab">详情</a>
</li>
<li class="nav-item">
  <a class="nav-link" data-toggle="tab" href="#images" role="tab">图片</a>
</li>
<li class="nav-item">
  <a class="nav-link" data-toggle="tab" href="#profession" role="tab">专业</a>
</li>
</ul>

<!-- Tab panes -->
<div class="tab-content">
<div class="tab-pane active" id="overview" role="tabpanel">
  <div class="container">
    <div class="row">
      <div class="col-12">
        <!--<img src="https://dummyimage.com/600 x 300/000000/ffffff.gif&text=Image+School" style="margin: 20px 0;">-->
         <?php
         if($userdata["pic_all"]!=null)
         {
          $image = unserialize($userdata["pic_all"]);
          $first = true;
          foreach($image as $k=>$v){
            if($first)
            {
              echo '<img src="/',$v,'" style="margin: 20px 0;">';
              $first=false;
            }
          };
         }
        ?>
        <h4 class="less-margin">学校简介</h4>
        <?php 
        echo $userdata["description"];
        ?>
      </div>
    </div>
  </div>
</div>
<div class="tab-pane" id="details" role="tabpanel">
  <div class="container">
    <?php echo $userdata["content"]?>
    <!--<div class="row">-->
    <!--  <div class="col-12">-->
    <!--    <h4 class="less-margin">School Profile</h4>-->
    <!--    <p class="less-margin">Placeholder: School Profile</p>-->
    <!--  </div>-->
    <!--</div>-->
    <!--<div class="row">-->
    <!--  <div class="col-12">-->
    <!--    <h4 class="less-margin">School History</h4>-->
    <!--    <p class="less-margin">Placeholder: School History</p>-->
    <!--  </div>-->
    <!--</div>-->
    <!--<div class="row">-->
    <!--  <div class="col-12">-->
    <!--    <h4 class="less-margin">School Characteristics</h4>-->
    <!--    <p class="less-margin">Placeholder: School Characteristics</p>-->
    <!--  </div>-->
    <!--</div>-->
    <!--<div class="row">-->
    <!--  <div class="col-12">-->
    <!--    <h4 class="less-margin">College Characteristics</h4>-->
    <!--    <p class="less-margin">Placeholder: College Characteristics</p>-->
    <!--  </div>-->
    <!--</div>-->
    <!--<div class="row">-->
    <!--  <div class="col-12">-->
    <!--    <h4 class="less-margin">School Facilities</h4>-->
    <!--    <p class="less-margin">Placeholder: School Facilities</p>-->
    <!--  </div>-->
    <!--</div>-->
  </div>
</div>
<div class="tab-pane" id="images" role="tabpanel">
  <div class="container">
    <div class="row">
    
    <?php
      if($userdata["pic_all"]!=null)
      {
        $image = unserialize($userdata["pic_all"]);
        foreach($image as $k=>$v){
          echo '<div class="col-lg-3 col-md-6 col-sm-6 col-xs-12 image">';
          echo '<img src="/',$v,'">';
          echo '</div>';
        };
      }
    ?>
    
    
    <!--  <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12 image">-->
    <!--    <img src="https://dummyimage.com/250 x 180/000000/ffffff.gif&text=Image+School">-->
    <!--  </div>-->
    <!--  <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12 image">-->
    <!--    <img src="https://dummyimage.com/250 x 180/000000/ffffff.gif&text=Image+School">-->
    <!--  </div>-->
    <!--  <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12 image">-->
    <!--    <img src="https://dummyimage.com/250 x 180/000000/ffffff.gif&text=Image+School">-->
    <!--  </div>-->
    <!--  <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12 image">-->
    <!--    <img src="https://dummyimage.com/250 x 180/000000/ffffff.gif&text=Image+School">-->
    <!--  </div>-->
    <!--</div>-->
    <!--<div class="row">-->
    <!--  <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12 image">-->
    <!--    <img src="https://dummyimage.com/250 x 180/000000/ffffff.gif&text=Image+School">-->
    <!--  </div>-->
    <!--  <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12 image">-->
    <!--    <img src="https://dummyimage.com/250 x 180/000000/ffffff.gif&text=Image+School">-->
    <!--  </div>-->
    <!--  <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12 image">-->
    <!--    <img src="https://dummyimage.com/250 x 180/000000/ffffff.gif&text=Image+School">-->
    <!--  </div>-->
    <!--  <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12 image">-->
    <!--    <img src="https://dummyimage.com/250 x 180/000000/ffffff.gif&text=Image+School">-->
    <!--  </div>-->
    </div>
  </div>
</div>
<div class="tab-pane" id="profession" role="tabpanel">
  
  <?php
  add_thickbox();

    $query = "SELECT * FROM wp_degree WHERE school_id='$sid'";
    $result2= $connection->query($query);
    while($userdata2 = $result2->fetch_assoc())
    {
      $content = $userdata2["content"]; 
      echo '<div class="hori-row">';
      echo '<div class="title-detail">',$userdata2["title"],'</div>'; 
      echo '<div class="column-detail">';
      echo '<a class="thickbox" title="详细" href="#TB_inline?height=600&width=600&inlineId=',$userdata2["degree_id"],'"><button class="btn btn-primary">查看详情</button></a>';
      echo '<div id="',$userdata2["degree_id"],'" style="display:none;">';
      echo $content;
      echo '</div>';
      echo '</div>';
      echo '<a href="http://www.ct21.com.cn/online/online.php?zy=',$userdata2["title"],'&sx=',$userdata["school_name"],'"><button class="btn btn-info">申请专业</button></br>';
      echo '</div>';
    }
  ?>
</div>
</div>
</div>
                  
                </div>

                <?php
                  /*
                   * Optionally attached to this hook :
                   * Comments | 30
                   */
                  do_action('__after_content'); ?>

                <?php
                  /*
                  * SIDEBARS
                  */
                  if ( czr_fn_is_registered_or_possible('left_sidebar') )
                    get_sidebar( 'left' );

                  if ( czr_fn_is_registered_or_possible('right_sidebar') )
                    get_sidebar( 'right' );
                ?>

            </div><!-- .column-content-wrapper -->

            <?php do_action('__after_content_wrapper'); ?>


          </div><!-- .container -->

          <?php do_action('__after_main_container'); ?>

    </div><!-- #main-wrapper -->

    <?php do_action('__after_main_wrapper'); ?>

    <?php
      if ( czr_fn_is_registered_or_possible('posts_navigation') ) :
    ?>
      <div class="container-fluid">
        <?php
            czr_fn_render_template( "content/singular/navigation/singular_posts_navigation" );
        ?>
      </div>
    <?php endif ?>

<?php get_footer() ?>
<?php
  return;
endif;

/*
*  This is the reference Custom Page Example template if you use the theme Classical style
*/

do_action( '__before_main_wrapper' ); ##hook of the header with get_header

?>
<div id="main-wrapper" class="<?php echo implode(' ', apply_filters( 'tc_main_wrapper_classes' , array('container') ) ) ?>">

    <?php do_action( '__before_main_container' ); ##hook of the featured page (priority 10) and breadcrumb (priority 20)...and whatever you need! ?>

    <div class="container" role="main">
        <div class="<?php echo implode(' ', apply_filters( 'tc_column_content_wrapper_classes' , array('row' ,'column-content-wrapper') ) ) ?>">

            <?php do_action( '__before_article_container' ); ##hook of left sidebar?>

                <div id="content" class="<?php echo implode(' ', apply_filters( 'tc_article_container_class' , array( CZR_utils::czr_fn_get_layout(  czr_fn_get_id() , 'class' ) , 'article-container' ) ) ) ?>">

                    <?php do_action( '__before_loop' );##hooks the header of the list of post : archive, search... ?>

                        <?php if ( have_posts() ) : ?>

                            <?php while ( have_posts() ) : ##all other cases for single and lists: post, custom post type, page, archives, search, 404 ?>

                                <?php the_post(); ?>

                                <?php do_action( '__before_article' ) ?>
                                    <article <?php czr_fn__f( '__article_selectors' ) ?>>
                                        <?php do_action( '__loop' ); ?>
                                    </article>
                                <?php do_action( '__after_article' ) ?>

                            <?php endwhile; ?>

                        <?php endif; ##end if have posts ?>

                    <?php do_action( '__after_loop' );##hook of the comments and the posts navigation with priorities 10 and 20 ?>

                </div><!--.article-container -->

           <?php do_action( '__after_article_container' ); ##hook of left sidebar ?>

        </div><!--.row -->
    </div><!-- .container role: main -->

    <?php do_action( '__after_main_container' ); ?>

</div><!-- //#main-wrapper -->

<?php do_action( '__after_main_wrapper' );##hook of the footer with get_get_footer ?>
