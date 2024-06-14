<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
</head>
<body>
	
	<div id="error"style="padding:20px;background-color: #E3161A;color:white;border-radius:4px;display: none; width: 30%"> </div>
    <form action="#"method="POST"name="form1"onsubmit="return validate();">
	<input type="text"placeholder="email"name="email"><br><br>
	<input type="text"placeholder="phone number"name="phone"><br><br>
	<input type="text"placeholder="username"name="username"><br><br>
	<input type="text"placeholder="password"name="password"><br><br>
	<input type="text"placeholder="role"name="role"><br><br>
	<input type="submit"value="REGISTER"name="submit">

	</form>	
	
	<?php
	include('connection.php');
	if($con)
	{
		if(isset($_POST['submit']))
		{
			$email="";
			if(isset($_POST['email']))
			{
				$email=$_POST['email'];
			}
			$phone="";
			if(isset($_POST['phone']))
			{
				$phone=$_POST['phone'];
			}
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
			$role="";
			if(isset($_POST['role']))
			{
				$role=$_POST['role'];
			}
		
			$sql="SELECT * FROM users where email='$email' OR phone='$phone'";
			$results=mysqli_query($con,$sql);
			if(mysqli_num_rows($results)>0)
			{
				echo 'Registration Failed, the user already exist';
			}
			else
			{
				$sql2="INSERT INTO users(email,phone,username,role,password)VALUES('$email','$phone','$username','$role','$password')";
				$result2=mysqli_query($con,$sql2);
				if($result2)
				{
					echo '<script> success();  </script>';
					echo '<a href="login.php">LOGIN</a>';
				}
				else
				{
					echo 'registration failed, please try again';
				}
			}
			
			
		}
	}
	else
	{
		echo "database not found";
	}
	
	
	
	
	?>
	<script>
	function validate()
		{
			var error=document.getElementById('error');
			var email=document.forms['form1']['email'].value;
			var username=document.forms['form1']['username'].value;
			if(email=="")
				{
					error.style.display="block";
					error.innerHTML="ingiza email";
					return false;
				}
			
			if(username=="")
				{
					error.style.display="block";
					error.innerHTML="ingiza username";
					return false;
				}
			
			function success()
			{
					error.style.display="block";
				    error.style.backgroundColor="blue";
					error.innerHTML="registration successfull";
			}
		}
	
	</script>
	
	
</body>
</html>