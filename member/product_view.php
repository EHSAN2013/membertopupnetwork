<? include('../config/connect.php'); $spdid=$_GET['spdid'];
$pps=queryx1("select * from system_product where spd_id='$spdid'");
?>
<h4>รายละเอียดสินค้า</h4>
<hr />
<p align="center"><img src="../file/product/thumb_<?=$pps['spd_pic'];?>" class="imgborder" /></p>
<h4><b>สินค้า :</b> <?=$pps['spd_name'];?></h4>
<ul class="profile-info">
    <li class="house"><span>รหัสสินค้า</span><?=$pps['spd_code'];?></li>
    <li class="house"><span>หมวดสินค้า</span><?=readname("sc_name","system_category","sc_id",$pps['spd_sc_id']);?></li>
    <li class="house"><span>ราคา</span><?=$pps['spd_price'];?> บาท</li>
    <li class="building"><span>คะแนน</span><?=$pps['spd_point'];?> คะแนน</li>
    <li class="calendar-day"><span>วันที่ลงประกาศ</span><?=date("l, d F Y",strtotime($pps['spd_date']));?></li>
</ul>
<p><a href="index.php?step=productdetail&id=<?=$spdid;?>" target="_blank">ดูรายละเอียดเพิ่มเติม &raquo; &raquo;</a></p>
<hr />
