<?php session_start(); ?>
<?php 
if (!isset($_SESSION['valid'])) {
	header("location:login.php");
}else{
require 'crud.php';
$crud=new crud();
$id=$_GET['id'];
$result=$crud->delete($id,"products");
header("location:view.php");
	
}

 ?>