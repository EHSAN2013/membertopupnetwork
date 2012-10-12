<? $xd=date("Y-m-d H:i:s");
$requireply=queryx1("select * from system_liner where sli_sr_reply='$smid'");
$reply=$requireply['sli_sr_reply'];
$dend=round(DateDiff($xd,$requireply['sli_expire']));
$jojo=queryx1("select * from system_member where sm_id='$reply'");		
?>
<div class="columns leading">
    
    <div class="grid_8 first top">
    <div class="grid_4 first">
    	<div class="panel">
        <header><h2><img src="images/icon/081.png" /> สถิติการรักษายอดสมาชิก</h2></header>
        <hr />
            <section>
            <table class="no-style full">
                <tbody>
                <tr>
                    <td>จำนวนการรักษายอด</td>
                    <td class="ar"><?=$ccl=countl3("select srn_id from system_renew where sli_id='$reply'");?> ครั้ง</td>
                </tr>
                <tr>
                    <td>รักษายอดครั้งล่าสุด</td>
                    <td class="ar"><?=datethai($requireply['sli_renew'],'dtime');?></td>
                </tr>
                <tr>
                    <td>แผนการรักษายอดล่าสุด</td>
                    <td class="ar"><?=viptimeshow($requireply['sli_plane']);?></td>
                </tr>
                <tr>
                    <td>วันหมดอายุ</td>
                    <td class="ar"><?=datethai($requireply['sli_expire'],'dtime');?></td>
                </tr>
                <tr>
                    <td>วันคงเหลือ</td>
                    <td class="ar"><?=$dend;?> วัน</td>
                </tr>
                </tbody>
            </table>
            </section>
    	</div>
        
        <div class="widget">
        	<header><h2><img src="images/icon/025.png"> จำนวนครั้งการรักษายอดสมาชิก</h2></header>
            <section>
            	<?
                $pl1=countl3("select srn_id from system_renew where sli_id='$reply' and srn_plane='1'");
				$pl3=countl3("select srn_id from system_renew where sli_id='$reply' and srn_plane='3'");
				$pl6=countl3("select srn_id from system_renew where sli_id='$reply' and srn_plane='6'");
				$pl12=countl3("select srn_id from system_renew where sli_id='$reply' and srn_plane='12'");
				?>
            	<table class="no-style full">
                <tbody>
                <tr>
                    <td>รักษายอดสมาชิก</td>
                    <td class="ar"><?=$pl1;?> ครั้ง</td>
                </tr>
                </tbody>
            </table>
            </section>
        </div>
        
    </div>    
    
    <div class="<?=$ccl!=0?"grid_4":"grid_5";?>">
    	<div class="panel">
    	<header><h2><img src="images/icon/187.png" /> รายการรักษายอดสมาชิก</h2></header>
        <table class="paginate sortable full">
            <thead>
                <tr>
                    <th>รายการที่</th>
                    <th>แผนการรักษายอด</th>
                    <th>วันที่ต่ออายุ</th>
                </tr>
            </thead>
            <tbody>
                <? $pi1=queryx2("select * from system_renew where sli_id='$reply' order by srn_upd DESC"); $pin=0;
                while($ftc=mysql_fetch_array($pi1)){$pin++;
                ?>
                <tr>
                    <td align="center"><?=$pin;?></td>
                    <td><?=viptimeshow($ftc['srn_plane']);?></td>
                    <td><?=datethai($ftc['srn_upd'],'dtime');?></td>
                </tr>
                <? }?>
            </tbody>
        </table>
        </div>
    </div>
    
    </div>
    <div class="columns leading">
       <hr />
       <h3>เลือกแผนการรักษายอดุสมาชิก</h3>
       <div class="showresult grid_8">
       <div class="grid pricing-table column grid_8 first">
         <article>
           <header>
               <h1>Standard</h1>
           </header>
           <footer>
             <p style="font-size:16px;"><!--<strong>บาท</strong> เป็นสมาชิก 1 เดือน-->รักษาคุณสมบัติ</p>
             <form action="<?=$link;?>?page=refer" method="post" name="formrenew1" id="formrenew1">
             <input type="hidden" name="plane" value="1" />
             <input type="hidden" name="money" value="<?=$pmv;?>" />
             <input type="submit" name="btnok" value="แจ้งการชำระเงินค่ารักษายอด" class="button button-blue" onclick="javascript:return confirm('ต้องการรักษายอดสมาชิก');" />
             </form>
           </footer>
         </article>
       </div>
       <div class="preloader" align="center"><img src="images/ajax-loader.gif" /></div>
       <div class="erroresult"></div>
       </div>
    </div>
    <div class="clear"></div>