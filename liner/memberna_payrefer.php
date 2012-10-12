<div class="columns leading">
    <div class="grid_8 first top">
    <?
	$_POST['plane']!=""?$sf_title="ชำระเงินค่าต่ออายุสมาชิกวีไอพีระยะเวลา ".$_POST['plane']." เดือน":"";
	$_POST['money']!=""?$sf_money=$_POST['money']:"";
	
	if(isset($_POST['btneditc'])){
		$sm_id=$_POST['sm_id'];
		$sf_title=$_POST['sf_title'];
		$sf_bank=$_POST['sf_bank'];
		$sf_money=$_POST['sf_money'];
		$sf_money_t=$_POST['sf_money_t'];
		$sf_date_submit=$_POST['sf_date_submit'];
		$sf_time=$_POST['sf_time'];
		$sf_note=$_POST['sf_note'];
		
		if(!is_numeric($sf_money) or !is_numeric($sf_money_t)){
			$massage="<div class='message error'><h3>ผิดพลาด</h3>จำนวนเงินต้องเป็นตัวเลขเท่านั้น</div>";
		}else{
			$moneyx=$sf_money.".".$sf_money_t;
			$dir_dest = '../file/payslipe/';
			$handle = new Upload($_FILES['sf_slipe']);
			if ($handle->uploaded) {
				$handle->Process($dir_dest);
				if ($handle->processed) {
					$blogimg=$handle->file_dst_name;
				}
				$handle-> Clean();
			}
			mysql_query("insert into system_payrefer value('','$sf_title','$sf_bank','$sf_money','$sf_date_submit','$sf_time','$blogimg','$sf_note','".date("Y-m-d H:i:s")."','$sm_id','0')")or die(mysql_error());
			$massage="<div class='message success'><h3>สำเร็จ!</h3>ส่งรายการแจ้งการชำระเงินเรียบร้อยแล้ว โปรดรอการตรวจสอบจากเจ้าหน้าที่</div>";
		}
	}
	echo $massage!=""?$massage:"";
	?>
            
    <div class="message info">
        <div style="width:32%; margin-right:1%; float:left;"><img src="http://www.24payturn.com/images/logo_kbank.jpg" style="margin-right:10px; float:left;" />
        ธ.กสิกรไทย สาขา ช้างเผือก เชียงใหม่<br />
        ชื่อบัญชี นายพิน  เจริญคุณ<br />
        เลขที่บัญชี 279-214576-5
        </div>
        <!--<div style="width:32%; margin-right:1%; float:left;"><img src="../../logo_scb.jpg" style="margin-right:10px; float:left;" />
        ธ.ไทยพาณิชย์ สาขา จอหอ<br />
        ชื่อบัญชี ดำรงชัย เอื้อกิจเจริญกุล<br />
        เลขที่บัญชี 710-23-1774-5
        </div>-->
        <div class="clear"></div>
    </div>
    <div style="width:100%; margin:20px 0; text-align:justify;"><img src="../member/images/lightbulb_32.png" class="fl" />หากคุณต้องการสั่งซื้อสินค้ากับทางเว็บ โปรดติดต่อสั่งสินค้าที่เบอร์ โทร <b><?php echo $maintel; ?></b> หรือ ทางอีเมลล์ <a href="#"><?php echo $mainemail; ?></a> เมื่อทางเว็บตรวจสอบว่ามีสินค้า (เนื่องจากสินค้าของเรา เป็นสินค้าไอทีที่มีการผันผวนของราคา เราจึงต้องทำการเช็คสต็อคสินค้าและราคาก่อนเพื่อประโยชน์สูงสุดของสมาชิก) จากนั้นก็จะทำการติดต่อกลับจากนั้นท่านจึงทำการโอนเงิน เมื่อโอนเงินเสร็จให้แจ้งไปยังเมนูรายการชำระเงิน และแจ้งที่อยู่ที่จัดส่งสินค้าตรงข้อความเพิ่มเติม เมื่อ เจ้าหน้าที่ตรวจสอบเสร็จก็จะทำการจัดส่งสินค้าให้โดยเร็วที่สุด
    </div>
    <div class="clear"></div>
    <?
	if($_GET['viewid']==""){?>
        <div class="tabbed-pane">
            <ul class="tabs">
                <li><a href="#">แบบฟอร์มแจ้งชำระเงิน</a></li>
                <li><a href="#">รายการแจ้งชำระเงิน</a></li>
            </ul>

            <!-- tab "panes" -->
            <div class="panes">
                <div>
                	<!-- start form send refer -->
					<h3>แบบฟอร์มแจ้งการชำระเงิน</h3>
					<form action="" method="post" name="formpayerfer" id="formpayerfer" enctype="multipart/form-data">
					<input type="hidden" name="sm_id" id="sm_id" value="<?=$smid;?>" />
						<p><label class="grid_2"><em>*</em> หัวข้อแจ้งการชำระเงิน</label> <input type="text" maxlength="500" name="sf_title" id="sf_title" size="70" required="required" placeholder="เช่น ค่าสมัครสมาชิก ค่าต่ออายุสมาชิก หรือ ค่าสั่งซื้อสินค้า" value="<?=$sf_title;?>" /></p>
						 <p><label class="grid_2"><em>*</em> โอนไปยังธนาคาร</label> <input type="radio" name="sf_bank" value=" ธ.ไทยพาณิชย์ สาขา ฮาร์เบอร์มอลล์" checked="checked" /> ธ.ไทยพาณิชย์ สาขา ฮาร์เบอร์มอลล์ <input type="radio" name="sf_bank" value="ธ.กสิกรไทย สาขา แหลมฉบัง" /> ธ.กสิกรไทย สาขา แหลมฉบัง</p>
						 <p><label class="grid_2"><em>*</em> ยอดเงินที่โอน</label> <input type="text" maxlength="10" size="29" name="sf_money" id="sf_money" required="required" placeholder="จำนวนเงิน ตัวเลขเท่านั้น" value="<?=$sf_money;?>" /> . <input type="text" maxlength="2" size="5" name="sf_money_t" id="sf_money_t" required="required" placeholder="ทศนิยม" value="<?=$sf_money_t;?>" /></p>
						<p><label class="grid_2"><em>*</em> วันที่โอน</label> <input type="date" name="sf_date_submit" id="sf_date_submit" size="40" required="required" value="<?=$sf_date_submit;?>" /></p>
						<p><label class="grid_2"><em>*</em> เวลาที่โอน</label> <input type="text" name="sf_time" id="sf_time" size="40" required="required" placeholder="ระบุแบบ 24 ช่วโมง เช่น 13:00 เป็นต้น" value="<?=$sf_time;?>" /></p>
						<p><label class="grid_2">รูปสลิปใบโอน</label> <input type="file" name="sf_slipe" id="sf_slipe" size="40" /></p>
						<p><label class="grid_2">ข้อความเพิ่มเติม</label> <textarea rows="3" cols="70" name="sf_note" id="sf_note"><?=$sf_note;?></textarea></p>
						<hr />
						<p align="center">
							<input type="submit" name="btneditc" value="แจ้งการชำระเงิน" class="button button-orange" />
							<input type="reset" name="btnreset" value="คืนค่า" class="button button-blue" />
						</p>
					</form>
                    <!-- end form send refer -->
                </div>
                <div>
                	<!-- start datatable -->
                    <table class="paginate sortable full">
                        <thead>
                            <tr>
                                <th>วันที่แจ้ง</th>
                                <th>หัวข้อการแจ้งชำระเงิน</th>
                                <th>ยอดเงิน</th>
                                <th>สถานะ</th>
                            </tr>
                        </thead>
                        <tbody>
                             <? $jc=queryx2("select * from system_payrefer where sf_sm_id='$smid' order by sf_date_send DESC"); while($llc=mysql_fetch_array($jc)){?>
                            <tr>
                                <td align="center"><?=datethai($llc['sf_date_send'],'dtime');?></td>
                                <td><a href="<?=$link;?>?page=refer&viewid=<?=$llc['sf_id'];?>" title="ดูรายละเอียด"><?=$llc['sf_title'];?></a></td>
                                <td align="right"><?=$llc['sf_money'];?> บาท</td>
                                <td align="center"><? if($llc['sf_status']==1){?><span class="greenx">ยืนยันแล้ว</span><? }else{?><span class="grayx">รอการตรวจสอบ</span><? }?></td>
                            </tr>
                            <? }?>
                        </tbody>
                    </table>
                    <!-- end dtatable -->
                </div>
            </div>
        </div>
		<? }else{ $viewid=$_GET['viewid'];
		$jc=queryx1("select * from system_payrefer where sf_id='$viewid' limit 1");
		?>
		<h3>รายละเอียดแจ้งการชำระเงิน : <?=date("l, d F Y (H:i)",strtotime($jc['sf_date_send']));?></h3>
		<hr>
		<div class="grid_4 first">
		<p>
		<b>รายละเอียด</b><hr></p>
		<p><label class="grid_2">หัวข้อแจ้งการชำระเงิน</label> <?=$jc['sf_title'];?></p>
		<p><label class="grid_2">โอนไปยังธนาคาร</label> <?=$jc['sf_bank'];?></p>
		<p><label class="grid_2">ยอดเงินที่โอน</label> <?=$jc['sf_money'];?></p>
		<p><label class="grid_2">วันที่โอน</label> <?=$jc['sf_date_submit'];?></p>
		<p><label class="grid_2">เวลาที่โอน</label> <?=$jc['sf_time'];?></p>
		<p><label class="grid_2">ข้อความเพิ่มเติม</label> <?=$jc['sf_note'];?></p>
	   
		<p><label class="grid_2">สถานะ</label> <? if($jc['sf_status']==1){?><span class="greenx">ยืนยันแล้ว</span><? }else{?><span class="grayx">รอการตรวจสอบ</span><? }?></p>
		</div>
		<div class="grid_4">
		<p><b>รูปสลิปใบโอน</b><hr><img src="../file/payslipe/<?=$jc['sf_slipe'];?>" width="220"></p>
		</div>
		<div class="clear"></div>
		<hr />
		<p align="center">
			<a href="memberna.php?page=refer" class="button button-orange">กลับ</a>
		</p>
        <? }?>
    </div>
</div>