<?php
/*
Template Name: Long form - Main template
*/
?>
<!DOCTYPE html>
<?php $metadata = get_option('metadata', array() );
if (!empty ($metadata) ) : ?>
<html xmlns="https://www.w3.org/1999/xhtml" xmlns:fb="https://www.facebook.com/2008/fbml" <?php language_attributes(); ?>>
<?php else: ?>
<html xmlns="https://www.w3.org/1999/xhtml" <?php language_attributes(); ?>>
<?php endif; ?>
<head>
	<meta name="msapplication-config" content="none"/>
	<meta charset="utf-8" />
	<meta name="robots" content="all" />
	<meta name="revisit-After" content="1 day" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
	<meta name="robots" content="all" />
	<meta name="revisit-After" content="1 day" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<!--[if lt IE 9]>
		<script src="//html5shim.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->
	
<?php 
if (!empty ($metadata) ) :
//Open Graph
	$twitter_url    = get_permalink();
	$twitter_title  = get_the_title();
	$meta_subline = get_post_meta( get_the_ID(), 'meta-subline', true ); 
	$imgcheck = get_post_thumbnail_id();
	$twitterlink = get_option('twitter_url'); ?>
	<meta property="og:title" content="<?php the_title(); ?>"/>
<?php if(!empty($meta_subline)) : ?>
	<meta property="og:description" content="<?php echo $meta_subline; ?>"/>
<?php endif; ?>
	<meta property="og:url" content="<?php the_permalink(); ?>"/>
	<meta property="og:image" content="<?php $thumb_id = get_post_thumbnail_id(); $thumb_url = wp_get_attachment_image_src($thumb_id,'thumbnail-size', true); echo $thumb_url[0]; ?>" />
	<meta property="og:type" content="<?php echo "article"; ?>"/>
<?php //Twitter Card ?>		
	<meta name="twitter:url" value="<?php echo $twitter_url; ?>" />
	<meta name="twitter:title" value="<?php echo $twitter_title; ?>" />
<?php if(!empty($meta_subline)) : ?>
	<meta name="twitter:description" value="<?php echo $meta_subline; ?>" />
<?php endif; 
if(!empty($imgcheck)) : ?>
	<meta name="twitter:card" value="summary_large_image" />
	<meta name="twitter:image" value="<?php  $thumb_id = get_post_thumbnail_id(); $thumb_url = wp_get_attachment_image_src($thumb_id,'thumbnail-size', true); echo $thumb_url[0]; ?>" />
<?php endif; 
if(!empty($twitterlink)) : ?>
	<meta name="twitter:site" value="<?php echo  $options = get_option('twitter_url', array() ); ?>" />
	<meta name="twitter:creator" value="<?php echo  $options = get_option('twitter_url', array() ); ?>" />
<?php endif;
//Dublin Core
	if (has_category()) : 
		$cat = get_the_category();
		$category = $cat[0]->cat_name;
	endif;
	$author = get_post_meta( get_the_ID(), 'meta-auteur', true );
	$site_lang = get_bloginfo('language');
if ( !empty($author) ) : ?>	
	<meta name="DC.Creator" content="<?php echo $author; ?>">
<?php endif; if (has_category()) : ?>
	<meta name="DC.Subject" content="<?php echo $category; ?>">
<?php endif; ?>
	<meta name="DC.Title" content="<?php the_title(); ?>">
<?php if(!empty($meta_subline)) : ?>
	<meta name="DC.Description" content="<?php echo $meta_subline; ?>">
<?php endif; ?>
	<meta name="DC.Identifier" content="<?php the_permalink(); ?>">
	<meta name="DC.Date" content="<?php the_time('Y-m-d'); ?>">
	<meta name="DC.Publisher" content="<?php echo get_bloginfo('name'); ?>">
	<meta name="DC.Language" scheme="UTF-8" content="<?php echo $site_lang; ?>">
<?php endif;

