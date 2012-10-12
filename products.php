<? if($_GET['st']=='complete'){ ?>
<div id="lightbox-panel" class="roundend">
    <h2 align="center">ขอบคุณค่ะ</h2>
    <p align="center" class="ordercomplete">เราได้รับรายการสั่งซื้อสินค้าของท่านเรียบร้อยแล้ว<br />
      โปรดทำการชำระเงินค่าสินค้า และ แจ้งการโอนเงิน หรือ ใบเสร็จการชำระเงินของท่านแนบมาด้วย<br />
      เพื่อทางเราจะทำการตรวจสอบ แล้วทางเราจะรีบทำการจัดส่งสินค้าให้กับลูกค้าทันที ขอบคุณค่ะ</p>
    <p align="center"><img src="../images/logo.png" /></p>
  </div>
  <!-- /lightbox-panel -->
  
  <div id="lightbox"></div>
  <!-- /lightbox -->
  </p>
  <!-- java redirect to homepage -->
  <script type="text/javascript">
	setTimeout("location.href = 'index.php?page=products';",7000);
  </script>
<? } ?>
<script language="javascript">
var HttPRequest = false;

function doCallAjax(ID) {
  HttPRequest = false;
  if (window.XMLHttpRequest) { // Mozilla, Safari,...
	 HttPRequest = new XMLHttpRequest();
	 if (HttPRequest.overrideMimeType) {
		HttPRequest.overrideMimeType('text/html');
	 }
  } else if (window.ActiveXObject) { // IE
	 try {
		HttPRequest = new ActiveXObject("Msxml2.XMLHTTP");
	 } catch (e) {
		try {
		   HttPRequest = new ActiveXObject("Microsoft.XMLHTTP");
		} catch (e) {}
	 }
  } 
  
  if (!HttPRequest) {
	 alert('Cannot create XMLHTTP instance');
	 return false;
  }

  var url = 'query_products.php';
  var pmeters = "tID="+ID;

	HttPRequest.open('POST',url,true);

	HttPRequest.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	HttPRequest.setRequestHeader("Content-length", pmeters.length);
	HttPRequest.setRequestHeader("Connection", "close");
	HttPRequest.send(pmeters);
	
	//*** Loading (Client -> Server) ***//
	document.getElementById("imgLoading").style.display = '';
	document.getElementById("mySpan").style.display = 'none';
	
	HttPRequest.onreadystatechange = function()
	{

		 if(HttPRequest.readyState == 3)  // Loading Request
		  {
			//*** Loading ***//
			document.getElementById("imgLoading").style.display = '';
			document.getElementById("mySpan").style.display = 'none';
		  }

		 if(HttPRequest.readyState == 4) // Return Request
		  {			  
			document.getElementById("imgLoading").style.display = 'none';
			document.getElementById("mySpan").style.display = '';
			document.getElementById('mySpan').innerHTML = HttPRequest.responseText;
		  }				
	}

}
</script>
<div id="detial_page">
  <h3 class="title_page">ผลิตภัณฑ์ทั้งหมด</h3>
  <div class="select_cat">
    <form action="#" method="post" name="box">
      <select name="productcat" onChange="javascript:doCallAjax(this.value);">
        <option value="">เลือกหมวดหมู่ผลิตภัณฑ์</option>
        <? $qapd=queryx2("select * from system_category order by sc_code asc"); while($qpd=mysql_fetch_array($qapd)){ ?>
        <option value="<?=$qpd['sc_id'];?>"><?=$qpd['sc_code'];?> : <?=$qpd['sc_name'];?></option>
        <? }?>
      </select>
    </form>
  </div>
  <div id="imgLoading" style="display='none';"><img src="images/loader.gif"></div>
  <span id="mySpan"></span>
</div>
<div class="clear"></div>
