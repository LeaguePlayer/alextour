<?php

	$cs = Yii::app()->clientScript;
	$cs->registerCssFile($this->getAssetsUrl().'/css/style.css?v=2.2');
	$cs->registerCssFile($this->getAssetsUrl().'/css/fancybox/jquery.fancybox.css');
	$cs->registerCssFile($this->getAssetsUrl().'/css/jquery.ui/overcast/jquery-ui-1.10.3.custom.min.css');
	
	$cs->registerCssFile($this->getAssetsUrl().'/css/bootstrap.css');
	$cs->registerCssFile($this->getAssetsUrl().'/css/template.css');
//	$cs->registerCssFile($this->getAssetsUrl().'/css/bootstrap.css');
	$cs->registerCssFile($this->getAssetsUrl().'/css/ui-lightness/jquery-ui-1.10.4.custom.css');
	//$cs->registerCssFile($this->getAssetsUrl().'/css/fancybox/jquery.fancybox-buttons.css');
	
	$cs->registerCoreScript('jquery');
	$cs->registerCoreScript('jquery.ui');
	$cs->registerScriptFile($this->getAssetsUrl().'/js/lib/jquery.fancybox.js', CClientScript::POS_END);
	//$cs->registerScriptFile($this->getAssetsUrl().'/js/lib/jquery.fancybox-buttons.js', CClientScript::POS_END);
	//$cs->registerScriptFile('http://api-maps.yandex.ru/2.0.27/?load=package.standard&lang=ru-RU', CClientScript::POS_HEAD);
	
	$cs->registerScriptFile($this->getAssetsUrl().'/js/lib/jquery.timepicker.addon.js', CClientScript::POS_END);
	$cs->registerScriptFile($this->getAssetsUrl().'/js/lib/jquery.ui.timepicker.ru.js', CClientScript::POS_END);
	
	$cs->registerScriptFile($this->getAssetsUrl().'/js/jquery-ui-i18n.js', CClientScript::POS_END);
//	$cs->registerScriptFile($this->getAssetsUrl().'/js/chosen.jquery.min.js', CClientScript::POS_END);
	$cs->registerScriptFile($this->getAssetsUrl().'/js/jquery.selectric.min.js', CClientScript::POS_END);
	$cs->registerScriptFile($this->getAssetsUrl().'/js/bootstrap.js', CClientScript::POS_END);
	
	
	$cs->registerScriptFile($this->getAssetsUrl().'/js/common.js?v=2.0', CClientScript::POS_END);
?><!DOCTYPE HTML>
<html>
    <head>
        <title><?=$this->title?></title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<link href='http://fonts.googleapis.com/css?family=Open+Sans+Condensed:300,300italic,700&subset=latin,cyrillic' rel='stylesheet' type='text/css'>
        <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700,300&subset=latin,cyrillic' rel='stylesheet' type='text/css'>
        <!-- styles -->
     
