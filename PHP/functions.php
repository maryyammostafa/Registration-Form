<?php

declare(strict_types=1);

function validateName(string $name): ?string{
    if (empty($name)){
        return "Name is required!";
    }else if(!preg_match("/^[a-zA-Z]+( [a-zA-Z]+)*$/",$name)){
        return "Name must contain only characters";
    }
    return null;
}

function validatePassword(string $password): ?string{
    if (empty($password)){
        return "Password is required!";
    }else if (strlen($password) < 8){
        return "Password must be at least 8 characters";
    }else if (preg_match("/\s/", $password)) {
        return "Password must not contain spaces";
    }else if (!preg_match("/[A-Z]/",$password)){
        return "Password must contain an uppercase letter";
    }else if (!preg_match("/[a-z]/",$password)){
        return "Password must contain an lowercase letter";
    }else if (!preg_match("/\d/",$password)){
        return "Password must contain a digit";
    }else if (!preg_match("/[^a-zA-Z0-9\s]/",$password)){
        return "Password must contain a special character";
    }
    return null;
}

function validateEmail(string $email): ?string{
    if (empty($email)){
        return "Email is required!";
    }else if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
        return "Invalid Email!";
    }
    return null;
}

function uploadImage(array $file): string{
    $originalName = pathinfo($file['name'], PATHINFO_FILENAME);
    $originalExtension = pathinfo($file['name'], PATHINFO_EXTENSION);
    $tmpPath = $file['tmp_name'];
    $currentTime = time();
    $newFileName = "{$originalName}-{$currentTime}.{$originalExtension}";

    $uploadDir = __DIR__ . "/../uploads";
    if(!is_dir($uploadDir)){
        mkdir($uploadDir);
    }

    $uploadPath = $uploadDir . "/{$newFileName}";
    move_uploaded_file($tmpPath, $uploadPath);

    return $newFileName;
}

function validateImage(array $file): ?string{
    $originalExtension = pathinfo($file['name'], PATHINFO_EXTENSION);
    $allowedExtension = ['png', 'jpg', 'jpeg', 'webp'];
    if(!in_array($originalExtension, $allowedExtension)){
        return "Type of image not allowed";
    }
    return null;
}