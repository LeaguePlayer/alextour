	<?php echo $form->textFieldControlGroup($model,'node_id',array('class'=>'span8')); ?>

	<div class='control-group'>
		<?php echo CHtml::activeLabelEx($model, 'wswg_content'); ?>
		<?php $this->widget('appext.ckeditor.CKEditorWidget', array('model' => $model, 'attribute' => 'wswg_content', 'config' => array('width' => '100%')
		)); ?>
		<?php echo $form->error($model, 'wswg_content'); ?>
	</div>

	<?php echo $form->dropDownListControlGroup($model, 'status', Countrylist::getStatusAliases(), array('class'=>'span8', 'displaySize'=>1)); ?>
