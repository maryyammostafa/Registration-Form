<?php

session_start();

if ($_SERVER["REQUEST_METHOD"] !== "POST") {
    die("Only POST Method is allowed");
}

$errors = [];
$old = [];

// GET

$id = $_GET['id'] ?? "";
$old['id'] = $id;
if (empty($id)){
    $errors['id'] = "ID is required!";
}

// POST

$name = $_POST['name'] ?? "";
$old['name'] = $name;
if (empty($name)){
    $errors['name'] = "Name is required!";
}

$email = $_POST['email'] ?? "";
$old['email'] = $email;
if (empty($email)){
    $errors['email'] = "Email is required!";
}

$lang = $_POST['lang'] ?? "";
$old['lang'] = $lang;
if (empty($lang)){
    $errors['lang'] = "Language is required!";
}

if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK){
    $file = $_FILES['image'];
    $fileName = $file['name'];
    $originalName = pathinfo($fileName, PATHINFO_FILENAME);
    $originalExtension = pathinfo($fileName, PATHINFO_EXTENSION);
    $tmpPath = $file['tmp_name'];
    $allowedExtension = ['png', 'jpg', 'jpeg'];

    if(!in_array($originalExtension, $allowedExtension)){
        $errors['image'] = "Type of image not allowed";
    }else{
        $currentTime = time();
        $newFileName = "{$originalName}-{$currentTime}.{$originalExtension}";

        $uploadDir = __DIR__ . "/uploads";
        if(!is_dir($uploadDir)){
            mkdir($uploadDir);
        }

        $uploadPath = $uploadDir . "/{$newFileName}";
        move_uploaded_file($tmpPath, $uploadPath);
    }
}else{
    $errors['image'] = "Profile image is required!";
}

if (!empty($errors)){
    $_SESSION['errors'] = $errors;
    $_SESSION['old'] = $old;
    header("Location: index.php");
    exit;
}

$_SESSION['user'] = [
    'id' => $id,
    'name' => $name,
    'email' => $email,
    'lang' => $lang,
    'image' => $newFileName,
];

header("Location: profile.php");
exit;
