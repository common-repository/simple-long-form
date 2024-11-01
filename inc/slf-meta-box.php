<?php
/**
 *Add METABOXES*
/** (excerpt)**/
add_filter( 'get_the_excerpt', 'slf_excerpt' );
function slf_excerpt($excerpt) {
global $post;
	$chapo = get_post_meta( get_the_ID(), '_wp_editor_chapo', true );
	$meta_subline = get_post_meta( get_the_ID(), 'meta-subline', true );
		if( !empty( $chapo )  ) { 
			$excerpt = wp_strip_all_tags($chapo);
			return $excerpt;
		}
			else if( !empty( $meta_subline ) && empty( $chapo )  ) { 
			$excerpt = wp_strip_all_tags($meta_subline);
			return $excerpt;
		}
			else {
				return $excerpt;
			}
}

//Note
function note_add_meta_box() {
	add_meta_box('note-note',__( 'Note', 'simplelongform' ),'note_html','longform','normal','high' 	);
}
add_action( 'add_meta_boxes', 'note_add_meta_box' );
function note_html( $post) { ?>

	<p>
		<?php _e( 'Aucun champ n\'est obligatoire: non complété, il ne sera pas affiché. Les titres s\'ajoutent automatiquement au menu intrapage. Pour afficher une image ou une vidéo en plein écran, ne pas compléter le champ du titre. La mise en forme des titres est uniquement prise en compte lorsque celui-ci est accompagné d\'un média (image ou vidéo).', 'simplelongform' ); ?>
	</p>
<?php }

//Metaboxes contents

