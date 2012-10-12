<? 
include("config/connect.php");

$sm_email = $_POST['sm_email'];
$sm_name = $_POST['sm_name'];
$sm_mtel = $_POST['sm_mtel'];
$sm_addr = $_POST['sm_addr'];
$spambot = $_POST['spambot'];
$confr_spam = $_POST['confr_spam'];

if($sm_email=="" or $sm_name=="" or $sm_mtel==""){
	$data['success'] = false;
	$data['message'] = "<div class='errors roundend'><h3>ผิดพลาด!</h3>กรุณาระบุอีเมลของท่าน ขอบคุณค่ะ</div>";
}else if($spambot!=$confr_spam){
	$data['success'] = false;
	$data['message'] = "<div class='errors roundend'><h3>ผิดพลาด!</h3>รหัสป้องกันสแปมส์ไม่ตรงกันค่ะ</div>";
}else{
	
	$datas='<html>
		<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title>รายละเอียดข้อมูลการติดต่อ</title>
		</head>
		
		<body>
		
		<p>รายละเอียดข้อมูลการติดต่อ<br>
		<br>
		<b>ชื่อ - นามสกุล:</b> '.$sm_name.'<br>
		<b>อีเมลผู้ติดต่อ:</b> '.$sm_mail.'<br>
		<b>เบอร์โทรศัพท์:</b> '.$sm_mtel.'<br>
		<b>รายละเอียด:</b> '.$sm_addr.'<br>
		<br>
		</p>
		
		</body>
	</html>';
	$nemail=$mainemail;
	$subject="รายละเอียดการติดต่อ";
	$header.= "MIME-Version: 1.0\r\n";
	$header.= "Content-type: text/html; charset=utf-8\r\n";
	$header .="From: ".$sm_mail;
	@mail($nemail,$subject,$datas,$header);
	
	$data['success'] = true;
	$data['message'] = "<div class='success roundend'><h3>ขอบคุณค่ะ!</h3>ระบบได้ส่งรายละเอียดของท่านให้กับผู้ดูแลระบบเรียบร้อยแล้วค่ะ</div>";
}

echo json_encode($data);