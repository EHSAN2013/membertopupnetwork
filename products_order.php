<div id="detial_page">
<div class="title_bar_leld">
  <h3 class="label02">รายการสั่งซื้อ</h3>
</div>
<div class="section_content_whitebg">
<div class="buydetails_title01">
	<span class="title_01">รายละเอียดสินค้า</span>
    <span class="title_02">ราคา</span>
    <span class="title_03">จำนวน</span>
    <span class="title_04">ราคารวม</span>
    <span class="title_05">ลบ</span>
</div>
  <? if($_SESSION['spd_id']==0){ ?>
  <div class="item_info2">
  	<p class="emptycart">ยังไม่มีสินค้าในตระกร้าสินค้าค่ะ</p>
  	<? echo "<script>window.location='index.php?page=products';</script>"; ?>
  </div>
  <? }else{ ?>
  <div class="item_info2">
  <form id="formorderlist" name="formorderlist" method="post" action="product_calculate.php" enctype="multipart/form-data">
    <? 
	$j=0;
    for($i=0;$i<count($_SESSION['spd_id']);$i++){ $j++;
	
		//ราคารวมของสินค้าแต่ละอัน
		$total_unit = $_SESSION['spd_num'][$i] * $_SESSION['spd_price'][$i];
		//ราคารวมของสินค้าทั้งหมด
		$total = $total + $total_unit;
		
		//เปลี่ยนสีตารางให้สลับสีกัน        
        $iLoop++;  
       	$bgcolor = ( ($iLoop%2)==0 )? "#FFFFFF" : "#fbfbfb";//IF อย่างย่อ
	?>
    <div class="item_order2" style="background:<?=$bgcolor;?>">
      <div class="item_pic"><img src="file/product/thumb_<?=$_SESSION['spd_pic'][$i];?>" border="0" width="60" height="60"/></div>
      <div class="item_details2">
        <p><u>รหัสสินค้า: <?=$_SESSION['spd_code'][$i];?></u></p>
        <p><?=$_SESSION['spd_name'][$i];?></p>
        <p class="pv">คะแนน: <?=$_SESSION['spd_point'][$i];?> PV</p>
        <? $scname=readname("sc_name","system_category","sc_id",$_SESSION['spd_sc_id'][$i]);?>
        <p class="cat">หมวดหมู่: <?=$scname;?></p>
      </div>
      <div class="item_details3">
      	<p><span id="price_item_<?=$j;?>"><?=$_SESSION['spd_price'][$i];?></span> บาท/ชิ้น</p>
      </div>
      <div class="item_details4">
      	<p><input name="qty_item_<?=$j;?>" id="qty_item_<?=$j;?>" type="text" value="<?=$_SESSION['spd_num'][$i];?>" size="1"/></p>
      </div>
      <div class="item_details3">
      	<p><span id="total_item_<?=$j;?>"><?=$_SESSION['spd_price'][$i];?></span> บาท</p>
      </div>
      <p style="float: right; margin: 30px 5px 0px 0px;"><input name="product_del[]" type="checkbox" value="<?=$_SESSION['spd_id'][$i];?>"/></p>
    </div>
    <? } ?>
    <div class="buy_summary">
    	<p class="total_summary"> <strong>ยอดรวมทั้งหมด</strong> <span style="color:red;" id="grandTotal"></span> บาท</p>
    </div>
    	<p align="right">
        <input name="complete" type="submit" value="ยืนยันการสั่งซื้อสินค้า" class="btn_addtocat"/>
        <input name="calculate" type="submit" value="อัพเดตตระกร้าสินค้า" class="btn_addtocat"/>
        </p>
  </form>
  </div>
  <div class="clear"></div>
<? } ?>
</div>
</div>
