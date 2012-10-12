<div id="detial_page">
<div class="title_bar_leld">
  <h3 class="label02">รายการสั่งซื้อ</h3>
</div>
<div class="section_content_whitebg">
<div class="buydetails_title item">รายการสินค้า</div>
<div class="buydetails_title shippingaddress">ที่อยู่ในการจัดส่ง</div>
<form action="#" method="post" name="formpayments" id="formpayment">
<? if($_SESSION['spd_id']==0){ ?>
<div class="item_info">
  <p class="emptycart">ยังไม่มีสินค้าในตระกร้าสินค้าค่ะ</p>
</div>
<div class="payment_info">
    <input name="code_hidden" type="hidden" value="<?=$ran_str;?>">
    <p><label style="color:red;">โปรดกรอกข้อมูลให้ครบถ้วนนะค่ะ</label></p>
    <p><label>ชื่อ - นามสกุล: </label></p>
    <p><input type="text" name="cname" size="45"></p>
    <p><label>อีเมล์:</label></p>
    <p><input type="text" name="cmail" size="45"></p>
    <p><label>เบอร์ติดต่อ:</label></p>
    <p><input type="text" name="ctel" size="45"></p>
    <p><label>ที่อยู่สำรหรับจัดส่งสินค้า:</label></p>
    <p><textarea name="caddress" rows="3" cols="48"></textarea></p>
    <p><img src="captcha/pic_text.php?str=<?=$ran_str;?>" align="absbottom" /></p>
    <p><label>รหัสบ้องกันสแปมส์:</label></p>
    <p><input type="text" name="spambot" size="11"></p>
    <p style="margin:15px 0 0 0;"><input type="submit" name="Submit" value="ยืนยันการสั่งซื้อ" class="btn_confirm"/></p>
    <div class="regist-error" style="padding-top:20px;"></div>
</div>
<p align="center" style="margin:0 0 10px 0;">
<input type="button" name="btnback" value="ย้อนกลับตระกร้าสินค้า" class="btn_addtocat" onClick="javascript:window.location='index.php?page=productorder';"/>
</p>
<? echo "<script>window.location='index.php?page=products';</script>"; ?>
<div class="clear"></div>
<? }else{ ?>
<div class="item_info">
  <input name="total_price" type="hidden" value="<?=$total;?>">
    <? 
    for($i=0;$i<count($_SESSION['spd_id']);$i++){
	
		//ราคารวมของสินค้าแต่ละอัน
		$total_unit = $_SESSION['spd_num'][$i] * $_SESSION['spd_price'][$i];
		//ราคารวมของสินค้าทั้งหมด
		$total = $total + $total_unit;
		
		//เปลี่ยนสีตารางให้สลับสีกัน        
        $iLoop++;  
       	$bgcolor = ( ($iLoop%2)==0 )? "#FFFFFF" : "#fbfbfb";//IF อย่างย่อ
	?>
    <div class="item_order" style="background:<?=$bgcolor;?>">
      <div class="item_pic"><img src="file/product/thumb_<?=$_SESSION['spd_pic'][$i];?>" border="0" width="60" height="60"/></div>
      <div class="item_details">
        <p><b>รหัสสินค้า: </b><?=$_SESSION['spd_code'][$i];?></p>
        <p><?=$_SESSION['spd_name'][$i];?></p>
        <p><b>ราคาต่อชิ้น: </b> <?=$_SESSION['spd_price'][$i];?> บาท</p>
        <p><b>จำนวน: </b><?=$_SESSION['spd_num'][$i];?></p>
        <p><b>รวม: </b><?=number_format($total_unit,2,'.',',');?> บาท</p>
      </div>
    </div>
    <div class=""></div>

<? } ?>
</div>

<div class="payment_info">
    <input name="code_hidden" type="hidden" value="<?=$ran_str;?>">
    <p><label style="color:red;">โปรดกรอกข้อมูลให้ครบถ้วนนะค่ะ</label></p>
    <p><label>ชื่อ - นามสกุล: </label></p>
    <p><input type="text" name="cname" size="45"></p>
    <p><label>อีเมล์:</label></p>
    <p><input type="text" name="cmail" size="45"></p>
    <p><label>เบอร์ติดต่อ:</label></p>
    <p><input type="text" name="ctel" size="45"></p>
    <p><label>ที่อยู่สำรหรับจัดส่งสินค้า:</label></p>
    <p><textarea name="caddress" rows="3" cols="48"></textarea></p>
    <p><img src="captcha/pic_text.php?str=<?=$ran_str;?>" align="absbottom" /></p>
    <p><label>รหัสบ้องกันสแปมส์:</label></p>
    <p><input type="text" name="spambot" size="11"></p>
    <div class="regist-error" style="padding-top:20px;"></div>
</div>
<div class="clear"></div>
<div class="buy_summary">
  <p class="total_summary"> 
  <strong>ยอดรวมทั้งหมด</strong> 
  <span style="color:red;"><?=number_format($total,2,'.',',');?></span> บาท
  <span><input type="submit" name="Submit" value="ยืนยันการสั่งซื้อ" class="btn_confirm"/></span>
  </p>
</div>
<p align="center" style="margin:0 0 10px 0;">
<input type="button" name="btnback" value="ย้อนกลับตระกร้าสินค้า" class="btn_addtocat" onClick="javascript:history.back(-1);"/>
</p>
</form>
</div>
<div class="clear"></div>
<? } ?>
</div>