<!-- kindeditor.js -->
<script type="text/javascript" carset="utf-8" src="./kindeditor/kindeditor.js"></script>
<!-- langauge.js -->
<script type="text/javascript" carset="utf-8" src="./kindeditor/lang/en.js"></script>
<script>
	KindEditor.ready(function(K) {
		K.create('#syn_detail', {themeType : 'default',langType : 'en',
		uploadJson  :  './kindeditor/php/upload_json.php'
		});
	});
</script>
<!-- Main Section -->
<?
if($_GET['del']!=""){
	$del=$_GET['del'];
	mysql_query("delete from system_news where syn_id='$del' limit 1")or die(mysql_error());
	echo "<script>alert('ลบข่าวเรียบร้อยแล้วค่ะ');</script>";
}
?>
    <section class="main-section grid_7">

        <div class="main-content grid_7 alpha">
            <header><h2>ข่าวกิจกรรม</h2></header>
            <section>
                <ul id="contacts" class="listing list-view clearfix">
                <? $quertyuo="select * from system_news order by syn_date DESC";
				 	
					$pscx=mysql_query($quertyuo)or die(mysql_error());
				 	$numpro=mysql_num_rows($pscx);
					$row_per_page=30;
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
				$quertyuo.=" limit $start,$row_per_page";
				 $ghj=queryx2($quertyuo); $hj=0; while($fetw=mysql_fetch_array($ghj)){$hj++; ?>
                    <li class="clearfix">
                        <span class="timestamp">วันที่ลงกิจกรรม: <?=datethai($fetw['syn_date'],'day');?></span>
                        <a href="admin_panel.php?page=news_view&nid=<?=$fetw['syn_id'];?>" class="name"><?=$fetw['syn_title'];?> (<? if($fetw['syn_st']==1){echo "ข่าวใหม่";}elseif($fetw['syn_st']==2){echo "ข่าวร้อน";}else{echo "ไม่มีสถานนะ";}?>)</a>
                        <hr>
                        <div class="action">
                        <a href="admin_panel.php?page=news&del=<?=$fetw['syn_id'];?>" class="button button-red" onclick="javascript:return confirm('ต้องการลบทิ้ง ?');">ลบทิ้ง<span class="bin"></span></a> <a href="admin_panel.php?page=news_view&nid=<?=$fetw['syn_id'];?>&edit=1" class="button button-green">แก้ไข<span class="pencil"></span></a>
                        </div>
                    </li>
                 <? } ?>
                </ul>
                <ul class="pagination clearfix">
				<? 
                    $first=$page_id-$rang;
                    $last=$page_id+$rang;
                    if($first<=1){$first=1;}
                    if($last>=$pages){$last=$pages;}
                    $pre=$page_id-1;
                    echo "<li><a href='admin_panel.php?page=webboard&page_id=1&xlc=$xlc' class='button-blue'>&laquo;</a></li>";
                    echo "<li><a href='admin_panel.php?page=webboard&page_id=$pre&xlc=$xlc' class='button-blue'>&lsaquo;</a></li>";
                    for($b=$first;$b<=$last;$b++){
                            if($b==$page_id){
                                echo "<li><a href='#' class='current button-blue'>".$b."</a></li>";
                            }else{
                                echo "<li><a href='admin_panel.php?page=webboard&page_id=$b&xlc=$xlc'class='button-blue'>".$b."</a></li>";
                            }
                    }//END FOR
                    if($page_id<$pages){
                        $fev=$page_id+1;
                        echo "<li><a href='admin_panel.php?page=webboard&page_id=$fev&xlc=$xlc' class='button-blue'>&rsaquo;</a></li>";
                        echo "<li><a href='admin_panel.php?page=webboard&page_id=$pages&xlc=$xlc' class='button-blue'>&raquo;</a></li>";
                    }
                ?>
                </ul>
            </section>
            
            <section>
            <? if(isset($_POST['btnsave'])){
			$syn_title=$_POST['syn_title'];
			$syn_st=$_POST['syn_st'];
			$syn_detail=$_POST['syn_detail'];
			mysql_query("insert into system_news value('','$syn_title','$syn_detail','".date("Y-m-d")."','$syn_st');")or die(mysql_error());
			$jidp=mysql_insert_id();
			mysql_close();
			
			echo "<script>window.location='admin_panel.php?page=news_view&nid=$jidp';</script>";
			
			}?>
            <form action="" method="post" name="formboard" id="formboard" enctype="multipart/form-data">
            <fieldset><legend>เพิ่มกิจกรรม</legend>
                <p><label class="grid_1"><em>*</em> หัวข้อกิจกรรม</label> <input type="text" maxlength="400" name="syn_title" id="syn_title" size="88" required="required" /></p>
                <p><label class="grid_1"><em>*</em> สถานะ</label> <input type="radio" value="1" name="syn_st"> กิจกรรมใหม่ <input type="radio" value="2" name="syn_st"> กิจกรรมสุดฮอท <input type="radio" value="0" name="syn_st" checked> ไม่มีสถานะ</p>
                <p><label class="grid_1"><em>*</em> รายละะอียด</label> <textarea rows="15" cols="85" name="syn_detail" id="syn_detail"></textarea></p>
                <p align="center">
                    <input type="submit" name="btnsave" value="บันทึก" class="button button-orange" />
                    <input type="reset" name="btnreset" value="คืนค่า" class="button button-gray" />
                </p>
            </fieldset>
            </form>
            </section>
        </div>

    </section>

    <!-- Main Section End -->