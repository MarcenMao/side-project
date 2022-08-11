<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>動態網頁設計 作業壹(rbg)</title>
<?php
	function RGBtoHex($R, $G, $B){
    	$R = dechex($R);//10轉16
    	if (strlen($R)<2){$R = '0'.$R;}//比較字串長度 未達2的話前面補0
    	

    	$G = dechex($G);
    	if (strlen($G)<2){$G = '0'.$G;}
    	

    	$B = dechex($B);
    	if (strlen($B)<2){$B = '0'.$B;}
    	
		return '#' . $R . $G . $B;}
?>
<style type="text/css">
.rbgdiv {
	text-align: center;	
}
</style></head>

<body>
<hr size="5" align="center" noshade width="95%" color="blue">
<div align="center" id="a">

		<table cellspacing="3" cellpadding="10" border="5"> 
			<tr>
            	<td colspan=3 align=center><b>動態網頁設計 作業壹</b></td>
            </tr>
			<tr>
            	<td>原班級: 資傳2A</td><td>姓名: 王偉驊</td><td>學號: 410416639</td>
            </tr>
		</table>
	</div>
<hr size="5" align="center" noshade width="95%" color="blue">
<h2 align="center"> 色碼表 </h2>
<br>
    <div class="rbgdiv">
    
    	<table  align="center" cellpadding="10" border="5">
			<tr>
			<?php 
				echo '
					 <td><font color="red" ><b>Red</b></font></td>
                 	 <td><font color="green"><b>Green</b></font></td>
                 	 <td><font color="blue"><b>Blue</b></font></td>
                 	 <td><b>Visual Color</b></td>
                	 <td><b>Color Code</b></td>';
			?>
			</tr>
            <tr>
			<?php for($i = 0;$i < 255;$i=$i+16):?>
				<?php for($j = 0;$j < 255;$j=$j+16):?>
					<?php for($k = 0;$k < 255;$k=$k+16):?>
						<?php
    						$a=$i+$j+$k;
							if($a<384){$fontcolor="#f0f0f0";}
							if($a>=384){$fontcolor="#000000";}
							echo '<td><font color="red">'.$i.'</font></td>
								  <td><font color="green">'.$j.'</font></td>
								  <td><font color="blue">'.$k.'</font></td>
								  <td bgcolor="'.RGBtoHex($i,$j,$k).'"><font color="'.$fontcolor.'">Color</font></td>
								 <td>'.RGBtoHex($i,$j,$k).'</td>';
						?>
			</tr>
					<?php endfor?>
				<?php endfor?>
			<?php endfor?>
    
    
    
    
		</table>
	</div>

</body>
</html>