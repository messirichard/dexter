<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id),array('view','id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('group')); ?>:</b>
	<?php echo CHtml::encode($data->group); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('aktif')); ?>:</b>
	<?php echo CHtml::encode($data->aktif); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('akses')); ?>:</b>
	<?php echo CHtml::encode($data->akses); ?>
	<br />


</div>