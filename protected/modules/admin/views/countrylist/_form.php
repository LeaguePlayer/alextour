<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'object-form',
	'enableAjaxValidation'=>false,
		'htmlOptions' => array('enctype'=>'multipart/form-data'),
)); ?>
    <div class="form-actions">
        <?php echo $form->errorSummary($model); ?>

        <?php if ( Yii::app()->user->hasFlash('SAVED') ) {
            echo TbHtml::alert(TbHtml::ALERT_COLOR_INFO, Yii::app()->user->getFlash('SAVED'));
        } ?>

      <div class='control-group'>
			<?php echo CHtml::activeLabelEx($model, 'wswg_content'); ?>
            <?php $this->widget('appext.ckeditor.CKEditorWidget', array('model' => $model, 'attribute' => 'wswg_content', 'config' => array('width' => '100%')
            )); ?>
            <?php echo $form->error($model, 'wswg_content'); ?>
        </div>

        <?php echo TbHtml::submitButton('Сохранить', array('color' => TbHtml::BUTTON_COLOR_PRIMARY)); ?>
        <?php echo TbHtml::linkButton('Отмена', array('url'=>'/admin/structure/list')); ?>
    </div>
<?php $this->endWidget(); ?>




<?php echo TbHtml::linkButton('Добавить страну', array(
    'icon'=>TbHtml::ICON_PLUS,
    'url'=>array('/admin/country/create', 'list_id'=>$model->id)
)); ?>

<?php $this->widget('bootstrap.widgets.TbGridView',array(
    'id'=>'country-grid',
    'dataProvider'=>$countryFinder->search(),
    'filter'=>$countryFinder,
    'type'=>TbHtml::GRID_TYPE_HOVER,
    'afterAjaxUpdate'=>"function() {sortGrid('country')}",
    'rowHtmlOptionsExpression'=>'array(
            "id"=>"items[]_".$data->id,
            "class"=>"status_".$data->status,
        )',
    'columns'=>array(
        array(
            'name'=>'img_preview',
            'type'=>'raw',
            'value'=>'$data->getImage("icon")',
            'filter'=>false
        ),
        array(
            'name'=>'title',
            'type'=>'raw',
            'value'=>'TbHtml::link($data->title, array("/admin/country/list/", "id"=>$data->id))'
        ),
        'create_time',
        array(
            'name'=>'status',
            'type'=>'raw',
            'value'=>'Country::getStatusAliases($data->status)',
            'filter'=>Country::getStatusAliases()
        ),
        array(
            'class'=>'bootstrap.widgets.TbButtonColumn',
            'template'=>'{update} {delete}',
            'buttons'=>array(
                'delete'=>array(
                    'url'=>'array("/admin/country/delete", "id"=>$data->id)'
                ),
                'update'=>array(
                    'url'=>'array("/admin/country/update", "id"=>$data->id, "id_list"=>$data->id_list)'
                ),
            ),
        ),
    ),
)); ?>
