<?php   include '..\includes\functions\functions.php'; ?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,  initial-scale=1.0">
    <title><?php getTitle() ?></title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/fontawesome-all.css">
    <link rel="stylesheet" href="css/animate.css">
    <link rel="stylesheet" href="css/main.css">
</head>
<body>
    <header>
       <div class="overlay"></div>
        <nav  class="nav-manage wow slideInDown">
            <div class="container">
                <div class="bar">
                    <div class="logo wow bounceInLeft" data-wow-delay=".4s">
                        Private Tutor
                    </div>
                    <div class="nav-list">
                        <ul class="main-links  wow bounceInRight" data-wow-delay=".4s">
                            <li class="active"><a href="page10.php?action=Tutors">Request a Demo and Book</a></li>
                            <li><a href="page11.php?action=Demo&pID=<?php echo $_SESSION['id'] ?>">Request Demo</a></li>
                            <li><a href="page11.php?action=Appoint&pID=<?php echo $_SESSION['id'] ?>">Appointed Tutor </a></li>
                            <li><a href="page14.php">Ratings</a></li>
                            <li class="last-li"><a href="logout.php?action=Parent">Log Out</a></li>
                        </ul>
                    </div>
                    <div class="mobile-menu-btn">
                        <i class="fas fa-bars"></i>
                    </div>
                </div>
            </div>
        </nav>