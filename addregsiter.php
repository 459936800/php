<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php
session_start();
include "conn.php";
$zym=$_SESSION['yzm_num'];
if(isset($_POST['ok'])){
	//�����û���Ϣ
     $yhm=$_POST['passportid'];
     $dlmm=$_POST['password'];
     $qrmm=$_POST['confirm_password'];
     $lxdh=$_POST['Phone'];
     $yzm=$_POST['captcha'];
     $time=date("Y-m-d",time());
	 //�ж���֤���Ƿ�һ�²�һ�²�ִ���Բ�����
    if($yzm==$zym){
		 $cx="select * from t_user where User_id='$yhm'";
// 		 echo $cx;
		 $tj=mysqli_query($mysqli,$cx);
// 		 echo $tj;
// 		 $hs=mysql_num_rows($cx);
// if (($tj=mysqli_query($mysqli,$cx))!== false){
// 		     $rc=mysqli_num_rows($tj);
// 		     if($rc>0){
// 		         echo "<script>alert('该用户已存在！');</script>";
// 		         echo "<script>location.href='reg.php';</script>";
// 		     }
// 		     else{
		         $dlmm1=md5($dlmm);//md5����
		        $cr="INSERT INTO `t_user` (`User_name`, `Password`, `Creatime`, `Phone`)VALUES('$yhm', '$dlmm1', NOW(), '$lxdh')";
// 		        echo "<br>";
// 		         echo $cr;
// 		         $crtj=$mysqli->query($cr);
// 		         echo $crtj;
		         if($mysqli->query($cr) == TRUE){
		             echo "<script>alert('注册成功！');</script>";
		             echo "<script>location.href='login.php';</script>";
		             mysqli_close($mysqli);
		         }
		        echo "<script>alert('注册失败！已有该用户！');</script>";
		        echo "<script>location.href='reg.php';</script>";
// 		     }
// 		 }
// 		 echo "<script>alert('if($tj)出错！');</script>";
	}
	else{
		echo "<script>alert('注册失败！验证码错误！');</script>";
		echo "<script>location.href='reg.php';</script>";
	}
}

?>