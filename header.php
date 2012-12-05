<!DOCTYPE html>
<html lang="sv-SE">  
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
    <?php
    if (is_singular() && get_option('thread_comments'))
      wp_enqueue_script('comment-reply');
    ?>
    <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
    <!--[if lt IE 9]>
    <script src="<?php echo get_template_directory_uri(); ?>/js/html5.js" type="text/javascript"></script>
    <![endif]-->

<?php wp_head(); ?>
  </head>

  <body <?php body_class(); ?>>
    <div id="page" class="hfeed">
      <header id="branding" role="banner">
        <hgroup id="logo-yachtcenter">
          <a  href="<?php echo home_url('/'); ?>" title="<?php echo esc_attr(get_bloginfo('name', 'display')); ?>" rel="home"></a>
        </hgroup>
        <hgroup id="logo">
          <img  src="<?php echo get_bloginfo('stylesheet_directory'); ?>/img/logo.png" alt="Sydmarin" />
        </hgroup>
      </header><!-- #branding -->
      <div id="main">
        <div id="main-content">
          <nav id="access" role="navigation">
            <div class="skip-link screen-reader-text"><a href="#content" title="<?php esc_attr_e('Skip to content', 'toolbox'); ?>"><?php _e('Skip to content', 'toolbox'); ?></a></div>
            <?php
            $post_id = $wp_query->queried_object->ID;
            $post_parent_id = $wp_query->queried_object->post_parent;
            //echo "post_id ". $post_id . " post_parent " . $post_parent_id;
            if ($post_parent_id == 0) {
              $pagetype = get_field('pagetype', $post_id);
            } else {
              $pagetype = get_field('pagetype', $post_parent_id);
            }
            if ($pagetype == 'about') {
              $pagetype = 'primary';
            }
            wp_nav_menu(array('theme_location' => $pagetype));
            ?>
          </nav><!-- #access -->
