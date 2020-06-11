<?php
error_reporting(0);//关闭错误报告
session_start();//开启session
getCode(4,50,20);//调用函数
function getCode($num,$w,$h) {//定义函数
    $code = "";
    for ($i = 0; $i < $num; $i++) {//定义验证码位数
        $code .= rand(0, 9);
    }
    //4位验证码也可以用rand(1000,9999)直接生成
    //将生成的验证码写入session，备验证页面使用
    $_SESSION['Code1NJ'] = $code;
    setcookie("Code1NJ", md5("2180#1NJ"), time()+1200);
    //创建图片，定义颜色值
    Header("Content-type: image/PNG");//
    $im = imagecreate($w, $h);//创建一个256色画布
    $black = imagecolorallocate($im, 255, 0, 63);//定义颜色:红色
    $gray = imagecolorallocate($im, 200, 200, 200);//灰色
    $bgcolor = imagecolorallocate($im, 255, 255, 255);//白色
    imagefill($im, 0, 0, $bgcolor);//填充画布
    //画边框
    //imagerectangle($im, 0, 0, $w-1, $h-1, $black);
    //在画布上随机生成大量黑点，起干扰作用;
    for ($i = 0; $i < 10; $i++) {
        imagesetpixel($im, rand(0, $w), rand(0, $h), $black);//画一个单一像素
    }
    //将数字随机显示在画布上,字符的水平间距和位置都按一定波动范围随机生成
    $strx = rand(1,3);
    for ($i = 0; $i < $num; $i++) {//
        $strpos = rand(2, 6);
        imagestring($im, 5, $strx, $strpos, substr($code, $i, 1), $black);//水平的画一行字符串
        $strx += rand(8, 12);
    }
    imagepng($im);//输出png格式图像
    imagedestroy($im);//释放资源
}

?>