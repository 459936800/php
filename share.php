<?php
include 'header.php'; 
$boardid=$_GET["boardid"];
?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>股票添加</title>
</head>
<body>

<h1>股票添加</h1>
<h3><a  href=broad.php>返回</a></h3>
<form action="sharesave.php" method="post" name="form1">
 <input name="op" type="hidden" value="add">
<input name="shareid" type="hidden" value="dd ">
 <input type="hidden" name="boardid" value="<?php echo $boardid; ?>"/>

 <table><br>
  <tr><td>股票代码：</td><td><input name="shareid" type="text" maxlength="60"></td></tr>
  <tr><td>股票名称：</td><td><input name="sharename" type="text" maxlength="60"></td></tr>
  <tr><td>每股/元：</td><td><input name="UP" type="text" maxlength="60"></td></tr>
  <tr><td>股票发行量：</td><td><input name="circulation" type="text" maxlength="60"></td></tr>
  <tr><td>股票简介：</td><td><input name="sharedesc" type="text" maxlength="60"></td></tr>

  
  
  <tr><td colspan="2" align="center"><input name="ok" type="submit" value="保存"><input name="ok" type="reset" value="取消"></td></tr>

 </table>
 

</form>
<?php

?>
</body>
</html>