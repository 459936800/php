<?php include "header.php";?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>股票开户网站</title>

</head>
<body>

<div style="height:554px">
<table width="600" border="0"  cellpadding="0" cellspacing="0" style="margin-left:200px; background-image:url(images/tbbg4.png) ">
  <tr>
    <?php
  if(!isset($_SESSION['userid'])){
    echo "<script>alert('尚未登陆不可使用搜索功能！');</script>";
    echo "<script>location.href='login.php';</script>";
} 
?>
  
<?php 
$userid=$_SESSION['userid'];
$sql="select * from t_board";
$rs=$mysqli->query($sql);
if($rs){
    if($rs->num_rows>0){
      while($row=$rs->fetch_array()){
               $boardid=$row[0]; 
               $boardname=$row[1];
                $boardname2=htmlentities($boardname);
               $boarddesc=$row[2];
              echo "<th width='100px' align='center'><a style='color:#fff; font:14xp;' href=gupiao_topic.php?&boardid=$boardid&boardname=$boardname2>&nbsp;&nbsp;$boardname&nbsp;&nbsp;</a></td>";
      }
?>


<?php
    }
    else{
        echo "<tr><td>没有板块信息!!</td></tr>";
    }

 }?>
 </tr>
 </table>
 <?php 
$boardname="";
 
$sql="select boardname from t_board ";
$rs=$mysqli->query($sql);
if($rs){
    if($rs->num_rows>0){
       if($row=$rs->fetch_array()){ 
           $boardname=$row[0];
       }
    }
}
 ?>


<!-- 查找股票 -->
<h1 align="center" >股票详情</h1>
<table width="600" border="1" align="center" cellpadding="0" cellspacing="0"  style="background-image:url(images/tbbg4.png)">
 <tr style='color:#ddd'>
  <td width="100">股票代码</td> <td width="226">股票名称</td><td width="162" align="center">每股/元</td><td width="222" align="center">操作</td>
 </tr>
<?php  
$searchs = $_POST['search'];      
$sql="select * from tb_share where shareid like '$searchs%' ";
$rs=$mysqli->query($sql);
if($rs){
    if($rs->num_rows>0){
      while($row=$rs->fetch_array()){
               $shareid=$row[0]; 
               $sharename=$row[1];
               $starttime=$row[2];
               $UP=$row[3];
               $circulation=$row[4];
               $sharedesc=$row[5];                                                   
               $Stock_issue=$row[7];
               echo "<tr><td><a style='text-decoration:underline; color:#FF0' href='gupiao_topic_content.php?shareid='$shareid''>$shareid</a></td><td style='color:#0FF'>$sharename&nbsp;</td><td align='center' style='color:#F00'>$UP&nbsp;￥ </td><td align='center' ><form  action='buy.php' method='post' id='by' name='my' > <input name='userid' type='hidden' value='$userid'><input name='shareid' type='hidden' value='$shareid'><input name='ok' type='submit' value='交易'></form></td></tr>";
      }
?>


<?php
    }
    else{
    
        echo "<tr><td style=' color:#FFF' colspan=6>没有找到你你要的股票!!</td></tr>";
    }

 }?>
 </table>
 
 </div>
 <?php include 'footer.php';?>
</body>
</html>