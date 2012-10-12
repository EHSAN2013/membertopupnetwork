<script type="text/javascript">
	var chart;
	var dchart;
	$(document).ready(function() {
							   
		chart = new Highcharts.Chart({
			chart: {
				renderTo: 'pvpayall',
				defaultSeriesType: 'column'
			},
			title: {
				text: 'กราฟแสดงรายการ จ่าย/ถอน รายได้'
			},
			subtitle: {
				text: 'ประจำปี: <?=$y=date("Y");?>'
			},
			xAxis: {
				categories: [
					'ม.ค.', 
					'ก.พ.', 
					'มี.ค.', 
					'เม.ย.', 
					'พ.ค.', 
					'มิ.ย.', 
					'ก.ค.', 
					'ส.ค.', 
					'ก.ย.', 
					'ต.ค.', 
					'พ.ย.', 
					'ธ.ค.'
				]
			},
			yAxis: {
				min: 0,
				title: {
					text: 'รายการ'
				}
			},
			legend: {
				layout: 'vertical',
				backgroundColor: '#FFFFFF',
				align: 'left',
				verticalAlign: 'top',
				x: 80,
				y: 60,
				floating: true,
				shadow: true
			},
			tooltip: {
				formatter: function() {
					return ''+
						this.x +': '+ this.y +' รายการ';
				}
			},
			plotOptions: {
				column: {
					pointPadding: 0.2,
					borderWidth: 0
				}
			},
				series: [{
				name: 'รายการจ่าย',
				data: [<? for($pi=1;$pi<=12;$pi++){$pil=queryx1("select count(spi_id) as cprt from system_point where MONTH(spi_upd)='$pi' and YEAR(spi_upd)='$y'"); echo $pi!=12?$pil['cprt'].", ":$pil['cprt'];}?>]
		
			}, {
				name: 'รายการถอน',
				data: [<? for($pr=1;$pr<=12;$pr++){$prl=queryx1("select count(spr_id) as cplt from system_point_dra where MONTH(spr_date)='$pr' and YEAR(spr_date)='$y'"); echo $pr!=12?$prl['cplt'].", ":$prl['cplt'];}?>]
		
			}]
		});
		
		dchart = new Highcharts.Chart({
			chart: {
				renderTo: 'pvdrall',
				defaultSeriesType: 'column'
			},
			title: {
				text: 'กราฟแสดงจำนวน รายได้ จ่าย/ถอน'
			},
			subtitle: {
				text: 'ประจำปี: <?=$y=date("Y");?>'
			},
			xAxis: {
				categories: [
					'ม.ค.', 
					'ก.พ.', 
					'มี.ค.', 
					'เม.ย.', 
					'พ.ค.', 
					'มิ.ย.', 
					'ก.ค.', 
					'ส.ค.', 
					'ก.ย.', 
					'ต.ค.', 
					'พ.ย.', 
					'ธ.ค.'
				]
			},
			yAxis: {
				min: 0,
				title: {
					text: 'รายได้'
				}
			},
			legend: {
				layout: 'vertical',
				backgroundColor: '#FFFFFF',
				align: 'left',
				verticalAlign: 'top',
				x: 100,
				y: 60,
				floating: true,
				shadow: true
			},
			tooltip: {
				formatter: function() {
					return ''+
						this.x +': '+ this.y +' บาท';
				}
			},
			plotOptions: {
				column: {
					pointPadding: 0.2,
					borderWidth: 0
				}
			},
				series: [{
				name: 'จำนวน รายได้ จ่าย',
				color: '#95561E',
				data: [<? for($ps=1;$ps<=12;$ps++){$pirl=queryx1("select sum(spi_pt) as spt from system_point where MONTH(spi_upd)='$ps' and YEAR(spi_upd)='$y'"); if($ps!=12){echo $pirl['spt']==""?0:$pirl['spt'];echo ", ";}else{echo $pirl['spt']==""?0:$pirl['spt'];}}?>]
		
			}, {
				name: 'จำนวน รายได้ ถอน',
				color: '#2E5043',
				data: [<? for($pt=1;$pt<=12;$pt++){$prtl=queryx1("select sum(spr_pt) as spd from system_point_dra where MONTH(spr_date)='$pt' and YEAR(spr_date)='$y'");  if($pt!=12){echo $prtl['spd']==""?0:$prtl['spd'];echo ", ";}else{echo $prtl['spd']==""?0:$prtl['spd'];}}?>]
		
			}]
		});
		
	});
