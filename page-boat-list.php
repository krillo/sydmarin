<?php
/**
  Template Name: Båtlistning
 */get_header();
 $viewPage = 'http://www.batborsen.se/v2/trader/list.jspx?trader=465&status=-1&sortField=sortBrand&category=-1&types=-1&brands=-1';
if(isset($_GET['advert'])){
  $viewPage = 'http://www.batborsen.se/v2/trader/view.jspx?advert='. $_GET['advert'];
}

?>
		<div id="primary">
			<div id="content" role="main">
        <div id="batborsen">
          <iframe src="<?php echo $viewPage; ?>" id="boat-list" frameborder ="0" width="695" height="700" scrolling="auto">
          </iframe>
        </div>
			</div><!-- #content -->
		</div><!-- #primary -->
<?php get_footer(); ?>