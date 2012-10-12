<? 
$link=$_SERVER['PHP_SELF'];
require_once('../config/connect.php');
require_once('../config/function.php');
require_once('setting.php');

$name=$_GET['name']; $titles=$name."_".date("d-m-Y");

$casy=$_GET['casy']; $id=$_GET['id'];

if($casy=="pvmanage"){
$strWordFileName    =    $titles.".doc";

header("Content-Type: application/vnd.ms-word; name=\"$strWordFileName\"");
header("Content-Disposition: inline; filename=\"$strWordFileName\"");
header("Pragma: no-cache");

echo '<html xmlns:o="urn:schemas-microsoft-com:office:office"
xmlns:x="urn:schemas-microsoft-com:office:word"
xmlns="http://www.w3.org/TR/REC-html40">';

}?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?=$titles;?></title>

<link rel="stylesheet" media="all" HREF="http://<?=$www;?>/liner/css/reset.css" />
<link rel="stylesheet" media="all" HREF="http://<?=$www;?>/liner/css/style.css" />
<link rel="stylesheet" media="all" HREF="http://<?=$www;?>/liner/css/messages.css" />
<link rel="stylesheet" media="all" HREF="http://<?=$www;?>/liner/css/forms.css" />
<link rel="stylesheet" media="all" HREF="http://<?=$www;?>/liner/css/tables.css" />
<link rel="stylesheet" href="http://jquery.bassistance.de/treeview/jquery.treeview.css" type="text/css" />

<link rel="stylesheet" type="text/css" href="http://<?=$www;?>/liner/css/custom-style.css" media="all" />
<!-- html5 js -->
<script SRC="http://<?=$www;?>/liner/js/html5.js"></script>
<!--[if lte IE 9]>
<link rel="stylesheet" media="screen" href="css/ie.css" />
<script type="text/javascript" src="http://<?=$www;?>/liner/js/ie.js"></script>
<![endif]-->
<style type="text/css" media="print">
	
	body{
		font-size:10px;
		font-weight:normal;
		margin:0;
		padding:0;
	}
	/**
 * Grids
 */
.grid_1,
.grid_2,
.grid_3,
.grid_4,
.grid_5,
.grid_6,
.grid_7,
.grid_8 {
    margin-left:15px;
    display:block;
    float:left;
	page-break-inside:auto;
}
.columns {
    display:block;
    float:left;
}
.first {
    margin-left:0;
    clear:left;
}
.leading {
    margin-bottom:18px;
}
.top {
    margin-top:18px;
}
.grid_1 {
    width:88px;
}
.grid_2 {
    width:214px;
}
.grid_3 {
    width:340px;
}
.grid_4 {
    width:466px;
}
.grid_5 {
    width:592px;
}
.grid_6 {
    width:695px;
}
.grid_7 {
    width:844px;
}
.grid_8 {
    margin-left:0;
    width: 970px;
}
a.button{
	display:none;
}
div.break{
	page-break-before:always;
	page-break-after:auto;
}
table{
	border-collapse:collapse;
	width:100%;
	height:auto;
}
</style>
</head>

