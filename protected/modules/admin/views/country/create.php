<?php
$this->breadcrumbs=array(
	"Структура сайта"=>array('/admin/structure/list'),
	"Страны мира"=>array('/admin/countrylist/update/node_id/6', 'id'=>$model->id_list),
	'Создание',
);

$this->menu=array(
	array('label'=>'Страны мира', 'url'=>array('/admin/countrylist/update/node_id/6', 'id'=>$model->id_list)),
);
?>

<h1>Добавление страны</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>