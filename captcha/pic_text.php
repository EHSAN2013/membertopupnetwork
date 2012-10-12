<?php
	ob_start();
	$str=$_REQUEST['str']; 
	$font = "SPEEN3_.TTF"; // font 
	$image = imagecreate(110,50);	//ตำแหน่งตัวอักษร
	$bg = imagecolorallocate($image, 0, 107, 215); //กำหนดสีพื้นหลัง (Red,Green,Blue)
	
	$black = imagecolorallocate($image, 255, 255, 255); //กำหนดสีตัวอักษร
	$grid_color = imagecolorallocate($image, 255, 255, 255);
	
	//imageline($image, 0, 5, 120, 5, $grid_color);//กำหนดเส้นรูปภาพ
	//imageline($image, 0, 10, 120, 10, $grid_color);//กำหนดเส้นรูปภาพ
	//imageline($image, 0, 15, 120, 15, $grid_color);//กำหนดเส้นรูปภาพ
	//imageline($image, 0, 20, 120, 20, $grid_color);//กำหนดเส้นรูปภาพ
	//imageline($image, 0, 25, 120, 25, $grid_color);//กำหนดเส้นรูปภาพ
	//imageline($image, 0, 30, 120, 30, $grid_color);//กำหนดเส้นรูปภาพ
	//imageline($image, 0, 35, 120, 35, $grid_color);//กำหนดเส้นรูปภาพ
	//imageline($image, 0, 40, 120, 40, $grid_color);//กำหนดเส้นรูปภาพ
	
	putenv( 'GDFONTPATH='.realpath('.') );
	imageTTFText($image,25,5,5,40,$black,$font,$str);  //ขนาดตัวอักษร
	
	header("Content-type: image/png");	// รูปภาพ PNG
	imagepng($image);   //ประเภทรูปภาพ
	imagedestroy($image); //คืนพื้นที่
?>
