<?php
/**
*Plugin Name: Libros Plugin
*Description: This is just a test plugin
**/

/*
**** Nuevo Custom Post Type 2do Ejemplo ****
*/
function register_libros_posttype() {
	$labels = array(
		'name'               => _x( 'Libros', 'libroswp' ),
		'singular_name'      => _x( 'Libro', 'libroswp' ),
		'add_new'            => __( 'Añadir nuevo','libroswp'),
		'add_new_item'       => __( 'Nuevo libro','libroswp'),
		'edit_item'          => __( 'Editar libro','libroswp' ),
		'new_item'           => __( 'Nuevo libro','libroswp' ),
		'all_items'          => __( 'Todos los libros','libroswp' ),
		'view_item'          => __( 'Ver libro','libroswp'),
		'search_items'       => __( 'Buscar libro','libroswp'),
		'not_found'          => __( 'No encontrado!','libroswp' ),
		'not_found_in_trash' => __( 'No encontrado en la papelera','libroswp' ),
		'parent_item_colon'  => '',
		'menu_name'          => __('LIBROS','libroswp'));
	$args = array(
		'labels'             => $labels,
		'public'             => true,
		'show_ui'            => true,
		'publicly_queryable' => true,
		'rewrite'            => array( 'slug' => 'libro' ),
		'has_archive'        => true,
		'capability_type'    => 'post',
		'menu_icon'          => 'dashicons-book',
		'can_export'         => true,
		'menu_position'      => 5,
		'supports'           => array('title','editor','author','thumbnail','excerpt','trackbacks','custom-fields','comments','revisions')
	);
	register_post_type( 'libro', $args );	
}
function taxonomia_libros_category() {
	register_taxonomy( 'categorias-libros',
	array (0 => 'libro'),
	array(
		'hierarchical'      => true,
		'label'             => __('Categorías de libros','libroswp'),
		'show_ui'           => true,
		'query_var'         => true,
		'show_admin_column' => true,
		'labels'            => array (
			'search_items'               => __('Buscar categorías','libroswp'),
			'popular_items'              => __('Más populares','libroswp'),
			'all_items'                  => __('Todas','libroswp'),
			'parent_item'                => __('Superior','libroswp'),
			'parent_item_colon'          => __('Categoría superior','libroswp'),
			'edit_item'                  => __('Editar categoría','libroswp'),
			'update_item'                => __('Actualizar categoría','libroswp'),
			'add_new_item'               => __('Añadir nueva categoría','libroswp'),
			'new_item_name'              => __('Nueva categoría','libroswp'),
			'separate_items_with_commas' => __('Separar por comas','libroswp'),
			'add_or_remove_items'        => __('Añadir o borrar','libroswp'),
			'choose_from_most_used'      => __('Elegir de las más usadas','libroswp'),
		)
	) );
}
/*
**** TAXONOMY tags-tutoriales ****
*/
function taxonomia_libros_tag() {
	register_taxonomy( 'tags-libros',
	array (0 => 'libro'),
	array( 'hierarchical' => false,
		'label'                 => __('Categorías de tutoriales','tutorialeswp'),
		'show_ui'               => true,
		'query_var'             => true,
		'show_admin_column'     => true,
		'update_count_callback' => '_update_post_term_count',		
		'labels' => array (
			'name'                       => _x( 'Etiquetas', 'libroswp' ),
			'singular_name'              => _x( 'Etiqueta', 'libroswp' ),
			'search_items'               => __( 'Buscar Etiquetas', 'libroswp' ),
			'popular_items'              => __( 'Etiquetas Populares', 'libroswp' ),
			'all_items'                  => __( 'Todas las Etiquetas', 'libroswp' ),
			'parent_item'                => null,
			'parent_item_colon'          => null,
			'edit_item'                  => __( 'Editar Etiqueta', 'libroswp' ),
			'update_item'                => __( 'Actualizar Etiqueta', 'libroswp' ),
			'add_new_item'               => __( 'Añadir Nueva Etiqueta', 'libroswp' ),
			'new_item_name'              => __( 'Nombre de Nueva Etiqueta', 'libroswp' ),
			'separate_items_with_commas' => __( 'Separa las etiquetas con comas', 'libroswp' ),
			'add_or_remove_items'        => __( 'Añadir o remover etiquetas', 'libroswp' ),
			'choose_from_most_used'      => __( 'Elige entre las etiquetas más utilizadas', 'libroswp' ),
			'not_found'                  => __( 'Ninguna etiqueta encontrada.', 'libroswp' ),
			'menu_name'                  => __( 'Etiquetas', 'libroswp' ),
		)
	) );
}
/*
**** Action hooks para los custom post types ****
*/
add_action( 'init', 'register_libros_posttype' );
add_action( 'init', 'taxonomia_libros_category');
add_action( 'init', 'taxonomia_libros_tag');
