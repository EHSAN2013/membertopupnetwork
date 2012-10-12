<? $qpage=queryx1("select * from system_webpage where swp_name='".$page."' limit 1"); ?>
<div id="detial_page">
    <h3 class="title_page">
    <?
		if($page=='oppatunity'){
			echo "โอกาสทางธุรกิจ";
		}else if($page=='onlinelearning'){
			echo "ห้องเรียนออนไลน์";
		}else if($page=='testimonials'){
			echo "Testimonials";
		}else if($page=='faq'){
			echo "คำถามที่พบบ่อย";
		}else if($page=='meetingcalendar'){
			echo "ตารางการประชุม";
		}else if($page=='promotion'){
			echo "โปรโมชั่นพิเศษ";
		}else if($page=='contactus'){
			echo "ติดต่อบริษัท";
		}else if($page=='aboutus'){
			echo "เกี่ยวกับเรา";
		}
    ?>
    </h3>
    <? if($page=='contactus'){?>
    <p class="text_padding_l">
    <?=$qpage['swp_desc']; ?>
    </p>
    <div class="box-contactus">
    	<h3 class="title_contact">ฟอร์มติดต่อเรา</h3>
        <form name="" action="" method="post" id="contactusform">
        <input type="hidden" name="confr_spam" value="<?=$ran_str;?>">
        	<dl>
            	<p><label>ชื่อ - นามสกุล</label></p>
                <dt><input type="text" name="sm_name" id="sm_name" size="40"></dt>
                <p><label>อีเมลผู้ติดต่อ</label></p>
                <dt><input type="text" name="sm_email" id="sm_email" size="40"></dt>
                <p><label>เบอร์โทรศัพท์</label></p>
                <dt><input type="text" name="sm_mtel" id="sm_mtel" size="40"></dt>
                <p><label>รายละเอียด</label></p>
                <dt><textarea name="sm_addr" id="sm_addr" rows="3" cols="55"></textarea></dt>
                <p><img src="captcha/pic_text.php?str=<?=$ran_str;?>" align="absbottom"/></p>
                <p><label>รหัสป้องกันสแปมส์</label></p>
                <dt><input type="text" name="spambot" id="spambot" size="10"></dt>
                <p><input type="submit" name="submit" value="ส่งข้อมูลถึงเรา"><input type="button" name="button" value="ล้างค่า"></p>
            </dl>
            <div class="regist-error" style="padding-top:20px;"></div>
        </form>
    </div>
    <? }else{ ?>
    <div class="text_padding">
    <?=$qpage['swp_desc']; ?>
    </div>
    <? } ?>
</div>