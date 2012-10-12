<?php  
function mobileService($service)
{
    switch ($service) {
        case 1: $serviceName = "1-2-Call"; break;
        case 2: $serviceName = "Happy DTAC"; break;
        case 3: $serviceName = "TRUE MOVE"; break;
        case 4: $serviceName = "TRUE MOVE H"; break;
        case 5: $serviceName = "WE-PCT"; break;
        case 6: $serviceName = "CAT CDMA"; break;
        default: $serviceName = "Unknow"; break;
    }
    return $serviceName;
}
?>
<section class="main-section grid_7">

    <div class="main-content">
        <header>
            <h2>
                รายงานแจ้งการเติมเงินเข้าระบบ
            </h2>
        </header>
        <section class="container_6 clearfix">
            <div class="grid_6">
                <section>
                    <table class="datatable paginate sortable full">
                        <thead>
                            <tr>
                                <th style="width:80px;">วันที่แจ้ง</th>
                                <th>ผู้เติม</th>
                                <th style="width:80px;">ระบบที่เติม</th>
                                <th style="width:80px;">เบอร์โทรศัพท์</th>
                                <th style="width:60px;">ยอดเงิน</th>
                                <th style="width:60px;">ส่วนลด</th>
                                <th style="width:60px;">ยอดหักบัญชี</th>
                                <th style="width:110px;">สถานะ</th>
                            </tr>
                        </thead>
                        <tbody>
                            <? $jc=queryx2("select * from system_topup order by stu_date DESC"); while($llc=mysql_fetch_array($jc)){?>
                            <tr>
                                <td align="center"><?=datethai($llc['stu_date'],'dtime');?></td>
                                <td align="left"><?=readname("sm_name","system_member","sm_id",$llc['sm_id']);?></td>
                                <td align="center"><?=mobileService($llc['stu_service']);?></td>
                                <td align="center"><?=$llc['stu_phone'];?></td>
                                <td align="right"><?=$llc['stu_amount'];?></td>
                                <td align="right"><?=$llc['stu_discount'];?></td>
                                <td align="right"><?=$llc['stu_realamount'];?></td>
                                <td align="center">
                                    <? if($llc['stu_status']==1){ ?>
                                        <a href="admin_panel.php?page=confirmtopup&gt=<?=$llc['stu_status'];?>&fid=<?=$llc['stu_id'];?>" class="button button-green" onClick="javascript:return confirm('ต้องการเปลี่ยนสถานะ');">ยืนยันแล้ว</a>
                                    <? }else{ ?>
                                        <a href="admin_panel.php?page=confirmtopup&gt=<?=$llc['stu_status'];?>&fid=<?=$llc['stu_id'];?>&mid=<?=$llc['sm_id'];?>&amnt=<?=$llc['stu_amount'];?>" class="button button-gray" onClick="javascript:return confirm('ต้องการเปลี่ยนสถานะ');">รอการตรวจสอบ</a>
                                    <? } ?>
                                </td>
                            </tr>
                            <? }?>
                        </tbody>
                    </table>
                </section>
            </div>
        </section>
    </div>

</section>