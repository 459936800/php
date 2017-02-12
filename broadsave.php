<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php
include 'conn.php';
if (isset($_POST['ok'])) {
    $typename = $_POST['typename'];
    $typedesc = $_POST['typedesc'];
    $op = $_POST["op"];
    if ($op == "add") {
        $sql = "insert into t_type(typename,typedesc)values(' $typename','$typedesc')";  
    }
    else{
        $typeid = $_POST['typeid'];
        $sql="update t_type set typename='$typename', typedesc='$typedesc' where typeid=$typeid";
    
    }
    $rs = $mysqli->query($sql);
    if ($rs) {
        echo "<script>alert('保存成功！');</script>";
        echo "<script>location.href='broad.php';</script>";
    } else {
        echo "<script>alert('保存s失败！');</script>";
        echo "<script>location.href='broad.php';</script>";
    }
}

?>