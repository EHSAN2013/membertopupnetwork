<?
require_once('../config/connect.php');
require_once('../config/function.php');
require_once('setting.php');

$_GET['action']==""?$action=$_POST['action']:$action=$_GET['action']; $id=$_GET['id']; $nowdate=date("Y-m-d"); $nowtime=date("Y-m-d H:i:s");
switch($action){
		case 1:
		
			//Upgrade VIP member
			$expire=date("Y-m-d H:i:s",strtotime("+1 month"));
			$direct=$_POST['direct'];
			$upline=$_POST['upline'];
			$downline=$_POST['downline'];
			
			//Query id target
			$check_directid=queryx1("select sm_id from system_member where sm_code='$direct' limit 1");
			$check_uplineid=queryx1("select sm_id from system_member where sm_code='$upline' limit 1");
			$check_downlineid=queryx1("select sm_id from system_member where sm_code='$downline' limit 1");
			
			$directid=$check_directid['sm_id'];
			$uplineid=$check_uplineid['sm_id'];
			$downlineid=$check_downlineid['sm_id'];
			
			//Check id target
			$checkdirect=countl3("select sm_id from system_member where sm_code='$direct' limit 1");
			$checkupline=countl3("select sm_id from system_member where sm_code='$upline' limit 1");
			$checkdownli=countl3("select sm_id from system_member where sm_code='$downline' limit 1");
			
			//Check full of line
			$checkfulline=countl3("select sli_id from system_liner where sli_sr_target='$uplineid'");
			
			//Check upline regist
			$checkulregist=countl3("select system_liner.sli_id from system_liner left join system_member on system_liner.sli_sr_reply=system_member.sm_id where system_member.sm_code='$upline' limit 1");
			
			if($checkulregist!=1){
				$data['success'] = false;
				$data['message'] = "<div class='message error'><h3>ผิดพลาด!</h3>รหัสสมาชิก ที่ต่อสายงาน ยังไม่มีอยู่ในระบบเช็คสายงาน หรือ ยังไม่ได้สมัครสมาชิกวีไอพี โปรดตรวจสอบอีกครั้ง</div>";
			}else{
				if($checkfulline<$ml1){
				
					if($checkupline<1){
						$data['success'] = false;
						$data['message'] = "<div class='message error'><h3>ผิดพลาด!</h3>รหัสสมาชิก ที่ต่อสายงาน ไม่ถูกต้องหรือไม่มีอยู่จริง เช็คความถูกต้องอีกครั้ง</div>";
					}else if($checkdownli<1){
						$data['success'] = false;
						$data['message'] = "<div class='message error'><h3>ผิดพลาด!</h3>รหัสสมาชิก ผู้ต่อสายงาน ไม่ถูกต้องหรือไม่มีอยู่จริง เช็คความถูกต้องอีกครั้ง</div>";
					}else{
						
						/* ******************** Pay rule 1 ********************* */
						//จ่ายแนะนำตรง
						/*if($direct!="" or $checkdirect!=0){
							$check_rule1=readname("sli_vip","system_liner","sli_sr_reply",$directid);
							if($check_rule1==1){
								mysql_query("insert into system_point value('','$directid','$r1','$pv1','$nowtime','0','')")or die(mysql_error());
								//$j1="pay direct : insert into system_point value('','$directid','$r1','$pv1','$nowtime','0')";
								$j1="จ่าย รายได้ ให้กับ ".readname("sm_name","system_member","sm_id",$directid)." เป็นจำนวน ".$pv1." รายได้<br>";
								//$j1.="insert into system_point value('','$directid','$r1','$pv1','$nowtime','0')<br>";
							}else{
								$j1.="คุณ ".readname("sm_name","system_member","sm_id",$directid)." ไม่ได้รับ รายได้ เนื่องจากสมาชิกหมดอายุวีไอพี<br>";
							}
						
						}*/
						
						/* ******************** Pay rule 2 ********************* */
						//จ่ายต่อสายงานที่ไม่ได้แนะนำตรง
						//Pay upline level 1
						$check_rule2=readname("sli_vip","system_liner","sli_sr_reply",$uplineid);
						if($check_rule2==1){
							mysql_query("insert into system_point value('','$uplineid','$r2','".$pavl1."','$nowtime','0','')")or die(mysql_error());
							//$j2="pay first : insert into system_point value('','$uplineid','$r2','$pv2','$nowtime','0')";
							$j2="จ่าย รายได้ ให้กับ ".readname("sm_name","system_member","sm_id",$uplineid)." เป็นจำนวน ".$pavl1." บาท<br>";
							//$j2.="insert into system_point value('','$uplineid','$r2','$pv2','$nowtime','0')<br>";
						}else{
							$j2="คุณ ".readname("sm_name","system_member","sm_id",$uplineid)." ไม่ได้รับ รายได้ เนื่องจากสมาชิกหมดอายุวีไอพี<br>";
						}
						
						//Pay upline level 2 > levelliner
						$liveliner=$ll1-1;
						$dline=0;
						for($line=1;$line<=$liveliner;$line++){
							if($line==1){
								$msli[$line]=readname("sli_sr_target","system_liner","sli_sr_reply",$uplineid);
								$check_rule2_pay[$line]=readname("sli_vip","system_liner","sli_sr_reply",$msli[$line]);
								if($check_rule2_pay[$line]==1){
									mysql_query("insert into system_point value('','$msli[$line]','$r2','$pavl1','$nowtime','0','')")or die(mysql_error());
									//$j3.="pay level $dline/$line : insert into system_point value('','$msli[$line]','$r2','$pv2','$nowtime','0')<br>";
									$j3.="จ่าย รายได้ ให้กับ ".readname("sm_name","system_member","sm_id",$msli[$line])." เป็นจำนวน ".$pavl1." บาท<br>";
									//$j3.="insert into system_point value('','$msli[$line]','$r2','$pv2','$nowtime','0')<br>";
								}else{
									if($msli[$line]!=""){
										$j3.="คุณ ".readname("sm_name","system_member","sm_id",$msli[$line])." ไม่ได้รับ รายได้ เนื่องจากสมาชิกหมดอายุวีไอพี<br>";
									}
								}
							}else{
								$msli[$line]=readname("sli_sr_target","system_liner","sli_sr_reply",$msli[$dline]);
								$check_rule2_pay[$line]=readname("sli_vip","system_liner","sli_sr_reply",$msli[$line]);
								$linex2pay=0;
								$linex2pay=$pavl1*8;
								if($check_rule2_pay[$line]==1){
									mysql_query("insert into system_point value('','$msli[$line]','$r2','$linex2pay','$nowtime','0','')")or die(mysql_error());
									//$j3.="pay level $dline/$line : insert into system_point value('','$msli[$line]','$r2','$pv2','$nowtime','0')<br>";
									$j3.="จ่าย รายได้ ให้กับ ".readname("sm_name","system_member","sm_id",$msli[$line])." เป็นจำนวน ".$linex2pay." บาท<br>";
									//$j3.="insert into system_point value('','$msli[$line]','$r2','$pv2','$nowtime','0')<br>";
								}else{
									if($msli[$line]!=""){
										$j3.="คุณ ".readname("sm_name","system_member","sm_id",$msli[$line])." ไม่ได้รับ รายได้ เนื่องจากสมาชิกหมดอายุวีไอพี<br>";
									}
								}
							}
						$dline++;
						}
						
						mysql_query("insert into system_liner value('','$uplineid','$downlineid','$directid','0','1','$nowdate',' $nowtime','$expire','0','')")or die(mysql_error());
						//$j4="insert into system_liner value('','$uplineid','$downlineid','$directid','0','1','$nowdate',' $nowtime','$expire','0')";
					
						$data['success'] = true;
						$data['message'] = "<div class='message success'><h3>ทำการต่อสายงานเรียบร้อย!</h3>คุณสามารถเช็คข้อมูลต่อสายงานได้จากเมนู เช็คสายงาน <hr><p><h3>สำหรับการจ่ายรายได้ ระบบทำการจ่ายรายได้ตามนี้</h3>";
						//$data['message'].=$j1;
						$data['message'].=$j2;
						$data['message'].=$j3;
						//$data['message'].=$j4;
						$data['message'].="</p></div>";
						//$data['message'] = "<div class='message success'><h3>ทำการต่อสายงานเรียบร้อย!</h3>คุณสามารถเช็คข้อมูลต่อสายงานได้จากเมนู เช็คสายงาน ".$j1."<br>".$j2."<br>".$j3."<br>".$j4."</div>";
						mysql_close();
					}
				
				}else{
					$data['success'] = false;
					$data['message'] = "<div class='message error'><h3>ผิดพลาด!</h3>สมาชิกผู้ต่อสายงาน รหัส ($upline) มีสมาชิกอยู่เต็มชั้นแล้ว โปรดเลือก สมาชิกที่อยู่ในสายงานท่านอื่นแทนค่ะ</div>";
				}
			}//End check upline regist
			
			echo json_encode($data);
			
		break;
		case 2://เพิ่ม รายได้ โดยตรง
			$mcode=$_POST['mcode'];
			$pvx=$_POST['pvx'];
			$notic=$_POST['notic'];
			if(!is_numeric($pvx)){
				$data['success'] = false;
				$data['message'] = "<div class='message error'><h3>ผิดพลาด!</h3>กรุณาระบุจำนวน รายได้ เป็นตัวเลขค่ะ</div>";
			}else{
				$sli_id=readname("sm_id","system_member","sm_code",$mcode);
				mysql_query("insert into system_point value('','$sli_id','0','$pvx','$nowtime','0','$notic')")or die(mysql_error());
				mysql_close();
				$data['success'] = true;
				$data['message'] = "<div class='message success'><h3>สำเร็จ!</h3>ทำการเพิ่ม รายได้ ให้กับสมาชิกรหัส $mcode เรียบร้อยแล้ว <a href=\"\" onclick=\"javascript:window.location.reload();\">คลิกที่นี่</a> เพื่อดูรายการ pv อัฟเดตล่าสุด</div>";
			}
			echo json_encode($data);
		break;
		case 3:
			$plane=$_POST['plane'];
			$reply=$_POST['reply'];
			
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
			
			//Pay upline level 1 > levelliner
			$dline=0;
			for($line=1;$line<=$ll2;$line++){
				if($line==1){
					$msli[$line]=readname("sli_sr_reply","system_liner","sli_sr_reply",$solo['sli_sr_target']);
					$check_rule2_pay[$line]=readname("sli_vip","system_liner","sli_sr_reply",$solo['sli_sr_target']);
					$payreal=checkj($line);
					if($check_rule2_pay[$line]==1){
						mysql_query("insert into system_point value('','$msli[$line]','$r3','".($payreal*$plane)."','$nowtime','0','สายงานต่ออายุวีไอพี $plane เดือน')")or die(mysql_error());
						//$j3.="pay level $dline/$line : insert into system_point value('','$msli[$line]','$r2','$pv2','$nowtime','0')<br>";
						$j3="จ่าย รายได้ ให้กับ ".readname("sm_name","system_member","sm_id",$msli[$line])." เป็นจำนวน ".($payreal*$plane)." บาท<br>";
						//$j3.="insert into system_point value('','$msli[$line]','$r2','$pv2','$nowtime','0')<br>";
					}else{
						if($msli[$line]!=""){
							$j3.="คุณ ".readname("sm_name","system_member","sm_id",$msli[$line])." ไม่ได้รับ รายได้ เนื่องจากหมดอายุวีไอพี<br>";
						}
					}
				}else{
					$msli[$line]=readname("sli_sr_target","system_liner","sli_sr_reply",$msli[$dline]);
					$check_rule2_pay[$line]=readname("sli_vip","system_liner","sli_sr_reply",$msli[$line]);
					$payreal=checkj($line);
					if($check_rule2_pay[$line]==1){
						mysql_query("insert into system_point value('','$msli[$line]','$r3','".($payreal*$plane)."','$nowtime','0','สายงานต่ออายุวีไอพี $plane เดือน')")or die(mysql_error());
						//$j3.="pay level $dline/$line : insert into system_point value('','$msli[$line]','$r2','$pv2','$nowtime','0')<br>";
						$j3.="จ่าย รายได้ ให้กับ ".readname("sm_name","system_member","sm_id",$msli[$line])." เป็นจำนวน ".($payreal*$plane)." บาท<br>";
						//$j3.="insert into system_point value('','$msli[$line]','$r2','$pv2','$nowtime','0')<br>";
					}else{
						if($msli[$line]!=""){
							$j3.="คุณ ".readname("sm_name","system_member","sm_id",$msli[$line])." ไม่ได้รับ รายได้ เนื่องจากหมดอายุวีไอพี<br>";
						}
					}
				}
			$dline++;
			}
			
			mysql_close();
			
			$data['success'] = true;
			$data['message'] = "<div class='message success'><h3>ทำการต่ออายุสมาชิกเรียบร้อย!</h3><a href='adminna.php?page=request&casy=viprenew&id=$sliid'>คลิ้กที่นี่</a> เพื่ออัฟเดตข้อมูลล่าสุด<hr><p><h3>สำหรับการจ่ายรายได้ ระบบทำการจ่ายรายได้ตามนี้</h3>";
			$data['message'].=$j3;
			$data['message'].="</p></div>";
			
			echo json_encode($data);
			
		break;
		case 4:
			mysql_query("update system_liner set sli_vip='0' where sli_id='$id' limit 1")or die(mysql_error());
			mysql_close();
			echo "<script>window.location='adminna.php?suc=1';</script>";
		break;
		case 5:
			$level=$_GET['level'];
			mysql_query("update system_liner set sli_level='$level' where sli_sr_reply='$id' limit 1")or die(mysql_error());
			mysql_query("insert into system_point value('','$id','$r4','".(pow($memberliner,$level)*$pv4)."','$nowtime','0','สมาชิกเต็มชั้น ที่ $level')")or die(mysql_error());
			//mysql_close();
			echo "<script>alert('ทำการเลือนขั้นสมาชิกเรียบร้อย พร้อมกับจ่าย รายได้ จำนวน ".(pow($memberliner,$level)*$pv4)." บาท'); window.back(-1);</script>";
		break;
		case 6:
			$spr_id=$_POST['spr_id'];
			$pvx=$_POST['pvx'];
			$spr_ck=$_POST['spr_ck'];
			$comment=$_POST['comment'];
				
				mysql_query("update system_point_dra set spr_comment='$comment', spr_ck='$spr_ck' where spr_id='$spr_id' limit 1")or die(mysql_error());
				mysql_close();
		echo "<script>window.location='adminna.php?page=request&casy=payrecieve&id=$spr_id&cls=1';</script>";
		break;
		case 7:
			$mcode=$_POST['mcode'];
			$pvx=$_POST['pvx'];
			$pvp=$_POST['pvp'];
			$notic=$_POST['notic'];
			if(!is_numeric($pvx) or !is_numeric($pvp) ){
				$data['success'] = false;
				$data['message'] = "<div class='message error'><h3>ผิดพลาด!</h3>กรุณาระบุจำนวน รายได้ หรือ เปอร์เซนต์การจ่ายลูกทีม เป็นตัวเลขค่ะ</div>";
			}else{
				$sli_id=readname("sm_id","system_member","sm_code",$mcode);
				if($sli_id!=""){
					$checkid=countl3("select sli_id from system_liner where sli_sr_reply='$sli_id'");
					if($checkid==0){
						$data['success'] = false;
						$data['message'] = "<div class='message error'><h3>ผิดพลาด!</h3>รหัสสมาชิกไม่ตรงกับรหัสสมาชิกได ๆ ในระบบสายงาน หรือ รหัสสมาชิกนี้ยังไม่ได้เป็นวีไอพี โปรดตรวจสอบอีกครั้ง</div>";
					}else{
						$check_down=queryx2("select sli_sr_reply,sli_vip from system_liner where sli_sr_target='$sli_id'");
						$percen=ceil(($pvx*$pvp)/100);
						while($dl=mysql_fetch_array($check_down)){
							if($dl['sli_vip']==1){
								mysql_query("insert into system_point value('','".$dl['sli_sr_reply']."','0','$percen','$nowtime','0','ได้รับ รายได้ โบนัสจากอัฟไลน์ในการซื้อสินค้า ".$pvp." % <br>".$notic."')")or die(mysql_error());
								$nameof=readname("sm_name","system_member","sm_id",$dl['sli_sr_reply']);
								$text1.="ทำการจ่าย รายได้ ให้กับ ".$nameof." เป็นจำนวน ".$percen. " (".$pvp."%)<br>";
							}
						}
						$upname=readname("sm_name","system_member","sm_id",$sli_id);
						$upvip=readname("sli_vip","system_liner","sli_sr_reply",$sli_id);
						if($upvip==1){
							mysql_query("insert into system_point value('','$sli_id','0','$pvx','$nowtime','0','$notic')")or die(mysql_error());
							$text2="ทำการเพิ่ม รายได้ ให้กับสมาชิกรหัส ($mcode) ".$upname." เรียบร้อยแล้ว เป็นจำนวน $pvx บาท<br>";	
						}else{
							$text2="รหัสสมาชิก ($mcode) $upname อยู่ในสถานะปกติ จึงไม่ได้รับ บาท<br>";	
						}
						mysql_close();
						$data['success'] = true;
						$data['message'] = "<div class='message success'><h3>สำเร็จ!</h3>".$text2."<hr><h3>ระบบทำการจ่ายให้กับลูกทีมดังต่อไปนี้</h3><p>".$text1."</p><br><a href=\"\" onclick=\"javascript:window.location.reload();\">คลิกที่นี่</a> เพื่อดูรายการ จ่าย pv อีกครั้ง</div>";
					}
				}else{
					$data['success'] = false;
					$data['message'] = "<div class='message error'><h3>ผิดพลาด!</h3>รหัสสมาชิกไม่ตรงกับรหัสสมาชิกได ๆ ในระบบ กรูณาตรวจสอบอีกครั้ง</div>";
				}
			}
			echo json_encode($data);
		break;
		case 8:
			$dcode=$_POST['dcode'];
			$dpv=$_POST['dpv'];
			$dnotic=$_POST['dnotic'];
			if(!is_numeric($dpv)){
				$data['success'] = false;
				$data['message'] = "<div class='message error'><h3>ผิดพลาด!</h3>กรุณาระบุจำนวน รายได้ เป็นตัวเลขค่ะ</div>";
			}else{
				$sli_id=readname("sm_id","system_member","sm_code",$dcode);
				if($sli_id!=""){
					$checkid=countl3("select sli_id from system_liner where sli_sr_reply='$sli_id'");
					if($checkid==0){
						$data['success'] = false;
						$data['message'] = "<div class='message error'><h3>ผิดพลาด!</h3>รหัสสมาชิกไม่ตรงกับรหัสสมาชิกได ๆ ในระบบสายงาน หรือ รหัสสมาชิกนี้ยังไม่ได้เป็นวีไอพี โปรดตรวจสอบอีกครั้ง</div>";
					}else{
						$upname=readname("sm_name","system_member","sm_id",$sli_id);
						
						mysql_query("insert into system_point_dra value('','$sli_id','$dpv','$dnotic','$nowtime','1')")or die(mysql_error());
						mysql_close();
						$text2="ทำการถอน รายได้ จำนวน $dpv จากสมาชิก รหัส($dcode) $upname เรียบร้อยแล้ว";
						$data['success'] = true;
						$data['message'] = "<div class='message success'><h3>สำเร็จ!</h3>".$text2."<br><br><a href=\"\" onclick=\"javascript:window.location.reload();\">คลิกที่นี่</a> เพื่อทำรายการ ถอน pv อีกครั้ง</div>";
					}
				}else{
					$data['success'] = false;
					$data['message'] = "<div class='message error'><h3>ผิดพลาด!</h3>รหัสสมาชิกไม่ตรงกับรหัสสมาชิกได ๆ ในระบบ กรูณาตรวจสอบอีกครั้ง</div>";
				}
			}
			echo json_encode($data);
		break;
		case 9:
			$hsmid=$_POST['hsmid'];
			$mid=$_POST['mid'];
			$ddate=$_POST['ddate'];
			
			if(is_numeric($ddate)){
			
			$solo=queryx1("select * from system_liner where sli_sr_reply='$hsmid'");
			$sliid=$solo['sli_id'];
			
			mysql_query("insert into system_renew value('','$hsmid','$nowtime','99')")or die(mysql_error());
			
			$dend=round(DateDiff($nowtime,$solo['sli_expire']));
			if($dend<0){$dend=0;}
			$renewx=date("Y-m-d H:i:s",strtotime("+".$ddate." day"));
			$chkren=round(DateDiff($nowtime,$renewx));
			$sumdat=$dend+$chkren;
			$expire=date("Y-m-d H:i:s",strtotime("+".$sumdat." day"));
			
			mysql_query("update system_liner set sli_renew='$nowtime', sli_expire='$expire', sli_vip='1' where sli_id='$sliid'")or die(mysql_error());
			
			$text2="ทำการเพิ่มวันให้กับ สมาชิกรหัส ($mid) เรียบร้อยแล้ว";
			
			$data['success'] = true;
			$data['message'] = "<div class='message success'><h3>สำเร็จ!</h3>".$text2."<br><br><a href=\"\" onclick=\"javascript:window.location.reload();\">คลิกที่นี่</a> เพื่อทำการเพิ่มวัน อีกครั้ง</div>";
			
			}else{
				$data['success'] = false;
				$data['message'] = "<div class='message error'><h3>ผิดพลาด!</h3>ระบุจำนวนวันเป็นตัวเลขค่ะ กรุณาตรวจสอบอีกครั้ง</div>";
			}
			echo json_encode($data);
		break;
	default:echo "<script>window.location='adminna.php'</script>";
}
?>