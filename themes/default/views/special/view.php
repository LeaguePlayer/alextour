<?php
$this->breadcrumbs=array(
	'Specials'=>array('index'),
	$model->title,
);

<h1>View Special #<?php echo $model->id; ?></h1>

<?php $this->widget('bootstrap.widgets.TbDetailView',array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'img_preview',
		'title',
		'short_desc',
		'wswg_content',
		'price',
		'duration',
		'id_list',
		'status',
		'sort',
		'create_time',
		'update_time',
	),
)); ?>
