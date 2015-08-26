<?php
// create connection
$mysqli = new mysqli("localhost", "VEDB01", "04051991", "VEDB01mysql1");
if ($mysqli->connect_errno) {
    echo "Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
}
//echo $mysqli->host_info . "\n";
  
// create SQL statement 
$sql = "Update Users SET Status = '" . $_POST['status'] . "' WHERE UserID = '" . $_POST['userID'] . "'";

				 
// execute SQL statement and get results 
if (!$mysqli->query($sql)) {
    echo "SQL operation failed: (" . $mysqli->errno . ") " . $mysqli->error;
} 
?>
<?php
$conn = mysql_connect("localhost", "VEDB01", "04051991");
if(!$conn){
	exit("Connection Failed:".$conn);}
	mysql_select_db("VEDB01mysql1", $conn);

//Select the file information
$sql1="SELECT * FROM Users";
	  
$rs=mysql_query($sql1);

if (!$rs)
  {exit("Error in SQL");}

//Display the file information in a table
echo "<h1>Order Information</h1>";
echo "<TABLE BORDER='2' cellspacing='10'>
      <TR>
      <TH> User ID </TH>
      <TH> Password </TH>
      <TH> User Name </TH>
      <TH> Last Name </TH>
	  <TH> First Name </TH>
      <TH> Address </TH>
      <TH> City </TH>
      <TH> Contact Number </TH>
	  <TH> Email </TH>
      <TH> Status </TH>
      </TR>";
	  
while ($row1 = mysql_fetch_array($rs))
{
  $order_id=$row1["UserID"];
  $order_bagid=$row1["Password"];
  $order_bagname=$row1["UserName"];
  $order_bagquantity=$row1["LastName"];
  $order_user=$row1["FirstName"];
  $order_color=$row1["Address"];
  $order_cost=$row1["City"];
  $order_status=$row1["ContactNumber"];
  $email=$row1["Email"];
  $status=$row1["Status"];
  

  echo "<TR>";
  echo "<TD>$order_id</TD>";
  echo "<TD>$order_bagid</TD>";
  echo "<TD>$order_bagname</TD>";
  echo "<TD>$order_bagquantity</TD>";
  echo "<TD>$order_user</TD>";
  echo "<TD>$order_color</TD>";
  echo "<TD>$order_cost</TD>";
  echo "<TD>$order_status</TD>";
  echo "<TD>$email</TD>";
  echo "<TD>$status</TD>";
  
  echo "</TR>";
}

echo "</TABLE>";
echo "<br/>";
header("Location: http://hyperdisc.unitec.ac.nz/VEDB01/PHPAssignment/Administrator.php?content_page=ShowUsers");
        exit;
?>