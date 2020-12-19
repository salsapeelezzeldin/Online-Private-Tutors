<?php  
session_start();
if (isset($_SESSION['loggedinTutor']))
{ 

    include '..\connect.php'; 
    $action = isset($_GET['action'])? $_GET['action'] :'id'; 
    $ID = isset($_GET['id']) && is_numeric($_GET['id'])  ?  intval($_GET['id'])  : 0 ;
    $stmt= $con->prepare("SELECT 
                              Requests.Payment_status, Requests.date,
                              subject.subject_name,subject.subject_id, subject.euro,
                              Parents.*
                          FROM 
                              Requests 
                          INNER JOIN 
                              subject 
                          ON 
                              Requests.subj_id = subject.subject_id
                          INNER JOIN 
                              Parents
                          ON 
                              Requests.parent_id = Parents.ParentID
                          WHERE
                              Requests.request_status = 2
                          AND
                              Requests.tutor_id = $ID 
                          ORDER BY
                              Parents.UserName
                          ASC       
                        ");
    $stmt->execute();
    $rows = $stmt->fetchAll();

} else  {
  header('location: admin.php');
}



  $title = 'Appointed Tutor';  
  include 'TutorNavBar.php';
  ?>
    <input class="wow jackInTheBox" data-wow-delay=".4s" type="email" name="email" placeholder="search">
    
    <div class="container">
        <!--start table-->
        <table class="table table-bordered table-dark wow bounceIn" data-wow-offset="10" data-wow-delay=".3s">
          <thead>
            <tr>
              <th scope="col">Parent Name</th>
              <th scope="col">Email ID</th>
              <th scope="col">Subjects</th>
              <th scope="col">Mobile Number</th>
              <th scope="col">Total Amount </th>
              <th scope="col">Date and Time</th>
              <th scope="col">Payment Status</th>
            </tr>
          </thead>
          <tbody>
            <?php
            if ($action == 'id')
            {
              foreach($rows as $row)
              {
                echo "<tr>";
                  echo "<td>" . $row['FullName'] . "</td>";
                  echo "<td>" . $row['Email'] . "</td>";
                  echo "<td>". $row['subject_name'] .'-'.$row['subject_id']."</td>";
                  echo "<td>" . $row['MobileNum'] . "</td>";
                  echo "<td>" . $row['euro'] . "</td>";
                  echo "<td>" . $row['date'] . "</td>";
                  echo "<td>" . $row['Payment_status'] . "</td>";
                echo "</tr>";    
              } }?>
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