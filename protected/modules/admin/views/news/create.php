<?php
$this->breadcrumbs=array(
    "Структура сайта"=>array('/admin/structure/list'),
    "Новости"=>array('/admin/newslist/update', 'id'=>$model->id_list),
    'Создание',
);

$this->menu=array(
    array('label'=>'Новости','url'=>array('/admin/newslist/update', 'id'=>$model->id_list)),
);
?>

<h3>Добавление новости</h3>

<?php echo $this->renderPartial('_form', array('model'=>$model, 'data'=>$data)); ?>