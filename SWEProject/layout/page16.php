<?php


$title = 'Appoint';

include 'ParentNavBar.php';
?>
        <div class="inpo reg-inpo">
            <ul><li class="last-li wow bounceInLeft" data-wow-delay=".4s"><a href="Parent  Login.php">Back</a></li></ul>
        </div>
        
        <div class="register">
            <h4 class="text-center">Parent Request to Appoint a Tutor</h4>
            <table class="table table-bordered table-white ta-reg">
              <thead>
                <tr>
                  <th scope="col">Subject</th>
                  <th scope="col">Euro</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>math</td>
                  <td>20</td>
                </tr>
              </tbody>
            </table>
            <div class="form">
                <h4>Enter Hourly Basis </h4>
                <input class="appoint" type="email" name="name" placeholder="Please Enter Your name">
            </div>
            <div class="form">
                <h4>Total Amount </h4>
                <input class="appoint" type="number" name="id" placeholder="Please Enter Your Id">
            </div>
            <div class="form">
                <h4>Select Date </h4>
                <input class="appoint" type="email" name="school name" placeholder="Please Enter Your school name">
            </div>
            <div class="form">
                <h4>Select Time </h4>
                <input class="appoint" type="email" name="address" placeholder="Please Enter Your address">
            </div>
            <div class="reg">
            <button class="pay-button"><a class="bb" href="page16.php">Send Request</a></button>
            </div>
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