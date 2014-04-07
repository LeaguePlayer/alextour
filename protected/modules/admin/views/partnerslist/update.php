<?php
$this->breadcrumbs=array(
	"Структура сайта"=>array('/admin/structure/list'),
	"{$model->node->name}"
	//"{$model->country->title}"=>array('/admin/country/list/', 'id'=>$model->country->id),
	
);

$this->menu=array(
	array('label'=>"Добавить в {$model->node->name}", 'url'=>array('/admin/partners/create', 'list_id'=>$model->id)),
	//array('label'=>"{$model->country->title}", 'url'=>array('/admin/country/list/', 'id'=>$model->country->id)),
);
?>

<h1>Управление <?php  echo $model->node->name; ?></h1>

<?php echo $this->renderPartial('_form',array('model'=>$model, 'partnersFinder'=>$partnersFinder)); ?>