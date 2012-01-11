<?php
/**
  Template Name: Start
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
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<meta name="viewport" content="width=device-width" />
<title><?php
	/*
	 * Print the <title> tag based on what is being viewed.
	 */
	global $page, $paged;

	wp_title( '|', true, 'right' );

	// Add the blog name.
	bloginfo( 'name' );

	// Add the blog description for the home/front page.
	$site_description = get_bloginfo( 'description', 'display' );
	if ( $site_description && ( is_home() || is_front_page() ) )
		echo " | $site_description";

	// Add a page number if necessary:
	if ( $paged >= 2 || $page >= 2 )
		echo ' | ' . sprintf( __( 'Page %s', 'toolbox' ), max( $paged, $page ) );

	?></title>
<link rel="profile" href="http://gmpg.org/xfn/11" />
<link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo( 'stylesheet_url' ); ?>" />
<!--[if lt IE 9]>
<script src="<?php echo get_template_directory_uri(); ?>/js/html5.js" type="text/javascript"></script>
<![endif]-->

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="hfeed">
	<header id="branding" role="banner" >
		<hgroup>
			<h1 id="site-title"><a href="<?php echo home_url( '/' ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home"></a></h1>
      <div class="clear"></div>
			<h2 id="site-description"><a href="<?php echo home_url( '/' ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>"><?php bloginfo( 'description' ); ?></a></h2>
		</hgroup>


	</header><!-- #branding -->

	<div id="main">
    <div id="main-content-no-image" >

		<div id="primary" class="primary" style="margin:0;height:100%;float:left;">
			<div id="content" role="main" style="height:500px;">
        <div id="logo-inverted"></div>
				<?php while ( have_posts() ) : the_post(); ?>


        <div id="varv">
          <a href="/varvsstart" id="varv-img" ><img src="<?php the_field("img1"); ?>" alt="varv" /></a>
        </div>

        <div id="sell">
          <a href="/batstart" id="sell-img" ><img src="<?php the_field("img2"); ?>" alt="båtförsäljning"  /></a>
        </div>
        

        

				<?php endwhile; // end of the loop. ?>
			</div><!-- #content -->
		</div><!-- #primary -->

    </div><!-- #main-content -->
	</div><!-- #main -->

	<footer id="footer-first" role="contentinfo">
    Sydmarin i Helsingborg AB <span class="footer-bullet">&bull;</span> Västindiegatan 20, 252 71 RÅÅ <span class="footer-bullet">&bull;</span> Tfn: +46(0)42-260 370 <span class="footer-bullet">&bull;</span> <a href="mailto:service@sydmarin.se">service@sydmarin.se</a>
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>