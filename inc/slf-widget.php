<?php 
class slf_widget extends WP_Widget {
    function __construct() {
        parent::__construct(false, $name = 'Simple Long Form', array('description' => 'Liste des dernières publications. Latest posts.'));
    }
    function widget($args, $instance) { 
        extract( $args );
		$slf_widget_title = isset( $instance['slf_widget_title'] ) ? esc_attr( $instance['slf_widget_title'] ) : '';
	    $nr = isset( $instance['nr'] ) ? esc_attr( $instance['nr'] ) : '';
		?>
<div class="widget slf-widget">
	<h3 class="widget-title"><?php echo $slf_widget_title; ?></h3>
		<div class="txtwidget">
			<ul style="padding-left:0!important;">
				 <?php query_posts(array( 
					'post_type' => 'longform',
					'posts_per_page' => $nr
					)); 
					if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
						
						<li> <a href="<?php the_permalink(); ?>"> <?php the_title(); ?></a> </li>
						
				<?php endwhile; endif; ?>

			</ul>
		</div>
</div>
<?php
    }
    function update($new_instance, $old_instance) {
        return $new_instance;
    }
    function form($instance) {
		$slf_widget_title = isset( $instance['slf_widget_title'] ) ? esc_attr( $instance['slf_widget_title'] ) : '';
	    $nr = isset( $instance['nr'] ) ? esc_attr( $instance['nr'] ) : '';?>
            <p>
                <label for="<?php echo $this->get_field_id('slf_widget_title'); ?>"><?php _e('Titre :', 'simplelongform'); ?> </label>
                <input class="widefat" id="<?php echo $this->get_field_id('slf_widget_title'); ?>" name="<?php echo $this->get_field_name('slf_widget_title'); ?>" type="text" value="<?php echo esc_attr($slf_widget_title); ?>" />
            </p>
			<p>
                <label for="<?php echo $this->get_field_id('nr'); ?>"><?php _e('Nbre de Long Form à afficher :', 'simplelongform'); ?> </label>
                <input class="widefat" id="<?php echo $this->get_field_id('nr'); ?>" name="<?php echo $this->get_field_name('nr'); ?>" type="text" value="<?php echo esc_attr($nr); ?>" />
            </p>
        <?php       
    }
}
add_action('widgets_init', 'register_SLF_widget');
function register_SLF_widget() {
    register_widget('slf_widget');
}
?>