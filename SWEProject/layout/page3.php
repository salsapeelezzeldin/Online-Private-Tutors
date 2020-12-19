<?php  

$title = 'Veiw Parents';
include 'adminNavBar.php';


session_start();
if (isset($_SESSION['loggedin']))
{  
  include '..\connect.php';
  $stmt = $con->prepare("SELECT * FROM Parents");
  $stmt->execute();
  $rows = $stmt->fetchAll();
} else  {
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
                  <th scope="col">Email ID</th>
                  <th scope="col">Mobile Number</th>
                  <th scope="col">Address</th>
                  <th scope="col">City </th>
                </tr>
              </thead>
              <tbody>
                <?php
                    foreach($rows as $row)
                    {
                        echo "<tr>";
                            echo "<td>" . $row['FullName'] . "</td>";
                            echo "<td>" . $row['Email'] . "</td>";
                            echo "<td>" . $row['MobileNum'] . "</td>";
                            echo "<td>" . $row['Address'] . "</td>";
                            echo "<td>" . $row['City'] . "</td>";
                            
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