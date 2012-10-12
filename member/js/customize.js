// JavaScript Document
$(document).ready(function(){
	
	//Check login
	$('form[name=form]').submit(function(){
	 $.post('../config/checklogin.php',{username: $('[name=username]').val(),
		password: $('[name=password]').val()},
		function(data){
		   if(data.success)
		   {
			  $('#regist-error').html(data.message);
		   }else{
			  $('#regist-error').html(data.message);
		   }
		},'json');
	 return false;
	 });
	
	//Check login
	$('form[name=formforgotpass]').submit(function(){
	 $.post('../config/forgotpass.php',{
		email: $('[name=email]').val()},
		function(data){
		   if(data.success)
		   {
			  $('#cferror').html(data.message);
		   }else{
			  $('#cferror').html(data.message);
		   }
		},'json');
	 return false;
	 });
	
	var triggers = $(".modalInput").overlay({

        // some mask tweaks suitable for modal dialogs
        mask: {
            color: '#000',
            loadSpeed: 200,
            opacity: 0.7,
        },

        closeOnClick: false
    });
	
	/* User Input Prompt Modal Box */
    $("#prompt form").submit(function(e) {

        // close the overlay
        triggers.eq(2).overlay().close();

        // get user input
        var input = $("input", this).val();

        // do something with the answer
        if (input) triggers.eq(2).html(input);

        // do not submit the form
        return e.preventDefault();
    });
});