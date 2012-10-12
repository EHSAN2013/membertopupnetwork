<? 
include("config/connect.php");

$username = $_POST['username'];
$password = $_POST['password'];
$cpassword = $_POST['cpassword'];
$sm_email = $_POST['sm_email'];
$sm_anme = $_POST['sm_anme'];
$sm_sex = $_POST['sm_sex'];
$sm_pid = $_POST['sm_pid'];
$sm_addr = $_POST['sm_addr'];
$sm_district = $_POST['sm_district'];
$sm_postcode = $_POST['sm_postcode'];
$sm_mtel = $_POST['sm_mtel'];
$sm_htel = $_POST['sm_htel'];
$sm_bank_name = $_POST['sm_bank_name'];
$sm_bank_area = $_POST['sm_bank_area'];
$sm_bank_acc = $_POST['sm_bank_acc'];
$sm_bank_id = $_POST['sm_bank_id'];
$sm_bank_type = $_POST['sm_bank_type'];
$sm_direct_id = $_POST['sm_direct_id'];
$sm_direct_name = $_POST['sm_direct_name'];
$sm_target_id = $_POST['sm_target_id'];
$sm_target_name = $_POST['sm_target_name'];

if (!empty($sm_direct_id)) {
	$resultDirect = mysql_query("select sm_id from system_member where sm_code='$sm_direct_id'")or die(mysql_error());
	$directId = mysql_fetch_assoc($resultDirect);
	$sr_direct = $directId['sm_id'];
} elseif (!empty($sm_direct_name)) {
	$resultDirect = mysql_query("select sm_id from system_member where sm_name='$sm_direct_name'")or die(mysql_error());
	$directId = mysql_fetch_assoc($resultDirect);
	$sr_direct = $directId['sm_id'];
} else {
	$sr_direct = $_POST['sr_direct'];
}

if (!empty($sm_target_id)) {
	$resultTarget = mysql_query("select sm_id from system_member where sm_code='$sm_target_id'")or die(mysql_error());
	$targetId = mysql_fetch_assoc($resultTarget);
	$sr_target = $targetId['sm_id'];
} elseif (!empty($sm_target_name)) {
	$resultTarget = mysql_query("select sm_id from system_member where sm_name='$sm_target_name'")or die(mysql_error());
	$targetId = mysql_fetch_assoc($resultTarget);
	$sr_target = $targetId['sm_id'];
} else {
	$sr_target = '';
}

$cck=mysql_query("select sm_id from system_member where sm_user='$username'")or die(mysql_error());
$ccs=mysql_num_rows($cck);

$checkMemberId = mysql_fetch_assoc(mysql_query("select sm_id from system_member where sm_user='$username'")or die(mysql_error()));

if($sm_email==""){
	$data['success'] = false;
	$data['message'] = "<div class='errors roundend'><h3>ผิดพลาด!</h3>กรุณาระบุอีเมลของท่าน ขอบคุณค่ะ</div>";
}elseif($ccs>0){
	$data['success'] = false;
	$data['message'] = "<div class='errors roundend'><h3>ผิดพลาด!</h3>ขออภัย ชื่อผู้ใช้งานนี้มีผู้ใช้แล้ว กรุณาใช้อีเมลอื่น</div>";
}elseif($password!=$cpassword){
	$data['success'] = false;
	$data['message'] = "<div class='errors roundend'><h3>ผิดพลาด!</h3>ขออภัย คุณกรอกรหัสผ่านไม่ตรงกันกรุณากรอกใหม่</div>";
}elseif($sm_email=="" or $sm_anme=="" or $sm_pid=="" or $sm_mtel=="" or $sm_bank_area=="" or $sm_bank_acc=="" or $sm_bank_id=="" or $sm_bank_type==""){
	$data['success'] = false;
	$data['message'] = "<div class='errors roundend'><h3>ผิดพลาด!</h3>โปรดกรอกข้อมูล * ให้ครบถ้วน</div>";
}elseif(!isset($sr_direct)){
	$data['success'] = false;
	$data['message'] = "<div class='errors roundend'><h3>ผิดพลาด!</h3>ข้อมูลผู้แนะนำไม่ถูกต้อง</div>";
}elseif(!isset($sr_target)){
	$data['success'] = false;
	$data['message'] = "<div class='errors roundend'><h3>ผิดพลาด!</h3>ข้อมูลอัพไลน์ไม่ถูกต้อง</div>";
}else{
	/*$runpass="ABCDEFGHIJKLMNOPQRSTUVWXYZ";
	$showpass=str_shuffle($runpass);
	$rand_char=substr(str_shuffle($showpass),0,10);*/
	
	$y=date("y");
	$chkl=mysql_query("select sm_id from system_member")or die(mysql_error());
	$chkn=mysql_num_rows($chkl);
	$plus=$chkn+1;
	if($plus<=9){
		$zero="10000";
	}elseif($plus<=99){
		$zero="1000";
	}elseif($plus<=999){
		$zero="100";
	}elseif($plus<=9999){
		$zero="10";
	}elseif($plus<=99999){
		$zero="1";
	}else{
		$zero="";
	}
	$codex=$y."-".$zero.$plus;
	
	//memer regist
	mysql_query("insert into system_member value('','$codex','$sm_email','$password','$sm_anme','$sm_sex','$sm_pid','$sm_addr','$sm_district','$sm_postcode ','$sm_mtel','$sm_htel','$sm_bank_acc','$sm_bank_name','$sm_bank_id','$sm_bank_type','$sm_bank_area','".date("Y-m-d")."','','','1','$username','','');")or die(mysql_error());
	$idx=mysql_insert_id();
	
	//check line
	mysql_query("insert into system_reply value('','$sr_target','$idx','$sr_direct');")or die(mysql_error());
	
	//create website
	mysql_query("insert into system_account value('','$idx','$codex','','','');")or die(mysql_error());
	
	mysql_close();
	
	$datas='<html>
		<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title>'.$www.'</title>
		</head>
		
		<body>
		
		<p>ขอบคุณค่ะ ขณะนี้คุณได้เป็นสมาชิกของเราแล้ว '.$www.'<br>
		<br>
		สำหรับ ชื่อการเข้าระบบและรหัสผ่านของคุณคือ
		<br>
		
		<b>Username :</b> '.$username.'<br>
		<b>Password :</b> '.$password.'<br>
		<br>
		<br><br> '.$mainemail.' ขอบคุณค่ะ
		
		</p>
		
		</body>
	</html>';
	$nemail=$sm_email;
	$subject="การสมัครสมาชิกจากเวปไซต์ ".$www;
	$header.= "MIME-Version: 1.0\r\n";
	$header.= "Content-type: text/html; charset=utf-8\r\n";
	$header .="From: ".$mainemail;
	@mail($nemail,$subject,$datas,$header);
	
	$data['success'] = true;
	$data['message'] = "<div class='success roundend'><h3>ขอบคุณค่ะ!</h3>ขณะนี้ Username และ Password ได้ถูกส่งไปยังอีเมล์ของคุณแล้ว โปรดใช้เพื่อการเข้าสู่ระบบค่ะ</div>";
	$data['message'] .= "<script>setTimeout(\"location.href='index.php?step=updatemyinfo';\",2000);</script>";
	// $data['message'] = "<div class='success roundend'><h3>ขอบคุณค่ะ!</h3>ขณะนี้ Username และ Password ได้ถูกส่งไปยังอีเมล์ของคุณแล้ว โปรดใช้เพื่อการเข้าสู่ระบบค่ะ</div>";
}

echo json_encode($data);