<div class="width_980">
    <?php $this->widget('zii.widgets.CBreadcrumbs', array(
        'separator'=>' → ',
        'links'=>$this->breadcrumbs,
    )); ?>
</div>

<?php
    Yii::app()->clientScript->registerScript('animatereviews',
        "var animatereviews = function() {
            var destination = $('#reviews_wrap').offset().top;
            $('html, body').animate({
                scrollTop: destination + 'px'
            }, {
                duration: 300
            });
        }");
?>




					
					
<h1 class="h_review"><? echo $node->name; ?> <a href="javascript:void(0);" data-target="review" class="btn green small call_modal">Оставить отзыв</a></h1>
				
            
            

<div class="container-wrapper">
	<div class="row">
       


        <?php $this->widget('zii.widgets.CListView', array(
				'dataProvider'=>$dataProvider,
				'template'=>'{items}{pager}',
				'itemView'=>'/reviews/_view',
				'afterAjaxUpdate' => 'animatereviews',
            )) 
		?>
   </div>
</div>


<? $this->renderPartial('/site/_recomended'); ?>