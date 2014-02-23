<?php
$codigoCaptcha = substr (md5 (time ()), 0, 9);
$_SESSION['RegSecCod'] = $codigoCaptcha;
$imagemCaptcha = imagecreatefrompng ("../Template/images/fundocaptch.png");
$fonteCaptcha = imageloadfont ("../Template/Fonts/anonymous.gdf");
$corCaptcha = imagecolorallocate ($imagemCaptcha, 255, 0, 0);
imagestring ($imagemCaptcha, $fonteCaptcha, 15, 5, $codigoCaptcha, $corCaptcha);
header ("Content-type: image/png");
imagepng ($imagemCaptcha);
imagedestroy ($imagemCaptcha);
?>