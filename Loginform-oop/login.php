<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
</head>
<body>
	<a href="index.php">Home</a>
	<?php 
	include_once 'crud.php';
	$crud=new crud;
	if (isset($_POST['submit'])) {
		include_once 'crud.php';
		$crud=new crud();
		$user=$crud->escape_string($_POST['username']);
		$pass=$crud->escape_string($_POST['password']);
		if ($user==""|| $pass=="") {
			echo "Either username or password field is empty.<br>";
			echo "<a href='login.php'>Go back</a>";
		}else{
			$result=$crud->valid("SELECT * FROM login WHERE username='$user' AND password=md5('$pass')");
		}


	}
	else{
	 ?>
	<form action="" method="post" name="form1">
	 <p><font size="+2">Login</font></p>
	 <table width="75%" border="0">
	 	<tr>
	 		<td width="10%">Username</td>
	 		<td><input type="text" name="username"></td>
	 	</tr>
	 	<tr>
	 		<td>Password</td>
	 		<td><input type="password" name="password"></td>
	 	</tr>
	 	<tr>
	 		<td></td>
	 		<td><input type="submit" name="submit" value="Submit"></td>
	 	</tr>
	 </table>
		
	</form>


	<?php 
	}
	 ?>
</body>
</html>