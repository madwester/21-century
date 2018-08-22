<?php
/*
Template Name: Study Abroad Program Form 4
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
                    <div class="container-slide">
        <div class="container no-padding">
                        <div class="row row-slide">
                            <div class="col-md-3 col-sm-3 col-xs-12">
                                <h3 class="slide-number">1</h3>
                            </div>
                            <div class="col-md-3 col-sm-3 col-xs-12">
                                <h3 class="slide-number">2</h3>
                            </div>
                            <div class="col-md-3 col-sm-3 col-xs-12">
                                <h3 class="slide-number">3</h3>
                            </div>
                            <div class="col-md-3 col-sm-3 col-xs-12">
                                <h3 class="slide-number active">4</h3>
                            </div>
                        </div>
                      </div>
        <div class="slide-content">
            
            <div class="container">
    
    <table>
        <tr>
          <th>校徽</th>
          <th>学校</th>
          <th>所在州</th>
        </tr>
     
    <?php
      include ("wp-content/themes/customizr-child/database.php");
      
      $query="SELECT * FROM wp_schoolinfo INNER JOIN wp_state WHERE wp_schoolinfo.state = wp_state.state AND wp_schoolinfo.state='1' AND school_type='9'";
      $result3= $connection->query($query);
      
      
      
      while($userdata3 = $result3->fetch_assoc())
      {
        echo '<tr>';
        echo '<td><a href="/',$userdata3["school_id"],'"><img class="result-logotype" src="/',$userdata3["pic_small"],'"></a></td>';
        echo '<td><a href="/',$userdata3["school_id"],'">',$userdata3["school_name"],'</a></td>';
        echo '<td>',$userdata3["state_name"],'</td>';
        echo '</tr>';
      }
    ?>
    </table>
</div>

          <?php
           
//	    $tStep=$_GET['Step'];
		
			
		?>
			
		<?php
			
// 			switch ($tStep1) 
// 			{
			    
// 			    case '1':
			        
// 			        $x=array("");
			        
// 			        break;
// 			?>
			
    		<?php
			
// 			switch ($tStep2) 
// 			{
			    
// 			    case '1':
			        
// 			        $x=array("");
			        
// 			        break;
// 			?>
            
<!--            <table>-->
<!--        <tr>-->
<!--          <th>校徽</th>-->
<!--          <th>名称</th>-->
<!--          <th>地区</th>-->
<!--        </tr>-->
        
<!--    <tr><td><img src="/uploads/image/20150311/1426072529.jpg"></td>-->
<!--    <td><a href="/S132">新南威尔士大学预科</td><td>新南威尔士州</td></tr-->
<!--    ><tr><td><img src="/uploads/image/20151013/1444698694.jpg"></td>-->
<!--    <td><a href="/S184">阿斯奎斯女子中学</td><td>新南威尔士州</td></tr>-->
<!--    <tr><td><img src="/uploads/image/20161209/1481270581.jpg"></td>-->
<!--    <td><a href="/S21">悉尼AIT科技设计学院</td><td>新南威尔士州</td></tr>-->
<!--    <tr><td><img src="/uploads/image/20150317/1426569258.jpg"></td>-->
<!--    <td><a href="/S8">ST SCHOLASTICA’S 天主教女校</td><td>新南威尔士州</td></tr>    -->
<!--    </table>-->
    
<!--</div>-->

            <!--<div class="container">-->
            <!--    <div class="row">-->
            <!--        <div class="col-md-3 col-sm-6 col-xs-12">-->
            <!--            <img class="school-image" src="http://via.placeholder.com/140x100">-->
            <!--            <p class="school-name">School Name</p>-->
            <!--            <p class="school-location">Location</p>-->
            <!--        </div>-->
            <!--        <div class="col-md-3 col-sm-6 col-xs-12">-->
            <!--            <img class="school-image" src="http://via.placeholder.com/140x100">-->
            <!--            <p class="school-name">School Name</p>-->
            <!--            <p class="school-location">Location</p>-->
            <!--        </div>-->
            <!--        <div class="col-md-3 col-sm-6 col-xs-12">-->
            <!--            <img class="school-image" src="http://via.placeholder.com/140x100">-->
            <!--            <p class="school-name">School Name</p>-->
            <!--            <p class="school-location">Location</p>-->
            <!--        </div>-->
            <!--        <div class="col-md-3 col-sm-6 col-xs-12">-->
            <!--            <img class="school-image" src="http://via.placeholder.com/140x100">-->
            <!--            <p class="school-name">School Name</p>-->
            <!--            <p class="school-location">Location</p>-->
            <!--        </div>-->
            <!--    </div>-->
            
            </div>
            <a href="/study-abroad-program-step-3/"><button type="button" class="btn btn-slide">上一步</button></a>
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
