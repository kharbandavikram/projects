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
		include('pages/admin/calculation');
	}
	
	
	?>