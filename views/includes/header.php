<!DOCTYPE html>
<html>

<head>

    <!-- Meta tags -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />

    <!-- Stylesheets -->
    <link rel="stylesheet" href="/topi/stylesheets/main.css">
    <?php
    if (isset($cssPaths)) {
        foreach ($cssPaths as $path) { ?>

            <link rel="stylesheet" href="<?php echo $path; ?>">

    <?php }
    } ?>
    <link rel="stylesheet" href="\topi\Libs\bootstrap-4.0.0\dist\css\bootstrap.min.css">
    <title><?php echo $pageTitle; ?></title>
</head>

<body>
    <header id="navbar">
        <nav class="navbar-container container">
            <a href="/topi/views/pages/admin.php" class="navbar-icon">
                <img src="\topi\assets\imgs\navbar-logo-header.png">
            </a>
            <a href="/topi/" class="home-link">
                <div class="header-logo">
                    <img src="\topi\assets\imgs\bitcoin-logo-header.png">
                </div>
                <div class="header-name">
                    Gros Lardon
                </div>
            </a>
            <a href="/topi/views/pages/users/login.php" class="login-button">Log in</a>
            <a href="/topi/views/pages/users/login.php?a=register" class="signup-button">Sign up</a>
        </nav>
    </header>
    <div class="main-content">