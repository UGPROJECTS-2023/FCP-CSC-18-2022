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
  $updateSQL = sprintf("UPDATE users SET firstname=%s, secondname=%s, sex=%s, phone=%s, username=%s, password=%s WHERE email=%s",
                       GetSQLValueString($_POST['firstname'], "text"),
                       GetSQLValueString($_POST['secondname'], "text"),
                       GetSQLValueString($_POST['sex'], "text"),
                       GetSQLValueString($_POST['phone'], "text"),
                       GetSQLValueString($_POST['username'], "text"),
                       GetSQLValueString($_POST['password'], "text"),
                       GetSQLValueString($_POST['email'], "text"));

  mysql_select_db($database_conroad, $conroad);
  $Result1 = mysql_query($updateSQL, $conroad) or die(mysql_error());

  $updateGoTo = "../manage users reg.php";
  if (isset($_SERVER['QUERY_STRING'])) {
    $updateGoTo .= (strpos($updateGoTo, '?')) ? "&" : "?";
    $updateGoTo .= $_SERVER['QUERY_STRING'];
  }
  header(sprintf("Location: %s", $updateGoTo));
}

$colname_Recordset1 = "-1";
if (isset($_GET['email'])) {
  $colname_Recordset1 = (get_magic_quotes_gpc()) ? $_GET['email'] : addslashes($_GET['email']);
}
mysql_select_db($database_conroad, $conroad);
$query_Recordset1 = sprintf("SELECT * FROM users WHERE email = '%s'", $colname_Recordset1);
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
	left: 357px;
	top: 96px;
}
.style3 {color: #FF0000; font-weight: bold; }
-->
</style>
</head>

<body>
<div id="Layer1">
  <p>&nbsp;</p>

    <form method="post" name="form1" action="<?php echo $editFormAction; ?>">
    <table align="center">
      <tr valign="baseline">
        <td nowrap align="right">First Name:</td>
        <td><input type="text" name="firstname" value="<?php echo $row_Recordset1['firstname']; ?>" size="32"></td>
      </tr>
      <tr valign="baseline">
        <td nowrap align="right">Second Name:</td>
        <td><input type="text" name="secondname" value="<?php echo $row_Recordset1['secondname']; ?>" size="32"></td>
      </tr>
      <tr valign="baseline">
        <td nowrap align="right">Sex:</td>
        <td><input type="text" name="sex" value="<?php echo $row_Recordset1['sex']; ?>" size="32"></td>
      </tr>
      <tr valign="baseline">
        <td nowrap align="right">Phone No.:</td>
        <td><input type="text" name="phone" value="<?php echo $row_Recordset1['phone']; ?>" size="32"></td>
      </tr>
      <tr valign="baseline">
        <td nowrap align="right">Email:</td>
        <td><?php echo $row_Recordset1['email']; ?></td>
      </tr>
      <tr valign="baseline">
        <td nowrap align="right"><span class="style3">Username:</span></td>
        <td><input type="text" name="username" value="<?php echo $row_Recordset1['username']; ?>" size="32"></td>
      </tr>
      <tr valign="baseline">
        <td nowrap align="right"><span class="style3">Password:</span></td>
        <td><input type="text" name="password" value="<?php echo $row_Recordset1['password']; ?>" size="32"></td>
      </tr>
      <tr valign="baseline">
        <td nowrap align="right">&nbsp;</td>
        <td><input type="submit" value="Update record"></td>
      </tr>
    </table>
    <input type="hidden" name="MM_update" value="form1">
    <input type="hidden" name="email" value="<?php echo $row_Recordset1['email']; ?>">
  </form>
  <p>&nbsp;</p>
</div>
</body>
</html>
<?php
mysql_free_result($Recordset1);
?>