# PHP Registration Form

A simple PHP registration application built as a practice project to learn the fundamentals of PHP.

## Features

* User registration form
* Form validation
* Error handling using PHP Sessions
* Preserving old input values after validation
* File upload (Profile Image)
* Image extension validation (`jpg`, `jpeg`, `png`)
* Automatic file renaming using a timestamp
* Displaying the submitted user information on a profile page

## Project Structure

```text
.
├── index.php       # Registration form
├── process.php     # Form validation & processing
├── profile.php     # Display user information
└── uploads/        # Uploaded profile images
```

## Technologies Used

* PHP
* HTML
* Sessions
* File Uploads
* Superglobals (`$_GET`, `$_POST`, `$_FILES`, `$_SESSION`)

## How to Run

1. Place the project inside your XAMPP `htdocs` folder (or create a symbolic link to the project).
2. Start **Apache** from XAMPP.
3. Open your browser and visit:

```text
http://localhost/ProjectFolderName
```

## Learning Objectives

This project was created to practice:

* Handling HTTP GET & POST requests
* Working with PHP Superglobals
* Server-side form validation
* Using Sessions
* Uploading files
* Redirecting users after processing forms
