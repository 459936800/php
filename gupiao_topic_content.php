<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>财经资讯</title>
</head>
<body>

<?php
include 'header.php';
$shareid=$_GET["shareid"];
$sql="select shareid,sharename,sharedesc,UP from tb_share  where shareid=$shareid ";
$rs=$mysqli->query($sql);
if($rs){
    if($rs->num_rows>0){
        if($row=$rs->fetch_array()){
            $sharename=$row[1];
            $sharedesc=$row[2];
            $UP=$row[3];

        }
    }
}
?>



<table height=100% width=100%  border="1" cellpadding="0" cellspacing="0">
  <tr>
    <td width=20%>股票单位价格:<?php echo $UP;?> </td>
    <td width=70% height="10%" align="center"><?php echo  $sharename;?></td>
    <td width=70% align="right"><a href="news.php" style="color:#00F">返回</a></td>
  </tr>
  <tr>

    <td colspan="3" align="center" height=100%><?php echo  $sharedesc?></td>
  </tr>
</table>

</body>
</html>
<?php
include 'footer.php';
?>