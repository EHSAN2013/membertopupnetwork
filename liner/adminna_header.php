<? $page=$_GET['page']; $casy=$_GET['casy'];
// Main page
if($page==""){
	$h2="<h2>สถิติระบบเช็คสายงาน</h2>";
}elseif($page=="member"){
	$h2="<h2>จัดการสมาชิก</h2>";
}elseif($page=="liner"){
	$h2="<h2>เช็คสายงานสมาชิก</h2>";
}elseif($page=="pvmng"){
	$h2="<h2>จัดการรายได้ในระบบ</h2>";
}elseif($page=="renew"){
	$h2="<h2>ต่ออายุสมาชิกวีไอพี</h2>";
}elseif($page=="topup"){
	$h2="<h2>โบนัสเติมเงิน</h2>";
}elseif($page=="uplevel"){
	$h2="<h2>จ่ายรายได้แบบพิเศษ</h2>";
}elseif($page=="payrefer"){
	$h2="<h2>จัดการรายการแจ้งถอนเงิน</h2>";
}elseif($page=="payrecieve"){
	$h2="<h2>จัดการถอน รายได้ จากระบบ</h2>";
}elseif($page=="report"){
	$h2="<h2>เอกสารดาวน์โหลด</h2>";
}elseif($page=="request"){
	// Casey page
	if($casy=="upgradevip"){
		$h2="<h2>&raquo; อัฟเกรดสมาชิกเป็นวีไอพี</h2>";
	}elseif($casy=="checkliner"){
		$h2="<h2>&raquo; เช็คสายงานสมาชิก</h2>";
	}elseif($casy=="pvmanage"){
		$h2="<h2>&raquo; จัดการรายได้สมาชิก</h2>";
	}elseif($casy=="viprenew"){
		$h2="<h2>&raquo; จัดการต่ออายุสมาชิกวีไอพี</h2>";
	}elseif($casy=="uplevel"){
		$h2="<h2>&raquo; จัดการเลือนขั้นสมาชิก</h2>";
	}elseif($casy=="payrecieve"){
		$h2="<h2>&raquo; ถอนรายได้สมาชิก</h2>";
	}
	
}

// Resutl

echo $h2;

?>