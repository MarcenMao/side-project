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

$colname_orderRec = "-1";
if (isset($_SESSION['MM_Username'])) {
  $colname_orderRec = $_SESSION['MM_Username'];
}
mysql_select_db($database_storeDB, $storeDB);
$query_orderRec = sprintf("SELECT * FROM `order` WHERE `uid` = %s ORDER BY ptime DESC", GetSQLValueString($colname_orderRec, "text"));
$orderRec = mysql_query($query_orderRec, $storeDB) or die(mysql_error());
$row_orderRec = mysql_fetch_assoc($orderRec);
$totalRows_orderRec = mysql_num_rows($orderRec);

$colname_UserRec = "-1";
if (isset($_SESSION['username'])) {
  $colname_UserRec = $_SESSION['username'];
}
mysql_select_db($database_storeDB, $storeDB);
$query_UserRec = sprintf("SELECT lastname, firstname FROM `user` WHERE username = %s", GetSQLValueString($colname_UserRec, "text"));
$UserRec = mysql_query($query_UserRec, $storeDB) or die(mysql_error());
$row_UserRec = mysql_fetch_assoc($UserRec);
$totalRows_UserRec = mysql_num_rows($UserRec);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>歷史訂單紀錄</title>
<style type="text/css">

table {
	color: #00F;
	border: thick solid #6C6;
	left: 30px;
	top: 200px;
}
</style>
</head>

<body>
<center>
<h2>
	<?php echo $row_UserRec['firstname']; ?>
	<?php echo $row_UserRec['lastname']; ?> 
    ,你好!這是你的歷史定單紀錄
    <br>
    <a href="prodlist.php">回到網路商店</a>
</h2>

<p>
<table width="600" border="1" align="center" bgcolor="#66FFCC">
  <tr>
    <th width="300">訂購時間</th>
    <th width="300">訂單內容</th>
    <th width="300">總金額</th>
  </tr>
  <?php do { ?>
  <tr>
    <td><?php echo $row_orderRec['ptime']; ?></td>
    <td><?php echo $row_orderRec['oid']; ?></td>
    <td><?php echo $row_orderRec['total']; ?></td>
  </tr>
  <?php } while ($row_orderRec = mysql_fetch_assoc($orderRec)); ?>
</table>
</body>
</html>
<?php
mysql_free_result($orderRec);

mysql_free_result($UserRec);
?>
