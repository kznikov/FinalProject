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
