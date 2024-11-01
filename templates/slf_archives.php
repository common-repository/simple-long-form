<?php
/*
Arcives SLF - Main template
*/
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" <?php language_attributes(); ?>>
<head>
	<meta name="msapplication-config" content="none"/>
	<meta charset="utf-8" />
	<title><?php bloginfo('name'); ?> <?php wp_title('-'); ?></title>
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<meta name="robots" content="all" />
	<meta name="revisit-After" content="1 day" />
		<!--[if lt IE 9]>
		<script src="//html5shim.googlecode.com/svn/trunk/html5.js"></script>
		<![endif]-->
	<?php wp_head(); 

	include_once('slf_header_archives.php'); 
	?>
</head>
		
<body id="top" <?php body_class(); ?>>
	
<nav class="navbar navbar-fixed-top">
    <div class="col-md-12">
        <div class="navbar-header">
			<div id="top_title">
				<?php $titre = get_option('archivestitre', array() ); if( !empty( $titre ) ) :  echo $titre;
					else: _e('Longforms (archives)', 'simplelongform'); ?>
				<?php endif; ?>
			</div>
			<a class="navbar-brand"  href="<?php echo get_site_url(); ?>"><?php bloginfo("name") ?></a>
			<a class="navbar-brand" id="home" href="<?php echo get_site_url(); ?>" target="_blank"><span class="glyphicon glyphicon-home"></span></a>
		</div>
	</div>
</nav>

<div id="container">
	
	<section class="col-lg-12 col-sm-12" id="intro">
	
	<?php 
		$liste = get_option('archiveslist');
		if (!empty ($liste) ) :
	?>
	<div id="archives">
		<ul id="list-archive">
			<li id="annee"><?php _e('Archives par année', 'simplelongform'); ?>
				<ul class="drop-menu">
					<li class="annee"><a href="<?php echo get_site_url(); ?>/longform/"><?php _e('Voir tout', 'simplelongform'); ?></a></li>
					<?php
						$years = $wpdb->get_col("SELECT DISTINCT YEAR(post_date)
						FROM $wpdb->posts WHERE post_status = 'publish'
						AND post_type = 'longform' ORDER BY post_date DESC");
						foreach($years as $year) :
									
							if ($year >='2015') :
					?>	
					
					<li class="annee"><a href="<?php echo get_site_url(); ?>/longform/<?php echo $year; ?>/"><?php echo $year; ?></a></li>

					<?php endif; endforeach; ?>
				</ul>
			</li>
		</ul>
	</div>
	<div class="clear"></div>
	
	<?php endif;
	
		if( !empty( $intro ) ) :  ?>
			<div id="introtexte">
				<?php echo $intro;  ?>
			</div>
		<?php endif;  ?>
	
	<?php $yeartop = get_query_var('year');
	
	if (!empty($yeartop)) : ?>
		<h2 id="year"><?php echo $yeartop; ?></h2>
	<?php endif; ?>
	
	<div class="row">
		
		<?php if(have_posts()) : while(have_posts()) : the_post(); ?>
				
				<div class="col col-lg-3 col-md-6 col-sm-6 col-12 scroll">
					<figure class="effeckt-caption loopimgef" data-effeckt-type="cover-push-right">
							<?php if ( has_post_thumbnail() ) : the_post_thumbnail(); endif; ?></a>
						<a href="<?php the_permalink(); ?>"><figcaption>
							<div class="effeckt-figcaption-wrap">
								<?php the_title(); ?>
							</div>
						</figcaption></a>
					</figure>
				</div>
	
	<?php endwhile; endif; 

					$next_post = get_next_posts_link();
					if (!empty( $next_post )): ?>
						  <div id="plus">
							<nav class="wp-prev-next">
							<?php next_posts_link ('+')  ?>
							
							</nav>
						</div>
					<?php endif; ?>
	</section> 
	</div>
	<div class="clear"> </div>
	
	<footer>
		<div class="col-md-12">
			<?php  $footer = get_option('archivesfooter', array() ); 
				if (!empty($footer)) : echo $footer; endif;
			?>
		</div>
	</footer>
</div>
		
	<?php wp_footer(); ?>
	</body>
</html>