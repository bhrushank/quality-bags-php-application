<?php
// Include MySQL class
require_once('mysql.class.php');
?>
<?php
function writeShoppingCart() {
	if (isset($_SESSION['cart']))
	{
	$cart = $_SESSION['cart'];
	}
	
	if (!isset($cart) || $cart=='') {
		return '<p>You have no items in your shopping cart</p>';
	} else {
		// Parse the cart session variable
		$items = explode(',',$cart);
		$s = (count($items) > 1) ? 's':'';
		return '<p>You have <a href="http://hyperdisc.unitec.ac.nz/vedb01/PHPAssignment/cart/cart.php?action=display">'.count($items).' item'.$s.' in your shopping cart</a></p>';
	}
}
?>
<?php
function showCart() {
	global $db;
	$cart = $_SESSION['cart'];
	if ($cart) {
		$items = explode(',',$cart);
		$contents = array();
		$total = 0;
		foreach ($items as $item) {
			$contents[$item] = (isset($contents[$item])) ? $contents[$item] + 1 : 1;
		}
		$output[] = '<form action="cart.php?action=update" method="post" id="cart">';
		$output[] = '<table>';
		$_SESSION['content'] = $contents;
		foreach ($contents as $id=>$qty) {
			$sql = 'SELECT * FROM Bags WHERE BagID = '.$id;
			$result = $db->query($sql);
			$row = $result->fetch();
			extract($row);
			$output[] = '<tr>
						<th>Action</th>
						<th>Bag Name</th>
						<th>Bag Supplier</th>
						<th>Bag Color</th>
						<th>Bag Category</th>
						<th>Bag Price</th>
						<th>Quantity</th>
						<th>Sub Total</th>
						</tr>';
			$output[] = '<tr>';
			$output[] = '<td><a href="cart.php?action=delete&id='.$id.'" class="r">Remove</a></td>';
			$output[] = '<td>'.$BagName.' </td>';
			$output[] = '<td>'.$Supplier.'</td>';
			$output[] = '<td>'.$Color.'</td>';
			$output[] = '<td>'.$Category.'</td>';
			$output[] = '<td>NZD$: '.$Price.'</td>';
			$output[] = '<td><input type="text" name="qty'.$id.'" value="'.$qty.'" size="3" maxlength="3" /></td>';
			$output[] = '<td>NZD$: '.($Price * $qty).'</td>';
			
			$total += $Price * $qty;
			
			$output[] = '</tr>';
		}
		$output[] = '</table>';
		$output[] = '<p>Grand total: <strong>NZD$:'.$total.'</strong></p>';
		$output[] = '<div><input type="submit" name= "update">Update cart</div>';
		$output[] = '<div><input type="submit" name="checkout">Check Out</div>';
		$output[] = '</form>';
	} else {
		$output[] = '<p>You shopping cart is empty.</p>';
	}
	return join('',$output);
}
?>
<?php
function processActions() {
	if (isset($_SESSION['cart']))
	{
		$cart = $_SESSION['cart'];
	}
	
	if (isset($_GET['action']))
	{
		$action = $_GET['action'];
	}

    switch ($action) {
	case 'add':
		if (isset($cart) && $cart!='') {
			$cart .= ','.$_GET['id'];
		} else {
			$cart = $_GET['id'];
		}
		break;
	case 'delete':
		if ($cart) {
			$items = explode(',',$cart);
			$newcart = '';
			foreach ($items as $item) {
				if ($_GET['id'] != $item) {
					if ($newcart != '') {
						$newcart .= ','.$item;
					} else {
						$newcart = $item;
					}
				}
			}
			$cart = $newcart;
		}
		break;
	case 'update':
	if(isset($_POST['update'])){
	if ($cart) {
		$newcart = '';
		foreach ($_POST as $key=>$value) {
			if (stristr($key,'qty')) {
				$id = str_replace('qty','',$key);
				$items = ($newcart != '') ? explode(',',$newcart) : explode(',',$cart);
				$newcart = '';
				foreach ($items as $item) {
					if ($id != $item) {
						if ($newcart != '') {
							$newcart .= ','.$item;
						} else {
							$newcart = $item;
						}
					}
				}
				for ($i=1;$i<=$value;$i++) {
					if ($newcart != '') {
						$newcart .= ','.$id;
					} else {
						$newcart = $id;
					}
				}
			}
		}
	}
	$cart = $newcart;
	}
	else{
		
		$user = $_SESSION['current_user'];
		
		$conn = mysql_connect("localhost", "VEDB01", "04051991");
		if(!$conn){
		exit("Connection Failed:".$conn);}
		mysql_select_db("VEDB01mysql1", $conn);
	
		$cartArray = $_SESSION['content'];
		global $db;
		foreach ($cartArray as $id=>$qty) {
			$sql = 'SELECT * FROM Bags WHERE BagID = '.$id;
			$result = $db->query($sql);
			$row = $result->fetch();
			extract($row);
			$sql1 = "INSERT INTO BagOrder(BagID,BagName,Quantity,UserName,Color,Cost,Status)
        VALUES('" .$id."','" 
		         .$BagName. "','" 
				 .$qty. "','" 
				 .$user. "','" 
				 .$Color. "','" 
				 .($Price * $qty). "','  
				 Waiting')";
		mysql_query($sql1);
		header("Location: http://hyperdisc.unitec.ac.nz/VEDB01/PHPAssignment/Home.php?content_page=MyAccount");
		}
		
		}
	break;
}
$_SESSION['cart'] = $cart;
//echo $cart;
}
?>
<?php
function displayBags() {
	global $db;
	$sql = 'SELECT * FROM Bags ORDER BY BagID';
	$result = $db->query($sql);
	$output[] = '<table border="1">';
	$output[] = '<tr>
	<th>Bag Name</th>
	<th>Bag Supplier</th>
	<th>Bag Price</th>
	<th>Bag Picture</th>
	<th>Action</th>
	</tr>';
	$output[] = '<tr>';
	while ($row = $result->fetch()) {
		$output[] = "<td>
		".$row['BagName']." 
		</td><td>
		".$row['Supplier']."
		</td><td>
		".$row['Price']."
		</td><td>
		<img src='http://hyperdisc.unitec.ac.nz/vedb01/uploads/UploadImages/".$row['Path']."' width='150' height='100'>
		</td><td>
		<a href='../PHPAssignment/cart/cart.php?action=add&id=".$row['BagID']."'>Add to cart</a>
		</td><tr>";
	}
	$output[] = '</tr>';
	$output[] = '</table>';
	echo join('',$output);
	
}
?>
