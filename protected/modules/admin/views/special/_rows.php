	<div class='control-group'>
		<?php echo CHtml::activeLabelEx($model, 'img_preview'); ?>
		<?php echo $form->fileField($model,'img_preview', array('class'=>'span3')); ?>
		<div class='img_preview'>
			<?php if ( !empty($model->img_preview) ) echo TbHtml::imageRounded( $model->imgBehaviorPreview->getImageUrl('small') ) ; ?>
			<span class='deletePhoto btn btn-danger btn-mini' data-modelname='Special' data-attributename='Preview' <?php if(empty($model->img_preview)) echo "style='display:none;'"; ?>><i class='icon-remove icon-white'></i></span>
		</div>
		<?php echo $form->error($model, 'img_preview'); ?>
	</div>

	<?php echo $form->textFieldControlGroup($model,'title',array('class'=>'span8','maxlength'=>255)); ?>

	<?php echo $form->textFieldControlGroup($model,'short_desc',array('class'=>'span8','maxlength'=>255)); ?>

	<div class='control-group'>
		<?php echo CHtml::activeLabelEx($model, 'wswg_content'); ?>
		<?php $this->widget('appext.ckeditor.CKEditorWidget', array('model' => $model, 'attribute' => 'wswg_content', 'config' => array('width' => '100%')
		)); ?>
		<?php echo $form->error($model, 'wswg_content'); ?>
	</div>

	<?php echo $form->textFieldControlGroup($model,'price',array('class'=>'span8')); ?>

	<?php echo $form->textFieldControlGroup($model,'duration',array('class'=>'span8')); ?>

	

	<?php echo $form->dropDownListControlGroup($model, 'status', Special::getStatusAliases(), array('class'=>'span8', 'displaySize'=>1)); ?>
