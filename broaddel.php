<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php
include 'conn.php';
$typeid=$_GET["typeid"];
//echo $boardid;
$sql="delete from  t_type  where typeid=$typeid";
 $rs=$mysqli->query($sql);
   if($rs){
         echo "<script>alert('删除成功！');</script>";
         echo "<script>location.href='broad.php';</script>";
    }
    else{
        echo '删除失败';
    }
?>