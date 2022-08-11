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

if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "newp")) {
  $insertSQL = sprintf("INSERT INTO product (pname, price, `description`) VALUES (%s, %s, %s)",
                       GetSQLValueString($_POST['pname'], "text"),
                       GetSQLValueString($_POST['pprice'], "int"),
                       GetSQLValueString($_POST['desc'], "text"));

  mysql_select_db($database_storeDB, $storeDB);
  $Result1 = mysql_query($insertSQL, $storeDB) or die(mysql_error());

  $insertGoTo = "mainmenu.php";//
  if (isset($_SERVER['QUERY_STRING'])) {
    $insertGoTo .= (strpos($insertGoTo, '?')) ? "&" : "?";
    $insertGoTo .= $_SERVER['QUERY_STRING'];
  }
  header(sprintf("Location: %s", $insertGoTo));
}//
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>上架產品</title>
</head>

<body>
<div align="center">
<form action="<?php echo $editFormAction; ?>" name="newp" method="POST">
<table width="200" border="1" bgcolor="#66FFCC">
  <tr>
    <td>產品名稱</td>
    <td>價格</td>
    <td>簡述</td>
  </tr>
  <tr>
    <td><input type="text" name="pname"/></td>
    <td><input type="text" name="pprice" value="0"/></td>
    <td><input type="text" name="desc"/></td>
  </tr>
</table>
<br/>
  <input type="submit" name="newp" id="newp" value="new a product" />
  <input type="reset" name="reset" id="reset" value="clear"/>
  <input type="hidden" name="MM_insert" value="newp" />
</form>
</div>
</body>
</html>