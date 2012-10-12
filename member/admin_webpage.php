<!-- kindeditor.js -->
<script type="text/javascript" carset="utf-8" src="./kindeditor/kindeditor.js"></script>
<!-- langauge.js -->
<script type="text/javascript" carset="utf-8" src="./kindeditor/lang/en.js"></script>
<script>
	KindEditor.ready(function(K) {
		K.create('#swp_detail', {themeType : 'default',langType : 'en',
		uploadJson  :  './kindeditor/php/upload_json.php'
		});
	});
</script>
<!-- Main Section -->
<section class="main-section grid_7">
  <div class="main-content grid_7 alpha">
    <header>
    <? $wpname=readname("swp_name","system_webpage","swp_name",$page); ?>
      <h2>จัดการข้อมูล
	  <? 
	  if($wpname=='oppatunity'){
		  echo "โอกาสทางธุรกิจ";
	  }else if($wpname=='onlinelearning'){
		  echo "ห้องเรียนออนไลน์";
	  }else if($wpname=='testimonials'){
		  echo "Testimonials";
	  }else if($wpname=='vdo'){
		  echo "แก้ไขวิดีโอในหน้าแรก";
	  }else if($wpname=='faq'){
		  echo "คำถามที่พบบ่อย";
	  }else if($wpname=='meetingcalendar'){
		  echo "ตารางการประชุม";
	  }else if($wpname=='promotion'){
		  echo "โปรโมชั่นพิเศษ";
	  }else if($wpname=='contactus'){
		  echo "ติดต่อบริษัท";
	  }else if($wpname=='aboutus'){
		  echo "เกี่ยวกับเรา";
	  }
	  ?>
      </h2>
    </header>
    <section>
      <?
	  if($page!="vdo"){
		  if(isset($_POST['btnsave'])){
			  $swp_detail=$_POST['swp_detail'];
			  mysql_query("update system_webpage set swp_desc='$swp_detail' where swp_name='$page' limit 1")or die(mysql_error());
			  mysql_close();
			  echo "<script>window.location='admin_panel.php?page=$page';</script>";
		  }
	  $qwp=queryx1("select * from system_webpage where swp_name='$page' limit 1");?>
      <form action="" method="post" name="formboard" id="formboard" enctype="multipart/form-data">
          <p style="margin:0 0 10px 0;">
            <label><em>*</em> รายละะอียด</label>
          </p>
          <p>
            <textarea rows="20" cols="116" name="swp_detail" id="swp_detail"><?=$qwp['swp_desc'];?></textarea>
          </p>
          <p align="center">
            <input type="submit" name="btnsave" value="บันทึก" class="button button-orange" />
            <input type="reset" name="btnreset" value="คืนค่า" class="button button-gray" />
          </p>
      </form>
      <? }else{
		  if(isset($_POST['btnvdo'])){
			  $vdo_detail=$_POST['vdo_detail'];
			  mysql_query("update system_webpage set swp_desc='$vdo_detail' where swp_name='$page' limit 1")or die(mysql_error());
			  mysql_close();
			  echo "<script>window.location='admin_panel.php?page=$page';</script>";
		  }
	  $qwp=queryx1("select * from system_webpage where swp_name='$page' limit 1");?>  
      <h3>วีดีโอที่แสดงในปัจจุบัน</h3>
      <hr>
      <div align="center"><?=$qwp['swp_desc'];?></div>
      <hr>
      <h3>Code วิดีโอ</h3>    
      <form action="" method="post" name="formvdo" id="formvdo" style="width: 100%;">
            <textarea name="vdo_detail" id="vdo_detail" style="width:100%; height:50px;"><?=$qwp['swp_desc'];?></textarea>
            <span style="color:#999; font-size:11px;"><b>หมายเหตุ</b> ขนาดวีดีโอที่ต้องกำหนด 513 X 317 pixel เท่านั้น กำหนด width=513, height=317</span>
          <p align="center">
            <input type="submit" name="btnvdo" value="บันทึกการแก้ไข" class="update_button button button-orange" />
            <input type="reset" name="btnreset" value="คืนค่าเริ่มต้น" class="button button-gray" />
          </p>
      </form>
      <? }?>
      <div class="clear"></div>
    </section>
  </div>
</section>

<!-- Main Section End -->