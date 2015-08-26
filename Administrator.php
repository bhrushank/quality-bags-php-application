
<!DOCTYPE HTML>
<html>
<head>
<title>Quality Bags Administrator Portal</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="./css/style.css" rel="stylesheet" type="text/css" media="all" />

</head>
<body>
<!-- start header -->
<div class="header_bg">
<div class="wrap">
	<div class="header">
		<div class="logo">
			<a href="Home.php"><img src="./images/logo.png" alt=""/> </a>
		</div>
		
		
		<div class="clear"></div>
	</div>
</div>
</div>
<div class="header_btm">
<div class="wrap">
	<div class="header_sub">
		<div class="h_menu">
			<?php include('AdministratorMenu.php');?>
		</div>
		
	          <div class="clear"> </div>
	          
         </div>		  
	<div class="clear"></div>
</div>
</div>
</div>

<?php
//Retrieve the requested content page name and construct the file name
if (isset($_GET['content_page']))
{
   $page_name = $_GET['content_page'];
   $page_content = $page_name.'.php';
}
elseif (isset($_POST['content_page']))
{
   $page_name = $_POST['content_page'];
   $page_content = $page_name.'.php';
}
else
{$page_content = 'Introduction.php';}

//This must be below the setting of $page_content 
include('Main.php');
?>


<!-- start footer -->
<div class="footer_bg1">
<div class="wrap">
	<div class="footer">
		
		<div class="copy">
			<p class="link">&copy; Bhrushank Ved</p>
		</div>
		<div class="clear"></div>
	</div>
</div>
</div>
</body>
</html>
