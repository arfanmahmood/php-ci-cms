// JavaScript Document
$(document).ready(function(){
	
	$('#frmSignIn').submit(function(){
		
		var isEmpty = true;
		
		if($('#userName').val()==''){
			
			$('#userNameDiv').addClass('error');
			
			$('#userNameDiv > .help-inline').css('display', 'block');
			
			isEmpty = false;
			
		}
		
		if($('#userPass').val()==''){
			
			$('#userPassDiv').addClass('error');
			
			$('#userPassDiv > .help-inline').css('display', 'block');
			
			isEmpty = false;
			
		}
		
		if(isEmpty){

			return true;
		
		}else{
		
			return false;	
			
		}
		
	});

});