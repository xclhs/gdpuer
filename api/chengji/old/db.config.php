<?php{      $dbname = 'jwc';//这里填写数据库的名称        /*从环境变量里取出数据库连接需要的参数*/       $host = '10.5.20.40';       $port ='3306' ;//端口号       $user = 'yanson';       $pwd = '54694';        /*接着调用mysql_connect()连接服务器*/       $link = @mysql_connect("{$host}:{$port}",$user,$pwd,true);       if(!$link) {                   die("连接JWC错误..." . mysql_error($link));                  }       /*连接成功后立即调用mysql_select_db()选中需要连接的数据库*/       if(!mysql_select_db($dbname,$link)) {                   die("连接17.2错误..."" . mysql_error($link));                  }//以上连接数据库}?>