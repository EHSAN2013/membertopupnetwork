<!-- Block Tag
<div class="columns leading" style="margin-bottom:-15px;">
	
    <div class="grid_6 first">
        <div class="preloader"><img src="images/ajax-loader.gif" /></div>
        <div class="showresult top">
        <div class="erroresult"></div>
        <form action="#" method="post" enctype="multipart/form-data" name="addspecialpv" id="addspecialpv" class="form panel">
        <input type="hidden" name="action" value="7" />
        <header><h4>เพิ่ม PV โบนัสสมาชิกจากการซื้อสินค้า</h4></header>
        <hr />
              <fieldset>
                  <dl>
                      <dt></dt><dd><label>รหัสสมาชิก</label><input type="text" name="mcode" class="searmcode" required="required" /></dd>
                      <dt></dt><dd><label>จำนวน PV โบนัส</label><input type="range" name="pvx" min="1" max="500000" value="500" /></dd>
                      <dt></dt><dd><label>เปอร์เซนต์การจ่ายลูกทีม (%)</label><input type="range" name="pvp" min="0" max="100" value="5" /></dd>
                      <dt></dt><dd><label>คำอธิบาย / เพิ่มเติม</label><textarea name="notic" rows="1" cols="63"></textarea></dd>
                  </dl>    
              </fieldset>
              <br />
              <div class="message info"><b>โปรดทราบ</b> ระบบ จะทำการหักเปอร์เชนต์การจ่ายอัติโนมัติจาก PV โบันส ให้กับลูกทีมของรหัสสมาชิกที่คุณกรอกลงไป</div>
              <button class="button button-orange" type="submit" name="btnsend" onclick="javascript:return confirm('ยืนยันการจ่าย PV');">ยืนยัน</button>
              <button class="button button-gray" type="reset" name="btnclear">เครียร์ค่าเริ่มต้น</button>
      </form>
      </div>
    </div>
    
    <div class="grid_2">
        <div class="preloader"><img src="images/ajax-loader.gif" /></div>
        <div class="show-result top">
        <div class="erro-result"></div>
        <form action="#" method="post" enctype="multipart/form-data" name="breakpvm" id="breakpvm" class="form panel">
        <input type="hidden" name="action2" value="8" />
        <header><h4>ถอน PV สมาชิก</h4></header>
        <hr />
              <fieldset>
                  <dl>
                      <dt></dt><dd><label>รหัสสมาชิก</label><input type="text" name="dcode" class="searmcode" required="required" size="30" /></dd>
                      <dt></dt><dd><label>จำนวน PV ถอน</label><input type="range" name="dpv" min="1" max="30000" value="1000" /></dd>
                      <dt></dt><dd><label>คำอธิบาย / เพิ่มเติม</label><textarea name="dnotic" rows="1" cols="25" required="required"></textarea></dd>
                  </dl>    
              </fieldset>
			  <br />
              <button class="button button-blue" type="submit" name="btndsend" onclick="javascript:return confirm('ยืนยันการถอน PV');">ยืนยัน</button>
              <button class="button button-gray" type="reset" name="btndclear">เครียร์</button>
      </form>
      </div>
    </div>
    
    <script type="text/javascript">$(":range").rangeinput();</script>

</div>

-->

<div class="columns leading top">
    
    <div class="grid_8 first">
        <table class="paginate sortable full bordered">
      <thead>
        <tr>
          <th width="80">รหัสสมาชิก</th>
          <th>ชื่อ - นามสกุล</th>
          <th width="80">สถานะสมาชิก</th>
          <th width="120">รายได้สะสมปัจจุบัน</th>
          <th>รอบตัดยอด รายได้ ล่าสุด</th>
          <th width="80">เครื่องมือ</th>
        </tr>
      </thead>
      <tbody>
        <? $pps="select system_member.sm_name, system_member.sm_code, system_liner.sli_sr_reply, system_liner.sli_id, system_liner.sli_level from system_liner left join system_member on(system_liner.sli_sr_reply=system_member.sm_id)"; 
		  
		  /* Start Search */
		  $name=$_POST['name'];
		  $code=$_POST['code'];

		  $name!=""?$pps.=" and system_member.sm_name like '%$name%'":"";
		  $code!=""?$pps.=" and system_member.sm_code like '%$code%'":"";
		  /* End Search*/
		  
		  //echo $pps;
		  $jc=queryx2($pps." order by sm_code ASC"); 
		  while($ftc=mysql_fetch_array($jc)){
			  $un_pv=queryx1("select sum(spi_pt) as unpv from system_point where sli_id='".$ftc['sli_sr_reply']."' and spi_cut='0'");
			  $opv=queryx1("select system_bill.sbl_id, system_bill.sbl_date, system_bill_list.stl_pv from system_bill_list left join system_bill on system_bill_list.sbl_id=system_bill.sbl_id where system_bill_list.sli_sr_reply='".$ftc['sli_sr_reply']."' order by system_bill.sbl_id DESC limit 1");
		  ?>
        <tr>
          <td align="center"><?=$ftc['sm_code'];?></td>
          <td><?=$ftc['sm_name'];?></td>
          <td>
		  	<? if($ftc['sli_level']==1){?>
            <span class="uservip">ปกติ</span>
            <? }else{?>
            <span class="usernormal">หมดอายุ</span>
            <? }?>
          </td>
          <td align="right"><?=number_format($un_pv['unpv']);?> บาท</td>
          <td><? if($opv['sbl_id']!=""){echo "ครั้งที่ : ".$opv['sbl_id']." / วันที่ : ".datethai($opv['sbl_date'],'day')." / คะแนนได้รับ :".number_format($opv['stl_pv'])." บาท";}else{echo "-";}?> </td>
          <td><a href="<?=$link;?>?page=request&casy=pvmanage&id=<?=$ftc['sli_id'];?>"><span class="userview">เช็ครายได้</span></a></td>
        </tr>
        <? }?>
      </tbody>
    </table>

    </div>
</div>

<!-- Sidebar 

<aside class="grid_2">

    <div id="rightmenu" class="panel">
    <header><h2>ค้นหาสมาชิก</h2></header>
	<form action="" class="form" name="search" id="search" method="post">
        <hr />
        <fieldset>
            <dl>
                <dt></dt><dd><label>ชื่อ - นามสกุล</label><input type="text" name="name" id="searchname" size="31" value="<?=$name;?>" /></dd>
                <dt></dt><dd><label>รหัสสมาชิก</label><input type="text" name="code" id="searchcode" size="31" value="<?=$code;?>" /></dd>
            </dl>    
        </fieldset>

        <hr />
        <button class="button button-green" type="submit">ค้นหา</button>
        <button class="button button-gray" type="reset">คืนค่า</button>
    </form>
    </div>

</aside>-->