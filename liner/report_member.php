<? $pagename=$_GET['name'];
header("Content-Type: application/vnd.ms-excel");
header('Content-Disposition: attachment; filename='.$pagename.'_'.date("d-m-Y").'.xls');
$link=$_SERVER['PHP_SELF'];
require_once('../config/connect.php');
require_once('../config/function.php');
require_once('setting.php');
$mcase=$_GET['mcase'];
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns:o="urn:schemas-microsoft-com:office:office"

xmlns:x="urn:schemas-microsoft-com:office:excel"

xmlns="http://www.w3.org/TR/REC-html40">

<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<style type="text/css" media="all">
body{
	margin:0;
	padding:0;
	font-size:12px;
	font-family:Arial;
	color:#212220;
}
table{
	border-collapse:collapse;
	width:100%;
	height:auto;
	margin:0 auto 20px auto;
}
th{
	padding:3px;
	color:#FFF;
	font-weight:600;
	background:#F27300;
}
td{
	padding:3px 5px;
}
tr{
	border:1px solid #B0661C;
}
tr.odd{
	background:#F9F9F9;
}
caption{
	font-size:22px;
	text-align:left;
	margin:20px 0;
	position:relative;
}
span.datex{
	position:absolute;
	top:25px;
	right:0px;
	font-size:14px;
	color:#3E3D39;
}
</style>
</head>

<body>
<? if($mcase==1){?>
<table>
<caption>รายงานสมาชิก <?=$www;?> <span class="datex">(<?=datethai(date("Y-m-d"),"day")?>)</span></caption>
<thead>
    <tr>
        <th>รหัสสมาชิก</th>
        <th>ชื่อ - นามสกุล</th>
        <th>อีเมล</th>
        <th>ผู้แนะนำ</th>
        <th>รหัสผ่าน</th>
        <th>เพศ</th>
        <th>เลขบัตรประชาชน</th>
        <th>ที่อยู่</th>
        <th>จังหวัด</th>
        <th>รหัสไปรษณีย์</th>
        <th>โทรศัพท์</th>
        <th>มือถือ</th>
        <th>เลขที่บัญชีธนาคาร</th>
        <th>ธนาคาร</th>
        <th>ชื่อบัญชี</th>
        <th>ประเภทบัญชี</th>
        <th>สาขา</th>
        <th>วันที่สมัครสมาชิก</th>
    </tr>
</thead>
<tbody>
    <? 
    $dcm="select system_member.*, system_reply.* from system_member left join system_reply on (system_member.sm_id=system_reply.sr_sm_id) where system_member.sm_level!='9'";
    $j=0;
    $jc=queryx2($dcm." order by system_member.sm_date_regist DESC"); 
    while($ftc=mysql_fetch_array($jc)){ $j++;
    ?>
    <tr <? if($j%2!=0){?>class="odd"<? }?>>
        <td><?=$ftc['sm_code'];?></td>
        <td><?=$ftc['sm_name'];?></td>
        <td><?=$ftc['sm_email'];?></td>
        <td><?=readname('sm_name','system_member','sm_id',$ftc['sr_target']);?></td>
        <td><?=$ftc['sm_pass'];?></td>
        <td><?=$ftc['sm_sex']==1?"=ชาย":"หญิง";?></td>
        <td><?=$ftc['sm_pid'];?></td>
        <td><?=$ftc['sm_addr'];?></td>
        <td><?=readname("sd_name","system_district","sd_id",$ftc['sm_district']);?></td>
        <td><?=$ftc['sm_postcode'];?></td>
        <td><?=$ftc['sm_htel'];?></td>
        <td><?=$ftc['sm_mtel'];?></td>
        <td><?=$ftc['sm_bank_acc'];?></td>
        <td><?=$ftc['sm_bank_name'];?></td>
        <td><?=$ftc['sm_bank_id'];?></td>
        <td><?=$ftc['sm_bank_type'];?></td>
        <td><?=$ftc['sm_bank_area'];?></td>
        <td><?=datethai($ftc['sm_date_regist'],'day');?></td>
    </tr>
    <? }?>
</tbody>
</table>
<? }elseif($mcase==2){?>
<table>
<caption>รายงานสมาชิกในระบบสายงาน <?=$www;?> <span class="datex">(<?=datethai(date("Y-m-d"),"day")?>)</span></caption>
<thead>
    <tr>
        <th>รหัสสมาชิก</th>
        <th>ชื่อ - นามสกุล</th>
        <th>อีเมล</th>
        <th>อัฟไลน์</th>
        <th>ผู้แนะนำตรง</th>
        <th>เริ่มสมัครวีไอพี</th>
        <th>ต่ออายุวีไอพี</th>
        <th>หมดอายุวีไอพี</th>
        <th>แผนการต่ออายุ</th>
        <th>สถานะสมาชิก</th>
    </tr>
</thead>
<tbody>
    <? 
    $pps="select system_member.*, system_liner.* from system_liner left join system_member on system_member.sm_id=system_liner.sli_sr_reply where system_member.sm_level!='9'";

    $mrule=$_GET['mrule'];
	if($mrule==1){
		$pps.=" and sli_vip='1'";
	}else if($mrule==2){
		$pps.=" and sli_vip='0'";
	}else if($mrule==3){
		$pps.=" and sli_plane='0'";
	}else if($mrule==4){
		$datestart=$_POST['datestart'];
		$datend=$_POST['datend'];
		if($datestart!="1970-01-01" or $datend!="1970-01-01"){
			$pps.=" and sli_upd between '$datestart' and '$datend'";
		}
	}
    
    $jc=queryx2($pps." order by system_liner.sli_upd DESC"); 
	$check=mysql_num_rows($jc);
	if($check>0){
    while($ftc=mysql_fetch_array($jc)){
    ?>
    <tr>
        <td><?=$ftc['sm_code'];?></td>
        <td><?=$ftc['sm_name'];?></td>
        <td><?=$ftc['sm_email'];?></td>
        <td><?=readname('sm_name','system_member','sm_id',$ftc['sli_sr_target']);?></td>
        <td><?=readname('sm_name','system_member','sm_id',$ftc['sli_sr_direct']);?></td>
        <td><?=datethai($ftc['sli_upd'],'day');?></td>
        <td><?=datethai($ftc['sli_renew'],'day');?></td>
        <td><?=datethai($ftc['sli_expire'],'day');?></td>
        <td><?=viptimeshow($ftc['sli_plane']);?></td>
        <td align="center">
		<? if($ftc['sli_vip']==1){?>
        <span class="uservip">วีไอพี</span>
        <? }else{?>
        <span class="usernormal">ปกติ/span>
        <? }?></td>
    </tr>
    <? }
	}else{?>
    <tr><td align="center" colspan="10">ไม้พบข้อมูล</td></tr>
    <? }?>
</tbody>
</table>
<? }?>
</body>
</html>