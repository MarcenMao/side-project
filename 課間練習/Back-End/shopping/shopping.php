<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Product Catalog - 產品目錄</title>
</head>

<body>
<center>
<h2>班級: 資傳二A 姓名: 王偉驊 學號: 410416639 </h2><p>
</center>
<hr>
<form action="ShoppingCart.php" method="post">

<table  border="3" cellspacing="3" cellpadding="3" align="center">
  <tr>
    <td width="70" bgcolor="#00FFFF"><strong>產品編號</strong></td>
    <td width="150" bgcolor="#00FFFF"><strong>產品名稱</strong></td>
    <td width="60" bgcolor="#00FFFF"><strong>價格/單位</strong></td>
    <td width="230" bgcolor="#00FFFF"><strong>產品描述</strong></td>
    <td width="100" bgcolor="#CCFFCC"><strong>選擇</strong></td>
  </tr>
  <tr>
    <td>P001</td>
    <td>ASUS N10HVBN280   (N10Jb)10吋全功能獨顯小筆電</td>
    <td>50/台</td>
        <td><ul>
      <LI>全尺寸鍵盤小筆電  
      <LI>獨顯NV105M512MB  
      <LI>內建指紋辨識+臉部辨識  
      <LI>2年保固優於其他小筆電</LI>
    </ul>    </td>
    <td bgcolor="#CCFFCC"><input name="p1" type="checkbox" id="p1" value="p1">
      <label>數量
      <select name="p1no" id="p1no">
	    <option value="0">0</option>
        <option value="1" selected>1</option>
        <option value="2">2</option>
        <option value="3">3</option>
        <option value="4">4</option>
        <option value="5">5</option>
      </select>
      </label></td>
  </tr>
  <tr>
    <td bgcolor="#CCCCCC">P002</td>
    <td bgcolor="#CCCCCC">Sony Ericsson Aino觸控影音愛?機</td>
    <td bgcolor="#CCCCCC">100/支</td>
        <td bgcolor="#CCCCCC"><UL>
      PS3RemotePlay遠端操控MediaHome無線同步資料3吋電容式觸控大螢幕810萬畫素相機/臉部追蹤<BR>
    </UL></td>
    <td bgcolor="#CCFFCC"><input name="p2" type="checkbox" id="p2" value="p2"><label>數量
      <select name="p2no" id="p2no">
        <option value="0">0</option>
        <option value="1" selected>1</option>
        <option value="2">2</option>
        <option value="3">3</option>
        <option value="4">4</option>
        <option value="5">5</option>
      </select>
      </label></td>
  </tr>
  <tr>
    <td>P003</td>
    <td>【愛在青瓦台】DVD (全16集) </td>
    <td>150/組</td>
        <td><UL>
      青瓦臺，指的是南韓總統府，因為顯著的建築物屋簷為古意盎然的青瓦，1960年改稱為「青瓦臺」。在這青瓦臺的三角戀情，兩位男主角最終誰才是真正抱得美人歸?<BR>
    </UL></td>
    <td bgcolor="#CCFFCC"><input name="p3" type="checkbox" id="p3" value="p3"><label>數量
      <select name="p3no" id="p3no">
        <option value="0">0</option>
        <option value="1" selected>1</option>
        <option value="2">2</option>
        <option value="3">3</option>
        <option value="4">4</option>
        <option value="5">5</option>
      </select>
      </label></td>
  </tr>
  <tr>
    <td bgcolor="#CCCCCC">P004</td>
    <td bgcolor="#CCCCCC">迪士尼童話故事精選DVD(二)三隻小豬 </td>
    <td bgcolor="#CCCCCC">200/組</td>
        <td bgcolor="#CCCCCC"><div align="center">收錄迪士尼歷年來小朋友最喜愛的童話故事，絕對讓你看過還想再看！</div></td>
    <td bgcolor="#CCFFCC"><input name="p4" type="checkbox" id="p4" value="p4"><label>數量
      <select name="p4no" id="p4no">
        <option value="0">0</option>
        <option value="1" selected>1</option>
        <option value="2">2</option>
        <option value="3">3</option>
        <option value="4">4</option>
        <option value="5">5</option>
      </select>
      </label></td>
  </tr>
  <tr>
    <td>P005</td>
    <td>1年12期捷進空中美語雜誌加贈全民英檢初級1套</td>
    <td>250/套</td>
        <td>本期加贈全民英檢初級1套(1書+3CD)<BR>
      適合全民英檢中級進階程度學習<BR>
      附贈全民英檢(GEPT)中級</td>
    <td bgcolor="#CCFFCC"><input name="p5" type="checkbox" id="p5" value="p5"><label>數量
      <select name="p5no" id="p5no">
        <option value="0">0</option>
        <option value="1" selected>1</option>
        <option value="2">2</option>
        <option value="3">3</option>
        <option value="4">4</option>
        <option value="5">5</option>
      </select>
      </label></td>
  </tr>
</table>
<p>
<div align="center">
<input type="submit" name="AddP" value="加入購物車" >
</div>
</form>
</body>
</html>