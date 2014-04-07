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
                                    <li><a href="/country/<?=$data->title?>/<?=$page->id?>"><?=$page->title?></a></li>
                                <? } ?>
                            <? } ?>
                                
                            </ul>
                            </div>
                        <? } ?>
                        
                        <span class="date-r"><?=date('d',strtotime($data->create_time))?> <?=SiteHelper::russianMonthShort(date('m',strtotime($data->create_time)))?> <?=date('Y',strtotime($data->create_time))?></span></p>
                        
                  
                        
						<?=$data->getImage('small')?>
						<a href="/news/view/id/<?=$data->id?>" style="font-weight: bold; color: #29518F; margin-top:1em; margin-bottom:1em; display:inline-block;"><?=$data->title?></a>
						<div class="content">
                        	<?=$data->short_desc?>
                        </div>
                        <? if ( $data->country ) { ?>
							<a class="btn reed small" href="#"> Подобрать тур</a>
                        <? } ?>
</div>


					