
<?php
    ob_start(); 
    session_start(); 
	
   
   require("AdminAuthentication.php");
    
	
	if (isset($_POST['form_username']) and isset($_POST['form_password']))
    {			
		$_SESSION['flag'] = false;
			 
			echo "<script language=\"JavaScript\">alert(\"User Name or Password Wrong!\");</script>"; 

			if (checkUserCredentals($_POST['form_username'], $_POST['form_password']))
			{
				$_SESSION['flag'] = true;
				$_SESSION['current_user'] = $_POST['form_username'];
				ob_end_clean();
			
				if (isset($_SESSION['request_page']))
					$redirect_page = "http://hyperdisc.unitec.ac.nz/VEDB01/PHPAssignment/Administrator.php?content_page=".$_SESSION['request_page'];
				else
					$redirect_page = "http://hyperdisc.unitec.ac.nz/VEDB01/PHPAssignment/Administrator.php";
				
				header("Location: ".$redirect_page);			
			}
	} 
	
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Administrator Login</title>
<LINK href="css/Style.css" type="text/css" rel="STYLESHEET">
</head>

<body>
<form method="post" align="center"">
Username: <input type="text" name="form_username"><br>
Password:  <input type="password" name="form_password"><br>
<input type="submit" value="Submit">
</form>
</body>
</html>
