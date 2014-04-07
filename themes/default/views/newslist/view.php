<?php
$this->breadcrumbs=array(
	'Newslists'=>array('index'),
	$model->id,
);

<h1>View Newslist #<?php echo $model->id; ?></h1>

<?php $this->widget('bootstrap.widgets.TbDetailView',array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'id_node',
		'page_size',
	),
)); ?>
