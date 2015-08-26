<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Registration Action</title>
</head>

<body align="center">
<?php
// create connection
$mysqli = new mysqli("localhost", "VEDB01", "04051991", "VEDB01mysql1");
if ($mysqli->connect_errno) {
    echo "Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
}
//echo $mysqli->host_info . "\n";
  
// create SQL statement 
$sql = "INSERT INTO Users(UserName,Password,LastName,FirstName,Address,City,ContactNumber,Email,Status)
        VALUES('" . $_POST['user_name'] . "','" 
		         . $_POST['password'] . "','" 
				 . $_POST['last_name'] . "','" 
				 . $_POST['first_name'] . "','" 
				 . $_POST['address'] . "','" 
				 . $_POST['city'] . "','" 
				 . $_POST['contact'] . "','" 
				 . $_POST['email'] . "','Available')"; 
				 
// execute SQL statement and get results 
if (!$mysqli->query($sql)) {
    echo "SQL operation failed: (" . $mysqli->errno . ") " . $mysqli->error;
} 
else{
	echo "Registration is Successful !";
}
?>
<?php
//Select the file information
$sql="SELECT Users.UserID As userID,
              Users.UserName As user_name,
              Users.ContactNumber As contact,
              Users.Email As email 
      FROM Users";
	  
$rs=$mysqli->query($sql);
if (!$rs)
  {exit("Error in SQL");}


echo "<TABLE BORDER='1'>
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
?>

</body>
</html>
