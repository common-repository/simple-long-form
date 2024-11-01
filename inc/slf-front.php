<?php
/**
 *Front end functions*
 ************************************************/

add_theme_support('post-thumbnails');
add_post_type_support( 'longform', 'thumbnail' );

//Add longform to categories and search loops
$addcpt = get_option('addcpt', array() ); 
$addcptsearch = get_option('addcptsearch', array() ); 
$addcpthome = get_option('addcpthome', array() ); 

if( !empty( $addcpt ) ) :
	add_action( 'pre_get_posts', 'add_longform_tagcat');
	function add_longform_tagcat ( $query ) {
		if ( !is_admin() ) {
		
			if   ( is_category() || is_tag() && $query->is_main_query() ) {
				$query->set( 'post_type', array( 'post', 'nav_menu_item', 'longform') );
			return $query; }
			if( is_author() && $query->is_main_query() ) {
				$query->set( 'post_type', array(
				 'post', 'longform'
					));
				  return $query;
					}
		}
	}
endif;

if( !empty( $addcptsearch ) ) :

	add_action( 'pre_get_posts', 'add_longform_query');
	function add_longform_query ( $query ) {
		if ( !is_admin() && is_search() && $query->is_main_query() ) {
			$query->set('post_type', array( 'post', 'longform', 'nav_menu_item') );
		return $query; }		
	}
	
endif;

if( !empty( $addcpthome ) ) :

	add_action( 'pre_get_posts', 'add_longform_home_query');
	function add_longform_home_query ( $query ) {
		if ( !is_admin() && is_home() || is_front_page() && $query->is_main_query() ) {
			$query->set('post_type', array( 'post', 'longform', 'nav_menu_item') );
		return $query; }		
	}
	
endif;

//Slider Gallery


add_shortcode('slider', 'slider_gallery');
function slider_gallery($attr) {
	$post = get_post();
	static $instance = 0;
	$instance++;
	$attr['columns'] = 1;
	$attr['size'] = 'full';
	$attr['link'] = 'file';
	$attr['orderby'] = 'post__in';
	$attr['include'] = $attr['ids'];		
	$output = apply_filters('post_gallery', '', $attr);
	if ( $output != '' )
		return $output;
	if ( isset( $attr['orderby'] ) ) {
		$attr['orderby'] = sanitize_sql_orderby( $attr['orderby'] );
		if ( !$attr['orderby'] )
			unset( $attr['orderby'] );
	}
	extract(shortcode_atts(array(
		'order'      => 'ASC',
		'orderby'    => 'menu_order ID',
		'id'         => $post->ID,
		'gallerytag'    => 'div',
		'itemtag'    => 'div',
		'icontag'    => 'div',
		'captiontag' => 'p',
		'columns'    => 1,
		'size'       => 'thumbnail',
		'include'    => '',
		'exclude'    => ''
	), $attr));
	$id = intval($id);
	if ( 'RAND' == $order )
		$orderby = 'none';
	if ( !empty($include) ) {
		$_attachments = get_posts( array('include' => $include, 'post_status' => 'inherit', 'post_type' => 'attachment', 'post_mime_type' => 'image', 'order' => $order, 'orderby' => $orderby) );
		$attachments = array();
		foreach ( $_attachments as $key => $val ) {
			$attachments[$val->ID] = $_attachments[$key];
		}
	} elseif ( !empty($exclude) ) {
		$attachments = get_children( array('post_parent' => $id, 'exclude' => $exclude, 'post_status' => 'inherit', 'post_type' => 'attachment', 'post_mime_type' => 'image', 'order' => $order, 'orderby' => $orderby) );
	} else {
		$attachments = get_children( array('post_parent' => $id, 'post_status' => 'inherit', 'post_type' => 'attachment', 'post_mime_type' => 'image', 'order' => $order, 'orderby' => $orderby) );
	}
	if ( empty($attachments) )
		return '';
	$gallery_style = $gallery_div = '';
	if ( apply_filters( 'use_default_gallery_style', false ) )
		$gallery_style = " ";
	$gallery_div = "<div carousel slide' data-ride='carousel' role='listbox'> <div class='carousel-inner'>";
	$output = apply_filters( 'gallery_style', $gallery_style . "\n\t\t" . $gallery_div );
	$n = 0;
	foreach ( $attachments as $id => $attachment ) {
		$link = wp_get_attachment_link($id, 'full', true, false);
		$output .= "<div class='carousel-item item'>";
		$output .= "
			<div class='homepage-gallery-icon'>
				$link
	
			</div>";
		$n++;
		if ( $captiontag && trim($attachment->post_excerpt) ) {
			$output .= "
				<div class='carousel-caption'>
				" . wptexturize($attachment->post_excerpt) . "
				</div>";
		}
		$output .= "</div>";
	}
	$output .= "<ol class='carousel-indicators'>";
	$i = 0;
	$j = $n;
	while ( $i < $j ){
		$output .= " <li data-target='#myCarousel' data-slide-to='$i'></li> ";
		$i++;
	}
	$output .= "
		  </ol>
	
	<a class='right carousel-control carousel-control-prev' href='#myCarousel' role='button' data-slide='next'>
    <span class='fas fa-chevron-left' aria-hidden='true'></span>
    <span class='sr-only'>Next</span>
	</a> 
	<a class='left carousel-control carousel-control-next' href='#myCarousel' role='button' data-slide='prev'>
    <span class='fas fa-chevron-right' aria-hidden='true'></span>
    <span class='sr-only'>Previous</span>
  </a>
  </div> </div>";
    return $output;
}

