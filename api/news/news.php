﻿<?php

$url='http://www.gdpu.edu.cn/news/xw/js.asp?BigClassName=%B9%E3%D2%A9%D0%C2%CE%C5&SmallClassName=&ArticleNum=13&ShowType=1&ShowCols=1&ShowProperty=false&ShowBigClassName=false&ShowSmallClassName=false&ShowIncludePic=false&ShowTitle=true&ShowUpdateTime=false&ShowHits=false&ShowAuthor=false&ShowHot=false&ShowMore=false&TitleMaxLen=&ContentMaxLen=&Hot=false&Elite=false&DateNum=&OrderField=UpdateTime&OrderType=desc&ImgWidth=180&ImgHeight=120';
$html=file_get_contents($url);
$newsid = '/ArticleID=(.*?) \' target=\'_blank\'>/is';
preg_match_all($newsid,$html,$ni);
$newstitle = '/target=\'_blank\'>(.*?)<\/a>/is';
preg_match_all($newstitle,$html,$tl);
$str='';
foreach($ni[1] as $key=>$value){
  if($key<9){
    $newstitle=str_replace('&nbsp;','',$tl[1][$key]);
    $str=$str.'@title|'.$newstitle.'#url|http://av.jejeso.com/helper/api/news/item.php?id='.$value.'#pic';
  }
}
$str=get_utf8_string($str);
echo 'description|信息资讯#title|广药新闻'.$str;
function get_utf8_string($content) 
{    	  
	$encoding = mb_detect_encoding($content, array('ASCII','UTF-8','GB2312','GBK','BIG5'));  
	return  mb_convert_encoding($content, 'utf-8', $encoding);
}
?>