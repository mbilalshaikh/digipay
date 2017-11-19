<?php 
	session_start();
	if(!isset($_SESSION["user_name"]))
	{
		header("location: ../login.php");
	}
 ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<a href="logout.php">Logout</a>
<h1>Welcome Mr.<?php echo $_SESSION["user_name"]; ?></h1>
</body>
</html>