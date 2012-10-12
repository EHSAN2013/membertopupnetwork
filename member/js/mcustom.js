// JavaScript Document
$(document).ready(function(){
	//Update my website
	$('form[name=formupdateacc]').submit(function(){
	 $.post('module/update_acc.php',{
		sa_www: $('[name=sa_www]').val(),
		sa_title: $('[name=sa_title]').val(),
		sa_description: $('[name=sa_description]').val(),
		sa_search: $('[name=sa_search]').val(),
		sa_id: $('[name=sa_id]').val()},
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
	
	//Update myinfo
	$('form[name=formupdatemyinfo]').submit(function(){
	 $.post('module/update_info.php',{
		sm_email: $('[name=sm_email]').val(),
		sm_name: $('[name=sm_name]').val(),
		sm_sex: $('[name=sm_sex]').val(),
		sm_pid: $('[name=sm_pid]').val(),
		sm_addr: $('[name=sm_addr]').val(),
		sm_district: $('[name=sm_district]').val(),
		sm_postcode: $('[name=sm_postcode]').val(),
		sm_mtel: $('[name=sm_mtel]').val(),
		sm_id: $('[name=sm_id]').val()},
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
	
	//Send contact
	$('form[name=formcontact]').submit(function(){
	 $.post('module/sendcontact.php',{
		subject: $('[name=subject]').val(),
		detail: $('[name=detail]').val(),
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
	
	var triggers = $(".modalInput").overlay({

		// some mask tweaks suitable for modal dialogs
		mask: {
			color: '#000000',
			loadSpeed: 3000,
			opacity: 0.7,
		},

		closeOnClick: false
	});
});