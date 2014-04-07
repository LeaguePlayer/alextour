<div class="col-lg-5 <? echo ($index%2==0) ? "cont-l" : "cont-r"?>">
						<p>
                        <a href="#" class="tl-h2">ИСПАНИЯ<img class="tour-cont" src="<?=$this->getAssetsUrl()?>/images/icon/cant-2.png" alt="" /></a><span class="date-r"><?=date('d',strtotime($data->create_time))?> <?=SiteHelper::russianMonthShort(date('m',strtotime($data->create_time)))?> <?=date('Y',strtotime($data->create_time))?></span></p>
						<?=$data->getImage('small')?>
						<p style="font-weight: bold; color: #29518F;"><?=$data->title?></p>
						<div>
                        	<?=$data->wswg_content?>
                        </div>
						<a class="btn reed small" href="#"> Подобрать тур</a>
</div>


					