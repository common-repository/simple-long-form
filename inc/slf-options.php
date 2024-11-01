<?php
function simplelongform_add_admin_menu() {
   add_submenu_page( 'edit.php?post_type=longform','Simple Long Form', 'Options', 'manage_options', "simplelongform-options", "settings_page", null, 99);
}
add_action( 'admin_menu', 'simplelongform_add_admin_menu' );
function settings_page() {
	if (!current_user_can('manage_options')) {
		wp_die(__('Vos droits ne sont pas suffisants pour accéder à cette page.', 'simplelongform'));
}
?>

<div class="wrap">
	<div id="icon-options-general" class="icon32"></div>
	    <h2><?php _e('Simple Long Form - options', 'simplelongform') ?></h2>
		<?php if( isset($_GET['settings-updated']) ) { ?>
			<div id="message" class="updated">
				<p><strong><?php _e('Options enregistrées', 'simplelongform') ?></strong></p>
			</div>
		<?php } ?>
			<h2 class="nav-tab-wrapper">
			 <a href="#" class="nav-tab navtab1 active1"><?php _e( 'Options générales', 'simplelongform' ); ?></a>	 
			 <a href="#" class="nav-tab navtab5 active5"><?php _e( 'Métadonnées', 'simplelongform' ); ?></a>
			 <a href="#" class="nav-tab navtab3 active3"><?php _e( 'Archives', 'simplelongform' ); ?></a>
			 <a href="#" class="nav-tab navtab2 active2"><?php _e( 'Typographie', 'simplelongform' ); ?></a> 
			 <a href="#" class="nav-tab navtab4 active4"><?php _e( 'Documentation', 'simplelongform' ); ?></a>
			</h2>
		
		<?php echo '<img style="bottom:32px;right:20px;position:fixed;z-index:999999" src="' . plugins_url( '/images/slf.jpg', __FILE__ ) . '" alt="Fonts" /> '; ?>							
				
		<div id="tab1" class="ui-sortable meta-box-sortables">					
			<form method="post" action="options.php">					
				<?php settings_fields("section");						
				do_settings_sections("slf-plugin-options");      
				submit_button(); ?>          
			</form>
		</div>
		
		<div id="tab3" class="ui-sortable meta-box-sortables">					
			<br/>
				<div class="postbox">
					<div class="inside" style="font-size:1.2em;">
					<?php _e('Tous vos longs formats dans une seule page ? Rendez-vous sur la page des archives disponible au lien /longform (à la suite de votre URL). <br/> Les paramètres d\'affichage de cette page seront ceux de votre dernier long format publié.','simplelongform'); ?>
					<p>
					<a href="http://www.ohmybox.info/longform/" target="_blank"><?php _e('Cliquez ici pour voir la démo','simplelongform'); ?></a>
					</p>
					</div>
				</div>
				<form method="post" action="options.php">					
					<?php settings_fields("section-archives");						
						do_settings_sections("slf-plugin-options-archives");      
						submit_button(); ?>          
				</form>
		</div>

		<div id="tab5" class="ui-sortable meta-box-sortables">					
			<br/>
				<div class="postbox">
					<div class="inside" style="font-size:1.2em;">
						<?php _e('Décochez cette case si vous ne souhaitez pas intégrer les métadonnées Open Graph, Twitter et Dublin Core (si le plugin est lié à votre installation WordPress, ce n\'est peut-être pas nécessaire. Laissez cette option cochée si vous n\'avez pas de système de gestion des métadonnées. Saviez-vous que le plugin Simple Metadata Generator permet de gérer ses métadonnées en quelques clics pour l\'ensemble de votre installation (à condition de lier le plugin à WP) ?','simplelongform'); ?>
						<p>
							<a href="https://wordpress.org/plugins/simple-metadata-generator/" target="_blank"><?php _e('Rendez-vous sur cette page pour en savoir plus', 'simplelongform'); ?></a>
						</p>
						
						<form method="post" action="options.php">					
						<?php settings_fields("section-metadata");						
						do_settings_sections("slf-plugin-options-metadata");      
						submit_button(); ?>          
						</form>
					
					</div>
				</div>
		</div>	
		
		<div id="tab2" class="ui-sortable meta-box-sortables" style="display:none;">				
			<br/>
			<div class="postbox">
				<div class="inside" style="font-size:1.2em;">
					<?php _e('5 familles typographiques standards sont disponibles pour la mise en forme du texte, et 5 Google Fonts pour customiser les titres de chaque Long Form.','simplelongform'); ?>
					<h3><?php _e('Polices standards', 'simplelongform'); ?></h3> 
					<?php echo '<img style="width:100%;max-width:900px;margin:0;float:none;" src="' . plugins_url( '/images/fonts.jpg', __FILE__ ) . '" alt="Fonts" /> '; ?>							
					<h3><?php _e('Polices (versions 1.0 et 2.0)', 'simplelongform'); ?></h3> 
					<?php echo '<img style="width:100%;max-width:1100px;margin:0;" src="' . plugins_url( '/images/googlefonts.jpg', __FILE__ ) . '" alt="Google Fonts" /> '; ?>
					<h3><?php _e('Nouvelles polices (version 3.0)', 'simplelongform'); ?></h3>
					<?php echo '<img style="width:100%;max-width:1100px;margin:0;" src="' . plugins_url( '/images/fontsnew.jpg', __FILE__ ) . '" alt="Google Fonts" /> '; ?>
					
				</div> 
			</div>
		</div>
		
		<div id="tab4" class="ui-sortable meta-box-sortables" style="display:none;">		
		<br/>			
			<div class="postbox">
				<div class="inside" style="font-size:1.2em;">				
				<?php _e('Simple Long Form est basé sur le framework <a href="http://getbootstrap.com" target="_blank">Bootstrap.js</a>. Ce qui signifie, pour ceux qui souhaitent plonger leurs mains dans le code, qu\'il est possible d\'enrichir chaque longform avec les différents composants de Bootstrap. Ces composants dynamiques sont activés en javascript : tooltip, popover, modal.','simplelongform'); ?>				
				<br/>
				<br/>				
				<?php _e('Deux types de galeries d’images, basées sur Bootstrap 3.0, sont également intégrées : les galeries pop-up et les galeries "slider". ', 'simplelongform'); ?>				
				</div>
				
				<ul style="font-size:1.1em;list-style-type:square;padding-left:4%;">					
					
					<li style="padding-bottom:10px;margin-bottom:10px;">					
					<?php _e('Démo : ', 'simplelongform'); ?> <a href="http://www.ohmybox.info/box/wordpress/" target="_blank">http://www.ohmybox.info/longformsimplelongform-new/</a>					
					</li>
					
					<li style="padding-bottom:10px;margin-bottom:10px;">					
					<?php _e('Pour en savoir plus sur la gestion des galeries photos et celle des composants Bootstrap, une documentation en français est développée sur le site de l\'auteure :', 'simplelongform'); ?>
					<br/>					
					<a href="http://www.ohmybox.info/box/wordpress/" target="_blank">http://www.ohmybox.info/box/wordpress/</a>					
					</li>	
				
					<li style="padding-bottom:10px;margin-bottom:10px;">					
					<?php _e('De la documentation en anglais est disponible sur cette page :','simplelongform'); ?>  					
					
					<a href="http://www.ohmybox.info/box/en/" target="_blank">http://www.ohmybox.info/box/en/</a>					
					</li>					
					
					<li>					
					<?php _e('Le répertoire des plugins de WordPress propose également une FAQ : ','simplelongform'); ?> 					
					
					<a href="https://wordpress.org/plugins/simple-long-form/faq/" target="_blank">					
					https://wordpress.org/plugins/simple-long-form/faq/</a>					
					</li>				
				</ul>
			</div>				
		</div>
</div>
<?php  } 

