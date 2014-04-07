<?php
$this->breadcrumbs=array(
    "Структура сайта"=>array('/admin/structure/list'),
    "Новости"=>array('/admin/newslist/update', 'id'=>$model->id_list),
    'Редактирование',
);

$this->menu=array(
    array('label'=>'Новости','url'=>array('/admin/newslist/update', 'id'=>$model->id_list)),
    array('label'=>'Добавить новую','url'=>array('/admin/news/create', 'id_list'=>$model->id_list)),
);
?>

<h3>Редактирование новости "<?php echo $model->title ?>"</h3>

<?php echo $this->renderPartial('_form',array('model'=>$model, 'data'=>$data)); ?>