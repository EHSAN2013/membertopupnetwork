<? $hpo=$_GET['hpo']; if($hpo==""){?>
<div class="columns leading">
    <div class="grid_8">
    	<div class="boxster">
    	<h3>รายการตัดยอดรายได้ปัจจุบัน</h3>
        <table class="tblpv">
        	<thead>
            	<tr>
                	<th align="center" width="80">รอบปัจจุบัน</th>
                    <th width="100">วันที่ปัจจุบัน</th>
                    <th align="right" width="250">รวมยอดรายได้ปัจจุบัน</th>
                    <th align="right" width="250">จำนวนสมาชิกได้รับปันผลปัจจุบัน</th>
                    <th align="center" width="200">เครื่องมือ</th>
                </tr>
            </thead>
            <tbody>
                <tr class="odd">
                	<td align="center"><?=check_now_pv("le");?></td>
                    <td><?=datethai(date("Y-m-d"),'day');?></td>
                    <td align="right"><?=check_now_pv("pv");?> รายได้</td>
                    <td align="right"><?=check_now_pv("me");?> คน</td>
                    <td align="center">
                    	<a href="adminna.php?page=lenscut&hpo=ncut" class="cust" onclick="javascript:return confirm('โปรดทราบ เมื่อทำการตัดยอดรายได้แล้วจะไม่สามารถกลับมาแก้ไขข้อมูลการตัดยอดได้อีก คุณต้องการจะทำรายการต่อ ใช่ หรือ ไม่ ?');">ตัดยอด</a> 
                        <a href="adminna.php?page=lenscut&hpo=nview" class="view">รายละเอียด</a>
                    </td>
                </tr>
            </tbody>
        </table>
        </div>
        <div class="boxster">
        <h3>รายการตัดยอดรายได้ย้อนหลัง</h3>
        <table class="tblpv">
        	<thead>
            	<tr>
                	<th align="center" width="80">รอบที่</th>
                    <th width="100">วันที่ตัดรายได้</th>
                    <th align="right" width="250">รวมยอดรายได้</th>
                    <th align="right" width="250">จำนวนสมาชิกได้รับปันผล</th>
                    <th align="center" width="200">เครื่องมือ</th>
                </tr>
            </thead>
            <tbody>
            <? $thl=queryx2("select * from system_bill order by sbl_id ASC"); while($fbill=mysql_fetch_array($thl)){?>
                <tr<?=$fbill['sbl_id']%2==0?" class=\"odd\"":"";?>>
                	<td align="center"><?=$fbill['sbl_id'];?></td>
                    <td><?=datethai($fbill['sbl_date'],'day');?></td>
                    <td align="right"><?=number_format($fbill['sbl_pv']);?> บาท</td>
                    <td align="right"><?=number_format($fbill['sbl_mb']);?> คน</td>
                    <td align="center">
                        <a href="admin_lens_cut.php?<?=md5('g');?>=<?=$fbill['sbl_id'];?>" class="print" target="_blank">พิมพ์รายงาน</a> 
                    	<a href="adminna.php?page=lenscut&hpo=nsview&og=<?=$fbill['sbl_id'];?>" class="view">รายละเอียด</a>
                    </td>
                </tr>
            <? }?>
            </tbody>
        </table>
        </div>
    </div>
	<div class="clear"></div>
</div>
<? }elseif($hpo=="nview"){?>
<div class="columns leading">
    <div class="grid_8">
        <div class="lens">
        	<h3>รายละเอียดตัดยอดรายได้ปัจจุบัน ประจำเดือน <?=date("m");?> : วันที่ <?=datethai(date("Y-m-d"),'day');?></h3>
            <div class="obv">
            	<span>รอบที่</span> <?=check_now_pv("le");?> ||  
                <span>ยอดรวมรายได้</span> <?=check_now_pv("pv");?> บาท ||  
                <span>จำนวนสมาชิกได้รับปันผล</span> <?=check_now_pv("me");?> คน
            </div>
            <table class="lendetail">
            	<thead>
                	<tr>
                    	<th align="center">ลำดับ</th>
                        <th>รายละเอียดสมาชิก</th>
                        <th>ข้อมูลบัญชีธนาคาร</th>
                        <th align="right">ยอดรายได้</th>
                    </tr>
                </thead>
                <tbody>
                <? $clp=queryx2("select system_member.*, system_liner.sli_upd from system_liner left join system_member on system_liner.sli_sr_reply=system_member.sm_id where system_liner.sli_vip='1' and  system_liner.sli_level='1' order by system_member.sm_code ASC"); $k=0; while($fdata=mysql_fetch_array($clp)){ $check_sum['sumpv']=0;
					$check_sum=queryx1("select sum(spi_pt) as sumpv from system_point where sli_id='".$fdata['sm_id']."' and spi_cut='0'");
					if($check_sum['sumpv']>=300){
					$k++;?>
                	<tr<?=$k%2==0?" class='odd'":"";?>>
                    	<td align="center"><?=$k;?></td>
                        <td>
                        	<p><span>รหัสสมาชิก</span>: <?=$fdata['sm_code'];?></p>
                            <p><span>ชื่อ - นามสกุล</span>: <?=$fdata['sm_name'];?></p>
                            <p><span>เบอร์โทร, อีเมล์</span>: <?=$fdata['sm_htel'].", ".$fdata['sm_email'];?></p>
                            <p><span>สมัควีไอพี</span>: <?=datethai($fdata['sli_upd'],'day');?></p>
                        </td>
                        <td>
                        	<p><span>ชื่อธนาคาร</span>: <?=$fdata['sm_bank_name'];?></p>
                            <p><span>สาขา</span>: <?=$fdata['sm_bank_area'];?></p>
                            <p><span>เลขที่บัญชี</span>: <?=$fdata['sm_bank_id'];?></p>
                            <p><span>ชื่อบัญชี</span>: <?=$fdata['sm_bank_acc'];?></p>
                        </td>
                        <td align="right"><?=number_format($check_sum['sumpv']);?> บาท</td>
                    </tr>
                    <? }
					}?>
                </tbody>
            </table>
            <div class="backed"><a href="adminna.php?page=lenscut">&laquo; กลับไปดูรายการตัดยอดรายได้ทั้งหมด</a></div>
        </div>
    </div>
</div>
<? }elseif($hpo=="nsview"){$og=$_GET['og']; $fbill=queryx1("select * from system_bill where sbl_id='$og' limit 1");?>
<div class="columns leading">
    <div class="grid_8">
        <div class="lens">
        	<h3>รายละเอียดตัดยอดรายได้ย้อนหลัง วันที่ <?=datethai($fbill['sbl_date'],'day');?></h3>
            <div class="obv">
            	<span>รอบที่</span> <?=$fbill['sbl_id'];?> ||  
                <span>ยอดรวมรายได้</span> <?=number_format($fbill['sbl_pv']);?> บาท ||  
                <span>จำนวนสมาชิกได้รับปันผล</span> <?=number_format($fbill['sbl_mb']);?> คน
            </div>
            <table class="lendetail">
            	<thead>
                	<tr>
                    	<th align="center">ลำดับ</th>
                        <th>รายละเอียดสมาชิก</th>
                        <th>ข้อมูลบัญชีธนาคาร</th>
                        <th align="right">ยอดรายได้</th>
                    </tr>
                </thead>
                <tbody>
                <? $clp=queryx2("select system_member.*, system_bill_list.* from system_bill_list left join system_member on system_bill_list.sli_sr_reply=system_member.sm_id where system_bill_list.sbl_id='$og' order by system_member.sm_code ASC"); $k=0; while($fdata=mysql_fetch_array($clp)){$k++;?>
            <tr<?=$k%2==0?" class='odd'":"";?>>
                    	<td align="center"><?=$k;?></td>
                        <td>
                        	<p><span>รหัสสมาชิก</span>: <?=$fdata['sm_code'];?></p>
                            <p><span>ชื่อ - นามสกุล</span>: <?=$fdata['sm_name'];?></p>
                            <p><span>เบอร์โทร, อีเมล์</span>: <?=$fdata['sm_htel'].", ".$fdata['sm_email'];?></p>
                            <p><span>สมัควีไอพี</span>: <?=datethai(readname("sli_upd","system_liner","sli_sr_reply",$fdata['sm_id']),'day');?></p>
                        </td>
                        <td>
                        	<p><span>ชื่อธนาคาร</span>: <?=$fdata['sm_bank_name'];?></p>
                            <p><span>สาขา</span>: <?=$fdata['sm_bank_area'];?></p>
                            <p><span>เลขที่บัญชี</span>: <?=$fdata['sm_bank_id'];?></p>
                            <p><span>ชื่อบัญชี</span>: <?=$fdata['sm_bank_acc'];?></p>
                        </td>
                        <td align="right"><?=number_format($fdata['stl_pv']);?> บาท</td>
                    </tr>
                    <? }?>
                </tbody>
            </table>
            <div class="backed"><a href="adminna.php?page=lenscut">&laquo; กลับไปดูรายการตัดยอดรายได้ทั้งหมด</a></div>
        </div>
    </div>
</div>
<? }elseif($hpo=="ncut"){?>
<div class="columns leading">
    <div class="grid_8">
		<div class="lens">
        	<h3>ตัดยอดรายได้ ประจำเดือน <?=date("m");?> : วันที่ <?=datethai(date("Y-m-d"),'day');?></h3>
        	<iframe src="admin_lens_cut.php" id="framelenscut"></iframe>
            <div class="backed"><a href="adminna.php?page=lenscut">&laquo; กลับไปดูรายการตัดยอดรายได้ทั้งหมด</a></div>
        </div>
    </div>
</div>
<? }?>
