<? $scid=$_GET['scid']; $sector=$_GET['sector']; $id=$_GET['id'];?>
<!-- kindeditor.js -->
<script type="text/javascript" carset="utf-8" src="./kindeditor/kindeditor.js"></script>
<!-- langauge.js -->
<script type="text/javascript" carset="utf-8" src="./kindeditor/lang/en.js"></script>
<?
if($sector==1){
$jojo=queryx1("select * from system_product where spd_id = '$id' limit 1");
?>
<section class="main-section grid_7">

    <div class="main-content">
        <header>
            <h2>รายละเอียดสินค้า</h2>
        </header>
        <section class="container_6 clearfix">
            <div class="other-options grid_3">
                <h3 class="other">ข้อมูลทั่วไป</h3>
                <ul>
                    <li>
                        <h4><a href="#">รหัสสินค้า</a></h4>
                        <p><?=$jojo['spd_code'];?></p>
                    </li>
                    <li>
                        <h4><a href="#">ชื่อสินค้า</a></h4>
                        <p><?=$jojo['spd_name'];?></p>
                    </li>
                    <li>
                        <h4><a href="#">ราคาต่อชิ้น</a></h4>
                        <p><?=$jojo['spd_price'];?> บาท</p>
                    </li>
                    <li>
                        <h4><a href="#">คะแนนที่ผู้ชื้อได้รับ</a></h4>
                        <p><?=$jojo['spd_point'];?> Point</p>
                    </li>
                    <li>
                        <h4><a href="#">รายละเอียด</a></h4>
                        <p><?=$jojo['spd_detail'];?></p>
                    </li>
                </ul>
        	</div>
            <div class="other-options grid_3">
            	<h3 class="other">รูปสินค้า</h3>
            	<a href="../file/product/<?=$jojo['spd_pic'];?>" target="_blank"><img src="../file/product/<?=$jojo['spd_pic'];?>" width="300"></a>
            </div>
            <div class="clear"></div>
            <hr>
            <div align="center">
                <a href="admin_panel.php?page=product_add&sector=2&id=<?=$id;?>&scid=<?=$scid;?>" class="button button-green">แก้ไขสินค้า<span class="pencil"></span></a> <a href="admin_panel.php?page=delete&g=1&id=<?=$jojo['spd_id'];?>&scid=<?=$scid;?>" class="button button-red" onClick="javascript:return confirm('ต้องการลบสินค้านี้');">ลบสินค้านี้<span class="bin"></span></a> <a href="admin_panel.php?page=product_list&scid=<?=$scid;?>" class="button button-blue">กลับ<span class="view-grid"></span></a>
            </div>
        </section>
    </div>

</section>
<? }elseif($sector==2){if(isset($_POST['btnadd'])){
	$spd_name=$_POST['spd_name'];
	$spd_code=$_POST['spd_code'];
	$spd_price=$_POST['spd_price'];
	$spd_point=$_POST['spd_point'];
	$spd_detail=$_POST['spd_detail'];
	$oldpic=$_POST['oldimg'];
	$dir_dest = '../file/product/';
	
	$handle = new Upload($_FILES['spd_pic']);
	if ($handle->uploaded) {
		$handle->image_resize          = true;
		$handle->image_ratio_y         = true;
		$handle->image_x               = 400;
		$handle->Process($dir_dest);
		if ($handle->processed) {
			$blogimg=$handle->file_dst_name;
			@unlink($dir_dest.$oldpic);
			@unlink($dir_dest."thumb_".$oldpic);
		}
		$handle->file_name_body_pre		 = "thumb_";
		$handle->image_resize            = true;
		$handle->image_ratio_crop        = true;
		$handle->image_y                 = 180;
		$handle->image_x                 = 180;
		$handle->Process($dir_dest);
		if ($handle->processed) {}
		$handle-> Clean();
	}else{
		$blogimg=$oldpic;
	}
	mysql_query("update system_product set spd_name='$spd_name', spd_code='$spd_code', spd_price='$spd_price', spd_point='$spd_point', spd_detail='$spd_detail', spd_pic='$blogimg' where spd_id='$id' limit 1")or die(mysql_error());
	mysql_close();
	echo "<script>window.location='admin_panel.php?page=product_add&sector=1&scid=$scid&id=$id';</script>";
}
$jojo=queryx1("select * from system_product where spd_id = '$id' limit 1");
?>

<script>
	KindEditor.ready(function(K) {
		K.create('#spd_detail', {themeType : 'default',langType : 'en',
		uploadJson  :  './kindeditor/php/upload_json.php'
		});
	});
</script>
<section class="main-section grid_7">

    <div class="main-content">
        <header>
            <h2>แก้ไขข้อมูลสินค้า</h2>
        </header>
        <section class="container_6 clearfix">

            <form name="formaddp" id="formaddp" class="grid_6" action="" method="post" enctype="multipart/form-data">
            <input type="hidden" name="oldimg" value="<?=$jojo['spd_pic'];?>">
                <fieldset>
                    <legend>โปรดกรรอกข้อมูลให้ครบถ้วน</legend>
                    <img src="../file/product/<?=$jojo['spd_pic'];?>" class="fr" title="ภาพประกอบสินค้า" width="300">
                    <p><input type="text" name="spd_name" required="required" value="<?=$jojo['spd_name'];?>" size="50" title="ชื่อสินค้า" /></p>
                    <p><input type="text" name="spd_code" maxlength="10" required="required"  value="<?=$jojo['spd_code'];?>" size="30" title="รหัสสินค้า" /></p>
                    <p></label><input type="text" name="spd_price" required="required"  value="<?=$jojo['spd_price'];?>" size="30" title="ราคาต่อชิ้น" /></p>
                    <p><input type="text" name="spd_point" required="required"  value="<?=$jojo['spd_point'];?>" size="30" title="คะแนนที่ผู้ชื้อได้รับ" /></p>
                    <p>
                    	<input type="file" name="spd_pic" size="30" title="ภาพประกอบสินค้า" />
                    </p>
                    <div class="clear"></div>
                    <p>
                    	<textarea id="spd_detail" name="spd_detail" rows="6" cols="113"><?=$jojo['spd_detail'];?></textarea>
                    </p>
                    <hr>
                    <div align="center">
                        <input type="submit" name="btnadd" class="button button-orange"  value="บันทึก"/> <input type="button" name="btnback" class="button button-blue" value="กลับไปดูรายการสินค้า" onClick="javascript:window.location='admin_panel.php?page=product_list&scid=<?=$scid;?>';"/>
                    </div>
                </fieldset>
            </form>
        </section>
    </div>

</section>
<? }else{
if(isset($_POST['btnadd'])){
	$spd_name=$_POST['spd_name'];
	$spd_code=$_POST['spd_code'];
	$spd_price=$_POST['spd_price'];
	$spd_point=$_POST['spd_point'];
	$spd_detail=$_POST['spd_detail'];
	$spd_pic=$_FILES['spd_pic'];
	$dir_dest = '../file/product/';
	
	$handle = new Upload($_FILES['spd_pic']);
	if ($handle->uploaded) {
		$handle->image_resize          = true;
		$handle->image_ratio_y         = true;
		$handle->image_x               = 400;
		$handle->Process($dir_dest);
		if ($handle->processed) {
			$blogimg=$handle->file_dst_name;
		}
		$handle->file_name_body_pre		 = "thumb_";
		$handle->image_resize            = true;
		$handle->image_ratio_crop        = true;
		$handle->image_y                 = 180;
		$handle->image_x                 = 180;
		$handle->Process($dir_dest);
		if ($handle->processed) {}
		$handle-> Clean();
	}
	mysql_query("insert into system_product value('','$scid','$spd_name','$spd_detail','$spd_price','$spd_point','','','$spd_code','".date("Y-m-d")."','','$blogimg');")or die(mysql_error());
	$jojo=mysql_insert_id();
	mysql_close();
	echo "<script>window.location='admin_panel.php?page=product_add&sector=1&scid=$scid&id=$jojo';</script>";
}
?>

<script>
	KindEditor.ready(function(K) {
		K.create('#spd_detail', {themeType : 'default',langType : 'en',
		uploadJson  :  './kindeditor/php/upload_json.php'
		});
	});
</script>
<section class="main-section grid_7">

    <div class="main-content">
        <header>
            <h2>
                เพิ่มสินค้า
            </h2>
        </header>
        <section class="container_6 clearfix">

            <form name="formaddp" id="formaddp" class="grid_6" action="" method="post" enctype="multipart/form-data">
                <fieldset>
                    <legend>โปรดกรรอกข้อมูลให้ครบถ้วน</legend>
                    <p><input type="text" name="spd_name" required="required" placeholder="ชื่อสินค้า" size="50" /></p>
                    <p><input type="text" name="spd_code" maxlength="10" required="required" placeholder="รหัสสินค้า" size="30" /></p>
                    <p></label><input type="text" name="spd_price" required="required" placeholder="ราคาต่อชิ้น" size="30" /></p>
                    <p><input type="text" name="spd_point" required="required" placeholder="คะแนนที่ผู้ชื้อได้รับ" size="30" /></p>
                    <p>
                    	<input type="file" name="spd_pic" size="30" title="ภาพประกอบสินค้า" />
                    </p>
                    <p>
                    	<textarea id="spd_detail" name="spd_detail" rows="6" cols="113">รายละเอียดของสินค้า...</textarea>
                    </p>
                    <hr>
                    <div align="center">
                        <input type="submit" name="btnadd" class="button button-orange"  value="เพิ่มสินค้า"/> <input type="button" name="btnback" class="button button-blue" value="กลับไปดูรายการสินค้า" onClick="javascript:window.location='admin_panel.php?page=product_list&scid=<?=$scid;?>';"/>
                    </div>
                </fieldset>
            </form>
        </section>
    </div>

</section>
<? }?>