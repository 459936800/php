<?php
include 'header.php'; 
?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>板块管理-股票板块修改</title>
</head>
<body>
<?php
include 'conn.php';
$boardid=$_GET["boardid"];
$sql="select boardname,info from boardtb  where boardid=$boardid";
$boardname="";
$boardesc="";
$rs=$mysqli->query($sql);
if($rs){
    if($row=$rs->fetch_array()){
        $boardname=$row[0];
        $boardesc=$row[1];
    }
}
?>
<h1>股票板块修改</h1>
<h3><a  href=broad.php>返回</a></h3>
<form action="boardsave.php" method="post" name="form1">
 <input name="boardid" type="hidden" value="<?php echo $boardid?> ">
 <input name="op" type="hidden" value="update">
 <table>
  <tr><td>板块名字：</td><td><input name="boardname" type="text"  maxlength="60" value="<?php echo $boardname?>"></td></tr>
  
  <tr><td>板块简介：</td><td><input name="boarddesc" type="text"  maxlength="60" value="<?php echo $boardesc?>"></td></tr>
  
 <tr><td colspan="2" align="center"><input name="ok" type="submit" value="保存"><input name="ok" type="reset" value="取消"></td></tr>
 
 </table>
 

</form>
<?php

?>
</body>
</html>