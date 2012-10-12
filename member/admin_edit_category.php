<? include('../config/connect.php');
$scid=$_GET['scid'];
$jojo=queryx1("select * from system_category where sc_id='$scid' limit 1");
?>
<script type="text/javascript">
	$(document).ready(function(){
		//Update category
		$('form[name=fromeditc]').submit(function(){
		 $.post('module/edit_category.php',{
			sc_code: $('[name=sc_codes]').val(),
			sc_name: $('[name=sc_names]').val(),
			sc_id: $('[name=sc_id]').val()},
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
<h3>แก้ไขหมวดสินค้า</h3>
<hr />
<div class="regist-error"></div>
<p>
<form action="#" method="post" name="fromeditc">
<input type="hidden" name="sc_id" value="<?=$scid;?>" />
    <p><input type="text" size="10" name="sc_codes" id="sc_codes" maxlength="10" required="required" value="<?=$jojo['sc_code'];?>"/></p>
	<p><input type="text" name="sc_names" id="sc_names" size="32" required="required" value="<?=$jojo['sc_name'];?>"/></p>
    <hr />
    <input type="submit" name="btneditc" value="บันทึก" class="button button-orange" />
    <input type="reset" name="btnreset" value="คืนค่า" class="button button-blue" />
    <input type="button" value="ปิด" class="button button-gray close" />
</form>
</p>
