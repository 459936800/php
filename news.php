<?php
include 'header.php';
?>

<title>股票开户网站</title>
<body style="height:765px">
<table width="600" border="0"  cellpadding="0" cellspacing="0" style="margin-left:200px; background-image:url(images/tbbg.png) ">
  <tr>
<?php 
$sql="select * from t_type";
$rs=$mysqli->query($sql);
if($rs){
    if($rs->num_rows>0){
      while($row=$rs->fetch_array()){
               $typeid=$row[0]; 
               $typename=$row[1];
                $boardname2=htmlentities($typename);
               $typedesc=$row[2];
              echo "<span onmousemove='this.style.color='red'; onmouseout='this.style.color='#000''><th width='100px' height='20px' align='center'><a style='color:#ffF; font:14xp;' href=topic.php?&typeid=$typeid&typename=$boardname2>&nbsp;&nbsp;$typename&nbsp;&nbsp;</a></td></span>";
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
$typename="";
 
$sql="select typename from t_type ";
$rs=$mysqli->query($sql);
if($rs){
    if($rs->num_rows>0){
       if($row=$rs->fetch_array()){ 
           $typename=$row[0];
       }
    }
}
 ?>
 
 
 
<div style="height:70%">
<h1 align="center">财经消息</h1>
 <table width="100" border="0" cellpadding="1" cellspacing="5"  style="margin-left:10%">
<div style="margin-left:60%;">
<table width="700" height="103" border="0" align="center" cellpadding="0" cellspacing="1" style="background-image:url(images/tbbg2.png)"> 

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

$Page_size=17; 

$result=mysql_query('select * from t_post'); 
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
$sql="select * from t_post limit $offset,$Page_size"; 
$result=mysql_query($sql,$link); 
while ($row=mysql_fetch_array($result)) { 
?> 

<tr> 
<td width="100px" height="25px"> 

<div style="width:330px;height: 20px; text-decoration:underline; overflow: hidden;text-overflow:ellipsis">
<nobr>
&nbsp;
<a style="text-decoration:underline; color:#00F" href="topic_content.php?topicid=<?php echo $row['topicid']?>"  >
<?php echo $row['title']?> 
</a>
</nobr>
</div>
</td> 
<td align='right' style='font-size:12px; color:#999'>
<?php echo $row['pubtime']?> 
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
<span onMouseMove="this.style.color='red';" onMouseOut="this.style.color='#000'"></span>
 
 </body>
<?php
include 'footer.php';
?>





