<?php
$this->breadcrumbs=array(
	'Reviews'=>array('index'),
	$model->name,
);

<h1>View Reviews #<?php echo $model->id; ?></h1>

<?php $this->widget('bootstrap.widgets.TbDetailView',array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'name',
		'review',
		'rating',
		'id_list',
		'status',
		'sort',
		'create_time',
		'update_time',
	),
)); ?>
