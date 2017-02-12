<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php
session_start();
// if (! isset($_SESSION['adminid'])) {
//     echo "<script>alert('您还没登陆！请登陆！');</script>";
//     echo "<script>location.href='login.php';</script>";
// } else {
    if (isset($_POST["ok"])) {
        $typeid = $_POST['typeid'];
        $title = $_POST['title'];
        $content =htmlspecialchars( $_POST['content']);
        $username=$_SESSION['username1'];
//         echo $content;
      
        $cip = "";
        
//         $userid = $_SESSION['adminid'];
        if (! empty($_SERVER["HTTP_CLIENT_IP"])) {
            $cip = $_SERVER["HTTP_CLIENT_IP"];
        } elseif (! empty($_SERVER["HTTP_X_FORWARDED_FOR"])) {
            $cip = $_SERVER["HTTP_X_FORWARDED_FOR"];
        } elseif (! empty($_SERVER["REMOTE_ADDR"])) {
            $cip = $_SERVER["REMOTE_ADDR"];
        } else {
            $cip = "";
        }
        include 'conn.php';
       $sql = "INSERT INTO t_post(title,content,User_name, pubtime, readtimes, typeid)
       VALUES
       ('$title','$content', '$username', now(),now(),$typeid);";
       
//        echo $sql;
         $rs=$mysqli->query($sql);
         if($rs){
         echo "<script>alert('发送成功！');</script>";
         echo "<script>location.href='topic.php?typeid=$typeid';</script>";
        }
    } else {
        
        echo "<script>location.href='index.php';</script>";
    }


?>