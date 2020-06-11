<?php
include 'tpl/sess.php';
include 'tpl/header.php';
?>
 <form  name="form1"  id="form1" class="form-horizontal" action="" method="post">
  <div class="form-group">
    <label for="fileName" class="col-sm-2 control-label">文件夹名</label>
    <div class="col-sm-6">
      <input type="text" class="form-control" id="fileName" name="fileName" placeholder="请输入文件夹名">
      (文件夹名命名格式,如:2019,img,不包括特殊字符)
    </div>
  </div>
  <div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
    	<button type="submit" name="add" class="btn btn-default">创建文件夹</button>
    </div>
  </div>
</form>

<?php 
	$pos = $_SESSION['pos'];
	if (isset($_POST['add'])) {
		$fn = $_POST['fileName'];
		if (empty($fn)) {
?>
	<div class="alert alert-danger col-sm-offset-2 col-sm-6" role="alert"><b>请输入文件夹名!</b></div>
<?php
		}else{
			$parttern = "/[a-zA-Z0-9]+/";
			if (preg_match($parttern,$fn)) 
			{
				//建立文件
				if (isset($_SESSION['pos'])) {
					$pos = $_SESSION['pos'];
					$allPath = $pos."/".$fn;
					//创建
					$_SESSION['allPath'] = $allPath;
					if(mkdir($allPath,0777,true)){
						?><div id="showMsg" class="alert alert-danger col-sm-offset-2 col-sm-6" role="alert">
								<b>文件夹创建成功!
									<a href="index.php?path=<?php echo $pos; ?>" class="btn btn-info btn-xs">查看文件！</a>
								</b>
							</div>
						<?php
						}
						else{
						?>
							<div class="alert alert-danger col-sm-offset-2 col-sm-6" role="alert">
								<b>文件夹创建失败!</b>
							</div>
						<?php
						}
				}
			}else{
				?>
					<div class="alert alert-danger col-sm-offset-2 col-sm-6" role="alert">
						<b>文件夹格式不正确!</b>
					</div>
				<?php
					}
					}
				}