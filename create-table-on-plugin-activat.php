<?php

register_activation_hook( __FILE__, 'my_plugin_create_db' );
function my_plugin_create_db() {
    global $wpdb;
    $charset_collate = $wpdb->get_charset_collate();
    $table_name = $wpdb->prefix . 'offline_course';
    $table_name1 = $wpdb->prefix . 'offline_course_lead';

    $sql = "CREATE TABLE IF NOT EXISTS $table_name (
		id mediumint(9) NOT NULL AUTO_INCREMENT,
		name text NOT NULL,
		price text NOT NULL,
		UNIQUE KEY id (id)
	) $charset_collate;";

    $sql1 = "CREATE TABLE IF NOT EXISTS $table_name1 (
		id mediumint(9) NOT NULL AUTO_INCREMENT,
		name text,
		email text,
		phone text,
		message text,
		c_name text,
		c_price text,
		p_method text,
		p_status text,
		UNIQUE KEY id (id)
	) $charset_collate;";

    require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
    dbDelta( $sql );
    dbDelta( $sql1 );
}

?>
