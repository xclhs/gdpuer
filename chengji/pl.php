﻿<center><font color=red><h1>成绩批量查询</h1></font></center>
<br>
<center>
<form action="" method="post" >
<lable>开始学号</lable>
<input id="begin" name="begin" type="text" />
<lable>结束学号</lable>
<input id="end" name="end" type="text" />
<lable>成绩区间</lable>
<select id='mode' name='mode'>
  <option value ="nf">最新学年度</option>
  <option value ="all">全部</option>
</select>
<button onkeydown='if(event.keyCode==13){gosubmit();}' type="submit">查询</button>
</br></br>

<dl><dt><font color=red>注意：</dt></font><!--dd>开始学号必须小于结束学号，他们之差不能大于65</dd--><dd>只能查询密码与学号一致的同学成绩</dd></dl>
</br></br>

<?php
$mode=@$_REQUEST['mode'];
$begin=@$_REQUEST['begin'];
$end=@$_REQUEST['end'];
echo '开始学号-----'.$begin.'<br>结束学号------'.$end.'<br>';
echo '模式-----';
if($mode=='nf') echo '最新学年度成绩<br><br>';
if($mode=='all') echo '全部成绩<br><br>';
?>
</center>
<?php
$id=$begin;
if(($begin)&&(!$end)) echo '<center><font color=red><h1>请输入结束学号</h1></font></center>';
if((!$begin)&&($end)) echo '<center><font color=red><h1>请输入开始学号</h1></font></center>';
if((!$begin)&&(!$end)) echo '<center><font color=red><h1>请输入开始学号和结束学号</h1></font></center>';
if(($begin)&&($end)){
if($begin>$end) echo '<center><font color=red><h1>你踏马的逗我啊，开始比结束还大？</h1></font></center>';
if($begin<=$end){
$ret=$end-$begin;
if($ret>65) {echo '<center><font color=red><h1>一个班不超过65人吧？</font></center>';}
else{
while(($id>=$begin)&&($id<=$end))
{
echo "学号\t\t<font color=red>".$id.'</font><br><br>';
//http://zlgc.gdpu.edu.cn/chengji/jwcapi.php?xh='.$xh.'&pw='.$pw.'&flag=2
?>

<iframe frameborder='0' name='cj' height='50%' width='100%' src="http://ours.123nat.com:59832/jwc/bl.wx.chengji.api.php?xh=<?php echo $id; ?>&pw=<?php echo $id; ?>&mode=<?php echo $mode; ?>">
</iframe>
<br><br>
<HR color=blue>
<?php
$id=$id+1;

}
if($id>$end)
{
die();
}
}
}
}
?>