add_action("add_meta_boxes", "add_slf_meta_box");
function add_slf_meta_box() {
    add_meta_box('slf-meta-box', __('Réglages','simplelongform'), 'simplelongform_meta_callback', 'longform', 'side', 'high', null);
}
function simplelongform_custom_meta() {
    add_meta_box( 'simplelongform_meta', __( 'Configuration', 'simplelongform' ), 'simplelongform_meta_callback', 'longform' );
}
function simplelongform_meta_callback( $post ) {
    wp_nonce_field( basename( __FILE__ ), 'slf_nonce' );
    $simplelongform_stored_meta = get_post_meta( $post->ID );
?>
<div id="wrap">
<h4 class="nav-tab-wrapper">	 
<a href="#" class="nav-tab navtab1 active1"> <?php _e( 'Général', 'simplelongform' ); ?> </a>	 
<a href="#" class="nav-tab navtab2 active2"> <?php _e( 'Intro', 'simplelongform' ); ?> </a>	 
<a href="#" class="nav-tab navtab3 active3"> <?php _e( 'Nav', 'simplelongform' ); ?> </a> 
</h4> 
<div id="tab1" class="ui-sortable meta-box-sortables">	
	<p>		
		<label for="meta-color" class="simplelongform-color"><?php _e( 'Couleur du thème', 'simplelongform' )?></label>		
		<br/>		
		<input name="meta-color" class="meta-color" type="text" value="<?php if ( isset ( $simplelongform_stored_meta['meta-color'] ) ) { echo $simplelongform_stored_meta['meta-color'][0]; } else { ?>#228FAE<?php } ?>" class="meta-color" />	
	</p>
	<p>		
		<label for="meta-text-color" class="simplelongform-color"><?php _e( 'Couleur du texte', 'simplelongform' )?></label>		
		<br/>		
		<input name="meta-text-color" class="meta-color" type="text" value="<?php if ( isset ( $simplelongform_stored_meta['meta-text-color'] ) ) { echo $simplelongform_stored_meta['meta-text-color'][0]; } else { ?>#121212<?php } ?>" class="meta-text-color" />	
	</p>
	<p>		
		<label for="body-color" class="simplelongform-color"><?php _e( 'Couleur d\'arrière-plan', 'simplelongform' )?></label>		
		<br/>		
		<input name="body-color" class="meta-color" type="text" value="<?php if ( isset ( $simplelongform_stored_meta['body-color'] ) ) { echo $simplelongform_stored_meta['body-color'][0]; } else { ?>#ffffff<?php } ?>" class="body-color" />	
	</p>
	<p>
		<label for="meta-font" class="simplelongform-font"><?php _e( 'Police de caractères (textes)', 'simplelongform' )?></label>
		<br/>
	<select name="meta-font" id="meta-font">
        <option value="select-one" <?php if ( isset ( $simplelongform_stored_meta['meta-font'] ) ) selected( $simplelongform_stored_meta['meta-font'][0], 'select-one' ); ?>><?php _e( 'Arial, Helvetica, sans-serif', 'simplelongform' )?></option>
        <option value="select-two" <?php if ( isset ( $simplelongform_stored_meta['meta-font'] ) ) selected( $simplelongform_stored_meta['meta-font'][0], 'select-two' ); ?>><?php _e( 'Georgia, serif', 'simplelongform' )?></option>
		<option value="select-three" <?php if ( isset ( $simplelongform_stored_meta['meta-font'] ) ) selected( $simplelongform_stored_meta['meta-font'][0], 'select-three' ); ?>><?php _e( 'Tahoma, Geneva, sans-serif', 'simplelongform' )?></option>
		<option value="select-four" <?php if ( isset ( $simplelongform_stored_meta['meta-font'] ) ) selected( $simplelongform_stored_meta['meta-font'][0], 'select-four' ); ?>><?php _e( 'Times New Roman, Times, serif', 'simplelongform' )?></option>
		<option value="select-five" <?php if ( isset ( $simplelongform_stored_meta['meta-font'] ) ) selected( $simplelongform_stored_meta['meta-font'][0], 'select-five' ); ?>><?php _e( 'Verdana, Geneva, sans-serif', 'simplelongform' )?></option>
		<option value="select-six" <?php if ( isset ( $simplelongform_stored_meta['meta-font'] ) ) selected( $simplelongform_stored_meta['meta-font'][0], 'select-six' ); ?>><?php _e( 'Arvo, serif', 'simplelongform')?></option>
		<option value="select-seven" <?php if ( isset ( $simplelongform_stored_meta['meta-font'] ) ) selected( $simplelongform_stored_meta['meta-font'][0], 'select-seven' ); ?>><?php _e( 'Droid Sans, sans-serif', 'simplelongform' )?></option>
        <option value="select-eight" <?php if ( isset ( $simplelongform_stored_meta['meta-font'] ) ) selected( $simplelongform_stored_meta['meta-font'][0], 'select-eight' ); ?>><?php _e( 'Open Sans, sans-serif', 'simplelongform' )?></option>
		<option value="select-nine" <?php if ( isset ( $simplelongform_stored_meta['meta-font'] ) ) selected( $simplelongform_stored_meta['meta-font'][0], 'select-nine' ); ?>><?php _e( 'Roboto, sans-serif', 'simplelongform' )?></option>
		<option value="select-ten" <?php if ( isset ( $simplelongform_stored_meta['meta-font'] ) ) selected( $simplelongform_stored_meta['meta-font'][0], 'select-ten' ); ?>><?php _e( 'Roboto Slab, serif', 'simplelongform' )?></option>
		<option value="select-eleven" <?php if ( isset ( $simplelongform_stored_meta['meta-font'] ) ) selected( $simplelongform_stored_meta['meta-font'][0], 'select-eleven' ); ?>><?php _e( 'Lato, sans-serif', 'simplelongform' )?></option>
		<option value="select-twelve" <?php if ( isset ( $simplelongform_stored_meta['meta-font'] ) ) selected( $simplelongform_stored_meta['meta-font'][0], 'select-twelve' ); ?>><?php _e( 'Ubuntu Condensed, sans-serif', 'simplelongform' )?></option>
		<option value="select-thirteen" <?php if ( isset ( $simplelongform_stored_meta['meta-font'] ) ) selected( $simplelongform_stored_meta['meta-font'][0], 'select-thirteen' ); ?>><?php _e( 'Inconsolata, cursive', 'simplelongform' )?></option>
		<option value="select-fourteen" <?php if ( isset ( $simplelongform_stored_meta['meta-font'] ) ) selected( $simplelongform_stored_meta['meta-font'][0], 'select-fourteen' ); ?>><?php _e( 'Playfair Display, serif', 'simplelongform' )?></option>
		<option value="select-fifteen" <?php if ( isset ( $simplelongform_stored_meta['meta-font'] ) ) selected( $simplelongform_stored_meta['meta-font'][0], 'select-fifteen' ); ?>><?php _e( 'Roboto Light, sans-serif', 'simplelongform' )?></option>
		<option value="select-sixteen" <?php if ( isset ( $simplelongform_stored_meta['meta-font'] ) ) selected( $simplelongform_stored_meta['meta-font'][0], 'select-sixteen' ); ?>><?php _e( 'Bree, serif', 'simplelongform' )?></option>
		<option value="select-seventeen" <?php if ( isset ( $simplelongform_stored_meta['meta-font'] ) ) selected( $simplelongform_stored_meta['meta-font'][0], 'select-seventeen' ); ?>><?php _e( 'Oswald regular, sans-serif', 'simplelongform' )?></option>
		<option value="select-eighteen" <?php if ( isset ( $simplelongform_stored_meta['meta-font'] ) ) selected( $simplelongform_stored_meta['meta-font'][0], 'select-heighteen' ); ?>><?php _e( 'Oswal bold, sans-serif', 'simplelongform' )?></option>
		<option value="select-nineteen" <?php if ( isset ( $simplelongform_stored_meta['meta-font'] ) ) selected( $simplelongform_stored_meta['meta-font'][0], 'select-nineteen' ); ?>><?php _e( 'Lobster, cursive', 'simplelongform' )?></option>
		<option value="select-twenty" <?php if ( isset ( $simplelongform_stored_meta['meta-font'] ) ) selected( $simplelongform_stored_meta['meta-font'][0], 'select-twenty' ); ?>><?php _e( 'Lobster Two, cursive', 'simplelongform' )?></option>
		<option value="select-twenty-one" <?php if ( isset ( $simplelongform_stored_meta['meta-font'] ) ) selected( $simplelongform_stored_meta['meta-font'][0], 'select-twenty-one' ); ?>><?php _e( 'Montserrat, sans-serif', 'simplelongform' )?></option>
		<option value="select-twenty-two" <?php if ( isset ( $simplelongform_stored_meta['meta-font'] ) ) selected( $simplelongform_stored_meta['meta-font'][0], 'select-twenty-two' ); ?>><?php _e( 'Montserrat Alternate, sans-serif', 'simplelongform' )?></option>
		<option value="select-twenty-three" <?php if ( isset ( $simplelongform_stored_meta['meta-font'] ) ) selected( $simplelongform_stored_meta['meta-font'][0], 'select-twenty-three' ); ?>><?php _e( 'Raleway, sans-serif', 'simplelongform' )?></option>
	</select>
	</p>
	<p>
		<label for="meta-font_title" class="simplelongform-font_title"><?php _e( 'Police de caractères (titres et légende des sections)', 'simplelongform' )?></label>
		<br/>
	<select name="meta-font_title" id="meta-font_title">
        <option value="select-zero" <?php if ( isset ( $simplelongform_stored_meta['meta-font_title'] ) ) selected( $simplelongform_stored_meta['meta-font_title'][0], 'select-zero' ); ?>><?php _e( 'Par défaut', 'simplelongform' )?></option>
		<option value="select-three" <?php if ( isset ( $simplelongform_stored_meta['meta-font_title'] ) ) selected( $simplelongform_stored_meta['meta-font_title'][0], 'select-three' ); ?>><?php _e( 'Arvo, serif' )?></option>
		<option value="select-one" <?php if ( isset ( $simplelongform_stored_meta['meta-font_title'] ) ) selected( $simplelongform_stored_meta['meta-font_title'][0], 'select-one' ); ?>><?php _e( 'Droid Sans, sans-serif' )?></option>
        <option value="select-two" <?php if ( isset ( $simplelongform_stored_meta['meta-font_title'] ) ) selected( $simplelongform_stored_meta['meta-font_title'][0], 'select-two' ); ?>><?php _e( 'Open Sans, sans-serif' )?></option>
		<option value="select-four" <?php if ( isset ( $simplelongform_stored_meta['meta-font_title'] ) ) selected( $simplelongform_stored_meta['meta-font_title'][0], 'select-four' ); ?>><?php _e( 'Roboto, sans-serif' )?></option>
		<option value="select-five" <?php if ( isset ( $simplelongform_stored_meta['meta-font_title'] ) ) selected( $simplelongform_stored_meta['meta-font_title'][0], 'select-five' ); ?>><?php _e( 'Roboto Slab,serif' )?></option>
		<option value="select-six" <?php if ( isset ( $simplelongform_stored_meta['meta-font_title'] ) ) selected( $simplelongform_stored_meta['meta-font_title'][0], 'select-six' ); ?>><?php _e( 'Lato, sans-serif' )?></option>
		<option value="select-seven" <?php if ( isset ( $simplelongform_stored_meta['meta-font_title'] ) ) selected( $simplelongform_stored_meta['meta-font_title'][0], 'select-seven' ); ?>><?php _e( 'Ubuntu Condensed, sans-serif')?></option>
		<option value="select-eight" <?php if ( isset ( $simplelongform_stored_meta['meta-font_title'] ) ) selected( $simplelongform_stored_meta['meta-font_title'][0], 'select-eight' ); ?>><?php _e( 'Inconsolata, cursive' )?></option>
		<option value="select-nine" <?php if ( isset ( $simplelongform_stored_meta['meta-font_title'] ) ) selected( $simplelongform_stored_meta['meta-font_title'][0], 'select-nine' ); ?>><?php _e( 'Playfair Display, serif' )?></option>
		<option value="select-ten" <?php if ( isset ( $simplelongform_stored_meta['meta-font_title'] ) ) selected( $simplelongform_stored_meta['meta-font_title'][0], 'select-ten' ); ?>><?php _e( 'Raleway, sans-serif' )?></option>
		<option value="select-eleven" <?php if ( isset ( $simplelongform_stored_meta['meta-font_title'] ) ) selected( $simplelongform_stored_meta['meta-font_title'][0], 'select-eleven' ); ?>><?php _e( 'Roboto Light, sans-serif' )?></option>
		<option value="select-twelve" <?php if ( isset ( $simplelongform_stored_meta['meta-font_title'] ) ) selected( $simplelongform_stored_meta['meta-font_title'][0], 'select-twelve' ); ?>><?php _e( 'Bree, serif', 'simplelongform' )?></option>
		<option value="select-thirteen" <?php if ( isset ( $simplelongform_stored_meta['meta-font_title'] ) ) selected( $simplelongform_stored_meta['meta-font_title'][0], 'select-thirteen' ); ?>><?php _e( 'Oswald regular, sans-serif', 'simplelongform' )?></option>
		<option value="select-fourteen" <?php if ( isset ( $simplelongform_stored_meta['meta-font_title'] ) ) selected( $simplelongform_stored_meta['meta-font_title'][0], 'select-fourteen' ); ?>><?php _e( 'Oswal bold, sans-serif', 'simplelongform' )?></option>
		<option value="select-fifteen" <?php if ( isset ( $simplelongform_stored_meta['meta-font_title'] ) ) selected( $simplelongform_stored_meta['meta-font_title'][0], 'select-fifteen' ); ?>><?php _e( 'Lobster, cursive', 'simplelongform' )?></option>
		<option value="select-sixteen" <?php if ( isset ( $simplelongform_stored_meta['meta-font_title'] ) ) selected( $simplelongform_stored_meta['meta-font_title'][0], 'select-sixteen' ); ?>><?php _e( 'Lobster Two, cursive', 'simplelongform' )?></option>
		<option value="select-seventeen" <?php if ( isset ( $simplelongform_stored_meta['meta-font_title'] ) ) selected( $simplelongform_stored_meta['meta-font_title'][0], 'select-seventeen' ); ?>><?php _e( 'Montserrat, sans-serif', 'simplelongform' )?></option>
		<option value="select-eighteen" <?php if ( isset ( $simplelongform_stored_meta['meta-font_title'] ) ) selected( $simplelongform_stored_meta['meta-font_title'][0], 'select-eighteen' ); ?>><?php _e( 'Montserrat Alternate, sans-serif', 'simplelongform' )?></option>
	</select>
	</p>		
	
	<p>		
	<label for="meta-font-size" class="simplelongform-font-size"><?php _e( 'Taille du texte', 'simplelongform' )?></label>		
	<br/>
	<select name="meta-font-size" id="meta-font-size">
		<option value="select-one" <?php if ( isset ( $simplelongform_stored_meta['meta-font-size'] ) ) selected( $simplelongform_stored_meta['meta-font-size'][0], 'select-one' ); ?>><?php _e( 'Medium', 'simplelongform' )?></option>
		<option value="select-two" <?php if ( isset ( $simplelongform_stored_meta['meta-font-size'] ) ) selected( $simplelongform_stored_meta['meta-font-size'][0], 'select-two' ); ?>><?php _e( 'Large', 'simplelongform' )?></option>			
		<option value="select-three" <?php if ( isset ( $simplelongform_stored_meta['meta-font-size'] ) ) selected( $simplelongform_stored_meta['meta-font-size'][0], 'select-three' ); ?>><?php _e( 'Small', 'simplelongform' )?></option>			
	</select>	
	</p>
	<p>		
	<label for="meta-col" class="simplelongform-col"><?php _e( 'Largeur de la colonne centrale', 'simplelongform' )?></label>
	<br/>		
	<select name="meta-col" id="meta-col">			
		<option value="select-one" <?php if ( isset ( $simplelongform_stored_meta['meta-col'] ) ) selected( $simplelongform_stored_meta['meta-col'][0], 'select-one' ); ?>><?php _e( 'Medium', 'simplelongform' )?></option>			
		<option value="select-two" <?php if ( isset ( $simplelongform_stored_meta['meta-col'] ) ) selected( $simplelongform_stored_meta['meta-col'][0], 'select-two' ); ?>><?php _e( 'Large', 'simplelongform' )?></option>			
		<option value="select-three" <?php if ( isset ( $simplelongform_stored_meta['meta-col'] ) ) selected( $simplelongform_stored_meta['meta-col'][0], 'select-three' ); ?>><?php _e( 'Small', 'simplelongform' )?></option>			
	</select>	
	</p>
		<p>
	<label for="quote-design" class="quote-design"><?php _e( 'Style des blocs de citation', 'simplelongform' )?></label>			
	<select name="quote-design" id="quote-design">				
		<option value="select-one" <?php if ( isset ( $simplelongform_stored_meta['quote-design'] ) ) selected( $simplelongform_stored_meta['quote-design'][0], 'select-one' ); ?>><?php _e( 'Bordure gauche', 'simplelongform' )?></option>				
		<option value="select-two" <?php if ( isset ( $simplelongform_stored_meta['quote-design'] ) ) selected( $simplelongform_stored_meta['quote-design'][0], 'select-two' ); ?>><?php _e( 'Bordure droite', 'simplelongform' )?></option>				
		<option value="select-three" <?php if ( isset ( $simplelongform_stored_meta['quote-design'] ) ) selected( $simplelongform_stored_meta['quote-design'][0], 'select-three' ); ?>><?php _e( 'Bordure inférieure', 'simplelongform' )?></option>					
		<option value="select-five" <?php if ( isset ( $simplelongform_stored_meta['quote-design'] ) ) selected( $simplelongform_stored_meta['quote-design'][0], 'select-five' ); ?>><?php _e( 'Entre guillements (pas de bordure)', 'simplelongform' )?></option>				
	</select>	
	</p>			
	
	<p>		
	<label for="quote" class="quote"><?php _e( 'Bordure des blocs de citation', 'simplelongform' )?></label>		
	<select name="quote" id="quote">				
		<option value="select-one" <?php if ( isset ( $simplelongform_stored_meta['quote'] ) ) selected( $simplelongform_stored_meta['quote'][0], 'select-one' ); ?>><?php _e( 'Couleur du thème', 'simplelongform' )?></option>				
		<option value="select-two" <?php if ( isset ( $simplelongform_stored_meta['quote'] ) ) selected( $simplelongform_stored_meta['quote'][0], 'select-two' ); ?>><?php _e( 'Couleur du thème pointillé', 'simplelongform' )?></option>				
		<option value="select-three" <?php if ( isset ( $simplelongform_stored_meta['quote'] ) ) selected( $simplelongform_stored_meta['quote'][0], 'select-three' ); ?>><?php _e( 'Gris clair', 'simplelongform' )?></option>					
		<option value="select-four" <?php if ( isset ( $simplelongform_stored_meta['quote'] ) ) selected( $simplelongform_stored_meta['quote'][0], 'select-four' ); ?>><?php _e( 'Gris clair pointillé', 'simplelongform' )?></option>					
	</select>	
	</p>
</div>

<div id="tab2" class="ui-sortable meta-box-sortables" style="display:none;">		 
	<div id="introt" style="background:#F7F7F8;">
		
		<h3 class="slftxt"><?php _e('Chargement de la page', 'simplelongform');?></h3>
		<p>
		<label for="load-auteur" class="load-auteur"><?php _e( 'Afficher le nom de l\'auteur', 'simplelongform' )?></label>		
			<select name="load-auteur" id="load-auteur">				
				<option value="select-one" <?php if ( isset ( $simplelongform_stored_meta['load-auteur'] ) ) selected( $simplelongform_stored_meta['load-auteur'][0], 'select-one' ); ?>><?php _e( 'Oui', 'simplelongform' )?></option>				
				<option value="select-two" <?php if ( isset ( $simplelongform_stored_meta['load-auteur'] ) ) selected( $simplelongform_stored_meta['load-auteur'][0], 'select-two' ); ?>><?php _e( 'Non', 'simplelongform' )?></option>				
			</select>
		</p>				
		
		<p>			
		<label for="meta-loader-animate" class="simplelongform-loader-animate"><?php _e('Effet de disparition du loader', 'simplelongform' ); ?></label>			
		<br/>			
		<select name="meta-loader-animate" id="meta-loader-animate">				
			<option value="select-one" <?php if ( isset ( $simplelongform_stored_meta['meta-loader-animate'] ) ) selected( $simplelongform_stored_meta['meta-loader-animate'][0], 'select-one' ); ?>><?php _e( 'Fondu', 'simplelongform' )?></option>				
			<option value="select-two" <?php if ( isset ( $simplelongform_stored_meta['meta-loader-animate'] ) ) selected( $simplelongform_stored_meta['meta-loader-animate'][0], 'select-two' ); ?>><?php _e( 'Animation', 'simplelongform' )?></option>				
		</select>		
		</p>
		
	<p>
	<label for="meta-animate" class="simplelongform-animate"><?php _e( 'Effet d\'intro', 'simplelongform' )?></label>			
	<br/>			
	<select name="meta-animate" id="meta-animate">				
		<option value="select-one" <?php if ( isset ( $simplelongform_stored_meta['meta-animate'] ) ) selected( $simplelongform_stored_meta['meta-animate'][0], 'select-one' ); ?>><?php _e( 'Jump', 'simplelongform' )?></option>				
		<option value="select-two" <?php if ( isset ( $simplelongform_stored_meta['meta-animate'] ) ) selected( $simplelongform_stored_meta['meta-animate'][0], 'select-two' ); ?>><?php _e( 'Push', 'simplelongform' )?></option>				
	</select>
	</p>		 
	
	<p>			
	<label for="meta-trigger" class="simplelongform-trigger"><?php _e( 'Bouton "trigger"', 'simplelongform' )?></label>			
		<br/>			
	<select name="meta-trigger" id="meta-trigger">					
		<option value="select-three" <?php if ( isset ( $simplelongform_stored_meta['meta-trigger'] ) ) selected( $simplelongform_stored_meta['meta-trigger'][0], 'select-three' ); ?>><?php _e( 'Flèche (small)', 'simplelongform' )?></option>
		<option value="select-four" <?php if ( isset ( $simplelongform_stored_meta['meta-trigger'] ) ) selected( $simplelongform_stored_meta['meta-trigger'][0], 'select-four' ); ?>><?php _e( 'Flèche (small) avec bordure', 'simplelongform' )?></option>
		<option value="select-two" <?php if ( isset ( $simplelongform_stored_meta['meta-trigger'] ) ) selected( $simplelongform_stored_meta['meta-trigger'][0], 'select-two' ); ?>><?php _e( 'Flèche (medium)', 'simplelongform' )?></option>
		<option value="select-five" <?php if ( isset ( $simplelongform_stored_meta['meta-trigger'] ) ) selected( $simplelongform_stored_meta['meta-trigger'][0], 'select-five' ); ?>><?php _e( 'Flèche (medium) avec bordure', 'simplelongform' )?></option>
		<option value="select-six" <?php if ( isset ( $simplelongform_stored_meta['meta-trigger'] ) ) selected( $simplelongform_stored_meta['meta-trigger'][0], 'select-six' ); ?>><?php _e( 'Flèche (full)', 'simplelongform' )?></option>
				
	</select>		
	</p>					
	</div>	
	
	<p>
		<label for="meta-bar" class="meta-bar"><?php _e( 'Position de la barre de progression', 'simplelongform' )?></label>		
		<br/>
		<select name="meta-bar" id="meta-bar">
			<option value="select-one" <?php if ( isset ( $simplelongform_stored_meta['meta-bar'] ) ) selected( $simplelongform_stored_meta['meta-bar'][0], 'select-one' ); ?>><?php _e( 'Haut de page', 'simplelongform' )?></option>
			<option value="select-two" <?php if ( isset ( $simplelongform_stored_meta['meta-bar'] ) ) selected( $simplelongform_stored_meta['meta-bar'][0], 'select-two' ); ?>><?php _e( 'Bas de page', 'simplelongform' )?></option>			
			<option value="select-three" <?php if ( isset ( $simplelongform_stored_meta['meta-bar'] ) ) selected( $simplelongform_stored_meta['meta-bar'][0], 'select-three' ); ?>><?php _e( 'Pas de barre de défilement', 'simplelongform' )?></option>			
		</select>
	</p>
	
</div>	
	
<div id="tab3" class="ui-sortable meta-box-sortables" style="display:none;">		
	
	<div id="bar" style="background:#F7F7F8;">
	<h3 class="slftxt"><?php _e('Barre de navigation fixe', 'simplelongform');?></h3>	
	<p>
		<label for="bar-sup" class="bar-sup"><?php _e( 'Position', 'simplelongform' )?></label>		
		<br/>
		<select name="bar-sup" id="bar-sup">
			<option value="select-one" <?php if ( isset ( $simplelongform_stored_meta['bar-sup'] ) ) selected( $simplelongform_stored_meta['bar-sup'][0], 'select-one' ); ?>><?php _e( 'Haut de page', 'simplelongform' )?></option>
			<option value="select-two" <?php if ( isset ( $simplelongform_stored_meta['bar-sup'] ) ) selected( $simplelongform_stored_meta['bar-sup'][0], 'select-two' ); ?>><?php _e( 'Bas de page', 'simplelongform' )?></option>			
		</select>
	</p>
	<p>	
	<label for="top-bar" class="top-bar"><?php _e( 'Couleur d\'arrière-plan', 'simplelongform' )?></label>		
	<select name="top-bar" id="top-bar">				
		<option value="select-one" <?php if ( isset ( $simplelongform_stored_meta['top-bar'] ) ) selected( $simplelongform_stored_meta['top-bar'][0], 'select-one' ); ?>><?php _e( 'Couleur du thème', 'simplelongform' )?></option>				
		<option value="select-two" <?php if ( isset ( $simplelongform_stored_meta['top-bar'] ) ) selected( $simplelongform_stored_meta['top-bar'][0], 'select-two' ); ?>><?php _e( 'Blanc', 'simplelongform' )?></option>				
		<option value="select-three" <?php if ( isset ( $simplelongform_stored_meta['top-bar'] ) ) selected( $simplelongform_stored_meta['top-bar'][0], 'select-three' ); ?>><?php _e( 'Noir', 'simplelongform' )?></option>			
	</select>	
	</p>		
	
	<p>	
		<label for="shadow" class="shadow"><?php _e( 'Ajouter un effet d\'ombrage', 'simplelongform' )?></label>		
		<select name="shadow" id="shadow">				
			<option value="select-one" <?php if ( isset ( $simplelongform_stored_meta['shadow'] ) ) selected( $simplelongform_stored_meta['shadow'][0], 'select-one' ); ?>><?php _e( 'Non', 'simplelongform' )?></option>				
			<option value="select-two" <?php if ( isset ( $simplelongform_stored_meta['shadow'] ) ) selected( $simplelongform_stored_meta['shadow'][0], 'select-two' ); ?>><?php _e( 'Oui', 'simplelongform' )?></option>				
		</select>
	</p>
	
	<p>	
	<label for="reseaux" class="reseaux"><?php _e( 'Icônes réseaux sociaux', 'simplelongform' )?></label>		
		<select name="reseaux" id="reseaux">				
			<option value="select-one" <?php if ( isset ( $simplelongform_stored_meta['reseaux'] ) ) selected( $simplelongform_stored_meta['reseaux'][0], 'select-one' ); ?>><?php _e( 'Couleur du thème (positif)', 'simplelongform' )?></option>				
			<option value="select-two" <?php if ( isset ( $simplelongform_stored_meta['reseaux'] ) ) selected( $simplelongform_stored_meta['reseaux'][0], 'select-two' ); ?>><?php _e( 'Couleur du thème (négatif)', 'simplelongform' )?></option>				
			<option value="select-three" <?php if ( isset ( $simplelongform_stored_meta['reseaux'] ) ) selected( $simplelongform_stored_meta['reseaux'][0], 'select-three' ); ?>><?php _e( 'Couleurs originales', 'simplelongform' )?></option>			
			<option value="select-four" <?php if ( isset ( $simplelongform_stored_meta['reseaux'] ) ) selected( $simplelongform_stored_meta['reseaux'][0], 'select-four' ); ?>><?php _e( 'Blanc', 'simplelongform' )?></option>			
		</select>	
	</p>

	<p>
		<label for="bar-title" class="bar-title"><?php _e( 'Afficher le titre du longform', 'simplelongform' )?></label>		
		<br/>
		<select name="bar-title" id="bar-title">
			<option value="select-one" <?php if ( isset ( $simplelongform_stored_meta['bar-title'] ) ) selected( $simplelongform_stored_meta['bar-title'][0], 'select-one' ); ?>><?php _e( 'Oui', 'simplelongform' )?></option>
			<option value="select-two" <?php if ( isset ( $simplelongform_stored_meta['bar-title'] ) ) selected( $simplelongform_stored_meta['bar-title'][0], 'select-two' ); ?>><?php _e( 'Non', 'simplelongform' )?></option>			
		</select>
	</p>

	<p>
		<label for="bar-title-site" class="bar-title-site"><?php _e( 'Afficher le titre du site web', 'simplelongform' )?></label>		
		<br/>
		<select name="bar-title-site" id="bar-title-site">
			<option value="select-one" <?php if ( isset ( $simplelongform_stored_meta['bar-title-site'] ) ) selected( $simplelongform_stored_meta['bar-title-site'][0], 'select-one' ); ?>><?php _e( 'Oui', 'simplelongform' )?></option>
			<option value="select-two" <?php if ( isset ( $simplelongform_stored_meta['bar-title-site'] ) ) selected( $simplelongform_stored_meta['bar-title-site'][0], 'select-two' ); ?>><?php _e( 'Non', 'simplelongform' )?></option>			
		</select>
	</p>	
	</div>
	<h3><?php _e('Navigation intrapage', 'simplelongform');?></h3>
	
	<p>	
		<label for="burger" class="burger"><?php _e( 'Type de navigation', 'simplelongform' )?></label>		
		<select name="burger" id="burger">				
			<option value="select-one" <?php if ( isset ( $simplelongform_stored_meta['burger'] ) ) selected( $simplelongform_stored_meta['burger'][0], 'select-one' ); ?>><?php _e( 'Titres des sections (menu latérail)', 'simplelongform' )?></option>				
			<option value="select-two" <?php if ( isset ( $simplelongform_stored_meta['burger'] ) ) selected( $simplelongform_stored_meta['burger'][0], 'select-two' ); ?>><?php _e( 'Cercles (menu horizontal)', 'simplelongform' )?></option>
			<option value="select-three" <?php if ( isset ( $simplelongform_stored_meta['burger'] ) ) selected( $simplelongform_stored_meta['burger'][0], 'select-three' ); ?>><?php _e( 'Pas de navigation intrapage', 'simplelongform' )?></option>			
		</select>	
	</p>
	
	<p>
		<label for="burger-style" class="burger-style"><?php _e( 'Style du burger (si navigation intrapage)', 'simplelongform' )?></label>		
		<br/>
		<select name="burger-style" id="burger-style">
			<option value="select-one" <?php if ( isset ( $simplelongform_stored_meta['burger-style'] ) ) selected( $simplelongform_stored_meta['burger-style'][0], 'select-one' ); ?>><?php _e( 'Avec bordure', 'simplelongform' )?></option>
			<option value="select-two" <?php if ( isset ( $simplelongform_stored_meta['burger-style'] ) ) selected( $simplelongform_stored_meta['burger-style'][0], 'select-two' ); ?>><?php _e( 'Sans bordure', 'simplelongform' )?></option>			
		</select>
	</p>
	
	<p>		
		<label for="intra-color" class="simplelongform-color"><?php _e( 'Couleur de fond', 'simplelongform' )?></label>		
		<br/>		
		<input name="intra-color" class="meta-color" type="text" value="<?php if ( isset ( $simplelongform_stored_meta['intra-color'] ) ) { echo $simplelongform_stored_meta['intra-color'][0]; } else { ?>#EFEFEF<?php } ?>" class="intra-color" />	
	</p>
	
	<p>		
		<label for="intra-text-color" class="simplelongform-color"><?php _e( 'Couleur des liens', 'simplelongform' )?></label>		
		<br/>		
		<input name="intra-text-color" class="meta-color" type="text" value="<?php if ( isset ( $simplelongform_stored_meta['intra-text-color'] ) ) { echo $simplelongform_stored_meta['intra-text-color'][0]; } else { ?>#228FAE<?php } ?>" class="intra-text-color" />	
	</p>
	
	</div>
</div>
	<?php
}

