<?php
// create connection
$mysqli = new mysqli("localhost", "VEDB01", "04051991", "VEDB01mysql1");
if ($mysqli->connect_errno) {
    echo "Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
}
//echo $mysqli->host_info . "\n";
  
// create SQL statement 
$sql = "Update BagOrder SET Status = '" . $_POST['status'] . "' WHERE OrderID = '" . $_POST['orderID'] . "'";

				 
// execute SQL statement and get results 
if (!$mysqli->query($sql)) {
    echo "SQL operation failed: (" . $mysqli->errno . ") " . $mysqli->error;
} 
?>
<?php
$user = $_SESSION['current_user'];
$conn = mysql_connect("localhost", "VEDB01", "04051991");
if(!$conn){
	exit("Connection Failed:".$conn);}
	mysql_select_db("VEDB01mysql1", $conn);

//Select the file information
$sql1="SELECT * FROM BagOrder ";
	  
$rs=mysql_query($sql1);

if (!$rs)
  {exit("Error in SQL");}

//Display the file information in a table
echo "<h1>Order Information</h1>";
echo "<TABLE BORDER='2' cellspacing='15'>
      <TR>
      <TH> OrderID </TH>
      <TH> BagID </TH>
      <TH> BagName </TH>
      <TH> Quantity </TH>
	  <TH> UserName </TH>
      <TH> Color </TH>
      <TH> Cost </TH>
      <TH> Status </TH>
      </TR>";
	  
while ($row1 = mysql_fetch_array($rs))
{
  $order_id=$row1["OrderID"];
  $order_bagid=$row1["BagID"];
  $order_bagname=$row1["BagName"];
  $order_bagquantity=$row1["Quantity"];
  $order_user=$row1["UserName"];
  $order_color=$row1["Color"];
  $order_cost=$row1["Cost"];
  $order_status=$row1["Status"];
  

  echo "<TR>";
  echo "<TD>$order_id</TD>";
  echo "<TD>$order_bagid</TD>";
  echo "<TD>$order_bagname</TD>";
  echo "<TD>$order_bagquantity</TD>";
  echo "<TD>$order_user</TD>";
  echo "<TD>$order_color</TD>";
  echo "<TD>$order_cost</TD>";
  echo "<TD>$order_status</TD>";
  echo "</TR>";
}

echo "</TABLE>";
echo "<br/>";
header("Location: http://hyperdisc.unitec.ac.nz/VEDB01/PHPAssignment/Administrator.php?content_page=ShowOrders");
        exit;
?>