<?php $email = get_option('email', array() ); if( !empty( $email ) ) { ?>	
<a id="eo" title="<?php _e('Partager par e-mail', 'simplelongform'); ?>" href="mailto:?subject=<?php _e('Un ami souhaite partager cet article avec vous :', 'simplelongform'); ?> <?php the_title(); ?>&amp;body=<?php _e('Découvrez :', 'simplelongform'); ?> <strong><?php the_title(); ?></strong>&nbsp;:&nbsp;<a href=<?php the_permalink() ?>><?php the_permalink() ?></a>" rel="nofollow">	
	<span class="fas fa-envelope"></span><span class="screen-reader-text"><?php _e('Partager par e-mail', 'simplelongform'); ?></span></a><?php } ?> 
<?php $twitter = get_option('twitter', array() ); if( !empty( $twitter ) ) { ?>	
<a target="_blank" href="https://twitter.com/intent/tweet?url=<?php the_permalink();?>&text=<?php the_title(); echo " via ";  $options = get_option('twitter_url', array() ); echo $options;?>">
	<span class="fab fa-twitter"></span><span class="screen-reader-text"><?php _e('Partager cet article sur Twitter', 'simplelongform'); ?></span></a><?php } ?> 
<?php $facebook = get_option('facebook', array() ); if( !empty( $facebook ) ) { ?>
<a href="http://www.facebook.com/sharer.php?u=<?php the_permalink();?>&t=<?php the_title(); ?>" target="blank">
	<span class="fab fa-facebook-square" title="<?php _e('Partager sur Facebook', 'simplelongform'); ?>"> </span>	
	<span class="screen-reader-text"><?php _e('Partager cet article sur Facebook', 'simplelongform'); ?></span></a><?php } ?> 
<?php $linkedin = get_option('slf_linkedin', array() ); if( !empty( $linkedin ) ) { ?>	
<a target="_blank" href="https://www.linkedin.com/shareArticle?mini=true&url=<?php the_permalink(); ?>&title=<?php the_title(); ?>&summary=&source=<?php get_home_url(); ?>" title="<?php _e('Partager sur LinkedIn', 'simplelongform'); ?>">
	<span class="fab fa-linkedin"></span><span class="screen-reader-text"><?php _e('Partager sur LinkedIn', 'simplelongform'); ?></span></a><?php } ?> 
<?php $pinterest = get_option('pinterest', array() ); if( !empty( $pinterest ) ) { ?>
<a class='pi' href="javascript:void((function()%7Bvar%20e=document.createElement('script');e.setAttribute('type','text/javascript');e.setAttribute('charset','UTF-8');e.setAttribute('src','//assets.pinterest.com/js/pinmarklet.js?r='+Math.random()*99999999);document.body.appendChild(e)%7D)());">
	<span class="fab fa-pinterest"></span><span class="screen-reader-text"><?php _e('Partager sur Pinterest', 'simplelongform'); ?></span></a><?php } ?>
<?php $whatsapp = get_option('whatsapp', array() ); if( !empty( $whatsapp ) ) { ?>
<a class='wh' href="whatsapp://send?text=<?php echo (the_title() ." ". the_permalink());?>?utm_source=WhatsApp?utm_medium=Messenger">
	<span class="fab fa-whatsapp"></span><span class="screen-reader-text"><?php _e('Partager sur WhatsApp', 'simplelongform'); ?></span></a><?php } ?> 
