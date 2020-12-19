
<?php  
  session_start();
  if (isset($_SESSION['loggedinParent']))
  {
    $title = 'Request a Demo and Book';  
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

  if ($action=='Tutors')
    { ?>
        <div class="dropdown">
          <a class="btn-back btn btn-secondary dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Select Subject
          </a>
          
          <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
            <a class="dropdown-item" href="#">Math</a>
            <a class="dropdown-item" href="#">Science</a>
            <a class="dropdown-item" href="#">Physics</a>
          </div>
        </div>
        
        <div class="four-boxes">
        <?php
            foreach($rows as $row)
            {
              echo'<div class="box text-center">';
                echo '<h4>Name: '.$row['FullName'].'</h4>';
                echo '<h4>Email: '. $row['Email'] . '  ID</h4>';
                echo '<h4>Mobile: '. $row['MobileNum'] .'</h4>';
                echo '<h4>Subject: '. $row['subject_name'] .'-'.$row['subject_id'].'</h4>';
                echo '<div class="reg">';
                  echo '<button class="pay-button">
                          <a class="bb " href="page10.php?action=View&tID='.$row['TutorID'].'&sID='.$row['subject_id'].'">View</a>
                        </button>';
                echo '</div>';
              echo '</div>';
            }?>
              
        </div> <?php 
    } 


    //VIEW Tutor
    elseif ($action == 'View')
    {  
      $stmt = $con->prepare("SELECT 
                              Tutors.*, subject.* 
                            FROM 
                              Tutors 
                            JOIN 
                              subject 
                            ON 
                              Tutors.TutorID = subject.tutor_id
                            AND
                              TutorID = ? 
                            AND
                              subject_id = ?  
                            LIMIT 1   
                          ");
      $stmt->execute(array($TID,$SID));
      $row = $stmt->fetch();
      $count = $stmt->rowCount();
      if ($count > 0)
      { ?>
        <div class="inpo reg-inpo">
        <ul><li class="last-li wow bounceInLeft" data-wow-delay=".4s"><a href="page10.php?action=Tutors">Back</a></li></ul>
        </div>
          
        <div class="register">
            <div class="form">
                <h4>Tutor Name :  <?php echo $row['UserName'] ?></h4>
            </div>
            <div class="form">
                <h4>E-Mail  ID :  <?php echo $row['Email'] ?></h4>
            </div>
            <div class="form">
                <h4>School Name : <?php echo $row['SchoolName'] ?></h4>
            </div>
            <div class="form">
                <h4>Address : <?php echo $row['Address'] ?></h4>
            </div>
            <div class="form">
                <h4>City : <?php echo $row['City'] ?></h4>
            </div>
            <table class="table table-bordered table-white ta-reg">
              <thead>
                <tr>
                  <th scope="col">Subject</th>
                  <th scope="col">Euro</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td><?php echo $row['subject_name'] ?></td>
                  <td><?php echo $row['euro'] ?></td>
                </tr>
              </tbody>
            </table>
            <div class="reg">
            <button id="confirm"><a class="bb" 
              href="page10.php?action=Demo&tID=<?php echo $row['TutorID']?>&sID=<?php echo $row['subject_id']?>&pID=<?php echo $_SESSION['id'] ?>">
              Request Demo</a></button>
            <button id="confirm"><a  class="bb" 
              href="page10.php?action=Appoint&tID=<?php echo $row['TutorID']?>&sID=<?php echo $row['subject_id']?>&pID=<?php echo $_SESSION['id'] ?>">
              Appoint</a></button>
            </div>
        </div>
<?php } 
    }



    //Demo request
    elseif ($action == 'Demo')
    {  

      $stmt = $con->prepare("SELECT 
                              Tutors.*, subject.* 
                            FROM 
                              Tutors 
                            JOIN 
                              subject 
                            ON 
                              Tutors.TutorID = subject.tutor_id
                            AND
                              TutorID = ?
                            AND
                              subject_id = ?  
                            LIMIT 1   
                          ");
      $stmt->execute(array($TID,$SID));
      $row = $stmt->fetch();
      $euro = $row['euro']; 
      

      $st = $con->prepare("INSERT INTO Requests(tutor_id, subj_id, parent_id, date, request_status, Payment_status)
                              VALUES ($TID, $SID, $PID, now() , 0 , 'FREE') ");
      $st->execute(array(
        'euro' => $euro,

      ));
      $msg = "<div class='container alert alert-success'>Your Request Sent Successfully!</div>";
      redirect($msg,'back');


    }



    //Demo request
    elseif ($action == 'Appoint')
    {  
      $stmt = $con->prepare("SELECT 
                              Tutors.*, subject.* 
                            FROM 
                              Tutors 
                            JOIN 
                              subject 
                            ON 
                              Tutors.TutorID = subject.tutor_id
                            AND
                              TutorID = ? 
                            AND
                              subject_id = ? 
                            LIMIT 1   
                          ");
      $stmt->execute(array($TID,$SID));
      $row = $stmt->fetch();      
      $euro = $row['euro'];     
     

      $st = $con->prepare("INSERT INTO Requests(tutor_id, subj_id, parent_id, date, request_status, Payment_status)
                              VALUES ($TID, $SID, $PID, now() , 2 , :euro) ");
      $st->execute(array(
        'euro' => $euro,

      ));
      $msg = "<div class='container alert alert-success'>Your Request Sent Successfully!</div>";
      redirect($msg,'back');

    }

    ?>
    </header>
    <script>
      $(document).ready(function(){

        $('#confirm').click(function(){
          return confirm('Are You Sure!'); 
        });


      });  
    </script>    



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