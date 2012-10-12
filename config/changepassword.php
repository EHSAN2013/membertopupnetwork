<? session_start(); 
include('connect.php');

$passwordnew = $_POST['passwordnew'];
$passwordconf = $_POST['passwordconf'];

$sm_id = $_POST['sm_id'];

if($passwordnew==$passwordconf){
	mysql_query("UPDATE system_member SET sm_pass='$passwordnew' where sm_id='$sm_id' limit 1")or die(mysql_error());
	mysql_close();
	$data['success'] = true;
	$data['message'] = "<div class='message success'><h3>สำเร็จ!</h3>เปลี่ยนรหัสผ่านเรียบร้อยแล้ว รหัสผ่านใหม่ของคุณคือ <b>$passwordnew</b></div>";
}else{
	$data['success'] = false;
	$data['message'] = "<div class='message error'><h3>ผิดพลาด!</h3>ขออภัย คุณกรอกรหัสผ่านไม่เหมือนกัน โปรดกรอกใหม่</div>";
}

echo json_encode($data);
session_write_close();