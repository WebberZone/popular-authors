<?php
/**
 * Popular Authors Widget class.
 *
 * @package Popular_Authors
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * Popular Authors Widget.
 *
 * @since 1.0.0
 *
 * @extends WP_Widget
 */
class Popular_Authors_Widget extends WP_Widget {

	/**
	 * Register widget with WordPress.
	 */
	public function __construct() {
		parent::__construct(
			'widget_wzpa_popular_authors', // Base ID.
			__( 'Popular Authors', 'popular-authors' ), // Name.
			array(
				'description'                 => __( 'Display popular authors', 'popular-authors' ),
				'customize_selective_refresh' => true,
				'classname'                   => 'wzpa_popular_authors_widget',
			)
		);
	}

	/**
	 * Back-end widget form.
	 *
	 * @see WP_Widget::form()
	 *
	 * @param array $instance Previously saved values from database.
	 */
	public function form( $instance ) {
		$title       = isset( $instance['title'] ) ? esc_attr( $instance['title'] ) : '';
		$number      = isset( $instance['number'] ) ? esc_attr( $instance['number'] ) : '';
		$offset      = isset( $instance['offset'] ) ? esc_attr( $instance['offset'] ) : '';
		$daily       = isset( $instance['daily'] ) ? esc_attr( $instance['daily'] ) : 'overall';
		$daily_range = isset( $instance['daily_range'] ) ? esc_attr( $instance['daily_range'] ) : '';
		$hour_range  = isset( $instance['hour_range'] ) ? esc_attr( $instance['hour_range'] ) : '';
		$optioncount = isset( $instance['optioncount'] ) ? esc_attr( $instance['optioncount'] ) : '';

		?>
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>">
			<?php esc_html_e( 'Title', 'popular-authors' ); ?>: <input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
			</label>
		</p>
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'number' ) ); ?>">
			<?php esc_html_e( 'No. of authors', 'popular-authors' ); ?>: <input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'number' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'number' ) ); ?>" type="text" value="<?php echo esc_attr( $number ); ?>" />
			</label>
		</p>
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'offset' ) ); ?>">
			<?php esc_html_e( 'Offset', 'popular-authors' ); ?>: <input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'offset' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'offset' ) ); ?>" type="text" value="<?php echo esc_attr( $offset ); ?>" />
			</label>
		</p>
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'optioncount' ) ); ?>">
				<input id="<?php echo esc_attr( $this->get_field_id( 'optioncount' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'optioncount' ) ); ?>" type="checkbox" <?php checked( true, $optioncount, true ); ?> /> <?php esc_html_e( 'Show count?', 'popular-authors' ); ?>
			</label>
		</p>
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'daily' ) ); ?>"><?php esc_html_e( 'Time range', 'popular-authors' ); ?>:</label>
			<select class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'daily' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'daily' ) ); ?>">
				<option value="overall" <?php selected( 'overall', $daily, true ); ?>><?php esc_html_e( 'Overall', 'popular-authors' ); ?></option>
				<option value="daily" <?php selected( 'daily', $daily, true ); ?>><?php esc_html_e( 'Custom time period (Enter below)', 'popular-authors' ); ?></option>
			</select>
		</p>
		<p>
			<?php esc_html_e( 'In days and hours (applies only to custom option above)', 'popular-authors' ); ?>:
			<label for="<?php echo esc_attr( $this->get_field_id( 'daily_range' ) ); ?>">
				<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'daily_range' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'daily_range' ) ); ?>" type="text" value="<?php echo esc_attr( $daily_range ); ?>" /> <?php esc_html_e( 'days', 'popular-authors' ); ?>
			</label>
			<label for="<?php echo esc_attr( $this->get_field_id( 'hour_range' ) ); ?>">
				<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'hour_range' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'hour_range' ) ); ?>" type="text" value="<?php echo esc_attr( $hour_range ); ?>" /> <?php esc_html_e( 'hours', 'popular-authors' ); ?>
			</label>
		</p>

		<?php
			/**
			 * Fires after Top 10 widget options.
			 *
			 * @since 1.0.0
			 *
			 * @param   array   $instance   Widget options array
			 */
			do_action( 'wzpa_widget_options_after', $instance );
		?>

		<?php
	}

	/**
	 * Sanitize widget form values as they are saved.
	 *
	 * @see WP_Widget::update()
	 *
	 * @param array $new_instance Values just sent to be saved.
	 * @param array $old_instance Previously saved values from database.
	 *
	 * @return array Updated safe values to be saved.
	 */
	public function update( $new_instance, $old_instance ) {
		$instance                = $old_instance;
		$instance['title']       = wp_strip_all_tags( $new_instance['title'] );
		$instance['number']      = $new_instance['number'];
		$instance['offset']      = $new_instance['offset'];
		$instance['daily']       = $new_instance['daily'];
		$instance['daily_range'] = wp_strip_all_tags( $new_instance['daily_range'] );
		$instance['hour_range']  = wp_strip_all_tags( $new_instance['hour_range'] );
		$instance['optioncount'] = isset( $new_instance['optioncount'] ) ? true : false;

		/**
		 * Filters Update widget options array.
		 *
		 * @since 1.0.0
		 *
		 * @param   array   $instance   Widget options array
		 */
		return apply_filters( 'wzpa_widget_options_update', $instance );
	}

	/**
	 * Front-end display of widget.
	 *
	 * @see WP_Widget::widget()
	 *
	 * @param array $args     Widget arguments.
	 * @param array $instance Saved values from database.
	 */
	public function widget( $args, $instance ) {

		$title       = apply_filters( 'widget_title', empty( $instance['title'] ) ? __( 'Popular Authors', 'popular-authors' ) : $instance['title'] );
		$number      = isset( $instance['number'] ) ? $instance['number'] : '';
		$offset      = isset( $instance['offset'] ) ? $instance['offset'] : 0;
		$daily       = ( isset( $instance['daily'] ) && ( 'daily' === $instance['daily'] ) ) ? true : false;
		$daily_range = empty( $instance['daily_range'] ) ? null : $instance['daily_range'];
		$hour_range  = empty( $instance['hour_range'] ) ? null : $instance['hour_range'];
		$optioncount = isset( $instance['optioncount'] ) ? esc_attr( $instance['optioncount'] ) : '';

		$output  = $args['before_widget'];
		$output .= $args['before_title'] . $title . $args['after_title'];

		$arguments = array(
			'is_widget'   => 1,
			'instance_id' => $this->number,
			'number'      => $number,
			'offset'      => $offset,
			'daily'       => $daily,
			'daily_range' => $daily_range,
			'hour_range'  => $hour_range,
			'optioncount' => $optioncount,
			'echo'        => false,
		);

		/**
		 * Filters arguments passed to wzpa_pop_posts for the widget.
		 *
		 * @since 1.0.0
		 *
		 * @param   array   $arguments  Widget options array
		 */
		$arguments = apply_filters( 'wzpa_widget_options', $arguments );

		$output .= wzpa_list_popular_authors( $arguments );

		$output .= $args['after_widget'];

		echo $output; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped

	}

}


/**
 * Initialise the widget.
 *
 * @since 1.0.0
 */
function wzpa_popular_authors_register_widget() {
	register_widget( 'Popular_authors_Widget' );
}
add_action( 'widgets_init', 'wzpa_popular_authors_register_widget' );

