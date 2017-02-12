<?php
include 'header.php';
?>
<title>股票开户网站</title>
<table width="600"  height="25"  border="1" align="center" cellpadding="0" cellspacing="0" style=" background-image:url(images/tbbg4.png)">
 <tr style='color:#eee'>
   <td width="52">用户名</td> <td width="40">等级</td> <td width="45">开户时间</td><td width="45">手机</td> <td width="45" >余额<td align="center">充值</td></td>
 </tr>

 <?php 
 
 if (! isset($_SESSION['username1'])) {
     echo "<script>alert('您还没登陆！请登陆！');</script>";
     echo "<script>location.href='login.php';</script>";
 } else {
 
 }
$User_name=$_SESSION['username1'];
$sql="select * from t_user where User_name='$User_name'";
$rs=$mysqli->query($sql);
if($rs){
    if($rs->num_rows>0){
      while($row=$rs->fetch_array()){
//                $userid=$row[0]; 
               $User_name=$row[0];
               $password=$row[1];
               $root=$row[2];
               $Lastlogin=$row[4];                                                  
               $iphone=$row[3];
               $money=$row[6];

               echo "<tr style='color:#eee'><td>$User_name</td><td>$root</td><td>$Lastlogin</td><td>$iphone</td><td>$money</td><td width='45'> <form  action='money.php' method='post' id='my' name='my' > <input name='User_name' type='hidden' value='$User_name'> <input name='money' type='text' /><input name='ok' type='submit' value='确定'></form></td></tr>";
      }
      
?>
 

<?php
    }
    else{
        echo "<tr><td coslspan='4'>没有信息!!</td></tr>";
    }

 }?>
</table>


<table  width="600px" height="103" border="1" align="center" cellpadding="0" cellspacing="0" bgcolor="#000000" style=" background-image:url(images/tbbg4.png)"> 
 <tr  style='color:#ddd' >
  <td>股票代码</td> <td >股票名称</td><td  align="center">每股/元</td><td  align="center">操作</td>
 </tr>
<?php 
/* 
* Created on 2010-4-17 
* 
* Order by Kove Wong 
*/ 
error_reporting(E_ALL ^ E_DEPRECATED);
$link=mysql_connect("localhost", "cjj", "sjk123", "shopd")or die('连接失败：'.mysql_error());
mysql_select_db('shopd',$link)or die('数据库连接失败：'.mysql_error());;
mysql_query('set names utf8');
// 一页多少条数据
$Page_size=10; 

$result=mysql_query('select * from tb_share'); 
$count = mysql_num_rows($result); 
$page_count = ceil($count/$Page_size); 

$init=1; 
$page_len=7; 
$max_p=$page_count; 
$pages=$page_count; 

//判断当前页码 
if(empty($_GET['page'])||$_GET['page']<0){ 
$page=1; 
}else { 
$page=$_GET['page']; 
} 

$offset=$Page_size*($page-1); 
$sql="select * from tb_share limit $offset,$Page_size"; 
$result=mysql_query($sql,$link); 
while ($row=mysql_fetch_array($result)) { 
?> 

<tr> 
<td  width="100px" height="25px"> 

<div style="width:100px;height: 20px;">
<a style="text-decoration:underline; color:#FF0" href="gupiao_topic_content.php?shareid=<?php echo $row['shareid']?>"  >
<?php echo $row['shareid']?> 
</a>

</div>
</td> 
<td style='color:#0FF'>
<?php echo $row['sharename']?> 
</td>
<td align='center' style='color:#F00'>
<?php echo $row['UP']?>￥
</td> 

<td align='center' >
<form  action='buy.php' method='post' id='by' name='my' > 
<input name='User_name' type='hidden' value='<?php echo  $User_name?>'>
<input name='shareid' type='hidden' value='<?php echo $row['shareid']?>'>
<input name='ok' type='submit' value='交易'>
</form>
</td>
</tr> 
<?php 
} 
$page_len = ($page_len%2)?$page_len:$pagelen+1;//页码个数 
$pageoffset = ($page_len-1)/2;//页码个数左右偏移量 

$key='<div class="page">'; 
$key.="<span>$page/$pages</span> "; //第几页,共几页 
if($page!=1){ 
$key.="<a href=\"".$_SERVER['PHP_SELF']."?page=1\">第一页</a> "; //第一页 
$key.="<a href=\"".$_SERVER['PHP_SELF']."?page=".($page-1)."\">上一页</a>"; //上一页 
}else { 
$key.="第一页 ";//第一页 
$key.="上一页"; //上一页 
} 
if($pages>$page_len){ 
//如果当前页小于等于左偏移 
if($page<=$pageoffset){ 
$init=1; 
$max_p = $page_len; 
}else{//如果当前页大于左偏移 
//如果当前页码右偏移超出最大分页数 
if($page+$pageoffset>=$pages+1){ 
$init = $pages-$page_len+1; 
}else{ 
//左右偏移都存在时的计算 
$init = $page-$pageoffset; 
$max_p = $page+$pageoffset; 
} 
} 
} 
for($i=$init;$i<=$max_p;$i++){ 
if($i==$page){ 
$key.=' <span>'.$i.'</span>'; 
} else { 
$key.=" <a href=\"".$_SERVER['PHP_SELF']."?page=".$i."\">".$i."</a>"; 
} 
} 
if($page!=$pages){ 
$key.=" <a href=\"".$_SERVER['PHP_SELF']."?page=".($page+1)."\">下一页</a> ";//下一页 
$key.="<a href=\"".$_SERVER['PHP_SELF']."?page={$pages}\">最后一页</a>"; //最后一页 
}else { 
$key.="下一页 ";//下一页 
$key.="最后一页"; //最后一页 
} 
$key.='</div>'; 
?> 

</table> 

</div>

 </div>
 <tr> 
<td colspan="2" bgcolor="#ffffff"><div align="center"><?php echo $key?></div></td> 
</tr> 
<?php
include 'footer.php';
?>
