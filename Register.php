<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Customer Registration</title>
</head>

<body>
<div class = "page">
<form method="post" enctype="multipart/form-data" action="Home.php?content_page=RegistrationAction">
<table align="center">
  <tr>
    <td>User Name:</td>
    <td><input type="text" name="user_name" size="30"></td>
  </tr>
  <tr>
    <td>Password:</td>
    <td><input type="text" name="password" size="30"></td>
  </tr>
  <tr>
    <td>Last Name:</td>
    <td><input type="text" name="last_name" value="" size="30"></td>
  </tr>
  <tr>
    <td>First Name:</td>
    <td><input type="text" name="first_name" size="30"></td>
  </tr>
  <tr>
    <td>Address:</td>
    <td><input type="text" name="address" size="30"></td>
  </tr>
  <tr>
    <td>City:</td>
    <td><input type="text" name="city" size="30"></td>
  </tr>
  <tr>
    <td>Contact Number:</td>
    <td><input type="text" name="contact" size="30"></td>
  </tr>
  <tr>
    <td>E-Mail:</td>
    <td><input type="text" name="email" size="30"></td>
  </tr>
    <tr>
    <td colspan="2"><input type="Submit" name="submit" value="Submit Registration"></td>
  </tr>
</table>
</form>
</div>
</body>
</html>
