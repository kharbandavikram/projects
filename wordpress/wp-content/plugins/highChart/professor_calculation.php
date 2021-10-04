<?php
	/* Plugin Name:  The Enegry Professor Calculation
	* Plugin URI: ''
	* Description: The Enegry Professor Calculation 
	* Version: 5.1.0
	* Author: 
	* Author URI: 
	* License: 
	**/


	function create_plugin_database_table() {
		global $wpdb;
		require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
	}


	function table_create(){
		global $wpdb;
		$table_name = $wpdb->prefix . "admin_calcuation"; 
		$charset_collate = $wpdb->get_charset_collate();
		 $sql = "DROP TABLE IF EXISTS `$table_name`;
			CREATE TABLE `$table_name` (
			  `admin_calcuation_id` int(11) NOT NULL AUTO_INCREMENT,
			  `month_numeric` int(11) NOT NULL,
			  `month_title` varchar(255) NOT NULL,
			  `days` int(11) NOT NULL,
			  `total_usage` float(15.2) NOT NULL,
			  `percentage` float(15.2) NOT NULL,
			  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
			  PRIMARY KEY (`admin_calcuation_id`)
			) ENGINE=InnoDB DEFAULT CHARSET=latin1;";
		require_once( ABSPATH .'wp-admin/includes/upgrade.php' );
		dbDelta( $sql );
	}
	
	function inseruser(){
		global $wpdb;
		$table_name = $wpdb->prefix . "admin_calcuation"; 
		$wpdb->query("INSERT INTO `$table_name` (`admin_calcuation_id`, `month_numeric`, `month_title`, `days`, `total_usage`, `percentage`, `updated_at`) VALUES
		(1,	'1',	'January',	'31',	'2175.26217779197', '7.48', '2021-09-09 07:06:18'),
		(2,	'2',	'February',	'28',	'1877.73477141237', '6.46', '2021-09-09 07:06:18'),
		(3,	'3',	'March',	'31',	'1963.92145952416', '6.75', '2021-09-09 07:06:18'),
		(4,	'4',	'April',	'30',	'1801.77759716471', '6.20', '2021-09-09 07:06:18'),
		(5,	'5',	'May',	'31',	'2055.83270995324', '7.07', '2021-09-09 07:06:18'),
		(6,	'6',	'June',	'30',	'2826.79512349063', '9.72', '2021-09-09 07:06:18'),
		(7,	'7',	'July',	'31',	'3793.76028119813', '13.04', '2021-09-09 07:06:18'),
		(8,	'8',	'August',	'31',	'3590.11641684379', '12.34', '2021-09-09 07:06:18'),
		(9,	'9',	'September',	'30',	'2744.95306494649', '9.44', '2021-09-09 07:06:18'),
		(10, '10',	'October',	'31',	'2111.25090782688', '7.26', '2021-09-09 07:06:18'),
		(11, '11',	'November',	'30',	'1980.81580826208', '6.81', '2021-09-09 07:06:18'),
		(12, '12',	'December',	'31',	'2161.04398222164', '7.43', '2021-09-09 07:06:18');");
	}
	
	register_activation_hook(__FILE__, 'table_create' );
	register_activation_hook(__FILE__, 'inseruser' );
	
	

	

	
	add_shortcode("zipcode_calculation", "frontend_zipcode_calculation");
	function frontend_zipcode_calculation( ) {
		include('pages/frontend/zipcode-calculation.php');
	}
		
		
		
	
?>