function simplelongform_meta_save( $post_id ) {     
$is_autosave = wp_is_post_autosave( $post_id );    
$is_revision = wp_is_post_revision( $post_id );    
$is_valid_nonce = ( isset( $_POST[ 'slf_nonce' ] ) && wp_verify_nonce( $_POST[ 'slf_nonce' ], basename( __FILE__ ) ) ) ? 'true' : 'false';
    if ( $is_autosave || $is_revision || !$is_valid_nonce ) {
        return;
    }	
		if( isset( $_POST[ 'body-color' ] ) ) {
			update_post_meta( $post_id, 'body-color', sanitize_text_field($_POST[ 'body-color' ]) );
		} if( isset( $_POST[ 'meta-font' ] ) ) {
			update_post_meta( $post_id, 'meta-font', sanitize_text_field($_POST[ 'meta-font' ]) );
		} if( isset( $_POST[ 'meta-font_title' ] ) ) {
			update_post_meta( $post_id, 'meta-font_title', sanitize_text_field($_POST[ 'meta-font_title' ]) );
		} if( isset( $_POST[ 'meta-color' ] ) ) {
			update_post_meta( $post_id, 'meta-color', sanitize_text_field($_POST[ 'meta-color' ]) );
		}	if( isset( $_POST[ 'meta-text-color' ] ) ) {
			update_post_meta( $post_id, 'meta-text-color', sanitize_text_field($_POST[ 'meta-text-color' ]) );
		} if( isset( $_POST[ 'meta-col' ] ) ) {			
			update_post_meta( $post_id, 'meta-col', sanitize_text_field($_POST[ 'meta-col' ]) );		
		} if( isset( $_POST[ 'shadow' ] ) ) {			
			update_post_meta( $post_id, 'shadow', sanitize_text_field($_POST[ 'shadow' ]) );
		} if( isset( $_POST[ 'meta-font-size' ] ) ) {			
			update_post_meta( $post_id, 'meta-font-size', sanitize_text_field($_POST[ 'meta-font-size' ]) );		
		}	if( isset( $_POST[ 'meta-bar' ] ) ) {			
			update_post_meta( $post_id, 'meta-bar', sanitize_text_field($_POST[ 'meta-bar' ]) );		
		}	if( isset( $_POST[ 'meta-animate' ] ) ) {			
			update_post_meta( $post_id, 'meta-animate', sanitize_text_field($_POST[ 'meta-animate' ]) );		
		}	if( isset( $_POST[ 'meta-loader' ] ) ) {			
			update_post_meta( $post_id, 'meta-loader', sanitize_text_field($_POST[ 'meta-loader' ]) );		
		}	if( isset( $_POST[ 'meta-loader-animate' ] ) ) {			
			update_post_meta( $post_id, 'meta-loader-animate', sanitize_text_field($_POST[ 'meta-loader-animate' ]) );		
		}	if( isset( $_POST[ 'meta-trigger' ] ) ) {			
			update_post_meta( $post_id, 'meta-trigger', sanitize_text_field($_POST[ 'meta-trigger' ]) );		
		}	if( isset( $_POST[ 'trigger-text' ] ) ) {			
			update_post_meta( $post_id, 'trigger-text', sanitize_text_field($_POST[ 'trigger-text' ]) );		
		}	if( isset( $_POST[ 'load-auteur' ] ) ) {			
			update_post_meta( $post_id, 'load-auteur', sanitize_text_field($_POST[ 'load-auteur' ]) );		
		}	if( isset( $_POST[ 'top-bar' ] ) ) {			
			update_post_meta( $post_id, 'top-bar', sanitize_text_field($_POST[ 'top-bar' ]) );		
		}	if( isset( $_POST[ 'bar-sup' ] ) ) {			
			update_post_meta( $post_id, 'bar-sup', sanitize_text_field($_POST[ 'bar-sup' ]) );		
		}	if( isset( $_POST[ 'bar-title' ] ) ) {			
			update_post_meta( $post_id, 'bar-title', sanitize_text_field($_POST[ 'bar-title' ]) );
		}	if( isset( $_POST[ 'bar-title-site' ] ) ) {			
			update_post_meta( $post_id, 'bar-title-site', sanitize_text_field($_POST[ 'bar-title-site' ]) );
		}   if( isset( $_POST[ 'reseaux' ] ) ) {			
			update_post_meta( $post_id, 'reseaux', sanitize_text_field($_POST[ 'reseaux' ]) );		
		}	if( isset( $_POST[ 'quote' ] ) ) {			
			update_post_meta( $post_id, 'quote', sanitize_text_field($_POST[ 'quote' ]) );		
		}	if( isset( $_POST[ 'quote-design' ] ) ) {			
			update_post_meta( $post_id, 'quote-design', sanitize_text_field($_POST[ 'quote-design' ]) );		
		}	if( isset( $_POST[ 'burger' ] ) ) {			
			update_post_meta( $post_id, 'burger', sanitize_text_field($_POST[ 'burger' ]) );		
		}	if( isset( $_POST[ 'burger-style' ] ) ) {			
			update_post_meta( $post_id, 'burger-style', sanitize_text_field($_POST[ 'burger-style' ]) );		
		}	if( isset( $_POST[ 'intra-color' ] ) ) {			
			update_post_meta( $post_id, 'intra-color', sanitize_text_field($_POST[ 'intra-color' ]) );		
		}	if( isset( $_POST[ 'intra-text-color' ] ) ) {			
			update_post_meta( $post_id, 'intra-text-color', sanitize_text_field($_POST[ 'intra-text-color' ]) );		
		}
}
add_action( 'save_post', 'simplelongform_meta_save' );
//Sections
function slf_add_custom_box() {
	global $typenow;
		if( $typenow == 'longform' ) {
		  add_meta_box( 'wp_editor_chapo', __('Intro','simplelongform'), 'wp_editor_chapo' );
		  add_meta_box( 'wp_editor_section_1', __('Section 1','simplelongform'), 'wp_editor_meta_box' );
		  add_meta_box( 'wp_editor_section_2', __('Section 2','simplelongform'), 'wp_editor_meta_box_2' );
		  add_meta_box( 'wp_editor_section_3', __('Section 3','simplelongform'), 'wp_editor_meta_box_3' );
		  add_meta_box( 'wp_editor_section_4', __('Section 4','simplelongform'), 'wp_editor_meta_box_4' );
		  add_meta_box( 'wp_editor_section_5', __('Section 5','simplelongform'), 'wp_editor_meta_box_5' );		  
		  add_meta_box( 'wp_editor_section_6', __('Section 6','simplelongform'), 'wp_editor_meta_box_6' );		  
		  add_meta_box( 'wp_editor_section_7', __('Section 7','simplelongform'), 'wp_editor_meta_box_7' );
		  add_meta_box( 'wp_editor_footer', __('Footer','simplelongform'), 'wp_editor_footer' );	
		}
}
add_action( 'add_meta_boxes', 'slf_add_custom_box' );

