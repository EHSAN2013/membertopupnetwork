<? $page=$_GET['page']; $casy=$_GET['casy'];
// Main page
if($page==""){
	$h2="<h2>ข้อมูลส่วนตัวสมาชิก</h2>";
}elseif($page=="pvrecieve"){
	$h2="<h2>แจ้งถอน รายได้</h2>";
}elseif($page=="checkline"){
	$h2="<h2>เช็คสายงานของคุณ</h2>";
}elseif($page=="pvpay"){
	$h2="<h2>เช็คคะแนน รายได้ ของคุณ</h2>";
}elseif($page=="renew"){
	$h2="<h2>ต่ออายุสมาชิกวีไอพี</h2>";
}elseif($page=="refer"){
	$h2="<h2>แจ้งการชำระเงิน</h2>";
}
// Resutl

echo $h2;

?>