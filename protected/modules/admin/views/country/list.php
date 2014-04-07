<?php
$this->breadcrumbs=array(
    "Структура сайта"=>array('/admin/structure/list'),
	"Страны мира"=>array('/admin/countrylist/update/', 'id'=>$model->id_list, 'node_id'=>$model->countrylist->node_id),
	"{$model->title}",
);

$this->menu=array(
    array('label'=>'Структура сайта','url'=>array('/admin/structure/list')),
    array('label'=>'Вернуться к странам мира', 'url'=>array('/admin/countrylist/update/node_id/6', 'id'=>$model->id_list)),
);
?>

<h1><?php echo $model->title; ?> - Редактирование</h1>

<?php echo TbHtml::linkButton('Добавить страницу', array(
    'icon'=>TbHtml::ICON_PLUS,
    'url'=>array('/admin/pagecountry/create', 'id_country'=>$model->id)
)); ?>

<?php $this->widget('bootstrap.widgets.TbGridView',array(
    'id'=>'pagecountry-grid',
    'dataProvider'=>$pagecountryFinder->search(),
    'filter'=>$pagecountryFinder,
    'type'=>TbHtml::GRID_TYPE_HOVER,
    'afterAjaxUpdate'=>"function() {sortGrid('pagecountry')}",
    'rowHtmlOptionsExpression'=>'array(
            "id"=>"items[]_".$data->id,
            "class"=>"status_".$data->status,
        )',
    'columns'=>array(
       
        array(
            'name'=>'title',
            'type'=>'raw',
            'value'=>'TbHtml::link($data->title, array("/admin/pagecountry/update/", "id"=>$data->id, "id_country"=>'.$model->id.'))'
        ),
        'create_time',
        array(
            'name'=>'status',
            'type'=>'raw',
            'value'=>'Country::getStatusAliases($data->status)',
            'filter'=>Country::getStatusAliases()
        ),
        array(
            'class'=>'bootstrap.widgets.TbButtonColumn',
            'template'=>'{delete}',
            'buttons'=>array(
                'delete'=>array(
                    'url'=>'array("/admin/pagecountry/delete", "id"=>$data->id)'
                ),
                'view'=>array(
                    'url'=>'array("/admin/pagecountry/view", "id"=>$data->id)'
                ),
            ),
        ),
    ),
)); ?>
