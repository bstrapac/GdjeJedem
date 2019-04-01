<?php
class customTaxonomies{
const SLUG_JELO = customPostType::SLUG_JELO;
const SLUG_VRSTE_JELA = 'vrste_jela';
const SLUG_RESTORAN = 'restoran';
const SLUG_SASTOJCI = 'Sastojci';
	function __construct()
	{
		add_action( 'init', array( $this, 'taxonomy_vrste_jela' ));
        add_action( 'init', array( $this, 'taxonomy_restoran'));
        add_action( 'init', array( $this, 'taxonomy_sastojci'));
	}
	// Register Custom Taxonomy Vrste Jela
	function taxonomy_vrste_jela() {
		$labels = array(
			'name'                       => _x( 'Vrste jela', 'Taxonomy General Name', 'mojaTema' ),
			'singular_name'              => _x( 'Vrsta jela', 'Taxonomy Singular Name', 'mojaTema' ),
			'menu_name'                  => __( 'Vrste jela', 'mojaTema' ),
			'all_items'                  => __( 'Sve vrste jela', 'mojaTema' ),
			'parent_item'                => __( 'Parent Item', 'mojaTema' ),
			'parent_item_colon'          => __( 'Parent Item:', 'mojaTema' ),
			'new_item_name'              => __( 'Nova vrsta jela', 'mojaTema' ),
			'add_new_item'               => __( 'Dodaj novu vrstu jela', 'mojaTema' ),
			'edit_item'                  => __( 'Uredi vrstu jela', 'mojaTema' ),
			'update_item'                => __( 'Ažuriraj vrstu jela', 'mojaTema' ),
			'view_item'                  => __( 'Pregledaj vrstu jela', 'mojaTema' ),
			'separate_items_with_commas' => __( 'Odjelite vrste jela zarezima', 'mojaTema' ),
			'add_or_remove_items'        => __( 'Dodaj ili ukloni vrste jela', 'mojaTema' ),
			'choose_from_most_used'      => __( 'Odaberi među najpopularnijima', 'mojaTema' ),
			'popular_items'              => __( 'Popularni', 'mojaTema' ),
			'search_items'               => __( 'Pretraženi', 'mojaTema' ),
			'not_found'                  => __( 'Nema pronađenih', 'mojaTema' ),
			'no_terms'                   => __( 'Nema vrsta jela', 'mojaTema' ),
			'items_list'                 => __( 'Lista vrsta jela', 'mojaTema' ),
			'items_list_navigation'      => __( 'Navigacija među vrstima jela', 'mojaTema' ),
		);
		$args = array(
			'labels'                     => $labels,
			'hierarchical'               => true,
			'public'                     => true,
			'show_ui'                    => true,
			'show_admin_column'          => true,
			'show_in_nav_menus'          => false,
			'show_tagcloud'              => true,
		);
		register_taxonomy( self::SLUG_VRSTE_JELA, array(self::SLUG_JELO ), $args );
	}

    // Register Custom Taxonomy Restoran
   function taxonomy_restoran() {

        $labels = array(
            'name'                       => _x( 'Restorani', 'Taxonomy General Name', 'text_domain' ),
            'singular_name'              => _x( 'Restoran', 'Taxonomy Singular Name', 'text_domain' ),
            'menu_name'                  => __( 'Restorani', 'text_domain' ),
            'all_items'                  => __( 'Svi restorani', 'text_domain' ),
            'parent_item'                => __( 'Parent Item', 'text_domain' ),
            'parent_item_colon'          => __( 'Parent Item:', 'text_domain' ),
            'new_item_name'              => __( 'Novi restoran', 'text_domain' ),
            'add_new_item'               => __( 'Dodaj novi restoran', 'text_domain' ),
            'edit_item'                  => __( 'Uredi restoran', 'text_domain' ),
            'update_item'                => __( 'Ažuriraj restoran', 'text_domain' ),
            'view_item'                  => __( 'Pregledaj restoran', 'text_domain' ),
            'separate_items_with_commas' => __( 'Odvoji restorane sa zarezima', 'text_domain' ),
            'add_or_remove_items'        => __( 'Dodaj ili ukloni restoran', 'text_domain' ),
            'choose_from_most_used'      => __( 'Odaberi među najpopularnijima', 'text_domain' ),
            'popular_items'              => __( 'Popularni restorani', 'text_domain' ),
            'search_items'               => __( 'Pretraži restorane', 'text_domain' ),
            'not_found'                  => __( 'Nema pronađenih restorana', 'text_domain' ),
            'no_terms'                   => __( 'Nema restorana', 'text_domain' ),
            'items_list'                 => __( 'Lista restorana', 'text_domain' ),
            'items_list_navigation'      => __( 'Navigacija među restoranima', 'text_domain' ),
        );
        $args = array(
            'labels'                     => $labels,
            'hierarchical'               => false,
            'public'                     => true,
            'show_ui'                    => true,
            'show_admin_column'          => true,
            'show_in_nav_menus'          => true,
            'show_tagcloud'              => true,
        );
        register_taxonomy( self::SLUG_RESTORAN, array( self::SLUG_JELO ), $args );
    }
    function taxonomy_sastojci() {

        $labels = array(
            'name'                       => _x( 'Sastojci', 'Taxonomy General Name', 'mojaTema' ),
            'singular_name'              => _x( 'Sastojak', 'Taxonomy Singular Name', 'mojaTema' ),
            'menu_name'                  => __( 'Sastojci', 'mojaTema' ),
            'all_items'                  => __( 'Svi sastojci', 'mojaTema' ),
            'parent_item'                => __( 'Parent Item', 'mojaTema' ),
            'parent_item_colon'          => __( 'Parent Item:', 'mojaTema' ),
            'new_item_name'              => __( 'Novi sastojak', 'mojaTema' ),
            'add_new_item'               => __( 'Dodaj novi sastojak', 'mojaTema' ),
            'edit_item'                  => __( 'Uredi sastojak', 'mojaTema' ),
            'update_item'                => __( 'Ažuriraj sastojak', 'mojaTema' ),
            'view_item'                  => __( 'Pregledaj sastojak', 'mojaTema' ),
            'separate_items_with_commas' => __( 'Odvojite sastojke zarezima', 'mojaTema' ),
            'add_or_remove_items'        => __( 'Dodaj ili ukloni sastojak', 'mojaTema' ),
            'choose_from_most_used'      => __( 'Odaberite među najčešće korištenima', 'mojaTema' ),
            'popular_items'              => __( 'Popularni sastojci', 'mojaTema' ),
            'search_items'               => __( 'Pretraži sastojke', 'mojaTema' ),
            'not_found'                  => __( 'Nema pronađenih sastojaka', 'mojaTema' ),
            'no_terms'                   => __( 'Nema sastojaka', 'mojaTema' ),
            'items_list'                 => __( 'Lista sastojaka', 'mojaTema' ),
            'items_list_navigation'      => __( 'Navigacija kroz sastojke', 'mojaTema' ),
        );
        $args = array(
            'labels'                     => $labels,
            'hierarchical'               => true,
            'public'                     => true,
            'show_ui'                    => true,
            'show_admin_column'          => true,
            'show_in_nav_menus'          => true,
            'show_tagcloud'              => true,
        );
        register_taxonomy( self::SLUG_SASTOJCI, array( self::SLUG_JELO ), $args );
    }
}
?>