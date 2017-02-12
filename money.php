<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php
include 'conn.php';
$User_name=$_POST['User_name'];
$money=$_POST['money'];

$sql="UPDATE t_user SET money = money+ $money WHERE User_name='$User_name'";
$rs=$mysqli->query($sql);
if($rs){
    echo "<script>alert('成功充值！');</script>";
    echo "<script>location.href='index.php';</script>";
        }
        else {
            echo "<script>alert('充值失败！');</script>";
            echo "<script>location.href='index.php';</script>";
        }
?>