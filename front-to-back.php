<?php
/*
Plugin Name: A Moose Front to Back Plugin
Plugin URI: http://www.shourav.info/filterPlugin/
Description: This plugin/shorcode brings in JSON feed and displays.
Author: Da Moose
Version: 1.0
Author URI: http://www.shourav.info/

Copyright 2015  Da Moose

    This program is free software; you can redistribute it and/or modify
    it under the terms of the GNU General Public License, version 2, as 
    published by the Free Software Foundation.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program; if not, write to the Free Software
    Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA 
*/
/**
 * Adds Foo_Widget widget.
 */
class Front_To_Back extends WP_Widget {

	/**
	 * Register widget with WordPress.
	 */
	function __construct() {

		add_action('init', array( $this, 'widget_textdomain') );

		parent::__construct(
			'front_to_back', // Base ID
			__( 'Front_To_Back', 'text_domain' ), // Name
			array( 'description' => __( 'This is the pro way to make widgets ...', 'text_domain' ), ) // Args
		);

		// Register stylesheets
		add_action('admin_enqueue_scripts', array( $this, 'register_admin_styles') );
		add_action('wp_enqueue_scripts', array( $this, 'register_widget_styles') );

		// Register JavaScript
		add_action('admin_enqueue_scripts', array( $this, 'register_admin_scripts') );
		add_action('wp_enqueue_scripts', array( $this, 'register_widget_scripts') );
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

		extract( $args, EXTR_SKIP );


		include( plugin_dir_path( __FILE__ ) . 'views/widget.php' );


	}

	/**
	 * Back-end widget form.
	 *
	 * @see WP_Widget::form()
	 *
	 * @param array $instance Previously saved values from database.
	 */
	public function form( $instance ) {
		// $title = ! empty( $instance['title'] ) ? $instance['title'] : __( 'New title', 'text_domain' );
		
		$instance = wp_parse_args(
            (array) $instance, 
            array(

            	'name' => '',
            	'bio' => '',
            	'position' => 'above',
            	'homepage' => ''

            )  

		);

		extract($instance);
		// print_r($instance);
		
		include( plugin_dir_path( __FILE__ ) . 'views/admin.php' );

		// echo 'field id: ';
		// echo $this->get_field_id( 'name' );
		// echo '<br>field name: ';
		// echo $this->get_field_name( 'name' );
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
		// $instance = array();
		// $instance['name'] = ( ! empty( $new_instance['name'] ) ) ? strip_tags( $new_instance['name'] ) : '';

		// return $instance;
		
		$old_instance['name'] = strip_tags( stripslashes( $new_instance['name'] ) );
		$old_instance['bio'] = strip_tags( stripslashes( $new_instance['bio'] ) );
		$old_instance['position'] = strip_tags( stripslashes( $new_instance['position'] ) );
		$old_instance['homepage'] = $new_instance['homepage'];

		return $old_instance;
	}

 
	function widget_textdomain() {
		load_plugin_textdomain( 'front-to-back', false, plugin_dir_path( __FILE__ ) . '/lang/' );
	} 

	function register_admin_styles() {
		wp_enqueue_style( 'front_to_back-admin', plugins_url( 'front-to-back/_css/admin.css' ) );
	}

	function register_widget_styles() {
		wp_enqueue_style( 'front_to_back-admin', plugins_url( 'front-to-back/_css/widget.css' ) );
	}

	function register_admin_scripts() {
		wp_enqueue_script( 'front_to_back-admin', plugins_url( 'front-to-back/_js/admin.js' ) );
	}

	function register_widget_scripts() {
		wp_enqueue_script( 'front_to_back-admin', plugins_url( 'front-to-back/_js/widget.js' ) );
	}

} // class Foo_Widget

// register Foo_Widget widget
function register_foo_widget() {
    register_widget( 'Front_To_Back' );
}
add_action( 'widgets_init', 'register_foo_widget' );











































