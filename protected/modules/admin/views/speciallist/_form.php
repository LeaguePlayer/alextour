<?php echo TbHtml::linkButton("Добавить в {$model->node->name}", array(
    'icon'=>TbHtml::ICON_PLUS,
    'url'=>array('/admin/special/create', 'list_id'=>$model->id)
)); ?>

<?php $this->widget('bootstrap.widgets.TbGridView',array(
    'id'=>'special-grid',
    'dataProvider'=>$specialFinder->search(),
    'filter'=>$specialFinder,
    'type'=>TbHtml::GRID_TYPE_HOVER,
    'afterAjaxUpdate'=>"function() {sortGrid('special')}",
    'rowHtmlOptionsExpression'=>'array(
            "id"=>"items[]_".$data->id,
            "class"=>"status_".$data->status,
        )',
    'columns'=>array(
       
        array(
            'name'=>'title',
            'type'=>'raw',
            'value'=>'TbHtml::link($data->title, array("/admin/special/update/", "id"=>$data->id, "list_id"=>'.$model->id.'))'
        ),
		
        'create_time',
        array(
            'name'=>'status',
            'type'=>'raw',
            'value'=>'special::getStatusAliases($data->status)',
            'filter'=>special::getStatusAliases()
        ),
        array(
            'class'=>'bootstrap.widgets.TbButtonColumn',
            'template'=>'{delete}',
            'buttons'=>array(
                'delete'=>array(
                    'url'=>'array("/admin/special/delete", "id"=>$data->id)'
                ),
                'view'=>array(
                    'url'=>'array("/admin/special/view", "id"=>$data->id)'
                ),
            ),
        ),
    ),
)); ?>
