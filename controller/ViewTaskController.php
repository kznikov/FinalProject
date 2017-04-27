<?php

include "../view/inc/autoload.php";
$user_id = $sessionVars['id'];

if (isset($_GET['name'])) {
    try {
        $name = $_GET['name'];

        $task = TaskDAO::getTask($name);
        //var_dump($task);
        if (!$task) {
            include '../view/pageNotFound.php';
            die();
        }

        include '../view/viewtask.php';
    } catch (Exception $e) {
        include '../view/pageNotFound.php';
        die();
    }
}
?>