<?php
$this->breadcrumbs=array(
	//"{$model->translition()}"=>array('list'),
	"{$model->partnerslist->node->name}"=>array('/admin/partnerslist/update/', 'id'=>$model->id_list, 'node_id'=>$model->partnerslist->node_id),
	"Редактирование {$model->title}",
);

$this->menu=array(
	array('label'=>"Вернуться в {$model->partnerslist->node->name}",'url'=>array('/admin/partnerslist/update/', 'id'=>$model->id_list, 'node_id'=>$model->partnerslist->node_id)),
);
?>

<h1>Редактирование <?php echo $model->title; ?></h1>

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>