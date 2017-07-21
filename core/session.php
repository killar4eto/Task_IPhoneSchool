<?php
include "./kernel.php";

if(isset($_GET["signout"])){
	if(isset($_SESSION["user"])){
		
		echo "true";
		DB::query("update", "UPDATE user_settings SET status='Offline' WHERE userID='".$_SESSION[user]."'", NULL);
		session_destroy();
		
	}
	else{
		session_destroy();
		echo "false";
	}
}
elseif(isset($_GET["session_time"])){
		
	if(isset($_SESSION["user"])){
		
		DB::query("update", "UPDATE user_settings SET status='Online' WHERE userID='".$_SESSION[user]."'", NULL);
		
		$_SESSION["temp_session"] = $_SESSION["user"];
	
		unset($_SESSION["user"]);
		
		echo "true";

	}
	else{
		echo "false";
	}
		
}
elseif(isset($_GET['all'])){
	print_r($_SESSION);
}
elseif(isset($_GET["return_session"])){
	
	$email = $_SESSION["temp_session"];
	$password = htmlspecialchars($_GET["password"]);
	
	if($email == "" || $password == ""){
		echo "false";
	}
	else{
		//User from DB
		$db_user = DB::query("fetch_row", "SELECT email FROM users WHERE email='".$email."' AND password='".$password."'", NULL);
		$row = array();

		foreach($db_user as $key){
			$row[] = $key;	
		}
		
		if($email == $row[0]){
			echo "true";
			
			$_SESSION["user"] = $email;
			
			unset($_SESSION['temp_session']);
			
			DB::query("update", "UPDATE user_settings SET status='Online' WHERE userID='".$email."'", NULL); 
			
		}
		else{
			kernel::error("wrong_user", "You typed wrong password!");
		}
	}		
	
}
elseif(isset($_GET["set_session"])){
	
	$email = htmlspecialchars($_GET["email"]);
	$password = htmlspecialchars($_GET["pass"]);
	
	if($email == "" || $password == ""){
		kernel::error("warning", "Can't leave empty fields.");
	}
	else{
		//User from DB
		$db_user = DB::query("fetch_row", "SELECT email FROM users WHERE email='".$email."' AND password='".$password."'", NULL);
		$row = array();

		foreach($db_user as $key){
			$row[] = $key;	
		}
		
		if($email == $row[0]){
			echo "true";
			
			$_SESSION["user"] = $email;
			DB::query("update", "UPDATE user_settings SET status='Online' WHERE userID='".$email."'", NULL); 
		}
		else{
			kernel::error("warning", $email." do not exist or wrong password. Please, try again...");
		}	
	}
	
}
else{}
?>