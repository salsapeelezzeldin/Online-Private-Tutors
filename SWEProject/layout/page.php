<?php  
    
session_start();
if (isset($_SESSION['loggedin']))
{  
    include '../connect.php';
    $action = isset($_GET['action'])? $_GET['action'] :'Manage'; 

   }  

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,  initial-scale=1.0">
    <title>Manage Tutor</title>
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
                        <li class="active"><a href="page1.php">Manage Tutor</a></li>
                        <li><a href="page2.php">Manage E-Books</a></li>
                        <li><a href="page3.php">Veiw Parents</a></li>
                        <li><a href="page4.php">Veiw Appointments</a></li>
                        <li class="active"><a href="test.php?action=Edit&ID= <?php echo $_SESSION['ID']?>">Manage Admin </a></li>
                        <li class="last-li"><a href="logout.php">Log Out</a></li>
                    </ul>
                    </div>
                    <div class="mobile-menu-btn">
                        <i class="fas fa-bars"></i>
                    </div>
                </div>
            </div>
        </nav>
        <input class="wow jackInTheBox" data-wow-delay=".4s" type="email" name="email" placeholder="   search">
        <div class="container">
            <!--start table-->
            <table class="table table-bordered table-dark wow bounceIn" data-wow-offset="10" data-wow-delay=".3s">
              <thead>
                <tr>
                  <th scope="col">Tutor ID</th>
                  <th scope="col">Name</th>
                  <th scope="col">E-Mail</th>
                  <th scope="col">Number</th>
                  <th scope="col">Name School</th>
                  <th scope="col">Address</th>
                  <th scope="col">City</th>
                  <th scope="col">Action</th>

            
                </tr>
                

              </thead>
              
                <?php
                if ($action == 'Manage')
                {  
                    $stmt = $con->prepare("SELECT * FROM tutors");
                    $stmt->execute();
                    $row = $stmt->fetchAll();
            
        
                    foreach($rows as $row)
                    {
                        echo "<tr>";
                            echo "<td>" . $row['TutorID'] . "</td>";
                            echo "<td>" . $row['FullName'] . "</td>";
                            echo "<td>" . $row['Email'] . "</td>";
                            echo "<td>" . $row['MobileNum'] . "</td>";
                            echo "<td>" . $row['SchoolName'] . "</td>";
                            echo "<td>" . $row['Address'] . "</td>";
                            echo "<td>" . $row['City'] . "</td>";
                            
                            echo " <td class='high up'><ul><li><a href='page1.php?action=Edit&id= "  . $row['TutorID'] . " '>Edit</a></li></ul></td>  ";
                           //  <li class="last-li"><a href="logout.php">Log Out</a></li>
                        echo "</tr>";    
                    }}

                ?>    
               <!-- <td class='high up'><ul><li><a href='test.php?action=Edit&ID=  <?php /*  echo $_SESSION['ID'] */  ?>' >Edit</a></li></ul></td> -->
    
            </table>
        </div>
  <?php   
        
   
    elseif($action=='Edit')
    {
        //edit tutor page
            $Tutorid = isset($_GET['id'])  ?  intval($_GET['id'])  : '0' ;
    
            $stmt = $con->prepare("SELECT
                                    *
                                    FROM
                                    Tutors
                                    WHERE
                                    TutorID = ? LIMIT 1");
            $stmt->execute(array($Tutorid));
            $row = $stmt->fetch();
            $count = $stmt->rowCount();
            if ($count > 0)
            {  ?>
                <h1 class="b text-center">Edit Tutor</h1>
                <form action="page.php?action=Update" method="POST">
                <div class="container">
                  <table class="table table-impo table-bordered table-dark wow bounceIn" data-wow-offset="10" data-wow-delay=".3s">
                      <thead>
                        <tr>
                          <th>User Name</th>
                          <input type="hidden" name="ID" value="<?php echo $Tutorid  ?>"/>
                          <th><input class="e" type="text" name="userName" value="<?php echo $row['UserName'] ?>" autocomplete="off"/></th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                          <td>FullName</td>
                          <td><input class="a" type="text" name="fullname" value="<?php echo $row['FullName'] ?>" autocomplete="off" /></td>
                        </tr>
                        <tr>
                          <th>Password</th>
                          <th><input class="e" type="password" name="newpass"  autocomplete="new-password"/></th>
                        </tr>
                        <tr>
                          <td>Confirm Password</td>
                          <input type="hidden" name="oldpass" value="<?php echo $row['Password'] ?>"/>
                          <td><input class="a" type="password" name="confirmpass" autocomplete="new-password"/></td>
                        </tr>
                        <tr>
                          <th>E-mail</th>
                          <th><input class="e" type="email"  value="<?php echo $row['Email'] ?>" name="email"/></th>
                        </tr>
                        <tr>
                          <td>School</td>
                          <td><input class="a" type="text" value="<?php echo $row['SchoolName'] ?>" name="school"/></td>
                        </tr>
                        <tr>
                          <th>Mobile Number</th>
                          <th><input class="e" type="text"  value="<?php echo $row['MobileNum'] ?>" name="number"/></th>
                        </tr>
                        <tr>
                          <td>Subjects</td>
                          <td><input class="a" type="text"  name="subjects"/></td>
                        </tr>
                      </tbody>
                    </table>
                    <div class="text-center">
                    <input type="submit" value="Update" class="btn col-sm-1 wow flash info"/>
                    </div>
                </div>
                </form>
         <?php 
              }else {
               
              }

            }
            

    }

  
  elseif ($action == 'Update')
        {
          if ($_SERVER['REQUEST_METHOD'] == 'POST')
          {  // get var from the form

            
            $tutorid = $_POST['ID']; 
            $username = $_POST['userName']; 
            $fullname = $_POST['fullname']; 
            $email = $_POST['email']; 
            $school = $_POST['school']; 
            $number = $_POST['number'];
          

          $pass = empty($_POST['confirmpass']) || empty($_POST['newpass']) || $_POST['newpass'] != $_POST['confirmpass'] ?  $_POST['oldpass']  :  sha1($_POST['confirmpass'])  ;
          $stmt = $con->prepare("UPDATE Tutors 
          SET UserName = ?, FullName = ?, Email =?,
           MobileNum = ?, SchoolName=?,
           Password =? 
          WHERE TutorID = ? ");
          $stmt->execute(array($username, $fullname, $email, $number,$school, $pass, $tutorid));
          $msg = "<div class='container alert alert-success'>" . $stmt->rowCount() . " Record  Updated </div>";
            redirect($msg, 'Manage');
        }
        else 
        {
           $msg = " <div class='container alert alert-danger'>sorry you can't browse this page directly</div>";
            redirect($msg);
        }

}?>
    
    
    
    </header>
    
    
    
    <script src="js/fontawesome-all.min.js"></script>
    <script src="js/jquery.js"></script>
    <script src="js/popper.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/wow.min.js"></script>
    <script>
        new WOW().init();

    </script>
    <script src="js/custom.js"></script>
</body>
</html>