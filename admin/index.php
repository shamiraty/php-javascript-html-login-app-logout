<?php session_start(); 
if($_SESSION['username'])
{
	$currentUser=$_SESSION['username'];
}
else
{
	header("location: ../login.php");
}

?>

<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Admin</title>
</head>
<body>
	
	<div style="padding: 30px;background-color: aliceblue; border-radius: 5px">
	
	<h3 style="color: blue"><?php echo $currentUser;  ?></h3>
			<h3 style="color: blue">your role is: <?php echo $_SESSION['role'];  ?></h3>
	
 <a href="index.php?id=logout">Logout </a>
	
	</div>
	<?php
	
	if(isset($_GET['id']))
	{
		session_destroy();
		header("location: ../login.php");
	}
	
	
	?>
	
</body>
</html>