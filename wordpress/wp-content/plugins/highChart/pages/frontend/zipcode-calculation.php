<?php
	global $wpdb;
	$tableName = $wpdb->prefix . "admin_calcuation";
	$admin_calcuation = $wpdb->get_results("SELECT * FROM $tableName"); 
	function month_name_array(){
		$arr = array(
			'1'=>'Jan',
			'2'=>'Feb',
			'3'=>'Mar',
			'4'=>'Apr',
			'5'=>'May',
			'6'=>'Jun',
			'7'=>'Jul',
			'8'=>'Aug',
			'9'=>'Sep',
			'10'=>'Oct',
			'11'=>'Nov',
			'12'=>'Dec',
		);
		return $arr;
	}
	
	
	$month_arr = month_name_array();
	
	?>
	
<script src="https://code.highcharts.com/highcharts.js"></script><script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>	
	<div class="">
		<h1 class=""></h1>				
		
			<br />
			<figure class="highcharts-figure">
				<div id="container_bar"></div>
			   
			</figure>
			
		</div>

		<!--Table Show with Calculation -->
		
		
		
		
		
		<!--Table Used Only in Calculation -->
		
		<table class="user_cal" style="display:none;">			
			<tr>
				<th>Month Numeric</th>
				<th>Days</th>				
				<th>Total Usage</th>				
				<th>Total Usage</th>			
				<th>Energy Rate</th>			
				<th>Energy Professor Rate</th>			
			</tr><?php
			$counter=1;			
			if(!empty($admin_calcuation) && count($admin_calcuation)>0){			
				foreach($admin_calcuation as $output_dta){			?>					
					<tr>							
						<td class="text-center"><?php echo $output_dta->month_numeric; ?></td>
						<td class="text-center month_name_<?php echo $counter; ?>"><?php echo $output_dta->month_title; ?></td>
						<td class="text-center total_usages_<?php echo $counter; ?>"><?php echo $output_dta->total_usage; ?></td>
					</tr><?php
					$counter++;
				} ?>
				<input type="hidden" value="<?php echo round($total_sum); ?>" class="total_usages_sum">
				<input type="hidden" value="<?php echo count($admin_calcuation); ?>" class="count_array_val">
				<input type="hidden" value="" class="total_calculated_val"><?php 
			} else { ?>
				<tr>
					<td colspan="4" class="text-center">There is no data available</td>
				</tr><?php
			} ?>
		</table>	
		
		
	</div>
	<script>
	var highchart_array = [];
					
	for( var i = 1, l = 12; i <= 12; i++ ){
		
		var name = $('.month_name_'+i).text();
		var calculate_second_plan = $('.total_usages_'+i).text();
		item = {};
						
		item ["name"] = name;
		item ["y"] = eval(calculate_second_plan);
		item ["drilldown"] = name;
		item ["color"] = '#61CE70';

		highchart_array.push(item);
	}
	
	// Create the chart
					Highcharts.chart('container_bar', {
						chart: {
							type: 'column'
						},
						title: {
							text: 'Your Estimated Bills'
						},
					  
					   
						xAxis: {
							type: 'category'
						}, 
						
						yAxis: {
							title: '',
							  labels: {
								  format: '{value:.1f}'
								},
						},
					   
						legend: {
							enabled: false
						},

						tooltip: {
							headerFormat: '<span style="font-size:11px">{series.name}</span><br>',
							pointFormat: '<span style="color:{point.color}">{point.name}</span>: <b>{point.y:.2f}%</b> of total<br/>'
						},

						series: [
							{
								name: "Your Monthly Usage",
								colorByPoint: true,
								data: highchart_array
								// data: [
									// {
										// name: "Jan",
										// y: 7132.51,
										// drilldown: "Jan",
										// color : '#61CE70',
									// },
									// {
										// name: "Feb",
										// y: 6159.90,
										// drilldown: "Feb",
										// color : '#61CE70',
									// },
								// ]
					
							}
						],
					});
	</script>