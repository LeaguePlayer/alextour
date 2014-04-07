<?php
$this->breadcrumbs=array(
	'Partners'=>array('index'),
	$model->title,
);

<h1>View Partners #<?php echo $model->id; ?></h1>

<?php $this->widget('bootstrap.widgets.TbDetailView',array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'title',
		'img_preview',
		'link',
		'id_list',
		'status',
		'sort',
		'create_time',
		'update_time',
	),
)); ?>
