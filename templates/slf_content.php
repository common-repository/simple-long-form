<?php if ( ! post_password_required() ) { ?>
<article class="content <?php if ($meta_col == "select-two") { echo $large; } elseif ($meta_col == "select-three") { echo $small; } else { echo $medium; } ?> intro" >
	<h1 id="topscrollpage"><?php the_title(); ?></h1> <?php if( !empty( $meta_auteur ) ) : ?>
	<div id="author">
		<strong><?php echo $meta_auteur; ?></strong>
	</div>	<?php endif; if( !empty( $meta_photos ) ) : ?> 
	<div id="photos"> 
		<?php _e('Photos : ', 'simplelongform'); ?> <strong><?php echo $meta_photos; ?> </strong> 
	</div> <?php endif;  if ($meta_date == "select-one") : ?>
	<div id="date">
		<?php the_time(__('j F Y','simplelongform')); ?>
	</div>	<?php endif; if( !empty( $subline ) ) : ?> 		
	<div class="subline"> 
		<?php echo $subline; ?> 
	</div> <?php endif; if( !empty( $chapo ) ) : ?> 		
	<div id="chapo"> 
		<?php echo apply_filters('the_content', $chapo); ?> 
	</div> <?php endif; if( !empty( $txt ) ) : ?> 
	<div class="intro_text" >
		<?php echo apply_filters('the_content', $txt); ?> 
	</div> <?php endif; 
	
//Section 1 

if( empty( $section_img_1 ) && empty( $section_video_1 ) && !empty($section_title_un) ) : ?>
<div class="clear"></div>
<div class="nav_anchor"></div>
<div id="section_un" class="section_no_img"></div>

	<h2 id="first_title"> <?php echo $section_title_un; ?></h2>

		<section class="first"> 
			<?php echo apply_filters('the_content', $section_un); ?>
		</section>

<?php else: 

if( !empty( $section_img_1 ) ) { ?> 
</article>		

	<div id="section_un" class="chapitre"><?php if( !empty( $section_title_un ) ) : ?>
		<div class="section_title" id="sec1_title">
			<h1><span id="bloc_title_1"><?php echo $section_title_un; ?></span></h1>
		</div> <?php endif; ?> 
	</div>
	<?php if( !empty( $section1_caption ) ) : ?> 
	<div class="caption_img_slf"> 
		<?php echo $section1_caption; ?> 
	</div> <?php endif; ?> 
	<article class="content <?php if ($meta_col == "select-two") { echo $large; } elseif ($meta_col == "select-three") { echo $small; } else { echo $medium; } ?>" > 
	<?php } elseif( !empty( $section_video_1 ) ) { ?>
	</article>
	<div class="chapitre video" id="section_un">	
		<div class="bg_container">
			<?php echo html_entity_decode($section_video_1); ?>
		</div> <?php if( !empty( $section_title_un ) ) : ?>
		<div class="video_title" id="sec1_title">
			<h1><span id="bloc_title_1"><?php echo $section_title_un; ?></span></h1>
		</div> <?php endif; ?> 
	</div> <?php if( !empty( $section1_caption ) ) : ?> 
	
	<div class="caption_img_slf"> <?php
		echo $section1_caption; ?> 
	</div> <?php endif; ?> 
	
	<article class="content <?php if ($meta_col == "select-two") { echo $large; } elseif ($meta_col == "select-three") { echo $small; } else { echo $medium; } ?>" >				
	<?php }  else { echo ""; } if( !empty( $section_un ) ) : ?> 
		<section class="first"> 
			<?php echo apply_filters('the_content', $section_un); ?>
		</section>
	<div class="clear"> </div>
<?php endif; 
endif;

//Section 2 
if( empty( $section_img_2 ) && empty( $section_video_2 ) && !empty($section_title_deux) ) : ?>
	
	<div id="section_deux" class="section_no_img"></div>
	
	<h2> <?php echo $section_title_deux; ?></h2>

		<section class="first"> 
			<?php echo apply_filters('the_content', $section_deux); ?>
		</section>

<?php else: 

if( !empty( $section_img_2 ) ) { ?> 
	</article>		

	<div id="section_deux" class="chapitre">
		<?php if( !empty( $section_title_deux ) ) { ?>
			<div class="section_title" id="sec2_title">
				<h1><span id="bloc_title_2"><?php echo $section_title_deux; ?></span></h1>
			</div> <?php } ?> 
	</div>
	<?php if( !empty( $section2_caption ) ) { ?> 
	<div class="caption_img_slf"> 
		<?php echo $section2_caption; ?> 
	</div> <?php } ?> 
	<article class="content <?php if ($meta_col == "select-two") { echo $large; } elseif ($meta_col == "select-three") { echo $small; } else { echo $medium; } ?>" > 
	<?php } elseif(!empty ($section_video_2)) { ?>
	
</article>
	<div class="chapitre video" id="section_deux">	
			<div class="bg_container">
				<?php echo html_entity_decode($section_video_2); ?>
			</div>
		<?php if( !empty( $section_title_deux ) ) { ?>
			<div class="video_title" id="sec2_title">
				<h1><span id="bloc_title_2"><?php echo $section_title_deux; ?></span></h1>
			</div>
		<?php } ?> 
	</div>
	<?php 
		if( !empty( $section2_caption ) ) { ?> 
			<div class="caption_img_slf"> <?php
				echo $section2_caption; ?> 
			</div> 
		<?php } ?> 
	<article class="content <?php if ($meta_col == "select-two") { echo $large; } elseif ($meta_col == "select-three") { echo $small; } else { echo $medium; } ?>" >				
	<?php }  else { echo ""; } ?> 
	<?php if( !empty( $section_deux ) ) { ?> 
		<section class="first"> 
		<?php echo apply_filters('the_content', $section_deux); ?>
		</section>
		<div class="clear"> </div>
<?php } 
endif;

//Section 3 
if( empty( $section_img_3 ) && empty( $section_video_3 ) && !empty($section_title_trois) ) : ?>

	<div id="section_trois" class="section_no_img"></div>
	
	<h2> <?php echo $section_title_trois; ?></h2>

		<section class="first"> 
			<?php echo apply_filters('the_content', $section_trois); ?>
		</section>

<?php else: 

if( !empty( $section_img_3 ) ) { ?> 
</article>		

	<div id="section_trois" class="chapitre">
		<?php 
		if( !empty( $section_title_trois ) ) { ?>
			<div class="section_title" id="sec3_title">
				<h1><span id="bloc_title_3"><?php echo $section_title_trois; ?></span></h1>
			</div> <?php } ?> 
	</div>
	<?php if( !empty( $section3_caption ) ) { ?> 
	<div class="caption_img_slf"> 
		<?php echo $section3_caption; ?> 
	</div> <?php } ?> 
	<article class="content <?php if ($meta_col == "select-two") { echo $large; } elseif ($meta_col == "select-three") { echo $small; } else { echo $medium; } ?>" > 
	<?php } elseif(!empty($section_video_3)) {  ?>
		
	</article>
	<div class="chapitre video" id="section_trois">	
			<div class="bg_container">
				<?php echo html_entity_decode($section_video_3); ?>
			</div>
		<?php if( !empty( $section_title_trois ) ) { ?>
			<div class="video_title" id="sec3_title">
				<h1><span id="bloc_title_3"><?php echo $section_title_trois; ?></span></h1>
			</div>
		<?php } ?> 
	</div>
	<?php 
		if( !empty( $section3_caption ) ) { ?> 
			<div class="caption_img_slf"> <?php
				echo $section3_caption; ?> 
			</div> 
		<?php } ?> 
	<article class="content <?php if ($meta_col == "select-two") { echo $large; } elseif ($meta_col == "select-three") { echo $small; } else { echo $medium; } ?>" >				
	<?php }  else { echo ""; } ?> 
	<?php if( !empty( $section_trois ) ) { ?> 
		<section class="first"> 
		<?php echo apply_filters('the_content', $section_trois); ?>
		</section>
		<div class="clear"> </div>
<?php } 
endif;

//Section 4
if( empty( $section_img_4 ) && empty( $section_video_4 ) && !empty($section_title_quatre) ) : ?>

	<div id="section_quatre" class="section_no_img"></div>
	
	<h2> <?php echo $section_title_quatre; ?></h2>

		<section class="first"> 
			<?php echo apply_filters('the_content', $section_quatre); ?>
		</section>

<?php else:

if( !empty( $section_img_4 ) ) { ?> 
	</article>		

	<div id="section_quatre" class="chapitre">
		<?php if( !empty( $section_title_quatre ) ) { ?>
			<div class="section_title" id="sec4_title">
				<h1><span id="bloc_title_4"><?php echo $section_title_quatre; ?></span></h1>
			</div> <?php } ?> 
	</div>
	<?php if( !empty( $section4_caption ) ) { ?> 
	<div class="caption_img_slf"> 
		<?php echo $section4_caption; ?> 
	</div> <?php } ?> 
	<article class="content <?php if ($meta_col == "select-two") { echo $large; } elseif ($meta_col == "select-three") { echo $small; } else { echo $medium; } ?>" > 
	<?php } elseif(!empty($section_video_4)) {  ?>
	
</article>
	<div class="chapitre video" id="section_quatre">	
			<div class="bg_container">
				<?php echo html_entity_decode($section_video_4); ?>
			</div>
		<?php if( !empty( $section_title_quatre ) ) { ?>
			<div class="video_title" id="sec4_title">
				<h1><span id="bloc_title_4"><?php echo $section_title_quatre; ?></span></h1>
			</div>
		<?php } ?> 
	</div>
	<?php 
		if( !empty( $section4_caption ) ) { ?> 
			<div class="caption_img_slf"> <?php
				echo $section4_caption; ?> 
			</div> 
		<?php } ?> 
	<article class="content <?php if ($meta_col == "select-two") { echo $large; } elseif ($meta_col == "select-three") { echo $small; } else { echo $medium; } ?>" >				
	<?php }  else { echo ""; } ?> 
	<?php $section_quatre = get_post_meta( get_the_ID(), '_wp_editor_section_4', true );
		if( !empty( $section_quatre ) ) { ?> 
		<section class="first"> 
		<?php echo apply_filters('the_content', $section_quatre); ?>
		</section>
		<div class="clear"> </div>
<?php } 
endif;

//Section 5
if( empty( $section_img_5 ) && empty( $section_video_5 ) && !empty($section_title_cinq) ) : ?>

	<div id="section_cinq" class="section_no_img"></div>
	
	<h2> <?php echo $section_title_cinq; ?></h2>

		<section class="first"> 
			<?php echo apply_filters('the_content', $section_cinq); ?>
		</section>

<?php else: 
if( !empty( $section_img_5 ) ) { ?> 
	</article>		

	<div id="section_cinq" class="chapitre">
		<?php if( !empty( $section_title_cinq ) ) { ?>
			<div class="section_title" id="sec5_title">
				<h1><span id="bloc_title_5"><?php echo $section_title_cinq; ?></span></h1>
			</div> <?php } ?> 
	</div>
	<?php if( !empty( $section5_caption ) ) { ?> 
	<div class="caption_img_slf"> 
		<?php echo $section5_caption; ?> 
	</div> <?php } ?> 
	<article class="content <?php if ($meta_col == "select-two") { echo $large; } elseif ($meta_col == "select-three") { echo $small; } else { echo $medium; } ?>" > 
	<?php } elseif(!empty($section_video_5)) {  ?>
	
</article>
	<div class="chapitre video" id="section_cinq">	
			<div class="bg_container">
				<?php echo html_entity_decode($section_video_5); ?>
			</div>
		<?php if( !empty( $section_title_cinq ) ) { ?>
			<div class="video_title" id="sec5_title">
				<h1><span id="bloc_title_5"><?php echo $section_title_cinq; ?></span></h1>
			</div>
		<?php } ?> 
	</div>
	<?php 
		if( !empty( $section5_caption ) ) { ?> 
			<div class="caption_img_slf"> <?php
				echo $section5_caption; ?> 
			</div> 
		<?php } ?> 
	<article class="content <?php if ($meta_col == "select-two") { echo $large; } elseif ($meta_col == "select-three") { echo $small; } else { echo $medium; } ?>" >				
	<?php }  else { echo ""; } ?> 
	<?php if( !empty( $section_cinq ) ) { ?> 
		<section class="first"> 
		<?php echo apply_filters('the_content', $section_cinq); ?>
		</section>
		<div class="clear"> </div>
<?php } 
endif; 

//Section 6 
if( empty( $section_img_6 ) && empty( $section_video_6 ) && !empty($section_title_six) ) : ?>

	<div id="section_six" class="section_no_img"></div>
	
	<h2> <?php echo $section_title_six; ?></h2>

		<section class="first"> 
			<?php echo apply_filters('the_content', $section_six); ?>
		</section>

<?php else: 

if( !empty( $section_img_6 ) ) { ?> 
	</article>		

	<div id="section_six" class="chapitre">
		<?php if( !empty( $section_title_six ) ) { ?>
			<div class="section_title" id="sec6_title">
				<h1><span id="bloc_title_6"><?php echo $section_title_six; ?></span></h1>
			</div> <?php } ?> 
	</div>
	<?php if( !empty( $section6_caption ) ) { ?> 
	<div class="caption_img_slf"> 
		<?php echo $section6_caption; ?> 
	</div> <?php } ?> 
	<article class="content <?php if ($meta_col == "select-two") { echo $large; } elseif ($meta_col == "select-three") { echo $small; } else { echo $medium; } ?>" > 
	<?php } elseif(!empty($section_video_6)) {  ?>
	
</article>
	<div class="chapitre video" id="section_six">	
			<div class="bg_container">
				<?php echo html_entity_decode($section_video_6); ?>
			</div>
		<?php if( !empty( $section_title_six ) ) { ?>
			<div class="video_title" id="sec6_title">
				<h1><span id="bloc_title_6"><?php echo $section_title_six; ?></span></h1>
			</div>
		<?php } ?> 
	</div>
	<?php 
		if( !empty( $section6_caption ) ) { ?> 
			<div class="caption_img_slf"> <?php
				echo $section6_caption; ?> 
			</div> 
		<?php } ?> 
	<article class="content <?php if ($meta_col == "select-two") { echo $large; } elseif ($meta_col == "select-three") { echo $small; } else { echo $medium; } ?>" >				
	<?php }  else { echo ""; } ?> 
	<?php if( !empty( $section_six ) ) { ?> 
		<section class="first"> 
		<?php echo apply_filters('the_content', $section_six); ?>
		</section>
		<div class="clear"> </div>
<?php } 
endif;

//Section 7 
if( empty( $section_img_7 ) && empty( $section_video_7 ) && !empty($section_title_sept) ) : ?>

	<div id="section_sept" class="section_no_img"></div>
	
	<h2> <?php echo $section_title_sept; ?></h2>

		<section class="first"> 
			<?php echo apply_filters('the_content', $section_sept); ?>
		</section>

<?php else: 

if( !empty( $section_img_7 ) ) { ?> 
	</article>		

	<div id="section_sept" class="chapitre">
		<?php if( !empty( $section_title_sept ) ) { ?>
			<div class="section_title" id="sec7_title">
				<h1><span id="bloc_title_7"><?php echo $section_title_sept; ?></span></h1>
			</div> <?php } ?> 
	</div>
	<?php if( !empty( $section7_caption ) ) { ?> 
	<div class="caption_img_slf"> 
		<?php echo $section7_caption; ?> 
	</div> <?php } ?> 
	<article class="content <?php if ($meta_col == "select-two") { echo $large; } elseif ($meta_col == "select-three") { echo $small; } else { echo $medium; } ?>" > 
	<?php } elseif(!empty($section_video_7)) {  ?>
	
</article>
	<div class="chapitre video" id="section_sept">	
			<div class="bg_container">
				<?php echo html_entity_decode($section_video_7); ?>
			</div>
		<?php if( !empty( $section_title_sept ) ) { ?>
			<div class="video_title" id="sec7_title">
				<h1><span id="bloc_title_7"><?php echo $section_title_sept; ?></span></h1>
			</div>
		<?php } ?> 
	</div>
	<?php 
		if( !empty( $section7_caption ) ) { ?> 
			<div class="caption_img_slf"> <?php
				echo $section7_caption; ?> 
			</div> 
		<?php } ?> 
	<article class="content <?php if ($meta_col == "select-two") { echo $large; } elseif ($meta_col == "select-three") { echo $small; } else { echo $medium; } ?>" >				
	<?php }  else { echo ""; } ?> 
	<?php if( !empty( $section_sept ) ) { ?> 
		<section class="first"> 
		<?php echo apply_filters('the_content', $section_sept); ?>
		</section>
		<div class="clear"> </div>
<?php } 
endif;

//Next-prev page

	$nextpage = get_option('nextp', array() ); 
	if( !empty( $nextpage ) ) { ?>
	<div id="nextpage"> <?php 	
		$prev_post = get_previous_post();
			if($prev_post) { ?>
			<span class="prevlf">	<?php				
			   $prev_title = strip_tags(str_replace('"', '', $prev_post->post_title)); ?>
			   <span class="fa fa-angle-left"></span><span class="fa fa-angle-left"></span> 
			  <?php echo "\t" . '<a rel="prev" href="' . get_permalink($prev_post->ID) . '" title="' . $prev_title. '" class=" ">' .  $prev_title . '</a>' . "\n";
			?> </span> <?php
			}

		$next_post = get_next_post();
			if($next_post) {  ?>
			<span class="nextlf">	<?php
			   $next_title = strip_tags(str_replace('"', '', $next_post->post_title));
			   echo "\t" . '<a rel="next" href="' . get_permalink($next_post->ID) . '" title="' . $next_title. '" class=" ">' .  $next_title . '</a> <span class="fa fa-angle-right"></span><span class="fa fa-angle-right"></span>' . "\n";
			?> </span> <?php
			} ?>
	</div>
	<div class="clear"></div>
<?php } 
//Comments 
if ( comments_open() || '0' != get_comments_number() ) : ?>
	<section id="slf_comments">
		<?php comments_template( '/comments.php', true ); ?>
	</section> <?php endif; ?>
</article>
<div class="clear"></div>
<?php } else { ?> <div style="z-index:9999;text-align:center;color:black;display:block;padding-top:200px;padding-left:15%;padding-right:15%;">

<?php
	global $post;
    $label = 'pwbox-'.( empty( $post->ID ) ? rand() : $post->ID ); ?>
    <form action="<?php echo esc_url( site_url( 'wp-login.php?action=postpass', 'login_post' ) ); ?>" method="post">
		<h3><?php _e('Cet article est protégé par mot de passe :','simplelongform');?></h3>
	   <input style="margin-top:25px;width:60%;margin-bottom:-40px;" name="post_password" id="label" type="password" size="20" maxlength="20" />
	   <input type="submit" class="slf-btn btn btn-slf"  name="Submit" value="OK" />
    </form>
</div>
<?php } ?>