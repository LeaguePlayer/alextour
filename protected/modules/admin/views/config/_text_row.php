
<div class='control-group'>
    <?= CHtml::label($model->label, 'Config_'.$model->id.'_value'); ?>
    <?= $form->textArea($model, "[$model->id]value", array('class' => 'span6', 'rows' => 8)); ?>
    <?= $form->error($model, "[$model->id]value"); ?>
</div>