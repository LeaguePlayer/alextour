<?php

	$cs = Yii::app()->clientScript;
	$cs->registerCssFile($this->getAssetsUrl().'/css/style.css');
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
	
	
	$cs->registerScriptFile($this->getAssetsUrl().'/js/common.js', CClientScript::POS_END);
?><!DOCTYPE HTML>
<html>
    <head>
        <title></title>
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
                    <span class="tel-thin">свяжитесь с нами: </span><span class="tel-light"><i class="icon phone"></i> +7 (3452)</span> <strong>30-57-93</strong>
                </div>
            </div>

			<?=$content?>
            
            <footer>
                <div class="row">
                    <div class="col-lg-2">
                        <p class="copyright">Alex-tour 2011-2013</p>
                    </div>
                    <div class="col-lg-5 phone-wrapper">
                        <a href="#" class="btn green small">
                            Свяжитесь с нами
                        </a> 
						<span class="phone">+7 (3452)</span> <strong>30-57-93</strong><i class="icon phone"></i>
                    </div>
                    <div class="col-lg-3">
                        <a href="#" class="social twitter"></a>
                        <a href="#" class="social photo"></a>
                        <a href="#" class="social fb"></a>
                        <a href="#" class="social skype"></a>
                    </div>
                    <div class="col-lg-2 a-right a-mobile-logo">
                        <a href="#">
                            <img src="<?=$this->getAssetsUrl();?>/images/amobilelogo.png" alt="А-Мобайл" />
                        </a>
                    </div>
                </div>
            </footer>
        </div><!-- container -->


	<div class="over" id="hide-layout"></div>
    <div class="form_showed">
    	<div class="centered">
        	<h2>Оставить заявку</h2>
            <form>
            	<div class="top_part">
                	<div class="left_p bpart"><input type="text" placeholder="Имя" value="" /></div>
                    <div class="right_p bpart"><input type="text" placeholder="Телефон" value="" /></div>
                </div>
                <div class="bottom_part">
                	<textarea placeholder="Комментарий"></textarea>
                </div>
                <div class="bottom_part with_button">
                	<input type="submit" value="Отправить заявку" class="btn green" />  или <a class="close_modal" href="javascrip:void(0):">Отмена</a>
                </div>
            </form>
        </div>
    </div>

        <!-- Bootstrap core JavaScript
        ================================================== -->
        <!-- Placed at the end of the document so the pages load faster -->

    </body>
</html>