function slf_feed_request($qv) {
	if (isset($qv['feed']) && !isset($qv['post_type']))
	$qv['post_type'] = array('post', 'longform');
	return $qv;
}
add_filter('request', 'slf_feed_request', 999);

//Templates calling

	function template_slf($template)
	{
		global $wp_query;
		$post_type = get_query_var('post_type');
		$meta_theme = get_post_meta( get_the_ID(), 'meta-theme', true );
			if($post_type == 'longform' )
			{							
				$template = plugin_dir_path( __FILE__ ) . '../templates/slf.php';
			}
		return $template;
	}
	
	add_filter('template_include', 'template_slf');
	
	
	function longform_archive_template( $template ) {
	 
	 $post_type = get_query_var('post_type');
		
		if ( $post_type == 'longform' && is_post_type_archive('longform') ) {
			$template = plugin_dir_path( __FILE__ ) . '../templates/slf_archives.php';
		}
	  
	  return $template;

	 }
	
	add_filter('template_include', 'longform_archive_template');
	
//Date archive

	add_action('generate_rewrite_rules', 'slf_archives_rewrite_rules');
		function slf_archives_rewrite_rules($wp_rewrite) {
		  $rules = slf_date_archives('longform', $wp_rewrite);
		  $wp_rewrite->rules = $rules + $wp_rewrite->rules;
		  return $wp_rewrite;
		}

	function slf_date_archives($cpt, $wp_rewrite) {
	  $rules = array();
	 
	  $post_type = get_post_type_object($cpt);
	  $slug_archive = $post_type->has_archive;
	  if ($slug_archive === false) return $rules;
	  if ($slug_archive === true) {
		$slug_archive = isset($post_type->rewrite['slug']) ? $post_type->rewrite['slug'] : $post_type->name;
	}
 
  $dates = array(
    array(
      'rule' => "([0-9]{4})/([0-9]{1,2})/([0-9]{1,2})",
      'vars' => array('year', 'monthnum', 'day')),
    array(
      'rule' => "([0-9]{4})/([0-9]{1,2})",
      'vars' => array('year', 'monthnum')),
    array(
      'rule' => "([0-9]{4})",
      'vars' => array('year'))
  );
 
  foreach ($dates as $data) {
    $query = 'index.php?post_type='.$cpt;
    $rule = $slug_archive.'/'.$data['rule'];
 
    $i = 1;
    foreach ($data['vars'] as $var) {
      $query.= '&'.$var.'='.$wp_rewrite->preg_index($i);
      $i++;
    }
 
    $rules[$rule."/?$"] = $query;
    $rules[$rule."/feed/(feed|rdf|rss|rss2|atom)/?$"] = $query."&feed=".$wp_rewrite->preg_index($i);
    $rules[$rule."/(feed|rdf|rss|rss2|atom)/?$"] = $query."&feed=".$wp_rewrite->preg_index($i);
    $rules[$rule."/page/([0-9]{1,})/?$"] = $query."&paged=".$wp_rewrite->preg_index($i);
  }
 
  return $rules;
}

