// JavaScript Document
$(document).ready(function(){
	
	$('#frmFabric').submit(function(){
		
		var isEmpty = true;
		
		if($('#inputRefrence').val()==''){
			
			$('#referenceDiv').addClass('error');
			
			$('#referenceDiv .controls .help-inline').css('display', 'block');
			
			isEmpty = false;
			
		}
		
		if($('#inputArticle').val()==''){
			
			$('#articleDiv').addClass('error');
			
			$('#articleDiv .controls .help-inline').css('display', 'block');
			
			isEmpty = false;
			
		}
		
		if($('#inputWeave').val()==''){
			
			$('#weaveDiv').addClass('error');
			
			$('#weaveDiv .controls .help-inline').css('display', 'block');
			
			isEmpty = false;
			
		}
		
		if($('#inputGSM').val()==''){
			
			$('#gsmDiv').addClass('error');
			
			$('#gsmDiv .controls .help-inline').css('display', 'block');
			
			isEmpty = false;
			
		}
		
		if($('#inputBlend').val()==''){
			
			$('#blendDiv').addClass('error');
			
			$('#blendDiv .controls .help-inline').css('display', 'block');
			
			isEmpty = false;
			
		}
		
		if($('input[name="inputFeatures[]"]:checked').size()<1){
			
			$('#featureDiv').addClass('error');
			
			$('#featureDiv .controls .help-inline').css('display', 'block');
			
			isEmpty = false;
			
		}
		
		if($('input[name="inputUses[]"]:checked').size()<1){
			
			$('#usesDiv').addClass('error');
			
			$('#usesDiv .controls .help-inline').css('display', 'block');
			
			isEmpty = false;
			
		}

		if($('#inputSmallPicture').val()=='' && $('#isSmallPicture').val()==''){
			
			$('#smallPictureDiv').addClass('error');
			
			$('#smallPictureDiv .controls .help-inline').css('display', 'block');
			
			isEmpty = false;
			
		}
		
		if($('#inputLargePicture').val()=='' && $('#isLargePicture').val()==''){
			
			$('#largePictureDiv').addClass('error');
			
			$('#largePictureDiv .controls .help-inline').css('display', 'block');
			
			isEmpty = false;
			
		}
		
		if(isEmpty){

			return true;
		
		}else{
		
			return false;	
			
		}
		
	});

});