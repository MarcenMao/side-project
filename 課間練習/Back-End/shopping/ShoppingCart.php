<?php 
header("content-type:text/html;charset=utf-8");
session_start(); 
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>購物車</title>
</head>
<body>
<center>
<h2>訂單內容</h2><p>
</center>
<hr>
<table border="1">
<?php
	$p1=@$_POST['p1'];
	$p2=@$_POST['p2'];
	$p3=@$_POST['p3'];
	$p4=@$_POST['p4'];
	$p5=@$_POST['p5'];
	$p1no=$_POST['p1no'];
	$p2no=$_POST['p2no'];
	$p3no=$_POST['p3no'];
	$p4no=$_POST['p4no'];
	$p5no=$_POST['p5no'];

		if($p1!=""){
			if(isset($_SESSION['p1no'])){
				$_SESSION['p1no']=$_SESSION['p1no']+$p1no;
			}
			else{
				$_SESSION['p1no']=$p1no;
			}
		}
		if($p2!=""){
			if(isset($_SESSION['p2no'])){
				$_SESSION['p2no']=$_SESSION['p1no']+$p2no;
			}
			else{
				$_SESSION['p2no']=$p2no;
			}
		}
		if($p3!=""){
			if(isset($_SESSION['p3no'])){
				$_SESSION['p3no']+=$p3no;
			}
			else{
				$_SESSION['p3no']=$p3no;
			}
		}
		if($p4!=""){
			if(isset($_SESSION['p4no'])){
				$_SESSION['p4no']+=$p4no;
			}
			else{
				$_SESSION['p4no']=$p4no;
			}
		}
		if($p5!=""){
			if(isset($_SESSION['p5no'])){
				$_SESSION['p5no']+=$p5no;
			}
			else{
				$_SESSION['p5no']=$p5no;
			}
		}
		if(isset($_SESSION['p1no'])){
			echo '<tr><td>第1項商品被訂'.$_SESSION['p1no'].'個</td></tr>';
		}
		if(isset($_SESSION['p2no'])){
			echo '<tr><td>第2項商品被訂'.$_SESSION['p2no'].'個</td></tr>';
		}
		if(isset($_SESSION['p3no'])){
			echo '<tr><td>第3項商品被訂'.$_SESSION['p3no'].'個</td></tr>';
		}
		if(isset($_SESSION['p4no'])){
			echo '<tr><td>第4項商品被訂'.$_SESSION['p4no'].'個</td></tr>';
		}
		if(isset($_SESSION['p5no'])){
			echo '<tr><td>第5項商品被訂'.$_SESSION['p5no'].'個</td></tr>';
		}
		if(!isset($_SESSION['p1no'])&&!isset($_SESSION['p2no'])&&!isset($_SESSION['p3no'])&&!isset($_SESSION['p4no'])&&!isset($_SESSION['p5no'])){
			echo '<br><h1>購物車內容</h1><br>您尚未選購任何商品或是已經清除購物車<br>';//購物車是空的
		}
?>
</table>

<a href="shopping.php">繼續購物</a><br>
<a href="end.php">(訂購確認)送出訂單 </a>
</body>
</html>