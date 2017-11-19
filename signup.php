<?php 
  include('includes/header.php');
  include('includes/conn.php');

  if (isset($_POST['signup'])) {
      $uemail = $_POST['uemail'];
      $unumber = $_POST['unumber'];
      $upassword = $_POST['upassword'];
      
      $sql="insert into accounts(email,anumber,apassword)values('$uemail','$unumber','$upassword')";

      $run_data=mysqli_query($con,$sql);
      if ($run_data) {
        echo "Account Create Successfully.";
      }
      else{
        echo "Error: Please try again.";
      }
    $con->close();
  }

?>

<div class="container">
  <div class="row">
    <div class="col-lg-4">    
      <h1>Create Account</h1>
      <form action="signup.php" method="post">
        <input type="email" name="uemail" placeholder="Email" required class="form-control" />
        <input type="text" name="unumber" placeholder="Number" required class="form-control" />
        <input type="password" name="upassword" placeholder="Password" required class="form-control" />
        <button type="submit" name="signup">Sign Up</button> 
      </form>
    </div>
  </div>
</div><!-- /.container -->

<?php include('includes/footer.php'); 

?>