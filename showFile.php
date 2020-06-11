<?php
	include 'tpl/header.php';
	$path= $_GET["path"];
	$arrPath=explode("/",$path);
	$pos = "";
	for($i=0;$i<count($arrPath)-1;$i++){
		$pos .=$arrPath[$i]."/";
	}
	$pos = trim($pos,"/");
	$str = file_get_contents($path);
?>
<form  name="form2" id="form2" class="form-horizontal" action="" method="post">
  <div class="form-group">
    <label for="fileName" class="col-sm-2 control-label">文件内容</label>
    <div class="col-sm-6">
    	<textarea name="content" class="form-control" rows="10"><?php echo $str;?></textarea>
    </div>
  </div>
  <div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
    	<button type="submit" name="addContent" class="btn btn-default">保存文件内容</button>
    </div>
  </div>
</form>
<?php
			if(isset($_POST['addContent'])){
					if(!empty($_POST['content'])){
						
						$data=$_POST['content'];
						//$file=$_SESSION['allPath'];
						$count=file_put_contents($path,$data);
						if($count){
							?>
							<div id="showMsg" class="alert alert-danger col-sm-offset-2 col-sm-6" >
								<b>文件内容保存成功</b>
									<a href="index.php?path=<?php echo $pos;?>" class="btn btn-info btn-xs">查看文件</a>	
							</div>
							<?php
						}else{
							
						}
					}
			}
?>