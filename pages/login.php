<?php
include "navbar.php";
?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recipians</title>
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/index.css">
    <!-- BOOTSTRAP CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
    <!-- BOOTSTRAP CSS -->

    <!-- Include jQuery from a CDN -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

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

        .login_button .btn {
            width: 108px;
            text-transform: uppercase;
            transition: all .3s ease-in-out;
        }

        .login_section {
            margin-top: 200px;
        }

        .login_section .login-main_col {
            box-shadow: 0 0 10px 10px var(--bg-color);
            padding: 50px 25px;
        }
    </style>
</head>

<body>
    <!-- LOGIN PAGE -->
    <section class="login_section mb-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-5 login-main_col">
                    <h2 class="text-center primary mb-5">Login</h2>
                    <form class="login_form" id="login_form" method="POST" enctype="multipart/form-data"
                        autocomplete="off">
                        <div class="form-group">
                            <label for="email">Email:</label>
                            <input type="text" class="form-control" id="email" name="email" required>
                        </div>
                        <div class="form-group mt-4">
                            <label for="password">Password:</label>
                            <input type="password" class="form-control" id="password" name="password" required>
                        </div>
                        <div class="text-center mt-4">
                            <p>Dont have an account?
                                <a href="signUp.php" class="text-decoration-none primary">Sign up</a>
                            </p>
                        </div>

                        <div class="login_button text-center">
                            <button type="submit" value="login" name="login" class="btn btn-danger mt-5">Login</button>
                        </div>
                    </form>
                    <div id="responseMessage" class="text-center mt-4"></div>
                </div>
            </div>
        </div>
    </section>
    <!-- LOGIN PAGE -->

    <script src="../js/main.js"></script>

    <?php include "footer.php"; ?>

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
    <script type="text/javascript"
        src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js"></script>
    <!-- SLICK SLIDER -->

    <!-- JAVASCRIPT -->
    <script src="../js/index.js"></script>
    <!-- JAVASCRIPT -->
</body>