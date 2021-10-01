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
  


 

   // Pass ajax_url to script.js
   wp_localize_script('script', 'plugin_ajax_object',
   array( 'ajax_url' => admin_url( 'admin-ajax.php' ) ) );
}

	?>