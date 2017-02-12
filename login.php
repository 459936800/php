<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>

<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title>登录页面</title>
<link rel="stylesheet" type="text/css" href="css/login.css"/>
</head>
<body>

<div style="background-color:#abc;width:450px; height:300px;margin-left:35%;margin-top:9%;"id="logo1">
<!-- <h1><img  src="images/Log1.png" width="75" height="67" />马上登陆！！！</h1> -->
<!-- <h1 id="h"> 马上成功！！</h1> -->
<p style="text-align:right; color: #0C0;"><a href="index.php" style="color:#ff0">返回首页</a>&nbsp;<a href="reg.php" style="color:#ff0">注册</a></p>
<form action="checklogin.php" method="post"> 
  <p style="margin-top:20%;margin-right:20%">用户名：
    <input name="username1" type="text" id="username1" style="width:150;"/>
  </p >
  <p >
    密&nbsp;&nbsp;码：
      <input name="password1" type="password" id="password" style="width:150;"/>
  </p >
  <input name="ok"  type="submit" style="background: rgb(0, 142, 173); padding: 7px 10px; border-radius: 4px; border: 1px solid rgb(26, 117, 152); border-image: none; color: rgb(255, 255, 255); font-weight: bold;
   margin-top:20%;margin-left:8%; " value="登录" id="ok" />
  <input name=""  type="reset"style="background: rgb(0, 142, 173); padding: 7px 10px; border-radius: 4px; border: 1px solid rgb(26, 117, 152); border-image: none; color: rgb(255, 255, 255); font-weight: bold;" value="重置" />
</form>
</div>
</body>
</html>
