<?php
/**
 * Functions which enhance the theme by hooking into WordPress
 *
 * @package sammer
 */

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function sammer_body_classes($classes)
{
	// Adds a class of hfeed to non-singular pages.
	if (!is_singular()) {
		$classes[] = 'hfeed';
	}

	// Adds a class of no-sidebar when there is no sidebar present.
	if (!is_active_sidebar('sidebar-1')) {
		$classes[] = 'no-sidebar';
	}

	return $classes;
}
add_filter('body_class', 'sammer_body_classes');

/**
 * Add a pingback url auto-discovery header for single posts, pages, or attachments.
 */
function sammer_pingback_header()
{
	if (is_singular() && pings_open()) {
		printf('<link rel="pingback" href="%s">', esc_url(get_bloginfo('pingback_url')));
	}
}
add_action('wp_head', 'sammer_pingback_header');


/**
 * Gutenberg category
 */
function add_custom_block_categories($block_categories, $editor_context)
{
	if (!empty($editor_context->post)) {
		array_push(
			$block_categories,
			array(
				'slug'  => 'images-modules',
				'title' => __('Bild-Module', 'sammer'),
				'icon'  => null,
			),
			array(
				'slug'  => 'text-images-modules',
				'title' => __('Bild/Text module', 'sammer'),
				'icon'  => null,
			),
			array(
				'slug'  => 'text-modules',
				'title' => __('Text module', 'sammer'),
				'icon'  => null,
			),
			array(
				'slug'  => 'sonder',
				'title' => __('Sonder', 'sammer'),
				'icon'  => null,
			),
		);
	}
	return $block_categories;
}
add_filter('block_categories_all', 'add_custom_block_categories', 10, 2);

/**
 * Gutenberg blocks
 */
add_action('init', 'register_acf_blocks');
function register_acf_blocks()
{
	register_block_type(get_template_directory() . '/template-parts/blocks/text-images/top-page-banner');
	register_block_type(get_template_directory() . '/template-parts/blocks/text/text-two-columns');
	register_block_type(get_template_directory() . '/template-parts/blocks/text-images/image-text-colums');
	register_block_type(get_template_directory() . '/template-parts/blocks/text/advantages');
	register_block_type(get_template_directory() . '/template-parts/blocks/text-images/cta-1');
	register_block_type(get_template_directory() . '/template-parts/blocks/sonder/leistungen-list');
	register_block_type(get_template_directory() . '/template-parts/blocks/text/cta-2');
	register_block_type(get_template_directory() . '/template-parts/blocks/text-images/secret-ivestments');
	register_block_type(get_template_directory() . '/template-parts/blocks/text/slider-numbers');
	register_block_type(get_template_directory() . '/template-parts/blocks/sonder/list-cpt');
	register_block_type(get_template_directory() . '/template-parts/blocks/text-images/benefits');
	register_block_type(get_template_directory() . '/template-parts/blocks/text-images/awards');
	register_block_type(get_template_directory() . '/template-parts/blocks/sonder/references');
	register_block_type(get_template_directory() . '/template-parts/blocks/text-images/slider-image-text');
	register_block_type(get_template_directory() . '/template-parts/blocks/sonder/contact-form');
	register_block_type(get_template_directory() . '/template-parts/blocks/sonder/information-package');
	register_block_type(get_template_directory() . '/template-parts/blocks/text/text');
}

/**
 * remove Gutenberg Block
 */
add_filter('allowed_block_types_all', 'allowed_block_types', 25, 2);
function allowed_block_types($allowed_blocks, $editor_context)
{

	if ('post' === $editor_context->post->post_type) {
        return array(
            'core/paragraph',
            'core/image',
            'core/gallery',
            'core/heading',
            'core/list',
            'core/list-item',
            'core/video',
            'core/embed',
            'core/spacer',
            'core/buttons',
            'core/separator',
            'acf/top-page-banner',
			'acf/text-two-columns',
			'acf/image-text-colums',
			'acf/advantages',
			'acf/cta-1',
			'acf/leistungen-list',
			'acf/cta-2',
			'acf/secret-ivestments',
			'acf/slider-numbers',
			'acf/list-cpt',
			'acf/benefits',
			'acf/awards',
			'acf/references',
			'acf/slider-image-text',
			'acf/contact-form',
			'acf/information-package',
			'acf/text',
        );
    }

	return array(
		'acf/top-page-banner',
		'acf/text-two-columns',
		'acf/image-text-colums',
		'acf/advantages',
		'acf/cta-1',
		'acf/leistungen-list',
		'acf/cta-2',
		'acf/secret-ivestments',
		'acf/slider-numbers',
		'acf/list-cpt',
		'acf/benefits',
		'acf/awards',
		'acf/references',
		'acf/slider-image-text',
		'acf/contact-form',
		'acf/information-package',
		'acf/text',
	);
}
