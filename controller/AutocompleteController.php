<?php
include "../view/inc/autoload.php";

try{
	if(!empty($_POST["keyword"])) {
		$userDAO = new UserDAO();
		$usernames = $userDAO->getAllUsernames($_POST["keyword"]);
		$response = "";
		if(!empty($usernames)) {
			$response =  "<ul id='username-list'>";
			foreach($usernames as $username) {
			$response.= "<li onClick = \"selectUsername('".$username["username"]."');\">".$username["username"]."</li>";
			}
		}else{
				$response =  "<ul id='username-list'>";
				$response.= "<li>No results found.</li>";
			}
			$response.="</ul>";
			echo $response;
		}
		
}catch (Exception $e){
	//http_response_code(401);
	echo "<p style='color:red;margin:0px'>Something went wrong, please try again later!</p>";
}