<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php

// error_reporting(E_ALL ^ E_DEPRECATED);
// $link=mysql_connect('localhost','root','')or die('����ʧ�ܣ�'.mysql_error());
// mysql_select_db('tiezi',$link)or die('��ݿ�����ʧ�ܣ�'.mysql_error());;
// mysql_query('set names gb2312');
$mysqli = new mysqli("localhost", "cjj", "sjk123", "shopd");

if (mysqli_connect_errno($mysqli))
{
    echo "连接失败: " . mysqli_connect_error();
}

// echo "成功:";
$mysqli->set_charset('utf8');


?>