<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php
include 'conn.php';
session_start();
$userid = $_SESSION['username1'];
$shareid = $_SESSION['shareid'];
$Stock = $_SESSION['Stock'];
$buss = $_SESSION["buss"];
$UP = $_SESSION["UP"];
// ��Ʊ������
echo $userid;
echo $shareid;echo $Stock;echo $buss;echo $UP;
if ($buss == "add") {
    // ����
    $sql1 = "update tb_share set Stock_issue=Stock_issue+'$Stock' where shareid=$shareid";
//     echo $sql;
    $rs = $mysqli->query($sql1);
    if ($rs) {
//         echo "成功增持!!!";
    } else {
      echo "<script>alert('交易失败！201。');</script>";
        echo "<script>location.href='gupiao.php';</script>";
    }
}
if ($buss == "sub") {
    // ����
    $sql2 = "update tb_share set Stock_issue=Stock_issue-'$Stock' where shareid=$shareid";
    $rs = $mysqli->query($sql2);
    if ($rs) {
//         echo "成功减持!!!";
    } else {
       echo "<script>alert('交易失败！202。');</script>";
        echo "<script>location.href='gupiao.php';</script>";
    }
} else {}

// �û����

// $sql1 = "update t_user set money=money-($Stock*$UP) where shareid=$shareid";
// $rs1 = $mysqli->query($sql);

if ($buss == "add") {
    // ����
    $sql3 = "update t_user set money=money-($Stock*$UP) where User_name='$userid'";
    $rs1 = $mysqli->query($sql3);
    if ($rs1) {
        echo "<script>alert('成功增持！确定返回股票详情。');</script>";
        echo "<script>location.href='gupiao.php';</script>";
    } else {
      echo "<script>alert('交易失败！101。');</script>";
        echo "<script>location.href='gupiao.php';</script>";
    }
}
if ($buss == "sub") {
    // ����
    $sql4 = "update t_user set money=money+($Stock*$UP) where User_name='$userid'";
    $rs1 = $mysqli->query($sql4);
    if ($rs1) {
        echo "<script>alert('成功减持！确定返回股票详情。');</script>";
        echo "<script>location.href='gupiao.php';</script>";
    } else {
        echo "<script>alert('交易失败！102。');</script>";
        echo "<script>location.href='gupiao.php';</script>";
    }
} else {}


