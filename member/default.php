<div class="container_8 clearfix">
    <!-- Main Section -->
    <section class="main-section grid_8">
		<? $jojo=queryx1("select * from system_member where sm_id='".$smid."'");?>
        <div class="main-content grid_5 alpha">
            <header class="clearfix">
            <? $userpic=$jojo['sm_pic']!=""?"<img src='../file/profile/thumb_$jojo[sm_pic]' border='0'>":"<img src='../file/profile/thumb_anonymous.jpg' border='0'>";?>
                <div class="userpic"><?=$userpic;?></div>
                 <hgroup>
                     <h2>ยินดีต้อนรับเข้าสู่ <?=$www;?></h2>
                     <hr />
                     <h4>รหัสสมาชิก: <?=$jojo['sm_code'];?> | ชื่อ - สกุล <a href="#"><?=$jojo['sm_name'];?></a> | สถานะ <a href="#"><?=$yoi;?></a></h4>
                     <p class="tags"> สมัครเมื่อ <a href="#"><?=date("l, d F Y",strtotime($jojo['sm_date_regist']));?></a></p>
                 </hgroup>
            </header>
            <section>
                <h3>จัดการเว็บไซต์</h3>
                <ul class="listing list-view">
                    <li class="company">
                        <span class="timestamp"><a href="index.php?step=updateacc" class="button button-green">สร้างเว็บไซต์</a></span>
                        <p>สร้างเว็บไซต์</p>
                        <div class="entry-meta">
                            สร้างเว็บไซต์เพื่อโปรโมตตัวคุณและสร้างเครือข่าย
                        </div>
                    </li>
                </ul>
            </section>
            <section>
                <h3>จัดการข้อมูลส่วนตัว</h3>
                <ul class="listing list-view">
                    <li class="contact">
                        <span class="timestamp"><a href="index.php?step=updatemyinfo" class="button button-orange">แก้ไขข้อมูล</a></span>
                        <p>ข้อมูลส่วนตัว</p>
                        <div class="entry-meta">
                            แก้ไขข้อมูลส่วนตัวของคุณ
                        </div>
                    </li>
                    <li class="note">
                        <a href="bank_refer.php?smid=<?=$smid;?>" class="more">&raquo;</a>
                        <span class="timestamp">ส่งคำร้อง</span>
                        <p>แจ้งเปลี่ยนชื่อบัญชีธนาคาร</p>
                        <div class="entry-meta">
                            ทำรายการแจ้งเปลี่ยนแก้ไขชื่อบัญชี หมายเลขบัญชี หรือ ชื่อธนาคารของคุณ
                        </div>
                    </li>
                    <li class="tick">
                        <a href="changemypass.php?smid=<?=$smid;?>" class="more">&raquo;</a>
                        <span class="timestamp">ดูรายละเอียด</span>
                        <p>เปลี่ยนชื่อผู้ใช้งาน และรหัสผ่าน</p>
                        <div class="entry-meta">
                            เปลี่ยนชื่อผู้ใช้งาน และรหัสผ่านส่วนตัว
                        </div>
                    </li>
                </ul>
            </section>
            <section>
                <h3>เว็บบอร์ด</h3>
                <ul class="listing list-view">
                    <li class="company">
                        <span class="timestamp"><a href="index.php?step=webboard" class="button button-gray">ไปเว็บบอร์ด</a></span>
                        <p>เว็บบอร์ด</p>
                        <div class="entry-meta">
                            สนธนา แลกเปลี่ยนข้อมูลข่าวสาร และ พบปะกับเพื่อนสมาชิก<br />พร้อมอัฟเดตเรื่องราว ใหม่ ๆ
                        </div>
                    </li>
                </ul>
            </section>
            <section>
                <h3>ชำระค่าบริการ</h3>
                <ul class="listing list-view">
                    <li class="note">
                        <span class="timestamp"><a href="index.php?step=payrefer" class="button button-blue">ดูรายละเอียด</a></span>
                        <p>แจ้งการชำระเงิน</p>
                        <div class="entry-meta">
                            แจ้งรายการชำระเงินค่าสมัครสมาชิก หรือ ค่าสั่งสินค้า
                        </div>
                    </li>
                </ul>
            </section>
        </div>

        <div class="preview-pane grid_3 omega">
            <div class="content">
                <h3>ชื่อเว็บไซต์ / ลิงค์ผู้แนะนำ</h3>
                <div class="message warning"><?php echo $linktogo; ?>?<? echo readname("sa_www","system_account","sa_sm_id",$jojo['sm_id']);?></div>
                <h3>รายละเอียดการติดต่อ ของคุณ</h3>
                <ul class="profile-info">
                    <li class="email"><?=$jojo['sm_email'];?><span>อีเมล์</span></li>
                    <li class="phone"><?=$jojo['sm_htel'];?><span>เบอร์โทรศัพท์</span></li>
                    <li class="mobile"><?=$jojo['sm_mtel'];?><span>เบอร์โทรศัพท์มือถือ</span></li>
                    <li class="house"><?=$jojo['sm_addr'].", ".$jojo['sm_postcode'].", ".readname("sd_name","system_district","sd_id",$jojo['sm_district']);?><span>ที่อยู่</span></li>
                </ul>
                <h3>ข้อมูลบัญชีธนาคาร</h3>
                <ul class="profile-info">
                    <li class="house"><?=$jojo['sm_bank_name'];?><span>ชื่อธนาคาร</span></li>
                    <li class="house"><?=$jojo['sm_bank_area'];?><span></span></li>
                    <li class="calendar-day"><?=$jojo['sm_bank_id'];?><span>เลขที่บัญชี</span></li>
                    <li class="calendar-day"><?=$jojo['sm_bank_acc'];?><span>ชื่อบัญชี</span></li>
                    <li class="building"><?=$jojo['sm_bank_type'];?><span>ประเภทบัญชี</span></li>
                </ul>
                <hr />
                <h3>ผู้แนะนำ / สปอน์เซอร์ ของคุณ</h3>
            	<div class="message info">
                	<? 
					$ft=queryx1("select sr_target from system_reply where sr_sm_id='$smid' limit 1");
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
</div>