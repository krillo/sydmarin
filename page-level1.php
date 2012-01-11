<?php
/**
  Template Name: Undersida
 */
get_header();
  $puff1 = get_field('puff1');
  $puff2 = get_field('puff2');
  $puff3 = get_field('puff3');
  $puff4 = get_field('puff4');
  $puff5 = get_field('puff5');
  $puff6 = get_field('puff6');
?>
		<div id="primary">
			<div id="content" role="main">
				<?php while ( have_posts() ) : the_post(); ?>
        <div id="shipyard-areas">
          <a href="<?php echo get_permalink($puff1->ID); ?>" ><div class="shipyard-text"><?php echo $puff1->post_title; ?></div></a>
          <a href="<?php echo get_permalink($puff2->ID); ?>" ><div class="shipyard-text"><?php echo $puff2->post_title; ?></div></a>
          <a href="<?php echo get_permalink($puff3->ID); ?>" ><div class="shipyard-text"><?php echo $puff3->post_title; ?></div></a>
          <div class="clear"></div>
          <a href="<?php echo get_permalink($puff1->ID); ?>" ><?php echo get_the_post_thumbnail( $puff1->ID, 'puff-img', '', array('class'	=> "shipyard-img", alt=>"")); ?></a>
          <a href="<?php echo get_permalink($puff2->ID); ?>" ><?php echo get_the_post_thumbnail( $puff2->ID, 'puff-img', '', array('class'	=> "shipyard-img", alt=>"")); ?></a>
          <a href="<?php echo get_permalink($puff3->ID); ?>" ><?php echo get_the_post_thumbnail( $puff3->ID, 'puff-img', '', array('class'	=> "shipyard-img", alt=>"")); ?></a>
          <div class="clear"></div>
          <a href="<?php echo get_permalink($puff4->ID); ?>" ><div class="shipyard-text"><?php echo $puff4->post_title; ?></div></a>
          <a href="<?php echo get_permalink($puff5->ID); ?>" ><div class="shipyard-text"><?php echo $puff5->post_title; ?></div></a>
          <a href="<?php echo get_permalink($puff6->ID); ?>" ><div class="shipyard-text"><?php echo $puff6->post_title; ?></div></a>
          <div class="clear"></div>
          <a href="<?php echo get_permalink($puff4->ID); ?>" ><?php echo get_the_post_thumbnail( $puff4->ID, 'puff-img', '', array('class'	=> "shipyard-img", alt=>"")); ?></a>
          <a href="<?php echo get_permalink($puff5->ID); ?>" ><?php echo get_the_post_thumbnail( $puff5->ID, 'puff-img', '', array('class'	=> "shipyard-img", alt=>"")); ?></a>
          <a href="<?php echo get_permalink($puff6->ID); ?>" ><?php echo get_the_post_thumbnail( $puff6->ID, 'puff-img', '', array('class'	=> "shipyard-img", alt=>"")); ?></a>
        </div>
				<?php endwhile; // end of the loop. ?>
			</div><!-- #content -->
		</div><!-- #primary -->
<?php get_footer(); ?>