<div class="columns leading top">
	<div class="grid_6 first">
         <table class="datatable paginate sortable full">
            <thead>
                <tr>
                    <th>วันที่แจ้ง</th>
                    <th>รหัสสมาชิก</th>
                    <th>ชื่อ - นามสกุล</th>
                    <th>ยอดเงิน</th>
                    <th>สถานะ</th>
                    <th>คำสั่ง</th>
                </tr>
            </thead>
            <tbody>
                 <? 
				 $jhs="select system_point_dra.*, system_member.sm_code, system_member.sm_name from system_point_dra left join system_member on system_point_dra.sli_id= system_member.sm_id";
				 
				 $name=$_POST['name'];
				 $code=$_POST['code'];
				 $date=$_POST['date'];
				 $min=$_POST['min'];
				 $max=$_POST['max'];
				 $sf_st=$_POST['sf_st'];
				 
				 if($name!="" or $code!="" or $date!="" or $min!="" or $max!="" or $sf_st!=""){$jhs.=" where system_point_dra.spr_date > '1970-01-01'";}
				 
				 $name!=""?$jhs.=" and system_member.sm_name='$name'":"";
				 $code!=""?$jhs.=" and system_member.sm_code='$code'":"";
				 $date!=""?$jhs.=" and system_point_dra.spr_date like '%$date%'":"";
				 $min!=""?$jhs.=" and system_point_dra.spr_pt  between '$min' and '$max'":"";
				 $sf_st!=""?$jhs.=" and system_point_dra.spr_ck='$sf_st'":"";
				 
				 //echo $jhs;
				 
				 $jc=queryx2($jhs." order by system_point_dra.spr_date DESC"); $cn=mysql_num_rows($jc); if($cn>0){ while($llc=mysql_fetch_array($jc)){
					
					if($llc['spr_ck']==0){$bl="<span class='grayx'>รอการยืนยัน</span>";}elseif($llc['spr_ck']==1){$bl="<span class='greenx'>ยืนยันเรียบร้อย</span>";}elseif($llc['spr_ck']==2){$bl="<span class='redx'>ปฏิเสธคำขอ</span>";}
				
				?>
                <tr>
                    <td align="center"><?=datethai($llc['spr_date'],'dtime');?></td>
                    <td><?=$llc['sm_code'];?></td>
                    <td><?=$llc['sm_name'];?></td>
                    <td align="right"><?=$llc['spr_pt'];?> บาท</td>
                    <td align="center"><?=$bl;?></td>
                    <td align="center"><a href="<?=$link;?>?page=request&casy=payrecieve&id=<?=$llc['spr_id'];?>"><img src="images/icon/049.png" /> ดูรายละเอียด</a></td>
                </tr>
                <? }}else{?><tr><td align="center" colspan="6">ไม่พบรายการแจ้งถอนเงินตามที่ค้นหา หรือ ยังไม่มีรายการแจ้งถอนเงินในขณะนี้</td></tr><? }?>
            </tbody>
        </table>
    </div>
</div>

<!-- Sidebar -->

<aside class="grid_2">
    <div id="rightmenu" class="panel">
    <header><h2>ค้นหารายการแจ้งถอนเงิน</h2></header>
    <form action="" class="form" name="search" id="search" method="post">
        <hr />
        <fieldset>
            <dl>
                <dt></dt><dd><label>ชื่อ - นามสกุล</label><input type="text" name="name" id="searchname" size="31" value="<?=$name;?>" /></dd>
                <dt></dt><dd><label>รหัสสมาชิก</label><input type="text" name="code" id="searchcode" size="31" value="<?=$code;?>" /></dd>
                <dt></dt><dd><label>วันที่แจ้ง</label><input type="date" name="date"size="31" value="<?=$date;?>" max="0" /></dd>
                <dt></dt><dd><label>จำนวนเงิน ตั้งแต่</label><input type="range" name="min" min="0" max="10000" step="500" size="31" value="<?=$min;?>" /></dd>
                <dt></dt><dd><label>จนถึง</label><input type="range" name="max" min="10000" max="50000" step="1000" size="31" value="<?=$max;?>" /></dd>
                <dt></dt><dd><label>สถานะ</label><select name="sf_st"><option value="">ทั้งหมด</option><option value="1">ยืนยันแล้ว</option><option value="0">รอการยืนยัน</option><option value="2">ปฏิเสธคำขอ</option></select></dd>
            </dl>    
        </fieldset>

        <hr />
        <button class="button button-green" type="submit">ค้นหา</button>
        <button class="button button-gray" type="reset">คืนค่า</button>
    </form>
    </div>
    <script>
	$(":range").rangeinput();
	$(":date").dateinput({format: 'yyyy-mm-dd'});
	</script>
</aside>

