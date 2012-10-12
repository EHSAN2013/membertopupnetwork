<? session_start(); 
include('connect.php');

$sm_name = $_POST['sm_name'];
$sm_email = $_POST['sm_email'];
$sm_htel = $_POST['sm_htel'];
$sm_mtel = $_POST['sm_mtel'];
$sm_addr = $_POST['sm_addr'];
$sm_district = $_POST['sm_district'];

$sm_id = $_POST['sm_id'];

$chk=mysql_query("UPDATE system_member SET sm_name='$sm_name', sm_email='$sm_email', sm_htel='$sm_htel', sm_mtel='$sm_mtel', sm_addr='$sm_addr', sm_district='$sm_district' where sm_id='$sm_id' limit 1")or die(mysql_error());
mysql_close();

if($chk){
	$data['success'] = true;
	$data['message'] = "<div class='message success'><h3>สำเร็จ!</h3>แก้ไขข้อมูลเรียบร้อยแล้ว</div>";
}else{
	$data['success'] = false;
	$data['message'] = "<div class='message error'><h3>ผิดพลาด!</h3>เกิดความผิดพลาดบางประการ ไม่สามารถแก้ไขข้อมูลได้ในขณะนี้</div>";
}

echo json_encode($data);
session_write_close();