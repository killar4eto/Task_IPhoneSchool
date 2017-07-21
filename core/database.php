<?php
//Database class based on MySQLi
Class DB{
	
	//connect database
	public function connect(){
		$con = mysqli_connect("localhost", "root", "", "updateme");

		// Check connection
		if (mysqli_connect_errno()){
			echo "Failed to connect to MySQL: " . mysqli_connect_error();
		}
		else{
			return $con;
		}

	}
	
	public function query($type, $statement, $data){
		
		$statement = htmlspecialchars($statement);
		$data = htmlspecialchars($data);
		
		//Switch
		switch($type){
			//Case fetch_all
			case "fetch_all":
				$results = DB::connect()->query($statement);
				if($results < 1){
					return "No data has been stored.";
				}
				else{				
					$rows = array();
					
					while($row = $results->fetch_array()){
						
						 $rows[] = $row;
							 
					}
					
					return $rows; 
				}

				// Frees the memory associated with a result
				$results->free();

				// close connection 
				DB::connect()->close();
				
			break;
			
			//Case fetch_object
			case "fetch_row":
				$results = DB::connect()->query($statement);
				
				if($results < 1){
					return "No data has been stored.";
				}
				else{
					$rows = array();
					
					while($row = $results->fetch_row()){
						
							 $rows = $row;
							 
					}
					
					return $rows;
				}
				
				// Frees the memory associated with a result
				$results->free();

				// close connection 
				DB::connect()->close();
				
			break;
			
			//Case fetch total numbers
			case "count_all":
				$results = DB::connect()->query($statement);
				$rows = mysqli_num_rows($results);
				
				return $rows;
				
				// Frees the memory associated with a result
				$results->free();

				// close connection 
				DB::connect()->close();
			break;
			
			//Update case
			case "update":
				$results = DB::connect()->query($statement);

				// close connection 
				DB::connect()->close();
			break;
			
			//Delete case
			case "delete":
				$results = DB::connect()->query($statement);
				
				echo $data." has been removed";

				// close connection 
				DB::connect()->close();				
			break;
		}
		
	}
	
}

?>