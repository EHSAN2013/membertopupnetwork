<? $pid=$_GET['pid']; $pd=queryx1("select * from system_product where spd_id='$pid' limit 1"); ?>
<!--ผลิตภัณต์-->
<div id="detial_page">
  <h3 class="title_page"><?=$pd['spd_name'];?></h3>
  <!--รูปผลิตภัณต์-->
  <div class="thumbpro">
  	<a href="file/product/<?=$pd['spd_pic'];?>" title="<?=$pd['spd_name'];?>" id="example6"><img src="file/product/<?=$pd['spd_pic'];?>" border="0" width="300"></a>
  </div>
  <!--รายละเอียดผลิตภัณต์-->
  <div class="detailpro">
  	<h3 style="padding:0 0 0 10px;">รหัสสินค้า : <?=$pd['spd_code'];?></h3>
    <h3 style="padding:0 0 0 10px;">ราคา : <?=$pd['spd_price'];?> บาท</h3>
    <h3 style="padding:0 0 0 10px;">คะแนน : <?=$pd['spd_point'];?> PV</h3>
    <? $scname=readname("sc_name","system_category","sc_id",$pd['spd_sc_id']); ?>
    <h3 style="padding:0 0 0 10px;">หมวดหมู่สินค้า : <?=$scname;?></h3>
    <p>&nbsp;</p>
    <ul id="addtocart">
      <li class="sprite-add_cart_buttons"><a href="index.php?page=addtocart&pid=<?=$pd['spd_id'];?>"><span>add to cart</span></a></li>
    </ul>
    <p class="paddingtxt"><?=$pd['spd_detail'];?></p>
  </div>
  <div class="clear"></div>
  <!--ผลิตภัณต์รายการอื่น ที่น่าสนใจ-->
  <h3 class="title_page">สินค้าหมวดอื่น ที่น่าสนใจ</h3>
  <div class="relatepro">
  <? $qpd=queryx2("select * from system_product where spd_sc_id='$pd[spd_sc_id]' order by rand() desc limit 4");
	while($pd=mysql_fetch_array($qpd)){
	?>
	<div class="box-product">
    	<div class="box-pimg">
        <div class="viewpro1"><a href="index.php?page=products_detail&pid=<?=$pd['spd_id'];?>" title="<?=$pd['spd_name'];?>">&nbsp;</a></div>
        <img src="file/product/thumb_<?=$pd['spd_pic'];?>" border="0" width="128" height="128">
        </div>
        <div class="box-detial"><p><a href="index.php?page=products_detail&pid=<?=$pd['spd_id'];?>" class="proname"><?=mb_strimwidth($pd['spd_name'], 0, 30, "...", "UTF-8");?></a></p>
        <span class="propricel">ราคา</span><span class="propricer"><?=number_format($pd['spd_price'],0,'.',',');?> .-</span>
        <div class="clear"></div>
        <span class="propricel">คะแนน</span><span class="propricer"><?=$pd['spd_point'];?> PV</span>
        <div class="clear"></div>
        <? $scname=readname("sc_name","system_category","sc_id",$pd['spd_sc_id']); ?>
        <span class="propricel">หมวดหมู่</span><span class="propricer"><?=$scname;?></span>
        </div>
    </div>
	<? } ?>
  </div>
  <div class="clear"></div>
</div>