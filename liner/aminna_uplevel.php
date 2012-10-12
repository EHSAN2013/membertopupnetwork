<? $gid=$_GET['gid']; $cki=$_GET['cki'];
if(($gid!="" and $cki!="") and ($cki==md5($gid))){
	//Pay upline level 1 > levelliner
	$solo=queryx1("select * from system_liner where sli_sr_reply='$gid' limit 1");
	if($solo['sli_level']!=1){
	$dline=0; $nowtime=date("Y-m-d H:i:s");
	for($line=1;$line<=$ll3;$line++){
		if($line==1){
			$msli[$line]=readname("sli_sr_reply","system_liner","sli_sr_reply",$solo['sli_sr_direct']);
			$check_rule2_pay[$line]=readname("sli_vip","system_liner","sli_sr_reply",$solo['sli_sr_direct']);
			$payreal=checkg($line);
			if($check_rule2_pay[$line]==1){
				mysql_query("insert into system_point value('','$msli[$line]','$r4','".$payreal."','$nowtime','0','ได้รับรายได้แผนพิเศษจาก คุณ ".readname("sm_name","system_member","sm_id",$gid)."')")or die(mysql_error());
				$j3="จ่าย รายได้ ให้กับ ".readname("sm_name","system_member","sm_id",$msli[$line])." เป็นจำนวน ".$payreal." บาท<br>";
			}else{
				if($msli[$line]!=""){
					$j3.="คุณ ".readname("sm_name","system_member","sm_id",$msli[$line])." ไม่ได้รับ รายได้ เนื่องจากหมดอายุสมาชิก<br>";
				}
			}
		}else{
			$msli[$line]=readname("sli_sr_direct","system_liner","sli_sr_reply",$msli[$dline]);
			$check_rule2_pay[$line]=readname("sli_vip","system_liner","sli_sr_reply",$msli[$line]);
			$payreal=checkg($line);
			if($check_rule2_pay[$line]==1){
				mysql_query("insert into system_point value('','$msli[$line]','$r4','".$payreal."','$nowtime','0','ได้รับรายได้แผนพิเศษจาก คุณ ".readname("sm_name","system_member","sm_id",$gid)."')")or die(mysql_error());
				$j3.="จ่าย รายได้ ให้กับ ".readname("sm_name","system_member","sm_id",$msli[$line])." เป็นจำนวน ".$payreal." บาท<br>";
			}else{
				if($msli[$line]!=""){
					$j3.="คุณ ".readname("sm_name","system_member","sm_id",$msli[$line])." ไม่ได้รับ รายได้ เนื่องจากหมดอายุสมาชิก<br>";
				}
			}
		}
	$dline++;
	}
	
	$pvpayx=queryx1("select sum(spi_pt) as total_pvpay from system_point where sli_id='$gid' and spi_cut='0' group by sli_id");
	$allpue=$pvpayx['total_pvpay']-1500;
	mysql_query("update system_point set spi_cut='1' where sli_id='".$gid."' and spi_cut='0'")or die(mysql_error());
	mysql_query("insert into system_point value('','$gid','$r4','".$allpue."','$nowtime','0','รายการคงเลือจ่าย รายได้ แผนพิเศษ')")or die(mysql_error());
	mysql_query("update system_liner set sli_level='1' where sli_sr_reply='$gid' limit 1")or die(mysql_error());
	$datam="<div class='message success'><h3>ทำการจ่าย รายได้ แบบพิเศษเรียบร้อย!</h3><p><b>สำหรับการจ่ายรายได้ ระบบทำการจ่ายรายได้ตามนี้</b><br/><br/>";
	$datam.=$j3;
	$datam.="<br>ยอดคงเหลือของ คุณ ".readname("sm_name","system_member","sm_id",$gid)." คือ ".$allpue." บาท<br/><hr/><a href='adminna.php?page=uplevel'>คลิ้กที่นี่</a> เพื่ออัฟเดตข้อมูลล่าสุด";
	$datam.="</p></div>";
	}
}
?>
<div class="columns leading top">
    <div class="grid_6 first">
    <? if($datam==""){?>
   	<div class="message info">
    	<b>โปรดทราบ</b> ระบบจะทำการแสดงเฉพาะสมาชิกที่ตรงตามเงื่อนไขแผนจ่ายรายได้แบบพิเศษ และมีสถานะเป็นสมาชิก active แล้วเท่านั้น
    </div>
    <? }else{echo $datam;}?>
        <table class="paginate sortable full">
            <thead>
                <tr>
                    <th>ลำดับ</th>
                	<th>รหัสสมาชิก</th>
                    <th>ชื่อ - นามสกุล</th>
                    <th>สถานะจ่าย รายได้</th>
                    <!--<th>สมาชิกในสายงาน</th>-->
                    <th>ยอด รายได้ ปัจจุบัน</th>
                    <th>จ่าย รายได้</th>
                </tr>
            </thead>
            <tbody>
            	<?
				$dcm="select system_member.*, system_liner.* from system_liner left join system_member on system_liner.sli_sr_reply=system_member.sm_id where system_liner.sli_vip='1'";
				/* Start Search */
				if(isset($_POST['searchg'])){
				$name=$_POST['name'];
				$code=$_POST['code'];
				$level=$_POST['level'];
				$name!=""?$dcm.=" and system_member.sm_name like '%$name%'":"";
				$code!=""?$dcm.=" and system_member.sm_code like '%$code%'":"";
				$level!=""?$dcm.=" and system_liner.sli_level ='$level'":"";
				}
				/* End Search*/
				$kl=0;
				$jc=queryx2($dcm." order by system_liner.sli_level ASC, system_member.sm_id ASC"); 
				$srows=mysql_num_rows($jc);
				if($srows>0){
				/*เอาเป็นตัวอย่างเขียนแผน all sale*/
				while($ftc=mysql_fetch_array($jc)){$kl++; $reply=$ftc['sm_id'];
				$pvpayx=queryx1("select sum(spi_pt) as total_pvpay from system_point where sli_id='".$ftc['sm_id']."' and spi_cut='0' group by sli_id");
				if(($pvpayx['total_pvpay']>=1500) or ($ftc['sli_level']==1)){
				//include('module/adminna_chek_liner.php');
				//if($chkf!=0){
				?>
                <tr>
                	<td align="center"><?=$kl;?></td>
                	<td><?=$ftc['sm_code'];?></td>
                    <td><a href="<?=$link;?>?page=member&view=<?=$ftc['sr_id'];?>" title="ดูข้อมูล"><?=$ftc['sm_name'];?></a></td>
                    <td align="center"><? if($ftc['sli_level']==0){echo "รอจ่าย";}else{echo "จ่ายแล้ว"; }?></td>
                    <? /*<td align="right"><?=$numall;?> คน</td>*/ ?>
                    <td align="right"><?=$pvpayx['total_pvpay']==""?"0":$pvpayx['total_pvpay'];?> บาท</td>
                    <td align="center"><? if($ftc['sli_level']==0){?><a href="<?=$link;?>?page=uplevel&gid=<?=$ftc['sm_id'];?>&cki=<?=md5($ftc['sm_id']);?>" onclick="javascript:return confirm('ต้องการจ่าย รายได้ แบบพิเศษสำหรับสมาชิกท่านนี้?');"><img src="images/icon/layers.png"> จ่าย รายได้</a><? }else{echo "-"; }?></td>
                </tr>
                <? } //End checkline
				}}else{?><tr><td align="center" colspan="8">ยังไม่มีสมาชิกที่ตรงเงือนไขจ่ายแบบพิเศษ หรือ ไม่พบสมาชิกที่คุณกำลังค้นหาอยู่ค่ะ</td></tr><? }?>
            </tbody>
        </table>

    </div>
