<?php
/**
 * The template for displaying Comments.
 *
 * The area of the page that contains comments and the comment form.
 *
 * @package WordPress
 * @subpackage Simple_Long_Form
 * @since Simple Long Form 0.9.4
 */
 
if ( post_password_required() )
    return;
?>
 
<div id="comments" class="comments-area">
 
    <?php if ( have_comments() ) : ?>
        <h2 class="comments-title">
            <?php
                printf( _nx( 'Un commentaire pour "%2$s"', '%1$s commentaires pour "%2$s"', get_comments_number(), 'comments title', 'simplelongform' ),
                    number_format_i18n( get_comments_number() ), '<span>' . get_the_title() . '</span>' );
            ?>
        </h2>
 
        <ul class="comment-list">
            <?php
                wp_list_comments( array(
                    'style'       => 'ol',
                    'short_ping'  => true,
                    'avatar_size' => 74,
                ) );
            ?>
        </ul><!-- .comment-list -->
 
        <?php

            if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) :
        ?>
        <nav class="navigation comment-navigation" role="navigation">
            <h1 class="screen-reader-text section-heading"><?php _e( 'Navigation', 'simplelongform' ); ?></h1>
            <div class="nav-previous"><?php previous_comments_link( __( '&larr; Anciens commentaires', 'simplelongform' ) ); ?></div>
            <div class="nav-next"><?php next_comments_link( __( 'Nouveaux commentaires &rarr;', 'simplelongform' ) ); ?></div>
        </nav><!-- .comment-navigation -->
        <?php endif; // Check for comment navigation ?>
 
        <?php if ( ! comments_open() && get_comments_number() ) : ?>
        <p class="no-comments"><?php _e( 'Les commentaires sont fermés.' , 'simplelongform' ); ?></p>
        <?php endif; ?>
 
    <?php endif; // have_comments() ?>
 
    <?php comment_form(); ?>
 
</div><!-- #comments -->