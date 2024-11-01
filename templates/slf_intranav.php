<nav class="navbar <?php if ($bar_sup == "select-two") { ?>navbar-fixed-bottom<?php } else { ?>navbar-fixed-top<?php } ?>">
    <div class="col-md-12">
        <div class="navbar-header">
				
			<?php if ($burger_style == 'select-two') :
				if ( $burger == "select-one" ) : ?>
					<span class="togglenav" id="showd"><span class="fas fa-bars"></span></span>
					<span class="togglenav" id="closed"><span class="fas fa-times"></span></span>
				<?php else: ?>
					<span class="togglenav" id="show"><span class="fas fa-bars"></span></span>
				<?php endif; 
			else : 
				if ( $burger == "select-one" ) : ?>
					<button class="togglenav" id="showd"><span class="fas fa-bars"></span></button>
					<button class="togglenav" id="closed"><span class="fas fa-times"></span></button>
				<?php else: ?>
					<button class="togglenav" id="show"><span class="fas fa-bars"></span></button>
				<?php endif; 
			endif; 
			
			if ( $bar_site == 'select-one' ) : ?>
			<a class="navbar-brand"  href="<?php echo get_site_url(); ?>"><?php bloginfo("name") ?></a>
			<?php endif; ?> 
			<?php if ( $bar_title == 'select-one' ) : ?>
				<div id="top_title"><?php the_title(); ?></div> <?php endif; ?>
		</div>
		<div class="navbar-right right-net">
			<?php include_once('slf_networks.php'); ?>
		</div>
	</div>
</nav>

<?php if ( $burger == "select-one" ) { ?>	
<nav id="menuleft" class="nav_titles">
	<h4><?php the_title(); ?></h4>
	<ul id="navtop" class="nav" role="tablist">
		<?php if( !empty( $section_un ) ) : ?> 
		<li>
			<a href="#section_un" class="scrollTo"><?php echo $section_title_un; ?></a>
		</li> <?php endif; if( !empty( $section_deux ) ) : ?> 
		<li>
			<a href="#section_deux" class="scrollTo"> <?php echo $section_title_deux; ?></a>
		</li> <?php endif; if( !empty( $section_trois ) ) : ?> 
		<li>
			<a href="#section_trois" class="scrollTo"><?php echo $section_title_trois; ?></a>
		</li> <?php endif; if( !empty( $section_quatre ) ) : ?> 
		<li>
			<a href="#section_quatre" class="scrollTo"> <?php echo $section_title_quatre; ?></a>
		</li> <?php endif; if( !empty( $section_cinq ) ) : ?> 
		<li>
			<a href="#section_cinq" class="scrollTo"><?php echo $section_title_cinq; ?> </a>
		</li> <?php endif; if( !empty( $section_six ) ) : ?> 
		<li>
			<a href="#section_six" class="scrollTo"><?php echo $section_title_six; ?></a>
		</li> <?php endif; if( !empty( $section_sept ) ) : ?> 
		<li>
			<a href="#section_sept" class="scrollTo"><?php echo $section_title_sept; ?></a>
		</li> <?php endif; ?> 
	</ul>
</nav> <?php } elseif ($burger == "select-two") { ?>	
<nav id="side_nav" class="nav_circles <?php if ($bar_sup == "select-one") {?>burger_top<?php } else {?>burger_bottom<?php } ?>">
	<ul id="navtop" class="nav" role="tablist">
		<?php if( !empty( $section_un ) ) : ?> 
		<li class="nav-item">
			<a href="#section_un" data-toggle="tooltip" data-placement="bottom" title="<?php echo $section_title_un; ?>" class="scrollTo"><span class="fas fa-circle"></span></a>
		</li> <?php endif; if( !empty( $section_deux ) ) : ?> 
		<li class="nav-item">
			<a href="#section_deux" data-toggle="tooltip" data-placement="bottom" title="<?php echo $section_title_deux; ?>" class="scrollTo"><span class="fas fa-circle"></span></a>
		</li> <?php endif; if( !empty( $section_trois ) ) : ?> 
		<li class="nav-item">
			<a href="#section_trois" data-toggle="tooltip" data-placement="bottom" title="<?php echo $section_title_trois; ?>" class="scrollTo"> <span class="fas fa-circle"></span> </a>
		</li> <?php endif; if( !empty( $section_quatre ) ) : ?> 
		<li class="nav-item">
			<a href="#section_quatre" data-toggle="tooltip" data-placement="bottom" title="<?php echo $section_title_quatre; ?>" class="scrollTo"> <span class="fas fa-circle"></span> </a>
		</li>
		<?php endif; if( !empty( $section_cinq ) ) : ?> 
		<li class="nav-item">
			<a href="#section_cinq" data-toggle="tooltip" data-placement="bottom" title="<?php echo $section_title_cinq; ?>" class="scrollTo"> <span class="fas fa-circle"></span> </a>
		</li> <?php endif; if( !empty( $section_six ) ) : ?> 
		<li class="nav-item">
			<a href="#section_six" data-toggle="tooltip" data-placement="bottom" title="<?php echo $section_title_six; ?>" class="scrollTo"> <span class="fas fa-circle"></span> </a>
		</li> <?php endif; if( !empty( $section_sept ) ) : ?> 
		<li class="nav-item">
			<a href="#section_sept" data-toggle="tooltip" data-placement="bottom" title="<?php echo $section_title_sept; ?>" class="scrollTo"> <span class="fas fa-circle"></span> </a>
		</li> <?php endif; ?> 
	</ul>
</nav>
<?php } ?>
