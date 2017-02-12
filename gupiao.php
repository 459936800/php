<?php
include 'header.php'; 
?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>股票开户网站</title>
</head>
<body >
<div style="height:554px">
<table width="600" border="0"  cellpadding="0" cellspacing="0" style="margin-left:200px; background-image: url(images/tbbg3.png)">
  <tr>
  <?php
  if(!isset($_SESSION['userid'])){
    echo "<script>alert('尚未登陆不可进入股票模块！');</script>";
    echo "<script>location.href='login.php';</script>";
} 
?>
<?php 

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
$userid=$_SESSION['userid'];
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

 <div></div>
 

<h1 align="center" >股票详情</h1>


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

$result=mysql_query('select * from t_reply'); 
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
<input name='userid' type='hidden' value='<?php echo $userid?>'>
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




</body>
</html>






<?php
include 'footer.php';
?>