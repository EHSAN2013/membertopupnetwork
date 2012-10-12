<section class="main-section grid_7">

    <div class="main-content grid_4 alpha">
        <header>
            <div class="view-switcher">
            <h2>จัดการข้อมูลสมาชิก <a href="#">&darr;</a></h2>
                <ul>
                    <li><a href="admin_panel.php">แสดงทั้งหมด</a></li>
                    <li><a href="admin_panel.php?h=1">ที่สมัครมาวันนี้</a></li>
                    <li><a href="admin_panel.php?h=2">ศูนย์ขยายงาน</a></li>
                    <li><a href="admin_panel.php?h=3">สมาชิกธรรมดา</a></li>
                </ul>
            </div>
        </header>
        <section>
            <ul class="listing list-view">
                	<? $h=$_GET['h'];
					if($_GET['h']==""){
						$qscf="select * from system_member where sm_id!='$smid'";
					}else if($_GET['h']=="1"){
						$qscf="select * from system_member where sm_id!='$smid' and sm_date_regist = '".date("Y-m-d")."'";
					}else if($_GET['h']=="2"){
                        $qscf="select * from system_member where sm_id!='$smid' and sm_type = 2";
                    }else if($_GET['h']=="3"){
                        $qscf="select * from system_member where sm_id!='$smid' and sm_type = 1";
                    }
					
					$pscx=mysql_query($qscf);
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
					$jc=mysql_query($qscf." order by sm_date_regist DESC limit $start, $row_per_page")or die(mysql_error());
					while($llc=mysql_fetch_array($jc)){
					$mjk=countl3("select sli_id from system_liner where sli_sr_reply='".$llc['sm_id']."' limit 1");
					$mjk==1?$yoi="ชำระเงินแล้ว":$yoi="รอการชำระเงิน";
					?>
                    <li class="contact">
                        <a class="more" href="view_reply_member.php?vvsmid=<?=$llc['sm_id'];?>&bb=1">&raquo;</a>
                        <span class="timestamp"><?=date("d F Y",strtotime($llc['sm_date_regist']));?></span>
                        <a href="admin_panel.php?page=fullview&mid=<?=$llc['sm_id'];?>" title="ดูข้อมูลแบบละเอียด">รหัสสมาชิก : <?=$llc['sm_code'];?></a>
                        <p>ชื่อ นามสกุล : <?=$llc['sm_name'];?> | Email : <?=$llc['sm_email'];?><br />โทรศัพท์ : <?=$llc['sm_mtel'];?></p>
                        <div class="entry-meta">
                            ทีอยู่ : <?=$llc['sm_addr'].", ".$llc['sm_postcode'].", ".readname("sd_name","system_district","sd_id",$llc['sm_district']);?><br>
                            <span style="color:#F47C20;"><?php  echo ($llc['sm_type']==2)?"ศูนย์ขยายงาน":""; ?></span>
                            <?php if($llc['sm_level']==1){?>
                            <a href="admin_panel.php?page=confirmmem&gt=<?=$llc['sm_level'];?>&fid=<?=$llc['sm_id'];?>" class="button button-green fr" style="margin-top:-10px;" onClick="javascript:return confirm('ต้องการระงับการใช้งานผู้ใช้ท่านนี้');">สถานะ: <?=$yoi;?></a>
							<?php }elseif($llc['sm_level']==0){?>
                            <a href="admin_panel.php?page=confirmmem&gt=<?=$llc['sm_level'];?>&fid=<?=$llc['sm_id'];?>" class="button button-orange fr" style="margin-top:-10px;" onClick="javascript:return confirm('ต้องการยืนยันการชำระเงินผู้ใช้ท่านนี้');">สถานะ : <?=$yoi;?></a>
							<?php }else{?>
                            <a href="admin_panel.php?page=confirmmem&gt=<?=$llc['sm_level'];?>&fid=<?=$llc['sm_id'];?>" class="button button-red fr" style="margin-top:-10px;" onClick="javascript:return confirm('ต้องปลดการระงับการใช้งานผู้ใช้ท่านนี้');">สถานะ: ติดโทษแบน</a><? }?>
                        </div>
                        <div class="clear"></div>
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
                    echo "<li><a href='admin_panel.php?page_id=1&h=$h' class='button-blue'>&laquo;</a></li>";
                    echo "<li><a href='admin_panel.php?page_id=$pre&h=$h' class='button-blue'>&lsaquo;</a></li>";
                    for($b=$first;$b<=$last;$b++){
                            if($b==$page_id){
                                echo "<li><a href='#' class='current button-blue'>".$b."</a></li>";
                            }else{
                                echo "<li><a href='admin_panel.php?page_id=$b&h=$h'class='button-blue'>".$b."</a></li>";
                            }
                    }//END FOR
                    if($page_id<$pages){
                        $fev=$page_id+1;
                        echo "<li><a href='admin_panel.php?page_id=$fev&h=$h' class='button-blue'>&rsaquo;</a></li>";
                        echo "<li><a href='admin_panel.php?page_id=$pages&h=$h' class='button-blue'>&raquo;</a></li>";
                    }
                ?>
                </ul>
        </section>
    </div>
    
    <div class="preview-pane grid_3 omega">
        <div class="content">
            <div class="message warning">
                <h3>สถิติข้อมูลสมาชิก</h3>
                <ul class="profile-info">
                    <li class="calendar-day">สมัครวันนี้ : <?=countl3("select sm_id from system_member where sm_date_regist='".date("Y-m-d")."'");?><span>คน</span></li>
                    <li class="calendar-day">สมัครเดือนนี้ : <?=countl3("select sm_id from system_member WHERE (DAY(sm_date_regist) BETWEEN 1 AND 30) AND MONTH(sm_date_regist)='".date("m")."' AND YEAR(sm_date_regist) = '".date("Y")."' and sm_id!='$smid'");?><span>คน</span></li>
                    <li class="user">สมาชิกทั้งหมด : <?=countl3("select sm_id from system_member where sm_id!='$smid'");?><span>คน</span></li>
                    <li class="house">ศูนย์ขยายงาน : <?=countl3("select sm_id from system_member where sm_id!='$smid' and sm_type = 2");?><span>คน</span></li>
                </ul>
            </div>
        </div>
        <div class="preview">
        </div>
    </div>

</section>