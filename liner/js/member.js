$(document).ready(function(){
	$('.preloader').hide();		
	$('.preloader')
	.ajaxStart(function(){
		$(this).show();
	}).ajaxStop(function(){
		$(this).hide();
	});
	
	$('form[name=pvrecieve]').submit(function(){
	 $.post('memberna_process.php',{
		sli_id: $('[name=sli_id]').val(),
		action: $('[name=action]').val(),
		pvx: $('[name=pvx]').val()},
		function(data){
		   if(data.success)
		   {
			  $('.showresult').html(data.message);
		   }else{
			  $('.erroresult').html(data.message);
		   }
		},'json');
	 return false;
	 });
	
	$("#linertree").treeview({
		collapsed: true,
		animated: "medium",
		control:"#sidetreecontrol",
		persist: "location"
	});
	
	$('form[name=memrenew1]').submit(function(){
	 $.post('memberna_process.php',{
		plane: $('[name=plane1]').val(),
		reply: $('[name=reply1]').val(),
		action: $('[name=action]').val()},
		function(data){
		   if(data.success)
		   {
			  $('.showresult').html(data.message);
		   }else{
			  $('.erroresult').html(data.message);
		   }
		},'json');
	 return false;
	 });
	
	$('form[name=memrenew2]').submit(function(){
	 $.post('memberna_process.php',{
		plane: $('[name=plane2]').val(),
		reply: $('[name=reply2]').val(),
		action: $('[name=action]').val()},
		function(data){
		   if(data.success)
		   {
			  $('.showresult').html(data.message);
		   }else{
			  $('.erroresult').html(data.message);
		   }
		},'json');
	 return false;
	 });
	
	$('form[name=memrenew3]').submit(function(){
	 $.post('memberna_process.php',{
		plane: $('[name=plane3]').val(),
		reply: $('[name=reply3]').val(),
		action: $('[name=action]').val()},
		function(data){
		   if(data.success)
		   {
			  $('.showresult').html(data.message);
		   }else{
			  $('.erroresult').html(data.message);
		   }
		},'json');
	 return false;
	 });
	
	$('form[name=memrenew4]').submit(function(){
	 $.post('memberna_process.php',{
		plane: $('[name=plane4]').val(),
		reply: $('[name=reply4]').val(),
		action: $('[name=action]').val()},
		function(data){
		   if(data.success)
		   {
			  $('.showresult').html(data.message);
		   }else{
			  $('.erroresult').html(data.message);
		   }
		},'json');
	 return false;
	 });
	
});