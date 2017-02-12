<?php
include 'header.php';
if (! isset($_SESSION['username1'])) {
    echo "<script>alert('您还没登陆！请登陆！');</script>";
    echo "<script>location.href='login.php';</script>";
} else {

}
?>
<title>股票开户网站</title>

<!-- 股票 -->

<table  width="600px" height="103" border="1" align="center" cellpadding="0" cellspacing="0" bgcolor="#000000" style=" background-image:url(images/tbbg4.png)"> 
 <tr  style='color:#ddd' >
  <td>股票代码</td> <td >股票名称</td><td  align="center">每股/元</td><td  align="center">加入时间</td><td  align="center">总发行量</td><td  align="center">已发行量</td>
 </tr>
<?php 
$User_name=$_SESSION['username1'];
$shareid=$_POST['shareid'];
$sql="select shareid,sharename,sharedesc,starttime,UP,circulation,Stock_issue  from tb_share  where shareid=$shareid ";
$rs=$mysqli->query($sql);
if($rs){
    if($rs->num_rows>0){
      while($row=$rs->fetch_array()){
               $shareid=$row[0]; 
               $sharename=$row[1];
               $sharedesc=$row[2];
               $starttime=$row[3];
               $UP=$row[4];
               $circulation=$row[5];
               $Stock_issue=$row[6];
              echo "<tr><td><a style='text-decoration:underline; color:#FF0' href='gupiao_topic_content.php?shareid='$shareid''>$shareid</a></td><td style='color:#0FF' >$sharename&nbsp;</td><td align='center' style='color:#F00'>$UP&nbsp;￥ </td><td style='color:#ddd'>$starttime</td><td style='color:#ddd'>$circulation</td><td style='color:#ddd'>$Stock_issue</td></tr>";
                             
      }
?>

<?php
    }
    else{
        echo "<tr><td colspan=6>這個版塊什麽都沒有！</td></tr>";
    }

 }?>
</table>
<!-- 用户 -->
<table  width="600"  height="25"  border="1" align="center" cellpadding="0" cellspacing="0" style=" background-image:url(images/tbbg4.png)">
 <tr style='color:#eee'>
   <td width="60">用户名</td> <td width="45">等级</td> <td width="45">开户时间</td><td width="45">手机</td> <td width="45" >余额<td align="center">充值</td></td>
 </tr>

  <?php 

$sql="select * from t_user where User_name='$User_name'";
$rs=$mysqli->query($sql);
if($rs){

    if($rs->num_rows>0){
      while($row=$rs->fetch_array()){
               $User_name=$row[0]; 
               $password=$row[1];
               $Root=$row[2];
               $Phone=$row[3];
               $Creatime=$row[5];
               $money=$row[6];
              echo "<tr style='color:#eee'><td>$User_name</td><td>$Root</td><td>$Creatime</td><td>$Phone</td><td>$money</td><td width='45'> <form  action='money.php' method='post' id='my' name='my' > <input name='User_name' type='hidden' value='$User_name'> <input name='money' type='text' /><input name='ok' type='submit' value='确定'></form></td></tr>";
      }
      
?>


<?php
    }
    else{
        echo "<tr><td coslspan='4'>没有信息!!</td></tr>";
    }

 }?>
 
</table>
<?php 
$_SESSION['UP']=$UP;
?>

<table  width="600"  height="25"  border="1" align="center" cellpadding="0" cellspacing="0" style=" background-image:url(images/tbbg4.png)">

  <tr style='color:#ddd' >
        <td width="100" colspan="5"  align="center">股数：</td>
    
  </tr>
  <tr>
  <form  action='buss.php' method='post' id='' name='' >
  <td align="center"><input name='Stock' type='text' /></td>
    <td colspan="2" align="center" >  
     <input name='shareid' type='hidden' value='<?php echo $shareid ?>'> 
    <input name='buss' type='hidden' value='add'> 
    <input name='User_name' type='hidden' value='<?php echo $User_name ?>'> 
      <input name='UP' type='hidden' value='<?php echo $UP ?>'>
     <input name='add' type='submit' value='增持'> 
     <input name='reset' type='reset' value='清空'>
     </td>
      </form>
      <form  action='buss.php' method='post' id='' name='' >
     <td align="center"><input name='Stock' type='text' /></td>
         <td colspan="2" align="center" >  
     <input name='shareid' type='hidden' value='<?php echo $shareid ?>'> 
    <input name='buss' type='hidden' value='sub'> 
       <input name='User_name' type='hidden' value='<?php echo $User_name ?>'> 
       <input name='UP' type='hidden' value='<?php echo $UP ?>'>
     <input name='sub' type='submit' value='减持'> 
     <input name='reset' type='reset' value='清空'>
     
     </td>
     </form>
  </tr>
   
</table>
<?php
include 'footer.php';
?>