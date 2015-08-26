<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Log Out</title>
</head>

<body>
<?php
ob_start(); //set buffer on
session_start(); //starting session

session_destroy();

echo "Logged Out Successfully"

?>
</body>
</html>
