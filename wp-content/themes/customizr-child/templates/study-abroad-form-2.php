<?php
/*
Template Name: Study Abroad Program Form 2
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
                                <h3 class="slide-number active">2</h3>
                            </div>
                            <div class="col-md-3 col-sm-3 col-xs-12">
                                <h3 class="slide-number">3</h3>
                            </div>
                            <div class="col-md-3 col-sm-3 col-xs-12">
                                <h3 class="slide-number">4</h3>
                            </div>
                        </div>
                      </div>
                        <div class="slide-content">
            <h4>2. 根据你填写的留学意向，我们为你推荐以下留学方案：</h4>
            
            
            <div class="choice-box">
           
           <?php
           
		    $tStep=$_GET['Step'];
// 			echo 'tStep=' . $tStep;	
			
			?>
			<?php
			
            //     $y=array("特点：针对小一上半学期在读学生","特点：针对小一下半学期在读学生");
            //       foreach ($y as $value1)
            // {
            //      echo $value1 . "<br>";
            // }

// 			foreach ($x as $value)
			
			switch ($tStep) 
			{
			    
			    case '1':
			    
			        
			        $x=array("澳洲小学一年级","澳洲小学二年级");
			        

			     $y=array("特点：针对小一上半学期在读学生","针对小一下半学期在读或完成小一学生");
                  
                  
			     
                  
        // //     {
        // //          echo $value . "<br>";
        //     }
			        break;
			    
			    case '2':

			        
			         $x=array("澳洲小学二年级","澳洲小学三年级");
			         

			         $y=array("特点：针对小二上半学期在读学生","针对小二下半学期在读或完成小二学生");
                  
                  
			         
			        break;
			        
			    case '3':
			    
			        
			        $x=array("澳洲小学三年级","澳洲小学四年级");
			        
			         $y=array("特点：针对小三上半学期在读学生","特点：针对小三下半学期在读或完成小三学生");
			        
			        break;
			        
			    case '4':
			     
			        
			        $x=array("澳洲小学四年级","澳洲小学五年级");
			        
			        
			         $y=array("特点：针对小四上半学期在读学生","针对小四下半学期在读或完成小四学生");
			        
			        break;
			        
			    case '5':
			   
			        
			        $x=array("澳洲小学五年级","澳洲小学六年级");
			        
			        
			         $y=array("特点：针对小五上半学期在读学生","针对小五下半学期在读或完成小五学生");
			        
			        break;
			        
			    case '6':
			     
			        
			        $x=array("澳洲小学六年级","澳洲初中七年级");
			        
			        
			         $y=array("特点：针对小六上半学期在读学生","针对小六下半学期在读或完成小六学生");
			        
			        break;
			        
			    case '7':
			     
			        
			        $x=array("澳洲初中七年级","澳洲初中八年级");
			        
			        
			        $y=array("特点：针对初一上半学期在读学生","特点：针对初一下半学期在读或完成初一学生");
			        
			        break;
			        
			    case '8':
			    
			        
			        $x=array("澳洲初中八年级","澳洲初中九年级");
			        
			        
			        $y=array("特点：针对初二上半学期在读学生","特点：针对初二下半学期在读或完成初二学生");
			        
			        break;
			        
			    case '9':
			  
			        
			        $x=array("澳洲初中九年级","澳洲高中十年级");
			        
			        
			        $y=array("特点：针对初三上半学期在读学生","特点：针对初三下半学期在读或完成初三学生");
			        
			        break;
			        
			    case '10':
			     
			        
			        $x=array("澳洲高中十年级","澳洲高中十一年级");
			        
			        
			        $y=array("特点：针对高一上半学期在读学生","特点：针对高一下半学期在读或完成高一学生(入读两年高中课程，接着参加澳洲高中HSC会考（高 考），根据会考成绩升读大学)");
			        
			        break;
			        
		        case '11':
			   
			        
			        $x=array("澳洲高中11年级 +高中12年级（入读两年高中课程，接着参加澳洲高中HSC会考（高考），根据会考成绩升读大学）","大学预科（一年课程）","大学直升课程 四级证书（1年）+ 文凭课程（1年）","TAFE（职业教育）三/四级证书 + 文凭课程（共1.5-2年）");
			        
			       
			       $y=array("特点：入读两年高中课程，接着参加澳洲高中HSC会考（高考），根据会考成绩升读大学）","特点：一年课程","特点:四级证书（1年）+ 文凭课程（1年）","TAFE（职业教育）三/四级证书 + 文凭课程（共1.5-2年）");
			       
			        break;
			        
			    case '12':
			   
			        
			         $x=array("大学预科（一年课程）","大学直升课程 四级证书（1年）+ 文凭课程（1年）","TAFE（职业教育）三/四级证书 + 文凭课程（共1.5-2年）");
			        
			        
			        $y=array("特点：澳洲的八所名牌大学均设有大学预科, 经入读名牌大学预科并完成后, 即可直接升入名牌大学大一, 无需高中会考成绩, 无需高中会考成绩，这是升入名牌大 学的较好的升学捷径","特点：澳洲的四星大学一般均设有大学直升文凭课程，完成文凭课程后，一般可以直升入相关大学二年级","特点：TAFE的证书和文凭课程的专业涵盖非常广阔，完成TAFE的文凭课程即可进入职场或经D2D文凭课程直升相关大学的二/三年级，瞩目的优点是可以节省很多学费，因为TAFE的证书和文凭,以及TAFE的大学本科课程的学费仅是澳洲普通大学学费的1/3到一半左右,因此经TAFE升读大学可以节省相当可观的学费。");
			        
			        break;
			        
			    case '13':
			   
			        
			         $x=array("大学预科（一年课程）","大学直升文凭课程（1年，接着直升大学二年级","TAFE（职业教育）文凭课程或高级文凭课程（一般为共1-2年）","大学本科");
			        
			        $y=array("特点：澳洲的八所名牌大学均设有大学预科，经入读名牌大学预科并完成后，即可直接升入名牌大学大一，无需高中会考成绩，这是升入名牌大 学的较好的升学捷径","特点：澳洲的四星大学一般均设有大学直升文凭课程，完成文凭课程后，一般可以直升入相关大学二年级。","特点：TAFE的文凭课程的专业涵盖非常广阔， 完成TAFE的文凭课程即可进入职场或经D2D文凭课程直升相关大学（包括TAFE自身开办的大学本科课程，专业有会计、幼教、设计、数码媒体3D艺术和动画、服装设计、IT）的大学二/三年级，经TAFE升读大学，瞩目的优点是可以节省很多学费，因为TAFE的证书和文凭，以及TAFE的大学本科课程的学费仅是澳洲普通大学学费的1/3到一半左右，因此经TAFE升读大学，可以节省相当可观的学费。","特点：海外（中国）高中毕业报读直升澳洲大学的申请，大学对海外高考成绩要求较高，同时，如从非英语国家学习背景希望直入大学主课程的，需达到雅思A类6.0-6.5分");
			        
			        
			        break;
			        
			    case '14':
			   
			        
			        $x=array("大学直升文凭课程（1年）","TAFE的文凭或高级文凭课程","大学学士学位（本科）课程");
			        
			         $y=array("特点：澳洲的四星大学一般均设有大学直升文凭课程，完成文凭课程后，一般可以直升入相关大学二年级","特点：TAFE的文凭课程的专业涵盖非常广阔， 完成TAFE的文凭课程即可进入职场或经D2D文凭课程直升相关大学（包括TAFE自身开办的大学本科课程，专业有会计、幼教、设计、数码媒体3D艺术和动画、服装设计、IT）的大学二/三年级，经TAFE升读大学，瞩目的优点是可以节省很多学费，因为TAFE的证书和文凭，以及TAFE的大学本科课程的学费仅是澳洲普通大学学费的1/3到一半左右，因此经TAFE升读大学，可以节省相当可观的学费。","特点：如果报读相同或相近专业课程，我们将为学生申请已学完课程的免修");
			        
			        break;
			        
			    case '15':
			   
			        
			        $x=array("大学本科","研究生证书（半年）","研究生文凭（1年）","硕士学位课程（1-2年）");
			        
			        $y=array("特点：如果报读相同或相近专业课程，我们将为学生申请已学完课程的免修","特点：完成时可直升研究生文凭或硕士课程","	

特点：完成时可直升硕士课程");
			        
			        break;
			        
			    case '16':
			    
			        
			        $x=array("大学本科");
			        
			        $y=array("特点：如果报读相同或相近专业课程，我们将为学生申请已学完课程的免修");
			        
			        break;
			        
			    case '17':
			    
			        
			        $x=array("研究生证书（半年）","研究生文凭（1年）","硕士学位课程（1-2年）");
			        
			        $y=array("特点：完成时可直升研究生文凭或硕士课程","特点：完成时可直升硕士课程");
			        
			        break;
			        
			    case '18':
			     
			        
			       $x=array("硕士学位课程（授课类研究生课程）","硕士学位课程（研究类研究生课程）","博士PHD课程（4年）");

			        break;
			        
			    default:
			        // code...
			        break;
			}
			 
		    	foreach ($x as $a=>$value)
		    	    
		    	{
		    	    
            
			?>
			        
			
                     <div class="row-radio">
                        <div class="radio-button"><input type="radio" name="choice-radio" value="<?php echo 1;?>" checked></div>
                        <div class="radio-title">
                      
                            <p class="radio-p"><?php echo $value;?></p>
                            
                            <?php
                             
                                  echo $y[$a]. "<br>";
                            
                //          
                //             ?>
                            
               
                            <!--<h6 class="radio-features"><?php echo $value . "<br>";?></h6>-->
                        </div>
                    </div>
            
                    <?php }?>
                    
                    
                    
                    
                    
                    
            <!--        <div class="row-radio">-->
            <!--            <div class="radio-button"><input type="radio" name="choice-radio" value="1" checked></div>-->
            <!--            <div class="radio-title">-->

            <!--                <p class="radio-p">澳洲二年级（小学）</p>-->
                            
            <!--                <h6 class="radio-features">特点：针对小一下半学期在读或完成小一学生</h6>-->
            <!--            </div>-->
            <!--        </div>-->
                
            <!--    </form>-->
            <!--</div>-->
            
            
            <a href="/study-abroad-program-step-1/"><button type="button" class="btn btn-slide">上一步</button></a>
            <a href="/study-abroad-program-step-3/"><button type="button" class="btn btn-slide" onclick="javascript:window.location='/study-abroad-program-step-2/?Step='+Step1.value;">下一步</button></a>
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
