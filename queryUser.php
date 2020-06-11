<?php
header("content-type:text/html;charset=utf-8;")
$user = $_GET["username"];
$link = @mysqli_connect("localhost","root","","file_job");
if(!$link){
	exit("数据库连接错误:".mysqli_connect_error());
}
$sql = "select * from users where username='$user'";
$result = @mysqli_query($link,$sql) or exit(mysqli_error($link));
$num = mysqli_num_rows($result);
if($num){
	$arr = array("info"=>"该用户已经被使用","t"=>"1");//关联数组
	$json = json_encode($arr);
	echo $json;
}else{
	$arr = array("info"=>"该用户可以使用","t"=>"2");
	$json = json_encode($arr);
	echo $json;
}
?>