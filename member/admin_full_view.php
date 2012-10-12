<?php  
$bankrefer = isset($_POST['submit_bankrefer'])?true:false;
$membertype = isset($_POST['submit_membertype'])?true:false;

function smBankReferSave($sm_id,$sm_bank_name,$sm_bank_area,$sm_bank_acc,$sm_bank_id,$sm_bank_type) {
    mysql_query("UPDATE system_member SET sm_bank_name=$sm_bank_name, sm_bank_area=$sm_bank_area, sm_bank_acc=$sm_bank_acc, sm_bank_id=$sm_bank_id, sm_bank_type=$sm_bank_type, WHERE sm_id='$sm_id'")or die(mysql_error());
    return "<div class='message success'><h3>สำเร็จ!</h3>ปรับปรุงข้อมูลเรียบร้อยแล้ว</div>";
}

function smMemberTypeSave($sm_id,$sm_type) {
    mysql_query("UPDATE system_member SET sm_type=$sm_type WHERE sm_id='$sm_id'")or die(mysql_error());
    return "<div class='message success'><h3>สำเร็จ!</h3>ปรับปรุงข้อมูลเรียบร้อยแล้ว่</div>";
}

if ($bankrefer||$membertype) {
    if ($bankrefer) {
        $message = smBankReferSave($_POST['msid'],$_POST['sm_bank_name'],$_POST['sm_bank_area'],$_POST['sm_bank_acc'],$_POST['sm_bank_id'],$_POST['sm_bank_type']);
    } else if ($membertype) {
        $message = smMemberTypeSave($_POST['msid'],$_POST['sm_member_type']);
    } 
}
?>
<? $mid=$_GET['mid'];?>
<!-- Main Section -->
    <section class="main-section grid_7">
		<? $jojo=queryx1("select * from system_member where sm_id='$mid'"); 
		$mjk=countl3("select sli_id from system_liner where sli_sr_reply='".$jojo['sm_id']."' limit 1"); $mjk==1?$yoi="ชำระเงินแล้ว":$yoi="รอการชำระเงิน";
		?>
        <div class="main-content grid_4 alpha">
            <header class="clearfix">
                 <hgroup>
                     <h2>รหัสสมาชิก: <?=$jojo['sm_code'];?> </h2>
                     <hr />
                     <h4>ชื่อ - สกุล <a href="#"><?=$jojo['sm_name'];?></a> | สถานะ <a href="#"><?=$yoi;?></a></h4>
                     <p class="tags"> สมัครเมื่อ <a href="#"><?=date("l, d F Y",strtotime($jojo['sm_date_regist']));?></a></p>
                 </hgroup>
            </header>
            <section>
            <h3>จัดการข้อมูลบัญชีนี้</h3>
            <a href="#" class="modalInput button button-blue" rel="#bankreffer" style="margin-bottom:5px;">แก้ไขบัญชีธนาคาร</a><br />
			<? if($jojo['sm_level']==1){?><a href="admin_panel.php?page=confirmmem&gt=<?=$jojo['sm_level'];?>&fid=<?=$jojo['sm_id'];?>" class="button button-green" onClick="javascript:return confirm('ต้องการระงับการใช้งานผู้ใช้ท่านนี้');">สถานะ : <?=$yoi;?></a><? }elseif($jojo['sm_level']==0){?><a href="admin_panel.php?page=confirmmem&gt=<?=$jojo['sm_level'];?>&fid=<?=$jojo['sm_id'];?>" class="button button-green" onClick="javascript:return confirm('ต้องการยืนยันการชำระเงินผู้ใช้ท่านนี้');">สถานะ : <?=$yoi;?></a><?php }else{?><a href="admin_panel.php?page=confirmmem&gt=<?=$jojo['sm_level'];?>&fid=<?=$jojo['sm_id'];?>" class="button button-red" onClick="javascript:return confirm('ต้องปลดการระงับการใช้งานผู้ใช้ท่านนี้');">สถานะ : ติดโทษแบน</a><? }?><br />
            <a href="#" class="modalInput button button-orange" rel="#membertype" style="margin-top:5px;">ประเภทสมาชิก : <?php  echo ($jojo['sm_type']==2)?"ศูนย์ขยายงาน":"สมาชิกธรรมดา"; ?></a>
            </section>
            <section>
            <h3>ชื่อเว็บไซต์ / ลิงค์ผู้แนะนำ</h3>
                <div class="message warning">http://<?php echo $www; ?>/?<? echo readname("sa_www","system_account","sa_sm_id",$jojo['sm_id']);?></div>
                <h3>รายละเอียดการติดต่อ</h3>
                <ul class="profile-info">
                    <li class="email"><?=$jojo['sm_email'];?><span>อีเมล์</span></li>
                    <li class="phone"><?=$jojo['sm_htel'];?><span>เบอร์โทรศัพท์</span></li>
                    <li class="mobile"><?=$jojo['sm_mtel'];?><span>เบอร์โทรศัพท์มือถือ</span></li>
                    <li class="house"><?=$jojo['sm_addr'].", ".$jojo['sm_postcode'].", ".readname("sd_name","system_district","sd_id",$jojo['sm_district']);?><span>ที่อยู่</span></li>
                </ul>
            </section>
            <section>
            <h3>เป็นผู้แนะนำดังต่อไปนี้</h3>
                <ul class="listing list-view">
                	<? 
					$pscx=mysql_query("select * from system_reply where sr_target='$mid' order by sr_id DESC");
					$numpro=mysql_num_rows($pscx);
					$row_per_page=10;
					$rang=4;
					$rows=$numpro;
					$page_id=$_GET['page_id'];
					$pages=ceil($rows/$row_per_page);
					
					if(empty($page_id)){
						$page_id=1;
						$start=0;
					}else{
						$start=$row_per_page*($page_id-1);
					}
					
					$jc=queryx2("select * from system_reply where sr_target='$mid' order by sr_id DESC limit $start,$row_per_page"); 
					
					while($dd=mysql_fetch_array($jc)){
					$llc=queryx1("select * from system_member where sm_id='$dd[sr_sm_id]'");
					?>
                    <li class="contact">
                        <a class="more" href="view_reply_member.php?vvsmid=<?=$llc['sm_id'];?>">&raquo;</a>
                        <span class="timestamp"><?=date("d F Y",strtotime($llc['sm_date_regist']));?></span>
                        <a href="admin_panel.php?page=fullview&mid=<?=$llc['sm_id'];?>">รหัสสมาชิก : <?=$llc['sm_code'];?></a>
                        <p>ชื่อ นามสกุล : <?=$llc['sm_name'];?> | Email : <?=$llc['sm_email'];?> | โทรศัพท์ : <?=$llc['sm_mtel'];?></p>
                        <div class="entry-meta">
                            ทีอยู่ : <?=$llc['sm_addr'].", ".$llc['sm_postcode'].", ".readname("sd_name","system_district","sd_id",$llc['sm_district']);?>
                        </div>
                    </li>
                    <? }?>
                </ul>
                <ul class="pagination clearfix">
				<? 
                    $first=$page_id-$rang;
                    $last=$page_id+$rang;
                    if($first<=1){$first=1;}
                    if($last>=$pages){$last=$pages;}
                    $pre=$page_id-1;
                    echo "<li><a href='admin_panel.php?page=fullview&page_id=1&mid=$mid' class='button-blue'>&laquo;</a></li>";
                    echo "<li><a href='admin_panel.php?page=fullview&page_id=$pre&mid=$mid' class='button-blue'>&lsaquo;</a></li>";
                    for($b=$first;$b<=$last;$b++){
                            if($b==$page_id){
                                echo "<li><a href='#' class='current button-blue'>".$b."</a></li>";
                            }else{
                                echo "<li><a href='admin_panel.php?page=fullview&page_id=$b&mid=$mid'class='button-blue'>".$b."</a></li>";
                            }
                    }//END FOR
                    if($page_id<$pages){
                        $fev=$page_id+1;
                        echo "<li><a href='admin_panel.php?page=fullview&page_id=$fev&mid=$mid' class='button-blue'>&rsaquo;</a></li>";
                        echo "<li><a href='admin_panel.php?page=fullview&page_id=$pages&mid=$mid' class='button-blue'>&raquo;</a></li>";
                    }
                ?>
                </ul>
            </section>
            
        </div>

        <div class="preview-pane grid_3 omega">
            <div class="content">
                <h3>ข้อมูลบัญชีธนาคาร</h3>
                <ul class="profile-info">
                    <li class="house"><?=$jojo['sm_bank_name'];?><span>ชื่อธนาคาร</span></li>
                    <li class="house"><?=$jojo['sm_bank_area'];?><span>สาขา</span></li>
                    <li class="calendar-day"><?=$jojo['sm_bank_id'];?><span>เลขที่บัญชี</span></li>
                    <li class="calendar-day"><?=$jojo['sm_bank_acc'];?><span>ชื่อบัญชี</span></li>
                    <li class="building"><?=$jojo['sm_bank_type'];?><span>ประเภทบัญชี</span></li>
                </ul>
                <hr />
                <h3>ผู้แนะนำ / สปอน์เซอร์</h3>
            	<div class="message info">
                	<? 
					$ft=queryx1("select sr_target from system_reply where sr_sm_id='$mid' limit 1");
					$tidc=$ft['sr_target'];
					$sk=queryx1("select system_member.sm_code, system_member.sm_name, system_member.sm_email, system_member.sm_htel, system_member.sm_mtel from system_member inner join system_reply on system_member.sm_id=system_reply.sr_target where system_member.sm_id='$tidc'");?>
                    <ul class="profile-info">
                    <li class="building"><?=$sk['sm_code'];?><span>รหัสสมาชิก</span></li>
                    <li class="house"><?=$sk['sm_name'];?><span>ชื่อ นามกสุล</span></li>
                    <li class="email"><?=$sk['sm_email'];?><span>อีเมล์</span></li>
                    <li class="phone"><?=$sk['sm_htel'].", ".$sk['sm_mtel'];?><span>เบอร์โทร์</span></li>
                </ul>
                </div>
            </div>
            <div class="preview">
            </div>
        </div>

    </section>
    <!-- Main Section End -->
    
    <!-- Bankrefer -->
    <div class="widget modal" id="bankreffer" style="width:350px;">
        <header><h2>แก้ไขข้อมูลบัญชีธนาคารของสมาชิก</h2></header>
        <section>
        <div class="showbb"><div class="message info">โปรดตรวจสอบความถูกต้อง ก่อนทำการกดปุ่ม "ปรับปรุงข้อมูล"</div></div>
        <form action="#" method="post" name="formbankrefer" id="formbankrefer">
        <input type="hidden" name="msid" value="<?=$jojo['sm_id'];?>" />
        <fieldset class="roundend">
        	<legend>ข้อมูลบัญชีธนาคาร</legend>
            <p><label><em>*</em>ธนาคาร :</label> <input type="text" name="sm_bank_name" id="sm_bank_name" size="40" required="required" value="<?=$jojo['sm_bank_name'];?>" /></p>
            <p><label><em>*</em>สาขา :</label> <input type="text" name="sm_bank_area" id="sm_bank_area" size="40" required="required" value="<?=$jojo['sm_bank_area'];?>" /></p>
            <p><label><em>*</em>ชื่อเจ้าของบัญชี :</label> <input type="text" name="sm_bank_acc" id="sm_bank_acc" size="40" required="required" value="<?=$jojo['sm_bank_acc'];?>" /></p>
            <p><label><em>*</em>เลขที่บัญชี :</label> <input type="text" name="sm_bank_id" id="sm_bank_id" size="40" required="required" value="<?=$jojo['sm_bank_id'];?>" /></p>
            <p><label><em>*</em>ประเภทบัญชี :</label> <input type="text" name="sm_bank_type" id="sm_bank_type" size="40" required="required" value="<?=$jojo['sm_bank_type'];?>" /></p>
            <p align="center">
                <input type="submit" name="submit_bankrefer" value="ปรับปรุงข้อมูล" class="button button-orange">
                <input type="reset" name="btnreset" value="คืนค่า" class="button button-gray">
                <input type="button" name="btnclose" value="ปิด" class="button button-red close" onClick="window.location.reload()">
            </p>
        </fieldset>
        </form>
        </section>
    </div>

    <!-- Bankrefer -->
    <div class="widget modal" id="membertype" style="width:350px;">
        <header><h2>แก้ไขข้อมูลประเภทของสมาชิก</h2></header>
        <section>
        <div class="showbb"><div class="message info">โปรดตรวจสอบความถูกต้อง ก่อนทำการกดปุ่ม "ปรับปรุงข้อมูล"</div></div>
        <form action="#" method="post" name="formmembertype" id="formmembertype">
        <input type="hidden" name="msid" value="<?=$jojo['sm_id'];?>" />
        <fieldset class="roundend">
            <legend>ประเภทสมาชิก :</legend>
            <p style="padding-left:50px;">
                <input type="radio" name="sm_member_type" value="1" <?php if($jojo['sm_type']==1){ ?>checked<?php } ?>> สมาชิกธรรมดา
                <br><br>
                <input type="radio" name="sm_member_type" value="2" <?php if($jojo['sm_type']==2){ ?>checked<?php } ?>> ศูนย์ขยายงาน
            </p>
            <br>
            <p align="center">
                <input type="submit" name="submit_membertype" value="ปรับปรุงข้อมูล" class="button button-orange">
                <input type="button" name="btnclose" value="ปิด" class="button button-red close">
            </p>
        </fieldset>
        </form>
        </section>
    </div>