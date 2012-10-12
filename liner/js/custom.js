$(document).ready(function(){
	
	//Check adminupdate
	//Confirmsend 7 emailsdays
	$('.preloader').hide();		
	$('.preloader')
		.ajaxStart(function(){
			$(this).show();
		}).ajaxStop(function(){
			$(this).hide();
		});
	
	$('form[name=formmline]').submit(function(){
	 $.post('adminna_process.php',{
		direct: $('[name=direct]').val(),
		upline: $('[name=upline]').val(),
		downline: $('[name=downline]').val(),
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
	
	$('form[name=fromrenewspe]').submit(function(){
	 $.post('adminna_process.php',{
		hsmid: $('[name=hsmid]').val(),
		mid: $('[name=mid]').val(),
		ddate: $('[name=ddate]').val(),
		action: $('[name=action]').val()},
		function(data){
		   if(data.success)
		   {
			  $('.showresultx').html(data.message);
		   }else{
			  $('.erroresultx').html(data.message);
		   }
		},'json');
	 return false;
	 });
	
	$('form[name=addpv]').submit(function(){
	 $.post('adminna_process.php',{
		mcode: $('[name=mcode]').val(),
		pvx: $('[name=pvx]').val(),
		notic: $('[name=notic]').val(),
		action: $('[name=action]').val()},
		function(data){
		   if(data.success)
		   {
			  $('.showresult').html(data.message);
		   }else{
			  $('.showresult').html(data.message);
		   }
		},'json');
	 return false;
	 });
	
	$('form[name=addspecialpv]').submit(function(){
	 $.post('adminna_process.php',{
		mcode: $('[name=mcode]').val(),
		pvx: $('[name=pvx]').val(),
		notic: $('[name=notic]').val(),
		pvp: $('[name=pvp]').val(),
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
	
	$('form[name=breakpvm]').submit(function(){
	 $.post('adminna_process.php',{
		dcode: $('[name=dcode]').val(),
		dpv: $('[name=dpv]').val(),
		dnotic: $('[name=dnotic]').val(),
		action: $('[name=action2]').val()},
		function(data){
		   if(data.success)
		   {
			  $('.show-result').html(data.message);
		   }else{
			  $('.erro-result').html(data.message);
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
	
	$("#quicksearch").autocomplete("module/search_name.php", {
		width: 250,
		autoFill: true,
		selectFirst: false
	});
	
	$("#searchname").autocomplete("module/search_name.php", {
		width: 200,
		autoFill: true,
		selectFirst: false
	});
	
	$("#searcupline").autocomplete("module/search_name.php", {
		width: 200,
		autoFill: true,
		selectFirst: false
	})
	
	$(".searchliner").autocomplete("module/search_liner.php", {
		width: 200,
		autoFill: true,
		selectFirst: false
	})
	
	$("#searchcode").autocomplete("module/search_code.php", {
		width: 200,
		autoFill: true,
		selectFirst: false
	});
	
	$(".searmcode").autocomplete("module/search_code.php", {
		width: 200,
		autoFill: true,
		selectFirst: false
	});
	
	$("#searchemail").autocomplete("module/search_email.php", {
		width: 200,
		autoFill: true,
		selectFirst: false
	});
	
	//$('.datatable').dataTable({"bJQueryUI": true,"sPaginationType": "full_numbers"});
	
	$('form[name=formrenew1]').submit(function(){
	 $.post('adminna_process.php',{
		plane: $('[name=plane1]').val(),
		reply: $('[name=reply1]').val(),
		action: $('[name=action1]').val()},
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
	
	$('form[name=formrenew2]').submit(function(){
	 $.post('adminna_process.php',{
		plane: $('[name=plane2]').val(),
		reply: $('[name=reply2]').val(),
		action: $('[name=action2]').val()},
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
	
	$('form[name=formrenew3]').submit(function(){
	 $.post('adminna_process.php',{
		plane: $('[name=plane3]').val(),
		reply: $('[name=reply3]').val(),
		action: $('[name=action3]').val()},
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
	
	$('form[name=formrenew4]').submit(function(){
	 $.post('adminna_process.php',{
		plane: $('[name=plane4]').val(),
		reply: $('[name=reply4]').val(),
		action: $('[name=action4]').val()},
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