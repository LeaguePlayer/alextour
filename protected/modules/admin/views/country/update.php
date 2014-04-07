<?php
$this->breadcrumbs=array(
    "Структура сайта"=>array('/admin/structure/list'),
	"Страны мира"=>array('/admin/countrylist/update/','id'=>"{$model->id_list}",'node_id'=>"{$model->countrylist->node_id}"),
	'Редактирование',
);

$this->menu=array(
    array('label'=>'Структура сайта','url'=>array('/admin/structure/list')),
   // array('label'=>'Свойства раздела', 'url'=>array('/admin/structure/update', 'id'=>$model->node_id)),
);
?>

<h1><?php echo $model->title; ?> - Редактирование</h1>

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>