<? $nid=$_GET['nid']; $qnews=queryx1("select * from system_news where syn_id='$nid' limit 1"); ?>
<div id="detial_page">
	<h3 class="title_page"><?=$qnews['syn_title'];?></h3>
    <div class="newslist">
    	<p><?=$qnews['syn_detail'];?></p>
        <p class="datenews"><b>วันที่ลงกิจกรรม :</b> <?=datethai($qnews['syn_date'],'day');?></p>
    </div>
    <p class="btn_back"><a class="button-back" href="index.php?page=news_list">กลับไปดูกิจกรรมทั้งหมด</a></p>
</div>