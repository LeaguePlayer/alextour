$(document).ready(function() {

	//alert("Ну привет! =)");
	
	$('.call_modal').click(function()
	{
		modalForm.show();
	});
	
	$('.over').click(function(){
		modalForm.hide();	
	});
	
	$('.close_modal').click(function(){
		modalForm.hide();	
	});
	
});



// класс по работе с всплывающим окном
var modalForm = {
	
	show: function()
			{
				//make fade bg
				$('.over').show(0);
				
				//resize form
				
				// make form
				$('.form_showed').show(0);
			},
			
	hide: function()
			{
				//make fade bg
				$('.over').hide(0);
				// make form
				$('.form_showed').hide(0);
			},
}