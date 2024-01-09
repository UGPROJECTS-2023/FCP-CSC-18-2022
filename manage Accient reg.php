<?php require_once('Connections/conroad.php'); ?>
<?php
mysql_select_db($database_conroad, $conroad);
$query_Recordset1 = "SELECT * FROM accident_reg";
$Recordset1 = mysql_query($query_Recordset1, $conroad) or die(mysql_error());
$row_Recordset1 = mysql_fetch_assoc($Recordset1);
$totalRows_Recordset1 = mysql_num_rows($Recordset1);
?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<!-- DW6 -->
<head>
<!-- Copyright 2005 Macromedia, Inc. All rights reserved. -->
<title>Accident Database</title>
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
	width:563px;
	height:37px;
	z-index:1;
	left: 385px;
	top: 142px;
}
.style11 {	font-size: xx-large;
	font-weight: bold;
}
#Layer2 {
	position:absolute;
	width:1051px;
	height:36px;
	z-index:2;
	left: 6px;
	top: 226px;
}
#Layer3 {
	position:absolute;
	width:128px;
	height:62px;
	z-index:3;
	left: 7px;
	top: 139px;
}
.style25 {color: #FFFFFF; font-size: 15px; font-weight: bold; }
-->
</style>
</head>
<body bgcolor="#F4FFE4">
<div id="Layer2">
  <table border="1">
    <tr bgcolor="#99CC66">
      <td><span class="style25">Crash Time </span></td>
      <td><span class="style25">Arrival Time </span></td>
      <td><span class="style25">Route</span></td>
      <td><span class="style25">Location</span></td>
      <td><span class="style25">Vehicle Number </span></td>
      <td><span class="style25">Driver Name </span></td>
      <td><span class="style25">Driver License  Number</span></td>
      <td><span class="style25">Cause Of Accident </span></td>
      <td><span class="style25">Injured</span></td>
      <td><span class="style25">Killed</span></td>
      <td><span class="style25">Delete</span></td>
      <td><span class="style25">Update</span></td>
    </tr>
    <?php do { ?>
      <tr>
        <td><?php echo $row_Recordset1['CrashT']; ?></td>
        <td><?php echo $row_Recordset1['ArrivalT']; ?></td>
        <td><?php echo $row_Recordset1['Route']; ?></td>
        <td><?php echo $row_Recordset1['Location']; ?></td>
        <td><?php echo $row_Recordset1['VehicleN']; ?></td>
        <td><?php echo $row_Recordset1['DName']; ?></td>
        <td><?php echo $row_Recordset1['DriverL']; ?></td>
        <td><?php echo $row_Recordset1['Cause']; ?></td>
        <td><?php echo $row_Recordset1['Injured']; ?></td>
        <td><?php echo $row_Recordset1['Killed']; ?></td>
        <td><a href="admin/del Accient reg.php?id=<?php echo $row_Recordset1['id']; ?>"><img src="images/images6.jpg" width="58" height="32" border="0" /></a></td>
        <td><a href="admin/update Accient.php?id=<?php echo $row_Recordset1['id']; ?>"><img src="images/images16.jpg" width="63" height="41" border="0" /></a></td>
      </tr>
      <?php } while ($row_Recordset1 = mysql_fetch_assoc($Recordset1)); ?>
  </table>
</div>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr bgcolor="#D5EDB3">
    <td colspan="3" rowspan="2">&nbsp;</td>
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
  	&nbsp;
  	<div id="Layer3"><a href="cpanel vew.php"><img src="images/1370146_orig.png" width="99" height="74" border="0" /></a></div>
  	<br />
  	&nbsp;<br /> 	<img src="mm_spacer.gif" alt="" width="50" height="1" border="0" /><img src="mm_spacer.gif" alt="" width="305" height="1" border="0" /><br />
	&nbsp;<br />
	&nbsp;<br />
	<br />
	&nbsp;<br />	<img src="mm_spacer.gif" alt="" width="50" height="1" border="0" /><br />
    &nbsp;<br />
    <div id="Layer1">
      <div align="center" class="style11">Accident Register Database </div>
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