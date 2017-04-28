<?php

session_start();

if (isset($_SESSION['user']) ) {
    session_destroy();
    unset($_SESSION['user']);

    include '../view/index.php';
} else {
    include '../view/index.php';
}
?>