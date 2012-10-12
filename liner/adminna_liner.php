<?
$upvip=$_GET['upvip']; 
$svid=$_GET['svid'];
$suc=$_GET['suc'];
if($upvip==1){
	mysql_query("update system_liner set sli_svip='1' where sli_id='$svid' limit 1")or die(mysql_error());
	$data2="ทำการเปลี่ยนสถานะท่านนี้เรียบร้อย";
	/*echo "<script>window.location='adminna.php';</script>";*/
}elseif($upvip==2){
	mysql_query("update system_liner set sli_svip='0' where sli_id='$svid' limit 1")or die(mysql_error());
	$data3="ทำการยกเลิกสถานะท่านนี้เรียบร้อย";
	/*echo "<script>window.location='adminna.php';</script>";*/
}
?>
<div class="columns leading top">
    
    <div class="grid_6 first">
    <? if($suc==2){?><div class="message success"><img src="images/icon/accept.png" /><?=$data2;?></div><? }elseif($suc==3){?><div class="message success"><img src="images/icon/accept.png" /><?=$data3;?></div> <? } ?>
        <table class="paginate sortable full">
            <thead>
                <tr>
                	<th>ลำดับ</th>
                	<th>รหัสสมาชิก</th>
                    <th style="width:20%;">ชื่อ - นามสกุล</th>
                    <th>อีเมล</th>
                    <th>อัฟไลน์</th>
                    <th>เริ่มสมัคร</th>
                    <th>สถานะสมาชิก</th>
                    <th>การจัดการ</th>
                </tr>
            </thead>
            <tbody>
            	<? 
				$pps="select system_member.*, system_liner.* from system_liner left join system_member on system_member.sm_id=system_liner.sli_sr_reply where system_member.sm_level!='9'";
				
				/* Start Search */
				$name=$_POST['name'];
				$code=$_POST['code'];
				$upline=$_POST['upline'];
				$realdates=date("Y-m-d",strtotime($_POST['datestart']));
				$realdatee=date("Y-m-d",strtotime($_POST['dateend']));
				
				if($name!="" or $code!="" or $upline!="" or $datestart!=""){
					$name!=""?$pps.=" and system_member.sm_name like '%$name%'":"";
					$code!=""?$pps.=" and system_member.sm_code like '%$code%'":"";
					if($upline!=""){
						$uid=readname("sm_id","system_member","sm_name",$upline);
						$pps.=" and system_liner.sli_sr_target = '$uid'";
					}
					if($realdates!="1970-01-01" and $realdatee!="1970-01-01"){
						$pps.=" and system_liner.sli_upd BETWEEN '$realdates' and '$realdatee'";
					}
				}
				/* End Search*/
				//echo $pps;

				$jc=queryx2($pps." order by system_liner.sli_upd DESC"); 
				$jj=0; while($ftc=mysql_fetch_array($jc)){ $jj++;
				?>
                <tr>
                	<td align="center"><?=$jj;?></td>
                	<td><?=$ftc['sm_code'];?></td>
                    <td><?=$ftc['sm_name'];?></td>
                    <td><?=$ftc['sm_email'];?></td>
                    <td><?=readname('sm_name','system_member','sm_id',$ftc['sli_sr_target']);?></td>
                    <td><?=datethai($ftc['sli_upd'],'day');?></td>
                    <td align="center">
						<? if($ftc['sli_level']==1){?>
                        <span class="uservip">active</span>
                        <? }else{?>
                    	<span class="usernormal">expire</span>
                        <? }?></td>
                    <td>
                    	<a href="<?=$link;?>?page=request&casy=checkliner&id=<?=$ftc['sli_id'];?>"><span class="userview">ดูสายงาน</span></a>
                    </td>
                </tr>
                <? }?>
            </tbody>
        </table>

    </div>
</div>


<!-- Sidebar -->

<aside class="grid_2">

    <div id="rightmenu" class="panel">
    <header><h2>ค้นหาสมาชิกในสายงาน</h2></header>
	<form action="" class="form" name="search" id="search" method="post">
        <hr />
        <fieldset>
            <dl>
                <dt></dt><dd><label>ชื่อ - นามสกุล</label><input type="text" name="name" id="searchname" size="31" value="<?=$name;?>" /></dd>
                <dt></dt><dd><label>รหัสสมาชิก</label><input type="text" name="code" id="searchcode" size="31" value="<?=$code;?>" /></dd>
                <dt></dt><dd><label>อัฟไลน์</label><input type="text" name="upline" id="searcupline" size="31" value="<?=$upline;?>" /></dd>
                <dt></dt><dd><label>ค้นหาจากช่วงเวลาเริ่ม วันที่</label><input type="date" name="datestart" size="31" value="<?=$datestart;?>" /></dd>
                <dt></dt><dd><label>ถึงวันที่</label><input type="date" name="dateend" size="31" value="<?=$dateend;?>" /></dd>
            </dl>    
        </fieldset>

        <hr />
        <button class="button button-green" type="submit">ค้นหา</button>
        <button class="button button-gray" type="reset">คืนค่า</button>
    </form>
    <script>
	$(":date").dateinput();
	</script>
    </div>

</aside>