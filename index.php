<?php session_start(); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" href="./CSS/plugins/all.min.css">
    <link rel="stylesheet" href="./CSS/plugins/bootstrap.css">
    <link rel="stylesheet" href="./CSS/index.css">
</head>
<body>

    <section class="registration my-5">
        <div class="container">
            <div class="register m-auto p-4 rounded-4">
                <div class="icon mb-2">
                    <i class="fa-solid fa-user"></i>
                </div>
                <h2 class="mb-3 text-center fw-bold">Register</h2>
                <form action="PHP/process.php?id=10" method="POST" enctype="multipart/form-data">
                    <div class="box mb-2">
                        <label for="Name" class="w-100 mb-1">Name : </label>
                        <input type="text" class="w-100 form-control <?php echo isset($_SESSION['errors']['name']) ? "is-invalid" : ""; ?>" name="name" id="Name" value="<?php echo $_SESSION['old']['name'] ?? ""; ?>" placeholder="FirstName SecondName">
                        <p class="alert text-danger w-100 m-0 mt-1 p-0" > <?php echo isset($_SESSION['errors']['name']) ? "* " . $_SESSION['errors']['name'] : ""; ?> </p>
                    </div>
                    <div class="box mb-2">
                        <label for="Email" class="w-100 mb-1">Email : </label>
                        <input type="email" class="w-100 form-control <?php echo isset($_SESSION['errors']['email']) ? "is-invalid" : ""; ?>" name="email" id="Email" value="<?php echo $_SESSION['old']['email'] ?? ""; ?>" placeholder="example@email.com">
                        <p class="alert text-danger w-100 m-0 mt-1 p-0" > <?php echo isset($_SESSION['errors']['email']) ? "* " . $_SESSION['errors']['email'] : ""; ?></p>
                    </div>
                    <div class="box mb-2">
                        <label for="Password" class="w-100 mb-1">Password : </label>
                        <div class="password position-relative">
                            <input type="password" class="w-100 form-control <?php echo isset($_SESSION['errors']['password']) ? "is-invalid" : ""; ?>" onkeyup="toggleEye(this)" name="password" id="Password" value="" placeholder="********">
                            <i class="fa-solid fa-eye eye" onclick="togglePassword(this)"></i>
                        </div>
                        <p class="alert text-danger w-100 m-0 mt-1 p-0" > <?php echo isset($_SESSION['errors']['password']) ? "* " . $_SESSION['errors']['password'] : ""; ?></p>
                    </div>
                    <div class="box mb-2">
                        <label for="Language" class="w-100 mb-1">Language : </label>
                        <select class="w-100 form-control <?php echo isset($_SESSION['errors']['lang']) ? "is-invalid" : ""; ?>" name="lang" id="Language">
                            <option value="" <?php echo(($_SESSION['old']['lang'] ?? "") === "") ? 'selected' : "" ?> hidden>Your Language</option>
                            <option value="ar" <?php echo(($_SESSION['old']['lang'] ?? "") === "ar") ? 'selected' : "" ?>>Arabic</option>
                            <option value="en" <?php echo(($_SESSION['old']['lang'] ?? "") === "en") ? 'selected' : "" ?>>English</option>
                        </select>
                        <p class="alert text-danger w-100 m-0 mt-1 p-0" > <?php echo isset($_SESSION['errors']['lang']) ? "* " . $_SESSION['errors']['lang'] : ""; ?></p>
                    </div>
                    <div class="box mb-2">
                        <label for="Image" class="w-100 mb-1">Profile Image : </label>
                        <input type="file" class="w-100 form-control <?php echo isset($_SESSION['errors']['image']) ? "is-invalid" : ""; ?>" name="image" id="Image">
                        <p class="alert text-danger w-100 m-0 mt-1 p-0" > <?php echo isset($_SESSION['errors']['image']) ? "* " . $_SESSION['errors']['image'] : ""; ?></p>
                    </div>
                    <button class="btn btn-dark w-100 mt-2">Submit</button>
                </form>
            </div>
        </div>
    </section>

    <?php 
        unset($_SESSION['errors']);
        unset($_SESSION['old']);
    ?>

    <script src="./JS/bootstrap.js"></script>
    <script src="./JS/index.js"></script>

</body>
</html>