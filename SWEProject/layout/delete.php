<?php  
	$connect = mysqli_connect("localhost", "root", "", "swProject");
	$sql = "DELETE FROM Tutors WHERE TutorID = '".$_POST["id"]."'";  
	if(mysqli_query($connect, $sql))  
	{  
		echo 'Data Deleted';  
	}  
 ?>