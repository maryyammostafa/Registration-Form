<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
    <link rel="stylesheet" href="./CSS/plugins/all.min.css">
    <link rel="stylesheet" href="./CSS/plugins/bootstrap.css">
    <link rel="stylesheet" href="./CSS/index.css">
</head>
<body>

    <section class="profile my-5">
        <div class="container">
            <div class="box m-auto p-4 rounded-4">
                <div class="icon mb-2">
                    <img src="uploads/<?php echo $_SESSION['user']['image']; ?>" class="img-fluid" alt="">
                    <i class="fa-solid fa-pen edit" data-bs-toggle="modal" data-bs-target="#changeImageModal"></i>
                </div>
                <h2 class="mb-5 text-center fw-bold"><?php echo $_SESSION['user']['name']; ?></h2>
                <div class="info">
                    <div class="item mb-4">
                        <h5 class="text-primary"><i class="fa-solid fa-envelope"></i> Your Email</h5>
                        <p class="fs-5 m-0"><?php echo $_SESSION['user']['email']; ?></p>
                    </div>
                    <div class="item mb-4">
                        <h5 class="text-primary"><i class="fa-solid fa-envelope"></i> Your Language</h5>
                        <p class="fs-5 m-0"><?php echo($_SESSION['user']['lang'] == "ar") ? "Arabic" : "English"; ?></p>
                    </div>
                    <div class="buttons d-flex">
                        <button class="btn btn-dark w-50 me-2" data-bs-toggle="modal" data-bs-target="#editModal">Edit Profile</button>
                        <button class="btn btn-warning w-50 ms-2" data-bs-toggle="modal" data-bs-target="#changePassModal">Change Password</button>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="editModalLabel">Edit Profile</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="PHP/update.php" method="POST">
                        <input type="hidden" name="action" value="profile">
                        <div class="box mb-2">
                            <label for="Name" class="w-100 mb-1">Name : </label>
                            <input type="text" class="w-100 form-control <?php echo isset($_SESSION['errors']['name']) ? "is-invalid" : ""; ?>" name="name" id="Name" value="<?php echo $_SESSION['old']['name'] ?? $_SESSION['user']['name']; ?>" placeholder="FirstName SecondName">
                            <p class="alert text-danger w-100 m-0 mt-1 p-0" > <?php echo isset($_SESSION['errors']['name']) ? "* " . $_SESSION['errors']['name'] : ""; ?> </p>
                        </div>
                        <div class="box mb-2">
                            <label for="Email" class="w-100 mb-1">Email : </label>
                            <input type="email" class="w-100 form-control <?php echo isset($_SESSION['errors']['email']) ? "is-invalid" : ""; ?>" name="email" id="Email" value="<?php echo $_SESSION['old']['email'] ?? $_SESSION['user']['email']; ?>" placeholder="example@email.com">
                            <p class="alert text-danger w-100 m-0 mt-1 p-0" > <?php echo isset($_SESSION['errors']['email']) ? "* " . $_SESSION['errors']['email'] : ""; ?></p>
                        </div>
                        <div class="box mb-2">
                            <label for="Language" class="w-100 mb-1">Language : </label>
                            <select class="w-100 form-control <?php echo isset($_SESSION['errors']['lang']) ? "is-invalid" : ""; ?>" name="lang" id="Language">
                                <option value="ar" <?php echo(($_SESSION['old']['lang'] ?? $_SESSION['user']['lang']) === "ar") ? 'selected' : "" ?>>Arabic</option>
                                <option value="en" <?php echo(($_SESSION['old']['lang'] ?? $_SESSION['user']['lang']) === "en") ? 'selected' : "" ?>>English</option>
                            </select>
                            <p class="alert text-danger w-100 m-0 mt-1 p-0" > <?php echo isset($_SESSION['errors']['lang']) ? "* " . $_SESSION['errors']['lang'] : ""; ?></p>
                        </div>
                        <button class="btn ms-auto mt-3 d-block btn-primary">Save changes</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="changePassModal" tabindex="-1" aria-labelledby="changePassModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="changePassModalLabel">Change Password</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="PHP/update.php" method="POST">
                        <input type="hidden" name="action" value="password">
                        <div class="box mb-2">
                            <label for="Current" class="w-100 mb-1">Current Password : </label>
                            <input type="password" class="w-100 form-control <?php echo isset($_SESSION['errors']['current']) ? "is-invalid" : ""; ?>" name="current" id="Current">
                            <p class="alert text-danger w-100 m-0 mt-1 p-0" > <?php echo isset($_SESSION['errors']['current']) ? "* " . $_SESSION['errors']['current'] : ""; ?></p>
                        </div>
                        <div class="box mb-2">
                            <label for="New" class="w-100 mb-1">New Password : </label>
                            <input type="password" class="w-100 form-control <?php echo isset($_SESSION['errors']['new']) ? "is-invalid" : ""; ?>" name="new" id="New">
                            <p class="alert text-danger w-100 m-0 mt-1 p-0" > <?php echo isset($_SESSION['errors']['new']) ? "* " . $_SESSION['errors']['new'] : ""; ?></p>
                        </div>
                        <div class="box mb-2">
                            <label for="Confirm" class="w-100 mb-1">Confirm New Password : </label>
                            <input type="password" class="w-100 form-control <?php echo isset($_SESSION['errors']['confirm']) ? "is-invalid" : ""; ?>" name="confirm" id="Confirm">
                            <p class="alert text-danger w-100 m-0 mt-1 p-0" > <?php echo isset($_SESSION['errors']['confirm']) ? "* " . $_SESSION['errors']['confirm'] : ""; ?></p>
                        </div>
                        <button class="btn ms-auto mt-3 d-block btn-primary">Save changes</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="changeImageModal" tabindex="-1" aria-labelledby="changeImageModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="changeImageModalLabel">Change Profile Image</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="PHP/update.php" method="POST" enctype="multipart/form-data">
                        <input type="hidden" name="action" value="image">
                        <div class="box mb-2">
                            <label for="Image" class="w-100 mb-1">Profile Image : </label>
                            <input type="file" class="w-100 form-control <?php echo isset($_SESSION['errors']['image']) ? "is-invalid" : ""; ?>" name="image" id="Image">
                            <p class="alert text-danger w-100 m-0 mt-1 p-0" > <?php echo isset($_SESSION['errors']['image']) ? "* " . $_SESSION['errors']['image'] : ""; ?></p>
                        </div>
                        <button class="btn ms-auto mt-3 d-block btn-primary">Save changes</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src="./JS/bootstrap.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <?php if (($_SESSION['modal'] ?? '') === "profile"): ?>
        <script>
            let modal = new bootstrap.Modal("#editModal");
            modal.show();
        </script>
    <?php endif; ?>
    <?php if (($_SESSION['modal'] ?? '') === "password"): ?>
        <script>
            modal = new bootstrap.Modal("#changePassModal");
            modal.show();
        </script>
    <?php endif; ?>
    <?php if (($_SESSION['modal'] ?? '') === "image"): ?>
        <script>
            modal = new bootstrap.Modal("#changeImageModal");
            modal.show();
        </script>
    <?php endif; ?>
    <?php 
        unset($_SESSION['errors']);
        unset($_SESSION['old']);
        unset($_SESSION['modal']);
    ?>

    <?php if (isset($_SESSION['success'])): ?>
        <script>
            Swal.fire({
                title: "Updated Successfully",
                icon: "success",
            });
        </script>
    <?php
        unset($_SESSION['success']);
        endif;
    ?>

</body>
</html>