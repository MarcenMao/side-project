<?php require_once('Connections/storeDB.php'); ?>
<?php
if (!function_exists("GetSQLValueString")) {
function GetSQLValueString($theValue, $theType, $theDefinedValue = "", $theNotDefinedValue = "") 
{
  if (PHP_VERSION < 6) {
    $theValue = get_magic_quotes_gpc() ? stripslashes($theValue) : $theValue;
  }

  $theValue = function_exists("mysql_real_escape_string") ? mysql_real_escape_string($theValue) : mysql_escape_string($theValue);

  switch ($theType) {
    case "text":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;    
    case "long":
    case "int":
      $theValue = ($theValue != "") ? intval($theValue) : "NULL";
      break;
    case "double":
      $theValue = ($theValue != "") ? doubleval($theValue) : "NULL";
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
}

$editFormAction = $_SERVER['PHP_SELF'];
if (isset($_SERVER['QUERY_STRING'])) {
  $editFormAction .= "?" . htmlentities($_SERVER['QUERY_STRING']);
}

if ((isset($_POST["MM_update"])) && ($_POST["MM_update"] == "updata")) {
  $updateSQL = sprintf("UPDATE product SET pname=%s, price=%s, `description`=%s WHERE pno=%s",
                       GetSQLValueString($_POST['pname'], "text"),
                       GetSQLValueString($_POST['pprice'], "int"),
                       GetSQLValueString($_POST['pprice'], "text"),
                       GetSQLValueString($_POST['pno'], "int"));

  mysql_select_db($database_storeDB, $storeDB);
  $Result1 = mysql_query($updateSQL, $storeDB) or die(mysql_error());

  $updateGoTo = "mainmenu.php";
  if (isset($_SERVER['QUERY_STRING'])) {
    $updateGoTo .= (strpos($updateGoTo, '?')) ? "&" : "?";
    $updateGoTo .= $_SERVER['QUERY_STRING'];
  }
  header(sprintf("Location: %s", $updateGoTo));
}

$colname_Recordset1 = "-1";
if (isset($_GET['pno'])) {
  $colname_Recordset1 = $_GET['pno'];
}
mysql_select_db($database_storeDB, $storeDB);
$query_Recordset1 = sprintf("SELECT * FROM product WHERE pno = %s", GetSQLValueString($colname_Recordset1, "int"));
$Recordset1 = mysql_query($query_Recordset1, $storeDB) or die(mysql_error());
$row_Recordset1 = mysql_fetch_assoc($Recordset1);
$totalRows_Recordset1 = mysql_num_rows($Recordset1);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>無標題文件</title>
</head>

<body>
<form action="<?php echo $editFormAction; ?>"  name="updata" method="POST">
<table width="200" border="1" bgcolor="#66FFCC">
  <tr>
    <td>產品名稱</td>
    <td>價格</td>
    <td>簡述</td>
  </tr>
  <tr>
    <td><input type="text" name="pname" size="16" maxlength="16" value="<?php echo $row_Recordset1['pname']; ?>"/></td>
    <td><input type="text" name="pprice" size="8" maxlength="8"  value="<?php echo $row_Recordset1['price']; ?>"/></td>
    <td><input type="text" name="desc" size="32"  maxlength="32" value="<?php echo $row_Recordset1['description']; ?>"/></td>
  </tr>
</table>
<br/>
  <input type="hidden" name="pno" value="<?php echo $row_Recordset1['pno']; ?>">
  <input type="submit" name="newp" id="newp" value="Updata " />
  <input type="reset" name="reset" id="reset" value="Clear"/>
  <input type="hidden" name="MM_update" value="updata" />
</form>
</body>
</html>
<?php
mysql_free_result($Recordset1);
?>
