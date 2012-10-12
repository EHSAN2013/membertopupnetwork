<?php  
$service[0] = isset($_POST['submit_sv_1'])?true:false;
$service[1] = isset($_POST['submit_sv_2'])?true:false;
$service[2] = isset($_POST['submit_sv_3'])?true:false;
$service[3] = isset($_POST['submit_sv_4'])?true:false;
$service[4] = isset($_POST['submit_sv_5'])?true:false;
$service[5] = isset($_POST['submit_sv_6'])?true:false;

$topup_submit = $service[0]||$service[1]||$service[2]||$service[3]||$service[4]||$service[5];

function stuSave($sm_id,$stu_service,$stu_phone,$stu_amount,$stu_comment) {
    $stu_discount = $stu_amount * 0.005;
    $stu_realamount = $stu_amount - $stu_discount;
    mysql_query("INSERT INTO system_topup value('','$sm_id','$stu_service','$stu_phone' ,'".date("Y-m-d H:i:s")."','$stu_amount','$stu_discount','$stu_realamount','0','$stu_comment', '')")or die(mysql_error());
    return "<div class='message success'><h3>สำเร็จ!</h3>เติมเงินเข้าระบบเรียบร้อยแล้ว โปรดรอการตรวจสอบจากเจ้าหน้าที่</div>";
}

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

if ($topup_submit) {
    if ($service[0]) {
        $message = stuSave($_POST['sm_id_sv_1'],1,$_POST['stu_phone_sv_1'],$_POST['stu_amount_sv_1'],$_POST['stu_note_sv_1']);
    } else if ($service[1]) {
        $message = stuSave($_POST['sm_id_sv_2'],2,$_POST['stu_phone_sv_2'],$_POST['stu_amount_sv_2'],$_POST['stu_note_sv_2']);
    } else if ($service[2]) {
        $message = stuSave($_POST['sm_id_sv_3'],3,$_POST['stu_phone_sv_3'],$_POST['stu_amount_sv_3'],$_POST['stu_note_sv_3']);
    } else if ($service[3]) {
        $message = stuSave($_POST['sm_id_sv_4'],4,$_POST['stu_phone_sv_4'],$_POST['stu_amount_sv_4'],$_POST['stu_note_sv_4']);
    } else if ($service[4]) {
        $message = stuSave($_POST['sm_id_sv_5'],5,$_POST['stu_phone_sv_5'],$_POST['stu_amount_sv_5'],$_POST['stu_note_sv_5']);
    } else if ($service[5]) {
        $message = stuSave($_POST['sm_id_sv_6'],6,$_POST['stu_phone_sv_6'],$_POST['stu_amount_sv_6'],$_POST['stu_note_sv_6']);
    }
}
?>

<link rel="stylesheet" media="screen" href="./css/tables.css" />
<script src="./js/jquery.tables.js"></script>

