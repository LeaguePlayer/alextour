<?php
/* @var $this ReviewslistController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Reviewslists',
);

$this->menu=array(
	array('label'=>'Create Reviewslist', 'url'=>array('create')),
	array('label'=>'Manage Reviewslist', 'url'=>array('admin')),
);
?>

<h1>Reviewslists</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
