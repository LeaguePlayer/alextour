<?php echo TbHtml::linkButton("Добавить в {$model->node->name}", array(
    'icon'=>TbHtml::ICON_PLUS,
    'url'=>array('/admin/partners/create', 'list_id'=>$model->id)
)); ?>

<?php $this->widget('bootstrap.widgets.TbGridView',array(
    'id'=>'partners-grid',
    'dataProvider'=>$partnersFinder->search(),
    'filter'=>$partnersFinder,
    'type'=>TbHtml::GRID_TYPE_HOVER,
    'afterAjaxUpdate'=>"function() {sortGrid('partners')}",
    'rowHtmlOptionsExpression'=>'array(
            "id"=>"items[]_".$data->id,
            "class"=>"status_".$data->status,
        )',
    'columns'=>array(
        array(
            'name'=>'img_preview',
            'type'=>'raw',
            'value'=>'$data->getImage("small")',
            'filter'=>false
        ),
        array(
            'name'=>'title',
            'type'=>'raw',
            'value'=>'TbHtml::link($data->title, array("/admin/partners/update/", "id"=>$data->id, "list_id"=>'.$model->id.'))'
        ),
        'create_time',
        array(
            'name'=>'status',
            'type'=>'raw',
            'value'=>'partners::getStatusAliases($data->status)',
            'filter'=>partners::getStatusAliases()
        ),
        array(
            'class'=>'bootstrap.widgets.TbButtonColumn',
            'template'=>'{delete}',
            'buttons'=>array(
                'delete'=>array(
                    'url'=>'array("/admin/partners/delete", "id"=>$data->id)'
                ),
                'view'=>array(
                    'url'=>'array("/admin/partners/view", "id"=>$data->id)'
                ),
            ),
        ),
    ),
)); ?>
