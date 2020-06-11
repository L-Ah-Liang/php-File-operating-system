<?php
	session_start();
	if(isset($_SESSION["user"])){
		session_destroy();//删除服务器上的session
		setCookie(session_name(),'',-1,'/');//再删除客户端存储在cookies中的sessid
		header("location:login.php");
}
?>