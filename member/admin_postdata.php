<? $pid=$_GET['pid']; $edit=$_GET['edit'];
if(isset($_POST['btnadd'])){
	$content=$_POST['content'];
	mysql_query("insert into system_page value('','$content','','','1','".$pid."','');")or die(mysql_error());
	echo "<script>window.location='admin_panel.php?page=postdata&pid=$pid';</script>";
}
if(isset($_POST['btnedit'])){
	$content=$_POST['content'];
	mysql_query("update system_page set sp_detail='$content' where sp_id='$edit';")or die(mysql_error());
	echo "<script>window.location='admin_panel.php?page=postdata&pid=$pid';</script>";
}
if($_GET['spxid']!=""){
	mysql_query("delete from system_page where sp_id='$_GET[spxid]' limit 1;")or die(mysql_error());
}
?>
<!-- kindeditor.js -->
<script type="text/javascript" carset="utf-8" src="./kindeditor/kindeditor.js"></script>
<!-- langauge.js -->
<script type="text/javascript" carset="utf-8" src="./kindeditor/lang/en.js"></script>

<script>
	KindEditor.ready(function(K) {
		K.create('#content', {themeType : 'default',langType : 'en',
		uploadJson  :  './kindeditor/php/upload_json.php'
		});
	});
</script>

<section class="main-section grid_7">

    <div class="main-content grid_7 alpha">
        <header class="clearfix">
             <h2><? require_once('../config/page_design_field.php');?></h2>
        </header>
        <section>
        	<? if($edit==""){?>
            <h3>เพิ่มรายละเอียด</h3>
            <hr>
            <form method="post" style="width: 100%;" name="form" action="">
                <textarea name="content" id="content" cols="115" rows="10"></textarea>
            <p>
                <input type="submit" class="update_button button button-orange" name="btnadd" value="บันทึก">
                <input type="reset" class="button button-gray" value="รีเซต">
            </p>
            </form>
            
            <div class="clear"></div>
            
            <h3>รายละเอียดที่แสดงปัจุบัน</h3>
            <hr>
            <? $postdataq=queryx2("select * from system_page where sp_target='$pid' order by sp_id ASC");
			while($data=mysql_fetch_array($postdataq)){
			?>
            <div>
            	<?=$data['sp_detail'];?>
                <p align="right" style="padding:10px 0;"><a href="admin_panel.php?page=postdata&pid=<?=$pid;?>&edit=<?=$data['sp_id'];?>" class="button button-blue">แก้ไข</a> <a href="admin_panel.php?page=postdata&pid=<?=$pid;?>&spxid=<?=$data['sp_id'];?>" onClick="javascript:return confirm('ต้องการลบรายการนี้');" class="button button-red">ลบ</a></p>
            </div>
            <hr>
            <? }
			
			}else{
			$spdat=queryx1("select * from system_page where sp_id='$edit'");
			?>
            <h3>เพิ่มรายละเอียด</h3>
            <hr>
            <form method="post" style="width: 100%;" name="form" action="">
                <textarea name="content" id="content" cols="115" rows="40"><?=$spdat['sp_detail'];?></textarea>
            <p>
                <input type="submit" class="update_button button button-orange" name="btnedit" value="บันทึก">
                <input type="reset" class="button button-gray" value="คืนค่า">
            </p>
            </form>
            
            <div class="clear"></div>
            <? }?>
        </section>
    </div>

</section>