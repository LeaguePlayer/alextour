<?php
$this->breadcrumbs=array(
	'Countrylists'=>array('index'),
	$model->id,
);

<h1>View Countrylist #<?php echo $model->id; ?></h1>

<?php $this->widget('bootstrap.widgets.TbDetailView',array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'node_id',
		'seo_id',
		'wswg_content',
		'status',
		'sort',
		'create_time',
		'update_time',
	),
)); ?>
