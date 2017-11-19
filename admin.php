<?php 
	include('includes/header.php');
	include('includes/conn.php');

	if(empty($_SESSION["anumber"]))
	{
		header("location:login.php");
	}
	$unumber = $_SESSION["anumber"];
?>

<div class="container">  
	<h1>Admin Panel</h1>
    <div class="row">
	    <div class="col-lg-12">
	      	<table >
		        <tr>                          
		            <?php 
		              $dquery=mysqli_query($con,"select * from deposit where anumber = $unumber");
		              while ($row=mysqli_fetch_array($dquery)) {
		               if ($row['status']== 0) {
		                 $request = "Panding";
		               }
		               else{ $request =  1;}
		                echo '<td style="float:left; padding:10px ;">
		                      <img class="thumbnail" width="PDF_create_3dview(pdfdoc, username, optlist)00" height="150" src="uploads/'.$row['deposit_slip_image'].'">
		                      <span>'.$row['deposit_date'].'</span>  <span style="float:right;"> '.$request.' <form></form></span>                  
		                      </td>
		                ';       
		              }
		            ?>          
		        </tr>
	    	</table>
		</div>    
	</div>
</div><!-- /.container -->
<form action="admin.php" method="post">
	<input type="checkbox" name="cb">
	<button type="submit" name="update">Update</button>
</form>


<?php include('includes/footer.php'); 

?>
