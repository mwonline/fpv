<?php
/* @var $this AliadosController */
/* @var $data Aliados */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('idExcusa')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->idExcusa), array('view', 'id'=>$data->idExcusa)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('nombre')); ?>:</b>
	<?php echo CHtml::encode($data->nombre); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('correo')); ?>:</b>
	<?php echo CHtml::encode($data->correo); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('excusa')); ?>:</b>
	<?php echo CHtml::encode($data->excusa); ?>
	<br />


</div>