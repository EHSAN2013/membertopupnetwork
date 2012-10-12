<? $hpo=$_GET['hpo']; if($hpo==""){?>
<div class="columns leading top">
    <div class="grid_8">
		<div class="boxster">
    	<h3>รายการจ่ายแผน All Sale ปัจจุบัน</h3>
        <table class="tblpv">
        	<thead>
            	<tr>
                    <th width="100">วันที่ปัจจุบัน</th>
                    <th align="right" width="250">จำนวนสมาชิก Active ปัจจุบัน</th>
                    <th align="center" width="200">เครื่องมือ</th>
                </tr>
            </thead>
            <tbody>
                <tr class="odd">
                    <td><?=datethai(date("Y-m-d"),'day');?></td>
                    <td align="right"><?=check_all_sale("f");?> คน</td>
                    <td align="center">
                    	<a href="adminna.php?page=allsale&hpo=ncut" class="cust" onclick="javascript:return confirm('โปรดทราบ เมื่อทำการจ่าย All Sale แล้วจะไม่สามารถกลับมาแก้ไขข้อมูลการจ่าย All Sale ได้อีก คุณต้องการจะทำรายการต่อ ใช่ หรือ ไม่ ?');">จ่าย All Sale</a> 
                        <a href="adminna.php?page=allsale&hpo=nview" class="view">ทดสอบจ่าย All Sale</a>
                    </td>
                </tr>
            </tbody>
        </table>
        </div>
        <div class="boxster">
        <h3>รายการจ่าย All Sale ย้อนหลัง</h3>
        <table class="tblpv">
        	<thead>
            	<tr>
                	<th align="center">ลำดับที่</th>
                    <th align="center" width="110">วันที่จ่าย All Sale</th>
                    <th align="right">ยอดจ่าย Allsale</th>
                    <th align="right">หารกับสมาชิก Active</th>
                    <th align="right">ยอดจ่ายจริง</th>
                    <th align="right">จำนวนสมาชิกได้รับ All Sale</th>
                    <th align="center" width="200">เครื่องมือ</th>
                </tr>
            </thead>
            <tbody>
            <? $thl=queryx2("select * from system_allsale order by sal_id DESC"); while($fbill=mysql_fetch_array($thl)){?>
                <tr<?=$fbill['sal_id']%2==0?" class=\"odd\"":"";?>>
                	<td align="center"><?=$fbill['sal_id'];?></td>
                    <td align="center"><?=datethai($fbill['sal_date'],'day');?></td>
                    <td align="right"><?=number_format($fbill['sal_point']);?> บาท</td>
                    <td align="right"><?=number_format($fbill['sal_per']);?> บาท</td>
                    <td align="right"><?=number_format($fbill['sal_pcut']);?> บาท</td>
                    <td align="right"><?=number_format($fbill['sal_mcut']);?> คน</td>
                    <td align="center">
                        <a href="admin_allsale_cut.php?og=<?=$fbill['sal_id'];?>" class="print" target="_blank">พิมพ์รายงาน</a> 
                    	<a href="adminna.php?page=allsale&hpo=nsview&og=<?=$fbill['sal_id'];?>" class="view">ดูรายละเอียด</a>
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
        	<h3>รายละเอียดจ่าย All Sale ปัจจุบัน ประจำเดือน <?=date("m");?> : วันที่ <?=datethai(date("Y-m-d"),'day');?></h3>
            <div class="obv">
                <? if(isset($_POST['btnsubmit']) and is_numeric($_POST['btnpv'])){?>
                <span>ยอด All Sale</span> <?=number_format($_POST['btnpv']);?> บาท : 
                <span>จำนวนสมาชิก Active</span> <?=check_all_sale("f");?> คน : 
                <span>เปอร์เซ็นต์การจ่าย All Sale</span> (<?=number_format($_POST['btnpv']);?> /  <?=check_all_sale("f");?>) = <? $total_alls=$_POST['btnpv']/check_all_sale("l"); echo number_format($total_alls);?> บาท 
                | <a href="adminna.php?page=allsale&hpo=nview">ระบุยอด All Sale อีกครั้ง</a>
				<? }else{?>
            	<form action="" method="post" name="formallsale">
                	<input type="text" style="width:120px;" maxlength="10" placeholder="โปรดระบุจำนวน รายได้" name="btnpv" />
                    <input type="submit" value="Submit" name="btnsubmit" style="padding:2px 5px; font:normal 13px/18px Arial; color:#3F3F3F; text-shadow:1px 1px #F0F0F0;" />
                </form>
                <? }?>
            </div>
            <table class="lendetail">
            	<thead>
                	<tr>
                    	<th align="center">ลำดับ</th>
                        <th>รายละเอียดสมาชิก</th>
                        <th>ข้อมูลบัญชีสายงาน</th>
                        <th>ยอด All Sale</th>
                    </tr>
                </thead>
                <tbody>
                <? if(isset($_POST['btnsubmit']) and is_numeric($_POST['btnpv'])){
				$clp=queryx2("select system_member.*, system_liner.sli_upd from system_liner left join system_member on system_liner.sli_sr_reply=system_member.sm_id where system_liner.sli_vip='1' order by system_member.sm_code ASC"); $k=0; while($fdata=mysql_fetch_array($clp)){
					$direct=countl3("select sli_id from system_liner where sli_sr_direct='".$fdata['sm_id']."' group by sli_id");
					$reply=$fdata['sm_id'];
					include('module/adminna_chek_liner.php'); $pcx=0; $runin=0; $total_vip_sum=0; $total_percent=0;
					if($direct>=3){
						$pcx=2;
						$runin=1;
					}
					if($chkf==2 and $numvip>=25){
						$pcx=5;
						$runin=1;
					}
					if($chkf==3 and $numvip>=125){
						$pcx=15;
						$runin=1;
					}
					//$check_sum=queryx1("select sum(spi_pt) as sumpv from system_point where sli_id='".$fdata['sm_id']."' and spi_cut='0'")
					if($runin==1){ $k++;
						 $total_vip_sum=$total_alls;
						 $total_percent=($total_vip_sum*$pcx)/100;
					?>
                	<tr<?=$k%2==0?" class='odd'":"";?>>
                    	<td align="center"><?=$k;?></td>
                        <td>
                        	<p><span>รหัสสมาชิก</span>: <?=$fdata['sm_code'];?></p>
                            <p><span>ชื่อ - นามสกุล</span>: <?=$fdata['sm_name'];?></p>
                            <p><span>เบอร์โทร, อีเมล์</span>: <?=$fdata['sm_htel'].", ".$fdata['sm_email'];?></p>
                            <p><span>สมัควีไอพี</span>: <?=datethai($fdata['sli_upd'],'day');?></p>
                        </td>
                        <td>
                        	<p><span>แนะนำตรง</span>: <?=$direct;?> คน</p>
                            <p><span>สมาชิก Active</span>: <?=$numvip;?> คน</p>
                            <p><span>สมาชิกเต็มชั้น</span>: <?=$chkf;?> ชั้น</p>
                            <p><span>การต่อชั้นสายงาน</span>: <?=$chkl;?> ชั้น</p>
                        </td>
                        <td>
							<p><span>การจ่ายเปอร์เซ็นต์</span>:  <?=$pcx;?>%</p>
                            <p><span>เปอร์เซ็นต์ รายได้ รับ</span>: <?=number_format($total_vip_sum);?> * <?=$pcx;?>%</p>
							<p><span>จำนวน รายได้ ได้รับ</span>: <?=number_format($total_percent);?> บาท</p>
                        </td>
                    </tr>
                    <? }
					}
				}else{echo "<tr><td align=\"center\" colspan=\"4\">โปรดระบุจำนวน รายได้ ที่ใช้ในการแบ่งยอด All Sale ค่ะ</td></tr>";}?>
                </tbody>
            </table>
            <div class="backed"><a href="adminna.php?page=allsale">&laquo; กลับไปดูรายการจ่าย All Sale ทั้งหมด</a></div>
        </div>
    </div>
</div>
<? }elseif($hpo=="ncut"){?>
<div class="columns leading">
    <div class="grid_8">
        <div class="lens">
        	<h3>ระบบจ่าย All Sale ประจำเดือน <?=date("m");?> : วันที่ <?=datethai(date("Y-m-d"),'day');?></h3>
            <div class="obv">
                <? if(isset($_POST['btnsubmit']) and is_numeric($_POST['btnpv'])){?>
                <span>ยอด All Sale</span> <?=number_format($_POST['btnpv']);?> บาท : 
                <span>จำนวนสมาชิก Active</span> <?=check_all_sale("f");?> คน : 
                <span>เปอร์เซ็นต์การจ่าย All Sale</span> (<?=number_format($_POST['btnpv']);?> /  <?=check_all_sale("f");?>) = <? $total_alls=$_POST['btnpv']/check_all_sale("l"); echo number_format($total_alls);?> บาท
				<? }else{?>
            	<form action="" method="post" name="formallsale">
                	<input type="text" style="width:120px;" maxlength="10" placeholder="โปรดระบุจำนวน รายได้" name="btnpv" />
                    <input type="submit" value="Submit" name="btnsubmit" onclick="javascript:return confirm('โปรดทราบ! การทำรายการจ่าย รายได้ ตามแผน All Sale เมื่อทำการตกลงแล้ว จะไม่สามารถกลับไปแก้ไขรายการจ่าย All Sale ได้อีก โปรดเช็คความถูกต้องของตัวเลข หรือวันที่ หากไม่แน่ใจ คุณสามารถกดปุ่มยกเลิกได้ค่ะ');" style="padding:2px 5px; font:normal 13px/18px Arial; color:#3F3F3F; text-shadow:1px 1px #F0F0F0;" />
                    <span style="float:right; color:#0971C6; font-size:11px; text-decoration:none; padding-top:3px;">**โปรดเช็คความถูกต้องของตัวเลข และวันที่ก่อนกดปุ่ม Submit</span>
                </form>
                <? }?>
            </div>
            <? if(isset($_POST['btnsubmit']) and is_numeric($_POST['btnpv'])){?>
            <iframe src="admin_allsale_cut.php?allsalepoint=<?=$_POST['btnpv'];?>" id="framelenscut"></iframe>
            <div class="backed"><a href="adminna.php?page=allsale">&laquo; กลับไปดูรายการจ่าย All Sale ทั้งหมด</a></div>
            <? }else{?>
            <div class="backed"><a href="adminna.php?page=allsale">&laquo; ยกเลิกและกลับไปดูรายการจ่าย All Sale ทั้งหมด</a></div>
            <? }?>
        </div>
    </div>
</div>
<? }elseif($hpo=="nsview"){$og=$_GET['og'];?>
<div class="columns leading">
    <div class="grid_8">
        <div class="lens">
        	<h3>รายละเอียดการจ่าย All Sale ย้อนหลัง</h3>
            <iframe src="admin_allsale_cut.php?og=<?=$og;?>" id="framelenscut"></iframe>
            <div class="backed"><a href="adminna.php?page=allsale">&laquo; กลับไปดูรายการจ่าย All Sale ทั้งหมด</a></div>
        </div>
    </div>
</div>
<? }?>