$('#selectproject').change(function(){
	
        $.ajax({
            url: '../controller/GetProjectUsersAjax.php',
            method: 'GET',
            data: { project: $("#selectproject").val() },
            success: function(data) {
            	
            	var users = JSON.parse(data);
            	
            	var result = '';
            	for(var i=0; i<=users.length-1; i++){
            		result +=  "<option value='"+users[i].id+"'>"+users[i].username+"</option>";
            	}
            	//alert(result);
            	$("#selectusers").html(result);
            }
        });
});