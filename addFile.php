<?php
	include 'tpl/header.php';
	include 'tpl/sess.php';
?>
 <form  name="form1"  id="form1" class="form-horizontal" action="" method="post">
  <div class="form-group">
    <label for="fileName" class="col-sm-2 control-label">文件名</label>
    <div class="col-sm-6">
      <input type="text" class="form-control" id="fileName" name="fileName" placeholder="请输入文件名">
      (文件名命名格式,如:index.txt)
    </div>
  </div>
  <div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
    	<button type="submit" name="add" class="btn btn-default">创建文件</button>
    </div>
  </div>
</form>

<form  name="form2" id="form2" class="form-horizontal" action="" method="post">
  <div class="form-group">
    <label for="fileName" class="col-sm-2 control-label">文件内容</label>
    <div class="col-sm-6">
    	<textarea name="content" class="form-control" rows="10"></textarea>
    </div>
  </div>
  <div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
    	<button type="submit" name="addContent" class="btn btn-default">添加文件内容</button>
    </div>
  </div>
</form>
<script src="Bootstrap/js/content.js"></script>
<?php 
	$pos = $_SESSION['pos'];
	if (isset($_POST['add'])) {
		$fn = $_POST['fileName'];
		if (empty($fn)) {
?>
	<div class="alert alert-danger col-sm-offset-2 col-sm-6" role="alert"><b>请输入文件名!</b></div>
<?php
		}else{
			$parttern = "/[a-zA-Z0-9]+\.[a-zA-Z]{1,4}/";
			if (preg_match($parttern,$fn)) 
			{
				//建立文件
				if (isset($_SESSION['pos'])) {
					$pos = $_SESSION['pos'];
					$allPath = $pos."/".$fn;
					//创建
					$_SESSION['allPath'] = $allPath;
					$fp = @fopen($allPath, "w");
						if ($fp) {
						?>
							<div id="showMsg" class="alert alert-danger col-sm-offset-2 col-sm-6" role="alert">
								<b>文件创建成功!
									<a href="index.php?path=<?php echo $pos; ?>" class="btn btn-info btn-xs">查看文件！</a>,<a href="#" class="btn btn-info btn-xs " onclick="change()">继续添加文件内容</a>
								</b>
							</div>
						<?php
						}
						else{
						?>
							<div class="alert alert-danger col-sm-offset-2 col-sm-6" role="alert">
								<b>文件创建失败!</b>
							</div>
						<?php
						}
				}
			}else{
				?>
					<div class="alert alert-danger col-sm-offset-2 col-sm-6" role="alert">
						<b>文件名格式不正确!</b>
					</div>
				<?php
					}
					}
				}
				
				
				//添加文件内容
				if(isset($_POST['addContent'])){
					if(!empty($_POST['content'])){
						
						$data=$_POST['content'];
						$file=$_SESSION['allPath'];
						$count=file_put_contents($file,$data);
						if($count){
							?>
							<div id="showMsg" class="alert alert-danger col-sm-offset-2 col-sm-6" >
								<b>文件内容添加成功</b>
									<a href="index.php?path=<?php echo $pos;?>" class="btn-default">查看文件</a>								
							</div>
							<?php
						}else{
							echo '失败';
					
			}
		}
	}
 ?>