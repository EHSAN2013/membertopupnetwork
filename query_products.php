<? 
include("config/connect.php");
$strID=$_POST["tID"];

if($strID!=""){
	$qpcat="select * from system_product where spd_sc_id='$strID'";
}else{
	$qpcat="select * from system_product";
}
	$qpcat.=" order by spd_id desc";
	
	$qp=queryx2($qpcat);
	$num=mysql_num_rows($qp);
	$row_per_page=10; //จำนวนแสดง คอลั่มต่อหน้า
	$rang=6; //จำที่จะแสดงตัวเลข
	$rows=$num;
	$p_id=$_GET['p_id'];
	$pages=ceil($rows/$row_per_page);
							 
	if(empty($p_id)){
		$p_id=1;
		$start=0;
	}else{
		$start=$row_per_page*($p_id-1);
	}
		$qp=queryx2($qpcat." limit $start, $row_per_page");
		
	while($pd=mysql_fetch_array($qp)){
?>
<div class="box_pro">
  <div class="thumb_products">
  <div class="viewpro"><a href="index.php?page=products_detail&pid=<?=$pd['spd_id'];?>" title="<?=$pd['spd_name'];?>">&nbsp;</a></div>
  <img src="file/product/thumb_<?=$pd['spd_pic'];?>" border="0">
  </div>
  <div class="products_detail">
    <p><a href="index.php?page=products_detail&pid=<?=$pd['spd_id'];?>"><?=mb_strimwidth($pd['spd_name'], 0, 25, "...", "UTF-8");?></a></p>
    <p class="pro_price">
    	<span style="float:left;">ราคา</span>
    	<span style="float:right;"><?=$pd['spd_price'];?>.-</span>
    </p>
    <div class="clear"></div>
    <p class="pro_price">
        <span style="float:left;">คะแนน</span>
    	<span style="float:right;"><?=$pd['spd_point'];?> PV</span>
    </p>
    <div class="clear"></div>
    <p class="cat">
        <span style="float:left;">หมวดหมู่สินค้า</span>
        <? $scname=readname("sc_name","system_category","sc_id",$pd['spd_sc_id']); ?>
    	<span style="float:right;"><?=$scname;?></span>
    </p>
    <ul id="addtocart">
      <li class="sprite-add_cart_buttons"><a href="index.php?page=addtocart&pid=<?=$pd['spd_id'];?>"><span>add to cart</span></a></li>
    </ul>
  </div>
</div>
<? } ?>
<div class="clear"></div>
<ul class="pagenavi">
<?php
$first=$p_id-$rang;
$last=$p_id+$rang;

if($first<=1){$first=1;}

  if($last>=$pages){$last=$pages;}
	  $pre=$p_id-1;
	  
	  echo "<li><a href='index.php?page=products&scid=$strID&p_id=1'>&laquo;</a></li>"; //หน้าแรก
	  echo "<li><a href='index.php?page=products&scid=$strID&p_id=$pre'>&lsaquo;</a></li>"; // ก่อนหน้า
	   
	  for($b=$first;$b<=$last;$b++){
		  if($b==$p_id){
			  echo "<li><a class='current' href='#'>".$b."</a></li>"; //เลขหน้าปัจจุบัน
		  }else{
			  echo "<li><a href='index.php?page=products&scid=$strID&p_id=$b'>".$b."</a></li>"; //เลขหน้า
		  }
	  }//END FOR
		  
		  if($p_id<$pages){
			  $fev=$p_id+1;
				  echo "<li><a href='index.php?page=products&scid=$strID&p_id=$fev'>&rsaquo;</a></li>"; //ถัดไป
				  echo "<li><a href='index.php?page=products&scid=$strID&p_id=$pages'>&raquo;</a></li>"; //หน้าสุดท้าย
		  }
?>            
</ul>
