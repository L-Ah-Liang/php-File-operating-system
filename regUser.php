<!DOCTYPE html>
<html lang="zh">
<head>
	<meta charset="UTF-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<meta http-equiv="X-UA-Compatible" content="ie=edge" />
	<title>用户注册</title>
	<link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css">
	<script src="bootstrap/js/bootstrap.min.js"></script>
	<script src="bootstrap/js/check.js"></script>
    <style>
        .large{
            width: 100%;
            height: 100%;
            position: fixed;
            left: 0;
            top: 0;
            z-index: -1;
        }
        .large img{
            width: 100%;
            height: 100%;
            /*opacity: .8;*/
            -webkit-filter: blur(3px);
        }
    </style>
</head>
<body>
<div class="large">
    <img src="img/oliver-thomas-klein.jpg" alt="">
</div>
<div class="panel panel-default" style="width:600px; height:300px; margin:100px auto;">
  <div class="panel-heading">用户注册</div>
  <div class="panel-body">
    <form  name="form1"  id="form1" class="form-horizontal" action="regsuccess.php" method="post">
      <div class="form-group">
        <label for="fileName" class="col-sm-2 control-label">用户</label>
        <div class="col-sm-9">
          <input type="text" class="form-control" id="username" name="username" placeholder="请输入用户名" onblur="checkUser(this.value)">
        </div>
      </div>
	  <div class="form-group">
	    <label for="password" class="col-sm-2 control-label">密码</label>
	    <div class="col-sm-9">
	      <input type="password" class="form-control" id="password" name="password" placeholder="请输入密码">
	    </div>
	  </div>
	  
	  <div class="form-group">
	    <label for="cfm" class="col-sm-2 control-label">确认密码</label>
	    <div class="col-sm-9">
	      <input type="password" class="form-control" id="cfm" name="cfm" placeholder="请输入密码">
	    </div>
	  </div>
	  
	  <div class="form-group">
	    <label for="mail" class="col-sm-2 control-label">邮箱</label>
	    <div class="col-sm-9">
	      <input type="text" class="form-control" id="mail" name="mail" placeholder="请输入邮箱">
	    </div>
	  </div>
	  <div class="form-group">
	    <div class="col-sm-offset-4 col-sm-10">
	    	<button type="submit" name="login" class="btn btn-primary btn-sm">注册用户</button>
            <a href="login.php" class="btn btn-success btn-sm" style="margin-left: 20px">去登录</a>
	    </div>
	  </div>
    </form>
  </div>
</div>
<div id="showErr" class="panel panel-default" style="width:400px; height:100px; margin:100px auto; display:none;">
	<div class="panel-body">
		<span id="Err"></span>
	</div>
</div>
</body>
</html>

