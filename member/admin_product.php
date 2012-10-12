<?
if(isset($_POST['btnsubmit'])){
	$sc_name=$_POST['sc_name'];
	$sc_code=$_POST['sc_code'];
	mysql_query("insert into system_category value('','$sc_code','$sc_name');")or die(mysql_error());
	echo "<script>window.locatin='admin_panel.php?page=product';</script>";
}
?>
<section class="main-section grid_7">

    <div class="main-content grid_4 alpha">
        <header class="clearfix">
        	<ul class="action-buttons clearfix fr">
                <li><a href="javascript:void(0);" class="button button-gray no-text" onclick="javascript:window.location.reload();" title="Refresh">Refresh<span class="accept"></span></a></li>
            </ul>
             <hgroup>
                 <h2>ระบบจัดการสินค้า</h2>
             </hgroup>
        </header>
        <section>
            <h3>เพิ่มหมวดสินค้า</h3>
            <form method="post" style="width: 420px;" action="">
                <input type="submit" name="btnsubmit" class="fr button button-orange" value="บันทึก">
                <input type="text" name="sc_name" id="sc_name" size="32" class="fl" required="required" placeholder="ชื่อหมวดสินค้า">
            	<input type="text" size="10" name="sc_code" id="sc_code" maxlength="10" class="fl" required="required" placeholder="รหัสหมวดสินค้า">
            </form>
            <div class="clear"></div>
            <h3>รายการหมวดสินค้า</h3>
            <ul class="listing list-view">
            	<? $stcquery=queryx2("select * from system_category order by sc_id ASC");
				while($dsc=mysql_fetch_array($stcquery)){
				?>
                <li class="note">
                    <a href="./admin_edit_category.php?scid=<?=$dsc['sc_id'];?>" class="more" title="แก้ไข">&raquo;</a>
                    <span class="timestamp action-button">
                        <ul class="action-buttons clearfix">
                            <li><a href="admin_panel.php?page=product_add&scid=<?=$dsc['sc_id'];?>" class="button button-gray no-text" title="เพิ่มสินค้าในหมวดนี้">Add<span class="add"></span></a></li>
                            <li><a href="admin_panel.php?page=delete&g=2&id=<?=$dsc['sc_id'];?>" class="button button-gray no-text" title="ลบหมวดสินค้านี้" onclick="javascript:return confirm('โปรดทราบ หากคุณทำการลบหมวดสินค้า สินค้าที่อยู่ภายใต้หมวดนี้จะถูกลบไปด้วย คุณยังต้องการลบอีกหรือไม่');">Delete<span class="bin"></span></a></li>
                            <li><a href="admin_panel.php?page=product_list&scid=<?=$dsc['sc_id'];?>" class="button button-gray no-text" title="ดูรายการสินค้าในหมวดนี้">Grid View<span class="view-grid"></span></a></li>
                        </ul>
                    </span>
                    <p><b>รหัส:</b> <?=$dsc['sc_code'];?></p>
                    <div class="entry-meta"><b>ชื่อหมวด</b> <?=$dsc['sc_name'];?></div>
                </li>
                <? }?>
            </ul>
        </section>
    </div>

    <div class="preview-pane grid_3 omega">
        <div class="content">
            <div class="message info">
                <h3>คำแนะนำ</h3>
                <img src="./images/lightbulb_32.png" class="fl" />
                <p>เมื่อคุณได้ทำการแก้ไขหมวดสินค้าแล้ว หากต้องการปรับปรุงข้อมูลให้เป็นปัจจุบัน กรุณากดปุ่ม <img src="images/icons/accept.png" /> เพื่อทำการรีเฟรชข้อมูล ขอบคุณค่ะ</p>
            </div>
        </div>
        <div class="preview">
        </div>
    </div>

</section>