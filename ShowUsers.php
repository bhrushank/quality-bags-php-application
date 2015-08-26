<?php
require("LoginAuthenticate.php");
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
echo "<br/>"
?>
<form method="post" enctype="multipart/form-data" action="Administrator.php?content_page=ManageUsersAction">
<table>
<tr>
    <td>User ID:</td>
    <td><select name="userID" id="userID">
         <?php
		 $conn = mysql_connect("localhost", "VEDB01", "04051991");
		if(!$conn){
		exit("Connection Failed:".$conn);}
		mysql_select_db("VEDB01mysql1", $conn);
		
		$r=mysql_query("SELECT UserID FROM Users");
		while ($arr=mysql_fetch_array($r)) 
		{
             echo "<option value='$arr[UserID]'>".$arr["UserID"]."</option>";
         }
        ?>
        </select></td>
  </tr>
  <tr>
    <td>Change Status</td>
    <td><select name="status">
      <option value="Available">Available</option>
      <option value="Disable">Disable</option>
      </select></td>
  </tr>
<tr>
    <td colspan="2"><input type="Submit" name="submit" value="Update User"></td>
  </tr>
</table>
</form>