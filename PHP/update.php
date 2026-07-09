<?php 

session_start();
require "functions.php";

if ($_SERVER["REQUEST_METHOD"] !== "POST") {
    die("Only POST Method is allowed");
}

$errors = [];
$old = [];
$action = $_POST['action'];

if ($action == 'profile'){
    // Name
    $name = trim($_POST['name'] ?? "");
    $old['name'] = $name;
    $nameError = validateName($name);
    if ($nameError !== null) {
        $errors['name'] = $nameError;
    }
    
    // Email
    $email = trim($_POST['email'] ?? "");
    $old['email'] = $email;
    $emailError = validateEmail($email);
    if ($emailError !== null){
        $errors['email'] = $emailError;
    }
    
    // Language
    $lang = $_POST['lang'] ?? "";
    $old['lang'] = $lang;
    if (empty($lang)){
        $errors['lang'] = "Language is required!";
    }

    if (!empty($errors)){
        $_SESSION['errors'] = $errors;
        $_SESSION['old'] = $old;
        $_SESSION['modal'] = $action;
        header("Location: ../profile.php");
        exit;
    }

    if ($name === $_SESSION['user']['name'] && $email === $_SESSION['user']['email'] && $lang === $_SESSION['user']['lang'])   {
        header("Location: ../profile.php");
        exit;
    }

    $_SESSION['user']['name'] = $name;
    $_SESSION['user']['email'] = $email;
    $_SESSION['user']['lang'] = $lang;
    $_SESSION['success'] = true;
}else if ($action == 'password'){
    $currentPassword = trim($_POST['current']);
    $newPassword = trim($_POST['new']);
    $confirmPassword = trim($_POST['confirm']);
    if (empty($currentPassword)){
        $errors['current'] = "This field is required!";
    }else if(!password_verify($currentPassword,$_SESSION['user']['password'])){
        $errors['current'] = "Current password is incorrect!!";
    }

    if (empty($newPassword)){
        $errors['new'] = "This field is required!";
    }else {
        $passwordError = validatePassword($newPassword);
        if ($passwordError !== null) {
            $errors['new'] = $passwordError;
        }
    }

    if (empty($confirmPassword)){
        $errors['confirm'] = "This field is required!";
    }else if ($newPassword !== $confirmPassword) {
        $errors['confirm'] = "Passwords do not match.";
    }

    if (!isset($errors['current']) && !isset($errors['new']) && $currentPassword === $newPassword) {
        $errors['new'] = "New password must be different from current password";
    }

    if (!empty($errors)) {
        $_SESSION['errors'] = $errors;
        $_SESSION['modal'] = $action;
        header("Location: ../profile.php");
        exit;
    }

    $_SESSION['user']['password'] = password_hash($newPassword, PASSWORD_DEFAULT);
    $_SESSION['success'] = true;
}else if ($action == 'image'){
    if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK){
        $file = $_FILES['image'];
        $imageError = validateImage($file);
        if ($imageError !== null){
            $errors['image'] = $imageError;
        }else {
            $newFileName = uploadImage($file);
        }
    }else{
        $errors['image'] = "Profile image is required!";
    }

    if (!empty($errors)){
        $_SESSION['errors'] = $errors;
        $_SESSION['modal'] = $action;
        header("Location: ../profile.php");
        exit;
    }

    $oldImagePath =  __DIR__ . "/uploads/" . $_SESSION['user']['image'];
    if (file_exists($oldImagePath)) {
        unlink($oldImagePath);
    }

    $_SESSION['user']['image'] = $newFileName;
    $_SESSION['success'] = true;
}

header("Location: ../profile.php");
exit;
