<?php
session_start();
header("content-type:text/html;charset=utf-8");

//if (empty($_POST)) {
//    echo "yes";
//} else {
//    var_dump($_SESSION);
//    if ($_POST['authCode'] == $_SESSION['Code1NJ']) {
//        echo "123";
//    }
//}
	if(isset($_POST['login'])){
		$user = $_POST['username'];
		$pwd = $_POST['password'];
		$pwd = md5($pwd);
		$authCode=$_POST['authCode'];
        if(empty($authCode)) {
            echo "<script>alert('请输入验证码！');window.location='login.php';</script>";
            exit;
        }
		if(empty($user) || empty($pwd)){
			echo "<script>alert('用户名或密码不为空！');window.location='login.php';</script>";
			exit;
		}else{
			$link = mysqli_connect("localhost","root","","file_job");
			if(!$link){
				exit("数据库连接错误:".mysqli_connect_error());
			}
			//sql语句书写
			$sql = "select * from users where username='$user' and password = '$pwd'";
			//发送sql语句给服务器执行,返回结果集
			$result = @mysqli_query($link,$sql) or exit(mysqli_error($link));
			//从结果中获取记录数
			$num = mysqli_num_rows($result);
			//判断输出提示
			/* while($row = mysqli_fetch_assoc($result)){
				echo $row["username"]."<br>";
			} */
			if($num){
				$_SESSION["user"] = $user;
				$_SESSION["rand"] = md5(time());
				echo "<script>alert('欢迎登陆！');window.location='index.php';</script>";
			}else{
				echo "<script>alert('用户名或密码不正确！');window.location='login.php';</script>";
			}
		}
	}
?>