<div class="container_8 clearfix">
<!-- Main Section -->

    <section class="main-section grid_8">

        <div class="main-content grid_5 alpha">
            <header>
                <h2>
                    รายชื่อผู้สนใจในธุรกิจ
                </h2>
            </header>
            <section>
                <ul class="listing list-view">
                	<? 
					$pscx=mysql_query("select * from system_reply where sr_target='$smid' order by sr_id DESC");
					$numpro=mysql_num_rows($pscx);
					$row_per_page=20;
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
					
					$jc=queryx2("select * from system_reply where sr_target='$smid' order by sr_id DESC limit $start,$row_per_page"); 
					
					while($dd=mysql_fetch_array($jc)){
					$llc=queryx1("select * from system_member where sm_id='$dd[sr_sm_id]'");
					?>
                    <li class="contact">
                        <a class="more" href="view_reply_member.php?vvsmid=<?=$llc['sm_id'];?>">&raquo;</a>
                        <span class="timestamp"><?=date("d F Y",strtotime($llc['sm_date_regist']));?></span>
                        <a href="#">รหัสสมาชิก : <?=$llc['sm_code'];?></a>
                        <p>ชื่อ นามสกุล : <?=$llc['sm_name'];?> | Email : <?=$llc['sm_email'];?> | โทรศัพท์ : <?=$llc['sm_mtel'];?></p>
                        <div class="entry-meta">
                            ทีอยู่ : <?=$llc['sm_addr'].", ".$llc['sm_postcode'].", ".readname("sd_name","system_district","sd_id",$llc['sm_district']);?>
                        </div>
                    </li>
                    <? }?>
                </ul>
                <ul class="pagination clearfix">
				<? 
                    $first=$page_id-$rang;
                    $last=$page_id+$rang;
                    if($first<=1){$first=1;}
                    if($last>=$pages){$last=$pages;}
                    $pre=$page_id-1;
                    echo "<li><a href='index.php?step=replymember&page_id=1' class='button-blue'>&laquo;</a></li>";
                    echo "<li><a href='index.php?step=replymember&page_id=$pre' class='button-blue'>&lsaquo;</a></li>";
                    for($b=$first;$b<=$last;$b++){
                            if($b==$page_id){
                                echo "<li><a href='#' class='current button-blue'>".$b."</a></li>";
                            }else{
                                echo "<li><a href='index.php?step=replymember&page_id=$b'class='button-blue'>".$b."</a></li>";
                            }
                    }//END FOR
                    if($page_id<$pages){
                        $fev=$page_id+1;
                        echo "<li><a href='index.php?step=replymember&page_id=$fev' class='button-blue'>&rsaquo;</a></li>";
                        echo "<li><a href='index.php?step=replymember&page_id=$pages' class='button-blue'>&raquo;</a></li>";
                    }
                ?>
                </ul>
            </section>
        </div>

        <div class="preview-pane grid_3 omega">
            <div class="content">
                <h3>สถิติการสมัครสมาชิกภายใต้ธุรกิจของคุณ</h3>
                <?
				$ddf=mysql_query("select * from system_reply where sr_target='$smid'")or die(mysql_error());
				$allm=mysql_num_rows($ddf);
				?>
                <ul class="profile-info">
                    <li class="house"><?=$allm;?> คน<span>จำนวนสมาชิกทั้งหมด</span></li>
                </ul>
            </div>
            <div class="preview">
            </div>
        </div>

    </section>

<!-- Main Section End -->
</div>