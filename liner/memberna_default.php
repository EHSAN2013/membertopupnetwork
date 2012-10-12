<?
$requireply=queryx1("select * from system_liner where sli_sr_reply='$smid'");
$reply=$requireply['sli_sr_reply'];
$xd=date("Y-m-d H:i:s");
$dend=round(DateDiff($xd,$requireply['sli_expire']));
$jojo=queryx1("select * from system_member where sm_id='$reply'");		
?>
<div class="columns leading">
    <div class="grid_3 first">
        <div class="widget">
        <header><h2><img src="images/icon/002.png" /> ข้อมูลบัญชีผู้ใช้</h2> </header>
        <section>
        <table class="no-style full">
            <tbody>
                <tr>
                    <td><b>รหัสสมาชิก</b></td>
                    <td><?=$jojo['sm_code'];?></td>
                </tr>
                <tr>
                    <td><b>ชื่อ - นามสกุล</b></td>
                    <td><?=$jojo['sm_name'];?></td>
                </tr>
                <tr>
                    <td><b>สมัครเมื่อ</b></td>
                    <td><?=datethai($jojo['sm_date_regist'],'day');?></td>
                </tr>
                <tr>
                    <td><b>ลิงค์ผู้แนะนำ</b></td>
                    <td>http://<?=$www;?>/?<? echo readname("sa_www","system_account","sa_sm_id",$jojo['sm_id']);?></td>
                </tr>
            </tbody>
        </table>
        </section>
        </div>
    </div>
    <div class="grid_3">
        <div class="widget">
        <header><h2><img src="images/icon/048.png" /> ข้อมูลการติดต่อ</h2></header>
            <section>
            <table class="no-style full">
                <tbody>
                <tr>
                    <td><b>อีเมล์</b></td>
                    <td><?=$jojo['sm_email'];?></td>
                </tr>
                <tr>
                    <td><b>โทรศัพท์</b></td>
                    <td><?=$jojo['sm_htel'];?></td>
                </tr>
                <tr>
                    <td><b>มือถือ</b></td>
                    <td><?=$jojo['sm_mtel'];?></td>
                </tr>
                <tr>
                    <td><b>ที่อยู่</b></td>
                    <td><?=$jojo['sm_addr'].", ".$jojo['sm_postcode'].", ".readname("sd_name","system_district","sd_id",$jojo['sm_district']);?></td>
                </tr>
                </tbody>
            </table>
            </section>
        </div>
   </div>
   <div class="grid_2">
        <div class="widget">
        <header><h2><img src="images/icon/coins.png" /> ข้อมูลบัญชีธนาคาร</h2></header>
            <section>
            <table class="no-style full">
                <tbody>
                    <tr>
                        <td><b>ธนาคาร</b></td>
                        <td><?=$jojo['sm_bank_name'];?> สาขา <?=$jojo['sm_bank_area'];?></td>
                    </tr>
                    <tr>
                        <td><b>เลขที่บัญชี</b></td>
                        <td><?=$jojo['sm_bank_id'];?></td>
                    </tr>
                    <tr>
                        <td><b>ชื่อบัญชี</b></td>
                        <td><?=$jojo['sm_bank_acc'];?></td>
                    </tr>
                    <tr>
                        <td><b>ประเภทบัญชี</b></td>
                        <td><?=$jojo['sm_bank_type'];?></td>
                    </tr>
                </tbody>
            </table>
            </section>
        </div>
    </div>
    
