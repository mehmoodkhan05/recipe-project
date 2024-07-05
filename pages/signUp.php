<?php
include "navbar.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recipians</title>
    <link rel="stylesheet" href="../css/style.css">
    <!-- BOOTSTRAP CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
    <!-- BOOTSTRAP CSS -->

    <!-- FONT AWESOME -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    <!-- FONT AWESOME -->

    <!-- SLICK SLIDER -->
    <link rel="stylesheet" type="text/css"
        href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.css" />
    <link rel="stylesheet" type="text/css"
        href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick-theme.min.css" />
    <!-- SLICK SLIDER -->

    <style>
        .form-control {
            border: none;
            border-bottom: 1px solid var(--primary-color);
        }

        .form-control:focus {
            box-shadow: none;
            border-bottom: 1px solid var(--primary-color);
        }

        .signup_button .btn {
            width: 128px;
            text-transform: uppercase;
            transition: all .3s ease-in-out;
        }

        .signUp-section .signup-main_col {
            box-shadow: 0 0 10px 10px var(--bg-color);
            padding: 50px 25px;
        }
    </style>
</head>

<body>
    <section class="signUp-section mb-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-5 signup-main_col">
                    <h2 class="mb-4 text-center primary">Sign Up</h2>
                    <form class="signup_form" id="signup_form" method="POST" enctype="multipart/form-data">
                        <div class="form-group mt-3">
                            <label for="email">Email Address:</label>
                            <input type="email" class="form-control" id="email" name="email" required>
                        </div>
                        <div class="form-group mt-4">
                            <label for="phone">Phone Number:</label>
                            <input type="text" class="form-control" id="phoneNumber" name="phoneNumber" required>
                        </div>
                        <div class="form-group mt-4">
                            <label for="password">Enter Your Password:</label>
                            <input type="password" class="form-control" id="password" name="password" required>
                        </div>
                        <div class="form-group mt-4">
                            <label for="cpassword">Confirm Password:</label>
                            <input type="password" class="form-control" id="cpassword" name="cpassword" required>
                        </div>
                        <div class="text-center mt-4">
                            <p>Already a member?
                                <a href="login.php" class="text-decoration-none primary">login</a>
                            </p>
                        </div>
                        <div class="signup_button text-center mb-2 mt-5">
                            <button type="submit" name="submit" class="btn btn-danger">Sign Up</button>
                        </div>
                    </form>
                    <div id="responseMessage" class="text-center mt-4"></div>
                </div>
            </div>
        </div>
    </section>

    <?php include "footer.php"; ?>
</body>

<!-- BOOTSTRAP JS -->
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
    integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r"
    crossorigin="anonymous"></script>

<!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"
    integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy"
    crossorigin="anonymous"></script> -->
<!-- BOOTSTRAP JS -->

<!-- JQUERY -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.3/jquery.min.js"
    integrity="sha512-STof4xm1wgkfm7heWqFJVn58Hm3EtS31XFaagaa8VMReCXAkQnJZ+jEy8PCC/iT18dFy95WcExNHFTqLyp72eQ=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<!-- JQUERY -->

<!-- SLICK SLIDER -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js"></script>
<!-- SLICK SLIDER -->

<!-- JAVASCRIPT -->
<script src="../js/main.js"></script>

<script>
    $(document).ready(function () {
        // Handle signup form submission
        $('#signup_form').submit(function (event) {
            event.preventDefault(); // Prevent default form submission

            var formData = {
                email: $('#email').val(),
                phoneNumber: $('#phoneNumber').val(),
                password: $('#password').val(),
                cpassword: $('#cpassword').val()
            };

            $.ajax({
                url: 'https://recipe.edevz.com/client/api/signUp.php', // Proxy script URL
                type: 'POST',
                data: JSON.stringify(formData),
                contentType: 'application/json',
                success: function (response) {
                    $('#responseMessage').text('Signup successful!');
                    setTimeout(function () {
                        window.location.href = 'login.php';
                    }, 1000);
                },
                error: function (error) {
                    $('#responseMessage').text('Signup failed. Please try again.');
                    // $('#responseMessage').text('Email is already registered');
                }
            });
        });
    });
</script>
<!-- JAVASCRIPT -->

</html>