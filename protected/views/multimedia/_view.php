<?php
/* @var $this MultimediaController */
/* @var $data Multimedia */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('idmultimedia')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->idmultimedia), array('view', 'id'=>$data->idmultimedia)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('url')); ?>:</b>
	<?php echo CHtml::encode($data->url); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('resumen')); ?>:</b>
	<?php echo CHtml::encode($data->resumen); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('fecha_creacion')); ?>:</b>
	<?php echo CHtml::encode($data->fecha_creacion); ?>
	<br />

<b><?php echo CHtml::encode($data->getAttributeLabel('idContenidomul')); ?>:</b>
	<?php echo CHtml::encode($data->idContenidomul); ?>
	<br />
</div>