$option_wp = get_option('slf_linked', array() );	
if( !empty( $option_wp ) ) :
	wp_head(); ?>
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
<?php else :
	$bootstrap = plugin_dir_url( __FILE__ ) . '../css/bootstrap.min.css'; 
	$css = plugin_dir_url( __FILE__ ) . '../css/style_slf.css'; 
	$print = plugin_dir_url( __FILE__ ) . '../css/print.css';
	$normalize = plugin_dir_url( __FILE__ ) . '../css/normalize.css'; ?>
		<title><?php the_title(); ?></title>	
		<link rel="stylesheet" href="<?php echo $bootstrap; ?>" media="all" />
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
		<link rel="stylesheet" href="<?php echo $normalize; ?>" media="screen" />
		<link rel="stylesheet" href="<?php echo $css; ?>" media="screen" />
		<link rel="stylesheet" href="<?php echo $print; ?>" media="print" />	
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
		
	<?php endif; 
	include('slf_header.php'); ?>
</head>

<body id="top" <?php body_class(); ?> data-spy="scroll" data-target="#navtop" data-offset="70">
	
	<div class="page_loader"> 
		<div id="inner"> 
			<h1><?php the_title(); ?></h1>
				<p id="load_p">
					<?php if( $load_auteur == 'select-one' ) : ?> <strong> <?php echo $meta_auteur; ?> </strong> <?php endif; ?>
				</p> 
				<canvas class="loader"></canvas>
		</div>
	</div>
<?php //Content ?>
	<div id="progression">
		<div id="barre"></div>
	</div>

<?php include_once('slf_intranav.php');  ?>

<div id="container" class="<?php if ( $intro == 'select-one' ) { ?>intro-effect-push container<?php } elseif ( $intro == 'select-two' ) { ?>intro-effect-jam3<?php } else { ?>intro-effect-push container<?php } ?>">
	
	<header class="header">	
		<div class="bg-img"> <?php if( !empty( $meta_top ) ) { ?>	
		</div>
		<div class="title title_home col-md-10 col-sm-10">	
			<h1><span class="bloc_title_top"><?php the_title(); ?></span></h1>
		</div> <?php } elseif(!((get_post_meta($post->ID, 'meta-video', TRUE))=='')) { $meta_video = get_post_meta( get_the_ID(), 'meta-video',true );
				if( !empty( $meta_video ) ) : echo html_entity_decode($meta_video); endif; ?>
			</div>
			<div class="title_bg_une col-lg-12">
				<h1><span class="bloc_title_top"><?php the_title(); ?></span></h1>
			</div> <?php } else { ?>
			<div class="title <?php if ($meta_col == "select-two") { echo $large; } elseif ($meta_col == "select-three") { echo $small; } else { echo $medium; } ?>">	
				<h1><span class="bloc_title_top"><?php the_title(); ?></span></h1>
			</div>
		</div> <?php }	if ( $intro == 'select-three' ) { ?>
			<div class="bg-img"></div> <?php } ?>
	</header>
	
	<div class="clear"> </div>
		
		<button class="trigger"><?php if ( $meta_trigger == 'select-three' || $meta_trigger == 'select-four' ) { ?>
			<span class="fas fa-angle-down"></span> <?php } elseif ( $meta_trigger == 'select-two' || $meta_trigger == 'select-five' ) {  ?>
			<span class="fas fa-chevron-down"></span> <?php } elseif ( $meta_trigger == 'select-six' ) { ?>
			<span class="fas fa-arrow-down"></span>
			<?php } ?>
		</button>			
</div>
<?php //Container 
include_once('slf_content.php'); 
//Modal ?>
<div id="slf_modal" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">×</button>
			</div>
			
			<div class="modal-body">						
				<p class="modal-body-text">   </p>
			</div>
			
			<div class="modal-footer">								
				<button class="btn btn-default btnmodal" data-dismiss="modal"><?php _e('Fermer', 'simplelongform') ?></button>
			</div>
		</div>
	</div>
</div>

<?php if( !empty( $footer ) ) : ?> 
		<footer>
			<div id="footer_lf" class="container col-md-12"> 
				<?php echo apply_filters('the_content', $footer); ?> 
			</div> 
		</footer> 
