<?php
$this->breadcrumbs=array(
	//"{$model->translition()}"=>array('list'),
	"{$model->speciallist->node->name}"=>array('/admin/speciallist/update/', 'id'=>$model->id_list, 'node_id'=>$model->speciallist->node_id),
	'Создание',
);

$this->menu=array(
	array('label'=>"Вернуться в {$model->speciallist->node->name}",'url'=>array('/admin/speciallist/update/', 'id'=>$model->id_list, 'node_id'=>$model->speciallist->node_id)),
);
?>

<h1>Добавление в <?=$model->speciallist->node->name?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>