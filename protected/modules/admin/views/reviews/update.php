<?php
$this->breadcrumbs=array(
	"{$model->translition()}"=>array('list'),
	"{$model->reviewslist->node->name}"=>array('/admin/reviewslist/update/', 'id'=>$model->id_list, 'node_id'=>$model->reviewslist->node_id),
	"Редактирование {$model->name}",
);

$this->menu=array(
	array('label'=>"Вернуться в {$model->reviewslist->node->name}",'url'=>array('/admin/reviewslist/update/', 'id'=>$model->id_list, 'node_id'=>$model->reviewslist->node_id)),
);
?>

<h1>Редактирование <?php echo $model->name; ?></h1>

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>