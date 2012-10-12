<? $okld=date("Y-m-d");
$requireply=queryx1("select * from system_liner where sli_sr_reply='$smid'");
$target=$requireply['sli_sr_target'];
$reply=$requireply['sli_sr_reply'];

$jojo=queryx1("select * from system_member where sm_id='$reply'");	
?>
<div class="columns leading">
    <div class="grid_4 first">
    	<div class="widget">
        <header><h2><img src="images/icon/Users_24.png"> ข้อมูลส่วนตัว</h2> </header>
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
        <header><h2><img src="images/icon/Personnel_24.png"> ข้อมูลอัฟไลน์</h2></header>
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
                </tbody>
            </table>
            </section>
    	</div>
    </div>
    
     <div class="columns leading">
        <div class="grid_4 first">
            <h4><img src="images/icon/002.png" /> ข้อมูลบัญชี</h4>
            <hr/>
            <table class="no-style full">
                <tbody>
                    <tr>
                        <td><img src="images/icon/033.png" /> สถานะปัจจุบัน</td>
                        <td class="ar"><? if($requireply['sli_svip']==1){?>VIP Active<? }else{?>Active<? }?></td>
                    </tr>
                    
                    <tr>
                        <td><img src="images/icon/025.png" /> วันที่เปิดบัญชีวีไอพี</td>
                        <td class="ar"><?=datethai($requireply['sli_upd'],'day');?></td>
                    </tr>
                    <tr>
                        <td><img src="images/icon/053.png" /> รักษายอดสมาชิกวีไอพีล่าสุด</td>
                        <td class="ar"><?=datethai($requireply['sli_renew'],'dtime');?></td>
                    </tr>
                    <tr>
                        <td><img src="images/icon/052.png" /> หมดอายุสมาชิกวันที่</td>
                        <td class="ar"><?=datethai($requireply['sli_expire'],'dtime');?></td>
                    </tr>
                    <tr>
                        <td><img src="images/icon/star.png" /> วันคงหลือ</td>
                        <td class="ar"><?=round(DateDiff($okld,$requireply['sli_expire']));?> วัน</td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="grid_4">
            <h4><img src="images/icon/081.png" /> ข้อมูลสายงาน</h4>
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
                        <td><img src="images/icon/status_online.png" /> สมาชิกในสายงานวีไอพี</td>
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
    
</div>