//Chapo
function wp_editor_chapo( $post ) {wp_nonce_field( plugin_basename( __FILE__ ), 'slf_nonce' );$simplelongform_stored_meta = get_post_meta( $post->ID );
?>
    <p>
        <label for="meta-auteur" class="simplelongform-auteur"><?php _e( 'Auteur(s)', 'simplelongform' )?></label>
        <input type="text" name="meta-auteur" class="meta-text-title" id="meta-auteur" value="<?php if ( isset ( $simplelongform_stored_meta['meta-auteur'] ) ) echo $simplelongform_stored_meta['meta-auteur'][0]; ?>" />
    </p>
	<p>
        <label for="meta-photos" class="simplelongform-photos"><?php _e( 'Auteur(s) des photos', 'simplelongform' )?></label>
        <input type="text" name="meta-photos" class="meta-text-title" id="meta-photos" value="<?php if ( isset ( $simplelongform_stored_meta['meta-photos'] ) ) echo $simplelongform_stored_meta['meta-photos'][0]; ?>" />
    </p>
	<p>
        <label for="meta-subline" class="simplelongform-subline"><?php _e( 'Sous-titre', 'simplelongform' )?></label>
        <textarea type="text" name="meta-subline" class="meta-text-title" id="meta_subline" /><?php if ( isset ( $simplelongform_stored_meta['meta-subline'] ) ) echo $simplelongform_stored_meta['meta-subline'][0]; ?></textarea>
    </p>
	<p>
		<label for="section_title_align" class="simplelongform-font_title"><?php _e( 'Alignement du titre uniquement si image ou vidéo en background', 'simplelongform' )?></label>
		<br/>
			<select name="section_title_align" id="section_title_align" class="options">
				<option value="select-one" <?php if ( isset ( $simplelongform_stored_meta['section_title_align'] ) ) selected( $simplelongform_stored_meta['section_title_align'][0], 'select-one' ); ?>><?php _e( 'Centré',  'simplelongform' )?></option>
				<option value="select-two" <?php if ( isset ( $simplelongform_stored_meta['section_title_align'] ) ) selected( $simplelongform_stored_meta['section_title_align'][0], 'select-two' ); ?>><?php _e( 'Gauche', 'simplelongform' )?></option>				
				<option value="select-three" <?php if ( isset ( $simplelongform_stored_meta['section_title_align'] ) ) selected( $simplelongform_stored_meta['section_title_align'][0], 'select-three' ); ?>><?php _e( 'Droite', 'simplelongform' )?></option>				
			</select>
	</p>
	<p>
		<label for="section_title_color" class="simplelongform-font_title"><?php _e( 'Couleur du titre', 'simplelongform' )?></label>
		<br/>
			<select name="section_title_color" id="section_title_color" class="options">
				<option value="select-one" <?php if ( isset ( $simplelongform_stored_meta['section_title_color'] ) ) selected( $simplelongform_stored_meta['section_title_color'][0], 'select-one' ); ?>><?php _e( 'Blanc',  'simplelongform' )?></option>
				<option value="select-two" <?php if ( isset ( $simplelongform_stored_meta['section_title_color'] ) ) selected( $simplelongform_stored_meta['section_title_color'][0], 'select-two' ); ?>><?php _e( 'Noir', 'simplelongform' )?></option>				
				<option value="select-three" <?php if ( isset ( $simplelongform_stored_meta['section_title_color'] ) ) selected( $simplelongform_stored_meta['section_title_color'][0], 'select-three' ); ?>><?php _e( 'Blanc sur couleur du thème', 'simplelongform' )?></option>
			</select>
	</p>
	<p>
	<label for="meta-date" class="simplelongform-date"><?php _e( 'Afficher la date', 'simplelongform' )?></label>			
	<br/>			
	<select name="meta-date" id="meta-date">				
		<option value="select-one" <?php if ( isset ( $simplelongform_stored_meta['meta-date'] ) ) selected( $simplelongform_stored_meta['meta-date'][0], 'select-one' ); ?>><?php _e( 'Oui', 'simplelongform' )?></option>				
		<option value="select-two" <?php if ( isset ( $simplelongform_stored_meta['meta-date'] ) ) selected( $simplelongform_stored_meta['meta-date'][0], 'select-two' ); ?>><?php _e( 'Non', 'simplelongform' )?></option>				
	</select>
	</p>
	<p>
		<label for="meta-image" class="simplelongform-title"><?php _e( 'Image de fond (intro)', 'simplelongform' )?></label>
		<br/>
			<input type="text" class="meta-image" name="meta-image" id="meta-image" value="<?php if ( isset ( $simplelongform_stored_meta['meta-image'] ) ) : $topimg = $simplelongform_stored_meta['meta-image'][0]; echo $topimg; endif; ?>" />
			<input type="button" id="meta-image-button" class="button-slf" value="<?php _e( 'Choisir votre image', 'simplelongform' )?>" />
		<br/>			
			
			<?php if( !empty( $topimg ) ): ?>			
				<div class="img-slf" id="img-slf">
					<img src="<?php echo $topimg; ?>" id="imgtop" />
						<p class="remove_img" id="remove_img_intro">
							<a title="<?php _e('Supprimer', 'simplelongform'); ?>" href="javascript:;" id="remove-footer-thumbnail"><?php _e('Supprimer l\'image', 'simplelongform'); ?></a>
						</p>			
				</div>
			<?php endif; ?>
	</p>
	<p>
		<label for="meta-video" class="simplelongform-video"><?php _e( 'OU video en fond d\'écran (copier-coller votre code embed)', 'simplelongform' )?></label>
		<br/>
		<input type="text" class="meta-text-title" name="meta-video" id="meta-video" value="<?php if ( isset ( $simplelongform_stored_meta['meta-video'] ) ) echo $simplelongform_stored_meta['meta-video'][0]; ?>" />
	</p>
	<hr />
	<h2 class="title-content"><?php _e('Ajouter le contenu (chapeau)', 'simplelongform'); ?></h2>	
	<?php 
	
	$field_value = get_post_meta( $post->ID, '_wp_editor_chapo', false );
	
	if ( $field_value == false ) :
		wp_editor( ' ', '_wp_editor_chapo' );
	else :
		wp_editor( $field_value[0], '_wp_editor_chapo' ); 
	endif;
	?>
	
	<h2 class="title-content"><?php _e('Ajouter du texte (optionnel)', 'simplelongform'); ?></h2>
	<?php	  
	$field_value = get_post_meta( $post->ID, '_wp_editor_text', false );	  
	
	if ( $field_value == false ) :
		wp_editor( ' ', '_wp_editor_text' );
	else :
		wp_editor( $field_value[0], '_wp_editor_text' ); 
	endif;	  
	
	$post1 = get_post_meta( get_the_ID(), '_wp_editor_section_1', true ); 
	$post2 = get_post_meta( get_the_ID(), 'meta-title_1', true ); 
	$post3 = get_post_meta( get_the_ID(), 'meta-image_1', true ); 
	$post3b = get_post_meta( get_the_ID(), 'meta-video_1', true ); 
		if( !empty( $post1 ) || !empty( $post2) || !empty( $post3 ) || !empty( $post3b ) ) : ?> 
			<style>
			#wp_editor_section_1{display:block;}
			#add1{display:none;}
			</style>
		<?php else: ?>
			<div id="add1" class="add"> 
				<?php _e( 'Ajouter une nouvelle section +', 'simplelongform' )?>
			</div>
	<?php endif;
}
function simplelongform_save_postdata_intro( $post_id ) {
	$is_autosave = wp_is_post_autosave( $post_id );
    $is_revision = wp_is_post_revision( $post_id );
    $is_valid_nonce = ( isset( $_POST[ 'slf_nonce' ] ) && wp_verify_nonce( $_POST[ 'slf_nonce' ], basename( __FILE__ ) ) ) ? 'true' : 'false';
    if ( $is_autosave || $is_revision || !$is_valid_nonce ) {        return;    }
		$meta_subline = '';
		if( isset( $_POST[ 'meta-subline' ] ) ) {			
			$meta_subline = update_post_meta( $post_id, 'meta-subline', sanitize_text_field($_POST[ 'meta-subline' ]) );
		}
		$meta_auteur = '';
		if( isset( $_POST[ 'meta-auteur' ] ) ) {			
			$meta_auteur = update_post_meta( $post_id, 'meta-auteur', sanitize_text_field($_POST[ 'meta-auteur' ]) );		}		
		$meta_photos = '';
		if( isset( $_POST[ 'meta-photos' ] ) ) {
			$meta_photos = update_post_meta( $post_id, 'meta-photos', sanitize_text_field($_POST[ 'meta-photos' ]) );
		}
		$meta_image = '';
		if( isset( $_POST[ 'meta-image' ] ) ) {
			$meta_image = update_post_meta( $post_id, 'meta-image', sanitize_text_field($_POST[ 'meta-image' ]) );
		}
		 if( isset( $_POST[ 'meta-video' ] ) ) {
			update_post_meta( $post_id, 'meta-video', sanitize_text_field(htmlentities(stripslashes($_POST[ 'meta-video' ])) ));
		}
		if( isset( $_POST[ 'meta-date' ] ) ) {
			update_post_meta( $post_id, 'meta-date', sanitize_text_field($_POST[ 'meta-date' ]) );
		}
		if( isset( $_POST[ 'section_title_color' ] ) ) {			
			update_post_meta( $post_id, 'section_title_color', sanitize_text_field($_POST[ 'section_title_color' ]) );		
		}
		if( isset( $_POST[ 'section_title_align' ] ) ) {			
			update_post_meta( $post_id, 'section_title_align', sanitize_text_field($_POST[ 'section_title_align' ]) );		
			}   		
		$meta_chapo = '';
		if ( isset ( $_POST['_wp_editor_chapo'] ) ) {		
			$meta_chapo = update_post_meta( $post_id, '_wp_editor_chapo', $_POST['_wp_editor_chapo'] );	 
		}
		if ( isset ( $_POST['_wp_editor_text'] ) ) {		
			update_post_meta( $post_id, '_wp_editor_text', $_POST['_wp_editor_text'] );	 
		}
}
add_action( 'save_post', 'simplelongform_save_postdata_intro' );
//Section 1
function wp_editor_meta_box( $post ) { 
	wp_nonce_field( basename( __FILE__ ), 'slf_nonce' );
    $simplelongform_stored_meta = get_post_meta( $post->ID );	
	?>		
	<p>
        <label for="meta-title_1" class="simplelongform-title"><?php _e( 'Titre de la section', 'simplelongform' )?></label>
        <input type="text" name="meta-title_1" id="meta-text-title1" class="meta-text-title" value="<?php if ( isset ( $simplelongform_stored_meta['meta-title_1'] ) ) echo $simplelongform_stored_meta['meta-title_1'][0]; ?>" />
    </p>
	<p>
        <label for="meta-align_1" class="simplelongform-align"><?php _e( 'Alignement du titre', 'simplelongform' )?></label>
        <br/>
		<select name="section1_title_align" id="section1_title_align" class="options">
			<option value="select-one" <?php if ( isset ( $simplelongform_stored_meta['section1_title_align'] ) ) selected( $simplelongform_stored_meta['section1_title_align'][0], 'select-one' ); ?>><?php _e( 'Gauche',  'simplelongform' )?></option>
			<option value="select-two" <?php if ( isset ( $simplelongform_stored_meta['section1_title_align'] ) ) selected( $simplelongform_stored_meta['section1_title_align'][0], 'select-two' ); ?>><?php _e( 'Centre', 'simplelongform' )?></option>
			<option value="select-three" <?php if ( isset ( $simplelongform_stored_meta['section1_title_align'] ) ) selected( $simplelongform_stored_meta['section1_title_align'][0], 'select-three' ); ?>><?php _e( 'Droite', 'simplelongform' )?></option>
		</select>
	</p>
	<p>
		<label for="section1_title_color" class="simplelongform-font_title"><?php _e( 'Couleur du titre', 'simplelongform' )?></label>
		<br/>
		<select name="section1_title_color" id="section1_title_color" class="options">
			<option value="select-one" <?php if ( isset ( $simplelongform_stored_meta['section1_title_color'] ) ) selected( $simplelongform_stored_meta['section1_title_color'][0], 'select-one' ); ?>><?php _e( 'Blanc',  'simplelongform' )?></option>
			<option value="select-two" <?php if ( isset ( $simplelongform_stored_meta['section1_title_color'] ) ) selected( $simplelongform_stored_meta['section1_title_color'][0], 'select-two' ); ?>><?php _e( 'Noir', 'simplelongform' )?></option>
			<option value="select-three" <?php if ( isset ( $simplelongform_stored_meta['section_title_color'] ) ) selected( $simplelongform_stored_meta['section1_title_color'][0], 'select-three' ); ?>><?php _e( 'Blanc sur couleur du thème', 'simplelongform' )?></option>
		</select>
	</p>
	<p>
		<label for="meta-image_1" class="simplelongform-title"><?php _e( 'Image de fond (intro de la section)', 'simplelongform' )?></label>
		<br/>
			<input type="text" class="meta-image" name="meta-image_1" id="meta-image_1" value="<?php if ( isset ( $simplelongform_stored_meta['meta-image_1'] ) ) : $topimg_1 = $simplelongform_stored_meta['meta-image_1'][0]; echo $topimg_1; endif; ?>" />
			<input type="button" id="meta-image-button_1" class="button-slf" value="<?php _e( 'Choisir votre image', 'simplelongform' )?>" />
		<br/>			
			
			<?php if( !empty( $topimg_1 ) ): ?>			
				<div class="img-slf" id="img-slf_1">
					<img src="<?php echo $topimg_1; ?>" id="imgtop1" />
						<p class="remove_img" id="remove_img_1">
							<a title="<?php _e('Supprimer', 'simplelongform'); ?>" href="javascript:;" id="remove-footer-thumbnail"><?php _e('Supprimer l\'image', 'simplelongform'); ?></a>
						</p>			
				</div>
			<?php endif; ?>
	</p>
	<p>
        <label for="section1_caption" class="simplelongform-title"><?php _e( 'Légende de l\'image', 'simplelongform' )?></label>
        <input type="text" name="section1_caption" id="section1_caption" class="meta-text-title" value="<?php if ( isset ( $simplelongform_stored_meta['section1_caption'] ) ) echo $simplelongform_stored_meta['section1_caption'][0]; ?>" />
    </p>
	<p>
		<label for="meta-video_1" class="simplelongform-video"><?php _e( 'OU video en fond d\'écran (copier-coller votre code embed)', 'simplelongform' )?></label>
		<br/>
		<input type="text" style="width:100%;" class="meta-video_1" name="meta-video_1" id="meta-video_1" value="<?php if ( isset ( $simplelongform_stored_meta['meta-video_1'] ) ) echo $simplelongform_stored_meta['meta-video_1'][0]; ?>" />
	</p>
	<hr/>
	<h2 class="title-content"><?php _e('Ajouter le contenu', 'simplelongform'); ?></h2>
	<?php	
		$field_value = get_post_meta( $post->ID, '_wp_editor_section_1', false );
		
		if ( $field_value == false ) :
			wp_editor( ' ', '_wp_editor_section_1' );
		else :
			wp_editor( $field_value[0], '_wp_editor_section_1' ); 
		endif;
		
	$post4 = get_post_meta( get_the_ID(), '_wp_editor_section_2', true ); 
	$post5 = get_post_meta( get_the_ID(), 'meta-title_2', true ); 
	$post6 = get_post_meta( get_the_ID(), 'meta-image_2', true ); 
	$post6b = get_post_meta( get_the_ID(), 'meta-video_2', true ); 
		if( !empty( $post4 ) || !empty( $post5) || !empty( $post6 ) || !empty( $post6b ) ) : ?> 
			<style>
			#wp_editor_section_2{display:block;}
			#add2{display:none;}
			</style>
		<?php else: ?>
			<div id="add2" class="add"> 
				<?php _e( 'Ajouter une nouvelle section +', 'simplelongform' )?>
			</div>
	<?php endif;
}
function simplelongform_save_postdata_1( $post_id ) {
	$is_autosave = wp_is_post_autosave( $post_id );
    $is_revision = wp_is_post_revision( $post_id );
    $is_valid_nonce = ( isset( $_POST[ 'slf_nonce' ] ) && wp_verify_nonce( $_POST[ 'slf_nonce' ], basename( __FILE__ ) ) ) ? 'true' : 'false';
    if ( $is_autosave || $is_revision || !$is_valid_nonce ) {
        return;
    }
	  if( isset( $_POST[ 'meta-title_1' ] ) ) {
			update_post_meta( $post_id, 'meta-title_1', sanitize_text_field( $_POST[ 'meta-title_1' ] ) );
		}
		if( isset( $_POST[ 'section1_title_color' ] ) ) {
			update_post_meta( $post_id, 'section1_title_color', sanitize_text_field($_POST[ 'section1_title_color' ]) );
		}
		if( isset( $_POST[ 'section1_title_align' ] ) ) {
			update_post_meta( $post_id, 'section1_title_align', sanitize_text_field($_POST[ 'section1_title_align' ]) );
		}
	  if( isset( $_POST[ 'meta-image_1' ] ) ) {
		update_post_meta( $post_id, 'meta-image_1', sanitize_text_field($_POST[ 'meta-image_1' ]) );
	  }	  
	  if( isset( $_POST[ 'meta-video_1' ] ) ) {
			update_post_meta( $post_id, 'meta-video_1', sanitize_text_field(htmlentities(stripslashes($_POST[ 'meta-video_1' ])) ));
		}
	  if( isset( $_POST[ 'section1_caption' ] ) ) {
			update_post_meta( $post_id, 'section1_caption', sanitize_text_field( $_POST[ 'section1_caption' ] ) );
		}
	  if ( isset ( $_POST['_wp_editor_section_1'] ) ) {
		update_post_meta( $post_id, '_wp_editor_section_1', $_POST['_wp_editor_section_1'] );
	  }
}
add_action( 'save_post', 'simplelongform_save_postdata_1' );
//Section 2
function wp_editor_meta_box_2( $post ) { 
	wp_nonce_field( basename( __FILE__ ), 'slf_nonce' );
    $simplelongform_stored_meta = get_post_meta( $post->ID );
?> 
	<p>
        <label for="meta-title_2" class="simplelongform-title"><?php _e( 'Titre de la section', 'simplelongform' )?></label>
        <input type="text" name="meta-title_2" id="meta-text-title_2" class="meta-text-title" value="<?php if ( isset ( $simplelongform_stored_meta['meta-title_2'] ) ) echo $simplelongform_stored_meta['meta-title_2'][0]; ?>" />
    </p>
	<p>
        <label for="meta-align_2" class="simplelongform-align"><?php _e( 'Alignement du titre', 'simplelongform' )?></label>
        <br/>
			<select name="section2_title_align" id="section2_title_align" class="options">
				<option value="select-one" <?php if ( isset ( $simplelongform_stored_meta['section2_title_align'] ) ) selected( $simplelongform_stored_meta['section2_title_align'][0], 'select-one' ); ?>><?php _e( 'Gauche',  'simplelongform' )?></option>
				<option value="select-two" <?php if ( isset ( $simplelongform_stored_meta['section2_title_align'] ) ) selected( $simplelongform_stored_meta['section2_title_align'][0], 'select-two' ); ?>><?php _e( 'Centre', 'simplelongform' )?></option>
				<option value="select-three" <?php if ( isset ( $simplelongform_stored_meta['section2_title_align'] ) ) selected( $simplelongform_stored_meta['section2_title_align'][0], 'select-three' ); ?>><?php _e( 'Droite', 'simplelongform' )?></option>
			</select>
	</p>
	<p>
		<label for="section2_title_color" class="simplelongform-font_title"><?php _e( 'Couleur du titre', 'simplelongform' )?></label>
		<br/>
		<select name="section2_title_color" id="section2_title_color" class="options">
			<option value="select-one" <?php if ( isset ( $simplelongform_stored_meta['section2_title_color'] ) ) selected( $simplelongform_stored_meta['section2_title_color'][0], 'select-one' ); ?>><?php _e( 'Blanc',  'simplelongform' )?></option>
			<option value="select-two" <?php if ( isset ( $simplelongform_stored_meta['section2_title_color'] ) ) selected( $simplelongform_stored_meta['section2_title_color'][0], 'select-two' ); ?>><?php _e( 'Noir', 'simplelongform' )?></option>
			<option value="select-three" <?php if ( isset ( $simplelongform_stored_meta['section2_title_color'] ) ) selected( $simplelongform_stored_meta['section2_title_color'][0], 'select-three' ); ?>><?php _e( 'Blanc sur couleur du thème', 'simplelongform' )?></option>
		</select>
	</p>
	<p>
		<label for="meta-image_2" class="simplelongform-row-title"><?php _e( 'Image de fond', 'simplelongform' )?></label>
			<br/>
			<input type="text" class="meta-image" name="meta-image_2" id="meta-image_2" value="<?php if ( isset ( $simplelongform_stored_meta['meta-image_2'] ) ) : $topimg_2 = $simplelongform_stored_meta['meta-image_2'][0]; echo $topimg_2; endif; ?>" />
			<input type="button" id="meta-image-button_2" class="button-slf" value="<?php _e( 'Choisir votre image', 'simplelongform' )?>" />
		<br/>			
			
			<?php if( !empty( $topimg_2 ) ): ?>			
				<div class="img-slf" id="img-slf_2">
					<img src="<?php echo $topimg_2; ?>" id="imgtop2" />
						<p class="remove_img" id="remove_img_2">
							<a title="<?php _e('Supprimer', 'simplelongform'); ?>" href="javascript:;" id="remove-footer-thumbnail"><?php _e('Supprimer l\'image', 'simplelongform'); ?></a>
						</p>			
				</div>
			<?php endif; ?>
	</p>
	<p>
        <label for="section2_caption" class="simplelongform-title"><?php _e( 'Légende de l\'image', 'simplelongform' )?></label>
        <input type="text" name="section2_caption" id="section2_caption" class="meta-text-title" value="<?php if ( isset ( $simplelongform_stored_meta['section2_caption'] ) ) echo $simplelongform_stored_meta['section2_caption'][0]; ?>" />
    </p>
	
	<p>
		<label for="meta-video_2" class="simplelongform-video"><?php _e( 'OU video en fond d\'écran (copier-coller votre code embed)', 'simplelongform' )?></label>
		<br/>
		<input type="text" style="width:100%;" class="meta-video_2" name="meta-video_2" id="meta-video_2" value="<?php if ( isset ( $simplelongform_stored_meta['meta-video_2'] ) ) echo $simplelongform_stored_meta['meta-video_2'][0]; ?>" />
	</p>
	<hr/>
	<h2 class="title-content"><?php _e('Ajouter le contenu', 'simplelongform'); ?></h2>
	<?php
		$field_value = get_post_meta( $post->ID, '_wp_editor_section_2', false );
		
		if ( $field_value == false ) :
			wp_editor( ' ', '_wp_editor_section_2' );
		else :
			wp_editor( $field_value[0], '_wp_editor_section_2' ); 
		endif;
		
	$post7 = get_post_meta( get_the_ID(), '_wp_editor_section_3', true ); 
	$post8 = get_post_meta( get_the_ID(), 'meta-title_3', true ); 
	$post9 = get_post_meta( get_the_ID(), 'meta-image_3', true ); 
	$post9b = get_post_meta( get_the_ID(), 'meta-video_3', true ); 
		if( !empty( $post7 ) || !empty( $post8) || !empty( $post9 ) || !empty( $post9b ) ) : ?> 
			<style>
			#wp_editor_section_3{display:block;}
			#add3{display:none;}
			</style>
		<?php else: ?>
			<div id="add3" class="add"> 
				<?php _e( 'Ajouter une nouvelle section +', 'simplelongform' )?>
			</div>
	<?php endif;
}
function simplelongform_save_postdata_2( $post_id ) {
	$is_autosave = wp_is_post_autosave( $post_id );
    $is_revision = wp_is_post_revision( $post_id );
    $is_valid_nonce = ( isset( $_POST[ 'slf_nonce' ] ) && wp_verify_nonce( $_POST[ 'slf_nonce' ], basename( __FILE__ ) ) ) ? 'true' : 'false';
 
    if ( $is_autosave || $is_revision || !$is_valid_nonce ) {
        return;
    }
		if( isset( $_POST[ 'meta-title_2' ] ) ) {
			update_post_meta( $post_id, 'meta-title_2', sanitize_text_field( $_POST[ 'meta-title_2' ] ) );
		}
		if( isset( $_POST[ 'section2_title_align' ] ) ) {
			update_post_meta( $post_id, 'section2_title_align', sanitize_text_field($_POST[ 'section2_title_align' ]) );
		}
		if( isset( $_POST[ 'section2_title_color' ] ) ) {
			update_post_meta( $post_id, 'section2_title_color', sanitize_text_field($_POST[ 'section2_title_color' ]) );
		}
		if( isset( $_POST[ 'meta-image_2' ] ) ) {
			update_post_meta( $post_id, 'meta-image_2', sanitize_text_field($_POST[ 'meta-image_2' ]) );
		}
		if( isset( $_POST[ 'meta-video_2' ] ) ) {
			update_post_meta( $post_id, 'meta-video_2', sanitize_text_field(htmlentities(stripslashes($_POST[ 'meta-video_2' ])) ));
		}
		if( isset( $_POST[ 'section2_caption' ] ) ) {
			update_post_meta( $post_id, 'section2_caption', sanitize_text_field( $_POST[ 'section2_caption' ] ) );
		}
		if ( isset ( $_POST['_wp_editor_section_2'] ) ) {
			update_post_meta( $post_id, '_wp_editor_section_2', $_POST['_wp_editor_section_2'] );
		}
}
add_action( 'save_post', 'simplelongform_save_postdata_2' );
//Section 3
function wp_editor_meta_box_3( $post ) { 
	wp_nonce_field( basename( __FILE__ ), 'slf_nonce' );
    $simplelongform_stored_meta = get_post_meta( $post->ID );
?> 
	<p>
        <label for="meta-title_3" class="simplelongform-title"><?php _e( 'Titre de la section', 'simplelongform' )?></label>
        <input type="text" name="meta-title_3" id="meta-text-title_3" class="meta-text-title" value="<?php if ( isset ( $simplelongform_stored_meta['meta-title_3'] ) ) echo $simplelongform_stored_meta['meta-title_3'][0]; ?>" />
    </p>
	<p>
        <label for="meta-align_3" class="simplelongform-align"><?php _e( 'Alignement du titre', 'simplelongform' )?></label>
        <br/>
			<select name="section3_title_align" id="section3_title_align" class="options">
				<option value="select-one" <?php if ( isset ( $simplelongform_stored_meta['section3_title_align'] ) ) selected( $simplelongform_stored_meta['section3_title_align'][0], 'select-one' ); ?>><?php _e( 'Gauche',  'simplelongform' )?></option>
				<option value="select-two" <?php if ( isset ( $simplelongform_stored_meta['section3_title_align'] ) ) selected( $simplelongform_stored_meta['section3_title_align'][0], 'select-two' ); ?>><?php _e( 'Centre', 'simplelongform' )?></option>
				<option value="select-three" <?php if ( isset ( $simplelongform_stored_meta['section3_title_align'] ) ) selected( $simplelongform_stored_meta['section3_title_align'][0], 'select-three' ); ?>><?php _e( 'Droite', 'simplelongform' )?></option>
			</select>
	</p>
	<p>
		<label for="section3_title_color" class="simplelongform-font_title"><?php _e( 'Couleur du titre', 'simplelongform' )?></label>
		<br/>
			<select name="section3_title_color" id="section3_title_color" class="options">
				<option value="select-one" <?php if ( isset ( $simplelongform_stored_meta['section3_title_color'] ) ) selected( $simplelongform_stored_meta['section3_title_color'][0], 'select-one' ); ?>><?php _e( 'Blanc',  'simplelongform' )?></option>
				<option value="select-two" <?php if ( isset ( $simplelongform_stored_meta['section3_title_color'] ) ) selected( $simplelongform_stored_meta['section3_title_color'][0], 'select-two' ); ?>><?php _e( 'Noir', 'simplelongform' )?></option>
				<option value="select-three" <?php if ( isset ( $simplelongform_stored_meta['section3_title_color'] ) ) selected( $simplelongform_stored_meta['section3_title_color'][0], 'select-three' ); ?>><?php _e( 'Blanc sur couleur du thème', 'simplelongform' )?></option>
			</select>
	</p>
	<p>
		<label for="meta-image_3" class="simplelongform-row-title"><?php _e( 'Image de fond', 'simplelongform' )?></label>
		<br/>
			<input type="text" class="meta-image" name="meta-image_3" id="meta-image_3" value="<?php if ( isset ( $simplelongform_stored_meta['meta-image_3'] ) ) : $topimg_3 = $simplelongform_stored_meta['meta-image_3'][0]; echo $topimg_3; endif; ?>" />
			<input type="button" id="meta-image-button_3" class="button-slf" value="<?php _e( 'Choisir votre image', 'simplelongform' )?>" />
		<br/>			
			
			<?php if( !empty( $topimg_3 ) ): ?>			
				<div class="img-slf" id="img-slf_3">
					<img src="<?php echo $topimg_3; ?>" id="imgtop3" />
						<p class="remove_img" id="remove_img_3">
							<a title="<?php _e('Supprimer', 'simplelongform'); ?>" href="javascript:;" id="remove-footer-thumbnail"><?php _e('Supprimer l\'image', 'simplelongform'); ?></a>
						</p>			
				</div>
			<?php endif; ?>
	</p>
	<p>
        <label for="section3_caption" class="simplelongform-title"><?php _e( 'Légende de l\'image', 'simplelongform' )?></label>
        <input type="text" name="section3_caption" id="section3_caption" class="meta-text-title" value="<?php if ( isset ( $simplelongform_stored_meta['section3_caption'] ) ) echo $simplelongform_stored_meta['section3_caption'][0]; ?>" />
    </p>
	
	<p>
		<label for="meta-video_3" class="simplelongform-video"><?php _e( 'OU video en fond d\'écran (copier-coller votre code embed)', 'simplelongform' )?></label>
		<br/>
		<input type="text" style="width:100%;" class="meta-video_3" name="meta-video_3" id="meta-video_3" value="<?php if ( isset ( $simplelongform_stored_meta['meta-video_3'] ) ) echo $simplelongform_stored_meta['meta-video_3'][0]; ?>" />
	</p>
	<hr/>
	
	<h3 class="title-content2"><?php _e('Ajouter le contenu', 'simplelongform'); ?></h3>
 
	<?php
		$field_value = get_post_meta( $post->ID, '_wp_editor_section_3', false );
		
		if ( $field_value == false ) :
			wp_editor( ' ', '_wp_editor_section_3' );
		else :
			wp_editor( $field_value[0], '_wp_editor_section_3' ); 
		endif;
	  
	$post10 = get_post_meta( get_the_ID(), '_wp_editor_section_4', true ); 
	$post11 = get_post_meta( get_the_ID(), 'meta-title_4', true ); 
	$post12 = get_post_meta( get_the_ID(), 'meta-image_4', true ); 
	$post12b = get_post_meta( get_the_ID(), 'meta-video_4', true ); 
		if( !empty( $post10 ) || !empty( $post11) || !empty( $post12 ) || !empty( $post12b ) ) : ?> 
			<style>
			#wp_editor_section_4{display:block;}
			#add4{display:none;}
			</style>
		<?php else: ?>
			<div id="add4" class="add"> 
				<?php _e( 'Ajouter une nouvelle section +', 'simplelongform' )?>
			</div>
	<?php endif;
}
function simplelongform_save_postdata_3( $post_id ) {
	$is_autosave = wp_is_post_autosave( $post_id );
    $is_revision = wp_is_post_revision( $post_id );
    $is_valid_nonce = ( isset( $_POST[ 'slf_nonce' ] ) && wp_verify_nonce( $_POST[ 'slf_nonce' ], basename( __FILE__ ) ) ) ? 'true' : 'false';
     if ( $is_autosave || $is_revision || !$is_valid_nonce ) {
        return;
     }
	 if( isset( $_POST[ 'meta-title_3' ] ) ) {
			update_post_meta( $post_id, 'meta-title_3', sanitize_text_field( $_POST[ 'meta-title_3' ] ) );
		}
		
	if( isset( $_POST[ 'section3_title_align' ] ) ) {
			update_post_meta( $post_id, 'section3_title_align', sanitize_text_field($_POST[ 'section3_title_align' ]) );
		}
	 if( isset( $_POST[ 'section3_title_color' ] ) ) {
			update_post_meta( $post_id, 'section3_title_color', sanitize_text_field($_POST[ 'section3_title_color' ]) );
	 }
	 if( isset( $_POST[ 'meta-image_3' ] ) ) {
		update_post_meta( $post_id, 'meta-image_3', sanitize_text_field($_POST[ 'meta-image_3' ]) );
	 }
	 
	  if( isset( $_POST[ 'meta-video_3' ] ) ) {
			update_post_meta( $post_id, 'meta-video_3', sanitize_text_field(htmlentities(stripslashes($_POST[ 'meta-video_3' ])) ));
		}
	  if( isset( $_POST[ 'section3_caption' ] ) ) {
			update_post_meta( $post_id, 'section3_caption', sanitize_text_field( $_POST[ 'section3_caption' ] ) );
		}
	 if ( isset ( $_POST['_wp_editor_section_3'] ) ) {
	update_post_meta( $post_id, '_wp_editor_section_3', $_POST['_wp_editor_section_3'] );
	  }
}
add_action( 'save_post', 'simplelongform_save_postdata_3' );
//Section 4
function wp_editor_meta_box_4( $post ) { 
	wp_nonce_field( basename( __FILE__ ), 'slf_nonce' );
    $simplelongform_stored_meta = get_post_meta( $post->ID );
?> 
	<p>
        <label for="meta-title_4" class="simplelongform-title"><?php _e( 'Titre de la section', 'simplelongform' )?></label>
        <input type="text" name="meta-title_4" id="meta-text-title_4" class="meta-text-title" value="<?php if ( isset ( $simplelongform_stored_meta['meta-title_4'] ) ) echo $simplelongform_stored_meta['meta-title_4'][0]; ?>" />
    </p>
	<p>
        <label for="meta-align_4" class="simplelongform-align"><?php _e( 'Alignement du titre', 'simplelongform' )?></label>
        <br/>
			<select name="section4_title_align" id="section4_title_align" class="options">
				<option value="select-one" <?php if ( isset ( $simplelongform_stored_meta['section4_title_align'] ) ) selected( $simplelongform_stored_meta['section4_title_align'][0], 'select-one' ); ?>><?php _e( 'Gauche',  'simplelongform' )?></option>
				<option value="select-two" <?php if ( isset ( $simplelongform_stored_meta['section4_title_align'] ) ) selected( $simplelongform_stored_meta['section4_title_align'][0], 'select-two' ); ?>><?php _e( 'Centre', 'simplelongform' )?></option>
				<option value="select-three" <?php if ( isset ( $simplelongform_stored_meta['section4_title_align'] ) ) selected( $simplelongform_stored_meta['section4_title_align'][0], 'select-three' ); ?>><?php _e( 'Droite', 'simplelongform' )?></option>
			</select>
	</p>
	<p>
		<label for="section4_title_color" class="simplelongform-font_title"><?php _e( 'Couleur du titre', 'simplelongform' )?></label>
		<br/>
		<select name="section4_title_color" id="section4_title_color" class="options">
			<option value="select-one" <?php if ( isset ( $simplelongform_stored_meta['section4_title_color'] ) ) selected( $simplelongform_stored_meta['section4_title_color'][0], 'select-one' ); ?>><?php _e( 'Blanc',  'simplelongform' )?></option>
			<option value="select-two" <?php if ( isset ( $simplelongform_stored_meta['section4_title_color'] ) ) selected( $simplelongform_stored_meta['section4_title_color'][0], 'select-two' ); ?>><?php _e( 'Noir', 'simplelongform' )?></option>
			<option value="select-three" <?php if ( isset ( $simplelongform_stored_meta['section4_title_color'] ) ) selected( $simplelongform_stored_meta['section4_title_color'][0], 'select-three' ); ?>><?php _e( 'Blanc sur couleur du thème', 'simplelongform' )?></option>
		</select>
	</p>
	<p>
		<label for="meta-image_4" class="simplelongform-row-title"><?php _e( 'Image de fond', 'simplelongform' )?></label>
		<br/>
			<input type="text" class="meta-image" name="meta-image_4" id="meta-image_4" value="<?php if ( isset ( $simplelongform_stored_meta['meta-image_4'] ) ) : $topimg_4 = $simplelongform_stored_meta['meta-image_4'][0]; echo $topimg_4; endif; ?>" />
			<input type="button" id="meta-image-button_4" class="button-slf" value="<?php _e( 'Choisir votre image', 'simplelongform' )?>" />
		<br/>			
			
			<?php if( !empty( $topimg_4 ) ): ?>			
				<div class="img-slf" id="img-slf_4">
					<img src="<?php echo $topimg_4; ?>" id="imgtop4" />
						<p class="remove_img" id="remove_img_4">
							<a title="<?php _e('Supprimer', 'simplelongform'); ?>" href="javascript:;" id="remove-footer-thumbnail"><?php _e('Supprimer l\'image', 'simplelongform'); ?></a>
						</p>			
				</div>
			<?php endif; ?>
	</p>
	<p>
        <label for="section4_caption" class="simplelongform-title"><?php _e( 'Légende de l\'image', 'simplelongform' )?></label>
        <input type="text" name="section4_caption" id="section4_caption" class="meta-text-title" value="<?php if ( isset ( $simplelongform_stored_meta['section4_caption'] ) ) echo $simplelongform_stored_meta['section4_caption'][0]; ?>" />
    </p>
	
	<p>
		<label for="meta-video_4" class="simplelongform-video"><?php _e( 'OU video en fond d\'écran (copier-coller votre code embed)', 'simplelongform' )?></label>
		<br/>
		<input type="text" style="width:100%;" class="meta-video_4" name="meta-video_4" id="meta-video_4" value="<?php if ( isset ( $simplelongform_stored_meta['meta-video_4'] ) ) echo $simplelongform_stored_meta['meta-video_4'][0]; ?>" />
	</p>
	<hr/>
	<h3 class="title-content2"><?php _e('Ajouter le contenu', 'simplelongform'); ?></h3>
	<?php
		$field_value = get_post_meta( $post->ID, '_wp_editor_section_4', false );
		
		if ( $field_value == false ) :
			wp_editor( ' ', '_wp_editor_section_4' );
		else :
			wp_editor( $field_value[0], '_wp_editor_section_4' ); 
		endif;
		
	$post13 = get_post_meta( get_the_ID(), '_wp_editor_section_5', true ); 
	$post14 = get_post_meta( get_the_ID(), 'meta-title_5', true ); 
	$post15 = get_post_meta( get_the_ID(), 'meta-image_5', true ); 
	$post15b = get_post_meta( get_the_ID(), 'meta-video_5', true ); 
		if( !empty( $post13 ) || !empty( $post14) || !empty( $post15 ) || !empty( $post15b ) ) : ?> 
			<style>
			#wp_editor_section_5{display:block;}
			#add5{display:none;}
			</style>
		<?php else: ?>
			<div id="add5" class="add"> 
				<?php _e( 'Ajouter une nouvelle section +', 'simplelongform' )?>
			</div>
	<?php endif;
}
function simplelongform_save_postdata_4( $post_id ) {
	$is_autosave = wp_is_post_autosave( $post_id );
    $is_revision = wp_is_post_revision( $post_id );
    $is_valid_nonce = ( isset( $_POST[ 'slf_nonce' ] ) && wp_verify_nonce( $_POST[ 'slf_nonce' ], basename( __FILE__ ) ) ) ? 'true' : 'false';
    if ( $is_autosave || $is_revision || !$is_valid_nonce ) {
        return;
    }
		if( isset( $_POST[ 'meta-title_4' ] ) ) {
			update_post_meta( $post_id, 'meta-title_4', sanitize_text_field( $_POST[ 'meta-title_4' ] ) );
		}
		if( isset( $_POST[ 'section4_title_color' ] ) ) {
			update_post_meta( $post_id, 'section4_title_color', sanitize_text_field($_POST[ 'section4_title_color' ]) );
		}
		if( isset( $_POST[ 'section4_title_align' ] ) ) {
			update_post_meta( $post_id, 'section4_title_align', sanitize_text_field($_POST[ 'section4_title_align' ]) );
		}
		if( isset( $_POST[ 'meta-image_4' ] ) ) {
			update_post_meta( $post_id, 'meta-image_4', sanitize_text_field($_POST[ 'meta-image_4' ]) );
		}
		if( isset( $_POST[ 'section4_caption' ] ) ) {
			update_post_meta( $post_id, 'section4_caption', sanitize_text_field( $_POST[ 'section4_caption' ] ) );
		}
		if( isset( $_POST[ 'meta-video_4' ] ) ) {
			update_post_meta( $post_id, 'meta-video_4', sanitize_text_field(htmlentities(stripslashes($_POST[ 'meta-video_4' ])) ));
		}
		if ( isset ( $_POST['_wp_editor_section_4'] ) ) {
			update_post_meta( $post_id, '_wp_editor_section_4', $_POST['_wp_editor_section_4'] );
		}
}
add_action( 'save_post', 'simplelongform_save_postdata_4' );
//Section 5
function wp_editor_meta_box_5( $post ) { 
	wp_nonce_field( basename( __FILE__ ), 'slf_nonce' );
    $simplelongform_stored_meta = get_post_meta( $post->ID );
?> 
	<p>
        <label for="meta-title_5" class="simplelongform-title"><?php _e( 'Titre de la section', 'simplelongform' )?></label>
        <input type="text" name="meta-title_5" id="meta-text-title_5" class="meta-text-title" value="<?php if ( isset ( $simplelongform_stored_meta['meta-title_5'] ) ) echo $simplelongform_stored_meta['meta-title_5'][0]; ?>" />
    </p>
	<p>
        <label for="meta-align_5" class="simplelongform-align"><?php _e( 'Alignement du titre', 'simplelongform' )?></label>
        <br/>
			<select name="section5_title_align" id="section5_title_align" class="options">
				<option value="select-one" <?php if ( isset ( $simplelongform_stored_meta['section5_title_align'] ) ) selected( $simplelongform_stored_meta['section5_title_align'][0], 'select-one' ); ?>><?php _e( 'Gauche',  'simplelongform' )?></option>
				<option value="select-two" <?php if ( isset ( $simplelongform_stored_meta['section5_title_align'] ) ) selected( $simplelongform_stored_meta['section5_title_align'][0], 'select-two' ); ?>><?php _e( 'Centre', 'simplelongform' )?></option>
				<option value="select-three" <?php if ( isset ( $simplelongform_stored_meta['section5_title_align'] ) ) selected( $simplelongform_stored_meta['section5_title_align'][0], 'select-three' ); ?>><?php _e( 'Droite', 'simplelongform' )?></option>
			</select>
	</p>
	<p>
		<label for="section5_title_color" class="simplelongform-font_title"><?php _e( 'Couleur du titre', 'simplelongform' )?></label>
		<br/>
			<select name="section5_title_color" id="section5_title_color" class="options">
				<option value="select-one" <?php if ( isset ( $simplelongform_stored_meta['section5_title_color'] ) ) selected( $simplelongform_stored_meta['section5_title_color'][0], 'select-one' ); ?>><?php _e( 'Blanc',  'simplelongform' )?></option>
				<option value="select-two" <?php if ( isset ( $simplelongform_stored_meta['section5_title_color'] ) ) selected( $simplelongform_stored_meta['section5_title_color'][0], 'select-two' ); ?>><?php _e( 'Noir', 'simplelongform' )?></option>
				<option value="select-three" <?php if ( isset ( $simplelongform_stored_meta['section5_title_color'] ) ) selected( $simplelongform_stored_meta['section5_title_color'][0], 'select-three' ); ?>><?php _e( 'Blanc sur couleur du thème', 'simplelongform' )?></option>
			</select>
	</p>
	<p>
		<label for="meta-image_5" class="simplelongform-row-title"><?php _e( 'Image de fond', 'simplelongform' )?></label>
			<br/>
		<input type="text" class="meta-image" name="meta-image_5" id="meta-image_5" value="<?php if ( isset ( $simplelongform_stored_meta['meta-image_5'] ) ) : $topimg_5 = $simplelongform_stored_meta['meta-image_5'][0]; echo $topimg_5; endif; ?>" />
			<input type="button" id="meta-image-button_5" class="button-slf" value="<?php _e( 'Choisir votre image', 'simplelongform' )?>" />
		<br/>			
			
			<?php if( !empty( $topimg_5 ) ): ?>			
				<div class="img-slf" id="img-slf_5">
					<img src="<?php echo $topimg_5; ?>" id="imgtop5" />
						<p class="remove_img" id="remove_img_5">
							<a title="<?php _e('Supprimer', 'simplelongform'); ?>" href="javascript:;" id="remove-footer-thumbnail"><?php _e('Supprimer l\'image', 'simplelongform'); ?></a>
						</p>			
				</div>
			<?php endif; ?>
	</p>
	<p>
        <label for="section5_caption" class="simplelongform-title"><?php _e( 'Légende de l\'image', 'simplelongform' )?></label>
        <input type="text" name="section5_caption" id="section5_caption" class="meta-text-title" value="<?php if ( isset ( $simplelongform_stored_meta['section5_caption'] ) ) echo $simplelongform_stored_meta['section5_caption'][0]; ?>" />
    </p>
	
	<p>
		<label for="meta-video_5" class="simplelongform-video"><?php _e( 'OU video en fond d\'écran (copier-coller votre code embed)', 'simplelongform' )?></label>
		<br/>
		<input type="text" style="width:100%;" class="meta-video_5" name="meta-video_5" id="meta-video_5" value="<?php if ( isset ( $simplelongform_stored_meta['meta-video_5'] ) ) echo $simplelongform_stored_meta['meta-video_5'][0]; ?>" />
	</p>
	<hr/>
	<h3 class="title-content2"><?php _e('Ajouter le contenu', 'simplelongform'); ?></h3>
	<?php
		$field_value = get_post_meta( $post->ID, '_wp_editor_section_5', false );
		
		if ( $field_value == false ) :
			wp_editor( ' ', '_wp_editor_section_5' );
		else :
			wp_editor( $field_value[0], '_wp_editor_section_5' ); 
		endif;
		
	$post16 = get_post_meta( get_the_ID(), '_wp_editor_section_6', true ); 
	$post17 = get_post_meta( get_the_ID(), 'meta-title_6', true ); 
	$post18 = get_post_meta( get_the_ID(), 'meta-image_6', true ); 
	$post18b = get_post_meta( get_the_ID(), 'meta-video_6', true ); 
		if( !empty( $post16 ) || !empty( $post17) || !empty( $post18 ) || !empty( $post18b ) ) : ?> 
			<style>
			#wp_editor_section_6{display:block;}
			#add6{display:none;}
			</style>
		<?php else: ?>
			<div id="add6" class="add"> 
				<?php _e( 'Ajouter une nouvelle section +', 'simplelongform' )?>
			</div>
	<?php endif;
}
function simplelongform_save_postdata_5( $post_id ) {
	$is_autosave = wp_is_post_autosave( $post_id );
    $is_revision = wp_is_post_revision( $post_id );
    $is_valid_nonce = ( isset( $_POST[ 'slf_nonce' ] ) && wp_verify_nonce( $_POST[ 'slf_nonce' ], basename( __FILE__ ) ) ) ? 'true' : 'false';
    if ( $is_autosave || $is_revision || !$is_valid_nonce ) {
        return;
    }
		if( isset( $_POST[ 'meta-title_5' ] ) ) {
			update_post_meta( $post_id, 'meta-title_5', sanitize_text_field( $_POST[ 'meta-title_5' ] ) );
		}
		if( isset( $_POST[ 'section5_title_color' ] ) ) {
			update_post_meta( $post_id, 'section5_title_color', sanitize_text_field($_POST[ 'section5_title_color' ]) );
		}
		if( isset( $_POST[ 'section5_title_align' ] ) ) {
			update_post_meta( $post_id, 'section5_title_align', sanitize_text_field($_POST[ 'section5_title_align' ]) );
		}
		
		if( isset( $_POST[ 'meta-image_5' ] ) ) {
			update_post_meta( $post_id, 'meta-image_5', sanitize_text_field($_POST[ 'meta-image_5' ]) );
		}
		if( isset( $_POST[ 'meta-video_5' ] ) ) {
			update_post_meta( $post_id, 'meta-video_5', sanitize_text_field(htmlentities(stripslashes($_POST[ 'meta-video_5' ])) ));
		}
		if( isset( $_POST[ 'section5_caption' ] ) ) {
			update_post_meta( $post_id, 'section5_caption', sanitize_text_field( $_POST[ 'section5_caption' ] ) );
		}
		if ( isset ( $_POST['_wp_editor_section_5'] ) ) {
			update_post_meta( $post_id, '_wp_editor_section_5', $_POST['_wp_editor_section_5'] );
		}
}
add_action( 'save_post', 'simplelongform_save_postdata_5' );
//Section 6
function wp_editor_meta_box_6( $post ) { 
	wp_nonce_field( basename( __FILE__ ), 'slf_nonce' );
    $simplelongform_stored_meta = get_post_meta( $post->ID );
?> 
	<p>
        <label for="meta-title_6" class="simplelongform-title"><?php _e( 'Titre de la section', 'simplelongform' )?></label>
        <input type="text" name="meta-title_6" id="meta-text-title_6" class="meta-text-title" value="<?php if ( isset ( $simplelongform_stored_meta['meta-title_6'] ) ) echo $simplelongform_stored_meta['meta-title_6'][0]; ?>" />
    </p>
	<p>
        <label for="meta-align_6" class="simplelongform-align"><?php _e( 'Alignement du titre', 'simplelongform' )?></label>
        <br/>
			<select name="section6_title_align" id="section6_title_align" class="options">
				<option value="select-one" <?php if ( isset ( $simplelongform_stored_meta['section6_title_align'] ) ) selected( $simplelongform_stored_meta['section6_title_align'][0], 'select-one' ); ?>><?php _e( 'Gauche',  'simplelongform' )?></option>
				<option value="select-two" <?php if ( isset ( $simplelongform_stored_meta['section6_title_align'] ) ) selected( $simplelongform_stored_meta['section6_title_align'][0], 'select-two' ); ?>><?php _e( 'Centre', 'simplelongform' )?></option>
				<option value="select-three" <?php if ( isset ( $simplelongform_stored_meta['section6_title_align'] ) ) selected( $simplelongform_stored_meta['section6_title_align'][0], 'select-three' ); ?>><?php _e( 'Droite', 'simplelongform' )?></option>
			</select>
	</p>
	<p>
		<label for="section6_title_color" class="simplelongform-font_title"><?php _e( 'Couleur du titre', 'simplelongform' )?></label>
		<br/>
			<select name="section6_title_color" id="section6_title_color" class="options">
				<option value="select-one" <?php if ( isset ( $simplelongform_stored_meta['section6_title_color'] ) ) selected( $simplelongform_stored_meta['section6_title_color'][0], 'select-one' ); ?>><?php _e( 'Blanc',  'simplelongform' )?></option>
				<option value="select-two" <?php if ( isset ( $simplelongform_stored_meta['section6_title_color'] ) ) selected( $simplelongform_stored_meta['section6_title_color'][0], 'select-two' ); ?>><?php _e( 'Noir', 'simplelongform' )?></option>
				<option value="select-three" <?php if ( isset ( $simplelongform_stored_meta['section6_title_color'] ) ) selected( $simplelongform_stored_meta['section6_title_color'][0], 'select-three' ); ?>><?php _e( 'Blanc sur couleur du thème', 'simplelongform' )?></option>
			</select>
	</p>
	<p>
		<label for="meta-image_6" class="simplelongform-row-title"><?php _e( 'Image de fond', 'simplelongform' )?></label>
			<br/>
		<input type="text" class="meta-image" name="meta-image_6" id="meta-image_6" value="<?php if ( isset ( $simplelongform_stored_meta['meta-image_6'] ) ) : $topimg_6 = $simplelongform_stored_meta['meta-image_6'][0]; echo $topimg_6; endif; ?>" />
			<input type="button" id="meta-image-button_6" class="button-slf" value="<?php _e( 'Choisir votre image', 'simplelongform' )?>" />
		<br/>			
			
			<?php if( !empty( $topimg_6 ) ): ?>			
				<div class="img-slf" id="img-slf_6">
					<img src="<?php echo $topimg_6; ?>" id="imgtop6" />
						<p class="remove_img" id="remove_img_6">
							<a title="<?php _e('Supprimer', 'simplelongform'); ?>" href="javascript:;" id="remove-footer-thumbnail"><?php _e('Supprimer l\'image', 'simplelongform'); ?></a>
						</p>			
				</div>
			<?php endif; ?>
	</p>
	<p>
        <label for="section6_caption" class="simplelongform-title"><?php _e( 'Légende de l\'image', 'simplelongform' )?></label>
        <input type="text" name="section6_caption" id="section6_caption" class="meta-text-title" value="<?php if ( isset ( $simplelongform_stored_meta['section6_caption'] ) ) echo $simplelongform_stored_meta['section6_caption'][0]; ?>" />
    </p>
	
	<p>
		<label for="meta-video_6" class="simplelongform-video"><?php _e( 'OU video en fond d\'écran (copier-coller votre code embed)', 'simplelongform' )?></label>
		<br/>
		<input type="text" style="width:100%;" class="meta-video_6" name="meta-video_6" id="meta-video_6" value="<?php if ( isset ( $simplelongform_stored_meta['meta-video_6'] ) ) echo $simplelongform_stored_meta['meta-video_6'][0]; ?>" />
	</p>
	<hr/>
	<h3 class="title-content2"><?php _e('Ajouter le contenu', 'simplelongform'); ?></h3>
	<?php
		$field_value = get_post_meta( $post->ID, '_wp_editor_section_6', false );
		
		if ( $field_value == false ) :
			wp_editor( ' ', '_wp_editor_section_6' );
		else :
			wp_editor( $field_value[0], '_wp_editor_section_6' ); 
		endif;
		
	$post19 = get_post_meta( get_the_ID(), '_wp_editor_section_7', true ); 
	$post20 = get_post_meta( get_the_ID(), 'meta-title_7', true ); 
	$post21 = get_post_meta( get_the_ID(), 'meta-image_7', true ); 
	$post21b = get_post_meta( get_the_ID(), 'meta-video_7', true ); 
		if( !empty( $post19 ) || !empty( $post20) || !empty( $post21 ) || !empty( $post21b ) ) : ?> 
			<style>
			#wp_editor_section_7{display:block;}
			#add7{display:none;}
			</style>
		<?php else: ?>
			<div id="add7" class="add"> 
				<?php _e( 'Ajouter une nouvelle section +', 'simplelongform' )?>
			</div>
	<?php endif;
}
function simplelongform_save_postdata_6( $post_id ) {
	$is_autosave = wp_is_post_autosave( $post_id );
    $is_revision = wp_is_post_revision( $post_id );
    $is_valid_nonce = ( isset( $_POST[ 'slf_nonce' ] ) && wp_verify_nonce( $_POST[ 'slf_nonce' ], basename( __FILE__ ) ) ) ? 'true' : 'false';
    if ( $is_autosave || $is_revision || !$is_valid_nonce ) {
        return;
    }
		if( isset( $_POST[ 'meta-title_6' ] ) ) {
			update_post_meta( $post_id, 'meta-title_6', sanitize_text_field( $_POST[ 'meta-title_6' ] ) );
		}
		if( isset( $_POST[ 'section6_title_color' ] ) ) {
			update_post_meta( $post_id, 'section6_title_color', sanitize_text_field($_POST[ 'section6_title_color' ]) );
		}
		if( isset( $_POST[ 'section6_title_align' ] ) ) {
			update_post_meta( $post_id, 'section6_title_align', sanitize_text_field($_POST[ 'section6_title_align' ]) );
		}
		
		if( isset( $_POST[ 'meta-image_6' ] ) ) {
			update_post_meta( $post_id, 'meta-image_6', sanitize_text_field($_POST[ 'meta-image_6' ]) );
		}
		if( isset( $_POST[ 'meta-video_6' ] ) ) {
			update_post_meta( $post_id, 'meta-video_6', sanitize_text_field(htmlentities(stripslashes($_POST[ 'meta-video_6' ])) ));
		}
		if( isset( $_POST[ 'section6_caption' ] ) ) {
			update_post_meta( $post_id, 'section6_caption', sanitize_text_field( $_POST[ 'section6_caption' ] ) );
		}
		if ( isset ( $_POST['_wp_editor_section_6'] ) ) {
			update_post_meta( $post_id, '_wp_editor_section_6', $_POST['_wp_editor_section_6'] );
		}
}
add_action( 'save_post', 'simplelongform_save_postdata_6' );
//Section 7
function wp_editor_meta_box_7( $post ) { 
	wp_nonce_field( basename( __FILE__ ), 'slf_nonce' );
    $simplelongform_stored_meta = get_post_meta( $post->ID );
?> 
	<p>
        <label for="meta-title_7" class="simplelongform-title"><?php _e( 'Titre de la section', 'simplelongform' )?></label>
        <input type="text" name="meta-title_7" id="meta-text-title_7" class="meta-text-title" value="<?php if ( isset ( $simplelongform_stored_meta['meta-title_7'] ) ) echo $simplelongform_stored_meta['meta-title_7'][0]; ?>" />
    </p>
	<p>
        <label for="meta-align_7" class="simplelongform-align"><?php _e( 'Alignement du titre', 'simplelongform' )?></label>
        <br/>
			<select name="section7_title_align" id="section7_title_align" class="options">
				<option value="select-one" <?php if ( isset ( $simplelongform_stored_meta['section7_title_align'] ) ) selected( $simplelongform_stored_meta['section7_title_align'][0], 'select-one' ); ?>><?php _e( 'Gauche',  'simplelongform' )?></option>
				<option value="select-two" <?php if ( isset ( $simplelongform_stored_meta['section7_title_align'] ) ) selected( $simplelongform_stored_meta['section7_title_align'][0], 'select-two' ); ?>><?php _e( 'Centre', 'simplelongform' )?></option>
				<option value="select-three" <?php if ( isset ( $simplelongform_stored_meta['section7_title_align'] ) ) selected( $simplelongform_stored_meta['section7_title_align'][0], 'select-three' ); ?>><?php _e( 'Droite', 'simplelongform' )?></option>
			</select>
	</p>
	<p>
		<label for="section7_title_color" class="simplelongform-font_title"><?php _e( 'Couleur du titre', 'simplelongform' )?></label>
		<br/>
			<select name="section7_title_color" id="section7_title_color" class="options">
				<option value="select-one" <?php if ( isset ( $simplelongform_stored_meta['section7_title_color'] ) ) selected( $simplelongform_stored_meta['section7_title_color'][0], 'select-one' ); ?>><?php _e( 'Blanc',  'simplelongform' )?></option>
				<option value="select-two" <?php if ( isset ( $simplelongform_stored_meta['section7_title_color'] ) ) selected( $simplelongform_stored_meta['section7_title_color'][0], 'select-two' ); ?>><?php _e( 'Noir', 'simplelongform' )?></option>
				<option value="select-three" <?php if ( isset ( $simplelongform_stored_meta['section7_title_color'] ) ) selected( $simplelongform_stored_meta['section7_title_color'][0], 'select-three' ); ?>><?php _e( 'Blanc sur couleur du thème', 'simplelongform' )?></option>
			</select>
	</p>
	<p>
		<label for="meta-image_7" class="simplelongform-row-title"><?php _e( 'Image de fond', 'simplelongform' )?></label>
			<br/>
		<input type="text" class="meta-image" name="meta-image_7" id="meta-image_7" value="<?php if ( isset ( $simplelongform_stored_meta['meta-image_7'] ) ) : $topimg_7 = $simplelongform_stored_meta['meta-image_7'][0]; echo $topimg_7; endif; ?>" />
			<input type="button" id="meta-image-button_7" class="button-slf" value="<?php _e( 'Choisir votre image', 'simplelongform' )?>" />
		<br/>			
			
			<?php if( !empty( $topimg_7 ) ): ?>			
				<div class="img-slf" id="img-slf_7">
					<img src="<?php echo $topimg_7; ?>" id="imgtop7" />
						<p class="remove_img" id="remove_img_7">
							<a title="<?php _e('Supprimer', 'simplelongform'); ?>" href="javascript:;" id="remove-footer-thumbnail"><?php _e('Supprimer l\'image', 'simplelongform'); ?></a>
						</p>			
				</div>
			<?php endif; ?>
	</p>
	<p>
        <label for="section7_caption" class="simplelongform-title"><?php _e( 'Légende de l\'image', 'simplelongform' )?></label>
        <input type="text" name="section7_caption" id="section7_caption" class="meta-text-title" value="<?php if ( isset ( $simplelongform_stored_meta['section7_caption'] ) ) echo $simplelongform_stored_meta['section7_caption'][0]; ?>" />
    </p>
	
	<p>
		<label for="meta-video_7" class="simplelongform-video"><?php _e( 'OU video en fond d\'écran (copier-coller votre code embed)', 'simplelongform' )?></label>
		<br/>
		<input type="text" style="width:100%;" class="meta-video_7" name="meta-video_7" id="meta-video_7" value="<?php if ( isset ( $simplelongform_stored_meta['meta-video_7'] ) ) echo $simplelongform_stored_meta['meta-video_7'][0]; ?>" />
	</p>
	<hr/>
	<h3 class="title-content2"><?php _e('Ajouter le contenu', 'simplelongform'); ?></h3>
	<?php
		$field_value = get_post_meta( $post->ID, '_wp_editor_section_7', false );
		if ( $field_value == false ) :
			wp_editor( ' ', '_wp_editor_section_7' );
		else :
			wp_editor( $field_value[0], '_wp_editor_section_7' ); 
		endif;
}
function simplelongform_save_postdata_7( $post_id ) {
	$is_autosave = wp_is_post_autosave( $post_id );
    $is_revision = wp_is_post_revision( $post_id );
    $is_valid_nonce = ( isset( $_POST[ 'slf_nonce' ] ) && wp_verify_nonce( $_POST[ 'slf_nonce' ], basename( __FILE__ ) ) ) ? 'true' : 'false';
    if ( $is_autosave || $is_revision || !$is_valid_nonce ) {
        return;
    }
		if( isset( $_POST[ 'meta-title_7' ] ) ) {
			update_post_meta( $post_id, 'meta-title_7', sanitize_text_field( $_POST[ 'meta-title_7' ] ) );
		}
		if( isset( $_POST[ 'section7_title_color' ] ) ) {
			update_post_meta( $post_id, 'section7_title_color', sanitize_text_field($_POST[ 'section7_title_color' ]) );
		}
		if( isset( $_POST[ 'section7_title_align' ] ) ) {
			update_post_meta( $post_id, 'section7_title_align', sanitize_text_field($_POST[ 'section7_title_align' ]) );
		}
		
		if( isset( $_POST[ 'meta-image_7' ] ) ) {
			update_post_meta( $post_id, 'meta-image_7', sanitize_text_field($_POST[ 'meta-image_7' ]) );
		}
		if( isset( $_POST[ 'meta-video_7' ] ) ) {
			update_post_meta( $post_id, 'meta-video_7', sanitize_text_field(htmlentities(stripslashes($_POST[ 'meta-video_7' ])) ));
		}
		if( isset( $_POST[ 'section7_caption' ] ) ) {
			update_post_meta( $post_id, 'section7_caption', sanitize_text_field( $_POST[ 'section7_caption' ] ) );
		}
		if ( isset ( $_POST['_wp_editor_section_7'] ) ) {
			update_post_meta( $post_id, '_wp_editor_section_7', $_POST['_wp_editor_section_7']);
		}
}
add_action( 'save_post', 'simplelongform_save_postdata_7' );
//Footer
function wp_editor_footer( $post ) { 
	wp_nonce_field( basename( __FILE__ ), 'slf_nonce' );
    $simplelongform_stored_meta = get_post_meta( $post->ID );
?> 
	<h2 class="title-content"><?php _e('Ajouter le contenu', 'simplelongform'); ?></h2>
	<?php	
		$field_value = get_post_meta( $post->ID, '_wp_editor_foot', false );
		
		if ( $field_value == false ) :
			wp_editor( ' ', '_wp_editor_foot' );
		else :
			wp_editor( $field_value[0], '_wp_editor_foot' ); 
		endif;
	?>
	 <p>
        <label for="custom-css" class="simplelongform-subline"><?php _e( 'Style additionnel (utilisateur avancé)', 'simplelongform' )?></label>
        
		<?php if ( isset ( $simplelongform_stored_meta['custom-css'] ) ) { ?><textarea type="text" name="custom-css" class="meta-text-css" id="custom_css" /><?php echo $simplelongform_stored_meta['custom-css'][0]; ?></textarea>
		<?php } else { ?><textarea type="text" name="custom-css" class="meta-text-css" id="custom_css" /></textarea>
		<?php } ?>
	</p>
	
<?php }
function simplelongform_save_postdata_foot( $post_id ) {
	$is_autosave = wp_is_post_autosave( $post_id );
    $is_revision = wp_is_post_revision( $post_id );
    $is_valid_nonce = ( isset( $_POST[ 'slf_nonce' ] ) && wp_verify_nonce( $_POST[ 'slf_nonce' ], basename( __FILE__ ) ) ) ? 'true' : 'false';
    if ( $is_autosave || $is_revision || !$is_valid_nonce ) {
        return;
    }
	  if ( isset ( $_POST['_wp_editor_foot'] ) ) {
		update_post_meta( $post_id, '_wp_editor_foot', $_POST['_wp_editor_foot'] );
	  }
	  
	  if ( isset ( $_POST['custom-css'] ) ) {
		update_post_meta( $post_id, 'custom-css', $_POST['custom-css'] );
	  }
}
add_action( 'save_post', 'simplelongform_save_postdata_foot' );

?>