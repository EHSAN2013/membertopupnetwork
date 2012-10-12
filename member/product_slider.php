<? $sector=$_GET['sector']; $slid=$_GET['slid']; ?>
<!-- kindeditor.js -->
<script type="text/javascript" carset="utf-8" src="kindeditor/kindeditor.js"></script>
<!-- langauge.js -->
<script type="text/javascript" carset="utf-8" src="kindeditor/lang/en.js"></script>
<? if($sector==1){
	if(isset($_POST['btnadd'])){
		$sld_name=$_POST['sld_name'];
		$sld_link=$_POST['sld_link'];
		$sld_image=$_FILES['sld_image'];
		$dir_dest = '../file/slider/';
		
		$handle = new Upload($_FILES['sld_image']);
		if ($handle->uploaded) {
			
			$handle->image_resize          = true;
			$handle->image_ratio_crop      = true;
			$handle->image_y               = 308;
			$handle->image_x               = 860;
			$handle->Process($dir_dest);
			if ($handle->processed) {
				$slideimg=$handle->file_dst_name;
			}
			
			$handle->file_name_body_pre		 = "thumb_";
			$handle->image_resize            = true;
			$handle->image_ratio_crop        = true;
			$handle->image_y                 = 100;
			$handle->image_x                 = 250;
			$handle->Process($dir_dest);
			if ($handle->processed) {}
				$handle-> Clean();
		}
		mysql_query("insert into system_sliders value('','$sld_name','$slideimg','$sld_link');")or die(mysql_error());
		$jojo=mysql_insert_id();
		mysql_close();
		echo "<script>window.location='admin_panel.php?page=slider&sector=2&slid=$jojo';</script>";
	}
?>
<section class="main-section grid_7">
  <div class="main-content">
    <header>
      <h2> จัดการสไลด์ภาพ </h2>
    </header>
    <section class="container_6 clearfix">
      <div class="grid_6">
        <form name="formaddsld" id="formaddsld" class="grid_6" action="" method="post" enctype="multipart/form-data">
          <fieldset>
            <legend>โปรดกรอกข้อมูลให้ครบถ้วน</legend>
            <p>
              <input type="text" name="sld_name" required="required" size="50" title="ชื่อสไลด์" />
            </p>
            <p>
              <input type="file" name="sld_image" size="30" title="ภาพสไลด์" /><br><span>อัพโหลดไฟล์รูปภาพเฉพาะ .jpg, .jpeg, .png และ .gif ขนาดไม่เกิน 860x305 pixel เท่านั้น</span>
            </p>
            <p>
              <input type="text" name="sld_link" required="required" size="100" title="ลิงค์สไลด์" />
            </p>
            <hr>
            <div align="center">
              <input type="submit" name="btnadd" class="button button-orange"  value="บันทึก"/>
              <input type="button" name="btnback" class="button button-blue" value="กลับไปดูสไลด์ภาพทั้งหมด" onClick="javascript:window.location='admin_panel.php?page=slider&slid=<?=$slid;?>';"/>
            </div>
          </fieldset>
        </form>
      </div>
    </section>
  </div>
</section>
<? }else if($sector==2){ 
	if(isset($_POST['btnadd'])){
		$sld_name=$_POST['sld_name'];
		$sld_link=$_POST['sld_link'];
		$oldimg=$_POST['oldimg'];
		$dir_dest = '../file/slider/';
		
		$handle = new Upload($_FILES['sld_image']);
		if ($handle->uploaded) {
			
			$handle->image_resize          = true;
			$handle->image_ratio_crop      = true;
			$handle->image_y               = 308;
			$handle->image_x               = 860;
			$handle->Process($dir_dest);
			
			if ($handle->processed) {
				$slideimg=$handle->file_dst_name;
				@unlink($dir_dest.$oldimg);
				@unlink($dir_dest."thumb_".$oldimg);
			}
	
			$handle->file_name_body_pre		 = "thumb_";
			$handle->image_resize            = true;
			$handle->image_ratio_crop        = true;
			$handle->image_y                 = 100;
			$handle->image_x                 = 250;
			$handle->Process($dir_dest);
			if ($handle->processed) {}
				$handle-> Clean();
			}else{
				$slideimg=$oldimg;
			}
		mysql_query("update system_sliders set sld_name='$sld_name', sld_image='$slideimg', sld_link='$sld_link' where sld_id='$slid' limit 1")or die(mysql_error());
		mysql_close();
		echo "<script>window.location='admin_panel.php?page=slider';</script>";
	}
$jojo=queryx1("select * from system_sliders where sld_id='$slid' limit 1");
?>
<section class="main-section grid_7">
  <div class="main-content">
    <header>
      <h2> แก้ไขสไลด์ภทพ </h2>
    </header>
    <section class="container_6 clearfix">
      <div class="grid_6">
        <form name="formaddsld" id="formaddsld" class="grid_6" action="" method="post" enctype="multipart/form-data">
        <input type="hidden" name="oldimg" value="<?=$jojo['sld_image'];?>">
          <fieldset>
            <legend>โปรดกรอกข้อมูลให้ครบถ้วน</legend>
            <p>
              <input type="text" name="sld_name" required="required" size="50" title="ชื่อสไลด์" value="<?=$jojo['sld_name']; ?>"/>
            </p>
            <p>
              <input type="file" name="sld_image" size="30" title="ภาพสไลด์" />
            </p>
            <img src="../file/slider/<?=$jojo['sld_image'];?>" class="slidershadow" title="ภาพประกอบสินค้า">
            <div class="clear"></div>
            <p>
              <input type="text" name="sld_link" required="required" size="100" title="ลิงค์สไลด์" value="<?=$jojo['sld_link']; ?>"/>
            </p>
            <hr>
            <div align="center">
              <input type="submit" name="btnadd" class="button button-orange"  value="บันทึก"/>
              <input type="button" name="btnback" class="button button-blue" value="กลับไปดูสไลด์ภาพทั้งหมด" onClick="javascript:window.location='index.php?page=slider';"/>
            </div>
          </fieldset>
        </form>
      </div>
    </section>
  </div>
</section>
<? 
}else if($sector==3){ 
	$img=readname("sld_image","system_sliders","sld_id",$slid);
	@unlink("../file/slider/".$img);
	@unlink("../file/slider/thumb_".$img);
	mysql_query("delete from system_sliders where sld_id='$slid'")or die(mysql_error());
	mysql_query("delete from system_slider_ref where sld_id='$slid'")or die(mysql_error());
	mysql_close();
	echo "<script>window.location='admin_panel.php?page=slider';</script>";
}else{
?>
<section class="main-section grid_7">
    <div class="main-content">
        <header>
            <h2>รายการสไลด์ทั้งหมด</h2>
        </header>
        <section class="container_6 clearfix">
            <div class="grid_6">
            <p>
              <a href="admin_panel.php?page=slider&sector=1" class="button button-green fr"><span class="add"></span>เพิ่มสไลด์ภาพใหม่</a> 
              <div class="clear"></div>
          	</p>
                <table class="datatable paginate sortable full">
                    <thead>
                        <tr>
                            <th style="width:250px;">ภาพสไลด์</th>
                            <th>ชื่อสไลด์</th>
                            <th style="width:220px;">ลิงค์สไสด์</th>
                            <th style="width:60px"></th>
                        </tr>
                    </thead>
                    <tbody>
                    <? //$jojo=queryx2("select * from system_product where spd_sc_id='$scid' order by spd_date DESC");
					$jojo=mysql_query("select * from system_sliders order by sld_id desc")or die(mysql_error());
					while($qsld=mysql_fetch_array($jojo)){
					?>
                        <tr>
                            <td align="center"><a href="../file/slider/<?=$qsld['sld_image'];?>" target="_blank"><img src="../file/slider/thumb_<?=$qsld['sld_image'];?>"></a></td>
                            <td><?=$qsld['sld_name'];?></td>
                            <td><?=$qsld['sld_link'];?></td>
                            <td>
                                <ul class="action-buttons">
                                    <li><a href="admin_panel.php?page=slider&slid=<?=$qsld['sld_id'];?>&sector=2" class="button button-orange no-text" title="แก้ไข"><span class="pencil"></span>แก้ไข</a></li>
                                    <li><a href="admin_panel.php?page=slider&slid=<?=$qsld['sld_id'];?>&sector=3" class="button button-red no-text" title="ลบ" onClick="javascript:return confirm('ต้องการลบสินค้านี้');"><span class="bin"></span>ลบ</a></li>
                                </ul>
                            </td>
                        </tr>
                    <? }?>
                    </tbody>
                </table>

            </div>
        </section>
    </div>
</section>
<? } ?>