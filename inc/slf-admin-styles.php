<?php
/**
 *Functions ADMIN*
 ************************************************/
function slf_dashboard_css() {
		echo '<link rel="stylesheet" type="text/css" href="'. plugin_dir_url( __FILE__ ) .'css/slf-dash.css"/>';
	}
	add_action('admin_head', 'slf_dashboard_css', 1);
	
//Create post type longform

function longform_create_post_type() {

  register_post_type( 'longform',
    array(
      'labels' => array(
        'name' => __( 'Longforms'),
        'singular_name' => __( 'Longform', 'simplelongform' ),
		'add_new' => __( 'Créer', 'simplelongform' ),
        'add_new_item' => __( 'Ajouter un Longform', 'simplelongform' ),
        'edit_item' => __( 'Editer le Longform', 'simplelongform' ),
        'new_item' => __( 'Nouveau Longform', 'simplelongform' ),
        'view_item' => __( 'Voir le Longform', 'simplelongform' ),
        'search_items' => __( 'Rechercher un Longform', 'simplelongform' ),
        'not_found' => __( 'Aucun Longform trouvé', 'simplelongform' ),
        'not_found_in_trash' => __( 'Aucun Longform dans la corbeille', 'simplelongform' ),
        'parent_item_colon' => __( 'Longform (parent) :', 'simplelongform' )

      ),

      'public' 					=> true,
	  'publicly_queryable' 		=> true,
      'has_archive' 			=> true,
	  'menu_position' 			=> 5,
	  'capability_type'     	=> 'post',
	  'show_ui' 				=> true,
	  'menu_icon' 				=> 'dashicons-welcome-write-blog',
	  'rewrite' 				=> array('slug' => 'longform', 'with_front' => true),
	  'taxonomies' 				=> array( 'post_tag', 'category' ),
	  'supports' 				=> array( 'title', 'thumbnail', 'revisions', 'tags', 'comments', 'author', 'excerpt' ),

    )

  );

}

add_action( 'init', 'longform_create_post_type' );

//Flush

register_deactivation_hook( __FILE__, 'flush_rewrite_rules' );
register_activation_hook( __FILE__, 'longform_flush_rewrites' );

function longform_flush_rewrites() {

	longform_create_post_type();
	flush_rewrite_rules();

}
add_action( 'after_switch_theme', 'flush_rewrite_rules' );

//Preview (debug)

add_filter('_wp_post_revision_fields', 'add_slf_debug_preview');
function add_slf_debug_preview($fields){
   $fields["debug_preview"] = "debug_preview";
   return $fields;
}

add_action( 'edit_form_after_title', 'slf_input_debug_preview' );
function slf_input_debug_preview() {
   echo '<input type="hidden" name="debug_preview" value="debug_preview">';
}

/*
 * Extra styles and scripts
 */

function simplelongform_admin_styles(){
    global $typenow;
	$plugin_dir_uri = plugin_dir_url( __FILE__ );
		if( $typenow == 'longform' && is_admin() ) {
			wp_enqueue_style( 'simplelongform_meta_box_styles', $plugin_dir_uri . 'css/slf-admin.css' );
		}
}
add_action( 'admin_print_styles', 'simplelongform_admin_styles' );

function simplelongform_register_js() {
	global $typenow;
	$plugin_dir_uri = plugin_dir_url( __FILE__ );
		if( is_admin()  ) {
			wp_register_script( 'slf-nav', $plugin_dir_uri .  'js/slf-nav.js', array( 'jquery' ) );
			wp_enqueue_script('slf-nav');
		}
}
add_action('init', 'simplelongform_register_js');

//Image loading enqueue 

add_action( 'admin_enqueue_scripts', 'simplelongform_image_enqueue' );
function simplelongform_image_enqueue() {
	global $typenow;
	$plugin_dir_uri = plugin_dir_url( __FILE__ );
    if( $typenow == 'longform' && is_admin() ) {
        wp_enqueue_media();
        wp_register_script( 'meta-box-image',  $plugin_dir_uri . 'js/slf-box-image.js', array( 'jquery' ) );
        wp_localize_script( 'meta-box-image', 'meta_image',
            array(
                'title' => __( 'Choisir votre image', 'simplelongform' ),
                'button' => __( 'Utiliser cette image', 'simplelongform' ),
            )
        );
        wp_enqueue_script( 'meta-box-image' );
    }
}

//Loading color picker
function simplelongform_color_enqueue() {
	wp_enqueue_script( 'wp-color-picker' );
    wp_enqueue_style( 'wp-color-picker' );
}
add_action( 'admin_enqueue_scripts', 'simplelongform_color_enqueue' );

/**
 * EDITOR STYLE TINYMCE
 */
 
