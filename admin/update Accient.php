<?php require_once('../Connections/conroad.php'); ?>
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

if ((isset($_POST["MM_update"])) && ($_POST["MM_update"] == "form1")) {
  $updateSQL = sprintf("UPDATE accident_reg SET CrashT=%s, ArrivalT=%s, Route=%s, Location=%s, VehicleN=%s, DName=%s, DriverL=%s, Cause=%s, Injured=%s, Killed=%s WHERE id=%s",
                       GetSQLValueString($_POST['CrashT'], "text"),
                       GetSQLValueString($_POST['ArrivalT'], "text"),
                       GetSQLValueString($_POST['Route'], "text"),
                       GetSQLValueString($_POST['Location'], "text"),
                       GetSQLValueString($_POST['VehicleN'], "text"),
                       GetSQLValueString($_POST['DName'], "text"),
                       GetSQLValueString($_POST['DriverL'], "text"),
                       GetSQLValueString($_POST['Cause'], "text"),
                       GetSQLValueString($_POST['Injured'], "text"),
                       GetSQLValueString($_POST['Killed'], "text"),
                       GetSQLValueString($_POST['id'], "int"));

  mysql_select_db($database_conroad, $conroad);
  $Result1 = mysql_query($updateSQL, $conroad) or die(mysql_error());

  $updateGoTo = "../manage Accient reg.php";
  if (isset($_SERVER['QUERY_STRING'])) {
    $updateGoTo .= (strpos($updateGoTo, '?')) ? "&" : "?";
    $updateGoTo .= $_SERVER['QUERY_STRING'];
  }
  header(sprintf("Location: %s", $updateGoTo));
}

$colname_Recordset1 = "-1";
if (isset($_GET['id'])) {
  $colname_Recordset1 = (get_magic_quotes_gpc()) ? $_GET['id'] : addslashes($_GET['id']);
}
mysql_select_db($database_conroad, $conroad);
$query_Recordset1 = sprintf("SELECT * FROM accident_reg WHERE id = %s", $colname_Recordset1);
$Recordset1 = mysql_query($query_Recordset1, $conroad) or die(mysql_error());
$row_Recordset1 = mysql_fetch_assoc($Recordset1);
$totalRows_Recordset1 = mysql_num_rows($Recordset1);
?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Untitled Document</title>
<style type="text/css">
<!--
#Layer1 {
	position:absolute;
	width:200px;
	height:115px;
	z-index:1;
	left: 314px;
	top: 23px;
}
-->
</style>
</head>

<body>
<div id="Layer1">
  <p>&nbsp;</p>

  <form method="post" name="form1" action="<?php echo $editFormAction; ?>">
    <table align="center">
      <tr valign="baseline">
        <td nowrap align="right">Id:</td>
        <td><?php echo $row_Recordset1['id']; ?></td>
      </tr>
      <tr valign="baseline">
        <td nowrap align="right">Crash Time:</td>
        <td><input type="text" name="CrashT" value="<?php echo $row_Recordset1['CrashT']; ?>" size="32"></td>
      </tr>
      <tr valign="baseline">
        <td nowrap align="right">Arrival Time:</td>
        <td><input type="text" name="ArrivalT" value="<?php echo $row_Recordset1['ArrivalT']; ?>" size="32"></td>
      </tr>
      <tr valign="baseline">
        <td nowrap align="right">Route:</td>
        <td><input type="text" name="Route" value="<?php echo $row_Recordset1['Route']; ?>" size="32"></td>
      </tr>
      <tr valign="baseline">
        <td nowrap align="right">Location:</td>
        <td><input type="text" name="Location" value="<?php echo $row_Recordset1['Location']; ?>" size="32"></td>
      </tr>
      <tr valign="baseline">
        <td nowrap align="right">Vehicle Number:</td>
        <td><input type="text" name="VehicleN" value="<?php echo $row_Recordset1['VehicleN']; ?>" size="32"></td>
      </tr>
      <tr valign="baseline">
        <td nowrap align="right">Driver Name:</td>
        <td><input type="text" name="DName" value="<?php echo $row_Recordset1['DName']; ?>" size="32"></td>
      </tr>
      <tr valign="baseline">
        <td nowrap align="right">Driver License  Number:</td>
        <td><input type="text" name="DriverL" value="<?php echo $row_Recordset1['DriverL']; ?>" size="32"></td>
      </tr>
      <tr valign="baseline">
        <td nowrap align="right">Cause Accident:</td>
        <td><input type="text" name="Cause" value="<?php echo $row_Recordset1['Cause']; ?>" size="32"></td>
      </tr>
      <tr valign="baseline">
        <td nowrap align="right">Injured:</td>
        <td><input type="text" name="Injured" value="<?php echo $row_Recordset1['Injured']; ?>" size="32"></td>
      </tr>
      <tr valign="baseline">
        <td nowrap align="right">Killed:</td>
        <td><input type="text" name="Killed" value="<?php echo $row_Recordset1['Killed']; ?>" size="32"></td>
      </tr>
      <tr valign="baseline">
        <td nowrap align="right">&nbsp;</td>
        <td><input type="submit" value="Update record"></td>
      </tr>
    </table>
    <input type="hidden" name="MM_update" value="form1">
    <input type="hidden" name="id" value="<?php echo $row_Recordset1['id']; ?>">
  </form>
  <p>&nbsp;</p>
</div>
</body>
</html>
<?php
mysql_free_result($Recordset1);
?>