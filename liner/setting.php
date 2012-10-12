<?
	/* ******************** Rule member line & level ********************* */
	$memberliner=3; // liner for member is 5 max
	$levelliner=9; // liner for level is 4 max
	
	/* ******************** Rule Month pay    ********************* */
	$pmv=450;
	
	/* ******************** Rule lease Bonus  ********************* */
	$lpel=0;
	
	/* ******************** Rule Bonus to pay ********************* */
	$r1=1; //rule Bonus direct reply
	$r2=2; //rule Bonus non direct reply
	$r3=3; //rule Bonus  pay per mount
	$r4=4; //rule Bonus pay went full line member
	
	$pv1=150; //direct reply
	$pv2=12; //non direct reply per member id
	$pv3=2; //pay per mount
	$pv4=5; // pay went full line member
	
	/* ************************ Top up rule ************************ */
	$t1=1; //rule top up 0.50%
	$t2=2; //rule top up 0.25%
	
	$tu1=50/100; //rule top up 0.50%
	$tu2=25/100; //rule top up 0.25%
	
	/* ************************ New Config  ************************ */
	$ml1=5;
	
	//Pay rule 1
	$ll1=3;
	$pavl1=100;
	
	//Pay rule 2
	$ll2=4;
	function checkj($j){
		if($j==1){
			$paya=100;
		}elseif($j==2){
			$paya=50;
		}elseif($j==3){
			$paya=200;
		}else{
			$paya=120;
		}
		return $paya;
	}
	
	//Pay rule 3
	$ll3=5;
	function checkg($g){
		if($g==1){
			$paya=350;
		}elseif($g==2){
			$paya=200;
		}elseif($g==3){
			$paya=200;
		}elseif($g==4){
			$paya=150;
		}else{
			$paya=100;
		}
		return $paya;
	}
	
	/* ******************** Rule renew vip ********************* */
	function viptimeshow($t){
		if($t==0){
		$renew="สมัครสมาชิกใหม่";
		}else if($t==1){
		$renew="ต่ออายุสมาชิก 1 เดือน";
		}else if($t==3){
		$renew="ต่ออายุสมาชิก 3 เดือน";
		}else if($t==6){
		$renew="ต่ออายุสมาชิก 6 เดือน";
		}else if($t==12){
		$renew="ต่ออายุสมาชิก 12 เดือน";
		}else if($t=="99"){
		$renew="เพิ่มวันให้โดย".$www;
		}
		return $renew;
	}
	
	function ruletopay($r){
		if($r==1){
			$rule="จ่ายค่าผู้แนะนำตรง";
		}elseif($r==2){
			$rule="จ่ายค่าสมาชิกใหม่ในสายงาน";
		}elseif($r==3){
			$rule="จ่ายค่าสมาชิกในสายงานต่ออายุรายเดือน";
		}elseif($r==4){
			$rule="จ่ายรายได้ตามแผนพิเศษ";
		}elseif($r==5){
			$rule="จ่ายรายได้ตามแฟน All Sale";
		}else{
			$rule="อื่น ๆ";
		}
		return $rule;
	}
	
	function check_now_pv($t){
		$total_pv=0; // Set sum pv = 0
		$total_mb=0; // Set counter member = 0
		$check_user=queryx2("select sli_sr_reply from system_liner where sli_vip='1' and  sli_level='1'");
		while(list($srid)=mysql_fetch_row($check_user)){ $check_sum['sumpvp']=0;
			$check_sum=queryx1("select sum(spi_pt) as sumpvp from system_point where sli_id='$srid' and spi_cut='0'");
			if($check_sum['sumpvp']>=300){
				$total_pv+=$check_sum['sumpvp']; // Sum all pv
				$total_mb+=1; // Count member
			}// End cjec PV > 500
		}// End while
		$sumpv=$total_pv;
		$summb=$total_mb;
		if($t=="pv"){
			return number_format($sumpv);
		}elseif($t=="me"){
			return number_format($summb);
		}elseif($t=="le"){
			$g=queryx1("select count(*) as lme from system_bill");
			return $g['lme']+1;
		}
	}
	
	function check_all_sale($t){
		$direct=countl3("select sli_sr_reply from system_liner where sli_vip='1'");
		if($t=="f"){
			return number_format($direct);
		}else{
			return $direct;	
		}
	}

?>