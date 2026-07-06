<?php

session_start();
require "functions.php";

if ($_SERVER["REQUEST_METHOD"] !== "POST") {
    die("Only POST Method is allowed");
}

$errors = [];
$old = [];

// GET
// ID
$id = $_GET['id'] ?? "";
$old['id'] = $id;
if (empty($id)){
    $errors['id'] = "ID is required!";
}

// POST
// Name
$name = trim($_POST['name'] ?? "");
$old['name'] = $name;
$nameError = validateName($name);
if ($nameError !== null) {
    $errors['name'] = $nameError;
}

// Password
$password = trim($_POST['password'] ?? "");
$hashedPassword = password_hash($password, PASSWORD_DEFAULT);
$passwordError = validatePassword($password);
if ($passwordError !== null) {
    $errors['password'] = $passwordError;
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

// Profile Image
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
    $_SESSION['old'] = $old;
    header("Location: ../index.php");
    exit;
}

$_SESSION['user'] = [
    'id' => $id,
    'name' => $name,
    'password' => $hashedPassword,
    'email' => $email,
    'lang' => $lang,
    'image' => $newFileName,
];

header("Location: ../profile.php");
exit;
