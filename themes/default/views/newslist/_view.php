<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id),array('view','id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_node')); ?>:</b>
	<?php echo CHtml::encode($data->id_node); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('page_size')); ?>:</b>
	<?php echo CHtml::encode($data->page_size); ?>
	<br />


</div>