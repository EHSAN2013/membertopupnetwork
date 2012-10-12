<? include("connect.php");
$user=$_POST['username'];
$pass=$_POST['password'];

	$chk1=mysql_query("SELECT sm_id,sm_code,sm_level FROM system_member WHERE sm_pass='$pass' AND sm_user='$user' LIMIT 0,1")or die(mysql_error());
	$chk2=mysql_num_rows($chk1);
	if($chk2==1){
		list($a1,$a2,$a3)=mysql_fetch_row($chk1);
		if($a3==9){
			$data['success'] = true;
			$_SESSION['adminID']=$a1;
			$_SESSION['asecurity']=md5('asecurity');
			$_SESSION['smid']=$a1;
			$_SESSION['smco']=$a2;
			$_SESSION['smle']=$a3;
			$data['message']="<script>window.location='admin_panel.php';</script>";
		}elseif($a3==1){
			$data['success'] = true;
			$_SESSION['memberID']=$a1;
			$_SESSION['msecurity']=md5('msecurity');
			$_SESSION['smid']=$a1;
			$_SESSION['smco']=$a2;
			$_SESSION['smle']=$a3;
			$data['message']="<script>window.location='index.php';</script>";
		}elseif($a3==3){
			$data['success'] = false;
			$data['message'] = "<div class='message error'><h3>ผิดพลาด!</h3><p>คุณถูกระงับการใช้งาน โปรดติดต่อผู้ดูแลระบบเพื่อปลดการระงับการใช้งานของคุณค่ะ</p></div>";
		}else{
			$data['success'] = false;
			$data['message'] = "<div class='message error'><h3>ผิดพลาด!</h3><p>ขออภัยสถานะของคุณยังไม่เปิดให้ใช้งานค่ะ</p></div>";
		}
	}else{
		$data['success'] = false;
		$data['message'] = "<div class='message error'><h3>ผิดพลาด!</h3><p>ชื่อผู้ใช้งานหรือรหัสผ่านไม่ถูกต้อง กรุณาลองใหม่อีกครั้งค่ะ</p></div>";
	}
	
echo json_encode($data);
session_write_close();
?>