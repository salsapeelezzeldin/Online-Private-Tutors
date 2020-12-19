<?php  
session_start();
if (isset($_SESSION['loggedinTutor']))
{ 

    include '..\connect.php'; 
    $ID = isset($_GET['id']) && is_numeric($_GET['id'])  ?  intval($_GET['id'])  : 0 ;
    
    $stmt = $con->prepare("SELECT * FROM Tutors WHERE TutorID = ? LIMIT 1");
    $stmt->execute(array($ID));
    $res = $stmt->fetch();
    $count = $stmt->rowCount();
} else  {
  header('location: admin.php');
}

    


  $title = 'Ratings';  
  include 'TutorNavBar.php';
  ?>
        <input class="wow jackInTheBox" data-wow-delay=".4s" type="email" name="email" placeholder="search">
        
        <div class="container">
            <!--start table-->
            <table class="table table-bordered table-dark wow bounceIn" data-wow-offset="10" data-wow-delay=".3s">
              <thead>
                <tr>
                  <th scope="col">Parent Name</th>
                  <th scope="col">Subjects</th>
                  <th scope="col">Ratings</th>
                  <th scope="col">Commets</th>
                  <th scope="col">Date</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                </tr>
              </tbody>
            </table>
        </div>
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