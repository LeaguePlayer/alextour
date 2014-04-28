<div class="width_980">
    <?php $this->widget('zii.widgets.CBreadcrumbs', array(
        'separator'=>' → ',
        'links'=>$this->breadcrumbs,
    )); ?>
</div>

<h1><?=$page->title?></h1>

<div class="cntent"><?=$page->wswg_body?></div>

<? if($page->map) { ?></div><div class="map_in_page" id="map"></div><div class="container"><? } ?>

<? if($page->call_with_me) $this->renderPartial('/site/_call_with_me'); ?>

<? if($page->recommend) $this->renderPartial('/site/_recomended'); ?>