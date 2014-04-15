<?php
$this->breadcrumbs=array(
	'Subscribes'=>array('index'),
	$model->name,
);

<h1>View Subscribes #<?php echo $model->id; ?></h1>

<?php $this->widget('bootstrap.widgets.TbDetailView',array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'name',
		'email',
		'status',
		'sort',
		'create_time',
		'update_time',
	),
)); ?>
