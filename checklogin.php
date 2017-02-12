<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php
session_start();
include "conn.php";
if(isset($_POST['ok'])){
    $username=$_POST['username1'];
    $password=$_POST['password1'];
    $cx="select * from t_user where User_name ='$username'";

    $tj=$mysqli->query($cx);
//     echo $tj;
    $hs=$tj->num_rows;

    if($hs>0){

        $row=mysqli_fetch_array($tj);
        $pass=$row['Password'];
        $pass1=($pass);
        $password1=md5($password);
        if($password1==$pass1){
            $_SESSION['userid']=$row[1];
//             $_SESSION['username']=$username;
//             echo "登陸成功！";
//             while ($row=$tj->fetch_array()){         
//             $userid=$row[0];        
//                 }
//               echo $username;
            $_SESSION['Lastlogin']=date("Y-m-d",time());
            $_SESSION['username1']=$username;
//             echo  $_SESSION['username'],$pass=$row['password'];
//             echo $_SESSION['userid'];
              $_SESSION['root']=$row['Root'];
//             echo $_SESSION['root'];
            
            $cr="UPDATE `t_user` SET  Lastlogin=NOW() WHERE User_name='$username'";
            if($mysqli->query($cr) == TRUE){
                echo "<script>alert('登录时间已刷新！');</script>";
                
                mysqli_close($mysqli);
            }
            else{
            echo "<script>alert('刷新时间失败！');</script>";;
            return false;
            }
            
            if($_SESSION['root']==0){
            echo  "<script>alert('登陆成功！');</script>";
            echo  "<script>location.href='index.php';</script>";
            }
            else {
                echo  "<script>alert('您的身份是管理员，确定进入后台系统！');</script>";
                echo  "<script>location.href='broad.php';</script>";
            }
           
        }else {
           
            echo  "<script>alert('密码输入错误！请重新输入');</script>";
            echo "<script>location.href='login.php';</script>";
            
        }
    }
    else {
        if($username!==""||$password!=="")
        {
        echo  "<script>alert('用户不存在请注册!!');</script>";
       echo "<script>location.href='reg.php';</script>";
        }
        else {
            echo  "<script>alert('请填写帐号和密码!!');</script>";
            echo "<script>location.href='login.php';</script>";
        }
    }

}  