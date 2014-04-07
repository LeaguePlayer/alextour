<?php
/* @var $this CountrylistController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Countrylists',
);

$this->menu=array(
	array('label'=>'Create Countrylist', 'url'=>array('create')),
	array('label'=>'Manage Countrylist', 'url'=>array('admin')),
);
?>

<h1>Countrylists</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
