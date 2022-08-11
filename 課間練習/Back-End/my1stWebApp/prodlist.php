<?php require_once('Connections/storeDB.php'); ?>
<?php
//initialize the session
if (!isset($_SESSION)) {
  session_start();
}

// ** Logout the current user. **/*登出*/
$logoutAction = $_SERVER['PHP_SELF']."?doLogout=true";
if ((isset($_SERVER['QUERY_STRING'])) && ($_SERVER['QUERY_STRING'] != "")){
  $logoutAction .="&". htmlentities($_SERVER['QUERY_STRING']);
}

if ((isset($_GET['doLogout'])) &&($_GET['doLogout']=="true")){
  //to fully log out a visitor we need to clear the session varialbles
  $_SESSION['MM_Username'] = NULL;
  $_SESSION['MM_UserGroup'] = NULL;
  $_SESSION['PrevUrl'] = NULL;
  unset($_SESSION['MM_Username']);
  unset($_SESSION['MM_UserGroup']);
  unset($_SESSION['PrevUrl']);
	
  $logoutGoTo = "index.php";
  if ($logoutGoTo) {
    header("Location: $logoutGoTo");
    exit;
  }
}/*登出*/
?>
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

$currentPage = $_SERVER["PHP_SELF"];

$maxRows_productList = 5;
$pageNum_productList = 0;
if (isset($_GET['pageNum_productList'])) {
  $pageNum_productList = $_GET['pageNum_productList'];
}
$startRow_productList = $pageNum_productList * $maxRows_productList;

mysql_select_db($database_storeDB, $storeDB);
$query_productList = "SELECT * FROM product ORDER BY price ASC";
$query_limit_productList = sprintf("%s LIMIT %d, %d", $query_productList, $startRow_productList, $maxRows_productList);
$productList = mysql_query($query_limit_productList, $storeDB) or die(mysql_error());
$row_productList = mysql_fetch_assoc($productList);

if (isset($_GET['totalRows_productList'])) {
  $totalRows_productList = $_GET['totalRows_productList'];
} else {
  $all_productList = mysql_query($query_productList);
  $totalRows_productList = mysql_num_rows($all_productList);
}
$totalPages_productList = ceil($totalRows_productList/$maxRows_productList)-1;

$colname_UserRec = "-1";
if (isset($_SESSION['MM_Username'])) {
  $colname_UserRec = $_SESSION['MM_Username'];
}
mysql_select_db($database_storeDB, $storeDB);
$query_UserRec = sprintf("SELECT lastname, firstname FROM `user` WHERE username = %s", GetSQLValueString($colname_UserRec, "text"));
$UserRec = mysql_query($query_UserRec, $storeDB) or die(mysql_error());
$row_UserRec = mysql_fetch_assoc($UserRec);
$totalRows_UserRec = mysql_num_rows($UserRec);

$queryString_productList = "";
if (!empty($_SERVER['QUERY_STRING'])) {
  $params = explode("&", $_SERVER['QUERY_STRING']);
  $newParams = array();
  foreach ($params as $param) {
    if (stristr($param, "pageNum_productList") == false && 
        stristr($param, "totalRows_productList") == false) {
      array_push($newParams, $param);
    }
  }
  if (count($newParams) != 0) {
    $queryString_productList = "&" . htmlentities(implode("&", $newParams));
  }
}
$queryString_productList = sprintf("&totalRows_productList=%d%s", $totalRows_productList, $queryString_productList);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>網路商店</title>
<style type="text/css">
body {
	
}
table {
	color: #00F;
	border: thick solid #6C6;
	left: 30px;
	top: 200px;
}
</style>
</head>

<body>
<div align="center">
<h1>User can browse products at this page:<?php echo $row_UserRec['firstname']; ?> <?php echo $row_UserRec['lastname']; ?><br>
You are a '<?php echo $_SESSION['MM_UserGroup']; ?>'.
<h3><!--<a href="addnewpd.php">上架產品</a>  -->

<a href="orderlist.php">歷史購物紀錄</a>
  <a href="<?php echo $logoutAction ?>">登出</a>
</h3>
</h1>
<p>
<p>既有產品: </p>
<table border="1" bgcolor="#66FFCC">
  <tr>
    <th width="160" scope="col">產品名稱</th>
    <th width="172" scope="col">價格</th>
    <th width="181" scope="col">簡述</th>
  </tr>
  <?php do { ?>
  <tr>
    <td><?php echo $row_productList['pname']; ?></td>
    <td><?php echo $row_productList['price']; ?></td>
    <td><?php echo $row_productList['description']; ?></td>
  </tr>
  <?php } while ($row_productList = mysql_fetch_assoc($productList)); ?>
</table>
<a href="<?php printf("%s?pageNum_productList=%d%s", $currentPage, 0, $queryString_productList); ?>">第一頁</a><a href="<?php printf("%s?pageNum_productList=%d%s", $currentPage, max(0, $pageNum_productList - 1), $queryString_productList); ?>">上一頁</a><a href="<?php printf("%s?pageNum_productList=%d%s", $currentPage, min($totalPages_productList, $pageNum_productList + 1), $queryString_productList); ?>">下一頁</a><a href="<?php printf("%s?pageNum_productList=%d%s", $currentPage, $totalPages_productList, $queryString_productList); ?>">最後一頁</a></div>
</body>
</html>
<?php
mysql_free_result($productList);

mysql_free_result($UserRec);
?>
