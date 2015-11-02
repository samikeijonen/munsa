<?php

/**
 * Contact info Widget.
 *
 * @package Munsa
 */

class Munsa_Contact_Info_Widget extends WP_Widget {

	/**
	 * Set up the widget's unique name, ID, class, description, and other options.
	 *
	 * @since 1.0.0
	 */
	function __construct() {

		// Set up the widget options.
		$widget_options = array(
			'classname'   => 'munsa-contact-info',
			'description' => esc_html__( 'Display Contact Info from the Customizer.', 'munsa' )
		);

		// Set up the widget control options.
		$control_options = array(
			'width'   => 200,
			'height'  => 350,
			'id_base' => 'munsa-contact-info'
		);

		// Create the widget.
		parent::__construct(
			'munsa-contact-info',                         // $this->id_base
			esc_html__( 'Munsa: Contact Info', 'munsa' ), // $this->name
			$widget_options,                              // $this->widget_options
			$control_options                              // $this->control_options
		);
	}

	/**
	 * Outputs the widget based on the arguments input through the widget controls.
	 *
	 * @since 1.0.0
	 */
	function widget( $sidebar, $instance ) {
		
		// Bail if there is no contact info.
		$munsa_has_contact_info = munsa_has_contact_info();
		if ( ! $munsa_has_contact_info ) {
			return;
		}

		// Open the before widget HTML.
		echo $sidebar['before_widget'];

		// Output the widget title.
		if ( $instance['title'] ) {
			echo $sidebar['before_title'] . apply_filters( 'widget_title',  $instance['title'], $instance, $this->id_base ) . $sidebar['after_title'];
		}
		
		// Display Contact Info.
		munsa_contact_info();

		// Close the after widget HTML.
		echo $sidebar['after_widget'];
	}

	/**
	 * Updates the widget control options for the particular instance of the widget.
	 *
	 * @since 1.0.0
	 */
	function update( $new_instance, $old_instance ) {
		
		// Strip tags from elements that don't need them.
		$instance['title'] = strip_tags( $new_instance['title'] );

		return $instance;

	}

	/**
	 * Displays the widget control options in the Widgets admin screen.
	 *
	 * @since 1.0.0
	 */
	function form( $instance ) {

	?>

		<p>
			<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php esc_html_e( 'Title:', 'munsa' ); ?></label>
			<input type="text" class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" value="<?php echo esc_attr( $instance['title'] ); ?>" />
		</p>

		<div style="clear:both;">&nbsp;</div>
		
	<?php
	
	}

}

/**
 * Register Widgets
 *
 * @since 1.0.0
*/

function munsa_register_widgets() {

    register_widget( 'Munsa_Contact_Info_Widget' );

}

add_action( 'widgets_init', 'munsa_register_widgets' );