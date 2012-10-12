<? session_start();
require_once('../config/connect.php');
require_once('../config/function.php');
require_once('setting.php');

$_GET['action']==""?$action=$_POST['action']:$action=$_GET['action']; $id=$_GET['id']; $nowdate=date("Y-m-d"); $nowtime=date("Y-m-d H:i:s");
switch($action){
		case 1:
			$sli_id=$_POST['sli_id'];
			$pvx=$_POST['pvx'];
			if(is_numeric($pvx)){
				
				$checkvalue=countl3("select spr_date from system_point_dra where sli_id='$sli_id'");
				if($checkvalue>0){
					$checkdate=queryx1("select spr_date from system_point_dra where sli_id='$sli_id' order by spr_date DESC limit 1");
					$valuedate=DateTimeDiff($checkdate['spr_date'],$nowtime);
					
					if($valuedate>=24){
						mysql_query("insert into system_point_dra value('','$sli_id','$pvx','',' $nowtime','0')")or die(mysql_error());
						mysql_close();
						
						$data['success'] = true;
						$data['message'] = "<div class='message success'><h3>ทำการแจ้งถอนเงินเรียบร้อย!</h3> ทางเราจะทำการตรวจสอบยอดเงินที่ท่านต้องการถอน และจะทำการแจ้งให้ท่านทราบอีกครั้ง ผ่านทางอีเมลของท่านค่ะ และท่านสามารถตรวจดูผลการยืนยันไดที่เมนูแจ้งถอนเงินค่ะ<hr><b>โปรดทราบ เมื่อทำการถอน รายได้ แล้วจะไม่สามรถถอน รายได้ ได้อีกภายในวันนี้</b>";
					}else{
						$data['success'] = false;
						$data['message'] = "<div class='message error'><h3>ผิดพลาด!</h3>คุณได้ทำการแจ้งถอนเงินในวันนี้ไปแล้ว โปรดรอให้ครบ 24 ชั่วโมงจากการแจ้งถอนเงินคร้งล่าสุด เพื่อทำการแจ้งถอนเงินอีกครั้ง</div>";
					}
					
				}else{
					mysql_query("insert into system_point_dra value('','$sli_id','$pvx','',' $nowtime','0')")or die(mysql_error());
					mysql_close();
					
					$data['success'] = true;
					$data['message'] = "<div class='message success'><h3>ทำการแจ้งถอนเงินเรียบร้อย!</h3> ทางเราจะทำการตรวจสอบยอดเงินที่ท่านต้องการถอน และจะทำการแจ้งให้ท่านทราบอีกครั้ง ผ่านทางอีเมลของท่านค่ะ และท่านสามารถตรวจดูผลการยืนยันไดที่เมนูแจ้งถอนเงินค่ะ<hr><b>โปรดทราบ เมื่อทำการถอน รายได้ แล้วจะไม่สามรถถอน รายได้ ได้อีกภายในวันนี้</b>";
				}
			}else{
				$data['success'] = false;
				$data['message'] = "<div class='message error'><h3>ผิดพลาด!</h3>กรุณาส่งยอดเงินมาเป็นตัวเลขเท่านั้น</div>";
			}
			
			echo json_encode($data);
			
			break;
		case 2:
			$plane=$_POST['plane'];
			$reply=$_POST['reply'];
			
			$jql=queryx1("select sum(spi_pt) as pv_total from system_point where sli_id='$reply'"); $pvl=$jql['pv_total'];
			$jqr=queryx1("select sum(spr_pt) as pr_total from system_point_dra where sli_id='$reply' and spr_ck='1'"); $pvr=$jqr['pr_total'];
			
			$pto=($pvl-$pvr);
			
			$tj3=$pmv*$plane; $tg2=$tj3-(($tj3*50)/100);
			
			$prw=$tg2;
			
			if($pto<$prw){
				$data['success'] = false;
				$data['message'] = "<div class='message error'><h3>ขออภัย!</h3>ยอด รายได้ ของคุณไม่พอที่จะต่ออายุสมาชิกค่ะ โดยคุณมียอด รายได้ คงเหลือ <b>$pto บาท</b> หากต้องการดำเนิการต่ออายุสมาชิก โปรดเลือก การต่ออายุแบบแจ้งการชำระเงินค่ะ</div>";
			}else{
				
				mysql_query("insert into system_point_dra value('','$reply','$prw','ต่ออายุสมาชิกโดยใช้ รายได้ แบบ $plane เดือน',' $nowtime','1')")or die(mysql_error());
				
				$solo=queryx1("select * from system_liner where sli_sr_reply='$reply'");
				$sliid=$solo['sli_id'];
				mysql_query("insert into system_renew value('','$reply','$nowtime','$plane')")or die(mysql_error());
				
				$dend=round(DateDiff($nowtime,$solo['sli_expire']));
				if($dend<0){$dend=0;}
				$renewx=date("Y-m-d H:i:s",strtotime("+".$plane." month"));
				$chkren=round(DateDiff($nowtime,$renewx));
				$sumdat=$dend+$chkren;
				$expire=date("Y-m-d H:i:s",strtotime("+".$sumdat." day"));
				
				$j="update system_liner set sli_renew='$nowtime', sli_expire='$expire', sli_plane='$plane', sli_vip='1' where sli_id='$sliid'";
				
				mysql_query("update system_liner set sli_renew='$nowtime', sli_expire='$expire', sli_plane='$plane', sli_vip='1' where sli_id='$sliid'")or die(mysql_error());
				
				//Pay upline level 2 > levelliner
				$dline=0;
				for($line=1;$line<=$levelliner;$line++){
					if($line==1){
						$msli[$line]=readname("sli_sr_reply","system_liner","sli_sr_reply",$solo['sli_sr_target']);
						$check_rule2_pay[$line]=readname("sli_vip","system_liner","sli_sr_reply",$solo['sli_sr_target']);
						if($check_rule2_pay[$line]==1){
							mysql_query("insert into system_point value('','$msli[$line]','$r3','".(10*$plane)."','$nowtime','0','สายงานต่ออายุวีไอพี $plane เดือน')")or die(mysql_error());
							//$j3.="pay level $dline/$line : insert into system_point value('','$msli[$line]','$r2','$pv2','$nowtime','0')<br>";
							$j3="จ่าย รายได้ ให้กับ ".readname("sm_name","system_member","sm_id",$msli[$line])." เป็นจำนวน ".(10*$plane)." บาท<br>";
							//$j3.="insert into system_point value('','$msli[$line]','$r2','$pv2','$nowtime','0')<br>";
						}
					}else{
						$msli[$line]=readname("sli_sr_target","system_liner","sli_sr_reply",$msli[$dline]);
						$check_rule2_pay[$line]=readname("sli_vip","system_liner","sli_sr_reply",$msli[$line]);
						if($check_rule2_pay[$line]==1){
							mysql_query("insert into system_point value('','$msli[$line]','$r3','".($pv3*$plane)."','$nowtime','0','สายงานต่ออายุวีไอพี $plane เดือน')")or die(mysql_error());
							//$j3.="pay level $dline/$line : insert into system_point value('','$msli[$line]','$r2','$pv2','$nowtime','0')<br>";
							$j3.="จ่าย รายได้ ให้กับ ".readname("sm_name","system_member","sm_id",$msli[$line])." เป็นจำนวน ".($pv3*$plane)." บาท<br>";
							//$j3.="insert into system_point value('','$msli[$line]','$r2','$pv2','$nowtime','0')<br>";
						}
					}
				$dline++;
				}
				
				mysql_close();
				
				$data['success'] = true;
				//$data['message'] = $j3;
				$data['message'] = "<div class='message success'><h3>ทำการต่ออายุสมาชิกเรียบร้อย!</h3><a href='$link?page=renew'>คลิ้กที่นี่</a> เพื่ออัฟเดตข้อมูลล่าสุด</div>";
			
			}
			
			echo json_encode($data);
				
			break;
}
session_write_close();		
?>