<? $pid=$_GET['pid'];?>
<div class="container_8 clearfix">

    <div class="main-content grid_8">
        <header class="clearfix">
             <h2><? require_once('../config/page_design_field.php');?></h2>
        </header>
        <section>
            <? $postdataq=queryx2("select * from system_page where sp_target='$pid' order by sp_id ASC");
			while($data=mysql_fetch_array($postdataq)){
			?>
            <div>
            	<?=$data['sp_detail'];?>
            </div>
            <? }?>
        </section>
    </div>

</section>