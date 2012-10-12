<? 	include('../../config/connect.php');

$datas=$_POST['datas'];
$smid=$_POST['smid'];

if($datas!=""){;
	$jj=mysql_query("select sm_name,sm_email,sm_htel,sm_mtel from system_member where sm_id='$smid' limit 1")or die(mysql_error());
	list($a1,$a2,$a3,$a4)=mysql_fetch_row($jj);
	
	$datas='<html>
		<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title>'.$www.'</title>
		</head>
		
		<body>
		
		<h1>แจ้งขอทำการเปลี่ยนแปลงข้อมูลบัญชีธนาคาร</h1>
		<p><b>ข้อความ:</b> '.$datas.'</p>
		<hr>
		<p>ข้อมูลผู้ส่งคำร้อง</p>
		<b>ชื่อ นามสกุล :</b> '.$a1.'<br>
		<b>อีเมล :</b> '.$a2.'<br>
		<b>โทรศัพท์ :</b> '.$a3.'<br>
		<b>โทรศัพท์มือถือ :</b> '.$a4.'<br>
		
		</body>
	</html>';
	$nemail=$mainemail;
	$subject="อีเมลแจ้งเตือนจาก ".$www." เรื่อง สมาชิกขอเปลี่ยนชื่อบัญชีธนาคาร";
	$header.= "MIME-Version: 1.0\r\n";
	$header.= "Content-type: text/html; charset=utf-8\r\n";
	$header .="From: ".$a;
	@mail($nemail,$subject,$datas,$header);
	
	$data['success'] = true;
	$data['message'] = "<div class='message success'><h3>สำเร็จ!</h3>ส่งคำร้องเรียบร้อยแล้ว กรุณารอการติดต่อกลับจากทีมงาน</div>";
}else{
	$data['success'] = false;
	$data['message'] = "<div class='message success'><h3>ผิดพลาด</h3>โปรดแจ้งรายละเอียด</div>";
}

echo json_encode($data);