function display_twitter_element()
{ ?>
	<input type="hidden" name="update_settings" value="Y" />
	<input type="text" name="twitter_url" id="twitter_url" value="<?php echo get_option('twitter_url'); ?>" />
<?php }

function display_email() { 
	add_option( 'email', 'checked' );
	if ( get_option('email') == true ) { $display = 'checked'; }
	else { $display = ''; }
	update_option( 'email', $display );
?>
<input type="checkbox" name="email" id="email" <?php echo get_option('email'); ?> /> <?php _e('E-mail', 'simplelongform') ?>
<?php }

function display_twitter() { 
	add_option( 'twitter', 'checked' );
	if ( get_option('twitter') == true ) { $display = 'checked'; }
	else { $display = ''; }
	update_option( 'twitter', $display );
?>
<input type="checkbox" name="twitter" id="titter" <?php echo get_option('twitter'); ?> /> <?php _e('Twitter', 'simplelongform') ?>
<?php }

function display_fb() { 
add_option( 'facebook', 'checked' );
	if ( get_option('facebook') == true ) { $display = 'checked'; }
	else { $display = ''; }
	update_option( 'facebook', $display );
?>
<input type="checkbox" name="facebook" id="facebook" <?php echo get_option('facebook'); ?> /> <?php _e('Facebook', 'simplelongform') ?>
<?php }

