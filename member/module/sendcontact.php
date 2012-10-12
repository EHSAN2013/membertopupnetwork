<? 	include('../../config/connect.php');

$subjects=$_POST['subject'];
$detail=$_POST['detail'];
$smid=$_POST['smid'];

if($detail!=""){;
	$jj=mysql_query("select sm_name,sm_email,sm_htel,sm_mtel from system_member where sm_id='$smid' limit 1")or die(mysql_error());
	list($a1,$a2,$a3,$a4)=mysql_fetch_row($jj);
	$datas='<html>
		<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title>'.$www.'</title>
		</head>
		
		<body>
		
		<h1>'.$subjects.'</h1>
		<p><b>ข้อความ:</b> '.$detail.'</p>
		<hr>
		<p>ข้อมูลผู้ส่งการติดต่อ/p>
		<b>ชื่อ นามสกุล :</b> '.$a1.'<br>
		<b>อีเมล :</b> '.$a2.'<br>
		<b>โทรศัพท์ :</b> '.$a3.'<br>
		<b>โทรศัพท์มือถือ :</b> '.$a4.'<br>
		
		<p>วันที่ส่ง : '.date("l, d F Y (H:i)").'</p>
		
		</body>
	</html>';
	$nemail=$mainemail;
	$subject="อีเมลการติดต่อผ่านนห้าเว็บไซต์ ".$www." เรื่อง ".$subjects;
	$header.= "MIME-Version: 1.0\r\n";
	$header.= "Content-type: text/html; charset=utf-8\r\n";
	$header .="From: ".$a;
	@mail($nemail,$subject,$datas,$header);
	
	$data['success'] = true;
	$data['message'] = "<div class='message success'><h3>สำเร็จ!</h3>ส่งการติดต่อเรียบร้อยแล้วค่ะ กรุณารอการติดต่อกลับจากทีมงาน</div>";
}else{
	$data['success'] = false;
	$data['message'] = "<div class='message success'><h3>ผิดพลาด</h3>โปรดแจ้งรายละเอียด</div>";
}

echo json_encode($data);