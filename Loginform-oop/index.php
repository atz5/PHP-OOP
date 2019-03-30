<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>
	<title>Home Page</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	<div id="header">
		Welcome To My Page!
	</div>
	<?php 
	if (isset($_SESSION['valid'])) {
		include_once 'crud.php';
		$crud=new crud();
		$result=$crud->login();
	 ?>
	 Welcome<?php echo $_SESSION['name']; ?>
	 <a href="logout.php">Logout</a><br>
	 <a href="view.php">View and Add Product</a>

<?php 
	}
	else{
		echo "You must be logged in to view this page.<br><br>";
		echo "<a href='login.php'>Login</a> | <a href='register.php'>Register</a>";

	}
 ?>
<div id="footer">
	Created By ATZ
</div>
</body>
</html>
