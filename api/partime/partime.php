<?php 
$url = 'http://blog.sina.com.cn/s/articlelist_1991248877_1_1.html';
$result= file_get_contents($url);
$match_href='/<a title=(.*?)<\/a>/';
$match_id='/href="http:\/\/blog.sina.com.cn\/s\/(.*?)\.html"/';
preg_match_all($match_href,$result,$href);
$str='';
foreach($href[0] as $key=>$value){
  if($key<9){
     $title=str_replace('&nbsp;','',strip_tags($value));
     preg_match_all($match_id,$value,$id);
     $str=$str.'@title|'.($key+1).'.'.$title.'#url|http://av.jejeso.com/helper/api/partime/item2.php?id='.$id[1][0].'#pic';
  }
}
 echo 'description|校园资讯#title|勤管兼职'.$str;
?>