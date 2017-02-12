<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<title>股票用户注册</title>
<link rel="stylesheet" type="text/css" href="css/regsiter.css" />
<script src="js/zcyz2.js"></script>
<script src="js/jquery-1.11.3.js"></script>
</head>

<script language="javascript">
$(function(){ 
    //数字验证 
    $("#getcode_num").click(function(){ 
        $(this).attr("src",'codenum.php?' + Math.random()); 
    }); 
    
}); 

$("#chk_num").click(function(){
	var code_num = $("#code_num").val();
	$.post("chk_code.php?act=num",{code:code_num},function(msg){
		if(msg==1){
			alert("验证码正确！");
		}else{
			alert("验证码错误！");
		}
	});
});


function check(fom){
	if(fom.passportid.value==''){
			document.getElementById("passname").innerHTML="<img src='images/wrong1.gif'></img><font color='red'>不能为空</font>";
		return false;
		}
	if(fom.password.value==''){
			document.getElementById("passwname").innerHTML="<img src='images/wrong1.gif'></img><font color='red'>不能为空</font>";
		return false;
		}
	if(fom.confirm_password.value==''){
			document.getElementById("passname2").innerHTML="<img src='images/wrong1.gif'></img><font color='red'>不能为空</font>";
		return false;
		}
	if(fom.mobile.value==''){
			document.getElementById("dh").innerHTML="<img src='images/wrong1.gif'></img><font color='red'>不能为空</font>";
		return false;
		}else{
			document.getElementById("dh").innerHTML="<img src='images/right1.gif'></img>";
			}
	if(fom.mail.value==''){
			document.getElementById("mailname").innerHTML="<img src='images/wrong1.gif'></img><font color='red'>不能为空</font>";
		return false;
		}
	if(fom.company.value==''){
			document.getElementById("dz").innerHTML="<img src='images/wrong1.gif'></img><font color='red'>不能为空</font>";
		return false;
		}else{
			document.getElementById("dh").innerHTML="<img src='images/right1.gif'></img>";
			}
		
}
</script>
<body style="background-image: URL(images/bbg.jpg)">



<div id="content">
<form  action="addregsiter.php" method="post" style="background:url(images/bg.gif) no-repeat;" id="register" name="user_register_form"  
 onsubmit="return check(this);">
     <h1><br/>用户注册</h1>
      <ul>
        <li style=" font-size:12px;"><a href="index.php"><font style=" color:#02F;">返回主页</font></a></li>
        <li style=" font-size:12px;"><a href="login.php"><font style=" color:#02F;">登录界面</font></a></li>
            <li style="margin-left:480px; font-size:12px;">以下<font style=" color:#F00;">*</font>为必填项</li>

         
  </ul>
    <table width="571" border="0" id="table2" >
        <tr>
          <td width="80" height="49"><font color="#FF0000">*</font>帐号：</td>
          <td width="166"><input type="text" name="passportid" maxlength="20" value="" id="passport" onfocus="javascript:checknames();" onkeyup="javascript:checkname();"/></td>
          <td width="321" style="color:#FF0000; text-align:left; padding-left:5px;" id="passname"><font color="#000000";><img src="images/logintb.jpg" style="padding-right:5px;" />以字母开头，4-20位字母或数字, 请写常用方便您记忆</font></td>
        </tr>
        <tr>
          <td height="49"><font color="#FF0000">*</font>登录密码：</td>
          <td><input  type="password" name="password" maxlength="20" id="pwd" onfocus="javascript:checkpasswords();" onblur="javascript:checkpasswordss(this.value);" onkeyup="chkpwd(this)" /></td>
          <td style=" text-align:left; color:#FF0000; padding-left:5px;" id="passwname"><font color="#000000";><img src="images/logintb.jpg" style="padding-right:5px;" />请输入6-20位英文字母、数字或符号，区分大小写建议采用易记的英文数字组合</font></td>
        </tr>
        <tr>
          <td height="61"><font color="#FF0000">*</font>确认密码：</td>
          <td><input type="password" name="confirm_password" maxlength="20" id="pwd2" onfocus="javascript:checkpasswords2();" onblur="javascript:checkpassword2(this.value);" /></td>
          <td style=" text-align:left; color:#FF0000; padding-left:5px;" id="passname2"><font color="#000000";><img src="images/logintb.jpg" style="padding-right:5px;" />必需与设置密码一致</font></td>
        </tr>
        <tr>
          <td height="49"><font color="#FF0000">*</font>联系电话：</td>
          <td><input type="text" name="Phone" maxlength="20" value="" id="register_mobile"   onblur="abc()"onkeyup="this.value=this.value.replace(/\D/g,'')" onafterpaste="this.value=this.value.replace(/\D/g,'')"/></td>
          <td  style=" text-align:left; padding-left:5px; color:#FF0000;" id="dh"><font color="#000000";><img src="images/logintb.jpg" style="padding-right:5px;" />必须是数字,长度为11位</font></td>
        </tr>
        <tr>
          <td height="49"><font color="#FF0000">*</font>验 证 码：</td>
          <td><input type="text" name="captcha" value="" id="captcha" />
            </td>
          <td style="text-align:left;" id="resets"><img src="codenum.php" id="getcode_num" title="看不清，点击换一张" /></td>
        </tr>
        <tr>
          <td height="55" width="80"></td>
          <td>&nbsp&nbsp&nbsp<input type="submit" name="ok" id="ok" value="注册" style=" width:128px; height:30px; border:1px;background-image: URL(images/regbtm.png)" /></td>
          <td></td>
        </tr>
    </table>
</form>
</div>

</body>
</html>
