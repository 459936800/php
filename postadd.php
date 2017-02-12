<?php
include 'header.php'; 
?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>新聞管理-新聞添加</title>
</head>
<body>

<h1>添加新聞</h1>
<form action="postsave1.php" method="post" name="form1">
 <input name="op" type="hidden" value="add">
<input name="boardid" type="hidden" value="dd ">
 <table><br>
  <tr><td>标题：</td><td><input name="title" type="text" maxlength="60"></td></tr>
  
  <tr><td>内容：</td><td><input name="content" type="text" maxlength="60"></td></tr>
  
  <tr><td colspan="2" align="center"><input name="ok" type="submit" value="保存"><input name="ok" type="reset" value="取消"></td></tr>

 </table>
 

</form>
<?php

?>
</body>
</html>