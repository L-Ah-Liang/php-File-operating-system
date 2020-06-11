function del(path)
{
	if(confirm("删除文件"))
	{
		window.location.href='delFile.php?path='+path;
	}else{
		return false;
	}
}
function checkUser(user){
	var xmr=null;
	if(window.XMLHttpRequest){
		xmr = new XMLHttpRequest();
	}else{
		xmr = new ActiveXObject("Microsoft.XMLHttpRequest");
	}
	xmr.onreadystatechange = function(){
		if(xmr.readyState==4 && xmr.status == 200){
			$arr = array("info"=>"该用户已经被使用");
			var msg =JSON.parse(xmr.responseText);
			if(msg.t == "1"){
				document.getElementById("showErr").style.display="block";
				document.getElementById("Err").innerHTML =msg.info;
			}else if(msg.t == "2"){
				document.getElementById("showErr").style.display="none";
			}
		}
	}
	xmr.open("GET","queryUser.php?username="+user,true);
	xmr.send();
}