<div class="columns leading">
    <div class="grid_8 first">
        <div class="grid_3 first">
        <div class="widget">
            <header><h2><img src="images/icon/coins.png" /> รายได้ ของคุณ</h2></header>
            <section>
            <table class="no-style full">
            <tbody>
                <tr>
                    <td>รายได้ ของคุณ</td>
                    <td></td>
                    <td class="ar"><? $jql=queryx1("select sum(spi_pt) as pv_total from system_point where sli_id='$smid'"); echo $pvl=$jql['pv_total'];?></td>
                    <td class="ar">pv</td>
                </tr>
                <tr>
                    <td>รายได้ ทีถอนออกไป</td>
                    <td class="ar"><? $jqr=queryx1("select sum(spr_pt) as pr_total from system_point_dra where sli_id='$smid' and spr_ck='1'"); $pvr=$jqr['pr_total']; echo $pvr==""?"0":"-". $pvr;?> pv</td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td>รายได้ คงเหลือ สุทธิ</td>
                    <td></td>
                    <td class="ar"><?=$ptl=($pvl-$pvr);?></td>
                    <td class="ar">pv</td>
                </tr>
                <tr>
                    <td><b>จำนวน รายได้ ของคุณที่ถอนได้คือ</b></td>
                    <td></td>
                    <td class="ar"><b><?=$ptl;?></b></td>
                    <td class="ar"><b>pv</b></td>
                </tr>
            </tbody>
        </table>
        </section>
        </div>
        </div>
        
        <div class="grid_5">
            <div class="widget">
                <header><h2><img src="images/icon/calculator.png"> ถอน รายได้</h2></header>
                <section>
                	<div class="showresult">
                	<div class="preloader" align="center"><img src="images/ajax-loader.gif"> <cite>Processing...</cite></div>
                    <div class="erroresult"></div>
                	<? if($ptl>=$lpel){?>
                    <form action="" method="post" class="form" name="pvrecieve" id="pvrecieve">
                    	<input type="hidden" name="sli_id" value="<?=$smid;?>">
                        <input type="hidden" name="action" value="1">
                    	<fieldset>
                              <dl>
                                  <dt></dt><dd><label>จำนวน รายได้ ที่ถอน</label> <input type="range" name="pvx" min="300" max="<?=$ptl;?>" step="100" value="<?=$ptl;?>" readonly="readonly" /></dd>
                              </dl>    
                          </fieldset>
                          <hr />
                          <div class="message info grid_3 first"><b>โปรดทราบ:</b> เมื่อทำการถอน รายได้ แล้วจะไม่สามรถถอน รายได้ ได้อีกภายในวันนี้</div>
                          <div align="right">
                          <button class="button button-orange" type="submit" name="btnsend">ยืนยัน</button> 
                          <button class="button button-gray" type="reset" name="btnclear">เคลียร์</button>
                          </div>
                          <div class="clear"></div>
                    </form>
                    <? }else{?>
                    <div class="message warning" align="center">ขออภัย ยอด รายได้ ของคุณมีไม่พอที่จะถอน รายได้ ออกจากระบบได้ค่ะ</div>
                    <? }?>
                    </div>
                </section>
            </div>
        </div>
		<script type="text/javascript">$(":range").rangeinput();</script>
        
        <div class="clearfix"></div>
        <?
		if($pvr!=0 or $pvl!=0){
        $pere_pvr=($pvr*100)/$pvl;
		$rpvr=round($pere_pvr,0);
		$pere_pto=($pto*100)/$pvl;
		$rpto=round($pere_pto,0);
		}
		?>
        <div class="grid_8 first">
        	<!-- 2. Add the JavaScript to initialize the chart on document ready -->
			<script type="text/javascript">
            
                var chart;
                $(document).ready(function() {
                    chart = new Highcharts.Chart({
                        chart: {
                            renderTo: 'pvchart',
                            plotBackgroundColor: null,
                            plotBorderWidth: null,
                            plotShadow: false
                        },
                        title: {
                            text: 'อัตราส่วน รายได้ ของคุณ'
                        },
                        tooltip: {
                            formatter: function() {
                                return '<b>'+ this.point.name +'</b>: '+ this.percentage +' %';
                            }
                        },
                        plotOptions: {
                            pie: {
                                allowPointSelect: true,
                                cursor: 'pointer',
                                dataLabels: {
                                    enabled: true,
                                    color: '#000000',
                                    connectorColor: '#000000',
                                    formatter: function() {
                                        return '<b>'+ this.point.name +'</b>: '+ this.percentage +' %';
                                    }
                                },
								showInLegend: true
                            }
                        },
                        series: [{
                            type: 'pie',
                            name: 'Average รายได้',
                            data: [
                                ['รายได้ คงเหลือ',   <?=$rpto;?>],
                                ['รายได้ ถอน',  <?=$rpvr;?>]
                            ]
                        }]
                    });
                });
                    
            </script>
            <div class="grid_4 first" id="pvchart"></div>
            
            <div class="grid_4">
            	<h5>รายการแจ้งถอนเงินล่าสุด</h5>
            	<table class="datatable paginate sortable full">
                    <thead>
                        <tr>
                        	<th>ที่</th>
                            <th>วันที่แจ้ง</th>
                            <th>ยอด รายได้</th>
                            <th>สถานะ</th>
                            <th>ผลตอบกลับ</th>
                        </tr>
                    </thead>
                    <tbody>
                         <? $no=0;
                         $jc=queryx2("select * from system_point_dra where sli_id = '$smid' order by spr_date DESC"); $cn=mysql_num_rows($jc); if($cn>0){ while($llc=mysql_fetch_array($jc)){$no++;
						 if($llc['spr_ck']==0){$cd="<span class='grayx'>รอการยืนยัน</span>";}elseif($llc['spr_ck']==1){$cd="<span class='greenx'>ยีนยันเรียบร้อย</span>";}elseif($llc['spr_ck']==2){$cd="<span class='redx'>ปฏิเสธ</span>";}
						 ?>
                        <tr>
                            <td align="center"><?=$no;?></td>
                            <td><?=datethai($llc['spr_date'],'dtime');?></td>
                            <td align="right"><?=$llc['spr_pt'];?> บาท</td>
                            <td align="center"><?=$cd;?></td>
                            <td><?=$llc['spr_comment'];?></td>
                        </tr>
                        <? }}else{?><tr><td align="center" colspan="6">ไม่พบรายการแจ้งถอนเงินตามที่ค้นหา หรือ ยังไม่มีรายการแจ้งถอนเงินในขณะนี้</td></tr><? }?>
                    </tbody>
                </table>
            </div>
        </div>
        
	</div>
</div>
