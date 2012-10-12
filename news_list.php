<div id="detial_page">
	<h3 class="title_page">ข่าวประชาสัมพันธ์ทั้งหมด<span class="date_r" style="padding:0 10px 0 0;">วันที่ลงข่าว</span></h3>
    <div class="newslist">
    	<ul>
        	<? $qnews=queryx2("select * from system_news order by syn_date desc"); while($news=mysql_fetch_array($qnews)){ ?>
        	<li>
            <a href="index.php?page=news_detail&nid=<?=$news['syn_id'];?>"><?=mb_strimwidth($news['syn_title'], 0, 100, "...", "UTF-8");?></a>
            <span class="date_r"><?=datethai($news['syn_date'],'day');?></span>
            </li>
            <? } ?>
        </ul>
    </div>
</div>