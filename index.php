<?php
	include 'tpl/sess.php';
	include 'tpl/header.php';
	if (isset($_GET['path'])) {
		$path = $_GET['path'];
		//处理
		$arrPath = explode("/", $path);
		$count = count($arrPath);
		$returnPath = null;
		for ($i=0; $i <count($arrPath)-1 ; $i++) { 
			$returnPath .= $arrPath[$i]."/"; 
		}
		$returnPath = substr($returnPath,0,-1);
	}else{
		$path = "opercator";
		$count = 1;
	}
	$_SESSION["pos"] = $path;//获取当前地址
	?>
	<table class="table table-hover table-condensed table-bordered">
		<tr>
			<th>文件名
				<?php 
					if ($count > 1) 
					{
				?>
					<a href="?path=<?php echo $returnPath; ?>" >
						<span class="glyphicon glyphicon-upload" aria-hidden="true" aria-hidden="true"></span>
					</a>
				<?php
					}
				 ?>
			</th>
			<th>类型</th>
			<th>创建时间</th>
			<th>操作</th>	
		</tr>
	<?php
	if(is_dir($path)){
		$fd=@opendir($path);
		while($file=readdir($fd)){
			$newfile=$path.'/'.$file;
			$type=filetype($newfile);
			if($file!='.' and $file!='..'){
				?>
				<tr>
					<td>
						<?php 
							if($type=="file")
								{
									echo "<span class='glyphicon glyphicon-folder-close' aria-hidden='true'> </span> {$file}";}
								elseif($type=='dir'){
									echo "<span class='glyphicon glyphicon-folder-open' aria-hidden='true'> </span> <a href='?path={$newfile}'> {$file}</a> ";
								}
						?>
					</td>
					<td><?php 
						if($type=='dir'){
							echo '目录';
						}else{
							echo '文件';
						}
						?></td>
					<td><?php echo date('Y-m-d H:i:s', filectime($newfile));?></td>
					<td><a href="#" onclick="return del('<?php echo $newfile; ?>')" class="btn btn-primary btn-xs">删除</a>
					<?php
					if($type=='file'){
						?>
						<a href="showFile.php?path=<?php echo $newfile;?>" class="btn btn-primary btn-xs">编辑文件内容</a>		
				<?php
					}
				?>
				</td>
					
				</tr>
				<?php
			}
		}
	}
?></table>