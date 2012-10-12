<? include('connect.php');
$email = $_POST['email'];

	$chk1=mysql_query("select sm_name,sm_pass,sm_email from system_member where sm_email='$email' limit 1")or die(mysql_error());
	$chk2=mysql_num_rows($chk1);
	if($chk2==1){
	  	list($a1,$a2,$a3)=mysql_fetch_row($chk1);
			$datas='<html>
			<head>
			<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
			<title>'.$www.'</title>
			</head>
			
			<body>
			
			<h1>อีเมลแจ้งรหัสผ่านจาก '.$www.'</h1>
			<p>สวัสดีค่ะคุณ '.$a1.'</p>
			<p>สำหรับชื่เข้าใช้งานและรหัสผ่านของคุณคือ</p>
			<b>Username :</b> '.$a3.'<br>
			<b>Password :</b> '.$a2.'<br>
			<hr>
			<p>วันที่ส่ง : '.date("l, d F Y (H:i)").'</p>
			<p>ขอบคุณค่ะ '.$mainemail.'</p>
			</body>
		</html>';
		$nemail=$a3;
		$subject="อีเมลแจ้งลืมรหัสผ่านจาก ".$www;
		$header.= "MIME-Version: 1.0\r\n";
		$header.= "Content-type: text/html; charset=utf-8\r\n";
		$header .="From: ".$mainemail;
		@mail($nemail,$subject,$datas,$header);
		
		$data['success'] = true;
		$data['message'] = "<div class='message success'><h3>สำเร็จ!</h3><p>ระบบได้ทำการส่งรหัสผ่านไปหาอีเมลที่ระบุไว้แล้ว โปรดตรวจสอบอีกครั้งค่ะ</p></div>";
	}else{
		$data['success'] = false;
		$data['message'] = "<div class='message error'><h3>ผิดพลาด!</h3><p>ไม่พบอีเมล '".$email."' ในระบบ กรุณาลองใหม่อีกครั้งค่ะ</p></div>";
	}
	
echo json_encode($data);