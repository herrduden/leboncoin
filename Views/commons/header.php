<?php
require_once('Controllers/LoginController.php');
require_once('Models/Model.php');
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title><?php echo $GLOBALS['WINDOW_TITLE']; ?></title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">
    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600&family=Inter:wght@700;800&display=swap" rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="<?php echo $GLOBALS['__HOST__'] ?>/Assets/lib/animate/animate.min.css" rel="stylesheet">
    <link href="<?php echo $GLOBALS['__HOST__'] ?>/Assets/lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="<?php echo $GLOBALS['__HOST__'] ?>/Assets/css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="<?php echo $GLOBALS['__HOST__'] ?>/Assets/css/style.css" rel="stylesheet">
</head>

<body>
    <div class="container-xxl bg-white p-0">
        <!-- Spinner Start -->
        <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
            <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
                <span class="sr-only">Chargement..</span>
            </div>
        </div>
        <!-- Spinner End -->

        <!-- Navbar Start -->
        <div class="container-fluid nav-bar bg-transparent">
            <nav class="navbar navbar-expand-lg bg-white navbar-light py-0 px-4">
                <a href="#" class="navbar-brand d-flex align-items-center text-center">
                    <div class="icon p-2 me-2">
                        <img class="img-fluid" src="<?php echo $GLOBALS['__HOST__'] ?>/Assets/img/icon-deal.png" alt="Icon" style="width: 30px; height: 30px;">
                    </div>
                    <h1 class="m-0 text-primary">Leboncoin</h1>
                </a>
                <button type="button" class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarCollapse">
                    <div class="navbar-nav ms-auto">
                        <?php if (!empty($_SESSION['email'])) { ?>
                            <a class="nav-item nav-link" type="text">Bienvenue</a>
                        <?php } ?>
                        <a href="#" class="nav-item nav-link active">Accueil</a>
                        <a href="#" class="nav-item nav-link">A propos</a>
                        <div class="nav-item dropdown">
                            <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Catégories</a>
                            <div class="dropdown-menu rounded-0 m-0">
                                <a href="#" class="dropdown-item">Véhicule</a>
                                <a href="#" class="dropdown-item">Mode</a>
                                <a href="#" class="dropdown-item">jeu de société</a>
                                <a href="#" class="dropdown-item">jeu vidéo</a>
                                <a href="#" class="dropdown-item">Livre/BD/Manga</a>
                                <a href="#" class="dropdown-item">Musique</a>
                                <a href="#" class="dropdown-item">Sport</a>
                                <a href="#" class="dropdown-item">Autres</a>

                            </div>
                        </div>
                        <?php if (!empty($_SESSION['email'])) { ?>
                            <div class="nav-item dropdown">
                                <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Moi</a>
                                <div class="dropdown-menu rounded-0 m-0">
                                    <a href="testimonial.html" class="dropdown-item">Mes favoris</a>
                                    <a href="404.html" class="dropdown-item">Messages</a>
                                </div>
                            </div>
                        <?php } ?>
                        <?php if (empty($_SESSION['email'])) { ?>
                            <a href="<?php echo $GLOBALS['__HOST__'] ?>sign-in" class="nav-item nav-link">Se connecter </a>
                        <?php } else { ?>
                            <a href="<?php echo $GLOBALS['__HOST__'] ?>deconnexion" class="nav-item nav-link">Se deconnecter</a>
                        <?php } ?>
                    </div>
                    <a href="<?php echo $GLOBALS['__HOST__'] ?>vendre" class="btn btn-primary px-3 d-none d-lg-flex">Vendre</a>
                </div>
            </nav>
        </div>
        <!-- Navbar End -->