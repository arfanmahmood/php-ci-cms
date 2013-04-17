// JavaScript Document
$(document).ready(function(){
	
	$('#frmUses').submit(function(){
		
		var isEmpty = true;
		
		if($('#inputUses').val()==''){
			
			$('#usesDiv').addClass('error');
			
			$('#usesDiv .controls .help-inline').css('display', 'block');
			
			isEmpty = false;
			
		}
		
		if(isEmpty){

			return true;
		
		}else{
		
			return false;	
			
		}
		
	});

});