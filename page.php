<?php get_header(); ?>
		<div id="primary">
			<div id="content" role="main">
				<?php while ( have_posts() ) : the_post(); ?>
        <div id="page-container">
          <div id="page-content">
            <h1><?php the_title(); ?></h1>
            <?php the_content(); ?>       
          </div>
          <div class="page-img"><?php echo get_the_post_thumbnail(get_the_ID(), 'page-img', '', array('class'	=> "", alt=>"") ); ?></div>
          <div class="page-img"><?php echo wp_get_attachment_image( get_field('bild_1'), 'page-img', '', array('class'	=> "", alt=>"") ); ?></div>          
        </div>
				<?php endwhile; // end of the loop. ?>
			</div><!-- #content -->
		</div><!-- #primary -->
<?php get_footer(); ?>