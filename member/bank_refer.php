<? $smid=$_GET['smid'];?>
<script type="text/javascript">
	$(document).ready(function(){
		//Send bank refer
		$('form[name=bankrefer]').submit(function(){
		 $.post('module/bankrefer.php',{smid: $('[name=smid]').val(),
			datas: $('[name=datas]').val()},
			function(data){
			   if(data.success)
			   {
				  $('.regist-error').html(data.message);
			   }else{
				  $('.regist-error').html(data.message);
			   }
			},'json');
		 return false;
		 });
	});
</script>
<h3>แจ้งเปลี่ยนข้อมูลบัญชีธนาคาร</h3>

<form method="post" name="bankrefer" id="bankrefer" action="#">	
<div class="regist-error"><div class="message info"><img src="images/lightbulb_32.png" class="fl">โปรดทราบ กรุณาระบุรายละเอียด รายการ หรือ ข้อความให้มีความชัดเจนเพื่อที่เจ้าหน้าที่จะได้ตรวจสอบได้ง่ายขึ้น</div></div>
    <textarea required="required" name="datas" style="height: 150px; width: 97%;"></textarea>
    <input type="hidden" name="smid" value="<?=$smid;?>">
    <hr />
    <input type="submit" name="btnsubmit" value="ส่งคำร้อง" class="button button-orange">
    <input type="button" name="btnclose" value="ปิด" class="button button-gray close">
</form>