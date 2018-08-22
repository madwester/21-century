<?php
/*
Template Name: courseSearch
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
 

<div class="container">
    <?php 
    include ("wp-content/themes/customizr-child/database.php");
    session_start();
    $query="SELECT * FROM wp_state";
    $result= $connection->query($query);
    
    $query="SELECT * FROM wp_schooltype";
    $result2= $connection->query($query);
    
    
    $query="SELECT * FROM wp_field WHERE level=0";
    $result3= $connection->query($query);
    
    
    ?>
    
    <div>所在州</div>
    <form action="/coursesearch" method="POST">
      <select id="states"  name="states">
        <?php
          while($userdata = $result->fetch_assoc())
          {
              echo '<option value="',$userdata["state"],'">',$userdata["state_name"],'</option>';
          }
        ?>
      </select>
      
      <div>课程类别</div>
      <select id="degree" name="degree">
        <?php
          while($userdata2 = $result2->fetch_assoc())
          {
              echo '<option value="',$userdata2["schooltype"],'">',$userdata2["typename"],'</option>';
          }
        ?>
      </select>
      
      
      <div>主要范围</div>
      <select id="main" name="main">
        <?php
          while($userdata3 = $result3->fetch_assoc())
          {
            echo '<option value="',$userdata3["field_id"],'">',$userdata3["field_name"],'</option>';
          }
        ?>
        
      </select>
      
      
      <input class="submit-btn"  type="submit" />
    </form>
    
    <table>
        <tr>
          <th>专业</th>
          <th>学校</th>
        </tr>
     
    <?php
      $state=$_POST["states"];
      $type=$_POST["degree"];
      $main='0'.$_POST["main"].'%';
      
      
      $query="SELECT * FROM wp_degree INNER JOIN wp_schoolinfo WHERE wp_degree.school_id = wp_schoolinfo.school_id AND wp_schoolinfo.state='$state' AND wp_schoolinfo.school_type='$type' AND wp_degree.kcfw LIKE '$main'";
      $result5= $connection->query($query);
      
     
      while($userdata5 = $result5->fetch_assoc())
      {
        
        echo '<tr>';
        echo '<td>',$userdata5["title"],'</td>';
        echo '<td><a href="/',$userdata5["school_id"],'">',$userdata5["school_name"],'</td>';
        echo '</tr>';
      }
    ?>
    </table>
  
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
