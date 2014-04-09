	<?php echo $form->textFieldControlGroup($model,'name',array('class'=>'span8','maxlength'=>255)); ?>

	<?php echo $form->textAreaControlGroup($model,'review',array('rows'=>6, 'cols'=>50, 'class'=>'span8')); ?>

	<?php echo $form->textFieldControlGroup($model,'rating',array('class'=>'span8')); ?>



	<?php echo $form->dropDownListControlGroup($model, 'status', Reviews::getStatusAliases(), array('class'=>'span8', 'displaySize'=>1)); ?>
