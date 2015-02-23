<?php
/**
 * Plugin Name: Immobiliare
 * Plugin URI: http://www.realizzazionesitiweb20.it
 * Description: gestionale immobiliare per wordpress
 * Version: 1.3.0
 * Author: RSW Studio
 * Author URI: http://www.realizzazionesitiweb20.it
 * License: GPL2
 */
 
  defined('ABSPATH') or die("No script kiddies please!");
	define( 'Immobiliare_Version', '1.2.0' );
	define( 'Immobiliare_Directory', dirname( plugin_basename( __FILE__ ) ) );
	define( 'Immobiliare_Path', plugin_dir_path( __FILE__ ) );
	define( 'Immobiliare_URL', plugin_dir_url( __FILE__ ) );

  require_once Immobiliare_Path . '/class-tgm-plugin-activation.php';

  add_action( 'tgmpa_register', 'immobiliare_register_required_plugins' );
  load_plugin_textdomain('immobiliare', false, basename( dirname( __FILE__ ) ) . '/lang' );
   
	/* properties */
	function immobili_init() {
	  $labels = array(
	    'name' => 'Immobili',
	    'singular_name' => 'Immobile',
	    'add_new' => 'Aggiungi Immobile',
	    'add_new_item' => 'Aggiungi Immobile',
	    'edit_item' => 'Modifica',
	    'new_item' => 'Nuovo Immobile',
	    'all_items' => 'Tutti gli Immobili',
	    'view_item' => 'Vedi la pagina',
	    'search_items' => 'Cerca',
	    'not_found' =>  'Nessun Immobile trovato',
	    'not_found_in_trash' => 'Nessun Immobile trovato nel cestino', 
	    'parent_item_colon' => '',
	    'menu_name' => 'Immobili'
	  );
	
	  $args = array(
	    'labels' => $labels,
	    'public' => true, //se è visibile nel pannello admin
	    'publicly_queryable' => true,
	    'show_ui' => true, //should we display an admin panel for this custom post type
	    'show_in_menu' => true, 
	    'query_var' => true,
			'menu_icon' => Immobiliare_URL . '/img/immobili.png', //parte dalla cartella dove si trova function
			'rewrite' => array( 'slug' => 'immobili' ), //modifica il permalink con il nome della sezione (es: servizi) //'rewrite' => true,  // 
	    'capability_type' => 'post', //wordpress deve sapere come comportarsi per leggere, editare e cancellare il post - a livello di permessi
	    'has_archive' => true, 
	    'hierarchical' => false, //gerarchico come le pagine
	    'menu_position' => null, //oppure un numero
	    'supports' => array( 'title', 'excerpt', 'editor', 'thumbnail','page-attributes' ) // quali item sono supportati ed inseriti nella pagina add/edit del pannello wp-admin - 'editor', 'author', 'comments' 
	  ); 
	  register_post_type( 'immobili', $args );
	}
	add_action( 'init', 'immobili_init' );
  include 'immobiliare_metabox.php';

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

  
	
	/* registra il plugin meta-box richiesto */
	function immobiliare_register_required_plugins() {
    $plugins = array(
        array(
            'name'      => 'Meta Box',
            'slug'      => 'meta-box',
            'required'  => true,
        ),
    );
    $config = array(
        'default_path' => '',                      // Default absolute path to pre-packaged plugins.
        'menu'         => 'tgmpa-install-plugins', // Menu slug.
        'has_notices'  => true,                    // Show admin notices or not.
        'dismissable'  => false,                    // If false, a user cannot dismiss the nag message.
        'dismiss_msg'  => __( 'Meta Box Required', 'tgmpa' ),                      // If 'dismissable' is false, this message will be output at top of nag.
        'is_automatic' => false,                   // Automatically activate plugins after installation or not.
        'message'      => '',                      // Message to output right before the plugins table.
        'strings'      => array(
            'page_title'                      => __( 'Install Required Plugins', 'tgmpa' ),
            'menu_title'                      => __( 'Install Plugins', 'tgmpa' ),
            'installing'                      => __( 'Installing Plugin: %s', 'tgmpa' ), // %s = plugin name.
            'oops'                            => __( 'Something went wrong with the plugin API.', 'tgmpa' ),
            'notice_can_install_required'     => _n_noop( 'This theme requires the following plugin: %1$s.', 'This theme requires the following plugins: %1$s.' ), // %1$s = plugin name(s).
            'notice_can_install_recommended'  => _n_noop( 'This theme recommends the following plugin: %1$s.', 'This theme recommends the following plugins: %1$s.' ), // %1$s = plugin name(s).
            'notice_cannot_install'           => _n_noop( 'Sorry, but you do not have the correct permissions to install the %s plugin. Contact the administrator of this site for help on getting the plugin installed.', 'Sorry, but you do not have the correct permissions to install the %s plugins. Contact the administrator of this site for help on getting the plugins installed.' ), // %1$s = plugin name(s).
            'notice_can_activate_required'    => _n_noop( 'The following required plugin is currently inactive: %1$s.', 'The following required plugins are currently inactive: %1$s.' ), // %1$s = plugin name(s).
            'notice_can_activate_recommended' => _n_noop( 'The following recommended plugin is currently inactive: %1$s.', 'The following recommended plugins are currently inactive: %1$s.' ), // %1$s = plugin name(s).
            'notice_cannot_activate'          => _n_noop( 'Sorry, but you do not have the correct permissions to activate the %s plugin. Contact the administrator of this site for help on getting the plugin activated.', 'Sorry, but you do not have the correct permissions to activate the %s plugins. Contact the administrator of this site for help on getting the plugins activated.' ), // %1$s = plugin name(s).
            'notice_ask_to_update'            => _n_noop( 'The following plugin needs to be updated to its latest version to ensure maximum compatibility with this theme: %1$s.', 'The following plugins need to be updated to their latest version to ensure maximum compatibility with this theme: %1$s.' ), // %1$s = plugin name(s).
            'notice_cannot_update'            => _n_noop( 'Sorry, but you do not have the correct permissions to update the %s plugin. Contact the administrator of this site for help on getting the plugin updated.', 'Sorry, but you do not have the correct permissions to update the %s plugins. Contact the administrator of this site for help on getting the plugins updated.' ), // %1$s = plugin name(s).
            'install_link'                    => _n_noop( 'Begin installing plugin', 'Begin installing plugins' ),
            'activate_link'                   => _n_noop( 'Begin activating plugin', 'Begin activating plugins' ),
            'return'                          => __( 'Return to Required Plugins Installer', 'tgmpa' ),
            'plugin_activated'                => __( 'Plugin activated successfully.', 'tgmpa' ),
            'complete'                        => __( 'All plugins installed and activated successfully. %s', 'tgmpa' ), // %s = dashboard link.
            'nag_type'                        => 'updated' // Determines admin notice type - can only be 'updated', 'update-nag' or 'error'.
        )
    );

    tgmpa( $plugins, $config );

	}