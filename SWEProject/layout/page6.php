<?php  
  session_start();
  if (isset($_SESSION['loggedinTutor']))
  { 
    
    $title = 'Add Subject';  
    include 'TutorNavBar.php';
    include '..\connect.php'; 
    $action = isset($_GET['action'])? $_GET['action'] :'Manage';
    $ID = isset($_GET['id']) && is_numeric($_GET['id'])  ?  intval($_GET['id'])  : 0 ;  
  } 
  else
  {
    header('location: login.php');
  }


  //manage tutor subjects
  if ($action == 'Manage')
  {
    
    $stmt = $con->prepare("SELECT * FROM Subject where tutor_id = ?");
    $stmt->execute(array($ID));
    $rows = $stmt->fetchALL();  ?>
    <div class="inpo">
        <input class="wow bounceInLeft" data-wow-delay=".4s">
        <ul><li class="last-li wow bounceInRight" data-wow-delay=".4s"><a href="?action=Add&id=<?php echo $_SESSION['id'] ?>">Add</a></li></ul>
    </div>
    
    <div class="container">
        <!--start table-->
        <table class="table table-bordered table-dark wow bounceIn" data-wow-offset="10" data-wow-delay=".3s">
            <thead>
            <tr>
                <th scope="col">Subject ID</th>
                <th scope="col">Subjects</th>
                <th scope="col">Budget [ Euro ]</th>
                <th colspan="2" scope="col">Action</th>
            </tr>
            </thead>
            <?php 
            foreach($rows as $row)
            { ?>
           <tbody>
            <tr>
              <td class="id"><?php echo $row['subject_id']?></td>
              <td class="name" ><?php echo $row['subject_name']?></td>
              <td class="euro" ><?php echo $row['euro']?></td>
              <td><ul><li class="btn btn-success btn-xs">
                          <a href="?action=Edit&id=<?php echo $row['subject_id']?>"><i class="fa fa-edit"></i> Edit</a>
                  </li></ul>
              </td>
              <td><ul><li id="delete" class="btn btn-danger btn-xs">
                          <a href="?action=Delete&id=<?php echo $row['subject_id']?>">X Delete</a>
                  </li></ul>
              </td>
            </tr><?php 
            }?>    
           <tr>
              <td id="id" contenteditable></td>
              <td id="name" contenteditable></td>
              <td id="euro" contenteditable></td>
              <td colspan="2" ><button type="button" name="btn-add" class="btn btn-primary btn-xs " id="btn-add" >+ Add</button></td>
            </tr>   
          </tbody>
        </table>
     
    </div> 
  <?php 
  }



  //add tutor subjects
  elseif ($action == 'Add')
  { ?>
    <h1 class="b text-center">Add Subject</h1>
    <form action="?action=Insert" method="POST">
    <div class="container">
      <table class="table table-impo table-bordered table-dark wow bounceIn" data-wow-offset="10" data-wow-delay=".3s">
          <thead>
            <tr>
              <th>Subject ID</th>
              <input type="hidden" name="ID" value="<?php echo $ID  ?>"/>
              <th><input class="e" type="text" name="sid" autocomplete="off"/></th>
            </tr>
          </thead>
          <tbody>
          <tr>
              <td>Subject Name</td>
              <td><input class="a" type="text" name="Name" autocomplete="off"/></td>
            </tr>
            <tr>
              <th>Subject Pudget</th>
              <th><input class="e" type="number" name="euro" autocomplete="off" /></th>
            </tr>
          </tbody>
        </table>
        <div class="text-center">
        <input type="submit" value="Add" class="btn col-sm-1 wow flash info"/>
        </div>
    </div>
      </form> <?php 
  }
 
    
  
  
  //insert subject page

  elseif ($action == 'Insert')
  { 
    if ($_SERVER['REQUEST_METHOD'] == 'POST')
    {

      $id = $_POST['ID'];
      $sid = $_POST['sid']; 
      $name = $_POST['Name']; 
      $euro = $_POST['euro']; 
      
      if($sid != '' && $name != '' && $euro != '' && $id != '')
      {
          $check = checkItems("subject_id" ,"subject", $sid);
          if($check > 0)
          {
            $msg = "<div class='container alert alert-danger'> Subject ID Already Exists!</div>";
            redirect($msg,'back');
          }
          else
          {  
            $stmt = $con->prepare("INSERT INTO subject(subject_id, subject_name, euro, tutor_id)
                              VALUES (:id, :name, :euro, $id) ");
            $stmt->execute(array(
              'id' => $sid,
              'name' => $name,
              'euro' => $euro,
            ));
            //success message  
            $msg = "<div class='container alert alert-success'>" . $stmt->rowCount() . " Record Added </div>";
            redirect($msg, 'Subjects');
        }
    }else {
        $msg = "<div class='container alert alert-danger'> All Fields Are Required!</div>";
        redirect($msg, 'back');
      }
    }else{
      $msg = "<div class='container alert alert-danger'>sorry you can't browse this page directly</div>";
      redirect($msg);
    } 
  }



  //edit tutor subjects
  elseif ($action == 'Edit')
  { 
    $stmt = $con->prepare("SELECT * FROM subject WHERE subject_id = ? LIMIT 1");
    $stmt->execute(array($ID));
    $row = $stmt->fetch();
    $count = $stmt->rowCount();
    if ($count > 0)
    { ?>
      <h1 class="b text-center">Edit Subject</h1>
      <form action="?action=Update" method="POST">
      <div class="container">
        <table class="table table-impo table-bordered table-dark wow bounceIn" data-wow-offset="10" data-wow-delay=".3s">
            <thead>
              <tr>
                <th>Subject ID</th>
                <input type="hidden" name="ID" value="<?php echo $ID  ?>"/>
                <th><?php echo $row['subject_id'] ?></th>
              </tr>
            </thead>
            <tbody>
            <tr>
                <td>Subject Name</td>
                <td><input class="a" type="text" name="Name" value="<?php echo $row['subject_name'] ?>" autocomplete="off"/></td>
              </tr>
              <tr>
                <th>Subject Pudget</th>
                <th><input class="e" type="number" name="euro" value="<?php echo $row['euro'] ?>" autocomplete="off" /></th>
              </tr>
            </tbody>
          </table>
          <div class="text-center">
          <input type="submit" value="Update" class="btn col-sm-1 wow flash info"/>
          </div>
      </div>
      </form> <?php 
    }
    else 
    {
      $msg = "<div class='container alert alert-danger'>Can't Found Subject!</div>";
      redirect($msg,'Subjects');
    }
  } 
    
  
  
  
  //update subject page
  elseif ($action == 'Update')
  {
    if ($_SERVER['REQUEST_METHOD'] == 'POST')
    {  // get var from the form
      $subjID = $_POST['ID']; 
      $subjname = $_POST['Name']; 
      $euro = $_POST['euro']; 
      
      //update database
      $stmt = $con->prepare("UPDATE subject SET subject_name = ?,  euro= ? WHERE subject_id = ? ");
      $stmt->execute(array($subjname, $euro, $subjID));
      
      //success message  
      $msg = "<div class='container alert alert-success'>" . $stmt->rowCount() . " Record  Updated </div>";
      redirect($msg, 'Subjects');
    }
    else
    {
      $msg = " <div class='container alert alert-danger'>sorry you can't browse this page directly</div>";
      redirect($msg,'Subjects');
    } 
  } 
  
  //Delete subject page
  elseif ($action == 'Delete')
  {
    $stmt = $con->prepare("SELECT * FROM subject WHERE subject_id = ? LIMIT 1");
    $stmt->execute(array($ID));  
    $count = $stmt->rowCount();
    if ($count > 0)
    { 
      $stmt = $con->prepare("DELETE FROM subject WHERE subject_id = ?");
      $stmt->execute(array($ID));  
      //success message  
      $msg = "<div class='container alert alert-success'>" . $stmt->rowCount() . " Record  Deleted </div>";
      redirect($msg, 'Subjects');
    }else {
      $msg = "<div class='container alert alert-danger'>Can't Found Subject ID </div>";
      redirect($msg, 'Subjects');
    }
  
  }
?>
  </header>
    <script>
      $(document).ready(function(){

        $('#delete').click(function(){
          return confirm('Are You Sure You Want To Delete!'); 
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