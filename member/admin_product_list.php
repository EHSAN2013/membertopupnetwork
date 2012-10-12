<? $scid=$_GET['scid'];
$codecate=readname("sc_code","system_category","sc_id",$scid);
$namecate=readname("sc_name","system_category","sc_id",$scid);
?>
<section class="main-section grid_7">

    <div class="main-content">
        <header>
            <h2>หมวดสินค้า <?=$codecate;?>:<?=$namecate;?></h2>
        </header>
        <section class="container_6 clearfix">
            <div class="grid_6">
                <h3>รายการสินค้า
                </h3>
                <hr />
                <p>
                	<a href="admin_panel.php?page=product_add&scid=<?=$scid;?>" class="button button-green fr"><span class="add"></span>เพิ่มสินค้าในหมวดนี้</a> 
                    <a href="admin_panel.php?page=product" class="button button-blue fl"><span class="view-list"></span>กลับไปดูหมวดสินค้าทั้งหมด</a>
                	<div class="clear"></div>
                </p>
                
                <table class="datatable paginate sortable full">
                    <thead>
                        <tr>
                            <th style="width:130px;">รูปภาพ</th>
                            <th>รหัสสินค้า</th>
                            <th style="width:220px;">ชื่อสินค้า</th>
                            <th>ราคา (บาท)</th>
                            <th>คะแนน (PV)</th>
                            <th>เพิ่มเมื่อ</th>
                            <th style="width:90px"></th>
                        </tr>
                    </thead>
                    <tbody>
                    <? $jojo=queryx2("select * from system_product where spd_sc_id='$scid' order by spd_date DESC");
					while($dfp=mysql_fetch_array($jojo)){
					?>
                        <tr>
                            <td align="center"><a href="../file/product/<?=$dfp['spd_pic'];?>" target="_blank"><img src="../file/product/thumb_<?=$dfp['spd_pic'];?>" width="120" height="120"></a></td>
                            <td><?=$dfp['spd_code'];?></td>
                            <td><?=$dfp['spd_name'];?></td>
                            <td align="right"><?=$dfp['spd_price'];?></td>
                            <td align="right"><?=$dfp['spd_point'];?></td>
                            <td align="center"><?=date("d F Y",strtotime($dfp['spd_date']));?></td>
                            <td>
                                <ul class="action-buttons">
                                	<li><a href="admin_panel.php?page=product_add&scid=<?=$scid;?>&sector=1&id=<?=$dfp['spd_id'];?>" class="button button-blue no-text" title="ดูรายละเอียดสินค้า"><span class="accept"></span>ดู</a></li>
                                    <li><a href="admin_panel.php?page=product_add&scid=<?=$scid;?>&sector=2&id=<?=$dfp['spd_id'];?>" class="button button-orange no-text" title="แก้ไข"><span class="pencil"></span>แก้ไข</a></li>
                                    <li><a href="admin_panel.php?page=delete&g=1&id=<?=$dfp['spd_id'];?>&scid=<?=$scid;?>" class="button button-red no-text" title="ลบ" onClick="javascript:return confirm('ต้องการลบสินค้านี้');"><span class="bin"></span>ลบ</a></li>
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
