<?php

// connect to DB and store connection in a variable.
$servername = "localhost";
$username = "username";
$password = "password";
$dbname = "dbname";

// Create connection
$db = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$db) {
    die("Connection failed: " . mysqli_connect_error());
}

// function to display the results of a query as a table.
function display_query($sql){
	global $db;

	$result = mysqli_query($db,$sql);

	if (mysqli_num_rows($result) > 0) {			
	
		$finfo = mysqli_fetch_fields($result);
		echo "<table class='table'>";
		echo "<tr>";
		foreach ($finfo as $val) {			
			echo "<td>";
			$self = $_SERVER['PHP_SELF'];
			echo "<b>" . $val->name . "<b></a>";
			echo "</td>";
		}		
		echo "</tr>";
			
		while($row = mysqli_fetch_array($result)) {			
			echo "<tr>";				 				
			for($x = 0; $x < count($finfo);$x++){			
	 			echo "<td>";
				echo $row[$x];
				echo "</td>";				
			}
			echo "<td><a href='#'><button>custom</button></a></td>";
			echo "</tr>"; 			
		} 
		echo "</table>";  		
		
		echo "</form>";
	} else {
	  echo "0 results";
	}


?>
