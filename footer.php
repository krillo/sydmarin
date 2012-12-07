</div><!-- #main-content -->
</div><!-- #main -->

<footer>
  <div id="logo-partners">
    <img  src="<?php echo get_bloginfo('stylesheet_directory'); ?>/img/logo_partners.png" alt="" />
  </div>


  <div id="share">
    <div id="rss">
      <a href="<?php bloginfo('rss2_url'); ?>" ><img src="<?php bloginfo('stylesheet_directory'); ?>/img/rss.png" alt="länk till rss-flöde"></a>
    </div>
    <?php
    $pageId = $wp_query->queried_object_id;
    $permalink = get_permalink($pageId);
    $title = get_the_title($pageId);
    ?>
    <div id="email-tip">
      <a href='mailto:kompis@sydmarin.se?subject=Sydmarin.se&body=Läs mer om <?php echo $title; ?> på <?php echo $permalink; ?>' ><img src="<?php bloginfo('stylesheet_directory'); ?>/img/tip.png" alt="tipsa en vän"></a>
    </div>
</footer>  

</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>