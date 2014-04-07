<?php
$this->breadcrumbs=array(
    "Структура сайта"=>array('/admin/structure/list'),
	'Редактирование',
);

$this->menu=array(
    array('label'=>'Структура сайта','url'=>array('/admin/structure/list')),
    array('label'=>'Свойства раздела', 'url'=>array('/admin/structure/update', 'id'=>$model->node_id)),
);
?>

<h1>Редактирование - <?= $model->node->name ?></h1>

<?php echo $this->renderPartial('_form',array(
    'model' => $model,
    'newsFinder' => $newsFinder
)); ?>