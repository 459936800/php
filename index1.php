
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<html>

<head>
<link rel="stylesheet" type="text/css" href="" />
<title>毕业设计</title>
<style>
body,ul,ol,li,p,h1,h2,h3,h4,h5,h6,form,fieldset,table,td,img,div,dl,dt,dd,input{margin:0;padding:0;}
body{font-size:12px;}
img{border:none;}
li{list-style:none;}
input,select,textarea{outline:none;}
textarea{resize:none;}
a{text-decoration:none;}

/*清浮动*/
.clearfix:after{content:"";display:block;clear:both;}
.clearfix{zoom:1;}
.banner{width:520px; height:280px; position:relative; overflow:hidden;}
.banner-btn{ display:none;}
.banner-btn a{ display:block; line-height:40px; position:absolute;top:120px; width:40px; height:40px;background-color: #000; opacity:0.3; filter:alpha(opacity=30) color: rgb(255, 255, 255);overflow: hidden; z-index:4;}
.prevBtn{left:5px;}
.nextBtn{right:5px;}
.banner-img{ font-size:0; *word-spacing:-1px;/* IE6、7 */ letter-spacing: -3px; position:relative;}
.banner-img li{ display:inline-block;*display:inline;*zoom:1;/* IE6、7 */ vertical-align: top; letter-spacing: normal;word-spacing: normal; font-size:12px;}
.banner i{ background:url(http://gtms01.alicdn.com/tps/i1/T1szNBFzlmXXX8QSDI-400-340.png)  no-repeat; width: 15px;height: 23px; cursor:pointer;margin: 8px 0 0 12px; display:block;}
.banner .nextBtn i{ background-position:-200px -24px;}
.banner .prevBtn i{ background-position:-200px 0px;}

.banner-circle{ position:absolute; left:50%; bottom: 15px;height: 13px;text-align: center;font-size: 0;border-radius: 10px; background:rgba(255,255,255,0.3); filter:alpha(opacity:30); }
.banner-circle li{ border-radius: 10px; margin:2px; display: inline-block; display: -moz-inline-stack; vertical-align: middle;zoom: 1; }
.banner-circle li a{ display: block;padding-top: 9px;width: 9px;height: 0;border-radius: 50%; background: #B7B7B7;overflow: hidden;}
.banner-circle .selected a{ background:#F40; }
</style>

<script src="js/jquery.min.js">
</script>

<script>
$(function(){
        var $banner=$('.banner');
        var $banner_ul=$('.banner-img');
        var $btn=$('.banner-btn');
        var $btn_a=$btn.find('a')
        var v_width=$banner.width();
        
        var page=1;
        
        var timer=null;
        var btnClass=null;

        var page_count=$banner_ul.find('li').length;//把这个值赋给小圆点的个数
        
        var banner_cir="<li class='selected' href='#'><a></a></li>";
        for(var i=1;i<page_count;i++){
                //动态添加小圆点
                banner_cir+="<li><a href='#'></a></li>";
                }
        $('.banner-circle').append(banner_cir);
        
        var cirLeft=$('.banner-circle').width()*(-0.5);
        $('.banner-circle').css({'marginLeft':cirLeft});
        
        $banner_ul.width(page_count*v_width);
        
        function move(obj,classname){
                //手动及自动播放
        if(!$banner_ul.is(':animated')){
                if(classname=='prevBtn'){
                        if(page==1){
                                        $banner_ul.animate({left:-v_width*(page_count-1)});
                                        page=page_count; 
                                        cirMove();
                        }
                        else{
                                        $banner_ul.animate({left:'+='+v_width},"slow");
                                        page--;
                                        cirMove();
                        }        
                }
                else{
                        if(page==page_count){
                                        $banner_ul.animate({left:0});
                                        page=1;
                                        cirMove();
                                }
                        else{
                                        $banner_ul.animate({left:'-='+v_width},"slow");
                                        page++;
                                        cirMove();
                                }
                        }
                }
        }
        
        function cirMove(){
                //检测page的值，使当前的page与selected的小圆点一致
                $('.banner-circle li').eq(page-1).addClass('selected')
                                                                                                .siblings().removeClass('selected');
        }
        
        $banner.mouseover(function(){
                $btn.css({'display':'block'});
                clearInterval(timer);
                                }).mouseout(function(){
                $btn.css({'display':'none'});                
                clearInterval(timer);
                timer=setInterval(move,3000);
                                }).trigger("mouseout");//激活自动播放

        $btn_a.mouseover(function(){
                //实现透明渐变，阻止冒泡
                        $(this).animate({opacity:0.6},'fast');
                        $btn.css({'display':'block'});
                         return false;
                }).mouseleave(function(){
                        $(this).animate({opacity:0.3},'fast');
                        $btn.css({'display':'none'});
                         return false;
                }).click(function(){
                        //手动点击清除计时器
                        btnClass=this.className;
                        clearInterval(timer);
                        timer=setInterval(move,3000);
                        move($(this),this.className);
                });
                
        $('.banner-circle li').live('click',function(){
                        var index=$('.banner-circle li').index(this);
                        $banner_ul.animate({left:-v_width*index},'slow');
                        page=index+1;
                        cirMove();
                });
});
</script>
<script>
var winWidth = document.body.scrollWidth -200;      // 取窗口宽度
var winHeight = document.body.scrollHeight - 100;    // 取窗口高度
if (winHeight <= 0) winHeight = 730;   // 初始高度并不总能取出，设默认值

var myDiv = document.createElement('div');   // 动态创建 div
myDiv.style.width = winWidth + 'px';        // 设置宽度
myDiv.style.height = winHeight + 'px';
myDiv.style.background=red;// 设置高度</script>
</head>

<body style="height:100%;margin-left:auto; margin-right:auto; background:#DFFFDF">
<div style="position:absolute;left:1%;top:30%;width:100px; height: 300px; border: 1px solid #D4CD49 ">123123123</div>
<div id="top" style="height:107px;width:100%;background:#c4EDff" >
<div></div>
</div>
<div id="body"  style="height:1200px;width:964px;margin-left:11%; margin-right:100; background:white">

<?php
$url = 'http://localhost:8075/WebReport/ReportServer?reportlet=FEE%2FCommon%2FCommonFee.cpt&op=write';//你的网址，具体自己写
?>
 <iframe  src="<?php echo  $url?>" frameborder =0 width="964" height="800" ></iframe>
 
</div>



 




</body>
</html>