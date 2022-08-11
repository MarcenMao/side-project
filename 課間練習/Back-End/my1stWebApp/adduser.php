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

if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "form")) {
  $insertSQL = sprintf("INSERT INTO user (username, password, dob, lastname, firstname, mobile, `access`) VALUES (%s, %s, %s, %s, %s, %s, %s)",
                       GetSQLValueString($_POST['account'], "text"),
                       GetSQLValueString($_POST['password'], "text"),
                       GetSQLValueString($_POST['birth'], "date"),
                       GetSQLValueString($_POST['lastname'], "text"),
                       GetSQLValueString($_POST['firstname'], "text"),
                       GetSQLValueString($_POST['tel'], "text"),
                       GetSQLValueString($_POST['access'], "text"));

  mysql_select_db($database_storeDB, $storeDB);
  $Result1 = mysql_query($insertSQL, $storeDB) or die(mysql_error());

  $insertGoTo = "index.php";
  if (isset($_SERVER['QUERY_STRING'])) {
    $insertGoTo .= (strpos($insertGoTo, '?')) ? "&" : "?";
    $insertGoTo .= $_SERVER['QUERY_STRING'];
  }
  header(sprintf("Location: %s", $insertGoTo));
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>新增帳號</title>
<style type="text/css">
.tablete {
	text-align: center;
}
</style>
</head>

<body>
<h1>創立一個帳號吧!!</h1>
<div align="center">
<form method="POST" action="<?php echo $editFormAction; ?>" name="form">
<table width="450" border="1" align="center" class="tablete" >
  <tr>
    <td width="200">帳號</td><td width="266"><input type="text" name="account" maxlength="64"></td>
  </tr>
  <tr>
  	<td>密碼</td> <td><input type="password" name="password"  maxlength="32"></td>
  </tr>
  <tr>
  	<td class="tablete">生日</td> 
  	<td><input type="date" name="birth"></td>
  </tr>
    <tr>
  	<td>姓</td> <td><input type="text" name="lastname" maxlength="16" placeholder="葉"></td>
  </tr>
    <tr>
  	<td>名</td> <td><input type="text" name="firstname" maxlength="16" placeholder="怡君"></td>
  </tr>
    <tr>
  	<td>電話</td> <td><input type="text" name="tel"maxlength="32" placeholder="0912345678"></td>
  </tr>
  	<td>會員資格</td><td class="tablete"><input type="text" name="access" value="member"  readonly="readonly"/></td>
</table>
<input type="hidden" name="MM_insert" value="form" />
<input type="submit" name="form" value="送出">
</form>
</div>
</body>
</html>