<?
$pid=$_GET['pid'];

session_register("spd_id");
session_register("spd_code");
session_register("spd_name");
session_register("spd_price");
session_register("spd_point");
session_register("spd_sc_id");
session_register("spd_pic");
session_register("spd_num");


if(count($spd_id)==0){$check=1;}//ตรวจสอบจำนวน array ของตัวแปร $pid เท่ากับ 0 หรือไม่ ถ้าจริงกำหนดให้ตัวแปร $check = 1
else if(!in_array($pid,$spd_id)){$check=1;}//หากไม่ใช่ก็ต้องตรวจสอบว่า ในตระกร้าสินค้ามีสินค้าที่ผู้ใช้จะใส่เพิ่มเข้าไปหรือไม่ หากไม่มีก็กำหนดตัวแปร $check = 1

if($check==1){

	$spdque=queryx1("SELECT * FROM system_product WHERE spd_id='".$pid."'");
	
	//เก็บค่าไว้ในตัวแปรที่กำหนด ในรูปแบบของ array
	$_SESSION['spd_id'][]=$spdque['spd_id'];
	$_SESSION['spd_code'][]=$spdque['spd_code'];
	$_SESSION['spd_name'][]=$spdque['spd_name'];
	$_SESSION['spd_price'][]=$spdque['spd_price'];
	$_SESSION['spd_point'][]=$spdque['spd_point'];
	$_SESSION['spd_sc_id'][]=$spdque['spd_sc_id'];
	$_SESSION['spd_pic'][]=$spdque['spd_pic'];
	$_SESSION['spd_num'][]=1;
}

echo "<script>window.location='index.php?page=productorder';</script>";
?>