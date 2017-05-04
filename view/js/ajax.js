$(document).ready(function(){
	$("#search-user").keyup(function(){
		$.ajax({
		type: "POST",
		url: "SearchUserController.php",
		data:'keyword='+$(this).val(),
		beforeSend: function(){
			$("#search-user").css("background","#FFF url(/FinalProject/view/images/LoaderIcon.gif) no-repeat 270px");
		},
		success: function(data){	
				$("#search_tbody").html(data);
				$("#search-user").css("background","#FFF");
		}
		});
	});
});


function deleteTask(taskId, allTasksPage) {
	 if (!e) var e = window.event;
	    e.cancelBubble = true;
	    if (e.stopPropagation) e.stopPropagation();
    var task_id = taskId;
    var allTasks = allTasksPage;

    if (confirm("Do you realy want to delete this task?")) {

        $.ajax({
            url: '../controller/TaskController.php',
            method: 'DELETE',
            data: { task_id: taskId,
            		allTasks: allTasksPage
            },
            success: function(data) {
            	if(allTasks == 1){
            		$("#alltasks_tbody").html(data);
            	}else if(allTasks == 2){
            		window.location = "/FinalProject/controller/UserAssignTasksController.php";
            		alert(data);
            	}
            	else{
            		$("#mytasks_tbody").html(data);
            	}
            	
            }
        });	
    }
    
    return false;
}




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






$("#add-user").submit(function(e) {
    $.ajax({
        url: '../controller/AddUserToProject.php',
        method: 'POST',
        data: $("#add-user").serializeArray(),
        dataType :"json",
        success: function(data) {
        	var fields = $("#add-user").serializeArray();
        	 if (data.error) {
            		$("#user-exist").html(data.error);
            	}else{
            		var users = data;
                	//var users = JSON.parse(data);
                	//alert(data);
                	var result = '';
                	for(var i=0; i<=users.length-1; i++){
                		result += "<tr>";
                		result += "<td class='text-center'>";

                             if (users[i].avatar != null) 
                            	 result += "<img id='avatar' class='img-thumbnail' style='width: 70px;' src='../view/uploaded/"+users[i].avatar+"' alt='avatar'>";
                            else
                            	result += "<img id='avatar' style='width: 70px;' src='../view/images/add-avatar_2.png' alt='avatar'>";
        	  
                            result += "</td>";
                            result += "<td>"+users[i].firstname+ " " +users[i].lastname+"</td>";
                            result += "<td>"+users[i].username+"</td>";
                            result += "<td>"+users[i].email+"</td>";
                            result +=  "<td>"+users[i].role+"</td>";
                            result +=  "<td class='text-center'>"; 
                            result +=  "<a href='#'><span class='glyphicon glyphicon-eye-open' title='View' onclick='viewUser("+users[i].id+")'></span>";
                            result += "</a>";
                            result +=  "<a href='#'><span class='glyphicon glyphicon-cog' title='Edit' onclick='editUser("+users[i].id+")'></span></a>";
                            result +=  "<a href='#'><span class='glyphicon glyphicon-trash' title='Delete'  onclick='deleteUser("+ users[i].id+","+fields[2].value+","+users[i].roles_id+")'></span></a>";
                            result +=  "</td>";
                            result +=  "</tr>";
                	}
                	$("#assoc-user-tbody").html(result);
            	}
            }
    });
    	e.preventDefault();
});





function deleteUser(userId, projectId, roleId) {
	
   if (confirm("Do you realy want to remove this user?")) {

       $.ajax({
           url: '../controller/AddUserToProject.php',
           method: 'DELETE',
           data: { user_id: userId,
           			project_id: projectId,
           			role_id:roleId
           },
           dataType :"json",
           success: function(data) {
          	 if (data.error) {
              		$("#user-exist").html(data.error);
              	}else{
              		var users = data;
                  	//var users = JSON.parse(data);
                  	//alert(data);
                  	var result = '';
                  	for(var i=0; i<=users.length-1; i++){
                  		result += "<tr>";
                  		result += "<td class='text-center'>";

                               if (users[i].avatar != null) 
                              	 result += "<img id='avatar' class='img-thumbnail' style='width: 70px;' src='../view/uploaded/"+users[i].avatar+"' alt='avatar'>";
                              else
                              	result += "<img id='avatar' style='width: 70px;' src='../view/images/add-avatar_2.png' alt='avatar'>";
          	  
                              result += "</td>";
                              result += "<td>"+users[i].firstname+ " " +users[i].lastname+"</td>";
                              result += "<td>"+users[i].username+"</td>";
                              result += "<td>"+users[i].email+"</td>";
                              result +=  "<td>"+users[i].role+"</td>";
                              result +=  "<td class='text-center'>"; 
                              result +=  "<a href='#'><span class='glyphicon glyphicon-eye-open' title='View' onclick='viewUser("+users[i].id+")'></span>";
                              result += "</a>";
                              result +=  "<a href='#'><span class='glyphicon glyphicon-cog' title='Edit' onclick='editUser("+users[i].id+")'></span></a>";
                              result +=  "<a href='#'><span class='glyphicon glyphicon-trash' title='Delete'  onclick='deleteUser("+ users[i].id+","+projectId+","+users[i].roles_id+")'></span></a>";
                              result +=  "</td>";
                              result +=  "</tr>";
                  	}
                	$("#assoc-user-tbody").html(result);
              	}
              }
       });	
   }
   
   return false;
}


