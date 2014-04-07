<?php
/* @var $this NewslistController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Newslists',
);

$this->menu=array(
	array('label'=>'Create Newslist', 'url'=>array('create')),
	array('label'=>'Manage Newslist', 'url'=>array('admin')),
);
?>

<h1>Newslists</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
