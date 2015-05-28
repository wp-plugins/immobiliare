<?php
/**
 * Plugin Name: Immobiliare
 * Plugin URI: http://www.realizzazionesitiweb20.it
 * Description: gestionale immobiliare per wordpress
 * Version: 1.7.0
 * Author: RSW Studio
 * Author URI: http://www.realizzazionesitiweb20.it
 * License: GPL2
 */
 
  defined('ABSPATH') or die("No script kiddies please!");
	define( 'Immobiliare_Version', '1.7.0' );
	define( 'Immobiliare_Directory', dirname( plugin_basename( __FILE__ ) ) );
	define( 'Immobiliare_Path', plugin_dir_path( __FILE__ ) );
	define( 'Immobiliare_URL', plugin_dir_url( __FILE__ ) );

  include 'immobiliare_metabox.php';
  include 'immobiliare_pluginaggiuntivi.php';
  include 'immobiliare_opzioni.php';
  include 'immobiliare_tassonomie.php';
  
  load_plugin_textdomain('immobiliare', false, basename( dirname( __FILE__ ) ) . '/lang' );

	function immobili_print(){
		echo rwmb_meta('immobili_arredato');
	}
	
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
