<?php 
/**
 * 
 */
include_once 'connection.php';
class crud extends con
{
	
	public function __construct()
	{
		parent::__construct();
	}
	public function login(){
		$this->conn->query("SELECT * FROM login");
	}
	public function escape_string($value){
		return $this->conn->real_escape_string($value);
	}
	public function execute($query){
		$result=$this->conn->query($query);
		if (!$result) {
			echo "Cannot Ececute command";
		}
		return $this->conn;
	}
	public function valid($query){
		$result=$this->conn->query($query);
		if (!$result) {
			echo "Cannot Ececute command";
		}
		$row=$result->fetch_array();
		if (is_array($row) && !empty($row)) {
			$validuser=$row['username'];
			$_SESSION['valid']=$validuser;
			$_SESSION['name']=$row['name'];
			$_SESSION['id']=$row['id'];
		}else{
			echo "Invalid Username or Password<br>";
				echo "<a href='login.php'>Go Back</a>";
		}if (isset($_SESSION['valid'])) {
			header("location:index.php");
		}

	}

	public function getdata($query){
		$result=$this->conn->query($query);
		if (!$result) {
			return false;
		}
		$rows=array();
		while ($row=$result->fetch_array()) {
			$rows[]=$row;
		}
		return $rows;

	}


	public function delete($id,$table){
		$query="DELETE FROM $table WHERE id=$id";
		$result=$this->conn->query($query);
		if (!$result) {
			echo "Error Cannnot Delete item";
		}
		return $this->conn;
	}













}

 ?>