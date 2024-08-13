<?php

/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package sammer
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>

<head>
	<meta charset="<?php bloginfo('charset'); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">
	<link rel="shortcut icon" href="<?php echo get_stylesheet_directory_uri(); ?>/favicon.svg" >


	<?php wp_head(); ?>


	<?php $hover_mob = get_field('hover_mob', 'option'); ?>
	<style>
		.slick-arrow svg rect,
		.btn_circle svg rect {
			fill: #7391CB;
			fill-opacity: 0;
			transition: fill-opacity 0.4s ease;
		}

		<?php if ($hover_mob == 'Ja'): ?>
			@media (min-width: 576px) {

			<?php endif ?>


			.slick-arrow:hover svg rect {
				fill: #7391CB;
				fill-opacity: 1;
				transition: fill-opacity 0.4s ease;
			}

			.slick-arrow:hover svg path {
				fill: #FFF !important;
				transition: fill 0.4s ease;
			}

			.btn_circle:hover svg rect {
				fill: #7391CB;
				fill-opacity: 1;
				transition: fill-opacity 0.4s ease;
			}

			.btn_circle:hover svg path {
				fill: #FFF !important;
				transition: fill 0.4s ease;
			}  

			<?php if ($hover_mob == 'Ja'): ?>
			}

		<?php endif ?>

		<?php if ($id == 27) : ?>
		body {  
			background: #20201E;
		}
<?php endif; ?>
	</style>

</head>

<body <?php body_class(); ?>>
	<?php wp_body_open(); ?>
	<div id="page" class="site">
		<a class="skip-link screen-reader-text" href="#primary">
			<?php esc_html_e('Skip to content', 'sammer'); ?>
		</a>
		<header id="masthead" class="site-header">
			<div class="site-header__main">
				<div class="container">
					<div class="container_line">
						<?php if ($logo_header = get_field('logo', 'option')): ?>
							<div class="logo_header">
								<a class="site-header__logo" href="<?php echo esc_url(home_url('/')); ?>" rel="home">
									<?php echo wp_get_attachment_image($logo_header['id'], 'large'); ?>
								</a>
							</div>
						<?php endif; ?>
						<div class="site-header__nav">
							<nav class="site-header__menu">
								<?php if (has_nav_menu('menu-header')):
									wp_nav_menu(
										array(
											'theme_location' => 'menu-header',
											'container' => '',
											'container_class' => '',
											'menu_class' => 'top-menu',
										)
									);
								endif; ?>
							</nav>
						</div>
						<div class="mobile-menu">
							<div><img class="header__burger-btn"
									src="<?php echo get_template_directory_uri(); ?>/img/icons/menu.svg" alt=""></div>
							<div><img class="header__burger-btn_close"
									src="<?php echo get_template_directory_uri(); ?>/img/icons/close.svg" alt=""></div>
						</div>
					</div>
				</div>
				<div class="header__modal">
					<div class="footer_menu_mob_wrap">
						<div class="site-header__menu">
							<?php if (has_nav_menu('menu-header')):
								wp_nav_menu(
									array(
										'theme_location' => 'menu-header',
										'container' => '',
										'container_class' => '',
										'menu_class' => 'top-menu',
									)
								);
							endif; ?>
						</div>
						<div class="site-fixed site-fixed-mob">
							<?php
							$phone = get_field('telefon', 'option');
							$email = get_field('email', 'option');
							?>
							<?php if ($phone): ?>
								<div class="phone">
									<?php $phone_new = str_replace(" ", '', $phone); ?>
									<a href="tel:<?php echo $phone_new; ?>">  
										<?php $icon = get_stylesheet_directory() . '/img/icons/phone.svg';
										echo file_get_contents($icon); ?>
									</a>
								</div>
							<?php endif; ?>
							<?php if ($email): ?>
								<div class="email">
									<a href="mailto:<?php echo $email; ?>">
										<?php $icon = get_stylesheet_directory() . '/img/icons/mail.svg';
										echo file_get_contents($icon); ?>
									</a>
								</div>
							<?php endif; ?>
						</div>
					</div>
				</div>
			</div>
			<div class="site-fixed">
				<?php
				$phone = get_field('telefon', 'option');
				$email = get_field('email', 'option');
				?>
				<?php if ($phone): ?>
					<div class="phone">

						<a href="tel:<?php echo $phone_new; ?>">
							<?php $icon = get_stylesheet_directory() . '/img/icons/phone-2.svg';
							echo file_get_contents($icon); ?>
						</a>
					</div>
				<?php endif; ?>
				<?php if ($email): ?>
					<div class="email">
						<a href="mailto:<?php echo $email; ?>">
							<?php $icon = get_stylesheet_directory() . '/img/icons/mail-2.svg';
							echo file_get_contents($icon); ?>
						</a>
					</div>
				<?php endif; ?>
			</div>
		</header><!-- #masthead -->