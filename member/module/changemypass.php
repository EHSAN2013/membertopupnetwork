<?  session_start(); include('../../config/connect.php'); include('../../config/function.php');

$newuser=$_POST['newuser'];
$newpass=$_POST['newpass'];
$conpass=$_POST['conpass'];
$smid=$_POST['smid'];

if($newpass==$conpass){
	$cus=mysql_query("select sm_id from system_member where sm_user='$newuser'")or die(mysql_error());
	$nus=mysql_num_rows($cus);
	if($nus>0){
		$data['success'] = false;
		$data['message'] = "<div class='message error'><h3>ผิดพลาด</h3>ขออภัย ชื่อผู้ใช้งานนี้มีคนใช้แล้วกรุณากรอกใหม่</div>";
	}else{
	  mysql_query("UPDATE system_member SET sm_pass='$newpass', sm_user='$newuser' where sm_id='$smid' limit 1")or die(mysql_error());
	  mysql_close();
	  $data['success'] = true;
	  $data['message'] = "<div class='message success'><h3>สำเร็จ!</h3>เปลี่ยนชื่อผู้ใช้งาน และรหัสผ่านเรียบร้อย ชื่อผู้ใช้งาน และรหัสผ่านใหม่ของคุณคือ (".$newuser." และ ".$newpass.")</div>";
	}
	
}else{
	$data['success'] = false;
	$data['message'] = "<div class='message error'><h3>ผิดพลาด</h3>ขออภัย คุณกรอกรหัสผ่านไม่เหมือนกัน</div>";
}

echo json_encode($data);

session_write_close();
?>