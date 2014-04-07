<div class="width_980">
    <?php $this->widget('zii.widgets.CBreadcrumbs', array(
        'separator'=>' → ',
        'links'=>$this->breadcrumbs,
    )); ?>
</div>

<?php
    Yii::app()->clientScript->registerScript('animatecountry',
        "var animatecountry = function() {
            var destination = $('#country_wrap').offset().top;
            $('html, body').animate({
                scrollTop: destination + 'px'
            }, {
                duration: 300
            });
        }");
?>


<?=$countrylist->wswg_content;?>


<div class="container-wrapper">
	<div class="row">
       


        <?php $this->widget('zii.widgets.CListView', array(
				'dataProvider'=>$dataProvider,
				'template'=>'{items}{pager}',
				'itemView'=>'_view',
				'afterAjaxUpdate' => 'animatecountry',
            )) 
		?>
	</div>
</div>

<? $this->renderPartial('/site/_recomended'); ?>