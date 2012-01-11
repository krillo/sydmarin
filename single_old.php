<?php get_header(); ?>
<script type="text/javascript" src="<?php bloginfo('stylesheet_directory'); ?>/js/jquery.galleriffic.js"></script>
<div id="primary" class="article-primary">
  <div id="content" role="main">
    <?php while (have_posts ()) : the_post(); ?>
      <div id="article-area">
        <article id="article">
          <h1><?php the_title(); ?></h1>
        <?php the_content(); ?>
      </article>

      <div id="slide-container">
        <div id="thumbs" class="navigation" >
          <ul class="thumbs noscript">
            <?php
            $name = get_the_title();
            $parentId = get_the_ID();
            $args = array('post_type' => 'attachment', 'numberposts' => -1, 'post_status' => null, 'post_parent' => $parentId);
            $attachments = get_posts($args);
            if ($attachments) {
              foreach ($attachments as $post) {
                $featured_size_img_url = wp_get_attachment_image_src($post->ID, 'post-featured-img');
                $thumb_size_img_url = wp_get_attachment_image_src($post->ID, 'post-thumb-img');
            ?>
                <li>
                  <a class="thumb" href="<?php echo $featured_size_img_url[0]; ?>"> <img width="70" height="70" src="<?php echo $thumb_size_img_url[0]; ?>" alt="<?php echo $name; ?>" title="<?php echo $name; ?>" /></a>
                </li>
            <?php
              }
            }
            ?>
          </ul>
        </div>
        <div id="gallery" class="content">
          <div class="slideshow-container">
            <div id="loading" class="loader"></div>
            <div id="slideshow" class="slideshow"></div>
          </div>
        </div>
        <div style="clear: both;"></div>
      </div>



      <script type="text/javascript">
        // We only want these styles applied when javascript is enabled
        jQuery(document).ready(function(){
          jQuery('div.navigation').css({'width' : '70px', 'float' : 'left'});
          jQuery('div.content').css('display', 'block');

          jQuery(document).ready(function() {
            // Initialize Minimal Galleriffic Gallery
            jQuery('#thumbs').galleriffic({
              imageContainerSel:      '#slideshow'
              //controlsContainerSel:   '#controls'
            });
          });
        });
      </script>



    </div>
    <?php endwhile; // end of the loop.   ?>
          </div><!-- #content -->
        </div><!-- #primary -->

        

          <?php
            $idObj = get_category_by_slug('batar');
            $id = $idObj->term_id;
            global $post;
            $args = array('numberposts' => -1, 'offset' => 1, 'category' => $id);
            $myposts = get_posts($args);
          ?>
            <div id="more-boats">
              <h2>Fler båtar till salu</h2>
              <div id="arrow-left"><img src="<?php bloginfo('stylesheet_directory'); ?>/img/arrow_left.png" alt=""></div>
              <ul>
                <?php foreach ($myposts as $post) : 
                  setup_postdata($post);
                ?>
                <li>
                  <a href="<?php echo get_permalink(get_the_ID()); ?>" >
                    <div class="more-boats-puff"><?php echo get_the_post_thumbnail(get_the_ID(), 'category-thumb-img'); ?>
                      <div class="clear"></div>
                      <div class="more-boats-title"><?php the_title(); ?>
                      </div>
                    </div>
                  </a>
                </li>
                <?php endforeach; ?>
            </ul>
            <div id="arrow-right"><img src="<?php bloginfo('stylesheet_directory'); ?>/img/arrow_right.png" alt=""></div>
          </div>

<?php get_footer(); ?>