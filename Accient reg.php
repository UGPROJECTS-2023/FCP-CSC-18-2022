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
  $insertSQL = sprintf("INSERT INTO accident_reg (CrashT, ArrivalT, Route, Location, VehicleN, DName, DriverL, Cause, Injured, Killed) VALUES (%s, %s, %s, %s, %s, %s, %s, %s, %s, %s)",
                       GetSQLValueString($_POST['crashT'], "text"),
                       GetSQLValueString($_POST['ArrivalT'], "text"),
                       GetSQLValueString($_POST['Route'], "text"),
                       GetSQLValueString($_POST['Location'], "text"),
                       GetSQLValueString($_POST['VehicleN'], "text"),
                       GetSQLValueString($_POST['Dname'], "text"),
                       GetSQLValueString($_POST['DriverL'], "text"),
                       GetSQLValueString($_POST['Cause'], "text"),
                       GetSQLValueString($_POST['Injured'], "text"),
                       GetSQLValueString($_POST['Killed'], "text"));

  mysql_select_db($database_conroad, $conroad);
  $Result1 = mysql_query($insertSQL, $conroad) or die(mysql_error());

  $insertGoTo = "Accient reg suecc.php";
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
<title>Register</title>
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
.style1 {font-size: large}
#Layer1 {
	position:absolute;
	width:419px;
	height:43px;
	z-index:1;
	left: 601px;
	top: 138px;
}
.style11 {	font-size: xx-large;
	font-weight: bold;
}
#Layer2 {
	position:absolute;
	width:381px;
	height:115px;
	z-index:2;
	left: 609px;
	top: 187px;
}
.style19 {color: #FFFFFF; font-weight: bold; font-size: 14px; }
.style37 {
	color: #FFFFFF;
	font-size: 18px;
	font-weight: bold;
}
#Layer3 {
	position:absolute;
	width:200px;
	height:115px;
	z-index:3;
	left: 811px;
	top: 249px;
}
#Layer4 {
	position:absolute;
	width:200px;
	height:115px;
	z-index:4;
	left: 238px;
	top: 294px;
}
#Layer5 {
	position:absolute;
	width:200px;
	height:115px;
	z-index:3;
	left: 238px;
	top: 155px;
}
-->
</style>
</head>
<body bgcolor="#F4FFE4">
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
    <td width="382" height="494" valign="top" bgcolor="#5C743D">
	<table border="0" cellspacing="0" cellpadding="0" width="165" id="navigation">
        <tr>
          <td width="165">&nbsp;<br />
		 &nbsp;<br /></td>
        </tr>
        <tr>
          <td width="165"><a href="home.php" class="navText style1">Home</a></td>
        </tr>
        <tr>
          <td width="165"><a href="about us.php" class="navText">About Us </a></td>
        </tr>
        <tr>
          <td width="165"><a href="contact us.php" class="navText">Contact Us </a></td>
        </tr>
        <tr>
          <td width="165"><a href="Accient reg.php" class="navText">Accident Register </a></td>
        </tr>
        <tr>
          <td width="165"><a href="admin.php">Admin Page</a> </td>
        </tr>
      </table>
 	 <br />
  	&nbsp;<br />
  	&nbsp;<br />
  	&nbsp;<br /> 	</td>
    <td width="50"><img src="mm_spacer.gif" alt="" width="50" height="1" border="0" /></td>
    <td colspan="5" valign="top"><img src="mm_spacer.gif" alt="" width="305" height="1" border="0" /><br />
	&nbsp;<br />
	&nbsp;<br />
	<br />
	&nbsp;
	<div id="Layer5"><img src="image/Capturea.JPG" width="356" height="442" /></div>
	<br />	<img src="mm_spacer.gif" alt="" width="50" height="1" border="0" /><br />
    &nbsp;
    <div id="Layer2">
      <form action="<?php echo $editFormAction; ?>" id="form1" name="form1" method="POST">
        <table width="493" border="1">
          <tr>
            <td colspan="2" bgcolor="#5C743D"><label>
              <div align="center" class="style37">Accident register </div>
              </label></td>
            </tr>
          <tr>
            <td bgcolor="#5C743D"><span class="style19">Crash Time </span></td>
            <td bgcolor="#FFFFFF"><input name="crashT" type="text" id="crashT" /></td>
          </tr>
          <tr>
            <td bgcolor="#5C743D"><span class="style19">Arrival Time </span></td>
            <td bgcolor="#FFFFFF"><input name="ArrivalT" type="text" id="ArrivalT" /></td>
          </tr>
          <tr>
            <td bgcolor="#5C743D"><span class="style19">Route </span></td>
            <td bgcolor="#FFFFFF"><label>
            <input name="Route" type="text" id="Route" />
            </label></td>
          </tr>
          <tr>
            <td bgcolor="#5C743D"><span class="style19">Location </span></td>
            <td bgcolor="#FFFFFF"><input name="Location" type="text" id="Location" /></td>
          </tr>
          <tr>
            <td colspan="2" bgcolor="#5C743D"><p align="center" class="style37">Other Details </p>            </td>
            </tr>
          <tr>
            <td bgcolor="#5C743D"><span class="style19">Vehicle Number </span></td>
            <td bgcolor="#5C743D"><input name="VehicleN" type="text" id="VehicleN" /></td>
          </tr>
          <tr>
            <td bgcolor="#5C743D"><span class="style19">Name Of Driver </span></td>
            <td bgcolor="#5C743D"><input name="Dname" type="text" id="Dname" /></td>
          </tr>
          <tr>
            <td bgcolor="#5C743D"><span class="style19">Driver`s License Number </span></td>
            <td bgcolor="#5C743D"><input name="DriverL" type="text" id="DriverL" /></td>
          </tr>
          <tr>
            <td bgcolor="#5C743D"><span class="style19">Cause of Accident </span></td>
            <td bgcolor="#5C743D"><input name="Cause" type="text" id="Cause" /></td>
          </tr>
          <tr>
            <td bgcolor="#5C743D"><span class="style19">Number Of Injured </span></td>
            <td bgcolor="#5C743D"><input name="Injured" type="text" id="Injured" /></td>
          </tr>
          <tr>
            <td bgcolor="#5C743D"><span class="style19">Number Of Killed </span></td>
            <td bgcolor="#5C743D"><input name="Killed" type="text" id="Killed" /></td>
          </tr>
          <tr>
            <td bgcolor="#5C743D">&nbsp;</td>
            <td bgcolor="#5C743D">&nbsp;</td>
          </tr>
          <tr>
            <td colspan="2" bgcolor="#5C743D"><label>
              <div align="center">
                <input type="submit" name="Submit" value="Register" />
                </div>
            </label></td>
            </tr>
        </table>
        
        <input type="hidden" name="MM_insert" value="form1">
      </form>
    </div>
    <br />
    <div id="Layer1">
      <div align="center" class="style11"><marquee behavior="alternate">
      Add New Record 
      </marquee></div>
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
