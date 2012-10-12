<div class="columns leading top">
    <div class="grid_6 first">
        <table class="paginate sortable full">
            <thead>
                <tr>
                	<th>รหัสสมาชิก</th>
                    <th>ชื่อ - นามสกุล</th>
                    <th>วันที่สมัครวีไอพี</th>
                    <th>วันที่ต่ออายุล่าสุด</th>
                    <th>วันที่หมดอายุ</th>
                    <th>วันคงเหลือ</th>
                    <th>แผนการต่ออายุ</th>
                    <th>ต่ออายุ</th>
                </tr>
            </thead>
            <tbody>
            	<? 
				$pps="select system_member.*, system_liner.* from system_liner left join system_member on system_member.sm_id=system_liner.sli_sr_reply  where sm_level!='9'";
				$xd=date("Y-m-d H:i:s");	
				/* search */
				$name=$_POST['name'];
				$code=$_POST['code'];
				$plane=$_POST['plane'];

				$name!=""?$pps.=" and system_member.sm_name like '%$name%'":"";
				$code!=""?$pps.=" and system_member.sm_code like '%$code%'":"";
				$plane!=""?$pps.=" and system_liner.sli_plane = '$plane'":"";
				
				/* search */
				$jc=queryx2($pps." order by system_liner.sli_expire DESC"); 
				while($ftc=mysql_fetch_array($jc)){$dend=round(DateDiff($xd,$ftc['sli_expire']));
				?>
                <tr <? if($dend<=0){?>class="bgred"<? }?>>
                	<td><?=$ftc['sm_code'];?></td>
                    <td><?=$ftc['sm_name'];?></td>
                    <td><?=datethai($ftc['sli_upd'],'day');?></td>
                    <td><?=datethai($ftc['sli_renew'],'dtime');?></td>
                    <td><?=datethai($ftc['sli_expire'],'dtime');?></td>
                    <td><?=$dend;?> วัน</td>
                    <td><?=viptimeshow($ftc['sli_plane']);?></td>
                    <td align="center"><a href="<?=$link?>?page=request&casy=viprenew&id=<?=$ftc['sli_id'];?>"><img src="images/icon/arrow_circle_double.png" /></a></td>
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
	<form action="" class="form" name="search" id="search" method="post">
        <hr />
        <fieldset>
            <dl>
                <dt></dt><dd><label>ชื่อ - นามสกุล</label><input type="text" name="name" id="searchname" size="31" value="<?=$name;?>" /></dd>
                <dt></dt><dd><label>รหัสสมาชิก</label><input type="text" name="code" id="searchcode" size="31" value="<?=$code;?>" /></dd>
                <dt></dt><dd><label>แผนแการต่ออายุ</label><select name="plane" style="width:99%;"><option value="" <? if($plane==''){?>selected="selected"<? }?>>ทั้งหมด</option><option value="0" <? if($plane==0){?>selected="selected"<? }?>>สมัครสมาชิกใหม่</option><option value="1" <? if($plane==1){?>selected="selected"<? }?>>1 เดือน</option><option value="3" <? if($plane==3){?>selected="selected"<? }?>>3 เดือน</option><option value="6" <? if($plane==6){?>selected="selected"<? }?>>6 เดือน</option><option value="12" <? if($plane==12){?>selected="selected"<? }?>>12 เดือน</option></select></dd>
            </dl>    
        </fieldset>

        <hr />
        <button class="button button-green" type="submit">ค้นหา</button>
        <button class="button button-gray" type="reset">คืนค่า</button>
    </form>
    </div>

</aside>