<? 	include('../../config/connect.php');

$sc_name=$_POST['sc_name'];
$sc_code=$_POST['sc_code'];
$sc_id=$_POST['sc_id'];

if($sc_id!=""){
mysql_query("UPDATE system_category SET sc_code='$sc_code', sc_name='$sc_name' where sc_id='$sc_id' limit 1")or die(mysql_error());
mysql_close();
	$data['success'] = true;
	$data['message'] = "<div class='message success'><h3>สำเร็จ!</h3>ก้ไขหมาวดสินค้าเรียบร้อยแล้ว โปรดกดปุ่ม refresh เพื่อปรับปรุงข้อมูลล่าสุด</div>";
}else{
	$data['success'] = false;
	$data['message'] = "<div class='message success'><h3>ผิดพลาด</h3>ไม่พบหมาวดสินค้าที่กำลังจะแก้ไข</div>";
}

echo json_encode($data);
?>