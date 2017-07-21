<?php
include "core.php";

if(isset($_GET['add_cat'])){
	$name = htmlspecialchars($_GET["name"]);
	$desc = htmlspecialchars($_GET["desc"]);
	
	if($name == ""){
		echo "error";
	}
	else{
		
		$insert = DB::query("insert", "INSERT INTO categories (name, description)VALUES('$name', '$desc')", NULL);
		
		echo "Good job, you added <b>$name</b> to categories.";
	}
}
elseif(isset($_GET['add_task'])){
	
}
else{}
?>