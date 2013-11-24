<?php
/* @var $this ExcusasController */
/* @var $data Excusas */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('nombre_usuario')); ?>:</b>
	<?php echo CHtml::encode($data->nombre_usuario); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_facebook')); ?>:</b>
	<?php echo CHtml::encode($data->id_facebook); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('email')); ?>:</b>
	<?php echo CHtml::encode($data->email); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('excusa')); ?>:</b>
	<?php echo CHtml::encode($data->excusa); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('activo')); ?>:</b>
	<?php echo CHtml::encode($data->activo); ?>
	<br />


</div>