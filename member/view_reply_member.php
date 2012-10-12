<? include('../config/connect.php'); $vvsmid=$_GET['vvsmid'];
$dd=queryx1("select * from system_member where sm_id='$vvsmid' limit 1");?>
<h4>รายละเอียดการติดต่อ</h4>
<hr />
<ul class="profile-info">
	<li class="building"><span>รหัสสมาชิก</span><?=$dd['sm_code'];?></li>
    <li class="building"><span>ชื่อ นามสกุล</span><?=$dd['sm_name'];?></li>
    <li class="email"><span>อีเมล์</span><?=$dd['sm_email'];?></li>
    <li class="phone"><span>โทรศัพท์, มือถือ</span><?=$dd['sm_htel'];?>, <?=$dd['sm_mtel'];?></li>
    <li class="house"><span>ทีอยู่</span><?=$dd['sm_addr'].", ".$dd['sm_postcode'].", ".readname("sd_name","system_district","sd_id",$dd['sm_district']);?></li>
</ul>
<hr>
<? if($_GET['bb']!=1){?>
<h4>เวปไซต์ / ลิ้งค์ผู้แนะนำ</h4>
<div class="message info">
	<a href="http://<?php echo $www; ?>/?<? echo readname("sa_www","system_account","sa_sm_id",$dd['sm_id']);?>" target="_blank" title="ดูเว็บไซต์"><?php echo $www; ?>/?<? echo readname("sa_www","system_account","sa_sm_id",$dd['sm_id']);?></a>
</div>
<? }else{?>
<h4>เวปไซต์ / ลิ้งค์ผู้แนะนำ</h4>
<a href="http://<?php echo $www; ?>/?<? echo readname("sa_www","system_account","sa_sm_id",$dd['sm_id']);?>" target="_blank" title="ดูเว็บไซต์"><?php echo $www; ?>/?<? echo readname("sa_www","system_account","sa_sm_id",$dd['sm_id']);?></a>
<hr>
<h4>ข้อมูลบัญชีธนาคาร</h4>
<ul class="profile-info">
	<li class="building"><span>ธนาคาร / สาขา</span><?="ธนาคาร ".$dd['sm_bank_name']." สาขา ".$dd['sm_bank_area'];?></li>
    <li class="building"><span>ชื่อบัญชี</span><?=$dd['sm_bank_acc'];?></li>
    <li class="email"><span>เลขที่บัญชี</span><?=$dd['sm_bank_id'];?></li>
    <li class="phone"><span>ประเภทบัญชี</span><?=$dd['sm_bank_type'];?></li>
</ul>
<? }?>
