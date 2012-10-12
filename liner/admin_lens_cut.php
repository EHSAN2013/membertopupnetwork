<? session_start(); if($_SESSION['smid']!=""){ require_once('../config/connect.php');
require_once('../config/function.php');
require_once('setting.php');

$opr=$_GET[md5('g')];
if($opr==""){
	$dnow=date("Y-m-d");
	$tena=queryx1("select sbl_date from system_bill order by sbl_id DESC limit 1");
	if($tena['sbl_date']!=$dnow){
		mysql_query("insert into system_bill value('','$dnow','0','0');")or die(mysql_error());
		$billID=mysql_insert_id();
		$total_pv=0; // Set sum pv = 0
		$total_mb=0; // Set counter member = 0
		$check_user=queryx2("select sli_sr_reply from system_liner where sli_vip='1' and sli_level='1'");
		$kkk=0;
		while(list($srid)=mysql_fetch_row($check_user)){ $check_sum['sumpvp']=0;
			$check_sum=queryx1("select sum(spi_pt) as sumpvp from system_point where sli_id='$srid' and spi_cut='0'");
			if($check_sum['sumpvp']>=300){
				$total_pv+=$check_sum['sumpvp']; // Sum all pv
				$total_mb+=1; // Count member
				mysql_query("update system_point set spi_cut='1' where sli_id='$srid' and spi_cut='0'")or die(mysql_error());
				mysql_query("insert into system_bill_list value('','$billID','$srid','".$check_sum['sumpvp']."','$dnow');")or die(mysql_error());
			}// End cjec บาท > 500
			$kkk++;
		}// End while
		if($kkk!=0){
			mysql_query("update system_bill set sbl_pv='$total_pv', sbl_mb='$total_mb' where sbl_id='$billID' limit 1")or die(mysql_error());
		}// End check all value
	}else{
		echo "<script>alert('ขออภัย คุณได้ทำการตัดยอดของวันนี้ไปเรียบร้อบแล้ว'); window.history.go(-1);</script>";
	}
}else{
	$billID=$opr;
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>www.Thaipayturn.com</title>
<style type="text/css">
	@media print{
		body{
			margin:0;
			padding:0;
			font:normal 11px/14px "Arial", Helvetica, sans-serif;
			color:#282828;
		}
		#prinable{
			display:none;
		}
		table.lendetail td p{
			margin:0;
			padding:0;
		}
	}
	@media screen{
		body{
			margin:0;
			padding:0;
			font:normal 13px/18px "Arial", Helvetica, sans-serif;
			color:#282828;
		}
	}
	a img{
		border:none;
	}
	a{
		text-decoration:none;
		color:#282828;
	}
	#prinable{
		width:120px;
		height:28px;
		background:#fff;
		background:rgba(255,255,255,0.7);
		position:fixed;
		top:0;
		right:4px;
		-moz-box-shadow: 1px 1px 2px #c2c2c2;
    	-webkit-box-shadow: 1px 1px 2px #c2c2c2;
    	box-shadow: 1px 1px 2px #c2c2c2;
		line-height:25px;
		text-shadow:1px 1px 1px #EAEAEA;
	}
	#prinable:hover{
		-moz-box-shadow: 1px 1px 4px #2697AE;
    	-webkit-box-shadow: 1px 1px 4px #2697AE;
    	box-shadow: 1px 1px 4px #2697AE;
	}
	#prinable img{
		float:left;
		margin:2px 10px 0 9px;
	}
	#prinable a{
		display:inline-block;
		width:100%;
		height:100%;
	}
	.lens{
		width:99%;
		height:auto;
		margin:0 auto;
	}
	.lens h3{
		font-size:16px;
		font-weight:normal;
		margin:0 0 10px 0;
		padding:0 0 5px 0;
		border-bottom:3px double #E0E0E0;
	}
	
	table.lendetail{
		width:100%;
		border-collapse:collapse;
		text-align:left;
		border:1px solid #D7D7D7;
	}
	table.lendetail th{
		padding:5px 10px;
		color:#FFF;
		font-weight:bold;
		background:#3A85B1;
		border:1px solid #D7D7D7;
	}
	table.lendetail tr.odd{
		background:#F7F7F7;
	}
	table.lendetail td{
		padding:5px 10px;
		border:1px solid #F4F4F4;
	}
	table.lendetail td p{
		margin:0 0 3px 0;
		padding:0;
	}
	table.lendetail td p span{
		display:inline-block;
		width:90px;
		font-style:italic;
	}
	.obv{
		width:96%;
		margin:0 auto 10px auto;
		padding:5px 20px;
		background:#F4F4F4;
		font-size:14px;
	}
	.obv span{
		text-decoration:underline;
	}
</style>
</head>

<body>
<? $gmano=queryx1("select * from system_bill where sbl_id='$billID' limit 1");?>
<div id="prinable"><a href="javascript:void(0);" onclick="javascript:window.print();"><img src="print.png" height="24" /> พิมพ์รายงาน</a></div>
<div class="lens">
    <div class="obv">
        <span>รอบที่</span> <?=$gmano['sbl_id'];?> ||  
        <span>วันที่ตัดยอดรายได้</span> <?=datethai($gmano['sbl_date'],'day');?> ||  
        <span>ยอดรวมรายได้</span> <?=number_format($gmano['sbl_pv']);?> บาท ||  
        <span>จำนวนสมาชิกได้รับปันผล</span> <?=number_format($gmano['sbl_mb']);?> คน
    </div>
    <table class="lendetail">
        <thead>
            <tr>
                <th align="center">ลำดับ</th>
                <th>รายละเอียดสมาชิก</th>
                <th>ข้อมูลบัญชีธนาคาร</th>
                <th align="right">ยอดรายได้</th>
            </tr>
        </thead>
        <tbody>
        <? $clp=queryx2("select system_member.*, system_bill_list.* from system_bill_list left join system_member on system_bill_list.sli_sr_reply=system_member.sm_id where system_bill_list.sbl_id='$billID' order by system_member.sm_code ASC"); $k=0; while($fdata=mysql_fetch_array($clp)){$k++;?>
            <tr<?=$k%2==0?" class='odd'":"";?>>
                <td align="center"><?=$k;?></td>
                <td>
                    <p><span>รหัสสมาชิก</span>: <?=$fdata['sm_code'];?></p>
                    <p><span>ชื่อ - นามสกุล</span>: <?=$fdata['sm_name'];?></p>
                    <p><span>เบอร์โทร, อีเมล์</span>: <?=$fdata['sm_htel'].", ".$fdata['sm_email'];?></p>
                    <p><span>สมัควีไอพี</span>: <?=datethai(readname("sli_upd","system_liner","sli_sr_reply",$fdata['sm_id']),'day');?></p>
                </td>
                <td>
                    <p><span>ชื่อธนาคาร</span>: <?=$fdata['sm_bank_name'];?></p>
                    <p><span>สาขา</span>: <?=$fdata['sm_bank_area'];?></p>
                    <p><span>เลขที่บัญชี</span>: <?=$fdata['sm_bank_id'];?></p>
                    <p><span>ชื่อบัญชี</span>: <?=$fdata['sm_bank_acc'];?></p>
                </td>
                <td align="right"><?=number_format($fdata['stl_pv']);?> บาท</td>
            </tr>
            <? }?>
        </tbody>
    </table>
</div>
</body>
</html>
<? }else{echo "<script>window.location='../backend/login.php';</script>";} session_write_close();?>