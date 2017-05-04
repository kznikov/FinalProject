<?php
include "../view/inc/autoload.php";

try{
	
	$sessionVars = json_decode($_SESSION['user'], true);
	$user_id = $sessionVars['id'];
	
	$isFirstInsert = true;
	$key = '';
	if(!empty($_POST["keyword"])) {
			$_POST['keyword'] = $_POST['keyword']."* ";
		
		//echo $_POST['keyword'];
		$userDAO = new UserDAO();
		$users = $userDAO->searchUsers($_POST['keyword']);
		$table = "";
		if(!empty($users)) {
			foreach ($users as $user){
				$table .= "<tr>".
						"<td class='text-center'>";
				if ($user->avatar != NULL) {
					$table .= "<img id='avatar' class='img-thumbnail' style='width: 190px;' src='../view/uploaded/".$user->avatar."' alt='avatar'>";
					
				} else {
					
					$table .= "<img id='avatar' style='width: 150px;' src='../view/images/add-avatar_2.png' alt='avatar'>";
				}
				
				$table .= "</td>
                                <td>".$user->firstname. " " . $user->lastname."</td>
                                <td>".$user->username."</td>
                                <td>".$user->email."</td>
                                <td class='text-center'>
                                 <a href='#'><span class='glyphicon glyphicon-eye-open' title='View' onclick='viewUser(".$user->id.")'></span>
                                    </a></td></tr>";
			}
			
		}else{
			$table = "<tr><td colspan='5' style='text-align: center;'><em><strong>No results found.</strong></em></td></tr>";
		}
		echo $table;
	}
	
}catch (Exception $e){
	//http_response_code(401);
	echo "<tr><td colspan='5' style='text-align: center;'><em><strong>No results found.</strong></em></td></tr>";

}


?>