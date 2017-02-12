<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />


 <script type="text/javascript" src="utf8-php/ueditor.config.js"></script>
    <!-- 编辑器源码文件-->
    <script type="text/javascript" src="utf8-php/ueditor.all.js"></script>
    <script type="text/javascript" charset="utf-8" src="utf8-php/lang/zh-cn/zh-cn.js"></script>
 <script type="text/javascript">
    
	function check(){
		 var title=document.getElementById("title").value;
		 var content=UE.getEditor('content').getContent();
	   if(title==""||title==null){
	     alert("请输入标题！");
		 document.getElementById("title").focus();
		 return false;
	   }
	   else if(content==""||content==null){
	       UE.getEditor('content').focus();
		   alert("请输入帖子内容！");
		   return false;
	   }
	  
	  // document.getElementById("content2").value=content;
	  // alert(document.getElementById("content2").value);
	  // document.getElementById("form2").submit();
	   return true;
	   
	}
  
 </script>
 
<title>发帖</title>
</head>
<body>

<?php
include 'header.php';

 
if(!isset($_SESSION['username1'])){
    echo "<script>alert('未登陆，不能发新帖，请登陆');</script>";
    echo "<script>location.href='login.php';</script>";
}
$typeid=$_GET["typeid"];

?>

<h1>请发帖</h1>
<h3><a  href=broad.php>返回</a></h3>

<form action="postsave.php" method="post" name="form2" id="form2" onSubmit="return check()">
<input  type="hidden" name="typeid" value="<?php echo $typeid; ?>"/>
<input type="hidden" name="content2">
<table width="800" align="center">

<tr>
<td>标题*</td><td><input style="width:300px" name="title" id="title" type="text" maxlength="220"></td>
</tr>
<tr><td colspan="2">帖子内容：</td>
</tr>
<tr>
<td height="400" width="400" colspan="2" valign="top">
<script id="content" name="content" type="text/plain">
         
</script>
  
    <!--实例化编辑器 -->
    <script type="text/javascript" id="myEditor" style="width:500px;height:500px">
    var ue = UE.getEditor('content',{
        initialFrameWidth : 800,
        initialFrameHeight: 400
    });        
    </script>
</td>
</tr>
<tr>
<td colspan="2"> <input name="ok" type="submit" value="发布" ></td>
</tr>


</table>
</form>
</body>
</html>