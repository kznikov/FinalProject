

function deleteTask(taskId, allTasksPage) {
	 if (!e) var e = window.event;
	    e.cancelBubble = true;
	    if (e.stopPropagation) e.stopPropagation();
    var task_id = taskId;
    var allTasks = allTasksPage;

    if (confirm("Do you realy want to delete this task?")) {

        $.ajax({
            url: '../controller/ValidateController.php',
            method: 'POST',
            data: { task_id: taskId,
            		allTasks: allTasksPage},
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