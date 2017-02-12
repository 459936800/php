<?php
session_start();
include 'conn.php';	
include 'guanggao.php'
?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" type="text/css" href="css/header.css" />
<script language="javascript">
function ssyz(fom){
if(fom.ss.value==''){
alert('股票代码不能为空！！！');
fom.ss.select();
return false;
}
}
</script>
<div id="header">

<div id="login">
<p> <span class="p1"><a style="margin-right:5px;"></a>
<?php 
if(isset($_SESSION['username1'])){echo $_SESSION['username1'].'用户-><a href=user.php?userid='.$_SESSION['username1'].'>用户管理</a>';}else{echo "<a href='login.php'><img  src='images/login1.gif' />登陆 <a href='reg.php'><img  src='images/login1.gif' />注册";}?></span><span class="p2"><a href="http://www.eastmoney.com/"  onclick="setHomepage('http://localhost/');"><img  src='images/login1.gif' />东方财富网</a><a href="http://www.10jqka.com.cn/"  onclick="addFavorite(this.href, '股票开户网');return false;"><img  src='images/login1.gif' />同花顺</a></span><script type="text/javascript">var _speedMark = new Date();</script><a href="">
<?php 
// if(isset($_SESSION['islogin'])){
if(isset($_SESSION['username1'])){
	echo "<img  src='images/login2.gif'style='margin-left:5px;' /><a href='quitlogin.php?id=1'>注销</a>";
// }
}

?></a></span></a> </p>
</div>
<div id="logo">
<h1>股票开户网站</h1>
</div>
<form method="post" name="form1"action="search.php" method="post" style="background-color:#09F; width:300px; height:30px; margin:20px 30px 0px 0px; padding-top:10px; float:right; padding-left:10px;">
股票
<input name="search" type="text" value="请输入的股票代码" onFocus="if(value==defaultValue){value='';this.style.color='#000'}" onBlur="if(!value){value=defaultValue;this.style.color='#999'}" style="color:#999999"/>
<input name="ok"  type="submit"  value="确定" />
</form>
</div>
<div id="nav" >
<ul>
<li><a href="index.php">首页</a></li>
<li><a href="news.php">财经消息</a></li>

<li><a href="gupiao.php">股票详情</a></li> 
 <li><a href="kxian.php">K线练习</a></li> 
</ul>
</div>


<DIV id="scrollobj" style="white-space:nowrap;overflow:hidden;width:100%; border-top:1px solid #000;border-bottom:1px solid #000" onmouseover="aa()" onmouseout="b()" >
<span id="mag1">道琼斯</span> 18115.84 <span id="mag2">↑180.1 ↑1.00%</span>
<span id="mag1">纳斯达克</span> 5132.95<span id="mag2"> ↑68.07 ↑1.34%</span>
<span id="mag1">日经指数</span> 20112.17 <span id="mag2">↑121.35 ↑0.61%</span>
<span id="mag1">香港恒指</span> 26694.66 <span id="mag3">↓-59.13 ↓-0.22%</span>
<span id="mag1">德DAX </span>11100.3 <span id="mag2">↑122.29 ↑1.11%</span>
<span id="mag1">法CAC </span>4803.48 <span id="mag2">↑12.86 ↑0.27%</span>
<span id="mag1">奥ATX</span> 2443.4 <span id="mag2">↑14.68 ↑0.60%</span>
</DIV>
<script language="javascript" type="text/javascript">
<!--
	function scroll(obj) {
		var tmp = (obj.scrollLeft)++;
		//当滚动条到达右边顶端时
		if (obj.scrollLeft==tmp) obj.innerHTML += obj.innerHTML;
		//当滚动条滚动了初始内容的宽度时滚动条回到最左端
		if (obj.scrollLeft>=obj.firstChild.offsetWidth) obj.scrollLeft=0;
	}
	var a =	setInterval("scroll(document.getElementById('scrollobj'))",20);
	function aa(){
		clearInterval(a);
	}
	function b(){
		a=setInterval("scroll(document.getElementById('scrollobj'))",10);
	}
//-->
</script>