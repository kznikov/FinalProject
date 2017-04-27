<?php


function __autoload($className) {
	require_once "../model/" . $className . '.php';	
}

include_once 'CheckSession.php';

$sessionVars = json_decode($_SESSION['user'], true);

include '../view/createuser.php';

?>