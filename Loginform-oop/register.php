<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>
	<title>Register</title>
</head>
<body>
	<a href="index.php">Home</a>
	<?php 
	include_once 'crud.php';
	$crud=new crud();
	if (isset($_POST['submit'])) {
		$name=$crud->escape_string($_POST['name']);
		$user=$crud->escape_string($_POST['username']);
		$email=$crud->escape_string($_POST['email']);
		$pass=$crud->escape_string($_POST['password']);

		if ($name=="" ||$user==""|| $email=="" || $pass=="") {
			echo "All fields should be filled. Either one or many fields are empty.";
            echo "<br/>";
            echo "<a href='register.php'>Go back</a>";
		}else{
			$result=$crud->execute("INSERT INTO login(name,email,username,password)
				VALUES('$name','$user','email',md5('$pass'))");
			echo "Registration successfully";
            echo "<br/>";
            echo "<a href='login.php'>Login</a>";
		}




	}else{
	 ?>
	 	 <p><font size="+2">Register</font></p>
        <form name="form1" method="post" action="">
            <table width="75%" border="0">
                <tr> 
                    <td width="10%">Full Name</td>
                    <td><input type="text" name="name"></td>
                </tr>
                <tr> 
                    <td>Email</td>
                    <td><input type="text" name="email"></td>
                </tr>            
                <tr> 
                    <td>Username</td>
                    <td><input type="text" name="username"></td>
                </tr>
                <tr> 
                    <td>Password</td>
                    <td><input type="password" name="password"></td>
                </tr>
                <tr> 
                    <td>&nbsp;</td>
                    <td><input type="submit" name="submit" value="Submit"></td>
                </tr>
            </table>
        </form>


	 <?php 
	}
	  ?>

</body>
</html>