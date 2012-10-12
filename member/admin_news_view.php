<? $nid=$_GET['nid']; $gh=queryx1("select * from system_news where syn_id='$nid' limit 1");

//Edit data
if(isset($_POST['btnedit'])){
	$nid=$_POST['nid'];
	$syn_title=$_POST['syn_title'];
	$syn_st=$_POST['syn_st'];
	$syn_detail=$_POST['syn_detail'];
	mysql_query("update system_news set syn_title='$syn_title', syn_st='$syn_st', syn_detail='$syn_detail' where syn_id='$nid' limit 1")or die(mysql_error());
	echo "<script>alert('แก้ไขรายการข่าวเรียบร้อยแล้ว'); window.location='admin_panel.php?page=news_view&nid=$nid';</script>";
}
?>
<!-- Main Section -->

<section class="main-section grid_7">
	
    <div class="main-content grid_7 alpha">
    	<? if($_GET['edit']==""){?>
        <header><h2><?=$gh['syn_title'];?></h2></header>
        <section>
        	<div class="message info"><b>สถานะ:</b> <? if($gh['syn_st']==1){echo "ข่าวใหม่";}elseif($gh['syn_st']==2){echo "ข่าวร้อน";}else{echo "ไม่มีสถานนะ";}?></div>
            <div>
                <?=$gh['syn_detail'];?>
            </div>
            <hr />
            <p align="center"><a href="admin_panel.php?page=news" class="button button-orange">กลับไปดูข่าวทั้งหมด</a></p>
        </section>
        <? }else{?>
        <!-- kindeditor.js -->
<script type="text/javascript" carset="utf-8" src="./kindeditor/kindeditor.js"></script>
<script type="text/javascript" carset="utf-8" src="./kindeditor/lang/en.js"></script>
<script> KindEditor.ready(function(K) {K.create('#syn_detail', {themeType : 'default',langType : 'en',uploadJson  :  './kindeditor/php/upload_json.php'});});</script>
		<header><h2>แก้ไขข่าวประชาสัมพันธ์</h2></header>
        <section>
         <form action="" method="post" name="formboard" id="formboard" enctype="multipart/form-data">
         <input type="hidden" name="nid" value="<?=$nid;?>">
                <p><label class="grid_1"><em>*</em> หัวข้อข่าว</label> <input type="text" maxlength="400" name="syn_title" id="syn_title" size="88" required="required" value="<?=$gh['syn_title'];?>" /></p>
                <p><label class="grid_1"><em>*</em> สถานะ</label> 
                <input type="radio" value="1" name="syn_st" <? if($gh['syn_title']==1){?>checked<? }?>> ข่าวใหม่ 
                <input type="radio" value="2" name="syn_st" <? if($gh['syn_title']==2){?>checked<? }?>> ข่าวร้อน 
                <input type="radio" value="0" name="syn_st" <? if($gh['syn_title']==0){?>checked<? }?>> ไม่มีสถานะ</p>
                <p><label class="grid_1"><em>*</em> รายละะอียด</label> <textarea rows="15" cols="85" name="syn_detail" id="syn_detail"><?=$gh['syn_detail'];?></textarea></p>
                <p align="center">
                    <input type="submit" name="btnedit" value="แก้ไข" class="button button-orange" />
                    <input type="reset" name="btnreset" value="คืนค่า" class="button button-gray" />
                    <input type="button" name="btnback" value="กลับไปดูข่าวทั้งหมด" class="button button-blue" onClick="javascript:window.location='admin_panel.php?page=news';" />
                </p>
            </form>
        </section>
        <? }?>
    </div>

</section>

<!-- Main Section End -->