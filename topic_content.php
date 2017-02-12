<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>股票开户网站</title>
</head>
<body>

<?php
include 'header.php';

$topicid=$_GET["topicid"];
$sql="select a.title,a.content,a.pubtime,a.readtimes,b.User_name from t_post a left join t_user b on a.User_name=b.User_name where topicid=$topicid";
$rs=$mysqli->query($sql);
if($rs){
    if($rs->num_rows>0){
        if($row=$rs->fetch_array()){
            $title=$row[0];
            $content=$row[1];
            $pubtime=$row[2];
            $readtimes=$row[3];
           $User_name=$row[4];
        }
    }
}
?>



<table width=100% height="100%" border="1" cellpadding="0" cellspacing="0">
  <tr>
    <td width=20%>访问时间:<?php echo date("Y-m-d");?> </td>
    <td width=70% height="10%" align="center"><?php echo  $title;?></td>
    <td width=70% align="right"><a style="color:#00F; text-decoration:underline;" href="news.php">返回</a></td>
  </tr>
  <tr>

    <td colspan="3"><?php echo  html_entity_decode($content);?></td>
  </tr>
</table>

</body>
</html>
<?php
include 'footer.php';
?>