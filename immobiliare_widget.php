<?php
class Immobiliare_Widget extends WP_Widget {

	function __construct() {
		parent::__construct('immobiliare_widget', __('Immobiliare Widget', 'immobiliare_domain'), array( 'description' => __( 'Widget per form di ricerca immobili del Plugin Immobiliare', 'immobiliare_domain' ), ) );
	}

	function form($instance) {
		if( $instance) {
		  $title = esc_attr($instance['title']);
		} else {
		  $title = '';
		}
		?>
		<p>
		<label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Titolo ricerca', 'immobiliare_domain'); ?></label>
		<input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $title; ?>" />
		</p>		
		<?php
		echo __( '<p>');
		echo __( 'Widget per form di ricerca immobili del Plugin Immobiliare', 'immobiliare_domain' );
		echo __( '</p>');
	}
	
	function update($new_instance, $old_instance) {
    $instance = $old_instance;
    $instance['title'] = strip_tags($new_instance['title']);
	  return $instance;
	}

	function widget($args, $instance) {
	   extract( $args );
	   $title = apply_filters('widget_title', $instance['title']);
	   echo $before_widget;
	   echo '<div class="widget-text wp_widget_plugin_box">';
	   ?>
     <form method="get" name="cercaimmobili" class="formcercaimmobili" action="<?php echo get_site_url(); ?>/immobili/">
		 	<h5>
			   <?php
				 if ( $title ) {
			      echo $before_title . $title . $after_title;
			   }else{
			      echo $before_title . 'Ricerca Immobili' . $after_title;
				 }?>
			 </h5>
      <label for="comuni">
	      <select name="comuni" id="comuni">
	      	<option value="">Scegli un comune</option>
					 <?php
					 $terms = get_terms("comuni");
					 if ( !empty( $terms ) && !is_wp_error( $terms ) ){
				     foreach ( $terms as $term ) {
				       echo '<option value="' . $term->slug . '">' . $term->name . '</option>';
				        
				     }
					 }
	         ?>
	      </select>
      </label>
      <label for="categoria">
	      <select name="categoria" id="categoria">
	      <option value="">Scegli una categoria</option>
					 <?php
					 $terms = get_terms("categoria");
					 if ( !empty( $terms ) && !is_wp_error( $terms ) ){
				     foreach ( $terms as $term ) {
				       echo '<option value="' . $term->slug . '">' . $term->name . '</option>';
				        
				     }
					 }
	         ?>
	      </select>
      </label>
      <label for="tipologia">
			 <?php
					$taxonomy = "tipologia";
					$current_selected = "";
					$terms = get_terms($taxonomy, array('orderby' => 'name'));
			 		if ( !empty( $terms ) && !is_wp_error( $terms ) ){
							$list_of_terms .= '<select name="tipologia" id="tipologia"><option value="">Scegli una tipologia</option>';
							foreach($terms as $term){
							    $select = ($current_selected == $term->slug) ? "selected" : "";
							    if ($term->parent == 0 ) {
							        $tchildren = get_term_children($term->term_id, $taxonomy);
							        $children = array();
							        foreach ($tchildren as $child) {
							            $cterm = get_term_by( 'id', $child, $taxonomy );
							            $children[$cterm->name] = $cterm;
							        }
							        ksort($children);
							        if (count($children) > 0 ) {
							                 $list_of_terms .= '<optgroup label="'. $term->name .'">';
							                 if ($term->count > 0)
							                 $list_of_terms .= '<option value="'.$term->slug.'" '.$select.'>All '. $term->name .' ('.$term->count.')</option>';
							            } else
							            $list_of_terms .= '<option value="'.$term->slug.'" '.$select.'>'. $term->name .' ('.$term->count.')</option>';
							        $i++;
							        foreach($children as $child) {
							             $select = ($current_selected == $cterm->slug) ? "selected" : "";
							             $list_of_terms .= '<option value="'.$child->slug.'" '.$select.'>'. $child->name.' ('.$child->count.')</option>';
							        }
							        if (count($children) > 0 ) {
							            $list_of_terms .= "</optgroup>";
							        }
							    }
							}
							$list_of_terms .= '</select>';
							echo $list_of_terms;
			 }
  		 ?>
      </label>
	    <div class="row">
	    	<div class="large-12 medium-12 small-12 columns">
          <input type="radio" name="contratto" value="Vendita" id="contattoVendita"><label class="radio" for="contattoVendita">Vendita</label>
				</div>
	    	<div class="large-12 medium-12 small-12 columns">
          <input type="radio" name="contratto" value="Affitto" id="contrattoAffitto"><label class="radio" for="contrattoAffitto">Affitto</label>
				</div>
	    	<div class="large-12 medium-12 small-12 columns">
      			<button type="submit" class="button round ricerca expand"><i class="fa fa-search fa-fw" style="margin:0;"></i>Cerca</button>
				</div>
			</div>
		 </form>
     <?php
	   echo '</div>';
	   echo $after_widget;
	}
}

add_action('widgets_init', create_function('', 'return register_widget("immobiliare_widget");'));
