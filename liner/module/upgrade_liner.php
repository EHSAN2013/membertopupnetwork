<div class="widget">
<header><h2>สายงานของผู้แนะนำ</h2></header>
<section>
<div id="sidetreecontrol"> <a href="">ปิดสายงานทั้งหมด</a> | <a href="">เปิดสายงานทั้งหมด</a> </div>
<? $uplinevip=readname("sli_vip","system_liner","sli_sr_reply",$target);?>
<!-- liner begin -->
<ul id="linertree">
	
    <!-- target begin -->
    <li><span class="target <?=$uplinevip==1?"vipst":"norst";?>">(<?=$jeje['sm_code'];?>) <?=$jeje['sm_name'];?> || <? if($uplinevip==1){?>สมาชิกพรีเมียม<? }else{?>สมาชิกปกติ<? }?> || <?=date("d F Y",strtotime(readname("sli_upd","system_liner","sli_sr_reply",$target)));?></span>
        
        <!-- liner 1 begin -->
        <ul>
        <? $linel1=queryx2("select system_liner.sli_vip,system_liner.sli_upd,system_liner.sli_sr_reply,system_member.sm_code,system_member.sm_name from system_liner left join system_member on system_liner.sli_sr_reply=system_member.sm_id where system_liner.sli_sr_target='$target' limit 3"); while($fl1=mysql_fetch_array($linel1)){ $l1id=$fl1['sli_sr_reply'];
		?>
            <li></b><span class="reply-l1 <?=$fl1['sli_vip']==1?"vipst":"norst";?>"><b>สมาชิกชั้นที่ 1</b> (<?=$fl1['sm_code'];?>) <?=$fl1['sm_name'];?> || <? if($fl1['sli_vip']==1){?>สมาชิกพรีเมียม<? }else{?>สมาชิกปกติ<? }?> || <?=date("d F Y",strtotime($fl1['sli_upd']));?></span>
                
                <!-- liner 2 begin -->
                <ul>
                <? $linel2=queryx2("select system_liner.sli_vip,system_liner.sli_upd,system_liner.sli_sr_reply,system_member.sm_code,system_member.sm_name from system_liner left join system_member on system_liner.sli_sr_reply=system_member.sm_id where system_liner.sli_sr_target='$l1id' limit 3"); while($fl2=mysql_fetch_array($linel2)){ $l2id=$fl2['sli_sr_reply'];?>
                    <li><span class="reply-l2 <?=$fl2['sli_vip']==1?"vipst":"norst";?>"><b>สมาชิกชั้นที่ 2</b> (<?=$fl2['sm_code'];?>) <?=$fl2['sm_name'];?> || <? if($fl2['sli_vip']==1){?>สมาชิกพรีเมียม<? }else{?>สมาชิกปกติ<? }?> || <?=date("d F Y",strtotime($fl2['sli_upd']));?></span>
                        
                        <!-- liner 3 begin -->
                        <ul>
                        <? $linel3=queryx2("select system_liner.sli_vip,system_liner.sli_upd,system_liner.sli_sr_reply,system_member.sm_code,system_member.sm_name from system_liner left join system_member on system_liner.sli_sr_reply=system_member.sm_id where system_liner.sli_sr_target='$l2id' limit 3"); while($fl3=mysql_fetch_array($linel3)){ $l3id=$fl3['sli_sr_reply'];?>
                            <li><span class="reply-l3 <?=$fl3['sli_vip']==1?"vipst":"norst";?>"><b>สมาชิกชั้นที่ 3</b> (<?=$fl3['sm_code'];?>) <?=$fl3['sm_name'];?> || <? if($fl3['sli_vip']==1){?>สมาชิกพรีเมียม<? }else{?>สมาชิกปกติ<? }?> || <?=date("d F Y",strtotime($fl3['sli_upd']));?></span>
                                
                                <!-- liner 4 begin -->
                                <ul>
                                <? $linel4=queryx2("select system_liner.sli_vip,system_liner.sli_upd,system_liner.sli_sr_reply,system_member.sm_code,system_member.sm_name from system_liner left join system_member on system_liner.sli_sr_reply=system_member.sm_id where system_liner.sli_sr_target='$l3id' limit 3"); while($fl4=mysql_fetch_array($linel4)){ $l4id=$fl4['sli_sr_reply'];?>
                                    <li><span class="reply-l4 <?=$fl4['sli_vip']==1?"vipst":"norst";?>"><b>สมาชิกชั้นที่ 4</b> (<?=$fl4['sm_code'];?>) <?=$fl4['sm_name'];?> || <? if($fl4['sli_vip']==1){?>สมาชิกพรีเมียม<? }else{?>สมาชิกปกติ<? }?> || <?=date("d F Y",strtotime($fl4['sli_upd']));?></span>
                                        
                                        <!-- liner 5 begin -->
                                        <ul>
                                        <? $linel5=queryx2("select system_liner.sli_vip,system_liner.sli_upd,system_liner.sli_sr_reply,system_member.sm_code,system_member.sm_name from system_liner left join system_member on system_liner.sli_sr_reply=system_member.sm_id where system_liner.sli_sr_target='$l4id' limit 3"); while($fl5=mysql_fetch_array($linel5)){ $l5id=$fl5['sli_sr_reply'];?>
                                            <li><span class="reply-l5 <?=$fl5['sli_vip']==1?"vipst":"norst";?>"><b>สมาชิกชั้นที่ 5</b> (<?=$fl5['sm_code'];?>) <?=$fl5['sm_name'];?> || <? if($fl5['sli_vip']==1){?>สมาชิกพรีเมียม<? }else{?>สมาชิกปกติ<? }?> || <?=date("d F Y",strtotime($fl5['sli_upd']));?></span>
                                                
                                                <!-- liner 6 begin -->
                                                <ul>
                                                <? $linel6=queryx2("select system_liner.sli_vip,system_liner.sli_upd,system_liner.sli_sr_reply,system_member.sm_code,system_member.sm_name from system_liner left join system_member on system_liner.sli_sr_reply=system_member.sm_id where system_liner.sli_sr_target='$l5id' limit 3"); while($fl6=mysql_fetch_array($linel6)){ $l6id=$fl6['sli_sr_reply'];?>
                                                    <li><span class="reply-l6 <?=$fl6['sli_vip']==1?"vipst":"norst";?>"><b>สมาชิกชั้นที่ 6</b> (<?=$fl6['sm_code'];?>) <?=$fl6['sm_name'];?> || <? if($fl6['sli_vip']==1){?>สมาชิกพรีเมียม<? }else{?>สมาชิกปกติ<? }?> || <?=date("d F Y",strtotime($fl6['sli_upd']));?></span>
                                                    	
                                                        <!-- liner 7 begin -->
                                                        <ul>
                                                        <? $linel7=queryx2("select system_liner.sli_vip,system_liner.sli_upd,system_liner.sli_sr_reply,system_member.sm_code,system_member.sm_name from system_liner left join system_member on system_liner.sli_sr_reply=system_member.sm_id where system_liner.sli_sr_target='$l6id' limit 3"); while($fl7=mysql_fetch_array($linel7)){ $l7id=$fl7['sli_sr_reply'];?>
                                                            <li><span class="reply-l7 <?=$fl7['sli_vip']==1?"vipst":"norst";?>"><b>สมาชิกชั้นที่ 7</b> (<?=$fl7['sm_code'];?>) <?=$fl7['sm_name'];?> || <? if($fl7['sli_vip']==1){?>สมาชิกพรีเมียม<? }else{?>สมาชิกปกติ<? }?> || <?=date("d F Y",strtotime($fl7['sli_upd']));?></span>
                                                            	
                                                                <!-- liner 8 begin -->
                                                                <ul>
                                                                <? $linel8=queryx2("select system_liner.sli_vip,system_liner.sli_upd,system_liner.sli_sr_reply,system_member.sm_code,system_member.sm_name from system_liner left join system_member on system_liner.sli_sr_reply=system_member.sm_id where system_liner.sli_sr_target='$l7id' limit 3"); while($fl8=mysql_fetch_array($linel8)){ $l8id=$fl8['sli_sr_reply'];?>
                                                                    <li><span class="reply-l8 <?=$fl8['sli_vip']==1?"vipst":"norst";?>"><b>สมาชิกชั้นที่ 8</b> (<?=$fl8['sm_code'];?>) <?=$fl8['sm_name'];?> || <? if($fl8['sli_vip']==1){?>สมาชิกพรีเมียม<? }else{?>สมาชิกปกติ<? }?> || <?=date("d F Y",strtotime($fl8['sli_upd']));?></span>
                                                                    	
                                                                        <!-- liner 9 begin -->
                                                                        <ul>
                                                                        <? $linel9=queryx2("select system_liner.sli_vip,system_liner.sli_upd,system_liner.sli_sr_reply,system_member.sm_code,system_member.sm_name from system_liner left join system_member on system_liner.sli_sr_reply=system_member.sm_id where system_liner.sli_sr_target='$l8id' limit 3"); while($fl9=mysql_fetch_array($linel9)){ $l9id=$fl9['sli_sr_reply'];?>
                                                                            <li><span class="reply-l9 <?=$fl9['sli_vip']==1?"vipst":"norst";?>"><b>สมาชิกชั้นที่ 9</b> (<?=$fl9['sm_code'];?>) <?=$fl9['sm_name'];?> || <? if($fl9['sli_vip']==1){?>สมาชิกพรีเมียม<? }else{?>สมาชิกปกติ<? }?> || <?=date("d F Y",strtotime($fl9['sli_upd']));?></span></li>
                                                                        <? } ?>
                                                                        </ul>
                                                                        <!-- liner 9 end -->
                                                                    </li>
                                                                <? } ?>
                                                                </ul>
                                                                <!-- liner 8 end -->
                                                            </li>
                                                        <? } ?>
                                                        </ul>
                                                        <!-- liner 7 end -->
                                                    </li>
                                                <? }?>
                                                </ul>
                                                <!-- liner 6 end -->
                                            </li>
                                        <? }?>
                                        </ul>
                                        <!-- liner 5 end -->
                                    </li>
                                <? }?>
                                </ul>
                                <!-- liner 4 end -->
                            </li>
                        <? }?>
                        </ul>
                        <!-- liner 3 end -->
                    </li>
                <? }?>
                </ul>
                <!-- liner 2 end -->
            </li>
        <? }?>
        </ul>
        <!-- liner 1 end -->
    </li>
    <!-- target end -->
</ul>
<!-- liner end -->
</section>
</div>