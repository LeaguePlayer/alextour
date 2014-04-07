<div class="col-lg-5 <? echo ($index%2==0) ? "cont-l" : "cont-r"?>">
						<p>
                        
                        <div style="display:inline-block;">
                        <a href="#" data-toggle="dropdown" class="tl-h2 dropdown-toggle"><span style="z-index:20; position: relative;">ИСПАНИЯ</span><img class="tour-cont" src="<?=$this->getAssetsUrl()?>/images/icon/cant-2.png" alt="" /></a>
                        
						<ul class="dropdown-menu">
							<!-- dropdown menu links -->
							<li class="divider"></li>
							<li><a href="#">Новости</a></li>
                        </ul>
                        </div>
                        
                        <span class="date-r"><?=date('d',strtotime($data->create_time))?> <?=SiteHelper::russianMonthShort(date('m',strtotime($data->create_time)))?> <?=date('Y',strtotime($data->create_time))?></span></p>
						<?=$data->getImage('small')?>
						<p style="font-weight: bold; color: #29518F;"><?=$data->title?></p>
						<div class="content">
                        	<?=$data->wswg_content?>
                        </div>
						<a class="btn reed small" href="#"> Подобрать тур</a>
</div>


					