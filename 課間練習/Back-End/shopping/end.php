<?php 
header("content-type:text/html;charset=utf-8");
session_start(); 
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>訂單</title>
</head>

<body>
<hr><h2>訂單內容</h2>
<table width=300 border=3 cellspacing=3 cellpadding=3>
	<tr>
    	<th>產品項次</th>
    	<th>訂購數量</th>
        <th>單價</th>
        <th>單品總價</th>
    </tr>
    	<?php 
		$TotalMoney=0;
		if(isset($_SESSION['p1no'])){
			$TotalMoney+=$_SESSION['p1no']*50;
			echo '<tr><td>1</td><td>'.$_SESSION['p1no'].'</td><td>50</td><td>'.($_SESSION['p1no']*50).'</td></tr>';
		}
		if(isset($_SESSION['p2no'])){
			$TotalMoney+=$_SESSION['p2no']*100;
			echo '<tr><td>2</td><td>'.$_SESSION['p2no'].'</td><td>100</td><td>'.($_SESSION['p2no']*100).'</td></tr>';
		}
		if(isset($_SESSION['p3no'])){
			$TotalMoney+=$_SESSION['p3no']*150;
			echo '<tr><td>3</td><td>'.$_SESSION['p3no'].'</td><td>150</td><td>'.($_SESSION['p3no']*150).'</td></tr>';
		}
		if(isset($_SESSION['p4no'])){
			$TotalMoney+=$_SESSION['p4no']*200;
			echo '<tr><td>4</td><td>'.$_SESSION['p4no'].'</td><td>200</td><td>'.($_SESSION['p4no']*200).'</td></tr>';
		}
		if(isset($_SESSION['p5no'])){
			$TotalMoney+=$_SESSION['p5no']*250;
			echo '<tr><td>5</td><td>'.$_SESSION['p5no'].'</td><td>250</td><td>'.($_SESSION['p5no']*250).'</td></tr>';
		}
		?>
    <tr><td colspan=3>總價</td>
    <?php 
		echo '<td>'.$TotalMoney.'</td>';
	?>
    
</table>

<input  type ="button"  onclick="javascript:location.href='shopping.php'" value="回到購物頁面"></input>

<?php
session_destroy(); 
?>
</body>
</html>