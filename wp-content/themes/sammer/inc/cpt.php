<?php
add_action('init', 'register_post_types');
function register_post_types()
{ 
	register_post_type('leistungen', [
		'label'  => null,
		'labels' => [
			'name'               => 'Leistungen',
			'singular_name'      => 'Leistungen',
			'all_items' 		 => 'Alle leistungen',
			'add_new'            => 'Erstellen',
			'add_new_item'       => 'Hinzufügen eines Dienstes',
			'edit_item'          => 'Leistungenbearbeitung',
			'new_item'           => 'Neues leistungen',
			'view_item'          => 'Leistungen ansehen',
			'search_items'       => 'Leistungen suchen',
			'not_found'          => 'Nicht gefunden',
			'not_found_in_trash' => 'Nicht im Warenkorb gefunden',
			'parent_item_colon'  => '',
			'menu_name'          => 'Leistungen',
		],
		'description'            => '',
		'public'                 => true,
		'show_in_menu'           => true,
		//'show_in_rest'        => null,
		'show_in_rest'        => true,
		'rest_base'           => 'leistungen',
		'menu_position'       => 22,
		'menu_icon'           => null,
		'hierarchical'        => false,
		'supports'            => ['title', 'thumbnail', 'editor', 'excerpt', 'revisions'],
		'has_archive'         => true,
		'rewrite'             => true,
		'query_var'           => true,
	]);

	register_post_type('berater', [
		'label'  => null,
		'labels' => [
			'name'               => 'Berater',
			'singular_name'      => 'Berater',
			'all_items' 		 => 'Alle berater',
			'add_new'            => 'Erstellen',
			'add_new_item'       => 'Hinzufügen',
			'edit_item'          => 'Editieren',
			'new_item'           => 'Neues berater',
			'view_item'          => 'Berater ansehen',
			'search_items'       => 'Berater suchen',
			'not_found'          => 'Nicht gefunden',
			'not_found_in_trash' => 'Nicht im Warenkorb gefunden',
			'parent_item_colon'  => '',
			'menu_name'          => 'Berater',
		],
		'description'            => '',
		'public'                 => true,
		'show_in_menu'           => true,
		//'show_in_rest'        => null,
		'show_in_rest'        => true,
		'rest_base'           => 'berater',
		'menu_position'       => 22,
		'menu_icon'           => null,
		'hierarchical'        => false,
		'supports'            => ['title', 'thumbnail', 'editor', 'excerpt', 'revisions'],
		'has_archive'         => true,
		'rewrite'             => true,
		'query_var'           => true,
	]);

}
?>
