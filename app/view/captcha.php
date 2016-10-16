<?php
if (isset($_GET) AND isset($_GET['recaptcha'])) 
{if (captcha())
	{ ?>
	<img src="http://localhost/schoolwebsite/app/view/captcha.php">
<?php } }
else
{
	captcha();
}
function captcha()
{
session_start();
$code1=rand(0,9);
$code2=rand(4,7);
$code=substr(str_shuffle("0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ"),$code1,$code2);
$_SESSION["captcha"]=$code;
$im = imagecreate(75, 24);
$bg = imagecolorallocate($im, 122, 186, 165);
$fg = imagecolorallocate($im, 255, 200, 200);
imagefill($im, 3, 5, $bg);
imagestring($im, 9, 5, 5,  $code, $fg);
header("Cache-Control: no-cache, must-revalidate");
header('Content-type: image/png');
imagepng($im);
imagedestroy($im);
return 1;
}
?>