<html>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<body>


<p>一些老的浏览器不支持 iframe。</p>
<p>如果得不到支持，iframe 是不可见的。</p>
<?php
$url = 'http://localhost:8075/WebReport/ReportServer?reportlet=FEE%2FCommon%2FCommonFee.cpt&op=write';//你的网址，具体自己写
?>
<iframe src="<?php echo  $url?>" width="1200" height="1000" align="middle"></iframe>
12

</body>
</html>

