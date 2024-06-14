<?php   session_start();  ?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
</head>

<body style="font-size:300px;">
	
	<form action="#"method="POST">	
	<input type="text"placeholder="USername"name="username"><br><br>
	<input type="password"placeholder="password"name="password"><br><br>
	<input type="submit"value="LOGIN"name="submit">	
	</form>
	
	<?php
	
	include('connection.php');
	if($con)
	{
		if(isset($_POST['submit']))
		{
			$username="";
			if(isset($_POST['username']))
			{
				$username=$_POST['username'];
			}
			$password="";
			if(isset($_POST['password']))
			{
				$password=$_POST['password'];
			}
			$sql="SELECT * FROM users where username='$username' AND password='$password'";
			$results=mysqli_query($con,$sql);
			if(mysqli_num_rows($results)>0)
			{
				$row=mysqli_fetch_assoc($results);
				$role=$row['role'];
				$username=$row['username'];
				//now initialize session
				$_SESSION['username']=$row['email'];
				$_SESSION['role']=$row['role'];
				if($role=="admin")
				{
					header("location:admin/");
				}
				else if($role=="student")
				{
					header("location:student/");
				}
				else if($role=="instructor")
				{
					header("location:instructor/");
				}
				
			}
			else
			{
				echo 'incorrect username or password';
			}
		}
		
	}
	else
	{
		echo "connection failed";
	}
	
	mysqli_close($con);
	?>
	
</body>
</html>