<?  session_start(); include('../../config/connect.php');

$msid=$_POST['msid'];
$sm_bank_name=$_POST['sm_bank_name'];
$sm_bank_area=$_POST['sm_bank_area'];
$sm_bank_acc=$_POST['sm_bank_acc'];
$sm_bank_id=$_POST['sm_bank_id'];
$sm_bank_type=$_POST['sm_bank_type'];

if($msid!=""){
	mysql_query("UPDATE system_member SET sm_bank_name='$sm_bank_name', sm_bank_area='$sm_bank_area', sm_bank_acc='$sm_bank_acc', sm_bank_id='$sm_bank_id', sm_bank_type='$sm_bank_type' where sm_id='$msid' limit 1")or die(mysql_error());
	mysql_close();
	$data['success'] = true;
	$data['message'] = "<div class='message success'><h3>สำเร็จ!</h3>ปรับปรุงข้อมูลบัญชีธนาคารเรียบร้อยแล้ว</div>";
}else{
	$data['success'] = false;
	$data['message'] = "<div class='message error'><h3>ผิดพลาด</h3>ขออภัย อีเมล์นี้มีผู้ใช้แล้ว กรูณาเปลี่ยนเป็นอีเมลอื่นค่ะ ".$sm_id.$js."</div>";
}

echo json_encode($data);

session_write_close();