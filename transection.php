<?php 
	include("includes/header.php");
	include("includes/conn.php");
?>
<div class="container">
  <div class="row">
  	<div class="col-lg-12">
      <h1>Transection</h1>
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
        <input type="text" name="unumber" placeholder="Number" required class="form-control">
        <input type="text" name="money" placeholder="00.0" required class="form-control">
        <!-- <label style="float:left; padding:0 10px 0 0">Slip Image</label>
        <input type="file" name="img" placeholder="Slip Image" required style="float:left; padding:0 10px 0 0"> -->
        <button type="submit" name="transection">Send</button> 
      </form>
    </div>    
  </div><br>
  <h4>Transection History</h4>
  <hr>

  <?php include(inc."footer.php");  ?>