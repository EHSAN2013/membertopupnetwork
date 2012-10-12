<? $casy=$_GET['casy']; $id=$_GET['id'];
if($casy=="upgradevip"){
$requireply=queryx1("select * from system_reply where sr_id='$id'");
$target=$requireply['sr_target'];
$reply=$requireply['sr_sm_id'];

$jojo=queryx1("select * from system_member where sm_id='$reply'");
?>

<div class="columns leading">
    <div class="grid_4 first">
    	<div class="widget">
        <header><h2>ข้อมูลสมาชิก</h2> </header>
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
                <tr>
                    <td><b>อีเมล์</b></td>
                    <td><?=$jojo['sm_email'];?></td>
                </tr>
                <tr>
                    <td><b>โทรศัพท์</b></td>
                    <td><?=$jojo['sm_htel'];?></td>
                </tr>
                <tr>
                    <td><b>โทรศัพท์มือถือ</b></td>
                    <td><?=$jojo['sm_mtel'];?></td>
                </tr>
                <tr>
                    <td><b>ที่อยู่</b></td>
                    <td><?=$jojo['sm_addr'].", ".$jojo['sm_postcode'].", ".readname("sd_name","system_district","sd_id",$jojo['sm_district']);?></td>
                </tr>
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
<?
$jeje=queryx1("select * from system_member where sm_id='$target'");
?>
	<div class="grid_4">
        <div class="widget">
        <header><h2>ข้อมูลผู้แนะนำ</h2></header>
            <section>
            <table class="no-style full">
                <tbody>
                    <tr>
                        <td><b>รหัสสมาชิก</b></td>
                        <td><?=$jeje['sm_code'];?></td>
                    </tr>
                    <tr>
                        <td><b>ชื่อ - นามสกุล</b></td>
                        <td><?=$jeje['sm_name'];?></td>
                    </tr>
                    <tr>
                        <td><b>สมัครเมื่อ</b></td>
                        <td><?=datethai($jeje['sm_date_regist'],'day');?></td>
                    </tr>
                    <tr>
                        <td><b>ลิงค์ผู้แนะนำ</b></td>
                        <td>http://<?=$www;?>/?<? echo readname("sa_www","system_account","sa_sm_id",$jeje['sm_id']);?></td>
                    </tr>
                    <tr>
                        <td><b>อีเมล์</b></td>
                        <td><?=$jeje['sm_email'];?></td>
                    </tr>
                    <tr>
                        <td><b>โทรศัพท์</b></td>
                        <td><?=$jeje['sm_htel'];?></td>
                    </tr>
                    <tr>
                        <td><b>โทรศัพท์มือถือ</b></td>
                        <td><?=$jeje['sm_mtel'];?></td>
                    </tr>
                    <tr>
                        <td><b>ที่อยู่</b></td>
                        <td><?=$jeje['sm_addr'].", ".$jeje['sm_postcode'].", ".readname("sd_name","system_district","sd_id",$jeje['sm_district']);?></td>
                    </tr>
                    <tr>
                        <td><b>ธนาคาร</b></td>
                        <td><?=$jeje['sm_bank_name'];?> สาขา <?=$jeje['sm_bank_area'];?></td>
                    </tr>
                    <tr>
                        <td><b>เลขที่บัญชี</b></td>
                        <td><?=$jeje['sm_bank_id'];?></td>
                    </tr>
                    <tr>
                        <td><b>ชื่อบัญชี</b></td>
                        <td><?=$jeje['sm_bank_acc'];?></td>
                    </tr>
                    <tr>
                        <td><b>ประเภทบัญชี</b></td>
                        <td><?=$jeje['sm_bank_type'];?></td>
                    </tr>
                </tbody>
            </table>
            </section>
    	</div>
    </div>
    
    <div class="grid_8 first">
    	<? include('module/upgrade_liner.php');?>
    </div>
    
    
    <!--
    <div id="dollphine" class="grid_8 first">
    <? //include('module/doll_shcedul.php');?>
    </div>
    -->
    
    <div class="grid_8 first">
    	<div class="preloader" align="center"><img src="images/ajax-loader.gif" /> Loading...</div>
    	<div class="showresult">
        <div class="erroresult"></div>
        <form id="formmline" name="formmline" class="form panel" action="" method="post">
        	<input type="hidden" name="action" value="1" />
            <header><h2>แบบฟอร์มอัฟเกรดสมาชิก</h2></header>

            <hr />
            <fieldset>
                <dl>
                    <dt></dt><dd><label>รหัสสมาชิก ผู้แนะนำตรง</label><input type="text" name="direct" value="<?=$jeje['sm_code'];?>" readonly="readonly" /></dd>
                    <dt></dt><dd><label>รหัสสมาชิก ที่ต่อสายงาน *</label><input type="text" required="required" name="upline" /></dd>
                    <dt></dt><dd><label>รหัสสมาชิก ผู้ต่อสายงาน *</label><input type="text" required="required" name="downline" readonly="readonly" value="<?=$jojo['sm_code'];?>" /></dd>
                </dl>    
            </fieldset>

            <hr />
            <p align="center">
            <button class="button button-orange" type="submit" onclick="javascript:return confirm('ทำการอัฟเกรดสมาชิก');">ยันยัน</button>
            <button class="button button-gray" type="reset">เคลียร์ข้อมูล</button>
            <button class="button button-blue" type="button" onclick="javascript:window.back(-1);">กลับ</button>
            </p>
        </form>
        </div>
    </div>
    <div class="clear"></div>
    
</div>
<? }elseif($casy=="checkliner"){
$requireply=queryx1("select * from system_liner where sli_id='$id'");
$target=$requireply['sli_sr_target'];
$reply=$requireply['sli_sr_reply'];

$jojo=queryx1("select * from system_member where sm_id='$reply'");	
?>
<div class="columns leading">
    <div class="grid_4 first">
    	<div class="widget">
        <header><h2>ข้อมูลสมาชิก</h2> </header>
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
                <tr>
                    <td><b>อีเมล์</b></td>
                    <td><?=$jojo['sm_email'];?></td>
                </tr>
                <tr>
                    <td><b>โทรศัพท์</b></td>
                    <td><?=$jojo['sm_htel'];?></td>
                </tr>
                <tr>
                    <td><b>โทรศัพท์มือถือ</b></td>
                    <td><?=$jojo['sm_mtel'];?></td>
                </tr>
                <tr>
                    <td><b>ที่อยู่</b></td>
                    <td><?=$jojo['sm_addr'].", ".$jojo['sm_postcode'].", ".readname("sd_name","system_district","sd_id",$jojo['sm_district']);?></td>
                </tr>
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
<?
$jeje=queryx1("select * from system_member where sm_id='$target'");
?>
	<div class="grid_4">
        <div class="widget">
        <header><h2>ข้อมูลอัฟไลน์</h2></header>
            <section>
            <table class="no-style full">
                <tbody>
                    <tr>
                        <td><b>รหัสสมาชิก</b></td>
                        <td><?=$jeje['sm_code'];?></td>
                    </tr>
                    <tr>
                        <td><b>ชื่อ - นามสกุล</b></td>
                        <td><?=$jeje['sm_name'];?></td>
                    </tr>
                    <tr>
                        <td><b>สมัครเมื่อ</b></td>
                        <td><?=datethai($jeje['sm_date_regist'],'day');?></td>
                    </tr>
                    <tr>
                        <td><b>ลิงค์ผู้แนะนำ</b></td>
                        <td>http://<?=$www;?>/?<? echo readname("sa_www","system_account","sa_sm_id",$jeje['sm_id']);?></td>
                    </tr>
                    <tr>
                        <td><b>อีเมล์</b></td>
                        <td><?=$jeje['sm_email'];?></td>
                    </tr>
                    <tr>
                        <td><b>โทรศัพท์</b></td>
                        <td><?=$jeje['sm_htel'];?></td>
                    </tr>
                    <tr>
                        <td><b>โทรศัพท์มือถือ</b></td>
                        <td><?=$jeje['sm_mtel'];?></td>
                    </tr>
                    <tr>
                        <td><b>ที่อยู่</b></td>
                        <td><?=$jeje['sm_addr'].", ".$jeje['sm_postcode'].", ".readname("sd_name","system_district","sd_id",$jeje['sm_district']);?></td>
                    </tr>
                    <tr>
                        <td><b>ธนาคาร</b></td>
                        <td><?=$jeje['sm_bank_name'];?> สาขา <?=$jeje['sm_bank_area'];?></td>
                    </tr>
                    <tr>
                        <td><b>เลขที่บัญชี</b></td>
                        <td><?=$jeje['sm_bank_id'];?></td>
                    </tr>
                    <tr>
                        <td><b>ชื่อบัญชี</b></td>
                        <td><?=$jeje['sm_bank_acc'];?></td>
                    </tr>
                    <tr>
                        <td><b>ประเภทบัญชี</b></td>
                        <td><?=$jeje['sm_bank_type'];?></td>
                    </tr>
                </tbody>
            </table>
            </section>
    	</div>
    </div>
    
     <div class="columns leading">
        <div class="grid_4 first">
            <h4><img src="images/icon/002.png" /> สถิติบัญชี</h4>
            <hr/>
            <table class="no-style full">
                <tbody>
                    <tr>
                        <td><img src="images/icon/033.png" /> สถานะปัจจุบัน</td>
                        <td class="ar"><? if($requireply['sli_vip']==1){?>VIP Active<? }else{?>Active<? }?></td>
                    </tr>
                    <tr>
                        <td><img src="images/icon/025.png" /> วันที่เปิดบัญชี</td>
                        <td class="ar"><?=datethai($requireply['sli_upd'],'day');?></td>
                    </tr>
                    <tr>
                        <td><img src="images/icon/053.png" /> ต่ออายุสมาชิกล่าสุด</td>
                        <td class="ar"><?=datethai($requireply['sli_renew'],'dtime');?></td>
                    </tr>
                    <tr>
                        <td><img src="images/icon/052.png" /> หมดอายุสมาชิกวันที่</td>
                        <td class="ar"><?=datethai($requireply['sli_expire'],'dtime');?></td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="grid_4">
            <h4><img src="images/icon/081.png" /> สถิติสายงาน</h4>
             <? /* ******************** check member reply ******************** */
			include_once('module/adminna_chek_liner.php');
			?>
            <hr/>
            <table class="no-style full">
                <tbody>
                	<tr>
                        <td><img src="images/icon/chart_organisation.png" /> การต่อสายงานทั้งหมด</td>
                        <td class="ar"><?=$chkl;?></td>
                        <td class="ar">ชั้น</td>
                    </tr>
                    <tr>
                        <td><img src="images/icon/ruby.png" /> สมาชิกเต็มชั้น</td>
                        <td class="ar"><?=$chkf==""?"0":$chkf;?></td>
                        <td class="ar">ชั้น</td>
                    </tr>
                    <tr>
                        <td><img src="images/icon/group_link.png" /> สมาชิกในสายงานทั้งหมด</td>
                        <td class="ar"><?=$numall;?></td>
                        <td class="ar">คน</td>
                    </tr>
                    <tr>
                        <td><img src="images/icon/status_online.png" /> สมาชิกในสายงาน</td>
                        <td class="ar"><?=$numvip;?></td>
                        <td class="ar">คน</td>
                    </tr>
                    <tr>
                        <td><img src="images/icon/status_offline.png" /> สมาชิกในสายงานหมดอายุ</td>
                        <td class="ar"><?=$numnor;?></td>
                        <td class="ar">คน</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
    
	<div class="grid_8 first">
    <? include('module/checkliner.php');?>	
    </div>
    
    <!--<div id="dollphine" class="grid_8 first">
    <? //include('module/doll_shcedul.php');?>
    </div>-->
    
    <div align="center">
    	<a href="javascript:void(0);" onclick="javascript:window.back(-1);" class="button button-orange">กลับไปดูสมาชิกที่อยู่ในระบบสายงานทั้งหมด</a>
    </div>
    
    </div>
</div>
<? }elseif($casy=="pvmanage"){
$requireply=queryx1("select * from system_liner where sli_id='$id'");
$reply=$requireply['sli_sr_reply'];

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
    
    <div class="columns leading">
        <div class="grid_4 first">
            <h4><img src="images/icon/calculator.png" /> ยอดรายได้สมาชิก</h4>
            <hr/>
            <table class="no-style full">
                <tbody>
                    <tr>
                        <td><img src="images/icon/flag_blue.png"/> ยอดสะสมรายได้ทั้งหมด</td>
                        <td class="ar"><? 
						$x1=queryx1("select sum(spi_pt) as x1 from system_point where sli_id='".$reply."' and spi_cut='1'"); 
						if($requireply['sli_level']!=1){
							$numbergo=$x1['x1'];
						}else{
							$jbill_s=countl3("select stl_id from system_bill_list where sli_sr_reply='$reply' limit 1");
							if($jbill_s==1){
								$checkjoper=queryx1("select sum(stl_pv) as joper from system_bill_list where sli_sr_reply='$reply'");
								$totalx1b=$x1['x1']-$checkjoper['joper'];
								$numbergo=$x1['x1']-$totalx1b;
							}else{
								$numbergo=$x1['x1']-1500;
							}
						}
						$numbergo<0?$numbergo=0:$numbergo=$numbergo;
						echo number_format($numbergo);
						?></td>
                        <td class="ar">บาท</td>
                    </tr>
                    <tr>
                        <td><img src="images/icon/calendar_link.png" /> ยอดสะสมรายได้ปัจจุบัน</td>
                        <td class="ar">
						<? $x3=queryx1("select sum(spi_pt) as x3 from system_point where sli_id='".$reply."' and spi_cut='0'"); echo number_format($x3['x3']);?></td>
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
                    <li><a href="#">รายการโบนัสเติมเงิน</a></li>
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
                                <th width="80">จำนวน บาท</th>
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
                    <h4>รายการโบนัสเติมเงินทั้งหมด เรียงตามวันที่ได้รับล่าสุด</h4>
                    <table class="paginate sortable full bordered">
                        <thead>
                            <tr>
                                <th width="20">รายการ</th>
                                <th width="20">สถานะ</th>
                                <th width="120">วันที่</th>
                                <th>จำนวนเงินปันผลส่วนตัว บาท</th>
                                <th>จำนวนเงินปันผลจากสมาชิกในสายงาน บาท</th>
                                <th>จำนวนเงินปันผลรวม บาท</th>
                            </tr>
                        </thead>
                        <tbody>
                            <? $pi1=queryx2("SELECT stpv_cut, stpv_update, SUM(stpv_own_point) AS total_own_point, SUM(stpv_liner_point) AS total_liner_point from system_topup_point where sm_id='$reply' GROUP BY DATE_FORMAT(stpv_update, '%d/%m/%Y') order by stpv_update DESC"); $pin=0;
                            while($ftc=mysql_fetch_array($pi1)){$pin++;
                            ?>
                            <tr>
                                <td align="center"><?=$pin;?></td>
                                <td align="center"><?=$ftc['stpv_cut']=="0"?"<img src=\"images/icon/arrow_circle_double.png\" />":"<img src=\"images/icon/accept.png\" />";?></td>
                                <td><?=datethai($ftc['stpv_update'],'day');?></td>
                                <td align="right"><?php printf("%.2f", $ftc['total_own_point']) ;?> บาท</td>
                                <td align="right"><?php printf("%.2f", $ftc['total_liner_point']) ;?> บาท</td>
                                <td align="right"><?php printf("%.2f", $ftc['total_own_point']+$ftc['total_liner_point']) ;?> บาท</td>
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
    
    <div class="clear"></div>
    
    <div class="grid_8 first">
        <div class="preloader"><img src="images/ajax-loader.gif" /></div>
        <div class="showresult"></div>
        <form action="#" method="post" enctype="multipart/form-data" name="addpv" id="addpv" class="form panel">
        <input type="hidden" name="action" value="2" />
        <header><h3>เติมเงินให้สมาชิก</h3></header>
        <hr />
              <fieldset>
                  <dl>
                      <dt></dt><dd><label>รหัสสมาชิก</label><input type="text" name="mcode" value="<?=$jojo['sm_code'];?>" readonly="readonly" /></dd>
                      <dt></dt><dd><label>ชื่อสมาชิก</label><input type="text" name="mcode" value="<?=$jojo['sm_name'];?>" readonly="readonly" /></dd>
                      <dt></dt><dd><label>เพิ่มจำนวน เงิน</label><input type="range" name="pvx" min="50" max="5000" value="500" /></dd>
                      <dt></dt><dd><label>เพิ่มเติม</label><textarea name="notic" rows="3" cols="40"></textarea></dd>
                  </dl>    
              </fieldset>
              <hr />
              <button class="button button-green" type="submit" name="btnsend" onclick="javascript:return confirm('เพิ่ม เงิน สมาชิกท่านนี้');">ยืนยัน</button>
              <button class="button button-gray" type="reset" name="btnclear">เครียร์ค่าเริ่มต้น</button>
      </form>
      <script type="text/javascript">$(":range").rangeinput();</script>
      </div>
    
	<div class="clear"></div>
    
</div>
<? }elseif($casy=="viprenew"){ $xd=date("Y-m-d H:i:s");
$requireply=queryx1("select * from system_liner where sli_id='$id'");
$reply=$requireply['sli_sr_reply'];
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
    	<div class="panel">
        <header><h2><img src="images/icon/081.png" /> สถิติการต่ออายุสมาชิก</h2></header>
        <hr />
            <section>
            <table class="no-style full">
                <tbody>
                <tr>
                    <td>จำนวนการต่ออายุ</td>
                    <td class="ar"><?=countl3("select srn_id from system_renew where sli_id='$reply'");?> ครั้ง</td>
                </tr>
                <tr>
                    <td>ต่ออายุครั้งล่าสุด</td>
                    <td class="ar"><?=datethai($requireply['sli_renew'],'dtime');?></td>
                </tr>
                <tr>
                    <td>แผนการต่ออายุล่าสุด</td>
                    <td class="ar"><?=viptimeshow($requireply['sli_plane']);?></td>
                </tr>
                <tr>
                    <td>วันหมดอายุ</td>
                    <td class="ar"><?=datethai($requireply['sli_expire'],'dtime');?></td>
                </tr>
                <tr>
                    <td>วันคงเหลือ</td>
                    <td class="ar"><?=$dend;?> วัน</td>
                </tr>
                </tbody>
            </table>
            </section>
    	</div>
    </div>    
    
    <div class="grid_3">
    	<div class="panel">
    	<header><h2><img src="images/icon/187.png" /> รายการการต่ออายุสมาชิก</h2></header>
        <table class="paginate sortable full">
            <thead>
                <tr>
                    <th>รายการที่</th>
                    <th>แผนการต่ออายุ</th>
                    <th>วันที่ต่ออายุ</th>
                </tr>
            </thead>
            <tbody>
                <? $pi1=queryx2("select * from system_renew where sli_id='$reply' order by srn_upd DESC"); $pin=0;
                while($ftc=mysql_fetch_array($pi1)){$pin++;
                ?>
                <tr>
                    <td align="center"><?=$pin;?></td>
                    <td><?=viptimeshow($ftc['srn_plane']);?></td>
                    <td><?=datethai($ftc['srn_upd'],'dtime');?></td>
                </tr>
                <? }?>
            </tbody>
        </table>
        </div>
    </div>
    
    <div class="grid_2">
    	<div class="panel">
        	<div class="showresultx">
            <header><h2><img src="images/icon/025.png" /> เพิ่มวันให้กับสมาชิก</h2></header>
            <form action="" method="post" name="fromrenewspe" id="fromrenewspe" class="form">
                <input type="hidden" name="hsmid" value="<?=$reply;?>" />
                <input type="hidden" name="action" value="9" />
                <dt></dt><dd><label>รหัสสมาชิก *</label><input type="text" name="mid" size="31" required="required" value="<?=$jojo['sm_code'];?>" readonly="readonly" /></dd>
                <dt></dt><dd><label>เพิ่มวัน *</label><input type="range" name="ddate" value="1" min="1" max="365" /></dd>
                <div class="clear"></div>
                <hr />
                <button class="button button-orange" type="submit" onclick="javascript:return confirm('ต้องการเพิ่มวันให้กับสมาชิก ใช่ หรือ ไม่');">ยืนยัน</button>
                <div class="preloader" class="fr"><img src="images/ajax-loader.gif" /></div>
            </form>
            <br />
            <div class="erroresultx"></div>
            </div>
        </div>
        <script type="text/javascript">$(":range").rangeinput();</script>
    </div>
    <div class="columns leading">
       <hr />
       <h3>เลือกแผนการต่ออายุสมาชิก</h3>
       <div class="showresult grid_8">
       <div class="grid pricing-table column grid_8 first">
         <article>
           <header>
               <h1>Standard</h1>
           </header>
           <footer>
             <p><strong><?=$pmv;?> บาท</strong> เป็นสมาชิก 1 เดือน</p>
             <form action="" method="post" name="formrenew1" id="formrenew1">
             <input type="hidden" name="plane1" value="1" />
             <input type="hidden" name="action1" value="3" />
             <input type="hidden" name="reply1" value="<?=$reply?>" />
             <input type="submit" name="btnok" value="เลือกแผนการต่ออายุ นี้" class="button button-blue" onclick="javascript:return confirm('ต่ออายุสมาชิก 1 เดือน');" />
             </form>
           </footer>
         </article>
       </div>
       <div class="preloader" align="center"><img src="images/ajax-loader.gif" /></div>
       <div class="erroresult"></div>
       </div>
    </div>
    <div class="clear"></div>
    
<? }elseif($casy=="uplevel"){ $xd=date("Y-m-d H:i:s");
$requireply=queryx1("select * from system_liner where sli_id='$id'");
$reply=$requireply['sli_sr_reply'];
$target=$requireply['sli_sr_target'];
$dend=round(DateDiff($xd,$requireply['sli_expire']));
$jojo=queryx1("select * from system_member where sm_id='$reply'");		
$jeje=queryx1("select * from system_member where sm_id='$target'");		
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
    
    <div class="columns leading">
        <div class="grid_4 first">
            <h4><img src="images/icon/002.png" /> สถิติบัญชี</h4>
            <hr/>
            <table class="no-style full">
                <tbody>
                    <tr>
                        <td><img src="images/icon/033.png" /> สถานะปัจจุบัน</td>
                        <td class="ar"><? if($requireply['sli_vip']==1){?>บัญชี<? }else{?>บัญชีปกติ<? }?></td>
                    </tr>
                    
                    <tr>
                        <td><img src="images/icon/star.png" /> ลำดับชั้นสมาชิก</td>
                        <td class="ar">level <?=$requireply['sli_level'];?></td>
                    </tr>
                    <tr>
                        <td><img src="images/icon/025.png" /> วันที่เปิดบัญชี</td>
                        <td class="ar"><?=datethai($requireply['sli_upd'],'day');?></td>
                    </tr>
                    <tr>
                        <td><img src="images/icon/053.png" /> ต่ออายุสมาชิกล่าสุด</td>
                        <td class="ar"><?=datethai($requireply['sli_renew'],'dtime');?></td>
                    </tr>
                    <tr>
                        <td><img src="images/icon/052.png" /> หมดอายุสมาชิกวันที่</td>
                        <td class="ar"><?=datethai($requireply['sli_expire'],'dtime');?></td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="grid_4">
            <h4><img src="images/icon/081.png" /> สถิติสายงาน</h4>
             <? /* ******************** check member reply ******************** */
			include_once('module/adminna_chek_liner.php');
			?>
            <hr/>
            <table class="no-style full">
                <tbody>
                	<tr>
                        <td><img src="images/icon/chart_organisation.png" /> การต่อสายงานทั้งหมด</td>
                        <td class="ar"><?=$chkl;?></td>
                        <td class="ar">ชั้น</td>
                    </tr>
                    <tr>
                        <td><img src="images/icon/ruby.png" /> สมาชิกเต็มชั้น</td>
                        <td class="ar"><?=$chkf==""?"0":$chkf;?></td>
                        <td class="ar">ชั้น</td>
                    </tr>
                    <tr>
                        <td><img src="images/icon/group_link.png" /> สมาชิกในสายงานทั้งหมด</td>
                        <td class="ar"><?=$numall;?></td>
                        <td class="ar">คน</td>
                    </tr>
                    <tr>
                        <td><img src="images/icon/status_online.png" /> สมาชิกในสายงาน</td>
                        <td class="ar"><?=$numvip;?></td>
                        <td class="ar">คน</td>
                    </tr>
                    <tr>
                        <td><img src="images/icon/status_offline.png" /> สมาชิกในสายงานปกติ</td>
                        <td class="ar"><?=$numnor;?></td>
                        <td class="ar">คน</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
    
    <div class="clear"></div>
    
    <div class="grid_5 first">
    	<? include('module/checkliner.php');?>	
    </div>
    
    <div class="grid_3">
      <div class="panel">
      <header><h2><img src="images/icon/id_card.png" /> การเลือนขั้นสมาชิก</h2></header>
      <hr />
          <section>
          <table class="no-style full">
          <thead>
          	<tr>
            	<th><img src="images/icon/chart_up.png" /></th>
                <th><img src="images/icon/users.png" /></th>
                <th><img src="images/icon/refresh.png" /></th>
                <th><img src="images/icon/promotion.png" /></th>
            </tr>
          </thead>
          <tbody>
		  <? for($xo=1;$xo<=$levelliner;$xo++){?>
          <tr>
          	<td align="center"> ชั้นที่ <?=$xo;?></td>
            <td align="center"> สมาชิก <?=$lineMR[$xo];?>/<?=pow($memberliner,$xo);?> คน</td>
            <td align="center"><? if($lineMR[$xo]==pow($memberliner,$xo)){if($requireply['sli_level']==$xo){echo "เลือนขั้นเรียบร้อยแล้ว";}else{?><a href="<?=$link;?>?page=process&id=<?=$requireply['sli_sr_reply'];?>&level=<?=$xo;?>&action=5" onclick="javascript:return confirm('ยืนยันการเลือนขั้นสมาชิก โปรดทราบ เมื่อทำการเลือนขั้นสมาชิกแล้วจะไม่สามารถลดขั้นสมาชิกท่านนี้ได้อีก');"> เลือนขั้นสมาชิก</a><? }}else{echo "สมาชิกยังไม่เต็มชั้น";}?></td>
            <td align="right"><b><?=pow($memberliner,$xo)*$pv4;?></b> เงิน</td>
          </tr>
		  <? }?>
          </tbody>
          </table>
          </section>
      <hr />
      </div>
	</div>
  
</div>
<? }elseif($casy=="payrecieve"){ $xd=date("Y-m-d H:i:s");
$requireply=queryx1("select * from system_point_dra where spr_id='$id'");
$reply=$requireply['sli_id']; $jojo=queryx1("select * from system_member where sm_id='$reply'"); ?>
<div class="columns leading">
    <div class="grid_8 first">
    
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
        <div class="panel">
            <header><h2><img src="images/icon/coins.png" /> รายการ รายได้ ของสมาชิก</h2></header>
            <hr />
            <section>
            <table class="no-style full">
            <tbody>
                <tr>
                    <td>รายได้ ทัังหมด</td>
                    <td></td>
                    <td class="ar"><? $jql=queryx1("select sum(spi_pt) as pv_total from system_point where sli_id='$reply'"); echo $pvl=$jql['pv_total'];?></td>
                    <td class="ar">pv</td>
                </tr>
                <tr>
                    <td>รายได้ ทีถอนออกไป</td>
                    <td class="ar"><? $jqr=queryx1("select sum(spr_pt) as pr_total from system_point_dra where sli_id='$reply' and spr_ck='1'"); $pvr=$jqr['pr_total']; echo $pvr==""?"0":"-".$pvr;?> pv</td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td>รายได้ คงเหลือ</td>
                    <td></td>
                    <td class="ar"><?=$pto=($pvl-$pvr);?></td>
                    <td class="ar">pv</td>
                </tr>
                <? if($requireply['spr_ck']!=0){?>
                <tr><td colspan="4"><hr /></td></tr>
                <tr>
                    <td><b>จำนวน รายได้ คงเหลือสุทธิ</b></td>
                    <td></td>
                    <td class="ar"><b><?=$ptl=($pto);?></b></td>
                    <td class="ar"><b>pv</b></td>
                </tr>
                <? }else{?>
                <tr>
                    <td>รายได้ สุทธิ</td>
                    <td></td>
                    <td class="ar"><?=$ptl=($pto);?></td>
                    <td class="ar">pv</td>
                </tr>
                <? } if($requireply['spr_ck']==0){?>
                <tr><td colspan="4"><hr /></td></tr>
                <tr>
                    <td><b>จำนวน รายได้ คงเหลือสุทธิ</b></td>
                    <td></td>
                    <td class="ar"><b><?=$ptl;?></b></td>
                    <td class="ar"><b>pv</b></td>
                </tr>
                <tr>
                    <td><b>จำนวน รายได้ ที่ต้องการถอน</b></td>
                    <td></td>
                    <td class="ar"><b><?=$requireply['spr_pt'];?></b></td>
                    <td class="ar"><b>pv</b></td>
                </tr>
                <tr>
                    <td><b>จำนวน รายได้ คงเหลือหลังจากยืนยันการถอน</b></td>
                    <td></td>
                    <td class="ar"><b><?=($ptl-$requireply['spr_pt']);?></b></td>
                    <td class="ar"><b>pv</b></td>
                </tr>
                <? }?>
            </tbody>
        </table>
        </section>
        </div>
        </div>
        
        <div class="grid_5">
            <div class="widget">
                <header><h2><img src="images/icon/calculator.png"> ถอน รายได้</h2></header>
                <section>
                	<? if($_GET['cls']==""){
					if($requireply['spr_ck']==0){?>
                    <form action="<?=$link?>?page=process&action=6" method="post" name="pvrecieve" id="pvrecieve">
                    	<input type="hidden" name="spr_id" value="<?=$id;?>">
                        <div class="grid_1 first">
                        	<h5>จำนวนพีวีถอน</h5>
                        	<p><input type="text" name="pvx" value="<?=$requireply['spr_pt'];?>" size="7" readonly="readonly" /> รายได้</p>
                        </div>
                        <div class="grid_1">
                        	<h4>เลือกสถานะ</h4>
                            <p>
                            <input type="radio" value="0" name="spr_ck" <? if($requireply['spr_ck']==0){?>checked="checked"<? }?> /> รอการยืนยัน <br />
                            <input type="radio" value="1" name="spr_ck" <? if($requireply['spr_ck']==1){?>checked="checked"<? }?> /> ยืนยันเรียบร้อย <br />
                            <input type="radio" value="2" name="spr_ck" <? if($requireply['spr_ck']==2){?>checked="checked"<? }?> /> ปฏิเสธคำขอ </p>
                        </div>
                        <div class="grid_2">
                        	<h4>รายละเอียดเพิ่มเติม</h4>
                            <p><textarea cols="35" rows="2" name="comment"></textarea></p>
                        </div>
                        
                        <div class="clear"></div>
                        <hr />
                        <div align="center">
                        <button class="button button-orange" type="submit" name="btnsend" onclick="javascript:return confirm('โปรดทราบหากทำการยืนยันไปแล้วจะไม่สามารถกลับมาแก้ไขภายหลังได้อีกครั้ง');">ยืนยันการถอน</button> 
                        <button class="button button-gray" type="reset" name="btnclear">เคลียร์</button>
                        <button class="button button-blue" type="button" onclick="javascript:window.location='<?=$link;?>?page=payrecieve';">กลับไปดูรายการทั้งหมด</button>
                        </div>
                    </form>
                    <? }else{?>
                    	<div class="grid_1 first">
                        	<h5>จำนวนพีวีถอน</h5>
                        	<p><?=$requireply['spr_pt'];?> รายได้</p>
                        </div>
                        <div class="grid_1">
                        	<h4>สถานะ</h4>
                            <p><?=$requireply['spr_ck']==1?"<img src=\"images/icon/accept.png\" /> ยืนยันแล้ว":"<img src=\"images/icon/cross.png\" /> ปฏิเสธคำขอ";?></p>
                        </div>
                        <div class="grid_2">
                        	<h4>รายละเอียดเพิ่มเติม</h4>
                            <p><?=$requireply['spr_comment'];?></p>
                        </div>
                    	<div class="clear"></div>
                        <hr />
                        <div align="center"><button class="button button-blue" type="button" onclick="javascript:window.location='<?=$link;?>?page=payrecieve';">กลับไปดูรายการทั้งหมด</button></div>
					<? }}else{?>
                    <div class='message success'><h3>สำเร็จ!</h3> ทำรายการบันทึกถอน รายได้ เรียบร้อย<hr><b>โปรดทราบ เมื่อทำการบันทึกรายการถอน รายได้ เรียบร้อยแล้ว จะไม่สามารถแก้ไขได้อีกครั้ง</b></div><div align="center"><button class="button button-blue" type="button" onclick="javascript:window.location='<?=$link;?>?page=payrecieve';">กลับไปดูรายการทั้งหมด</button></div>
                    <? }?>
                </section>
            </div>
        </div>
        
	</div>
</div>
<? }?>