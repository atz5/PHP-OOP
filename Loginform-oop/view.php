<?php session_start(); ?>
<?php 
if (!isset($_SESSION['valid'])) {
	header("location:login.php");
}
 ?>
<?php 
require 'crud.php';
$crud=new crud();
$query="SELECT * FROM products WHERE login_id=\"$_SESSION[id]\" ORDER BY id DESC";
$result=$crud->getdata($query);
 ?>

 <!DOCTYPE html>
<html>
<head>
	<title>Home</title>
</head>
<body>
<a href="index.php">Home</a> | <a href="add.html">Add New Data</a> | <a href="logout.php">Logout</a>
<br/><br/>
<table width="80%" border="0">
<tr bgcolor='#CCCCCC'>
        <td>Name</td>
        <td>Quantity</td>
        <td>Price (euro)</td>
        <td>Update</td>
    </tr>
    <tr>
    	<?php 

    	foreach ($result as $key => $row) 
    	 {
    		echo "<tr>";
    		echo "<td>".$row['name']."</td>";
    		echo "<td>".$row['qty']."</td>";
    		echo "<td>".$row['price']."</td>";
    		echo "<td><a href=\"edit.php?id=$row[id]\">Edit</a> | 
    		<a href=\"delete.php?id=$row[id]\" onclick=\"return confirm('Are you sure want yo delete?')
    		\">Delete</a>";
    		echo "</tr>";
    	}
    	 ?>
    </tr>
</table>
</body>
</html>