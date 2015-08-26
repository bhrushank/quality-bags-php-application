<?php
    ob_start(); //set buffer on
    session_start(); //starting session
	
   // include username and password array and the function
   require("UserDetails.php");
    
	// if the user has input username and password
	if (isset($_POST['form_username']) and isset($_POST['form_password']))
    {			
		//The login is not successful, set the login flag to false
	        $_SESSION['flag'] = false;
			 
			echo "<script language=\"JavaScript\">alert(\"User Name or Password Wrong!\");</script>"; 

			
			// call the pre-defined function and check if user is authenticated
			if (checkUserCredentals($_POST['form_username'], $_POST['form_password']))
			{
				
			//The login is successful, set the login flag to true and save the current user name
		    $_SESSION['flag'] = true;
			$_SESSION['current_user'] = $_POST['form_username'];
			
					
			//redirect the user to the correct page
			ob_end_clean();
			
			//find out where to go after login
			if (isset($_SESSION['request_page']))
			
		    $redirect_page = "http://hyperdisc.unitec.ac.nz/VEDB01/PHPAssignment/Home.php?content_page=".$_SESSION['request_page'];
			else
			$redirect_page = "http://hyperdisc.unitec.ac.nz/VEDB01/PHPAssignment/Home.php";
				
            //redirect the user to the correct page after login
			
			header("Location: ".$redirect_page);
			
			}
	} //Otherwise, stay in the login page
	
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Customer Login</title>
<LINK href="css/Style.css" type="text/css" rel="STYLESHEET">
</head>

<body>
<form method="post">
Username: <input type="text" name="form_username"><br>
Password:  <input type="password" name="form_password"><br>
<input type="submit" value="Submit">
</form>
</body>
</html>
