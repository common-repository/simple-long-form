<!--CSS-->	

	<?php
	$meta_font = get_post_meta( get_the_ID(), 'meta-font', true );	
	$meta_font_title = get_post_meta( get_the_ID(), 'meta-font_title', true );	
	$meta_bar = get_post_meta( get_the_ID(), 'meta-bar', true );	
	$meta_font_size = get_post_meta( get_the_ID(), 'meta-font-size', true );	
	$meta_color = get_post_meta( get_the_ID(), 'meta-color', true );	
	$meta_text_color = get_post_meta( get_the_ID(), 'meta-text-color', true );	
	$bar_sup = get_post_meta( get_the_ID(), 'bar-sup', true );
	$bar_title = get_post_meta( get_the_ID(), 'bar-title', true );	
	$top_bar = get_post_meta( get_the_ID(), 'top-bar', true );	
	$reseaux = get_post_meta( get_the_ID(), 'reseaux', true );	
	$body_color = get_post_meta( get_the_ID(), 'body-color', true );	
	
	if( !empty( $meta_font)) {?> 
  <?php if ($meta_font == "select-six") { ?> <link href="https://fonts.googleapis.com/css?family=Arvo:400,700" rel="stylesheet"> 
  <?php } else if ($meta_font == "select-seven") { ?> <link href="https://fonts.googleapis.com/css?family=Droid+Sans:400,700" rel="stylesheet">  
  <?php } else if ($meta_font == "select-eight") { ?> <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,700" rel="stylesheet"> 
  <?php } else if ($meta_font == "select-nine") { ?> <link href="https://fonts.googleapis.com/css?family=Roboto:400,700" rel="stylesheet"> 
  <?php } else if ($meta_font == "select-ten") { ?> <link href="https://fonts.googleapis.com/css?family=Roboto+Slab:400,700" rel="stylesheet"> 
  <?php } else if ($meta_font == "select-eleven") { ?> <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet"> 
  <?php } else if ($meta_font == "select-twelve") { ?> <link href="https://fonts.googleapis.com/css?family=Ubuntu+Condensed" rel="stylesheet"> 
  <?php } else if ($meta_font == "select-thirteen") { ?> <link href="https://fonts.googleapis.com/css?family=Inconsolata" rel="stylesheet"> 
  <?php } else if ($meta_font == "select-fourteen") { ?> <link href="https://fonts.googleapis.com/css?family=Playfair+Display" rel="stylesheet"> 
  <?php } else if ($meta_font == "select-fifteen") { ?> <link href="https://fonts.googleapis.com/css?family=Roboto:300" rel="stylesheet"> 
  <?php } else if ($meta_font == "select-sixteen") { ?> <link href="https://fonts.googleapis.com/css?family=Bree+Serif" rel="stylesheet">  
  <?php } else if ($meta_font == "select-seventeen") { ?> <link href="https://fonts.googleapis.com/css?family=Oswald" rel="stylesheet">   
  <?php } else if ($meta_font == "select-heighteen") { ?> <link href="https://fonts.googleapis.com/css?family=Oswald:700" rel="stylesheet">   
  <?php } else if ($meta_font == "select-nineteen") { ?> <link href="https://fonts.googleapis.com/css?family=Lobster" rel="stylesheet">   
  <?php } else if ($meta_font == "select-twenty") { ?> <link href="https://fonts.googleapis.com/css?family=Lobster+Two" rel="stylesheet">   
  <?php } else if ($meta_font == "select-twenty-one") { ?> <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">  
  <?php } else if ($meta_font == "select-twenty-two") { ?> <link href="https://fonts.googleapis.com/css?family=Montserrat+Alternates" rel="stylesheet">  
  <?php } else if ($meta_font == "select-twenty-three") { ?> <link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">
  <?php } 
 }
  if( !empty( $meta_font_title) && $meta_font != $meta_font_title ) {?> 
  <?php if ($meta_font_title == "select-one") { ?>  <link href="https://fonts.googleapis.com/css?family=Droid+Sans:400,700" rel="stylesheet">  
  <?php } else if ($meta_font_title == "select-two") { ?> <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,700" rel="stylesheet"> 
  <?php } else if ($meta_font_title  == "select-three") { ?> <link href="https://fonts.googleapis.com/css?family=Arvo:400,700" rel="stylesheet"> 
  <?php } else if ($meta_font_title == "select-four") { ?>  <link href="https://fonts.googleapis.com/css?family=Roboto:400,700" rel="stylesheet"> 
  <?php } else if ($meta_font_title == "select-five") { ?> <link href="https://fonts.googleapis.com/css?family=Roboto+Slab:400,700" rel="stylesheet"> 
  <?php } else if ($meta_font_title == "select-six") { ?> <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet"> 
  <?php } else if ($meta_font_title == "select-seven") { ?> <link href="https://fonts.googleapis.com/css?family=Ubuntu+Condensed" rel="stylesheet"> 
  <?php } else if ($meta_font_title == "select-eight") { ?> <link href="https://fonts.googleapis.com/css?family=Inconsolata" rel="stylesheet"> 
  <?php } else if ($meta_font_title == "select-nine") { ?> <link href="https://fonts.googleapis.com/css?family=Playfair+Display" rel="stylesheet"> 
  <?php } else if ($meta_font_title == "select-ten") { ?> <link href="https://fonts.googleapis.com/css?family=Raleway:600" rel="stylesheet"> 
  <?php } else if ($meta_font_title == "select-eleven") { ?> <link href="https://fonts.googleapis.com/css?family=Roboto:300" rel="stylesheet"> 
  <?php } else if ($meta_font_title == "select-twelve") { ?> <link href="https://fonts.googleapis.com/css?family=Bree+Serif" rel="stylesheet"> 
  <?php } else if ($meta_font_title == "select-thirteen") { ?> <link href="https://fonts.googleapis.com/css?family=Oswald" rel="stylesheet">  
  <?php } else if ($meta_font_title == "select-fourteen") { ?> <link href="https://fonts.googleapis.com/css?family=Oswald:700" rel="stylesheet">  
  <?php } else if ($meta_font_title == "select-fifteen") { ?> <link href="https://fonts.googleapis.com/css?family=Lobster" rel="stylesheet"> 
  <?php } else if ($meta_font_title == "select-sixteen") { ?> <link href="https://fonts.googleapis.com/css?family=Lobster+Two" rel="stylesheet">
  <?php } else if ($meta_font_title == "select-seventeen") { ?> <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet"> 
  <?php } else if ($meta_font_title == "select-heighteen") { ?> <link href="https://fonts.googleapis.com/css?family=Montserrat+Alternates" rel="stylesheet">  
  <?php } 
 } ?> 

 <style> 	
	<?php if( !empty( $body_color ) ) { ?>html,body{background: <?php echo $body_color;?>} 
 <?php } if( !empty( $meta_text_color ) ) { ?>html, body {color: <?php echo $meta_text_color;?>;} 
 <?php } 
 if( !empty( $meta_font ) ) { 
 if ($meta_font == "select-one") { ?> html, body {font-family: Arial, Helvetica, sans-serif;} 
  <?php } else if ($meta_font == "select-two") { ?> html, body {font-family: Georgia, serif;font-size:1.1em;} .section_title {font-size: 3.8em;} 
  <?php } else if ($meta_font == "select-three") { ?> html, body {font-family: Tahoma, Geneva, sans-serif;} 
  <?php } else if ($meta_font == "select-four") { ?> html, body {font-family: "Times New Roman", Times, serif;font-size:1.1em;} .section_title {font-size: 3.8em;} 
  <?php } else if ($meta_font == "select-five") { ?> html, body {font-family: Verdana, Geneva, sans-serif;} 
  <?php } else if ($meta_font == "select-six") { ?> html, body {font-family: 'Arvo', serif;} 
  <?php } else if ($meta_font == "select-seven") { ?> html, body {font-family: 'Droid Sans', sans-serif;} 
  <?php } else if ($meta_font == "select-eight") { ?> html, body {font-family: 'Open Sans', sans-serif;} 
  <?php } else if ($meta_font == "select-nine") { ?> html, body {font-family: 'Roboto', sans-serif;} 
  <?php } else if ($meta_font == "select-ten") { ?> html, body {font-family:'Roboto Slab', serif;} 
  <?php } else if ($meta_font == "select-eleven") { ?> html, body {font-family: 'Lato', sans-serif;} 
  <?php } else if ($meta_font == "select-twelve") { ?> html, body {font-family: 'Ubuntu Condensed', sans-serif;} 
  <?php } else if ($meta_font == "select-thirteen") { ?> html, body {font-family: 'Inconsolata', cursive;} 
  <?php } else if ($meta_font == "select-fourteen") { ?> html, body {font-family: 'Playfair Display', serif;} 
  <?php } else if ($meta_font == "select-fifteen") { ?> html, body {font-family: 'Roboto', sans-serif;font-weight:300;}
  <?php } else if ($meta_font == "select-sixteen") { ?> html, body {font-family: 'Bree Serif', serif;}
  <?php } else if ($meta_font == "select-seventeen") { ?> html, body {font-family: 'Oswald', sans-serif;}
  <?php } else if ($meta_font == "select-heighteen") { ?> html, body {font-family: 'Oswald', sans-serif;font-weight:700;}
  <?php } else if ($meta_font == "select-nineteen") { ?> html, body {font-family: 'Lobster', cursive;}
  <?php } else if ($meta_font == "select-twenty") { ?> html, body {font-family: 'Lobster Two', cursive;}
  <?php } else if ($meta_font == "select-twenty-one") { ?> html, body {font-family: 'Montserrat', sans-serif;}
  <?php } else if ($meta_font == "select-twenty-two") { ?> html, body {font-family: 'Montserrat Alternates', sans-serif;}
  <?php } else if ($meta_font == "select-twenty-three") { ?> html, body {font-family: 'Raleway', sans-serif;}
  <?php } 
 }
 /*Titles*/
 if( !empty( $meta_font_title ) ) { 
  if ($meta_font_title == "select-one") { ?> 
 .title h1, #intro h1, .section_title, #inner h1,.caption_img_slf,h1,h2,h3,h4,h5,.content blockquote {font-family: 'Droid Sans', sans-serif;}  
  <?php } else if ($meta_font_title == "select-two") { ?> 
 .title h1, #intro h1, .section_title, #inner h1,.caption_img_slf,h1,h2,h3,h4,h5,.content blockquote {font-family: 'Open Sans', sans-serif;}
  <?php } else if ($meta_font_title  == "select-three") { ?>
 .title h1, #intro h1, .section_title, #inner h1,.caption_img_slf,h1,h2,h3,h4,h5,.content blockquote {font-family: 'Arvo', serif;}
  <?php } else if ($meta_font_title == "select-four") { ?>
 .title h1, #intro h1, .section_title, #inner h1,.caption_img_slf,h1,h2,h3,h4,h5,.content blockquote {font-family: 'Roboto', sans-serif;}
  <?php } else if ($meta_font_title == "select-five") { ?>
 .title h1, #intro h1, .section_title, #inner h1,.caption_img_slf,h1,h2,h3,h4,h5,.content blockquote {font-family: 'Roboto Slab', serif;} 
  <?php } else if ($meta_font_title == "select-six") { ?> 
 .title h1, #intro h1, .section_title, #inner h1,.caption_img_slf,h1,h2,h3,h4,h5,.content blockquote {font-family: 'Lato', sans-serif;}
  <?php } else if ($meta_font_title == "select-seven") { ?>
 .title h1, #intro h1, .section_title, #inner h1,.caption_img_slf,h1,h2,h3,h4,h5,.content blockquote {font-family: 'Ubuntu Condensed', sans-serif;}
  <?php } else if ($meta_font_title == "select-eight") { ?>
 .title h1, #intro h1, .section_title, #inner h1,.caption_img_slf,h1,h2,h3,h4,h5,.content blockquote {font-family: 'Inconsolata', cursive;}
  <?php } else if ($meta_font_title == "select-nine") { ?>
 .title h1, #intro h1, .section_title, #inner h1,.caption_img_slf,h1,h2,h3,h4,h5,.content blockquote {font-family: 'Playfair Display', serif;}
  <?php } else if ($meta_font_title == "select-ten") { ?> 
 .title h1, #intro h1, .section_title, #inner h1,.caption_img_slf,h1,h2,h3,h4,h5,.content blockquote {font-family: 'Raleway', sans-serif;} 
  <?php } else if ($meta_font_title == "select-eleven") { ?> 
 .title h1, #intro h1, .section_title, #inner h1,.caption_img_slf,h1,h2,h3,h4,h5,.content blockquote {font-family: 'Roboto', sans-serif;font-weight:300;}
  <?php } else if ($meta_font_title == "select-twelve") { ?> 
 .title h1, #intro h1, .section_title, #inner h1,.caption_img_slf,h1,h2,h3,h4,h5,.content blockquote {font-family: 'Bree Serif', serif;} 
  <?php } else if ($meta_font_title == "select-thirteen") { ?> 
 .title h1, #intro h1, .section_title, #inner h1,.caption_img_slf,h1,h2,h3,h4,h5,.content blockquote {font-family: 'Oswald', sans-serif;} 
   <?php } else if ($meta_font_title == "select-fourteen") { ?> 
 .title h1, #intro h1, .section_title, #inner h1,.caption_img_slf,h1,h2,h3,h4,h5,.content blockquote {font-family: 'Oswald', sans-serif;font-weight:700;} 
   <?php } else if ($meta_font_title == "select-fifteen") { ?> 
 .title h1, #intro h1, .section_title, #inner h1,.caption_img_slf,h1,h2,h3,h4,h5,.content blockquote {font-family: 'Lobster', cursive;} 
   <?php } else if ($meta_font_title == "select-sixteen") { ?> 
 .title h1, #intro h1, .section_title, #inner h1,.caption_img_slf,h1,h2,h3,h4,h5,.content blockquote {font-family: 'Lobster Two', cursive;} 
   <?php } else if ($meta_font_title == "select-seventeen") { ?> 
 .title h1, #intro h1, .section_title, #inner h1,.caption_img_slf,h1,h2,h3,h4,h5,.content blockquote {font-family: 'Montserrat', sans-serif;} 
   <?php } else if ($meta_font_title == "select-eighteen") { ?> 
 .title h1, #intro h1, .section_title, #inner h1,.caption_img_slf,h1,h2,h3,h4,h5,.content blockquote {font-family: 'Montserrat Alternates', sans-serif;} 
  <?php }  
 } 
 
