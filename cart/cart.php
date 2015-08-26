<?php
ob_start(); //set buffer on
session_start(); //starting session

// Include functions
require_once('inc/functions.inc.php');

// Process actions for this page
processActions();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
	
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<title>PHP Shopping Cart &#0183; Cart</title>
	<link rel="stylesheet" href="css/style.css" />
</head>

<body>

<div id="shoppingcart" align="center">

<h2>Your Shopping Cart</h2>

<?php
echo writeShoppingCart();
?>

</div>

<div id="contents" align="center">

<h2>Please check quantities...</h2>

<?php
echo showCart();
?>

<p><a href="http://hyperdisc.unitec.ac.nz/VEDB01/PHPAssignment/Home.php?content_page=cart/index">Back</a></p>

</div>

</body>
</html>
