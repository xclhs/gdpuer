<?php

	   $dbname = 'fPbhUckfqXdcQiuSglFR';//这里填写你BAE数据库的名称
 
       /*从环境变量里取出数据库连接需要的参数*/
       $host = "127.0.0.1";//getenv('HTTP_BAE_ENV_ADDR_SQL_IP')
       $port = "80";//getenv('HTTP_BAE_ENV_ADDR_SQL_PORT')
       $user = "gdpuer";//getenv('HTTP_BAE_ENV_AK')
       $pwd = "ourstudio";//getenv('HTTP_BAE_ENV_SK')
 
       /*接着调用mysql_connect()连接服务器*/
       $link = @mysql_connect("{$host}",$user,$pwd,true);
       if(!$link) {
                   die("Connect Server Failed: " . mysql_error($link));
                  }
       /*连接成功后立即调用mysql_select_db()选中需要连接的数据库*/
       if(!mysql_select_db($dbname,$link)) {
                   die("Select Database Failed: " . mysql_error($link));
                  }
//以上连接数据库
?>