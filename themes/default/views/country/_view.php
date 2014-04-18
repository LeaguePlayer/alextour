<div class="col-lg-3 country btn-group">
						<a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <?=$data->getImage('medium_icon')?>
                        <h2><?=$data->title?></h2></a>
						<ul class="dropdown-menu">
							<!-- dropdown menu links -->
							<li class="divider"></li>
							<li><a href="/newslist/view/url/news/country/<? echo $data->title; ?>">Новости</a></li>
                            
                            <? if( count( $data->pages ) > 0 ) { ?>
								<? foreach ($data->pages as $page) { ?>
                                    <li><a href="/country/<?=$data->title?>/<?=$page->id?>"><?=$page->title?></a></li>
                                <? } ?>
                            <? } ?>
                            
						</ul>																				
					</div>