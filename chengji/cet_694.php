<head>
  <meta charset="utf-8">
  <title>46级学号查询系统 By Yanson From OUR Studio</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="OUR Studio, 学生选修查询系统">
  <meta name="author" content="YANSON">

</head>
<form class="form-inline" action="" method="post">
<label>学号</label>
<input id="nj_input" name="nj_input" type="text" />
<label>条数</label>
<input id="num" name="num" type="text" />
<button   onkeydown='if(event.keyCode==13){gosubmit();}' type="submit">查询</button>
</form>
<?php
header("content-Type: text/html; charset=utf-8");


	   $dbname = 'fPbhUckfqXdcQiuSglFR';//这里填写你BAE数据库的名称
 
       /*从环境变量里取出数据库连接需要的参数*/
       $host = "localhost";
       $port = "80";
       $user = "gdpuer";
       $pwd = "ourstudio";
 
       /*接着调用mysql_connect()连接服务器*/
       $link = @mysql_connect("{$host}:{$port}",$user,$pwd,true);
       if(!$link) {
                   die("Connect Server Failed: " . mysql_error($link));
                  }
       /*连接成功后立即调用mysql_select_db()选中需要连接的数据库*/
       if(!mysql_select_db($dbname,$link)) {
                   die("Select Database Failed: " . mysql_error($link));
                  }
//以上连接数据库

$nj_input=$_REQUEST['nj_input'];
$perNumber=$_REQUEST['num'];
if(!$perNumber){$perNumber=30; }//每页显示的记录数
if(!$nj_input){$nj_input='学号';}

$page=$_GET['page']; //获得当前的页面值
$count=mysql_query("select count(*) from `132cetno` WHERE `学号` like '%$nj_input%'"); //获得记录总数
$rs=mysql_fetch_array($count); 
$totalNumber=$rs[0];
echo '共有'.$totalNumber.'条记录<br><br>';
$totalPage=ceil($totalNumber/$perNumber); //计算出总页数
if (!isset($page)) {
 $page=1;
} //如果没有值,则赋值1
$startCount=($page-1)*$perNumber; //分页开始,根据此方法计算出开始的记录

if ($page != 1) { //页数不等于1
?>
<a href="nj_694.php?num=<?php echo $perNumber ;?>&nj_input=<?php echo $nj_input ;?>&page=<?php echo $page - 1;?>">上一页</a> <!--显示上一页-->
<?php
}
for ($i=1;$i<=$totalPage;$i++) {  //循环显示出页面
?>
<a href="nj_694.php?num=<?php echo $perNumber ;?>&nj_input=<?php echo $nj_input ;?>&page=<?php echo $i;?>"><?php echo $i ;?></a>
<?php
}
if ($page<$totalPage) { //如果page小于总页数,显示下一页链接
?>
<a href="nj_694.php?num=<?php echo $perNumber ;?>&nj_input=<?php echo $nj_input ;?>&page=<?php echo $page + 1;?>">下一页</a>
<?php
}
echo '<br><br><br>';

$sql_name = "SELECT * FROM `132cetno` WHERE `学号` like '%$nj_input%' limit $startCount,$perNumber";
$query_char=mysql_query("SET NAMES UTF8");
$query_name=mysql_query($sql_name,$link) or die(mysql_error());
while($name_ret=mysql_fetch_row($query_name)){
$xh=$name_ret[0];
$jb=$name_ret[1];
$xq=$name_ret[2];
$yx=$name_ret[3];
$bj=$name_ret[4];
$xh=$name_ret[5];
$xm=$name_ret[6];  
$zkz=$name_ret[7];

  //echo $xh.'<br>'.$pw.'<br>'.$name.'<br>'.$nj.'<br><br>';
  
  
$ret="<br>级别----<font color=blue>".$jb."</font><br>校区----<font color=blue>".$xq."</font><br>院系名称 ----<font color=blue>".$yx."</font><br>班级名称----<font color=blue>".$bj."</font><br>学号----<font color=blue>".$xh."</font><br>姓名----<font color=blue>".$xm."</font><br>准考证号----<font color=blue>".$zkz."</font><br><br>";
 echo $ret;  
  
  
  $cet=get_ours_cet($zkz,$xm);
  echo get_utf8_string($cet);

echo "<br><br>";

?>
<script type="text/javascript">
var _bdhmProtocol = (("https:" == document.location.protocol) ? " https://" : " http://");
document.write(unescape("%3Cscript src='" + _bdhmProtocol + "hm.baidu.com/h.js%3Fc8c6b4ac78fb9378987b263d5babdb1a' type='text/javascript'%3E%3C/script%3E"));
</script>

<!--iframe frameborder='0' name='xx' height='50%' width='100%' src="http://yanson.duapp.com/chengji/xuanxiu_chaxun_y_694.php?xh=<?php echo $xh; ?>&pw=<?php echo $pw; ?>">
</iframe-->
<!--iframe frameborder='0' name='xx' height='50%' width='100%' src="http://ourstudio.duapp.com/api/ours/cet.php?zkzh=<?php echo $zkz; ?>&xm=<?php echo $xm; ?>">
</iframe-->





<?php 
}
if ($page != 1) { //页数不等于1
?>
<a href="xm_694.php?num=<?php echo $perNumber ;?>&nj_input=<?php echo $nj_input ;?>&page=<?php echo $page - 1;?>">上一页</a> <!--显示上一页-->
<?php
}
for ($i=1;$i<=$totalPage;$i++) {  //循环显示出页面
?>
<a href="xm_694.php?num=<?php echo $perNumber ;?>&nj_input=<?php echo $nj_input ;?>&page=<?php echo $i;?>"><?php echo $i ;?></a>
<?php
}
if ($page<$totalPage) { //如果page小于总页数,显示下一页链接
?>
<a href="xm_694.php?num=<?php echo $perNumber ;?>&nj_input=<?php echo $nj_input ;?>&page=<?php echo $page + 1;?>">下一页</a>
<?php
} 
function get_utf8_string($content) 
{    
	//  将一些字符转化成utf8格式   
	$encoding = mb_detect_encoding($content, array('ASCII','UTF-8','GB2312','GBK','BIG5'));  
	return  mb_convert_encoding($content, 'utf-8', $encoding);
}

//查四六级  
function get_ours_cet($zkzh,$xm)
	{    				
        $url = 'http://ours.123nat.com:59832/api/ours/cet.php?zkzh='.$zkzh.'&xm='.$xm;		
		$result= file_get_contents($url);
		return $result;   
	}

?>
