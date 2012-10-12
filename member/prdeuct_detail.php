<? $id=$_GET['id'];
$jojo=queryx1("select * from system_product where spd_id = '$id' limit 1");
?>
<section class="container_8 main-section clearfix">

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
                </ul>
        	</div>
            <div class="other-options grid_3">
            	<h3 class="other">รูปสินค้า</h3>
            	<a href="../file/product/<?=$jojo['spd_pic'];?>" target="_blank"><img src="../file/product/<?=$jojo['spd_pic'];?>" style=" padding:5px; background:#F0F0F0; width:300px;"></a>
            </div>
            <div class="clear"></div>
            <div class="other-options grid_6">
            	 <h3 class="other">รายละเอียด</h3>
                 <p><?=$jojo['spd_detail'];?></p>
            </div>
            <hr>
            <div align="center">
                <a href="index.php?step=product" class="button button-blue">กลับไปดูสินค้าทั้งหมด<span class="view-grid"></span></a>
            </div>
        </section>
    </div>

</section>