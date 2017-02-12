<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>财经资讯</title>
</head>
<body>

<?php
include 'header.php';
$shareid=$_GET["shareid"];
$sql="select a.*,b.username from sharetb a left join usertb b on a.userid=b.userid where topicid=$topicid";
$rs=$mysqli->query($sql);
if($rs){
    if($rs->num_rows>0){
        if($row=$rs->fetch_array()){
            $title=$row[1];
            $cotent=$row[2];
            $pubtime=$row[4];
            $pubip=$row[5];
           $readtimes=$row[6];
           $replytimes=$row[7];
           $typeid =$row[8];
           $username=$row[9];
        }
    }
}
?>



<table width=100% border="1" cellpadding="0" cellspacing="0">
  <tr>
    <td width=20%>访问时间<?php echo $readtimes;?> </td>
    <td width=70% height="10%" align="center"><?php echo  $title;?></td>
    <td width=70% align="right"><a href="news.php">返回</a></td>
  </tr>
  <tr>

    <td colspan="3"><?php echo  html_entity_decode($cotent);?></td>
  </tr>
</table>

</body>
</html>
<?php
include 'footer.php';
?>