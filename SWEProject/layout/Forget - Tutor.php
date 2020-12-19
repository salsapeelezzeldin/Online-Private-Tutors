<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,  initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/animate.css">
    <link rel="stylesheet" href="css/main.css">
    <title>Parent Login</title>
</head>
<body>
    <div class="admin-page">
        <div class="listt wow bounceInRight" data-wow-delay=".4s">
           <h1>Tutors Change Password</h1>
           <div class="admin">
               <p>E-Mail :</p>
               <input type="email" name="Id" placeholder="    Please Enter Your email">
           </div>
           <div class="admin">
               <p>New Password :</p>
               <input type="text" name="password" placeholder="    Please Enter Your New Password">
           </div>
           <div class="admin">
            <p>Confirm New Password :</p>
            <input type="text" name="password" placeholder="    Please Confirm Your New Password">
        </div>
           
           <div class="admin-button">
               <ul>
                   <li class="back"><a href="login.php">Back</a></li>
                   <li><a href="login.php">Change</a></li>
               </ul>
           </div>
        </div>
    </div>
    <script src="js/wow.min.js"></script>
    <script>
        new WOW().init();

    </script>
    <script src="js/custom.js"></script>
</body>
</html>