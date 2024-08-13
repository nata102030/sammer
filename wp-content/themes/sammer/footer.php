<?php

/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package sammer
 */

?>

<?php
$footer_cta_title = get_field('footer_cta_title', 'option');
$footer_cta_text = get_field('footer_cta_text', 'option');
$footer_cta_button = get_field('footer_cta_button', 'option');
$adresse = get_field('adresse', 'option');
$phone = get_field('telefon', 'option');
$fax = get_field('fax', 'option');
$email = get_field('email', 'option');
$footer_form_title = get_field('footer_form_title', 'option');
$footer_form_text = get_field('footer_form_text', 'option');
$copyright = get_field('copyright', 'option');
?>

<footer id="colophon" class="site-footer">
	<div class="container">
		<div class="footer-wrap">
			<div class="footer_cta">
				<div data-aos="fade-up" data-aos-once="true" class="cta__title">
					<?php $icon = get_stylesheet_directory() . '/img/icons/ellipse.svg';
					echo file_get_contents($icon);
					?>
					<?php if ($footer_cta_title) : ?>
						<?php echo $footer_cta_title; ?>
					<?php endif; ?>
				</div>
				<div class="cta__desc">
					<?php if ($footer_cta_text) : ?>
						<div data-aos="fade-up" data-aos-once="true" class="cta-text">
							<?php echo $footer_cta_text; ?>
						</div>
					<?php endif; ?>
					<?php if ($footer_cta_button) : ?>
						<a data-aos="fade-up" data-aos-once="true" href="<?php echo $footer_cta_button['url']; ?>" class="btn_circle">
							<?php if ($footer_cta_button['title']) {
								echo $footer_cta_button['title'];
							}  ?>
							<?php $icon = get_stylesheet_directory() . '/img/icons/arrow.svg';
							echo file_get_contents($icon);
							?>
							Jetzt kontaktieren
						</a>
					<?php endif; ?>
				</div>
			</div>
			<div class="line"></div>
			<div class="wrap-columns">
				<div class="left-columns">
					<?php if ($logo_header = get_field('logo', 'option')) : ?>
						<div data-aos="fade-up" data-aos-once="true" class="logo_footer">
							<a class="site-header__logo" href="<?php echo esc_url(home_url('/')); ?>" rel="home">
								<?php echo wp_get_attachment_image($logo_header['id'], 'large'); ?>
							</a>
						</div>
					<?php endif; ?>
					<?php if ($adresse) : ?>
						<div data-aos="fade-up" data-aos-once="true" class="adresse">
							<?php echo $adresse; ?>
						</div>
					<?php endif; ?>
					<div data-aos="fade-up" data-aos-once="true" class="contact">
						<div class="contact-title">
							<?php if ($phone) : ?>
								<div class="phone-title">Telefon</div>
							<?php endif; ?>
							<?php if ($fax) : ?>
								<div class="fax-title">Fax</div>
							<?php endif; ?>
							<?php if ($email) : ?>
								<div class="email-title">E-Mail</div>
							<?php endif; ?>
						</div>
						<div class="contact-value">
							<?php if ($phone) : ?>
								<div class="footer-phone">
								<?php $phone_new = str_replace(" ", '', $phone); ?>
									<a href="tel:<?php echo $phone_new; ?>" class="phone">
										<?php echo $phone; ?>
									</a>
								</div>
							<?php endif; ?>
							<?php if ($fax) : ?>
								<div class="footer-fax">
								<?php $fax_new = str_replace(" ", '', $fax); ?>
									<a href="fax:<?php echo $fax_new; ?>" class="fax">
										<?php echo $fax; ?>
									</a>
								</div>
							<?php endif; ?>
							<?php if ($email) : ?>
								<div class="footer-email">

									<a href="mailto:<?php echo $email; ?>" class="email"><?php echo $email; ?></a>
								</div>
							<?php endif; ?>
						</div>
					</div>
				</div>
				<div class="right-columns">
					<div class="form">
						<div data-aos="fade-up" data-aos-once="true" class="form__title">
							<?php $icon = get_stylesheet_directory() . '/img/icons/ellipse.svg';
							echo file_get_contents($icon);
							?>
							<?php if ($footer_form_title) : ?>
								<?php echo $footer_form_title; ?>
							<?php endif; ?>
						</div>
						<?php if ($footer_form_text) : ?>
							<div data-aos="fade-up" data-aos-once="true" class="form_text"><?php echo $footer_form_text; ?></div>
						<?php endif; ?>
						<div data-aos="fade-up" data-aos-once="true">
						<?php echo do_shortcode('[gravityform id="3" title="false"]') ?>
						</div>
					</div>
				</div>
			</div>  
			<div class="line"></div>
			<div class="footer_menu">
				<?php if ($footer_form_text) : ?>
					<div class="footer_menu_copyright"><?php echo $copyright; ?></div>
				<?php endif; ?>
				<div class="footer_menu__nav">
					<nav class="footer_menu__wrap">
						<?php if (has_nav_menu('menu-header')) :
							wp_nav_menu(
								array(
									'theme_location' => 'menu-footer',
									'container' => '',
									'container_class' => '',
									'menu_class'      => 'top-menu',
								)
							);
						endif; ?>
					</nav>
				</div>
			</div>
		</div>
	</div>
</footer><!-- #colophon -->
</div><!-- #page -->
<?php wp_footer(); ?>

</body>

</html>