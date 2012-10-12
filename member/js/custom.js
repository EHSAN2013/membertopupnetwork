// JavaScript Document
$(document).ready(function(){
	
	//Check adminupdate
	$('form[name=formeditmydata]').submit(function(){
	 $.post('../config/adminupdate.php',{
		sm_name: $('[name=sm_name]').val(),
		sm_email: $('[name=sm_email]').val(),
		sm_htel: $('[name=sm_htel]').val(),
		sm_mtel: $('[name=sm_mtel]').val(),
		sm_addr: $('[name=sm_addr]').val(),
		sm_id: $('[name=sm_id]').val(),
		sm_district: $('[name=sm_district]').val()},
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
	
	//Check changepassword
	$('form[name=changepassword]').submit(function(){
	 $.post('../config/changepassword.php',{
		passwordnew: $('[name=passwordnew]').val(),
		passwordconf: $('[name=passwordconf]').val(),
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
	
	var triggers = $(".modalInput").overlay({

        // some mask tweaks suitable for modal dialogs
        mask: {
            color: '#000000',
            loadSpeed: 200,
            opacity: 0.7,
        },

        closeOnClick: false
    });
	
	//Update member bank
	$('form[name=formbankrefer]').submit(function(){
	 $.post('./module/admin_bankupdate.php',{
		sm_bank_name: $('[name=sm_bank_name]').val(),
		sm_bank_area: $('[name=sm_bank_area]').val(),
		sm_bank_acc: $('[name=sm_bank_acc]').val(),
		sm_bank_id: $('[name=sm_bank_id]').val(),
		sm_bank_type: $('[name=sm_bank_type]').val(),
		msid: $('[name=msid]').val()},
		function(data){
		   if(data.success)
		   {
			  $('.showbb').html(data.message);
		   }else{
			  $('.showbb').html(data.message);
		   }
		},'json');
	 return false;
	 });
});