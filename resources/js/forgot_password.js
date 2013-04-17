// JavaScript Document
$(document).ready(function(){
	
	$('#frmForgotPassword').submit(function(){
		
		var isEmpty = true;
		
		if($('#userEmail').val()==''){
			
			$('#userEmailAddressDiv').addClass('error');
			
			$('#userEmailAddressDiv > .help-inline').css('display', 'block');
			
			isEmpty = false;
			
		}
		
		if(isEmpty){

			return true;
		
		}else{
		
			return false;	
			
		}
		
	});

});