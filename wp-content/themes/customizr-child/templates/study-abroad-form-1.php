<?php
/*
Template Name: Study Abroad Program Form 1
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
                                <h3 class="slide-number active">1</h3>
                            </div>
                            <div class="col-md-3 col-sm-3 col-xs-12">
                                <h3 class="slide-number">2</h3>
                            </div>
                            <div class="col-md-3 col-sm-3 col-xs-12">
                                <h3 class="slide-number">3</h3>
                            </div>
                            <div class="col-md-3 col-sm-3 col-xs-12">
                                <h3 class="slide-number">4</h3>
                            </div>
                        </div>
                      </div>
                      
      <!--    <div class="title-search">Degree</div>-->
      <!--      <select id="degree" name="degree">-->
        <!--<?php-->
        <!--  while($userdata2 = $result2->fetch_assoc())-->
        <!--  {-->
        <!--      echo '<option value="',$userdata2["schooltype"],'">',$userdata2["typename"],'</option>';-->
        <!--  }-->
        <!--?>-->
      <!--</select>-->
                     
        <!--<div class="slide-content">-->
        <h4>1. 请选择您的最高学历或目前就读年级：</h4>
        <!--    <div class="choice-box">-->
            <select id="Step1" name="Step1">
              <option value="0">--请选择您的学历--</option>
                <option value="1">小学一年级</option>
                <option value="2">小学二年级</option>
                <option value="3">小学三年级</option>
                <option value="4">小学四年级</option>
                <option value="5">小学五年级</option>
                <option value="6">小学六年级</option>
                <option value="7">初一</option>
                <option value="8">初二</option>
                <option value="9">初三</option>
                <option value="10">高一</option>
                <option value="11">高二</option>
                <option value="12">高三</option>
                <option value="13">高中毕业</option>
                <option value="14">大专在读</option>
                <option value="15">大专毕业</option>
                <option value="16">大学在读</option>
                <option value="17">大学本科毕业</option>
                <option value="18">硕士研究生毕业</option>
            </select>
                </div>
        
        
            <a href="#"><button type="button" class="btn btn-slide" onclick="javascript:window.location='/study-abroad-program-step-2/?Step='+Step1.value;">下一步</button></a>
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

