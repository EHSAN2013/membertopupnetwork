<? include('../../config/connect.php');

$sm_id=$_POST['sm_id'];
$sm_email=$_POST['sm_email'];
$sm_name=$_POST['sm_name'];
$sm_sex=$_POST['sm_sex'];
$sm_pid=$_POST['sm_pid'];
$sm_addr=$_POST['sm_addr'];
$sm_district=$_POST['sm_district'];
$sa_description=$_POST['sa_description'];
$sm_postcode=$_POST['sm_postcode'];
$sm_mtel=$_POST['sm_mtel'];

$jj=mysql_query("select sm_email from system_member where sm_id!='$sm_id' and sm_email='$sm_email' limit 1")or die(mysql_error());
$js=mysql_num_rows($jj);

if($js==0){
	if(!is_numeric($sm_pid) or !is_numeric($sm_postcode) or !is_numeric($sm_mtel)){
		$data['success'] = false;
		$data['message'] = "<div class='message error'><strong>ผิดพลาด</strong> ขออภัย หมายเลขบัตรประจำตัวประชาชน รหัสไปรษณีย์ โทรศัพท์ และ โทรศัพท์มือถือ ต้องเป็นตัวเลขเท่านั้น</div>";
	}else{
		mysql_query("UPDATE system_member SET sm_email='$sm_email', sm_name='$sm_name', sm_sex='$sm_sex', sm_pid='$sm_pid', sm_addr='$sm_addr', sm_district='$sm_district', sm_mtel='$sm_mtel', sm_postcode='$sm_postcode' where sm_id='$sm_id' limit 1")or die(mysql_error());
		mysql_close();
		$data['success'] = true;
		$data['message'] = "<div class='message success'><strong>สำเร็จ!</strong> ปรับปรุงข้อมูลส่วนตัวเรียบร้อยแล้ว</div>";
	}
}else{
	$data['success'] = false;
	$data['message'] = "<div class='message error'><strong>ผิดพลาด</strong> ขออภัย อีเมล์นี้มีผู้ใช้แล้ว กรูณาเปลี่ยนเป็นอีเมลอื่นค่ะ ".$sm_id.$js."</div>";
}

echo json_encode($data);

session_write_close();
?>