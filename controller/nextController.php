<?php
session_start();
include '../view/create-project.php';
if(!isset($_SESSION['user'])){
	header('Location:../view/index.php');
}