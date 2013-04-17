// JavaScript Document
$(document).ready(function(){
	
	$('#frmFeature').submit(function(){
		
		var isEmpty = true;
		
		if($('#inputFeature').val()==''){
			
			$('#featureDiv').addClass('error');
			
			$('#featureDiv .controls .help-inline').css('display', 'block');
			
			isEmpty = false;
			
		}
		
		if(isEmpty){

			return true;
		
		}else{
		
			return false;	
			
		}
		
	});

});