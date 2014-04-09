<div class="special_b">
	<a href="/special/view/id/<? echo $data->id; ?>">
    	<? echo $data->getImage('small'); ?>
    </a>
    <div class="s_content">
    	<div class="s_title s_part"><? echo $data->title; ?></div>
        <div class="s_desc s_part"><? echo $data->short_desc; ?></div>
        <? if ( $data->price ) { ?><div class="s_price s_part"><? echo $data->price; ?> руб</div><? } ?>
        
        <a href="/special/view/id/<? echo $data->id; ?>" class="s_more">ПОДРОБНЕЕ</a>
    </div>
    <? if ( $data->duration ) { ?>
    	<div class="s_duration">Длительность: <? echo SiteHelper::pluralize($data->duration, array('день', 'дня', 'дней')) ?></div>
     <? } ?>
    
</div>