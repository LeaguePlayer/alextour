<?php
$this->breadcrumbs=array(
	'News'=>array('index'),
	$model->title,
);

<h1>View News #<?php echo $model->id; ?></h1>

<?php $this->widget('bootstrap.widgets.TbDetailView',array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'title',
		'img_preview',
		'id_country',
		'wswg_content',
		'id_list',
		'id_seo',
		'status',
		'create_time',
		'update_time',
	),
)); ?>
