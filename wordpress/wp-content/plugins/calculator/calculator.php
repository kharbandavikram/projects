<?php

/*

Plugin Name:  Calculation Plugin


*/




function Calculator_menu_item()
{
		add_menu_page( 'Calculation', 'Calculation Item', 'manage_options', 'calculate','manage_calculation','' );
		  
}

	add_action( 'admin_menu', 'Calculator_menu_item' );
	
	function manage_calculation()
	{
		include('pages/admin/calculation.php');
	}
	
	
	add_action('wp_enqueue_scripts','plugin_css_jsscripts');
function plugin_css_jsscripts() {
   // CSS
   wp_enqueue_style( 'style-css', plugins_url( '/style.css', __FILE__ ));

   // JavaScript
   wp_enqueue_script( 'script-js', plugins_url( '/js/script.js', __FILE__ ),array('jquery'));

   // Pass ajax_url to script.js
   wp_localize_script( 'script-js', 'plugin_ajax_object',
   array( 'ajax_url' => admin_url( 'admin-ajax.php' ) ) );
}

	?>