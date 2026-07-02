<?php session_start(); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
</head>
<body>

    <h1>User Registration</h1>
    <form action="process.php?id=10" method="POST" enctype="multipart/form-data">
        <div class="box">
            <label for="Name">Name : </label>
            <input type="text" name="name" id="Name" value="<?php echo $_SESSION['old']['name'] ?? "" ; ?>">
            <span style="color: red;" >* <?php echo $_SESSION['errors']['name'] ?? "" ; ?> </span>
        </div>
        <br>
        <div class="box">
            <label for="Email">Email : </label>
            <input type="email" name="email" id="Email" value="<?php echo $_SESSION['old']['email'] ?? "" ; ?>">
            <span style="color: red;" >* <?php echo $_SESSION['errors']['email'] ?? "" ; ?></span>
        </div>
        <br>
        <div class="box">
            <label for="Language">Language : </label>
            <select name="lang" id="Language">
                <option value="" <?php echo (($_SESSION['old']['lang'] ?? "") === "") ? 'selected' : "" ?> hidden></option>
                <option value="ar" <?php echo (($_SESSION['old']['lang'] ?? "") === "ar") ? 'selected' : "" ?>>Arabic</option>
                <option value="en" <?php echo (($_SESSION['old']['lang'] ?? "") === "en") ? 'selected' : "" ?>>English</option>
            </select>
            <span style="color: red;" >* <?php echo $_SESSION['errors']['lang'] ?? "" ; ?></span>
        </div>
        <br>
        <div class="box">
            <label for="Image">Profile Image : </label>
            <input type="file" name="image" id="Image">
            <span style="color: red;" >* <?php echo $_SESSION['errors']['image'] ?? "" ; ?></span>
        </div>
        <br>
        <button>submit</button>
    </form>

</body>
</html>