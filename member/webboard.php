<!-- kindeditor.js -->
<script type="text/javascript" carset="utf-8" src="./kindeditor/kindeditor.js"></script>
<!-- langauge.js -->
<script type="text/javascript" carset="utf-8" src="./kindeditor/lang/en.js"></script>
<script>
	KindEditor.ready(function(K) {
		K.create('#sw_detail', {themeType : 'default',langType : 'en',
		uploadJson  :  './kindeditor/php/upload_json.php'
		});
	});
</script>
<div class="container_8 clearfix">
<!-- Main Section -->

    <section class="main-section grid_8">

        <div class="main-content grid_8 alpha">
            <header>
                <div class="view-switcher">
                    <h2>เว็บบอร์ด <a href="#">&darr;</a></h2>
                    <ul>
                        <li><a href="index.php?step=webboard">ดูทุกกระทู้</a></li>
                        <li><a href="index.php?step=webboard&xlc=1">คนดูเยอะสุด</a></li>
                        <li class="separator"></li>
                        <li>เลือดูเฉพาะ...</li>
                        <li class="separator"></li>
                        <li><a href="index.php?step=webboard&xlc=2">วันนี้</a></li>
                        <li><a href="index.php?step=webboard&xlc=3">เดือนนี้</a></li>
                        <li><a href="index.php?step=webboard&xlc=4">ปีนี้</a></li>
                    </ul>
                </div>
            </header>
            <section>
                <ul id="contacts" class="listing list-view clearfix">
                <? $xlc=$_GET['xlc'];
				$quertyuo="select * from system_webboard where sw_level='1'";
				if($xlc==1){
					$quertyuo.=" order by sw_view DESC";
				}elseif($xlc==2){
					$quertyuo.=" and DAY(sw_date)='".date("d")."' order by sw_date DESC";
				}elseif($xlc==3){
					$quertyuo.=" (DAY(sw_date) BETWEEN 1 AND 30) AND MONTH(sw_date)='".date("m")."' AND YEAR(sw_date) = '".date("Y")."' order by sw_date DESC";
				}elseif($xlc==4){
					$quertyuo.=" and YEAR(sw_date)='".date("Y")."' order by sw_date DESC";
				}
				 	
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
                        <span class="timestamp">วันที่โพสต์ <?=date("d F Y",strtotime($fetw['sw_date']));?></span>
                        <a href="index.php?step=webboardview&wid=<?=$fetw['sw_id'];?>" class="name"><?=$fetw['sw_title'];?></a>
                        <div class="entry-meta">
                            <b>โดย :</b> <?=readname("sm_name","system_member","sm_id",$fetw['sw_sm_id']);?> | <b>ดู : </b><?=$fetw['sw_view'];?> | <b>ตอบ :</b> <?=countl3("select sw_id from system_webboard where sw_target='".$fetw['sw_id']."'");?>
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
                    echo "<li><a href='index.php?step=webboard&page_id=1&xlc=$xlc' class='button-blue'>&laquo;</a></li>";
                    echo "<li><a href='index.php?step=webboard&page_id=$pre&xlc=$xlc' class='button-blue'>&lsaquo;</a></li>";
                    for($b=$first;$b<=$last;$b++){
                            if($b==$page_id){
                                echo "<li><a href='#' class='current button-blue'>".$b."</a></li>";
                            }else{
                                echo "<li><a href='index.php?step=webboard&page_id=$b&xlc=$xlc'class='button-blue'>".$b."</a></li>";
                            }
                    }//END FOR
                    if($page_id<$pages){
                        $fev=$page_id+1;
                        echo "<li><a href='index.php?step=webboard&page_id=$fev&xlc=$xlc' class='button-blue'>&rsaquo;</a></li>";
                        echo "<li><a href='index.php?step=webboard&page_id=$pages&xlc=$xlc' class='button-blue'>&raquo;</a></li>";
                    }
                ?>
                </ul>
            </section>
            
            <section>
            <div class="regist-error"></div>
            <? if(isset($_POST['btneditc'])){
			$sw_title=$_POST['sw_title'];
			$sw_detail=$_POST['sw_detail'];
			
			mysql_query("insert into system_webboard value('','','$smid','$sw_title','$sw_detail','".date("Y-m-d H:i:s")."','0','1','".$_SERVER['REMOTE_ADDR']."');")or die(mysql_error());
			$jidp=mysql_insert_id();
			mysql_close();
			
			echo "<script>window.location='index.php?step=webboardview&wid=$jidp';</script>";
			
			}?>
            <form action="" method="post" name="formboard" id="formboard" enctype="multipart/form-data">
            <fieldset><legend>ตั้งกระทู้ไหม่</legend>
                <p><label class="grid_1"><em>*</em> หัวข้อกระทู้</label> <input type="text" maxlength="400" name="sw_title" id="sw_title" size="108" required="required" /></p>
                <p><label class="grid_1"><em>*</em> รายละะอียด</label> <textarea rows="10" cols="105" name="sw_detail" id="sw_detail"></textarea></p>
                <p align="center">
                    <input type="submit" name="btneditc" value="ตั้งกระทู้" class="button button-orange" />
                </p>
            </fieldset>
            </form>
            </section>
        </div>

    </section>

    <!-- Main Section End -->
</div>