<?
	if($_SESSION['mojo']==""){
		$realuri=$_SERVER['REQUEST_URI'];
		$mojox=explode("?",$realuri);
		$_SESSION['mojo']=$mojox[1];
	}else{
		$realuri=$_SERVER['REQUEST_URI'];
		$mojox=explode("?",$realuri);
		if($mojox[1]!=""){
			$xw=mysql_query("select sa_sm_id from system_account where sa_www='".$mojox[1]."' limit 1")or die(mysql_error());
			list($ck1)=mysql_fetch_row($xw);
			if($ck1!=""){
				$_SESSION['mojo']=$mojox[1];
			}
		}
	}
	$home_name=$_SESSION['mojo'];

	$check_null=countl3("select sa_sm_id from system_account where sa_www='".$home_name."' limit 1;");
	if($check_null==1){
	
		$queryxc=mysql_query("select system_account.*, system_member.sm_id, system_member.sm_name, system_member.sm_email, system_member.sm_mtel, system_member.sm_date_regist from system_account left join system_member on system_account.sa_sm_id=system_member.sm_id where sa_www='".$home_name."' limit 1")or die(mysql_error());
		$qq=mysql_fetch_array($queryxc);
		
		$title=$qq['sa_title'];
		$keyword=$qq['sa_search'];
		$description=$qq['sa_description'];
		
		$mname=$qq['sm_name'];
		$mmail=$qq['sm_email'];
		$mtel=$qq['sm_mtel'];
		$mdateregis=$qq['sm_date_regist'];
		$smid=$qq['sm_id'];
	}else{
		$first_add=queryx1("select * from system_member where sm_id='1' limit 1;");	
		
		$title=$title_bar;
		$keyword=$keywords;
		$description=$description_detail;
		
		$mname=$first_add['sm_name'];
		$mmail=$first_add['sm_email'];
		$mtel=$first_add['sm_mtel'];
		$mdateregis=$first_add['sm_date_regist'];
		$smid=$first_add['sm_id'];
	}
?>