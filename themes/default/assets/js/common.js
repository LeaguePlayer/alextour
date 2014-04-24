

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
		
		var existLoader = ($(this).find('.i_text').size()) ? true : false;
		
		//window.exBorder = $('*[data-type="field"]').css('border');
		
							//$('*[data-type="field"]').css('border','none');
							//$('*[data-type="field"]').css('color','#000');
							$('*[data-type="field"]').removeClass('error');
							
		if(existLoader)
		{
				$(form).find('.i_text').addClass('load');
		}
		
		$.ajax({
				  url: $(this).attr('action'),
				  type: "POST",
				  data: data,
				  dataType: "json",
				  
				  success: function(data) {
					  
					 
					   
					  if(data == "OK")
					  {
						 
						  window.location.href = "/page/spasibo";
					  }
					  else
					  {
						  	
						  $.each(data, function(key, value){
							  $('*[data-field="'+key+'"]').addClass('error');
							 // $('textarea[data-field="'+key+'"]').css('border','1px solid #F00');
							 // $('input[data-field="'+key+'"]').css('border','1px solid #F00');
							 // $('span[data-field="'+key+'"]').css('color','#F00');
						  });
						  
						   if(existLoader)
							{
									$(form).find('.i_text').removeClass('load');
							}
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
				 
				 "for_order" : "none",
				 
				}; // 
				
var mail = {   "title": "нам сообщение",

				 "display": "none",
			
				 "url": "/site/feedback",
				 
				 "phone": "block",
				 
				 "for_order" : "none",
				 
				}; // 
				
var order = {   "title": "заявку",

				 "display": "none",
			
				 "url": "/site/feedback",
				 
				 "phone": "block",
				 
				 "for_order" : "block",
				 
				}; // 
				
var targets = { "review" : review, "mail" : mail, "order" : order };

// класс по работе с всплывающим окном
var modalForm = {
	
	show: function( target )
			{
			//	$('*[data-type="field"]').css('border','none');
			//	$('*[data-type="field"]').css('color','#000');
			$('*[data-type="field"]').removeClass('error');
				
					$('*[data-meta="title"]').text( targets[target].title );
					$('*[data-meta="url"]').attr( 'action', targets[target].url );
					$('*[data-meta="rating"]').css( 'display', targets[target].display );
					$('*[data-meta="phone"]').css( 'display', targets[target].phone );
					$('*[data-meta="for_order"]').css( 'display', targets[target].for_order );
				
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