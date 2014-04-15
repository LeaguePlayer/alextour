<?php
$this->menu=array(
	array('label'=>'Добавить','url'=>array('create')),
	array('label'=>'Выгрузить','url'=>array('excel'), 'linkOptions'=>array('target'=>'_blank')),
);
?>

<h1>Управление Подписками</h1>

<?php $this->widget('bootstrap.widgets.TbGridView',array(
	'id'=>'subscribes-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'type'=>TbHtml::GRID_TYPE_HOVER,
    'afterAjaxUpdate'=>"function() {sortGrid('subscribes')}",
    'rowHtmlOptionsExpression'=>'array(
        "id"=>"items[]_".$data->id,
        "class"=>"status_".(isset($data->status) ? $data->status : ""),
    )',
	'columns'=>array(
		'name',
		'email',
		
		array(
			'name'=>'create_time',
			'type'=>'raw',
			'value'=>'$data->create_time ? SiteHelper::russianDate($data->create_time).\' в \'.date(\'H:i\', strtotime($data->create_time)) : ""'
		),
		
		array(
			'class'=>'bootstrap.widgets.TbButtonColumn',
			'template'=>'{update} {delete}'
		),
	),
)); ?>

<?php if($model->hasAttribute('sort')) Yii::app()->clientScript->registerScript('sortGrid', 'sortGrid("subscribes");', CClientScript::POS_END) ;?>