
<?php

  session_start();
  if (isset($_SESSION['loggedinParent']))
  { 
    include '..\connect.php';  
    include 'ParentNavBar.php';
    $TID = isset($_GET['tID']) && is_numeric($_GET['tID'])  ?  intval($_GET['tID'])  : 0 ;
    $PID = isset($_GET['pID']) && is_numeric($_GET['pID'])  ?  intval($_GET['pID'])  : 0 ;
    $SID = isset($_GET['sID']) && is_numeric($_GET['sID'])  ?  intval($_GET['sID'])  : 0 ;

    $action = isset($_GET['action'])? $_GET['action'] :'Demo';
    $stmt = $con->prepare("SELECT  Requests.*, subject.*, Tutors.*
                           FROM Requests JOIN subject 
                           ON Subject.tutor_id = Requests.tutor_id
                           AND Requests.subj_id = Subject.subject_id
                           JOIN Tutors ON Requests.tutor_id = Tutors.TutorID
                           AND Requests.parent_id = $PID
                         ");
    $stmt->execute();
    $rows = $stmt->fetchAll();
  }
  else  
  {
    header('location: Parent  Login.php');
  }        


  if ($action == 'Demo')
  {
    $title = 'Request Demo';
        ?>
        <div class="inpo">
            <ul><li class="last-li wow bounceInLeft" data-wow-delay=".4s"><a href="#">Download E-Books</a></li></ul>
        </div>
        
        <div class="container">
            <!--start table-->
            <table class="table table-bordered table-dark wow bounceIn" data-wow-offset="10" data-wow-delay=".3s">
              <thead>
                <tr>
                  <th scope="col">Tutor Name</th>
                  <th scope="col">Email</th>
                  <th scope="col">Subject</th>
                  <th scope="col">Date  and  Time</th>
                  <th scope="col">note </th>
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
                  echo "<td>" . $row['date'] . "</td>";
                  echo "<td> Free </td>";
                if ($row['request_status'])
                { echo "<td> Pending.. </td>";
                }else {
                  echo "<td> Accepted </td>";
                }
                echo "</tr>";    
              }?>
      
             </tbody>
            </table>
        </div>

<?php  }
      elseif ($action == 'Appoint') 
        {
            $title = 'Appointed Tutor'; ?>

              <div class="container">
                  <!--start table-->
                  <table class="timp table table-bordered table-dark wow bounceIn" data-wow-offset="10" data-wow-delay=".3s">
                    <thead>
                      <tr>
                        <th scope="col">Tutor Name </th>
                        <th scope="col">Email</th>
                        <th scope="col">Subject</th>
                        <th scope="col">Date  and  Time</th>
                        <th scope="col">Amount</th>
                        <th colspan="2" scope="col">Status</th>
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
                          echo "<td>" . $row['date'] . "</td>";
                          echo "<td>" . $row['euro'] . "</td>";
                          echo "<td><ul><li class='btn btn-success btn-xs' >
                          <a href='?action=Pay&tID=".$row['tutor_id']."&pID=".$row['parent_id']."&sID=".$row['subject_id']."'>Pay</a></li></ul></td>";
                          echo "<td><ul><li class='btn btn-info btn-xs' >
                          <a href='?action=Rate&tID=".$row['tutor_id']."&pID=".$row['parent_id']."&sID=".$row['subject_id']."'>Rate</a></li></ul></td>";
                        echo "</tr>";    
                      }?>
                    </tbody>
                  </table>
              </div>

<?php }  ?>

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