<?php  

?>
<div class="columns leading top">
    <div class="grid_6 first">
    <? if($datam==""){?>
   	<div class="message info">
    	<b>โปรดทราบ</b> ระบบจะทำการแสดงเฉพาะสมาชิกที่ตรงตามเงื่อนไขแผนจ่ายรายได้แบบพิเศษ และมีสถานะเป็นสมาชิก active แล้วเท่านั้น
    </div>
    <? }else{echo $datam;}?>
        <table class="datatable paginate sortable full bordered">
            <thead>
                <tr>
                    <th style="width:90px;">รหัสสมาชิก</th>
                    <th>ชื่อสมาชิก</th>
                    <th style="width:90px;">ปันผลส่วนตัว</th>
                    <th style="width:90px;">ปันผลจากสมาชิกในสายงาน</th>
                    <th style="width:90px;">ยอด รายได้ ปัจจุบัน</th>
                    <th style="width:90px;">สถานะจ่าย รายได้</th>
                </tr>
            </thead>
            <tbody>
                <? $jc=queryx2("SELECT sm_id, SUM(stpv_own_point) AS total_own_point, SUM(stpv_liner_point) AS total_liner_point, stpv_cut FROM system_topup_point WHERE stpv_cut=0 AND sm_id!=1 GROUP BY sm_id"); while($llc=mysql_fetch_array($jc)){?>
            	<? //$jc=queryx2("SELECT SUM(stu_discount) AS total_discount, sm_id FROM system_topup WHERE stu_cut=0 AND stu_status=1 GROUP BY sm_id"); while($llc=mysql_fetch_array($jc)){?>
                <? //$jc=queryx2("select * from system_topup order by stu_date DESC"); while($llc=mysql_fetch_array($jc)){?>
                <tr>
                    <td><?=readname("sm_code","system_member","sm_id",$llc['sm_id']);?></td>
                    <td align="left"><?=readname("sm_name","system_member","sm_id",$llc['sm_id']);?></td>
                    <td align="right"><?=$llc['total_own_point'];?></td>
                    <td align="right"><?=$llc['total_liner_point'];?></td>
                    <td align="right"><?php printf("%.2f", $llc['total_own_point']+$llc['total_liner_point']) ;?></td>
                    <td align="center"><?php  echo ($llc['stpv_cut']==0)?"รอการตัดยอด":"-"; ?></td>
                </tr>
                <? }?>
            </tbody>
        </table>
    </div>
</div>

<!-- Sidebar -->

<aside class="grid_2">

    <div id="rightmenu" class="panel">
    <header><h2>ค้นหาสมาชิก</h2></header>
	<form action="<?=$link;?>?page=topup" class="form" name="search" id="search" method="post">
        <hr />
        <fieldset>
            <dl>
                <dt></dt><dd><label>ชื่อ - นามสกุล</label><input type="text" name="name" id="searchname" size="31" value="<?=$name;?>" /></dd>
                <dt></dt><dd><label>รหัสสมาชิก</label><input type="text" name="code" id="searchcode" size="31" value="<?=$code;?>" /></dd>
                <!-- <dt></dt><dd><label>สถานะ</label><select name="level" style="width:99%;"><option value=""<? if($level==""){?> selected="selected"<? }?>>โปรดเลือก</option><option value="0"<? if($level=="0"){?> selected="selected"<? }?>>รอตัด</option><option value="1"<? if($level=="1"){?> selected="selected"<? }?>>ตัดแล้ว</option></select></dd> -->
            </dl>    
        </fieldset>

        <hr />
        <button class="button button-green" type="submit" name="searchg">ค้นหา</button>
        <button class="button button-gray" type="reset">คืนค่า</button>
    </form>
    </div>

</aside>

<!-- Sidebar End -->