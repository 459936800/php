<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php
include 'conn.php';
if (isset($_POST['ok'])) {
    $boardname = $_POST['boardname'];
    $boarddesc = $_POST['boarddesc'];
    $op = $_POST["op"];
    if ($op == "add") {
        $sql = "insert into t_board(boardname,boarddesc)values('$boardname','$boarddesc')";  
    }
    else{
        $boardid = $_POST['boardid'];
        $sql="update t_board set boardname='$boardname', boarddesc='$boarddesc' where boardid=$boardid";
    
    }
    $rs = $mysqli->query($sql);
    if ($rs) {
        echo "<script>alert('保存成功！');</script>";
        echo "<script>location.href='broad.php';</script>";
    } else {
        echo '保存失败';
        echo "<script>location.href='broad.php';</script>";
    }
}

?>