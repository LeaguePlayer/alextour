<?php echo $form->dropDownListControlGroup($model,'id_country', $data['country'], array('class'=>'span8')); ?>

<?php echo $form->textFieldControlGroup($model,'title',array('class'=>'span8','maxlength'=>255)); ?>

    <div class='control-group'>
        <?php echo CHtml::activeLabelEx($model, 'create_time'); ?>
        <?php $this->widget('yiiwheels.widgets.datetimepicker.WhDateTimePicker', array(
            'model' => $model,
            'attribute' => 'create_time',
            'pluginOptions' => array(
                'format' => 'dd-MM-yyyy',
                'language' => 'ru',
                'pickSeconds' => false,
                'pickTime' => false
            )
        )); ?>
        <?php echo $form->error($model, 'create_time'); ?>
    </div>

    <div class='control-group'>
        <?php echo CHtml::activeLabelEx($model, 'img_preview'); ?>
        <?php echo $form->fileField($model,'img_preview', array('class'=>'span3')); ?>
        <div class='img_preview'>
            <?php if ( !empty($model->img_preview) ) echo TbHtml::imageRounded( $model->imgBehaviorPreview->getImageUrl('small') ) ; ?>
            <span class='deletePhoto btn btn-danger btn-mini' data-modelname='News' data-attributename='Preview' <?php if(empty($model->img_preview)) echo "style='display:none;'"; ?>><i class='icon-remove icon-white'></i></span>
        </div>
        <?php echo $form->error($model, 'img_preview'); ?>
    </div>

    <?php  echo $form->textAreaControlGroup($model, 'short_desc', array('class'=>'span8', 'rows'=>6)) ?>

    <div class='control-group'>
        <?php echo CHtml::activeLabelEx($model, 'wswg_content'); ?>
        <?php $this->widget('appext.ckeditor.CKEditorWidget', array('model' => $model, 'attribute' => 'wswg_content',
        )); ?>
        <?php echo $form->error($model, 'wswg_content'); ?>
    </div>

    <?php echo $form->dropDownListControlGroup($model, 'status', News::getStatusAliases(), array('class'=>'span8', 'displaySize'=>1)); ?>

    <?php // echo $form->hiddenField($model,'sid'); ?>