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
<div class="columns leading">
    
    <div class="grid_8 first">
        <h4><img src="images/icon/kdmconfig.png" width="16" /> สมาชิกที่หมดอายุและยังไม่ได้ต่ออายุสมาชิก</h4>
        <? if($_GET['suc']==1){?><div class="message success"><img src="images/icon/accept.png" /> ทำการยกเลิกสถานะท่านนี้เรียบร้อย</div><? }?>
        <table class="paginate sortable full">
        <thead>
            <tr>
                <th>รหัสสมาชิก</th>
                <th>ชื่อ นามสกุล</th>
                <th>วันที่หมดอายุ</th>
                <th>วันคงเหลือ</th>
                <th>ยิกเลิก</th>
            </tr>
        </thead>
        <tbody>
        <? $expire=date("Y-m-d H:i:s");
        $cutr=queryx2("select * from system_liner where sli_expire <='$expire' order by sli_expire DESC");
        $crs=mysql_num_rows($cutr); if($crs!=0){ while($fc=mysql_fetch_array($cutr)){ $c++; $dexpr=round(DateDiff($expire,$fc['sli_expire']));
        ?>
            <tr>
                <td align="center"><?=readname("sm_code","system_member","sm_id",$fc['sli_sr_reply']);?></td>
                <td><?=readname("sm_name","system_member","sm_id",$fc['sli_sr_reply']);?></td>
                <td align="right"><?=datethai($fc['sli_expire'],'dtime');?></td>
                <td align="right"><?=$dexpr;?></td>
                <td align="center">
                	<? if($fc['sli_level']==1){?>
                	<a href="<?=$link;?>?page=process&action=4&id=<?=$fc['sli_id'];?>" onclick="javascript:return confirm('ยืนยันการยกเลิกสถานะ');"><img src="images/icon/application_delete" /></a>
                    <? }else{?>
                    ยกเลิกแล้ว
                    <? }?>
                </td>
            </tr>
        <? }}else{?><tr><td colspan="5" align="center">ไม่พบสมาชิกที่หมดอายุค่ะ</td></tr><? }?>
        </tbody>
        </table>
    </div>
    
	<div class="grid_8 first">
        <h4><img src="images/icon/kdmconfig.png" width="16" /> รายการสายงานสมาชิกล่าสุด</h4>
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
				$pps="select system_member.*, system_liner.* from system_liner left join system_member on system_member.sm_id=system_liner.sli_sr_reply where system_member.sm_level!='9' and system_liner.sli_svip='1'";
				
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

				$jc=queryx2($pps." order by system_liner.sli_upd DESC limit 0, 50"); 
				$jj=0; while($ftc=mysql_fetch_array($jc)){$jj++;
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
    
    <div class="grid_8 first">
        <div class="grid_2 first">
        <div class="widget">
            <header><h2><img src="images/icon/group_link.png" /> สถิติสมาชิก</h2></header>
            <section>
            <table class="no-style full">
            <tbody>
                <tr>
                    <td><img src="images/icon/Users_24.png" width="16" /> สมาชิกทั้งหมด</td>
                    <td class="ar"><?=countl3("select sm_id from system_member");?></td>
                    <td class="ar">คน</td>
                </tr>
                <tr>
                    <td><img src="images/icon/Personnel_24.png" width="16" /> สมาชิกในระบบสายงาน</td>
                    <td class="ar"><?=countl3("select sli_id from system_liner");?></td>
                    <td class="ar">คน</td>
                </tr>
                <tr>
                    <td><img src="images/icon/001_15.png" width="16" /> สมัครสมาชิกใหม่</td>
                    <td class="ar"><?=countl3("select sli_id from system_liner where sli_plane='0'");?></td>
                    <td class="ar">คน</td>
                </tr>
            </tbody>
        </table>
        </section>
        </div>
        </div>
        
        <div class="grid_3">
            <div class="widget">
            	<header><h2><img src="images/icon/coins.png" /> สถิติรายได้รวม</h2></header>
                <section>
                <table class="no-style full">
                    <tbody>
                        <tr>
                            <td><img src="images/icon/calendar_link.png" /> ยอดรวมรายได้รอจ่ายปัจจุบัน</td>
                            <td class="ar">
							<? $a3=queryx1("select sum(spi_pt) as pvuncut from system_point where spi_cut='0'");
							echo number_format($a3['pvuncut']);?></td>
                            <td class="ar">บาท</td>
                        </tr>
                        <tr>
                            <td><img src="images/icon/layers.png" /> รายการรายได้ตัดยอดทั้งหมด</td>
                            <td class="ar"><?=countl3("select spi_id from system_point");?></td>
                            <td class="ar">รายการ</td>
                        </tr>
                        <tr>
                            <td><img src="images/icon/money_dollar.png" /> รายการรายได้หลังตัดยอดปัจจุบัน</td>
                            <td class="ar"><?=countl3("select spi_id from system_point where spi_cut='0'");?></td>
                            <td class="ar">รายการ</td>
                        </tr>
                    </tbody>
                </table>
            </section>
            </div>
            </div>
            <div class="grid_3">
            <div class="widget">
            	<header><h2><img src="images/icon/Credit_Card.png" width="16" /> สถิติการตัดยอดรายได้</h2></header>
                <section>
                <table class="no-style full">
                    <tbody>
                        <tr>
                            <td><img src="images/icon/page_white_stack.png" /> รอบตัดยอดรายได้ทั้งหมด</td>
                            <td class="ar"><?=countl3("select sbl_id from system_bill");?></td>
                            <td class="ar">รอบ</td>
                            <td class="ar"><? $g1=queryx1("select sum(sbl_pv) as pva from system_bill"); echo number_format($g1['pva']);?></td>
                            <td class="ar">บาท</td>
                        </tr>
                        <tr>
                            <td><? $g2=queryx1("select * from system_bill order by sbl_id DESC limit 1");?>
                            <img src="images/icon/page_white_medal.png" /> ตัดยอดรายได้ล่าสุด : <?=datethai($g2['sbl_date'],'day');?></td>
                            <td class="ar"><?=number_format($g2['sbl_mb']);?></td>
                            <td class="ar">คน</td>
                            <td class="ar"><?=number_format($g2['sbl_pv']);?></td>
                            <td class="ar">บาท</td>
                        </tr>
                        <tr>
                            <td><img src="images/icon/page_white_link.png" /> ตัดยอดรายได้ปัจจุบัน : รอบที่ <?=check_now_pv("le");?></td>
                            <td class="ar"><?=check_now_pv("me");?></td>
                            <td class="ar">คน</td>
                            <td class="ar"><?=check_now_pv("pv");?></td>
                            <td class="ar">บาท</td>
                        </tr>
                    </tbody>
                </table>
                </section>
            </div>
            </div>
	</div>
    
    <!-- old prefect 
    <div class="grid_8 first">
    	<div class="grid_4 first" id="pvpayall"></div>
        <div class="grid_4" id="pvdrall"></div>
        <div class="clear"></div>
        <div class="grid_4 first"></div>
        <div class="grid_4"></div>
        <hr />
    </div> -->
    
    <!-- New prefect -->
    <div class="columns leading">
    
        <div class="grid_4 first">
            <div class="widget">
            <header><h2>รายงานสมาชิก / สายงาน</h2></header>
            <section>
            <table class="no-style full">
                <tbody>
                    <tr>
                        <td>รายงานสมาชิกทั้งหมด</td>
                        <td class="ar"><a href="report_member.php?mcase=1&name=รายงานสมาชิกทั้งหมด" class="download-doc" target="_blank">ดาวน์โหลดเอกสาร</a></td>
                    </tr>
                    <tr>
                        <td>รายงานสมาชิกในระบบสายงานทั้งหมด</td>
                        <td class="ar"><a href="report_member.php?mcase=2&name=รายงานสมาชิกในระบบสายงานทั้งหมด" class="download-doc" target="_blank">ดาวน์โหลดเอกสาร</a></td>
                    </tr>
                    <tr>
                        <td>รายงานสมาชิก</td>
                        <td class="ar"><a href="report_member.php?mcase=2&mrule=1&name=รายงานสมาชิก" class="download-doc" target="_blank">ดาวน์โหลดเอกสาร</a></td>
                    </tr>
                    <tr>
                        <td>รายงานสมาชิกปกติ</td>
                        <td class="ar"><a href="report_member.php?mcase=2&mrule=2&name=รายงานสมาชิกปกติ" class="download-doc" target="_blank">ดาวน์โหลดเอกสาร</a></td>
                    </tr>
                    <tr>
                        <td>รายงานสมาชิกเป็นใหม่</td>
                        <td class="ar"><a href="report_member.php?mcase=2&mrule=3&name=รายงานสมาชิกเป็นใหม่" class="download-doc" target="_blank">ดาวน์โหลดเอกสาร</a></td>
                    </tr>
                </tbody>
            </table>
            </section>
            </div>
        </div>
        
        <div class="grid_4">
            <div class="widget">
                <header><h2>ค้นหาและดาวน์โหลด สมาชิกในสายงาน</h2></header>
                <form action="report_member.php?mcase=2&mrule=4&name=รายงานสมาชิกในระบบสายงาน" name="export" method="post" class="form">
                    <section>
                        <fieldset>
                            <dl>
                                <dt></dt><dd><label>ค้นหาจากวันที่ *</label><input type="date" name="datestart" required="required" /></dd>
                                <dt></dt><dd><label>ถึงวันที่ *</label><input type="date" name="datend" required="required" /></dd>
                            </dl>    
                        </fieldset>
                        <hr />
                        <p align="center">
                            <button class="button button-blue" type="submit">ดาว์นโหลด</button>
                            <button class="button button-gray" type="reset">เคลียร์ข้อมูล</button>
                        </p>
                    </section>
                </form>
            </div>
        </div>
        <script>
        $(":date").dateinput({format: 'yyyy-mm-dd'});
        </script>
        
        <div class="clear"></div>
        
        <div class="grid_6 first">
            <div class="panel">
            <header><h2>ดาว์นโหลดข้อมูลสมาชิกรายบุคคล</h2></header>
            <table class="paginate sortable full">
                <thead>
                    <tr>
                        <th>รหัสสมาชิก</th>
                        <th style="width:20%;">ชื่อ - นามสกุล</th>
                        <th>ข้อมูลสายงาน</th>
                        <th>ข้อมูลรายได้</th>
                        <th>ข้อมูลการต่ออายุ</th>
                        <th>รายงานแจ้งชำระเงิน</th>
                        <th>รายงานแจ้งถอนเงิน</th>
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
                    if(countl3($pps)>0){
                    while($ftc=mysql_fetch_array($jc)){
                    ?>
                    <tr>
                        <td><?=$ftc['sm_code'];?></td>
                        <td><?=$ftc['sm_name'];?></td>
                        <td align="center"><a href="report_member_detail.php?casy=checkliner&id=<?=$ftc['sli_id'];?>&name=รายงานข้อมูลสายงานสมาชิก" target="_blank"><img src="images/icon/report_link.png" /> ดาวน์โหลด</a></td>
                        <td align="center"><a href="report_member_detail.php?casy=pvmanage&id=<?=$ftc['sli_id'];?>&name=รายงานข้อมูลรายได้สมาชิก" target="_blank"><img src="images/icon/report_key.png" /> ดาวน์โหลด</a></td>
                        <td align="center"><a href="report_member_detail.php?casy=viprenew&id=<?=$ftc['sli_id'];?>&name=รายงานข้อมูลการต่ออายุสมาชิก" target="_blank"><img src="images/icon/report_user.png" /> ดาวน์โหลด</a></td>
                        <td align="center"><a href="report_member_detail.php?casy=payrefer&id=<?=$ftc['sli_id'];?>&name=รายงานแจ้งชำระเงินสมาชิก" target="_blank"><img src="images/icon/report_picture.png" /> ดาวน์โหลด</a></td>
                        <td align="center"><a href="report_member_detail.php?casy=payrecieve&id=<?=$ftc['sli_id'];?>&name=รายงานแจ้งถอนเงินสมาชิก" target="_blank"><img src="images/icon/report_word.png" /> ดาวน์โหลด</a></td>
                    </tr>
                    <? }
                    }else{?>
                    <tr><td colspan="7" align="center">ไม่พบสานงานที่ค้นหา กรุณาค้นหาใหม่อีกครัง</td></tr>
                    <? }?>
                </tbody>
            </table>
            </div>
        </div>
        
        <div class="grid_2">
            <div class="panel">
            <header><h2>ค้นหาสมาชิก</h2></header>
            <form action="" class="form" name="search" id="search" method="post">
                <hr />
                <fieldset>
                    <dl>
                        <dt></dt><dd><label>ชื่อ - นามสกุล</label><input type="text" name="name" id="searchname" size="31" value="<?=$name;?>" /></dd>
                        <dt></dt><dd><label>รหัสสมาชิก</label><input type="text" name="code" id="searchcode" size="31" value="<?=$code;?>" /></dd>
                    </dl>    
                </fieldset>
        
                <hr />
                <button class="button button-green" type="submit">ค้นหา</button>
                <button class="button button-gray" type="reset">คืนค่า</button>
            </form>
            </div>
        </div>
        
        <div class="clear"></div>
        
    </div>
     <!-- New prefect -->
     
</div>