if ($bar_sup == "select-two") { ?>#up{bottom:70px;} <?php } 

$color = get_option('archivescolor');

if( empty( $color) ) { ?>
	#list-archive,#list-archive li{background: <?php echo $meta_color; ?>;}
	<?php if ($top_bar == "select-one") { ?> .navbar{background: <?php echo $meta_color; ?>;
	color:#FFFFFF!important;} #side_nav{border-color: #FFFFFF;} #barre{opacity:0.7;} 
	.navbar a{color:#FFFFFF!important;} 
	<?php } elseif ($top_bar == "select-two") { ?> .navbar{background: #FFFFFF;color:grey;} 
	.navbar a{color:<?php echo $meta_color; ?>;} .navbar-fixed-bottom{border-top: 1px solid grey;} 
	.navbar-fixed-top{border-bottom: 1px solid <?php echo $meta_color; ?>;} 
	<?php } elseif ($top_bar == "select-three") { ?> 
	.navbar{background: #000000;color:#FFFFFF;} 
	.navbar a{color:#FFFFFF!important;} 
	<?php } 
} elseif ($color == "#ffffff") { ?>
	#list-archive,#list-archive li{background: #343434;}
	.navbar{background: #FFFFFF;color:<?php echo color; ?>;}
	.navbar-fixed-top{border-bottom: 1px solid grey;} 
<?php } elseif ($color == "#000000") { ?>
	#list-archive,#list-archive li{background: <?php echo $color; ?>;}
	.navbar{background: <?php echo $color; ?>;color:#FFFFFF;} 
	.navbar a{color:#FFFFFF;}
<?php } else { ?>	
	#list-archive,#list-archive li{background: <?php echo $color; ?>;}
	.navbar{background: <?php echo $color; ?>;
	color:#FFFFFF!important;} #side_nav{border-color: #FFFFFF;} #barre{opacity:0.7;} 
	.navbar a{color:#FFFFFF!important;} 
<?php } ?>

<?php $intro = get_option('archivesintro', array() ); 
	if( empty( $intro ) ) : ?>
		#archives{float:none!important;margin:0 auto 30px auto!important;}		
<?php endif;  ?>

<?php $shadow = get_option('archivesshadow'); 
	if( !empty( $shadow ) ) : ?>
		.navbar{-webkit-box-shadow:0 2px 4px 0 rgba(158,158,158,0.77);-moz-box-shadow:0 2px 4px 0 rgba(158,158,158,0.77);box-shadow:0 2px 4px 0 rgba(158,158,158,0.77);}	
<?php endif;  ?>

<?php if ( $reseaux == 'select-one' ) { ?> .right-net a .fa {color:<?php echo $meta_color; ?>;} <?php } 
	elseif ( $reseaux == 'select-two' ) { ?> .right-net a .fa {background:<?php echo $meta_color; ?>;color:#FFFFFF!important;} <?php } 
	elseif ( $reseaux == 'select-three' ) { ?> .right-net a .fa {color:#FFFFFF!important;} .fa-pinterest {background: #bd081c;} .fa-whatsapp {background: #25D366; .fa-twitter {background: #2CA8D2;} .fa-facebook {background: #305891;} .fa-google-plus {background: #CE4D39;} .fa-linkedin {background: #4498C8;} .fa-envelope-o {background: #787878;} <?php } 
	elseif ( $reseaux == 'select-three' ) { ?> .right-net a .fa {color:#FFFFFF;} <?php } 
 
?>
</style>