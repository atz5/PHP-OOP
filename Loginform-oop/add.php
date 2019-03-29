<?php session_start(); ?>
<?php 
if (!isset($_SESSION['valid'])) {
	header("location:login.php");
}
 ?>
<!DOCTYPE html>
<html>
<head>
	<title>Add Data</title>
</head>
<body>

<?php 
require 'crud.php';
$crud=new crud();
if (isset($_POST['submit'])) {
	$name=$_POST['name'];
	$qty=$_POST['qty'];
	$price=$_POST['price'];
	$loginid=$_SESSION['id'];

	if (empty($name)) {
 		echo "<font color='red'>Name field is empty.</font><br/>";
	}elseif (empty($qty)) {
 		echo "<font color='red'>Quantity field is empty.</font><br/>";
	}elseif (empty($price)) {
 		echo "<font color='red'>Price field is empty.</font><br/>";
	}else{
		$result=$crud->execute("INSERT INTO products(name,qty,price,login_id)
			VALUES('$name','$qty','$price','$loginid')");
		echo "<font color='green'>Data added successfully.";
        		echo "<br/><a href='view.php'>View Result</a>";
	}
}
 ?>
</body>
</html>
