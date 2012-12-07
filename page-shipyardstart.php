<?php
/**
  Template Name: Varvstart
 */
get_header();
?>
<?php while (have_posts()) : the_post(); ?>
  <script language="javascript">
    $(document).ready(function(){
      $("#myController").jFlow({
        slides: "#mySlides",
        width: "960px",
        height: "448px",
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
    <div class="slide-big">
      <img src="<?php the_field('slide1'); ?>" alt="Sydmarin"/>
    </div>
    <div class="slide-big">
      <img src="<?php the_field('slide2'); ?>" alt="Sydmarin"/>
    </div>
    <div class="slide-big">
      <img src="<?php the_field('slide3'); ?>" alt="Sydmarin"/>
    </div>
  </div>
  <span class="jFlowPrev"></span>
  <span class="jFlowNext"></span>
  <div id="splash"><span><?php the_field('heading'); ?></span><p><?php the_field('text'); ?></p></div>
  <div id="content" role="main">
      <?php
      $boatpuff1 = get_field('boatpuff1');
      $boatpuff2 = get_field('boatpuff2');
      $boatpuff3 = get_field('boatpuff3');
      ?>
    <?php endwhile; ?>
  </div><!-- #content -->
<div class="clear"></div>

<div id="boatstart-puffs">
  <?php
  $args = array('post_type' => 'varvspuff', 'posts_per_page' => 3);
  $loop = new WP_Query($args);
  while ($loop->have_posts()) : $loop->the_post();
    echo '<a href="' . get_field('puff') . '" >';    
    echo '  <div class="boatstart-puff">';
    echo '   <div class="boatstart-puff-text">';    
    echo '     <h3>' . get_the_title() . '</h3>';
    echo '     <div class="entry-content">';
    echo '       <p>' . the_content() . '</p>';
    echo '     </div>';
    echo '   </div>';
    echo '     <img src="'. get_field('image') . '" alt="" />';
    echo '  </div>';
    echo '</a>';
  endwhile;
  ?>

</div>
<?php get_footer(); ?>
