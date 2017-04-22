<?php
session_start();

function __autoload($className) {
    require_once "../model/" . $className . '.php';
}

$max = 500 * 1024;
$result = array();

if (isset($_POST['upload'])) {

    $destination ='../view/uploaded/';
    try {
        
        $upload = new UploadFile($destination);
        $upload->setMaxSize($max);
        //$upload->allowAllTypes('jira');
        $a = $upload->upload();
        $result= $upload->getMessages();
        echo "<br/><br/><br/><br/><br/>";
        var_dump($a);
        include '../view/welcome.php';

        //return $result;
        //header('Location:../views/form.php', true, 302);
    } catch (Exception $e) {
    	$result[] = $e->getMessage();
        include '../view/welcome.php';
        //header('Location:../views/form.php', true, 302);
    }
}
?>