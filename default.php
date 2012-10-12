<div id="sidebar_left">
  <div class="advertiser"><span>ที่ปรึกษาทางธุรกิจ</span></div>
  <div class="box_admintalk">
  	<div class="thumb_direct"><img src="images/default_avatar_pic_x100.jpg" border="0" width="85" height="85"></div>
    <div class="direct_info">
    	<p>ชื่อ-นามสกุล: <?=$mname;?></p>
        <p>เบอร์โทรศัพท์: <?=$mtel;?></p>
       	<p>อีเมล: <?=$mmail;?></p>
      	<p>เข้าร่วมเมื่อ: <?=datethai($mdateregis,'day');?></p>
    </div>
  </div>
  <ul id="container">
    <li class="sprite-login_member_01"><a href="index.php?page=login"><span>ระบบสมาชิก</span></a></li>
    <li class="sprite-regis_member_03"><a href="index.php?page=registation&direct=<?=$smid;?>"><span>สมัครสมาชิก</span></a></li>
    <li class="sprite-meeting_calendar_02"><a href="index.php?page=meetingcalendar"><span>ตารางประชุม</span></a></li>
    <li class="sprite-promotion_04"><a href="index.php?page=promotion"><span>โปรโมชั่นพิเศษ</span></a></li>
  </ul>
  <div class="lastmember"><span>สมาชิกใหม่ล่าสุด</span></div>
  <div class="box_members">
    <div id="newsticker-demo">
      <ul>
        <? $qmem=queryx2("select * from system_member where sm_level='1' order by sm_date_regist desc limit 0, 20"); while($member=mysql_fetch_array($qmem)){?>
        <? $namesite=readname("sa_www","system_account","sa_sm_id",$member['sm_id']); ?>
        <li>
          <div class="thumb_member"><img src="images/default_avatar_pic_x100.jpg" border="0" width="44"></div>
          <div class="member_info">
            <p>ชื่อ-นามสกุล: <?=$member['sm_name'];?></p>
            <p>สมัครเมื่อ: <?=datethai($member['sm_date_regist'],'day');?></p>
            <p>เว็บไซต์: <a href="http://<?=$linktogo;?>?<?=$namesite;?>" style="font-size:10px;color:#0C0;text-shadow:1px 1px 1px #BFB;"><?=$linkname;?>?<?=$namesite;?></a></p>
          </div>
        </li>
        <? } ?>
      </ul>
    </div>
  </div>
</div>
<div id="content_right">
  <div class="box_vdo">
  	<?=readname("swp_desc","system_webpage","swp_id",4);?>
  </div>
  <div class="box_news">
    <div class="newsupdate"><span>ข่าวประชาสัมพันธ์</span></div>
    <div class="news_lastest">
      <ul>
        <? $qnews=queryx2("select * from system_news order by syn_date desc limit 0, 8"); while($news=mysql_fetch_array($qnews)){ ?>
        <li><a href="index.php?page=news_detail&nid=<?=$news['syn_id'];?>"><?=mb_strimwidth($news['syn_title'], 0, 77, "...", "UTF-8");?></a></li>
        <? } ?>
      </ul>
    </div>
    <p><a href="index.php?page=news_list" class="view_all">ดูข่าวประชาสัมพันธ์ทั้งหมด »</a></p>
  </div>
  <div class="box_products">
    <div class="fb-like-box" data-href="http://www.facebook.com/platform" data-width="510" data-height="180" data-show-faces="true" data-border-color="#FFF" data-stream="false" data-header="false"></div>
  </div>
</div>
