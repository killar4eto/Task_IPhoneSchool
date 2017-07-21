<?php
//Reporting errors
error_reporting(E_ALL);

//Including the database class (MySQLi)
include "./core/database.php";

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
}

core::startup();
?>