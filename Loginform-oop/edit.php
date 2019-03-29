<?php session_start(); ?>
<?php if (!isset($_SESSION['valid'])) {
	header("location:login.php");
} ?>

<?php 
include_once 'crud.php';
$crud=new crud();

if (isset($_POST['submit'])) {
	$id=$_POST['id'];
	$name=$crud->escape_string($_POST['name']);
	$qty=$crud->escape_string($_POST['qty']);
	$price=$crud->escape_string($_POST['price']);

	$result=$crud->execute("UPDATE products SET name='$name',qty='$qty',price='$price' WHERE id=$id");
	header("location:view.php");
}


 ?>

<!DOCTYPE html>
<html>
<head>
	<title>Edit</title>
</head>
<body>
	<?php 
		$id=$_GET['id'];
		$result=$crud->getdata("SELECT * FROM products WHERE id=$id");
		foreach ($result as $key => $row) 
		  {
			$name=$row['name'];
			$qty=$row['qty'];
			$price=$row['price'];
		}
	 ?>
  <a href="index.php">Home</a> | <a href="view.php">View Products</a> | <a href="logout.php">Logout</a>
    <br/><br/>

	<form action="" method="post" name="form1">
		<table>
			<tr>
				<td>Name</td>
				<td><input type="text" name="name" value="<?php echo $name; ?>"></td>
			</tr>
			<tr>
				<td>Quantity</td>
				<td><input type="text" name="qty" value="<?php echo $qty; ?>"></td>
			</tr>
			<tr>
				<td>Price</td>
				<td><input type="text" name="price" value="<?php echo $price; ?>"></td>
			</tr>
			<tr>
				<td><input type="hidden" name="id" value="<?php echo $_GET['id'];?>"></td>
				<td><input type="submit" name="submit" value="Update"></td>
			</tr>


		</table>
	</form>

</body>
</html>