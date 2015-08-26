<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Manage Bag Action</title>
</head>

<body>
<?php
if (isset($_FILES["paper_file"]) && ($_FILES["paper_file"]["error"] > 0))
  {
  echo "Error: " . $_FILES["paper_ file"]["error"] . "<br />";
  }
elseif (isset($_FILES["paper_file"]))
  {
    move_uploaded_file($_FILES["paper_file"]["tmp_name"], "../uploads/UploadImages/" . $_FILES["paper_file"]["name"]); //Save the file as the supplied name
  }
?>
<?php
// create connection
$mysqli = new mysqli("localhost", "VEDB01", "04051991", "VEDB01mysql1");
if ($mysqli->connect_errno) {
    echo "Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
}
//echo $mysqli->host_info . "\n";
  
// create SQL statement 
$sql = "INSERT INTO Bags(BagName,Supplier,Color,Category,Price,Description,Path)
        VALUES('" . $_POST['bag_name'] . "','" 
		         . $_POST['supplier'] . "','" 
				 . $_POST['color'] . "','" 
				 . $_POST['category'] . "','" 
				 . $_POST['price'] . "','" 
				 . $_POST['description'] . "','"  
				 . $_FILES["paper_file"]["name"] . "')"; 
				 
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
$sql1="SELECT * FROM Bags ";
	  
$rs=mysql_query($sql1);

if (!$rs)
  {exit("Error in SQL");}

//Display the file information in a table
echo "Bag added successfully !";
echo "<h1>Bag Information</h1>";
echo "<TABLE BORDER='2' cellspacing='10'>
      <TR>
      <TH> BagID </TH>
      <TH> BagName </TH>
      <TH> Supplier </TH>
      <TH> Color </TH>
	  <TH> Category </TH>
      <TH> Price </TH>
      <TH> Description</TH>
      <TH> Picture</TH>
      </TR>";
	  
while ($row1 = mysql_fetch_array($rs))
{
  $order_id=$row1["BagID"];
  $order_bagid=$row1["BagName"];
  $order_bagname=$row1["Supplier"];
  $order_bagquantity=$row1["Color"];
  $order_user=$row1["Category"];
  $order_color=$row1["Price"];
  $order_cost=$row1["Description"];
  $order_status=$row1["Path"];
  

  echo "<TR>";
  echo "<TD>$order_id</TD>";
  echo "<TD>$order_bagid</TD>";
  echo "<TD>$order_bagname</TD>";
  echo "<TD>$order_bagquantity</TD>";
  echo "<TD>$order_user</TD>";
  echo "<TD>$order_color</TD>";
  echo "<TD>$order_cost</TD>";
  echo "<TD><img src='../uploads/UploadImages/" . $order_status ."' width='120' height='100' /></div>
</TD>";
  echo "</TR>";
}

echo "</TABLE>";
echo "<br/>";

        
?>



</body>
</html>
