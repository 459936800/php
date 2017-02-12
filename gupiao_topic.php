
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>股票开户网站</title>
</head>
<body style="height:100px">

<?php

include 'header.php';
$userid=$_SESSION['userid'];
$boardid=$_GET['boardid'];
$boardname="";
 
$sql="select boardname from t_board where boardid=$boardid ";
$rs=$mysqli->query($sql);
if($rs){
    if($rs->num_rows>0){
       if($row=$rs->fetch_array()){ 
//            $boardname=$row[1];
       }
    }
}

?>

<div style="height:554px">

<h3>所在位置：<a href="gupiao.php">股票详情</a>-><?php echo $boardname?>板块</h1>
<table  style=" background-image:url(images/tbbg4.png)" width='600' border="1" cellpadding="0" cellspacing="0" align="center">
<tr  style='color:#ddd'>
<td width="100">股票代码</td> <td width="100">股票名称</td><td width="100" align="center" >每股/元</td><td width="100" align="center">操作</td>
 </tr>

<?php 

$sql="select shareid,sharename,sharedesc,UP   from tb_share  where boardid=$boardid ";
$rs=$mysqli->query($sql);
if($rs){
    if($rs->num_rows>0){
      while($row=$rs->fetch_array()){
               $shareid=$row[0]; 
               $sharename=$row[1];
               $sharedesc=$row[2];
               $UP=$row[3];
              echo "<tr><td><a style='text-decoration:underline; color:#FF0' href='gupiao_topic_content.php?shareid='$shareid''>$shareid</a></td><td style='color:#0FF' >$sharename&nbsp;</td><td align='center' style='color:#F00'>$UP&nbsp;￥ </td><td align='center' ><form  action='buy.php' method='post' id='by' name='my' > <input name='userid' type='hidden' value='$userid'><input name='shareid' type='hidden' value='$shareid'><input name='ok' type='submit' value='交易'></form></td></tr>";
              
      }
?>
 

<?php
    }
    else{
        echo "<tr><td style=' color:#FFF' colspan=6>這個版塊什麽都沒有！</td></tr>";
    }

 }?>
 </table>

</div>
</body>
<?php
include 'footer.php';
?>
</html>
