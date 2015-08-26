<?php
ob_start(); 
session_start(); 

// Include functions
require_once('inc/functions.inc.php');
//require('../PHPAssignment/LoginAuthenticate.php');

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
	
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<title>PHP Shopping Cart Demo &#0183; Bookshop</title>
	<link rel="stylesheet" href="css/style.css" />
</head>

<body>
<div id="shoppingcart" class="page">

<h2>Your Shopping Cart</h2>

<?php
echo writeShoppingCart();
?>

</div>

<div id="booklist">

<h2>Bags In Our Store</h2>

<?php
displayBags();
?>

</div>
</body>
</html>
