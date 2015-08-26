 <?php
   function checkUserCredentals($inputUsername, $inputPassword)
   {
   /*
   This function takes input username and password as parameters and 
   returns TRUE if the user is authenticated, FALSE if the user is not authenticated
   */
	   
// create connection
$mysqli = new mysqli("localhost", "VEDB01", "04051991", "VEDB01mysql1");
if ($mysqli->connect_errno) {
    echo "Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
}
		
	  // query the users table for name and surname 
	  $sql = "SELECT UserName, Password, Status FROM Users Where UserName ='".$inputUsername."' AND Password ='".$inputPassword."' AND Status='Available'";
	  
	  // perform the query
	   
	   $rs = $mysqli->query($sql);
	   // execute SQL statement and get results 
if (!$rs) {
    echo "SQL operation failed: (" . $mysqli->errno . ") " . $mysqli->error;
} 
//else{
	//echo "Login is Successful !";
//}
	   
	   
	   //Count the record number
	  $counter = 0;
	  while ($row = $rs->fetch_assoc())
	  {
		 $counter++;
	  }
      
	  if ($counter>0)
	  {
		  //authentication succeeded
		  return (true);
		  
	  }
	  else
	  {
		  //authentication failed
		  return (false);	
	  }
   }
?>