<body>
<?
if($casy=="checkliner"){
$requireply=queryx1("select * from system_liner where sli_id='$id'");
$target=$requireply['sli_sr_target'];
$reply=$requireply['sli_sr_reply'];

$jojo=queryx1("select * from system_member where sm_id='$reply'");	
?>
<h1><?=$name;?></h1>
<hr />
<div class="columns leading">
    <div class="grid_3 first">
    	<div class="widget">
        <header><h2>ข้อมูลสมาชิก</h2> </header>
        <section>
        <table class="no-style full">
            <tbody>
            	<tr>
                    <td><b>รหัสสมาชิก</b></td>
                    <td><?=$jojo['sm_code'];?></td>
                </tr>
                <tr>
                    <td><b>ชื่อ - นามสกุล</b></td>
                    <td><?=$jojo['sm_name'];?></td>
                </tr>
                <tr>
                    <td><b>สมัครเมื่อ</b></td>
                    <td><?=datethai($jojo['sm_date_regist'],'day');?></td>
                </tr>
                <tr>
                    <td><b>ลิงค์ผู้แนะนำ</b></td>
                    <td>http://<?=$www;?>/?<? echo readname("sa_www","system_account","sa_sm_id",$jojo['sm_id']);?></td>
                </tr>
                <tr>
                    <td><b>อีเมล์</b></td>
                    <td><?=$jojo['sm_email'];?></td>
                </tr>
                <tr>
                    <td><b>โทรศัพท์</b></td>
                    <td><?=$jojo['sm_htel'];?></td>
                </tr>
                <tr>
                    <td><b>โทรศัพท์มือถือ</b></td>
                    <td><?=$jojo['sm_mtel'];?></td>
                </tr>
                <tr>
                    <td><b>ที่อยู่</b></td>
                    <td><?=$jojo['sm_addr'].", ".$jojo['sm_postcode'].", ".readname("sd_name","system_district","sd_id",$jojo['sm_district']);?></td>
                </tr>
                <tr>
                    <td><b>ธนาคาร</b></td>
                    <td><?=$jojo['sm_bank_name'];?> สาขา <?=$jojo['sm_bank_area'];?></td>
                </tr>
                <tr>
                    <td><b>เลขที่บัญชี</b></td>
                    <td><?=$jojo['sm_bank_id'];?></td>
                </tr>
                <tr>
                    <td><b>ชื่อบัญชี</b></td>
                    <td><?=$jojo['sm_bank_acc'];?></td>
                </tr>
                <tr>
                    <td><b>ประเภทบัญชี</b></td>
                    <td><?=$jojo['sm_bank_type'];?></td>
                </tr>
            </tbody>
        </table>
        </section>
        </div>
    </div>
<?
$jeje=queryx1("select * from system_member where sm_id='$target'");
?>
	<div class="grid_3">
        <div class="widget">
        <header><h2>ข้อมูลอัฟไลน์</h2></header>
            <section>
            <table class="no-style full">
                <tbody>
                    <tr>
                        <td><b>รหัสสมาชิก</b></td>
                        <td><?=$jeje['sm_code'];?></td>
                    </tr>
                    <tr>
                        <td><b>ชื่อ - นามสกุล</b></td>
                        <td><?=$jeje['sm_name'];?></td>
                    </tr>
                    <tr>
                        <td><b>สมัครเมื่อ</b></td>
                        <td><?=datethai($jeje['sm_date_regist'],'day');?></td>
                    </tr>
                    <tr>
                        <td><b>ลิงค์ผู้แนะนำ</b></td>
                        <td>http://<?=$www;?>/?<? echo readname("sa_www","system_account","sa_sm_id",$jeje['sm_id']);?></td>
                    </tr>
                    <tr>
                        <td><b>อีเมล์</b></td>
                        <td><?=$jeje['sm_email'];?></td>
                    </tr>
                    <tr>
                        <td><b>โทรศัพท์</b></td>
                        <td><?=$jeje['sm_htel'];?></td>
                    </tr>
                    <tr>
                        <td><b>โทรศัพท์มือถือ</b></td>
                        <td><?=$jeje['sm_mtel'];?></td>
                    </tr>
                    <tr>
                        <td><b>ที่อยู่</b></td>
                        <td><?=$jeje['sm_addr'].", ".$jeje['sm_postcode'].", ".readname("sd_name","system_district","sd_id",$jeje['sm_district']);?></td>
                    </tr>
                    <tr>
                        <td><b>ธนาคาร</b></td>
                        <td><?=$jeje['sm_bank_name'];?> สาขา <?=$jeje['sm_bank_area'];?></td>
                    </tr>
                    <tr>
                        <td><b>เลขที่บัญชี</b></td>
                        <td><?=$jeje['sm_bank_id'];?></td>
                    </tr>
                    <tr>
                        <td><b>ชื่อบัญชี</b></td>
                        <td><?=$jeje['sm_bank_acc'];?></td>
                    </tr>
                    <tr>
                        <td><b>ประเภทบัญชี</b></td>
                        <td><?=$jeje['sm_bank_type'];?></td>
                    </tr>
                </tbody>
            </table>
            </section>
    	</div>
    </div>
    
     <div class="columns leading">
        <div class="grid_3 first">
            <h4><img src="images/icon/002.png" /> สถิติบัญชี</h4>
            <hr/>
            <table class="no-style full">
                <tbody>
                    <tr>
                        <td><img src="images/icon/033.png" /> สถานะปัจจุบัน</td>
                        <td class="ar"><? if($requireply['sli_vip']==1){?>บัญชีวีไอพี<? }else{?>บัญชีปกติ<? }?></td>
                    </tr>
                    <tr>
                        <td><img src="images/icon/025.png" /> วันที่เปิดบัญชีวีไอพี</td>
                        <td class="ar"><?=datethai($requireply['sli_upd'],'day');?></td>
                    </tr>
                    <tr>
                        <td><img src="images/icon/053.png" /> ต่ออายุสมาชิกวีไอพีล่าสุด</td>
                        <td class="ar"><?=datethai($requireply['sli_renew'],'dtime');?></td>
                    </tr>
                    <tr>
                        <td><img src="images/icon/052.png" /> หมดอายุสมาชิกวันที่</td>
                        <td class="ar"><?=datethai($requireply['sli_expire'],'dtime');?></td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="grid_3">
            <h4><img src="images/icon/081.png" /> สถิติสายงาน</h4>
             <? /* ******************** check member reply ******************** */
			include_once('module/adminna_chek_liner.php');
			?>
            <hr/>
            <table class="no-style full">
                <tbody>
                	<tr>
                        <td><img src="images/icon/chart_organisation.png" /> การต่อสายงานทั้งหมด</td>
                        <td class="ar"><?=$chkl;?></td>
                        <td class="ar">ชั้น</td>
                    </tr>
                    <tr>
                        <td><img src="images/icon/ruby.png" /> สมาชิกเต็มชั้น</td>
                        <td class="ar"><?=$chkf==""?"0":$chkf;?></td>
                        <td class="ar">ชั้น</td>
                    </tr>
                    <tr>
                        <td><img src="images/icon/group_link.png" /> สมาชิกในสายงานทั้งหมด</td>
                        <td class="ar"><?=$numall;?></td>
                        <td class="ar">คน</td>
                    </tr>
                    <tr>
                        <td><img src="images/icon/status_online.png" /> สมาชิกในสายงานวีไอพี</td>
                        <td class="ar"><?=$numvip;?></td>
                        <td class="ar">คน</td>
                    </tr>
                    <tr>
                        <td><img src="images/icon/status_offline.png" /> สมาชิกในสายงานปกติ</td>
                        <td class="ar"><?=$numnor;?></td>
                        <td class="ar">คน</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
    
	<div class="grid_6 first">
    	<? include('module/checkliner.php');?>	
    </div>
    
    <div class="clear"></div>
    
    <div align="center">
    	<a href="javascript:void(0);" onclick="javascript:window.print();" class="button button-orange">พิมพ์รายงาน</a>
    </div>
    
    </div>
</div>
<? }elseif($casy=="pvmanage"){
$requireply=queryx1("select * from system_liner where sli_id='$id'");
$reply=$requireply['sli_sr_reply'];

$jojo=queryx1("select * from system_member where sm_id='$reply'");		
?>
<div style="position:fixed; top:10%; left:750px;">
    <a href="javascript:void(0);" onclick="javascript:window.print();" class="button button-orange">พิมพ์รายงาน</a>
</div>
<table>
<tr>
	<td colspan="2">
		<h1><?=$name;?></h1>
	</td>
</tr>
<tr>
    <td colspan="2">
    <div class="grid_6 first">
        <div class="widget">
        <header><h2><img src="http://<?=$www;?>/liner/images/icon/002.png" /> ข้อมูลบัญชีผู้ใช้</h2> </header>
        <section>
        <table class="no-style full">
            <tbody>
                <tr>
                    <td><b>รหัสสมาชิก</b></td>
                    <td><?=$jojo['sm_code'];?></td>
                </tr>
                <tr>
                    <td><b>ชื่อ - นามสกุล</b></td>
                    <td><?=$jojo['sm_name'];?></td>
                </tr>
                <tr>
                    <td><b>สมัครเมื่อ</b></td>
                    <td><?=datethai($jojo['sm_date_regist'],'day');?></td>
                </tr>
                <tr>
                    <td><b>ลิงค์ผู้แนะนำ</b></td>
                    <td>http://<?=$www;?>/?<? echo readname("sa_www","system_account","sa_sm_id",$jojo['sm_id']);?></td>
                </tr>
            </tbody>
        </table>
        </section>
        </div>
    </div>
</td>
</tr>
<tr>
	<td>
    <div class="grid_3 first">
        <div class="widget">
        <header><h2><img src="http://<?=$www;?>/liner/images/icon/048.png" /> ข้อมูลการติดต่อ</h2></header>
            <section>
            <table class="no-style full">
                <tbody>
                <tr>
                    <td><b>อีเมล์</b></td>
                    <td><?=$jojo['sm_email'];?></td>
                </tr>
                <tr>
                    <td><b>โทรศัพท์</b></td>
                    <td><?=$jojo['sm_htel'];?></td>
                </tr>
                <tr>
                    <td><b>มือถือ</b></td>
                    <td><?=$jojo['sm_mtel'];?></td>
                </tr>
                <tr>
                    <td><b>ที่อยู่</b></td>
                    <td><?=$jojo['sm_addr'].", ".$jojo['sm_postcode'].", ".readname("sd_name","system_district","sd_id",$jojo['sm_district']);?></td>
                </tr>
                </tbody>
            </table>
            </section>
        </div>
    </div>
    </td>
	<td>
    <div class="grid_3">
        <div class="widget">
        <header><h2><img src="http://<?=$www;?>/liner/images/icon/coins.png" /> ข้อมูลบัญชีธนาคาร</h2></header>
            <section>
            <table class="no-style full">
                <tbody>
                    <tr>
                        <td><b>ธนาคาร</b></td>
                        <td><?=$jojo['sm_bank_name'];?> สาขา <?=$jojo['sm_bank_area'];?></td>
                    </tr>
                    <tr>
                        <td><b>เลขที่บัญชี</b></td>
                        <td><?=$jojo['sm_bank_id'];?></td>
                    </tr>
                    <tr>
                        <td><b>ชื่อบัญชี</b></td>
                        <td><?=$jojo['sm_bank_acc'];?></td>
                    </tr>
                    <tr>
                        <td><b>ประเภทบัญชี</b></td>
                        <td><?=$jojo['sm_bank_type'];?></td>
                    </tr>
                </tbody>
            </table>
            </section>
        </div>
    </div>
	</td>
</tr>
<tr>
	<td>
    <div class="grid_3 first">
        <h4><img src="http://<?=$www;?>/liner/images/icon/calculator.png" /> ยอด รายได้</h4>
        <hr/>
        <table class="no-style full">
                <tbody>
                    <tr>
                        <td><img src="http://<?=$www;?>/liner/images/icon/flag_blue.png"/> ยอดสะสมรายได้ทั้งหมด</td>
                        <td class="ar"><? $x1=queryx1("select sum(spi_pt) as x1 from system_point where sli_id='".$reply."' and spi_cut='1'"); echo number_format($x1['x1']);?></td>
                        <td class="ar">บาท</td>
                    </tr>
                    <tr>
                        <td><img src="http://<?=$www;?>/liner/images/icon/calendar_link.png" /> ยอดสะสมรายได้ปัจจุบัน</td>
                        <td class="ar">
						<? $x3=queryx1("select sum(spi_pt) as x3 from system_point where sli_id='".$reply."' and spi_cut='0'"); echo number_format($x3['x3']);?></td>
                        <td class="ar">บาท</td>
                    </tr>
                    <tr>
                        <td><img src="http://<?=$www;?>/liner/images/icon/layers.png" /> รายการรายได้ได้รับทั้งหมด</td>
                        <td class="ar"><?=countl3("select spi_id from system_point where sli_id='$reply'");?></td>
                        <td class="ar">รายการ</td>
                    </tr>
                    <tr>
                        <td><img src="http://<?=$www;?>/liner/images/icon/money_dollar.png" /> รายการรายได้ได้รับปัจจุบัน</td>
                        <td class="ar"><?=countl3("select spi_id from system_point where sli_id='$reply' and spi_cut='0'");?></td>
                        <td class="ar">รายการ</td>
                    </tr>
                </tbody>
            </table>
    </div>
	</td>
	<td>
    <div class="grid_3">
        <h4><img src="http://<?=$www;?>/liner/images/icon/page_white_h.png" /> รายการเบิกถอน</h4>
        <? /* ******************** check member reply ******************** */
        include_once('module/adminna_chek_liner.php');
        ?>
        <hr/>
        <table class="no-style full">
                <tbody>
                	<tr>
                        <td><img src="http://<?=$www;?>/liner/images/icon/page_white_stack.png" /> จำนวนรอบตัดยอดทั้งหมด</td>
                        <td class="ar" colspan="2"><?=countl3("select stl_id from system_bill_list where sli_sr_reply='$reply'");?> รอบ</td>
                        <td class="ar"><? $g1=queryx1("select sum(stl_pv) as pva from system_bill_list where sli_sr_reply='$reply'"); echo number_format($g1['pva']);?></td>
                        <td class="ar">บาท</td>
                    </tr>
                    <tr>
                        <td> <? $g2=queryx1("select * from system_bill_list where sli_sr_reply='$reply' order by sbl_id DESC limit 1");?>
                        <img src="http://<?=$www;?>/liner/images/icon/page_white_medal.png" /> รอบตัดยอดล่าสุด</td>
                        <td class="ar">วันที่ : <?=datethai($g2['stl_date'],'day');?></td>
                        <td class="ar">รอบที่ : <?=$g2['sbl_id'];?></td>
                        <td class="ar"><?=number_format($g2['stl_pv']);?></td>
                        <td class="ar">บาท</td>
                    </tr>
                    <tr>
                        <td> <img src="http://<?=$www;?>/liner/images/icon/page_white_link.png" /> รอบตัดยอดปัจจุบัน</td>
                        <td class="ar" colspan="2">รอบที่ : <?=$g2['sbl_id']+1;?></td>
                        <td class="ar"><? $g3=queryx1("select sum(spi_pt) as g3 from system_point where sli_id='$reply' and spi_cut='0'"); 
						echo number_format($g3['g3']);?></td>
                        <td class="ar">บาท</td>
                    </tr>
                </tbody>
            </table>
    </div>
    </td>
</tr>
<tr>
	<td colspan="2">
    <div class="break"></div>    
    
    <div class="grid_6 first">
    <h4>รายการรายได้ทั้งหมด เรียงตามวันที่ได้รับล่าสุด</h4>
    <p style="margin:0; padding:0 0 10px 0;"><img src="http://<?=$www;?>/liner/images/icon/arrow_circle_double.png" /> รอตัดยอด <img src="http://<?=$www;?>/liner/images/icon/accept.png" /> ตัดยอดแล้ว</p>
    <table class="paginate sortable full bordered">
        <thead>
            <tr>
                <th width="20">รายการ</th>
                <th width="20">สถานะ</th>
                <th width="120">วันที่</th>
                <th>เงือนไขการจ่าย</th>
                <th width="80">จำนวน บาท</th>
                <th>เพิ่มเติม</th>
            </tr>
        </thead>
        <tbody>
            <? $pi1=queryx2("select * from system_point where sli_id='$reply' order by spi_upd DESC"); $pin=0;
            while($ftc=mysql_fetch_array($pi1)){$pin++;
            ?>
            <tr>
                <td align="center"><?=$pin;?></td>
                <td align="center"><?=$ftc['spi_cut']=="0"?"<img src=\"http://".$www."/liner/images/icon/arrow_circle_double.png\" />":"<img src=\"http://".$www."/liner/images/icon/accept.png\" />";?></td>
                <td><?=datethai($ftc['spi_upd'],'dtime');?></td>
                <td><?=ruletopay($ftc['spi_rule']);?></td>
                <td align="right"><?=$ftc['spi_pt'];?> บาท</td>
                <td><?=$ftc['spi_note'];?></td>
            </tr>
            <? }?>
        </tbody>
    </table>
    </div>
    </td>
</tr>
<tr>
	<td colspan="2">
    <div class="grid_6 first">
    <h4>รายการ รายได้ ถอนทั้งหมด เรียงตามวันที่ถอนล่าสุด</h4>
    <table class="paginate sortable full">
        <thead>
            <tr>
                <th>รอบที่</th>
                <th>วันที่</th>
                <th>รายได้ได้รับ</th>
            </tr>
        </thead>
        <tbody>
            <? $pi2=queryx2("select * from system_bill_list where sli_sr_reply='$reply' order by sbl_id ASC");
            while($ftc2=mysql_fetch_array($pi2)){$pin++;
            ?>
            <tr>
                <td align="center"><?=$ftc2['sbl_id'];?></td>
                <td align="center"><?=datethai($ftc2['stl_date'],'day');?></td>
                <td align="center"><?=number_format($ftc2['stl_pv']);?> บาท</td>
            </tr>
            <? }?>
        </tbody>
    </table>
    </div>
	</td>
</tr>
</table>
<? }elseif($casy=="viprenew"){ $xd=date("Y-m-d H:i:s");
$requireply=queryx1("select * from system_liner where sli_id='$id'");
$reply=$requireply['sli_sr_reply'];
$dend=round(DateDiff($xd,$requireply['sli_expire']));
$jojo=queryx1("select * from system_member where sm_id='$reply'");		
?>
<h1><?=$name;?></h1>
<div class="columns leading">
    
    <div class="grid_2 first">
    	<div class="widget">
        <header><h2><img src="images/icon/002.png" /> ข้อมูลบัญชีผู้ใช้</h2> </header>
        <section>
        <table class="no-style full">
            <tbody>
            	<tr>
                    <td><b>รหัสสมาชิก</b></td>
                    <td><?=$jojo['sm_code'];?></td>
                </tr>
                <tr>
                    <td><b>ชื่อ - นามสกุล</b></td>
                    <td><?=$jojo['sm_name'];?></td>
                </tr>
                <tr>
                    <td><b>สมัครเมื่อ</b></td>
                    <td><?=datethai($jojo['sm_date_regist'],'day');?></td>
                </tr>
                <tr>
                    <td><b>ลิงค์ผู้แนะนำ</b></td>
                    <td>http://<?=$www;?>/?<? echo readname("sa_www","system_account","sa_sm_id",$jojo['sm_id']);?></td>
                </tr>
            </tbody>
        </table>
        </section>
        </div>
    </div>
	<div class="grid_2">
        <div class="widget">
        <header><h2><img src="images/icon/048.png" /> ข้อมูลการติดต่อ</h2></header>
            <section>
            <table class="no-style full">
                <tbody>
                <tr>
                    <td><b>อีเมล์</b></td>
                    <td><?=$jojo['sm_email'];?></td>
                </tr>
                <tr>
                    <td><b>โทรศัพท์</b></td>
                    <td><?=$jojo['sm_htel'];?></td>
                </tr>
                <tr>
                    <td><b>มือถือ</b></td>
                    <td><?=$jojo['sm_mtel'];?></td>
                </tr>
                <tr>
                    <td><b>ที่อยู่</b></td>
                    <td><?=$jojo['sm_addr'].", ".$jojo['sm_postcode'].", ".readname("sd_name","system_district","sd_id",$jojo['sm_district']);?></td>
                </tr>
                </tbody>
            </table>
            </section>
    	</div>
   </div>
   <div class="grid_2">
        <div class="widget">
        <header><h2><img src="images/icon/coins.png" /> ข้อมูลบัญชีธนาคาร</h2></header>
            <section>
            <table class="no-style full">
                <tbody>
                    <tr>
                        <td><b>ธนาคาร</b></td>
                        <td><?=$jojo['sm_bank_name'];?> สาขา <?=$jojo['sm_bank_area'];?></td>
                    </tr>
                    <tr>
                        <td><b>เลขที่บัญชี</b></td>
                        <td><?=$jojo['sm_bank_id'];?></td>
                    </tr>
                    <tr>
                        <td><b>ชื่อบัญชี</b></td>
                        <td><?=$jojo['sm_bank_acc'];?></td>
                    </tr>
                    <tr>
                        <td><b>ประเภทบัญชี</b></td>
                        <td><?=$jojo['sm_bank_type'];?></td>
                    </tr>
                </tbody>
            </table>
            </section>
    	</div>
    </div>
    
    <div class="clear"></div>
    
    <div class="grid_6 first">
    	<div class="panel">
        <header><h2><img src="images/icon/081.png" /> สถิติการต่ออายุสมาชิก</h2></header>
        <hr />
            <section>
            <table class="no-style full">
                <tbody>
                <tr>
                    <td>จำนวนการต่ออายุ</td>
                    <td class="ar"><?=countl3("select srn_id from system_renew where sli_id='$reply'");?> ครั้ง</td>
                </tr>
                <tr>
                    <td>ต่ออายุครั้งล่าสุด</td>
                    <td class="ar"><?=datethai($requireply['sli_renew'],'dtime');?></td>
                </tr>
                <tr>
                    <td>แผนการต่ออายุล่าสุด</td>
                    <td class="ar"><?=viptimeshow($requireply['sli_plane']);?></td>
                </tr>
                <tr>
                    <td>วันหมดอายุ</td>
                    <td class="ar"><?=datethai($requireply['sli_expire'],'dtime');?></td>
                </tr>
                <tr>
                    <td>วันคงเหลือ</td>
                    <td class="ar"><?=$dend;?> วัน</td>
                </tr>
                </tbody>
            </table>
            </section>
    	</div>
    </div>    
    
    <div class="grid_6 first">
    	<div class="panel">
    	<header><h2><img src="images/icon/187.png" /> รายการการต่ออายุสมาชิก</h2></header>
        <table class="no-style full">
            <thead>
                <tr style="text-align:left;">
                    <th>รายการที่</th>
                    <th>แผนการต่ออายุ</th>
                    <th>วันที่ต่ออายุ</th>
                </tr>
            </thead>
            <tbody>
                <? $pi1=queryx2("select * from system_renew where sli_id='$reply' order by srn_upd DESC"); $pin=0;
                while($ftc=mysql_fetch_array($pi1)){$pin++;
                ?>
                <tr>
                    <td><?=$pin;?></td>
                    <td><?=viptimeshow($ftc['srn_plane']);?></td>
                    <td><?=datethai($ftc['srn_upd'],'dtime');?></td>
                </tr>
                <? }?>
            </tbody>
        </table>
        </div>
    </div>
    
    <div class="clear"></div>
    
    <div align="center">
    	<a href="#" onclick="javascript:window.print();" class="button button-orange">พิมพ์รายงาน</a>
    </div>
    
</div>
<? }elseif($casy=="payrefer"){$requireply=queryx1("select * from system_liner where sli_id='$id'");
$target=$requireply['sli_sr_target'];
$reply=$requireply['sli_sr_reply'];

$jojo=queryx1("select * from system_member where sm_id='$reply'");	
?>
<h1><?=$name;?></h1>
<hr />
<div class="columns leading">
    <div class="grid_6 first">
    	<div class="widget">
        <header><h2>ข้อมูลสมาชิก</h2> </header>
        <section>
        <table class="no-style full">
            <tbody>
            	<tr>
                    <td><b>รหัสสมาชิก</b></td>
                    <td><?=$jojo['sm_code'];?></td>
                </tr>
                <tr>
                    <td><b>ชื่อ - นามสกุล</b></td>
                    <td><?=$jojo['sm_name'];?></td>
                </tr>
                <tr>
                    <td><b>สมัครเมื่อ</b></td>
                    <td><?=datethai($jojo['sm_date_regist'],'day');?></td>
                </tr>
                <tr>
                    <td><b>ลิงค์ผู้แนะนำ</b></td>
                    <td>http://<?=$www;?>/?<? echo readname("sa_www","system_account","sa_sm_id",$jojo['sm_id']);?></td>
                </tr>
                <tr>
                    <td><b>อีเมล์</b></td>
                    <td><?=$jojo['sm_email'];?></td>
                </tr>
                <tr>
                    <td><b>โทรศัพท์</b></td>
                    <td><?=$jojo['sm_htel'];?></td>
                </tr>
                <tr>
                    <td><b>โทรศัพท์มือถือ</b></td>
                    <td><?=$jojo['sm_mtel'];?></td>
                </tr>
                <tr>
                    <td><b>ที่อยู่</b></td>
                    <td><?=$jojo['sm_addr'].", ".$jojo['sm_postcode'].", ".readname("sd_name","system_district","sd_id",$jojo['sm_district']);?></td>
                </tr>
                <tr>
                    <td><b>ธนาคาร</b></td>
                    <td><?=$jojo['sm_bank_name'];?> สาขา <?=$jojo['sm_bank_area'];?></td>
                </tr>
                <tr>
                    <td><b>เลขที่บัญชี</b></td>
                    <td><?=$jojo['sm_bank_id'];?></td>
                </tr>
                <tr>
                    <td><b>ชื่อบัญชี</b></td>
                    <td><?=$jojo['sm_bank_acc'];?></td>
                </tr>
                <tr>
                    <td><b>ประเภทบัญชี</b></td>
                    <td><?=$jojo['sm_bank_type'];?></td>
                </tr>
            </tbody>
        </table>
        </section>
        </div>
    </div>
    <div class="clear"></div>
<div class="grid_6 first">
    <h5>รายการแจ้งถอนเงินล่าสุด</h5>
    <table class="datatable paginate sortable full">
        <thead>
            <tr>
                <th>ที่</th>
                <th>วันที่แจ้ง</th>
                <th>ยอด รายได้</th>
                <th>สถานะ</th>
                <th>ผลตอบกลับ</th>
            </tr>
        </thead>
        <tbody>
             <? $no=0;
             $jc=queryx2("select * from system_point_dra where sli_id = '$reply' order by spr_date DESC"); $cn=mysql_num_rows($jc); if($cn>0){ while($llc=mysql_fetch_array($jc)){$no++;
             if($llc['spr_ck']==0){$cd="<span class='grayx'>รอการยืนยัน</span>";}elseif($llc['spr_ck']==1){$cd="<span class='greenx'>ยีนยันเรียบร้อย</span>";}elseif($llc['spr_ck']==2){$cd="<span class='redx'>ปฏิเสธ</span>";}
             ?>
            <tr>
                <td align="center"><?=$no;?></td>
                <td><?=datethai($llc['spr_date'],'dtime');?></td>
                <td align="right"><?=$llc['spr_pt'];?> บาท</td>
                <td align="center"><?=$cd;?></td>
                <td><?=$llc['spr_comment'];?></td>
            </tr>
            <? }}else{?><tr><td align="center" colspan="6">ไม่พบรายการแจ้งถอนเงินตามที่ค้นหา หรือ ยังไม่มีรายการแจ้งถอนเงินในขณะนี้</td></tr><? }?>
        </tbody>
    </table>
    
    <div class="clear"></div>
    <br />
    <div align="center">
    	<a href="#" onclick="javascript:window.print();" class="button button-orange">พิมพ์รายงาน</a>
    </div>
    
</div>
<? }elseif($casy=="payrecieve"){$requireply=queryx1("select * from system_liner where sli_id='$id'");
$target=$requireply['sli_sr_target'];
$reply=$requireply['sli_sr_reply'];

$jojo=queryx1("select * from system_member where sm_id='$reply'");	
?>
<h1><?=$name;?></h1>
<hr />
<div class="columns leading">
    <div class="grid_6 first">
    	<div class="widget">
        <header><h2>ข้อมูลสมาชิก</h2> </header>
        <section>
        <table class="no-style full">
            <tbody>
            	<tr>
                    <td><b>รหัสสมาชิก</b></td>
                    <td><?=$jojo['sm_code'];?></td>
                </tr>
                <tr>
                    <td><b>ชื่อ - นามสกุล</b></td>
                    <td><?=$jojo['sm_name'];?></td>
                </tr>
                <tr>
                    <td><b>สมัครเมื่อ</b></td>
                    <td><?=datethai($jojo['sm_date_regist'],'day');?></td>
                </tr>
                <tr>
                    <td><b>ลิงค์ผู้แนะนำ</b></td>
                    <td>http://<?=$www;?>/?<? echo readname("sa_www","system_account","sa_sm_id",$jojo['sm_id']);?></td>
                </tr>
                <tr>
                    <td><b>อีเมล์</b></td>
                    <td><?=$jojo['sm_email'];?></td>
                </tr>
                <tr>
                    <td><b>โทรศัพท์</b></td>
                    <td><?=$jojo['sm_htel'];?></td>
                </tr>
                <tr>
                    <td><b>โทรศัพท์มือถือ</b></td>
                    <td><?=$jojo['sm_mtel'];?></td>
                </tr>
                <tr>
                    <td><b>ที่อยู่</b></td>
                    <td><?=$jojo['sm_addr'].", ".$jojo['sm_postcode'].", ".readname("sd_name","system_district","sd_id",$jojo['sm_district']);?></td>
                </tr>
                <tr>
                    <td><b>ธนาคาร</b></td>
                    <td><?=$jojo['sm_bank_name'];?> สาขา <?=$jojo['sm_bank_area'];?></td>
                </tr>
                <tr>
                    <td><b>เลขที่บัญชี</b></td>
                    <td><?=$jojo['sm_bank_id'];?></td>
                </tr>
                <tr>
                    <td><b>ชื่อบัญชี</b></td>
                    <td><?=$jojo['sm_bank_acc'];?></td>
                </tr>
                <tr>
                    <td><b>ประเภทบัญชี</b></td>
                    <td><?=$jojo['sm_bank_type'];?></td>
                </tr>
            </tbody>
        </table>
        </section>
        </div>
    </div>
    <div class="clear"></div>
<h4>รายการ รายได้ ถอนทั้งหมด เรียงตามวันที่ถอนล่าสุด</h4>
<table class="datatable paginate sortable full">
    <thead>
        <tr>
            <th>วันที่แจ้ง</th>
            <th>รหัสสมาชิก</th>
            <th>ชื่อ - นามสกุล</th>
            <th>ยอดเงิน</th>
            <th>สถานะ</th>
            <th>คำสั่ง</th>
        </tr>
    </thead>
    <tbody>
         <? $jc=queryx2("select system_point_dra.*, system_member.sm_code, system_member.sm_name from system_point_dra left join system_member on system_point_dra.sli_id= system_member.sm_id where sli_id='$reply' order by system_point_dra.spr_date DESC"); $cn=mysql_num_rows($jc); if($cn>0){ while($llc=mysql_fetch_array($jc)){
            
            if($llc['spr_ck']==0){$bl="<span class='grayx'>รอการยืนยัน</span>";}elseif($llc['spr_ck']==1){$bl="<span class='greenx'>ยืนยันเรียบร้อย</span>";}elseif($llc['spr_ck']==2){$bl="<span class='redx'>ปฏิเสธคำขอ</span>";}
        
        ?>
        <tr>
            <td align="center"><?=datethai($llc['spr_date'],'dtime');?></td>
            <td><?=$llc['sm_code'];?></td>
            <td><?=$llc['sm_name'];?></td>
            <td align="right"><?=$llc['spr_pt'];?> บาท</td>
            <td align="center"><?=$bl;?></td>
            <td align="center"><a href="<?=$link;?>?page=request&casy=payrecieve&id=<?=$llc['spr_id'];?>"><img src="images/icon/049.png" /> ดูรายละเอียด</a></td>
        </tr>
        <? }}else{?><tr><td align="center" colspan="6">ยังไม่มีรายการแจ้งถอนเงินในขณะนี้</td></tr><? }?>
    </tbody>
</table>
	
    <div class="clear"></div>
    
    <br />
    
    <div align="center">
    	<a href="#" onclick="javascript:window.print();" class="button button-orange">พิมพ์รายงาน</a>
    </div>
    
</div>
<? }?>
</body>
</html>