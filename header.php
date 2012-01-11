<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="main">
 *
 * @package WordPress
 * @subpackage Toolbox
 * @since Toolbox 0.1
 */
?><!DOCTYPE html>
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
    <?php if (is_singular() && get_option('thread_comments'))
        wp_enqueue_script('comment-reply'); ?>
      <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
      <!--[if lt IE 9]>
      <script src="<?php echo get_template_directory_uri(); ?>/js/html5.js" type="text/javascript"></script>
      <![endif]-->

    <?php wp_head(); ?>
    </head>

    <body <?php body_class(); ?>>
      <div id="page" class="hfeed">
        <header id="branding" role="banner">
          <hgroup>
            <h1 id="site-title"><a href="<?php echo home_url('/'); ?>" title="<?php echo esc_attr(get_bloginfo('name', 'display')); ?>" rel="home"></a></h1>
            <div class="clear"></div>
            <h2 id="site-description"><a href="<?php echo home_url('/'); ?>" title="<?php echo esc_attr(get_bloginfo('name', 'display')); ?>"><?php bloginfo('description'); ?></a></h2>
          </hgroup>

          <div id="search" class="">
          <?php get_search_form(); ?>
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
        </div>
      </header><!-- #branding -->

      <div id="main">
        <div id="main-content">
          <div id="logo"></div>
          <nav id="access" role="navigation">
            <?php _e('', 'toolbox'); ?>
            <div class="skip-link screen-reader-text"><a href="#content" title="<?php esc_attr_e('Skip to content', 'toolbox'); ?>"><?php _e('Skip to content', 'toolbox'); ?></a></div>

            <?php
            //Set the right menu based on pageId or ancestorId
            //Important that the page has a correcr parent.
            //if no parent then the same menu as last time will be shown
            $pageId = $wp_query->queried_object_id;
            $categories = get_the_category($pageId);
            $catSlug = $categories[0]->slug;
            $site_part = null;

            $sit = get_option('site_part');
            //echo '->' . $sit . '<-';
            if($catSlug == 'batar'){
              //echo " is båtar set primary ";
              update_option('site_part', 'primary');
              $site_part = 'primary';
            }
            if ($pageId == 177) {
              //echo ' is 177 set shipyard ';
              update_option('site_part', 'shipyard');
              $site_part = 'shipyard';
            } else if ($pageId == 8) {
              //echo ' is 8 set primary ';
              update_option('site_part', 'primary');
              $site_part = 'primary';
            } else {
              $ancestorArray = get_post_ancestors($pageId);
              $ancestorId = $ancestorArray[count($ancestorArray) - 1];
              if (isset($ancestorArray)) {
                if ($ancestorId == 177) {
                  //echo 'ancestor is 177 set shipyard ';
                  update_option('site_part', 'shipyard');
                  $site_part = 'shipyard';
                } elseif ($ancestorId == 8) {
                  //echo 'ancestor is 8 set primary ';
                  update_option('site_part', 'primary');
                  $site_part = 'primary';
                }
              }
            }

            if(!isset($site_part)){
              $site_part = get_option("site_part");
              //echo ' not set get from db '. $site_part;
            }

            //echo $site_part;
            wp_nav_menu(array('theme_location' => $site_part)); ?>
          </nav><!-- #access -->
