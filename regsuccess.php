<?php
header("content-type:text/html;charset=utf-8");
if(isset($_POST['cfm'])){
	$user = $_POST['username'];
	$password = $_POST['password'];
	$cfm = $_POST['cfm'];
	$mail = $_POST['mail'];
	if(empty($user)){
		echo "<script>alert('用户名不能为空！');window.location='regUser.php';</script>";
		exit;
	}
	if(empty($password)){
		echo "<script>alert('密码不能为空！');window.location='regUser.php';</script>";
		exit;
	}
	if(empty($cfm)){
		echo "<script>alert('确认密码不能为空！');window.location='regUser.php';</script>";
		exit;
	}
	if(empty($mail)){
		echo "<script>alert('邮箱不能为空！');window.location='regUser.php';</script>";
		exit;
	}
	if($password != $cfm){
		echo "<script>alert('密码与确认密码不一致！');window.location='regUser.php';</script>";
		exit;
	}
	//邮箱的正则
	$pattern ="/[\w]+@[\w]+\.[a-zA-Z]{2,4}/";
	if(!preg_match($pattern,$mail)){
		echo "<script>alert('邮箱格式不正确！');window.location='regUser.php';</script>";
		exit;
	}
	
	$link = @mysqli_connect("localhost","root","","file_job");
	if(!$link){
		exit("数据库连接错误:".mysqli_connect_error());
	}
	//设置输入字符的字符串
	mysqli_query($link,"set names 'UTF8'");
	//设置添加的sql语句
	$pwd = md5($password);
	//判断改用户名是否存在,如果存在,则不能添加该用户名.
	$sqlQuery = "select * from users where username='$user'";
	$result = @mysqli_query($link,$sqlQuery) or exit(mysqli_error($link));
	$num = mysqli_num_rows($result);
	if(!$num){
		$sql = "insert into users(username,password,mail) values('$user','$password','$mail')";
		//发送sql语句,执行,返回结果
		$result = @mysqli_query($link,$sqlQuery) or exit(mysqli_error($link));
		//获取本次操作受影响的行数
		$count = mysqli_affected_rows($link);
		
		if($result && $count){
			echo "<script>alert('注册成功，返回登陆！');window.location='login.php';</script>";
		}else{
			echo "<script>alert('注册失败，返回注册！');window.location='regUser.php';</script>";
		}
	}else{
		echo "<script>alert('该用户名已经被使用，返回注册！');window.location='regUser.php';</script>";
	}
	
}
?>