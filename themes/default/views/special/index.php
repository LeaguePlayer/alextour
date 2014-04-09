<div class="width_980">
    <?php $this->widget('zii.widgets.CBreadcrumbs', array(
        'separator'=>' → ',
        'links'=>$this->breadcrumbs,
    )); ?>
</div>

<?php
    Yii::app()->clientScript->registerScript('animatespecial',
        "var animatespecial = function() {
            var destination = $('#special_wrap').offset().top;
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
				'itemView'=>'/special/_view',
				'afterAjaxUpdate' => 'animatespecial',
            )) 
		?>
   </div>
</div>


<? $this->renderPartial('/site/_recomended'); ?>