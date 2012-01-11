<?php get_header(); ?>
		<section id="primary" class="primary-search-result">
			<div id="content" role="main">

      <div id="search-result-content">
        <?php if ( have_posts() ) : ?>
          <header class="page-header">
            <h1 class="page-title">Sökresultat för <span> <?php the_search_query(); ?></span></h1>
          </header>
          <ul>
          <?php while ( have_posts() ) : the_post(); ?>
            <li>
              <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
            </li>
          <?php endwhile; ?>
          </ul>
        <?php else : ?>

          <article id="post-0" class="post no-results not-found">
            <header class="entry-header">
              <h1 class="entry-title"><?php _e( 'Nothing Found', 'toolbox' ); ?></h1>
            </header><!-- .entry-header -->

            <div class="entry-content">
              <p><?php _e( 'Sorry, but nothing matched your search terms. Please try again with some different keywords.', 'toolbox' ); ?></p>
              <?php get_search_form(); ?>
            </div><!-- .entry-content -->
          </article><!-- #post-0 -->

        <?php endif; ?>
      </div>
			</div><!-- #content -->
		</section><!-- #primary -->
<?php get_footer(); ?>