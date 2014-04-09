$(document).ready(function() {

	//alert("Ну привет! =)");
	
	$('.call_modal').click(function()
	{
		var target = $(this).attr('data-target');
		
		
		modalForm.show( target );
		return false;
	});
	
	$('.over').click(function(){
		modalForm.hide();	
		return false;
	});
	
	$('.close_modal').click(function(){
		
		
		modalForm.hide();	
		return false;
	});
	
	$('.rating .star').click(function(){
		$('.rating .star').removeClass('fill');
		$(this).children().attr('checked',true);
		$(this).addClass('fill').prevAll().addClass('fill');
		
	});
	
	
	$('form.ajaxForm').submit(function(e){
		var form  = $(this);
		var data = $(this).serialize();
		
							$('*[data-type="field"]').css('border','none');
							$('*[data-type="field"]').css('color','#000');
		
		$.ajax({
				  url: $(this).attr('action'),
				  type: "POST",
				  data: data,
				  dataType: "json",
				  
				  success: function(data) {
					   
					  if(data == "OK")
					  {
						 
						  window.location.href = "/spasibo";
					  }
					  else
					  {
						  	
						  $.each(data, function(key, value){
							  
							  $('textarea[data-field="'+key+'"]').css('border','1px solid #F00');
							  $('input[data-field="'+key+'"]').css('border','1px solid #F00');
							  $('span[data-field="'+key+'"]').css('color','#F00');
						  });
					  }
					
				  }
				});   


		return false;
	});
	
});


var review = {   "title": "отзыв",

				 "display": "block",
				
				 "url": "/reviews/addreview",
				 
				 "phone": "none",
				 
				}; // 
				
var mail = {   "title": "заявку",

				 "display": "none",
			
				 "url": "/2",
				 
				 "phone": "block",
				 
				}; // 
				
var targets = { "review" : review, "mail" : mail };

// класс по работе с всплывающим окном
var modalForm = {
	
	show: function( target )
			{
				$('*[data-type="field"]').css('border','none');
				$('*[data-type="field"]').css('color','#000');
				
					$('*[data-meta="title"]').text( targets[target].title );
					$('*[data-meta="url"]').attr( 'action', targets[target].url );
					$('*[data-meta="rating"]').css( 'display', targets[target].display );
					$('*[data-meta="phone"]').css( 'display', targets[target].phone );
				
				
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