</div>

<!-- Sidebar -->

<aside class="grid_2">

    <div id="rightmenu" class="panel">
    <header><h2>ค้นหาสมาชิก</h2></header>
	<form action="<?=$link;?>?page=uplevel" class="form" name="search" id="search" method="post">
        <hr />
        <fieldset>
            <dl>
                <dt></dt><dd><label>ชื่อ - นามสกุล</label><input type="text" name="name" id="searchname" size="31" value="<?=$name;?>" /></dd>
                <dt></dt><dd><label>รหัสสมาชิก</label><input type="text" name="code" id="searchcode" size="31" value="<?=$code;?>" /></dd>
                <dt></dt><dd><label>สถานะ</label><select name="level" style="width:99%;"><option value=""<? if($level==""){?> selected="selected"<? }?>>โปรดเลือก</option><option value="0"<? if($level=="0"){?> selected="selected"<? }?>>รอตัด</option><option value="1"<? if($level=="1"){?> selected="selected"<? }?>>ตัดแล้ว</option></select></dd>
            </dl>    
        </fieldset>

        <hr />
        <button class="button button-green" type="submit" name="searchg">ค้นหา</button>
        <button class="button button-gray" type="reset">คืนค่า</button>
    </form>
    </div>

</aside>

<!-- Sidebar End -->