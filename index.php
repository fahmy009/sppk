<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>..::: Aplikasi Pemilihan Guru Teladan :::..</title>
<link rel="stylesheet" type="text/css" href="style_login.css" />

<link rel="shortcut icon" href="images/guru berprestasi.jpg" />

<script type="text/javascript">
function validasi(form){
if (form.username.value == ""){
alert("Anda belum mengisikan Username");
form.username.focus();
return (false);
}
     
if (form.password.value == ""){
alert("Anda belum mengisikan Password");
form.password.focus();
return (false);
}
return (true);
}
</script>

<style type="text/css">
<!--
a:link {
	text-decoration: underline;
}
a:visited {
	text-decoration: underline;
}
a:hover {
	text-decoration: none;
}
a:active {
	text-decoration: underline;
}
body {
	background-color: #D4D0C8;
	background-image: url();
}
-->
</style></head>

<body OnLoad="document.login.username.focus();">
<div id="main">

<!-- Header -->
<div id="header"></div>

<!-- Middle -->
<div id="middle">
<form id="form-login" name="login" method="post" action="cek_login.php" onSubmit="return validasi(this)">
  
  <img src="images/images_login/img_login_user.png" align="absmiddle" class="img_user" />
  <input type="text" name="username" size="29" id="input" />
  <br />
	
  <img src="images/images_login/img_login_pass.png" align="absmiddle" class="img_pass" />
  <input type="password" name="password" size="29" id="input" />
  <br />
  
  <input name="Submit" type="image" value="Submit" src="images/images_login/button_login2.png" id="submit" align="absmiddle" /><br />
</form>
  
</div>

<!-- don't Change ;) -->
<div class="clear"></div>

<!-- Footer -->
<div id="footer">Copyright &copy; 2014 by Wynda Renita.</div>

<!-- vertical_effect -->
<div id="vertical_effect">&nbsp;</div>

</div>
</body>
</html>
