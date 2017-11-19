<?php include('includes/header.php'); include('includes/conn.php');
    if(empty($_SESSION["anumber"]))
    {
      header("location:login.php");
    }
    
    $anumber = $_SESSION["anumber"];
    if (isset($_POST["deposit"])) {

  	//$unumber = $_POST['unumber'];    

  	$get_ext = explode("/",$_FILES["img"]["type"]);
  	$img = time().".".$get_ext[1];
  	$source_img = $_FILES["img"]["tmp_name"];
  	$target_img = "./uploads/".$img;
  	move_uploaded_file($source_img,$target_img);
	
    $datetime  = date(DATE_ATOM);
  	if(mysqli_query($con,"insert into `deposit`(anumber,deposit_slip_image,deposit_date) 
  	values('$anumber','$img','$datetime') "))
  	{
      header("location:deposit.php?success_msg");  		
  	}
  	else
  	{
  		echo "Upload error!";
  	}
}
?>

<div class="container">
  <div class="row">
  	<div class="col-lg-12">
      <h1>Deposit</h1>
      <p style="color:green;">
        <?php          
          if (isset($_REQUEST['success_msg'])) {
            echo "Your deposit request accept successfully and will verify soon.";
          }
        ?>
      </p>
    </div>
  </div>
  <div class="row">
    <div class="col-lg-4">
      <form action="deposit.php" method="post" enctype="multipart/form-data">
        <!-- <input type="text" name="unumber" placeholder="Number" required class="form-control"> -->
        <label style="float:left; padding:0 10px 0 0">Slip Image</label>
        <input type="file" name="img" placeholder="Slip Image" required style="float:left; padding:0 10px 0 0">
        <button type="submit" name="deposit">Submit</button> 
      </form>
    </div>    
  </div><br>
  <h4>Deposit Requests</h4>
  <hr>
  <div class="row">
    <div class="col-lg-12">

      <div class="card col-md-4">
        <h3 class="card-header">Card header</h3>
        <div class="card-body">
          <h5 class="card-title">Special title treatment</h5>
          <h6 class="card-subtitle text-muted">Support card subtitle</h6>
        </div>
        <img style="height: 200px; width: 100%; display: block;" src="data:image/svg+xml;charset=UTF-8,%3Csvg%20width%3D%22318%22%20height%3D%22180%22%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%20viewBox%3D%220%200%20318%20180%22%20preserveAspectRatio%3D%22none%22%3E%3Cdefs%3E%3Cstyle%20type%3D%22text%2Fcss%22%3E%23holder_158bd1d28ef%20text%20%7B%20fill%3Argba(255%2C255%2C255%2C.75)%3Bfont-weight%3Anormal%3Bfont-family%3AHelvetica%2C%20monospace%3Bfont-size%3A16pt%20%7D%20%3C%2Fstyle%3E%3C%2Fdefs%3E%3Cg%20id%3D%22holder_158bd1d28ef%22%3E%3Crect%20width%3D%22318%22%20height%3D%22180%22%20fill%3D%22%23777%22%3E%3C%2Frect%3E%3Cg%3E%3Ctext%20x%3D%22129.359375%22%20y%3D%2297.35%22%3EImage%3C%2Ftext%3E%3C%2Fg%3E%3C%2Fg%3E%3C%2Fsvg%3E" alt="Card image">
        <div class="card-body">
          <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
          <a href="#" class="card-link">Card link</a>
          <a href="#" class="card-link">Another link</a>
        </div>
        <div class="card-footer text-muted">
          2 days ago
        </div>
      </div>
      <table >
        <tr>                          
            <?php 
              $dquery=mysqli_query($con,"select * from deposit where anumber = $anumber");
              while ($row=mysqli_fetch_array($dquery)) {
               if ($row['status']== 0) {
                 $request = "Panding";
               }
               else{ $request =  1;}
                echo '<td style="float:left; padding:10px ;">
                      <img class="thumbnail" width="300" height="150" src="uploads/'.$row['deposit_slip_image'].'">
                      <span>'.$row['deposit_date'].'</span>  <span style="float:right;"> '.$request.'</span>                  
                      </td>
                ';       
              }
            ?>          
        </tr>
      </table>
    </div>    
  </div>
  
</div><!-- /.container -->


<?php include('includes/footer.php'); 

?>