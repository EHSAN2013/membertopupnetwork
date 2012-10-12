<div id="example"> <img src="img/new-ribbon.png" width="112" height="112" alt="New Ribbon" id="ribbon">
  <div id="slides">
    <div class="slides_container">
      <? $qsld=queryx2("select * from system_sliders order by sld_id desc"); while($sld=mysql_fetch_array($qsld)){?>
      <div class="slide"> <a href="<?=$sld['sld_link'];?>" title="<?=$sld['sld_name'];?>" target="_blank"><img src="file/slider/<?=$sld['sld_image'];?>" alt="<?=$sld['sld_name'];?>"></a>
        <div class="caption" style="bottom:0">
          <p><?=$sld['sld_name'];?></p>
        </div>
      </div>
    <? } ?>
    </div>
    <a href="#" class="prev"><img src="img/arrow-prev.png" width="24" height="43" alt="Arrow Prev"></a> <a href="#" class="next"><img src="img/arrow-next.png" width="24" height="43" alt="Arrow Next"></a> </div>
</div>