<div class="container_8 clearfix">
    <section class="main-section grid_8">

        <div class="main-content grid_8 alpha">
            <header>
                <div class="view-switcher">
                <h2>เติมเงินเข้าระบบ</h2>
                </div>
            </header>
            <section class="container_6">
                <div class="grid_6">
                    <!-- the tabs -->
                    <div class="tabbed-pane">
                        <ul class="tabs">
                            <li><a href="#">เติมเงินเข้าระบบ</a></li>
                            <li><a href="#">สถานะการเงิน</a></li>
                        </ul>

                        <!-- tab "panes" -->
                        <div class="panes clearfix" style="margin-bottom:20px;">
                            <section class="topup">
                                <?php if(isset($message)) echo $message; ?>
                                <div class="regist-error"></div>
                                <div class="topup-block">
                                    <header>
                                        <h4>เติมเงิน 1-2-Call</h4><img src="images/icon_service1.gif" />
                                    </header>
                                    <form action="#" method="post" name="topup_sv_1" id="topup_sv_1" enctype="multipart/form-data">
                                        <input type="hidden" name="sm_id_sv_1" id="sm_id_sv_1" value="<?=$smid;?>" />
                                        <p><label class="grid_1"><em>*</em> เบอร์โทรศัพท์</label> <input type="text" maxlength="20" required="required" name="stu_phone_sv_1" id="stu_phone_sv_1" /></p>
                                        <p><label class="grid_1"><em>*</em> ยอดเติมเงิน</label> 
                                            <select name="stu_amount_sv_1" id="stu_amount_sv_1">
                                                <option value="200">เติม 200 บาท</option>
                                                <option value="300">เติม 300 บาท</option>
                                                <option value="400">เติม 400 บาท</option>
                                                <option value="500">เติม 500 บาท</option>
                                                <option value="600">เติม 600 บาท</option>
                                                <option value="700">เติม 700 บาท</option>
                                                <option value="800">เติม 800 บาท</option>
                                                <option value="900">เติม 900 บาท</option>
                                            </select>
                                        </p>
                                        <p><label class="grid_1">บันทึกช่วยจำ</label> <input type="text" maxlength="100" name="stu_note_sv_1" id="stu_note_sv_1" /></p>
                                        
                                        <hr />
                                        <p align="center">
                                            <input type="submit" name="submit_sv_1" value="เติมเงิน" class="button button-green" />
                                        </p>
                                    </form>
                                </div>

                                <div class="spacer">&nbsp;</div>

                                <div class="topup-block">
                                    <header>
                                        <h4>เติมเงิน Happy DTAC</h4><img src="images/icon_service2.gif" />
                                    </header>
                                    <form action="#" method="post" name="topup_sv_2" id="topup_sv_2" enctype="multipart/form-data">
                                        <input type="hidden" name="sm_id_sv_2" id="sm_id_sv_2" value="<?=$smid;?>" />
                                        <p><label class="grid_1"><em>*</em> เบอร์โทรศัพท์</label> <input type="text" maxlength="20" required="required" name="stu_phone_sv_2" id="stu_phone_sv_2" /></p>
                                        <p><label class="grid_1"><em>*</em> ยอดเติมเงิน</label> 
                                            <select name="stu_amount_sv_2" id="stu_amount_sv_2">
                                                <option value="200">เติม 200 บาท</option>
                                                <option value="300">เติม 300 บาท</option>
                                                <option value="400">เติม 400 บาท</option>
                                                <option value="500">เติม 500 บาท</option>
                                                <option value="600">เติม 600 บาท</option>
                                                <option value="700">เติม 700 บาท</option>
                                                <option value="800">เติม 800 บาท</option>
                                                <option value="900">เติม 900 บาท</option>
                                            </select>
                                        </p>
                                        <p><label class="grid_1">บันทึกช่วยจำ</label> <input type="text" maxlength="100" name="stu_note_sv_2" id="stu_note_sv_2" /></p>
                                        
                                        <hr />
                                        <p align="center">
                                            <input type="submit" name="submit_sv_2" value="เติมเงิน" class="button button-blue" />
                                        </p>
                                    </form>
                                </div>

                                <div class="topup-block">
                                    <header>
                                        <h4>เติมเงิน TRUE MOVE</h4><img src="images/icon_service3.gif" />
                                    </header>
                                    <form action="#" method="post" name="topup_sv_3" id="topup_sv_3" enctype="multipart/form-data">
                                        <input type="hidden" name="sm_id_sv_3" id="sm_id_sv_3" value="<?=$smid;?>" />
                                        <p><label class="grid_1"><em>*</em> เบอร์โทรศัพท์</label> <input type="text" maxlength="20" required="required" name="stu_phone_sv_3" id="stu_phone_sv_3" /></p>
                                        <p><label class="grid_1"><em>*</em> ยอดเติมเงิน</label> 
                                            <select name="stu_amount_sv_3" id="stu_amount_sv_3">
                                                <option value="200">เติม 200 บาท</option>
                                                <option value="300">เติม 300 บาท</option>
                                                <option value="400">เติม 400 บาท</option>
                                                <option value="500">เติม 500 บาท</option>
                                                <option value="600">เติม 600 บาท</option>
                                                <option value="700">เติม 700 บาท</option>
                                                <option value="800">เติม 800 บาท</option>
                                                <option value="900">เติม 900 บาท</option>
                                            </select>
                                        </p>
                                        <p><label class="grid_1">บันทึกช่วยจำ</label> <input type="text" maxlength="100" name="stu_note_sv_3" id="stu_note_sv_3" /></p>
                                        
                                        <hr />
                                        <p align="center">
                                            <input type="submit" name="submit_sv_3" value="เติมเงิน" class="button button-orange" />
                                        </p>
                                    </form>
                                </div>

                                <div class="spacer">&nbsp;</div>

                                <div class="topup-block">
                                    <header>
                                        <h4>เติมเงิน TRUE MOVE H</h4><img src="images/icon_truemoveh.gif" />
                                    </header>
                                    <form action="#" method="post" name="topup_sv_4" id="topup_sv_4" enctype="multipart/form-data">
                                        <input type="hidden" name="sm_id_sv_4" id="sm_id_sv_4" value="<?=$smid;?>" />
                                        <p><label class="grid_1"><em>*</em> เบอร์โทรศัพท์</label> <input type="text" maxlength="20" required="required" name="stu_phone_sv_4" id="stu_phone_sv_4" /></p>
                                        <p><label class="grid_1"><em>*</em> ยอดเติมเงิน</label> 
                                            <select name="stu_amount_sv_4" id="stu_amount_sv_4">
                                                <option value="200">เติม 200 บาท</option>
                                                <option value="300">เติม 300 บาท</option>
                                                <option value="400">เติม 400 บาท</option>
                                                <option value="500">เติม 500 บาท</option>
                                                <option value="600">เติม 600 บาท</option>
                                                <option value="700">เติม 700 บาท</option>
                                                <option value="800">เติม 800 บาท</option>
                                                <option value="900">เติม 900 บาท</option>
                                            </select>
                                        </p>
                                        <p><label class="grid_1">บันทึกช่วยจำ</label> <input type="text" maxlength="100" name="stu_note_sv_4" id="stu_note_sv_4" /></p>
                                        
                                        <hr />
                                        <p align="center">
                                            <input type="submit" name="submit_sv_4" value="เติมเงิน" class="button button-red" />
                                        </p>
                                    </form>
                                </div>
                                
                                <div class="topup-block">
                                    <header>
                                        <h4>เติมเงิน WE-PCT</h4><img src="images/icon_service5.gif" />
                                    </header>
                                    <form action="#" method="post" name="topup_sv_5" id="topup_sv_5" enctype="multipart/form-data">
                                        <input type="hidden" name="sm_id_sv_5" id="sm_id_sv_5" value="<?=$smid;?>" />
                                        <p><label class="grid_1"><em>*</em> เบอร์โทรศัพท์</label> <input type="text" maxlength="20" required="required" name="stu_phone_sv_5" id="stu_phone_sv_5" /></p>
                                        <p><label class="grid_1"><em>*</em> ยอดเติมเงิน</label> 
                                            <select name="stu_amount_sv_5" id="stu_amount_sv_5">
                                                <option value="200">เติม 200 บาท</option>
                                                <option value="300">เติม 300 บาท</option>
                                                <option value="400">เติม 400 บาท</option>
                                                <option value="500">เติม 500 บาท</option>
                                                <option value="600">เติม 600 บาท</option>
                                                <option value="700">เติม 700 บาท</option>
                                                <option value="800">เติม 800 บาท</option>
                                                <option value="900">เติม 900 บาท</option>
                                            </select>
                                        </p>
                                        <p><label class="grid_1">บันทึกช่วยจำ</label> <input type="text" maxlength="100" name="stu_note_sv_5" id="stu_note_sv_5" /></p>
                                        
                                        <hr />
                                        <p align="center">
                                            <input type="submit" name="submit_sv_5" value="เติมเงิน" class="button button-red" />
                                        </p>
                                    </form>
                                </div>
                                
                                <div class="spacer">&nbsp;</div>
                                
                                <div class="topup-block">
                                    <header>
                                        <h4>เติมเงิน CAT CDMA</h4><img src="images/icon_catcdma.gif" />
                                    </header>
                                    <form action="#" method="post" name="topup_sv_6" id="topup_sv_6" enctype="multipart/form-data">
                                        <input type="hidden" name="sm_id_sv_6" id="sm_id_sv_6" value="<?=$smid;?>" />
                                        <p><label class="grid_1"><em>*</em> เบอร์โทรศัพท์</label> <input type="text" maxlength="20" required="required" name="stu_phone_sv_6" id="stu_phone_sv_6" /></p>
                                        <p><label class="grid_1"><em>*</em> ยอดเติมเงิน</label> 
                                            <select name="stu_amount_sv_6" id="stu_amount_sv_6">
                                                <option value="200">เติม 200 บาท</option>
                                                <option value="300">เติม 300 บาท</option>
                                                <option value="400">เติม 400 บาท</option>
                                                <option value="500">เติม 500 บาท</option>
                                                <option value="600">เติม 600 บาท</option>
                                                <option value="700">เติม 700 บาท</option>
                                                <option value="800">เติม 800 บาท</option>
                                                <option value="900">เติม 900 บาท</option>
                                            </select>
                                        </p>
                                        <p><label class="grid_1">บันทึกช่วยจำ</label> <input type="text" maxlength="100" name="stu_note_sv_6" id="stu_note_sv_6" /></p>
                                        
                                        <hr />
                                        <p align="center">
                                            <input type="submit" name="submit_sv_6" value="เติมเงิน" class="button button-orange" />
                                        </p>
                                    </form>
                                </div>
                            </section>
                            <section>
                                <table class="datatable paginate sortable full">
                                    <thead>
                                        <tr>
                                            <th style="width:80px;">วันที่แจ้ง</th>
                                            <th style="width:80px;">ระบบที่เติม</th>
                                            <th style="width:80px;">เบอร์โทรศัพท์</th>
                                            <th style="width:60px;">ยอดเงิน</th>
                                            <th style="width:60px;">ส่วนลด</th>
                                            <th style="width:60px;">ยอดหักบัญชี</th>
                                            <th style="width:110px;">สถานะ</th>
                                            <th>หมายเหตุ</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <? $jc=queryx2("select * from system_topup where sm_id='$smid' order by stu_date DESC"); while($llc=mysql_fetch_array($jc)){?>
                                        <tr>
                                            <td align="center"><?=datethai($llc['stu_date'],'dtime');?></td>
                                            <td align="center"><?=mobileService($llc['stu_service']);?></td>
                                            <td align="center"><?=$llc['stu_phone'];?></td>
                                            <td align="right"><?=$llc['stu_amount'];?></td>
                                            <td align="right"><?=$llc['stu_discount'];?></td>
                                            <td align="right"><?=$llc['stu_realamount'];?></td>
                                            <td align="center"><? if($llc['stu_status']==1){?><button class="button button-green">ยืนยันแล้ว</button><? }else{?><button class="button button-gray">รอการตรวจสอบ</button><? }?></td>
                                            <td align="left"><?=$llc['stu_comment'];?></td>
                                        </tr>
                                        <? }?>
                                    </tbody>
                                </table>
                            </section>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </section>
</div>

<?php
// if ($topup_submit) {
//     echo "<script type='text/javascript'>alert('Success');</script>";
// }
?>  
