<!DOCTYPE html>
<html lang="zh">
<head>
	<meta charset="UTF-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<meta http-equiv="X-UA-Compatible" content="ie=edge" />
	<title>用户登陆</title>
	<link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css">
    <style>
        #authCode{
            width: 100px;
            float: left;
        }
        #imgcode{
            display: inline-block;
            margin: 4px 0px 0px 20px;
            float: left;
        }
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
	<script src="bootstrap/js/bootstrap.min.js"></script>
	<script src="bootstrap/js/check.js"></script>
</head>

<body>
<div class="large">
    <img src="img/luca-bravo-2.jpg" alt="">
</div>
<div class="panel panel-default" style="width:500px; height:250px; margin:100px auto;">
  <div class="panel-heading">用户登陆</div>
  <div class="panel-body">
    <form  name="form1"  id="form1" class="form-horizontal" action="loginsuccess.php" method="post">
      <div class="form-group">
        <label for="fileName" class="col-sm-2 control-label">用户</label>
        <div class="col-sm-9">
          <input type="text" class="form-control" id="username" name="username" placeholder="请输入用户名">
        </div>
      </div>
	  <div class="form-group">
	    <label for="password" class="col-sm-2 control-label">密码</label>
	    <div class="col-sm-9">
	      <input type="password" class="form-control" id="password" name="password" placeholder="请输入密码">
	    </div>
	  </div>
        <div class="form-group">
            <label for="authCode" class="col-sm-2 control-label">验证码:</label>
            <div class="col-sm-9" >
                <input type="text" class="form-control" id="authCode" name="authCode" placeholder="输入验证码">
                <img src="module/authCode.php" id="imgcode" alt="验证码" onclick="this.src='module/authCode.php'">
            </div>
        </div>

	  <div class="form-group">
	    <div class="col-sm-offset-3 col-sm-10">
	    	<button type="submit" name="login" class="btn btn-primary btn-sm" style="margin-left: 30px">登陆</button>
			<a href="regUser.php" class="btn btn-success btn-sm" style="margin-left:20px; text-align: center">注册用户</a>
	    </div>
	  </div>
    </form>
  </div>
</div>
</body>
</html>

