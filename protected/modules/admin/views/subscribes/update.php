<?php
$this->breadcrumbs=array(
	"Подписчики"=>array('list'),
	'Редактирование',
);

$this->menu=array(
	array('label'=>'Список', 'url'=>array('list')),
	array('label'=>'Добавить','url'=>array('create')),
);
?>

<h1>Редактирование подписчика</h1>

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>