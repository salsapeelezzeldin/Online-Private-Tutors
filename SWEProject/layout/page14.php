
<?php  
  session_start();
  if (isset($_SESSION['loggedinParent']))
  {
    
    $title = 'Ratings';  
    include '..\connect.php';  
    include 'ParentNavBar.php';
    $TID = isset($_GET['tID']) && is_numeric($_GET['tID'])  ?  intval($_GET['tID'])  : 0 ;
    $PID = isset($_GET['pID']) && is_numeric($_GET['pID'])  ?  intval($_GET['pID'])  : 0 ;
    $SID = isset($_GET['sID']) && is_numeric($_GET['sID'])  ?  intval($_GET['sID'])  : 0 ;
    $action = isset($_GET['action'])? $_GET['action'] :'Tutors';
    $stmt = $con->prepare("SELECT  Tutors.*, subject.* FROM Tutors 
                          JOIN subject ON Tutors.TutorID = subject.tutor_id
                          Limit 4");
    $stmt->execute();
    $rows = $stmt->fetchAll();
  }
  else  
  {
    header('location: Parent  Login.php');
  }      

?>
        <div class="container">
            <!--start table-->
            <table class="timp table table-bordered table-dark wow bounceIn" data-wow-offset="10" data-wow-delay=".3s">
              <thead>
                <tr>
                  <th scope="col">Tutor Name </th>
                  <th scope="col">Subject</th>
                  <th scope="col">Ratings</th>
                  <th scope="col">Comments</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>1</td>
                  <td>2</td>
                  <td>3</td>
                  <td>4</td>
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