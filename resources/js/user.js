// JavaScript Document
$(document).ready(function(){
	
	$('#frmUser').submit(function(){
		
		var isEmpty = true;
		
		if($('#inputUserName').val()==''){
			
			$('#userNameDiv').addClass('error');
			
			$('#userNameDiv .controls .help-inline').css('display', 'block');
			
			isEmpty = false;
			
		}
		
		if($('#inputUserPassword').val()==''){
			
			$('#userPassDiv').addClass('error');
			
			$('#userPassDiv .controls .help-inline').css('display', 'block');
			
			isEmpty = false;
			
		}
		
		if($('#inputUserEmail').val()==''){
			
			$('#userEmailDiv').addClass('error');
			
			$('#userEmailDiv .controls .help-inline').css('display', 'block');
			
			isEmpty = false;
			
		}
		
		if(isEmpty){

			return true;
		
		}else{
		
			return false;	
			
		}
		
	});

});