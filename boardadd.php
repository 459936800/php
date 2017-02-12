<?php
include 'header.php'; 
?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>板块管理-股票板块添加</title>
</head>
<body>

<h1>股票板块添加</h1>
<h3><a  href=broad.php>返回</a></h3>
<form action="boardsave.php" method="post" name="form1">
 <input name="op" type="hidden" value="add">
<input name="boardid" type="hidden" value="dd ">
 <table><br>
  <tr><td>板块名字：</td><td><input name="boardname" type="text" maxlength="60"></td></tr>
  
  <tr><td>板块简介：</td><td><input name="boarddesc" type="text" maxlength="60"></td></tr>
  
  <tr><td colspan="2" align="center"><input name="ok" type="submit" value="保存"><input name="ok" type="reset" value="取消"></td></tr>

 </table>
 

</form>

</body>
</html>