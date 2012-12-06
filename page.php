<?php
/**
  Template Name: Toppnivå-sida
 */
?>

<?php get_header(); ?>
<div id="page-primary">
  <?php while (have_posts()) : the_post(); ?>
    <script type="text/javascript">
      jQuery(document).ready(function($){        
        $('.page-item-<?php echo $post->ID; ?>').addClass('highlight');
      });
    </script>
    
    <div id="page-list">
      <?php
      if ($post->post_parent) {
        $children = wp_list_pages("title_li=&child_of=" . $post->post_parent . "&echo=0");
        $titlenamer = '<a href="' . get_page_link($post->post_parent) . '">' . get_the_title($post->post_parent) . '</a>';
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
    <div id="content" role="main">
      <div id="page-middle">
        <h1><?php the_title(); ?></h1>
        <?php the_content(); ?>       
      </div>
    </div><!-- #content -->
    <div id="page-slideshow">
      
      
   <script language="javascript">
    $(document).ready(function(){
      $("#myController").jFlow({
        slides: "#mySlides",
        width: "400px",
        height: "500px",
        timer: 5000,
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
      <img src="<?php the_field('slide1'); ?>" alt="Sydmarin"/>
    </div>
    <div class="slide">
      <img src="<?php the_field('slide2'); ?>" alt="Sydmarin"/>
    </div>
    <div class="slide">
      <img src="<?php the_field('slide3'); ?>" alt="Sydmarin"/>
    </div>
  </div>
  <span class="jFlowPrev"></span>
  <span class="jFlowNext"></span>
  <div id="splash"><h1><?php the_field('heading'); ?></h1><p><?php the_field('text'); ?></p></div>
      
      
      
      
      
      
      
      
      
      
    </div>
  <?php endwhile; // end of the loop.    ?>
</div><!-- #primary -->
<?php get_footer(); ?>    