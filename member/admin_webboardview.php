<!-- kindeditor.js -->
<script type="text/javascript" carset="utf-8" src="./kindeditor/kindeditor.js"></script>
<!-- langauge.js -->
<script type="text/javascript" carset="utf-8" src="./kindeditor/lang/en.js"></script>
<script>
	KindEditor.ready(function(K) {
		K.create('#sw_detail', {themeType : 'default',langType : 'en',
		uploadJson  :  './kindeditor/php/upload_json.php'
		});
	});
</script>
<style type="text/css">
	
</style>
<?
	$wid=$_GET['wid'];
	$total=readname("sw_view","system_webboard","sw_id",$wid);
	$vtotal=$total+1;
	mysql_query("update system_webboard set sw_view='$vtotal' where sw_id='$wid' limit 1")or die(mysql_error());
	
	$gh=queryx1("select * from system_webboard where sw_id='$wid'");
?>
<!-- Main Section -->

    <section class="main-section grid_7">

        <div class="main-content grid_7 alpha">
            <header>
                    <h2><?=$gh['sw_title'];?></h2>
            </header>
            <section>
				<div>
                	<?=$gh['sw_detail'];?>
                </div>
                <div class="message info"><b>โดย :</b> <?=readname("sm_name","system_member","sm_id",$gh['sw_sm_id']);?> <b>วันที่ :</b> <?=date("d F Y",strtotime($gh['sw_date']));?> <b>ไอพี :</b> <?=$gh['sw_ip'];?> <b>ดู :</b> <?=$gh['sw_view'];?></div>
                <hr />
            </section>
            
            <? $ghj=queryx2("select * from system_webboard where sw_target='$wid' order by sw_date ASC"); $hj=0; while($fetw=mysql_fetch_array($ghj)){$hj++; ?>
            <section>
            <fieldset style="position:relative;"><legend>ตอบกลับ #<?=$hj;?></legend>
            <a href="admin_panel.php?page=deletes&dlt=<?=$fetw['sw_id'];?>&tld=1" class="button button-red" style="position:absolute; top:-23px; right:25px;" onclick="javascript:return confirm('ต้องการลบทิ้ง ?');">ลบทิ้ง<span class="bin"></span></a>
            <div>
            	<?=$fetw['sw_detail'];?>
            </div>
            <div class="message warning"><b>โดย :</b> <?=readname("sm_name","system_member","sm_id",$fetw['sw_sm_id']);?> <b>วันที่ :</b> <?=date("d F Y",strtotime($fetw['sw_date']));?> <b>ไอพี :</b> <?=$fetw['sw_ip'];?></div>
            </fieldset>
            </section>
            <? } ?>
            
            <section>
            <div class="regist-error"></div>
            <? if(isset($_POST['btneditc'])){
			$sw_detail=$_POST['sw_detail'];
			
			mysql_query("insert into system_webboard value('','$wid','$smid','','$sw_detail','".date("Y-m-d H:i:s")."','0','2','".$_SERVER['REMOTE_ADDR']."');")or die(mysql_error());
			$jidp=mysql_insert_id();
			mysql_close();
			echo "<script>window.location='admin_panel.php?page=webboardview&wid=$wid';</script>";
			
			}?>
            <form action="" method="post" name="formboard" id="formboard" enctype="multipart/form-data">
            <fieldset><legend>ตอบกลับ</legend>
                <p><label class="grid_1"><em>*</em> รายละะอียด</label> <textarea rows="15" cols="85" name="sw_detail" id="sw_detail"></textarea></p>
                <p align="center">
                    <input type="submit" name="btneditc" value="ตอบกลับ" class="button button-orange" /> <input type="button" name="btnback" class="button button-gray" value="กลับไปดูกระทู้ทั้งหมด" onclick="javascript:window.location='admin_panel.php?page=webboard';" />
                </p>
            </fieldset>
            </form>
            </section>
        </div>

    </section>

    <!-- Main Section End -->