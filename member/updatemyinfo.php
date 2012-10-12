<? $smid=$_SESSION['smid'];
$jojo=queryx1("select * from system_member member where sm_id='$smid' limit 1");
?>
<?
if(isset($_POST['btnupload'])){
	$sm_pic=$_FILES['sm_pic'];
	$oldpic=$_POST['oldpic'];
	if($sm_pic['name']!=""){
		$dir_dest="../file/profile/";
		$handle = new Upload($sm_pic);
		if ($handle->uploaded) {
			$handle->image_resize            = true;
			$handle->image_ratio_crop        = true;
			$handle->image_y                 = 150;
			$handle->image_x                 = 150;
			$handle->Process($dir_dest);
			if ($handle->processed) {
				$blogimg=$handle->file_dst_name;
				@unlink($dir_dest.$oldpic);
				@unlink($dir_dest."thumb_".$oldpic);
			}
			
			$handle->file_name_body_pre		 = "thumb_";
			$handle->image_resize            = true;
			$handle->image_ratio_crop        = true;
			$handle->image_y                 = 80;
			$handle->image_x                 = 70;
			$handle->Process($dir_dest);
			if ($handle->processed) {}
			
			$handle-> Clean();
			
		}else{
			$blogimg=$oldpic;
		}
		mysql_query("update system_member set sm_pic='$blogimg' where sm_id='$smid' limit 1")or die(mysql_error());
			$egtext="<div class='message success'><b>สำเร็จ</b> อัฟโหลดรูปภาพส่วนตัวใหม่ของคุณเสร็จเรียบร้อย</div>";
			echo "<script>setTimeout(\"location.href='index.php?step=updatemyinfo';\",3000);</script>";
	}else{
		$egtext="<div class='message error'><b>ผิดพลาด</b> โปรดเลือกรูปภาพที่จะทำการอัฟโลหด</div>";
	}
}
?>
<div class="container_8 clearfix">
    <!-- Main Section -->
    <section class="main-content">
        <header>
            <h2>
                แก้ไขข้อมูลส่วนตัว
            </h2>
        </header>
        <section class="main-section clearfix">
		<h3>โปรดกรอกข้อมูลให้ครงกับความเป็นจริง และครบถ้วนสมบูรณ์ เพื่อฟระโยชน์แก่ตัวท่าน</h3>
        <hr>
        <form action="" method="post" name="uploadimg" id="uploadimg" class="uniform" enctype="multipart/form-data">
        <input type="hidden" name="oldpic" value="<?=$jojo['sm_pic'];?>" />
        <p>
          <div class="profile-img">
          <h3>เปลี่ยนรูปส่วนตัว</h3>
          <?=$egtext;?>
          <? if($jojo['sm_pic']!=""){?>
              <img src="../file/profile/<?=$jojo['sm_pic'];?>" border="0">
          <? }else{?>
              <img src="../file/profile/anonymous.jpg" border="0">
          <? } ?>
          <p><label>อัพโหลดรูปส่วนตัว :</label> <input type="file" name="sm_pic" id="sm_pic" size="20" /></p>
          <p><small>รูปภาพต้องมีขนาดไม่ต่ำกว่า 150px (กว้างคูณสูง) และนามสกุลเป็น jpeg, jpg, gif และ png เท่านั้น</small></p>
          <p align="center">
              <input type="submit" name="btnupload" value="Upload" class="button button-green" /> 
              <input type="reset" name="bnreset" value="Reset" class="button button-blue" />
          </p>
          </div>
        </p>
        </form>
        <div class="clear"></div>
        <p>
        <form action="#" method="post" name="formupdatemyinfo" id="formupdatemyinfo">
        <input type="hidden" name="sm_id" id="sm_id" value="<?=$smid;?>" />
           	<p><label class="grid_2">E-mail :</label> <input type="email" name="sm_email" id="sm_email" size="40" required="required" value="<?=$jojo['sm_email'];?>" /></p>
            <p><label class="grid_2">ชื่อ นามสกุล :</label> <input type="text" name="sm_name" id="sm_name" size="40" required="required" value="<?=$jojo['sm_name'];?>" /></p>
            <p><label class="grid_2">เพศ :</label> 
            	<input type="radio" name="sm_sex" value="ชาย" <? if($jojo['sm_sex']=="ชาย"){?>checked="checked"<? }?> /> ชาย <input type="radio" name="sm_sex" value="หญิง" <? if($jojo['sm_sex']=="หญิง"){?>checked="checked"<? }?> /> หญิง
                <div class="clear"></div>
            </p>
            <p><label class="grid_2">เลขที่บัตรประจำตัวประชาชน :</label> <input type="text" name="sm_pid" id="sm_pid" size="40" required="required" value="<?=$jojo['sm_pid'];?>" /></p>
            <p><label class="grid_2">ที่อยู่บัจจุบัน :</label> <textarea name="sm_addr" id="sm_addr" rows="4" cols="37"><?=$jojo['sm_addr'];?></textarea></p>
            <p><label class="grid_2">จังหวัด :</label> 
            <select name="sm_district" id="sm_district">
				<? $sqeryd=mysql_query("select * from system_district");
                while(list($sdid,$sdname)=mysql_fetch_row($sqeryd)){
                ?>
                <option value="<?=$sdid;?>" <? if($sdid==$jojo['sm_district']){?>selected<? }?>><?=$sdname;?></option>
                <? }?>
            </select>
            </p>
            <p><label class="grid_2">รหัสไปรษณีย์ :</label> <input type="text" name="sm_postcode" id="sm_postcode" value="<?=$jojo['sm_postcode'];?>" /></p>
            <p><label class="grid_2">หมายเลขโทรศัพท์มือถือ :</label> <input type="text" name="sm_mtel" id="sm_mtel" value="<?=$jojo['sm_mtel'];?>" required="required" /></p>
            <!--<p><label class="grid_2">หมายเลขโทรศัพท์บ้าน :</label> <input type="text" name="sm_htel" id="sm_htel" value="<?//=$jojo['sm_htel'];?>" /></p>-->
            <div class="clear"></div>
            <hr />
            <p align="center">
                <input type="submit" name="btneditc" value="บันทึก" class="button button-orange" />
                <input type="reset" name="btnreset" value="คืนค่า" class="button button-blue" />
            </p>
        </form>
        </p>
        <div class="regist-error"></div>
        </section>

	</section>
</div>