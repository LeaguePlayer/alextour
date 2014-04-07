	<?php echo $form->textFieldControlGroup($model,'node_id',array('class'=>'span8')); ?>

	<?php echo $form->dropDownListControlGroup($model, 'status', Partnerslist::getStatusAliases(), array('class'=>'span8', 'displaySize'=>1)); ?>