//Deregister styles and scripts
function unhook_theme_style_slf() {
	global $wp_query;
	$post_type = get_query_var('post_type');
	if ( $post_type == 'longform' ) {
		wp_dequeue_style( 'style' );
		wp_deregister_style( 'style' );
		wp_register_style( 'style', false );
		wp_dequeue_style( 'print' );
		wp_deregister_style( 'print' );
		wp_dequeue_style( 'normalize' );
		wp_deregister_style( 'normalize' );
		wp_dequeue_style( 'bootstrap' );
		wp_deregister_style( 'bootstrap' );
		wp_dequeue_style( 'font-awesome' );
		wp_deregister_style( 'font-awesome' );
		wp_dequeue_style( 'wp-block-library-css' );
		wp_deregister_style( 'wp-block-library-css' );
		wp_dequeue_style( 'genericons' );
		wp_deregister_style( 'genericons' );
		wp_dequeue_style( 'twentysixteen-style' );
		wp_deregister_style( 'twentysixteen-style' );
		wp_dequeue_style( 'weta-style-css' );
		wp_deregister_style( 'weta-style-css' );
		wp_dequeue_script( 'mainscript' );
		wp_deregister_script( 'mainscript' );
		wp_deregister_script( 'main' );
		wp_dequeue_script( 'main' );
		wp_dequeue_script( 'bootstrapmin' );
		wp_deregister_script( 'bootstrapmin' );
		wp_dequeue_script( 'weta-script' );
		wp_deregister_script( 'weta-script' );
		wp_dequeue_script( 'weta-flex-slider-style' );
		wp_deregister_script( 'weta-flex-slider-style' );
		wp_dequeue_script( 'menu' );
		wp_deregister_script( 'menu' );
		wp_dequeue_script( 'custom' );
		wp_deregister_script( 'custom' );
		wp_dequeue_script( 'custom.min' );
		wp_deregister_script( 'custom.min' );
		wp_dequeue_style( 'wp-block-library-css' );
		wp_deregister_style( 'wp-block-library-css' );
		wp_dequeue_style( 'wp-block-library-theme-css' );
		wp_deregister_style( 'wp-block-library-theme-css' );
			remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
			remove_action( 'admin_enqueue_scripts', 'print_emoji_detection_script' );
			remove_action( 'wp_print_styles', 'print_emoji_styles' );
			remove_action( 'wp_print_styles', 'wp-block-library-css' );
			remove_action( 'admin_print_styles', 'print_emoji_styles' ); 
		wp_enqueue_script ('jquery');
		wp_register_style( 'bootstrap', plugin_dir_url( __FILE__ ) . '../css/bootstrap.min.css');
		wp_enqueue_style( 'bootstrap');
		wp_register_style( 'fawesome', plugin_dir_url( __FILE__ ) . '../fonts/font-awesome/css/fontawesome.min.css');
		wp_enqueue_style( 'fawesome');
		wp_register_script('popper-js', plugin_dir_url( __FILE__ ) . '../js/popper.js',array('jquery'),null,true);
		wp_enqueue_script ('popper-js');
		wp_register_script('bootstrap-js', plugin_dir_url( __FILE__ ) . '../js/bootstrap.min.js',array('jquery'),null,true);
		wp_enqueue_script ('bootstrap-js');
	}
	if ( $post_type == 'longform' && !is_archive('longform' ) ) {
		wp_register_style( 'slf-styles',  plugin_dir_url( __FILE__ ) . '../css/style_slf.css' );
		wp_enqueue_style( 'slf-styles' );
		wp_register_script('classie-js', plugin_dir_url( __FILE__ ) . '../js/classie.js',array('jquery'),null,true);
		wp_enqueue_script ('classie-js');
		wp_register_script('loader-js', plugin_dir_url( __FILE__ ) . '../js/jquery.classyloader.min.js',array('jquery'),null,true);
		wp_enqueue_script ('loader-js');
		wp_register_script('parallax-js', plugin_dir_url( __FILE__ ) . '../js/parallax.min.js',array('jquery'),null,true);
		wp_enqueue_script ('parallax-js');
		wp_register_script('slf-js', plugin_dir_url( __FILE__ ) . '../js/slf.js',array('jquery'),null,true);
		wp_enqueue_script ('slf-js');
		wp_register_script('backstretch-js', plugin_dir_url( __FILE__ ) . '../js/jquery.backstretch.min.js',array('jquery'),null,true);
		wp_enqueue_script ('backstretch-js');
			if ( comments_open() ) {
				wp_register_script('comments', plugin_dir_url( __FILE__ ) . '../js/comments.js',array('jquery'),null,true);
				wp_enqueue_script ('comments');	
			}
	}
	if ( !is_category() && !is_tag() && is_post_type_archive('longform') ) {
		wp_dequeue_script( 'infinite_scroll' );
		wp_deregister_script( 'infinite_scroll' );
		wp_dequeue_script( 'scroll' );
		wp_deregister_script( 'scroll' );
		wp_register_style( 'effekt-css', plugin_dir_url( __FILE__ ) . '../css/effekt.css');
		wp_enqueue_style( 'effekt-css');
		wp_register_script('scroll-js', plugin_dir_url( __FILE__ ) . '../js/scroll.js',array('jquery'),null,true);
		wp_enqueue_script ('scroll-js');
		wp_register_script('scroller-js', plugin_dir_url( __FILE__ ) . '../js/scroller.js',array('jquery'),null,true);
		wp_enqueue_script ('scroller-js');
		wp_register_style( 'archive-css', plugin_dir_url( __FILE__ ) . '../css/archive.css');
		wp_enqueue_style( 'archive-css');
	}
}
add_action( 'wp_enqueue_scripts', 'unhook_theme_style_slf', 9999 );
?>