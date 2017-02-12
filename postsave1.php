<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php
include 'conn.php';
if (isset($_POST['ok'])) {
    $title = $_POST['title'];
    $content = $_POST['content'];
    $op = $_POST["op"];
    if ($op == "add") {
        $sql = "insert into posttb(title,content)values(' $title','$content')";  
    }
    else{
        $typeid = $_POST['typeid'];
        $sql="update posttb set title='$title', content='$content' where typeid=$typeid";
    
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