<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,  initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/bootstrap-grid.min.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/fontawesome-all.css">
    <link rel="stylesheet" href="css/animate.css">
    <link rel="stylesheet" href="css/swiper.min.css">
    <link rel="stylesheet" href="css/main.css">
    <title>SoftWare Project</title>
</head>

<body>
    <header id="home" class="box">
        <div class="overlay"></div>
        <nav class="wow slideInDown">
            <div class="container">
                <div class="top-bar">
                    <div class="logo wow bounceInLeft" data-wow-delay=".4s">
                        Private Tutor
                    </div>
                    <ul class="main-links  wow bounceInRight" data-wow-delay=".4s">
                        <li class="active"><a data-scroll="home" href="#">Home</a></li>
                        <li><a data-scroll="about-us" href="#">Our Goals</a></li>
                        <li><a data-scroll="testemonials" href="#">About Us</a></li>
                        <li><a data-scroll="contact-us" href="#">Contact Us</a></li>
                    </ul>
                    <div class="mobile-menu-btn">
                        <i class="fas fa-bars"></i>
                    </div>
                </div>
            </div>
        </nav>
        <div class="welcome-msg">
            <div class="wow jackInTheBox" data-wow-delay=".4s">
                <h1>Register with us now</h1>
                <p>through</p>
                <div class="buttons">
                    <ul>
                        <li><a href="admin.php">Login As Admin</a></li>
                        <li><a href="Parent  Login.php">Login As Parent</a></li>
                        <li><a href="login.php">Login As Tutor</a></li>
                    </ul>
                </div>
            </div>
        </div>    
<!--
        <div class="welcome-msg wow jackInTheBox" data-wow-delay=".4s">
            <div class="wow jackInTheBox" data-wow-delay=".4s">
                <h1>Creatives</h1>
                <p>Power By Ultras Team</p>
            </div>
        </div>
-->

        <div class="scroll-down">
            <div class="wow rollIn" data-wow-delay="1.4s">
                <span></span>
            </div>
        </div>
    </header>
    <div id="about-us" class="about box">
        <div class="container">
            <h1 class="wow bounceIn" data-wow-iteration="3">We are an awesome agency</h1>
            <div class="row">
                <div class="item col-12 col-sm-6 col-md-3 wow bounceIn" data-wow-offset="10" data-wow-delay=".3s">
                    <div class="icon-container">
                        <i class="far fa-edit"></i>
                    </div>
                    <h3>The First Goal</h3>
                    <p>Distance education is a great opportunity to integrate parents in the educational system</p>
                </div>
                <div class="item col-12 col-sm-6 col-md-3 wow bounceIn" data-wow-offset="10" data-wow-delay=".6s">
                    <div class="icon-container">
                        <i class="fab fa-searchengin"></i>
                    </div>
                    <h3>The Second Goal</h3>
                    <p>Ease of access to the best teacher for children, and providing follow-up and performance for the first Powell student</p>
                </div>
                <div class="item col-12 col-sm-6 col-md-3 wow bounceIn" data-wow-offset="10" data-wow-delay=".9s">
                    <div class="icon-container">
                        <i class="fas fa-home"></i>
                    </div>
                    <h3>The Third Goal</h3>
                    <p>Ease of education through the home, with a home internet, the student works to follow the teacher and perform and send his homework</p>
                </div>
                <div class="item col-12 col-sm-6 col-md-3 wow bounceIn" data-wow-offset="10" data-wow-delay="1.2s">
                    <div class="icon-container">


                        <i class="far fa-comment"></i>

                    </div>
                    <h3>The Fourth Goal</h3>
                    <p>Setting teacher assessments, seeing reviews, sending comments to him and all parents, and easy communication with the teacher</p>
                </div>
            </div>


        </div>
    </div>

    
    <div class="contact text-center box" id="contact-us">
        <div class="container">
            <div class="contact-container">
                <h2 >Contact <span class="main-color">Us</span></h2>
                <p>You can let your commet about your opinion </p>
                <form>
                    <input type="email" name="mail" placeholder="Please Enter Your Email">
                    <input type="text" name="subject" placeholder="Please Enter Your Subject">
                    
                    <!-- Fekrett Ahmed Hesham -->
                    <textarea placeholder="Please Enter Your Message" onkeydown='this.style.height = this.scrollHeight + "px"'></textarea>
                    <div class="info">
                        <button class="upper">Send</button>
                        <span class="social-media">
                            <i class="fab fa-facebook" aria-hidden="true"></i>
                            <i class="fab fa-twitter" aria-hidden="true"></i>
                            <i class="fab fa-youtube" aria-hidden="true"></i>
                            <i class="fab fa-google" aria-hidden="true"></i>
                        </span>
                    </div>
                </form>
            </div>
        </div>
    </div>    
    <div class="footer">
        <div class="container">
            <div class="footer-container">
                <span class="copyright">© 2019 COPYRIGHT DESIGN STUDIO</span>
                <span class="sign">DESIGNED BY All The Team</span>
            </div>
        </div>
    </div>
    <div class="goTop">
        <i class="fas fa-arrow-up"></i>
    </div>
    <script src="js/fontawesome-all.min.js"></script>
    <script src="js/jquery.js"></script>
    <script src="js/popper.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/wow.min.js"></script>
    <script>
        new WOW().init();

    </script>
    <script src="js/swiper.min.js"></script>
    <script>
        var swiper = new Swiper('.swiper-container', {
            navigation: {
                nextEl: '.swiper-button-next',
                prevEl: '.swiper-button-prev',
            }
        });
    </script>
    <script src="js/custom.js"></script>
</body>

</html>
