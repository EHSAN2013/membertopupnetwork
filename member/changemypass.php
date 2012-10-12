<? $smid=$_GET['smid'];?>
<script type="text/javascript">
	$(document).ready(function(){
		//Send bank refer
		$('form[name=changemypass]').submit(function(){
		 $.post('module/changemypass.php',{
			newuser: $('[name=newuser]').val(),
			newpass: $('[name=newpass]').val(),
			conpass: $('[name=conpass]').val(),
			smid: $('[name=smid]').val()},
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
<h3>เปลี่ยนรหัสผ่าน</h3>

<form method="post" name="changemypass" id="changemypass" action="#">	
<div class="regist-error"></div>
	<p><input type="text" id="newuser" class="full" value="" name="newuser" required="required" placeholder="ชื่อผู้ใช้งานใหม่" maxlength="20" /></p>
    <p><input type="password" id="newpass" class="full" value="" name="newpass" required="required" placeholder="รหัสผ่านใหม่" maxlength="20" /></p>
    <p><input type="password" id="conpass" class="full" value="" name="conpass" required="required" placeholder="ยืนยันรหัสผ่านใหม่" /></p>
    <input type="hidden" name="smid" value="<?=$smid;?>">
    <hr />
    <input type="submit" name="btnsubmit" value="บันทึก" class="button button-orange">
    <input type="button" name="btnclose" value="ปิด" class="button button-gray close">
</form>