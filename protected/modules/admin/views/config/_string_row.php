
<div class='control-group'>
    <?= CHtml::label($model->label, 'Config_'.$model->id.'_value'); ?>
    <?= $form->textField($model, "[$model->id]value", array('class' => 'span8')); ?>
    <?= $form->error($model, "[$model->id]value"); ?>
</div>