<div class="col-lg-5 <? echo ($index%2==0) ? "cont-l" : "cont-r"?>">

				
						<p>
                        <? if ( $data->country ) { ?>
                            <div style="display:inline-block;">
                            <a href="#" data-toggle="dropdown" class="tl-h2 dropdown-toggle"><span style="z-index:20; position: relative;">
                            <? echo $data->country->title; ?></span>
                            <?=$data->country->getImage('small_icon', $data->country->title,array("class"=>"tour-cont"))?>
                           
                            </a>
                            
                            <ul class="dropdown-menu">
                                <!-- dropdown menu links -->
                                <li class="divider"></li>
                                
                                
                                <? if( count( $data->country->pages ) > 0 ) { ?>
								<? foreach ($data->country->pages as $page) { ?>
                                    <li><a href="/country/<?=$data->title?>/<?=$page->id?>?return_to_news=true<? echo ($country) ? "&country={$country}" : ""; ?>"><?=$page->title?></a></li>
                                <? } ?>
                            <? } ?>
                                
                            </ul>
                            </div>
                        <? } ?>
                        
                        <span class="date-r"><?=date('d',strtotime($data->create_time))?> <?=SiteHelper::russianMonthShort(date('m',strtotime($data->create_time)))?> <?=date('Y',strtotime($data->create_time))?></span></p>
                        
                  
                        
						<a href="/news/view/id/<?=$data->id?>"><?=$data->getImage('small')?></a>
						<a href="/news/view/id/<?=$data->id?>" style="font-weight: bold; color: #29518F; margin-top:1em; margin-bottom:1em; display:inline-block;"><?=$data->title?></a>
						<div class="content">
                        	<?=$data->short_desc?>
                        </div>
                        <? if ( $data->country ) { ?>
							<a target="_blank" class="btn reed small" href="/page/poisk-tyrov?ts_dosearch=1&s_flyfrom=14&s_country=<? echo SiteHelper::getCountry($data->country->title); ?>&s_region_to=&s_j_date_from=27.04.2014&s_j_date_to=30.04.2014&s_nights_from=6&s_nights_to=14&s_adults=2&s_child=0"> Подобрать тур</a>
                        <? } ?>
</div>


					