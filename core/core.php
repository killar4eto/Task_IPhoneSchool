<?php
//Reporting errors
error_reporting(E_ALL);

//Including the database class (MySQLi)
include "database.php";

//Creating core class
Class core{
	
	//starting with the startup
	public static function startup(){
		
		//start function session
		session_start();	
	}
	
	//Render pages
	public static function render($path, $file){
		
		if(!file_exists($path."/".$file.".php")){
			print "<div class='alert alert-danger'>This file not exists!</div>";
		}else{
			include $path."/".$file.".php";
		}
		
	}
	
	//error
	public static function error($type, $desc){
		
		switch($type){
			
			//Case danger
			Case "missing":
				kernel::render("redirect", "pages", "404.html");
			break;
			
			//case host_missing
			Case "host_connection":
				echo "<div class='alert alert-warning'>".ucfirst($desc)."</div>";
			break;
			
			//case host_missing
			Case "db_connection":
				echo "<div class='alert alert-warning'>".ucfirst($desc)."</div>";
			break;
			
			//case wrong user
			Case "wrong_user":
				echo "<div class='alert alert-warning'>".$desc."</div>";
			break;
			
			//case danger
			Case "danger":
				echo "<div class='alert alert-danger'>".$desc."</div>";
			break;
			
			//case warning
			Case "warning":
				echo "<div class='alert alert-warning'>".$desc."</div>";
			break;
			
		}
		
	}	
}

core::startup();
?>