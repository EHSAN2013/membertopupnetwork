<?
$requireply=queryx1("select * from system_liner where sli_sr_reply='$smid'");
$reply=$requireply['sli_sr_reply'];

$jojo=queryx1("select * from system_member where sm_id='$reply'");		

?>
<div class="columns leading">
    
    <div class="columns leading">
        <div class="grid_4 first">
            <h4><img src="images/icon/calculator.png" /> ยอดรายได้สมาชิก</h4>
            <hr/>
            <table class="no-style full">
                <tbody>
                    <tr>
                        <td><img src="images/icon/calendar.png"/> ยอดสะสมรายได้ได้รับ</td>
                        <td class="ar"><? $x2=queryx1("select sum(spi_pt) as x2 from system_point where sli_id='".$reply."' and spi_cut='1'"); 
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
						echo number_format($numbergo);?></td>
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
        <div class="grid_4">
            <h4><img src="images/icon/page_white_h.png" /> สถิติรอบตัดรายได้สมาชิก</h4>
            <? /* ******************** check member reply ******************** */
			//include_once('module/adminna_chek_liner.php');
			?>
            <hr/>
            <table class="no-style full">
                <tbody>
                	<tr>
                        <td><img src="images/icon/page_white_stack.png" /> จำนวนรอบตัดยอดทั้งหมด</td>
                        <td class="ar" colspan="2"><?=countl3("select stl_id from system_bill_list where sli_sr_reply='$reply'");?> รอบ</td>
                        <td class="ar"><? $g1=queryx1("select sum(stl_pv) as pva from system_bill_list where sli_sr_reply='$reply'"); echo number_format($g1['pva']);?></td>
                        <td class="ar">บาท</td>
                    </tr>
                    <tr>
                        <td> <? $g2=queryx1("select * from system_bill_list where sli_sr_reply='$reply' order by sbl_id DESC limit 1");?>
                        <img src="images/icon/page_white_medal.png" /> รอบตัดยอดล่าสุด</td>
                        <td class="ar">วันที่ : <?=datethai($g2['stl_date'],'day');?></td>
                        <td class="ar">รอบที่ : <?=$g2['sbl_id'];?></td>
                        <td class="ar"><?=number_format($g2['stl_pv']);?></td>
                        <td class="ar">บาท</td>
                    </tr>
                    <tr>
                        <td> <img src="images/icon/page_white_link.png" /> รอบตัดยอดปัจจุบัน</td>
                        <td class="ar" colspan="2">รอบที่ : <?=$g2['sbl_id']+1;?></td>
                        <td class="ar"><? $g3=queryx1("select sum(spi_pt) as g3 from system_point where sli_id='$reply' and spi_cut='0'"); 
						echo number_format($g3['g3']);?></td>
                        <td class="ar">บาท</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
    
    <div class="columns leading">
        <div class="grid_8 first">
            <!-- the tabs -->
            <div class="tabbed-pane">
                <ul class="tabs">
                    <li><a href="#">รายการรายได้</a></li>
                    <li><a href="#">รอบตัดยอด</a></li>
                </ul>

                <!-- tab "panes" -->
                <div class="panes">
                    <div>
                    <h4>รายการรายได้ทั้งหมด เรียงตามวันที่ได้รับล่าสุด</h4>
                    <p style="margin:0; padding:0 0 10px 0;"><img src="images/icon/arrow_circle_double.png" /> รอตัดยอด <img src="images/icon/accept.png" /> ตัดยอดแล้ว</p>
                    <table class="paginate sortable full bordered">
                        <thead>
                            <tr>
                                <th width="20">รายการ</th>
                                <th width="20">สถานะ</th>
                                <th width="120">วันที่</th>
                                <th>เงือนไขการจ่าย</th>
                                <th width="80">จำนวน รายได้</th>
                                <th>เพิ่มเติม</th>
                            </tr>
                        </thead>
                        <tbody>
                            <? $pi1=queryx2("select * from system_point where sli_id='$reply' order by spi_upd DESC"); $pin=0;
                            while($ftc=mysql_fetch_array($pi1)){$pin++;
                            ?>
                            <tr>
                                <td align="center"><?=$pin;?></td>
                                <td align="center"><?=$ftc['spi_cut']=="0"?"<img src=\"images/icon/arrow_circle_double.png\" />":"<img src=\"images/icon/accept.png\" />";?></td>
                                <td><?=datethai($ftc['spi_upd'],'dtime');?></td>
                                <td><?=ruletopay($ftc['spi_rule']);?></td>
                                <td align="right"><?=$ftc['spi_pt'];?> บาท</td>
                                <td><?=$ftc['spi_note'];?></td>
                            </tr>
                            <? }?>
                        </tbody>
                    </table>
                    </div>
                    <div>
                    <h4>รายการตัดยอดรายได้ทังหมด</h4>
                    <table class="paginate sortable full">
                        <thead>
                            <tr>
                                <th>รอบที่</th>
                                <th>วันที่</th>
                                <th>รายได้ได้รับ</th>
                            </tr>
                        </thead>
                        <tbody>
                            <? $pi2=queryx2("select * from system_bill_list where sli_sr_reply='$reply' order by sbl_id ASC");
                            while($ftc2=mysql_fetch_array($pi2)){$pin++;
                            ?>
                            <tr>
                                <td align="center"><?=$ftc2['sbl_id'];?></td>
                                <td align="center"><?=datethai($ftc2['stl_date'],'day');?></td>
                                <td align="center"><?=number_format($ftc2['stl_pv']);?> บาท</td>
                            </tr>
                            <? }?>
                        </tbody>
                    </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
</div>