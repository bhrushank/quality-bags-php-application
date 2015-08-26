<?php
require("LoginAuthenticate.php");
?>
<?php
 $user = $_SESSION['current_user'];
// create connection
$mysqli = new mysqli("localhost", "VEDB01", "04051991", "VEDB01mysql1");
if ($mysqli->connect_errno) {
    echo "Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
}

//Select the file information
$sql="SELECT Users.UserID As userID,
              Users.UserName As user_name,
              Users.ContactNumber As contact,
              Users.Email As email 
      FROM Users WHERE UserName = '" . $user . "' ";
	  
$rs=$mysqli->query($sql);
if (!$rs)
  {exit("Error in SQL");}

//Display the file information in a table
echo "<h1>Customer Information</h1>";
echo "<TABLE BORDER='2' cellspacing='10'>
      <TR>
      <TH> user ID </TH>
      <TH> user name </TH>
      <TH> contact</TH>
      <TH> email </TH>
      </TR>";
	  
while ($row = $rs->fetch_assoc())
{
  $paper_id=$row["userID"];
  $paper_author=$row["user_name"];
  $paper_file=$row["contact"];
  $paper_title=$row["email"];
  echo "<TR>";
  echo "<TD>$paper_id</TD>";
  echo "<TD>$paper_author</TD>";
  echo "<TD>$paper_file</TD>";
  echo "<TD>$paper_title</TD>";
  echo "</TR>";
}

echo "</TABLE>";
echo "<br/>";
?>
<?php
$user = $_SESSION['current_user'];
$conn = mysql_connect("localhost", "VEDB01", "04051991");
if(!$conn){
	exit("Connection Failed:".$conn);}
	mysql_select_db("VEDB01mysql1", $conn);

//Select the file information
$sql1="SELECT * FROM BagOrder WHERE UserName = '" . $user . "' ";
	  
$rs=mysql_query($sql1);

if (!$rs)
  {exit("Error in SQL");}

//Display the file information in a table
echo "<h1>Order Information</h1>";
echo "<TABLE BORDER='2' cellspacing='10'>
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
  

  echo "<TR align='center'>";
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
echo "<br/>"
?>