</script>
<div class="columns leading">

    <div class="grid_4 first">
    	<div class="widget">
        <header><h2>รายงานสมาชิก / สายงาน</h2></header>
        <section>
        <table class="no-style full">
            <tbody>
                <tr>
                    <td>รายงานสมาชิกทั้งหมด</td>
                    <td class="ar"><a href="report_member.php?mcase=1&name=รายงานสมาชิกทั้งหมด" class="download-doc" target="_blank">ดาวน์โหลดเอกสาร</a></td>
                </tr>
                <tr>
                    <td>รายงานสมาชิกในระบบสายงานทั้งหมด</td>
                    <td class="ar"><a href="report_member.php?mcase=2&name=รายงานสมาชิกในระบบสายงานทั้งหมด" class="download-doc" target="_blank">ดาวน์โหลดเอกสาร</a></td>
                </tr>
                <tr>
                    <td>รายงานสมาชิกวีไอพี</td>
                    <td class="ar"><a href="report_member.php?mcase=2&mrule=1&name=รายงานสมาชิกวีไอพี" class="download-doc" target="_blank">ดาวน์โหลดเอกสาร</a></td>
                </tr>
                <tr>
                    <td>รายงานสมาชิกปกติ</td>
                    <td class="ar"><a href="report_member.php?mcase=2&mrule=2&name=รายงานสมาชิกปกติ" class="download-doc" target="_blank">ดาวน์โหลดเอกสาร</a></td>
                </tr>
                <tr>
                    <td>รายงานสมาชิกเป็นวีไอพีใหม่</td>
                    <td class="ar"><a href="report_member.php?mcase=2&mrule=3&name=รายงานสมาชิกเป็นวีไอพีใหม่" class="download-doc" target="_blank">ดาวน์โหลดเอกสาร</a></td>
                </tr>
            </tbody>
        </table>
        </section>
        </div>
    </div>
    
    <div class="grid_4">
    	<div class="widget">
        	<header><h2>ค้นหาและดาวน์โหลด สมาชิกในสายงาน</h2></header>
            <form action="report_member.php?mcase=2&mrule=4&name=รายงานสมาชิกในระบบสายงาน" name="export" method="post" class="form">
            	<section>
                	<fieldset>
                        <dl>
                            <dt></dt><dd><label>ค้นหาจากวันที่ *</label><input type="date" name="datestart" required="required" /></dd>
                            <dt></dt><dd><label>ถึงวันที่ *</label><input type="date" name="datend" required="required" /></dd>
                        </dl>    
                    </fieldset>
                    <hr />
                    <p align="center">
                    	<button class="button button-blue" type="submit">ดาว์นโหลด</button>
                        <button class="button button-gray" type="reset">เคลียร์ข้อมูล</button>
                    </p>
                </section>
            </form>
        </div>
    </div>
    <script>
	$(":date").dateinput({format: 'yyyy-mm-dd'});
	</script>
    
    <div class="clear"></div>
    
    <div class="grid_6 first">
    	<div class="panel">
        <header><h2>ดาว์นโหลดข้อมูลสมาชิกรายบุคคล</h2></header>
        <table class="paginate sortable full">
            <thead>
                <tr>
                	<th>รหัสสมาชิก</th>
                    <th style="width:20%;">ชื่อ - นามสกุล</th>
                    <th>ข้อมูลสายงาน</th>
                    <th>ข้อมูลรายได้</th>
                    <th>ข้อมูลการต่ออายุ</th>
                    <th>รายงานแจ้งชำระเงิน</th>
                    <th>รายงานแจ้งถอนเงิน</th>
                </tr>
            </thead>
            <tbody>
            	<? 
				$pps="select system_member.*, system_liner.* from system_liner left join system_member on system_member.sm_id=system_liner.sli_sr_reply where system_member.sm_level!='9'";
				
				/* Start Search */
				$name=$_POST['name'];
				$code=$_POST['code'];
				$upline=$_POST['upline'];
				$realdates=date("Y-m-d",strtotime($_POST['datestart']));
				$realdatee=date("Y-m-d",strtotime($_POST['dateend']));
				
				if($name!="" or $code!="" or $upline!="" or $datestart!=""){
					$name!=""?$pps.=" and system_member.sm_name like '%$name%'":"";
					$code!=""?$pps.=" and system_member.sm_code like '%$code%'":"";
					if($upline!=""){
						$uid=readname("sm_id","system_member","sm_name",$upline);
						$pps.=" and system_liner.sli_sr_target = '$uid'";
					}
					if($realdates!="1970-01-01" and $realdatee!="1970-01-01"){
						$pps.=" and system_liner.sli_upd BETWEEN '$realdates' and '$realdatee'";
					}
				}
				/* End Search*/
				//echo $pps;
				
				$jc=queryx2($pps." order by system_liner.sli_upd DESC"); 
				if(countl3($pps)>0){
				while($ftc=mysql_fetch_array($jc)){
				?>
                <tr>
                	<td><?=$ftc['sm_code'];?></td>
                    <td><?=$ftc['sm_name'];?></td>
                    <td align="center"><a href="report_member_detail.php?casy=checkliner&id=<?=$ftc['sli_id'];?>&name=รายงานข้อมูลสายงานสมาชิก" target="_blank"><img src="images/icon/report_link.png" /> ดาวน์โหลด</a></td>
                    <td align="center"><a href="report_member_detail.php?casy=pvmanage&id=<?=$ftc['sli_id'];?>&name=รายงานข้อมูลรายได้สมาชิก" target="_blank"><img src="images/icon/report_key.png" /> ดาวน์โหลด</a></td>
                    <td align="center"><a href="report_member_detail.php?casy=viprenew&id=<?=$ftc['sli_id'];?>&name=รายงานข้อมูลการต่ออายุสมาชิก" target="_blank"><img src="images/icon/report_user.png" /> ดาวน์โหลด</a></td>
                    <td align="center"><a href="report_member_detail.php?casy=payrefer&id=<?=$ftc['sli_id'];?>&name=รายงานแจ้งชำระเงินสมาชิก" target="_blank"><img src="images/icon/report_picture.png" /> ดาวน์โหลด</a></td>
                    <td align="center"><a href="report_member_detail.php?casy=payrecieve&id=<?=$ftc['sli_id'];?>&name=รายงานแจ้งถอนเงินสมาชิก" target="_blank"><img src="images/icon/report_word.png" /> ดาวน์โหลด</a></td>
                </tr>
                <? }
				}else{?>
                <tr><td colspan="7" align="center">ไม่พบสานงานที่ค้นหา กรุณาค้นหาใหม่อีกครัง</td></tr>
                <? }?>
            </tbody>
        </table>
        </div>
    </div>
    
    <div class="grid_2">
        <div class="panel">
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
    </div>
    
    <div class="clear"></div>
    
    <div class="gird_8 first top" id="pvpayall"></div>
    
    <div class="gird_8 first top" id="pvdrall"></div>
    
</div>