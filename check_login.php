<!DOCTYPE html>

<head>
	<meta charset="UTF-8">
	<?php
		session_start();
		//include ("header.php");
		include ("connect.php");
        spl_autoload_register(function ($class_name){
            include $class_name . ".php";
        });
	?>
</head>
<?php
	function login($user,$pass,$conn){

			$sql = "SELECT username,passwd FROM members WHERE username='$user' AND passwd='$pass'";
			$res = $conn -> query($sql);
			if($row = $res -> fetch_assoc()){					
				return 1;
			}
			else{				
				return 0;
			}
	}
	if (isset($_POST["login"]))
	{
		$user1 =$_POST["user"];
		$pass1 = $_POST["password"];
        global $conn;

        if(login($user1,$pass1,$conn)){
				$_SESSION['type'] = "admin";
				header("location: checkout_cart.php");
				exit();
			}
		else{
			header("location: login.php?x=error");
			exit();
		}
	}
	if(isset($_POST["logout"]))
	{		
		session_unset();
		session_destroy();
		if (ini_get("session.use_cookies")) {
			setcookie(session_name(),'',time() - 3600,"/");
		}
		echo "Session deleted";
		header("location: login.php");
		exit();
	}
	if($_SESSION['type'] != "admin") 
	{
		header("location: login.php");
		exit();
	}
	show_source("check_login.php");
?>