<!--		<link type="text/css" rel="stylesheet" href="css/ui-lightness/jquery-ui-1.10.4.custom.css" media="all" />  -->

		<!--[if IE 8]>
		<link type="text/css" rel="stylesheet" href="css/ie8.css" media="all" />
		<![endif]-->

       
		
		<script>
		$(document).ready(function() {

		$('.datepicker').datepicker({
	    showOn: "both",
	    buttonImage: "<?=$this->getAssetsUrl();?>/images/icon/calendar.png",
	    buttonImageOnly: true
			});	
			
		 $('input[placeholder]').each(function(){  
			var input = $(this);        
			$(input).val(input.attr('placeholder'));
						
			$(input).focus(function(){
				if (input.val() == input.attr('placeholder')) {
				   input.val('');
				}
			});
				
			$(input).blur(function(){
			   if (input.val() == '' || input.val() == input.attr('placeholder')) {
				   input.val(input.attr('placeholder'));
			   }
			});
		});
		
		$(function(){
			$('select').selectric();
		});
		
		});
		</script>
    </head>

    <body>
        <div class="container">
            <div id="header-wrapper">
                <div class="logo">
                    <a href="/"><img src="<?=$this->getAssetsUrl();?>/images/logo.png" alt="Алекс Тур" /></a>
                </div>
                <div class="navbar-wrapper">
                    <? $this->renderPartial('/site/_menu',array('menu'=>$this->menu)); ?>
                </div>
                <div class="contact-wrapper">
                    <span class="tel-thin">свяжитесь с нами: </span><span class="tel-light"><i class="icon phone"></i> +7 (<?=Yii::app()->config->get('app.code_city');?>)</span> <strong><?=Yii::app()->config->get('app.phone');?></strong>
                </div>
            </div>

			<?=$content?>
            
            <footer>
                <div class="row">
                    <div class="col-lg-2">
                        <p class="copyright"><?php echo Yii::app()->config->get('app.company_name'); ?> <?php echo Yii::app()->config->get('app.year_begin'); ?>-<?=date('Y')?></p>
                    </div>
                    <div class="col-lg-5 phone-wrapper">
                        <a href="javascript:void(0);" data-target="mail" class="btn green small call_modal">
                            Свяжитесь с нами
                        </a> 
						<span class="phone">+7 (<?=Yii::app()->config->get('app.code_city');?>)</span> <strong><?=Yii::app()->config->get('app.phone');?></strong><i class="icon phone"></i>
                        
                      
                    </div>
                    <div class="col-lg-3">
                        <? if(Yii::app()->config->get('app.tw')){ ?><a href="<?=Yii::app()->config->get('app.tw')?>" class="social twitter"></a><? } ?>
                        <? if(Yii::app()->config->get('app.insta')){ ?><a href="<?=Yii::app()->config->get('app.insta')?>" class="social photo"></a><? } ?>
                        <? if(Yii::app()->config->get('app.fb')){ ?><a href="<?=Yii::app()->config->get('app.fb')?>" class="social fb"></a><? } ?>
                        <? if(Yii::app()->config->get('app.skype')){ ?><a href="<?=Yii::app()->config->get('app.skype')?>" class="social skype"></a><? } ?>
                         <? if(Yii::app()->config->get('app.vk')){ ?><a href="<?=Yii::app()->config->get('app.vk')?>" class="social vk"></a><? } ?>
                    </div>
                    <div class="col-lg-2 a-right a-mobile-logo">
                        <a target="_blank" href="http://amobile-studio.ru">
                            <img src="<?=$this->getAssetsUrl();?>/images/amobilelogo.png" alt="А-Мобайл" />
                        </a>
                    </div>
                </div>
            </footer>
        </div><!-- container -->


	<div class="over" id="hide-layout"></div>
    <div class="form_showed">
    	<div class="centered">
        	<h2>Оставить <span data-meta="title">заявку</span></h2>
            <form class="ajaxForm" data-meta="url" action="/" method="GET">
            	<div class="top_part">
                	<div class="left_p bpart">Как Вас зовут?<input data-type="field" data-field="name" type="text" name="data[name]" value="" /></div>
                    <div class="right_p bpart" data-meta="phone">Ваш номер телефона?<input data-type="field" data-field="phone" type="text" name="data[phone]" value="" /></div>
                </div>
                <div data-meta="for_order" class="for_order">
                    <div class="top_part bottom_part">
                        <div class="left_p bpart">Дата вылета<input class="datepicker" data-type="field" data-field="departure_date" type="text" name="data[departure_date]" value="" /></div>
                        <div class="right_p bpart">Количество человек<input data-type="field" data-field="persons" type="text" name="data[persons]" value="" /></div>
                     </div>
                     
                     <div class="top_part bottom_part">
                        <div class="full_fill bpart">Перечислите интересующие страны<input data-type="field" data-field="countries" type="text" name="data[countries]" value="" />
                        </div>
                     </div>
                 </div>
                <div class="bottom_part">
                	<textarea data-field="review" data-type="field" name="data[review]" placeholder="Комментарий"></textarea>
                </div>
                <div data-meta="rating" class="bottom_part rating">
                <span data-field="rating" data-type="field">Поставьте оценку</span>
                	<div class="star"><input type="radio" name="data[rating]" value="1"></div>
                    <div class="star"><input type="radio" name="data[rating]" value="2"></div>
                    <div class="star"><input type="radio" name="data[rating]" value="3"></div>
                    <div class="star"><input type="radio" name="data[rating]" value="4"></div>
                    <div class="star"><input type="radio" name="data[rating]" value="5"></div>
                </div>
                
                
                
                <div class="bottom_part with_button">
                	<input type="submit" value="Отправить заявку" class="btn green" />  или <a class="close_modal" href="javascrip:void(0):" style="margin-left:20px;">Отмена</a>
                </div>
                
            </form>
        </div>
    </div>

        <!-- Bootstrap core JavaScript
        ================================================== -->
        <!-- Placed at the end of the document so the pages load faster -->

    </body>
 
</html>
