<?php
include 'header.php'; 
?>



<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>板块管理-板块列表</title>
</head>
<body>


<h1>新闻版块</h1>
<table width="1000" border="1" align="center" cellpadding="0" cellspacing="0">
<tr><td colspan="4" align="right"><a href="broadadd.php">添加板块</a></td></tr>
 <tr>
   <td width="47">板块id</td><td width="158">板块名字</td> <td width="226">板块描述</td><td width="162">板块操作</td>
 </tr>

   <?php

  if($_SESSION['username1']!='admin'){
    echo "<script>alert('未登陆，不能发新帖，请登陆');</script>";
    echo "<script>location.href='login.php';</script>";
} 
?>
 
 <?php 
$sql="select * from t_type";
$rs=$mysqli->query($sql);
if($rs){
    if($rs->num_rows>0){
      while($row=$rs->fetch_array()){
               $typeid=$row[0]; 
               $typename=$row[1];
               $typedesc=$row[2];
              echo '<tr><td>'.$typeid.'</td><td>'.$typename.'</td><td>'.$typedesc.'&nbsp;</td><td><a style="color:#00F" href="broadupdate.php?typeid='.$typeid.'">修改</a> &nbsp; <a style="color:#00F" href="broaddel.php?typeid='.$typeid.'">删除</a></td></tr>';
      }
?>
 

<?php
    }
    else{
        echo "<tr><td coslspan='4'>没有板块信息!!</td></tr>";
    }

 }?>


</table>
<br/>
<table width="800" border="0"  cellpadding="0" cellspacing="0" style="margin-left:50px; ">

  <tr>
  <td width='330px'><h4>请选择需要发布的板块--></h4></td>
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
              echo "<td width='150px' align='center'><a style='color:#8DB6CD; font:12px;' href=post.php?&typeid=$typeid&typename=$boardname2>&nbsp;&nbsp;$typename&nbsp;&nbsp;</a></td>";
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

<h1>新闻管理</h1>
<table width="1000"  height="25"  border="1" align="center" cellpadding="0" cellspacing="0">
 <tr>
   <td width="80">板块名称</td><td width="158">标题</td> <td width="227">内容</td><td width="222">新闻操作</td>
 </tr>

 <?php 
$sql="SELECT b.typename ,a.* FROM t_post a 
LEFT JOIN t_type b ON b.typeid= a.typeid";
$rs=$mysqli->query($sql);
if($rs){
    if($rs->num_rows>0){
      while($row=$rs->fetch_array()){
               $typename=$row[0]; 
               $title=$row[3];
               $content=$row[4];
               $topicid=$row[1];
              echo '<tr><td>'.$typename.'</td><td><a href="topic_content.php?topicid='.$topicid.'"><div STYLE="width:227px; height: 20px; overflow: hidden;text-overflow:ellipsis"><nobr>'.$title.'</nobr></div></a></td><td>　<DIV STYLE="width:500px; height: 20px; overflow: hidden; text-overflow:ellipsis"> <NOBR>'.$content.'&nbsp;</NOBR></DIV></td> <td> <a style="color:#00F" href="postdel.php?topicid='.$topicid.'">删除</a></td></tr>';
      }
?>
 

<?php
    }
    else{
        echo "<tr><td coslspan='4'>没有信息!!</td></tr>";
    }

 }?>



</table>
<br/>
<h1>股票版块</h1>
<table width="1000" border="1" align="center" cellpadding="0" cellspacing="0">
<tr><td colspan="4" align="right"><a href="boardadd.php">添加板块</a></td></tr>
 <tr>
   <td width="40">板块id</td><td width="158">板块名字</td> <td width="226">板块描述</td><td width="162">板块操作</td>
 </tr>

 <?php 
$sql="select * from t_board";
$rs=$mysqli->query($sql);
if($rs){
    if($rs->num_rows>0){
      while($row=$rs->fetch_array()){
               $boardid=$row[0]; 
               $boardname=$row[1];
               $boarddesc=$row[2];
              echo '<tr><td>'.$boardid.'</td><td>'.$boardname.'</td><td>'.$boarddesc.'&nbsp;</td><td><a style="color:#00F" href="boardupdate.php?boardid='.$boardid.'">修改</a> &nbsp; <a style="color:#00F" href="boarddel.php?boardid='.$boardid.'">删除</a></td></tr>';
      }
?>
 

<?php
    }
    else{
        echo "<tr><td coslspan='4'>没有板块信息!!</td></tr>";
    }

 }?>


</table>




<br/>
<table width="800" border="0"  cellpadding="0" cellspacing="0" style="margin-left:50px; ">

  <tr>
  <td width='330px'><h4>请选择需要发布的板块--></h4></td>
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
              echo "<td width='150px' align='center'><a style='color:#8DB6CD; font:12px;' href=share.php?&boardid=$boardid&boardname=$boardname2>&nbsp;&nbsp;$boardname&nbsp;&nbsp;</a></td>";
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
<br/>
<h1>股票管理</h1>
<table width="1000"  height="25"  border="1" align="center" cellpadding="0" cellspacing="0">
 <tr>
   <td width="45">板块id</td><td width="158">股票名称</td> <td width="100">股票简介</td><td width="100">加入时间</td><td width="100">流通量</td><td width="100">已出售量</td><td width="100">股票操作</td>
 </tr>

 <?php 
$sql="SELECT b.`boardname` ,a.* FROM tb_share a 
LEFT JOIN t_board b ON b.`boardid`= a.`boardid`";
$rs=$mysqli->query($sql);
if($rs){
    if($rs->num_rows>0){
      while($row=$rs->fetch_array()){
               $shareid=$row[1]; 
               $sharename=$row[2];
               $starttime=$row[3];
               $boardname=$row[0];
               $UP=$row[4];
               $circulation=$row[5];                                                   
               $sharedesc=$row[6];
               $Stock_issue=$row[8];
              echo '<tr><td>'.$boardname.'</td><td><a href="gupiao_topic_content.php?shareid='.$shareid.'"><div STYLE="width:227px; height: 20px; overflow: hidden;text-overflow:ellipsis"><nobr>'.$sharename.'</nobr></div></a></td><td>　<DIV STYLE="width:200px; height: 20px; overflow: hidden; text-overflow:ellipsis"> <NOBR>'.$sharedesc.'&nbsp;</NOBR></DIV></td>  <td>'.$starttime.'</td> <td>'.$circulation.'</td> <td>'.$Stock_issue.'</td> <td> <a style="color:#00F" href="sharedel.php?shareid='.$shareid.'">删除</a></td></tr>';
      }
?>
 

<?php
    }
    else{
        echo "<tr><td coslspan='4'>没有信息!!</td></tr>";
    }

 }?>






</table>
</body>
</html>
<?php
include 'footer.php';
?>