<div class="width_980">
    <?php $this->widget('zii.widgets.CBreadcrumbs', array(
        'separator'=>' → ',
        'links'=>$this->breadcrumbs,
    )); ?>
</div>

<?php
    Yii::app()->clientScript->registerScript('animatenews',
        "var animateNews = function() {
            var destination = $('#news_wrap').offset().top;
            $('html, body').animate({
                scrollTop: destination + 'px'
            }, {
                duration: 300
            });
        }");
?>




					
					

				
            
            

<div class="container-wrapper">
	<div class="row">
       


        <?php $this->widget('zii.widgets.CListView', array(
				'dataProvider'=>$dataProvider,
				'template'=>'{items}{pager}',
				'itemView'=>'_item',
				'afterAjaxUpdate' => 'animateNews',
            )) 
		?>
   </div>
</div>


<? $this->renderPartial('/site/_recomended'); ?>