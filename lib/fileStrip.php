<?php 
function delDir($path){
	$res = false;
	if (is_dir($path)) {
		
		$dirArr = scandir($path);
			foreach ($dirArr as $file) {
				$allFilePath = $path ."/".$file;
				if ($file != "." & $file != "..") {
					if (is_file($allFilePath)) {
						unlink($allFilePath);
					}
					if (is_dir($allFilePath)) {
						delDir($allFilePath);
					}
				}
			}
			rmdir($path);
			$res = true;
			return $res;
		
	}
} 
?>
