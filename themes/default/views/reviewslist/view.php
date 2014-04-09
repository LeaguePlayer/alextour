<?php
$this->breadcrumbs=array(
	'Reviewslists'=>array('index'),
	$model->id,
);

<h1>View Reviewslist #<?php echo $model->id; ?></h1>

<?php $this->widget('bootstrap.widgets.TbDetailView',array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'node_id',
		'status',
		'sort',
		'create_time',
		'update_time',
	),
)); ?>
