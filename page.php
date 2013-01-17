<?php
/**
  Template Name: Toppnivå-sida
 * 
 * All normal pages will have the same layout.
 * The trick here is when you select this page template the page will get more fields via ACF
 * Use it only for top-level pages 
 */
?>

<?php get_header(); ?>
<div id="page-primary">
  <?php while (have_posts()) : the_post(); ?>


    <div id="page-list" class="bottom-line">
      <?php      
      $hide_slidshow = get_field('hide_slideshow', get_the_ID());
      $noSlideshow = '';
      if ($hide_slidshow == 'yes'){
        $noSlideshow = 'no-slideshow';
      }

      $slideshow_post_id = get_the_ID();
      //print_r($post->ancestors);
      //print_r($post);
      if ($post->post_parent != 0) {
        $forefather = end($post->ancestors);
        $children = wp_list_pages("title_li=&child_of=" . $forefather . "&echo=0");
        $titlenamer = '<a href="' . get_page_link($forefather) . '">' . get_the_title($forefather) . '</a>';
        $slideshow_post_id = $forefather;
      } else {
        $children = wp_list_pages("title_li=&child_of=" . $post->ID . "&echo=0");
        $titlenamer = '<a href="' . get_page_link($post->post_parent) . '">' . get_the_title($post->post_parent) . '</a>';
      }
      echo '<h2>' . $titlenamer . '</h2>';
      if ($children) {
        echo '<ul>' . $children . '</ul>';
      }
      ?>      
    </div>
    <div id="content" role="main" >
      <div id="page-middle" class="page-middle bottom-line <?php echo $noSlideshow; ?>">

        <h1><?php the_title(); ?></h1>
        <?php the_content(); ?>
      </div>
    </div><!-- #content -->

    <?php if ($hide_slidshow != 'yes'): //show or hide slideshow?>   
      <div id="page-slideshow" class="bottom-line">
        <script language="javascript">
          $(document).ready(function(){
            $("#myController").jFlow({
              slides: "#mySlides",
              width: "410px",
              height: "560px",
              timer: 10000,
              duration: 400
            });
          });
        </script>
        <div id="myController">
          <span class="jFlowControl"></span>
          <span class="jFlowControl"></span>
          <span class="jFlowControl"></span>
        </div>
        <div id="mySlides">
          <div class="slide">
            <img src="<?php the_field('slide1', $slideshow_post_id); ?>" alt=""/>
          </div>
          <div class="slide">
            <img src="<?php the_field('slide2', $slideshow_post_id); ?>" alt=""/>
          </div>
          <div class="slide">
            <img src="<?php the_field('slide3', $slideshow_post_id); ?>" alt=""/>
          </div>
        </div>
        <span class="jFlowPrev"></span>
        <span class="jFlowNext"></span>
        <div id="splash-small"><?php the_field('text', $slideshow_post_id); ?></div>
      </div>
    <?php endif; ?>   

  <?php endwhile; // end of the loop.    ?>
</div><!-- #primary -->
<?php get_footer(); ?>    