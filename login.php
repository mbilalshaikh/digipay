<?php 
include('includes/header.php');



//login check
//session_start();

if (isset($_POST['submit'])) {
  $unumber = $_POST['unumber'];
  $upassword = $_POST['upassword'];
  
  include('includes/conn.php');
  $query="SELECT * FROM accounts where anumber='$unumber' and apassword='$upassword' and status = 1";
  $run=mysqli_query($con,$query);

  $row=mysqli_fetch_array($run);
  
    if($row >0)
    {
      $_SESSION['anumber']=$unumber;
      $_SESSION['atype']=$atype;
      if ($row['atype'] == "admin") {
        redirect("admin.php");
        //header("location:admin.php");
      }
      else{
        header("location:profile.php");
      }        
    }
    else{
      //login error      
      header("location:login.php?login_error");
    }
  
}

?>

<div class="container bg_img">
  <div class="row">
    <div class="col-lg-4">
      <h1>Login</h1>
      <p style="color:red;">
        <?php
          //error check
          if (isset($_REQUEST['login_error'])) {
            //$error=$_REQUEST['login_error'];
            echo "Incorrect Number or Password.";
          }
        ?>
      </p>
      <form action="login.php" method="post">
        <input type="text" name="unumber" placeholder="Number" required class="form-control">
        <input type="password" name="upassword" placeholder="Password" required class="form-control">
        <button class="" type="submit" name="submit">Login</button> 
      </form>
    </div>
  </div>
</div><!-- /.container -->

<?php include('includes/footer.php'); 

?>