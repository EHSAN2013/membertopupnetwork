<div class="columns leading top">
	<? if($_GET['viewid']==""){?>
	<div class="grid_6 first">
         <table class="datatable paginate sortable full">
            <thead>
                <tr>
                    <th width="120">วันที่แจ้ง</th>
                    <th width="80">รหัสสมาชิก</th>
                    <th width="80">ชื่อ - นามสกุล</th>
                    <th>หัวข้อการแจ้งชำระเงิน</th>
                    <th width="80">ยอดเงิน</th>
                    <th width="120">สถานะ</th>
                </tr>
            </thead>
            <tbody>
                 <? 
				 $jhs="select system_payrefer.*, system_member.sm_code, system_member.sm_name from system_payrefer left join system_member on system_payrefer.sf_sm_id= system_member.sm_id";
				 
				 $name=$_POST['name'];
				 $code=$_POST['code'];
				 $date=$_POST['date'];
				 $min=$_POST['min'];
				 $max=$_POST['max'];
				 $sf_st=$_POST['sf_st'];
				 
				 if($name!="" or $code!="" or $date!="" or $min!="" or $max!="" or $sf_st!=""){$jhs.=" where system_payrefer.sf_date_send > '1970-01-01'";}
				 
				 $name!=""?$jhs.=" and system_member.sm_name='$name'":"";
				 $code!=""?$jhs.=" and system_member.sm_code='$code'":"";
				 $date!=""?$jhs.=" and system_payrefer.sf_date_send like '%$date%'":"";
				 $min!=""?$jhs.=" and system_payrefer.sf_money  between '$min' and '$max'":"";
				 $sf_st!=""?$jhs.=" and system_payrefer.sf_status='$sf_st'":"";
				 
				 //echo $jhs;
				 
				 $jc=queryx2($jhs." order by system_payrefer.sf_date_send DESC"); $cn=mysql_num_rows($jc); if($cn>0){ while($llc=mysql_fetch_array($jc)){?>
                <tr>
                    <td align="center"><?=datethai($llc['sf_date_send'],'dtime');?></td>
                    <td><?=$llc['sm_code'];?></td>
                    <td><?=$llc['sm_name'];?></td>
                    <td><a href="<?=$link;?>?page=payrefer&viewid=<?=$llc['sf_id'];?>" title="ดูรายละเอียด"><?=$llc['sf_title'];?></a></td>
                    <td align="right"><?=$llc['sf_money'];?> บาท</td>
                    <td align="center"><? if($llc['sf_status']==1){?><a href="<?=$link;?>?page=confirmpay&gt=<?=$llc['sf_status'];?>&fid=<?=$llc['sf_id'];?>" class="button button-blue fontmini" onClick="javascript:return confirm('ต้องการเปลี่ยนสถานะ');">ยืนยันแล้ว</a><? }else{?><a href="<?=$link;?>?page=confirmpay&gt=<?=$llc['sf_status'];?>&fid=<?=$llc['sf_id'];?>" class="button button-gray fontmini" onClick="javascript:return confirm('ต้องการเปลี่ยนสถานะ');">รอการตรวจสอบ</a><? }?></td>
                </tr>
                <? }}else{?><tr><td align="center" colspan="6">ไม่พบรายการแจ้งชำระเงินตามที่ค้นหา หรือ ยังไม่มีรายการแจ้งชำระเงินในขณะนี้</td></tr><? }?>
            </tbody>
        </table>
    </div>
</div>

<!-- Sidebar -->

<aside class="grid_2">

    <div id="rightmenu" class="panel">
    <header><h2>ค้นหารายการแจ้งชำระเงิน</h2></header>
    <form action="" class="form" name="search" id="search" method="post">
        <hr />
        <fieldset>
            <dl>
                <dt></dt><dd><label>ชื่อ - นามสกุล</label><input type="text" name="name" id="searchname" size="31" value="<?=$name;?>" /></dd>
                <dt></dt><dd><label>รหัสสมาชิก</label><input type="text" name="code" id="searchcode" size="31" value="<?=$code;?>" /></dd>
                <dt></dt><dd><label>วันที่แจ้ง</label><input type="date" name="date"size="31" value="<?=$date;?>" max="0" /></dd>
                <dt></dt><dd><label>จำนวนเงิน ตั้งแต่</label><input type="range" name="min" min="0" max="10000" step="500" size="31" value="<?=$min;?>" /></dd>
                <dt></dt><dd><label>จนถึง</label><input type="range" name="max" min="10000" max="50000" step="1000" size="31" value="<?=$max;?>" /></dd>
                <dt></dt><dd><label>สถานะ</label><select name="sf_st"><option value="">ทั้งหมด</option><option value="1">ยืนยันแล้ว</option><option value="0">รอการยืนยัน</option></select></dd>
            </dl>    
        </fieldset>

        <hr />
        <button class="button button-green" type="submit">ค้นหา</button>
        <button class="button button-gray" type="reset">คืนค่า</button>
    </form>
    </div>
	
    <script>
	$(":range").rangeinput();
	$(":date").dateinput({format: 'yyyy-mm-dd'});
	</script>
    
</aside>

<!-- Sidebar End -->
    
     <? }else{ $viewid=$_GET['viewid'];
		$jc=queryx1("select * from system_payrefer where sf_id='$viewid' limit 1");
		?>
<div class="columns leading top">
    <div class="grid_8 first">
    	<div class="panel">
        <header><h2>รายละเอียดแจ้งการชำระเงิน : คุณ <?=readname("sm_name","system_member","sm_id",$jc['sf_sm_id']);?> <cite>วันที่แจ้ง <?=datethai($jc['sf_date_send'],'dtime');?></cite></h2></header>
        <section>
            <hr>
            <div class="grid_4 first">
            <p><b>รายละเอียด</b><hr></p>
            <p><label class="grid_1">หัวข้อแจ้งการชำระเงิน</label> <?=$jc['sf_title'];?></p>
            <p><label class="grid_1">โอนไปยังธนาคาร</label> <?=$jc['sf_bank'];?></p>
            <p><label class="grid_1">ยอดเงินที่โอน</label> <?=$jc['sf_money'];?> บาท</p>
            <p><label class="grid_1">วันที่โอน</label> <?=$jc['sf_date_submit'];?></p>
            <p><label class="grid_1">เวลาที่โอน</label> <?=$jc['sf_time'];?></p>
            <p><label class="grid_1">ข้อความเพิ่มเติม</label> <?=$jc['sf_note']." / ".$jc['sf_status'];?></p>
           
            <p><label class="grid_1">สถานะ</label> <? if($jc['sf_status']==1){?><a href="<?=$link;?>?page=confirmpay&gt=<?=$jc['sf_status'];?>&fid=<?=$jc['sf_id'];?>" class="button button-blue fontmini" onClick="javascript:return confirm('ต้องการเปลี่ยนสถานะ');">ยืนยันแล้ว</a><? }else{?><a href="<?=$link;?>?page=confirmpay&gt=<?=$jc['sf_status'];?>&fid=<?=$jc['sf_id'];?>" class="button button-gray fontmini" onClick="javascript:return confirm('ต้องการเปลี่ยนสถานะ');">รอการตรวจสอบ</a><? }?></p>
            </div>
            <div class="grid_3">
            <p><b>รูปสลิปใบโอน</b><hr><img src="../file/payslipe/<?=$jc['sf_slipe'];?>" width="220"></p>
            </div>
            <div class="clear"></div>
            <hr />
            <p align="center"> <a href="#" onClick="javascript:window.back(-1)" class="button button-orange">กลับ</a></p>
        </section>
        </div>
	</div>
</div>
<? }?>
