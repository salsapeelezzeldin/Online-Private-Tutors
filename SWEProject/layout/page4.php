<?php  
  session_start();
  $title = 'Veiw Appointments';
  if (isset($_SESSION['loggedin']))
  {  
    include '..\connect.php'; 
    include 'adminNavBar.php';
    $stmt= $con->prepare("SELECT 
                              Requests.*, subject.*, 
                              Parents.FullName AS PN, Tutors.FullName AS TN
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
                          INNER JOIN 
                              Tutors
                          ON 
                              Requests.tutor_id = Tutors.TutorID
                          ORDER BY
                              subject.subject_name
                          ASC       
                        ");
    $stmt->execute();
    $rows = $stmt->fetchAll();


  } 
  else  
  {
    header('location: admin.php');
  }



?>
      <input class="wow jackInTheBox" data-wow-delay=".4s" type="email" name="email" placeholder="search">
      
      <div class="container">
          <!--start table-->
          <table class="table table-bordered table-dark wow bounceIn" data-wow-offset="10" data-wow-delay=".3s">
            <thead>
              <tr>
                <th scope="col">Parent Name</th>
                <th scope="col">Tutor  Name</th>
                <th scope="col">Subject</th>
                <th scope="col">Total Amount</th>
                <th scope="col">Start Date</th>
                <th scope="col">Start Time</th>
                <th scope="col">Request Status</th>
                <th scope="col">Payment Status</th>
              </tr>
            </thead>
            <tbody>
            <?php
                foreach($rows as $row)
                {
                  echo "<tr>";
                    echo "<td>" . $row['PN'] . "</td>";
                    echo "<td>" . $row['TN'] ."</td>";
                    echo "<td>" . $row['subject_name'] . "</td>";
                    echo "<td>" . $row['euro'] . "</td>";
                    echo "<td></td>";
                    echo "<td></td>";
                    $status = $row['request_status'] == 2 ? 'Appoint' :  'Demo';
                    echo "<td>" . $status . "</td>";
                    echo "<td>" . $row['Payment_status'] . "</td>";
                      
                  echo "</tr>";    
                }
                ?>    

              
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