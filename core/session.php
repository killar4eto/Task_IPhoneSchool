<?php
include "core.php";

if(isset($_GET["signout"])){
	if(isset($_SESSION["user"])){
		
		echo "true";
		session_destroy();
		
	}
	else{
		session_destroy();
		echo "false";
	}
}
elseif(isset($_GET['all'])){
	print_r($_SESSION);
}
elseif(isset($_GET["set_session"])){
	
	$email = htmlspecialchars($_GET["email"]);
	$password = htmlspecialchars($_GET["pass"]);
	
	if($email == "" || $password == ""){
		core::error("warning", "Can't leave empty fields.");
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
		}
		else{
			core::error("warning", $email." do not exist or wrong password. Please, try again...");
		}	
	}
	
}
else{}
?>