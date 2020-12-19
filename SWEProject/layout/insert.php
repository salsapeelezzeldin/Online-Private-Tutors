<?php
include '..\includes\functions\functions.php'; 
include '..\connect.php'; 
$connect = mysqli_connect("localhost", "root", "", "swProject");

if(isset($_POST["id"]))
{
  $id = $_POST["id"];
  $name = $_POST["name"];
  $email = $_POST["email"];
  $mob = $_POST["mob"];
  $school = $_POST["school"];
  $add = $_POST["add"];
  $city = $_POST["city"];
  $query ='';
  if($id != '' && $name != '' && $email != '' && $mob != '' && $school != '' && $add != '' && $city != '')
  {
    //check if tutor exist
    $query .= '
      INSERT INTO Tutors (TutorID, UserName, Email, MobileNum, SchoolName, Address, City) 
      VALUES("'.$id.'", "'.$name.'", "'.$email.'", "'.$mob.'", "'.$school.'", "'.$add.'", "'.$city.'"); 
    ';
  }
}
if($query != '')
{ 
  if(mysqli_multi_query($connect, $query))
    {
      echo 'Item Data Inserted';
    }
    else
    {
      echo 'Error';
    }
}else
{
  echo 'All Fields are Required';
}


?>