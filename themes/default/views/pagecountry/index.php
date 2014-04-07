<?php
/* @var $this PagecountryController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Pagecountries',
);

$this->menu=array(
	array('label'=>'Create Pagecountry', 'url'=>array('create')),
	array('label'=>'Manage Pagecountry', 'url'=>array('admin')),
);
?>

<h1>Pagecountries</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
