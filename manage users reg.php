<?php require_once('Connections/conroad.php'); ?>
<?php
mysql_select_db($database_conroad, $conroad);
$query_Recordset1 = "SELECT * FROM users";
$Recordset1 = mysql_query($query_Recordset1, $conroad) or die(mysql_error());
$row_Recordset1 = mysql_fetch_assoc($Recordset1);
$totalRows_Recordset1 = mysql_num_rows($Recordset1);
?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<!-- DW6 -->
<head>
<!-- Copyright 2005 Macromedia, Inc. All rights reserved. -->
<title>Users Database</title>
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
	height:37px;
	z-index:1;
	left: 456px;
	top: 145px;
}
.style11 {	font-size: xx-large;
	font-weight: bold;
}
#Layer3 {	position:absolute;
	width:128px;
	height:62px;
	z-index:3;
	left: 7px;
	top: 139px;
}
#Layer2 {
	position:absolute;
	width:1016px;
	height:78px;
	z-index:4;
	left: 29px;
	top: 225px;
}
.style22 {color: #FFFFFF; font-size: 18px; }
.style23 {color: #000000}
.style26 {color: #FF0000; font-weight: bold; }
-->
</style>
</head>
<body bgcolor="#F4FFE4">
<div id="Layer3"><a href="cpanel vew.php"><img src="images/1370146_orig.png" width="99" height="74" border="0" /></a></div>
<div id="Layer2">
  <table border="1">
    <tr bgcolor="#99CC66">
      <td><span class="style22">First Name</span></td>
      <td><span class="style22">Second Name </span></td>
      <td><span class="style22">Sex</span></td>
      <td><span class="style22">Phone No. </span></td>
      <td><span class="style22">Email Address </span></td>
      <td bgcolor="#FF0000"><span class="style22">Username</span></td>
      <td bgcolor="#FF0000"><span class="style22">Password</span></td>
      <td><span class="style22">Delete </span></td>
      <td><span class="style22">Update</span></td>
    </tr>
    <?php do { ?>
      <tr>
        <td><span class="style23"><?php echo $row_Recordset1['firstname']; ?></span></td>
        <td><span class="style23"><?php echo $row_Recordset1['secondname']; ?></span></td>
        <td><span class="style23"><?php echo $row_Recordset1['sex']; ?></span></td>
        <td><span class="style23"><?php echo $row_Recordset1['phone']; ?></span></td>
        <td><span class="style23"><?php echo $row_Recordset1['email']; ?></span></td>
        <td><span class="style26"><?php echo $row_Recordset1['username']; ?></span></td>
        <td><span class="style26"><?php echo $row_Recordset1['password']; ?></span></td>
        <td><a href="admin/del users.php?email=<?php echo $row_Recordset1['email']; ?>"><img src="images/images6.jpg" width="58" height="32" border="0" /></a></td>
        <td><a href="admin/update users.php?email=<?php echo $row_Recordset1['email']; ?>"><img src="images/images16.jpg" width="63" height="41" border="0" /></a></td>
      </tr>
      <?php } while ($row_Recordset1 = mysql_fetch_assoc($Recordset1)); ?>
  </table>
</div>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr bgcolor="#D5EDB3">
    <td colspan="3" rowspan="2"><img src="file:///C|/wamp/www/Road/mm_health_photo.jpg" alt="Header image" width="382" height="101" border="0" /></td>
    <td height="50" colspan="4" id="logo" valign="bottom" align="center" nowrap="nowrap"><p>Traffic Offence System for </p>
    <p>Federal Road Safety Commission </p></td>
  </tr>

  <tr bgcolor="#D5EDB3">
    <td height="51" colspan="4" id="tagline" valign="top" align="center"> Management System</td>
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
    <td height="494" colspan="7" valign="top" bgcolor="#F4FFE4"><br />
  	&nbsp;<br />
  	&nbsp;<br />
  	&nbsp;<br /> 	<img src="mm_spacer.gif" alt="" width="50" height="1" border="0" /><img src="mm_spacer.gif" alt="" width="305" height="1" border="0" /><br />
	&nbsp;<br />
	&nbsp;<br />
	<br />
	&nbsp;<br />	<img src="mm_spacer.gif" alt="" width="50" height="1" border="0" /><br />
    &nbsp;<br />
    <div id="Layer1">
      <div align="center" class="style11">Users  Register </div>
    </div></td>
  </tr>
  <tr>
    <td width="198">&nbsp;</td>

    <td width="50">&nbsp;</td>
    <td width="158">&nbsp;</td>
    <td width="108">&nbsp;</td>
    <td width="14">&nbsp;</td>
    <td width="218">&nbsp;</td>
	<td width="554">&nbsp;</td>
  </tr>
</table>
</body>
</html>
<?php
mysql_free_result($Recordset1);
?>