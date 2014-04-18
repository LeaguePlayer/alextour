<div id="partners">
                <h3>Наши партнеры</h3>

                <noindex>
                	<? foreach ($partners as $partner) { ?>
                        <a target="_blank" href="<? echo ($partner->link) ? "http://{$partner->link}" : "javascript:void(0);" ?>">
                        	<?=$partner->getImage('small',"", array('class'=>'grow'))?>
                            
                        </a>
                    <? } ?>
                </noindex>
                <p class="a-right"><?=Yii::app()->config->get('app.slogan');?></p>
            </div>