<div class="clear"></div>
    
    <div class="grid_3 first">
        <h4><img src="images/icon/081.png" /> สถิติการรักษายอดสมาชิก</h4>
        <hr />
        <table class="no-style full">
            <tbody>
            <tr>
                <td><img src="images/icon/053.png" /> จำนวนการรักษายอด</td>
                <td class="ar"><?=$ccl=countl3("select srn_id from system_renew where sli_id='$reply'");?> ครั้ง</td>
            </tr>
            <tr>
                <td><img src="images/icon/052.png" /> รักษายอดครั้งล่าสุด</td>
                <td class="ar"><?=datethai($requireply['sli_renew'],'dtime');?></td>
            </tr>
            <tr>
                <td><img src="images/icon/079.png" /> แผนการรักษายอดล่าสุด</td>
                <td class="ar"><?=viptimeshow($requireply['sli_plane']);?></td>
            </tr>
            <tr>
                <td><img src="images/icon/025.png" /> วันหมดอายุ</td>
                <td class="ar"><?=datethai($requireply['sli_expire'],'dtime');?></td>
            </tr>
            <tr>
                <td><img src="images/icon/calendar.png" /> วันคงเหลือ</td>
                <td class="ar"><?=$dend;?> วัน</td>
            </tr>
            </tbody>
        </table>
    </div>
    <div class="grid_3">
        <h4><img src="images/icon/calculator.png" /> ยอดรายได้สะสม</h4>
        <hr/>
        <table class="no-style full">
            <tbody>
                <tr>
                    <td><img src="images/icon/calendar.png"/> ยอดสะสมรายได้ทั้งหมด</td>
                    <td class="ar"><? 
					$x2=queryx1("select sum(spi_pt) as x2 from system_point where sli_id='".$reply."' and spi_cut='1'"); 
						if($requireply['sli_level']!=1){
							$numbergo=$x2['x2'];
						}else{
							$jbill_s=countl3("select stl_id from system_bill_list where sli_sr_reply='$reply' limit 1");
							if($jbill_s==1){
								$checkjoper=queryx1("select sum(stl_pv) as joper from system_bill_list where sli_sr_reply='$reply'");
								$totalx1b=$x2['x2']-$checkjoper['joper'];
								$numbergo=$x2['x2']-$totalx1b;
							}else{
								$numbergo=$x2['x2']-1500;
							}
						}
						$numbergo<0?$numbergo=0:$numbergo=$numbergo;
						echo number_format($numbergo);
					?></td>
                    <td class="ar">บาท</td>
                </tr>
                <tr>
                    <td><img src="images/icon/calendar_link.png" /> ยอดสะสมรายได้ปัจจุบัน</td>
                    <td class="ar"><? $x3=queryx1("select sum(spi_pt) as x3 from system_point where sli_id='".$reply."' and spi_cut='0'"); echo number_format($x3['x3']);?></td>
                    <td class="ar">บาท</td>
                </tr>
                <tr>
                    <td><img src="images/icon/layers.png" /> รายการรายได้ได้รับทั้งหมด</td>
                    <td class="ar"><?=countl3("select spi_id from system_point where sli_id='$reply'");?></td>
                    <td class="ar">รายการ</td>
                </tr>
                <tr>
                    <td><img src="images/icon/money_dollar.png" /> รายการรายได้ได้รับปัจจุบัน</td>
                    <td class="ar"><?=countl3("select spi_id from system_point where sli_id='$reply' and spi_cut='0'");?></td>
                    <td class="ar">รายการ</td>
                </tr>
            </tbody>
        </table>
    </div>
    <div class="grid_2">
        <h4><img src="images/icon/page_white_h.png" /> รอบตัดยอดรายได้</h4>
        <? /* ******************** check member reply ******************** */
        include_once('module/adminna_chek_liner.php');
        ?>
        <hr/>
        <table class="no-style full">
            <tbody>
                <tr>
                    <td><img src="images/icon/page_white_stack.png" /> จำนวนรอบ</td>
                    <td><?=countl3("select stl_id from system_bill_list where sli_sr_reply='$reply'");?> รอบ</td>
                    <td class="ar"><? $g1=queryx1("select sum(stl_pv) as pva from system_bill_list where sli_sr_reply='$reply'"); echo number_format($g1['pva']);?> บาท</td>
                </tr>
                <tr>
                    <td> <? $g2=queryx1("select * from system_bill_list where sli_sr_reply='$reply' order by sbl_id DESC limit 1");?>
                    <img src="images/icon/page_white_medal.png" /> รอบล่าสุด</td>
                    <td colspan="2" class="ar">วันที่ : <?=datethai($g2['stl_date'],'day');?></td>
                </tr>
                <tr>
                    <td><img src="images/icon/report_word.png" /> รายได้ได้รับ</td>
                    <td class="ar" colspan="2"><?=number_format($g2['stl_pv']);?> บาท</td>
                </tr>
                <tr>
                    <td> <img src="images/icon/page_white_link.png" /> รอบปัจจุบัน</td>
                    <td class="ar" colspan="2">รอบที่ : <?=$g2['sbl_id']+1;?></td>
                </tr>
                <tr>
                 	<td colspan="2"> <img src="images/icon/page_white_get.png" /> รายได้ได้รับปัจจุบัน</td>
					<td class="ar"><? $g3=queryx1("select sum(spi_pt) as g3 from system_point where sli_id='$reply' and spi_cut='0'"); 
                    echo number_format($g3['g3']);?> บาท</td>
                </tr>
            </tbody>
        </table>
    </div>
    
</div>