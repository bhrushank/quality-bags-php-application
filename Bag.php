<?php
require("LoginAuthenticate.php");
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Manage Page</title>

</head>

<body>
<div class="page">
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
echo "<h1>Bag Information</h1>";
echo "<TABLE BORDER='2' cellspacing='15'>
      <TR align='center'>
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
  echo "<TD><img src='../uploads/UploadImages/" . $order_status ."' width='150' height='100' /></div>
</TD>";
  echo "</TR>";
}

echo "</TABLE>";
echo "<br/>"
?>
<form method="post" enctype="multipart/form-data" action="Administrator.php?content_page=BagAction" align="center">
<table>
  <tr>
    <td>Bag Name:</td>
    <td><input type="text" name="bag_name" size="45"></td>
  </tr>
  <tr>
    <td>Supplier:</td>
    <td><select name="supplier" id="supplier">
         <?php
		 $conn = mysql_connect("localhost", "VEDB01", "04051991");
		if(!$conn){
		exit("Connection Failed:".$conn);}
		mysql_select_db("VEDB01mysql1", $conn);
		
		$r=mysql_query("SELECT SupplierName FROM Supplier");
		while ($arr=mysql_fetch_array($r)) 
		{
             echo "<option value='$arr[SupplierName]'>".$arr["SupplierName"]."</option>";
         }
        ?>
        </select></td>
  </tr>
  <tr>
    <td>Color:</td>
    <td><select name="color" id="color">
         <?php
		 $conn = mysql_connect("localhost", "VEDB01", "04051991");
		if(!$conn){
		exit("Connection Failed:".$conn);}
		mysql_select_db("VEDB01mysql1", $conn);
		
		$r=mysql_query("SELECT Color FROM Color");
		while ($arr=mysql_fetch_array($r)) 
		{
             echo "<option value='$arr[Color]'>".$arr["Color"]."</option>";
         }
        ?>
        </select></td>
  </tr>
  <tr>
    <td>Category:</td>
    <td><select name="category" id="category">
         <?php
		 $conn = mysql_connect("localhost", "VEDB01", "04051991");
		if(!$conn){
		exit("Connection Failed:".$conn);}
		mysql_select_db("VEDB01mysql1", $conn);
		
		$r=mysql_query("SELECT BagCategory FROM Categories");
		while ($arr=mysql_fetch_array($r)) 
		{
             echo "<option value='$arr[BagCategory]'>".$arr["BagCategory"]."</option>";
         }
        ?>
        </select></td>
  </tr>
  
  <tr>
    <td>Price:</td>
    <td><input type="text" name="price" size="45"></td>
  </tr>
  <tr>
    <td>Description:</td>
    <td><input type="text" name="description" size="45"></td>
  </tr>
  <tr>
    <td>Product:</td>
    <td><input type="File" name="paper_file" value="" size="30"></td>
  </tr>
    <tr>
    <td colspan="2"><input type="Submit" name="submit" value="Submit Bag"></td>
  </tr>
</table>
</form>



</body>
</html>
