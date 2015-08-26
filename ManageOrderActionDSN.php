<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Manage Action</title>
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
$conn=odbc_connect('VEDB01access1','','');

if (!$conn)
  {exit("Connection Failed: " . $conn);}
  
// create SQL statement 
$sql = "INSERT INTO Employees([FirstName],[LastName],[Title])
        VALUES('" . $_POST['paper_author'] . "','" 
		         . $_FILES["paper_file"]["name"] . "','" 
				 . $_POST['paper_title'] . "')"; 
// prepare SQL statement 
$sql_result = odbc_prepare($conn, $sql); 

// execute SQL statement and get results 
odbc_execute($sql_result); 

// free resources 
odbc_free_result($sql_result); 
?>

</body>
</html>
