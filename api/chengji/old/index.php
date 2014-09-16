﻿
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>OUR Studio, 学生成绩查询系统</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="OUR Studio, 学生成绩查询系统">
  <meta name="author" content="YANSON">

	<!--link rel="stylesheet/less" href="less/bootstrap.less" type="text/css" /-->
	<!--link rel="stylesheet/less" href="less/responsive.less" type="text/css" /-->
	<!--script src="js/less-1.3.3.min.js"></script-->
	<!--append ‘#!watch’ to the browser URL, then refresh the page. -->
	
	<link href="css/bootstrap.min.css" rel="stylesheet">
	<link href="css/bootstrap-responsive.min.css" rel="stylesheet">
	<link href="css/style.css" rel="stylesheet">

  <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
  <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
  <![endif]-->

  <!-- Fav and touch icons -->
  <link rel="apple-touch-icon-precomposed" sizes="144x144" href="img/apple-touch-icon-144-precomposed.png">
  <link rel="apple-touch-icon-precomposed" sizes="114x114" href="img/apple-touch-icon-114-precomposed.png">
  <link rel="apple-touch-icon-precomposed" sizes="72x72" href="img/apple-touch-icon-72-precomposed.png">
  <link rel="apple-touch-icon-precomposed" href="img/apple-touch-icon-57-precomposed.png">
  <link rel="shortcut icon" href="img/fa.png">
  
	<script type="text/javascript" src="js/jquery.min.js"></script>
	<script type="text/javascript" src="js/bootstrap.min.js"></script>
	<script type="text/javascript" src="js/scripts.js"></script>
	<!--script type="text/javascript" src="js/alert.js"></script>
	<script type="text/javascript" src="js/jquery.blockUI.js"></script-->
	<script type="text/javascript" src="js/fancybox/lib/jquery-1.9.0.min.js"></script>
	<script type="text/javascript" src="js/fancybox/source/jquery.fancybox.css?v=2.1.4"></script>
	<script type="text/javascript" src="js/fancybox/source/jquery.fancybox.js?v=2.1.4"></script>
	<script type="text/javascript" src="js/fancybox/source/jquery.fancybox.ready.js"></script>
	
</head>

<body>
<div class="container-fluid">

	<div class="row-fluid">
		<div class="span12">
			<div class="page-header">
				<h1>
					OUR Studio <span>学生成绩查询系统</span>
				</h1>
				<span class="label"  class="fancybox" >开发者</span><h7>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Yanson&nbsp;&nbsp;Anywill</h7>
			</div>
			<div class="alert alert-error">
				 <button type="button" class="close" data-dismiss="alert">×</button>
				<h1>
					提示!
				</h1> <h4><strong>警告!</strong> 本系统纯属为方便广药学生而制作，非官方，低调传播，不然...你懂的</h4>
			</div>
		</div>
	</div>
	<div class="row-fluid">
	<div class="span4">
		
		</div>
		<div class="span4">
			
			<!--form class="form-horizontal" action="" method="post"-->
			<form class="form-inline" action="chengji.php" method="post">
				<div class="control-group">
					<label class="control-label" for="xh">学号</label>
					<div class="controls">
						<input id="xh" name="xh" type="text" />
					</div>
				</div>
				<div class="control-group">
					<label class="control-label" for="pw">密码</label>
					<div class="controls">
						<input id="pw" name="pw" type="password" />
					</div>
				</div>
				<div class="control-group">
					<div class="controls">
						<button class="btn btn-primary btn-large"  onkeydown='if(event.keyCode==13){gosubmit();}' type="submit">查询</button>
					</div>
				</div>
			</form>
			
		</div>
		
		<div class="span4">
		<blockquote>
				<p>
					查询人信息
				</p> <p><small></br><?php echo get_personinfo($_POST['xh'],$_POST['pw']);?></small></p>
			</blockquote>
		</div>				
  </div>
  <div class="row-fluid">
		<div class="span12">
		<?php echo get_chengji($_POST['xh'],$_POST['pw']);?>
		</div>
	</div>
</div>
</body>
</html>


		

<?php
function get_utf8_string($content) 
	{    	  
		$encoding = mb_detect_encoding($content, array('ASCII','UTF-8','GB2312','GBK','BIG5'));  
		return  mb_convert_encoding($content, 'utf-8', $encoding);
	}
function get_personinfo($xh,$pw) 
	{    	  
		$per_info_url='http://10.5.20.40/chengji/personinfo.php?xh='.$xh.'&pw='.$pw;
		$ret_personinfo=file_get_contents($per_info_url);
		return $ret_personinfo;
		
	}
	
function get_chengji($xh,$pw) 
	{    	  
		$per_info_url='http://10.50.25.6/chengji/chengjiapi.php?xh='.$xh.'&pw='.$pw;
		$ret_personinfo=file_get_contents($per_info_url);
		return $ret_personinfo;
		
	}
	
?>