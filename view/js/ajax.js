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
            	if(allTasks){
            		$("#alltasks_tbody").html(data);
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