<?php
/* @var $this PartnerslistController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Partnerslists',
);

$this->menu=array(
	array('label'=>'Create Partnerslist', 'url'=>array('create')),
	array('label'=>'Manage Partnerslist', 'url'=>array('admin')),
);
?>

<h1>Partnerslists</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
