<?php require_once('Connections/conroad.php'); ?>
<?php
function GetSQLValueString($theValue, $theType, $theDefinedValue = "", $theNotDefinedValue = "") 
{
  $theValue = (!get_magic_quotes_gpc()) ? addslashes($theValue) : $theValue;

  switch ($theType) {
    case "text":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;    
    case "long":
    case "int":
      $theValue = ($theValue != "") ? intval($theValue) : "NULL";
      break;
    case "double":
      $theValue = ($theValue != "") ? "'" . doubleval($theValue) . "'" : "NULL";
      break;
    case "date":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;
    case "defined":
      $theValue = ($theValue != "") ? $theDefinedValue : $theNotDefinedValue;
      break;
  }
  return $theValue;
}

$editFormAction = $_SERVER['PHP_SELF'];
if (isset($_SERVER['QUERY_STRING'])) {
  $editFormAction .= "?" . htmlentities($_SERVER['QUERY_STRING']);
}

if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "form1")) {
  $insertSQL = sprintf("INSERT INTO users (firstname, secondname, sex, phone, email, username, password) VALUES (%s, %s, %s, %s, %s, %s, %s)",
                       GetSQLValueString($_POST['firstname'], "text"),
                       GetSQLValueString($_POST['secondname'], "text"),
                       GetSQLValueString($_POST['sex'], "text"),
                       GetSQLValueString($_POST['phone'], "text"),
                       GetSQLValueString($_POST['email'], "text"),
                       GetSQLValueString($_POST['username'], "text"),
                       GetSQLValueString($_POST['password'], "text"));

  mysql_select_db($database_conroad, $conroad);
  $Result1 = mysql_query($insertSQL, $conroad) or die(mysql_error());

  $insertGoTo = "new account succ.php";
  if (isset($_SERVER['QUERY_STRING'])) {
    $insertGoTo .= (strpos($insertGoTo, '?')) ? "&" : "?";
    $insertGoTo .= $_SERVER['QUERY_STRING'];
  }
  header(sprintf("Location: %s", $insertGoTo));
}
?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<!-- DW6 -->
<head>
<!-- Copyright 2005 Macromedia, Inc. All rights reserved. -->
<title>Create Your Account</title>
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
	width:419px;
	height:82px;
	z-index:1;
	left: 493px;
	top: 143px;
}
.style11 {	font-size: xx-large;
	font-weight: bold;
}
#Layer2 {
	position:absolute;
	width:266px;
	height:115px;
	z-index:2;
	left: 557px;
	top: 258px;
}
.style19 {color: #FFFFFF; font-weight: bold; font-size: 14px; }
.style20 {font-size: 14px}
#Layer3 {
	position:absolute;
	width:200px;
	height:115px;
	z-index:3;
	left: 260px;
	top: 248px;
}
.style34 {color: #FF0000; font-weight: bold; font-size: 14px; font-family: Verdana, Arial, Helvetica, sans-serif; }
.style35 {color: #FFFFFF}
.style37 {font-size: 18px}
#Layer4 {
	position:absolute;
	width:112px;
	height:52px;
	z-index:4;
	left: 270px;
	top: 138px;
}
-->
</style>
</head>
<body bgcolor="#F4FFE4">
<div id="Layer4"><a href="index.php"><img src="images/1370146_orig.png" width="99" height="74" border="0" /></a></div>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr bgcolor="#D5EDB3">
    <td width="382" colspan="3" rowspan="2"><img src="mm_health_photo.jpg" alt="Header image" width="382" height="101" border="0" /></td>
    <td width="378" height="50" colspan="3" id="logo" valign="bottom" align="center" nowrap="nowrap"><p>Traffic Offence System for </p>
    <p>Federal Road Safety Commission </p></td>
    <td width="100%">&nbsp;</td>
  </tr>

  <tr bgcolor="#D5EDB3">
    <td height="51" colspan="3" id="tagline" valign="top" align="center"> Management System </td>
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
    <td width="382" height="494" valign="top" bgcolor="#5C743D">
	<table border="0" cellspacing="0" cellpadding="0" width="201" id="navigation">
        <tr>
          <td width="201"><span class="style35"><span class="style37">&nbsp;<br />
		 &nbsp;<br />
		 The FRSC Dutse Sector Command record various  road accidents on a daily basis, resulting in accumulation of a lot of records  that needs to be managed, preserved, appraised and archived accordingly.  Despite this fact, it appears that all the road accident records management is  not an objective in the strategic plan of the Commission</span>.</span></td>
        </tr>
      </table>
 	 <br />
  	&nbsp;<br />
  	&nbsp;<br />
  	&nbsp;<br /> 	</td>
    <td width="50"><img src="mm_spacer.gif" alt="" width="50" height="1" border="0" /></td>
    <td colspan="5" valign="top" bordercolor="#D5EDB3"><img src="mm_spacer.gif" alt="" width="305" height="1" border="0" /><br />
	&nbsp;<br />
	&nbsp;<br />
	<br />
	&nbsp;<br />	<img src="mm_spacer.gif" alt="" width="50" height="1" border="0" /><br />
    &nbsp;
    <div id="Layer2">
      <form action="<?php echo $editFormAction; ?>" id="form1" name="form1" method="POST">
        <table width="258" border="1">
          <tr>
            <td bgcolor="#5C743D"><span class="style19">First name </span></td>
            <td bgcolor="#FFFFFF"><label>
              <input name="firstname" type="text" id="firstname" />
            </label></td>
          </tr>
          <tr>
            <td bgcolor="#5C743D"><span class="style19">Second Name </span></td>
            <td bgcolor="#FFFFFF"><input name="secondname" type="text" id="secondname" /></td>
          </tr>
          <tr>
            <td bgcolor="#5C743D"><span class="style19">Sex</span></td>
            <td bgcolor="#FFFFFF"><label>
              <select name="sex" id="sex">
                <option>Male</option>
                <option>Female</option>
              </select>
            </label></td>
          </tr>
          <tr>
            <td bgcolor="#5C743D"><span class="style19">Phone </span></td>
            <td bgcolor="#FFFFFF"><input name="phone" type="text" id="phone" /></td>
          </tr>
          <tr>
            <td bgcolor="#5C743D"><span class="style19">Email</span></td>
            <td bgcolor="#FFFFFF"><input name="email" type="text" id="email" /></td>
          </tr>
          <tr>
            <td bgcolor="#FFFFFF"><span class="style34">Username</span></td>
            <td bgcolor="#FFFFFF"><input name="username" type="text" id="username" /></td>
          </tr>
          <tr>
            <td bgcolor="#FFFFFF"><span class="style34">Password</span></td>
            <td bgcolor="#FFFFFF"><input name="password" type="text" id="password" /></td>
          </tr>
          <tr bgcolor="#5C743D">
            <td colspan="2"><span class="style19">
              <label>              </label>
            </span>              <span class="style20"><strong>
            <label></label>
            </strong>            
            <label></label>
            </span>            <span class="style20">
            <label></label>
            </span>            <label><div align="center" class="style19">
                <input type="submit" name="Submit" value="Create" />
                </div>
            </label></td>
            </tr>
        </table>
        
        <input type="hidden" name="MM_insert" value="form1">
      </form>
      </div>
    <div id="Layer3"><img src="images/FB_IMG_14594077383626583.jpg" width="276" height="246" /></div>
    <br />
    <div id="Layer1">
      <div align="center" class="style11">Create New Account </div>
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
