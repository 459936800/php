<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php
include 'conn.php';
if (isset($_POST['ok'])) {
    $shareid = $_POST['shareid'];
    $sharename = $_POST['sharename'];
    $UP = $_POST['UP'];
    $circulation = $_POST['circulation'];
    $sharedesc = $_POST['sharedesc'];
    $boardid= $_POST['boardid'];
    $op = $_POST["op"];
    if ($op == "add") {
        $sql = "insert into tb_share(shareid,sharename,starttime,boardid,UP,circulation,sharedesc)values('$shareid','$sharename',now(),'$boardid','$UP','$circulation','$sharedesc')";  
    }
    else{
   
        $sql="update tb_share set UP='$UP',circulation='$circulation'，sharedesc=‘$sharedesc’ where shareid=$shareid";
    
    }
    $rs = $mysqli->query($sql);
    if ($rs) {
        echo "<script>alert('保存成功！');</script>";
        echo "<script>location.href='broad.php';</script>";
    } else {
        echo '保存失败';
    }
}

?>