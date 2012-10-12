<section class="container_8 main-section clearfix">

    <div class="main-content grid_5 alpha">
        <header>
            <div class="view-switcher">
            <h2>สินค้าของเรา <a href="#">&darr;</a></h2>
                <ul>
                    <li><a href="index.php?step=product">สินค้าทั้งหมด</a></li>
                    <li class="separator"></li>
                    <li>เลือกตามหมวดสินค้า</li>
                    <li class="separator"></li>
                    <? $jc=queryx2("select * from system_category order by sc_id ASC");
					while($llc=mysql_fetch_array($jc)){
					?>
                    <li><a href="index.php?step=product&iop=<?=$llc['sc_id']?>">(<?=$llc['sc_code']?>) <?=$llc['sc_name']?></a></li>
                    <? }?>
                </ul>
            </div>
        </header>
        <section>
            <ul class="listing list-view clearfix">
            	<? 
				$iop=$_GET['iop'];
				if($iop==""){
					$prolist="select * from system_product order by spd_date DESC";
				}else{
					$prolist="select * from system_product where spd_sc_id='$iop' order by spd_date DESC";
				}
				
				$pscx=mysql_query($prolist);
				$numpro=mysql_num_rows($pscx);
				$row_per_page=20;
				$rang=4;
				$rows=$numpro;
				$page_id=$_GET['page_id'];
				$pages=ceil($rows/$row_per_page);
				
				if(empty($page_id)){
					$page_id=1;
					$start=0;
				}else{
					$start=$row_per_page*($page_id-1);
				}
				
				$psc=queryx2($prolist." LIMIT $start,$row_per_page");
				while($plc=mysql_fetch_array($psc)){
				?>
                <li class="clearfix">
                    <img src="../file/product/thumb_<?=$plc['spd_pic'];?>" class="fl imgborder">
                    <a class="more" href="./product_view.php?spdid=<?=$plc['spd_id'];?>" title="ดูรายละเอียด">&raquo;</a>
                    <span class="timestamp"><? date("l, d/M/Y",strtotime($plc['spd_date']));?></span>
                    <a href="#" class="name">(รหัสสินค้า: <?=$plc['spd_code'];?>) <?=$plc['spd_name'];?></a>
                    <div class="entry-meta">
                       ราคา <?=$plc['spd_price'];?>, คะแนน <?=$plc['spd_point'];?>, หมวด <?=readname("sc_name","system_category","sc_id",$plc['spd_sc_id']);?>
                    </div>
                </li>
                <? }?>
            </ul>
            <ul class="pagination clearfix">
            <? 
				$first=$page_id-$rang;
				$last=$page_id+$rang;
				if($first<=1){$first=1;}
				if($last>=$pages){$last=$pages;}
				$pre=$page_id-1;
				echo "<li><a href='index.php?step=product&page_id=1&iop=$iop' class='button-blue'>&laquo;</a></li>";
				echo "<li><a href='index.php?step=product&page_id=$pre&iop=$iop' class='button-blue'>&lsaquo;</a></li>";
				for($b=$first;$b<=$last;$b++){
						if($b==$page_id){
							echo "<li><a href='#' class='current button-blue'>".$b."</a></li>";
						}else{
							echo "<li><a href='index.php?step=product&page_id=$b&iop=$iop'class='button-blue'>".$b."</a></li>";
						}
				}//END FOR
				if($page_id<$pages){
					$fev=$page_id+1;
					echo "<li><a href='index.php?step=product&page_id=$fev&iop=$iop' class='button-blue'>&rsaquo;</a></li>";
					echo "<li><a href='index.php?step=product&page_id=$pages&iop=$iop' class='button-blue'>&raquo;</a></li>";
				}
			?>
            </ul>
        </section>
    </div>

    <div class="preview-pane grid_3 omega">
        <div class="content">
            <h3>วิธีการสั่งซื้อและชำระเงิน</h3>
            <p align="justify">หากคุณต้องการสั่งซื้อสินค้ากับทางเว็บ โปรดติดต่อสั่งสินค้าที่เบอร์ โทร <b><?php echo $maintel; ?></b> หรือ ทางอีเมลล์ <a href="#"><?php echo $mainemail; ?></a> เมื่อทางเว็บตรวจสอบ ว่ามีสินค้า (เนื่องจากสินค้าของเราเป็นสินค้าไอที ที่มีการผันผวนของราคา เราจึงต้องทำการเช็คสต็อคสินค้าและราคาก่อนเพื่อประโยชน์สูงสุดของสมาชิก) จากนั้นก็จะทำการติดต่อกลับจากนั้นท่านจึงทำการโอนเงิน เมื่อโอนเงินเสร็จให้แจ้งไปยังเมนูรายการชำระเงิน และแจ้งที่อยู่ที่จัดส่งสินค้าตรงข้อความเพิ่มเติม เมื่อ เจ้าหน้าที่ตรวจสอบเสร็จก็จะทำการจัดส่งสินค้าให้โดยเร็วที่สุด</p>
            <div class="message info">
                <h3>โปรดทราบ</h3>
                <img src="./images/lightbulb_32.png" class="fl" />
                <p>กรุณาระบุในรายการแจ้งการชำระเงินอย่างละเอียดเพื่อความรวดเร็วในการตรวจสอบ</p>
            </div>
        </div>
        <div class="preview">
        </div>
    </div>

</section>