function display_slf_linkedin() { 
add_option( 'slf_linkedin', 'checked' );
	if ( get_option('slf_linkedin') == true ) { $display = 'checked'; }
	else { $display = ''; }
	update_option( 'slf_linkedin', $display );
?>
<input type="checkbox" name="slf_linkedin" id="slf_linkedin" <?php echo get_option('slf_linkedin'); ?> /> <?php _e('LinkedIn', 'simplelongform') ?>
<?php }

function display_pinterest() { 
add_option( 'pinterest', 'checked' );
	if ( get_option('pinterest') == true ) { $display = 'checked'; }
	else { $display = ''; }
	update_option( 'pinterest', $display );
?>
<input type="checkbox" name="pinterest" id="pinterest" <?php echo get_option('pinterest'); ?> /> <?php _e('Pinterest', 'simplelongform') ?>
<?php }

function display_whatsapp() { 
add_option( 'whatsapp', 'checked' );
	if ( get_option('whatsapp') == true ) { $display = 'checked'; }
	else { $display = ''; }
	update_option( 'whatsapp', $display );
?>
<input type="checkbox" name="whatsapp" id="whatsapp" <?php echo get_option('whatsapp'); ?> /> <?php _e('WhatsApp', 'simplelongform') ?>
<?php }

function display_nextpage() { 	add_option( 'nextp', 'checked' );
	if ( get_option('nextp') == true ) { $display = 'checked'; }
	else { $display = ''; }
	update_option( 'nextp', $display );
	?>
<input type="checkbox" name="nextp" id="nextp" <?php echo get_option('nextp'); ?> /> 
<?php }

function display_ga_element() { ?>
	<textarea cols='40' rows='5' name="google_analytics" id="google_analytics"/><?php echo get_option('google_analytics'); ?></textarea>
<?php }

function display_slf_linked() { 	
	add_option( 'slf_linked', 'checked' );
	if ( get_option('slf_linked') == true ) { 
	$display = 'checked'; 
	} else { $display = ''; }
	update_option( 'slf_linked', $display );
?>
<input type="checkbox" name="slf_linked" id="slf_linked" <?php echo get_option('slf_linked'); ?> /> 
<?php }

function display_cpt() { 
	add_option( 'addcpt', 'checked' );
	if ( get_option('addcpt') == true ) { $display = 'checked'; }
	else { $display = ''; }
	update_option( 'addcpt', $display );
?>
<input type="checkbox" name="addcpt" id="addcpt" <?php echo get_option('addcpt'); ?> />
<?php }

