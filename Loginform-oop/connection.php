<?php 
/**
 * 
 */
class con 
{
	private $host="localhost";
	private $username="root";
	private $password="";
	private $database="login";

	protected $conn;
	function __construct()
	{
		if(!isset($this->conn)) {
			$this->conn=new mysqli($this->host,$this->username,$this->password,$this->database);
			if (!$this->conn->connect_error) {
				return $this->conn;
			}else{
				echo "Error".$this->conn->error;
			}
		}
		
	}
}

 ?>