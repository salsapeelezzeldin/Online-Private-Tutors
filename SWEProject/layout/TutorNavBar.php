<?php   include '..\includes\functions\functions.php';    ?>


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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
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
                                    <li class="active"><a href="page5.php?id=<?php echo $_SESSION['id'] ?>">My Profile</a></li>
                                    <li><a href="page6.php?action=Manage&id=<?php echo $_SESSION['id'] ?>">Add Subject</a></li>
                                    <li><a href="page7.php?action=Requests&id=<?php echo $_SESSION['id'] ?>">Demo Request</a></li>
                                    <li><a href="page8.php?id=<?php echo $_SESSION['id'] ?>">Appointed Tutor</a></li>
                                    <li><a href="page9.php">Ratings</a></li>
                                    <li class="last-li"><a href="logout.php?action=Tutor">Log Out</a></li>
                                </ul>
                            </div>
                            <div class="mobile-menu-btn">
                                <i class="fas fa-bars"></i>
                            </div>
                        </div>
                    </div>
                </nav>