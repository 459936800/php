<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php
include 'conn.php';
session_start();
$User_name =$_POST['User_name'];
$shareid = $_POST['shareid'];
$Stock = $_POST['Stock'];
$buss = $_POST["buss"];
$UP = $_POST["UP"];
$_SESSION['shareid']=$shareid;
$_SESSION['Stock']=$_POST['Stock'];
$_SESSION['buss']=$_POST["buss"];
$_SESSION['UP']=$_POST["UP"];
// 判断除以100无余数
if ($Stock % 100 == 0) {
    
    // 增持
    if ($buss == "add") {
        // 判断数据是否存在hold表
        $cx = "select * from t_hold where User_name='$User_name' and shareid='$shareid'";
        echo $cx;
        $tj = $mysqli->query($cx);
        if ($tj->num_rows > 0) {
            // 存在 更新
            $sql = "update t_hold set hold=hold+'$Stock' where shareid=$shareid and User_name='$User_name'";
            $rs = $mysqli->query($sql);
            if ($rs) {
                echo "<script>alert('保存成功！!!!');</script>";
                echo "<script>location.href='buss1.php';</script>";
            } else {
                echo "<script>alert('保存失败！ 111');</script>";
                echo "<script>location.href='gupiao.php';</script>";
            }
        } else {
            // 不存在 插入
            $sql = "insert into t_hold(User_name,shareid,hold)values('$User_name',$shareid,$Stock)";
            $rs = $mysqli->query($sql);
            if ($rs) {
                echo "<script>alert('保存成功！!!!');</script>";
                echo "<script>location.href='buss1.php';</script>";
            } else {
                echo "<script>alert('保存失败！222');</script>";
                echo "<script>location.href='gupiao.php';</script>";
            }
            
        }
    }
    // 减持
    if ($buss == "sub") {
        // 判断数据是否存在hold表
        $cx = "select * from t_hold where User_name='$User_name' and shareid='$shareid'";
        echo $cx;
        $tj = $mysqli->query($cx);
        if ($tj->num_rows > 0) {
            // 存在 更新
            $sql = "update t_hold set hold=hold-'$Stock' where shareid=$shareid and User_name='$User_name'";
            $rs = $mysqli->query($sql);
            if ($rs) {
                echo "<script>alert('保存成功！!!!');</script>";
                echo "<script>location.href='buss1.php';</script>";
            } else {
                 echo "<script>alert('保存失败！333');</script>";
                echo "<script>location.href='gupiao.php';</script>";
            }
            
        } else {
            echo "<script>alert('出错！！002');</script>";
            echo "<script>location.href='index.php';</script>";
        }
    } else {
        echo "<script>alert('出错！！001');</script>";
        echo "<script>location.href='index.php';</script>";
    }
} else {
    echo "<script>alert('只能是100股为单位！！');</script>";
    echo "<script>location.href='gupiao.php';</script>";
}

?>