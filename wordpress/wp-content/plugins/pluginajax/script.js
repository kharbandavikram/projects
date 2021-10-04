jQuery(document).ready(function($){
    
    // AJAX url
    var ajax_url = plugin_ajax_object.ajax_url;
 	  
    // Fetch All records (AJAX request without parameter)
    var data = {
      'action': 'employeeList'
    };

    $.ajax({
        url: ajax_url,
        type: 'post',
        data: data,
        dataType: 'json',
        success: function(response){
           // Add new rows to table
        	 createTableRows(response);
        }
    });
    
    // Search record
    $('#search').keyup(function(){
      var searchText = $(this).val();
     
      // Fetch filtered records (AJAX request with parameter)
      var data = {
       'action': 'searchEmployeeList',
       'searchText': searchText
      };

      $.ajax({
        url: ajax_url,
        type: 'post',
        data: data,
        dataType: 'json',
        success: function(response){
            // Add new rows to table
            createTableRows(response);
        }
      });
    });

    // Add table rows by reading response object
    function createTableRows(response){
        $('#empTable tbody').empty();
           
        var len = response.length;
        var sno = 0;
        for(var i=0; i<len; i++){
          var id = response[i].id;
          var emp_name = response[i].emp_name;
          var email = response[i].email;
          var salary = response[i].salary;
          var gender = response[i].gender;
          var city = response[i].city; 

          // Add <tr>
          var tr = "<tr>";
          tr += "<td>"+ (++sno) +"</td>";
          tr += "<td><input type="text" value="+ emp_name +"</td>";
          tr += "<td><input type="text" value="+ email +"</td>";
          tr += "<td><input type="text" value="+ salary +"</td>";
          tr += "<td><input type="text" value="+ gender +"</td>";
          tr += "<td><input type="text" value="+ city +"</td>";
          tr += "<tr>";
          $("#empTable tbody").append(tr);
        }
    }
});
