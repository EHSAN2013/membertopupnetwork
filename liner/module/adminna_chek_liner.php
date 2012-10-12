<? //CHECK MEMBER IN LINER

//LINER VARIABLE 1 - 10 LEVELS
$lineMR[1]=0; $lineMR[2]=0; $lineMR[3]=0; $lineMR[4]=0; $lineMR[5]=0; $lineMR[6]=0; $lineMR[7]=0; $lineMR[8]=0; $lineMR[9]=0;
$numall=0; //สมาชิกในสายงานทั้งหมด
$numvip=0; //สมาชิกในสายงานพรีเมียม
$numnor=0; //สมาชิกในสายงานปกติ

//LINER LEVEL 1
$queryl1="select sli_sr_reply from system_liner where sli_sr_target='$reply'";
$lemit=" limit 3";
$linel1=queryx2($queryl1.$lemit);
$numall+=countl3($queryl1.$lemit);
$numvip+=countl3($queryl1." and sli_vip='1'".$lemit);
$numnor+=countl3($queryl1." and sli_vip='0'".$lemit);
$lineMR[1]=countl3($queryl1.$lemit);
while($fl1=mysql_fetch_array($linel1)){
$l1id=$fl1['sli_sr_reply'];
	
	//LINER LEVEL 2
	$queryl2="select sli_sr_reply from system_liner where sli_sr_target='$l1id'";
	$linel2=queryx2($queryl2.$lemit); 
	$numall+=countl3($queryl2.$lemit);
	$numvip+=countl3($queryl2." and sli_vip='1'".$lemit);
	$numnor+=countl3($queryl2." and sli_vip='0'".$lemit);
	$lineMR[2]+=countl3($queryl2.$lemit);
	while($fl2=mysql_fetch_array($linel2)){
	$l2id=$fl2['sli_sr_reply'];
	
		//LINER LEVEL 3
		$queryl3="select sli_sr_reply from system_liner where sli_sr_target='$l2id'";
		$linel3=queryx2($queryl3.$lemit);
		$numall+=countl3($queryl3.$lemit);
		$numvip+=countl3($queryl3." and sli_vip='1'".$lemit);
		$numnor+=countl3($queryl3." and sli_vip='0'".$lemit);
		$lineMR[3]+=countl3($queryl3.$lemit);
		while($fl3=mysql_fetch_array($linel3)){ 
		$l3id=$fl3['sli_sr_reply'];
		
			//LINER LEVEL 4
			$queryl4="select sli_sr_reply from system_liner where sli_sr_target='$l3id'";
			$linel4=queryx2($queryl4.$lemit);
			$numall+=countl3($queryl4.$lemit);
			$numvip+=countl3($queryl4." and sli_vip='1'".$lemit);
			$numnor+=countl3($queryl4." and sli_vip='0'".$lemit);
			$lineMR[4]+=countl3($queryl4.$lemit);
			while($fl4=mysql_fetch_array($linel4)){ 
			$l4id=$fl4['sli_sr_reply'];
			
				//LINER LEVEL 5
				$queryl5="select sli_sr_reply from system_liner where sli_sr_target='$l4id'";
				$linel5=queryx2($queryl5.$lemit); 
				$numall+=countl3($queryl5.$lemit);
				$numvip+=countl3($queryl5." and sli_vip='1'".$lemit);
				$numnor+=countl3($queryl5." and sli_vip='0'".$lemit);
				$lineMR[5]+=countl3($queryl5.$lemit);
				while($fl5=mysql_fetch_array($linel5)){ 
				$l5id=$fl5['sli_sr_reply'];
				
					//LINER LEVEL 6
					$queryl6="select sli_sr_reply from system_liner where sli_sr_target='$l5id'";
					$linel6=queryx2($queryl6.$lemit);
					$numall+=countl3($queryl6.$lemit);
					$numvip+=countl3($queryl6." and sli_vip='1'".$lemit);
					$numnor+=countl3($queryl6." and sli_vip='0'".$lemit);
					$lineMR[6]+=countl3($queryl6.$lemit);
					while($fl6=mysql_fetch_array($linel6)){
					$l6id=$fl6['sli_sr_reply'];

						//LINER LEVEL 7
						$queryl7="select sli_sr_reply from system_liner where sli_sr_target='$l6id'";
						$linel7=queryx2($queryl7.$lemit);
						$numall+=countl3($queryl7.$lemit);
						$numvip+=countl3($queryl7." and sli_vip='1'".$lemit);
						$numnor+=countl3($queryl7." and sli_vip='0'".$lemit);
						$lineMR[7]+=countl3($queryl7.$lemit);
						while($fl7=mysql_fetch_array($linel7)){
						$l7id=$fl7['sli_sr_reply'];
						
							//LINER LEVEL 8
							$queryl8="select sli_sr_reply from system_liner where sli_sr_target='$l7id'";
							$linel8=queryx2($queryl8.$lemit);
							$numall+=countl3($queryl8.$lemit);
							$numvip+=countl3($queryl8." and sli_vip='1'".$lemit);
							$numnor+=countl3($queryl8." and sli_vip='0'".$lemit);
							$lineMR[8]+=countl3($queryl8.$lemit);
							while($fl8=mysql_fetch_array($linel8)){
							$l8id=$fl8['sli_sr_reply'];
							
								//LINER LEVEL 9
								$queryl9="select sli_sr_reply from system_liner where sli_sr_target='$l8id'";
								$linel9=queryx2($queryl9.$lemit);
								$numall+=countl3($queryl9.$lemit);
								$numvip+=countl3($queryl9." and sli_vip='1'".$lemit);
								$numnor+=countl3($queryl9." and sli_vip='0'".$lemit);
								$lineMR[9]+=countl3($queryl9.$lemit);
								while($fl9=mysql_fetch_array($linel9)){
								$l9id=$fl9['sli_sr_reply'];
								
								}// END LEVEL 9
							}// END LEVEL 8
						}// END LEVEL 7
					}// END LEVEL 6
				}// END LEVEL 5
			}// END LEVEL 4
		}// END LEVEL 3
	}// END LEVEL 2
}// END LEVEL 1

//CHECK LINER AND FULL LINER
$chkl=0; //การต่อสายงานทั้งหมด
$chkf=0; //สมาชิกเต็มชั้น
for($ix=1;$ix<=$levelliner;$ix++){
	$lineMR[$ix]!=0?$chkl+=1:$chkl+=0;
	$lineMR[$ix]==pow($memberliner,$ix)?$chkf+=1:$chkf+=0;
}
?>