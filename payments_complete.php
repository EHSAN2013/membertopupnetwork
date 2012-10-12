<?
session_start(); 

include("config/connect.php"); 
include("config/function.php");

$cname=$_POST['cname'];
$cmail=$_POST['cmail'];
$ctel=$_POST['ctel'];
$caddress=$_POST['caddress'];
$total_price=$_POST['total_price'];
$spambot=$_POST['spambot'];
$code_hidden=$_POST['code_hidden'];
$date=date("Y-m-d H:i:s");

if($cname=="" || $cmail=="" || $ctel=="" || $caddress==""){
	$data['success'] = false;
	$data['message'] = "<div class='errors roundend'><h3>ผิดพลาด!</h3>กรุณากรอกข้อมูลให้ครบถ้วนนะค๊ะ</div>";
}else if($spambot!=$code_hidden){
	$data['success'] = false;
	$data['message'] = "<div class='errors roundend'><h3>ผิดพลาด!</h3>คุณกรอกรหัสป้องกันแสปมส์ไม่ตรงกัน ทำให้การสั่งซื้อยังไม่สามาระบันทึกเข้าสู่ระบบได้ กรูณากรอกใหม่ค่ะ</div>";
}else{
	//mail data sent
	$to=$cmail;
	$send_to=$from;
	$subject1="รายการสั่งซื้อสินค้า";
	$subject2="แจ้งรายการข้อมูลสั่งซื้อสินค้า";
	$message="
	<html>
	<head>
	<title>ข้อมูลสั่งซื้อสินค้า</title>
	</head>
	<body>
	<h3>ข้อมูลสั่งซื้อสินค้า</h3>
	<table width='100%' border='0' cellspacing='0' cellpadding='5'>
	  <tr align='left' bgcolor='#a8a8a8'>
		<td width='20%' align='center'><b><font size='2' color='#000000'>รหัสสินค้า</font></b></td>
		<td width='50%' align='center'><b><font size='2' color='#000000'>ชื่อสินค้า</font></b></td>
		<td width='20%' align='center'><b><font size='2' color='#000000'>ราคา/ชิ้น</font></b></td>
		<td width='15%' align='right'><b><font size='2' color='#000000'>จำนวน(ชิ้น)</font></b></td>
		<td width='20%' align='right'><b><font size='2' color='#000000'>รวม</font></b></td>
	  </tr>";
  
		for($i=0;$i<count($_SESSION['spd_id']);$i++){
			
			//ราคารวมของสินค้าแต่ละอัน
			$total_unit = $_SESSION['spd_num'][$i] * $_SESSION['spd_price'][$i];
			//ราคารวมของสินค้าทั้งหมด
			$total = $total + $total_unit;
		
			$iLoop++;
			$bgcolor = ( ($iLoop%2)==0 )? "#fbbe91" : "#FFFFFF";//IF อย่างย่อ
			
			$price = number_format($_SESSION['spd_price'][$i],2,'.',',');
			$total_unit2 = number_format($total_unit,2,'.',',');
			$total2 = number_format($total,2,'.',',');
			
			//pv summation
			$sumpv=$_SESSION['spd_point'][$i] * $_SESSION['spd_num'][$i];
		
			$scname=readname("sc_name","system_category","sc_id",$_SESSION['spd_sc_id'][$i]);
			
		$message .="
		<tr bgcolor=$bgcolor>
		  <td align=center>".$_SESSION['spd_code'][$i]."</td>
		  <td>
		  	<p>".$_SESSION['spd_name'][$i]."</p>
			<p class='pv'>คะแนน: ".$_SESSION['spd_point'][$i]." PV</p>
			<p class='cat'>หมวดหมู่สินค้า: ".$scname."</p>
		  </td>
		  <td>".$price."</td>
		  <td align='center'>".$_SESSION['spd_num'][$i]."</td>
		  <td align='right'>".$total_unit2."</td>
		</tr>";
		}
		
	$message .="
	<tr>
		<td colspan='5' align='right'>
			<br />
			<b><font size='3'>PV รวมทั้งหมด&nbsp; ".$sumpv." &nbsp;PV</font></b>
			<b><font size='3'>จำนวนเงินทั้งหมด&nbsp; ".$total2." &nbsp;บาท</font></b>
			<br /><br /></td>
		</tr>
	</table>
	<br><hr size='1'><br>
	<p><b>ชื่อ - นามสกุล : </b>$cname</p>
	<p><b>อีเมล์ : </b>$cmail</p>
	<p><b>เบอร์ติดต่อ : </b>$ctel</p>
	<p><b>ที่อยู่ : </b>$caddress</p>
	<p><b>สั่งซื้อเมื่อ : </b>$date</p>
	</body>
	</html>";

	$from=$mainemail;
	$header="MIME-Version: 1.0\r\n";
	$header .="Content-type: text/html; charset=utf-8\r\n";
	$header.="From: ".$shopownermail;
	$headers.="From: $cmail\r\n";
			
	@mail($to,$subject1,$message,$header);
	@mail($send_to,$subject2,$message,$headers);

	//ลบค่าข้อมูลการสั่งซื้อทั้งหมดกลับคืนสภาพเดิม
	session_unregister("spd_id");
	session_unregister("spd_code");
	session_unregister("spd_name");
	session_unregister("spd_price");
	session_unregister("spd_pic");
	session_unregister("spd_num");
	unset($_SESSION['spd_id']);
	unset($_SESSION['spd_code']);
	unset($_SESSION['spd_name']);
	unset($_SESSION['spd_price']);
	unset($_SESSION['spd_pic']);
	unset($_SESSION['spd_num']);
	
	//echo $message;
	
	$data['success'] = true;
	$data['message'] = "<div class='success roundend'><h3>ขอบคุณค่ะ!</h3>เราได้ส่งรายการสั่งซื้อของท่าน โปรดทำการชำระเงินและจ้างการชำระเงินค่าสินค้า ทางเราจะจัดส่งสินค้าให้ทันทีค่ะ</div><script>setTimeout(\"location.href = 'index.php?page=products&st=complete';\",5000);</script>";
}
echo json_encode($data);
?>