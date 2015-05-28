<?php
	if (!function_exists('immobiliare_menu')) :
		function immobiliare_menu() {
			add_options_page('Immobiliare pagina', 'Immobiliare', 'manage_options', 'immobiliare', 'immobiliare_opzioni');
		}
	endif;
	
	if (!function_exists('immobiliare_opzioni_validate')) :
		function immobiliare_opzioni_validate() {
		}
	endif;

	if (!function_exists('immobiliare_opzioni')) :
			function immobiliare_opzioni() {
				global $immobiliare_opzioni;
				?>
				<div class="wrap">
				<h2>Opzioni plugin immobiliare</h2>
				<p>Inserisci i dati dell'agenzia immobiliare o dell'impresa edile.
				<form method="post" action="options.php">
					<?php settings_fields('immobiliare_opzioni'); ?>
					<?php do_settings_sections('immobiliare'); ?>
					<table class="optiontable form-table">
					<tr valign="top">
					<th scope="row"><label for="immobiliare_azienda_nome">Nome azienda</label></th>
					<td><input name="immobiliare_azienda_nome" type="text" id="immobiliare_azienda_nome" value="<?php print(get_option('immobiliare_azienda_nome')); ?>" size="40" class="regular-text" />
					<span class="description">Nome azienda</span></td>
					</tr>
					<tr valign="top">
					<th scope="row"><label for="immobiliare_azienda_indirizzo">Indirizzo azienda</label></th>
					<td><input name="immobiliare_azienda_indirizzo" type="text" id="immobiliare_azienda_indirizzo" value="<?php print(get_option('immobiliare_azienda_indirizzo')); ?>" size="40" class="regular-text" />
					<span class="description">Indirizzo azienda</span></td>
					</tr>
					<tr valign="top">
					<th scope="row"><label for="immobiliare_azienda_comune">Comune azienda</label></th>
					<td><input name="immobiliare_azienda_comune" type="text" id="immobiliare_azienda_comune" value="<?php print(get_option('immobiliare_azienda_comune')); ?>" size="40" class="regular-text" />
					<span class="description">Comune azienda</span></td>
					</tr>
					<tr valign="top">
					<th scope="row"><label for="immobiliare_azienda_provincia">Provincia azienda</label></th>
					<td><input name="immobiliare_azienda_provincia" type="text" id="immobiliare_azienda_provincia" value="<?php print(get_option('immobiliare_azienda_provincia')); ?>" size="40" class="regular-text" />
					<span class="description">Pronvica azienda</span></td>
					</tr>
					<tr valign="top">
					<th scope="row"><label for="immobiliare_azienda_telefono">Telefono azienda</label></th>
					<td><input name="immobiliare_azienda_telefono" type="text" id="immobiliare_azienda_telefono" value="<?php print(get_option('immobiliare_azienda_telefono')); ?>" size="40" class="regular-text" />
					<span class="description">Telefono azienda</span></td>
					</tr>
					<tr valign="top">
					<th scope="row"><label for="immobiliare_azienda_email">Email azienda</label></th>
					<td><input name="immobiliare_azienda_email" type="text" id="immobiliare_azienda_email" value="<?php print(get_option('immobiliare_azienda_email')); ?>" size="40" class="regular-text" />
					<span class="description">Email azienda</span></td>
					</tr>
					</table>
				<p class="submit"><input type="submit" name="submit" id="submit" class="button-primary" value="<?php _e('Save Changes'); ?>" /></p>
				<input type="hidden" name="action" value="update" />
				</p>
				<input type="hidden" name="option_page" value="email">
				</form>
				</div>
				<?php
			}
	endif;

  add_action( 'admin_menu', 'immobiliare_menu' );
