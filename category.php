<?php get_header(); ?>
<section id="primary" class="category-primary">
  <div id="content" role="main">
    <div id="boat-cat-list">
      <ul>
        <?php if (have_posts ()) : ?>
        <?php while (have_posts ()) : the_post(); ?>
            <a href="<?php echo get_permalink(get_the_ID()); ?>" >
              <li>
                <div class="boat-cat-puff">
                  <?php echo get_the_post_thumbnail(get_the_ID(), 'category-list-img'); ?>
                  <div class="boat-cat-text">
                    <?php the_title(); ?><br/>
                    Längd: <span class="normal"><?php the_field('length') ?></span><br/>
                    Pris: <span class="normal"><?php the_field('price') ?></span>
                  </div>
                </div>
              </li>
            </a>
        <?php endwhile; ?>
      </ul>
    </div>
    <?php else : ?>
      <article id="post-0" class="post no-results not-found">
         <header class="entry-header">
           <h1 class="entry-title"><?php _e('Nothing Found', 'toolbox'); ?></h1>
           </header><!-- .entry-header -->
           <div class="entry-content">
            <p><?php _e('It seems we can&rsquo;t find what you&rsquo;re looking for. Perhaps searching can help.', 'toolbox'); ?></p>
        <?php get_search_form(); ?>
           </div><!-- .entry-content -->
      </article><!-- #post-0 -->
    <?php endif; ?>
 </div><!-- #content -->
</section><!-- #primary -->
<?php get_footer(); ?>