<?php 
	include 'tpl/header.php';
	include 'lib/fileStrip.php';
	//删除文件文件夹
	$path = $_GET["path"];
	//判断文件文件夹是否存在
	if(file_exists($path))
	{	//删除文件
		$arrPath = explode("/",$path);
		$returnPath = null;
		for ($i=0; $i <count($arrPath)-1 ; $i++) { 
			$returnPath .= $arrPath[$i]."/"; 
		}
		$returnPath = substr($returnPath,0,-1);
		if(filetype($path) == "file")
		{
			if(unlink($path))
			{
				echo "<script> alert('文件删除成功!');window.location='index.php?path={$returnPath}';</script>";
			}
			else
			{
				echo "<script> alert('文件删除失败!');window.location='index.php?path={$returnPath}';</script>";
			}
		}
		elseif(filetype($path) == "dir")
			{
				$res = delDir($path);
				if ($res) {
					echo "<script> alert('文件和目录删除成功!');window.location='index.php';</script>";
				}
				else{
					echo "<script> alert('文件和目录删除失败!');window.location='index.php';</script>";
				}
			}
	}else
	{
	?>
		<div class="alert alert-danger" role="alert">文件或文件夹不存在,<a href="index.php" class="btn btn-primary btn-xs">请返回！</a></div>
	<?php
	}
?>
							