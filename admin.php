<?php require_once('Connections/conroad.php'); ?>
<?php
// *** Validate request to login to this site.
if (!isset($_SESSION)) {
  session_start();
}

$loginFormAction = $_SERVER['PHP_SELF'];
if (isset($_GET['accesscheck'])) {
  $_SESSION['PrevUrl'] = $_GET['accesscheck'];
}

if (isset($_POST['username'])) {
  $loginUsername=$_POST['username'];
  $password=$_POST['password'];
  $MM_fldUserAuthorization = "";
  $MM_redirectLoginSuccess = "cpanel vew.php";
  $MM_redirectLoginFailed = "admin fail.php";
  $MM_redirecttoReferrer = false;
  mysql_select_db($database_conroad, $conroad);
  
  $LoginRS__query=sprintf("SELECT username, password FROM admin_login WHERE username='%s' AND password='%s'",
    get_magic_quotes_gpc() ? $loginUsername : addslashes($loginUsername), get_magic_quotes_gpc() ? $password : addslashes($password)); 
   
  $LoginRS = mysql_query($LoginRS__query, $conroad) or die(mysql_error());
  $loginFoundUser = mysql_num_rows($LoginRS);
  if ($loginFoundUser) {
     $loginStrGroup = "";
    
    //declare two session variables and assign them
    $_SESSION['MM_Username'] = $loginUsername;
    $_SESSION['MM_UserGroup'] = $loginStrGroup;	      

    if (isset($_SESSION['PrevUrl']) && false) {
      $MM_redirectLoginSuccess = $_SESSION['PrevUrl'];	
    }
    header("Location: " . $MM_redirectLoginSuccess );
  }
  else {
    header("Location: ". $MM_redirectLoginFailed );
  }
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<!-- DW6 -->
<head>
<!-- Copyright 2005 Macromedia, Inc. All rights reserved. -->
<title>Admin Page</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<link rel="stylesheet" href="mm_health_nutr.css" type="text/css" />
<script language="JavaScript" type="text/javascript">
//--------------- LOCALIZEABLE GLOBALS ---------------
var d=new Date();
var monthname=new Array("January","February","March","April","May","June","July","August","September","October","November","December");
//Ensure correct for language. English is "January 1, 2004"
var TODAY = monthname[d.getMonth()] + " " + d.getDate() + ", " + d.getFullYear();
//---------------   END LOCALIZEABLE   ---------------
</script>
<style type="text/css">
<!--
#Layer1 {
	position:absolute;
	width:200px;
	height:115px;
	z-index:1;
	left: 445px;
	top: 214px;
}
.style2 {
	font-size: 23px;
	font-weight: bold;
	color: #FFFFFF;
}
.style6 {
	font-size: 18px;
	color: #FFFFFF;
}
#Layer2 {
	position:absolute;
	width:200px;
	height:115px;
	z-index:2;
	left: 55px;
	top: 166px;
}
#Layer3 {
	position:absolute;
	width:200px;
	height:115px;
	z-index:3;
	left: 752px;
	top: 170px;
}
.style7 {color: #FFFFFF}
.style9 {font-size: 22px; font-weight: bold; color: #A60B07; }
#Layer4 {
	position:absolute;
	width:200px;
	height:115px;
	z-index:4;
	left: 481px;
	top: 430px;
}
-->
</style>
</head>
<body bgcolor="#F4FFE4">
<div id="Layer4"><a href="home.php"><img src="images/1370146_orig.png" width="141" height="83" border="0" /></a></div>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr bgcolor="#D5EDB3">
    <td width="382" colspan="3" rowspan="2"><img src="mm_health_photo.jpg" alt="Header image" width="382" height="101" border="0" /></td>
    <td width="378" height="50" colspan="3" id="logo" valign="bottom" align="center" nowrap="nowrap"><p>Traffic Offence System for </p>
    <p>Federal Road Safety Commission </p></td>
    <td width="100%">&nbsp;</td>
  </tr>

  <tr bgcolor="#D5EDB3">
    <td height="51" colspan="3" id="tagline" valign="top" align="center"> Management System</td>
	<td width="100%">&nbsp;</td>
  </tr>

  <tr>
    <td colspan="7" bgcolor="#5C743D"><img src="mm_spacer.gif" alt="" width="1" height="2" border="0" /></td>
  </tr>

  <tr>
    <td colspan="7" bgcolor="#99CC66" background="mm_dashed_line.gif"><img src="mm_dashed_line.gif" alt="line decor" width="4" height="3" border="0" /></td>
  </tr>

  <tr bgcolor="#99CC66">
  	<td colspan="7" id="dateformat" height="20">&nbsp;&nbsp;<script language="JavaScript" type="text/javascript">
      document.write(TODAY);	</script>	</td>
  </tr>
  <tr>
    <td colspan="7" bgcolor="#99CC66" background="mm_dashed_line.gif"><img src="mm_dashed_line.gif" alt="line decor" width="4" height="3" border="0" /></td>
  </tr>

  <tr>
    <td colspan="7" bgcolor="#5C743D"><img src="mm_spacer.gif" alt="" width="1" height="2" border="0" /></td>
  </tr>

 <tr>
    <td height="528" colspan="7" valign="top" bgcolor="#F4FFE4"><br />
  	&nbsp;<br />
  	&nbsp;<br />
  	&nbsp;<br />  	<img src="mm_spacer.gif" alt="" width="305" height="1" border="0" /><br />
	&nbsp;
	<div id="Layer2"><img src="images/beautiful-15728__340.jpg" width="374" height="297" /></div>
	<br />
	&nbsp;<br />
	<div id="Layer3"><img src="images/LoginRed.jpg" width="346" height="307" /></div>
	<br />
	&nbsp;<br />	<img src="mm_spacer.gif" alt="" width="50" height="1" border="0" /><br />
    &nbsp;<br />
    <div id="Layer1">
      <form ACTION="<?php echo $loginFormAction; ?>" id="form1" name="form1" method="POST">
        <table width="269" height="190" border="5" bordercolor="#99CC66">
            <tr>
              <td bgcolor="#D5EDB3"><span class="style9">Username</span></td>
              <td bgcolor="#D5EDB3"><span class="style6">
                <label>
                <input name="username" type="text" id="username" />
                </label>
              </span></td>
            </tr>
            <tr>
              <td bgcolor="#D5EDB3"><span class="style9">Password</span></td>
              <td bgcolor="#D5EDB3"><input name="password" type="password" id="password" /></td>
            </tr>
            <tr>
              <td colspan="2" bgcolor="#D5EDB3"><span class="style7"><strong>
                <label> </label>
                <label></label>
              </strong>
                <div align="center" class="style7"><strong>
                  <input type="submit" name="Submit" value="Login" />
                  </strong></div>
                <span class="style7">
                </label>              
              </span>                <div align="center" class="style2"></div></td>
            </tr>
          </table>
        </form>
    </div></td>
  </tr>
  <tr>
    <td width="382">&nbsp;</td>
    <td width="50">&nbsp;</td>
    <td width="305">&nbsp;</td>
    <td width="378">&nbsp;</td>
    <td width="50">&nbsp;</td>
    <td width="190">&nbsp;</td>
	<td width="100%">&nbsp;</td>
  </tr>
</table>
</body>
</html>
