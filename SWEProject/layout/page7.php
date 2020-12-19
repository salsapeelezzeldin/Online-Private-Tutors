<?php  
  session_start();
  $title = 'Demo Request'; 
  if (isset($_SESSION['loggedinTutor']))
    { 
      include '..\connect.php'; 
      include 'TutorNavBar.php'; 
      
      $action = isset($_GET['action'])? $_GET['action'] :'Requests';
      $ID = isset($_GET['id']) && is_numeric($_GET['id'])  ?  intval($_GET['id'])  : 0 ;
      $PID = isset($_GET['pID']) && is_numeric($_GET['pID'])  ?  intval($_GET['pID'])  : 0 ;
      $SID = isset($_GET['sID']) && is_numeric($_GET['sID'])  ?  intval($_GET['sID'])  : 0 ; 
    }
  else  {
    header('location: login.php');
  }

 
  if ($action == 'Requests')
  { //Demo requests page
    $stmt= $con->prepare("SELECT 
                              Requests.request_status, Requests.date, Requests.tutor_id,
                              subject.subject_name, subject.subject_id, Parents.*
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
                              Requests.request_status != 2 
                          AND
                              Requests.tutor_id = $ID     
                          ORDER BY
                              Parents.UserName
                          ASC       
                        ");
    $stmt->execute();
    $rows = $stmt->fetchAll();
  ?>
    <input class="wow jackInTheBox" data-wow-delay=".4s" type="email" name="email" placeholder="search">
    <div class="container">
      <!--start table-->
      <table class="table table-bordered table-dark wow bounceIn" data-wow-offset="10" data-wow-delay=".3s">
        <thead>
          <tr>
            <th scope="col">Parent Name</th>
            <th scope="col">Email ID</th>
            <th scope="col">Subject</th>
            <th scope="col">Mobile Number</th>
            <th scope="col">Address</th>
            <th scope="col">City</th>
            <th scope="col">Date and Time</th>
            <th scope="col">Status</th>
          </tr>
        </thead>
        <tbody>
        <?php
          foreach($rows as $row)
          {
            echo "<tr>";
              echo "<td>" . $row['FullName'] . "</td>";
              echo "<td>" . $row['Email'] . "</td>";
              echo "<td>" . $row['subject_name'] ."-".$row['subject_id']."</td>";
              echo "<td>" . $row['MobileNum'] . "</td>";
              echo "<td>" . $row['Address'] . "</td>";
              echo "<td>" . $row['City'] . "</td>";
              echo "<td>" . $row['date'] . "</td>";
            if ($row['request_status'] == 0)
            {
              echo "<td><ul><li class='btn btn-success btn-xs' >
              <a href='?action=Accept&id=".$row['tutor_id']."&pID=".$row['ParentID']."&sID=".$row['subject_id']."'>Accept</a></li></ul></td>";
            }else{
              echo "<td><ul><li class='btn btn-info btn-xs' >ACCEPTED</li></ul></td>";
            }
              echo "</tr>";    
          }
      
    echo  "</tbody>";
    echo"</table>";
  echo"</div>";
  }


  if ($action == 'Accept')
  { //Accept requests page 
  
    $stmt = $con->prepare("SELECT * FROM Requests WHERE subj_id = ? AND parent_id = ? AND tutor_id = ? LIMIT 1");
    $stmt->execute(array($SID,$PID,$ID));  
    $count = $stmt->rowCount();
    if ($count > 0)
    { 
      $stmt = $con->prepare("UPDATE Requests SET request_status = 1 WHERE subj_id = ? AND parent_id = ? AND tutor_id = ? AND request_status = 0 ");
      $stmt->execute(array($SID,$PID,$ID));   
      //success message  
      $msg = "<div class='container alert alert-success'> Demo Request Accepted </div>";
      redirect($msg, 'back');
    }else {
      $msg = "<div class='container alert alert-danger'>Can't Found Request </div>";
      redirect($msg, 'back');
    }
  
  }
?>

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