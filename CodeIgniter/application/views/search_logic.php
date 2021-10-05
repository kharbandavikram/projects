<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.3/jquery.js" integrity="sha256-laXWtGydpwqJ8JA+X9x2miwmaiKhn8tVmOVEigRNtP4=" crossorigin="anonymous"></script>
<link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css" rel="stylesheet" >
<div class="search">
      <input type="text" id="activity_search" class="searchTerm inputaction" placeholder="Search by Activity Title">
      <button type="submit" class="searchButton theme_button">
        <i class="fa fa-search"></i><i class="fa fa-times" aria-hidden="true" style="display:none;"></i>
     </button>	
</div>

<ul class="activity_list_cls" style="display:none;">
	<li data-id="1"><span class="actgoal">Breakfast | Oatmeal with Fruit</span><br/>Add a couple of tablespoons of Greek yogurt to amp up your protein intake.</li>
	<li data-id="2"><span class="actgoal">Morning Snack | Fruits</span><br/>Try two tangerines or an apple with a handful of nuts, dried apricots, or raisins to get you going.</li>
	<li data-id="3"><span class="actgoal">Lunch | Veggie</span><br/>Take two cups of soup filled with a mix of vegetables. Boil some chopped spinach and escarole in chicken to make a hearty veggie soup for lunch.</li>
	<li data-id="4"><span class="actgoal">Afternoon Snack | Carrots and Hummus</span><br/>Chop some carrot sticks and put some protein-packed hummus dip in a container for a quick snack in the afternoon. This perfect combination of protein, carbohydrates, and fats will help keep you going until dinner time.</li>
	<li data-id="5"><span class="actgoal">Dinner | Teriyaki Salmon and Veggies</span><br/>Pour some teriyaki sauce over them and finish off with some sesame seeds.</li>
	<li data-id="6"><span class="actgoal">Dessert | Berries</span><br/>After dinner, if you’re still hungry, enjoy some light and sweet dessert. Snack on some blueberries, raspberries, or strawberries before you start getting ready for bed.</li>
	</ul>
	
	<script>
	$("document").ready(function(){	
	$("body").on("keyup", "#activity_search", function() { 
	$(".activity_list_cls").show();
	$("#activity_search").closest(".search").find(".fa-search").hide();
	$("#activity_search").closest(".search").find(".fa-times").show();
    var value = $(this).val().toLowerCase();
    $(".activity_list_cls").find('li').filter(function() {
		var newHTML =  $(this).find(".actgoal").text().toLowerCase();
      $(this).toggle($(this).find(".actgoal").text().toLowerCase().indexOf(value) > -1);
	   newHTML = newHTML.replace(value, '<span style="color:red;">'+value+'</span>');
	  $(this).find(".actgoal").html(newHTML);
    });
  });

$("body").on("click", ".activity_list_cls li", function() {
	 var curent_id = $(this).attr('data-id');
	 var dataval = $(this).text();
     $("#activity_search").val('');
     $(".activity_list_cls").hide();
	 $("#activity_search").closest(".search").find(".fa-search").show();
	 $("#activity_search").closest(".search").find(".fa-times").hide();
	
	 $(".view_activity_plan").removeClass('active');	
	 $(".activity_plan_"+curent_id).addClass('active');
	
	setTimeout(function(){ 	
	$(".activity_plan_"+curent_id).find("a").trigger('click');
	$(".activity_plan_"+curent_id).find(".td_tactic_data").trigger('click');
	}, 100);
	
  });
  
$("body").on("click", ".fa-times", function() {
     $("#activity_search").val('');
	 $(".activity_list_cls").hide();
	 $("#activity_search").closest(".search").find(".fa-search").show();
	 $("#activity_search").closest(".search").find(".fa-times").hide();
  });
  
  });
  </script>