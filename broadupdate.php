<?php
include 'header.php'; 
?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>板块管理-新闻板块修改</title>
</head>
<body>
<?php
include 'conn.php';
$typeid=$_GET["typeid"];
// echo $typeid;
$sql="select typename,info from t_type  where typeid=$typeid";
$typename="";
$typedesc="";
$rs=$mysqli->query($sql);
if($rs){
    if($row=$rs->fetch_array()){
        $typename=$row[0];
        $typedesc=$row[1];
    }
}
?>
<h1>新闻板块修改</h1>
<h3><a  href=broad.php>返回</a></h3>
<form action="broadsave.php" method="post" name="form1">
 <input name="typeid" type="hidden" value="<?php echo $typeid?> ">
 <input name="op" type="hidden" value="update">
 <table><br>
  <tr><td>板块名字：</td><td><input name="typename" type="text"  maxlength="60" value="<?php echo $typename?>"></td></tr>
  
  <tr><td>板块简介：</td><td><input name="typedesc" type="text"  maxlength="60" value="<?php echo $typedesc?>"></td></tr>
  
 <tr><td colspan="2" align="center"><input name="ok" type="submit" value="保存"><input name="ok" type="reset" value="取消"></td></tr>
 
 </table>
 

</form>
<?php

?>
</body>
</html>