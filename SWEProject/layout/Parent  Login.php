
<?php  
    session_start();
    if (isset($_SESSION['loggedinParent']))
    {  header('location: page10.php?action=Tutors'); }

    include '..\connect.php'; 


    //check if user coming from http post request
    if ($_SERVER['REQUEST_METHOD'] == 'POST')
    {
        $id = $_POST['Id'];
        $pass = $_POST['password'];
        $hashedPass = sha1($pass);  //3lshan el pass mtbansh

        //check if exists in database
        $st = $con->prepare("SELECT
                                    ParentID ,UserName , Password 
                              FROM 
                                    Parents 
                              WHERE 
                                    UserName = ? 
                              AND 
                                    Password = ? ");
        $st ->execute(array($id , $hashedPass));
        $profile = $st->fetch();
        $count = $st->rowCount();

        if ($count > 0)
          {  $_SESSION['loggedinParent']=$id;
            $_SESSION['id']= $profile['ParentID']; //register session id
            header('location: page10.php?action=Tutors');
            exit();
          }             
    }
?>
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
    <form class="admin-page" action ="<?php echo $_SERVER['PHP_SELF'] ?>" method ="POST">
        <div class="list wow bounceInRight" data-wow-delay=".4s">
           <h1>Parent Login</h1>
           <div class="admin">
               <p>Parent ID</p>
               <input type="text" name="Id" placeholder="    Please Enter Your ID" autocomplete="off">
           </div>
           <div class="admin">
               <p>Password</p>
               <input type="password" name="password" placeholder="    Please Enter Your Password" autocomplete="new-password">
           </div>
           <div class="reg">
               <a href="Forget.php">Forgotten Password ?</a>
               <button><a class="aa" href="Register.php">Register</a></button>
           </div>
           <div class="admin-button">
               <ul>
                   <li class="back"><a href="indexx.php">Back</a></li>
                   <li><input class="sub" type="submit" value="Submit" ></li>
               </ul>
           </div>
           </div>
        </form>
    <script src="js/wow.min.js"></script>
    <script>
        new WOW().init();

    </script>
    <script src="js/custom.js"></script>
</body>
</html>