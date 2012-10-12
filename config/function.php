<?
function countl1($table){
	$set1=mysql_query("select * from $table")or die(mysql_error());
	$set2=mysql_num_rows($set1);
	return $set2;
	mysql_close();
}

function countl2($table,$data,$id){
	$set1=mysql_query("select * from $table where $data='$id'")or die(mysql_error());
	$set2=mysql_num_rows($set1);
	return $set2;
	mysql_close();
}

function countl3($query){
	$set1=mysql_query($query)or die(mysql_error());
	$set2=mysql_num_rows($set1);
	return $set2;
	mysql_close();
}

function queryx1($code){
	$set1=mysql_query($code)or die(mysql_error());
	$set2=mysql_fetch_array($set1);
	return $set2;
	mysql_close();
}

function queryx2($code){
	$set1=mysql_query($code)or die(mysql_error());
	return $set1;
	mysql_close();
}

function logout(){
	unset($_SESSION['userid']);
	unset($_SESSION['usercode']);
	unset($_SESSION['level']);
	session_destroy();
	echo "<script>window.location='index.php';</script>";
}

function changbdate($date){
	$set1=explode("-",$date);
	$set2=$set1[2]."/".$set1[1]."/".$set1[0];
	return $set2;
}

function readname($filed,$table,$data,$id){
	$set1=mysql_query("select $filed from $table where $data='$id'")or die(mysql_error());
	list($set2)=mysql_fetch_row($set1);
	return $set2;
	mysql_close();
	
}

function readnameonly($filed){
	$set=mysql_query("select $filed from $filed limit 0,1")or die(mysql_error());
	list($x)=mysql_fetch_row($set);
	return $x;
	mysql_close();
}

function DateDiff($strDate1,$strDate2){
	return (strtotime($strDate2) - strtotime($strDate1))/  ( 60 * 60 * 24 );  // 1 day = 60*60*24
}
function TimeDiff($strTime1,$strTime2){
	return (strtotime($strTime2) - strtotime($strTime1))/  ( 60 * 60 ); // 1 Hour =  60*60
}
function DateTimeDiff($strDateTime1,$strDateTime2){
	return (strtotime($strDateTime2) - strtotime($strDateTime1))/  ( 60 * 60 ); // 1 Hour =  60*60
}

function datethai($strDate,$case){
	$strYear = date("Y",strtotime($strDate))+543;
	$strMonth= date("n",strtotime($strDate));
	$strDay= date("j",strtotime($strDate));
	$strHour= date("H",strtotime($strDate));
	$strMinute= date("i",strtotime($strDate));
	$strSeconds= date("s",strtotime($strDate));
	$strMonthCut = Array("","ม.ค.","ก.พ.","มี.ค.","เม.ย.","พ.ค.","มิ.ย.","ก.ค.","ส.ค.","ก.ย.","ต.ค.","พ.ย.","ธ.ค.");
	$strMonthThai=$strMonthCut[$strMonth];
	switch($case){
		case 'day':return "$strDay $strMonthThai $strYear"; break;
		case 'dtime':return "$strDay $strMonthThai $strYear ($strHour:$strMinute)"; break;
	}
}

//--------ฟังก์ชั่น Random รหัสป้องกัน Spam mail

function ranDomStr($length){
		$str2ran = 'ABCDEFGHJKMNPQRSTUVWXYZ023456789'; //string ที่เป็นไปได้ที่จะใช้ในการ random ซึ่งสามารถเพิ่มลดได้ตามความต้องการ
		$str_result = "";  //สตริงว่างสำหรับจะรับค่าจากการ random
		while(strlen($str_result)<$length){  //วนลูปจนกว่าจะได้สตริงตามความยาวที่ต้องการ
			$str_result .= substr($str2ran,(rand()%strlen($str2ran)),1); //ต่อ string จาก substring ที่ได้จากการ random ตำแหน่ง ทีละ 1 ตัว 
																													//จนกว่าจะครบตรามความยาวที่ส่งมา
		}
		return($str_result);//ส่งค่ากลับ
	}
	$ran_str = randomstr(6); //สั่ง random string
?>