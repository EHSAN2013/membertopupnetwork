<section class="main-section grid_7">

    <div class="main-content">
        <header>
            <h2>
                รายงานแจ้งการชำระเงิน
            </h2>
        </header>
        <section class="container_6 clearfix">
            <div class="grid_6">
            	<? if($_GET['viewid']==""){?>
                <section>
                    <table class="datatable paginate sortable full">
                    <thead>
                        <tr>
                            <th style="width:200px;">วันที่แจ้ง</th>
                            <th style="width:100px;">ผู้แจ้ง</th>
                            <th>หัวข้อการแจ้งชำระเงิน</th>
                            <th style="width:70px;">ยอดเงิน</th>
                            <th style="width:120px;">สถานะ</th>
                        </tr>
                    </thead>
                    <tbody>
                         <? $jc=queryx2("select * from system_payrefer order by sf_date_send DESC"); while($llc=mysql_fetch_array($jc)){?>
                        <tr>
                            <td align="center"><?=date("l, d F Y (H:i)",strtotime($llc['sf_date_send']));?></td>
                            <td><?=readname("sm_name","system_member","sm_id",$llc['sf_sm_id']);?></td>
                            <td><a href="admin_panel.php?page=payview&viewid=<?=$llc['sf_id'];?>" title="ดูรายละเอียด"><?=$llc['sf_title'];?></a></td>
                            <td align="right"><?=$llc['sf_money'];?></td>
                            <td align="center"><? if($llc['sf_status']==1){?><a href="admin_panel.php?page=confirmpay&gt=<?=$llc['sf_status'];?>&fid=<?=$llc['sf_id'];?>" class="button button-green" onClick="javascript:return confirm('ต้องการเปลี่ยนสถานะ');">ยืนยันแล้ว</a><? }else{?><a href="admin_panel.php?page=confirmpay&gt=<?=$llc['sf_status'];?>&fid=<?=$llc['sf_id'];?>" class="button button-gray" onClick="javascript:return confirm('ต้องการเปลี่ยนสถานะ');">รอการตรวจสอบ</a><? }?></td>
                        </tr>
                        <? }?>
                    </tbody>
                </table>
                </section>
                <? }else{ $viewid=$_GET['viewid'];
				$jc=queryx1("select * from system_payrefer where sf_id='$viewid' limit 1");
				?>
                <h3>รายละเอียดแจ้งการชำระเงิน : คุณ <?=readname("sm_name","system_member","sm_id",$jc['sf_sm_id']);?></h3>
                <h4>วันที่แจ้ง <?=date("l, d F Y (H:i)",strtotime($jc['sf_date_send']));?></h4>
                <hr>
                <div class="grid_3">
                <p>
                <b>รายละเอียด</b><hr></p>
                <p><label class="grid_1">หัวข้อแจ้งการชำระเงิน</label> <?=$jc['sf_title'];?></p>
                <p><label class="grid_1">โอนไปยังธนาคาร</label> <?=$jc['sf_bank'];?></p>
                <p><label class="grid_1">ยอดเงินที่โอน</label> <?=$jc['sf_money'];?></p>
                <p><label class="grid_1">วันที่โอน</label> <?=$jc['sf_date_submit'];?></p>
                <p><label class="grid_1">เวลาที่โอน</label> <?=$jc['sf_time'];?></p>
                <p><label class="grid_1">ข้อความเพิ่มเติม</label> <?=$jc['sf_note'];?></p>
               
                <p><label class="grid_1">สถานะ</label> <? if($jc['sf_status']==1){?><a href="admin_panel.php?page=confirmpay&gt=<?=$jc['sf_status'];?>&fid=<?=$jc['sf_id'];?>" class="button button-green" onClick="javascript:return confirm('ต้องการเปลี่ยนสถานะ');">ยืนยันแล้ว</a><? }else{?><a href="admin_panel.php?page=confirmpay&gt=<?=$jc['sf_status'];?>&fid=<?=$jc['sf_id'];?>" class="button button-gray" onClick="javascript:return confirm('ต้องการเปลี่ยนสถานะ');">รอการตรวจสอบ</a><? }?></p>
                </div>
                <div class="grid_2 fr">
                <p><b>รูปสลิปใบโอน</b><hr><img src="../file/payslipe/<?=$jc['sf_slipe'];?>" width="220"></p>
                </div>
                <div class="clear"></div>
                <hr />
                <p align="center">
                    <a href="#" onClick="javascript:window.back(-1)" class="button button-orange">กลับ</a>
                </p>
                <? }?>
            </div>
        </section>
    </div>

</section>