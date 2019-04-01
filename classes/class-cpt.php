<?php
class customPostType{
const SLUG_JELO = 'jelo';
	 function __construct()
	 {
		add_action( 'init',  array( $this, 'jela_cpt'));
	 }
// Register Custom Post Type Jelo
function jela_cpt() {
		$labels = array(
			'name'                  => _x( 'Jela', 'Post Type General Name', 'mojaTema' ),
			'singular_name'         => _x( 'Jelo', 'Post Type Singular Name', 'mojaTema' ),
			'menu_name'             => __( 'Jela', 'mojaTema' ),
			'name_admin_bar'        => __( 'Jela', 'mojaTema' ),
			'archives'              => __( 'Jela arhiva', 'mojaTema' ),
			'attributes'            => __( 'Item Attributes', 'mojaTema' ),
			'parent_item_colon'     => __( 'Parent Item:', 'mojaTema' ),
			'all_items'             => __( 'Sva jela', 'mojaTema' ),
			'add_new_item'          => __( 'Dodaj novo jelo', 'mojaTema' ),
			'add_new'               => __( 'Dodaj jelo', 'mojaTema' ),
			'new_item'              => __( 'Novo jelo', 'mojaTema' ),
			'edit_item'             => __( 'Uredi jelo', 'mojaTema' ),
			'update_item'           => __( 'Ažuriraj jelo', 'mojaTema' ),
			'view_item'             => __( 'Pogledaj jelo', 'mojaTema' ),
			'view_items'            => __( 'Pogledaj jela', 'mojaTema' ),
			'search_items'          => __( 'Pretraži jela', 'mojaTema' ),
			'not_found'             => __( 'Nema pronađenih jela', 'mojaTema' ),
			'not_found_in_trash'    => __( 'Nema obrisanih jela', 'mojaTema' ),
			'featured_image'        => __( 'Glavna slika', 'mojaTema' ),
			'set_featured_image'    => __( 'Postavi glavnu sliku', 'mojaTema' ),
			'remove_featured_image' => __( 'Ukloni glavnu sliku', 'mojaTema' ),
			'use_featured_image'    => __( 'Koristi kao glavnu sliku', 'mojaTema' ),
			'insert_into_item'      => __( 'Umetni', 'mojaTema' ),
			'uploaded_to_this_item' => __( 'Preneseno', 'mojaTema' ),
			'items_list'            => __( 'Lista', 'mojaTema' ),
			'items_list_navigation' => __( 'Navigacija kroz jela', 'mojaTema' ),
			'filter_items_list'     => __( 'Fitriraj jela', 'mojaTema' ),
		);
		$args = array(
			'label'                 => __( 'Jelo', 'mojaTema' ),
			'description'           => __( 'Post Type Description', 'mojaTema' ),
			'labels'                => $labels,
			'supports'              => array( 'title', 'editor' ),
			'hierarchical'          => false,
			'public'                => true,
			'show_ui'               => true,
			'show_in_menu'          => true,
			'menu_position'         => 5,
			'show_in_admin_bar'     => true,
			'show_in_nav_menus'     => true,
			'can_export'            => true,
			'has_archive'           => true,
			'exclude_from_search'   => false,
			'publicly_queryable'    => true,
			'capability_type'       => 'page',
		);
		register_post_type( self::SLUG_JELO, $args );
	}
}
?>