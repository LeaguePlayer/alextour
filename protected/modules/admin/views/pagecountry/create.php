<?php
$this->breadcrumbs=array(
	"Структура сайта"=>array('/admin/structure/list'),
	"{$model->country->countrylist->node->name}"=>array('/admin/countrylist/update/', 'id'=>$model->country->id_list, 'node_id'=>$model->country->countrylist->node_id),
	"{$model->country->title}"=>array('/admin/country/list/', 'id'=>$model->country->id),
	'Создание страницы',
);

$this->menu=array(
	array('label'=>'Страны мира', 'url'=>array('/admin/countrylist/update/node_id/6', 'id'=>$model->country->id_list)),
	array('label'=>"{$model->country->title}", 'url'=>array('/admin/country/list/', 'id'=>$model->country->id)),
);
?>

<h1>Создание страницы - <?=$model->country->title?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>