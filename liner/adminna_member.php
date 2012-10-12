<div class="columns leading top">
    <? if($_GET['view']==""){?>
    <div class="grid_6 first">
        <table class="paginate sortable full">
            <thead>
                <tr>
                	<th>รหัสสมาชิก</th>
                    <th style="width:25%;">ชื่อ - นามสกุล</th>
                    <th>อีเมล</th>
                    <th>ผู้แนะนำ</th>
                    <th>วันที่สมัคร</th>
                    <th>อัฟเกรด</th>
                </tr>
            </thead>
            <tbody>
            	<? 
				$dcm="select system_member.*, system_reply.* from system_member left join system_reply on (system_member.sm_id=system_reply.sr_sm_id) where system_member.sm_level!='9'";
				/* Start Search */
				$name=$_POST['name'];
				$code=$_POST['code'];
				$upline=$_POST['upline'];
				$email=$_POST['email'];
				if($name!="" or $code!="" or $upline!="" or $email!=""){
					$name!=""?$dcm.=" and system_member.sm_name like '%$name%'":"";
					$code!=""?$dcm.=" and system_member.sm_code like '%$code%'":"";
					if($upline!=""){
						$uid=readname("sm_id","system_member","sm_name",$upline);
						$dcm.=" and system_reply.sr_target = '$uid'";
					}
					$email!=""?$dcm.=" and system_member.sm_email like '%$email%'":"";
				}
				/* End Search*/
				
				$jc=queryx2($dcm." order by system_member.sm_date_regist DESC"); 
				while($ftc=mysql_fetch_array($jc)){
					$tgk=countl3("select sli_id from system_liner where sli_sr_reply='".$ftc['sm_id']."' limit 1");
					if($tgk!=1){
				?>
                <tr>
                	<td><?=$ftc['sm_code'];?></td>
                    <td><a href="<?=$link;?>?page=member&view=<?=$ftc['sr_id'];?>" title="ดูข้อมูล"><?=$ftc['sm_name'];?></a></td>
                    <td><?=$ftc['sm_email'];?></td>
                    <td><?=readname('sm_name','system_member','sm_id',$ftc['sr_target']);?></td>
                    <td><?=datethai($ftc['sm_date_regist'],'day');?></td>
                    <td><a href="<?=$link;?>?page=request&casy=upgradevip&id=<?=$ftc['sr_id'];?>"><span class="upgrade">อัฟเกรดสมาชิก</span></a></td>
                </tr>
                <? }// End if
				}?>
            </tbody>
        </table>

    </div>
    
    <? }else{
$requireply=queryx1("select * from system_reply where sr_id='$_GET[view]'");
$target=$requireply['sr_target'];
$reply=$requireply['sr_sm_id'];

$jojo=queryx1("select * from system_member where sm_id='$reply'");
	?>
    <div class="grid_3 first">
    	<div class="widget">
        <header><h2>ข้อมูลสมาชิก</h2> </header>
        <section>
        <table class="no-style full">
            <tbody>
            	<tr>
                    <td><b>รหัสสมาชิก</b></td>
                    <td><?=$jojo['sm_code'];?></td>
                </tr>
                <tr>
                    <td><b>ชื่อ - นามสกุล</b></td>
                    <td><?=$jojo['sm_name'];?></td>
                </tr>
                <tr>
                    <td><b>สมัครเมื่อ</b></td>
                    <td><?=datethai($jojo['sm_date_regist'],'day');?></td>
                </tr>
                <tr>
                    <td><b>ลิงค์ผู้แนะนำ</b></td>
                    <td>http://<?=$www;?>/?<? echo readname("sa_www","system_account","sa_sm_id",$jojo['sm_id']);?></td>
                </tr>
                <tr>
                    <td><b>อีเมล์</b></td>
                    <td><?=$jojo['sm_email'];?></td>
                </tr>
                <tr>
                    <td><b>โทรศัพท์</b></td>
                    <td><?=$jojo['sm_htel'];?></td>
                </tr>
                <tr>
                    <td><b>โทรศัพท์มือถือ</b></td>
                    <td><?=$jojo['sm_mtel'];?></td>
                </tr>
                <tr>
                    <td><b>ที่อยู่</b></td>
                    <td><?=$jojo['sm_addr'].", ".$jojo['sm_postcode'].", ".readname("sd_name","system_district","sd_id",$jojo['sm_district']);?></td>
                </tr>
                <tr>
                    <td><b>ธนาคาร</b></td>
                    <td><?=$jojo['sm_bank_name'];?> สาขา <?=$jojo['sm_bank_area'];?></td>
                </tr>
                <tr>
                    <td><b>เลขที่บัญชี</b></td>
                    <td><?=$jojo['sm_bank_id'];?></td>
                </tr>
                <tr>
                    <td><b>ชื่อบัญชี</b></td>
                    <td><?=$jojo['sm_bank_acc'];?></td>
                </tr>
                <tr>
                    <td><b>ประเภทบัญชี</b></td>
                    <td><?=$jojo['sm_bank_type'];?></td>
                </tr>
            </tbody>
        </table>
        </section>
        </div>
    </div>
<?
$jeje=queryx1("select * from system_member where sm_id='$target'");
?>
	<div class="grid_3">
        <div class="widget">
        <header><h2>ข้อมูลผู้แนะนำ</h2></header>
            <section>
            <table class="no-style full">
                <tbody>
                    <tr>
                        <td><b>รหัสสมาชิก</b></td>
                        <td><?=$jeje['sm_code'];?></td>
                    </tr>
                    <tr>
                        <td><b>ชื่อ - นามสกุล</b></td>
                        <td><?=$jeje['sm_name'];?></td>
                    </tr>
                    <tr>
                        <td><b>สมัครเมื่อ</b></td>
                        <td><?=datethai($jeje['sm_date_regist'],'day');?></td>
                    </tr>
                    <tr>
                        <td><b>ลิงค์ผู้แนะนำ</b></td>
                        <td>http://<?=$www;?>/?<? echo readname("sa_www","system_account","sa_sm_id",$jeje['sm_id']);?></td>
                    </tr>
                    <tr>
                        <td><b>อีเมล์</b></td>
                        <td><?=$jeje['sm_email'];?></td>
                    </tr>
                    <tr>
                        <td><b>โทรศัพท์</b></td>
                        <td><?=$jeje['sm_htel'];?></td>
                    </tr>
                    <tr>
                        <td><b>โทรศัพท์มือถือ</b></td>
                        <td><?=$jeje['sm_mtel'];?></td>
                    </tr>
                    <tr>
                        <td><b>ที่อยู่</b></td>
                        <td><?=$jeje['sm_addr'].", ".$jeje['sm_postcode'].", ".readname("sd_name","system_district","sd_id",$jeje['sm_district']);?></td>
                    </tr>
                    <tr>
                        <td><b>ธนาคาร</b></td>
                        <td><?=$jeje['sm_bank_name'];?> สาขา <?=$jeje['sm_bank_area'];?></td>
                    </tr>
                    <tr>
                        <td><b>เลขที่บัญชี</b></td>
                        <td><?=$jeje['sm_bank_id'];?></td>
                    </tr>
                    <tr>
                        <td><b>ชื่อบัญชี</b></td>
                        <td><?=$jeje['sm_bank_acc'];?></td>
                    </tr>
                    <tr>
                        <td><b>ประเภทบัญชี</b></td>
                        <td><?=$jeje['sm_bank_type'];?></td>
                    </tr>
                </tbody>
            </table>
            </section>
    	</div>
    </div>
    <div class="clear"></div>
    <p align="center"><a href="#" onclick="javascript:window.back(-1);" class="button button-orange">กลีบไปดูสมาชิกทั้งหมด</a></p>
    <? }?>
</div>

<!-- Sidebar -->

<aside class="grid_2">

    <div id="rightmenu" class="panel">
    <header><h2>ค้นหาสมาชิก</h2></header>
	<form action="<?=$link;?>?page=member" class="form" name="search" id="search" method="post">
        <hr />
        <fieldset>
            <dl>
                <dt></dt><dd><label>ชื่อ - นามสกุล</label><input type="text" name="name" id="searchname" size="31" value="<?=$name;?>" /></dd>
                <dt></dt><dd><label>รหัสสมาชิก</label><input type="text" name="code" id="searchcode" size="31" value="<?=$code;?>" /></dd>
                <dt></dt><dd><label>ผู้แนะนำ</label><input type="text" name="upline" id="searcupline" size="31" value="<?=$upline;?>" /></dd>
                <dt></dt><dd><label>อีเมล์สมาชิก</label><input type="text" name="email" id="searchemail" size="31" value="<?=$email;?>" /></dd>
            </dl>    
        </fieldset>

        <hr />
        <button class="button button-green" type="submit">ค้นหา</button>
        <button class="button button-gray" type="reset">คืนค่า</button>
    </form>
    </div>

</aside>

<!-- Sidebar End -->