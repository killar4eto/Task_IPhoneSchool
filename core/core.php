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
	
	//All categories
	public static function allCategories(){
		$results = DB::query("fetch_all", "SELECT * FROM categories", NULL);
		$total = DB::query("count_all", "SELECT id FROM categories", NULL);
		
		if($total < 1){
			echo "<p class='callout callout-info'>No categories were created yet...</p>";
		}
		else{
			for($i=0;$i<$total;$i++){
				
				echo "
				<option value='".$results[$i]['id']."'>
					".$results[$i]['name']."
				</option>
				";							
			}			
		}		
	}
	
	//Show tasks
	public static function tasks(){
		$results = DB::query("fetch_all", "SELECT * FROM tasks WHERE obtained_by='".$_SESSION['user']."' ORDER BY created_on DESC", NULL);
		$total = DB::query("count_all", "SELECT id FROM tasks WHERE obtained_by='".$_SESSION['user']."'", NULL);
		
		if($total < 1){
			echo "<p class='callout callout-info'>No tasks were created yet...</p>";
		}
		else{
			for($i=0;$i<$total;$i++){
				
				echo "
				<li class='list-group-item'>
					<a href='?action=view&task=".@$results[$i][id]."'>".$results[$i]['name']."</a> - <i class='fa fa-trash' aria-hidden='true'></i>
				</li>
				";							
			}			
		}
	}
	
	//View all
	public static function viewAll(){
		$results = DB::query("fetch_all", "SELECT * FROM tasks ORDER BY created_on DESC", NULL);
		$total = DB::query("count_all", "SELECT id FROM tasks", NULL);
		
		if($total < 1){
			echo "<p class='callout callout-info'>No tasks were created yet...</p>";
		}
		else{
			for($i=0;$i<$total;$i++){
				$cat = DB::query("fetch_row", "SELECT name FROM categories WHERE id='".$results[$i]['category_id']."'", NULL);
				
				echo "
				      <tr>
						<td>".$results[$i]['id']."</td>
						<td>".$results[$i]['name']."</td>
						<td>".$cat['0']."</td>
						<td>".$results[$i]['obtained_by']."</td>
						<td>".$results[$i]['created_on']."</td>
					  </tr>
				";							
			}			
		}		
	}
	
	//View Task
	public static function viewTask(){
		if(isset($_GET['action'])){
			
			$id = htmlspecialchars($_GET['task']);
			$results = DB::query("fetch_row", "SELECT name, description FROM tasks WHERE id='".$id."'", NULL);
			
			echo "
			<div class='thumbnail'>
				<div class='caption-full'>
					<h4>".$results[0]."</h4>
					<p>".$results[1]."</p>
				</div>
			</div>
			";			
		}
		else{
			$results = DB::query("fetch_row", "SELECT name, description FROM tasks WHERE obtained_by='".$_SESSION['user']."' ORDER BY created_on DESC", NULL);
			
			echo "
			<div class='thumbnail'>
				<div class='caption-full'>
					<h4>".$results[0]."</h4>
					<p>".$results[1]."</p>
				</div>
			</div>
			";
		}
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