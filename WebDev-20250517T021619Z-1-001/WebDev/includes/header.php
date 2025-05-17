<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/remixicon@4.3.0/fonts/remixicon.css" rel="stylesheet">
    <link rel="stylesheet" href="styles.css">
    <title>Skywings</title>
</head>

<body>
    <nav>
        <div class="nav__header">
            <div class="nav__logo">
                <a href="index.php" class="logo">Skywings</a>
            </div>
            <div class="nav__menu__btn" id="menu-btn">
                <i class="ri-menu-line"></i>
            </div>
        </div>
        <ul class="nav__links" id="nav-links">
            <li><a href="index.php#home">HOME</a></li>
            <li><a href="index.php#about">ABOUT</a></li>
            <li><a href="index.php#package">PACKAGE</a></li>
            <li><a href="index.php#contact">CONTACT</a></li>
            <li><a href="booking.php">BOOK TRIP</a></li>
            <?php if (isset($_SESSION['user_id'])): ?>
                <li><a href="logout.php">LOGOUT</a></li>
            <?php else: ?>
                <li><a href="login.php">LOGIN</a></li>
                <li><a href="register.php">REGISTER</a></li>
            <?php endif; ?>
        </ul>
    </nav>