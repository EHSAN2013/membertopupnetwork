<? include('../../config/connect.php');

$sa_id=$_POST['sa_id'];
$sa_www=$_POST['sa_www'];
$sa_title=$_POST['sa_title'];
$sa_description=$_POST['sa_description'];
$sa_search=$_POST['sa_search'];

$jj=mysql_query("select sa_id from system_account where sa_www='$sa_www' and sa_id!='$sa_id' limit 1")or die(mysql_error());
$js=mysql_num_rows($jj);

$qq=mysql_query("select sa_www from system_account where sa_id='$sa_id' limit 1")or die(mysql_error());
list($uriown)=mysql_fetch_row($qq);

if($js==0 or $sa_www==$uriown){
	mysql_query("UPDATE system_account SET sa_www='$sa_www', sa_title='$sa_title', sa_description='$sa_description', sa_search='$sa_search' where sa_id='$sa_id' limit 1")or die(mysql_error());
	mysql_close();
	$data['success'] = true;
	$data['message'] = "<div class='message success'><strong>สำเร็จ!</strong> สร้างเว็บไซต์ของคุณเรียบร้อยแล้ว คุณสามารถก้อบปี้ลิ้งได้จากหน้าแรก</div>";
}else{
	$data['success'] = false;
	$data['message'] = "<div class='message error'><strong>ผิดพลาด</strong> ขออภัย ชื่อเว็บไซท์นี้มีผู้ใช้แล้ว</div>";
}

echo json_encode($data);

session_write_close();
?>