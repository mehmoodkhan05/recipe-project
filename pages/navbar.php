<?php
session_start();

// Function to check if the user is logged in
// function isUserLoggedIn()
// {
//     return isset($_SESSION['user_logged_in']) && $_SESSION['user_logged_in'];
// }
?>

<script>
    function checkLoginStatus() {
        const isLoggedIn = sessionStorage.getItem("isLoggedIn");
        if (isLoggedIn) {
            const userId = sessionStorage.getItem("userId");

            console.log("User ID:", userId);

            // Perform actions based on login status

        } else {
            console.log("User ID:", "null");

        }
    }

    // Call the function to check login status on page load
    window.onload = checkLoginStatus;


</script>

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

</head>

<body>
    <section class="navbar-section">
        <nav class="navbar navbar-expand-lg bg-white fixed-top">
            <div class="container">
                <a class="navbar-brand" href="#">Recepians</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ms-auto mt-1 mb-2 mb-lg-0 d-lg-flex align-items-lg-center">
                        <li class="nav-item">
                            <a class="nav-link active me-4" aria-current="page" href="index.php">Homepage</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active me-4" href="community.php">Community</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active me-4" href="categories.php">Categories</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active me-4" href="#">Health log</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active me-4" href="#">Premium</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active me-4" href="#">Blog</a>
                        </li>
                        <?php if (isset($_SESSION['user_logged_in']) && $_SESSION['user_logged_in']): ?>
                            <li class="dropdown" id="profile-dropdown">
                                <button class="btn dropdown-toggle" type="button" data-bs-toggle="dropdown"
                                    aria-expanded="false">
                                    <img src="../assets/images/profile.jpg" alt="" class="img-fluid rounded-pill"
                                        id="profile-img">
                                    <span id="username"><?php echo $_SESSION['name']; ?></span>
                                </button>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" href="#">Settings</a></li>
                                    <li><a class="dropdown-item" href="../api/logout.php">Logout</a></li>
                                </ul>
                            </li>
                        <?php else: ?>
                            <li class="nav-item" id="loginButton">
                                <a class="nav-link active me-4" href="login.php">
                                    <i class="fa-solid fa-user me-1"></i>
                                    Login
                                </a>
                            </li>
                        <?php endif; ?>
                    </ul>
                </div>
            </div>
        </nav>
    </section>
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
<script src="../js/index.js"></script>
<!-- <script src="../js/main.js"></script> -->
<!-- JAVASCRIPT -->