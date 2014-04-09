<?php echo TbHtml::linkButton("Добавить в {$model->node->name}", array(
    'icon'=>TbHtml::ICON_PLUS,
    'url'=>array('/admin/reviews/create', 'list_id'=>$model->id)
)); ?>

<?php $this->widget('bootstrap.widgets.TbGridView',array(
    'id'=>'reviews-grid',
    'dataProvider'=>$reviewsFinder->search(),
    'filter'=>$reviewsFinder,
    'type'=>TbHtml::GRID_TYPE_HOVER,
    'afterAjaxUpdate'=>"function() {sortGrid('reviews')}",
    'rowHtmlOptionsExpression'=>'array(
            "id"=>"items[]_".$data->id,
            "class"=>"status_".$data->status,
        )',
    'columns'=>array(
       
        array(
            'name'=>'name',
            'type'=>'raw',
            'value'=>'TbHtml::link($data->name, array("/admin/reviews/update/", "id"=>$data->id, "list_id"=>'.$model->id.'))'
        ),
		'rating',
        'create_time',
        array(
            'name'=>'status',
            'type'=>'raw',
            'value'=>'reviews::getStatusAliases($data->status)',
            'filter'=>reviews::getStatusAliases()
        ),
        array(
            'class'=>'bootstrap.widgets.TbButtonColumn',
            'template'=>'{delete}',
            'buttons'=>array(
                'delete'=>array(
                    'url'=>'array("/admin/reviews/delete", "id"=>$data->id)'
                ),
                'view'=>array(
                    'url'=>'array("/admin/reviews/view", "id"=>$data->id)'
                ),
            ),
        ),
    ),
)); ?>
