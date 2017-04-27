<?php

include "../view/inc/autoload.php";

$user_id = $_SESSION['userId'];

$editUser = new UserDAO;

$userInfo = $editUser->getInfoUser($user_id);


if (isset($_POST['submit'])) {

    if (isset($_POST['username']) && $_POST['username'] != '') {
        $username = htmlentities(trim($_POST['username']));
    } else {
        $username = $userInfo['username'];
    }

    if (isset($_POST['password']) && $_POST['password'] != '') {
        $password = hash('sha256', htmlentities(trim($_POST['password'])));
    } else {
        $password = $userInfo['password'];
    }

    if (isset($_POST['email']) && $_POST['email'] != "") {
        $email = htmlentities(trim($_POST['email']));
    } else {
        $email = $userInfo['email'];
    }

    if (isset($_POST['firstname']) && $_POST['firstname'] != '') {
        $firstname = htmlentities(trim($_POST['firstname']));
    } else {
        $firstname = $userInfo['firstname'];
    }

    if (isset($_POST['lastname']) && $_POST['lastname'] != "") {
        $lastname = htmlentities(trim($_POST['lastname']));
    } else {
        $lastname = $userInfo['lastname'];
    }

    if (isset($_POST['phone']) && $_POST['phone'] != "") {
        $phone = htmlentities(trim($_POST['phone']));
    } else {
        $phone = $userInfo['phone'];
    }

    if (isset($_POST['mobile']) && $_POST['mobile'] != "") {
        $mobile = htmlentities(trim($_POST['mobile']));
    } else {
        $mobile = $userInfo['mobile'];
    }

    if (!empty($_FILES)) {

        $max = 500 * 1024;
        $destination = '../view/uploaded/';
        $upload = new UploadFile($destination);
        $upload->setMaxSize($max);
        //$upload->allowAllTypes('jira');
        $imageName = $upload->upload();

        $saveImage = new UserDAO();
        $saveImage->saveImage($imageName, $user_id);

        /* $userData = new UserDAO();
          $result = $userData->getImage($user_id);
          $image = $result['avatar']; */
    }

    $updateUser = new UserDAO;

    //,$phone, $mobile,
    $user = new User($username, $password, $firstname, $lastname, $email, $userInfo['first_login'], $user_id);
    $updateUser->updateUser($user, $phone, $mobile);

    $_SESSION['success_update'] = true;


    //include '../controller/editProfileController.php';
    if ($sessionVars['id'] == $user_id) {
        header("Location: MyProfileController.php");
    } else {
        header("Location: UserListController.php");
    }
}
?>