function display_cptsearch() { 
	add_option( 'addcptsearch', 'checked' );
	if ( get_option('addcptsearch') == true ) { $display = 'checked'; }
	else { $display = ''; }
	update_option( 'addcptsearch', $display );
?>
<input type="checkbox" name="addcptsearch" id="addcptsearch" <?php echo get_option('addcptsearch'); ?> />
<?php }

function display_cpthome() { 
	add_option( 'addcpthome', 'checked' );
	if ( get_option('addcpthome') == true ) { $display = 'checked'; }
	else { $display = ''; }
	update_option( 'addcpthome', $display );
?>
<input type="checkbox" name="addcpthome" id="addcpthome" <?php echo get_option('addcpthome'); ?> />
<?php }

function display_metadata() { 
add_option( 'metadata', 'checked' );
	if ( get_option('metadata') == true ) { $display = 'checked'; }
	else { $display = 'unchecked'; }
	update_option( 'metadata', $display );
?>
<input type="checkbox" name="metadata" id="metadata" <?php echo get_option('metadata'); ?> />
<?php }

//Archives

function display_archivesintro() { ?>
	<textarea style="max-width:100%;" cols='100' rows='10' name="archivesintro" id="archivesintro"/><?php echo get_option('archivesintro'); ?></textarea>
<?php }

function display_archivesfooter() { ?>
	<textarea style="max-width:100%;" cols='100' rows='5' name="archivesfooter" id="archivesfooter"/><?php echo get_option('archivesfooter'); ?></textarea>
<?php }

function display_archivestitre() { ?>
	<textarea style="max-width:100%;" cols='100' rows='2' name="archivestitre" id="archivestitre"/><?php echo get_option('archivestitre'); ?></textarea>
<?php }

function display_archiveslist() { 
	add_option( 'archiveslist', 'checked' );
	if ( get_option('archiveslist') == true ) { $display = 'checked'; }
	else { $display = ''; }
	update_option( 'archiveslist', $display );
?>
<input type="checkbox" name="archiveslist" id="archiveslist" <?php echo get_option('archiveslist'); ?> />
<?php }

function display_archivesshadow() { 
	add_option( 'archivesshadow', 'checked' );
	if ( get_option('archivesshadow') == true ) { $display = 'checked'; }
	else { $display = ''; }
	update_option( 'archivesshadow', $display );
?>
<input type="checkbox" name="archivesshadow" id="archivesshadow" <?php echo get_option('archivesshadow'); ?> />
<?php }

function simplelongform_options_color_enqueue() {
	wp_enqueue_script( 'wp-color-picker' );
    wp_enqueue_style( 'wp-color-picker' );
}
add_action( 'admin_enqueue_scripts', 'simplelongform_options_color_enqueue' );

function display_archivescolor() { 
	?>
	<input name="archivescolor" class="meta-color" type="text" value="<?php echo get_option('archivescolor'); ?>" class="archivescolor" />	
	
	<?php echo _e('Si vous ne choisissez aucune couleur, la couleur par défaut de votre dernier long format sera appliquée à la page.', 'simplelongform');
}


