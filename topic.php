
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>股票开户网站</title>
</head>
<body style="height:100px">

<?php
include 'header.php';
$typeid=$_GET['typeid'];
$typename="";
 
$sql="select typename from t_type where typeid=$typeid ";
$rs=$mysqli->query($sql);
if($rs){
    if($rs->num_rows>0){
       if($row=$rs->fetch_array()){ 
           $typename=$row[0];
       }
    }
}

?>
<div style="height:554px">
<h3>所在位置：<a href="news.php">財經消息</a>-><?php echo $typename?></h1>
<table style="margin-left:10%" width=80% border="0" cellpadding="0" cellspacing="5">
<br/>

<?php 
$sql="select a.topicid,a.title,b.User_name,a.pubtime,readtimes  from t_post a left join t_user b on a.User_name=b.User_name  where a.typeid=$typeid ";
$rs=$mysqli->query($sql);
if($rs){
    if($rs->num_rows>0){
      while($row=$rs->fetch_array()){
               $topicid=$row[0]; 
               $title=$row[1];
               $User_name=$row[2];
               $pubtime=$row[3];
               $readtimes=$row[4];
             
              echo "<tr><td><a style='color:#00F; text-decoration:underline;' href=topic_content.php?topicid=$topicid >$title </a></td><td align='right' style='font-size:12px; color:#999'> $pubtime&nbsp;</td></tr>";
              
      }
?>
 

<?php
    }
    else{
        echo "<tr><td colspan=6>這個版塊什麽都沒有！</td></tr>";
    }

 }?>
 </table>

</div>
</body>
<?php
include 'footer.php';
?>
</html>
