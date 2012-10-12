<? $okld=date("Y-m-d H:i:s"); $kop=$_SERVER['PHP_SELF']; $chk_pg=explode("/",$kop);?>
<div class="widget">
<header><h2><img src="images/icon/chart_organisation.png"> ผังโครงสร้าง</h2></header>
<section>
	<div class="dollplane">
    	<? $opz1=queryx1("select system_member.sm_code, system_member.sm_pic, system_member.sm_name, system_member.sm_mtel, system_member.sm_email, system_member.sm_date_regist, system_liner.sli_upd, system_liner.sli_expire from system_member left join system_liner on (system_member.sm_id=system_liner.sli_sr_reply) where system_member.sm_id='$reply' limit 1"); $opz1_d=round(DateDiff($okld,$opz1['sli_expire']));?>
        <ul id="org" style="display:none">
        	<li>
            	<? if($opz1['sm_pic']!=""){echo "<img src=\"../file/profile/".$opz1['sm_pic']."\" width=\"50\" height=\"50\" />";}?>
                <div class="boxj">
                	<span class="bokavrg"><? if($opz1['sm_pic']!=""){echo "<img src=\"../file/profile/".$opz1['sm_pic']."\" width=\"50\" height=\"50\" />";}?></span>
                	<span>รหัสสมาชิก</span> : <?=$opz1['sm_code'];?><br />
                    <span>ชื่อ - สกุล</span> : <?=$opz1['sm_name'];?><br />
                    <span>เบอร์โทร</span> : <?=$opz1['sm_mtel'];?><br />
                    <span>อีเมล์</span> : <?=$opz1['sm_email'];?><br />
                    <span>สมัครสมาชิก</span> : <?=datethai($opz1['sm_date_regist'],'day');?><br />
                    <span>สมัครวีไอพี</span> : <?=datethai($opz1['sli_upd'],'day');?><br />
                    <span>หมดอายุ</span> : <?=datethai($opz1['sli_expire'],'dtime');?> | อีก <?=$opz1_d;?> วัน<br />
                </div>
            	<ul><? $opy2=queryx2("select system_member.sm_id, system_member.sm_code, system_member.sm_pic, system_member.sm_name, system_member.sm_mtel, system_member.sm_email, system_member.sm_date_regist, system_liner.sli_upd, system_liner.sli_expire, system_liner.sli_sr_reply, system_liner.sli_id from system_liner left join system_member on (system_liner.sli_sr_reply=system_member.sm_id) where system_liner.sli_sr_target='$reply' limit 5"); while($opz2=mysql_fetch_array($opy2)){ $opz2_d=round(DateDiff($okld,$opz2['sli_expire']));?>
                	<li>
                    	<? if($opz2['sm_pic']!=""){echo "<img src=\"../file/profile/".$opz2['sm_pic']."\" width=\"50\" height=\"50\" />";}?>
                        <div class="boxj">
                        	<span class="bokavrg"><? if($opz2['sm_pic']!=""){echo "<img src=\"../file/profile/".$opz2['sm_pic']."\" width=\"50\" height=\"50\" />";}?></span>
                        	<span>รหัสสมาชิก</span> : <?=$opz2['sm_code'];?><br />
                            <span>ชื่อ - สกุล</span> : <?=$opz2['sm_name'];?><br />
                            <span>เบอร์โทร</span> : <?=$opz2['sm_mtel'];?><br />
                            <span>อีเมล์</span> : <?=$opz2['sm_email'];?><br />
                            <span>สมัครสมาชิก</span> : <?=datethai($opz2['sm_date_regist'],'day');?><br />
                            <span>สมัครวีไอพี</span> : <?=datethai($opz2['sli_upd'],'day');?><br />
                            <span>หมดอายุ</span> : <?=datethai($opz2['sli_expire'],'dtime');?> | อีก <?=$opz2_d;?> วัน<br />
                            <? if(in_array("adminna.php",$chk_pg)){?>
                            <a href="adminna.php?page=request&casy=checkliner&id=<?=$opz2['sli_id'];?>#dollphine">ดูผังสายงาน</a>
                            <? }?>
                        </div>
                        <ul><? $opy3=queryx2("select system_member.sm_id, system_member.sm_code, system_member.sm_pic, system_member.sm_name, system_member.sm_mtel, system_member.sm_email, system_member.sm_date_regist, system_liner.sli_upd, system_liner.sli_expire, system_liner.sli_sr_reply, system_liner.sli_id from system_liner left join system_member on (system_liner.sli_sr_reply=system_member.sm_id) where system_liner.sli_sr_target='".$opz2['sli_sr_reply']."' limit 5"); while($opz3=mysql_fetch_array($opy3)){ $opz3_d=round(DateDiff($okld,$opz3['sli_expire']));?>
                            <li>
                            	<? if($opz3['sm_pic']!=""){echo "<img src=\"../file/profile/".$opz3['sm_pic']."\" width=\"50\" height=\"50\" />";}?>
                                <div class="boxj">
                                	<span class="bokavrg"><? if($opz3['sm_pic']!=""){echo "<img src=\"../file/profile/".$opz3['sm_pic']."\" width=\"50\" height=\"50\" />";}?></span>
                                	<span>รหัสสมาชิก</span> : <?=$opz3['sm_code'];?><br />
                                    <span>ชื่อ - สกุล</span> : <?=$opz3['sm_name'];?><br />
                                    <span>เบอร์โทร</span> : <?=$opz3['sm_mtel'];?><br />
                                    <span>อีเมล์</span> : <?=$opz3['sm_email'];?><br />
                                    <span>สมัครสมาชิก</span> : <?=datethai($opz3['sm_date_regist'],'day');?><br />
                                    <span>สมัครวีไอพี</span> : <?=datethai($opz3['sli_upd'],'day');?><br />
                                    <span>หมดอายุ</span> : <?=datethai($opz3['sli_expire'],'dtime');?> | อีก <?=$opz3_d;?> วัน<br />
                                    <? if(in_array("adminna.php",$chk_pg)){?>
                                    <a href="adminna.php?page=request&casy=checkliner&id=<?=$opz3['sli_id'];?>#dollphine">ดูผังสายงาน</a>
                                    <? }?>
                                </div>
								<ul><? $opy4=queryx2("select system_member.sm_id, system_member.sm_code, system_member.sm_pic, system_member.sm_name, system_member.sm_mtel, system_member.sm_email, system_member.sm_date_regist, system_liner.sli_upd, system_liner.sli_expire, system_liner.sli_sr_reply, system_liner.sli_id from system_liner left join system_member on (system_liner.sli_sr_reply=system_member.sm_id) where system_liner.sli_sr_target='".$opz3['sli_sr_reply']."' limit 5"); while($opz4=mysql_fetch_array($opy4)){ $opz4_d=round(DateDiff($okld,$opz4['sli_expire']));?>
                                	<li>
                                    	<? if($opz4['sm_pic']!=""){echo "<img src=\"../file/profile/".$opz4['sm_pic']."\" width=\"50\" height=\"50\" />";}?>
                                        <div class="boxj">
                                        	<span class="bokavrg"><? if($opz4['sm_pic']!=""){echo "<img src=\"../file/profile/".$opz4['sm_pic']."\" width=\"50\" height=\"50\" />";}?></span>
                                        	<span>รหัสสมาชิก</span> : <?=$opz4['sm_code'];?><br />
                                            <span>ชื่อ - สกุล</span> : <?=$opz4['sm_name'];?><br />
                                            <span>เบอร์โทร</span> : <?=$opz4['sm_mtel'];?><br />
                                            <span>อีเมล์</span> : <?=$opz4['sm_email'];?><br />
                                            <span>สมัครสมาชิก</span> : <?=datethai($opz4['sm_date_regist'],'day');?><br />
                                            <span>สมัครวีไอพี</span> : <?=datethai($opz4['sli_upd'],'day');?><br />
                                            <span>หมดอายุ</span> : <?=datethai($opz4['sli_expire'],'dtime');?> | อีก <?=$opz4_d;?> วัน<br />
                                            <? if(in_array("adminna.php",$chk_pg)){?>
                                            <a href="adminna.php?page=request&casy=checkliner&id=<?=$opz4['sli_id'];?>#dollphine">ดูผังสายงาน</a>
                                            <? }?>
                                        </div>
                                		<ul><? $opy5=queryx2("select system_member.sm_id, system_member.sm_code, system_member.sm_pic, system_member.sm_name, system_member.sm_mtel, system_member.sm_email, system_member.sm_date_regist, system_liner.sli_upd, system_liner.sli_expire, system_liner.sli_sr_reply, system_liner.sli_id from system_liner left join system_member on (system_liner.sli_sr_reply=system_member.sm_id) where system_liner.sli_sr_target='".$opz4['sli_sr_reply']."' limit 5"); while($opz5=mysql_fetch_array($opy5)){ $opz5_d=round(DateDiff($okld,$opz5['sli_expire']));?>
                                    		<li>
                                        		<? if($opz5['sm_pic']!=""){echo "<img src=\"../file/profile/".$opz5['sm_pic']."\" width=\"50\" height=\"50\" />";}?>
                                            	<div class="boxj">
                                                	<span class="bokavrg"><? if($opz5['sm_pic']!=""){echo "<img src=\"../file/profile/".$opz5['sm_pic']."\" width=\"50\" height=\"50\" />";}?></span>
                                                    <span>รหัสสมาชิก</span> : <?=$opz5['sm_code'];?><br />
                                                    <span>ชื่อ - สกุล</span> : <?=$opz5['sm_name'];?><br />
                                                    <span>เบอร์โทร</span> : <?=$opz5['sm_mtel'];?><br />
                                                    <span>อีเมล์</span> : <?=$opz5['sm_email'];?><br />
                                                    <span>สมัครสมาชิก</span> : <?=datethai($opz5['sm_date_regist'],'day');?><br />
                                                    <span>สมัครวีไอพี</span> : <?=datethai($opz5['sli_upd'],'day');?><br />
                                                    <span>หมดอายุ</span> : <?=datethai($opz5['sli_expire'],'dtime');?> | อีก <?=$opz5_d;?> วัน<br />
                                                    <? if(in_array("adminna.php",$chk_pg)){?>
                                                    <a href="adminna.php?page=request&casy=checkliner&id=<?=$opz5['sli_id'];?>#dollphine">ดูผังสายงาน</a>
                                                    <? }?>
                                                </div>
                                                <? /*
                                        		<ul><? $opy6=queryx2("select system_gallery.sgl_file, system_member.sm_id, system_member.sm_code, system_member.sm_name, system_member.sm_htel, system_member.sm_email, system_member.sm_date, system_liner.sli_upd, system_liner.sli_expire, system_liner.sli_sr_reply from system_liner left join system_member on (system_liner.sli_sr_reply=system_member.sm_id) left join system_gallery on (system_gallery.sm_id=system_member.sm_id) where system_liner.sli_sr_target='".$opz5['sli_sr_reply']."' limit 3"); while($opz6=mysql_fetch_array($opy6)){ $opz6_d=round(DateDiff($okld,$opz6['sli_expire']));?>
                                                    <li>
                                                        <img src="../_social/avatar/thumb_50_<?=$opz6['sgl_file'];?>" />
                                                        <div class="boxj">
                                                            <span>รหัสสมาชิก</span> : <?=$opz6['sm_code'];?><br />
                                                            <span>ชื่อ - สกุล</span> : <?=$opz6['sm_name'];?><br />
                                                            <span>เบอร์โทร</span> : <?=$opz6['sm_htel'];?><br />
                                                            <span>อีเมล์</span> : <?=$opz6['sm_email'];?><br />
                                                            <span>สมัครสมาชิก</span> : <?=datethai($opz6['sm_date'],'day');?><br />
                                                            <span>สมัครวีไอพี</span> : <?=datethai($opz6['sli_upd'],'day');?><br />
                                                            <span>หมดอายุ</span> : <?=datethai($opz6['sli_expire'],'dtime');?> | อีก <?=$opz6_d;?> วัน<br />
                                                            <? if(in_array("adminna.php",$chk_pg)){?>
                                                            <a href="adminna.php?page=request&casy=checkliner&id=<?=$opz6['sli_sr_reply'];?>#dollphine">ดูผังสายงาน</a>
                                                            <? }?>
                                                        </div>
                                                        <ul><? $opy7=queryx2("select system_gallery.sgl_file, system_member.sm_id, system_member.sm_code, system_member.sm_name, system_member.sm_htel, system_member.sm_email, system_member.sm_date, system_liner.sli_upd, system_liner.sli_expire, system_liner.sli_sr_reply from system_liner left join system_member on (system_liner.sli_sr_reply=system_member.sm_id) left join system_gallery on (system_gallery.sm_id=system_member.sm_id) where system_liner.sli_sr_target='".$opz6['sli_sr_reply']."' limit 3"); while($opz7=mysql_fetch_array($opy7)){ $opz7_d=round(DateDiff($okld,$opz7['sli_expire']));?>
                                                            <li>
                                                                <img src="../_social/avatar/thumb_50_<?=$opz6['sgl_file'];?>" />
                                                                <div class="boxj">
                                                                    <span>รหัสสมาชิก</span> : <?=$opz7['sm_code'];?><br />
                                                                    <span>ชื่อ - สกุล</span> : <?=$opz7['sm_name'];?><br />
                                                                    <span>เบอร์โทร</span> : <?=$opz7['sm_htel'];?><br />
                                                                    <span>อีเมล์</span> : <?=$opz7['sm_email'];?><br />
                                                                    <span>สมัครสมาชิก</span> : <?=datethai($opz7['sm_date'],'day');?><br />
                                                                    <span>สมัครวีไอพี</span> : <?=datethai($opz7['sli_upd'],'day');?><br />
                                                                    <span>หมดอายุ</span> : <?=datethai($opz7['sli_expire'],'dtime');?> | อีก <?=$opz7_d;?> วัน<br />
                                                                    <? if(in_array("adminna.php",$chk_pg)){?>
                                                                    <a href="adminna.php?page=request&casy=checkliner&id=<?=$opz7['sli_sr_reply'];?>#dollphine">ดูผังสายงาน</a>
                                                                    <? }?>
                                                                </div>
                                                                <ul><? $opy8=queryx2("select system_gallery.sgl_file, system_member.sm_id, system_member.sm_code, system_member.sm_name, system_member.sm_htel, system_member.sm_email, system_member.sm_date, system_liner.sli_upd, system_liner.sli_expire, system_liner.sli_sr_reply from system_liner left join system_member on (system_liner.sli_sr_reply=system_member.sm_id) left join system_gallery on (system_gallery.sm_id=system_member.sm_id) where system_liner.sli_sr_target='".$opz7['sli_sr_reply']."' limit 3"); while($opz8=mysql_fetch_array($opy8)){ $opz8_d=round(DateDiff($okld,$opz8['sli_expire']));?>
                                                                    <li>
                                                                        <img src="../_social/avatar/thumb_50_<?=$opz8['sgl_file'];?>" />
                                                                        <div class="boxj">
                                                                            <span>รหัสสมาชิก</span> : <?=$opz8['sm_code'];?><br />
                                                                            <span>ชื่อ - สกุล</span> : <?=$opz8['sm_name'];?><br />
                                                                            <span>เบอร์โทร</span> : <?=$opz8['sm_htel'];?><br />
                                                                            <span>อีเมล์</span> : <?=$opz8['sm_email'];?><br />
                                                                            <span>สมัครสมาชิก</span> : <?=datethai($opz8['sm_date'],'day');?><br />
                                                                            <span>สมัครวีไอพี</span> : <?=datethai($opz8['sli_upd'],'day');?><br />
                                                                            <span>หมดอายุ</span> : <?=datethai($opz8['sli_expire'],'dtime');?> | อีก <?=$opz8_d;?> วัน<br />
                                                                            <? if(in_array("adminna.php",$chk_pg)){?>
                                                                            <a href="adminna.php?page=request&casy=checkliner&id=<?=$opz8['sli_sr_reply'];?>#dollphine">ดูผังสายงาน</a>
                                                                            <? }?>
                                                                        </div>
                                                                        <ul><? $opy9=queryx2("select system_gallery.sgl_file, system_member.sm_id, system_member.sm_code, system_member.sm_name, system_member.sm_htel, system_member.sm_email, system_member.sm_date, system_liner.sli_upd, system_liner.sli_expire, system_liner.sli_sr_reply from system_liner left join system_member on (system_liner.sli_sr_reply=system_member.sm_id) left join system_gallery on (system_gallery.sm_id=system_member.sm_id) where system_liner.sli_sr_target='".$opz8['sli_sr_reply']."' limit 3"); while($opz9=mysql_fetch_array($opy9)){ $opz9_d=round(DateDiff($okld,$opz9['sli_expire']));?>
                                                                            <li>
                                                                                <img src="../_social/avatar/thumb_50_<?=$opz9['sgl_file'];?>" />
                                                                                <div class="boxj">
                                                                                    <span>รหัสสมาชิก</span> : <?=$opz9['sm_code'];?><br />
                                                                                    <span>ชื่อ - สกุล</span> : <?=$opz9['sm_name'];?><br />
                                                                                    <span>เบอร์โทร</span> : <?=$opz9['sm_htel'];?><br />
                                                                                    <span>อีเมล์</span> : <?=$opz9['sm_email'];?><br />
                                                                                    <span>สมัครสมาชิก</span> : <?=datethai($opz9['sm_date'],'day');?><br />
                                                                                    <span>สมัครวีไอพี</span> : <?=datethai($opz9['sli_upd'],'day');?><br />
                                                                                    <span>หมดอายุ</span> : <?=datethai($opz9['sli_expire'],'dtime');?> | อีก <?=$opz9_d;?> วัน<br />
                                                                                    <? if(in_array("adminna.php",$chk_pg)){?>
                                                                                    <a href="adminna.php?page=request&casy=checkliner&id=<?=$opz9['sli_sr_reply'];?>#dollphine">ดูผังสายงาน</a>
                                                                                    <? }?>
                                                                                </div>
                                                                                <ul><? $opy10=queryx2("select system_gallery.sgl_file, system_member.sm_id, system_member.sm_code, system_member.sm_name, system_member.sm_htel, system_member.sm_email, system_member.sm_date, system_liner.sli_upd, system_liner.sli_expire, system_liner.sli_sr_reply from system_liner left join system_member on (system_liner.sli_sr_reply=system_member.sm_id) left join system_gallery on (system_gallery.sm_id=system_member.sm_id) where system_liner.sli_sr_target='".$opz9['sli_sr_reply']."' limit 3"); while($opz10=mysql_fetch_array($opy10)){ $opz10_d=round(DateDiff($okld,$opz10['sli_expire']));?>
                                                                                    <li>
                                                                                        <img src="../_social/avatar/thumb_50_<?=$opz10['sgl_file'];?>" />
                                                                                        <div class="boxj">
                                                                                            <span>รหัสสมาชิก</span> : <?=$opz10['sm_code'];?><br />
                                                                                            <span>ชื่อ - สกุล</span> : <?=$opz10['sm_name'];?><br />
                                                                                            <span>เบอร์โทร</span> : <?=$opz10['sm_htel'];?><br />
                                                                                            <span>อีเมล์</span> : <?=$opz10['sm_email'];?><br />
                                                                                            <span>สมัครสมาชิก</span> : <?=datethai($opz10['sm_date'],'day');?><br />
                                                                                            <span>สมัครวีไอพี</span> : <?=datethai($opz10['sli_upd'],'day');?><br />
                                                                                            <span>หมดอายุ</span> : <?=datethai($opz10['sli_expire'],'dtime');?> | อีก <?=$opz10_d;?> วัน<br />
                                                                                            <? if(in_array("adminna.php",$chk_pg)){?>
                                                                                            <a href="adminna.php?page=request&casy=checkliner&id=<?=$opz10['sli_sr_reply'];?>#dollphine">ดูผังสายงาน</a>
                                                                                            <? }?>
                                                                                        </div>
                                                                                        <ul><? $opy11=queryx2("select system_gallery.sgl_file, system_member.sm_id, system_member.sm_code, system_member.sm_name, system_member.sm_htel, system_member.sm_email, system_member.sm_date, system_liner.sli_upd, system_liner.sli_expire, system_liner.sli_sr_reply from system_liner left join system_member on (system_liner.sli_sr_reply=system_member.sm_id) left join system_gallery on (system_gallery.sm_id=system_member.sm_id) where system_liner.sli_sr_target='".$opz10['sli_sr_reply']."' limit 3"); while($opz11=mysql_fetch_array($opy11)){ $opz11_d=round(DateDiff($okld,$opz11['sli_expire']));?>
                                                                                            <li>
                                                                                                <img src="../_social/avatar/thumb_50_<?=$opz11['sgl_file'];?>" />
                                                                                                <div class="boxj">
                                                                                                    <span>รหัสสมาชิก</span> : <?=$opz11['sm_code'];?><br />
                                                                                                    <span>ชื่อ - สกุล</span> : <?=$opz11['sm_name'];?><br />
                                                                                                    <span>เบอร์โทร</span> : <?=$opz11['sm_htel'];?><br />
                                                                                                    <span>อีเมล์</span> : <?=$opz11['sm_email'];?><br />
                                                                                                    <span>สมัครสมาชิก</span> : <?=datethai($opz11['sm_date'],'day');?><br />
                                                                                                    <span>สมัครวีไอพี</span> : <?=datethai($opz11['sli_upd'],'day');?><br />
                                                                                                    <span>หมดอายุ</span> : <?=datethai($opz11['sli_expire'],'dtime');?> | อีก <?=$opz11_d;?> วัน<br />
                                                                                                    <? if(in_array("adminna.php",$chk_pg)){?>
                                                                                                    <a href="adminna.php?page=request&casy=checkliner&id=<?=$opz11['sli_sr_reply'];?>#dollphine">ดูผังสายงาน</a>
                                                                                                    <? }?>
                                                                                                </div>
                                                                                            </li>
                                                                                        <? }?></ul>
                                                                                    </li>
                                                                                <? }?></ul>
                                                                            </li>
                                                                        <? }?></ul>
                                                                    </li>
                                                                <? }?></ul>
                                                            </li>
                                                        <? }?></ul>
                                                    </li>
                                                <? }?></ul>*/?>
                                        	</li>
										<? }?></ul>
                                	</li>
								<? }?></ul>
                            </li>
                        <? }?></ul>
                    </li>
				<? }?></ul>
            </li>
        </ul>
        <div id="chart" class="orgChart"></div>
    </div>
</section>
</div>