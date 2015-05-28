<?php
	/* tipologia e contratto immobili*/
	function tassonomia_tipologia() {
		$labels = array(
			'name'              => __( 'Tipologie', 'taxonomy general name' ),
			'singular_name'     => __( 'Tipologia', 'taxonomy singular name' ),
			'search_items'      => __( 'Cerca tipologia' ),
			'all_items'         => __( 'Tutte le tipologie' ),
			'parent_item'       => __( 'Tipologia padre' ),
			'parent_item_colon' => __( 'Tipologia padre:' ),
			'edit_item'         => __( 'Modifica tipologia' ), 
			'update_item'       => __( 'Aggiorna tipologia' ),
			'add_new_item'      => __( 'Aggiungi nuova tipologia' ),
			'new_item_name'     => __( 'Nome della nuova tipologia' ),
			'menu_name'         => __( 'Tipologie' ),
		);
		$args = array(
			'labels' => $labels,
			'hierarchical' => true,
			'show_ui'               => true,
			'show_admin_column'     => true,
			'show_in_nav_menus'     => true,
		);
		register_taxonomy( 'tipologia', 'immobili', $args );
	}
	add_action( 'init', 'tassonomia_tipologia', 0 );

  /* categorie: residenziale commerciale*/
	function tassonomia_categoria() {
		$labels = array(
			'name'              => __( 'Categorie', 'taxonomy general name' ),
			'singular_name'     => __( 'Categorie', 'taxonomy singular name' ),
			'search_items'      => __( 'Cerca categoria' ),
			'all_items'         => __( 'Tutte le categorie' ),
			'parent_item'       => __( 'Categoria padre' ),
			'parent_item_colon' => __( 'Categoria padre:' ),
			'edit_item'         => __( 'Modifica categoria' ), 
			'update_item'       => __( 'Aggiorna categoria' ),
			'add_new_item'      => __( 'Aggiungi nuova categoria' ),
			'new_item_name'     => __( 'Nome della nuova categoria' ),
			'menu_name'         => __( 'Categorie' ),
		);
		$args = array(
			'labels' => $labels,
			'hierarchical' => true,
			'show_ui'               => true,
			'show_admin_column'     => true,
			'show_in_nav_menus'     => true,
		);
		register_taxonomy( 'categoria', 'immobili', $args );
	}
	add_action( 'init', 'tassonomia_categoria', 0 );

  
	function tassonomia_contratto() {
		$labels = array(
			'name'              => _x( 'Contratto', 'taxonomy general name' ),
			'singular_name'     => _x( 'Contratto', 'taxonomy singular name' ),
			'search_items'      => __( 'Cerca Contratto' ),
			'all_items'         => __( 'Tutti i contratti' ),
			'parent_item'       => __( 'Contratto padre' ),
			'parent_item_colon' => __( 'Contratto padre:' ),
			'edit_item'         => __( 'Modifica Contratto' ), 
			'update_item'       => __( 'Aggiorna Contratto' ),
			'add_new_item'      => __( 'Aggiungi nuovo Contratto' ),
			'new_item_name'     => __( 'Nome del nuovo Contratto' ),
			'menu_name'         => __( 'Contratti' ),
		);
		$args = array(
			'labels' => $labels,
			'hierarchical' => true,
			'show_ui'               => true,
			'show_admin_column'     => true,
			'show_in_nav_menus'     => true,
		);
		register_taxonomy( 'contratto', 'immobili', $args );
	}
	add_action( 'init', 'tassonomia_contratto', 0 );

	function tassonomia_comune() {
		$labels = array(
			'name'              => _x( 'Comune', 'taxonomy general name' ),
			'singular_name'     => _x( 'Comune', 'taxonomy singular name' ),
			'search_items'      => __( 'Cerca Comune' ),
			'all_items'         => __( 'Tutti i comuni' ),
			'parent_item'       => __( 'Comune padre' ),
			'parent_item_colon' => __( 'Comune padre:' ),
			'edit_item'         => __( 'Modifica Comune' ), 
			'update_item'       => __( 'Aggiorna Comune' ),
			'add_new_item'      => __( 'Aggiungi nuovo Comune' ),
			'new_item_name'     => __( 'Nome del nuovo Comune' ),
			'menu_name'         => __( 'Comuni' ),
		);
		$args = array(
			'labels' => $labels,
			'hierarchical' => true,
			'show_ui'               => true,
			'show_admin_column'     => true,
			'show_in_nav_menus'     => true,
		);
		register_taxonomy( 'comuni', 'immobili', $args );
	}
	add_action( 'init', 'tassonomia_comune', 0 );