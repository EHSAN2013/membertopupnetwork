<? session_start(); if($_SESSION['smid']!=""){ require_once('../config/connect.php');
require_once('../config/function.php');
require_once('setting.php');

$opr=$_GET['og'];
if($opr==""){
	$allsalepoint=$_GET['allsalepoint'];
	$memberallsal=check_all_sale("f");
	$percentallsa=$_GET['allsalepoint']/$memberallsal;
	$dnow=date("Y-m-d");
	$nowtime=date("Y-m-d H:i:s");
	$tena=queryx1("select sal_date from system_allsale order by sal_id DESC limit 1");
	//if($tena['sal_date']!=$dnow){
		mysql_query("insert into system_allsale value('','$dnow','0','0','$allsalepoint','$percentallsa');")or die(mysql_error());
		$billID=mysql_insert_id();
		$total_pv=0; // Set sum pv = 0
		$total_mb=0; // Set counter member = 0
		$check_user=queryx2("select sli_sr_reply from system_liner where sli_vip='1'");
		$kkk=0;
		while(list($srid)=mysql_fetch_row($check_user)){
			$direct=countl3("select sli_id from system_liner where sli_sr_direct='".$srid."' group by sli_id");
			$reply=$srid;
			include('module/adminna_chek_liner.php'); $pcx=0; $runin=0; $total_vip_sum=0; $total_percent=0;
			if($direct>=3){
				$pcx=2;
				$runin=1;
			}
			if($chkf==2 and $numvip>=25){
				$pcx=5;
				$runin=1;
			}
			if($chkf==3 and $numvip>=125){
				$pcx=15;
				$runin=1;
			}
			if($runin==1){
				 $total_percent=($percentallsa*$pcx)/100;
				 mysql_query("insert into system_allsale_list value('','$billID','$srid','$total_percent','$dnow','".$pcx."%');")or die(mysql_error());
				 mysql_query("insert into system_point value('','$srid','5',' $total_percent','$nowtime','0','รายได้ตามแผนจ่าย All Sale ประจำเดือน ".date("m")."/".date("Y")." จำนวน ".$pcx."%')")or die(mysql_error());
				 $total_mb+=1;
				 $total_pv+=$total_percent;
				 $kkk++;
			}
		}// End while
		if($kkk!=0){
			mysql_query("update system_allsale set sal_pcut='$total_pv', sal_mcut='$total_mb' where sal_id='$billID' limit 1")or die(mysql_error());
		}// End check all value
	//}else{
		/*echo "<script>alert('ขออภัย คุณได้ทำการจ่าย All Sale ในวันนี้ไปเรียบร้อบแล้ว คุณจะไม่สามารถทำรายการนี้ได้จนกว่าจะครบ 24 ชั่วโมงค่ะ'); window.history.go(-1);</script>";
	}*/
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
		top:10px;
		right:10px;
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
	table.lendetail tr{
		vertical-align:text-top;
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
		width:110px;
		font-style:italic;
	}
	.obv{
		width:98%;
		margin-bottom:10px;
		padding:8px 10px 10px 10px;
		background:#F9F9F9;
		font-size:13px;
		border:1px solid #CDCDCD;
	}
	.obv p{
		margin:0 0 5px 0;
		padding:0;
		text-align:left;
	}
	.obv span{
		display:inline-block;
		width:200px;
		text-align:right;
		margin-right:5px;
	}
</style>
</head>

<body>
<? $gmano=queryx1("select * from system_allsale where sal_id='$billID' limit 1");?>
<div id="prinable"><a href="javascript:void(0);" onclick="javascript:window.print();"><img src="print.png" height="24" /> พิมพ์รายงาน</a></div>
<div class="lens">
    <div class="obv">
        <p><span>จ่ายแผนรายได้ All Sale ประจำวันที่</span> : <?=datethai($gmano['sal_date'],'day');?></p>
        <p><span>ยอดจ่ายตามแผน</span> : <?=number_format($gmano['sal_point']);?> บาท</p>
        <p><span>หารกับสมาชิก Active ทั้งหมด</span> : <?=number_format($gmano['sal_per']);?> บาท</p>
        <p><span>ยอดจ่ายจริง</span> : <?=number_format($gmano['sal_pcut']);?> บาท</p>
        <p><span>จำนวนสมาชิกได้รับ All Sale</span> : <?=number_format($gmano['sal_mcut']);?> คน</p>
    </div>
    <table class="lendetail">
        <thead>
            <tr>
                <th align="center" width="20">ลำดับ</th>
                <th>รายละเอียดสมาชิก</th>
                <th>ข้อมูลการจ่าย All Sale</th>
                <th align="right">ยอดรายได้</th>
            </tr>
        </thead>
        <tbody>
        <? $clp=queryx2("select system_member.*, system_allsale_list.* from system_allsale_list left join system_member on system_allsale_list.sm_id=system_member.sm_id where system_allsale_list.sal_id='$billID' order by system_member.sm_code ASC"); $k=0; while($fdata=mysql_fetch_array($clp)){$k++;?>
            <tr<?=$k%2==0?" class='odd'":"";?>>
                <td align="center"><?=$k;?></td>
                <td>
                    <p><span>รหัสสมาชิก</span>: <?=$fdata['sm_code'];?></p>
                    <p><span>ชื่อ - นามสกุล</span>: <?=$fdata['sm_name'];?></p>
                </td>
                <td>
                    <p><span>ได้รับเปอร์เซ็นต์จ่าย</span>:  <?=$fdata['sas_per'];?></p>
                    <p><span>เปอร์เซ็นต์ รายได้ รับ</span>: <?=number_format($gmano['sal_per']);?> * <?=$fdata['sas_per'];?></p>
					
                </td>
                <td align="right"><p><span>จำนวน รายได้ ได้รับ</span>: <?=number_format($fdata['sas_point']);?> บาท</p></td>
            </tr>
            <? }?>
        </tbody>
    </table>
</div>
</body>
</html>
<? }else{echo "<script>window.location='../backend/login.php';</script>";} session_write_close();?>