//Editor
if ( ! function_exists( 'simplelongform_style_select' ) ) {
	function simplelongform_style_select( $buttons ) {
		array_push( $buttons, 'styleselect' );
		return $buttons;
	}
}
add_filter( 'mce_buttons', 'simplelongform_style_select' );
if ( ! function_exists( 'simplelongform_styles_dropdown' ) ) {
	function simplelongform_styles_dropdown( $settings ) {
		$new_styles = array(
					array(
						'title'		=> __('Bouton','simplelongform'),
						'inline'	=> 'button',
						'classes'	=> 'btn-slf'
					),
					array(
						'title'		=> __('Lettrine','simplelongform'),
						'inline'	=> 'span',
						'classes'	=> 'dropcap',
					),
					array(
						'title'		=> __('Encadré (fond blanc)','simplelongform'),
						'block'	=> 'div',
						'classes'	=> 'panel',
					),
					array(
						'title'		=> __('Encadré (fond gris)','simplelongform'),
						'block'	=> 'div',
						'classes'	=> 'well',
					),
					array(
						'title'		=> __('Encadré (fond de couleur)','simplelongform'),
						'block'	=> 'div',
						'classes'	=> 'jumbotron',
					)
		);
		$settings['style_formats_merge'] = false;
		$settings['style_formats'] = json_encode( $new_styles );
		return $settings;
	}
}
add_filter( 'tiny_mce_before_init', 'simplelongform_styles_dropdown' );

add_filter( 'mce_css', 'slf_editor_style' );
	function slf_editor_style( $mce_css ){ 
		$mce_css .= ', ' . plugins_url( 'css/slf-editor-style.css', __FILE__ );
		return $mce_css;
	}

/**
 * DASHBOARD
 */

// Add custom taxonomies and custom post types counts to dashboard

add_action( 'dashboard_glance_items', 'add_slf_to_dashboard' );
function add_slf_to_dashboard() {
  $showTaxonomies = 1;
  if ($showTaxonomies) {
    $taxonomies = get_taxonomies( array( '_builtin' => false ), 'objects' );

    foreach ( $taxonomies as $taxonomy ) {
      $num_terms  = wp_count_terms( $taxonomy->name );
      $num = number_format_i18n( $num_terms );
      $text = _n( $taxonomy->labels->singular_name, $taxonomy->labels->name, $num_terms );
      $associated_post_type = $taxonomy->object_type;

      if ( current_user_can( 'manage_categories' ) ) {
        $output = '<a href="edit-tags.php?taxonomy=' . $taxonomy->name . '&post_type=' . $associated_post_type[0] . '">' . $num . ' ' . $text .'</a>';
      }
	  
      echo '<li class="taxonomy-count">' . $output . ' </li>';

    }
  }

// Custom post types counts
$post_types = get_post_types( array( '_builtin' => false ), 'objects' );

  foreach ( $post_types as $post_type ) {

    if($post_type->show_in_menu==false) {
      continue;
    }
	
    $num_posts = wp_count_posts( $post_type->name );

    $num = number_format_i18n( $num_posts->publish );

    $text = _n( $post_type->labels->singular_name, $post_type->labels->name, $num_posts->publish );

    if ( current_user_can( 'edit_posts' ) ) {
        $output = '<a href="edit.php?post_type=' . $post_type->name . '">' . $num . ' ' . $text . '</a>';
    }

	if ( $num_posts->pending > 0 ) {
		$num = number_format_i18n( $num_posts->pending );
		$text = _n( $post_type->labels->singular_name . ' pending', $post_type->labels->name . ' pending', $num_posts->pending );
		if ( current_user_can( 'edit_posts' ) ) {
		$output .= '<a class="waiting" href="edit.php?post_status=pending&post_type=' . $post_type->name . '">' . $num . ' pending</a>';
		}
    }
    echo '<li class="page-count ' . $post_type->name . '-count">' . $output . '</td>';
  }
}

function slf_dashboard_view() {
?>
   <ul>
     <?php
          global $post;
		   $args = array( 'numberposts' => 5, 'post_type' => array( 'longform' ) );
           $myposts = get_posts( $args );

                foreach( $myposts as $post ) :  setup_postdata($post); ?>
                   
				   <li><span style="padding-right:10px;width:150px;"><?php the_time('d M, G') ?> : <?php the_time('i'); ?></span>
					<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>

				<?php endforeach; ?>
   </ul>
<?php
}

function add_slf_dashboard_view() {

       wp_add_dashboard_widget( 'slf_dashboard_view', __( 'Activité des Long Form', 'simplelongform' ), 'slf_dashboard_view' );

}
add_action('wp_dashboard_setup', 'add_slf_dashboard_view' );
?>