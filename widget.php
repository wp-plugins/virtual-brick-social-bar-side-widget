<?php
/*
Plugin Name: Virtual Brick Social Bar Side Widget
Plugin URI: http://www.virtual-brick.com/?ref=socialBar
Description: a Social Bar with Your favorite Social Share Buttons 
Version: 1.2.2
Author: Roy Toledo
Author URI: http://www.virtual-brick.com/?ref=socialBar
License: GPL
*/

add_action( 'widgets_init', 'vb_social_bar_widget_register_widget' );
function vb_social_bar_widget_register_widget() { register_widget( 'SocialBarWidget' ); }


class SocialBarWidget extends WP_Widget 
{

	public function __construct() 
	{
		parent::__construct(
			'vb-social_bar_widget',
			__( 'Social Bar Widget' ),
			array( 'description' => __( 'Social Bar Sidebar Widget' ) )
		);
	}

	public function form( $instance ) 
	{
		?>
		<style type="text/css">
			.vb-social_bar_field input[type="checkbox"] { float: left; margin: 0 10px 0 0;}
		</style>
		<?php
		//Widget Form Fields
		$form_options['widget_fields']['title'] = array('label'=>'Title:', 'type'=>'text', 'default'=>__( 'Share This!' ));
		$form_options['widget_fields']['show-facebook'] = array('label'	=>'Facebook Like', 'type'=>'checkbox', 'default'=>true);
		$form_options['widget_fields']['show-google'] = array('label'	=>'Google +1', 'type'=>'checkbox', 'default'=>true);
		$form_options['widget_fields']['show-twitter'] = array('label'	=>'Twitter', 'type'=>'checkbox', 'default'=>true);
		$form_options['widget_fields']['show-pinterest'] = array('label'=>'Pinterest', 'type'=>'checkbox', 'default'=>false);

		//Load Defaults
		if (!$instance){
			foreach($form_options['widget_fields'] as $key => $field) {
				$instance[$key] = esc_attr($field['default']);
			}
		}
		
		//Print Fields
		foreach($form_options['widget_fields'] as $key => $field) {
			$field_name = sprintf('%s_%s_%s', $form_options['prefix'], $key, $number);
			$field_checked = '';
			if ($field['type'] == 'text') {
				$field_value = htmlspecialchars($instance[$key], ENT_QUOTES);
			}elseif ($field['type'] == 'checkbox'){
				$field_value = 1;
				if (! empty($instance[$key])) {
					$field_checked = 'checked="checked"';
				}
			}
			?>
			<p class="vb-social_bar_field">
				<label for="<?php echo $this->get_field_id( $key ); ?>"><?php _e( $field['label'] ); ?></label> 
				<input class="" id="<?php echo $this->get_field_id( $key ); ?>" name="<?php echo $this->get_field_name( $key ); ?>" type="<?php echo $field['type']?>" value="<?php echo $field_value ?>" <?php echo $field_checked?>/>
			</p>
			<?
		}
	}

	public function update( $new_instance, $old_instance ) 
	{
		$instance= $new_instance;
		$instance['title'] = strip_tags( $new_instance['title'] );
		return $instance;
	}

	public function widget( $args, $instance ) 
	{
		echo $args['before_widget'];
		if ( ! empty( $instance['title'] ) ) {
			echo $args['before_title'];
			echo esc_html( $instance['title'] );
			echo $args['after_title'];
		}
		include 'bar.inc';
		echo $args['after_widget'];
	}
}