function display_panel_fields_simplelongform() {
	
	add_settings_section("section", __( ' ', ' ' ), null, "slf-plugin-options");
	
	add_settings_field("twitter_url", __( 'Ajouter votre identifiant Twitter (@monNom)', 'simplelongform' ), "display_twitter_element", "slf-plugin-options", "section");
    add_settings_field("email", __( 'Boutons de partage', 'simplelongform' ), "display_email", "slf-plugin-options", "section");
    add_settings_field("twitter", __( ' ', '' ), "display_twitter", "slf-plugin-options", "section");
	add_settings_field("facebook", __( ' ', ' ' ), "display_fb", "slf-plugin-options", "section");
	add_settings_field("slf_linkedin", __( ' ', '' ), "display_slf_linkedin", "slf-plugin-options", "section");
	add_settings_field("pinterest", __( ' ', ' ' ), "display_pinterest", "slf-plugin-options", "section"); 
	add_settings_field("whatsapp", __( ' ', ' ' ), "display_whatsapp", "slf-plugin-options", "section"); 
	add_settings_field("nextp", __( 'Lien vers le longform suivant-précédent', 'simplelongform' ), "display_nextpage", "slf-plugin-options", "section");	
	add_settings_field("google_analytics", __( 'Ajouter votre code Google Analytics (<script>...</script>)', 'simplelongform' ), "display_ga_element", "slf-plugin-options", "section");	
	add_settings_field("slf_linked", __( 'Lier à WP et aux plugins (peut causer des problèmes de compatibilité)', 'simplelongform' ), "display_slf_linked", "slf-plugin-options", "section");	
	add_settings_field("addcpt", __( 'Ajouter les longforms aux pages des catégories et des tags', 'simplelongform' ), "display_cpt", "slf-plugin-options", "section");
	add_settings_field("addcptsearch", __( 'Ajouter les longforms aux résultats de recherche (si pas ajouté automatiquement par WP)', 'simplelongform' ), "display_cptsearch", "slf-plugin-options", "section");
	add_settings_field("addcpthome", __( 'Ajouter les longforms à la page d\'accueil (peut causer des problèmes de compatibilité)', 'simplelongform' ), "display_cpthome", "slf-plugin-options", "section");

	register_setting("section", "twitter_url");
    register_setting("section", "email");
	register_setting("section", "twitter");
	register_setting("section", "facebook");
	register_setting("section", "slf_linkedin");
	register_setting("section", "pinterest");	
	register_setting("section", "whatsapp");	
	register_setting("section", "nextp");
	register_setting("section", "google_analytics");
	register_setting("section", "slf_linked");
	register_setting("section", "addcpt");
	register_setting("section", "addcptsearch");
	register_setting("section", "addcpthome");
	
	add_settings_section("section-metadata", __( ' ', ' ' ), null, "slf-plugin-options-metadata");
	add_settings_field("metadata", __( 'Ajouter toutes les métadonnées', 'simplelongform' ), "display_metadata", "slf-plugin-options-metadata", "section-metadata");
	register_setting("section-metadata", "metadata");
	
	add_settings_section("section-archives", __( '', ' ' ), null, "slf-plugin-options-archives");
	add_settings_field("archivescolor", __( 'Couleur du thème', 'simplelongform' ), "display_archivescolor", "slf-plugin-options-archives", "section-archives");
	add_settings_field("archivesshadow", __( 'Ajouter un ombrage sous la navbar', 'simplelongform' ), "display_archivesshadow", "slf-plugin-options-archives", "section-archives");
	add_settings_field("archivestitre", __( 'Titre de la page d\'archives (optionnel)', 'simplelongform' ), "display_archivestitre", "slf-plugin-options-archives", "section-archives");
	add_settings_field("archiveslist", __( 'Afficher une liste déroulante des archives par année', 'simplelongform' ), "display_archiveslist", "slf-plugin-options-archives", "section-archives");
	add_settings_field("archivesintro", __( 'Intégrez un bloc de texte en tête de page (optionnel)', 'simplelongform' ), "display_archivesintro", "slf-plugin-options-archives", "section-archives");
	add_settings_field("archivesfooter", __( 'Intégrez un bloc de texte en pied de page (optionnel)', 'simplelongform' ), "display_archivesfooter", "slf-plugin-options-archives", "section-archives");
	
	register_setting("section-archives", "archivescolor");
	register_setting("section-archives", "archivesshadow");
	register_setting("section-archives", "archiveslist");
	register_setting("section-archives", "archivestitre");
	register_setting("section-archives", "archivesintro");
	register_setting("section-archives", "archivesfooter");
	
}
add_action("admin_init", "display_panel_fields_simplelongform");
?>