<?php endif; ?> 	

	<div id="up">
		<a href="#top" class="toptop">
		<?php if ( $meta_trigger == 'select-three' || $meta_trigger == 'select-four' ) { ?>
		<span class="fas fa-angle-up"></span>
			<?php } elseif ( $meta_trigger == 'select-six') { ?> 
		<span class="fas fa-arrow-up"></span>	
		<?php } else { ?>
		<span class="fas fa-chevron-up"></span>
		<?php } ?>
		</a>
	</div>
<?php //Footer
	if( !empty( $option_wp ) ) : 
		wp_footer();  
	else:
$bootstrap = plugin_dir_url( __FILE__ ) . '../js/bootstrap.min.js'; 
$classie = plugin_dir_url( __FILE__ ) . '../js/classie.js'; 
$loader = plugin_dir_url( __FILE__ ) . '../js/jquery.classyloader.min.js'; 
$parallax = plugin_dir_url( __FILE__ ) . '../js/parallax.min.js'; 
$slf = plugin_dir_url( __FILE__ ) . '../js/slf.js'; 
$back = plugin_dir_url( __FILE__ ) . '../js/jquery.backstretch.min.js';
$comments = plugin_dir_url( __FILE__ ) . '../js/comments.js'; ?>
	<script type="text/javascript" src="<?php echo $bootstrap; ?>" defer></script>
	<script type="text/javascript" src="<?php echo $classie; ?>" defer></script>
	<script type="text/javascript" src="<?php echo $loader; ?>" defer></script>
	
	<?php endif; if ( $meta_loader_animate == 'select-one' ) : ?>
		<script type="text/javascript">
			jQuery(window).load(function() {$(".page_loader").fadeOut("slow").animate({top:-1600},1200);})
		</script> <?php else : ?>
		<script type="text/javascript">
			jQuery(window).load(function() {$(".page_loader").animate({top:-1600},1200);})
		</script>
	<?php endif; ?>
	
	<?php if ( !empty($slf) ) : ?>
	<script type="text/javascript" src="<?php echo $slf; ?>" defer></script>
	<?php endif; if ( !empty($parallax) ) : ?>
	<script type="text/javascript" src="<?php echo $parallax; ?>" defer></script>
	<?php endif; if ( !empty($back) ) : ?>
	<script type="text/javascript" src="<?php echo $back; ?>" defer></script>
	<?php endif; ?>
	
	<?php if ( comments_open() && !empty($comments) ) : ?>
		<script type="text/javascript" src="<?php echo $comments; ?>" defer></script>
	<?php endif; ?>
	
	<script>
		jQuery(document).ready(function() {
<?php if ( !empty($meta_top) ) : ?>
		jQuery(".bg-img").backstretch("<?php echo $meta_top; ?>");
<?php endif; 
	  if ( !empty($section_img_1) ) : ?>
		jQuery('#section_un').parallax({imageSrc: '<?php echo $section_img_1; ?>'});
<?php endif; 
	  if ( !empty($section_img_2) ) : ?>
		jQuery('#section_deux').parallax({imageSrc: '<?php echo $section_img_2; ?>'});
<?php endif; 
	  if ( !empty($section_img_3) ) : ?>
		jQuery('#section_trois').parallax({imageSrc: '<?php echo $section_img_3; ?>'});
<?php endif; 
	  if ( !empty($section_img_4) ) : ?>
		jQuery('#section_quatre').parallax({imageSrc: '<?php echo $section_img_4; ?>'});
<?php endif; 
	  if ( !empty($section_img_5) ) : ?>
		jQuery('#section_cinq').parallax({imageSrc: '<?php echo $section_img_5; ?>'});
<?php endif; 
	  if ( !empty($section_img_6) ) : ?>
		jQuery('#section_six').parallax({imageSrc: '<?php echo $section_img_6; ?>'});
<?php endif; 
	  if ( !empty($section_img_7) ) : ?>
		jQuery('#section_sept').parallax({imageSrc: '<?php echo $section_img_7; ?>'});
<?php endif; ?>
		});
	</script>
	<?php $options = get_option('google_analytics', array() ); if( !empty( $options ) ) : 
		echo $options; 
	endif; ?>	
</body>
</html>