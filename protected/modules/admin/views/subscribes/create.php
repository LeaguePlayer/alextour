<?php
$this->breadcrumbs=array(
	"Подписчики"=>array('list'),
	'Создание',
);

$this->menu=array(
	array('label'=>'Список','url'=>array('list')),
);
?>

<h1>Добавление подписчика</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>