<?php
/*
Plugin Name: Address area
Plugin URI: https://wdpf54.tech/
Description: This plugin adds a custom widget.
Version: 1.0
Author: IDB Round 54
Author URI: https://wdpf54.tech/
License: GPL2
*/

// The widget class
class Address_Widget extends WP_Widget
{

	// Main constructor
	public function __construct()
	{
		parent::__construct(
			'my_address_widget',
			__('Address Widget', 'text_domain'),
			array(
				'customize_selective_refresh' => true,
			)
		);
	}

	// The widget form (for the backend )
	public function form($instance)
	{

		// Set widget defaults
		$defaults = array(
			'title'    => '',
			'address'     => '',
			'tel' => '',
			'phone' => '',
			'email'   => '',
		);

		// Parse current settings with defaults
		extract(wp_parse_args((array) $instance, $defaults)); ?>

		<?php // Widget Title 
		?>
		<p>
			<label for="<?php echo esc_attr($this->get_field_id('title')); ?>"><?php _e('Address Title', 'text_domain'); ?></label>
			<input class="widefat" id="<?php echo esc_attr($this->get_field_id('title')); ?>" name="<?php echo esc_attr($this->get_field_name('title')); ?>" type="text" value="<?php echo esc_attr($title); ?>" />
		</p>

		<?php // Textarea Field 
		?>
		<p>
			<label for="<?php echo esc_attr($this->get_field_id('address')); ?>"><?php _e('Address:', 'text_domain'); ?></label>
			<textarea class="widefat" id="<?php echo esc_attr($this->get_field_id('address')); ?>" name="<?php echo esc_attr($this->get_field_name('address')); ?>"><?php echo wp_kses_post($address); ?></textarea>
		</p>

		<p>
			<label for="<?php echo esc_attr($this->get_field_id('tel')); ?>"><?php _e('Tel', 'text_domain'); ?></label>
			<input class="widefat" id="<?php echo esc_attr($this->get_field_id('tel')); ?>" name="<?php echo esc_attr($this->get_field_name('tel')); ?>" type="text" value="<?php echo esc_attr($tel); ?>" />
		</p>

		<p>
			<label for="<?php echo esc_attr($this->get_field_id('phone')); ?>"><?php _e('Phone', 'text_domain'); ?></label>
			<input class="widefat" id="<?php echo esc_attr($this->get_field_id('phone')); ?>" name="<?php echo esc_attr($this->get_field_name('phone')); ?>" type="text" value="<?php echo esc_attr($phone); ?>" />
		</p>
		<p>
			<label for="<?php echo esc_attr($this->get_field_id('email')); ?>"><?php _e('Email', 'text_domain'); ?></label>
			<input class="widefat" id="<?php echo esc_attr($this->get_field_id('email')); ?>" name="<?php echo esc_attr($this->get_field_name('email')); ?>" type="text" value="<?php echo esc_attr($email); ?>" />
		</p>

<?php }

	// Update widget settings
	public function update($new_instance, $old_instance)
	{
		$instance = $old_instance;
		$instance['title']    = isset($new_instance['title']) ? wp_strip_all_tags($new_instance['title']) : '';
		$instance['address']     = isset($new_instance['address']) ? wp_strip_all_tags($new_instance['address']) : '';
		$instance['tel'] = isset($new_instance['tel']) ? wp_kses_post($new_instance['tel']) : '';
		$instance['phone'] = isset($new_instance['phone']) ? wp_kses_post($new_instance['phone']) : '';
		$instance['email'] = isset($new_instance['email']) ? wp_kses_post($new_instance['email']) : '';
		return $instance;
	}

	// Display the widget
	public function widget($args, $instance)
	{

		extract($args);

		// Check the widget options
		$title    = isset($instance['title']) ? apply_filters('widget_title', $instance['title']) : '';
		$address     = isset($instance['address']) ? $instance['address'] : '';
		$tel = isset($instance['tel']) ? $instance['tel'] : '';
		$phone   = isset($instance['phone']) ? $instance['phone'] : '';
		$email   = isset($instance['email']) ? $instance['email'] : '';

		// WordPress core before_widget hook (always include )
		echo $before_widget;


		// Display the widget

		// Display widget title if defined
		if ($title) {
			echo '<h3 class="text-center">' . $title . '</h3>';

			//echo $before_title . $title . $after_title;
		}

		echo '<ul class="foot-p4-ul ps-5 text-white">';
		// Display text field
		if ($address) {
			echo '<li>' . $address . '</li>';
		}

		echo "<br>";
		if ($tel) {
			echo '<li style=":">
					<a href="tel:' . $tel . '">Tel:+' . $tel . '</a>
				</li>';
		}
		if ($phone) {
			echo '<li">
					<a href="tel:' . $phone . '">Phone:+' . $phone . '</a>
				</li>';
		}
		if ($email) {
			echo '<li>
					<a href="mailto:' . $email . '">Email: ' . $email . '</a>
				</li>';
		}

		echo "</ul>";

		// WordPress core after_widget hook (always include )
		echo $after_widget;
	}
}

// Register the widget
function register_address_widget()
{
	register_widget('Address_Widget');
}
add_action('widgets_init', 'register_address_widget');
