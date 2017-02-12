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


<form action="postsave.php" method="post" name="form2" id="form2" onSubmit="return check()">

<input type="hidden" name="content2">
<table width="800" >

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



</table>
</form>
    </body>
    </html>