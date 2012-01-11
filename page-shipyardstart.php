<?php
/**
  Template Name: Varvstart
 */
get_header();
?>
<div id="primary" class="shipyardstart-primary" style="margin-bottom: 150px;height:450px;">
  <div id="content" role="main">
    <?php while (have_posts ()) : the_post(); ?>
      <div id="boatstart-heading"><h2><?php the_field('heading'); ?></h2></div>
      <div id="boatstart-text"><?php the_field('text'); ?></div>
      <?php
        $boatpuff1 = get_field('boatpuff1');
        $boatpuff2 = get_field('boatpuff2');
        $boatpuff3 = get_field('boatpuff3');
      ?>
    <?php endwhile; ?>
    </div><!-- #content -->
  </div><!-- #primary -->
  <div class="clear"></div>

  <div id="boatstart-puffs">
  <?php
  $args = array( 'post_type' => 'varvspuff', 'posts_per_page' => 3 );
  $loop = new WP_Query( $args );
  while ( $loop->have_posts() ) : $loop->the_post();
    

    echo '<a href="'. get_field('puff') .'" ><div class="boatstart-puff">';
    echo the_post_thumbnail('post-puff-img');
    echo '<h3>' . get_the_title() . '</h3>';
    echo '<div class="entry-content">';
    echo '<p>' .  the_content().'</p></div>';
    echo '</div>';
  endwhile;
  ?>

  </div>
<?php get_footer(); ?>
