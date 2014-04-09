<div class="review_b">

	<div class="r_name"><? echo $data->name; ?>, <? echo date('d/m/Y',strtotime($data->create_time));?></div>
    
    <div class="r_desc"><? echo $data->review; ?></div>
	
    <div class="r_rating">
    	<? 
			for ($i = 0; $i < 5; $i++) 
			{ 
				echo ($data->rating > 0) ? "<div class='star fill'></div>" : "<div class='star'></div>";
				$data->rating--;
			} 
		?>
    </div>
    
</div>