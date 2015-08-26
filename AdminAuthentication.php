 <?php
   function checkUserCredentals($inputUsername, $inputPassword)
   {

$mysqli = new mysqli("localhost", "VEDB01", "04051991", "VEDB01mysql1");
if ($mysqli->connect_errno) {
    echo "Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
}
		
	 
	  $sql = "SELECT UserName, Password FROM Admin Where UserName ='".$inputUsername."' AND Password ='".$inputPassword."'";
	  $rs = $mysqli->query($sql);
	   
if (!$rs) {
    echo "SQL operation failed: (" . $mysqli->errno . ") " . $mysqli->error;
} 
	  $counter = 0;
	  while ($row = $rs->fetch_assoc())
	  {
		 $counter++;
	  }
      
	  if ($counter>0)
	  {
		  
		  return (true);
		  
	  }
	  else
	  {
		 return (false);	
	  }
   }
?>