<?php  
// function mobileService($service)
// {
//     return $serviceName;
// }
?>
<section class="main-section grid_7">

    <div class="main-content">
        <header>
            <h2>
                รายงานแจ้งการต่อสายงาน
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
                            <? //$result=queryx2("select * from system_topup order by stu_date DESC"); while($row=mysql_fetch_array($result)){?>
                            <tr>
                                <td align="center"><?//=datethai($row['stu_date'],'dtime');?></td>
                                <td align="left"><?//=readname("sm_name","system_member","sm_id",$row['sm_id']);?></td>
                                <td align="center"><?//=mobileService($row['stu_service']);?></td>
                                <td align="center"><?//=$row['stu_phone'];?></td>
                                <td align="right"><?//=$row['stu_amount'];?></td>
                                <td align="right"><?//=$row['stu_discount'];?></td>
                                <td align="right"><?//=$row['stu_realamount'];?></td>
                                <td align="center">
                                    <? //if($row['stu_status']==1){ ?>
                                        <a href="admin_panel.php?page=confirmtopup&gt=<?=$row['stu_status'];?>&fid=<?=$row['stu_id'];?>" class="button button-green" onClick="javascript:return confirm('ต้องการเปลี่ยนสถานะ');">ยืนยันแล้ว</a>
                                    <? //}else{ ?>
                                        <!-- <a href="admin_panel.php?page=confirmtopup&gt=<?//=$row['stu_status'];?>&fid=<?//=$row['stu_id'];?>&mid=<?//=$row['sm_id'];?>&amnt=<?//=$row['stu_amount'];?>" class="button button-gray" onClick="javascript:return confirm('ต้องการเปลี่ยนสถานะ');">รอการตรวจสอบ</a> -->
                                    <? //} ?>
                                </td>
                            </tr>
                            <?// }?>
                        </tbody>
                    </table>
                </section>
            </div>
        </section>
    </div>

</section>