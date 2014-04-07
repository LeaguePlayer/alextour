<div class="width_980">
    <?php $this->widget('zii.widgets.CBreadcrumbs', array(
        'separator'=>' → ',
        'links'=>$this->breadcrumbs,
    )); ?>
</div>

<h1><?=$model->title?></h1>

<div><?=$model->wswg_body;?></div>