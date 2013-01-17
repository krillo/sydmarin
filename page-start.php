<!DOCTYPE html>
<?php
/**
  Template Name: Start
 */
?>
<!--[if IE 6]>
<html id="ie6" <?php language_attributes(); ?>>
<![endif]-->
<!--[if IE 7]>
<html id="ie7" <?php language_attributes(); ?>>
<![endif]-->
<!--[if IE 8]>
<html id="ie8" <?php language_attributes(); ?>>
<![endif]-->
<!--[if !(IE 6) | !(IE 7) | !(IE 8)  ]><!-->
<html <?php language_attributes(); ?>>
  <!--<![endif]-->
  <head>
    <meta charset="<?php bloginfo('charset'); ?>" />
    <meta name="viewport" content="width=device-width" />
    <title><?php
/*
 * Print the <title> tag based on what is being viewed.
 */
global $page, $paged;

wp_title('|', true, 'right');

// Add the blog name.
bloginfo('name');

// Add the blog description for the home/front page.
$site_description = get_bloginfo('description', 'display');
if ($site_description && ( is_home() || is_front_page() ))
  echo " | $site_description";

// Add a page number if necessary:
if ($paged >= 2 || $page >= 2)
  echo ' | ' . sprintf(__('Page %s', 'toolbox'), max($paged, $page));
?></title>
    <link rel="profile" href="http://gmpg.org/xfn/11" />
    <link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo('stylesheet_url'); ?>" />
    <!--[if lt IE 9]>
    <script src="<?php echo get_template_directory_uri(); ?>/js/html5.js" type="text/javascript"></script>
    <![endif]-->

    <?php wp_head(); ?>
  </head>

  <body <?php body_class(); ?>>
    <div id="page" class="hfeed">
      <header id="branding" role="banner" >        
        <a  href="<?php echo home_url('/'); ?>" title="<?php echo esc_attr(get_bloginfo('name', 'display')); ?>" rel="home"><hgroup id="logo-yachtcenter"></hgroup></a>
        <hgroup id="logo">
          <img  src="<?php echo get_bloginfo('stylesheet_directory'); ?>/img/logo.png" alt="Sydmarin" />
        </hgroup>
      </header>

      <div id="main">
        <img id="kikare" src="<?php echo get_bloginfo('stylesheet_directory'); ?>/img/kikare.png" usemap="#image-maps-kikare" border="0" width="960" height="644" alt="" />
        <map id="image-maps-kikare" name="image-maps-kikare">
          <area shape="poly" coords="744,99,662,120,596,175,563,261,566,340,600,403,656,450,737,476,814,467,872,430,919,373,940,309,929,226,889,160,848,125,805,107," href="/varvsstart/" alt="Varv" title="Varv"   />
          <area shape="poly" coords="182,99,257,106,319,137,365,183,389,248,392,318,377,376,336,427,284,459,219,477,145,469,88,437,44,384,19,317,24,240,48,183,88,138,139,110," href="/batstart/" alt="Båt" title="Båt"   />
        </map>
      </div><!-- #main-content -->
    </div><!-- #main -->

    <footer id="footer-first" role="contentinfo">
      Sydmarin i Helsingborg AB <span class="footer-bullet">&bull;</span> Västindiegatan 20, 252 71 RÅÅ<span class="footer-bullet">&bull;</span>Tfn: +46(0)42-260 370<span class="footer-bullet">&bull;</span><a href="mailto:service@sydmarin.se">service@sydmarin.se</a>
    </footer><!-- #colophon -->
  </div><!-- #page -->
  <?php wp_footer(); ?>
</body>
</html>