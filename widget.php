<?php
/*
Plugin Name: Virtual Brick Social Bar Side Widget
Plugin URI: http://www.virtual-brick.com/?ref=socialBar
Description: a Social Bar with Your favorite Social Share Buttons 
Version: 1.1.0
Author: Roy Toledo
Author URI: http://www.virtual-brick.com/?ref=socialBar
License: GPL
*/

add_action( 'widgets_init', 'vb_social_bar_widget_register_widget' );
function vb_social_bar_widget_register_widget() { register_widget( 'SocialBarWidget' ); }
//add_action( 'widgets_init', create_function('', 'return register_widget("SocialBarWidget");') );

/**
 * @todo add button selection on admin side
 **/
class SocialBarWidget extends WP_Widget 
{

	function __construct() 
	{
		parent::__construct(
			'vb-social_bar_widget',
			__( 'Social Bar Widget' ),
			array( 'description' => __( 'Social Bar Sidebar Widget' ) )
		);

		/* Add CSS
		if ( is_active_widget( false, false, $this->id_base ) ) {
			add_action( 'wp_head', array( $this, 'css' ) );
		}
		*/
	}

	function css() 
	{ 
	//THis is th WIdg
?>

<style type="text/css">

</style>

<?php
	}

	function form( $instance ) 
	{
		if ($instance){
			$title = esc_attr( $instance['title'] );
		}else{
			$title = __( 'Contact Us' );
		}
		?>
		<p>
			<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:' ); ?></label> 
			<input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo $title; ?>" />
		</p>
		<?php 
	}

	function update( $new_instance, $old_instance ) 
	{
		$instance['title'] = strip_tags( $new_instance['title'] );
		return $instance;
	}

	function widget( $args, $instance ) 
	{
		echo $args['before_widget'];
		if ( ! empty( $instance['title'] ) ) {
			echo $args['before_title'];
			echo esc_html( $instance['title'] );
			echo $args['after_title'];
		}
		include 'fb_head.inc';
		include 'bar.inc';
		echo $args['after_widget'];
	}
}
