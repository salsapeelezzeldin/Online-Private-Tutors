<?php
//fetch.php
$connect = mysqli_connect("localhost", "root", "", "swProject");
$output = '';
$query = "SELECT * FROM Tutors";
$result = mysqli_query($connect, $query);
$output .= '
  <table class="table table-bordered table-dark wow bounceIn" id ="crud_table" data-wow-offset="10" data-wow-delay=".3s">
    <thead>
      <tr>
        <th scope="col">Tutor ID</th>
        <th scope="col">Name</th>
        <th scope="col">E-Mail</th>
        <th scope="col">Number</th>
        <th scope="col">School</th>
        <th scope="col">Address</th>
        <th scope="col">City</th>
        <th colspan="2">action</th>
      </tr>
    </thead>
';
            
$output .= '<tbody>';
                
while($row = mysqli_fetch_array($result))
{    
  $output .= '
    <tr>
      <td class="id">'.$row['TutorID'].'</td>
      <td class="name" data-id1="'.$row['TutorID'].'">'.$row['UserName'].'</td>
      <td class="email" data-id2="'.$row['TutorID'].'">'.$row['Email'].'</td>
      <td class="mob" data-id3="'.$row['TutorID'].'">'.$row['MobileNum'].'</td>
      <td class="school" data-id4="'.$row['TutorID'].'">'.$row['SchoolName'].'</td>
      <td class="add" data-id5="'.$row['TutorID'].'">'.$row['Address'].'</td>
      <td class="city" data-id6="'.$row['TutorID'].'">'.$row['City'].'</td>
      <td><ul><li class="btn btn-success btn-xs" data-id7="'.$row['TutorID'].'"><a href="page1.php?action=Edit&id='.$row['TutorID'].'"><i class="fa fa-edit"></i></a></li></ul></td>
      <td><ul><li class="high del"><button type="button" name="btn-delete" class="btn btn-danger btn-xs confirm" id="btn-delete" data-id8="'.$row['TutorID'].'">x</button></li></ul></td>
    </tr>    
  ';
}

$output .= '
  <tr>
    <td id="id" contenteditable></td>
    <td id="name" contenteditable></td>
    <td id="email" contenteditable></td>
    <td id="mob" contenteditable></td>
    <td id="school" contenteditable></td>
    <td id="add" contenteditable></td>
    <td id="city" contenteditable></td>
    <td colspan="2" ><button type="button" name="btn-add" class="btn btn-primary btn-xs " id="btn-add" >+ Add</button></td>
  </tr>
';

$output .=  '</tbody>';  
$output .= '</table>';
echo $output;
?>

