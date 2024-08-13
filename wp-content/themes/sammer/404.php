<?php

/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package sammer
 */  

get_header();
?>

<main id="primary" class="site-main">

	<section class="error-404 not-found">
		<div class="container">
			<div data-aos="fade-up" data-aos-once="true" class="error-404-number">
				404
			</div>
			<div data-aos="fade-up" data-aos-once="true" class="error-404-ifo">
				Diese Seite wurde noch nicht erstellt oder existiert nicht. Bitte kehren Sie nach Startseite zurück
			</div>
			<a data-aos="fade-up" data-aos-once="true" class="btn_circle" href="<?php echo esc_url(home_url('/')); ?>" rel="home">
				<?php echo 'Zur Startseite'; ?>
				<?php $icon = get_stylesheet_directory() . '/img/icons/btn-right.svg';
				echo file_get_contents($icon);
				?>
			</a>
		</div><!-- .page-content -->
	</section><!-- .error-404 -->

</main><!-- #main -->

<?php
get_footer();
