<!DOCTYPE html>
<html lang="zh">
<head>
	<meta charset="UTF-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<meta http-equiv="X-UA-Compatible" content="ie=edge" />
	<title>文件操作系统</title>
	<link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css">
  <script src="bootstrap/js/bootstrap.min.js"></script>
	<script src="bootstrap/js/check.js"></script>
</head>
<body>
	<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="index.php">文件操作</a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        
        <li><a href="#">上传文件</a></li>
        <li><a href="addFile.php">新建文件</a></li>
		<li><a href="addFolder.php">新建文件夹</a></li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
		 <li>
			 <a><?php
				if(isset($_SESSION["user"])){
					echo $_SESSION["user"];
				}
			 ?>，你好</a>
		 </li>
        <li><a href="exit.php">退出</a></li>
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>
</body>
</html>