<?php  
$title = 'Manage E-Books';
include 'adminNavBar.php';

?>

    <div class="inpo">
        <input class="wow bounceInLeft" data-wow-delay=".4s">
        <ul><li class="last-li wow bounceInRight" data-wow-delay=".4s"><a href="#">Add</a></li></ul>
    </div>
    
    <div class="container">
        <!--start table-->
        <table class="table table-bordered table-dark wow bounceIn" data-wow-offset="10" data-wow-delay=".3s">
          <thead>
            <tr>
              <th scope="col">Subjects</th>
              <th scope="col">File</th>
              <th scope="col">E-Mail</th>
              <th scope="col">Number</th>
              <th scope="col">Action</th>
              <th scope="col">Action</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td></td>
              <td></td>
              <td></td>
              <td></td>
              <td class="high up"><ul><li><a href="#">Update</a></li></ul></td>
              <td class="high del"><ul><li><a href="#">Delete</a></li></ul></td>
            </tr>
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